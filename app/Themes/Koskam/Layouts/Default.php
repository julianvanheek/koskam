<!DOCTYPE HTML>
<html>
    <head>
        <title><?= $title; ?></title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
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
                theme_url('css/plugins/alertify/alertify.css', 'Koskam'),
                theme_url('css/plugins/alertify/alertify_theme.css', 'Koskam'),
            ]);
        ?>

    </head>

    <body>
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
        ]);
    ?>



</html>