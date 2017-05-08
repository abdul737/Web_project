<?php
require_once("DBManager.php");
session_start();
$selectCourseId = null;
$selectStudentId = null;
$selectTime = null;

$parent = $_SESSION["parent"];

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
?>

<!doctype html>
<html lang="en">


<head>
    <?php include "include/parentProfileHeader.php"; ?>
</head>

<body>
<div class="wrapper">
    <div class="sidebar" data-active-color="blue" data-background-color="black" data-image="http://demos.creative-tim.com/material-dashboard-pro/assets/img/sidebar-3.jpg">
        <!--
    Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
    Tip 2: you can also add an image using data-image tag
    Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
        <?php include "include/siteLogo.php"; ?>
        <?php include "include/profileWrapper.php"; ?>

    </div>
    <div class="main-panel">

        <?php include "include/parentNavBar.php"; ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="card">
                            <form id="RangeValidation" class="form-horizontal" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'>
                                <div class="card-header card-header-text" data-background-color="blue">
                                    <i class="material-icons">add</i>
                                </div>
                                <div class="card-content">
                                    <div class="row student">
                                        <label class="col-md-2 label-on-left">Choose your kid</label>
                                            <div class="col-md-9" name="selectStudent">
                                                <select id="students" class="selectpicker" data-style="select-with-transition" title="Single Select" data-size="7">
                                                    <option disabled selected>Choose student</option>
                                                    <?php
                                                        for($i = 0; $i < count($students); $i++)
                                                        {
                                                            $id = $students[$i]->getId();
                                                            $surname = $students[$i]->getSurname();
                                                            $name = $students[$i]->getName();
                                                            echo "<option value='$id'>$name $surname</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <input type="hidden" name="selectStudentId">
                                            </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 label-on-left">Choose the course</label>
                                        <div class="col-md-9" name="selectCourse">
                                            <select id="courses" class="selectpicker" data-style="select-with-transition" title="Single Select" data-size="7">
                                                <option disabled selected>Choose course</option>
                                                <?php
                                                for($i = 0; $i < count($courses); $i++)
                                                {
                                                    echo "  <option value=".$courses[$i]->getCourseId().">".$courses[$i]->getTitle()."</option>";
                                                }
                                                ?>
                                            </select>
                                            <input type="hidden" name="selectCourseId">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 label-on-left">Choose the time</label>
                                        <div class="col-md-9" name="selectTime">
                                            <select id="times" class="selectpicker" data-style="select-with-transition" title="Single Select" data-size="7">
                                                <option disabled selected>Choose time</option>
                                                <?php
                                                for($i = 0; $i < count($times); $i++)
                                                {
                                                    echo "  <option>".$times[$i]."</option>";
                                                }
                                                ?>
                                            </select>
                                            <input type="hidden" name="selectTime">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-info btn-fill">Add kid</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <a href="#">Edu Management System</a>
                </p>
            </div>
        </footer>
    </div>
</div>
</body>
    <?php include "include/parentProfileFooter.php" ?>
<script>
    $(document).ready(function(){
        //Listen for a click on selectStudent of the dropdown items
        $("div[name='selectStudent'] ul[role='listbox'] > li").click(function(){
            //Get the value
            var value = $(this).attr("data-original-index");
            //Put the retrieved value into the hidden input
            $("input[name='selectStudentId']").val(value);
        });
        //Listen for a click on selectCourse of the dropdown items
        $("div[name='selectCourse'] ul[role='listbox'] > li").click(function(){
            //Get the value
            var value = $(this).attr("data-original-index");
            //Put the retrieved value into the hidden input
            $("input[name='selectCourseId']").val(value);
        });
        //Listen for a click on selectTime of the dropdown items
        $("div[name='selectTime'] ul[role='listbox'] > li").click(function(){
            //Get the value
            var value = $(this).attr("data-original-index");
            //Put the retrieved value into the hidden input
            $("input[name='selectTimeId']").val(value);
        });
    });
</script>

</html>