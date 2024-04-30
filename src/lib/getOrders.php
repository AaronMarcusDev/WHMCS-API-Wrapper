<?php

$apiUrl = 'https://whmcs-url.com/includes/api.php';
$apiUsername = 'username';
$apiPassword = 'password';
$apiMethod = 'GetOrders';
$registrar = 'enom'; // voorbeeld
$ID = 123; // voorbeeld

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, 'https://www.example.com/includes/api.php');
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS,
//     http_build_query(
//         array(
//             'action' => $apiMethod,
//             'username' => $apiUsername,
//             'password' => $apiPassword,
//             'id' => $ID,
//             'responsetype' => 'json',
//         )
//     )
// );
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// $response = curl_exec($ch);
// curl_close($ch);

function getOrders($apiUrl, $apiUsername, $apiPassword, $apiMethod, $ID) {
    $data = array(
        'action' => $apiMethod,
        'username' => $apiUsername,
        'password' => $apiPassword,
        'id' => $ID,
        'responsetype' => 'json',
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// Example usage:
$apiUrl = 'https://www.example.com/includes/api.php';
$apiUsername = 'username';
$apiPassword = 'password';
$apiMethod = 'GetOrders';
$ID = 123; // Example

$responseData = getOrders($apiUrl, $apiUsername, $apiPassword, $apiMethod, $ID);

// $responseData = json_decode($response, true);

if ($responseData['result'] == 'success') {
    // ... (handle response)
} else {
    echo 'Failed to obtain orders: ' . $responseData['message'];
    // Display to customer / user
}
