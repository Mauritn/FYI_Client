<?php

include 'vendor/autoload.php';

use GuzzleHttp\Client;

$id = $_GET['id'];

$client = new Client([
    'base_uri' => 'http://127.0.0.1:8000',
    'timeout' => 5
]);

$response =  $client->request('DELETE', '/api/drink', [
    'json' => [
        'id' => $id,
    ]
]);

$body = $response->getBody();
header('location:index.php');
