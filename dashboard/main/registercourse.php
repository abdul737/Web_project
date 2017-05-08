<?php
require_once("DBManager.php");

$selectCourseId = null;
$selectStudentId = null;
$selectTime = null;

$parent = new _Parent(10, "Tom", "Khamidov", "passmefirst", "abdulbosid.kh@gmail.com", "+998909110044");

if (isset($parent))
{
    $students = \databaseManager\DBManager::selectAllStudentsOfParent($parent);
    $courses = \databaseManager\DBManager::selectAllCourses();
    $times = array("Doesn't matter", "Monday/Wednesday/Friday", "Tuesday/Thursday/Saturday");

    if ($_POST) {
        $selectCourseId = $_POST["selectCourseId"];
        $selectStudentId = $_POST["selectStudentId"];
        $selectTime = $_POST["selectTime"];
        $selectCourseId = \databaseManager\DBManager::test_input($selectCourseId);
        $selectStudentId = \databaseManager\DBManager::test_input($selectStudentId);
        $selectTime = \databaseManager\DBManager::test_input($selectTime);
        $selectStudentId = $students[$selectStudentId - 1]->getId();
        $selectCourseId = $courses[$selectCourseId - 1]->getCourseId();
        $selectTime = $times[$selectTime - 1];
        $waitList = \databaseManager\DBManager::insertOrGetWaitlist($parent->getId(), $selectStudentId, $selectCourseId, $selectTime);
        header('Location: registercourse.php');
        exit;
    }
    $waitList = \databaseManager\DBManager::insertOrGetWaitlist($parent->getId(), $selectStudentId, $selectCourseId, $selectTime);

}else
{
    echo '<script>alert("Session timed out or not found!");</script>';
    header("Location: login.php");
    exit;
}

require_once ("registercourse.html");