<?php
$path= $_SERVER["SCRIPT_FILENAME"];
$file = basename($path);         // $file is set to "index.php"

if (!isset($_COOKIE['profile_content']))
{
    $_COOKIE['profile_content'] = 'parent_waitlist';
}
?>

<ul class="nav">
    <li <?php echo ($_COOKIE['profile_content'] == 'parent_waitlist')?"class='active'":""; ?>>
        <a href="<?=$file ?>" onclick="setCookie('profile_content', 'parent_waitlist', 7)">
            <i class="material-icons">dashboard</i>
            <p>Your waitlist</p>
        </a>
    </li>
    <li <?php echo ($_COOKIE['profile_content'] == 'parent_registerkid')?"class='active'":""; ?>>
        <a href="<?=$file ?>" onclick="setCookie('profile_content', 'parent_registerkid', 7)">
            <i class="material-icons">face</i>
            <p>Register kid</p>
        </a>
    </li>
    <li <?php echo ($_COOKIE['profile_content'] == 'parent_registertocourse')?"class='active'":""; ?>>
        <a href="<?=$file ?>" onclick="setCookie('profile_content', 'parent_registertocourse', 7)">
            <i class="material-icons">content_paste</i>
            <p>Register to the course</p>
        </a>
    </li>
    <li <?php echo ($_COOKIE['profile_content'] == 'parent_kidperformance')?"class='active'":""; ?>>
        <a href="<?=$file ?>" onclick="setCookie('profile_content', 'parent_kidperformance', 7)">
            <i class="material-icons">account_circle</i>
            <p>Track kid performance</p>
        </a>
    </li>
    <li <?php echo ($_COOKIE['profile_content'] == 'parent_account_info')?"class='active'":""; ?>>
        <a href="<?=$file ?>" onclick="setCookie('profile_content', 'parent_account_info', 7)">
            <i class="material-icons">assessment</i>
            <p>Account info</p>
        </a>
    </li>
    <li <?php echo ($_COOKIE['profile_content'] == 'parent_leaderboard')?"class='active'":""; ?>>
        <a href="<?=$file ?>" onclick="setCookie('profile_content', 'parent_leaderboard', 7)">
            <i class="material-icons">grade</i>
            <p>Leader board</p>
        </a>
    </li>
</ul>
