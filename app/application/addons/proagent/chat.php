<?php
require('settings.php');

echo '<script>var URL = "'.URL.'";</script>';

?>
<link rel="stylesheet" type="text/css" href="<?php print URL; ?>addons/proagent/includes/css/sweetalert.css">
<link rel="stylesheet" href="<?php print URL; ?>addons/proagent/includes/css/live_chat.css">
<script src="<?php print URL; ?>addons/proagent/includes/js/jquery-1.7.2.min.js"></script>
<script src="<?php print URL; ?>addons/proagent/includes/js/jquery.nicescroll.min.js"></script>
<script src="<?php print URL; ?>addons/proagent/includes/js/sweetalert.min.js"></script>
<script type="text/javascript">

    var chatdan_qovuldu_mesaj = "Operator tərəfindən yazışmadan uzaqlaşdırıldınız!";
    var hansi_dildedi = "az";
    var live_chat_offline_1_s = "Salam";
    var live_chat_offline_1 = "Zəhmət olmasa e-mail ünvanınızı və ya mobil nömrənizi daxil edin.";
    var live_chat_offline_2 = "Zəhmət olmasa düzgün email ünvanı və ya mobil nömrə yazın.";
    var live_chat_offline_3 = "Təşəkkür edirik.";

    localStorage.setItem("operator_first_cumle", "Salam sizə necə kömək edə bilərəm?");

    localStorage.setItem("operator_chat_click", "60");

</script>
<?php

    $cumle = '';

    $istirahetdi = 0;

    $user_session_id = substr(base64_encode(md5(date('dmYHis'))),0,15);

    $ch = curl_init();

    $url = API."api/online_contact_center/msk_info.php";

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_TIMEOUT, 20);

    $very_secret_variable = curl_exec($ch);

    curl_close($ch);

    if($very_secret_variable == "istirahet")
    {
        $istirahetdi = 1;

        $cumle = "Hal-hazırda qeyri iş günü olduğu üçün sizinlə əlaqə saxlamağımız mümkün deyil. Sizinlə əlaqə saxlamağımız üçün zəhmət olmasa növbəti addımları izləyin.";
    }
    else if($very_secret_variable == "istirahet1")
    {
        $istirahetdi = 1;

        $cumle = "Hal-hazırda qeyri iş saatı olduğu üçün sizinlə əlaqə saxlamağımız mümkün deyil.Sizinlə əlaqə saxlamağımız üçün zəhmət olmasa növbəti addımları izləyin.";
    }
    else if(is_array(JSON_decode($very_secret_variable, true)))
    {
        $operator = JSON_decode($very_secret_variable);

        $_SESSION['user_session_id'] = $operator[5];

        print "<script>";

        print "localStorage.operator_first_cumle = '".$operator[4]."';";

        print "localStorage.operator_chat_click = '".$operator[3]."';";

        print "</script>";
    }
    else
    {
        exit('Error');
    }
?>
        <script>
            $(function(){

                var ls = false;

                if(typeof(Storage) !== "undefined")
                {
                    ls = true;

                    if(typeof localStorage.session_id_7392838 == "undefined")
                    {
                        localStorage.setItem("session_id_7392838", "<?php print $user_session_id; ?>");
                    }
                }
                else
                {
                    alert('Browseriniz Storage dəstəkləmir!');
                }
            });
        </script>
<?php

    if($istirahetdi == 0)
    {
?>
        <div id="popup_contact">
            <div class="popup_contact_wrapper_chat" id="live_chat_main" style="display:none;">
                <div style="height: 28px;">
                    <span class="live_chat_logo">
                        <img src="<?php echo URL;?>images/logo.png" alt="Prospect Lite">
                    </span>
                    <span class="live_chat_triangle">

                    </span>
                    <span class="live_chat_close">
                        <img src="<?php echo URL;?>addons/proagent/includes/img/close.png" alt="" style="width:20px;">
                    </span>
                    <span class="live_chat_tray">
                        <img src="<?php echo URL;?>addons/proagent/includes/img/arrow_down.png" alt="" style="width:20px;">
                    </span>

                </div>
                <div style="background-color:#FDFDFD;">
                    <div class="live_chat_message_box" tabindex="5001"></div>
                    <span class="wpcf7-form-control-wrap name">
                        <input type="text" id="mesajIn" autocomplete="off" class="msg-input" aria-required="true" aria-invalid="false" placeholder="Mesajı daxil edin" style="border-radius: 4px !important;"/>
                    </span>
                    <span class="wpcf-lic-corp">agent by <a href="http://pronet.az/" target="_blank"> Pronet LLC </a></span>
                </div>
            </div>
            <div class="popup_contact_wrapper_chat" id="live_chat_sub" closed="0">
                <div class="slider_box_c chat_box_b">SUALINIZ VAR? </div>
            </div>
        </div>
        <!-- Chat js -->
        <script src="<?php print URL; ?>addons/proagent/includes/js/chat.js?v=112"></script>
<?php
    }
    else
    {
?>
        <div id="popup_contact">
            <div class="popup_contact_wrapper_chat" id="live_chat_main" style="display:none;">
                <div style="height: 28px;">
                    <span class="live_chat_logo">
                        <img src="<?php echo URL;?>images/logo.png" alt="Prospect Lite">
                    </span>
                    <span class="live_chat_triangle">

                    </span>
                    <span class="live_chat_close">
                        <img src="<?php echo URL;?>addons/proagent/includes/img/close.png" alt="" style="width:20px;">
                    </span>
                    <span class="live_chat_tray">
                        <img src="<?php echo URL;?>addons/proagent/includes/img/arrow_down.png" alt="" style="width:20px;">
                    </span>
                </div>
                <div style="background-color:#FDFDFD;">
                    <div class="live_chat_message_box" tabindex="5001">
                        <div class="offline_rejim_text">
                            <div style="max-width: 190px;" class="msg-container agentMessage">
                                <div class="pip"></div>
                                <div class="new-msg-body">
                                    <div class="new-msg-text"> <?php print $cumle; ?></div>
                                </div>
                                <div class="new-time"><?php date('H:i')?></div>
                            </div>
                            <div style="max-width: 190px;" class="msg-container agentMessage">
                                <div class="pip"></div>
                                <div class="new-msg-body">
                                    <div class="new-msg-text"> <?php print "Zəhmət olmasa adınızı daxil edin."; ?></div>
                                </div>
                                <div class="new-time"><?php date('H:i')?></div>
                            </div>
                        </div>
                    </div>
                    <span class="wpcf7-form-control-wrap name">
                        <input type="text" id="mesajIn" autocomplete="off" class="msg-input" aria-required="true" aria-invalid="false" placeholder="<?php print "Mesajı daxil edin"; ?>" style="width: 240px;border: 1px solid #6E6E6E;"/>
                    </span>
                    <span class="wpcf-lic-corp">agent by <a href="http://pronet.az/" target="_blank"> Pronet LLC </a></span>
                </div>
            </div>
            <div class="popup_contact_wrapper_chat" id="live_chat_sub" closed="<?php print isset($_SESSION['chat_closed_by_user']) && $_SESSION['chat_closed_by_user']==1?'1':'0'; ?>">
                <div class="slider_box_c chat_box_b"><?php print "SUALINIZ VAR?"; ?></div>
            </div>
        </div>
        <script src="<?php print URL; ?>addons/proagent/includes/js/chat_offline.js?v=112"></script>
<?php
    }
?>