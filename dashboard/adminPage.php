<?php

require_once("ObjectSources/Course.php");
require_once("ObjectSources/Admin.php");
session_start();

$admin = $_SESSION['admin'];

if(isset($admin))
{
    if ($_POST) {

    }
}
else
{
    echo '<script>alert("Session timed out or not found!");</script>';
    header("Location: login.php");
    exit;
}
require_once("adminPageTop.html");
require_once("courseListTop.html");

$i = 1;
foreach($admin->getAllCourses() as $course){
    $title = $course->getTitle();
    $length = $course->getLength();
    $ageLimit = $course->getAgeLimit();
    include("courseList.html");
    $i++;
}

echo "</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>";


require_once("adminPageBottom.html");