<table id="signup">
    <tr>
        <th>Sign Up</th>
        <th></th>
    </tr>
    <?php echo Form::open(NULL, array('enctype' => 'multipart/form-data')); ?>
    <tr>
        <td>
            <?php echo Form::label('avatar', 'You avatar')?>:<br>
            <?php echo Form::file('avatar'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Form::label('password', 'Password')?>:<br>
            <?php echo Form::password('password', $password); ?>
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
            <?php echo Form::password('password_confirm', $password); ?>
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
            <?php echo Form::select('country', array('0' =>'', '1'=>'ANGOLA','2'=>'MALAWI','3'=>'SOUTH AFRICA', '4'=>'ZIMBABWE',)); ?>
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
            <?php echo Form::submit('submit', 'Update Details'); ?>
        </td>
    </tr>
    <?php echo Form::close(); ?>
</table>

