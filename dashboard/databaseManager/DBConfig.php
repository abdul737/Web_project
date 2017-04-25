<?php
/**
 * Created by PhpStorm.
 * User: Abdulbosid
 * Date: 14.04.2017
 * Time: 15:46
 */

namespace DatabaseManager;


class DBConfig
{
    private static $DB_USERNAME = "m_codecraft";
    private static $DB_PASSWORD = "";
    private static $DB_NAME = "codecraft_moodle";
    private static $DB_HOST = "127.0.0.1";


    /**
     * @param string $DB_HOST
     */
    public static function setDBHOST($DB_HOST)
    {
        self::$DB_HOST = $DB_HOST;
    }

    /**
     * @param string $DB_NAME
     */
    public static function setDBNAME($DB_NAME)
    {
        self::$DB_NAME = $DB_NAME;
    }

    /**
     * @param string $DB_PASSWORD
     */
    public static function setDBPASSWORD($DB_PASSWORD)
    {
        self::$DB_PASSWORD = $DB_PASSWORD;
    }

    /**
     * @param string $DB_USERNAME
     */
    public static function setDBUSERNAME($DB_USERNAME)
    {
        self::$DB_USERNAME = $DB_USERNAME;
    }

    /**
     * @return string
     */
    public static function getDBHOST()
    {
        return self::$DB_HOST;
    }

    /**
     * @return string
     */
    public static function getDBNAME()
    {
        return self::$DB_NAME;
    }

    /**
     * @return string
     */
    public static function getDBPASSWORD()
    {
        return self::$DB_PASSWORD;
    }

    /**
     * @return string
     */
    public static function getDBUSERNAME()
    {
        return self::$DB_USERNAME;
    }

}
