<?php
require_once("DBManager.php");
session_start();

$parent = $_SESSION['parent'];

if(isset($parent))
{
    $students = \databaseManager\DBManager::selectAllStudentsOfParent($parent);
    if ($_POST) {
        foreach ($_POST as $item)
        {
            $item = \databaseManager\DBManager::test_input($item);
        }
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $phoneNumber = $_POST["phoneNumber"];
        $email = $_POST["email"];
        $passportFirstName = $_POST["passportFirstName"];
        $passportLastName = $_POST["passportLastName"];
        $passportPatronymic = $_POST["passportPatronymic"];
        $passportAddress = $_POST["passportAddress"];
        $passportSerial = $_POST["passportSerial"];
        $passportIssuedBy = $_POST["passportIssuedBy"];
        $passportDateOfIssue = $_POST["passportDateOfIssue"];
        $passportDateOfExpiry = $_POST["passportDateOfExpiry"];

        $parent->setName($firstName);
        $parent->setSurname($lastName);
        $parent->setEmail($email);
        $parent->setPhoneNumber($phoneNumber);

        \databaseManager\DBManager::updateParent($parent);
        $_SESSION['parent'] = $parent;
        header("Location: parentprofile.php");
        exit;
    }
}
else
{
    print('<script>alert("Session timed out or not found!");</script>');
    header("Location: .php");
    exit;
}
?>

<!doctype html>
<html lang="en">


<head>
    <?php include "include/parentProfileHeader.php" ?>
</head>

<body>
<div class="wrapper">
    <div class="sidebar" data-active-color="blue" data-background-color="black" data-image="http://demos.creative-tim.com/material-dashboard-pro/assets/img/sidebar-3.jpg">
        <!--
    Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
    Tip 2: you can also add an image using data-image tag
    Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
        <?php include "include/siteLogo.php" ?>
        <?php include "include/profileWrapper.php" ?>
    </div>
    <div class="main-panel">

        <?php include "include/parentNavBar.php"; ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="blue">
                                <i class="material-icons">perm_identity</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Edit Profile -
                                    <small class="category">Complete your profile</small>
                                </h4>
                                <form id="infoForm" action="parentprofile.php" method="post">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group label-floating">
                                                <label class="control-label">ID Number</label>
                                                <input type="text" class="form-control" disabled value="p<?php printf("%06d", $parent->getId());?>">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Phone Number</label>
                                                <input type="text" name="phoneNumber" class="form-control" value="<?= $parent->getPhoneNumber() ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Email address</label>
                                                <input type="email" name="email" class="form-control" value="<?= $parent->getEmail() ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Fist Name</label>
                                                <input type="text" name="firstName" class="form-control" value="<?= $parent->getName() ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Last Name</label>
                                                <input type="text" name="lastName" class="form-control" value="<?= $parent->getSurname() ?>">
                                            </div>
                                        </div>
                                    </div> </br >
                                    <h4 class="card-title">Passport Info</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Fist Name</label>
                                                <input type="text" name="passportFirstName" class="form-control" value="<?= $parent->getName() ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Last Name</label>
                                                <input type="text" name="passportLastName" class="form-control" value="<?= $parent->getSurname() ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Patronymic</label>
                                                <input type="text" name="passportPatronymic" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Address</label>
                                                <input type="text" name="passportAddress" class="form-control" value="Amir-Temur street, 23a">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Passport Serial Number</label>
                                                <input type="text" name="passportSerial" class="form-control" value="AA1578854">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Issued by</label>
                                                <input type="text" name="passportIssuedBy" class="form-control" value="Toshkent shahar, Yunusobod tuman IIB">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Date of issue</label>
                                                <input type="text" name="passportDateOfIssue" class="form-control" value="11/10/2017">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Date of expiry</label>
                                                <input type="text" name="passportDateOfExpiry" class="form-control" value="11/10/2025">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
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
