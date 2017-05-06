<?php

 include "Group.php";
 include "Instructor.php";

class Course
{
  private $title;
  private $length;
  private $ageLimit;
  private $courseId;
  private $assignments = array();

  public function __construct($courseId, $title, $length, $ageLimit = null, $assignments = null)
  {
     $this->setAgeLimit($ageLimit);
     $this->setCourseId($courseId);
     $this->setLength($length);
     $this->setTitle($title);

     if ($assignments != null)
         $this->setAssignments($assignments);

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
     * @param array $assignments
     */
    public function setAssignments($assignments)
    {
        $this->assignments = $assignments;
    }

    /**
     * @return array
     */
    public function getAssignments()
    {
        return $this->assignments;
    }

}
 ?>
