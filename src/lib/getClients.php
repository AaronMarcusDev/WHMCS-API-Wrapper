<?php

$whmcsUrl = "https://www.yourdomain.com/path/to/whmcs/";

$apiUsername = 'username';
$apiPassword = 'password';

function getClients($whmcsUrl, $apiUsername, $apiPassword) {
    // Set post values
    $postfields = array(
        'username' => $apiUsername,
        'password' => $apiPassword,
        'action' => 'GetClients',
        'responsetype' => 'json',
    );

    // Call the API
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $whmcsUrl . 'includes/api.php');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postfields));
    $response = curl_exec($ch);
    if (curl_error($ch)) {
        die('Unable to connect: ' . curl_errno($ch) . ' - ' . curl_error($ch));
    }
    curl_close($ch);

    return json_decode($response, true);
}

// Voorbeeld gebruik:
// $whmcsUrl = "https://www.yourdomain.com/path/to/whmcs/";
// $apiUsername = 'username';
// $apiPassword = 'password';

// $responseData = getClients($whmcsUrl, $apiUsername, $apiPassword);
// echo $responseData;