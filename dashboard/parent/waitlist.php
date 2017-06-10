<?php
require_once("databaseManager/DBManager.php");
require_once("common_pages/logoutcheck.php");

$parent = $_SESSION["parent"];
if(isset($parent))
{
    $students = \databaseManager\DBManager::selectAllStudentsOfParentById($parent->getId());
    $courses = \databaseManager\DBManager::selectAllCourses();
    $waitList = \databaseManager\DBManager::insertOrGetWaitlist($parent->getId());
    if (!$waitList)
    {
        print "<SCRIPT type='text/javascript'>
                    alert('You don\'t have registered courses');
                </SCRIPT > ";
        exit;
    }
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="blue">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Your waitlist</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-info">
                            <th>#</th>
                            <th>Student name</th>
                            <th>Course name</th>
                            <th>Lessons</th>
                            <th>Days</th>
                            <th>Confirmed</th>
                            </thead>
                            <tbody>
                            <?php

                            /** @var Waitlist $item */
                            foreach ($waitList as $item)
                            {
                                $waitlistId = $item->getWaitlistId();
                                $waitlistDays = $item->getDays();
                                /** @var Student $student */
                                foreach ($students as $student) {
                                    if ($student->getId() == $item->getStudentID())
                                    {
                                        $studentName = $student->getName();
                                        $studentSurname = $student->getSurname();
                                        break;
                                    }
                                }
                                /** @var Course $course */
                                foreach ($courses as $course) {
                                    if ($course->getCourseId() == $item->getCourseID())
                                    {
                                        $courseTitle = $course->getTitle();
                                        $courselength = $course->getLength();
                                        break;
                                    }
                                }
                                if ($item->getConfirmed())
                                {
                                    $status = "done";
                                }else
                                    $status = "close";
                                echo("
                                            <tr>
                                                <td>$waitlistId</td>
                                                <td>$studentName $studentSurname</td>
                                                <td>$courseTitle</td>
                                                <td>$courselength</td>
                                                <td>$waitlistDays</td>
                                                <td><i class='material-icons'>$status</i></td>
                                            </tr>");
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>