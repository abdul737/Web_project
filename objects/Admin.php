<?php
class Admin extends User
{
  //constructors
  public function _construct($userId, $name, $email, $phoneNumber, $password, $birthdate, $createDate, $lastLogin)
  {
    parent::_construct($userId, $name, $email, $phoneNumber, $password, $birthdate, $createDate, $lastLogin);
  }
}
 ?>
