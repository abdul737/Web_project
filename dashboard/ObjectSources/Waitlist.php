<?php

class Waitlist
{
    private $waitlistId;
    private $parentID;
    private $studentID;
    private $courseID;
    private $days;
    private $confirmed;
    private $create_time;

    public function __construct($waitlistId, $parentID, $studentID, $courseID, $days, $confirmed, $create_time)
    {
        $this->waitlistId = $waitlistId;
        $this->parentID = $parentID;
        $this->studentID = $studentID;
        $this->courseID = $courseID;
        $this->days = $days;
        $this->confirmed = $confirmed;
        $this->create_time = $create_time;
    }

    public function getWaitlistId()
    {
        return $this->waitlistId;
    }

    public function setWaitlistId($waitlistId)
    {
        $this->waitlistId = $waitlistId;
    }

    public function getParentID()
    {
        return $this->parentID;
    }

    public function setParentID($parentID)
    {
        $this->parentID = $parentID;
    }

    public function getStudentID()
    {
        return $this->studentID;
    }

    public function setStudentID($studentID)
    {
        $this->studentID = $studentID;
    }

    public function getCourseID()
    {
        return $this->courseID;
    }

    public function setCourseID($courseID)
    {
        $this->courseID = $courseID;
    }

    public function getDays()
    {
        return $this->days;
    }

    public function setDays($days)
    {
        $this->days = $days;
    }

    public function getConfirmed()
    {
        return $this->confirmed;
    }

    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;
    }

    public function getCreateTime()
    {
        return $this->create_time;
    }

    public function setCreateTime($create_time)
    {
        $this->create_time = $create_time;
    }

}