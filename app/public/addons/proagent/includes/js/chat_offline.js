var chatdan_qovuldu_mesaj = "Operator tərəfindən yazışmadan uzaqlaşdırıldınız!";
var hansi_dildedi = "az";
var live_chat_offline_1_s = "Salam";
var live_chat_offline_1 = "Zəhmət olmasa e-mail ünvanınızı və ya mobil nömrənizi daxil edin.";
var live_chat_offline_2 = "Zəhmət olmasa düzgün email ünvanı və ya mobil nömrə yazın.";
var live_chat_offline_3 = "Təşəkkür edirik.";


function openDisable()
{
    setTimeout(function()
    {
        $('#mesajIn').removeAttr('disabled');
        $('#mesajIn').focus();
    }
    ,400)
}

$('#live_chat_sub').click(function(){

	 $('#live_chat_main').slideDown(300);

     $('#live_chat_sub').slideUp(300);

     scrl();
});

$('.live_chat_close').click(function(){

    $('#live_chat_sub').slideDown(300);

    $('#live_chat_main').slideUp(300);
});

var walker = 0;

var user_info = {};

$('#mesajIn').keyup(function(e)
{
    var code = e.which;

    if(code == 13)
    {
        if(walker == 3)
        {
            return;
        }
        var soz = $('#mesajIn').val();

        $('#mesajIn').attr('disabled','disabled');

        $('#mesajIn').val('');

        openDisable();

        if(soz != "")
        {
            var now = new Date();

            var saat_deqiqe = now.getHours()+':'+now.getMinutes();

            var session_id = localStorage.session_id_7392838;

            $('.live_chat_message_box').append('<div class="msg-container clientMessage"><div class="pip"></div><div class="new-msg-body"><div class="new-msg-text" msg></div></div><div class="new-time">'+saat_deqiqe+'</div></div>');

            $('.new-msg-body div[msg]').last().text(soz);

            if(walker == 0)
            {
                $('.live_chat_message_box').append('<div class="msg-container agentMessage"><div class="pip"></div><div class="new-msg-body"><div class="new-msg-text" msg></div></div><div class="new-time">'+saat_deqiqe+'</div></div>');

                $('.new-msg-body div[msg]').last().text(live_chat_offline_1_s+" "+soz+". "+live_chat_offline_1);

                user_info['ad'] = soz;

                walker = 1;

                scrl();
            }
            else if(walker == 1)
            {
                if(isEmailAddress(soz))
                {
                    $('.live_chat_message_box').append('<div class="msg-container agentMessage"><div class="pip"></div><div class="new-msg-body"><div class="new-msg-text" msg></div></div><div class="new-time">'+saat_deqiqe+'</div></div>');

                    $('.new-msg-body div[msg]').last().text(live_chat_offline_3);

                    user_info['email'] = soz;

                    walker = 2;

                    $("#mesajIn").remove();

                    scrl();

                    setTimeout(function(){

                        $('.live_chat_close').click();

                    },2000)
                }
                else
                {
                    $('.live_chat_message_box').append('<div class="msg-container agentMessage"><div class="pip"></div><div class="new-msg-body"><div class="new-msg-text" msg></div></div><div class="new-time">'+saat_deqiqe+'</div></div>');

                    $('.new-msg-body div[msg]').last().text(live_chat_offline_2);
                }

            }

            scrl();

            if(walker == 2)
            {
                try
                {
                    $.post(URL+"proagent/message_insert_offline", {'user_info':user_info,'session_id':session_id}).done(function(result)
                    {
                         visited('main','chata_yazdi_offline');
                    });

                    walker = 3;
                }
                catch(e)
                {
                    //
                }
            }
        }
    }
});

var email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
var mobil_pattern = /^(055|070|051|050|077|55|70|51|50|77)( |-|)[0-9]{3}( |-|)[0-9]{2}( |-|)[0-9]{2}\b/i;


function isEmailAddress(str)
{
    if(email_pattern.test(str))
    {
       return email_pattern.test(str);
    }

    return mobil_pattern.test(str);
}


function scrl()
{
    var hundurluk = 0;

    var scrollTo_val = $('.live_chat_message_box').prop('scrollHeight');

    $(".live_chat_message_box").scrollTop(scrollTo_val);
}

$('.live_chat_message_box').niceScroll({cursorcolor:"#4E7EB7"});