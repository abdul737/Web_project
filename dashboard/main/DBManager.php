<?php

namespace databaseManager;
require_once "DBConnect.php";

require_once "./ObjectSources/_Parent.php";
require_once "./ObjectSources/Student.php";
require_once "ObjectSources/Course.php";
require_once "ObjectSources/Waitlist.php";

require_once ("functions.php");

use \Exception;
use \Course;
use \Student;

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

    public static function updateParent(\_Parent $parent){
        $connection = self::getConnection();
        $query = 'UPDATE user SET name=?, surname=?, password=?, email=?, phoneNumber=? WHERE id=?';
        $statement = $connection->prepare($query);
        if(!$statement){
            error_log("reg.php: error with the prepared statement");
            return;
        }
        $id = $parent->getId();
        $name = $parent->getName();
        $surname = $parent->getSurname();
        $password = $parent->getPassword();
        $email = $parent->getEmail();
        $phoneNumber = $parent->getPhoneNumber();
        $statement->bind_param("sssssi", $name, $surname, $password, $email, $phoneNumber, $id);

        if($statement->execute()){
            error_log("reg.php: parent updated into USER table");
            /* CAN BE USED IF THERE WILL BE OTHER PARAMETERS THAN ID IN PARENT TABLE
             * if($stmt = $connection->prepare('INSERT INTO parent (id) VALUE (?)')){
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
            */
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
            echo "test<br>";
            $statement->bind_param("ssssssi", $password, $email, $name,
                $surname, $phoneNumber, "s", $photo);
            $statement->execute();
            $id = $statement->insert_id;
            echo "ID: ";
            echo $statement->insert_id;
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
        $query = "INSERT INTO student VALUES(?,?,?)";
        if ($statement = self::getConnection()->prepare($query))
        {
            $statement->bind_param("ids", $id, $totalPoints, $birthdate);
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
        $query = "SELECT password, email, name, surname, phoneNumber, photoFileId FROM user WHERE id=?";
        if ($statement = self::getConnection()->prepare($query)) {
            $statement->bind_param("i", $id);
            $statement->execute();
            $statement->store_result();
            $statement->bind_result($password, $email, $name, $surname, $phoneNumber, $photo);
            $statement->fetch();

            $statement->free_result();
            $statement->close();
        } else
        {
            error_log("While selecting student with id = " . $id);
        }
        /* SELECTING TOTALPOINTS FROM TABLE STUDENT*/
        $query = "SELECT totalPoints, birthdate FROM student WHERE id=?";
        if($statement = self::getConnection()->prepare($query))
        {
            $statement->bind_param("i", $id);
            $statement->execute();
            $statement->store_result();
            $statement->bind_result($totalPoints, $birthdate);
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
        $courses = null;
        $query = "SELECT * FROM course";
        if ($statement = self::getConnection()->prepare($query))
        {
            $statement->execute();
            $statement->store_result();
            $statement->bind_result($id, $title, $length, $ageLimit);
            $courses = array();
            while($statement->fetch())//object fetches only id of the student
            {
                array_push($courses, new Course($id, $title, $length, $ageLimit));
            }

            $statement->free_result();
            $statement->close();
        }else
        {
            error_log("WHILE GETTING ARRAY OF studentIDS' FOR GROUP FROM attendingStudents");
        }
        return $courses;
    }

    public static function insertOrGetWaitlist($parentID, $studentId = null, $courseId = null, $selectTime = null)
    {
        $waitlist = array();
        if (isset($studentId) && isset($courseId) && isset($selectTime)) {
            /* INSERTING TO WAITLIST */
            $query = "INSERT INTO waitlist(parentID, studentID, courseID, days) VALUES(?,?,?,?)";
            if ($statement = self::getConnection()->prepare($query)) {
                $statement->bind_param("iiis", $parentID, $studentId, $courseId, $selectTime);
                $statement->execute();

                $statement->free_result();
                $statement->close();
            } else {
                error_log("ERROR WHILE INSERTING TO WAITLIST");
            }
        }
        /* SELECTING FROM WAITLIST */
        $query = "SELECT * FROM waitlist WHERE parentID=?";
        if ($statement = self::getConnection()->prepare($query)) {
            $statement->bind_param("i", $parentID);
            $statement->execute();
            $result = $statement->get_result();
            while ($row = $result->fetch_assoc()) {
                $wait = new \Waitlist($parentID, $row["studentID"], $row["courseID"], $row["days"]);
                array_push($waitlist, $wait);
            }
        } else {
            error_log("ERROR WHILE SELECTING FROM WAITLIST");
        }
        return $waitlist;
    }

    public static function selectAllParents(){
        $parents = null;
        $query = "SELECT user.id, name, surname, email, phoneNumber, password FROM parent INNER JOIN user ON user.id = parent.id";
        if ($statement = self::getConnection()->prepare($query))
        {
            $statement->execute();
            $statement->store_result();
            $statement->bind_result($id, $name, $surname, $email, $phoneNumber, $password);
            $parents = array();
            while($statement->fetch())//object fetches only id of the student
            {
                array_push($parents, new \_Parent($id, $name, $surname, $password, $email, $phoneNumber));
            }

            $statement->free_result();
            $statement->close();
        }else
        {
            error_log("WHILE GETTING ARRAY OF studentIDS' FOR GROUP FROM attendingStudents");
        }
        return $parents;
    }

    public static function selectAllStudents(){
        $students = null;
        $query = "SELECT id FROM student";
        if ($statement = self::getConnection()->prepare($query))
        {
            $statement->execute();
            $statement->store_result();
            $statement->bind_result($id);
            $students = array();
            while($statement->fetch())//object fetches only id of the student
            {
                $student = self::getStudent($id);
                array_push($students, $student);
            }

            $statement->free_result();
            $statement->close();
        }else
        {
            error_log("WHILE GETTING ARRAY OF studentIDS' FOR GROUP FROM attendingStudents");
        }
        return $students;
    }

    public static function getStudent($id){
        $student = null;
        $connection = connect();
        $statement = $connection->prepare('SELECT birthdate FROM student WHERE id = ?');
        $statement->bind_param("i", $id);
        $statement->execute();
        $birthdate = null;
        $statement->bind_result($birthdate);
        $statement->fetch();
        $statement->close();

        $statement = $connection->prepare('SELECT name, surname, email, phoneNumber FROM user WHERE id = ?');
        $statement->bind_param("i", $id);
        $statement->execute();
        $name = null;
        $surname = null;
        $email = null;
        $phoneNumber = null;
        $statement->bind_result($name, $surname, $email, $phoneNumber);
        if($statement->fetch()){
            $student = new Student($id, $name, $surname, null, $birthdate, $email, $phoneNumber);
            error_log($student->getEmail());
        }else{
            error_log(__FILE__.": not found in USER table");
            return;
        }
        $statement->close();

        $statement = $connection->prepare('SELECT groupID FROM attendingStudent WHERE studentID = ?');
        $statement->bind_param("i", $id);
        $statement->execute();
        $statement->store_result();
        $num_rows = $statement->num_rows;
        if($num_rows == 0){
            error_log(__FILE__.": there is no group");
            return;
        }
        $groupID = null;
        $statement->bind_result($groupID);
        while($statement->fetch()){
            $group = getChildGroup($groupID);
            $student->addGroup($group);
        }
        error_log(__FILE__.": all groups are inserted for ". $id);
        return $student;
    }

    private static function getChildGroup($groupID){
        $group = new Group($groupID, null, null, null);
        $connection = self::getConnection();
        $stmt = $connection->prepare('SELECT courseID FROM `group` WHERE id = ?');
        $stmt->bind_param("i", $groupID);
        $stmt->execute();
        $courseID = null;
        $stmt->bind_result($courseID);
        if(!$stmt->fetch()){
            error_log(__FILE__.": error in getting COURSE_ID FROM GROUP table");
            return;
        }
        $stmt->close();
        error_log(__FILE__.": course id gotten");

        $stmt = $connection->prepare('SELECT title FROM course WHERE id = ?');
        $stmt->bind_param("i", $courseID);
        $stmt->execute();
        $courseTitle = null;
        $stmt->bind_result($courseTitle);
        if(!$stmt->fetch()){
            error_log(__FILE__.": error in getting TITLE FROM COURSE table");
            return;
        }
        $course = new Course($courseID, $courseTitle, 0);
        $stmt->close();
        $group->setCourse($course);
        return $group;
    }

    public static function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}

