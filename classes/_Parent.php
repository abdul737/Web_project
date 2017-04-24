<?php

/**
 * Cannot use Parent because it is a keyword
 *
 */

class _Parent extends User
{
  private $passport;

  //constructors

  public function _construct($userId, $name, $email, $phoneNumber,  $birthdate, $password,
                             $lastLogin = null, $photo = null)
  {
      parent::_construct($userId, $name, $email, $phoneNumber,  $birthdate, $password, $lastLogin, $photo);
      $this->passport = $password;
  }
}
?>
