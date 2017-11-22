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
                            <li <?php if($title == 'Home'){echo 'class="active" ';} ?>>
                                <a href="/" <?php if($title == 'Home'){echo 'class="active" ';} ?> title="Home"><span>Home</span></a>
                            </li>
                            <li <?php if($title == 'Producten'){echo 'class="active" ';} ?>>
                                <a href="/producten" <?php if($title == 'Producten'){echo 'class="active" ';} ?> title="Producten"><span>Producten</span></a>
                            </li>
                            <li <?php if($title == 'Opleidingen'){echo 'class="active" ';} ?>>
                                <a href="/opleidingen" <?php if($title == 'Opleidingen'){echo 'class="active" ';} ?> title="Opleidingen"><span>Opleidingen</span></a>
                            </li>
                            <li <?php if($title == 'Contact'){echo 'class="active" ';} ?>>
                                <a href="/contact" <?php if($title == 'Contact'){echo 'class="active" ';} ?>  title="Contact"><span>Contact</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- ================================================================================ -->

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="item next left">
                <img class="first-slide img-responsive" src='<?= theme_url('images/slider/koskam1.jpg '); ?>' alt="First slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Een opleiding volgen bij Koskam</h1>
                        <p>Kijk hier voor diverse opleidingen en trainingen</p>
                        <p><a class="btn btn-lg btn-danger" href="#" role="button">Klik hier</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="second-slide img-responsive" src="<?= theme_url('images/slider/koskam2.jpg'); ?>" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Een opleiding volgen bij Koskam</h1>
                        <p>Kijk hier voor diverse opleidingen en trainingen</p>
                        <p><a class="btn btn-lg btn-danger" href="#">Klik hier</a></p>
                    </div>
                </div>
            </div>
            <div class="item active left">
                <img class="third-slide img-responsive" src="<?= theme_url('images/slider/koskam3.jpg'); ?>" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Een opleiding volgen bij Koskam</h1>
                        <p>Kijk hier voor diverse opleidingen en trainingen</p>
                        <p><a class="btn btn-lg btn-danger" href="#" role="button">Klik hier</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="https://www.koskamp.nl/#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Vorige</span>
        </a>
        <a class="right carousel-control" href="https://www.koskamp.nl/#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Volgende</span>
        </a>
    </div>

    <!-- ================================================================================ -->

    <div class="container homeblocks">
        <div class="row homeblocks">
            <div class="hidden-xs hidden-sm col-md-6 col-lg-3">
                <a href="#" title="Producten">
                    <div class="homeblock" id="homeblock-producten">
                        <div class="homeblock-inner"></div>
                        <div class="homeblock-title">Producten</div>
                    </div>
                </a>
            </div>
            <div class="hidden-xs hidden-sm col-md-6 col-lg-3">
                <a href="#" title="Opleidingen">
                    <div class="homeblock" id="homeblock-opleidingen">
                        <div class="homeblock-inner"></div>
                        <div class="homeblock-title">Opleidingen</div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <a href="#" title="Beoordeling">
                    <div class="homeblock" id="homeblock-beoordelingen">
                        <div class="homeblock-inner">

                            <div class="gemiddelden-holder">
                                <div class="gemiddelde-groot">8,</div>
                                <div class="gemiddelde-klein">1</div>
                            </div>
                        </div>
                        <div class="homeblock-title">Beoordeling</div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="homeblock" id="homeblock-inloggen">
                    <div class="homeblock-inner">
                        <div class="block block-login">
                            <div class="block-inner">
                                <form id="loginSmall" method="post">
                                    <div class="loginFormSmall">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input class="form-control form-text loginFormSmallinput form-username" type="text" name="email" id="txtUsername" value="" placeholder="Uw gebruikersnaam">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input class="form-control form-text loginFormSmallinput form-password" type="password" name="password" id="txtPassword" value="" placeholder="Uw wachtwoord">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="/wachtwoordVergeten">Wachtwoord vergeten?</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="/registreren">Klant worden?</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <input class="btn btn-primary pull-right submitLogin" type="submit" value="Inloggen">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="block-footer"></div>
                    </div>
                    <div class="homeblock-title">Inloggen</div>
                </div>
            </div>
        </div>

        <?= $content ?>

        <div class="row featurette">
            <div class="col-md-6">
                <div class="news-front">
                    <h2>Nieuwsberichten</h2>
                    <div class="list-group">
                        <a class="list-group-item list-group-item-action" href="#">
                            <h4 class="list-group-item-heading"><span class="rood">22-11-2017 test</span></h4>
                            <p class="list-group-item-text">Voorbeeld</p>
                        </a>
                    </div>
                    <div class="block-footer"></div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="vacatures-front">
                    <h2>Werken bij Koskam!</h2>
                    <div class="list-group list-group-vacatures">
                        <a class="list-group-item list-group-item-action" href="#" title="Klantenservicemedewerker Koskamp">
                            <h4 class="list-group-item-heading"><span class="rood">IT medewerker Koskam</span></h4>
                            <p class="list-group-item-text">Den Ham (OV)</p>
                        </a>
                    </div>
                    <div class="block-footer"></div>
                </div>
            </div>
        </div>

        <hr class="featurette-divider">
    </div>

    <footer class="koskamp-footer">
        <div class="container">
            <div class="col-xs-12 col-lg-3">
                <h4>Pagina's</h4>
                <ul class="footer">
                    <li>
                        <a href="/"><span>Home</span></a>
                    </li>
                    <li>
                        <a href="/producten"><span>Producten</span></a>
                    </li>
                    <li>
                        <a href="/opleidingen"><span>Opleidingen</span></a>
                    </li>
                    <li>
                        <a href="/contact"><span>Contact</span></a>
                    </li>
                </ul>

            </div>

            <div class="col-xs-12 col-lg-3">
                <h4>Vacatures</h4>
                <ul class="footer">
                    <li>
                        <a href="#" title="IT medewerker Koskam">IT medewerker Koskam</a>
                    </li>
                </ul>
                <div class="block-footer"></div>

            </div>

            <div class="col-xs-12 col-lg-3">
                <h4>Aanmelden</h4>
                <ul class="footer">
                    <li>
                        <a href="/registreren"><span>Registreren als nieuwe klant</span></a>
                    </li>
                    <li>
                        <a href="#"><span>Aanmelden voor een opleiding</span></a>
                    </li>
                    <li>
                        <a href="#"><span>Werken bij Koskam</span></a>
                    </li>
                </ul>
            </div>

            <div class="col-xs-12 col-lg-3">
                <h4>Gegevens</h4>
                <ul class="footer">
                    <li>
                        <span>Bezoekadres: Vriezendijk 10, 7683 PL Den Ham</span>
                    </li>
                    <li>
                        <span>Postadres: Postbus 4, 7683 ZG Den Ham</span>
                    </li>
                    <li>
                        <span>Voor vragen en opmerkingen kunt u mailen naar info@koskamp.nl</span>
                    </li>
                </ul>
            </div>
        </div>
        <p class="pull-right">
            <span class="scrolltotop" style="display: inline;">
                <span class="glyphicon glyphicon-chevron-up"></span>
            </span>
        </p>
    </footer>
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