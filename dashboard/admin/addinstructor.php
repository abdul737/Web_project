<?php

$admin = $_SESSION['admin'];

if(isset($admin))
{
    if ($_POST) {
        $first_name = (string)test_input($_POST["first_name"]);
        $last_name = (string)test_input($_POST["last_name"]);
        $phone_number = (string)test_input($_POST["phone_number"]);
        $email = (string)test_input($_POST["email"]);
        $date = test_input($_POST["date"]);

        $profile_photo = test_input($_POST["profile_photo"]);
        $passport_copy = test_input($_POST["passport_copy"]);
        $pension_book = test_input($_POST["pension_book"]);

        if ($first_name != "" && $last_name!= ""){
            $instructor = new Instructor(null, $first_name, $last_name, $email, $profile_photo, $email, $phone_number);
            $instructor->setBirthdate($date);
            $instructor = \databaseManager\DBManager::insertInstructor($instructor);
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
                    <h4 class="card-title">Add instructor</h4>
                    <div class="card-content">
                        <div class="row">
                            <label class="col-md-2 label-on-left">First name</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="text" name="first_name" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 label-on-left">Last name</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="text" name="last_name" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 label-on-left">Date of birth</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating ">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="date" name="date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 label-on-left">Phone Number</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="number" name="phone_number" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 label-on-left">Email</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="email" name="email" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 label-on-left">Upload</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <span class="btn btn-instagram btn-sm btn-file">
                                                        Profile photo <input type="file" name="profile_photo">
                                                </span>
                                    <span class="btn btn-default btn-sm btn-file">
                                                        passport copy <input type="file" name="passport_copy">
                                                </span>
                                    <span class="btn btn-default btn-sm btn-file">
                                                        pension book <input type="file" name="pension_book">
                                                </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-info btn-fill">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>