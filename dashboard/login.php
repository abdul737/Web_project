<?php
//////////////////
/// the objects are stored in $_SESSION and the index is the name of the class
/// for example $_SESSION['parent']

require_once("functions.php");
require_once("ObjectSources/_Parent.php");
require_once("ObjectSources/Group.php");
require_once("ObjectSources/Course.php");
require_once("ObjectSources/Student.php");
require_once("ObjectSources/Admin.php");

require_once("databaseManager/DBManager.php");

use \databaseManager\DBManager;

if(session_start()){
    $_COOKIE['profile_content'] = null;
    session_destroy();
}
session_start();

if(isset($_POST["login"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
    $login = (string)test_input($_POST["login"]);
    $pwd = (string)test_input($_POST["password_l"]);
    if (empty($login) && empty($pwd)) {
        echo "<script>alert('Login or password not written')</script>";
    } else {
        error_log("check");
        check($login, $pwd);
    }
}

function check($login, $password){
    $id = (int)substr($login, 1);
    $userType = $login[0];

    $connection = connect();
    $statement = null;
    if($userType == 'p')
        $statement = $connection->prepare('SELECT * FROM parent WHERE id = ?');
    else if($userType == 'a')
        $statement = $connection->prepare('SELECT * FROM admin WHERE id = ?');
    else if($userType == 's')
        $statement = $connection->prepare('SELECT * FROM student WHERE id = ?');
    else if($userType == 'i')
        $statement = $connection->prepare('SELECT * FROM instructor WHERE id = ?');

    if(isExists($statement, $id)){
        $user = getUser($id, $password);
        if($user) {
            $_SESSION['position'] = $userType;
            if($userType == 'p')
                getParent($id, $user);
            else if($userType == 's'){
                $student = DBManager::getStudent($id);
                $_SESSION['student'] = $student;
                exit;
            }else if($userType == 'i'){
                // read instructor from the database
            }else if($userType == 'a'){
                $admin = getAdmin($user);
                $_SESSION['admin'] = $admin;
                header('Location: profile.php');
                exit;
            }
        }
    }
}

function isExists($statement, $id){
    if(!$statement){
        error_log(__FILE__.": error with the prepared statement");
        return false;
    }
    $statement->bind_param("i", $id);
    $statement->execute();
    $statement->store_result();
    $num_rows = $statement->num_rows;
    $statement->close();
    if($num_rows == 0){
        echo "<script>alert('There is no such user');</script>"; /////SHOULD BE CHANGED IN WRONG LOGIN OR PASSWORD IN THE FUTURE
        return false;
    }
    return true;
}

function getUser($id, $password){
    $connection = \databaseManager\DBConnect::getConnection();
    $user = null;
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
        if($password == null){
            $user = new User($id, $name, $surname, $password, $email, $phoneNumber);
            error_log(__FILE__.": user is created");
        } else if($actual_password == $password){
            $user = new User($id, $name, $surname, $password, $email, $phoneNumber);
            error_log(__FILE__.": user is created");
        }else{
            echo "<script>alert('The login or password is incorrect');</script>";
        }
    }
    $statement->close();
    $connection->close();
    return $user;
}

function getParent($id, $user){
    $parent = new _Parent($id, $user->getName(), $user->getSurname(), $user->getPassword(), $user->getEmail(), $user->getPhoneNumber());
    $_SESSION['position'] = 'p';
    $_SESSION['parent'] = $parent;
    header("Location: profile.php");
    exit;
}

function getAdmin(User $user){
    $admin = new Admin($user->getId(), $user->getName(), $user->getSurname(), $user->getPassword(), $user->getEmail(), $user->getPhoneNumber());

    return $admin;
}
?>

<!doctype html>
<html lang="en">


<head>
    <?php
    include "include/includesHeader.html";
    ?>
    <title>Login - Edu Management System</title>
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
            </ul>
        </div>
    </div>
</nav>
<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" filter-color="black" data-image="../assets/img/login.jpg">
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
                                            <input title="password" name="password_l" id="passwordTextBox" type="password" required class="form-control">
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
                                    <button type="submit" class="btn btn-info btn-simple btn-wd btn-lg">Let's go</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">

            <?php include "include/footer_copyright.html" ?>
        </footer>
    </div>
</div>
</body>
<!-- Including validator.js -->
<script src="../assets/js/validator.js"></script>
<?php
include "include/includesFooter.html";
?>
<script type="text/javascript">
    $().ready(function () {
        setCookie('profile_content', 'editprofile', -1);
    });
</script>
<script type="text/javascript">
    $().ready(function () {
        $("button[type='submit']").prop("disabled", true);
        $('#passwordTextBox').on('input', function() {
            if(this.value.length >= 6) {
                $('button[type="submit"]').prop('disabled', false);
            } else {
                $('button[type="submit"]').prop('disabled', true);
            }
        });
    });
</script>
<script type="text/javascript">
    $().ready(function () {
        main.checkFullPageBackgroundImage();
        setTimeout(function () {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700);
    });
</script>
</html>
