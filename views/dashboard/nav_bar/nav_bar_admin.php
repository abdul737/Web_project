<ul class="nav">
    <li <?php echo ($_COOKIE['profile_content'] == 'admin_groups') ? "class='active'" : ""; ?>>
        <a href="groups">
            <i class="material-icons">group</i>
            <p>Groups</p>
        </a>
    </li>
    <li <?php echo ($_COOKIE['profile_content'] == 'admin_create_group') ? "class='active'" : ""; ?>>
        <a href="create_group">
            <i class="material-icons">group_add</i>
            <p>Create Group</p>
        </a>
    </li>
    <li <?php echo ($_COOKIE['profile_content'] == 'admin_students') ? "class='active'" : ""; ?>>
        <a href="students">
            <i class="material-icons">school</i>
            <p>Students</p>
        </a>
    </li>
    <li <?php echo ($_COOKIE['profile_content'] == 'admin_parents') ? "class='active'" : ""; ?>>
        <a href="parents">
            <i class="material-icons">account_circle</i>
            <p>Parents</p>
        </a>
    </li>
    <li <?php echo ($_COOKIE['profile_content'] == 'admin_instructors') ? "class='active'" : ""; ?>>
        <a href="instructors">
            <i class="material-icons">contacts</i>
            <p>Instructors</p>
        </a>
    </li>
    <li <?php echo ($_COOKIE['profile_content'] == 'admin_courses') ? "class='active'" : ""; ?>>
        <a href="courses">
            <i class="material-icons">assignment</i>
            <p>Courses</p>
        </a>
    </li>
    <li <?php echo ($_COOKIE['profile_content'] == 'admin_classrooms_timeslots') ? "class='active'" : ""; ?>>
        <a href="classrooms_timeslots">
            <i class="material-icons">&#xE88A;</i>
            <p>Classrooms & Timeslots</p>
        </a>
    </li>
</ul>