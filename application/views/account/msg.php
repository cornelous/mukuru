<script>
setTimeout(function () {
window.location.href = "http://cornelo.us/index.php"; //will redirect to your blog page (an ex: blog.html)
}, 10000); //will call the function after 2 secs.
</script>

<table id="success">
    <tr>
        <th>Success</th>
        <th></th>
    </tr>

    <tr>
        <?php if ($msg == 'pwdreset'): ?>
        <td>
            <?php echo 'Your password has been successfully reset, please check your email' ?>
        </td>
        <?php endif ?>
        <?php if ($msg == 'logout'): ?>
            <td>
                <?php echo 'Your have been successfully logged out' ?>
            </td>
        <?php endif ?>
        <?php if ($msg == 'newsignup'): ?>
            <td>
                <?php echo 'Your successfully signed up, please check your inbox and click the verify your email link.' ?>
            </td>
        <?php endif ?>
        <?php if ($msg == 'verified'): ?>
            <td>
                <?php echo 'You have successfully verified your email, you will now be redirected to the login page' ?>
            </td>
        <?php endif ?>

        <?php if ($msg == 'emailnot'): ?>
            <td class="errors">
                <?php echo 'We could not reset your password as we have no record with the email you provided.' ?>
            </td>
        <?php endif ?>
    </tr>
</table>
