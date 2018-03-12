<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" class="next-head" />
    <title class="next-head"><?php echo lang::word('site_title');?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1" class="next-head" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" class="next-head" />
    <meta name="theme-color" content="#c2c2c2" />

    <meta property="og:image" content="http://prospecterp.com/images/prospecterp.jpg">
    <link rel="shortcut icon" href="<?php echo URL;?>images/favicon/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo URL;?>images/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo URL;?>images/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo URL;?>images/favicon/apple-touch-icon-114x114.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo URL;?>css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo URL;?>css/blog.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo URL;?>css/post.css" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-72546441-6"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-72546441-6');
    </script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter46925553 = new Ya.Metrika({
                        id:46925553,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true,
                        trackHash:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/46925553" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

</head>

<body>
    <div>
        <div id="__next">

            <div data-reactroot="" data-reactid="1" data-react-checksum="2002288441">

                <div data-reactid="2" <?php echo (isset($homeDetect) && $homeDetect==1? '':'class="bg"');?> >

                    <header class="css-1oenlh4 <?php echo (isset($abs) && $abs==1? 'abs':'');?>" role="banner" data-reactid="4">

                        <div class="css-1j4rouy container" data-reactid="5">
                            <a class="css-bwath3" href="<?php echo URL;?>" data-reactid="6">
                                <img src="<?php echo URL;?>images/prospect.png" alt="Prospect Lite" class="css-1kumfn8" data-reactid="7" />
                            </a>
                            <div class="css-a0zqss" data-reactid="8">
                                <input type="checkbox" id="navTrigger" data-reactid="9" />
                                <label class="css-w0yocm" for="navTrigger" data-reactid="10">
                                    <span data-reactid="11"></span>
                                    <span data-reactid="12"></span>
                                    <span data-reactid="13"></span>
                                </label>
                                <div class="css-11hi700" data-js="navigation" data-reactid="14">
                                    <nav role="navigation" class="css-1buvzeh" data-reactid="15">
                                        <ul class="css-1mu8fey" data-reactid="16">
                                            <li class="css-w51d8y" data-reactid="17">
                                                <a class="css-1xg3vhv" href="<?php echo URL;?>features" onclick="guestLogs('site', 'features')"><?php echo lang::word('features');?></a>
                                            </li>
                                            <li class="css-w51d8y" data-reactid="19">
                                                <a class="css-1xg3vhv" href="<?php echo URL;?>pricing" onclick="guestLogs('site', 'pricing')"><?php echo lang::word('pricing');?> </a>
                                            </li>
                                            <li class="css-w51d8y" data-reactid="21">
                                                <a class="css-1xg3vhv" href="<?php echo URL;?>blog" onclick="guestLogs('site', 'blog')"><?php echo lang::word('blog');?></a>
                                            </li>
                                            <li class="css-w51d8y" data-reactid="21">
                                                <a class="css-1xg3vhv" href="<?php echo URL;?>updates" onclick="guestLogs('site', 'updates')"><?php echo lang::word('updates');?></a>
                                            </li>

                                        </ul>
                                    </nav>
                                    <div class="css-11uoesq">
                                        <div id="userArea-button" class="css-13azwyo">

                                            <div>
                                                <a class="css-1xg3vhv" href="https://app.prospecterp.com/login" onclick="guestLogs('site', 'signIn')"><?php echo lang::word('signIn');?></a>
                                                <a class="css-1xg3vhv css-1xg3vhv-sign" href="https://app.prospecterp.com/registration" onclick="guestLogs('site', 'signUp')"><?php echo lang::word('signUp');?></a>
                                                <a href="<?php echo URL.'home/language/'.($_SESSION['lang_code']=='az'?'ru':'az');?>">. - <?php echo ($_SESSION['lang_code']=='az'?'ru':'az');?></a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>