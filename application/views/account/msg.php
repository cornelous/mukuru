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
    </tr>
</table>