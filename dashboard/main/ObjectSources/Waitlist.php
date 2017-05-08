<?php

/**
 * Created by PhpStorm.
 * User: Abdulbosid
 * Date: 5/8/2017
 * Time: 9:40 AM
 */
class Waitlist
{
    private $parentID;
    private $studentID;
    private $courseID;
    private $days;

    /**
     * Waitlist constructor.
     * @param $parentID
     * @param $studentID
     * @param $courseID
     * @param $days
     */
    public function __construct($parentID, $studentID, $courseID, $days)
    {
        $this->parentID = $parentID;
        $this->studentID = $studentID;
        $this->courseID = $courseID;
        $this->days = $days;
    }


    /**
     * @return mixed
     */
    public function getParentID()
    {
        return $this->parentID;
    }

    /**
     * @param mixed $parentID
     */
    public function setParentID($parentID)
    {
        $this->parentID = $parentID;
    }

    /**
     * @return mixed
     */
    public function getStudentID()
    {
        return $this->studentID;
    }

    /**
     * @param mixed $studentID
     */
    public function setStudentID($studentID)
    {
        $this->studentID = $studentID;
    }

    /**
     * @return mixed
     */
    public function getCourseID()
    {
        return $this->courseID;
    }

    /**
     * @param mixed $courseID
     */
    public function setCourseID($courseID)
    {
        $this->courseID = $courseID;
    }

    /**
     * @return mixed
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param mixed $days
     */
    public function setDays($days)
    {
        $this->days = $days;
    }
}