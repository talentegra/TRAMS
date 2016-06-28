<table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th style="cursor: pointer;" id="branch_type_name" class="one_field_arrange_option" data-sortdb="branch_type_name">Branch Type Name<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="active" class="one_field_arrange_option" data-sortdb="active">Active<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="created" class="one_field_arrange_option" data-sortdb="created">Created<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="updated" class="one_field_arrange_option" data-sortdb="updated">Updated<i class="glyphicon glyphicon-sort"></i></th>
		<th>Action</th>
            </tr><?php
            foreach ($branch_type_data as $branch_type)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$page ?></td>
			<td><?php echo $branch_type->branch_type_name ?></td>
			<td><?php echo $branch_type->active ?></td>
			<td><?php echo $branch_type->created ?></td>
			<td><?php echo $branch_type->updated ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('branch_type/read/'.$branch_type->branch_type_id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('branch_type/update/'.$branch_type->branch_type_id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('branch_type/delete/'.$branch_type->branch_type_id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <?php echo $this->ajax_pagination->create_links(); ?><input type="hidden" id="hid_total_rows" name="hid_total_rows" value="<?php echo $total_rows; ?>" />