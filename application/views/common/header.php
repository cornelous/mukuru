<div id="logo">
    <img src="<?php echo url::base(); ?>media/img/mukuru.jpeg" alt="<?php echo $site_name; ?>" />
</div>
<div id="account">
  <p>
    <?php
    $session = Session::instance();
    $user = $session->get('username');
    if ($user) : ?>
        You are logged in as: <?php echo $user; ?>.
        <?php echo HTML::anchor('logout', 'Logout');?>
        <?php echo HTML::anchor("edit?uname={$user}", 'Update Details'); ?>
    <?php else: ?>
            <?php echo HTML::anchor('signup', 'Sign Up');?> | <?php echo HTML::anchor('login', 'Login');?> | <?php  echo HTML::anchor('reset', 'Reset password');?>
    <?php endif; ?>
</p>
</div>
