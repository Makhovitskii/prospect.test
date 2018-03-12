<?php

class Updates extends Controller
{
    public function index()
    {
        $abs = 1;
        require APP . 'view/_templates/header.php';
        require APP . 'view/updates/index.php';
        require APP . 'view/_templates/footer.php';
    }
}