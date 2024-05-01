<?php

function testApi($apiUrl)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    if (curl_errno($ch)) {
        echo '[APITEST] Curl error: ' . curl_error($ch) . "\n";
    } else {
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($statusCode == 200) {
            echo "[APITEST] API is working!\n";
        } else {
            echo '[APITEST] API returned status code: ' . $statusCode . "\n";
        }
    }
    curl_close($ch);
}

function testApiWithResponse($apiUrl)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    
    if (curl_errno($ch)) {
        $errorMessage = '[APITEST] Curl error: ' . curl_error($ch) . "\n";
        curl_close($ch);
        return $errorMessage;
    }
    
    $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($statusCode == 200) {
        echo "[APITEST] API is working!\n";
    } else {
        echo '[APITEST] API returned status code: ' . $statusCode . "\n";
    }

    $response = curl_exec($ch);

    curl_close($ch);
    return $response;
}