<?php
/**
 * Created by PhpStorm.
 * User: hamlet
 * Date: 4/10/17
 * Time: 11:16 AM
 */

class ContactDetail
{
    private $name;
    private $surname;
    private $photoFileId;
    private $phoneNumber;
    private $email;

    public function __construct($name, $surname, $phoneNumber, $email , $photoFileId)
    {
        $this->setEmail($email);
        $this->setName($name);
        $this->setSurname($surname);
        $this->setPhoneNumber($phoneNumber);
        $this->setPhotoFileId($photoFileId);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPhotoFileId()
    {
        return $this->photoFileId;
    }

    public function setPhotoFileId($photoFileId)
    {
        $this->photoFileId = $photoFileId;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }
}