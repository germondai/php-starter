<?php
namespace Utils;

use Nette\Caching\Storages\FileStorage;
use Nette\Database\Connection;
use Nette\Database\Structure;
use Nette\Database\Conventions\DiscoveredConventions;
use Nette\Database\Explorer;

class Database
{
    private static Explorer $explorer;

    public static function connect(string $dsn, string $user, string $pass): void
    {
        # Create temp folder for storage
        $storagePath = Helper::getBasePath() . "temp";
        if (!is_dir($storagePath)) {
            mkdir($storagePath);
        }

        # Connection
        $storage = new FileStorage($storagePath);
        $connection = new Connection($dsn, $user, $pass);
        $structure = new Structure($connection, $storage);
        $conventions = new DiscoveredConventions($structure);
        self::$explorer = new Explorer($connection, $structure, $conventions, $storage);
    }

    public static function explore(): Explorer
    {
        return self::$explorer;
    }
}