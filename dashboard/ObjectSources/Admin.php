<?php

require_once("User.php");

class Admin extends User
{
    private $allParents;
    private $allStudents;
    private $allCourses;
    private $allInstructors;

    public function __construct($userId, $name, $surname,  $password , $email = null, $phoneNumber = null)
    {
        parent::__construct($userId, $name, $surname, $password, $email,  $phoneNumber);
        $this->allCourses = array();
        $this->allInstructors = array();
        $this->allParents = array();
        $this->allStudents = array();
    }

    public function setAllParents($allParents)
    {
        if($allParents != null)
            $this->allParents = $allParents;
    }

    public function getAllParents()
    {
        return $this->allParents;
    }

    public function getAllStudents()
    {
        return $this->allStudents;
    }

    public function setAllStudents(array $allStudents)
    {
        if($allStudents != null)
            $this->allStudents = $allStudents;
    }

    public function getAllCourses()
    {
        return $this->allCourses;
    }

    public function setAllCourses($allCourses)
    {
        if($allCourses != null)
            $this->allCourses = $allCourses;
    }

    public function getAllInstructors()
    {
        return $this->allInstructors;
    }

    public function setAllInstructors($allInstructors)
    {
        if($allInstructors != null)
            $this->allInstructors = $allInstructors;
    }

    public function addCourse(Course $course)
    {
        throw new Exception("not implemented yet");
    }

    public function addInstructor(Instructor $instructor)
    {
        throw new Exception("Not implemented yet");
    }

    public function assignGroup(Group $group, Course $course, Instructor $instructor, array $instructors)
    {
        throw new Exception("not implemented yet");
    }

    public function acceptKid(Student $kid, Course $course)
    {
        throw new Exception("not implemented yet");
    }

    public function addRequest(Student $kid, Course $course)
    {
        throw new Exception("not implemented yet");
    }
}
?>
