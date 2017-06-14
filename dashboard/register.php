<?php
/**
 * Created by Abdulbosid.
 * User: madi
 * Date: 4/24/17
 * Time: 9:46 AM
 */
require_once("functions.php");
$name =
$email =
$surname =
$password =
$phoneNumber = null;
$error = null;
$position = "p";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['password'])) {
    $name = (string)test_input($_POST["name"]);
    $email = (string)test_input($_POST["email"]);
    $surname = (string)test_input($_POST["surname"]);
    $password = (string)test_input($_POST["password"]);
    $phoneNumber = (string)test_input($_POST["phoneNumber"]);
}

if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    $nameErr = "Only letters and white space allowed";
}
if(isset($_POST['password'])){
    if($_POST['password'] == $_POST['confirmPassword']){
        try{
            $connection = connect();
        }catch (Exception $err){
            error_log($err->getMessage());
            return;
        }
        $statement = $connection->prepare('INSERT INTO user (name, surname, password, email, phoneNumber, position)
            VALUES (?, ?, ?, ?, ?, ?)');
        if(!$statement){
            error_log("reg.php: error with the prepared statement");
            return;
        }
        $statement->bind_param("ssssss", $name, $surname, $password, $email, $phoneNumber, $position);
        $result = $statement->execute();
        if($result){
            error_log("reg.php: inserted into USER table");
            $parent_id = $statement->insert_id;
            $stmt = $connection->prepare('INSERT INTO parent (id) VALUE (?)');
            $stmt->bind_param("i", $parent_id);
            $result = $stmt->execute();
            if($result){
                error_log("reg.php: inserted into PARENT table");
                $id = str_pad($parent_id,  6, "0", STR_PAD_LEFT);
                echo "<script>alert('Your ID is p$id. You should use it as login')</script>";
                require_once("login.php");
                exit;
            }else{
                error_log("reg.php: not inserted into PARENT table");
            }
        }else {
            error_log("reg.php: not inserted into USER table");
        }
        if($connection != null){
            $statement->close();
            $connection->close();
        }
    }else{
        echo "<script>alert('Passwords does not match')</script>";
    }
}

require_once("register.htm");
?>

<!doctype html>
<html lang="en">


<head>
    <?php include "include/includesHeader.html"; ?>
    <title>Registration - Edu Management System</title>
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
            <a class="navbar-brand" href="#registration">Edu Management System</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class=" active ">
                    <a href="register.php">
                        <i class="material-icons">person_add</i> Register
                    </a>
                </li>
                <li class="">
                    <a href="login.php">
                        <i class="material-icons">fingerprint</i> Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="wrapper wrapper-full-page">
    <div class="full-page register-page" filter-color="black" data-image="../assets/img/login.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="card card-signup" id="registration">
                        <h2 class="card-title text-center">Register</h2>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" data-toggle="validator" role="form">
                                    <div class="card-content">
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">face</i>
                                                </span>
                                            <input type="text" class="form-control" placeholder="First Name..." name="name" required>
                                            <input type="text" class="form-control" placeholder="Last Name..." name="surname" required>
                                        </div>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">phone</i>
                                                </span>
                                            <input type="text" class="form-control" placeholder="Phone Number..." name="phoneNumber" required>
                                        </div>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">email</i>
                                                </span>
                                            <input type="email" class="form-control" placeholder="Email..." name="email" data-error="Bruh, that email address is invalid">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                            <input type="password" data-minlength="6" placeholder="Password" id="inputPassword" class="form-control" name="password" required/>
                                            <div class="help-block">Minimum of 6 characters</div>
                                        </div>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                            <input type="password" placeholder="Confirm Password..." class="form-control" name="confirmPassword" data-match="#inputPassword" data-match-error="Whoops, these don't match" required/>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="terms" data-error="Before you wreck yourself" required>
                                                I accept to thank developers
                                                <div class="help-block with-errors"></div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
<?php
include "include/includesFooter.html";
?>
<script type="text/javascript">
    $().ready(function() {
        main.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 1000)
    });
</script>


</html>

