<?php

$whoIsDomain = 'example.com';

function domainWhoIs($apiUrl, $apiUsername, $apiPassword, $whoIsDomain)
{
    $data = array(
        'action' => 'DomainWhois',
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
$apiUrl = 'https://www.example.com/includes/api.php';
$apiUsername = $API_IDENTIFIER;
$apiPassword = $API_SECRET;
$whoIsDomain = 'example.com'; // Example

$responseData = domainWhoIs($apiUrl, $apiUsername, $apiPassword, $whoIsDomain);
if ($responseData) {
    echo "Succes\n";
} else {
    echo "failed\n";
}
echo $responseData;