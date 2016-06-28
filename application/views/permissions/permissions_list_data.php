<table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th style="cursor: pointer;" id="perm_type" class="one_field_arrange_option" data-sortdb="perm_type">Perm Type<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="name" class="one_field_arrange_option" data-sortdb="name">Name<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="definition" class="one_field_arrange_option" data-sortdb="definition">Definition<i class="glyphicon glyphicon-sort"></i></th>
		<th>Action</th>
            </tr><?php
            foreach ($perms_data as $perms)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$page ?></td>
			<td><?php echo $perms->perm_type ?></td>
			<td><?php echo $perms->name ?></td>
			<td><?php echo $perms->definition ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('perms/read/'.$perms->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('perms/update/'.$perms->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('perms/delete/'.$perms->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <?php echo $this->ajax_pagination->create_links(); ?><input type="hidden" id="hid_total_rows" name="hid_total_rows" value="<?php echo $total_rows; ?>" />