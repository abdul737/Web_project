<?php

require_once "User.php";

class Instructor extends User
{
    private $birthdate;
    private $taughtGroup = array();


    //constructors
    public function __construct($userId, $name, $surname, $password, $photoField = null,
                                $email = null, $phoneNumber = null)
    {
        parent::__construct($userId, $name, $surname, $password, $email, $phoneNumber);
        $this->setPhotoFile($photoField);
    }

    /**
     * @return array
     */
    public function getTaughtGroup()
    {
        return $this->taughtGroup;
    }

    /**
     * @param array $taughtGroup
     */
    public function setTaughtGroup($taughtGroup)
    {
        $this->taughtGroup = $taughtGroup;
    }

    public function addGroup(Group $group)
    {
        array_push($this->taughtGroup, $group);
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param mixed $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }


}

?>
