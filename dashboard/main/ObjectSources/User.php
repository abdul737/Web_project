<?php

require_once ("ContactDetail.php");
use \ContactDetail;

class User {
    private $id;
    private $password;
    private $contactDetails;

    public function _construct($userId, $name, $surname, $password, $email, $phoneNumber)
    {
        $this->password = $password;
        $this->contactDetails = new ContactDetail($userId, $name, $surname, $phoneNumber, $email, null);
        echo "constructor called";
    }

    public function getSurname(){
        return $this->contactDetails->getSurname();
    }

    public function setSurname($surname){
        $this->contactDetails->setSurname($surname);
    }

    public function getName()
    {
        return $this->contactDetails->getName();
    }

    public function setName($name)
    {
        $this->contactDetails->name = $name;
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

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}
?>