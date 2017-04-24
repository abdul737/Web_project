<?php
abstract class User {
    //private fields (not any is constant yet)
    private $password;
    private $birthdate;
    private $contactDetails;
    //constructor
    public function _construct($userId, $name, $email, $phoneNumber, $birthdate, $password, $photo)
    {
        if ($password == null)
            $this->password = $birthdate;
        else
            $this->password = $password;
        $this->birthdate = $birthdate;
        $this->contactDetails = new ContactDetail($userId, $name, $phoneNumber, $email, $photo);
        /**
         * We need some algorithm to capture create date of the account...
         * Following method is not good
         */
    }
    //public setter and getter methods
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->contactDetails->name;
    }
    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->contactDetails->name;
    }
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->contactDetails->email;
    }
    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->contactDetails->email = $email;
    }
    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->contactDetails->phoneNumber;
    }
    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->contactDetails->phoneNumber = $phoneNumber;
    }
    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->contactDetails->password;
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