<?php

require_once ("functions.php");
require_once ("ObjectSources/_Parent.php");
use \_Parent;


if(isset($_POST["login"])){
    $login = (string)test_input($_POST["login"]);
    $pwd = (string)test_input($_POST["password"]);

   if (empty($login) && empty($pwd)) {
        echo "<script>alert('Login or password not written')</script>";
   } else {
        check($login, $pwd);
   }
}

require_once ("login.html");

function check($login, $password){
    $id = (int)substr($login, 1);
    $userType = $login[0];

    if($userType == 'p')
        getParent($id, $password);
}

function getParent($id, $password){
    $connection = connect();
    $statement = $connection->prepare('SELECT * FROM parent WHERE id = ?');
    if(!$statement){
        error_log("login.php: error with the prepared statement");
        return;
    }
    $statement->bind_param("i", $id);
    $statement->execute();
    $statement->store_result();
    $num_rows = $statement->num_rows;
    $statement->close();
    if($num_rows == 0){
        echo "<script>alert('*The login or password is incorrect');</script>";
        return;
    }

    $parent = null;
    $statement = $connection->prepare('SELECT password, email, name, surname, phoneNumber FROM user WHERE id = ?');
    $statement->bind_param("i", $id);
    $statement->execute();
    $actual_password = null;
    $email = null;
    $name = null;
    $surname = null;
    $phoneNumber = null;
    $statement->bind_result($actual_password, $email, $name, $surname, $phoneNumber);
    if($statement->fetch()){
        if($actual_password == $password){
            $parent = new _Parent($id, $name, $surname, $password, $email, $phoneNumber);
        }else{
            echo "<script>alert('The login or password is incorrect');</script>";
            return;
        }
    }
    $statement->close();

    $children = array();
    $statement = $connection->prepare('SELECT studentID FROM customer WHERE parentID = ?');
    $statement->bind_param("i", $id);
    $statement->execute();
    $child_id = null;
    $statement->bind_result($child_id);
    while($statement->fetch()){
        echo "<p>$child_id</p>";
        $child = getParentChild($child_id);
        array_push($children, $child);
    }
}

function getParentChild($id){

}