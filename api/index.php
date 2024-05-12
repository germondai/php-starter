<?php

# imports
use Api\ApiController;

# require config
require_once "../src/includes/config.php";

# get api action
$action = str_replace($linkPath, '', $_SERVER['REQUEST_URI']);

# set json header
header('Content-Type: application/json');

# define request data (post / get)
$requestData = $_SERVER['REQUEST_METHOD'] === 'POST' ? $_POST : $_GET;

# handle api request
$api = new ApiController();
$api->handleRequest(
    $action,
    $requestData
);
