<?php
/**
 * Created by Abdulbosid.
 * User: madi
 * Date: 4/24/17
 * Time: 9:46 AM
 */

////GET is used because phpstorm has issue with POST

require_once("../databaseManager/DBManager.php");
require_once ("register.html");
$name =
$email =
$surname =
$password =
$phoneNumber = null;

$error = null;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $surname = test_input($_POST["surname"]);
    $password = test_input($_POST["password"]);
    $phoneNumber = test_input($_POST["phoneNumber"]);
}
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    $nameErr = "Only letters and white space allowed";
}

if(isset($_POST['password'])){
    if($_POST['password'] == $_POST['confirmPassword']){
            $connection = DatabaseManager\DBConnect::connect();
            $statement = $connection->prepare("INSERT INTO user (name, surname, password, email, phoneNumber) VALUE (?, ?, ?, ?)");
            $statement->bind_params("ssss", $name, $surname, $password, $email, $phoneNumber);

            $result = mysqli_query($connection, $query);
            if($result){
                $parent_id = mysqli_insert_id($connection);
                $query = sprintf("INSERT INTO parent (id) VALUE (%d)",
                    mysqli_real_escape_decimal($parent_id));
                $result = mysqli_query($connection, $query);
                if($result){
                    echo '<meta http-equiv="refresh" content="0; URL=login.html" />';
                }else{
                    $error = "result Problem";
                }

            }else {
                $error = "Error in Insertion";
            }
            $statement->close();
        }
    }else{
        $error = "Null Password!";
    }
    echo "<h1>$error</h1>";

?>