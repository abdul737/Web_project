<?php

/**
 * Cannot use Parent because it is a keyword
 *
 */

require_once ("User.php");

class _Parent extends User
{
  private $passport;
  private $students;

  public function __construct($userId, $name, $surname, $password, $email, $phoneNumber){
      parent::__construct($userId, $name, $surname, $password, $email, $phoneNumber);
      $this->students = array();
      $this->passport = null;
  }

  public function getStudents(){
      return $this->students;
  }

  public function setStudents($students){
      $this->students = $students;
  }

  public function addStudent($student){
      array_push($this->students, $student);
  }
}
?>
