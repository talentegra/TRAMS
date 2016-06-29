<table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th style="cursor: pointer;" id="leads_name" class="one_field_arrange_option" data-sortdb="leads_name">Lead<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="followup_type" class="one_field_arrange_option" data-sortdb="followup_type">Followup Type<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="interest_level_name" class="one_field_arrange_option" data-sortdb="interest_level_name">Interest Level<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="followup_date" class="one_field_arrange_option" data-sortdb="followup_date">Followup Date<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="followup_action_name" class="one_field_arrange_option" data-sortdb="followup_action_name">Followup Action<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="followup_comments" class="one_field_arrange_option" data-sortdb="followup_comments">Followup Comments<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="next_followup_date" class="one_field_arrange_option" data-sortdb="next_followup_date">Next Followup Date<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="next_followup_action_name" class="one_field_arrange_option" data-sortdb="next_followup_action_name">Next Followup Action<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="staff_name" class="one_field_arrange_option" data-sortdb="staff_name">Staff<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="status" class="one_field_arrange_option" data-sortdb="status">Status<i class="fa fa-sort"></i></th>
		<th>Action</th>
            </tr><?php
            foreach ($followup_thread_data as $followup_thread)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$page ?></td>
			<td><?php echo $followup_thread->leads_name ?></td>
			<td><?php echo $followup_thread->followup_type ?></td>
			<td><?php echo $followup_thread->interest_level_name ?></td>
			<td><?php echo $followup_thread->followup_date ?></td>
			<td><?php echo $followup_thread->followup_action_name ?></td>
			<td><?php echo $followup_thread->followup_comments ?></td>
			<td><?php echo $followup_thread->next_followup_date ?></td>
			<td><?php echo $followup_thread->next_followup_action_name ?></td>
			<td><?php echo $followup_thread->staff_name ?></td>
			<td><?php echo $followup_thread->status ?></td>
			<td style="text-align:center" width="200px">
				<div class="btn-group">
				<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
				<ul class="dropdown-menu">
				 <li><a href="<?php echo site_url('leads/read/'.$followup_thread->lead_id); ?>">Read</a></li>
                                    <li><a href="<?php echo site_url('leads/update/'.$followup_thread->lead_id); ?>">Edit</a></li>
                                    <li><a href="<?php echo site_url('leads/delete/'.$followup_thread->lead_id); ?>">Delete</a></li>
                                    <li><a href="javascript:void(0);" id="follow_up" onclick="follow_up(<?php echo $followup_thread->lead_id; ?>);">Add Follow Up</a></li>
			</ul></div></td>
		</tr>
                <?php
            }
            ?>
        </table>
        <?php echo $this->ajax_pagination->create_links(); ?><input type="hidden" id="hid_total_rows" name="hid_total_rows" value="<?php echo $total_rows; ?>" />