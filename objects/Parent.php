<?php
class Parent extends User
{
  private $passportNumber;
  private $passportDueDate;
  private $passportGetInfo;

  //constructors
  public function _construct($userId, $name, $email, $phoneNumber, $password, $birthdate, $createDate, $lastLogin)
  {
    parent::_construct($userId, $name, $email, $phoneNumber, $password, $birthdate, $createDate, $lastLogin);
  }
  public function _construct($userId, $name, $email, $phoneNumber, $password, $birthdate, $createDate, $lastLogin, $passportNumber, $passportDueDate, $passportGetInfo)
  {
    parent::_construct($userId, $name, $email, $phoneNumber, $password, $birthdate, $createDate, $lastLogin);
    $this->passportNumber = $passportNumber;
    $this->passportDueDate = $passportDueDate;
    $this->passportGetInfo = $passportGetInfo;
  }

  //public setter and getter methods
  public function getPassportNumber() {return $passportNumber;}
  public function setPassportNumber($value) { $this->passportNumber=$value; }
  public function getPassportDueDate() {return $passportDueDate;}
  public function setPassportDueDate($value) { $this->passportDueDate=$value; }
  public function getPassportGetInfo() {return $passportGetInfo;}
  public function setPassportGetInfo($value) { $this->passportGetInfo=$value; }
}
?>
