<table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th style="cursor: pointer;" id="org_name" class="one_field_arrange_option" data-sortdb="org_name">Org<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="branch_name" class="one_field_arrange_option" data-sortdb="branch_name">Branch<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="group_name" class="one_field_arrange_option" data-sortdb="group_name">Group<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="manager_name" class="one_field_arrange_option" data-sortdb="manager_name">Manager<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="designation_name" class="one_field_arrange_option" data-sortdb="designation_name">Designation<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="status_name" class="one_field_arrange_option" data-sortdb="status_name">Status<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="signature" class="one_field_arrange_option" data-sortdb="signature">Signature<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="lang" class="one_field_arrange_option" data-sortdb="lang">Lang<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="timezone" class="one_field_arrange_option" data-sortdb="timezone">Timezone<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="locale" class="one_field_arrange_option" data-sortdb="locale">Locale<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="staff_name" class="one_field_arrange_option" data-sortdb="staff_name">Staff Name<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="created" class="one_field_arrange_option" data-sortdb="created">Created<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="updated" class="one_field_arrange_option" data-sortdb="updated">Updated<i class="fa fa-sort"></i></th>
		<th>Action</th>
            </tr><?php
            foreach ($staff_data as $staff)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$page ?></td>
			<td><?php echo $staff->org_name ?></td>
			<td><?php echo $staff->branch_name ?></td>
			<td><?php echo $staff->group_name ?></td>
			<td><?php echo $staff->manager_name ?></td>
			<td><?php echo $staff->designation_name ?></td>
			<td><?php echo $staff->status_name ?></td>
			<td><?php echo $staff->signature ?></td>
			<td><?php echo $staff->lang ?></td>
			<td><?php echo $staff->timezone ?></td>
			<td><?php echo $staff->locale ?></td>
			<td><?php echo $staff->staff_name ?></td>
			<td><?php echo $staff->created ?></td>
			<td><?php echo $staff->updated ?></td>
			<td style="text-align:center" width="200px">
				<div class="btn-group">
				<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
				<ul class="dropdown-menu"><li><a href="<?php echo site_url('staff/read/'.$staff->staff_id); ?>">Read</a></li><li><a href="<?php echo site_url('staff/update/'.$staff->staff_id); ?>">Edit</a></li><li><a href="<?php echo site_url('staff/delete/'.$staff->staff_id); ?>">Delete</a></li>
			</ul></div></td>
		</tr>
                <?php
            }
            ?>
        </table>
        <?php echo $this->ajax_pagination->create_links(); ?><input type="hidden" id="hid_total_rows" name="hid_total_rows" value="<?php echo $total_rows; ?>" />