<?php
class User extends User
{
  //private fields
  private double $points;

  //constructors
  public function _construct($userId, $name, $email, $phoneNumber, $password, $birthdate, $createDate, $lastLogin)
  {
    parent::_construct($userId, $name, $email, $phoneNumber, $password, $birthdate, $createDate, $lastLogin);
    $points = 0;
  }
  public function _construct($userId, $name, $email, $phoneNumber, $password, $birthdate, $createDate, $lastLogin, $points)
  {
    parent::_construct($userId, $name, $email, $phoneNumber, $password, $birthdate, $createDate, $lastLogin);
    $this->points = $points;
  }

  //public setter and getter methods
  public function getPoints()
  {
    return $points;
  }
  public function addToPoints($value=0)
  {
    $points += $value;
  }
}
?>
