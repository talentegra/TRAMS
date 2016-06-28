<table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th style="cursor: pointer;" id="branch_code" class="one_field_arrange_option" data-sortdb="branch_code">Branch Code<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="branch_type_name" class="one_field_arrange_option" data-sortdb="branch_type_name">Branch Type<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="branch_name" class="one_field_arrange_option" data-sortdb="branch_name">Branch Name<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="branch_reg_date" class="one_field_arrange_option" data-sortdb="branch_reg_date">Branch Reg Date<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="branch_address" class="one_field_arrange_option" data-sortdb="branch_address">Branch Address<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="branch_area" class="one_field_arrange_option" data-sortdb="branch_area">Branch Area<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="land_mark" class="one_field_arrange_option" data-sortdb="land_mark">Land Mark<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="city_name" class="one_field_arrange_option" data-sortdb="city_name">City<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="zipcode" class="one_field_arrange_option" data-sortdb="zipcode">Zipcode<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="country_name" class="one_field_arrange_option" data-sortdb="country_name">Country<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="phone" class="one_field_arrange_option" data-sortdb="phone">Phone<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="mobile" class="one_field_arrange_option" data-sortdb="mobile">Mobile<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="email_id" class="one_field_arrange_option" data-sortdb="email_id">Email Id<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="manager_name" class="one_field_arrange_option" data-sortdb="manager_name">Manager<i class="fa fa-sort"></i></th>
		
		<th>Action</th>
            </tr><?php
            foreach ($branch_data as $branch)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$page ?></td>
			<td><?php echo $branch->branch_code ?></td>
			<td><?php echo $branch->branch_type_name ?></td>
			<td><?php echo $branch->branch_name ?></td>
			<td><?php echo $branch->branch_reg_date ?></td>
			<td><?php echo $branch->branch_address ?></td>
			<td><?php echo $branch->branch_area ?></td>
			<td><?php echo $branch->land_mark ?></td>
			<td><?php echo $branch->city_name ?></td>
			<td><?php echo $branch->zipcode ?></td>
			<td><?php echo $branch->country_name ?></td>
			<td><?php echo $branch->phone ?></td>
			<td><?php echo $branch->mobile ?></td>
			<td><?php echo $branch->email_id ?></td>
			<td><?php echo $branch->manager_name ?></td>
			<td style="text-align:center" width="200px">
				<div class="btn-group">
				<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
				<ul class="dropdown-menu"><li><a href="<?php echo site_url('branch/read/'.$branch->branch_id); ?>">Read</a></li><li><a href="<?php echo site_url('branch/update/'.$branch->branch_id); ?>">Edit</a></li><li><a href="<?php echo site_url('branch/delete/'.$branch->branch_id); ?>">Delete</a></li>
			</ul></div></td>
		</tr>
                <?php
            }
            ?>
        </table>
        <?php echo $this->ajax_pagination->create_links(); ?><input type="hidden" id="hid_total_rows" name="hid_total_rows" value="<?php echo $total_rows; ?>" />