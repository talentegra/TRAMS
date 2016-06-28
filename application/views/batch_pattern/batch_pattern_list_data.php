<table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th style="cursor: pointer;" id="batch_pattern" class="one_field_arrange_option" data-sortdb="batch_pattern">Batch Pattern<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="active" class="one_field_arrange_option" data-sortdb="active">Active<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="created" class="one_field_arrange_option" data-sortdb="created">Created<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="updated" class="one_field_arrange_option" data-sortdb="updated">Updated<i class="glyphicon glyphicon-sort"></i></th>
		<th>Action</th>
            </tr><?php
            foreach ($batch_pattern_data as $batch_pattern)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$page ?></td>
			<td><?php echo $batch_pattern->batch_pattern ?></td>
			<td><?php echo $batch_pattern->active ?></td>
			<td><?php echo $batch_pattern->created ?></td>
			<td><?php echo $batch_pattern->updated ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('batch_pattern/read/'.$batch_pattern->batch_pattern_id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('batch_pattern/update/'.$batch_pattern->batch_pattern_id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('batch_pattern/delete/'.$batch_pattern->batch_pattern_id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <?php echo $this->ajax_pagination->create_links(); ?><input type="hidden" id="hid_total_rows" name="hid_total_rows" value="<?php echo $total_rows; ?>" />