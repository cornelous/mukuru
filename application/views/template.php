<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $site_name?></title>
    <link rel="shortcut icon" href="<?php echo URL::base(); ?>media/img/favicon.ico">
    <?php foreach ($styles as $style) : ?>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo URL::base(); ?>media/css/<?php echo $style; ?>.css"  />
    <?php endforeach; ?>
    <?php foreach ($scripts as $script) : ?>
        <script type="text/javascript" src="<?php echo url::base(); ?>media/js/<?php echo $script; ?>.js"></script>
    <?php endforeach; ?>
</head>
<body>
        <div id="wrapper">
            <div id="header"><?php echo View::factory('common/header'); ?></div>
            <div id="content"><?php echo $view; ?></div>
            <div id="footer"><?php echo View::factory('common/footer'); ?></div>
        </div>
</body>
</html>