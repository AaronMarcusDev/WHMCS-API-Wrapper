<?php require './dnsCheck.php';

$whoIsDomain = 'example.com';

function domainWhoIs($apiUrl, $apiUsername, $apiPassword, $apiMethod, $whoIsDomain) {
    $data = array(
        'action' => $apiMethod,
        'domain' => $whoIsDomain,
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

// Voorbeeld gebruik:
// $apiUrl = 'https://www.example.com/includes/api.php';
// $apiUsername = 'FDEOmwCvqdWls8gdh8NONgIp4yn3Qgee';
// $apiPassword = 'mYgWdAgSRNX44If4GXUmPEoEJUBDGlXO';
// $apiMethod = 'DomainWhois';
// $whoIsDomain = 'example.com'; // Example

$responseData = domainWhoIs($apiUrl, $apiUsername, $apiPassword, $apiMethod, $whoIsDomain);