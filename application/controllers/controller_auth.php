<?php

class Controller_auth extends Controller
{
    function __construct()
    {
        session_start();
        $this->view = new View();
        $this->model = new Model_auth();
    }

    function action_index()
    {
        if(isset($_SESSION['user']))
        {
            $check = $this->model->checkSession($_SESSION['user']['login'], $_SESSION['user']['password']);
            if($check == 1)
            {
                header('Location: /user');
            }
            elseif($check == 0)
            {
                $this->view->generate('auth_view.php', 'template_view.php', [
                    'title' => 'Auth'
                ]);
            }
        }
        else
        {
            $this->view->generate('auth_view.php', 'template_view.php', [
                'title' => 'Auth'
            ]);
        }
    }
}