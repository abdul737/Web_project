<?php
class Instructor extends User
{
    private $taughtGroup = array();



  //constructors
  public function _construct($userId, $name, $email, $phoneNumber, $password, $birthdate, $lastLogin  = null, $photo = null)
  {
    parent::_construct($userId, $name, $email, $phoneNumber , $password , $birthdate, $lastLogin , $photo);



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
