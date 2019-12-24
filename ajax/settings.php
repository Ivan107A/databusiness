<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/core/db.php';

class Settings extends Db
{
    public function do_settings()
    {
        if(isset($_POST['new_login']))
        {
            $login = $_POST['new_login'];

            if(trim($login) != "")
            {
                if(strlen(trim($login)) >= 5)
                {
                    if($login != $_SESSION['user']['login'])
                    {
                        $db_login = R::getAll('SELECT * FROM users WHERE login = ?', array($login));
                        if(count($db_login) == 0)
                        {
                            $id = R::getAll('SELECT id FROM users WHERE login = ?', array($_SESSION['user']['login']))[0]['id'];
                            $do_user = R::load('users', $id);
                            $do_user->login = $login;
                            R::store($do_user);

                            $_SESSION['user']['login'] = $login;
                            return '<span class="badge badge-success text-wrap">Логин успешно изменён.</span>';
                        }
                        else
                        {
                            return '<span class="badge badge-danger text-wrap">Логин занят.</span>';
                        }
                    }
                    else
                    {
                        return '<span class="badge badge-danger text-wrap">Вы вводите свой логин.</span>';
                    }
                }
                else
                {
                    return '<span class="badge badge-danger text-wrap">Минимальная длина логина - 5 символов.</span>';
                }
            }
            else
            {
                return '<span class="badge badge-danger text-wrap">Вы не ввели новый логин.</span>';
            }
        }
        elseif(isset($_POST['new_password']))
        {
            $password = $_POST['new_password'];
            $r_password = $_POST['r_new_password'];

            if(trim($password) != "") {
                if (strlen(trim($password)) >= 5) {
                    if($r_password == $password)
                    {
                        if ($password != $_SESSION['user']['password']) {
                            $id = R::getAll('SELECT id FROM users WHERE login = ?', array($_SESSION['user']['login']))[0]['id'];
                            $do_user = R::load('users', $id);
                            $do_user->password = $password;
                            R::store($do_user);

                            $_SESSION['user']['password'] = $password;
                            return '<span class="badge badge-success text-wrap">Пароль успешно изменён.</span>';
                        }
                        else
                        {
                            return '<span class="badge badge-danger text-wrap">Вы вводите свой пароль.</span>';
                        }
                    }
                    else
                    {
                        return '<span class="badge badge-danger text-wrap">Пароли не совпадают.</span>';
                    }
                }
                else
                {
                    return '<span class="badge badge-danger text-wrap">Минимальная длина пароля - 5 символов.</span>';
                }
            }
            else
            {
                return '<span class="badge badge-danger text-wrap">Вы не ввели новый пароль.</span>';
            }
        }
        else
        {
            return '<span class="badge badge-danger text-wrap">Произошла ошибка.</span>';
        }
    }
}

$settings = new Settings();
echo $settings->do_settings();
