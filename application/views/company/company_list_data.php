<table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th style="cursor: pointer;" id="company_name" class="one_field_arrange_option" data-sortdb="company_name">Company Name<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="company_address" class="one_field_arrange_option" data-sortdb="company_address">Company Address<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="company_pincode" class="one_field_arrange_option" data-sortdb="company_pincode">Company Pincode<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="company_email" class="one_field_arrange_option" data-sortdb="company_email">Company Email<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="company_domain" class="one_field_arrange_option" data-sortdb="company_domain">Company Domain<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="company_phone" class="one_field_arrange_option" data-sortdb="company_phone">Company Phone<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="company_contact_name" class="one_field_arrange_option" data-sortdb="company_contact_name">Company Contact Name<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="company_contact_email" class="one_field_arrange_option" data-sortdb="company_contact_email">Company Contact Email<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="company_contact_mobile" class="one_field_arrange_option" data-sortdb="company_contact_mobile">Company Contact Mobile<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="company_discount" class="one_field_arrange_option" data-sortdb="company_discount">Company Discount<i class="fa fa-sort"></i></th>
		<th>Action</th>
            </tr><?php
            foreach ($company_data as $company)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$page ?></td>
			<td><?php echo $company->company_name ?></td>
			<td><?php echo $company->company_address ?></td>
			<td><?php echo $company->company_pincode ?></td>
			<td><?php echo $company->company_email ?></td>
			<td><?php echo $company->company_domain ?></td>
			<td><?php echo $company->company_phone ?></td>
			<td><?php echo $company->company_contact_name ?></td>
			<td><?php echo $company->company_contact_email ?></td>
			<td><?php echo $company->company_contact_mobile ?></td>
			<td><?php echo $company->company_discount ?></td>
			<td style="text-align:center" width="200px">
				<div class="btn-group">
				<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
				<ul class="dropdown-menu"><li><a href="<?php echo site_url('company/read/'.$company->company_id); ?>">Read</a></li><li><a href="<?php echo site_url('company/update/'.$company->company_id); ?>">Edit</a></li><li><a href="<?php echo site_url('company/delete/'.$company->company_id); ?>">Delete</a></li>
			</ul></div></td>
		</tr>
                <?php
            }
            ?>
        </table>
        <?php echo $this->ajax_pagination->create_links(); ?><input type="hidden" id="hid_total_rows" name="hid_total_rows" value="<?php echo $total_rows; ?>" />