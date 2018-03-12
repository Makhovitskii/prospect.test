<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getLang()
    {
        $lang = false;
        if(isset($_SESSION['lang_code']) && is_string($_SESSION['lang_code']) && $_SESSION['lang_code']!="")
        {
            $lang = $_SESSION['lang_code'];
        }

        if($lang==false)
        {
            $sql = "SELECT * FROM languages where `default`=1";
            $query = $this->db->prepare($sql);
            $query->execute();
            $lang = $query->fetch();

            $_SESSION['lang_code'] = $lang->language;
            $lang = $lang->language;
        }

        return $lang;
    }

    /**
     * Get all posts from database
     */
    public function getBlogPosts()
    {
        $sql = "SELECT * FROM `tb_blog` WHERE status<>0 ORDER BY id DESC";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getBlogPost($postID)
    {
        $sql = "SELECT * FROM `tb_blog` WHERE id = :postID";
        $query = $this->db->prepare($sql);
        $parameters = array(':postID' => $postID);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function getSimilarBlogPosts($postID)
    {
        $sql = "SELECT * FROM `tb_blog` WHERE id <> :postID ORDER BY RAND() LIMIT 3";
        $query = $this->db->prepare($sql);
        $params = array(':postID' => $postID);
        $query->execute($params);

        return $query->fetchAll();
    }

    // Move logs

    public function guestLogs($module, $dest)
    {
        if(isset($module) && is_string($module) && $module!="" && isset($dest) && is_string($dest) && $dest!="")
        {
            $destination = htmlspecialchars($dest);
            $module = htmlspecialchars($module);
            $ip = $_SESSION['user_ip'];
            $tooken = $_SESSION['user_took'];

            $sql = "INSERT INTO tb_logs (tooken, module, dest, ip_address) VALUES (:tooken, :module, :dest, :ip_address)";
            $query = $this->db->prepare($sql);
            $parameters = array(':tooken' => $tooken, ':module' => $module, ':dest' => $destination, ':ip_address' => $ip);

            $query->execute($parameters);

        }
    }

    // advertising Logs

    public function adLogs($utm_source, $utm_medium, $utm_campaign, $utm_content)
    {
        $tooken = $_SESSION['user_took'];
        $sql = "INSERT INTO tb_adlogs (tooken, utm_source, utm_medium, utm_campaign, utm_content) VALUES (:tooken, :moutm_sourceule, :utm_medium, :utm_campaign, :utm_content)";
        $query = $this->db->prepare($sql);
        $parameters = array(':tooken' => $tooken, ':moutm_sourceule' => $utm_source, ':utm_medium' => $utm_medium, ':utm_campaign' => $utm_campaign, ':utm_content' => $utm_content);

        $query->execute($parameters);

    }

    public function checkLogin()
    {
        $olar = false;
        if(isset($_SESSION['login']) && is_numeric($_SESSION['login']) && isset($_SESSION['hash']) && isset($_SESSION['salt']) && is_numeric($_SESSION['salt']) && $_SESSION['hash']!="")
        {
            $uid = (int)$_SESSION['login'];
            $hashP = $_SESSION['hash'];
            $salt = (int)$_SESSION['salt'];

            $check = "SELECT password FROM tb_admins WHERE id = :uid";
            $query = $this->db->prepare($check);
            $parameters = array(':uid' => $uid);
            $query->execute($parameters);

            $check = $query->fetch();

            if(count($check)>0)
            {
                $uInf = $check;
                $hash = md5($uInf->password . md5($uid*$salt));
                if($hash==$hashP)
                {
                    $olar = true;
                }
                else
                {
                    $this->sessUnset('hash');
                    $this->sessUnset('salt');
                    $this->sessUnset('login');
                }
            }
            else
            {
                $this->sessUnset('hash');
                $this->sessUnset('salt');
                $this->sessUnset('login');
            }
        }

        if(!$olar && isset($_POST['login']) && $_POST['login']!="" && isset($_POST['password']) && $_POST['password']!="" && isset($_SESSION['_took_login']) && $_SESSION['_took_login']!="" && isset($_POST['t']) && $_POST['t']==$_SESSION['_took_login'])
        {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $check = "SELECT password,salt,id FROM tb_admins WHERE login= :login";
            $query = $this->db->prepare($check);
            $parameters = array(':login' => $login);
            $query->execute($parameters);

            $check = $query->fetch();

            if(count($check)>0)
            {
                $adminInf = $check;
                $passwordOrign = $adminInf->password;
                $salt = $adminInf->salt;
                if(md5($password . md5($salt))==$passwordOrign)
                {
                    $uid = (int)$adminInf->id;
                    $saltGenerate = rand(1000,9999);
                    $_SESSION['hash'] =  md5($passwordOrign . md5($uid*$saltGenerate));
                    $_SESSION['salt'] =  $saltGenerate;
                    $_SESSION['login'] =  $uid;

                    // $ipUnvan = mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
                    // $userAgent = mysql_real_escape_string($_SERVER['HTTP_USER_AGENT']);
                    // $qUpdate = mysql_query("UPDATE tb_admins SET last_login=NOW(),ip='$ipUnvan',agent='$userAgent'");
                    $olar = true;
                }
                else
                {
                    $this->loginError = true;
                    $this->sessUnset('hash');
                    $this->sessUnset('salt');
                    $this->sessUnset('login');
                }
            }
            else
            {
                $this->loginError = true;
                $this->sessUnset('hash');
                $this->sessUnset('salt');
                $this->sessUnset('login');
            }
        }

        $this->sessUnset('_took_login');

        return $olar;
    }

    public function sessUnset($sess)
    {
        if(isset($_SESSION[$sess]))
        {
            unset($_SESSION[$sess]);
        }
    }

    public function generateTook($sess)
    {
        $randTook = md5(time() . rand(10000000,90000000));
        if(!empty($sess))
        {
            $_SESSION[$sess] = $randTook;
        }
        return $randTook;
    }


    // Proagent

    public function refreshed_page($user_session, $from, $api)
    {

        $op_string = 'from='.$from.'&user_session='.$user_session.'&ip_adress='.$_SERVER['REMOTE_ADDR'];

        $ch = curl_init();

        $url = $api."api/online_contact_center/proagent/refreshed_page_curl.php";

        curl_setopt($ch, CURLOPT_URL,$url);

        curl_setopt($ch, CURLOPT_POST, 2);

        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $op_string);

        $result = curl_exec($ch);

        curl_close($ch);

        if($result)
        {
            return $result;
            $true = false;
        }
    }

    public function get_messages($user_session, $ajax_lastid, $from, $api)
    {

        $true = true;

        $count = 0;

        $ban = isset($_POST['ban'])&&is_string($_POST['ban'])&&$_POST['ban']!='7s39w283A8'?'1':'0';

        $op_string = 'lastid='.$ajax_lastid.'&from='.$from.'&user_session='.$user_session;

        $ch = curl_init();

        $url = $api."api/online_contact_center/proagent/message_get_curl.php";

        curl_setopt($ch, CURLOPT_URL,$url);

        curl_setopt($ch, CURLOPT_POST, 3);


        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $op_string);

        $result = curl_exec($ch);

        curl_close($ch);

        if($result)
        {
            // if($ban==1)
            // {
            //  $re = json_decode($result,true);
            //  $isset = isset($re['ban'])?'aa':$result;

            //  if($isset=='aa')
            //  {

            //  }
            //  else
            //  {
            //      print $isset;
            //      $true = false;
            //  }
            // }
            // else
            // {
                return $result;
                $true = false;
            // }
        }
    }

    public function message_insert($user_session, $message, $dil, $secret_variable, $from, $api)
    {

        $ip = $_SERVER["REMOTE_ADDR"];

        $op_string = 'user_session='.$user_session.'&soz='.$message.'&from='.$from.'&ip='.$ip.'&dil='.$dil.'&first_msg='.$secret_variable;

        $ch = curl_init();

        $url = $api."api/online_contact_center/proagent/message_insert_curl.php";

        curl_setopt($ch, CURLOPT_URL,$url);

        curl_setopt($ch, CURLOPT_POST, 6);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $op_string);

        $result = curl_exec($ch);

        curl_close($ch);

        return $result;
    }

    public function chat_close($user_session, $chat_closed, $from, $api)
    {

        $op_string = 'from='.$from.'&user_session='.$user_session.'&chat_closed=1';

        $ch = curl_init();

        $url = $api."api/online_contact_center/proagent/chat_close_curl.php";

        curl_setopt($ch, CURLOPT_URL,$url);

        curl_setopt($ch, CURLOPT_POST, 3);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $op_string);

        $result = curl_exec($ch);

        curl_close($ch);

        if($result)
        {
            print $result;

            $true = false;
        }
    }

    public function message_insert_offline($user_session, $user_info, $from, $api)
    {

        if(isset($user_info['email']) && isset($user_info['ad']) && (filter_var($user_info['email'], FILTER_VALIDATE_EMAIL) || preg_match('/^(055|070|051|050|077|55|70|51|50|77)( |-|)[0-9]{3}( |-|)[0-9]{2}( |-|)[0-9]{2}\b/', $user_info['email'])) && is_string($user_info['ad']))
        {
            $email = $user_info['email'];

            $ad = $user_info['ad'];

            $op_string = 'user_session='.$user_session.'&from='.$from.'&email='.$email.'&ad='.$ad;

            $ch = curl_init();

            $url = $api."api/online_contact_center/proagent/message_insert_offline_curl.php";

            curl_setopt($ch, CURLOPT_URL,$url);

            curl_setopt($ch, CURLOPT_POST, 4);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            curl_setopt($ch, CURLOPT_TIMEOUT, 10);

            curl_setopt($ch, CURLOPT_POSTFIELDS, $op_string);

            $result = curl_exec($ch);

            curl_close($ch);

            print $result;
        }
    }
}
