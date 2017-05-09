<?php

require_once("ContactDetail.php");
//use \ContactDetail;

class User {
    private $id;
    private $password;
    private $contactDetails;

    public function __construct($userId, $name, $surname, $password, $email, $phoneNumber)
    {
        $this->setId($userId);
        $this->password = $password;
        $this->id = $userId;
        $this->contactDetails = new ContactDetail($name, $surname, $phoneNumber, $email, null);
    }


    public function getName()
    {
        return $this->contactDetails->getName();
    }

    public function setName($name)
    {
        $this->contactDetails->setName($name);
    }
    
    public function getSurname(){
        return $this->contactDetails->getSurname();
    }

    public function setSurname($surname){
        $this->contactDetails->setSurname($surname);
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
    public function getPhotoFileId()
    {
        return $this->contactDetails->getPhotoFileId();
    }
    public function setPhotoFileId($photoFileId)
    {
        $this->contactDetails->setPhotoFileId($photoFileId);
    }
    public function getContactDetails()
    {
        return $this->contactDetails;
    }
    public function setContactDetails($contact)
    {
        $this->contactDetails = $contact;
    }
}
?>