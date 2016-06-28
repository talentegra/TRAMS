<table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th style="cursor: pointer;" id="category_name" class="one_field_arrange_option" data-sortdb="category_name">Category<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="course_code" class="one_field_arrange_option" data-sortdb="course_code">Course Code<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="course_name" class="one_field_arrange_option" data-sortdb="course_name">Course Name<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="course_summary" class="one_field_arrange_option" data-sortdb="course_summary">Course Summary<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="course_contents" class="one_field_arrange_option" data-sortdb="course_contents">Course Contents<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="course_duration" class="one_field_arrange_option" data-sortdb="course_duration">Course Duration<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="course_fee_type" class="one_field_arrange_option" data-sortdb="course_fee_type">Course Fee Type<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="notes" class="one_field_arrange_option" data-sortdb="notes">Notes<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="active" class="one_field_arrange_option" data-sortdb="active">Active<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="created" class="one_field_arrange_option" data-sortdb="created">Created<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="updated" class="one_field_arrange_option" data-sortdb="updated">Updated<i class="fa fa-sort"></i></th>
		<th>Action</th>
            </tr><?php
            foreach ($courses_data as $courses)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$page ?></td>
			<td><?php echo $courses->category_name ?></td>
			<td><?php echo $courses->course_code ?></td>
			<td><?php echo $courses->course_name ?></td>
			<td><?php echo $courses->course_summary ?></td>
			<td><?php echo $courses->course_contents ?></td>
			<td><?php echo $courses->course_duration ?></td>
			<td><?php echo $courses->course_fee_type ?></td>
			<td><?php echo $courses->notes ?></td>
			<td><?php echo $courses->active ?></td>
			<td><?php echo $courses->created ?></td>
			<td><?php echo $courses->updated ?></td>
			<td style="text-align:center" width="200px">
				<div class="btn-group">
				<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
				<ul class="dropdown-menu"><li><a href="<?php echo site_url('courses/read/'.$courses->course_id); ?>">Read</a></li><li><a href="<?php echo site_url('courses/update/'.$courses->course_id); ?>">Edit</a></li><li><a href="<?php echo site_url('courses/delete/'.$courses->course_id); ?>">Delete</a></li>
			</ul></div></td>
		</tr>
                <?php
            }
            ?>
        </table>
        <?php echo $this->ajax_pagination->create_links(); ?><input type="hidden" id="hid_total_rows" name="hid_total_rows" value="<?php echo $total_rows; ?>" />