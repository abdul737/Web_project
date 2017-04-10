<?php

/**
 * Created by PhpStorm.
 * User: hamlet
 * Date: 4/10/17
 * Time: 11:16 AM
 */
class ContactDetail
{
    private $id;
    private $name;
    private $photo;
    private $phoneNumber;
    private $email;


    public function _construct($id, $name, $phoneNumber, $email , $photo = null)
    {
        $this->setId($id);
        $this->setEmail($email);
        $this->setName($name);
        $this->setPhoneNumber($phoneNumber);

        $this->setPhoto($photo);

    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }



}