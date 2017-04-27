<?php
/**
 * Created by PhpStorm.
 * User: dfdf
 * Date: 28.04.2017
 * Time: 2:38
 */

namespace databaseManager;


namespace MZ\MailChimpBundle\Services;
use Exception;

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
            throw new \Exception("Connection to MySQL error: ".mysqli_connect_error());
        }
    }

    public static function closeConnection()
    {
        mysqli_close(self::$connection);
    }
}