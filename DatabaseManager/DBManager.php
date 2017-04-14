<?php

/**
 * There must be some mechanism to create a
 * database during installation of the app.
 * All the tables must be there in the database
 * just after installation.
 */

class DBManager
{


    private static $serverName;
    private  static $userName;
    private static  $password;
    private static  $connection;


    /**
     * Establishing connection with DatabaseManager server
     */
    public static function setConnection()
    {
        self::$connection = new mysqli(self::$serverName, self::$userName, self::$password);

        if (self::$connection->connect_error)
            die("Connection failed: " .self::$connection->connect_error);
        else
            echo "Connected successfully";

    }


    /**
     * Setters and Getters.
     * Due to security reasons, there are no get userName
     * and get password methods
     */
    /**
     * @return mixed
     */
    public static function getConnection()
    {
        return self::$connection;
    }

    /**
     * @return mixed
     */
    public static function getServerName()
    {
        return self::$serverName;
    }

    //End of Setters and Getters


    public static function closeConnection()
    {
        mysqli_close(self::$connection);
    }

    /**
     * @param $name
     * Search for parent by name
     */
    public static function readParents($_name)
    {
        $contactDetails = self::readContactDetails($_name);

        //Variables to instantiate a parent
        $userId = $name = $email = $phoneNumber =  $birthdate = $password =
        $passportNumber =  $passportDueDate = $passportGetInfo = $lastLogin = $photo = "";

        $sql = "QUERY MUST BE HERE WHICH ON ";



        foreach ($contactDetails as $contactDetail)
        {
            if ($contactDetail->getName() == $_name)
            {
                $name = $_name;
                $userId = $contactDetail->getId();
                $email = $contactDetail->getEmail();
                $phoneNumber = $contactDetail->getPhoneNumber();
                $photo = $contactDetail->getPhoto();
            }
        }
        return;
    }

    /**
     * @param $name
     * Search for contact details with name $name.
     * Returns an array of ContactDetails ordered by ID in ascending order.
     * @return array of ContactDetails.
     * P.S. Better search algorithm must be implemented.
     */
    public static function readContactDetails($name)
    {
        $sql = "SELECT * FROM ContactDetails WHERE name = '$name' ORDER BY ID DESC";
        $result = self::$connection->query($sql);

        $contactDetails = array();

        if ($result->num_rows > 0) {
            //Push all contact details to array
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $name = $row["name"];
                $photo = $row["photo"];
                $phoneNumber = $row["phoneNumber"];
                $email = $row["email"];

                $contactDetail = new _Parent($id, $name, $phoneNumber, $email, $photo);
                array_push($contactDetails, $contactDetail);

            }
        }

        return $contactDetails;
    }


}