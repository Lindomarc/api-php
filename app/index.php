<?php
define('API_BASE', 'http://localhost:8080/?option=');

$results = apiRequest('status');

function apiRequest($option)
{
    $client = curl_init(API_BASE . $option);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($client);
    return json_decode($result,true);
}

echo '<p>Application</p><hr><pre>';
print_r($results);