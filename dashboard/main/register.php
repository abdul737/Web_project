<?php
/**
 * Created by Abdulbosid.
 * User: madi
 * Date: 4/24/17
 * Time: 9:46 AM
 */
require_once ("functions.php");
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
        $connection = connect();
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
require_once ("register.htm");
?>
