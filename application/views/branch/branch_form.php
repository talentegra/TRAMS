<div role="main" class="right_col" style="min-height: 3687px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create Branch</h3>
            </div>

        </div>

	<div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">
                        <br>
<form id="frm_create" name="frm_create" class="form-horizontal form-label-left" data-parsley-validate="" action="<?php echo $action; ?>" method="post">
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Branch Code</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" class="form-control col-md-7 col-xs-12" name="branch_code" id="branch_code" placeholder="Branch Code" value="<?php echo $branch_code; ?>" />
					<?php echo form_error('branch_code') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Branch Type</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="branch_type" id="branch_type" placeholder="Branch Type" value="<?php echo $branch_type; ?>" >
										<option value="">-Select-</option>
                                        <?php
                                        if ($branch_list) {
                                            foreach ($branch_list as $branch_data) {
												if($branch_type == $branch_data->branch_type_id) {
													$selected = "selected";
												}
												else
												{
													$selected = "";
												}
												echo '<option value="'.$branch_data->branch_type_id.'"'.$selected.'>'.$branch_data->branch_type_name."</option>";  
											}
                                        }
                                        ?>
					</select>
					<?php echo form_error('branch_type') ?>
				</div>
				</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Branch Name</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="branch_name" id="branch_name" placeholder="Branch Name" value="<?php echo $branch_name; ?>" />
			<?php echo form_error('branch_name') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Branch Reg Date</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="date-picker form-control col-md-7 col-xs-12" name="branch_reg_date" id="branch_reg_date" placeholder="Branch Reg Date" value="<?php echo $branch_reg_date; ?>" />
			<?php echo form_error('branch_reg_date') ?>
		</div>
		</div>
	    <div class=" form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="branch_address">Branch Address</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<textarea class="form-control col-md-7 col-xs-12" rows="3" name="branch_address" id="branch_address" placeholder="Branch Address"><?php echo $branch_address; ?></textarea>
					<?php echo form_error('branch_address') ?>
				</div>
				</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Branch Area</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="branch_area" id="branch_area" placeholder="Branch Area" value="<?php echo $branch_area; ?>" />
			<?php echo form_error('branch_area') ?>
		</div>
		</div>
	    <div class=" form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="land_mark">Land Mark</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<textarea class="form-control col-md-7 col-xs-12" rows="3" name="land_mark" id="land_mark" placeholder="Land Mark"><?php echo $land_mark; ?></textarea>
					<?php echo form_error('land_mark') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">City</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="city_id" id="city_id" placeholder="City Id" value="<?php echo $city_id; ?>" >
										<option value="">-Select-</option>
                                        <?php
                                        if ($city_list) {
                                            foreach ($city_list as $city_data) {
                                              if($city_id == $city_data->city_id) {
													$selected = "selected";
												}
												else
												{
													$selected = "";
												}
												echo '<option value="'.$city_data->city_id.'"'.$selected.'>'.$city_data->city_name."</option>";
                                            }
                                        }
                                        ?>
					</select>
					<?php echo form_error('city_id') ?>
				</div>
				</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Zipcode</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="zipcode" id="zipcode" placeholder="Zipcode" value="<?php echo $zipcode; ?>" />
			<?php echo form_error('zipcode') ?>
		</div>
		</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Country Id</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="country_id" id="country_id" placeholder="Country Id" value="<?php echo $country_id; ?>" >
										<option value="">-Select-</option>
                                        <?php
                                        if ($country_list) {
                                            foreach ($country_list as $country_data) {
                                                if($country_id == $country_data->country_id) {
													$selected = "selected";
												}
												else
												{
													$selected = "";
												}
												echo '<option value="'.$country_data->country_id.'"'.$selected.'>'.$country_data->country_name."</option>";
                                            }
                                        }
                                        ?>
					</select>
					<?php echo form_error('country_id') ?>
				</div>
				</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Phone</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
			<?php echo form_error('phone') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Mobile</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="mobile" id="mobile" placeholder="Mobile" value="<?php echo $mobile; ?>" />
			<?php echo form_error('mobile') ?>
		</div>
		</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Email Id</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" class="form-control col-md-7 col-xs-12" name="email_id" id="email_id" placeholder="Email Id" value="<?php echo $email_id; ?>" />
					<?php echo form_error('email_id') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Manager Id</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="manager_id" id="manager_id" placeholder="Manager Id" value="<?php echo $manager_id; ?>" >
										<option value="0">-Select-</option>
                                        <?php
										if ($staff_details_list) {
											foreach ($staff_details_list as $staff_data) {
												if($manager_id == $staff_data->staff_id) {
													$selected = "selected";
												}
												else
												{
													$selected = "";
												}
												echo '<option value="'.$staff_data->staff_id.'"'.$selected.'>'.$staff_data->firstname." ".$staff_data->lastname."</option>"; 
											}
										}
										?>
					</select>
					<?php echo form_error('manager_id') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Branch Status</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="branch_status" id="branch_status" placeholder="Branch Status" value="<?php echo $branch_status; ?>" >
										<?php
                                        if ($status_list) {
                                            foreach ($status_list as $status_data) {
												if($branch_status == $status_data->status_id) {
													$selected = "selected";
												}
												else
												{
													$selected = "";
												}
												echo '<option value="'.$status_data->status_id.'"'.$selected.'>'.$status_data->status."</option>";
                                            }
                                        }
                                        ?>
					</select>
					<?php echo form_error('branch_status') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Autoresp Email Id</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" class="form-control col-md-7 col-xs-12" name="autoresp_email_id" id="autoresp_email_id" placeholder="Autoresp Email Id" value="<?php echo $autoresp_email_id; ?>" />
					<?php echo form_error('autoresp_email_id') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tinyint">Message Auto Response</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="checkbox" style="width:1%" class="form-control" name="message_auto_response" id="message_auto_response" placeholder="Message Auto Response" value="1" />
					<?php echo form_error('message_auto_response') ?>
				</div>
				</div>
	    <div class=" form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="signature">Signature</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<textarea class="form-control col-md-7 col-xs-12" rows="3" name="signature" id="signature" placeholder="Signature"><?php echo $signature; ?></textarea>
					<?php echo form_error('signature') ?>
				</div>
				</div>
	
	 <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('branch/'); ?>';">Cancel</button>

                                </div>
                            </div>
			</form>
					</div>
				</div> 
			</div>
		</div> 
	</div>
