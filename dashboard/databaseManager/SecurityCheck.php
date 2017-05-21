<?php
/**
 * Created by PhpStorm.
 * User: Abdulbosid
 * Date: 5/21/2017
 * Time: 11:59 AM
 */
namespace databaseManager;
class SecurityCheck
{
    public static function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}