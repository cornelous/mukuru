<?php if ($errors) : ?>

    <table border=10 bordercolor=RED>
        <tr> <td><?php var_dump($errors); ?> </tr>
    </table>

<?php endif; ?>

<table id="login">
    <tr>
        <th>Sign Up</th>
        <th></th>
    </tr>
    <?php echo Form::open(); ?>
    <tr>
        <td>
            <?php echo Form::label('image', 'Image')?>:<br>
            <?php echo Form::input('image'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('username', 'Username')?>:<br>
            <?php echo Form::input('username'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('email', 'Email Address')?>:<br>
            <?php echo Form::input('email'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('password', 'Password')?>:<br>
            <?php echo Form::password('password'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('password_confirm', 'Confirm Password')?>:<br>
            <?php echo Form::password('password_confirm'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('namesurname', 'Full name')?>:<br>
            <?php echo Form::input('namesurname'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('address', 'Address')?>:<br>
            <?php echo Form::input('address'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('city', 'City')?>:<br>
            <?php echo Form::input('city'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('country', 'Country')?>:<br>
            <?php echo Form::input('country'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('phonenumber', 'Phone number')?>:<br>
            <?php echo Form::input('phonenumber'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::submit('submit', 'Sign Up'); ?>
        </td>
    </tr>
    <?php echo Form::close(); ?>
</table>

