<?php
ini_set('display_errors', '0');
ini_set('log_errors', '1');

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);

    echo json_encode([
        'success' => false,
        'message' => 'Method not allowed.'
    ]);

    exit;
}

// Load API configuration
$config = require __DIR__ . '/config.php';

// Read submitted JSON
$input = json_decode(
    file_get_contents('php://input'),
    true
);

if (!is_array($input)) {
    http_response_code(400);

    echo json_encode([
        'success' => false,
        'message' => 'Invalid booking information.'
    ]);

    exit;
}

// Allow only approved public booking fields
$allowedFields = [
    'requester_name',
    'requester_phone',
    'requester_email',
    'purpose',
    'purpose_details',
    'passenger_count',
    'patient_position',
    'pickup_address',
    'pickup_barangay',
    'destination_address',
    'destination_barangay',
    'requested_date',
    'requested_time'
];

$bookingData = [];

foreach ($allowedFields as $field) {
    if (array_key_exists($field, $input)) {
        $bookingData[$field] = $input[$field];
    }
}

// Check API configuration
if (
    empty($config['api_url']) ||
    empty($config['api_key'])
) {
    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => 'Booking service is not configured.'
    ]);

    exit;
}

// Check cURL availability
if (!function_exists('curl_init')) {
    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => 'PHP cURL extension is not enabled.'
    ]);

    exit;
}

// Connect to Laravel API
$curl = curl_init($config['api_url']);

curl_setopt_array($curl, [

    CURLOPT_POST => true,

    CURLOPT_RETURNTRANSFER => true,

    CURLOPT_HTTPHEADER => [
        'Accept: application/json',
        'Content-Type: application/json',
        'X-Booking-Key: ' . $config['api_key']
    ],

    CURLOPT_POSTFIELDS => json_encode($bookingData),

    CURLOPT_CONNECTTIMEOUT => 5,

    CURLOPT_TIMEOUT => 20,

]);

$response = curl_exec($curl);

$curlError = curl_error($curl);

$statusCode = curl_getinfo(
    $curl,
    CURLINFO_HTTP_CODE
);


// Handle connection failure
if ($response === false) {

    http_response_code(502);

    echo json_encode([
        'success' => false,
        'message' => 'Unable to connect to the main booking server.'
    ]);

    exit;
}

// Forward Laravel response
http_response_code($statusCode);

echo $response;