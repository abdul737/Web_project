<?php
/**
 * Created by PhpStorm.
 * User: dfdf
 * Date: 28.04.2017
 * Time: 4:11
 */

require_once("databaseManager/DBConfig.php");
use \databaseManager\DBConfig;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function connect(){
    $DB_USERNAME = DBConfig::getDBUSERNAME();
    $DB_PASSWORD = DBConfig::getDBPASSWORD();
    $DB_NAME = DBConfig::getDBNAME();
    $DB_HOST = DBConfig::getDBHOST();

    $connection = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

    if(mysqli_connect_errno())
    {
        error_log("MySQL error: ".$connection->error);
        throw new Exception("Connection to MySQL error: ".$connection->error);
    }
    else
    {
        error_log("connected");
    }

    return $connection;
}

function display($message){
    echo "<h6>".$message."</h6>";
}
?>