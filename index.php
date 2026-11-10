<?php
/*
|--------------------------------------------------------------------------
| MDRRMO Estancia - Public Ambulance Booking
|--------------------------------------------------------------------------
| Standalone PHP frontend. Public fields mirror the MDRRMO booking form:
| requester_name, requester_phone, requester_email, purpose,
| purpose_details, passenger_count, pickup_address, pickup_barangay,
| destination_address, destination_barangay, requested_date, requested_time.
|
| internal_notes, rejection_reason, review fields and status are intentionally
| excluded because they are for authorized MDRRMO staff/system use.
|--------------------------------------------------------------------------
*/
$bookingEndpoint = 'https://offices.estancia.website/mdrrmo/bookings/public';
$officeName = 'Municipal Disaster Risk Reduction and Management Office';
$municipality = 'Estancia, Iloilo';
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="theme-color" content="#7f1d1d">
<meta name="description" content="Submit a scheduled ambulance transportation request to MDRRMO Estancia, Iloilo.">
<title>Ambulance Booking | MDRRMO Estancia</title>
<style>
:root{--red:#a51d25;--red2:#78151c;--red3:#fdf0f0;--ink:#17212b;--muted:#64717d;--line:#e5e9ed;--paper:#fff;--bg:#f4f6f8;--green:#147a4b;--shadow:0 24px 70px rgba(22,34,45,.12)}
*{box-sizing:border-box}html{scroll-behavior:smooth}body{margin:0;background:var(--bg);color:var(--ink);font-family:Inter,ui-sans-serif,system-ui,-apple-system,"Segoe UI",sans-serif}button,input,select,textarea{font:inherit}a{color:inherit}.wrap{width:min(1160px,calc(100% - 40px));margin:auto}
.top{height:76px;background:#fff;border-bottom:1px solid var(--line);display:flex;align-items:center}.topin{display:flex;justify-content:space-between;align-items:center;gap:20px}.brand{display:flex;align-items:center;gap:12px;text-decoration:none}.seal{width:46px;height:46px;border-radius:14px;background:linear-gradient(145deg,#c12b32,#76151c);display:grid;place-items:center;color:white;box-shadow:0 7px 18px #9f1d252b}.seal svg{width:27px;height:27px}.brand strong{display:block;font-size:13px;letter-spacing:.01em}.brand small{display:block;color:var(--muted);font-size:11px;margin-top:3px}.topright{display:flex;align-items:center;gap:18px}.topright span{font-size:12px;color:var(--muted)}.topright a{font-size:12px;font-weight:700;text-decoration:none;color:var(--red)}
.hero{background:radial-gradient(circle at 80% 15%,#ffffff20,transparent 25%),linear-gradient(115deg,#431015,#79181f 56%,#a51d25);color:#fff;position:relative;overflow:hidden}.hero:after{content:"";position:absolute;width:560px;height:560px;border:1px solid #ffffff18;border-radius:50%;right:-170px;top:-280px;box-shadow:0 0 0 55px #ffffff08,0 0 0 110px #ffffff06}.heroIn{position:relative;z-index:1;min-height:380px;display:grid;grid-template-columns:1.15fr .85fr;align-items:center;gap:50px;padding-top:58px;padding-bottom:58px}.eyebrow{display:inline-flex;align-items:center;gap:8px;border:1px solid #ffffff35;background:#ffffff12;border-radius:99px;padding:8px 12px;color:#ffe1e2;text-transform:uppercase;letter-spacing:.12em;font-size:10px;font-weight:800}.dot{width:7px;height:7px;border-radius:50%;background:#8be0ad;box-shadow:0 0 0 5px #8be0ad20}h1{font-size:clamp(39px,5.1vw,62px);line-height:1.03;letter-spacing:-.055em;margin:20px 0 16px;max-width:650px}.hero p{max-width:570px;color:#f9dfe0;line-height:1.8;font-size:14px;margin:0}.heroActions{display:flex;gap:11px;flex-wrap:wrap;margin-top:25px}.btn{border:0;border-radius:11px;padding:13px 18px;font-weight:800;font-size:12px;display:inline-flex;align-items:center;justify-content:center;gap:9px;text-decoration:none;cursor:pointer;transition:.18s}.btn:hover{transform:translateY(-1px)}.btnWhite{background:#fff;color:#851a21;box-shadow:0 9px 25px #0002}.btnGlass{background:#ffffff12;color:#fff;border:1px solid #ffffff45}.heroHint{margin-top:18px!important;font-size:11px!important;color:#f5c9cb!important}.heroArt{display:flex;justify-content:center;align-items:center}.artCard{width:min(100%,390px);padding:24px;border-radius:25px;background:linear-gradient(145deg,#ffffff24,#ffffff0d);border:1px solid #ffffff35;box-shadow:0 28px 65px #25080b55;backdrop-filter:blur(8px)}.artTop{display:flex;justify-content:space-between;align-items:center;color:#ffdddf;font-size:10px;font-weight:800;letter-spacing:.14em;text-transform:uppercase}.artIcon{width:40px;height:40px;border-radius:12px;background:#fff;color:var(--red);display:grid;place-items:center}.artIcon svg{width:23px}.ambulance{width:100%;height:auto;margin:20px 0 10px}.artFoot{border-top:1px solid #ffffff30;padding-top:15px;display:flex;justify-content:space-between;align-items:center;gap:12px}.artFoot strong{font-size:13px}.artFoot small{display:block;color:#f7cdd0;font-size:10px;margin-top:4px}
.quick{background:#fff;border-bottom:1px solid var(--line)}.quickIn{display:grid;grid-template-columns:repeat(3,1fr);gap:15px;padding-top:18px;padding-bottom:18px}.quickItem{display:flex;align-items:center;justify-content:center;gap:10px;font-size:11px;font-weight:750;color:#475462}.quickItem svg{width:18px;height:18px;color:var(--red)}
.main{padding:54px 0 70px}.intro{text-align:center;max-width:700px;margin:0 auto 28px}.kicker{font-size:10px;font-weight:850;letter-spacing:.16em;text-transform:uppercase;color:var(--red)}h2{font-size:clamp(27px,3vw,36px);letter-spacing:-.045em;margin:9px 0}.intro p{font-size:13px;line-height:1.7;color:var(--muted);margin:0}
.bookingLayout{display:grid;grid-template-columns:minmax(0,1fr) 290px;gap:20px;align-items:start}.formCard,.sideCard{background:#fff;border:1px solid var(--line);border-radius:18px;box-shadow:0 8px 28px #16222d08}.formHead{padding:21px 25px;border-bottom:1px solid var(--line);display:flex;justify-content:space-between;align-items:center;gap:15px}.formHead strong{font-size:14px}.formHead small{font-size:11px;color:var(--muted);display:block;margin-top:4px}.requiredNote{font-size:10px;color:var(--muted)}.formBody{padding:24px 25px}.section{margin-bottom:27px}.section:last-child{margin-bottom:0}.sectionTitle{display:flex;align-items:center;gap:11px;margin-bottom:16px}.num{width:29px;height:29px;border-radius:9px;background:var(--red3);color:var(--red);display:grid;place-items:center;font-size:11px;font-weight:900}.sectionTitle strong{font-size:13px}.sectionTitle small{display:block;color:var(--muted);font-size:10px;margin-top:3px}.grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:15px}.field.full{grid-column:1/-1}.field label{display:block;font-size:11px;font-weight:750;color:#344150;margin-bottom:7px}.req{color:var(--red)}.field input,.field select,.field textarea{width:100%;border:1px solid #d8dfe5;border-radius:10px;background:#fff;color:var(--ink);padding:11px 12px;font-size:12px;outline:none;transition:.15s}.field textarea{min-height:82px;resize:vertical}.positionChoices{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:10px}.positionChoice{display:flex;align-items:flex-start;gap:10px;padding:13px;border:1px solid #d8dfe5;border-radius:10px;cursor:pointer}.positionChoice:has(input:checked){border-color:#b72b32;background:#fdf5f5;box-shadow:0 0 0 2px #b72b3214}.positionChoice input{width:auto;margin:2px 0 0;accent-color:#a51d25}.positionChoice strong{display:block;font-size:11px}.positionChoice small{display:block;color:#7b8792;font-size:10px;line-height:1.5;margin-top:4px}.field input:focus,.field select:focus,.field textarea:focus{border-color:#b72b32;box-shadow:0 0 0 3px #b72b3214}.field input::placeholder,.field textarea::placeholder{color:#a0aab4}.hint{display:block;font-size:10px;color:#87929c;margin-top:5px;line-height:1.5}.formActions{border-top:1px solid var(--line);padding:18px 25px;background:#fbfcfd;border-radius:0 0 18px 18px;display:flex;justify-content:space-between;align-items:center;gap:14px}.privacy{font-size:10px;line-height:1.5;color:var(--muted);max-width:360px}.submit{background:var(--red);color:#fff;min-width:190px;box-shadow:0 8px 18px #a51d2526}.submit:hover{background:var(--red2)}.submit:disabled{opacity:.6;cursor:wait;transform:none}
.sideCard{padding:20px;margin-bottom:14px}.sideCard h3{font-size:13px;margin:0 0 12px}.sideCard p,.sideCard li{font-size:11px;line-height:1.7;color:var(--muted)}.sideCard ul{padding-left:17px;margin:8px 0 0}.sideIcon{width:36px;height:36px;border-radius:11px;background:var(--red3);color:var(--red);display:grid;place-items:center;margin-bottom:13px}.sideIcon svg{width:19px}.warning{background:#fff8ed;border-color:#f5dfbd}.warning h3{color:#87510c}.warning p{color:#765a32}.contactLine{display:flex;align-items:flex-start;gap:9px;margin-top:9px}.contactLine svg{width:15px;height:15px;color:var(--red);flex:0 0 auto;margin-top:2px}
.noticeBar{margin-top:20px;border:1px solid #f0d4a9;background:#fff9ef;border-radius:13px;padding:14px 16px;display:flex;gap:11px}.noticeBar svg{width:19px;height:19px;color:#a16207;flex:0 0 auto}.noticeBar strong{font-size:11px;color:#80500e}.noticeBar p{font-size:10px;line-height:1.6;color:#775d37;margin:4px 0 0}
footer{background:#17212b;color:#cbd3da;padding:25px 0}.footIn{display:flex;justify-content:space-between;align-items:center;gap:15px;font-size:10px}.footIn strong{color:#fff}
.overlay{position:fixed;inset:0;background:#101923a8;z-index:20;display:none;align-items:center;justify-content:center;padding:18px;backdrop-filter:blur(4px)}.overlay.show{display:flex}.dialog{width:min(100%,480px);background:#fff;border-radius:20px;padding:30px;text-align:center;box-shadow:var(--shadow)}.resultIcon{width:58px;height:58px;border-radius:50%;display:grid;place-items:center;margin:0 auto 15px;background:#e8f7ef;color:var(--green)}.resultIcon svg{width:28px;height:28px}.dialog h2{font-size:22px;margin:0 0 9px}.dialog p{font-size:12px;line-height:1.7;color:var(--muted)}.refNo{display:inline-block;background:#f1f5f8;border-radius:9px;padding:10px 15px;font-size:12px;font-weight:850;margin:8px 0 17px}.dialog .btn{width:100%;background:var(--red);color:#fff}.errorBox{display:none;margin:0 25px 15px;padding:12px 14px;border-radius:10px;background:#fff0f0;border:1px solid #f3c3c3;color:#941d24;font-size:11px;line-height:1.6}.errorBox.show{display:block}
@media(max-width:900px){.heroIn{grid-template-columns:1fr .7fr;gap:20px}.bookingLayout{grid-template-columns:1fr}.sideGrid{display:grid;grid-template-columns:repeat(2,1fr);gap:14px}.sideCard{margin:0}.sideCard:last-child{grid-column:1/-1}}
@media(max-width:650px){.wrap{width:min(100% - 28px,1160px)}.top{height:66px}.topright span{display:none}.brand strong{font-size:11px}.brand small{font-size:9px}.seal{width:40px;height:40px}.heroIn{display:block;padding-top:45px;padding-bottom:35px}.heroArt{display:none}h1{font-size:43px}.hero p{font-size:13px}.quickIn{grid-template-columns:1fr;gap:12px}.quickItem{justify-content:flex-start;width:250px;margin:auto}.main{padding:42px 0 50px}.formHead,.formBody{padding:18px}.formActions{padding:15px 18px;align-items:stretch;flex-direction:column}.submit{width:100%}.grid{grid-template-columns:1fr}.positionChoices{grid-template-columns:1fr}.field.full{grid-column:auto}.sideGrid{grid-template-columns:1fr}.sideCard:last-child{grid-column:auto}.footIn{align-items:flex-start;flex-direction:column}.requiredNote{display:none}}
@media(prefers-reduced-motion:reduce){*{scroll-behavior:auto!important;transition:none!important}}
</style>
</head>
<body>
<header class="top"><div class="wrap topin">
<a class="brand" href="#">
<span class="seal"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3 4.5 6v5.5c0 4.7 3.2 7.8 7.5 9.5 4.3-1.7 7.5-4.8 7.5-9.5V6L12 3Z"/><path d="M12 7v10M7 12h10"/></svg></span>
<span><strong>MDRRMO ESTANCIA</strong><small>Municipality of Estancia, Iloilo</small></span>
</a>
<div class="topright"><span>Official public service portal</span><a href="#booking">REQUEST AN AMBULANCE&nbsp; ↓</a></div>
</div></header>

<section class="hero"><div class="wrap heroIn">
<div>
<span class="eyebrow"><i class="dot"></i> Public ambulance booking</span>
<h1>Request a safe ride. We’ll review your request.</h1>
<p>Use this portal to submit a scheduled ambulance transportation request to the Municipal Disaster Risk Reduction and Management Office of Estancia, Iloilo. Please provide complete and accurate details so our team can assess your request.</p>
<div class="heroActions"><a class="btn btnWhite" href="#booking">Start a booking request <span>→</span></a><a class="btn btnGlass" href="#how">How it works</a></div>
<p class="heroHint">Requests are subject to MDRRMO review and confirmation.</p>
</div>
<div class="heroArt"><div class="artCard">
<div class="artTop"><span>Estancia emergency services</span><span class="artIcon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12h4l2-6 4 12 2-6h6"/></svg></span></div>
<svg class="ambulance" viewBox="0 0 440 210" fill="none"><path d="M36 58h238c10 0 18 8 18 18v91H36V58Z" fill="#fff"/><path d="M292 96h65l49 49v22H292V96Z" fill="#f6dfe0"/><path d="M307 108h43l34 34h-77v-34Z" fill="#a9d5e5"/><path d="M55 75h198v75H55V75Z" fill="#f8f9fa"/><path d="M141 91v43M120 112h43" stroke="#ad2028" stroke-width="13" stroke-linecap="round"/><path d="M22 167h403v18H22v-18Z" fill="#c52a32"/><circle cx="105" cy="177" r="26" fill="#27313b"/><circle cx="105" cy="177" r="11" fill="#d9e0e5"/><circle cx="353" cy="177" r="26" fill="#27313b"/><circle cx="353" cy="177" r="11" fill="#d9e0e5"/><path d="M54 48h73" stroke="#fff" stroke-width="8" stroke-linecap="round"/><path d="M300 84h33" stroke="#fff" stroke-width="8" stroke-linecap="round"/><path d="M24 146h13M408 153h17" stroke="#fff" stroke-width="7" stroke-linecap="round"/></svg>
<div class="artFoot"><div><strong>Public booking portal</strong><small>Scheduled transportation requests</small></div><strong>ESTANCIA • ILOILO</strong></div>
</div></div>
</div></section>

<div class="quick"><div class="wrap quickIn">
<div class="quickItem"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11Z"/><path d="m9 12 2 2 4-4"/></svg> Requests reviewed by MDRRMO personnel</div>
<div class="quickItem"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="17" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg> Provide your preferred date and time</div>
<div class="quickItem"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.4 19.4 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7l.5 2.8a2 2 0 0 1-.6 1.9L7.2 10a16 16 0 0 0 6 6l1.6-1.8a2 2 0 0 1 1.9-.6l2.8.5a2 2 0 0 1 1.5 2.8Z"/></svg> Keep your contact number available</div>
</div></div>

<main class="main" id="booking"><div class="wrap">
<div class="intro"><span class="kicker">Ambulance transportation request</span><h2>Complete the booking form</h2><p>Fields marked with an asterisk (*) are required. Please double-check the pickup location, destination, and requested schedule before submitting.</p></div>

<div class="bookingLayout">
<div class="formCard">
<div class="formHead"><div><strong>Booking information</strong><small>Submit your details for MDRRMO assessment</small></div><span class="requiredNote"><b class="req">*</b> Required fields</span></div>
<form id="bookingForm" novalidate>
<div class="formBody">
<section class="section">
<div class="sectionTitle"><span class="num">01</span><span><strong>Requester information</strong><small>How can our team contact you?</small></span></div>
<div class="grid">
<div class="field"><label for="requester_name">Full name <b class="req">*</b></label><input id="requester_name" name="requester_name" required maxlength="150" autocomplete="name" placeholder="Enter your full name"></div>
<div class="field"><label for="requester_phone">Contact number <b class="req">*</b></label><input id="requester_phone" name="requester_phone" type="tel" inputmode="tel" required maxlength="13" pattern="(09[0-9]{9}|\\+639[0-9]{9})" title="Use 09XXXXXXXXX or +639XXXXXXXXX" autocomplete="tel" placeholder="09XXXXXXXXX or +639XXXXXXXXX"><small class="hint">Use a number that MDRRMO can reach.</small></div>
<div class="field"><label for="requester_email">Email address <span style="font-weight:500;color:#87929c">(optional)</span></label><input id="requester_email" name="requester_email" type="email" maxlength="150" autocomplete="email" placeholder="name@example.com"></div>
<div class="field"><label for="passenger_count">Passenger count <b class="req">*</b></label><input id="passenger_count" name="passenger_count" type="number" min="1" max="100" value="1" required><small class="hint">Include the patient and accompanying persons.</small></div>
<div class="field full"><label>Patient position <b class="req">*</b></label>
<div class="positionChoices">
<label class="positionChoice"><input type="radio" name="patient_position" value="standard" checked required><span><strong>Standard position</strong><small>Patient can sit upright during transport.</small></span></label>
<label class="positionChoice"><input type="radio" name="patient_position" value="lying" required><span><strong>Lying position</strong><small>Patient must lie flat on a stretcher during transport.</small></span></label>
</div></div>
</div>
</section>

<section class="section">
<div class="sectionTitle"><span class="num">02</span><span><strong>Purpose of transportation</strong><small>Tell us why ambulance transport is being requested.</small></span></div>
<div class="grid">
<div class="field"><label for="purpose">Request purpose <b class="req">*</b></label><select id="purpose" name="purpose" required>
<option value="medical" selected>Medical assistance / appointment</option>
<option value="emergency">Emergency response</option>
<option value="hospital_transfer">Hospital transfer</option>
<option value="inter_facility_transfer">Inter-facility transfer</option>
<option value="other">Other</option>
</select></div>
<div class="field"><label for="purpose_details">Additional details <span style="font-weight:500;color:#87929c">(optional)</span></label><input id="purpose_details" name="purpose_details" maxlength="1000" placeholder="Briefly describe the reason for transport"></div>
</div>
</section>

<section class="section">
<div class="sectionTitle"><span class="num">03</span><span><strong>Pickup and destination</strong><small>Give clear locations and nearby landmarks where possible.</small></span></div>
<div class="grid">
<div class="field full"><label for="pickup_address">Pickup address / location <b class="req">*</b></label><textarea id="pickup_address" name="pickup_address" required maxlength="2000" placeholder="House number, street, sitio/purok, landmark, or exact pickup location"></textarea></div>
<div class="field"><label for="pickup_barangay">Pickup barangay</label><input id="pickup_barangay" name="pickup_barangay" maxlength="100" placeholder="Select or enter barangay"></div>
<div class="field full"><label for="destination_address">Destination address / facility <b class="req">*</b></label><textarea id="destination_address" name="destination_address" required maxlength="2000" placeholder="Name of hospital/clinic/facility and its complete address"></textarea></div>
<div class="field"><label for="destination_barangay">Destination barangay</label><input id="destination_barangay" name="destination_barangay" maxlength="100" placeholder="Barangay"></div>
</div>
</section>

<section class="section">
<div class="sectionTitle"><span class="num">04</span><span><strong>Requested schedule</strong><small>Choose the date and time you are requesting.</small></span></div>
<div class="grid">
<div class="field"><label for="requested_date">Requested date <b class="req">*</b></label><input id="requested_date" name="requested_date" type="date" required></div>
<div class="field"><label for="requested_time">Requested time <b class="req">*</b></label><input id="requested_time" name="requested_time" type="time" required></div>
</div>
</section>
</div>
<div id="errorBox" class="errorBox" role="alert" aria-live="polite"></div>
<div class="formActions"><div class="privacy">By submitting, you confirm that the information provided is accurate and may be used by MDRRMO to assess and coordinate this request.</div><button class="btn submit" id="submitBtn" type="submit"><span>Submit booking request</span><span>→</span></button></div>
</form>
</div>

<aside>
<div class="sideGrid">
<div class="sideCard"><div class="sideIcon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 8v4l3 2"/><circle cx="12" cy="12" r="9"/></svg></div><h3>What happens next?</h3><ul><li>Your request is submitted to the MDRRMO booking queue.</li><li>Staff will review the details and contact you using the number provided.</li><li>Wait for confirmation before assuming transport is approved.</li></ul></div>
<div class="sideCard warning"><div class="sideIcon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 9v4m0 4h.01"/><path d="M10.3 3.9 1.8 18.5A1.7 1.7 0 0 0 3.3 21h17.4a1.7 1.7 0 0 0 1.5-2.5L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg></div><h3>For urgent emergencies</h3><p>Do not rely on this online form for immediate emergency response. Contact local emergency services or MDRRMO directly for urgent assistance.</p></div>
<div class="sideCard"><div class="sideIcon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.4 19.4 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7l.5 2.8a2 2 0 0 1-.6 1.9L7.2 10a16 16 0 0 0 6 6l1.6-1.8a2 2 0 0 1 1.9-.6l2.8.5a2 2 0 0 1 1.5 2.8Z"/></svg></div><h3>Before you submit</h3><p>Make sure your phone is active, passenger count is correct, and both locations are complete. MDRRMO may contact you for clarification.</p></div>
</div>
</aside>
</div>
<div class="noticeBar"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 11v5m0-8h.01"/></svg><div><strong>Important: submission is not confirmation.</strong><p>Submitting this form creates a booking request for review. It does not automatically approve the trip, reserve an ambulance, assign a vehicle, or dispatch a response team. Availability and approval must be confirmed by MDRRMO.</p></div></div>
</div></main>

<footer><div class="wrap footIn"><span><strong>MDRRMO Estancia, Iloilo</strong><br>Municipal Disaster Risk Reduction and Management Office</span><span>Official ambulance transportation request portal</span></div></footer>

<div class="overlay" id="successOverlay" role="dialog" aria-modal="true" aria-labelledby="successTitle"><div class="dialog">
<div class="resultIcon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6"/></svg></div>
<h2 id="successTitle">Request submitted</h2><p>Your ambulance booking request has been sent to MDRRMO Estancia for review. Please keep your phone available for a possible follow-up.</p>
<div class="refNo" id="referenceNumber" hidden></div>
<p>Remember: this is a request only. Wait for direct confirmation from MDRRMO.</p>
<button class="btn" type="button" onclick="closeSuccess()">Close</button>
</div></div>

<script>
const ENDPOINT = <?= json_encode($bookingEndpoint, JSON_UNESCAPED_SLASHES) ?>;
const form = document.getElementById('bookingForm');
const submitBtn = document.getElementById('submitBtn');
const errorBox = document.getElementById('errorBox');
const successOverlay = document.getElementById('successOverlay');
const dateInput = document.getElementById('requested_date');
const localToday = new Date();
const localDate = new Date(localToday.getTime() - localToday.getTimezoneOffset() * 60000).toISOString().slice(0,10);
dateInput.min = localDate;

function showError(message) {
    errorBox.textContent = message;
    errorBox.classList.add('show');
    errorBox.scrollIntoView({behavior:'smooth',block:'center'});
}
function closeSuccess() {
    successOverlay.classList.remove('show');
    form.reset();
    document.getElementById('passenger_count').value = '1';
    dateInput.min = localDate;
    document.getElementById('referenceNumber').hidden = true;
    document.getElementById('referenceNumber').textContent = '';
    document.getElementById('booking').scrollIntoView({behavior:'smooth'});
}
function flattenErrors(errors) {
    if (!errors || typeof errors !== 'object') return '';
    return Object.entries(errors).map(([field, messages]) => {
        const label = field.replaceAll('_',' ');
        return label + ': ' + (Array.isArray(messages) ? messages.join(', ') : String(messages));
    }).join(' ');
}
form.addEventListener('submit', async (event) => {
    event.preventDefault();
    errorBox.classList.remove('show');
    errorBox.textContent = '';
    if (!form.reportValidity()) return;
    if (dateInput.value < localDate) {
        showError('Please select today or a future date.');
        dateInput.focus();
        return;
    }
    const data = Object.fromEntries(new FormData(form).entries());
    data.passenger_count = Number(data.passenger_count);
    data.requester_phone = data.requester_phone.trim().replace(/^\\+63/, '0');
    if (!/^09[0-9]{9}$/.test(data.requester_phone)) {
        showError('Enter a valid Philippine mobile number: 09XXXXXXXXX or +639XXXXXXXXX.');
        document.getElementById('requester_phone').focus();
        return;
    }
    if (data.requester_email && !/^[^\\s@]+@[^\\s@]+\\.[^\\s@]+$/.test(data.requester_email)) {
        showError('Please enter a valid email address.');
        document.getElementById('requester_email').focus();
        return;
    }
    const requiredFields = ['requester_name','requester_phone','purpose','passenger_count','patient_position','pickup_address','destination_address','requested_date','requested_time'];
    for (const key of requiredFields) {
        if (data[key] === '' || data[key] === null || data[key] === undefined) {
            showError('Please complete all required fields before submitting.');
            return;
        }
    }
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span>Submitting request…</span>';
    try {
        const response = await fetch(ENDPOINT, {
            method: 'POST',
            headers: {'Accept':'application/json','Content-Type':'application/json','X-Requested-With':'XMLHttpRequest'},
            credentials: 'include',
            body: JSON.stringify(data)
        });
        const result = await response.json().catch(() => ({}));
        if (!response.ok) {
            const validation = flattenErrors(result.errors);
            if (response.status === 422) throw new Error(validation || result.message || 'Please review the information you entered.');
            if (response.status === 419) throw new Error('Your session or security token has expired. Please reload the page and try again. If this continues, the portal must be connected to Laravel CSRF protection.');
            if (response.status === 401 || response.status === 403) throw new Error('The server did not allow this submission. Please contact the MDRRMO system administrator to verify public booking access.');
            throw new Error(result.message || 'Unable to submit your request right now. Please try again later.');
        }
        const reference = result.request_number || result.booking?.request_number || result.data?.request_number || result.reference_number || '';
        const refEl = document.getElementById('referenceNumber');
        if (reference) { refEl.textContent = 'Request reference: ' + reference; refEl.hidden = false; }
        successOverlay.classList.add('show');
    } catch (error) {
        showError(error.message || 'A network error occurred. Please check your connection and try again.');
    } finally {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<span>Submit booking request</span><span>→</span>';
    }
});
successOverlay.addEventListener('click', (event) => { if (event.target === successOverlay) closeSuccess(); });
document.addEventListener('keydown', (event) => { if (event.key === 'Escape' && successOverlay.classList.contains('show')) closeSuccess(); });
</script>
</body>
</html>
