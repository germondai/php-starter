<?php

declare(strict_types=1);

namespace Utils;

use Nette\Caching\Storages\FileStorage;
use Nette\Database\Connection;
use Nette\Database\Structure;
use Nette\Database\Conventions\DiscoveredConventions;
use Nette\Database\Explorer;

class Database
{
    private static Explorer $explorer;

    public static function connect(string $dsn = null, string $user = null, string $pass = null): void
    {
        # Create temp folder for storage
        $storagePath = Helper::getBasePath() . "temp";
        if (!is_dir($storagePath)) {
            mkdir($storagePath);
        }

        # Connection
        $storage = new FileStorage($storagePath);
        $connection = new Connection(
            $dsn ?? $_ENV['DB_DSN'] ?? 'mysql:host=127.0.0.1;dbname=DB_NAME_HERE',
            $user ?? $_ENV['DB_USER'] ?? 'root',
            $pass ?? $_ENV['DB_PASS'] ?? ''
        );
        $structure = new Structure($connection, $storage);
        $conventions = new DiscoveredConventions($structure);
        self::$explorer = new Explorer($connection, $structure, $conventions, $storage);
    }

    public static function explore(): Explorer
    {
        if (empty(self::$explorer))
            self::connect();

        return self::$explorer;
    }
}