<?php

class Model_user extends Model
{
    public function getInformation($login)
    {
        $information = R::getAll('SELECT * FROM users WHERE login = ?', array($login));
        $data = array(
            'id' => $information[0]['id'],
            'login' => $information[0]['login'],
            'password' => str_repeat('*', strlen($information[0]['password'])),
        );

        return $data;
    }
}
