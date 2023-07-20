<?php
class DB
{
    public $conn;
    protected $servername = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $dbname = 'winstore_mvc';
    function __construct()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->conn, $this->dbname);
        $this->conn->set_charset('utf8');
    }
}
