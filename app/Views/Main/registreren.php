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

                            <li><a href="https://www.koskamp.nl/" title="Home"><span>Home</span></a>

                            </li>

                            <li><a href="https://www.koskamp.nl/over-koskamp/producten" title="Producten"><span>Producten</span></a>

                            </li>

                            <li><a href="https://www.koskamp.nl/opleidingen" title="Opleidingen"><span>Opleidingen</span></a>

                            </li>

                            <li><a href="https://www.koskamp.nl/contact" title="Contact"><span>Contact</span></a>

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
                <img class="first-slide img-responsive" src='<?= theme_url('images/slider/koskam1.jpg'); ?>' alt="First slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Een opleiding volgen bij Koskamp</h1>
                        <p>Kijk hier voor diverse opleidingen en trainingen</p>
                        <p><a class="btn btn-lg btn-danger" href="#" role="button">Klik hier</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="second-slide img-responsive" src="<?= theme_url('images/slider/koskam2.jpg'); ?>" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Een opleiding volgen bij Koskamp</h1>
                        <p>Kijk hier voor diverse opleidingen en trainingen</p>
                        <p><a class="btn btn-lg btn-danger" href="#">Klik hier</a></p>
                    </div>
                </div>
            </div>
            <div class="item active left">
                <img class="third-slide img-responsive" src="<?= theme_url('images/slider/koskam3.jpg'); ?>" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Een opleiding volgen bij Koskamp</h1>
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
                                            <tr><td>
                                                <input class="form-control form-text loginFormSmallinput form-username" type="text" name="email" id="txtUsername" value="" placeholder="Uw gebruikersnaam">
                                            </td></tr>
                                            <tr><td>
                                                <input class="form-control form-text loginFormSmallinput form-password" type="password" name="password" id="txtPassword" value="" placeholder="Uw wachtwoord">
                                            </td></tr>
                                            <tr><td></td>
                                            </tr>
                                            <tr><td>
                                            	<a href="/lostPassword">Wachtwoord vergeten?</a>
                                            </td></tr>
                                            <tr><td>
                                            	<a href="/registreren">Klant worden?</a>
                                            </td></tr>
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

        <div class="row featurette contentheading">
                <div class="col-lg-12">
                    <div id="systeembericht"></div>
                </div>
                <div class="col-lg-12">
                    <p></p><h1>
	Ik wil me aanmelden als nieuwe klant van Koskam
</h1>


<link href="//fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet" type="text/css">

<p class="handwriting">Koskamp verkoopt uitsluitend aan bedrijven en <span class="rood">niet</span> aan particulieren.</p>

