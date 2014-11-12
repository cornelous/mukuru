<?php foreach ($userdetails as $user) : ?>
<table id="users">
    <tr>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <td>Username</td>
        <td><?php echo $user['username']?></td>
    </tr>
    <tr class="alt">
        <td>Full name</td>
        <td><?php echo $user['namesurname']?></td>
    </tr>
    <tr>
        <td>Address</td>
        <td><?php echo $user['address']?></td>
    </tr>
    <tr class="alt">
        <td>City</td>
        <td><?php echo $user['city']?></td>
    </tr>
    <tr>
        <td>Country</td>
        <td><?php echo $user['country']?></td>
    </tr>
    <tr>
        <td>Phone Number</td>
        <td><?php echo $user['phonenumber']?></td>
    </tr>
    <tr class="alt">
        <td>Email</td>
        <td><?php echo $user['email']?></td>
    </tr>
</table>
<?php endforeach; ?>