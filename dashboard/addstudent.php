<?php
require_once("databaseManager/DBManager.php");
require_once("functions.php");
session_start();
require_once "common_pages/logoutcheck.php";

$parent = $_SESSION["parent"];
if(isset($parent))
{
    $students = \databaseManager\DBManager::selectAllStudentsOfParent($parent);
    if ($_POST) {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $date = $_POST["date"];
        $first_name = test_input($first_name);
        $last_name = test_input($last_name);
        $date = test_input($date);

        $student = new Student(null, $first_name, $last_name, $date, $date, $parent->getEmail(), $parent->getPhoneNumber(), $parent);
        $student = \databaseManager\DBManager::insertStudent($student, $parent);
        printf("<script>alert('New student with id s%06d successfully created!')</script>", $student->getId());
        $_POST = array();
        include "addstudent.php";
        exit;
    }
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
        <?php
            include "include/siteLogo.php";
            include "include/profileWrapper.php";
        ?>
    </div>
    <div class="main-panel">
        <?php
            include "include/top_nav_bar.php";
        ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="card">
                            <form id="RangeValidation" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                                <div class="card-header card-header-text" data-background-color="blue">
                                    <i class="material-icons">add</i>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <label class="col-md-2 label-on-left">First name</label>
                                        <div class="col-md-9">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <input class="form-control" type="text" name="first_name" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 label-on-left">Last name</label>
                                        <div class="col-md-9">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <input class="form-control" type="text" name="last_name" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 label-on-left">Date of birth</label>
                                        <div class="col-md-9">
                                            <div class="form-group label-floating ">
                                                <label class="control-label"></label>
                                                <input class="form-control" name="date" type="date">
                                            </div>
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

            <?php include "include/footer_copyright.html" ?>
        </footer>
    </div>
</div>
    <?php include "include/profilefooter.php" ?>
</body>
</html>