<form action="" method="post">
    <div class="row">
        <div class="col-lg-6">
        	<div class="panel panel-default">
        		<div class="panel-heading">
                    <div class="panel-title">
                        Debiteuren administratie
                    </div>
        		</div>
                <div class="panel-body">
            		<table class="table">
            			<tbody><tr>
            				<td>
            					Bedrijfsnaam:
            					<span class="verplicht">
            						*
            					</span>
            				</td>
            				<td>
            					<input id="bedrijfsnaam" class="form-control" type="text" name="bedrijfsnaam" value="">
            				</td>
            			</tr>
            			<tr>
            				<td>
            					Naam eigenaar:
            					<span class="verplicht">
            						*
            					</span>
            				</td>
            				<td>
            					<input id="naameigenaar" class="form-control" type="text" name="naameigenaar" value="">
            				</td>
            			</tr>
            			<tr>
            				<td>
            					Afleveradres:
            					<span class="verplicht">
            						*
            					</span>
            				</td>
            				<td>
            					<input id="afleveradres" class="form-control" type="text" name="afleveradres" value="">
            				</td>
            			</tr>
            			<tr>
            				<td>
            					Postcode:
            					<span class="verplicht">
            						*
            					</span>
            				</td>
            				<td>
            					<input id="postcode" class="form-control" type="text" name="postcode" value="">
            				</td>
            			</tr>
            			<tr>
            				<td>
            					Woonplaats:
            					<span class="verplicht">
            						*
            					</span>
            				</td>
            				<td>
            					<input id="woonplaats" class="form-control" type="text" name="woonplaats" value="">
            				</td>
            			</tr>
            			<tr>
            				<td>
            					Telefoon vast:
            					<span class="verplicht">
            						*
            					</span>
            				</td>
            				<td>
            					<input id="telefoonvast" class="form-control" type="text" name="telefoonvast" value="">
            				</td>
            			</tr>
            			
            			<tr>
            				<td>
            					E-mail adres:
            					<span class="verplicht">
            						*
            					</span>
            				</td>
            				<td>
            					<input id="emailadres" class="form-control" type="text" name="emailadres" value="">
            				</td>
            			</tr>
            			<tr>
            				<td>
            				</td>
            				<td>
            					(
            					<span class="verplicht">
            						*
            					</span>
            					= verplicht)
            				</td>
            			</tr>
            		</tbody></table>
                </div>            
        	</div>
         </div>
         <div class="col-lg-6">
        	<div class="panel panel-default">
        		<div class="panel-heading">
                    <div class="panel-title">
                        Debiteuren administratie afwijkende gegevens
                    </div>
        		</div>
                <div class="panel-body">
            		<table class="table">
            			<tbody><tr>
            				<td class="form-links postadresafwijkend">
            					Postadres (indien afwijkend):
            				</td>
            				<td>
            					<input id="postadresafwijkend" class="form-control" type="text" name="postadresafwijkend" value="">
            				</td>
            			</tr>
            			<tr>
            				<td class="postcodeafwijkend">
            					Postcode:
            				</td>
            				<td>
            					<input id="postcodeafwijkend" class="form-control" type="text" name="postcodeafwijkend" value="">
            				</td>
            			</tr>
            			<tr>
            				<td class="woonplaatsafwijkend">
            					Woonplaats:
            				</td>
            				<td>
            					<input id="woonplaatsafwijkend" class="form-control" type="text" name="woonplaatsafwijkend" value="">
            				</td>
            			</tr>
            			<tr>
            				<td class="telefoonafwijkend">
            					Telefoon mobiel:
            				</td>
            				<td>
            					<input id="telefoonafwijkend" class="form-control" type="text" name="telefoonafwijkend" value="">
            				</td>
            			</tr>
            			
            			<tr>
            				<td class="kvknummer">
            					KvK nummer:
            					<span class="verplicht">
            						*
            					</span>
            				</td>
            				<td>
            					<input id="kvknummer" class="form-control" type="text" name="kvknummer" value="">
            				</td>
            			</tr>
            			<tr>
            				<td>
            				</td>
            				<td>
            					(
            					<span class="verplicht">
            						*
            					</span>
            					= verplicht)
            				</td>
            			</tr>
            		</tbody></table>
                </div>
        	</div>
         </div>
    </div>
	<div class="debiteurformulier-verzendknop">
		<input class="btn btn-primary" type="submit" name="submit" value="Verzenden">
	</div>
