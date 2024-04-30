<?php
// include 'dnsCheck.php';
include 'checkDnsRr.php';

$ip = "a.com";

if (dnsExists($ip)) {
    echo "'{$ip}' Exists.";
    // check with WHMCS
} else if ($error == true) {
    echo "An error occured while checking the IP address:\nEmpty search.";
} else {
    echo "'{$ip}' does not exist.";
    // continue with WHMCS
}