<?php
class Admin extends User
{
  //constructors
  public function _construct($userId, $name, $email, $phoneNumber,  $birthdate,$password , $lastLogin = null, $photo = null)
  {
    parent::_construct($userId, $name, $email, $phoneNumber,  $birthdate, $password,  $lastLogin , $photo);
  }
}
 ?>
