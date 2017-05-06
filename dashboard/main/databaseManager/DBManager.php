<?php
/**
 * Created by PhpStorm.
 * User: dfdf
 * Date: 28.04.2017
 * Time: 2:37
 */

namespace databaseManager;
require_once "DBConnect.php";

use \Exception;

class DBManager
{
    private function __construct(){}

    private static function getConnection()
    {
        try{
            DBConnect::connect();
            return DBConnect::getConnection();
        } catch (Exception $err){
            error_log($err->getMessage());
            error_log($err->getTrace());
        }
    }

    public static function insertParent($parent){
        $connection = self::getConnection();
        $statement = $connection->prepare('INSERT INTO user (name, surname, password, email, phoneNumber, position)
            VALUES (?, ?, ?, ?, ?, ?)');
        if(!$statement){
            error_log("reg.php: error with the prepared statement");
            return;
        }
        $name = $parent->getName();
        $surname = $parent->getSurname();
        $password = $parent->getPassword();
        $email = $parent->getEmail();
        $phoneNumber = $parent->getPhoneNumber();
        $position = "p";
        $statement->bind_param("ssssss", $name, $surname, $password, $email, $phoneNumber, $position);

        if($statement->execute()){
            error_log("reg.php: inserted into USER table");
            $parent_id = $statement->insert_id;
            $stmt = $connection->prepare('INSERT INTO parent (id) VALUE (?)');
            $stmt->bind_param("i", $parent_id);
            $result = $stmt->execute();
            if($result){
                error_log("reg.php: inserted into PARENT table");
                $stmt->close();
                $statement->close();
                $connection->close();
                return $parent_id;
            }else{
                error_log("reg.php: not inserted into PARENT table");
            }
            $stmt->close();
        }else {
            error_log("reg.php: not inserted into USER table");
        }

        if($connection != null){
            $statement->close();
        }
        return -1;
    }
}
