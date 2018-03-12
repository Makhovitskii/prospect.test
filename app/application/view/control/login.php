<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Web Application</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="<?php echo URL;?>public/app/css/app.v1.css">
    <link rel="stylesheet" href="<?php echo URL;?>public/app/css/font.css" cache="false">
    <!--[if lt IE 9]> <script src="<?php echo URL;?>public/app/js/ie/respond.min.js" cache="false"></script> <script src="<?php echo URL;?>public/app/js/ie/html5.js" cache="false"></script> <script src="<?php echo URL;?>public/app/js/ie/fix.js" cache="false"></script> <![endif]-->
</head>

<body>
    <section id="content" class="m-t-lg wrapper-md animated fadeInUp"> <a class="nav-brand" href="index.html">Prospect Lite</a>
        <div class="row m-n">
            <div class="col-md-4 col-md-offset-4 m-t-lg">
                <section class="panel">
                    <header class="panel-heading text-center"> Control Panel </header>
                    <form class="panel-body" method="POST">
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input type="text" placeholder="Username" class="form-control" name="login"> </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" id="inputPassword" placeholder="Password" class="form-control" name="password">
                            <input type="hidden" name="t" value="<?php print $took;?>">
                        </div>

                        <button type="submit" class="btn btn-info">Enter</button>
                    </form>
                </section>
            </div>
        </div>
    </section>
    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder clearfix">
            <p> <small>Prospect Lite web control<br>&copy; 2017</small> </p>
        </div>
    </footer>
    <!-- / footer -->
    <script src="<?php echo URL;?>public/app/css/app.v1.js"></script>
    <!-- Bootstrap -->
    <!-- app -->
</body>

</html>