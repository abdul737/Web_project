<?php

/**
 * I have made some minor changes:
 * 1) PHP does not support function overloading, so 1 constructor eliminated and default value added to $points
 * 2) get functions must return $this-><property of the class>
 */

class Kid extends User
{
  //private fields
  private $points;
  private $groups = array();
  private $parent;
  private $submittedAssignments = array();

  public function _construct($userId, $name, $email, $phoneNumber, $password, $birthdate,
                             $createDate, $lastLogin,_Parent $parent, $groups = null ,$points = 0)
  {
    parent::_construct($userId, $name, $email, $phoneNumber, $password, $birthdate, $createDate, $lastLogin);

    $this->points = $points;
    $this->parent = $parent;

    if ($groups != null)
        $this->setGroups($groups);

  }

  //public setter and getter methods
  public function getPoints()
  {
    return $this->points;
  }
  public function addToPoints($value=0)
  {
    $this->points += $value;
  }

    /**
     * @return array
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param array $groups
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     */
    public function setParent(_Parent $parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return array
     */
    public function getSubmittedAssignments()
    {
        return $this->submittedAssignments;
    }

    /**
     * @param array $submittedAssignments
     */
    public function setSubmittedAssignments($submittedAssignments)
    {
        $this->submittedAssignments = $submittedAssignments;
    }


}
?>
