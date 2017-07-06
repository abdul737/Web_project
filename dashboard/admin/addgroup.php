<?php

$admin = $_SESSION['admin'];

if(isset($admin))
{
    if ($_POST) {

    }
}
else
{
    print "<SCRIPT type='text/javascript'>
                    alert('Session timed out or not found!');
                </SCRIPT > ";
    exit;
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="card">
                <form class="form-horizontal" action="#" method="post">
                    <div class="card-header card-header-text" data-background-color="blue">
                        <i class="material-icons">add</i>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <label class="col-md-2 label-on-left">Select course</label>
                            <div class="col-sm-5">
                                <select class="selectpicker" data-style="select-with-transition" title="Single Select" data-size="7">
                                    <option disabled selected>Choose course</option>
                                    <?php
                                    for ($i = 0; $i < count($courses); $i++)
                                    {
                                        echo '<option value="$courses[$i]->getCourseId()"> $courses[$i]->getTitle() </option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 label-on-left">Select instructor</label>
                            <div class="col-sm-5">
                                <select class="selectpicker" data-style="select-with-transition" title="Single Select" data-size="7">
                                    <option disabled selected>Choose instructor</option>
                                    <?php
                                    for ($i = 0; $i < count($instructors); $i++)
                                    {
                                        echo "<option value='$instructor->getId()'>$instructors[$i]->getName() $instructors[$i]->getSurname()</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 label-on-left">Starting date</label>
                            <div class="col-md-5">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <input  class="form-control" type="datetime-local" name="start_date" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 label-on-left">Time/venue</label>
                            <div class="col-sm-5">
                                <select class="selectpicker" data-style="select-with-transition" title="Single Select" data-size="7">
                                    <option disabled selected>Choose time</option>
                                    <option value="Monday/Wednesday/Friday">Monday/Wednesday/Friday</option>
                                    <option value="Tuesday/Thursday/Saturday">Tuesday/Thursday/Saturday</option>
                                </select>
                            </div>
                        </div>
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
                        <div class="row">
                            <label class="col-md-3 label-on-left">Days of the week</label>
                            <div class="col-sm-8 checkbox-radios">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" checked="true"> Monday/Wednesday/Friday
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios"> Tuesday/Thursday/Saturday
                                    </label>
                                </div>
                            </div>
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
                            <label class="col-md-3 label-on-left">Instructor</label>
                            <div class="col-lg-8 col-md-6 col-sm-3">
                                <select class="selectpicker" data-style="select-with-transition" multiple title="Choose" data-size="7">
                                    <option disabled> Choose</option>
                                    <option value="2">asdasd </option>
                                    <option value="3">asdasd</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Assistant</label>
                            <div class="col-lg-8 col-md-6 col-sm-3">
                                <select class="selectpicker" data-style="select-with-transition" multiple title="Choose" data-size="7">
                                    <option disabled> Choose</option>
                                    <option value="2">asdasd </option>
                                    <option value="3">asdasd</option>
                                </select>
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
                </form>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-info btn-fill">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>