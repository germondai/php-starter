<?php
namespace Utils;

class Helper
{
    private static string $basePath;
    private static string $linkPath;

    public static function setPaths(string $basePath, string $linkPath): void
    {
        self::$basePath = $basePath;
        self::$linkPath = $linkPath;
    }

    public static function isDev(): bool
    {
        return ($_SERVER['SERVER_ADDR'] == '127.0.0.1' || $_SERVER['SERVER_ADDR'] == '::1');
    }

    public static function formatLink(string $link): string
    {
        return str_starts_with($link, 'https://') ? $link : self::$linkPath . $link;
    }
}