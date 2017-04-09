<?php

/**
 * Cannot use Parent because it is a keyword
 *
 */

class _Parent extends User
{
  private $passportNumber;
  private $passportDueDate;
  private $passportGetInfo;

  //constructors

  public function _construct($userId, $name, $email, $phoneNumber, $password, $birthdate, $createDate, $lastLogin,
                             $passportNumber = "AAXXXXXXX", $passportDueDate = "20XX.XX.XX", $passportGetInfo = "")
  {
    parent::_construct($userId, $name, $email, $phoneNumber, $password, $birthdate, $createDate, $lastLogin);
    $this->passportNumber = $passportNumber;
    $this->passportDueDate = $passportDueDate;
    $this->passportGetInfo = $passportGetInfo;
  }

  //public setter and getter methods
  public function getPassportNumber() {return $this->passportNumber;}
  public function setPassportNumber($value) { $this->passportNumber=$value; }
  public function getPassportDueDate() {return $this-> passportDueDate;}
  public function setPassportDueDate($value) { $this->passportDueDate=$value; }
  public function getPassportGetInfo() {return $this-> passportGetInfo;}
  public function setPassportGetInfo($value) { $this->passportGetInfo=$value; }
}
?>
