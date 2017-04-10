<?php

abstract class User {
  //private fields (not any is constant yet)

  private $password;
  private $birthdate;
  private $createDate;
  private $lastLogin;
  private $contactDetails;

  //constructor
  public function _construct($userId, $name, $email, $phoneNumber, $birthdate, $password, $lastLogin, $photo)
  {

    if ($password == null)
      $this->password = $birthdate;

    $this->password = $password;
    $this->birthdate = $birthdate;
    $this->lastLogin = $lastLogin;

    $this->contactDetails = new ContactDetail($userId, $name, $phoneNumber, $email, $photo);

    /**
     * We need some algorithm to capture create date of the account...
     * Following method is not good
     */
    $this->createDate = date("Y.m.d");

  }

    //public setter and getter methods

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
    public function getEmail()
    {
        return $this->email;
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
     * @return mixed
     */
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




}
?>
