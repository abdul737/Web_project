<?php

/**
 * I have made some minor changes:
 * 1) PHP does not support function overloading, so 1 constructor eliminated and default value added to $points
 * 2) get functions must return $this-><property of the class>
 */

class Kid extends User
{
  //private fields
  private  $points;

  public function _construct($userId, $name, $email, $phoneNumber, $password, $birthdate, $createDate, $lastLogin, $points = 0)
  {
    parent::_construct($userId, $name, $email, $phoneNumber, $password, $birthdate, $createDate, $lastLogin);
    $this->points = $points;
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
}
?>
