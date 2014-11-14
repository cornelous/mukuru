<table id="login">
    <tr>
        <th>Login</th>
        <th></th>
    </tr>
            <?php echo Form::open(); ?>
            <tr>
                <td>
                    <?php echo Form::label('username', 'Username')?>
                    <?php echo Form::input('username'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo Form::label('password', 'Password')?>
                    <?php echo Form::password('password'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo Form::submit('submit', 'Login'); ?>
                </td>
            </tr>

            <?php if ($errors) : ?>
                <tr>
                    <td class="errors">
                        <?php echo "You have supplied invalid logins. Please try again." ?>
                    </td>
                </tr>

            <?php endif ?>

            <?php echo Form::close(); ?>
</table>
