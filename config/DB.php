<?php
/**
 * Класс конфигурации базы данных
 */
namespace Config;


class DB
{

    const USER  = "user";
    const PASS  = "user";
    const HOST  = "192.168.200.79";
    const DB    = "Kretova";
    // для sqlite
    const PATH_TO_SQLITE_FILE = 'database/all-books.db';

    public static function connToDB() {
        $user   = self::USER;
        $pass   = self::PASS;
        $host   = self::HOST;
        $db     = self::DB;
        $path   = self::PATH_TO_SQLITE_FILE;
        $conn   = new \PDO("mysql:dbname=$db;host=$host", $user, $pass);
        //$conn   = new \PDO("sqlite:" . $path);
        $conn->exec("SET NAMES 'utf8'");
        return $conn;
    }

}