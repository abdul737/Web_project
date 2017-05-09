<?php
    $user = $_SESSION['parent'];

    $path= $_SERVER["SCRIPT_FILENAME"];
    $file = basename($path);         // $file is set to "index.php"
    $file = basename($path, ".php"); // $file is set to "index"
?>
<div class="sidebar-wrapper">
    <div class="user">
        <div class="photo">
            <img src="../../assets/img/avatar_default.png" />
        </div>
        <div class="info">
            <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                <?php echo $user->getName(); echo " "; echo $user->getSurname(); ?>
                <b class="caret"></b>
            </a>
            <div class="collapse" id="collapseExample">
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
        if (isset($_SESSION['parent']))
        {
            include_once "include/parent_nav_bar.php";
        } else
            if(isset($_SESSION['admin']))
            {
                include_once "include/admin_nav_bar.php";
            } else
                if(isset($_SESSION['instructor']))
                {
                    include_once "include/instructor_nav_bar.php";
                } else
                    if (isset($_SESSION['student']))
                    {
                        include_once "include/student_nav_bar.php";
                    }
    ?>
</div>