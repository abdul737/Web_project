<?php

require_once("Group.php");
require_once("Instructor.php");

class Course
{
    private $title;
    private $length;
    private $price;
    private $description;
    private $image;


    private $courseId;
    private $assignments = array();


    public function __construct($courseId, $title, $length, $price, $assignments = null, $description = "", $image = null)
    {
        $this->setCourseId($courseId);
        $this->setLength($length);
        $this->setTitle($title);
        $this->setDescription($description);
        $this->setImage($image);

        if ($assignments != null)
            $this->setAssignments($assignments);

    }

    public function getTitle()
    {
        return $this->title;
    }

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

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getCourseId()
    {
        return $this->courseId;
    }

    /**
     * @param mixed $courseId
     */
    public function setCourseId($courseId)
    {
        $this->courseId = $courseId;
    }

    /**
     * @return array
     */
    public function getAssignments()
    {
        return $this->assignments;
    }

    /**
     * @param array $assignments
     */
    public function setAssignments($assignments)
    {
        $this->assignments = $assignments;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

}

?>
