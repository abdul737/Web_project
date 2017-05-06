<?php
/**
 * Created by PhpStorm.
 * User: dfdf
 * Date: 28.04.2017
 * Time: 2:37
 */

namespace databaseManager;
require_once "DBConnect.php";

use \Exception;

class DBManager
{
    private static function getConnection()
    {
        try{
            return DBConnect::getConnection();
        } catch (Exception $err){
            error_log($err->getMessage());
            error_log($err->getTrace());
        }
        return;
    }

    public static function insertParent(\_Parent $parent){
        $connection = self::getConnection();
        $statement = $connection->prepare('INSERT INTO user (name, surname, password, email, phoneNumber, position) VALUES (?, ?, ?, ?, ?, ?)');
        if(!$statement){
            error_log("reg.php: error with the prepared statement");
            return;
        }
        $name = $parent->getName();
        $surname = $parent->getSurname();
        $password = $parent->getPassword();
        $email = $parent->getEmail();
        $phoneNumber = $parent->getPhoneNumber();
        $statement->bind_param("ssssss", $name, $surname, $password, $email, $phoneNumber, "p");

        $result = $statement->execute();
        if($result){
            error_log("reg.php: inserted into USER table");
            $parent_id = $statement->insert_id;
            $stmt = $connection->prepare('INSERT INTO parent (id) VALUE (?)');
            $stmt->bind_param("i", $parent_id);
            $result = $stmt->execute();
            if($result){
                error_log("reg.php: inserted into PARENT table");
                $stmt->close();
                $statement->close();
                return $parent_id;
            }else{
                error_log("reg.php: not inserted into PARENT table");
            }
            $stmt->close();
        }else {
            error_log("reg.php: not inserted into USER table");
        }

        if($connection != null){
            $statement->close();
        }
        return 0;
    }

    /* NEW CHANGES FROM HERE*/

    public static function insertStudent(\Student $student, \_Parent $bindParent = null)
    {
        $id = null;
        $name = $student->getName();
        $surname = $student->getSurname();
        $birthdate = $student->getBirthdate();
        $password = $student->getPassword();
        $totalPoints = $student->getTotalPoints();
        $photo = $student->getPhoto();
        $email = $student->getEmail();
        $phoneNumber = $student->getPhoneNumber();

        if($student->getParent() == null)
        {
            $student->setParent($bindParent);
        }
        $parent = $student->getParent();

        /* INSERTING STUDENT TO USER TABLE*/
        $query = "INSERT INTO user VALUES(?,?,?,?,?,?,?)";
        if ($statement = self::getConnection()->prepare($query))
        {
            $statement->bind_param("ssss", $password, $email, $name, $surname, $phoneNumber, "s", $birthdate, $photo);
            $statement->execute();
            $id = $statement->insert_id;
            $student->setId($id);

            $statement->close();
        } else
        {
            error_log("WHILE INSERTING STUDENT TO USER TABLE", "MYSQLi ERROR");
        }

        /* INSERTING STUDENT PARENT RELATIONSHIP INTO TABLE CUSTOMER*/
        $query = "INSERT INTO customer VALUES(?,?)";
        if ($statement = self::getConnection()->prepare($query))
        {
            $statement->bind_param("ii", $id, $parent->getId());
            $statement->execute();

            $statement->close();
        } else
        {
            error_log("WHILE INSERTING STUDENT PARENT RELATIONSHIP INTO TABLE CUSTOMER", "MYSQLi ERROR");
        }
        /* INSERTING STUDENT AND TOTALPOINTS INTO TABLE STUDENT*/
        $query = "INSERT INTO student VALUES(?,?)";
        if ($statement = self::getConnection()->prepare($query))
        {
            $statement->bind_param($id, $totalPoints);
            $statement->execute();

            $statement->close();
        } else
        {
            error_log("WHILE INSERTING STUDENT AND TOTALPOINTS INTO TABLE STUDENT", "MYSQLi ERROR");
        }
        /*RETURNS STUDENT BACK, WITH ID, PROBABLY WITH PARENT ALSO*/
        return $student;
    }

    public static function selectStudent($id, $parent=null) //with or without parent
    {
        $password = null;
        $email = null;
        $name = null;
        $surname = null;
        $phoneNumber = null;
        $birthdate = null;
        $photo = null;
        $totalPoints = null;
        /* SELECTING STUDENT FROM USER TABLE*/
        $query = "SELECT password, email, name, surname, phoneNumber, birthdate, photo FROM user WHERE id=?";
        if ($statement = self::getConnection()->prepare($query)) {
            $statement->bind_param("i", $id);
            $statement->execute();
            $statement->store_result();
            $statement->bind_result($password, $email, $name, $surname, $phoneNumber, $birthdate, $photo);
            $statement->fetch();

            $statement->close();
        } else
        {
            error_log("While selecting student with id = " . $id, "MYSQLi ERROR");
        }
        /* SELECTING TOTALPOINTS FROM TABLE STUDENT*/
        $query = "SELECT totalPoints FROM student WHERE id=?";
        if($statement = self::getConnection()->prepare($query))
        {
            $statement->bind_param("i", $id);
            $statement->execute();
            $statement->store_result();
            $statement->bind_result($totalPoints);
            $statement->fetch();

            $statement->close();
        }
        else
        {
            error_log("WHILE SELECTING TOTALPOINTS FROM TABLE STUDENT", "MYSQLi ERROR");
        }
        /* RETURNING NEW STUDENT OBJECT, EXCEPT PARENT EVERYTHING WAS FETCHED*/
        return new \Student($id, $name, $surname, $parent, $password, $birthdate, $email, $phoneNumber, $totalPoints);
    }

    public static function selectAllStudentsOfParent(\_Parent $parent)
    {
        $allStudents = array();
        $allStudentIds = array();
        $parentId = $parent->getId();
        /* GETTING ARRAY OF IDS' FOR PARENT FROM CUSTOMER*/
        $query = "SELECT studentID FROM customer WHERE parentID=?";
        if ($statement = self::getConnection()->prepare($query))
        {
            $statement->bind_param("i", $parentId);
            $statement->execute();
            $statement->store_result();
            $statement->bind_result($studentId);
            while ($statement->fetch())
            {
                array_push($allStudentIds, $studentId);
            }
            foreach ($allStudentIds as $studentId) {
                $student = self::selectStudent($studentId, $parent);
                array_push($allStudents, $student);
            }

            $statement->close();
        } else
        {
            error_log("WHILE GETTING ARRAY OF studentIDS' FOR PARENT FROM CUSTOMER", "MYSQLi ERROR");
        }
        return $allStudents;
    }

    public static function selectAllStudentsOfGroup($group)
    {
        $allStudents = array();
        $allStudentIds = array();
        $groupId = $group->getId();
        /* GETTING ARRAY OF IDS' FOR PARENT FROM CUSTOMER*/
        $query = "SELECT studentID FROM customer WHERE groupID=?";
        if ($statement = self::getConnection()->prepare($query))
        {
            $statement->bind_param("i", $groupId);
            $statement->execute();
            $statement->store_result();
            $statement->bind_result($studentId);
            while ($statement->fetch())
            {
                array_push($allStudentIds, $studentId);
            }
            foreach ($allStudentIds as $studentId) {
                $student = self::selectStudent($studentId);
                array_push($allStudents, $student);
            }

            $statement->close();
        } else
        {
            error_log("WHILE GETTING ARRAY OF studentIDS' FOR GROUP FROM attendingStudents", "MYSQLi ERROR");
        }
        return $allStudents;
    }
}

