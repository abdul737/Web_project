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
/**
 * Establishing connection with databaseManager server
 */
public static function getConnection()
{
    try{
        if(DBConnect::$connection == null)
        {
            DBConnect::connect();
        }
        return DBConnect::$connection;

    } catch (Exception $err)
    {
        echo $err->getMessage();
        echo $err->getTrace();
    }
}

/**
 * @param $name
 * Search for parent by name
 */
public static function readParents($_name)
{
    $contactDetails = self::readContactDetails($_name);

    //Variables to instantiate a parent
    $userId = $name = $email = $phoneNumber =  $birthdate = $password =
    $passportNumber =  $passportDueDate = $passportGetInfo = $lastLogin = $photo = "";

    $sql = "QUERY MUST BE HERE WHICH ON ";

    foreach ($contactDetails as $contactDetail)
    {
        if ($contactDetail->getName() == $_name)
        {
            $name = $_name;
            $userId = $contactDetail->getId();
            $email = $contactDetail->getEmail();
            $phoneNumber = $contactDetail->getPhoneNumber();
            $photo = $contactDetail->getPhoto();
        }
    }
    return;
}

/**
 * @param $name
 * Search for contact details with name $name.
 * Returns an array of ContactDetails ordered by ID in ascending order.
 * @return array of ContactDetails.
 * P.S. Better search algorithm must be implemented.
 */
public static function readUser($name)
{
    $sql = "SELECT * FROM User WHERE name = '$name' ORDER BY ID DESC";
    $result = self::getConnection()->query($sql);

    $users = array();

    if ($result->num_rows > 0) {
        //Push all contact details to array
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $name = $row["name"];
            $photo = $row["photo"];
            $phoneNumber = $row["phoneNumber"];
            $email = $row["email"];

            $user = new \_Parent($id, $name,  $photo,$email = null,$phoneNumber = null);
            array_push($users, $user);

        }
    }

    return $users;
}

public static function insertUser(\User $user, $position)
{
    $name = $user->getName();
    $birthdate = $user->getBirthdate();
    $password = $user->getBirthdate();

    $lastLogin = "";
    $photo = $user->getPhoto();
    $email = $user->getEmail();
    $phoneNumber = $user->getPhoneNumber();

    $connection = connect();
    echo "Connected";

    $statement = $connection->prepare('INSERT INTO user (name, surname, password, email, phoneNumber, position)
            VALUES (?, ?, ?, ?, ?, ?)');
    if(!$statement){
        echo "Statement is false";
    }

    $statement->bind_param("ssssss", $name, $surname, $password, $email, $phoneNumber, $position);

    $result = $statement->execute();
    if($result){
        echo "Inserted into USER table";
        $parent_id = $statement->insert_id;
        $stmt = $connection->prepare('INSERT INTO parent (id) VALUE (?)');
        $stmt->bind_param("i", $parent_id);
        $result = $stmt->execute();
        if($result){
            echo "Inserted into PARENT table";
            require_once("login.html");
            exit;
        }else{
            echo "result Problem";
        }

    }else {
        echo "Error in Insertion";
    }
    if($connection != null){
        $statement->close();
        $connection->close();
    }
}

public static function insertKid(\Student $kid)
{
    $name = $kid->getName();
    $birthdate = $kid->getBirthdate();
    $password = $kid->getBirthdate();
    $groups = $kid->getGroups();
    $points = $kid->getTotalPoints();
    $parent = $kid->getParent();
    $lastLogin = "";
    $photo = $kid->getPhoto();
    $email = $kid->getEmail();
    $phoneNumber = $kid->getPhoneNumber();




}

}
