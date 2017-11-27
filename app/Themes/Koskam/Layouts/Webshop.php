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

<body class="start ingelogd1" data-title="start">

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
                            <img src="<?= theme_url('images/logo.svg'); ?>" alt="Koskamp B.V." title="Koskam B.V." width="135" height="40">
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
                    <div id="voertuig-zoeken">
                        <div class="switch-holder">
                            <div class="switch-input switch-kenteken">
                                <form id="frmCarSearchKenteken" name="frmCarSearchKenteken" method="post" action="https://www.koskamp.nl/index.php?mact=kosDoc,cntnt01,verwerkAuto,0&amp;cntnt01returnid=34">
                                    <div class="kenteken-veld-holder">
                                        <div class="kentekenhistorie-pijl btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Klik hier om de laatste kentekenzoekopdrachten weer te geven">
                                            <div class="kentekenhistorie-trigger fa fa-chevron-down"></div>
                                        </div>
                                        <div class="kentekenhistorie-container">
                                            <div class="kentekenhistorie-item"><strong>3-TTK-45</strong>PEUGEOT 3008 2.0 HDi Hybrid4</div>
                                            <div class="kentekenhistorie-item"><strong>15-XP-SG</strong>PEUGEOT 206 Hatchback (2A/C) 1.4 i</div>
                                            <div class="kentekenhistorie-item"><strong>83-NZ-FN</strong>PEUGEOT 206 Hatchback (2A/C) 1.1 i</div>
                                            <div class="kentekenhistorie-item"><strong>44-HB-VG</strong>PEUGEOT 206 Hatchback (2A/C) 1.4 i</div>
                                            <div class="kentekenhistorie-item"><strong>78-ZJK-5</strong>PEUGEOT 508 2.0 HDi Hybrid4 AWC</div>
                                            <div class="kentekenhistorie-item"><strong>55-PRV-7</strong>PEUGEOT 308 (4A_, 4C_) 1.6 16V</div>
                                            <div class="kentekenhistorie-item"><strong>3-XNK-82</strong>OPEL CORSA D 1.4</div>
                                            <div class="kentekenhistorie-item"><strong>17-GXV-1</strong>PEUGEOT 308 SW 1.6 16V</div>
                                            <div class="kentekenhistorie-item"><strong>TV-DJ-08</strong>Peugeot 406 (8b) 1.8 16v</div>
                                            <div class="kentekenhistorie-item"><strong>35-PV-HP</strong>KIA PICANTO (BA) 1.0</div>
                                            <div class="kentekenhistorie-item"><strong>12-LF-DH</strong>PEUGEOT 307 (3A/C) 1.6 16V</div>
                                            <div class="kentekenhistorie-item"><strong>78-SN-DP</strong>Peugeot 307 break (3e) 1.6 16v</div>
                                        </div>
                                        <input type="text" rel="kenteken" name="kenteken" value="" class="kenteken-veld" id="kenteken-veld-kosdoc" autocomplete="off" maxlength="8" placeholder="1-ABC-01">
                                        <button class="kenteken-veld-button" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="switch-input switch-merkmodeltype">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select class="form-control" name="selMerk" id="selMerk" onchange="getModels();">
                                            <option value="">– Selecteer merk –</option>
                                            <option value="2">Alfa Romeo</option>
                                            <option value="5">Audi</option>
                                            <option value="16">Bmw</option>
                                            <option value="138">Chevrolet</option>
                                            <option value="20">Chrysler</option>
                                            <option value="21">Citroen</option>
                                            <option value="139">Dacia</option>
                                            <option value="185">Daewoo</option>
                                            <option value="25">Daihatsu</option>
                                            <option value="29">Dodge</option>
                                            <option value="35">Fiat</option>
                                            <option value="36">Ford</option>
                                            <option value="776">Ford Usa</option>
                                            <option value="45">Honda</option>
                                            <option value="183">Hyundai</option>
                                            <option value="54">Isuzu</option>
                                            <option value="55">Iveco</option>
                                            <option value="56">Jaguar</option>
                                            <option value="882">Jeep</option>
                                            <option value="184">Kia</option>
                                            <option value="63">Lada</option>
                                            <option value="64">Lancia</option>
                                            <option value="1820">Land Rover</option>
                                            <option value="2589">Landwind (jmc)</option>
                                            <option value="842">Lexus</option>
                                            <option value="72">Mazda</option>
                                            <option value="74">Mercedes-benz</option>
                                            <option value="75">Mg</option>
                                            <option value="1523">Mini</option>
                                            <option value="77">Mitsubishi</option>
                                            <option value="80">Nissan</option>
                                            <option value="84">Opel</option>
                                            <option value="88">Peugeot</option>
                                            <option value="92">Porsche</option>
                                            <option value="93">Renault</option>
                                            <option value="95">Rover</option>
                                            <option value="99">Saab</option>
                                            <option value="104">Seat</option>
                                            <option value="106">Skoda</option>
                                            <option value="1138">Smart</option>
                                            <option value="175">Ssangyong</option>
                                            <option value="107">Subaru</option>
                                            <option value="109">Suzuki</option>
                                            <option value="111">Toyota</option>
                                            <option value="120">Volvo</option>
                                            <option value="121">Vw</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="selBouwjaar" id="selBouwjaar" onchange="getModels();">
                                            <option value="">– Alle bouwjaren –</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                            <option value="2014">2014</option>
                                            <option value="2013">2013</option>
                                            <option value="2012">2012</option>
                                            <option value="2011">2011</option>
                                            <option value="2010">2010</option>
                                            <option value="2009">2009</option>
                                            <option value="2008">2008</option>
                                            <option value="2007">2007</option>
                                            <option value="2006">2006</option>
                                            <option value="2005">2005</option>
                                            <option value="2004">2004</option>
                                            <option value="2003">2003</option>
                                            <option value="2002">2002</option>
                                            <option value="2001">2001</option>
                                            <option value="2000">2000</option>
                                            <option value="1999">1999</option>
                                            <option value="1998">1998</option>
                                            <option value="1997">1997</option>
                                            <option value="1996">1996</option>
                                            <option value="1995">1995</option>
                                            <option value="1994">1994</option>
                                            <option value="1993">1993</option>
                                            <option value="1992">1992</option>
                                            <option value="1991">1991</option>
                                            <option value="1990">1990</option>
                                            <option value="1989">1989</option>
                                            <option value="1988">1988</option>
                                            <option value="1987">1987</option>
                                            <option value="1986">1986</option>
                                            <option value="1985">1985</option>
                                            <option value="1984">1984</option>
                                            <option value="1983">1983</option>
                                            <option value="1982">1982</option>
                                            <option value="1981">1981</option>
                                            <option value="1980">1980</option>
                                            <option value="1979">1979</option>
                                            <option value="1978">1978</option>
                                            <option value="1977">1977</option>
                                            <option value="1976">1976</option>
                                            <option value="1975">1975</option>
                                            <option value="1974">1974</option>
                                            <option value="1973">1973</option>
                                            <option value="1972">1972</option>
                                            <option value="1971">1971</option>
                                            <option value="1970">1970</option>
                                            <option value="1969">1969</option>
                                            <option value="1968">1968</option>
                                            <option value="1967">1967</option>
                                            <option value="1966">1966</option>
                                            <option value="1965">1965</option>
                                            <option value="1964">1964</option>
                                            <option value="1963">1963</option>
                                            <option value="1962">1962</option>
                                            <option value="1961">1961</option>
                                            <option value="1960">1960</option>
                                            <option value="1959">1959</option>
                                            <option value="1958">1958</option>
                                            <option value="1957">1957</option>
                                            <option value="1956">1956</option>
                                            <option value="1955">1955</option>
                                            <option value="1954">1954</option>
                                            <option value="1953">1953</option>
                                            <option value="1952">1952</option>
                                            <option value="1951">1951</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="selModel" id="selModel" onchange="getTypes();">
                                            <option value="">– Selecteer model –</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="selUitvoering" id="selUitvoering" onchange="doNavigate();">
                                            <option value="">– Selecteer uitvoering –</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="switch-input switch-chassisnummer">
                                <form id="zoekenopchassisnummerform" name="zoekenopchassisnummerform" method="post" action="https://www.koskamp.nl/index.php?mact=kosDoc,cntnt01,verwerkAuto,0&amp;cntnt01returnid=34">
                                    <div class="zoekenopchassisnummer-holder">
                                        <input id="zoekopchassisnummer" placeholder="Chassisnummer" type="text" name="chassisnummer" autocomplete="off" class="form-control chassisnummerzoeker" value="">
                                        <button class="zoekopchassisnummer-button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="pull-right">
                            Zoeken op
                            <button style="display: none;" data-switch="kenteken" class="switch btn btn-default btn-xs">kenteken</button>
                            <button data-switch="merkmodeltype" class="switch btn btn-default btn-xs">merk/model/type</button>
                            <button data-switch="chassisnummer" class="switch btn btn-default btn-xs">chassisnummer</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="berichtencentrum">
                        <a href="/webshop/account" class="welkom" title="Welkom <?= Session::get('userLoggedIn')[0]->user_company_name; ?>">
                            <span class="hidden-xs">Welkom </span><?= Session::get('userLoggedIn')[0]->user_company_name; ?> 
                        </a>
                        <div class="col-xs-5 col-md-6 col-left">
                            <a href="https://www.koskamp.nl/mijn-account/berichtencentrum">Mijn berichten<span class="berichten-aantal-button btn btn-default btn-xs hidden-xs">0</span></a>
                        </div>
                        <div class="col-xs-7 col-md-6 col-right">
                            <a href="https://www.koskamp.nl/winkelwagen">Mijn winkelwagen<div class="winkelwagen-aantal btn btn-default btn-xs">0</div></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row second-row">
                <form name="frmSearch" method="post" action="https://www.koskamp.nl/zoekresultaten" id="frmSearchAlgemeen">
                    <div class="input-group">
                        <div class="zoekbalkswitch-input zoekbalkswitch-trefwoord">
                            <input id="search" data-type="q" name="search" autocomplete="off" type="text" class="form-control ac_input" placeholder="Zoek op artikelnummer, bandenmaat, OEM nummer of trefwoord" required="" pattern=".*\S+.*">
                            <input id="qSysnr" value="" name="qSysnr" type="hidden">
                        </div>
                        <div class="zoekbalkswitch-input zoekbalkswitch-groepen" style="display: none;">
                            <select name="zoekopgroepen" class="form-control zoekbalkswitch-groepen-select">
                                <option value="">– Selecteer een groep –</option>
                            </select>
                        </div>
                        <span class="input-group-addon">
                <button type="submit"><i class="fa fa-search"></i></button>
            </span>
                    </div>
                    <div class="pull-right" id="zoekbalk-switch-buttons">
                        Zoeken op
                        <div data-switch="groepen" class="zoekbalkswitch btn btn-default btn-xs">groepen</div>
                        <div data-switch="trefwoord" class="zoekbalkswitch btn btn-default btn-xs" style="display: none;">trefwoord</div>
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

        default:
            echo '<script>addClassToBody("start"); </script>'; 
            break;
    }
?>



</html>