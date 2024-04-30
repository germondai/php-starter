
<?php

# enable warnings
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

# disable warnings
// error_reporting(E_ERROR | E_PARSE);

# autoload
require_once "vendor/autoload.php";

# dump
if (!function_exists("dump")) {
    function dump(mixed $var): mixed
    {
        array_map([Tracy\Debugger::class, "dump"], func_get_args());
        return $var;
    }
}

# session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

# paths
$basePath = __DIR__ . "/../";
$linkPath = dirname($_SERVER["PHP_SELF"]) . "/";

# .env
$dotenv = Dotenv\Dotenv::createImmutable($basePath);
$dotenv->load();

# database
require_once "db.php";

# timezone
date_default_timezone_set("Europe/Prague");
