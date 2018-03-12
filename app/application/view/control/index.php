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
    <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-dark aside-sm nav-vertical" id="nav">
            <section class="vbox">
                <header class="dker nav-bar">
                    <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="body"> <i class="icon-reorder"></i> </a> <a href="#" class="nav-brand" data-toggle="fullscreen"></a>
                    <a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user"> <i class="icon-comment-alt"></i> </a>
                </header>
                <footer class="footer bg-gradient hidden-xs">
                    <a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-sm btn-link m-r-n-xs pull-right"> <i class="icon-off"></i> </a>
                    <a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm"> <i class="icon-reorder"></i> </a>
                </footer>
                <section>
                    <div class="lter nav-user hidden-xs pos-rlt">
                        <div class="nav-avatar pos-rlt">
                            <a href="#" class="thumb-sm avatar animated rollIn" data-toggle="dropdown"> <img src="<?php echo URL;?>public/app/images/avatar.jpg" alt="" class=""> <span class="caret caret-white"></span> </a>
                            <ul class="dropdown-menu m-t-sm animated fadeInLeft"> <span class="arrow top"></span>
                                <li> <a href="signin.html">Logout</a> </li>
                            </ul>
                        </div>
                        <div class="nav-msg">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <b class="badge badge-white count-n">2</b> </a>
                            <section class="dropdown-menu m-l-sm pull-left animated fadeInRight">
                                <div class="arrow left"></div>
                                <section class="panel bg-white">
                                    <header class="panel-heading"> <strong>You have <span class="count-n">2</span> notifications</strong> </header>
                                    <div class="list-group">
                                        <a href="#" class="media list-group-item"> <span class="pull-left thumb-sm"> <img src="<?php echo URL;?>public/app/images/avatar.jpg" alt="John said" class="img-circle"> </span> <span class="media-body block m-b-none"> Use awesome animate.css<br> <small class="text-muted">28 Aug 13</small> </span> </a>
                                        <a href="#" class="media list-group-item"> <span class="media-body block m-b-none"> 1.0 initial released<br> <small class="text-muted">27 Aug 13</small> </span> </a>
                                    </div>
                                    <footer class="panel-footer text-sm"> <a href="#" class="pull-right"><i class="icon-cog"></i></a> <a href="#">See all the notifications</a> </footer>
                                </section>
                            </section>
                        </div>
                    </div>
                    <nav class="nav-primary hidden-xs">
                        <ul class="nav">
                            <li class="active">
                                <a href="<?php echo URL;?>control"> <i class="icon-eye-open"></i> <span>Blog</span> </a>
                            </li>
                            <li>
                                <a href="#"> <i class="icon-beaker"></i> <span>UI kit</span> </a>
                            </li>
                            <li>
                                <a href="#"> <i class="icon-tasks"></i> <span>Tasks</span> </a>
                            </li>
                            <li>
                                <a href="#"> <i class="icon-pencil"></i> <span>Notes</span> </a>
                            </li>
                        </ul>
                    </nav>
                </section>
            </section>
        </aside>
        <!-- /.aside -->
        <!-- .vbox -->
        <section id="content">
            <section class="vbox">
                <header class="header bg-dark">
                    <p>Control Panel <span class="label label-lg bg-info">3.2</span></p>
                </header>
                <section class="scrollable wrapper">
                    <section class="panel">
                        <div class="row text-sm wrapper">
                            <div class="col-sm-12 m-b-xs">
                                <button class="btn btn-sm btn-success pull-right">+ Add new</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped b-t text-sm">
                                <thead>
                                    <tr>
                                        <th width="20">
                                            №
                                        </th>
                                        <th class="th-sortable" data-toggle="class">
                                            Header <span class="th-sort"> <i class="icon-sort-down text"></i> <i class="icon-sort-up text-active"></i> <i class="icon-sort"></i> </span>
                                        </th>
                                        <th>
                                            Task
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th width="30"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            Idrawfast
                                        </td>
                                        <td>
                                            4c
                                        </td>
                                        <td>
                                            Jul 25, 2013
                                        </td>
                                        <td>
                                            <a href="#" class="active" data-toggle="class">
                                                <i class="icon-ok text-success text-active"></i>
                                                <i class="icon-remove text-danger text"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-sm-4 hidden-xs">

                                </div>
                                <div class="col-sm-4 text-center">
                                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                                </div>
                                <div class="col-sm-4 text-right text-center-xs">
                                    <ul class="pagination pagination-sm m-t-none m-b-none">
                                        <li>
                                            <a href="#"><i class="icon-chevron-left"></i></a>
                                        </li>
                                        <li>
                                            <a href="#">1</a>
                                        </li>
                                        <li>
                                            <a href="#">2</a>
                                        </li>
                                        <li>
                                            <a href="#">3</a>
                                        </li>
                                        <li>
                                            <a href="#">4</a>
                                        </li>
                                        <li>
                                            <a href="#">5</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </footer>
                    </section>
                </section>
            </section>
            <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="body"></a>
        </section>
        <!-- /.vbox -->
    </section>
    <script src="<?php echo URL;?>public/app/css/app.v1.js"></script>
    <!-- Bootstrap -->
    <!-- App -->
    <!-- fuelux -->
    <!-- datatables -->
    <!-- Sparkline Chart -->
    <!-- Easy Pie Chart -->
</body>

</html>