<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/application/core/db.php';

class Model extends Db
{
    public function get_data()
    {

    }

    public function checkSession($login, $password)
    {
        $user = R::getAll('SELECT * FROM users WHERE login = ? AND password = ?', array($login, $password));
        if(count($user) == 1)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
}
