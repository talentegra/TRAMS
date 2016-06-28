<a href="<?php echo site_url('auth/logout'); ?>">Logout</a></br>
 <a href="<?php echo site_url('student/add/'); ?>">Add</a> &nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('branch'); ?>">Branch</a>
 &nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('branch_admin'); ?>">Branch Admin</a>
 &nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('faculty'); ?>">Faculty </a>
 &nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('faculty_admin'); ?>">Faculty Admin</a>
 <table border="1" width="100%">
    <tr>
		<td>Student Id</td>
		<td>Branch Id</td>
		<td>Student Name</td>
		<td>Middle Name</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Mobile</td>
		<td>Reg Date</td>
		<td>Photo</td>
		<td>Notes</td>
		<td>Actions</td>
    </tr>
	<?php foreach($students as $s): ?>
    <tr>
		<td><?php echo $s['student_id']; ?></td>
		<td><?php echo $s['branch_id']; ?></td>
		<td><?php echo $s['student_name']; ?></td>
		<td><?php echo $s['middle_name']; ?></td>
		<td><?php echo $s['last_name']; ?></td>
		<td><?php echo $s['email']; ?></td>
		<td><?php echo $s['mobile']; ?></td>
		<td><?php echo $s['reg_date']; ?></td>
		<td><?php echo $s['photo']; ?></td>
		<td><?php echo $s['notes']; ?></td>
		<td>
            <a href="<?php echo site_url('student/edit/'.$s['student_id']); ?>">Edit</a> | 
            <a href="<?php echo site_url('student/remove/'.$s['student_id']); ?>">Delete</a>
        </td>
    </tr>
	<?php endforeach; ?>
</table>