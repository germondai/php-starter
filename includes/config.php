<?php

# imports
use Utils\Helper;

# paths
$basePath = __DIR__ . "/../";
$linkPath = dirname($_SERVER["PHP_SELF"]) . "/";

# autoload
try {
    @require_once $basePath . "vendor/autoload.php";
} catch (\Throwable $th) {
    trigger_error('Install Composer Dependencies!');
}

# setup helper
Helper::setPaths($basePath, $linkPath);

# warnings
if (Helper::isDev()) {
    # enable
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    # disable
    error_reporting(0);
}

# dump
if (!Helper::isDev()) {
    function dump(mixed $var): void
    {
    }
}

# session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

# .env
try {
    $dotenv = Dotenv\Dotenv::createImmutable($basePath);
    $dotenv->load();
} catch (\Throwable $th) {
    trigger_error('No .env detected!');
}

# database
try {
    require_once "db.php";
} catch (\Throwable $th) {
    trigger_error('Database Connection Failed!');
}

# timezone
date_default_timezone_set("Europe/Prague");
