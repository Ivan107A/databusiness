<?php

class Controller_settings extends Controller
{
    function __construct()
    {
        session_start();
        $this->view = new View();
        $this->model = new Model_settings();
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

            $this->view->generate('settings_view.php', 'template_view.php', [
                'title' => 'Settings',
            ]);
        }
        else
        {
            header('Location: /auth');
        }
    }
}