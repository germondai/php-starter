<?php

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $data = [
        "message" => "GET request received",
        "data" => $_GET
    ];
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        "message" => "POST request received",
        "data" => $_POST
    ];
} else {
    http_response_code(405);
    $data = ["error" => "Method Not Allowed"];
}

$data ??= 'error';

echo json_encode($data);