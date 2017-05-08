<?php
require_once "Student.php";
class Group
{
    private $id;
    private $venue;
    private $startTime;
    private $kids = array();            //Array of kids
    private $course;    //stores course object id only within it
    private $instructor = array();
    private $assignment = array();
    private $days; //for example Monday/Wednesday/Friday

    public function __construct($id, $course, $venue, $startTime, $kids = null)
    {
        $this->setId($id);
        $this->setCourse($course);
        $this->setStartTime($startTime);
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
     * @param mixed $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * @param mixed $venue
     */
    public function setVenue($venue)
    {
        $this->venue = $venue;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getKids()
    {
        return $this->kids;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @return mixed
     */
    public function getVenue()
    {
        return $this->venue;
    }

    public function addKid(Kid $kid)
    {
        array_push($this->kids,$kid);
    }

    /**
     * @param array $instructor
     */
    public function setInstructor($instructor)
    {
        $this->instructor = $instructor;
    }

    /**
     * @param array $assignment
     */
    public function setAssignment($assignment)
    {
        $this->assignment = $assignment;
    }

    /**
     * @return array
     */
    public function getInstructor()
    {
        return $this->instructor;
    }

    /**
     * @return array
     */
    public function getAssignment()
    {
        return $this->assignment;
    }

    /**
     * @param int $index
     * @return Kid object at given index.
     * Throws OutOfBoundsException if invalid
     * index is provided
     */
    public function getKid($index = 0)
    {
        if ($index >= sizeof($this->kids) || $index < 0)
            throw new OutOfBoundsException();

        return $this->kids[$index];
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
     * @param Kid $kid
     * @return int, if the given kid is found, returns a key (index)
     * of the kid in the array. Otherwise, returns -1 (kid not found)
     */
    public function findKid(Kid $kid)
    {
        foreach (array_keys($this->kids) as $key)
        {
            if ($this->kids[$key] == $kid)
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
        if ($index >= sizeof($this->kids) || $index < 0)
            throw new OutOfBoundsException();
        unset($this->kids[$index]);
        array_values($this->kids);

    }
}