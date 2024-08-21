<?php

$apiUrl = 'https://your-whmcs-url.com/includes/api.php';
$apiUsername = 'username';
$apiPassword = 'password';
$registrar = 'enom'; // voorbeeld
$orderID = 123; // voorbeeld

// $data = array(
//     'action' => $apiMethod,
//     'username' => $apiUsername,
//     'password' => $apiPassword,
//     'orderid' => $orderID,
//     'registrar' => $registrar,
//     // 'autosetup' => true,
//     // 'sendemail' => true,
//     'responsetype' => 'json',
// );

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $apiUrl);
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $response = curl_exec($ch);
// curl_close($ch);

function acceptOrder($apiUrl, $apiUsername, $apiPassword, $registrar, $orderID) {
    $data = array(
        'action' => 'AcceptOrder',
        'username' => $apiUsername,
        'password' => $apiPassword,
        'orderid' => $orderID,
        'registrar' => $registrar,
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

// $responseData = acceptOrder($apiUrl, $apiUsername, $apiPassword, $apiMethod, $registrar, $orderID);

// Voorbeeld
// if ($responseData['result'] == 'success') {
//     echo 'Order ' . $data['orderid'] . ' has been canceled.';
// } else {
//     echo 'Failed to accept order: ' . $responseData['message'];
// }