
<?php

# dev mode
if (!function_exists("isDev")) {
    function isDev(): bool
    {
        return ($_SERVER['SERVER_ADDR'] == '127.0.0.1' || $_SERVER['SERVER_ADDR'] == '::1');
    }
}

# warnings
if (isDev()) {
    # enable
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    # disable
    error_reporting(0);
}

# dump
if (!isDev()) {
    function dump(mixed $var): void
    {
    }
}

# autoload
try {
    require_once "vendor/autoload.php";
} catch (\Throwable $th) {
    trigger_error('Install Composer Dependencies!');
}

# session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

# paths
$basePath = __DIR__ . "/../";
$linkPath = dirname($_SERVER["PHP_SELF"]) . "/";

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
