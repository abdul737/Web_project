<?php

/**
 * Created by PhpStorm.
 * User: madi
 * Date: 4/24/17
 * Time: 9:23 AM
 */
class Passport{
    private $name;
    private $surname;
    private $patronymic;
    private $serialNumber;
    private $dateOfIssue;
    private $dateOfExpiry;

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
    public function getSurname()
    {
        return $this->surname;
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
    public function getPatronymic()
    {
        return $this->patronymic;
    }

    /**
     * @param mixed $patronymic
     */
    public function setPatronymic($patronymic)
    {
        $this->patronymic = $patronymic;
    }

    /**
     * @return mixed
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * @param mixed $serialNumber
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;
    }

    /**
     * @return mixed
     */
    public function getDateOfIssue()
    {
        return $this->dateOfIssue;
    }

    /**
     * @param mixed $dateOfIssue
     */
    public function setDateOfIssue($dateOfIssue)
    {
        $this->dateOfIssue = $dateOfIssue;
    }

    /**
     * @return mixed
     */
    public function getDateOfExpiry()
    {
        return $this->dateOfExpiry;
    }

    /**
     * @param mixed $dateOfExpiry
     */
    public function setDateOfExpiry($dateOfExpiry)
    {
        $this->dateOfExpiry = $dateOfExpiry;
    }
    private $issuedBy;
    private $file;

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getIssuedBy()
    {
        return $this->issuedBy;
    }

    /**
     * @param mixed $issuedBy
     */
    public function setIssuedBy($issuedBy)
    {
        $this->issuedBy = $issuedBy;
    }
}