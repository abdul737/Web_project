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
    $DB_PASSWORD = "tHISpaSSWORDiSvERYsTRONG12345";
    $DB_NAME = "lcm";
    $DB_HOST = "localhost";

    $connection = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
    if(mysqli_connect_errno())
    {
        //throw new Exception("Connection to MySQL error: ".mysqli_connect_error());
    }

    return $connection;
}
?>