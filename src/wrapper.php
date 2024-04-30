<?php

// Orders
require './lib/addOrder.php';
require './lib/acceptOrder.php'; // todo: add function for acceptOrder
require './lib/cancelOrder.php';
require './lib/deleteOrder.php';
require './lib/getOrders.php';

// Clients
require './lib/getClients.php';

// WhoIs / Domein check
require './lib/dnsCheck.php';
require './lib/domainWhoIs.php';

function ApiTest($apiUrl) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
    } else {
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($statusCode == 200) {
            echo 'API is working!';
        } else {
            echo 'API returned status code: ' . $statusCode;
        }
    }
    curl_close($ch);
}

ApiTest('https://example.com/api/endpoint');

// Elk bestand heeft een functie die geroepen kan worden; zelfde naam als de bestanden
// ze returnen allemaal een JSON format die je kan inspecteren