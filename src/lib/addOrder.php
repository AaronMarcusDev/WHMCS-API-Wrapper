<?php
$apiUrl = 'https://your-whmcs-url.com/includes/api.php';
$apiUsername = 'username';
$apiPassword = 'password';
$apiMethod = 'addOrder';
$registrar = 'enom'; // voorbeeld
$orderID = 123; // voorbeeld

$data = array(
    // // Alles hieronder is een voorbeeldd
    // 'action' => 'AddOrder',
    // // See https://developers.whmcs.com/api/authentication
    // 'username' => 'IDENTIFIER_OR_ADMIN_USERNAME',
    // 'password' => 'SECRET_OR_HASHED_PASSWORD',
    // 'clientid' => '1',
    // 'pid' => array(1, 1),
    // 'domain' => array('domain1.com', 'dómáin2.com'),
    // 'idnlanguage' => array('', 'fre'),
    // 'billingcycle' => array('monthly', 'semiannually'),
    // 'addons' => array('1,3,9', ''),
    // 'customfields' => array(base64_encode(serialize(array("1" => "Google"))), base64_encode(serialize(array("1" => "Google")))),
    // 'configoptions' => array(base64_encode(serialize(array("1" => 999))), base64_encode(serialize(array("1" => 999)))),
    // 'domaintype' => array('register', 'register'),
    // 'regperiod' => array(1, 2),
    // 'dnsmanagement' => array(0 => false, 1 => true),
    // 'nameserver1' => 'ns1.demo.com',
    // 'nameserver2' => 'ns2.demo.com',
    // 'paymentmethod' => $paymentMethod,
    // 'servicerenewals' => array(3, 10),
    // 'responsetype' => 'json',
);


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.example.com/includes/api.php');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt(
    $ch,
    CURLOPT_POSTFIELDS,
    http_build_query($data)
);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);