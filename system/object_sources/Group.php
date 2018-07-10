<?php
require_once "Student.php";

class Group
{
    private $id;
    private $venue;

    private $startDate;
    private $endDate;

    private $students = array();            //Array of kids
    private $course;    //stores course object id only within it
    private $instructor = array();
    private $assignment = array();
    private $days; //for example Monday/Wednesday/Friday

    public function __construct($id, $course, $venue, $startDate, $endDate = null, $kids = null)
    {
        $this->setId($id);
        $this->setCourse($course);
        $this->setStartDate($startDate);
        $this->setEndDate($endDate);
        $this->setVenue($venue);

        //If $kids parameter is an array, then assign kids. Else do nothing.
        if ($kids != null)
            $this->setKids($kids);

    }

    //setters and getters

    /**
     * @param array $kids
     */
    public function setKids($kids)
    {
        $this->kids = $kids;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return array
     */
    public function getKids()
    {
        return $this->students;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startTime
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * @param mixed $venue
     */
    public function setVenue($venue)
    {
        $this->venue = $venue;
    }

    public function addKid(StudentPanel $kid)
    {
        array_push($this->students, $kid);
    }

    /**
     * @return array
     */
    public function getInstructor()
    {
        return $this->instructor;
    }

    /**
     * @param array $instructor
     */
    public function setInstructor($instructor)
    {
        $this->instructor = $instructor;
    }

    /**
     * @return array
     */
    public function getAssignment()
    {
        return $this->assignment;
    }

    /**
     * @param array $assignment
     */
    public function setAssignment($assignment)
    {
        $this->assignment = $assignment;
    }

    /**
     * @param int $index
     * @return StudentPanel object at given index.
     * Throws OutOfBoundsException if invalid
     * index is provided
     */
    public function getKid($index = 0)
    {
        if ($index >= sizeof($this->students) || $index < 0)
            throw new OutOfBoundsException();

        return $this->students[$index];
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

    public function getCourse()
    {
        return $this->course;
    }

    public function setCourse($course)
    {
        $this->course = $course;
    }

    /**
     * @param StudentPanel $kid
     * @return int, if the given kid is found, returns a key (index)
     * of the kid in the array. Otherwise, returns -1 (kid not found)
     */
    public function findKid(StudentPanel $kid)
    {
        foreach (array_keys($this->students) as $key) {
            if ($this->students[$key] == $kid)
                return $key;
        }

        return -1;
    }

    /**
     * @param $index
     * Removes a kid at position $index and rearrange all indexes.
     * If index is invalid, OutOfBounds is thrown
     */
    public function removeKid($index)
    {
        if ($index >= sizeof($this->students) || $index < 0)
            throw new OutOfBoundsException();
        unset($this->students[$index]);
        array_values($this->students);

    }
}