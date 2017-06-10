<?php
/**
 * Created by PhpStorm.
 * User: Abdulbosid
 * Date: 6/9/2017
 * Time: 3:55 PM
 */
require_once("databaseManager/DBManager.php");
require_once("common_pages/logoutcheck.php");

$user = null;
if ($_SESSION['position'] == 'p')
{
    $user = $_SESSION['parent'];
} else if ($_SESSION['position'] == 'a')
{
    $user = $_SESSION['admin'];
} else if ($_SESSION['position'] == 's')
{
    $user = $_SESSION['student'];
} else if ($_SESSION['position'] == 'i')
{
    $user = $_SESSION['instructor'];
}

$username = $user->getName()." ".$user->getSurname();

?>


<!doctype html>
<html lang="en">
<head>
    <?php
    include "include/includesHeader.html";
    ?>
    <title><?= $username ?> - Edu Management System</title>
</head>
<body
    <?php
    if (!isset($_COOKIE['sidebarOpen']))
    {
        $_COOKIE['sidebarOpen'] = 1;
    }

    if ($_COOKIE['sidebarOpen'] == 0)
    {
        echo 'class="sidebar-mini"';
    }
?>>
<div class="wrapper">
    <div class="sidebar" data-active-color="blue" data-background-color="black" data-image="http://demos.creative-tim.com/material-dashboard-pro/assets/img/sidebar-3.jpg">
        <?php
        include "include/siteLogo.html";
        ?>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="../../assets/img/avatar_default.png" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#edit" class="collapsed">
                        <?php echo $user->getName(); echo " "; echo $user->getSurname(); ?>
                        <b class="caret"></b>
                    </a>
                    <div class="collapse" id="edit">
                        <ul class="nav">
                            <li>
                                <a href="<?php echo basename($_SERVER['SCRIPT_FILENAME']);?>" onclick="setCookie('profile_content', 'editprofile', 7)">Edit Profile</a>
                            </li>
                            <li>
                                <a href="<?php echo basename($_SERVER['SCRIPT_FILENAME']);?>">Change Password</a>
                            </li>
                            <li>
                                <a href="common_pages/logout.php">Log out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
            if ($_SESSION['position'] == 'p') {
                include_once "include/nav_bar_parent.php";
            } else
                if ($_SESSION['position'] == 'a') {
                    include_once "include/nav_bar_admin.php";
                } else
                    if ($_SESSION['position'] == 's') {
                        include_once "include/nav_bar_student.php";
                    } else
                        if ($_SESSION['position'] == 'i') {
                            include_once "include/nav_bar_instructor.php";
                        }

            ?>
        </div>
    </div>
    <div class="main-panel">
        <?php
            include "include/top_nav_bar.php";
        ?>
        <div class="content">
            <?php
            if ($_COOKIE['profile_content'] == 'editprofile')
                include_once "common_pages/editprofile.php";

            if ($_SESSION['position'] == 'p') {
                include_once "include/switch_content_parent.php";
            } else
                if ($_SESSION['position'] == 'a') {
                    include_once "include/switch_content_admin.php";
                } else
                    if ($_SESSION['position'] == 's') {
                        include_once "include/switch_content_student.php";
                    } else
                        if ($_SESSION['position'] == 'i') {
                            include_once "include/switch_content_instructor.php";
                        }
            ?>
        </div>

        <footer class="footer">

            <?php include "include/footer_copyright.html" ?>
        </footer>
    </div>
</div>
<?php
include "include/includesFooter.html";
?>
</body>
</html>