</div>
<script type="text/javascript">

var form2 = $('#frm_create');
        var error1 = $('.alert-danger', form2);
        var success1 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
	        branch_code: {
	             required: true,
				 remote: {
											url: "<?php echo base_url(); ?>branch/check_exist",
											type: "post",
											data: {
											  val: function() {
												return $( "#branch_code" ).val();
											  },
											  col : 'branch_code'
											}
										  }
	        },
	        branch_type: {
	             required: true,
	        },
	        branch_name: {
	             required: true,
				 remote: {
											url: "<?php echo base_url(); ?>branch/check_exist",
											type: "post",
											data: {
											  val: function() {
												return $( "#branch_name" ).val();
											  },
											  col : 'branch_name'
											}
										  }
	        },
	        branch_reg_date: {
	             required: true,
	        },
	        branch_address: {
	             required: true,
	        },
	        branch_area: {
	             required: true,
	        },
	        land_mark: {
	             required: true,
	        },
	        city_id: {
	             required: true,
	        },
	        zipcode: {
	             required: true,
	        },
	        country_id: {
	             required: true,
	        },
	        phone: {
	             required: true,
	        },
	        mobile: {
	             required: true,
	        },
	        email_id: {
	             required: true,
	        },
	        autoresp_email_id: {
	             required: true,
	        },
	        signature: {
	             required: true,
	        },
	        },
			messages: {
				branch_code:{
                remote: "Already taken! Try another."
            },
	        branch_name:{
                remote: "Already taken! Try another."
            },
	        },highlight: function(element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group

                $(".tab-content").find("div.tab-pane:has(div.has-error)").each(function(index, tab) {
                    var id = $(tab).attr("id");
                    $('a[href="#' + id + '"]').addClass('alert-danger');

                });

            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group

            },
            success: function(label) {
                label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
            submitHandler: function(form) {
                    form.submit();
              
            }
        });
		<!-- bootstrap-daterangepicker -->

    $(document).ready(function() {
        $('.date-picker').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_1",
        }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        
        
    });

<!-- /bootstrap-daterangepicker -->
</script>