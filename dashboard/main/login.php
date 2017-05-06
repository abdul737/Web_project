<?php
require_once ("functions.php");
require_once ("ObjectSources/_Parent.php");
require_once ("ObjectSources/Group.php");
require_once ("ObjectSources/Course.php");
require_once ("ObjectSources/Student.php");

session_start();

$test = new _Parent("id", "name", "sur", "pas", "ema", "ph");

if(isset($_POST["login"])){
    $login = (string)test_input($_POST["login"]);
    $pwd = (string)test_input($_POST["l_password"]);
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
        error_log(__FILE__.": error with the prepared statement");
        return;
    }
    $statement->bind_param("i", $id);
    $statement->execute();
    $statement->store_result();
    $num_rows = $statement->num_rows;
    $statement->close();
    if($num_rows == 0){
        echo "<script>alert('There is no such user');</script>"; /////SHOULD BE CHANGED IN WRONG LOGIN OR PASSWORD IN THE FUTURE
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
            error_log(__FILE__.": parent is created");
        }else{
            echo "<script>alert('The login or password is incorrect');</script>";
            return;
        }
    }
    $statement->close();
    error_log(__FILE__.": gotten from user");

    $students = array();
    $statement = $connection->prepare('SELECT studentID FROM customer WHERE parentID = ?');
    $statement->bind_param("i", $id);
    $statement->execute();
    $student_id = null;
    $statement->bind_result($student_id);
    while($statement->fetch()){
        $student = getParentChild($connection, $student_id, $parent);
        $parent->addStudent($student);
    }
    $_SESSION['parent'] = $parent;
    echo "<script>alert('Parent info is gotten from database')</script>";
    exit;
}

function getParentChild($connection, $id, $parent){
    $student = null;
    $connection = connect();
    $statement = $connection->prepare('SELECT name, surname FROM user WHERE id = ?');
    $statement->bind_param("i", $id);
    $statement->execute();
    $name = null;
    $surname = null;
    $statement->bind_result($name, $surname);
    if($statement->fetch()){
        $student = new Student($id, $name, $surname, $parent);
    }else{
        error_log(__FILE__.": not found in USER table");
        return;
    }
    $statement->close();

    $statement = $connection->prepare('SELECT groupID FROM attendingStudent WHERE studentID = ?');
    $statement->bind_param("i", $id);
    $statement->execute();
    $statement->store_result();
    $num_rows = $statement->num_rows;
    if($num_rows == 0){
        error_log(__FILE__.": there is no group");
        return;
    }
    $groupID = null;
    $statement->bind_result($groupID);
    while($statement->fetch()){
        $group = getChildGroup($groupID);
        $student->addGroup($group);
    }
    error_log(__FILE__.": all groups are inserted for ". $id);
    return $student;
}

function getChildGroup($groupID){
    $group = new Group($groupID, null, null, null);
    $connection = connect();
    $stmt = $connection->prepare('SELECT courseID FROM `group` WHERE id = ?');
    $stmt->bind_param("i", $groupID);
    $stmt->execute();
    $courseID = null;
    $stmt->bind_result($courseID);
    if(!$stmt->fetch()){
        error_log(__FILE__.": error in getting COURSE_ID FROM GROUP table");
        return;
    }
    $stmt->close();
    error_log(__FILE__.": course id gotten");

    $stmt = $connection->prepare('SELECT title FROM course WHERE id = ?');
    $stmt->bind_param("i", $courseID);
    $stmt->execute();
    $courseTitle = null;
    $stmt->bind_result($courseTitle);
    if(!$stmt->fetch()){
        error_log(__FILE__.": error in getting TITLE FROM COURSE table");
        return;
    }
    $course = new Course($courseID, $courseTitle, 0);
    $stmt->close();
    $group->setCourse($course);
    return $group;
}

require_once ("login.html");