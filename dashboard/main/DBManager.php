<?php

namespace databaseManager;
require_once "DBConnect.php";
require_once "./ObjectSources/_Parent.php";
require_once "./ObjectSources/Student.php";
require_once "ObjectSources/Course.php";

use \Exception;
use \Course;

class DBManager
{
    private function __construct(){}

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
        $position = "p";
        $statement->bind_param("ssssss", $name, $surname, $password, $email, $phoneNumber, $position);

        if($statement->execute()){
            error_log("reg.php: inserted into USER table");
            if($stmt = $connection->prepare('INSERT INTO parent (id) VALUE (?)')){
                $stmt->bind_param("i", $parent_id);
                $stmt->execute();
                $parent_id = $statement->insert_id;

                error_log("reg.php: inserted into PARENT table");

                $stmt->free_result();
                $stmt->close();
                $statement->free_result();
                $statement->close();
                $connection->close();
                return $parent_id;
            }else{
                error_log("reg.php: not inserted into PARENT table");
            }
            $stmt->close();
        }else {
            error_log("reg.php: not inserted into USER table");
        }

        if($connection != null){
            $statement->free_result();
            $statement->close();
        }
        return -1;
    }

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
            $statement->bind_param("ssss", $password, $email, $name,
                $surname, $phoneNumber, "s", $birthdate, $photo);
            $statement->execute();
            $id = $statement->insert_id;
            $student->setId($id);

            $statement->free_result();
            $statement->close();
        } else
        {
            error_log("WHILE INSERTING STUDENT TO USER TABLE");
        }

        /* INSERTING STUDENT PARENT RELATIONSHIP INTO TABLE CUSTOMER*/
        $query = "INSERT INTO customer VALUES(?,?)";
        if ($statement = self::getConnection()->prepare($query))
        {
            $statement->bind_param("ii", $id, $parent->getId());
            $statement->execute();

            $statement->free_result();
            $statement->close();
        } else
        {
            error_log("WHILE INSERTING STUDENT PARENT RELATIONSHIP INTO TABLE CUSTOMER");
        }
        /* INSERTING STUDENT AND TOTALPOINTS INTO TABLE STUDENT*/
        $query = "INSERT INTO student VALUES(?,?)";
        if ($statement = self::getConnection()->prepare($query))
        {
            $statement->bind_param($id, $totalPoints);
            $statement->execute();

            $statement->free_result();
            $statement->close();
        } else
        {
            error_log("WHILE INSERTING STUDENT AND TOTALPOINTS INTO TABLE STUDENT");
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
        $query = "SELECT password, email, name, surname, phoneNumber, birthdate, photoFileId FROM user WHERE id=?";
        if ($statement = self::getConnection()->prepare($query)) {
            $statement->bind_param("i", $id);
            $statement->execute();
            $statement->store_result();
            $statement->bind_result($password, $email, $name, $surname, $phoneNumber, $birthdate, $photo);
            $statement->fetch();

            $statement->free_result();
            $statement->close();
        } else
        {
            error_log("While selecting student with id = " . $id);
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

            $statement->free_result();
            $statement->close();
        }
        else
        {
            error_log("WHILE SELECTING TOTALPOINTS FROM TABLE STUDENT");
        }
        /* RETURNING NEW STUDENT OBJECT, EXCEPT PARENT EVERYTHING WAS FETCHED*/
        return new \Student($id, $name, $surname, $parent, $password, $birthdate, $email, $phoneNumber, $totalPoints);
    }

    public static function selectAllStudentsOfParent(\_Parent $parent)
    {
        echo "\nSelecting";
        $allStudents = array();
        $parentId = $parent->getId();


        /* GETTING ARRAY OF IDS' FOR PARENT FROM CUSTOMER*/
        $query = "SELECT * FROM customer INNER JOIN user ON user.id=customer.studentID INNER JOIN student ON student.id=customer.studentID WHERE customer.parentID=? ";
        if ($statement = self::getConnection()->prepare($query))
        {
            $statement->bind_param("i", $parentId);
            $statement->execute();
            $result = $statement->get_result();
            while ($row = $result->fetch_assoc())
            {
                if ($row["position"] == "s")
                {
                    $id = $row["id"];
                    $password = $row["password"];
                    $name = $row["name"];
                    $surname = $row["surname"];
                    $email = $row["email"];
                    $phoneNumber = $row["phoneNumber"];
                    $birthdate = $row["birthdate"];
                    $totalPoints = $row["totalPoints"];
                    $student = new \Student($id, $name, $surname, $parent, $password, $birthdate, $email, $phoneNumber, $totalPoints);
                    array_push($allStudents, $student);
                }else
                {
                    error_log("Error: Id(".$id.") doesn't belong to student!");
                }
            }

            $statement->free_result();
            $statement->close();
        } else
        {
            error_log("WHILE GETTING ARRAY OF studentIDS' FOR PARENT FROM CUSTOMER");
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

            $statement->free_result();
            $statement->close();
        } else
        {
            error_log("WHILE GETTING ARRAY OF studentIDS' FOR GROUP FROM attendingStudents");
        }
        return $allStudents;
    }
    public static function selectAllCourses()
    {
        $courses = array();
        $query = "SELECT * FROM course";
        if ($statement = self::getConnection()->prepare($query))
        {
            $statement->execute();
            $statement->store_result();
            $statement->bind_result($id, $title, $length);
            while($statement->fetch())//object fetches only id of the student
            {
                array_push($courses, new Course($id, $title, $length));
            }

            $statement->free_result();
            $statement->close();
        }else
        {
            error_log("WHILE GETTING ARRAY OF studentIDS' FOR GROUP FROM attendingStudents");
        }
        return $courses;
    }
}

