<?php

declare(strict_types=1);

namespace Utils;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class Doctrine
{
    private static Configuration $config;
    private static Connection $connection;

    public static function connect(): void
    {
        # Config for EntityManager
        self::$config = ORMSetup::createAttributeMetadataConfiguration(
            paths: [Helper::getBasePath() . "api/Entity"],
            isDevMode: true,
        );

        # Database Connection for EntityManager
        self::$connection = DriverManager::getConnection([
            'host' => $_ENV['HOST'] ?? 'localhost',
            'user' => $_ENV['USER'] ?? 'root',
            'password' => $_ENV['PASS'] ?? '',
            'dbname' => $_ENV['NAME'],
            'driver' => $_ENV['DRIV'] ?? 'pdo_mysql',
        ], self::$config);
    }

    public static function getEntityManager(): EntityManager
    {
        if (empty(self::$connection) && empty($config))
            self::connect();

        return new EntityManager(self::$connection, self::$config);
    }
}
