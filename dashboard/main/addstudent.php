<?php
require_once("DBManager.php");

session_start();

$parent = $_SESSION["parent"];
if(isset($parent))
{
    $students = \databaseManager\DBManager::selectAllStudentsOfParent($parent);
    if ($_POST) {
        $name = $birthdate = $password =  $groups = "";
        $points = 0;
        $parent = null;
        $lastLogin = $photo = $email = $phoneNumber = null;
        $test = new User();
        $test2 = $test->getPhoneNumber();
    }
}
else
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

    <div class="main-panel">

        <?php include "include/parentNavBar.php"; ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="card">
                            <form id="RangeValidation" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="get">
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
                                                <input class="form-control" name="date" type="text">
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
