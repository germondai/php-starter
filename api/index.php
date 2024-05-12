<?php

require_once "../src/includes/config.php";

$actionPath = str_replace($linkPath, '', $_SERVER['REQUEST_URI']);
$action = str_replace('/', '->', $actionPath);

// Define your API functions
function contact()
{
    $response = array(
        'message' => 'This is the contact function'
    );
    return $response;
}

// Main entry point
function main(string $action)
{
    if (function_exists($action)) {
        $response = $action();
    } else {
        $response = ['error' => 'Invalid endpoint'];
        http_response_code(404);
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

main($action);
