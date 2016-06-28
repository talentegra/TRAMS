<a href="<?php echo site_url('auth/logout'); ?>">Logout</a></br>
 <a href="<?php echo site_url('faculty_admin/add/'); ?>">Add</a> &nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('branch'); ?>">Branch</a>
 &nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('branch_admin'); ?>">Branch Admin</a>
 &nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('faculty'); ?>">Faculty </a>
  &nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('student'); ?>">Student </a>
 <table border="1" width="100%"><table border="1" width="100%">
    <tr>
		<td>ID</td>
		<td>Faculty</td>
		<td>Admin Name</td>
		<td>Actions</td>
    </tr>
	<?php foreach($faculty_admins as $f): ?>
    <tr>
		<td><?php echo $f['id']; ?></td>
		<td><?php echo $f['faculty_name']; ?></td>
		<td><?php echo $f['first_name'].' '.$f['last_name'];  ?></td>
		<td>
            <a href="<?php echo site_url('faculty_admin/edit/'.$f['id']); ?>">Edit</a> | 
            <a href="<?php echo site_url('faculty_admin/remove/'.$f['id']); ?>">Delete</a>
        </td>
    </tr>
	<?php endforeach; ?>
</table>