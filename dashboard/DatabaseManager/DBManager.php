<?php

/**
 * There must be some mechanism to create a
 * database during installation of the app.
 * All the tables must be there in the database
 * just after installation.
 */

namespace DatabaseManager;

class DBManager
{
    /**
     * Establishing connection with DatabaseManager server
     */
    public static function getConnection()
    {
        if(DBConnect::$connection == null)
        {
            DBConnect::connect();
        }
        return DBConnect::$connection;
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
        $result = self::getConnection()->query($sql);

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