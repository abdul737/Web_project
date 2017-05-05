<?php

/**
 * Cannot use Parent because it is a keyword
 *
 */

require_once ("User.php");

class _Parent extends User
{
  private $passport;

  //constructors

  public function _construct($userId, $name, $surname, $password, $email, $phoneNumber)
  {
      parent::_construct('p', $userId, $name, $surname, $email, $phoneNumber, $password);
      $this->passport = null;
  }
}
?>
