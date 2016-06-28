<a href="<?php echo site_url('auth/logout'); ?>">Logout</a></br>
 <a href="<?php echo site_url('faculty/add/'); ?>">Add</a> &nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('branch'); ?>">Branch</a>
 &nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('branch_admin'); ?>">Branch Admin</a>
 &nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('faculty_admin'); ?>">Faculty Admin</a>
 <table border="1" width="100%">
    <tr>
		<td>Faculty Name</td>
		<td>Last Name</td>
		<td>Father Name</td>
		<td>Husband Name</td>
		<td>Branch Id</td>
		<td>Dob</td>
		<td>Dob Place</td>
		<td>Martial Status</td>
		<td>Children</td>
		<td>Email</td>
		<td>Mobile</td>
		<td>Home Phone</td>
		<td>Photo</td>
		<td>Joined Date</td>
		<td>Education</td>
		<td>Specialization</td>
		<td>Achivement Awards</td>
		<td>Events Attended</td>
		<td>Event Trained</td>
		<td>Fulltime</td>
		<td>Notes</td>
		<td>Actions</td>
    </tr>
	<?php foreach($faculty as $f): ?>
    <tr>
		<td><?php echo $f['faculty_name']; ?></td>
		<td><?php echo $f['last_name']; ?></td>
		<td><?php echo $f['father_name']; ?></td>
		<td><?php echo $f['husband_name']; ?></td>
		<td><?php echo $f['branch_id']; ?></td>
		<td><?php echo $f['dob']; ?></td>
		<td><?php echo $f['dob_place']; ?></td>
		<td><?php echo $f['martial_status']; ?></td>
		<td><?php echo $f['children']; ?></td>
		<td><?php echo $f['email']; ?></td>
		<td><?php echo $f['mobile']; ?></td>
		<td><?php echo $f['home_phone']; ?></td>
		<td><?php echo $f['photo']; ?></td>
		<td><?php echo $f['joined_date']; ?></td>
		<td><?php echo $f['education']; ?></td>
		<td><?php echo $f['specialization']; ?></td>
		<td><?php echo $f['achivement_awards']; ?></td>
		<td><?php echo $f['events_attended']; ?></td>
		<td><?php echo $f['event_trained']; ?></td>
		<td><?php echo $f['fulltime']; ?></td>
		<td><?php echo $f['notes']; ?></td>
		<td>
            <a href="<?php echo site_url('faculty/edit/'.$f['id']); ?>">Edit</a> | 
            <a href="<?php echo site_url('faculty/remove/'.$f['id']); ?>">Delete</a>
        </td>
    </tr>
	<?php endforeach; ?>
</table>