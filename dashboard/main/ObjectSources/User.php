<?php

abstract class User {
    //private fields (not any is constant yet)
    private $id;
    private $name;
    private $surname;
    private $photo;
    private $phoneNumber;
    private $email;

    private $password;
    private $birthdate;
    private $createDate;
    private $lastLogin;
    private $position;
    //constructor
    public function _construct($position, $userId, $name,$surname, $email, $phoneNumber, $birthdate, $password, $lastLogin, $photo=null)
    {
        $this->setId($userId);
        $this->setEmail($email);
        $this->setName($name);
        $this->setPhoneNumber($phoneNumber);
        $this->setPhoto($photo);
        $this->setSurname($surname);

        if ($password == null)
            $this->password = $birthdate;
        $this->position = $position;
        $this->password = $password;
        $this->birthdate = $birthdate;
        $this->lastLogin = $lastLogin;
        /**
         * We need some algorithm to capture create date of the account...
         * Following method is not good
         */
        $this->createDate = date("Y.m.d");
    }

    //public setter and getter methods
    public function getPosition()
    {
        return $this->position;
    }
    /**
     * @param mixed $name
     */
    public function setPosition($pos)
    {
        $this->position = $pos;
    }

    public function getPassword()
    {
        return $this->password;
    }
    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
    /**
     * @return mixed
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }
    /**
     * @param mixed $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }
    /**
     * @return mixed
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }
    /**
     * @param mixed $lastLogin
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;
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

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

}
?>