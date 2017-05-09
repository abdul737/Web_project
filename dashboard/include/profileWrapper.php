<?php
    if ($_SESSION['position'] === 'p')
    {
        $user = $_SESSION['parent'];
    } else if ($_SESSION['position'] === 'a')
    {
        $user = $_SESSION['admin'];
    } else if ($_SESSION['position'] === 's')
    {
        $user = $_SESSION['student'];
    } else if ($_SESSION['position'] === 'i')
    {
        $user = $_SESSION['instructor'];
    }
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
                        <a href="editprofile.php">Edit Profile</a>
                    </li>
                    <li>
                        <a href="common_pages/changepassword.php">Change Password</a>
                    </li>
                    <li>
                        <a href="common_pages/logout.php">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    if ($_SESSION['position'] == 'p')
    {
        include_once "include/parent_nav_bar.php";
    } else if ($_SESSION['position'] == 'a')
    {
        include_once "include/admin_nav_bar.php";
    } else if ($_SESSION['position'] == 's')
    {
        include_once "include/student_nav_bar.php";
    } else if ($_SESSION['position'] == 'i')
    {
        include_once "include/instructor_nav_bar.php";
    }

    ?>
</div>