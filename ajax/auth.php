<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/application/core/db.php';

class Auth extends Db
{
    public function do_auth()
    {
        if(isset($_POST['r_password']))
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $r_password = $_POST['r_password'];

            if(strlen(trim($login)) >= 5)
            {
                if ($password == $r_password)
                {
                    if(strlen(trim($password)) >= 5)
                    {
                        if(count(R::getAll('SELECT * FROM users WHERE login = ?', array($login))) == 0)
                        {
                            $user = R::dispense('users');
                            $user->login = $login;
                            $user->password = $password;
                            R::store($user);

                            return '<span class="badge badge-success text-wrap">Вы успешно зарегистрировались. Авторизуйтесь.</span>';
                        }
                        else
                        {
                            return '<span class="badge badge-danger text-wrap">Логин занят.</span>';
                        }
                    }
                    else
                    {
                        return '<span class="badge badge-danger text-wrap">Минимальная длина пароля - 5 символов.</span>';
                    }
                }
                else
                {
                    return '<span class="badge badge-danger text-wrap">Пароли не совпадают.</span>';
                }
            }
            else
            {
                return '<span class="badge badge-danger text-wrap">Минимальная длина логина - 5 символов.</span>';
            }
        }
        elseif(!isset($_POST['r_password']) && isset($_POST['password']))
        {
            $login = $_POST['login'];
            $password = $_POST['password'];

            if(trim($login) != "")
            {
                if(trim($password) != "")
                {
                    $user = R::getAll('SELECT * FROM users WHERE login = ?', array($login));
                    if(count($user) == 1)
                    {
                        if($user[0]['password'] == $password)
                        {
                            $_SESSION['user']['login'] = $login;
                            $_SESSION['user']['password'] = $password;

                            return 'ok';
                        }
                        else
                        {
                            return '<span class="badge badge-danger text-wrap">Неверный пароль.</span>';
                        }
                    }
                    else
                    {
                        return '<span class="badge badge-danger text-wrap">Пользователь не найден.</span>';
                    }
                }
                else
                {
                    return '<span class="badge badge-danger text-wrap">Вы не ввели пароль.</span>';
                }
            }
            else
            {
                return '<span class="badge badge-danger text-wrap">Вы не ввели логин.</span>';
            }
        }
        else
        {
            return '<span class="badge badge-danger text-wrap">Произошла ошибка. Повторите попытку.</span>';
        }
    }
}

$auth = new Auth();
$string = $auth->do_auth();
echo $string;
