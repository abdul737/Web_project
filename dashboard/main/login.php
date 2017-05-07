<?php
require_once ("functions.php");
require_once ("ObjectSources/_Parent.php");

//use \_Parent;

if(isset($_POST["login"]) && $_SERVER["REQUEST_METHOD"] === "post"){
    $login = (string)test_input($_POST["login"]);
    $pwd = (string)test_input($_POST["password"]);
    if (empty($login) && empty($pwd)) {
        echo "<script>alert('Login or password not written')</script>";
    } else {
        check($login, $pwd);
    }
}


function check($login, $password){
    $id = (int)substr($login, 1);
    $userType = $login[0];

    if($userType == 'p')
        getParent($id, $password);
    else if($userType == 'a')
        getAdmin($id, $password);
}

function getParent($id, $password){
    $connection = connect();
    $statement = $connection->prepare('SELECT * FROM parent WHERE id = ?');
    if(!$statement){
        error_log("login.php: error with the prepared statement");
        return;
    }
    $statement->bind_param("i", $id);
    $statement->execute();
    $statement->store_result();
    $num_rows = $statement->num_rows;
    $statement->close();
    if($num_rows == 0){
        echo "<script>alert('There is no such user');</script>";
        ////////////////////
        ///
        ///
        /// In the future it should
        /// really?
        ///
        return;
    }

    $parent = null;
    $statement = $connection->prepare('SELECT password, email, name, surname, phoneNumber FROM user WHERE id = ?');
    $statement->bind_param("i", $id);
    $statement->execute();
    $actual_password = null;
    $email = null;
    $name = null;
    $surname = null;
    $phoneNumber = null;
    $statement->bind_result($actual_password, $email, $name, $surname, $phoneNumber);
    if($statement->fetch()){
        if($actual_password == $password){
            $parent = new _Parent($id, $name, $surname, $password, $email, $phoneNumber);
        }else{
            echo "<script>alert('The login or password is incorrect');</script>";
            return;
        }
    }
    $statement->close();

    $students = array();
    $statement = $connection->prepare('SELECT studentID FROM customer WHERE parentID = ?');
    $statement->bind_param("i", $id);
    $statement->execute();
    $student_id = null;
    $statement->bind_result($student_id);
    while($statement->fetch()){
        echo "<p>$student_id</p>";
        $student = getParentChild($connection, $student_id, $parent);
        array_push($students, $student);
    }
}

function getParentChild($connection, $id, $parent){
    $student = null;
    $statement = $connection->prepare('SELECT name, surname FROM user WHERE id = ?');
    $statement->bind_param("i", $id);
    $statement->execute();
    $name = null;
    $surname = null;
    $statement->bind_result($name, $surname);
    if($statement->fetch()){
        $student = new Student($id, $name, $surname, $parent);
    }else{
        error_log("login.php: not found in USER table");
        return;
    }
    $statement->close();
    $gID = null;
    $cID = null;
    $statement = $connection->prepare('SELECT groupID FROM attendingStudent WHERE studentID = ?');
    $statement->bind_param("i", $id);
    $statement->execute();
    $groupID = null;
    $statement->bind_result($groupID);
    $stmt = $connection->prepare('SELECT courseID FROM group WHERE id = ?');
    $stmt->bind_param("i", $gID);
    $st = $connection->prepare('SELECT title FROM course WHERE id = ?');
    $st->bind_param("i", $cID);
    while($statement->fetch()){
        $gID = $groupID;
        $stmt->execute();
        $courseID = null;
        $stmt->bind_result($courseID);
        if(!$stmt->fetch()){
            error_log("login.php: error in select from GROUP table");
            continue;
        }
        $cID = $courseID;
        $st->execute();
        $courseTitle = null;
        $st->bind_result($courseTitle);
        if($st->fetch()){
            $course = new Course($courseID, $courseTitle, 0);
            $group = new Group($groupID, $course, null, null);
            $student->addGroup($group);
        }
    }
    $st->close();
    $stmt->close();
    $statement->close();
}

//require_once ("login.html");
?>
<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76"
          href="http://demos.creative-tim.com/material-dashboard-pro/assets/img/apple-icon.png"/>
    <link rel="icon" type="image/png"
          href="http://demos.creative-tim.com/material-dashboard-pro/assets/img/favicon.png"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Login - Edu Management System</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <!-- Bootstrap core CSS     -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet"/>
    <!--  Material Dashboard CSS    -->
    <link href="../../assets/css/material-dashboard.css" rel="stylesheet"/>
    <!--     Fonts and icons     -->
    <link href="../../assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons"/>
</head>
<body>
<nav class="navbar navbar-primary navbar-transparent navbar-absolute">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">Edu Management
                System</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="register.php">
                        <i class="material-icons">person_add</i> Register
                    </a>
                </li>
                <li class=" active ">
                    <a href="login.php">
                        <i class="material-icons">fingerprint</i> Login
                    </a>
                </li>
                <li class="">
                    <a href="lock.html">
                        <i class="material-icons">lock_open</i> Lock
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" filter-color="black" data-image="../../assets/img/login.jpg">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="POST" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'>
                            <div class="card card-login card-hidden">
                                <div class="card-header text-center" data-background-color="blue">
                                    <h4 class="card-title">Login</h4>
                                </div>
                                <div class="card-content">
                                    <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">perm_identity</i>
                                </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Login</label>
                                            <input title="login" name="login" id="login" data-minlength="6" type="text" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Password</label>
                                            <input title="password" name="password" type="password" required
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="checkbox">
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="remember" checked>
                                                <span class="checkbox-material"><span class="check">
                                                    </span></span> Remember
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-info btn-simple btn-wd btn-lg">Let's go
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <p class="copyright pull-right">
                    &copy;
                    <script>
                        document.write((new Date().getFullYear()).toString());
                    </script>
                    <a href="#">Edu Management System</a>
                </p>
            </div>
        </footer>
    </div>
</div>
</body>
<!-- Including validator.js -->
<script src="../../assets/js/validator.js"></script>
<!--   Core JS Files   -->
<script src="../../assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/js/material.min.js" type="text/javascript"></script>
<script src="../../assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../../assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../../assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="../../assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="../../assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="../../assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="../../assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="../../assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="../../assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="../../assets/js/nouislider.min.js"></script>
<!-- Select Plugin -->
<script src="../../assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="../../assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="../../assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../../assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="../../assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="../../assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../../assets/js/material-dashboard.js"></script>
<script src="../../assets/js/main.js"></script>
<script type="text/javascript">
    $().ready(function () {
        main.checkFullPageBackgroundImage();
        setTimeout(function () {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700);
        $('button[type="submit"]').prop('disabled', false);
        $('#check').on('input', function() {
            if(this.value.length >= 6) {
                $('button[type="submit"]').prop('disabled', false);
            } else {
                $('button[type="submit"]').prop('disabled', true);
            }
        });
    });
</script>
</html>