<?php
class Admin extends User
{


  //constructor
  public function _construct($userId, $name, $email, $phoneNumber,  $birthdate,$password , $lastLogin = null, $photo = null)
  {
    parent::_construct($userId, $name, $email, $phoneNumber,  $birthdate, $password,  $lastLogin , $photo);
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
     * @param Kid $kid
     * @param Course $course
     */
  public function acceptKid(Kid $kid, Course $course)
  {
    return;
  }

    /**
     * @param Kid $kid
     * @param Course $course
     */
  public function addRequest(Kid $kid, Course $course)
  {
      return;
  }


}
 ?>
