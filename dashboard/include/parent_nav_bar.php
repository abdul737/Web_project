<?php
    $path= $_SERVER["SCRIPT_FILENAME"];
    $file = basename($path);         // $file is set to "index.php"
    $file = basename($path, ".php"); // $file is set to "index"
?>

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
    <li <?php echo ($file=="registertocourse")?"class='active'":""; ?>>
        <a href="registertocourse.php">
            <i class="material-icons">content_paste</i>
            <p>Register to the course</p>
        </a>
    </li>
    <li <?php echo ($file=="kidperformance")?"class='active'":""; ?>>
        <a href="kidperformance.php">
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
