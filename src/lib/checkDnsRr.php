<?php
function dnsExists($ip): bool {
    global $error; $error = false;

    if (strlen($ip) == 0) {
        $error = true;
        return false;
    }
    return checkdnsrr($ip, 'MX');
}

// vb
// if (dnsExists('asjkdhaksjdh.com')) {
//     echo "The adress exists!\n";
// } else {
//     echo "The adress does not exist!\n";
// }