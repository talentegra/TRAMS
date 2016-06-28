<table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Action</th>
            </tr><?php
            foreach ($perm_to_user_data as $perm_to_user)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$page ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('perm_to_user/read/'.$perm_to_user->perm_id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('perm_to_user/update/'.$perm_to_user->perm_id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('perm_to_user/delete/'.$perm_to_user->perm_id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <?php echo $this->ajax_pagination->create_links(); ?><input type="hidden" id="hid_total_rows" name="hid_total_rows" value="<?php echo $total_rows; ?>" />