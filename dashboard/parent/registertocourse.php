<?php
require_once("databaseManager/DBManager.php");
require_once("functions.php");
require_once("common_pages/logoutcheck.php");
$selectCourseId = null;
$selectStudentId = null;
$selectTimeId = null;
$selectTime = null;

$parent = $_SESSION["parent"];
if (isset($parent))
{
    if (!(isset($_COOKIE["courses"])))
    {
        $_COOKIE["courses"] = \databaseManager\DBManager::selectAllCourses();
        $_COOKIE["times"] = array("Doesn't matter", "Monday/Wednesday/Friday", "Tuesday/Thursday/Saturday");
    }
    $students = \databaseManager\DBManager::selectAllStudentsOfParentById($parent->getId(), $parent);
    $courses = $_COOKIE["courses"];
    $times = $_COOKIE["times"];
    if (!$students)
    {
        $notificationCheck = 1;
        $notificationMessage = "You don\'t have any kid registered, register your kid first!";
        $notificationType = "warning";
        $notificationAlign = "right";
    }
    if ($_POST) {
        $selectCourseId = $_POST["selectCourseId"];
        $selectStudentId = $_POST["selectStudentId"];
        $selectTimeId = $_POST["selectTimeId"];
        if($selectStudentId > 1 && $selectCourseId > 1 && $selectTimeId > 1)
        {
            $selectCourseId = test_input($selectCourseId);
            $selectStudentId = test_input($selectStudentId);
            $selectTimeId = test_input($selectTimeId);
            $selectStudentId = $students[$selectStudentId - 2]->getId();
            $selectCourseId = $courses[$selectCourseId - 2]->getCourseId();
            $selectTime = $times[$selectTimeId - 2];
            $waitList = \databaseManager\DBManager::insertOrGetWaitlist($parent->getId(), $selectStudentId, $selectCourseId, $selectTime);

            $notificationCheck = 1;
            $notificationMessage = "Student added to waitlist, please wait the responce of the administration";
            $notificationType = "info";
            $notificationAlign = "right";
        }
        else
        {
            $notificationCheck = 1;
            $notificationMessage = "Please fill all the fields!";
            $notificationType = "danger";
            $notificationAlign = "right";
        }
    }
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="card">
                <form id="RangeValidation" class="form-horizontal" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'>
                    <div class="card-header card-header-text" data-background-color="blue">
                        <i class="material-icons">add</i>
                    </div>
                    <div class="card-content">
                        <div class="row student">
                            <label class="col-md-2 label-on-left">Choose your kid</label>
                            <div class="col-md-9" name="selectStudent">
                                <select id="students" class="selectpicker" data-style="select-with-transition" title="Single Select" data-size="7">
                                    <option disabled selected>Choose student</option>
                                    <?php
                                    for($i = 0; $i < count($students); $i++)
                                    {
                                        $id = $students[$i]->getId();
                                        $surname = $students[$i]->getSurname();
                                        $name = $students[$i]->getName();
                                        echo "<option value='$id'>$name $surname</option>";
                                    }
                                    ?>
                                </select>
                                <input type="hidden" name="selectStudentId">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 label-on-left">Choose the course</label>
                            <div class="col-md-9" name="selectCourse">
                                <select id="courses" class="selectpicker" data-style="select-with-transition" title="Single Select" data-size="7">
                                    <option disabled selected>Choose course</option>
                                    <?php
                                    for($i = 0; $i < count($courses); $i++)
                                    {
                                        echo "  <option value=".$courses[$i]->getCourseId().">".$courses[$i]->getTitle()."</option>";
                                    }
                                    ?>
                                </select>
                                <input type="hidden" name="selectCourseId">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 label-on-left">Choose the time</label>
                            <div class="col-md-9" name="selectTime">
                                <select id="times" class="selectpicker" data-style="select-with-transition" title="Single Select" data-size="7">
                                    <option disabled selected>Choose time</option>
                                    <?php
                                    for($i = 0; $i < count($times); $i++)
                                    {
                                        echo "  <option>".$times[$i]."</option>";
                                    }
                                    ?>
                                </select>
                                <input type="hidden" name="selectTimeId">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-info btn-fill">Add to waitlist</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

