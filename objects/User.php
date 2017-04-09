<?php
public abstract class User {
  //private fields (not any is constant yet)
  private int $userId;//not sure about type
  private string $name;//quite sure about type
  private string $email;//quite sure about type
  private string $phoneNumber; //quite sure about type
  private string $password;//quite sure about type
  private string $birthdate; //possibly type will be changed
  private string $createDate; //possibly type will be changed
  private string $lastLogin; //possibly type will be changed

  //constructor
  public function _construct($userId, $name, $email, $phoneNumber, $password, $birthdate, $createDate, $lastLogin)
  {
    $this->userId = $userId;
    $this->name = $name;
    $this->email = $email;
    $this->phoneNumber = $phoneNumber;
    $this->password = $password;
    $this->birthdate = $birthdate;
    $this->createDate = $createDate;
    $this->lastLogin = $lastLogin;
  }

  //public setter and getter methods
  public function getUserId() {return $userId;}
  public function setUserId($value) { $this->userId=$value; }
  public function getName() {return $name;}
  public function setName($value) { $this->name=$value; }
  public function getEmail() {return $email;}
  public function setEmail($value) { $this->email=$value; }
  public function getPhoneNumber() {return $phoneNumber;}
  public function setPhoneNumber($value) { $this->phoneNumber=$value; }
  public function getCheckPassword($value) {return $password == $value;}
  public function setPassword($value) { $this->password=$value; }
  public function getBirthdate() {return $birthdate;}
  public function setBirthdate($value) { $this->userId=$value; }
  public function getCreateDate() {return $createDate;}
  public function getLastLogin() {return $lastLogin;}
  public function setLastLogin($value) { $this->lastLogin=$value; }

}
?>
