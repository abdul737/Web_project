<?php

use \databaseManager\DBManager;
if(isset($user))
{
    if ($_POST) {
        echo $_POST["optionsRadios"];
    }

    $allInstructors = \databaseManager\DBManager::selectAllInstructors();
    $allCourses = $user->getAllCourses();
    if (count($allCourses) == 0)
    {
        $allCourses = DBManager::selectAllCourses();
        $user->setAllCourses($allCourses);
        $_SESSION['admin'] = $user;
    }
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="card">
                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                    <div class="card-header card-header-text" data-background-color="blue">
                        <i class="material-icons">add</i>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <label class="col-md-2 label-on-left">Setting time</label>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Lesson start time</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="time" name="less_start_time" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Start date</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="date" name="start_date" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">End date</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="date" name="end_date" />
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-md-2 label-on-left">Venue</label>
                            <div class="col-sm-5">
                                <select class="selectpicker" data-style="select-with-transition" title="Single Select" data-size="7">
                                    <option disabled selected>Choose venue</option>
                                    <option value="101">Room 101</option>
                                    <option value="514">Room 514</option>
                                    <option value="701">Room 701</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-2 label-on-left">Instructor</label>
                            <div class="col-lg-8 col-md-6 col-sm-3">
                                <select class="selectpicker" data-style="select-with-transition" multiple title="Choose" data-size="7">
                                    <option disabled> Choose</option>
                                    <?php
                                        foreach($allInstructors as $instructor){
                                            $id = $instructor->getId();
                                            $name = $instructor->getName();
                                            $surname = $instructor->getSurname();
                                            echo "<option value='$id'>$name $surname</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 label-on-left">Assistant</label>
                            <div class="col-lg-8 col-md-6 col-sm-3">
                                <select class="selectpicker" data-style="select-with-transition" multiple title="Choose" data-size="7">
                                    <option disabled> Choose</option>
                                    <?php
                                        foreach($allInstructors as $instructor){
                                            $id = $instructor->getId();
                                            $name = $instructor->getName();
                                            $surname = $instructor->getSurname();
                                            echo "<option value='$id'>$name $surname</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 label-on-left">Select course</label>
                            <div class="col-sm-5">
                                <select class="selectpicker" data-style="select-with-transition" title="Single Select" data-size="7">
                                    <option disabled selected>Choose course</option>
                                    <?php
                                    foreach($allCourses as $course){
                                        $courseId = $course->getCourseId();
                                        $title = $course->getTitle();
                                        echo "<option value='$courseId'> $title </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 label-on-left">Days of the week</label>
                            <div class="col-sm-8 checkbox-radios">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" checked="true" value="mon"> Monday/Wednesday/Friday
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" value="tue"> Tuesday/Thursday/Saturday
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br /><br />
                        <div class="card-header card-header-icon" data-background-color="blue">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Select student</h4>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th></th>
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th>Age</th>
                                        <th class="text-right">Parent full name</th>
                                        <th class="text-right">Parent status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="optionsCheckboxes" checked>
                                                </label>
                                            </div>
                                        </td>
                                        <td>Madina</td>
                                        <td>Saidova</td>
                                        <td>12</td>
                                        <td class="text-right">Jamshid Saidov</td>
                                        <td class="text-right">Completed <i class="material-icons">done</i></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="optionsCheckboxes">
                                                </label>
                                            </div>
                                        </td>
                                        <td>Madina</td>
                                        <td>Saidova</td>
                                        <td>12</td>
                                        <td class="text-right">Jamshid Saidov</td>
                                        <td class="text-right">Not completed <i class="material-icons">close</i></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-info btn-fill">Create</button>
                    </div>
                </form>
            </div>
            </form>
        </div>
    </div>
</div>