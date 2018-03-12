<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        if(!isset($_SESSION['user_took']))
        {
            $this->model->generateTook('user_took');
        }

        if(!isset($_SESSION['user_ip']))
        {
            $_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
        }

        if(isset($_GET['utm_source']) && $_GET['utm_source']!="" && isset($_GET['utm_medium']) && $_GET['utm_medium']!="" && isset($_GET['utm_campaign']) && $_GET['utm_campaign']!="" && isset($_GET['utm_content']) && $_GET['utm_content']!="")
        {
            $this->model->adLogs($_GET['utm_source'], $_GET['utm_medium'], $_GET['utm_campaign'], $_GET['utm_content']);
        }

        $homeDetect = 1;
        $abs = 1;
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function guestLogs()
    {
        if(isset($_POST['module']) && is_string($_POST['module']) && $_POST['module']!="" && isset($_POST['dest']) && is_string($_POST['dest']) && $_POST['dest']!="")
        {
            $module = trim($_POST['module']);
            $dest = trim($_POST['dest']);
            $res = $this->model->guestLogs($module, $dest);
        }
    }

    // Language change controler
    public function language($lang)
    {
        if(isset($lang) && is_string($lang) && $lang!="")
        {
            $_SESSION['lang_code'] = trim($lang);
        }

        header('Location:'.URL);
    }

}
