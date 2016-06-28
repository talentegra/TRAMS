<a href="<?php echo site_url('user/add/'); ?>">Add</a>
<table border="1" width="100%">
    <tr>
		<td>ID</td>
		<td>Ip Address</td>
		<td>Username</td>
		<td>Password</td>
		<td>Salt</td>
		<td>Email</td>
		<td>Activation Code</td>
		<td>Forgotten Password Code</td>
		<td>Forgotten Password Time</td>
		<td>Remember Code</td>
		<td>Created On</td>
		<td>Modified On</td>
		<td>Last Login</td>
		<td>Active</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Company</td>
		<td>Phone</td>
		<td>Actions</td>
    </tr>
	<?php foreach($users as $u): ?>
    <tr>
		<td><?php echo $u['id']; ?></td>
		<td><?php echo $u['ip_address']; ?></td>
		<td><?php echo $u['username']; ?></td>
		<td><?php echo $u['password']; ?></td>
		<td><?php echo $u['salt']; ?></td>
		<td><?php echo $u['email']; ?></td>
		<td><?php echo $u['activation_code']; ?></td>
		<td><?php echo $u['forgotten_password_code']; ?></td>
		<td><?php echo $u['forgotten_password_time']; ?></td>
		<td><?php echo $u['remember_code']; ?></td>
		<td><?php echo $u['created_on']; ?></td>
		<td><?php echo $u['modified_on']; ?></td>
		<td><?php echo $u['last_login']; ?></td>
		<td><?php echo $u['active']; ?></td>
		<td><?php echo $u['first_name']; ?></td>
		<td><?php echo $u['last_name']; ?></td>
		<td><?php echo $u['company']; ?></td>
		<td><?php echo $u['phone']; ?></td>
		<td>
            <a href="<?php echo site_url('user/edit/'.$u['id']); ?>">Edit</a> | 
            <a href="<?php echo site_url('user/remove/'.$u['id']); ?>">Delete</a>
        </td>
    </tr>
	<?php endforeach; ?>
</table>