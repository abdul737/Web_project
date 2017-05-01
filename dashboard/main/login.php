<?php
/**
 * Created by PhpStorm.
 * User: dfdf
 * Date: 01.05.2017
 * Time: 17:28
 */

require_once ("functions.php");

$loginErr = $pwdErr = "";
$login = $id = $pwd = "";
$userType = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["login"])) {
        $loginErr = "Login is required";
    } else {
        $login = test_input($_POST["login"]);
    }

    if (empty($_POST["password"])) {
        $pwdErr = "Password is required";
    } else {
        $pwd = test_input($_POST["password"]);
    }
}

if(isset($_POST)){
    //gets only the number value of the login (ignores first character)
    $id = (int)substr($login, 1);

    //gets the user type (first character)
    $userType = $login[0];

    $connection = connect();
    $statement = connection::prepare("SELECT * FROM user WHERE id=? AND password=?");
    $statement->bind_params("is", $id, $pwd);
    $statement->execute();
    $result = $statement->get_result();

    /*
     * IN PROGRESS
     * */

    if ($userType == "i") {
        //for instructor


        //$curUser = new Instructor('i');






    } else if ($userType == "s") {
        //for student
    } else if ($userType == "p") {
        //for parent
    } else if ($userType == "a") {
        //for admin
    } else {
        //error
    }

    /*
     * IN PROGRESS
     * */


    $statement->close();
    $connection->mysqli_close();
}