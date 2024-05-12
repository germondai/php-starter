<?php

use Api\ApiController;

require_once "../src/includes/config.php";

$action = str_replace($linkPath, '', $_SERVER['REQUEST_URI']);

header('Content-Type: application/json');

$api = new ApiController();
$api->handleRequest($action, $_POST);