<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/application/core/db.php';

class Logout extends Db
{
    function do_logout()
    {
        if(isset($_SESSION['user']))
        {
            unset($_SESSION['user']);
            session_destroy();
        }
        header('Location: /auth');
    }
}

$logout = new Logout();
$logout->do_logout();