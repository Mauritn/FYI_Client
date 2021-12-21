<?php

include 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://127.0.0.1:8080',
    'timeout' => 5
]);

$response =  $client->request('POST', '/api/makan', [
    'json' => [
        'nama' => $_POST['nama'],
        'ket' => $_POST['ket']
    ]
]);

$body = $response->getBody();
header('location:makanan.php');
