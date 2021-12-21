<?php

include 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://127.0.0.1:8000',
    'timeout' => 5
]);

$response =  $client->request('POST', '/api/drink', [
    'json' => [
        'nama' => $_POST['nama'],
        'ket' => $_POST['ket']
    ]
]);

$body = $response->getBody();
header('location:index.php');
