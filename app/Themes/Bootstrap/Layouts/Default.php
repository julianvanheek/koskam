<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Config::get('app.name'); ?></title>

    <?php 

        Assets::css([
            vendor_url('dist/css/bootstrap.min.css', 'twbs/bootstrap'),
            vendor_url('dist/css/bootstrap-theme.min.css', 'twbs/bootstrap'),
            'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
            theme_url('css/bootstrap-xl-mod.min.css', 'Bootstrap'),
            theme_url('css/style.css', 'Bootstrap'),
            theme_url('plugins/css/style.css', 'Bootstrap'),
        ]);

    ?>

</head>
<body>

<?= $content; ?>

</div>

<?php
    Assets::js([
        'https://code.jquery.com/jquery-1.12.4.min.js',
        vendor_url('dist/js/bootstrap.min.js', 'twbs/bootstrap'),
    ]);
?>

<!-- DO NOT DELETE! - Forensics Profiler -->

</body>
</html>
