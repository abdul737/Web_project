<?php
require_once "databaseManager/DBManager.php";
if(isset($_GET["name"]))
{
    $user = new Student(001, "Abdulbosid", "Khamidov", "passme", "14.08.1996", "abdul618@gmail.com", "+998909110044");
    $user2 = new Student(003, "Sherzod", "Rajabov", "passme", "12.04.1993", "sherzod@gmail.com", "+998977777777");
    $name =  $_GET["name"];

    if ($name == "Sherzod")
    {
        echo json_encode($user2);#not working
    }
    if ($name == "Abdulbosid")
    {
        echo '
        [
            {
                "Abdulbosid":
                {
                    "id":"u1510388"
                    "surname":"Khamidov"
                }
            }
        ]
        ';
    }
}
?>