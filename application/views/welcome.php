<table id="users">
    <tr>
        <th>Username</th>
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Country</th>
        <th>Email</th>
        <th>Phonenumber</th>
        <th>Password</th>
        <th>Active</th>
        <th>Verified</th>
        <th>Actions</th>
    </tr>
    <?php $count = 0;?>
    <?php foreach ($users as $user) : ?>
    <?php if ($count %2 == 0): ?>
    <tr>
        <td><?php echo $user['username']; ?></td>
        <td><?php echo $user['namesurname']; ?></td>
        <td><?php echo $user['address']; ?></td>
        <td><?php echo $user['country']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['phonenumber']; ?></td>
        <td><?php echo $user['password']; ?></td>
        <td><?php echo ($user['active'] == 1? 'ACTIVE': 'DISABLED'); ?></td>
        <td><?php echo ($user['verified'] == 1? 'VERIFIED': 'NOT VERIFIED'); ?></td>
        <td><?php echo HTML::anchor("edit?uid={$user['id']}", 'Edit');?> | <?php echo HTML::anchor("deactivate?uid={$user['id']}", 'Deactivate');?></td>
    </tr>
    <?php else: ?>
        <tr class = "alt">
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['namesurname']; ?></td>
            <td><?php echo $user['address']; ?></td>
            <td><?php echo $user['country']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['phonenumber']; ?></td>
            <td><?php echo $user['password']; ?></td>
            <td><?php echo ($user['active'] == 1? 'ACTIVE': 'DISABLED'); ?></td>
            <td><?php echo ($user['verified'] == 1? 'VERIFIED': 'NOT VERIFIED'); ?></td>
            <td><?php echo HTML::anchor("edit?uid={$user['id']}", 'Edit');?> |
                <?php echo HTML::anchor("deactivate?uid={$user['id']}", $user['active'] == 1? 'Activate': 'Deactivate');?>
            </td>
        </tr>
     <?php endif; ?>
    <?php $count++;?>
    <?php endforeach; ?>
</table>
<br>
<div class="pagination">
    <?php echo $pager_links; ?>
 </div>
<br>

