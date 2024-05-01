<?php

# Database Connection (setup in .env or here for fallback)
$dsn = $_ENV["DB_DSN"] ?? "mysql:host=127.0.0.1;dbname=DB_NAME_HERE";
$user = $_ENV["DB_USER"] ?? "root";
$pass = $_ENV["DB_PASS"] ?? "";

# Create temp folder for storage
$storageFolder = $basePath . "temp";
if (!is_dir($storageFolder)) {
    mkdir($storageFolder);
}

# Connection
$storage = new Nette\Caching\Storages\FileStorage($storageFolder);
$connection = new Nette\Database\Connection($dsn, $user, $pass);
$structure = new Nette\Database\Structure($connection, $storage);
$conventions = new Nette\Database\Conventions\DiscoveredConventions($structure);
$explorer = new Nette\Database\Explorer($connection, $structure, $conventions, $storage);
