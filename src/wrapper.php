<?php

// Tools
require 'lib/testApi.php';

// Orders
//require 'lib/addOrder.php'; // todo: add function for acceptOrder
require 'lib/acceptOrder.php';
require 'lib/cancelOrder.php';
require 'lib/deleteOrder.php';
require 'lib/getOrders.php';

// Clients
require 'lib/getClients.php';

// WhoIs / Domein check
require 'lib/domainWhoIs.php';
require 'lib/dnsCheck.php';

// testApi('https://catfact.ninja/fact');
// echo "The JSON response:\n";
// echo json_encode(json_decode(testApiWithResponse('https://catfact.ninja/fact')), JSON_PRETTY_PRINT);


//! Elk bestand heeft een functie die geroepen kan worden; zelfde naam als de bestanden
//! ze returnen allemaal een JSON format die je kan inspecteren