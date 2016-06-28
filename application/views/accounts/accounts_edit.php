<div role="main" class="right_col" style="min-height: 3687px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Accounts</h3>
            </div>

        </div>

	<div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">
                        <br>
<form class="form-horizontal form-label-left" data-parsley-validate="" action="<?php echo $action; ?>" method="post">
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Payee Name</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="payee_name" id="payee_name" placeholder="Payee Name" value="<?php echo $payee_name; ?>" />
			<?php echo form_error('payee_name') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Amount Type</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="amount_type" id="amount_type" placeholder="Amount Type" value="<?php echo $amount_type; ?>" />
			<?php echo form_error('amount_type') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Branch Id</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="branch_id" id="branch_id" placeholder="Branch Id" value="<?php echo $branch_id; ?>" />
			<?php echo form_error('branch_id') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tinyint">Payable For</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="payable_for" id="payable_for" placeholder="Payable For" value="<?php echo $payable_for; ?>" />
			<?php echo form_error('payable_for') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Student Id</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="student_id" id="student_id" placeholder="Student Id" value="<?php echo $student_id; ?>" />
			<?php echo form_error('student_id') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="float">Total Amount</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="total_amount" id="total_amount" placeholder="Total Amount" value="<?php echo $total_amount; ?>" />
			<?php echo form_error('total_amount') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Primary Date</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="primary_date" id="primary_date" placeholder="Primary Date" value="<?php echo $primary_date; ?>" />
			<?php echo form_error('primary_date') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Due Date</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="due_date" id="due_date" placeholder="Due Date" value="<?php echo $due_date; ?>" />
			<?php echo form_error('due_date') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tinyint">Payment Type</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="payment_type" id="payment_type" placeholder="Payment Type" value="<?php echo $payment_type; ?>" />
			<?php echo form_error('payment_type') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tinyint">Account Type</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="account_type" id="account_type" placeholder="Account Type" value="<?php echo $account_type; ?>" />
			<?php echo form_error('account_type') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="float">Paid Amount</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="paid_amount" id="paid_amount" placeholder="Paid Amount" value="<?php echo $paid_amount; ?>" />
			<?php echo form_error('paid_amount') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="float">Due Amount</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="due_amount" id="due_amount" placeholder="Due Amount" value="<?php echo $due_amount; ?>" />
			<?php echo form_error('due_amount') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="datetime">Payment Date</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="payment_date" id="payment_date" placeholder="Payment Date" value="<?php echo $payment_date; ?>" />
			<?php echo form_error('payment_date') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tinyint">Payment Mode Id</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="payment_mode_id" id="payment_mode_id" placeholder="Payment Mode Id" value="<?php echo $payment_mode_id; ?>" />
			<?php echo form_error('payment_mode_id') ?>
		</div>
		</div>
	    <div class=" form-group"> 
            <label class="col-md-6 col-sm-6 col-xs-12" for="comments">Comments</label>
            <div class="col-sm-6">
			<textarea class="form-control" rows="3" name="comments" id="comments" placeholder="Comments"><?php echo $comments; ?></textarea>
			<?php echo form_error('comments') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Account Status</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="account_status" id="account_status" placeholder="Account Status" value="<?php echo $account_status; ?>" />
			<?php echo form_error('account_status') ?>
		</div>
		</div> <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('accounts/'); ?>';">Cancel</button>

                                </div>
                            </div>
			</form>
					</div>
				</div> 
			</div>
		</div> 
	</div>
</div>