</form>
<p></p>
<!-- Add code here that should appear in the content block of all new pages -->                </div>
            </div>

        <div class="row featurette">
            <div class="col-md-6">
                <div class="news-front">
                    <h2>Nieuwsberichten</h2>
                    <div class="list-group">
                        <a class="list-group-item list-group-item-action" href="https://www.koskamp.nl/index.php?mact=kosNews,cntnt01,detail,0&amp;cntnt01item_id=150&amp;cntnt01returnid=20">
                            <h4 class="list-group-item-heading"><span class="rood">21-11-2017</span></h4>
                            <p class="list-group-item-text">TPMS en Koskamp</p>
                        </a>
                        <a class="list-group-item list-group-item-action" href="https://www.koskamp.nl/index.php?mact=kosNews,cntnt01,detail,0&amp;cntnt01item_id=69&amp;cntnt01returnid=20">
                            <h4 class="list-group-item-heading"><span class="rood">13-11-2017</span></h4>
                            <p class="list-group-item-text">De chocoladeletteractie is begonnen | 4 banden is een gratis chocoladeletter!</p>
                        </a>
                        <a class="list-group-item list-group-item-action" href="https://www.koskamp.nl/index.php?mact=kosNews,cntnt01,detail,0&amp;cntnt01item_id=149&amp;cntnt01returnid=20">
                            <h4 class="list-group-item-heading"><span class="rood">23-10-2017</span></h4>
                            <p class="list-group-item-text">Word nu Brembo Expert en profiteer van de vele voordelen!</p>
                        </a>
                        <a class="list-group-item list-group-item-action" href="https://www.koskamp.nl/index.php?mact=kosNews,cntnt01,detail,0&amp;cntnt01item_id=148&amp;cntnt01returnid=20">
                            <h4 class="list-group-item-heading"><span class="rood">04-10-2017</span></h4>
                            <p class="list-group-item-text">Spaar uw aankoopbedrag van uw Bosch Accutester en/of Acculader terug</p>
                        </a>
                        <a class="list-group-item list-group-item-action" href="https://www.koskamp.nl/index.php?mact=kosNews,cntnt01,detail,0&amp;cntnt01item_id=147&amp;cntnt01returnid=20">
                            <h4 class="list-group-item-heading"><span class="rood">30-08-2017</span></h4>
                            <p class="list-group-item-text">Nieuw : Pasvorm automatten!</p>
                        </a>
                    </div>
                    <div class="block-footer"></div>
                    <a class="news-link" href="https://www.koskamp.nl/index.php?mact=kosNews,cntnt01,overzicht,0&amp;cntnt01returnid=20"><span class="rood">meer nieuwsberichten</span></a> »
                </div>
            </div>

            <div class="col-md-6">
                <div class="vacatures-front">
                    <h2>Werken bij Koskamp!</h2>
                    <div class="list-group list-group-vacatures">
                        <a class="list-group-item list-group-item-action" href="https://www.koskamp.nl/index.php?mact=kosVacaturesEmply,cntnt01,default,0&amp;cntnt01vacatureId=10&amp;cntnt01returnid=20" title="Klantenservicemedewerker Koskamp">
                            <h4 class="list-group-item-heading"><span class="rood">Klantenservicemedewerker Koskamp</span></h4>
                            <p class="list-group-item-text">Den Ham (OV)</p>
                        </a>
                        <a class="list-group-item list-group-item-action" href="https://www.koskamp.nl/index.php?mact=kosVacaturesEmply,cntnt01,default,0&amp;cntnt01vacatureId=20&amp;cntnt01returnid=20" title="Logistiek medewerker">
                            <h4 class="list-group-item-heading"><span class="rood">Logistiek medewerker</span></h4>
                            <p class="list-group-item-text">Arnhem, Assen, Den Ham, Emmen, Groningen, Kampen, Leeuwarden, Nijmegen, Steenwijk, Zutphen</p>
                        </a>
                        <a class="list-group-item list-group-item-action" href="https://www.koskamp.nl/index.php?mact=kosVacaturesEmply,cntnt01,default,0&amp;cntnt01vacatureId=42&amp;cntnt01returnid=20" title="Bezorg(st)er (Steenwijk)">
                            <h4 class="list-group-item-heading"><span class="rood">Bezorg(st)er (Steenwijk)</span></h4>
                            <p class="list-group-item-text">Steenwijk</p>
                        </a>
                        <a class="list-group-item list-group-item-action" href="https://www.koskamp.nl/index.php?mact=kosVacaturesEmply,cntnt01,default,0&amp;cntnt01vacatureId=61&amp;cntnt01returnid=20" title="Werken &amp; Leren Logistiek (BBL)">
                            <h4 class="list-group-item-heading"><span class="rood">Werken &amp; Leren Logistiek (BBL)</span></h4>
                            <p class="list-group-item-text">Arnhem, Assen, Den Ham, Emmen, Groningen, Kampen, Leeuwarden, Lelystad, Nijmegen, Steenwijk, Zutphen</p>
                        </a>
                        <a class="list-group-item list-group-item-action" href="https://www.koskamp.nl/index.php?mact=kosVacaturesEmply,cntnt01,default,0&amp;cntnt01vacatureId=105&amp;cntnt01returnid=20" title="Order Picker">
                            <h4 class="list-group-item-heading"><span class="rood">Order Picker</span></h4>
                            <p class="list-group-item-text">Den Ham (OV)</p>
                        </a>
                    </div>
                    <div class="block-footer"></div>
                    <a href="https://www.koskamp.nl/index.php?mact=kosVacaturesEmply,cntnt01,default,0&amp;cntnt01returnid=20" class="news-link" title="Toon alle 10 vacatures"><span class="rood">meer vacatures</span></a> »
                </div>
            </div>
        </div>

        <hr class="featurette-divider">
    </div>

    <div id="sb-container">
        <div id="sb-overlay"></div>
        <div id="sb-wrapper">
            <div id="sb-title">
                <div id="sb-title-inner"></div>
            </div>
            <div id="sb-wrapper-inner">
                <div id="sb-body">
                    <div id="sb-body-inner"></div>
                    <div id="sb-loading">
                        <div id="sb-loading-inner"><span>loading</span></div>
                    </div>
                </div>
            </div>
            <div id="sb-info">
                <div id="sb-info-inner">
                    <div id="sb-counter"></div>
                    <div id="sb-nav">
                        <a id="sb-nav-close" title="Close" onclick="Shadowbox.close()"></a>
                        <a id="sb-nav-next" title="Next" onclick="Shadowbox.next()"></a>
                        <a id="sb-nav-play" title="Play" onclick="Shadowbox.play()"></a>
                        <a id="sb-nav-pause" title="Pause" onclick="Shadowbox.pause()"></a>
                        <a id="sb-nav-previous" title="Previous" onclick="Shadowbox.previous()"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="ads"></div>
</body>