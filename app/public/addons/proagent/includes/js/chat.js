var refreshed = 0;
var visit_chat = 0;
var start = 0;
var bandadi = 0;

var hansi_dildedi = "az";
var live_chat_offline_1_s = "Salam";
var live_chat_offline_1 = "Zəhmət olmasa e-mail ünvanınızı və ya mobil nömrənizi daxil edin.";
var live_chat_offline_2 = "Zəhmət olmasa düzgün email ünvanı və ya mobil nömrə yazın.";
var live_chat_offline_3 = "Təşəkkür edirik.";
var secret_variable = 0;

var test = $('.live_chat_message_box');

if(typeof localStorage.lastID == "undefined")
{
    localStorage.setItem("lastID", 0);
}

function refreshedPage()
{
    if(typeof localStorage.session_id_7392838 == "undefined")
    {
        return false;
    }

    var session_id = localStorage.session_id_7392838;

    $.ajax({
        type: "POST",
        url: URL+"proagent/refreshed_page",
        data: {'session_id': session_id },
        async: true,
        cache: false,

        success: function(data) {

            try
            {
                var res = JSON.parse(data);

                if(typeof res['ban'] != "undefined" && res['ban'] == 1)
                {
                    if(bandadi==1) return;
                    $("#mesajIn").attr('disabled','disabled');
                    $("#mesajIn").val('Yazışmadan uzaqlaşdırılmısınız.');
                    var d = new Date();
                    var H = d.getHours();
                    var i = d.getMinutes();
                    $('.live_chat_message_box').append('<div ban_acildi style="background:#CB3535;" class="msg-container agentMessage" chats=""><div class="new-msg-body"><div class="new-msg-text">Operator tərəfindən yazışmadan uzaqlaşdırıldınız!</div></div><div class="new-time">'+H+':'+i+'</div></div>');
                   bandadi=1;
                }
                else
                {
                    if(res.length>0)
                    {
                        for(var n in res)
                        {
                            if(res[n][0]!=0)                            {
                                if(res[n][2]==1)
                                {
                                    $('.live_chat_message_box').append('<div class="msg-container agentMessage" chats="'+res[n][3]+'"><div class="pip"></div><div class="new-msg-body"><div class="new-msg-text">'+res[n][0]+'</div></div><div class="new-time">'+res[n][1]+'</div></div>');
                                    scrl();
                                    localStorage.lastID = res[n][3];
                                    $('#live_chat_sub').click();
                                    scrl();
                                }
                                else
                                {
                                    $('.live_chat_message_box').append('<div class="msg-container clientMessage" chats="'+res[n][3]+'"><div class="pip"></div><div class="new-msg-body"><div class="new-msg-text">'+res[n][0]+'</div></div><div class="new-time">'+res[n][1]+'</div></div>');
                                    scrl();
                                    localStorage.lastID = res[n][3];
                                    scrl();
                                }
                            }
                        }
                    }
                }
            }
            catch (err)
            {

            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {

        }
    });
}

if(refreshed == 0)
{
    refreshedPage();

    refreshed = 1;
}

function waitForMsg() {

    var lastID = localStorage.lastID;

    var session_id = localStorage.session_id_7392838;

    $.ajax({
        type: "POST",

        url: URL+"proagent/get_messages",

		data: {'lastid':lastID,'session_id':session_id,'ban':(bandadi==1?'7sef55d':'7s39w283A8')},

        async: true,

        cache: false,

        success: function(data) {
            // try
            // {
               	var res = JSON.parse(data);

                if(res['ban']==1)
                {
                    if(bandadi==0)
                    {
                        $("#mesajIn").attr('disabled','disabled');
                        $("#mesajIn").val('Yazışmadan uzaqlaşdırılmısınız.');
                        var d = new Date();
                        var H = d.getHours();
                        var i = d.getMinutes();
                        $('.live_chat_message_box').append('<div ban_acildi style="background:#CB3535;" class="msg-container agentMessage" chats=""><div class="new-msg-body"><div class="new-msg-text">Operator tərəfindən yazışmadan uzaqlaşdırıldınız!</div></div><div class="new-time">'+H+':'+i+'</div></div>');
                        bandadi = 1;
                        scrl();
                    }
                }
                else
                {
                    if(res.length>0)
                    {
                        for(var n in res)
                        {
                            if(res[n][0]!=0)
                            {
                                if(res[n][2]==1 && res[n][4]!=2)
                                {
                                    $('.live_chat_message_box').append('<div class="msg-container agentMessage" chats="'+res[n][3]+'"><div class="pip"></div><div class="new-msg-body"><div class="new-msg-text">'+res[n][0]+'</div></div><div class="new-time">'+res[n][1]+'</div></div>');

                                    localStorage.lastID = res[n][3];

                                    $('#live_chat_sub').click();

                                    scrl();
                                }
                                else if(res[n][2]==1 && res[n][4]==2)
                                {
                                   $('.live_chat_message_box').append('<div style="width: 100%;max-width: 95%;float: left;margin-left: 5px;"><div style="background: #AB65A8; margin: 15px auto; width: 100px; padding: 3px 5px 3px 5px; font-size: 13px; color: #ffffff; border-radius: 5px; text-align: center;">'+res[n][0]+'</div></div>');

                                    localStorage.lastID = res[n][3];

                                    $('#live_chat_sub').click();

                                    scrl();
                                }
                                else
                                {
                                    $('.live_chat_message_box').append('<div class="msg-container clientMessage" chats="'+res[n][3]+'"><div class="pip"></div><div class="new-msg-body"><div class="new-msg-text">'+res[n][0]+'</div></div><div class="new-time">'+res[n][1]+'</div></div>');

                                    localStorage.lastID = res[n][3];

                                    scrl();
                                }
                            }
                        }

                        if(res[n][2]==1)
                        {
                            var notify = new Audio(URL+'addons/proagent/includes/upload/sounds/sms.mp3');

                            notify.play();

                            scrl();
                        }
                    }

                    if(typeof res['ban'] != 'undefined' && res['ban']==1)
                    {

                    }
                    else
                    {
                        setTimeout("waitForMsg()", 1000);
                    }
                }
            // }
            // catch (err)
            // {

            // }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            setTimeout("waitForMsg()", 15000);
        }
    });
}

var opUp;

if(typeof localStorage.session_id_7392838 != "undefined" && localStorage.lastID != 0)
{
    if(bandadi==0)
    {
        waitForMsg();
        start = 1;
    }
}
else
{
    var now = new Date();

    var saat_deqiqe = now.getHours()+':'+now.getMinutes();

    $(window).on("load", function(e) {

        opUp = setTimeout(function(){

        if($('#live_chat_sub').attr('user_terefinden_acilib') != 1 && $('#live_chat_sub').attr('closed') != 1)
        {
            $('#live_chat_sub').click();

            $('.live_chat_message_box').append('<div class="msg-container agentMessage" chats=""><div class="pip"></div><div class="new-msg-body"><div class="new-msg-text">'+localStorage.operator_first_cumle+'</div></div><div class="new-time">'+saat_deqiqe+'</div></div>');

                secret_variable = 1;
        }
            },parseInt(localStorage.operator_chat_click)*1000)

    });
}

function openDisable()
{
    setTimeout(function()
    {
        $('#mesajIn').removeAttr('disabled');

        $('#mesajIn').focus();
    }
    ,500)
}

$('#live_chat_sub').click(function(){

    $(this).attr('user_terefinden_acilib',1);
	$('#live_chat_main').slideDown(300);

    $('#live_chat_sub').slideUp(300);

    scrl();
});

$('.live_chat_tray').click(function(){

    $('#live_chat_sub').slideDown(300);

    $('#live_chat_main').slideUp(300);

    $.post(URL+'proagent/chat_to_tray', {'secret_word':'suck'});

});

$('.live_chat_close').click(function(){

    var session_id = localStorage.session_id_7392838;

    swal({
        title: "Çatı bitirmək istədiyinizdən əminsinizmi?",
        text: "Çatı bitirdiyiniz halda yazışmalarınız silinəcək.",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Xeyr",
        confirmButtonColor: "#8E44AD",
        confirmButtonText: "Bəli, Əminəm!",
        closeOnConfirm: false
    }, function(){

        $.ajax({
            type: "POST",
            url: URL+"proagent/chat_close",
            data: {'session_id': session_id,'chat_closed':1 },
            async: true,
            cache: false,
            success: function(data)
            {
                $('.live_chat_tray').click();
                $('.live_chat_message_box').html('');
                swal({
                   title: "Təşəkkür edirik!",
                   text: "",
                   timer: 5000,
                   type: "success",
                   confirmButtonColor: "#8E44AD",
                });
            },
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {

            }
        });


    });

});

$('#mesajIn').keyup(function(e)
{
    var code = e.which;

    if(code == 13)
    {
        var soz = $('#mesajIn').val();

        $('#mesajIn').attr('disabled','disabled');

        $('#mesajIn').val('');

        openDisable();

        if(soz != "")
        {
            clearTimeout(opUp);

            var now = new Date();

            var saat_deqiqe = now.getHours()+':'+now.getMinutes();

            var session_id = localStorage.session_id_7392838;

            $('.live_chat_message_box').append('<div class="msg-container clientMessage"><div class="pip"></div><div class="new-msg-body"><div class="new-msg-text" msg></div></div><div class="new-time">'+saat_deqiqe+'</div></div>');

            $('.new-msg-body div[msg]').last().text(soz);

            scrl();

            try
            {
                $.post(URL+"proagent/message_insert", {'soz':soz,'session_id':session_id,'dil':'az','secret_variable':secret_variable}).done(function(ress)
                {
                    secret_variable = 0;
                    if(JSON.parse(ress)['ban']==1)
                    {
                        var d = new Date();
                        var H = d.getHours();
                        var i = d.getMinutes();
                        $('.live_chat_message_box').append('<div style="background:#CB3535;" class="msg-container agentMessage" chats=""><div class="new-msg-body"><div class="new-msg-text">'+soz+'</div></div><div class="new-time">'+H+':'+i+'</div></div>');
                         scrl();
                    }
                    else
                    {
                       	localStorage.lastID = ress;

                       	if(start==0)
                       	{
                       		waitForMsg();
                            if(visit_chat == 0)
                            {
                                visit_chat = 1;
                            }
                       	}
                       	start = 1;
                    }
                });
            }
            catch(e)
            {

            }
        }
    }
});




function scrl()
{
    var hundurluk = 0;

    var scrollTo_val = $('.live_chat_message_box').prop('scrollHeight');

    $(".live_chat_message_box").scrollTop(scrollTo_val);
}

$('.live_chat_message_box').niceScroll({cursorcolor:"#4E7EB7"});