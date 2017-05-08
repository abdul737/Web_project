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
                        <a href="parentprofile.php">Edit Profile</a>
                    </li>
                    <li>
                        <a href="parentprofile.php">Change Password</a>
                    </li>
                    <li>
                        <a href="logout.php">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <ul class="nav">
        <li <?php echo ($file=="parentprofile")?"class='active'":""; ?>>
            <a href="parentprofile.php">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
            </a>
        </li>
        <li <?php echo ($file=="addstudent")?"class='active'":""; ?>>
            <a href="addstudent.php" >
                <i class="material-icons">face</i>
                <p>Register kid</p>
            </a>
        </li>
        <li <?php echo ($file=="registercourse")?"class='active'":""; ?>>
            <a href="registercourse.php">
                <i class="material-icons">content_paste</i>
                <p>Register to the course</p>
            </a>
        </li>
        <li <?php echo ($file=="leaderboard")?"class='active'":""; ?>>
            <a href="leaderboard.php">
                <i class="material-icons">account_circle</i>
                <p>Track kid performance</p>
            </a>
        </li>
        <li <?php echo ($file=="account_info")?"class='active'":""; ?>>
            <a href="account_info.php">
                <i class="material-icons">assessment</i>
                <p>Account info</p>
            </a>
        </li>
        <li <?php echo ($file=="leaderboard")?"class='active'":""; ?>>
            <a href="leaderboard.php">
                <i class="material-icons">grade</i>
                <p>Leader board</p>
            </a>
        </li>
    </ul>
</div>