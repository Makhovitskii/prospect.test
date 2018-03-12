<?php

class Control extends Controller
{
    public function index()
    {

        if ($this->model->checkLogin())
        {
            require APP . 'view/control/index.php';
        }
        else
        {
            $took = $this->model->generateTook("_took_login");
            require APP . 'view/control/login.php';
        }

    }
}

 ?>