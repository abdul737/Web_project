<?php

/**
 * There must be some mechanism to create a
 * database during installation of the app.
 * All the tables must be there in the database
 * just after installation.
 */
class MySqlDB
{
    private $serverName;
    private $userName;
    private $password;
    private $connection;


    public function _construct($serverName, $userName, $password)
    {
        $this->serverName = $serverName;
        $this->userName = $userName;
        $this->password = $password;

        $this->setConnection();
    }

    /**
     * Establishing connection with DataBase server
     */
    public function setConnection()
    {
        $this->connection = new mysqli($this->serverName, $this->userName, $this->password);

        if ($this->connection->connect_error)
            die("Connection failed: ".$this->connection->connect_error);
        else
            echo "Connected successfully";

    }


    /**
     * Setters and Getters.
     * Due to security reasons, there are no get userName
     * and get password methods
     */
    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @return mixed
     */
    public function getServerName()
    {
        return $this->serverName;
    }

    //End of Setters and Getters



    public function closeConnection()
    {
       mysqli_close($this->connection);
    }


}