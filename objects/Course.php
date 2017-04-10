<?php

 include "Group.php";
 include "Instructor.php";

class Course
{
  private $title;
  private $length;
  private $ageLimit;
  private $group;
  private $courseId;
  private $instructor;

  public function _construct($title, $length, $ageLimit,$courseId ,Instructor $instructor = null, Group $group = null)
  {
     $this->setAgeLimit($ageLimit);
     $this->setCourseId($courseId);
     $this->setLength($length);
     $this->setTitle($title);

     if ($group != null)
      $this->setGroup($group);

     if ($instructor != null)
      $this->setInstructor($instructor);

  }

  //Setters and Getters
    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param mixed $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * @return mixed
     */
    public function getAgeLimit()
    {
        return $this->ageLimit;
    }

    /**
     * @param mixed $ageLimit
     */
    public function setAgeLimit($ageLimit)
    {
        $this->ageLimit = $ageLimit;
    }

    /**
     * @return mixed
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param mixed $group
     */
    public function setGroup(Group $group)
    {
        $this->group = $group;
    }

    /**
     * @param mixed $courseId
     */
    public function setCourseId($courseId)
    {
        $this->courseId = $courseId;
    }

    /**
     * @return mixed
     */
    public function getCourseId()
    {
        return $this->courseId;
    }

    /**
     * @param mixed $instructor
     */
    public function setInstructor(Instructor $instructor)
    {
        $this->instructor = $instructor;
    }

    /**
     * @return mixed
     */
    public function getInstructor()
    {
        return $this->instructor;
    }
    //End of Setters and Getters






}
 ?>
