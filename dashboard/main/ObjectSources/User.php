<?php

require_once ("ContactDetail.php");
use \ContactDetail;

class User {
    private $id;
    private $password;
    private $contactDetails = null;
    private $photo;

    //constructor
    public function __construct($userId, $name, $surname, $email, $phoneNumber, $password)
    {
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
        return $this->contactDetails->getName();
    }

    public function setName($name)
    {
        $this->contactDetails->setName($name);
    }

    public function getEmail()
    {
        return $this->contactDetails->getEmail();
    }

    public function setEmail($email)
    {
        $this->contactDetails->setEmail($email);
    }

    public function getPhoneNumber()
    {
        return $this->contactDetails->getPhoneNumber();
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->contactDetails->setPhoneNumber($phoneNumber);
    }

    public function getPassword()
    {
        return $this->password;
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
    public function getContactDetails()
    {
        return $this->contactDetails;
    }

    public function setContactDetails($contactDetails)
    {
        $this->contactDetails = $contactDetails;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }
}
?>