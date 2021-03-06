<!DOCTYPE HTML>
<html>
	<head>
		<title><?= $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/AdminLTE.css" />

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/skins/skin-red.css" />

    <link rel="shortcut icon" type="image/png" href="<?= theme_url('images/icon.png'); ?>"/>

    <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.js"></script>

    <?php
      Assets::css([
        theme_url('css/style.css', 'Koskam'),
        theme_url('css/plugins/alertify/alertify.css', 'Koskam'),
        theme_url('css/plugins/alertify/alertify_theme.css', 'Koskam'),
        theme_url('css/plugins/fileinput/fileinput.css', 'Koskam'),
        '//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css',
        'https://cdn.datatables.net/v/bs/dt-1.10.16/fh-3.1.3/datatables.min.css',
      ]);

      Assets::js([
        theme_url('js/config.js', 'Koskam'),
        theme_url('js/main.js', 'Koskam'),
        theme_url('js/functions.js', 'Koskam'),
        'https://cdn.datatables.net/v/bs/dt-1.10.16/fh-3.1.3/datatables.min.js',
        theme_url('js/admin/admin_main.js', 'Koskam'),
        theme_url('js/admin/admin_functions.js', 'Koskam'),
        theme_url('js/plugins/alertify/alertify.js', 'Koskam'),
        theme_url('js/plugins/fileinput/fileinput.js', 'Koskam'),
      ]);

    ?>

	</head>
	
	<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">


  <header class="main-header">


    <a href="/admin/dashboard" class="logo">

      <span class="logo-mini"><b>K</b>K</span>

      <span class="logo-lg"><b>Kos</b>Kam</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          
          <li>
            <a href="/logout"><i class="fa fa-sign-out"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">

    <section class="sidebar">

      <ul class="sidebar-menu" style="margin-top: 15px;">
        <li class="header">Admin panel</li>
    
        <?php if($title == 'Dashboard'){echo '<li class="active">';}else{echo '<li>';} ?><a href="dashboard"><i class="fa fa-globe"></i> <span>Dashboard</span></a></li>
        <?php if($title == 'Producten'){echo '<li class="active">';}else{echo '<li>';} ?><a href="producten"><i class="fa fa-globe"></i> <span>Producten</span></a></li>
        <?php if($title == 'Bedrijven'){echo '<li class="active">';}else{echo '<li>';} ?><a href="bedrijven"><i class="fa fa-globe"></i> <span>Bedrijven</span></a></li>
        <?php if($title == 'Gebruikers'){echo '<li class="active">';}else{echo '<li>';} ?><a href="gebruikers"><i class="fa fa-globe"></i> <span>Accounts</span></a></li>
        <?php if($title == 'Bestellingen'){echo '<li class="active">';}else{echo '<li>';} ?><a href="#"><i class="fa fa-globe"></i> <span>Bestellingen</span></a></li>
        <?php if($title == 'Routes'){echo '<li class="active">';}else{echo '<li>';} ?><a href="#"><i class="fa fa-globe"></i> <span>Routes</span></a></li>
        <?php if($title == 'Werknemers'){echo '<li class="active">';}else{echo '<li>';} ?><a href="#"><i class="fa fa-globe"></i> <span>Werknemers</span></a></li>
        <?php if($title == 'Nieuws'){echo '<li class="active">';}else{echo '<li>';} ?><a href="#"><i class="fa fa-globe"></i> <span>Nieuws</span></a></li>
        <?php if($title == 'Vacatures'){echo '<li class="active">';}else{echo '<li>';} ?><a href="#"><i class="fa fa-globe"></i> <span>Vacatures</span></a></li>
        <?php if($title == 'Instellingen'){echo '<li class="active">';}else{echo '<li>';} ?><a href="#"><i class="fa fa-wrench"></i> <span>Instellingen</span></a></li>

      </ul>

    </section>

  </aside>


  <div class="content-wrapper">
  
    <section class="content">

      <?= $content ?>

    </section>

  </div>



  <footer class="main-footer">

    <div class="pull-right hidden-xs">
      © KosKam
    </div>

    <strong>Copyright &copy; 2017 <a href="#"></a>.</strong> All rights reserved.
  </footer>


		
</html>

<?php

  switch ($title) {
    case 'Dashboard':
      echo '<script>loadDashboard();</script>';
      break;

    case 'Producten':
      echo '<script>loadProducts();</script>';
      break;

    case 'Bedrijven':
      echo '<script>loadCompanies();</script>';
      break;

    case 'Gebruikers':
      echo '<script>loadAccounts();</script>';
      break;

    default:
      # code...
      break;
  }

?>