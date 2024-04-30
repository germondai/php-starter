<?php

$dsn = $_ENV["DB_DSN"] ?? "mysql:host=127.0.0.1;dbname=DB_NAME_HERE";
$user = $_ENV["DB_USER"] ?? "root";
$pass = $_ENV["DB_PASS"] ?? "";

$storage = new Nette\Caching\Storages\FileStorage($basePath . "temp");
$connection = new Nette\Database\Connection($dsn, $user, $pass);
$structure = new Nette\Database\Structure($connection, $storage);
$conventions = new Nette\Database\Conventions\DiscoveredConventions($structure);
$explorer = new Nette\Database\Explorer($connection, $structure, $conventions, $storage);
