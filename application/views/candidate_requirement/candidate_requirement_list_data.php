<table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th style="cursor: pointer;" id="candidate_req_details" class="one_field_arrange_option" data-sortdb="candidate_req_details">Candidate Req Details<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="active" class="one_field_arrange_option" data-sortdb="active">Active<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="created" class="one_field_arrange_option" data-sortdb="created">Created<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="updated" class="one_field_arrange_option" data-sortdb="updated">Updated<i class="glyphicon glyphicon-sort"></i></th>
		<th>Action</th>
            </tr><?php
            foreach ($candidate_requirement_data as $candidate_requirement)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$page ?></td>
			<td><?php echo $candidate_requirement->candidate_req_details ?></td>
			<td><?php echo $candidate_requirement->active ?></td>
			<td><?php echo $candidate_requirement->created ?></td>
			<td><?php echo $candidate_requirement->updated ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('candidate_requirement/read/'.$candidate_requirement->candidate_req_id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('candidate_requirement/update/'.$candidate_requirement->candidate_req_id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('candidate_requirement/delete/'.$candidate_requirement->candidate_req_id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <?php echo $this->ajax_pagination->create_links(); ?><input type="hidden" id="hid_total_rows" name="hid_total_rows" value="<?php echo $total_rows; ?>" />