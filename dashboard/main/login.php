<?php
/**
 * Created by PhpStorm.
 * User: dfdf
 * Date: 01.05.2017
 * Time: 17:28
 */

require_once ("functions.php");

$login = $pwd = "";
$id = null;
$userType = null;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $login = test_input($_POST["login"]);
    $pwd = test_input($_POST["password"]);

    if (!empty($login) && !empty($pwd)) {

    } else {
        echo "Login or [password is not written";
    }

    //gets only the number value of the login (ignores first character)
    $id = (int)substr($login, 1);

    //gets the user type (first character)
    $userType = $login[0];

    $connection = connect();
    $statement = $connection->prepare("SELECT * FROM user WHERE id=?");
    $statement->bind_params("i", $id);
    if($statement->execute()){
        $result = $statement->get_result();

        if ($userType == "i") {
            //for instructor
        } else if ($userType == "s") {
            //for student
        } else if ($userType == "p") {
            //for parent
        } else if ($userType == "a") {
            //for admin
        } else {
            //error
        }
    }
}

require_once ("login.html");