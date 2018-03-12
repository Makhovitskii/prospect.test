<?php

class Pricing extends Controller
{
    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/pricing/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
