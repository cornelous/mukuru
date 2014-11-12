<h2>Public Profile for <?= $username; ?></h2>
<h3>Recent Messages:</h3>
<?php foreach ($messages as $message) : ?>
    <p class='message'>
        <?= $message; ?>
    </p>
<?php endforeach; ?>