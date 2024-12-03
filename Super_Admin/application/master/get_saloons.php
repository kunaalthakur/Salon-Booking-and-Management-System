<?php
$apiKey = "24696925e793f8e69ce0b632c9393d9758d15a3a";
$email = "haidaralichaudhary22@gnu.ac.in";
$apiUrl = "https://api.hunter.io/v2/email-verifier?email=" . urlencode($email) . "&api_key=" . $apiKey;

// Call the API to check the email
$response = file_get_contents($apiUrl);
$data = json_decode($response, true);

if ($data['data']['result'] == 'deliverable') {
    echo "Email exists!";
} else {
    echo "Email does not exist.";
}
