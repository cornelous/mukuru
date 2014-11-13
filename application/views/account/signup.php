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
            <?php echo Form::input('username', $username);?>
        </td>
        <td>
            <?php if ($errors): ?>
                <?php foreach ($errors as $key => $value): ?>
                    <?php if ($key == 'username'): ?>
                        <li class="errors"><?php echo 'Username can not be blank.';?></li>
                    <?php endif ?>
                <?php endforeach; ?>
            <?php endif ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('email', 'Email Address')?>:<br>
            <?php echo Form::input('email', $email); ?>
        </td>
        <td>
            <?php if ($errors): ?>
                <?php foreach ($errors as $key => $value): ?>
                    <?php if ($key == 'email'): ?>
                        <li class="errors"><?php echo 'Email can not be blank.';?></li>
                        <li class="errors"><?php echo 'Email should be a valid email address.';?></li>
                    <?php endif ?>
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
                        <li class="errors"><?php echo 'Password can not be blank.';?></li>
                        <li class="errors"><?php echo 'Password should be at least 6 characters.';?></li>
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
        <td>
            <?php if ($errors): ?>
                <?php foreach ($errors as $key => $value): ?>
                    <?php if ($key == 'password_confirm'): ?>
                        <li class="errors"><?php echo 'Password confirmation should match password.';?></li>
                    <?php endif ?>
                <?php endforeach; ?>
            <?php endif ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('namesurname', 'First name & surname')?>:<br>
            <?php echo Form::input('namesurname', $namesurname); ?>
        </td>
        <td>
            <?php if ($errors): ?>
                <?php foreach ($errors as $key => $value): ?>
                    <?php if ($key == 'namesurname'): ?>
                        <li class="errors"><?php echo 'First name & surname can not be blank.';?></li>
                    <?php endif ?>
                <?php endforeach; ?>
            <?php endif ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('address', 'Address')?>:<br>
            <?php echo Form::input('address', $address); ?>
        </td>
        <td>
            <?php if ($errors): ?>
                <?php foreach ($errors as $key => $value): ?>
                    <?php if ($key == 'address'): ?>
                        <li class="errors"><?php echo 'Address can not be blank.';?></li>
                    <?php endif ?>
                <?php endforeach; ?>
            <?php endif ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('city', 'City')?>:<br>
            <?php echo Form::input('city', $city); ?>
        </td>
        <td>
            <?php if ($errors): ?>
                <?php foreach ($errors as $key => $value): ?>
                    <?php if ($key == 'city'): ?>
                        <li class="errors"><?php echo 'City can not be blank.';?></li>
                    <?php endif ?>
                <?php endforeach; ?>
            <?php endif ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('country', 'Country')?>:<br>
            <?php echo Form::input('country', $country); ?>
        </td>
        <td>
            <?php if ($errors): ?>
                <?php foreach ($errors as $key => $value): ?>
                    <?php if ($key == 'country'): ?>
                        <li class="errors"><?php echo 'Country can not be blank.';?></li>
                    <?php endif ?>
                <?php endforeach; ?>
            <?php endif ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('phonenumber', 'Phone number')?>:<br>
            <?php echo Form::input('phonenumber', $phonenumber); ?>
        </td>
        <td>
            <?php if ($errors): ?>
                <?php foreach ($errors as $key => $value): ?>
                    <?php if ($key == 'phonenumber'): ?>
                        <li class="errors"><?php echo 'Phone number can not be blank.';?></li>
                    <?php endif ?>
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

