<?php

/**
 * I have made some minor changes:
 * 1) PHP does not support function overloading, so 1 constructor eliminated and default value added to $points
 * 2) get functions must return $this-><property of the class>
 */

require_once("User.php");

class Student extends User
{
    private $birthdate;
    private $totalPoints;

    /*
    * each group_infolist is formatted as follows:
    *  'group' => $attended_group_object,
    *  'total_points' => $student_group->total_points,
    *  'completion_date' => $student_group->completion_date,
    *  'certificate' => $student_group->certificate
    */
    private $attended_groups_infolist = array();
    private $parent;
    private $submittedAssignments = array();

    public function __construct($userId, $name, $surname, $password, $birthdate = null, $email = null, $phoneNumber = null, $total_points = 0)
    {
        parent::__construct($userId, $name, $surname, $password, $email, $phoneNumber);
        $this->parent = null;
        $this->setBirthdate($birthdate);
        $this->totalPoints = $total_points;
    }

    public function getTotalPoints()
    {
        return $this->totalPoints;
    }

    public function addToPoints($value)
    {
        if ($value > 0)
            $this->totalPoints += $value;
    }

    public function getAttendedGroupsInfolist()
    {
        return $this->attended_groups_infolist;
    }

    /*
     * @argument group_infolist:
     *  'group' => $attended_group_object,
     *  'total_points' => $student_group->total_points,
     *  'completion_date' => $student_group->completion_date,
     *  'certificate' => $student_group->certificate
     */
    public function addGroupInfolist($group_infolist)
    {
        if ($this->attended_groups_infolist == null)
            $this->attended_groups_infolist = array();
        array_push($this->attended_groups_infolist, $group_infolist);
    }

    public function deleteGroup($group)
    {
        throw new Exception("not done yet");
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent(\_Parent $parent)
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

    public function addSubmittedAssignment($submittedAssignment)
    {
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
