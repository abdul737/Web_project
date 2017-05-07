<?php

namespace databaseManager;

class DBConfig
{
    private static $DB_USERNAME = "root";
    private static $DB_PASSWORD = "toor";
    private static $DB_NAME = "lcm";
    private static $DB_HOST = "localhost";

    public static function setDBHOST($DB_HOST)
    {
        self::$DB_HOST = $DB_HOST;
    }

    public static function setDBNAME($DB_NAME)
    {
        self::$DB_NAME = $DB_NAME;
    }

    public static function setDBPASSWORD($DB_PASSWORD)
    {
        self::$DB_PASSWORD = $DB_PASSWORD;
    }

    public static function setDBUSERNAME($DB_USERNAME)
    {
        self::$DB_USERNAME = $DB_USERNAME;
    }

    public static function getDBHOST()
    {
        return self::$DB_HOST;
    }

    public static function getDBNAME()
    {
        return self::$DB_NAME;
    }

    public static function getDBPASSWORD()
    {
        return self::$DB_PASSWORD;
    }

    public static function getDBUSERNAME()
    {
        return self::$DB_USERNAME;
    }
}
