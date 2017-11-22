<!DOCTYPE HTML>
<html>

<head>
    <title>
        <?= $title; ?>
    </title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="description" content="Koskam">
    <meta name="author" content="Koskam">

    <!-- Styles !-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Fonts !-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <?php 
            Assets::css([
                theme_url('css/style.css', 'Koskam'),
                theme_url('css/responsive.css', 'Koskam'),
                theme_url('css/carousel.css', 'Koskam'),
                theme_url('css/plugins/alertify/alertify.css', 'Koskam'),
                theme_url('css/plugins/alertify/alertify_theme.css', 'Koskam'),
            ]);
        ?>

</head>

<body class="login ingelogd0" data-title="login">
    <div id="topbar-wrapper">
        <div id="topbar">
            <div class="container">
                <div class="row">
                    <div class="pull-right">
                        <div class="topbar-item topbar-item-text topbar-item-helpdesk">
                            <span class="hidden-xs">Helpdesk:</span> <a href="tel:+31546673000" title="Helpdesk">0546 673 000</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="navbar-wrapper">
            <div class="container">
                <nav class="navbar navbar-inverse navbar-static-top">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toon/verberg menu</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/">
                        <img src="<?= theme_url('images/logo.svg'); ?>" alt="Koskam B.V." title="Koskam B.V." width="135" height="40">
                    </a>

                    </div>
                    <div id="navbar" class="navbar-right navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li >
                                <a href="#" title="Account"><span>Welkom <?= Session::get('userLoggedIn')[0]->user_owner_name;?></span></a>
                            </li>
                            <li>
                                <a href="/logout" title="Home"><span>Home</span></a>
                            </li>
                            <li>
                                <a href="#" title="Home"><span>Winkelwagen</span></a>
                            </li>
                            <li>
                                <a href="/logout" title="Home"><span>Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- ================================================================================ -->

   
    <?= $content ?>

</body>

<!-- Scripts !-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php
    Assets::js([
        theme_url('js/plugins/alertify/alertify.js', 'Koskam'),
        theme_url('js/config.js', 'Koskam'),
        theme_url('js/functions.js', 'Koskam'),
        theme_url('js/main.js', 'Koskam'),
        theme_url('js/user/user_main.js', 'Koskam'),
        theme_url('js/user/user_functions.js', 'Koskam'),
        theme_url('js/admin/admin_main.js', 'Koskam'),
        theme_url('js/admin/admin_functions.js', 'Koskam'),
    ]);
?>

</html>