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

function check($login, $password){
    $id = (int)substr($login, 1);
    $userType = $login[0];

    if($userType == 'p')
        getParent($id, $password);
    else if($userType == 'a')
        getAdmin($id, $password);
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
        echo "<script>alert('There is no such user');</script>";
        ////////////////////
        ///
        ///
        /// In the future it should
        /// really?
        ///
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

    $students = array();
    $statement = $connection->prepare('SELECT studentID FROM customer WHERE parentID = ?');
    $statement->bind_param("i", $id);
    $statement->execute();
    $student_id = null;
    $statement->bind_result($student_id);
    while($statement->fetch()){
        echo "<p>$student_id</p>";
        $student = getParentChild($connection, $student_id, $parent);
        array_push($students, $student);
    }
}

function getParentChild($connection, $id, $parent){
    $student = null;
    $statement = $connection->prepare('SELECT name, surname FROM user WHERE id = ?');
    $statement->bind_param("i", $id);
    $statement->execute();
    $name = null;
    $surname = null;
    $statement->bind_result($name, $surname);
    if($statement->fetch()){
        $student = new Student($id, $name, $surname, $parent);
    }else{
        error_log("login.php: not found in USER table");
        return;
    }
    $statement->close();

    $statement = $connection->prepare('SELECT groupID FROM attendingStudent WHERE studentID = ?');
    $statement->bind_param("i", $id);
    $statement->execute();
    $groupID = null;
    $statement->bind_result($groupID);
    $stmt = $connection->prepare('SELECT courseID FROM group WHERE id = ?');
    $stmt->bind_param("i", $gID);
    $st = $connection->prepare('SELECT title FROM course WHERE id = ?');
    $st->bind_param("i", $cID);
    while($statement->fetch()){
        $gID = $groupID;
        $stmt->execute();
        $courseID = null;
        $stmt->bind_result($courseID);
        if(!$stmt->fetch()){
            error_log("login.php: error in select from GROUP table");
            continue;
        }
        $cID = $courseID;
        $st->execute();
        $courseTitle = null;
        $st->bind_result($courseTitle);
        if($st->fetch()){
            $course = new Course($courseID, $courseTitle, 0);
            $group = new Group($groupID, $course, null, null);
            $student->addGroup($group);
        }
    }
    $st->close();
    $stmt->close();
    $statement->close();
}

require_once ("login.html");