<?php
/**
 * Created by PhpStorm.
 * User: Abdulbosid
 * Date: 14.04.2017
 * Time: 15:46
 */

namespace DatabaseManager;


use MongoDB\Driver\Exception\ConnectionException;

class DBConnect
{
    public static $connection;

    /**
     * @throws ConnectionException
     */
    public static function connect()
    {
        $connection = mysqli_connect(DBConfig::getDBHOST(), DBConfig::getDBUSERNAME(),
            DBConfig::getDBPASSWORD(), DBConfig::getDBNAME());
        if(mysqli_connect_errno())
        {
            throw new ConnectionException("Connection to MySQL error: ".mysqli_connect_error());
        }
    }

    public static function closeConnection()
    {
        mysqli_close(self::$connection);
    }
}