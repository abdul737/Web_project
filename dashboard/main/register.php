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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        echo "Connected";

        $statement = $connection->prepare('INSERT INTO user (name, surname, password, email, phoneNumber, position)
            VALUES (?, ?, ?, ?, ?, ?)');
        if(!$statement){
            echo "Statement is false";
        }

        $statement->bind_param("ssssss", $name, $surname, $password, $email, $phoneNumber, $position);

        $result = $statement->execute();
        if($result){
            echo "Inserted into USER table";
            $parent_id = $statement->insert_id;
            $stmt = $connection->prepare('INSERT INTO parent (id) VALUE (?)');
            $stmt->bind_param("i", $parent_id);
            $result = $stmt->execute();
            if($result){
                echo "Inserted into PARENT table";
                require_once("login.html");
                exit;
            }else{
                echo "result Problem";
            }

        }else {
            echo "Error in Insertion";
        }
        if($connection != null){
            $statement->close();
            $connection->close();
        }
    }
}

    require_once ("register.htm");

?>


