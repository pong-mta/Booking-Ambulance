<?php
/*
|--------------------------------------------------------------------------
| MDRRMO Estancia - Public Ambulance Booking
|--------------------------------------------------------------------------
| Standalone PHP frontend. Keeps the existing Laravel public booking API.
*/
$bookingEndpoint = 'https://offices.estancia.website/bookings/public';
$officeName = 'Municipal Disaster Risk Reduction and Management Office';
$municipality = 'Estancia, Iloilo';
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="theme-color" content="#8f1722">
<meta name="description" content="Submit a scheduled ambulance transportation request to MDRRMO Estancia, Iloilo.">
<title>Ambulance Request | MDRRMO Estancia</title>
<style>
:root{
  --red:#a51d2a;--red-dark:#76131d;--red-soft:#fff1f2;
  --navy:#152238;--ink:#1c2939;--muted:#697789;--line:#e6eaf0;
  --bg:#f4f6fa;--white:#fff;--green:#168354;--amber:#a15c08;
  --shadow:0 18px 55px rgba(22,34,54,.09);--radius:20px
}
*{box-sizing:border-box}
html{scroll-behavior:smooth}
body{margin:0;background:var(--bg);color:var(--ink);font-family:Inter,ui-sans-serif,system-ui,-apple-system,"Segoe UI",sans-serif}
button,input,select,textarea{font:inherit}
a{color:inherit}
.wrap{width:min(1160px,calc(100% - 40px));margin:auto}
.topbar{height:76px;background:#fff;border-bottom:1px solid var(--line);display:flex;align-items:center}
.topbar-inner{display:flex;align-items:center;justify-content:space-between;gap:20px}
.brand{display:flex;align-items:center;gap:12px;text-decoration:none}
.brand-mark{height:46px;width:46px;border-radius:15px;background:linear-gradient(145deg,#c52a38,#79131e);display:grid;place-items:center;color:#fff;box-shadow:0 8px 20px #9e1c292b}
.brand-mark svg{width:27px;height:27px}
.brand-name{font-size:13px;font-weight:850;letter-spacing:.025em}
.brand-sub{display:block;margin-top:3px;color:var(--muted);font-size:10px;font-weight:500}
.top-meta{display:flex;align-items:center;gap:20px;color:var(--muted);font-size:11px}
.status{display:inline-flex;align-items:center;gap:8px;padding:8px 11px;background:#f0faf4;border:1px solid #d9f0e2;border-radius:30px;color:#176b43;font-weight:750}
.status-dot{width:7px;height:7px;border-radius:50%;background:#22a568;box-shadow:0 0 0 4px #22a5681b}
.top-link{color:var(--red);font-weight:800;text-decoration:none}
.hero{position:relative;overflow:hidden;background:linear-gradient(115deg,#241b2b 0%,#5e1723 48%,#a51d2a 100%);color:#fff}
.hero:before,.hero:after{content:"";position:absolute;border:1px solid #ffffff16;border-radius:50%;pointer-events:none}
.hero:before{width:650px;height:650px;right:-180px;top:-390px;box-shadow:0 0 0 55px #ffffff08,0 0 0 110px #ffffff05}
.hero:after{width:300px;height:300px;right:14%;bottom:-240px;box-shadow:0 0 0 35px #ffffff08}
.hero-inner{position:relative;z-index:1;min-height:330px;display:grid;grid-template-columns:1.15fr .85fr;align-items:center;gap:45px;padding-top:54px;padding-bottom:54px}
.eyebrow{display:inline-flex;align-items:center;gap:9px;padding:8px 12px;border:1px solid #ffffff35;background:#ffffff12;border-radius:40px;color:#ffe2e5;font-size:10px;font-weight:850;letter-spacing:.13em;text-transform:uppercase}
.eyebrow-dot{height:7px;width:7px;border-radius:50%;background:#8be0ad;box-shadow:0 0 0 4px #8be0ad20}
h1{max-width:650px;margin:19px 0 14px;font-size:clamp(38px,5vw,58px);line-height:1.04;letter-spacing:-.055em}
.hero-copy{max-width:590px;margin:0;color:#f5dfe2;font-size:13px;line-height:1.85}
.hero-actions{display:flex;flex-wrap:wrap;gap:11px;margin-top:23px}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:9px;padding:13px 17px;border:0;border-radius:11px;font-size:11px;font-weight:850;text-decoration:none;cursor:pointer;transition:transform .18s,background .18s,box-shadow .18s}
.btn:hover{transform:translateY(-1px)}
.btn-light{background:#fff;color:#851923;box-shadow:0 8px 22px #0002}
.btn-outline{border:1px solid #ffffff50;background:#ffffff10;color:#fff}
.hero-note{margin:16px 0 0;color:#f5cbd0;font-size:10px}
.hero-visual{display:flex;justify-content:center}
.visual-card{width:min(100%,365px);padding:22px;border:1px solid #ffffff36;border-radius:22px;background:linear-gradient(145deg,#ffffff25,#ffffff0b);box-shadow:0 25px 60px #1c070b55;backdrop-filter:blur(8px)}
.visual-head,.visual-foot{display:flex;align-items:center;justify-content:space-between;gap:12px}
.visual-head{color:#ffe2e5;font-size:9px;font-weight:850;letter-spacing:.13em;text-transform:uppercase}
.pulse-icon{height:38px;width:38px;border-radius:12px;background:#fff;color:var(--red);display:grid;place-items:center}
.pulse-icon svg{width:21px}
.ambulance{display:block;width:100%;height:auto;margin:18px 0 10px}
.visual-foot{border-top:1px solid #ffffff30;padding-top:13px}
.visual-foot strong{font-size:12px}
.visual-foot small{display:block;margin-top:4px;color:#f6cbd0;font-size:9px}
.visual-foot .location{font-size:9px;font-weight:850;letter-spacing:.08em}
.trust-strip{background:#fff;border-bottom:1px solid var(--line)}
.trust-inner{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;padding:17px 0}
.trust-item{display:flex;align-items:center;justify-content:center;gap:10px;color:#455367;font-size:10px;font-weight:750}
.trust-item svg{width:19px;height:19px;color:var(--red);flex:0 0 auto}
.main{padding:48px 0 66px}
.intro{text-align:center;max-width:690px;margin:0 auto 27px}
.kicker{color:var(--red);font-size:9px;font-weight:900;letter-spacing:.17em;text-transform:uppercase}
.intro h2{margin:8px 0;font-size:clamp(26px,3vw,34px);letter-spacing:-.045em}
.intro p{margin:0;color:var(--muted);font-size:12px;line-height:1.75}
.layout{display:grid;grid-template-columns:minmax(0,1fr) 285px;align-items:start;gap:18px}
.form-card,.side-card{background:#fff;border:1px solid var(--line);border-radius:var(--radius);box-shadow:var(--shadow)}
.form-card{overflow:hidden}
.form-header{display:flex;align-items:center;justify-content:space-between;gap:14px;padding:20px 24px;border-bottom:1px solid var(--line)}
.form-header strong{font-size:13px}
.form-header small{display:block;margin-top:4px;color:var(--muted);font-size:10px}
.required-note{color:var(--muted);font-size:10px}
.required-note b,.required{color:var(--red)}
.form-body{padding:23px 24px}
.section{margin-bottom:27px}
.section:last-child{margin-bottom:0}
.section-heading{display:flex;align-items:center;gap:11px;margin-bottom:15px}
.section-number{height:30px;width:30px;display:grid;place-items:center;border-radius:10px;background:var(--red-soft);color:var(--red);font-size:10px;font-weight:900}
.section-heading strong{font-size:12px}
.section-heading small{display:block;margin-top:3px;color:var(--muted);font-size:10px}
.fields{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:14px}
.schedule-fields{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:14px}
.schedule-field{min-width:0}
.schedule-field input[type="date"],.schedule-field input[type="time"]{width:100%;min-width:0;max-width:100%;min-height:54px;padding:12px 13px;border:1px solid #d5dce5;border-radius:12px;background:#fff;color:var(--ink);font-size:16px;font-weight:650;line-height:1.3;color-scheme:light}
.schedule-field input[type="date"]:focus,.schedule-field input[type="time"]:focus{border-color:#bd4650;box-shadow:0 0 0 3px #a51d2a12;outline:none}
.schedule-field input[type="date"]::-webkit-date-and-time-value,.schedule-field input[type="time"]::-webkit-date-and-time-value{text-align:left}
.schedule-field .hint{font-size:10px}
.field.full{grid-column:1/-1}
.field label{display:block;margin-bottom:7px;color:#344256;font-size:10px;font-weight:800}
.field input,.field select,.field textarea{display:block;width:100%;min-height:43px;padding:11px 12px;border:1px solid #dce2e9;border-radius:10px;background:#fff;color:var(--ink);font-size:11px;outline:none;transition:border .15s,box-shadow .15s}
.field textarea{min-height:78px;resize:vertical}
.field input:focus,.field select:focus,.field textarea:focus{border-color:#bd4650;box-shadow:0 0 0 3px #a51d2a12}
.field input::placeholder,.field textarea::placeholder{color:#a2acb8}
.field input.capitalized,.field textarea.capitalized{text-transform:capitalize}
.hint{display:block;margin-top:5px;color:#8994a1;font-size:9px;line-height:1.5}
.position-options{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:10px}
.position-option{display:flex;gap:10px;align-items:flex-start;padding:12px;border:1px solid #dce2e9;border-radius:11px;cursor:pointer;transition:.15s}
.position-option:has(input:checked){border-color:#c04b55;background:#fff7f7;box-shadow:0 0 0 2px #a51d2a0d}
.position-option input{margin:2px 0 0;accent-color:var(--red)}
.position-option strong{display:block;font-size:10px}
.position-option small{display:block;margin-top:4px;color:var(--muted);font-size:9px;line-height:1.5}
.form-footer{display:flex;align-items:center;justify-content:space-between;gap:15px;padding:17px 24px;background:#fafbfd;border-top:1px solid var(--line)}
.privacy{max-width:360px;color:var(--muted);font-size:9px;line-height:1.6}
.submit{min-width:190px;background:var(--red);color:#fff;box-shadow:0 8px 18px #a51d2a25}
.submit:hover{background:var(--red-dark)}
.submit:disabled{opacity:.65;cursor:wait;transform:none}
.side-card{padding:18px;margin-bottom:13px}
.side-card:last-child{margin-bottom:0}
.side-icon{height:35px;width:35px;display:grid;place-items:center;margin-bottom:12px;border-radius:11px;background:var(--red-soft);color:var(--red)}
.side-icon svg{width:18px;height:18px}
.side-card h3{margin:0 0 9px;font-size:12px}
.side-card p,.side-card li{color:var(--muted);font-size:10px;line-height:1.75}
.side-card ul{margin:7px 0 0;padding-left:16px}
.side-card li+li{margin-top:5px}
.side-card.warning{background:#fff9ef;border-color:#f1dfc3}
.side-card.warning .side-icon{background:#fff0d9;color:var(--amber)}
.side-card.warning h3{color:#87510c}
.side-card.warning p{color:#765a32}
.notice{display:flex;gap:11px;margin-top:18px;padding:14px 16px;border:1px solid #f0d9b5;border-radius:13px;background:#fff9ef}
.notice svg{width:18px;height:18px;flex:0 0 auto;color:#a16207}
.notice strong{color:#80500e;font-size:10px}
.notice p{margin:4px 0 0;color:#775d37;font-size:9px;line-height:1.65}
footer{padding:23px 0;background:#172238;color:#cbd3df}
.footer-inner{display:flex;align-items:center;justify-content:space-between;gap:15px;font-size:9px}
.footer-inner strong{color:#fff}
.overlay{position:fixed;inset:0;z-index:30;display:none;align-items:center;justify-content:center;padding:18px;background:#111827b8;backdrop-filter:blur(5px)}
.overlay.show{display:flex}
.dialog{width:min(100%,440px);padding:29px;border-radius:21px;background:#fff;text-align:center;box-shadow:0 25px 80px #0003}
.success-icon{height:58px;width:58px;display:grid;place-items:center;margin:0 auto 14px;border-radius:50%;background:#e8f7ef;color:var(--green)}
.success-icon svg{width:27px;height:27px}
.dialog h2{margin:0 0 8px;font-size:21px;letter-spacing:-.03em}
.dialog p{color:var(--muted);font-size:11px;line-height:1.7}
.reference{display:inline-block;margin:8px 0 14px;padding:11px 15px;border-radius:10px;background:#f1f4f8;color:#233247;font-size:11px;font-weight:900}
.dialog .btn{width:100%;background:var(--red);color:#fff}
.error-box{display:none;margin:0 24px 14px;padding:12px 13px;border:1px solid #f0c7cb;border-radius:10px;background:#fff2f3;color:#92212b;font-size:10px;line-height:1.6}
.error-box.show{display:block}
@media(max-width:900px){.hero-inner{grid-template-columns:1fr .65fr;gap:20px}.layout{grid-template-columns:1fr}.side-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:13px}.side-card{margin:0}.side-card:last-child{grid-column:1/-1}}
@media(max-width:650px){
 .wrap{width:min(100% - 28px,1160px)}.topbar{height:65px}.brand-mark{width:40px;height:40px}.brand-name{font-size:11px}.brand-sub{font-size:9px}.top-meta>span{display:none}.top-meta{gap:0}.top-link{font-size:9px}
 .hero-inner{display:block;min-height:0;padding-top:42px;padding-bottom:38px}.hero-visual{display:none}h1{font-size:42px}.hero-copy{font-size:12px}.trust-inner{grid-template-columns:1fr;gap:11px}.trust-item{justify-content:flex-start;width:260px;margin:auto}
 .main{padding:38px 0 48px}.form-header,.form-body{padding:17px}.field input,.field select,.field textarea{font-size:16px;min-height:48px}.field textarea{min-height:90px}.schedule-field input[type="date"],.schedule-field input[type="time"]{min-height:56px;font-size:16px;padding:13px 12px}.form-footer{align-items:stretch;flex-direction:column;padding:15px 17px}.submit{width:100%}.fields,.position-options,.schedule-fields{grid-template-columns:1fr}.field.full{grid-column:auto}.side-grid{grid-template-columns:1fr}.side-card:last-child{grid-column:auto}.footer-inner{align-items:flex-start;flex-direction:column}.required-note{display:none}
}
@media(prefers-reduced-motion:reduce){*{scroll-behavior:auto!important;transition:none!important}}
</style>
</head>
<body>
<header class="topbar">
 <div class="wrap topbar-inner">
  <a class="brand" href="#" aria-label="MDRRMO Estancia home">
   <span class="brand-mark"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3 4.5 6v5.5c0 4.7 3.2 7.8 7.5 9.5 4.3-1.7 7.5-4.8 7.5-9.5V6L12 3Z"/><path d="M12 7v10M7 12h10"/></svg></span>
   <span><span class="brand-name">MDRRMO ESTANCIA</span><span class="brand-sub">Municipality of Estancia, Iloilo</span></span>
  </a>
  <div class="top-meta"><span class="status"><i class="status-dot"></i> Public service portal</span><a class="top-link" href="#booking">REQUEST AMBULANCE ↓</a></div>
 </div>
</header>

<section class="hero">
 <div class="wrap hero-inner">
  <div>
   <span class="eyebrow"><i class="eyebrow-dot"></i> Ambulance transportation request</span>
   <h1>Every Life Matters. Every Second Counts.</h1>
   <p class="hero-copy">Submit a scheduled ambulance transportation request to the Municipal Disaster Risk Reduction and Management Office of Estancia, Iloilo. Our team will review your information and contact you regarding your request.</p>
   <div class="hero-actions"><a class="btn btn-light" href="#booking">Start booking <span>→</span></a><a class="btn btn-outline" href="#how">How it works</a></div>
   <p class="hero-note">All requests are subject to MDRRMO assessment and confirmation.</p>
  </div>
  <div class="hero-visual"><div class="visual-card">
   <div class="visual-head"><span>Estancia emergency services</span><span class="pulse-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12h4l2-6 4 12 2-6h6"/></svg></span></div>
   <svg class="ambulance" viewBox="0 0 440 210" fill="none" aria-label="Ambulance illustration" role="img"><path d="M36 58h238c10 0 18 8 18 18v91H36V58Z" fill="#fff"/><path d="M292 96h65l49 49v22H292V96Z" fill="#f6dfe0"/><path d="M307 108h43l34 34h-77v-34Z" fill="#a9d5e5"/><path d="M55 75h198v75H55V75Z" fill="#f8f9fa"/><path d="M141 91v43M120 112h43" stroke="#ad2028" stroke-width="13" stroke-linecap="round"/><path d="M22 167h403v18H22v-18Z" fill="#c52a32"/><circle cx="105" cy="177" r="26" fill="#27313b"/><circle cx="105" cy="177" r="11" fill="#d9e0e5"/><circle cx="353" cy="177" r="26" fill="#27313b"/><circle cx="353" cy="177" r="11" fill="#d9e0e5"/><path d="M54 48h73M300 84h33" stroke="#fff" stroke-width="8" stroke-linecap="round"/></svg>
   <div class="visual-foot"><div><strong>Public booking portal</strong><small>Scheduled transportation requests</small></div><span class="location">ESTANCIA • ILOILO</span></div>
  </div></div>
 </div>
</section>

<div class="trust-strip"><div class="wrap trust-inner">
 <div class="trust-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11Z"/><path d="m9 12 2 2 4-4"/></svg> Reviewed by authorized MDRRMO personnel</div>
 <div class="trust-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="17" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg> Choose your preferred date and time</div>
 <div class="trust-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.4 19.4 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7l.5 2.8a2 2 0 0 1-.6 1.9L7.2 10a16 16 0 0 0 6 6l1.6-1.8a2 2 0 0 1 1.9-.6l2.8.5a2 2 0 0 1 1.5 2.8Z"/></svg> Keep your contact number available</div>
</div></div>

<main class="main" id="booking"><div class="wrap">
 <div class="intro"><span class="kicker">Public service • MDRRMO Estancia</span><h2>Ambulance booking form</h2><p>Complete the details below. Fields marked with an asterisk (<span class="required">*</span>) are required. Please review your locations and schedule before submitting.</p></div>
 <div class="layout">
  <div class="form-card">
   <div class="form-header"><div><strong>Booking information</strong><small>Provide accurate details for assessment and coordination.</small></div><span class="required-note"><b>*</b> Required fields</span></div>
   <form id="bookingForm" novalidate>
    <div class="form-body">
     <section class="section">
      <div class="section-heading"><span class="section-number">01</span><span><strong>Requester information</strong><small>How can our team contact you?</small></span></div>
      <div class="fields">
       <div class="field"><label for="requester_name">Full name <b class="required">*</b></label><input id="requester_name" name="requester_name" class="capitalized" required maxlength="150" autocomplete="name" placeholder="Enter your full name"></div>
       <div class="field"><label for="requester_phone">Contact number <b class="required">*</b></label><input id="requester_phone" name="requester_phone" type="tel" inputmode="numeric" pattern="09[0-9]{9}" required maxlength="11" autocomplete="tel" placeholder="09XXXXXXXXX"><small class="hint">Enter 11 digits only, starting with 09.</small></div>
       <div class="field"><label for="requester_email">Email address <span style="font-weight:500;color:#8994a1">(optional)</span></label><input id="requester_email" name="requester_email" type="email" maxlength="150" autocomplete="email" placeholder="name@example.com"></div>
       <div class="field"><label for="passenger_count">Passenger count <b class="required">*</b></label><input id="passenger_count" name="passenger_count" type="number" min="1" max="100" value="1" required><small class="hint">Include the patient and accompanying persons.</small></div>
       <div class="field full"><label>Patient position <b class="required">*</b></label><div class="position-options">
        <label class="position-option"><input type="radio" name="patient_position" value="standard" checked required><span><strong>Standard / seated</strong><small>Patient can sit upright during transport.</small></span></label>
        <label class="position-option"><input type="radio" name="patient_position" value="lying" required><span><strong>Lying / stretcher</strong><small>Patient must lie flat on a stretcher.</small></span></label>
       </div></div>
      </div>
     </section>
     <section class="section">
      <div class="section-heading"><span class="section-number">02</span><span><strong>Purpose of transportation</strong><small>Tell us why ambulance transport is requested.</small></span></div>
      <div class="fields">
       <div class="field"><label for="purpose">Request purpose <b class="required">*</b></label><select id="purpose" name="purpose" required><option value="medical" selected>Medical assistance / appointment</option><option value="emergency">Emergency response</option><option value="hospital_transfer">Hospital transfer</option><option value="inter_facility_transfer">Inter-facility transfer</option><option value="other">Other</option></select></div>
       <div class="field"><label for="purpose_details">Additional details <span style="font-weight:500;color:#8994a1">(optional)</span></label><input id="purpose_details" name="purpose_details" maxlength="1000" placeholder="Briefly describe the reason"></div>
      </div>
     </section>
     <section class="section">
      <div class="section-heading"><span class="section-number">03</span><span><strong>Pickup and destination</strong><small>Add landmarks or facility names to help locate each place.</small></span></div>
      <div class="fields">
       <div class="field full"><label for="pickup_address">Pickup address / location <b class="required">*</b></label><textarea id="pickup_address" name="pickup_address" class="capitalized" required maxlength="2000" placeholder="House number, street, sitio/purok, landmark, or exact pickup location"></textarea></div>
       <div class="field"><label for="pickup_barangay">Pickup barangay</label><input id="pickup_barangay" name="pickup_barangay" class="capitalized" maxlength="100" placeholder="Enter pickup barangay"></div>
       <div class="field full"><label for="destination_address">Destination address / facility <b class="required">*</b></label><textarea id="destination_address" name="destination_address" class="capitalized" required maxlength="2000" placeholder="Hospital, clinic, facility name and complete address"></textarea></div>
       <div class="field"><label for="destination_barangay">Destination barangay</label><input id="destination_barangay" name="destination_barangay" class="capitalized" maxlength="100" placeholder="Enter destination barangay"></div>
      </div>
     </section>
     <section class="section">
      <div class="section-heading"><span class="section-number">04</span><span><strong>Requested schedule</strong><small>Choose your preferred transportation date and time.</small></span></div>
      <div class="schedule-fields">
       <div class="field schedule-field"><label for="requested_date">Requested date <b class="required">*</b></label><input id="requested_date" name="requested_date" type="date" required><small class="hint">Tap to open the calendar and select a date.</small></div>
       <div class="field schedule-field"><label for="requested_time">Requested time <b class="required">*</b></label><input id="requested_time" name="requested_time" type="time" required><small class="hint">Tap to choose your preferred time.</small></div>
      </div>
     </section>
    </div>
    <div id="errorBox" class="error-box" role="alert" aria-live="polite"></div>
    <div class="form-footer"><div class="privacy">By submitting, you confirm that the information is accurate and may be used by MDRRMO to assess and coordinate this request.</div><button class="btn submit" id="submitBtn" type="submit"><span>Submit booking request</span><span>→</span></button></div>
   </form>
  </div>

  <aside class="side-grid" id="how">
   <div class="side-card"><div class="side-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 8v4l3 2"/><circle cx="12" cy="12" r="9"/></svg></div><h3>What happens next?</h3><ul><li>Your request enters the MDRRMO booking queue.</li><li>Authorized staff review the information.</li><li>Staff may contact you using the number provided.</li><li>Wait for confirmation before assuming transport is approved.</li></ul></div>
   <div class="side-card warning"><div class="side-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 9v4m0 4h.01"/><path d="M10.3 3.9 1.8 18.5A1.7 1.7 0 0 0 3.3 21h17.4a1.7 1.7 0 0 0 1.5-2.5L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg></div><h3>Urgent emergency?</h3><p>Do not rely on this online form for immediate emergency response. Contact local emergency services or MDRRMO ( 09165740190 ) directly for urgent assistance.</p></div>
   <div class="side-card"><div class="side-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.4 19.4 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7l.5 2.8a2 2 0 0 1-.6 1.9L7.2 10a16 16 0 0 0 6 6l1.6-1.8a2 2 0 0 1 1.9-.6l2.8.5a2 2 0 0 1 1.5 2.8Z"/></svg></div><h3>Before you submit</h3><p>Check that your phone is active, passenger count is correct, and both locations are complete. MDRRMO may contact you for clarification.</p></div>
  </aside>
 </div>
 <div class="notice"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 11v5m0-8h.01"/></svg><div><strong>Important: submission is not confirmation.</strong><p>Submitting this form creates a booking request for review. It does not automatically approve the trip, reserve an ambulance, assign a vehicle, or dispatch a response team. Availability and approval must be confirmed by MDRRMO.</p></div></div>
</div></main>

<footer><div class="wrap footer-inner"><span><strong>MDRRMO Estancia, Iloilo</strong><br>Municipal Disaster Risk Reduction and Management Office</span><span>Public ambulance transportation request portal</span></div></footer>

<div class="overlay" id="successOverlay" role="dialog" aria-modal="true" aria-labelledby="successTitle">
 <div class="dialog"><div class="success-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6"/></svg></div><h2 id="successTitle">Request submitted!</h2><p>Your ambulance booking request has been sent to MDRRMO Estancia for review. Please keep your phone available for a possible follow-up.</p><div class="reference" id="referenceNumber" hidden></div><p>Remember: this is a request only. Wait for direct confirmation from MDRRMO.</p><button class="btn" type="button" onclick="closeSuccess()">Close</button></div>
</div>

<script>
const ENDPOINT = <?= json_encode($bookingEndpoint, JSON_UNESCAPED_SLASHES) ?>;
const form = document.getElementById('bookingForm');
const submitBtn = document.getElementById('submitBtn');
const errorBox = document.getElementById('errorBox');
const successOverlay = document.getElementById('successOverlay');
const dateInput = document.getElementById('requested_date');
const emailInput = document.getElementById('requester_email');
const phoneInput = document.getElementById('requester_phone');

function getLocalDate(){
 const now=new Date();
 return new Date(now.getTime()-now.getTimezoneOffset()*60000).toISOString().slice(0,10);
}
function updateMinimumDate(){dateInput.min=getLocalDate();}
updateMinimumDate();

function showError(message){
 errorBox.textContent=message;
 errorBox.classList.add('show');
 errorBox.scrollIntoView({behavior:'smooth',block:'center'});
}
function clearError(){errorBox.textContent='';errorBox.classList.remove('show');}
function closeSuccess(){
 successOverlay.classList.remove('show');
 form.reset();
 document.getElementById('passenger_count').value='1';
 updateMinimumDate();
 const ref=document.getElementById('referenceNumber');
 ref.hidden=true;ref.textContent='';
 document.getElementById('booking').scrollIntoView({behavior:'smooth'});
}
function flattenErrors(errors){
 if(!errors||typeof errors!=='object')return '';
 return Object.entries(errors).map(([field,messages])=>{
  const label=field.replaceAll('_',' ');
  return `${label}: ${Array.isArray(messages)?messages.join(', '):String(messages)}`;
 }).join(' ');
}
function digitsOnly(value){
 return String(value||'').replace(/\D/g,'').slice(0,11);
}

// Capitalize the first letter of each word without changing the remaining
// letters, so abbreviations and mixed-case place names are preserved.
function capitalizeInitials(value){
 return String(value||'').replace(/(^|[\s\-’'])\p{L}/gu, letter=>letter.toUpperCase());
}
function isValidEmail(value){
 if(!value)return true;
 if(value.length>150)return false;
 return /^[A-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[A-Z0-9](?:[A-Z0-9-]{0,61}[A-Z0-9])?(?:\.[A-Z0-9](?:[A-Z0-9-]{0,61}[A-Z0-9])?)+$/i.test(value);
}
phoneInput.addEventListener('input',()=>{
 const cleaned=digitsOnly(phoneInput.value);
 if(phoneInput.value!==cleaned)phoneInput.value=cleaned;
 phoneInput.setCustomValidity('');
});
emailInput.addEventListener('input',()=>emailInput.setCustomValidity(''));

['requester_name','pickup_address','pickup_barangay','destination_address','destination_barangay'].forEach(id=>{
 const field=document.getElementById(id);
 field.addEventListener('blur',()=>{field.value=capitalizeInitials(field.value.trim());});
});

form.addEventListener('submit',async(event)=>{
 event.preventDefault();clearError();
 if(!form.reportValidity())return;
 const today=getLocalDate();
 if(dateInput.value<today){showError('Please select today or a future date.');dateInput.focus();return;}
 const data=Object.fromEntries(new FormData(form).entries());
 data.requester_name=capitalizeInitials(String(data.requester_name||'').trim());
 data.requester_phone=digitsOnly(data.requester_phone);
 data.requester_email=String(data.requester_email||'').trim();
 data.purpose_details=String(data.purpose_details||'').trim();
 data.pickup_address=capitalizeInitials(String(data.pickup_address||'').trim());
 data.pickup_barangay=capitalizeInitials(String(data.pickup_barangay||'').trim());
 data.destination_address=capitalizeInitials(String(data.destination_address||'').trim());
 data.destination_barangay=capitalizeInitials(String(data.destination_barangay||'').trim());
 data.passenger_count=Number(data.passenger_count);

 if(!/^09\d{9}$/.test(data.requester_phone)){showError('Enter a valid 11-digit Philippine mobile number starting with 09. Numbers only; do not include spaces or symbols.');phoneInput.focus();return;}
 if(!isValidEmail(data.requester_email)){showError('Please enter a valid email address, or leave the email field blank.');emailInput.focus();return;}
 if(!Number.isInteger(data.passenger_count)||data.passenger_count<1||data.passenger_count>100){showError('Passenger count must be a whole number from 1 to 100.');document.getElementById('passenger_count').focus();return;}
 const requiredFields=['requester_name','requester_phone','purpose','pickup_address','destination_address','requested_date','requested_time'];
 for(const key of requiredFields){
  if(!data[key]){showError(`Please complete the required field: ${key.replaceAll('_',' ')}.`);document.getElementById(key)?.focus();return;}
 }
 const selectedPosition=form.querySelector('input[name="patient_position"]:checked');
 if(!selectedPosition){showError('Please select the patient position.');return;}
 data.patient_position=selectedPosition.value;

 submitBtn.disabled=true;
 submitBtn.innerHTML='<span>Submitting request…</span>';
 try{
  const response=await fetch(ENDPOINT,{
   method:'POST',
   headers:{'Accept':'application/json','Content-Type':'application/json'},
   credentials:'omit',
   body:JSON.stringify(data)
  });
  const responseText=await response.text();
  let result={};
  try{result=responseText?JSON.parse(responseText):{};}
  catch{throw new Error(`The server returned an unexpected response (HTTP ${response.status}).`);}
  if(!response.ok){
   const validation=flattenErrors(result.errors);
   if(response.status===422)throw new Error(validation||result.message||'Please review the information you entered.');
   if(response.status===401||response.status===403)throw new Error('The server did not allow this submission. Please contact the MDRRMO system administrator.');
   throw new Error(result.message||`Unable to submit your request (HTTP ${response.status}).`);
  }
  const reference=result.request_number||result.booking?.request_number||result.data?.request_number||result.reference_number||'';
  const refElement=document.getElementById('referenceNumber');
  if(reference){refElement.textContent='Request reference: '+reference;refElement.hidden=false;}
  successOverlay.classList.add('show');
 }catch(error){
  const message=error instanceof TypeError
   ?'Unable to connect to the booking server. If the browser console reports CORS, the API preflight response may not be allowing this website.'
   :(error.message||'A network error occurred. Please check your connection and try again.');
  showError(message);
 }finally{
  submitBtn.disabled=false;
  submitBtn.innerHTML='<span>Submit booking request</span><span>→</span>';
 }
});
successOverlay.addEventListener('click',(event)=>{if(event.target===successOverlay)closeSuccess();});
document.addEventListener('keydown',(event)=>{if(event.key==='Escape'&&successOverlay.classList.contains('show'))closeSuccess();});
</script>
</body>
</html>
