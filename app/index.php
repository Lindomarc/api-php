<?php
define('API_BASE', 'http://localhost:8080/?option=');
echo '<p>Application</p><hr><pre>';

for ($i = 0; $i<10;$i++){
    $results = apiRequest('random');
    if($results['status'] === 'error'){
        die('Api Error');
    }
    echo "Random value: {$results['data']}</br>";
}

echo 'Finish';

function apiRequest($option)
{
    $client = curl_init(API_BASE . $option);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($client);
    return json_decode($result,true);
}

