<table id="login">
    <tr>
        <th>Reset Password</th>
        <th></th>
    </tr>
            <?php echo Form::open(); ?>
            <tr>
                <td>
                    <?php echo Form::label('email', 'Please enter your email address')?>
                    <?php echo Form::input('email'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo Form::submit('submit', 'Send new password'); ?>
                </td>
            </tr>
            <?php echo Form::close(); ?>
</table>
