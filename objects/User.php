<?php
/**
 *YOU DON'T GIVE ACCESS MODIFIERS TO CLASSES IN PHP
 *YOU DON'T PROVIDE DATA TYPE FOR VARIABLES IN PHP
 * GETTERS MUST RETURN $this-><class field>

 */
abstract class User {
  //private fields (not any is constant yet)
  private $userId;      //not sure about type
  private $name;        //quite sure about type
  private $email;       //quite sure about type
  private $phoneNumber; //quite sure about type
  private $password;    //quite sure about type
  private $birthdate;   //possibly type will be changed
  private $createDate;  //possibly type will be changed
  private $lastLogin;   //possibly type will be changed

  //constructor
  public function _construct($userId, $name, $email, $phoneNumber, $password, $birthdate, $createDate, $lastLogin)
  {
    $this->userId = $userId;
    $this->name = $name;
    $this->email = $email;
    $this->phoneNumber = $phoneNumber;
    $this->password = $password;
    $this->birthdate = $birthdate;
    $this->createDate = $createDate;
    $this->lastLogin = $lastLogin;
  }

    //public setter and getter methods
    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
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
