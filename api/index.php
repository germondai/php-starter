<?php

# imports
use Api\ApiController;

# require config
require_once "../src/includes/config.php";

# get api action
$action = str_replace(substr($linkPath, 0, -4), '', $_SERVER['REDIRECT_URL']);

# set json and cors headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE');
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Requested-With");
header('Content-Type: application/json; charset=utf-8');

# preflight error fix
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    die();
}

# define request data (post / get)
$requestData = json_decode(file_get_contents('php://input') ?? '', true) ?? [];
$data = array_merge(
    $requestData,
    $_POST,
    $_GET,
);

# handle api request
$api = new ApiController();
$api->handleRequest(
    $action,
    $data
);
