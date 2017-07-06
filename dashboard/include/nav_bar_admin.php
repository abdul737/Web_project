<?php
    $file = basename($_SERVER["SCRIPT_FILENAME"]);         // $file is set to "index.php"

    if (!isset($_COOKIE['profile_content']) || $_COOKIE['profile_content'] == null)
    {
        $_COOKIE['profile_content'] = 'admin_courses';
    }
?>

<ul class="nav">
    <li <?php echo ($_COOKIE['profile_content'] == 'admin_courses')?"class='active'":""; ?>>
        <a href="<?=$file ?>" onclick="setCookie('profile_content', 'admin_courses', 7)">
            <i class="material-icons">assignment</i>
            <p>Courses</p>
        </a>
    </li>
    <li <?php echo ($_COOKIE['profile_content'] == 'admin_students')?"class='active'":""; ?>>
        <a href="<?=$file ?>" onclick="setCookie('profile_content', 'admin_students', 7)">
            <i class="material-icons">people</i>
            <p>Students</p>
        </a>
    </li>
    <li <?php echo ($_COOKIE['profile_content'] == 'admin_parents')?"class='active'":""; ?>>
        <a href="<?=$file ?>" onclick="setCookie('profile_content', 'admin_parents', 7)">
            <i class="material-icons">account_circle</i>
            <p>Parents</p>
        </a>
    </li>
    <li <?php echo ($_COOKIE['profile_content'] == 'admin_addgroup')?"class='active'":""; ?>>
        <a href="<?=$file ?>" onclick="setCookie('profile_content', 'admin_addgroup', 7)">
            <i class="material-icons">group_add</i>
            <p>Create Group</p>
        </a>
    </li>
    <li <?php echo ($_COOKIE['profile_content'] == 'admin_addcourse')?"class='active'":""; ?>>
        <a href="<?=$file ?>" onclick="setCookie('profile_content', 'admin_addcourse', 7)">
            <i class="material-icons">queue</i>
            <p>Add Course</p>
        </a>
    </li>
    <li <?php echo ($_COOKIE['profile_content'] == 'admin_addinstructor')?"class='active'":""; ?>>
        <a href="<?=$file ?>" onclick="setCookie('profile_content', 'admin_addinstructor', 7)">
            <i class="material-icons">person_add</i>
            <p>Add Instructor</p>
        </a>
    </li>
</ul>
