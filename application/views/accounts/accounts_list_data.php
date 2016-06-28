<table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th style="cursor: pointer;" id="payee_name" class="one_field_arrange_option" data-sortdb="payee_name">Payee Name<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="amount_type" class="one_field_arrange_option" data-sortdb="amount_type">Amount Type<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="branch_id" class="one_field_arrange_option" data-sortdb="branch_id">Branch Id<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="payable_for" class="one_field_arrange_option" data-sortdb="payable_for">Payable For<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="student_id" class="one_field_arrange_option" data-sortdb="student_id">Student Id<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="total_amount" class="one_field_arrange_option" data-sortdb="total_amount">Total Amount<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="primary_date" class="one_field_arrange_option" data-sortdb="primary_date">Primary Date<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="due_date" class="one_field_arrange_option" data-sortdb="due_date">Due Date<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="payment_type" class="one_field_arrange_option" data-sortdb="payment_type">Payment Type<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="account_type" class="one_field_arrange_option" data-sortdb="account_type">Account Type<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="paid_amount" class="one_field_arrange_option" data-sortdb="paid_amount">Paid Amount<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="due_amount" class="one_field_arrange_option" data-sortdb="due_amount">Due Amount<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="payment_date" class="one_field_arrange_option" data-sortdb="payment_date">Payment Date<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="payment_mode_id" class="one_field_arrange_option" data-sortdb="payment_mode_id">Payment Mode Id<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="comments" class="one_field_arrange_option" data-sortdb="comments">Comments<i class="glyphicon glyphicon-sort"></i></th>
		<th style="cursor: pointer;" id="account_status" class="one_field_arrange_option" data-sortdb="account_status">Account Status<i class="glyphicon glyphicon-sort"></i></th>
		<th>Action</th>
            </tr><?php
            foreach ($accounts_data as $accounts)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$page ?></td>
			<td><?php echo $accounts->payee_name ?></td>
			<td><?php echo $accounts->amount_type ?></td>
			<td><?php echo $accounts->branch_id ?></td>
			<td><?php echo $accounts->payable_for ?></td>
			<td><?php echo $accounts->student_id ?></td>
			<td><?php echo $accounts->total_amount ?></td>
			<td><?php echo $accounts->primary_date ?></td>
			<td><?php echo $accounts->due_date ?></td>
			<td><?php echo $accounts->payment_type ?></td>
			<td><?php echo $accounts->account_type ?></td>
			<td><?php echo $accounts->paid_amount ?></td>
			<td><?php echo $accounts->due_amount ?></td>
			<td><?php echo $accounts->payment_date ?></td>
			<td><?php echo $accounts->payment_mode_id ?></td>
			<td><?php echo $accounts->comments ?></td>
			<td><?php echo $accounts->account_status ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('accounts/read/'.$accounts->account_id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('accounts/update/'.$accounts->account_id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('accounts/delete/'.$accounts->account_id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <?php echo $this->ajax_pagination->create_links(); ?><input type="hidden" id="hid_total_rows" name="hid_total_rows" value="<?php echo $total_rows; ?>" />