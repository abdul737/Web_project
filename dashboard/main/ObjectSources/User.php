<?php

abstract class User {
    private $password;
    private $position;
    private $contactDetails;

    //constructor
    public function _construct($position, $userId, $name, $surname, $email, $phoneNumber, $password)
    {
        $this->position = $position;
        $this->password = $password;
        $this->contactDetails = new ContactDetail($userId, $name, $surname, $phoneNumber, $email, null);
    }

    public function getSurname(){
        return $this->contactDetails->getSurname();
    }

    public function setSurname($surname){
        $this->contactDetails->setSurname($surname);
    }

    public function getName()
    {
        return $this->contactDetails->name;
    }

    public function setName($name)
    {
        $this->contactDetails->name = $name;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition($pos)
    {
        $this->position = $pos;
    }

    public function getEmail()
    {
        return $this->contactDetails->email;
    }

    public function setEmail($email)
    {
        $this->contactDetails->email = $email;
    }

    public function getPhoneNumber()
    {
        return $this->contactDetails->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->contactDetails->phoneNumber = $phoneNumber;
    }

    public function getPassword()
    {
        return $this->contactDetails->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}
?>