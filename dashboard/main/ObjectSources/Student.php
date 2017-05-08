<?php

/**
 * I have made some minor changes:
 * 1) PHP does not support function overloading, so 1 constructor eliminated and default value added to $points
 * 2) get functions must return $this-><property of the class>
 */

require_once ("User.php");

class Student extends User
{
    private $birthdate;
    private $totalPoints;
    private $groups = array();
    private $parent;
    private $submittedAssignments = array();

    public function __construct($userId, $name, $surname, $password, $birthdate = null, $email = null, $phoneNumber = null)
    {
        parent::__construct($userId, $name, $surname, $password, $email, $phoneNumber);
        $this->parent = null;
        $this->setGroups(null);
        $this->setBirthdate($birthdate);
    }

    public function getTotalPoints()
    {
        return $this->totalPoints;
    }

    public function addToPoints($value)
    {
        if($value > 0)
            $this->totalPoints += $value;
    }

    public function getGroups()
    {
        return $this->groups;
    }

    public function setGroups($groups)
    {
        $this->groups = $groups;
    }

    public function addGroup($group){
        if($this->groups == null)
            $this->groups = array();
        array_push($this->groups, $group);
    }

    public function deleteGroup($group){
        throw new Exception("not done yet");
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent(_Parent $parent)
    {
        $this->parent = $parent;
    }

    public function getSubmittedAssignments()
    {
        return $this->submittedAssignments;
    }

    public function setSubmittedAssignments($submittedAssignments)
    {
        $this->submittedAssignments = $submittedAssignments;
    }

    public function addSubmittedAssignment($submittedAssignment){
        throw new Exception("not done yet");
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }
}
?>
