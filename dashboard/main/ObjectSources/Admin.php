<?php
class Admin extends User
{


    //constructor
    public function __construct($userId, $name,$surname,  $birthdate, $password , $lastLogin = null, $photo = null, $email = null, $phoneNumber = null)
    {
        parent::__construct($userId, $name,$surname, $email, $phoneNumber,  $birthdate, $password,  $lastLogin , $photo);
    }


    /**
     * @param Course $course
     */
    public function addCourse(Course $course)
    {
        return;
    }

    /**
     * @param Instructor $instructor
     */
    public function addInstructor(Instructor $instructor)
    {
        return;
    }

    /**
     * @param Group $group
     * @param Course $course
     * @param Instructor $instructor
     * @param array $instructors
     */
    public function assignGroup(Group $group, Course $course, Instructor $instructor, array $instructors)
    {
        return;
    }

    /**
     * @param Student $kid
     * @param Course $course
     */
    public function acceptKid(Student $kid, Course $course)
    {
        return;
    }

    /**
     * @param Student $kid
     * @param Course $course
     */
    public function addRequest(Student $kid, Course $course)
    {
        return;
    }


}
?>
