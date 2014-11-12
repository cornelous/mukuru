<table id="signup">
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
        <td>
            <?php if ($errors): ?>
                <?php foreach ($errors as $key => $value): ?>
                    <?php if ($key == 'username') echo "USERNAME error"; ?>
                <?php endforeach; ?>
            <?php endif ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('email', 'Email Address')?>:<br>
            <?php echo Form::input('email'); ?>
        </td>
        <td>
            <?php if ($errors): ?>
                <?php foreach ($errors as $key => $value): ?>
                    <?php if ($key == 'email') echo "EMAIL error"; ?>
                <?php endforeach; ?>
            <?php endif ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('password', 'Password')?>:<br>
            <?php echo Form::password('password'); ?>
        </td>
        <td>
            <?php if ($errors): ?>
                <?php foreach ($errors as $key => $value): ?>
                    <?php if ($key == 'password'): ?>
                        <li><?php echo 'Password can not be blank';?></li>
                        <li><?php echo 'Password can should be at least 6 characters';?></li>
                    <?php endif ?>
                <?php endforeach; ?>
            <?php endif ?>
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
        <td>
            <?php if ($errors): ?>
                <?php foreach ($errors as $key => $value): ?>
                    <?php if ($key == 'namesurname') echo "FULL NAME error"; ?>
                <?php endforeach; ?>
            <?php endif ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('address', 'Address')?>:<br>
            <?php echo Form::input('address'); ?>
        </td>
        <td>
            <?php if ($errors): ?>
                <?php foreach ($errors as $key => $value): ?>
                    <?php if ($key == 'address') echo "ADDRESS error"; ?>
                <?php endforeach; ?>
            <?php endif ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('city', 'City')?>:<br>
            <?php echo Form::input('city'); ?>
        </td>
        <td>
            <?php if ($errors): ?>
                <?php foreach ($errors as $key => $value): ?>
                    <?php if ($key == 'city') echo "CITY error"; ?>
                <?php endforeach; ?>
            <?php endif ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('country', 'Country')?>:<br>
            <?php echo Form::input('country'); ?>
        </td>
        <td>
            <?php if ($errors): ?>
                <?php foreach ($errors as $key => $value): ?>
                    <?php if ($key == 'country') echo "COUNTRY error"; ?>
                <?php endforeach; ?>
            <?php endif ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('phonenumber', 'Phone number')?>:<br>
            <?php echo Form::input('phonenumber'); ?>
        </td>
        <td>
            <?php if ($errors): ?>
                <?php foreach ($errors as $key => $value): ?>
                    <?php if ($key == 'phonenumber') echo "PHONE NUMBER error"; ?>
                <?php endforeach; ?>
            <?php endif ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::submit('submit', 'Sign Up'); ?>
        </td>
    </tr>
    <?php echo Form::close(); ?>
</table>

