<?php
    $path= $_SERVER["SCRIPT_FILENAME"];
    $file = basename($path);         // $file is set to "index.php"
    $file = basename($path, ".php"); // $file is set to "index"
?>

<ul class="nav">
    <li <?php echo ($file=="adminPage")?"class='active'":""; ?>>
        <a href="adminPage.php">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
        </a>
    </li>
    <li <?php echo ($file=="adminPageCourses")?"class='active'":""; ?>>
        <a href="adminPageCourses.php" >
            <i class="material-icons">assignment</i>
            <p>Courses</p>
        </a>
    </li>
    <li <?php echo ($file=="adminPageStudents")?"class='active'":""; ?>>
        <a href="adminPageStudents.php" >
            <i class="material-icons">assignment</i>
            <p>Students</p>
        </a>
    </li>
    <li <?php echo ($file=="adminPageParents")?"class='active'":""; ?>>
        <a href="adminPageParents.php" >
            <i class="material-icons">assignment</i>
            <p>Parents</p>
        </a>
    </li>
    <li <?php echo ($file=="createCourse")?"class='active'":""; ?>>
        <a href="createCourse.php" >
            <i class="material-icons">add</i>
            <p>Add Course</p>
        </a>
    </li>
    <li <?php echo ($file=="createInstructor")?"class='active'":""; ?>>
        <a href="createInstructor.php" >
            <i class="material-icons">add</i>
            <p>Add Instructor</p>
        </a>
    </li>
    <li <?php echo ($file=="createGroup")?"class='active'":""; ?>>
        <a href="createGroup.php" >
            <i class="material-icons">add</i>
            <p>Create Group</p>
        </a>
    </li>
</ul>
