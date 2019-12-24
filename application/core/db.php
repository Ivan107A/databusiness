<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/libs/rb.php';

class Db
{
    public $host = 'localhost';
    public $dbname = 'myapp';
    public $user = 'root';
    public $password = '';

    function __construct()
    {
        session_start();

        R::setup('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->password);
    }
}