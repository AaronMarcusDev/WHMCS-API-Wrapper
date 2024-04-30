<?php

$apiUrl = "https://demo.whmcs.com/";
$apiUsername = 'username';
$apiPassword = 'password';
$apiMethod = 'CancelOrder';
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

function cancelOrder($apiUrl, $apiUsername, $apiPassword, $apiMethod, $orderID) {
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

$responseData = cancelOrder($apiUrl, $apiUsername, $apiPassword, $apiMethod, $orderID);

// Voorbeeld
if ($responseData['result'] == 'success') {
    echo 'Order ' . $data['orderid'] . ' has been canceled.';
} else {
    echo 'Failed to cancel order: ' . $responseData['message'];
}
