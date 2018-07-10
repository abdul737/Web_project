<?php

/**
 * Cannot use Parent because it is a keyword
 *
 */

require_once("User.php");

class _Parent extends User
{

    private $students;

    private $individualType;

    private $patronymic;
    private $passportAddress;
    private $passportNumber;
    private $passportSerial;
    private $passportWhoGive;
    private $passportWhenGive;
    private $passportFile;

    private $officeAddress;
    private $officeBankAccount;
    private $officeBankCode;
    private $officeInn;
    private $officeLicenceFile;

    private $comments;
    private $createDate;
    private $updateDate;

    public function __construct($userId, $name, $surname, $password, $email = null, $phoneNumber = null, $individual_type = null)
    {
        parent::__construct($userId, $name, $surname, $password, $email, $phoneNumber);
        $this->setIndividualType($individual_type);
        $this->students = array();
    }

    public function getStudents()
    {
        return $this->students;
    }

    public function setStudents(array $students)
    {
        $this->students = $students;
    }

    public function addStudent($student)
    {
        array_push($this->students, $student);
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
    public function getPassportAddress()
    {
        return $this->passportAddress;
    }

    /**
     * @param mixed $passportAddress
     */
    public function setPassportAddress($passportAddress)
    {
        $this->passportAddress = $passportAddress;
    }

    /**
     * @return mixed
     */
    public function getPassportNumber()
    {
        return $this->passportNumber;
    }

    /**
     * @param mixed $passportNumber
     */
    public function setPassportNumber($passportNumber)
    {
        $this->passportNumber = $passportNumber;
    }

    /**
     * @return mixed
     */
    public function getPassportSerial()
    {
        return $this->passportSerial;
    }

    /**
     * @param mixed $passportSerial
     */
    public function setPassportSerial($passportSerial)
    {
        $this->passportSerial = $passportSerial;
    }

    /**
     * @return mixed
     */
    public function getPassportWhoGive()
    {
        return $this->passportWhoGive;
    }

    /**
     * @param mixed $passportWhoGive
     */
    public function setPassportWhoGive($passportWhoGive)
    {
        $this->passportWhoGive = $passportWhoGive;
    }

    /**
     * @return mixed
     */
    public function getPassportWhenGive()
    {
        return $this->passportWhenGive;
    }

    /**
     * @param mixed $passportWhenGive
     */
    public function setPassportWhenGive($passportWhenGive)
    {
        $this->passportWhenGive = $passportWhenGive;
    }

    /**
     * @return mixed
     */
    public function getPassportFile()
    {
        return $this->passportFile;
    }

    /**
     * @param mixed $passportFile
     */
    public function setPassportFile($passportFile)
    {
        $this->passportFile = $passportFile;
    }

    /**
     * @return mixed
     */
    public function getOfficeAddress()
    {
        return $this->officeAddress;
    }

    /**
     * @param mixed $officeAddress
     */
    public function setOfficeAddress($officeAddress)
    {
        $this->officeAddress = $officeAddress;
    }

    /**
     * @return mixed
     */
    public function getOfficeBankAccount()
    {
        return $this->officeBankAccount;
    }

    /**
     * @param mixed $officeBankAccount
     */
    public function setOfficeBankAccount($officeBankAccount)
    {
        $this->officeBankAccount = $officeBankAccount;
    }

    /**
     * @return mixed
     */
    public function getOfficeBankCode()
    {
        return $this->officeBankCode;
    }

    /**
     * @param mixed $officeBankCode
     */
    public function setOfficeBankCode($officeBankCode)
    {
        $this->officeBankCode = $officeBankCode;
    }

    /**
     * @return mixed
     */
    public function getOfficeInn()
    {
        return $this->officeInn;
    }

    /**
     * @param mixed $officeInn
     */
    public function setOfficeInn($officeInn)
    {
        $this->officeInn = $officeInn;
    }

    /**
     * @return mixed
     */
    public function getOfficeLicenceFile()
    {
        return $this->officeLicenceFile;
    }

    /**
     * @param mixed $officeLicenceFile
     */
    public function setOfficeLicenceFile($officeLicenceFile)
    {
        $this->officeLicenceFile = $officeLicenceFile;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
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
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * @param mixed $updateDate
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;
    }

    /**
     * @return mixed
     */
    public function getIndividualType()
    {
        return $this->individualType;
    }

    /**
     * @param mixed $individualType
     */
    public function setIndividualType($individualType)
    {
        $this->individualType = $individualType;
    }


}

?>
