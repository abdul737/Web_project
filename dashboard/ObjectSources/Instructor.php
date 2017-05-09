<?php

require_once "User.php";

class Instructor extends User
{
    private $taughtGroup = array();



  //constructors
  public function __construct($userId, $name, $surname, $password, $photo = null, $email = null, $phoneNumber = null)
  {
    parent::__construct($userId, $name, $surname, $email, $phoneNumber , $password);

  }



    /**
     * @param array $taughtGroup
     */
    public function setTaughtGroup($taughtGroup)
    {
        $this->taughtGroup = $taughtGroup;
    }

    /**
     * @return array
     */
    public function getTaughtGroup()
    {
        return $this->taughtGroup;
    }

    public function addGroup(Group $group)
    {
        array_push($this->taughtGroup, $group);
    }



}
 ?>
