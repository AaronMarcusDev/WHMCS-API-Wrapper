<?php

$apiUrl = 'https://your-whmcs-url.com/includes/api.php';
$apiUsername = 'username';
$apiPassword = 'password';
$apiMethod = 'DeleteOrder';
$registrar = 'enom'; // voorbeeld
$orderID = 123; // voorbeeld

// $data = array(
//     'action' => $apiMethod,

//     'username' => $apiUsername,
//     'password' => $apiPassword,

//     'orderid' => $orderID,
//     'responsetype' => 'json',
// );

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $apiUrl);
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $response = curl_exec($ch);
// curl_close($ch);

// $responseData = json_decode($response, true);

function deleteOrder($apiUrl, $apiUsername, $apiPassword, $apiMethod, $orderID) {
    $data = array(
        'action' => $apiMethod,
        'username' => $apiUsername,
        'password' => $apiPassword,
        'orderid' => $orderID,
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
$apiUrl = 'https://your-whmcs-url.com/includes/api.php';
$apiUsername = 'username';
$apiPassword = 'password';
$apiMethod = 'DeleteOrder';
$orderID = 123; // Example

$responseData = deleteOrder($apiUrl, $apiUsername, $apiPassword, $apiMethod, $orderID);

// Voorbeeld
if ($responseData['result'] == 'success') {
    echo 'Order ' . $data['orderid'] . ' has been deleted.';
} else {
    echo 'Failed to delete order: ' . $responseData['message'];
}
