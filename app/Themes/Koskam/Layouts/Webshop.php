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
                theme_url('css/licenceplate.css', 'Koskam'),
                theme_url('css/plugins/alertify/alertify.css', 'Koskam'),
                theme_url('css/plugins/alertify/alertify_theme.css', 'Koskam'),
            ]);
        ?>

</head>

<body class="ingelogd1" data-title="start">

    <div id="winkelwagen-sidebar" style="opacity: 1; position: fixed; right: 0px; display: none;">
        <div id="winkelwagen-sidebar-content">
            <!-- <script type="text/javascript">
                $(".aantal-artikelen").html("0 artikelen");
                $(".winkelwagen-aantal").text("0");
                $("#winkelwagen-sidebar").fadeOut();
            </script> -->
        </div>
    </div>

    <div id="topbar-wrapper">
        <div id="topbar">
            <div class="container">
                <div class="row">
                    <div class="topbar-item topbar-item-route">
                        <a href="#" class="waar-is-mijn-route-link" title="Wanneer komt mijn route?">
                            <div class="payoff-icon icon-route pull-left"></div>
                            <div class="payoff-info pull-left volgende-route-text">Volgende route</div>
                            <div class="payoff-info pull-left volgende-route-tijd">
                                <div class="kk_clock" id="kk_clock_days">00&nbsp;:&nbsp;</div>
                                <div class="kk_clock" id="kk_clock_hours">09&nbsp;:&nbsp;</div>
                                <div class="kk_clock" id="kk_clock_minutes">00&nbsp;:&nbsp;</div>
                                <div class="kk_clock" id="kk_clock_seconds">00</div>
                            </div>
                        </a>
                    </div>

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
                        <a class="navbar-brand" href="/webshop">
                            <img src="<?= theme_url('images/logo.png'); ?>" alt="Koskamp B.V." title="Koskam B.V." width="135" height="40">
                        </a>

                    </div>
                    <div id="navbar" class="navbar-right navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li <?php if($title == 'Start'){echo 'class="active" ';} ?>>
                                <a href="/webshop" <?php if($title == 'Start'){echo 'class="active" ';} ?> title="Start"><span>Start</span></a>
                            </li>
                            <li <?php if($title == 'Account'){echo 'class="active" ';} ?>>
                                <a href="/webshop/account" <?php if($title == 'Account'){echo 'class="active" ';} ?> title="Mijn Account"><span>Mijn Account</span></a>
                            </li>
                            <li <?php if($title == 'Contact'){echo 'class="active" ';} ?>>
                                <a href="/webshop/contact" <?php if($title == 'Contact'){echo 'class="active" ';} ?>  title="Contact"><span>Contact</span></a>
                            </li>
                            <li>
                                <a href="/logout" title="Uitloggen"><span>Uitloggen</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- ================================================================================ -->

    <div id="header">
        <div id="header-content" class="container">
            <div class="row first-row">
                
                <div class="col-sm-6">
                    <div class="berichtencentrum">
                        <a href="account" class="welkom" title="Welkom <?= Session::get('userLoggedIn')[0]->u_firstname; ?>">
                            <span class="hidden-xs">Welkom </span><?= Session::get('userLoggedIn')[0]->u_firstname . ' ' . Session::get('userLoggedIn')[0]->u_lastname; ?> 
                        </a>
                        <div class="col-xs-5 col-md-6 col-left">
                            <a href="/webshop/berichtencentrum">Mijn berichten<span class="berichten-aantal-button btn btn-default btn-xs hidden-xs">0</span></a>
                        </div>
                        <div class="col-xs-7 col-md-6 col-right">
                            <a href="/webshop/winkelwagen">Mijn winkelwagen<div class="winkelwagen-aantal btn btn-default btn-xs">0</div></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row second-row">
                <form name="frmSearch" method="post" id="frmSearchAlgemeen">
                    <div class="input-group">
                        <div class="zoekbalkswitch-input zoekbalkswitch-trefwoord">
                            <input id="search" name="search"  type="text" class="form-control ac_input" placeholder="Zoek op artikelnummer, bandenmaat, OEM nummer of trefwoord" >
                        </div>
                        <span class="input-group-addon">
                            <button type="submit" class="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- ================================================================================ -->

    <div class="container homeblocks">
        <div class="row featurette contentheading">
            <div class="col-lg-12">
                <div id="systeembericht"></div>
            </div>
            <div class="col-lg-12">
                <p></p>
                <?= $content ?>
            </div>
        </div>

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
                <div class="block block-inschrijven">
                    <h2>Activiteiten</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Omschrijving</th>
                                <th>Datum</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Bijv trainingen? | Locatie?</td>
                                <td>Datum?</td>
                                <td class="text-right"><a href="#"><span class="btn btn-primary btn-xs">info</span></a></td>
                            </tr>
                            
                        </tbody>
                    </table>
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
                        <span>Voor vragen en opmerkingen kunt u mailen naar info@koskam.nl</span>
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

    <!-- ================================================================================ -->

    
</body>

<!-- =========================== SCRIPTS ===================================== -->

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
        //theme_url('js/admin/admin_main.js', 'Koskam'),
        //theme_url('js/admin/admin_functions.js', 'Koskam'),

        // plugins
        //theme_url('js/plugins/webshop/routetimer.js', 'Koskam'),
    ]);

    switch ($title) {
        case 'Start':
            echo '<script>addClassToBody("start"); </script>'; 
            break;
        
        case 'Account':
            echo '<script>addClassToBody("mijn-account");</script>'
                . '<script>loadAccDetails();</script>'; 
            break;

        case 'Berichten centrum':
            echo '<script>addClassToBody("mijn-account berichtencentrum");</script>'; 
            break;

        case 'Gegevens bijwerken':
            echo '<script>addClassToBody("mijn-account berichtencentrum");</script>'
                . '<script>loadCompanyDetails();</script>'; 
            break;

        case 'Producten':
            echo '<script>addClassToBody("zoekresultaten");</script>'
                . '<script>loadProducts();</script>';
            break;

        case 'Winkelwagen':
            echo '<script>addClassToBody("Winkelwagen");</script>'
                . '<script>loadCart();</script>';
            break;

        default:
            echo '<script>addClassToBody("start"); </script>'; 
            break;
    }
?>
<script>countCartItems();</script>



</html>