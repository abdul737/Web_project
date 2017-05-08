<?php
/**
 * Created by PhpStorm.
 * User: dfdf
 * Date: 28.04.2017
 * Time: 4:11
 */

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function connect(){
    $DB_USERNAME = "root";
    $DB_PASSWORD = "toor";
    $DB_NAME = "codecraft_moodle";
    $DB_HOST = "127.0.0.1";

    $connection = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

    if(mysqli_connect_errno())
    {
        error_log("MySQL error: ".$connection->error);
        throw new Exception("Connection to MySQL error: ".$connection->error);
    }
    else
    {
        error_log("Connected!");
    }

    return $connection;
}
?>