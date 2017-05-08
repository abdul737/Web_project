<?php
//////////////////
/// the objects are stored in $_SESSION and the index is the name of the class
/// for example $_SESSION['parent']

require_once ("functions.php");
require_once ("ObjectSources/_Parent.php");
require_once ("ObjectSources/Group.php");
require_once ("ObjectSources/Course.php");
require_once ("ObjectSources/Student.php");
require_once ("ObjectSources/Admin.php");

require_once ("DBManager.php");

use \databaseManager\DBManager;

session_start();

if(isset($_POST["login"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
    echo "checking";
    $login = (string)test_input($_POST["login"]);
    $pwd = (string)test_input($_POST["password_l"]);
    if (empty($login) && empty($pwd)) {
        echo "<script>alert('Login or password not written')</script>";
    } else {
        error_log("check");
        check($login, $pwd);
    }
}

function check($login, $password){
    $id = (int)substr($login, 1);
    $userType = $login[0];

    $connection = connect();
    $statement = null;
    if($userType == 'p')
        $statement = $connection->prepare('SELECT * FROM parent WHERE id = ?');
    else if($userType == 'a')
        $statement = $connection->prepare('SELECT * FROM admin WHERE id = ?');
    else if($userType == 's')
        $statement = $connection->prepare('SELECT * FROM student WHERE id = ?');
    else if($userType == 'i')
        $statement = $connection->prepare('SELECT * FROM instructor WHERE id = ?');

    if(isExists($statement, $id)){
        $user = getUser($id, $password);
        if($user) {
            if($userType == 'p')
                getParent($id, $user);
            else if($userType == 's'){
                $student = getStudent($id);
                $_SESSION['student'] = $student;
                exit;
            }else if($userType == 'i'){
                // read instructor from the database
            }else if($userType == 'a'){
                $admin = getAdmin($user);
                $_SESSION['admin'] = $admin;
                header('Location: adminPage.php');
                exit;
            }
        }
    }
}

function isExists($statement, $id){
    if(!$statement){
        error_log(__FILE__.": error with the prepared statement");
        return false;
    }
    $statement->bind_param("i", $id);
    $statement->execute();
    $statement->store_result();
    $num_rows = $statement->num_rows;
    $statement->close();
    if($num_rows == 0){
        echo "<script>alert('There is no such user');</script>"; /////SHOULD BE CHANGED IN WRONG LOGIN OR PASSWORD IN THE FUTURE
        return false;
    }
    return true;
}

function getUser($id, $password){
    $connection = connect();
    $user = null;
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
        if($password == null){
            $user = new User($id, $name, $surname, $password, $email, $phoneNumber);
            error_log(__FILE__.": user is created");
        } else if($actual_password == $password){
            $user = new User($id, $name, $surname, $password, $email, $phoneNumber);
            error_log(__FILE__.": user is created");
        }else{
            echo "<script>alert('The login or password is incorrect');</script>";
        }
    }
    $statement->close();
    $connection->close();
    return $user;
}

function getParent($id, $user){
    $parent = new _Parent($id, $user->getName(), $user->getSurname(), $user->getPassword(), $user->getEmail(), $user->getPhoneNumber());

    $connection = connect();
    $statement = $connection->prepare('SELECT studentID FROM customer WHERE parentID = ?');
    $statement->bind_param("i", $id);
    $statement->execute();
    $student_id = null;
    $statement->bind_result($student_id);
    while($statement->fetch()){
        $student = getStudent($student_id);
        $student->setParent($parent);
        $parent->addStudent($student);
    }
    $_SESSION['parent'] = $parent;
    echo "<script>alert('Parent info is gotten from database')</script>";
    exit;
}

function getStudent($id){
    $student = null;
    $connection = connect();
    $statement = $connection->prepare('SELECT name, surname FROM user WHERE id = ?');
    $statement->bind_param("i", $id);
    $statement->execute();
    $name = null;
    $surname = null;
    $statement->bind_result($name, $surname);
    if($statement->fetch()){
        $student = new Student($id, $name, $surname, null);
    }else{
        error_log(__FILE__.": not found in USER table");
        return;
    }
    $statement->close();
    $gID = null;
    $cID = null;
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

function getAdmin(User $user){
    $admin = new Admin($user->getId(), $user->getName(), $user->getSurname(), $user->getPassword(), $user->getEmail(), $user->getPhoneNumber());
    $courses = DBManager::selectAllCourses();
    $admin->setAllCourses($courses);
    $parents = DBManager::selectAllParents();
    $admin->setAllParents($parents);
    $students = DBManager::selectAllStudents();
    $admin->setAllStudents($students);
    return $admin;
}

require_once ("login.html");
?>