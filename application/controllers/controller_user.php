<?php

class Controller_user extends Controller
{
    function __construct()
    {
        session_start();
        $this->view = new View();
        $this->model = new Model_user();
    }

    function action_index()
    {
        if(isset($_SESSION['user']) && !empty($_SESSION['user']['login']) && !empty($_SESSION['user']['password']))
        {
            $check = $this->model->checkSession($_SESSION['user']['login'], $_SESSION['user']['password']);
            if($check != 1)
            {
                header('Location: /auth');
            }

            $data = $this->model->getInformation($_SESSION['user']['login']);
            $this->view->generate('user_view.php', 'template_view.php', [
                'title' => 'User',
                'id' => $data['id'],
                'login' => $data['login'],
                'password' => $data['password']
            ]);
        }
        else
        {
            header('Location: /auth');
        }
    }
}