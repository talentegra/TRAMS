<table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th style="cursor: pointer;" id="course_name" class="one_field_arrange_option" data-sortdb="course_name">Course<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="batch_title" class="one_field_arrange_option" data-sortdb="batch_title">Batch Title<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="description" class="one_field_arrange_option" data-sortdb="description">Description<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="faculty_name" class="one_field_arrange_option" data-sortdb="faculty_name">Faculty<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="branch_name" class="one_field_arrange_option" data-sortdb="branch_name">Branch<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="batch_type_name" class="one_field_arrange_option" data-sortdb="batch_type_name">Batch Type<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="batch_pattern" class="one_field_arrange_option" data-sortdb="batch_pattern">Batch Pattern<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="student_enrolled" class="one_field_arrange_option" data-sortdb="student_enrolled">Student Enrolled<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="batch_capacity" class="one_field_arrange_option" data-sortdb="batch_capacity">Batch Capacity<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="iscorporate" class="one_field_arrange_option" data-sortdb="iscorporate">Iscorporate<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="currency_name" class="one_field_arrange_option" data-sortdb="currency_name">Currency<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="batch_fee_type" class="one_field_arrange_option" data-sortdb="batch_fee_type">Batch Fee Type<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="fees" class="one_field_arrange_option" data-sortdb="fees">Fees<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="course_fee_type" class="one_field_arrange_option" data-sortdb="course_fee_type">Course Fee Type<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="course_fee" class="one_field_arrange_option" data-sortdb="course_fee">Course Fee<i class="fa fa-sort"></i></th>
		<th>Action</th>
            </tr><?php
            foreach ($batches_data as $batches)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$page ?></td>
			<td><?php echo $batches->course_name ?></td>
			<td><?php echo $batches->batch_title ?></td>
			<td><?php echo $batches->description ?></td>
			<td><?php echo $batches->faculty_name ?></td>
			<td><?php echo $batches->branch_name ?></td>
			<td><?php echo $batches->batch_type_name ?></td>
			<td><?php echo $batches->batch_pattern ?></td>
			<td><?php echo $batches->student_enrolled ?></td>
			<td><?php echo $batches->batch_capacity ?></td>
			<td><?php echo $batches->iscorporate ?></td>
			<td><?php echo $batches->currency_name ?></td>
			<td><?php echo $batches->batch_fee_type ?></td>
			<td><?php echo $batches->fees ?></td>
			<td><?php echo $batches->course_fee_type ?></td>
			<td><?php echo $batches->course_fee ?></td>
			<td style="text-align:center" width="200px">
				<div class="btn-group">
				<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
				<ul class="dropdown-menu"><li><a href="<?php echo site_url('batches/read/'.$batches->batch_id); ?>">Read</a></li><li><a href="<?php echo site_url('batches/update/'.$batches->batch_id); ?>">Edit</a></li><li><a href="<?php echo site_url('batches/delete/'.$batches->batch_id); ?>">Delete</a></li>
			</ul></div></td>
		</tr>
                <?php
            }
            ?>
        </table>
        <?php echo $this->ajax_pagination->create_links(); ?><input type="hidden" id="hid_total_rows" name="hid_total_rows" value="<?php echo $total_rows; ?>" />