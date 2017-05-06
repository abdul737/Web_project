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
    private $photo;
    private $phoneNumber;
    private $email;

    public function _construct($name, $surname, $phoneNumber, $email , $photo)
    {
        $this->setEmail($email);
        $this->setName($name);
        $this->setSurname($surname);
        $this->setPhoneNumber($phoneNumber);
        $this->setPhoto($photo);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
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