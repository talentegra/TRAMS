<table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th style="cursor: pointer;" id="student_id" class="one_field_arrange_option" data-sortdb="student_id">Student Id<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="faculty_id" class="one_field_arrange_option" data-sortdb="faculty_id">Faculty Id<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="student_rating" class="one_field_arrange_option" data-sortdb="student_rating">Student Rating<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="student_comments" class="one_field_arrange_option" data-sortdb="student_comments">Student Comments<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="faculty_rating" class="one_field_arrange_option" data-sortdb="faculty_rating">Faculty Rating<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="faculty_comments" class="one_field_arrange_option" data-sortdb="faculty_comments">Faculty Comments<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="active" class="one_field_arrange_option" data-sortdb="active">Active<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="created" class="one_field_arrange_option" data-sortdb="created">Created<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="updated" class="one_field_arrange_option" data-sortdb="updated">Updated<i class="glyphicon glyphicon-sort"></i></th>
		<th>Action</th>
            </tr><?php
            foreach ($batches_students_data as $batches_students)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$page ?></td>
			<td><?php echo $batches_students->student_id ?></td>
			<td><?php echo $batches_students->faculty_id ?></td>
			<td><?php echo $batches_students->student_rating ?></td>
			<td><?php echo $batches_students->student_comments ?></td>
			<td><?php echo $batches_students->faculty_rating ?></td>
			<td><?php echo $batches_students->faculty_comments ?></td>
			<td><?php echo $batches_students->active ?></td>
			<td><?php echo $batches_students->created ?></td>
			<td><?php echo $batches_students->updated ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('batches_students/read/'.$batches_students->batch_id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('batches_students/update/'.$batches_students->batch_id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('batches_students/delete/'.$batches_students->batch_id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <?php echo $this->ajax_pagination->create_links(); ?><input type="hidden" id="hid_total_rows" name="hid_total_rows" value="<?php echo $total_rows; ?>" />