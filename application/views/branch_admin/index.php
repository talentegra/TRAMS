<a href="<?php echo site_url('auth/logout'); ?>">Logout</a></br>
 <a href="<?php echo site_url('branch_admin/add/'); ?>">Add</a> &nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('branch'); ?>">Branch</a>
 &nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('faculty'); ?>">Faculty</a>
 &nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('faculty_admin'); ?>">Faculty Admin</a>
 <table border="1" width="100%">
    <tr>
		<td>ID</td>
		<td>Branch code</td>
		<td>Admin name</td>
		<td>Actions</td>
    </tr>
	<?php foreach($branch_admins as $b): ?>
    <tr>
		<td><?php echo $b['id']; ?></td>
		<td><?php echo $b['branch_code']; ?></td>
		<td><?php echo $b['first_name'].' '.$b['last_name']; ?></td>
		<td>
            <a href="<?php echo site_url('branch_admin/edit/'.$b['id']); ?>">Edit</a> | 
            <a href="<?php echo site_url('branch_admin/remove/'.$b['id']); ?>">Delete</a>
        </td>
    </tr>
	<?php endforeach; ?>
</table>