<?php

if(isset($user))
{
    if ($_POST) {
        $course_name = $_POST["course_name"];
        $price = $_POST["price"];
        $course_length = $_POST["course_dur"];
        $age_limit = $_POST["age_limit"];

        $course_name = test_input($course_name);
        $price = test_input($price);
        $course_length = test_input($course_length);
        $age_limit = test_input($age_limit);

        if($course_name == "" || $price == "" || $course_length == "" || $age_limit == "")
        {
            /* Show warning message*/
            $notificationCheck = 1;
            $notificationMessage = "Please fill all the fields!";
            $notificationType = "danger";
            $notificationAlign = "right";
        }else
        {
            /*Inserting to database and notify about success and courseId*/
            $newCourse = \databaseManager\DBManager::insertAndGetCourse(new Course(null, $course_name, $course_length, $age_limit));
            $notificationCheck = 1;
            $notificationMessage = "New course with courseId ".$newCourse->getCourseId()." was inserted.";
            /* Downloading new course list and updating session data
             * To be shown in other screens */
            $allCourses = \databaseManager\DBManager::selectAllCourses();
            $user->setAllCourses($allCourses);
            $_SESSION['admin'] = $user;

        }
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
                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                    <div class="card-header card-header-icon" data-background-color="blue">
                        <i class="material-icons">add</i>
                    </div>
                    <h4 class="card-title">Add course</h4>
                    <div class="card-content">
                        <div class="row">
                            <label class="col-md-3 label-on-left">Course name</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="text" name="course_name" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Price (UZS)</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="number" name="price" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Length (Lessons)</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="number" name="course_dur" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Age limit</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="text" name="age_limit" required/>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-info btn-fill">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>