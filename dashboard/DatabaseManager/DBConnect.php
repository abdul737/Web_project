<?php
/**
 * Created by PhpStorm.
 * User: Abdulbosid
 * Date: 14.04.2017
 * Time: 15:46
 */

namespace DatabaseManager;


class DBConnect
{
    public static $connection;

    /**
     * @throws \ErrorException
     */
    public static function connect()
    {
        $connection = mysqli_connect(DBConfig::$DB_HOST, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD, DBConfig::$DB_NAME);
        if(mysqli_connect_errno())
        {
            throw new \ErrorException("Connection to MySQL error: ".mysqli_connect_error());
        }
    }

    public static function closeConnection()
    {
        mysqli_close(self::$connection);
    }
}