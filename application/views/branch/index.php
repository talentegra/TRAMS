<a href="<?php echo site_url('auth/logout'); ?>">Logout</a></br>
 <a href="<?php echo site_url('branch/add/'); ?>">Add</a>  &nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('branch_admin'); ?>">Branch Admins</a>
 &nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('faculty'); ?>">Faculty</a>
 &nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('faculty_admin'); ?>">Faculty Admin</a>
<table border="1" width="100%">
    <tr>
		<td>Branch Code</td>
		<td>Address</td>
		<td>Branch Area</td>
		<td>City</td>
		<td>Zipcode</td>
		<td>Branch Admin</td>
		<td>Branch Type</td>
		<td>Phone</td>
		<td>Extn</td>
		<td>Email</td>
		<td>Mobile</td>
		<td>Domain</td>
		<td>Capacity</td>
		<td>Notes</td>
		<td>Actions</td>
    </tr>
	<?php foreach($branch as $b): ?>
    <tr>
		<td><?php echo $b['branch_code']; ?></td>
		<td><?php echo $b['address']; ?></td>
		<td><?php echo $b['branch_area']; ?></td>
		<td><?php echo $b['city']; ?></td>
		<td><?php echo $b['zipcode']; ?></td>
		<td><?php echo $b['branch_admin']; ?></td>
		<td><?php echo $b['branch_type']; ?></td>
		<td><?php echo $b['phone']; ?></td>
		<td><?php echo $b['extn']; ?></td>
		<td><?php echo $b['email']; ?></td>
		<td><?php echo $b['mobile']; ?></td>
		<td><?php echo $b['domain']; ?></td>
		<td><?php echo $b['capacity']; ?></td>
		<td><?php echo $b['notes']; ?></td>
		<td>
            <a href="<?php echo site_url('branch/edit/'.$b['id']); ?>">Edit</a> | 
            <a href="<?php echo site_url('branch/remove/'.$b['id']); ?>">Delete</a>
        </td>
    </tr>
	<?php endforeach; ?>
</table>