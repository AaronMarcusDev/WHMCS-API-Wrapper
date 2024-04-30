<?php

$apiUrl = 'https://your-whmcs-url.com/includes/api.php';
$apiUsername = 'username';
$apiPassword = 'password';
$apiMethod = 'DomainWhois';

$domain = 'example.com'; // voorbeeld

// $data = array(
//     'action' => $apiMethod,
//     'domain' => $domain,
//     'username' => $apiUsername,
//     'password' => $apiPassword,
//     'responsetype' => 'json',
// );

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $apiUrl);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
// $response = curl_exec($ch);

function dnsCheck($apiUrl, $apiUsername, $apiPassword, $apiMethod, $domain) {
    $data = array(
        'action' => $apiMethod,
        'domain' => $domain,
        'username' => $apiUsername,
        'password' => $apiPassword,
        'responsetype' => 'json',
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// Example usage:
$apiUrl = 'https://your-whmcs-url.com/includes/api.php';
$apiUsername = 'username';
$apiPassword = 'password';
$apiMethod = 'DNSCheck';
$domain = 'example.com'; // Example

$responseData = dnsCheck($apiUrl, $apiUsername, $apiPassword, $apiMethod, $domain);

// Voorbeeld (oud)
// if (curl_errno($ch)) {
//     echo 'cURL error: ' . curl_error($ch);
// } else {
//     $responseData = json_decode($response, true);
//     if ($responseData['result'] == 'success') {
//         // Domain WHOIS lookup successful
//         if ($responseData['status'] == 'available') {
//             echo 'Domain ' . $domain . ' is available for registration.';
//         } else {
//             echo 'Domain ' . $domain . ' is already registered.';
//         }
//     } else {
//         // Domain WHOIS lookup failed
//         echo 'Failed to check domain availability: ' . $responseData['message'];
//     }
// }

// Close cURL session
curl_close($ch);
