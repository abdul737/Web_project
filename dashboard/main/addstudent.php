<?php
require_once("DBManager.php");

session_start();

$parent = $_SESSION["parent"];
if(isset($parent))
{
    $students = \databaseManager\DBManager::selectAllStudentsOfParent($parent);
    if ($_POST) {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $date = $_POST["date"];
        $student = new Student(null, $first_name, $last_name, $parent, $date);
        $student = \databaseManager\DBManager::insertStudent($student, $parent);
        printf("<script>alert('New student with id s%06d successfully created!')</script>", $student->getId());
        $_POST = array();
        include "addstudent.php";
        exit;
    }
}
else
{
    echo '<script>alert("Session timed out or not found!");</script>';
    include_once("login.php");
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
    <?php include "include/parentProfileFooter.php" ?>
</body>
</html>
