<?php

class Proagent extends Controller
{
    // Settings

    private $from = "04190b8bc4b074b83be1e606ff24a2a3";

    private $api = "http://109.235.198.28/proID/";

    public function index()
    {

        header('Location:'. URL);

    }

    public function refreshed_page()
    {
        if(isset($_POST['session_id']) && is_string($_POST['session_id']) && trim($_POST['session_id']) != '')
        {
            $res = $this->model->refreshed_page($_POST['session_id'], $this->from, $this->api);

            print $res;
        }
        else
        {
            header('Location:'. URL);
        }
    }

    public function get_messages()
    {
        if(isset($_POST['lastid']) && is_numeric($_POST['lastid']) && $_POST['lastid'] > 0 && isset($_POST['session_id']) && is_string($_POST['session_id']) && $_POST['session_id'] != "")
        {
            $res = $this->model->get_messages($_POST['session_id'], $_POST['lastid'], $this->from, $this->api);

            print $res;
        }
        else
        {
            header('Location:'. URL);
        }
    }

    public function message_insert()
    {
        if(isset($_POST['soz']) && is_string($_POST['soz']) && trim($_POST['soz']) != "" && isset($_POST['session_id']) && $_POST['session_id'] != "" && is_string($_POST['session_id']) && isset($_POST['dil']) && is_string($_POST['dil']) && in_array($_POST['dil'], array('az','en','ru')) && isset($_POST['secret_variable']) && is_numeric($_POST['secret_variable']) && in_array($_POST['secret_variable'], array(0,1)))
        {
            $res = $this->model->message_insert($_POST['session_id'], $_POST['soz'], $_POST['dil'], $_POST['secret_variable'], $this->from, $this->api);

            print $res;
        }
        else
        {
            header('Location:'. URL);
        }
    }

    public function chat_to_tray()
    {
        if(isset($_POST['secret_word']) && is_string($_POST['secret_word']) && trim($_POST['secret_word']) == 'suck')
        {
            $_SESSION['chat_closed_by_user']=1;
        }
        else
        {
            header('Location:'. URL);
        }
    }

    public function chat_close()
    {
        if(isset($_POST['session_id']) && is_string($_POST['session_id']) && trim($_POST['session_id']) != '' && isset($_POST['chat_closed']) && is_numeric($_POST['chat_closed']) && $_POST['chat_closed']==1)
        {
            $res = $this->model->chat_close($_POST['session_id'], $_POST['chat_closed'], $this->from, $this->api);

            print $res;
        }
        else
        {
            header('Location:'. URL);
        }

    }

    public function message_insert_offline()
    {
        if(isset($_POST['user_info']) && is_array($_POST['user_info']) && count($_POST['user_info']) > 0 && isset($_POST['session_id']) && $_POST['session_id'] != "" && is_string($_POST['session_id']))
        {
            $res = $this->model->message_insert_offline($_POST['session_id'], $_POST['user_info'], $this->from, $this->api);

        }
    }
}

 ?>