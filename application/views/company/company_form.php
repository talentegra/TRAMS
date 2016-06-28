<div role="main" class="right_col" style="min-height: 3687px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create Company</h3>
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
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Company Name</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" class="form-control col-md-7 col-xs-12" name="company_name" id="company_name" placeholder="Company Name" value="<?php echo $company_name; ?>" />
					<?php echo form_error('company_name') ?>
				</div>
				</div>
	    <div class=" form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="company_address">Company Address</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<textarea class="form-control col-md-7 col-xs-12" rows="3" name="company_address" id="company_address" placeholder="Company Address"><?php echo $company_address; ?></textarea>
					<?php echo form_error('company_address') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Company Pincode</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="checkbox" style="width:1%" class="form-control" name="company_pincode" id="company_pincode" placeholder="Company Pincode" value="1" />
					<?php echo form_error('company_pincode') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Company Email</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<label><input type="radio" style="width:1%" class="form-control" name="company_email" id="company_email" placeholder="Company Email" value="1"/>
					Radio option 1</label>

					<label><input type="radio" style="width:1%" class="form-control" name="company_email" id="company_email" placeholder="Company Email" value="1"/>
					Radio option 2</label>
					<?php echo form_error('company_email') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Company Domain</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="password" class="form-control col-md-7 col-xs-12" name="company_domain" id="company_domain" placeholder="Company Domain" value="<?php echo $company_domain; ?>" />
					<?php echo form_error('company_domain') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Company Phone</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="company_phone" id="company_phone" placeholder="Company Phone" value="<?php echo $company_phone; ?>" >
					<option value="">select</option>
					</select>
					<?php echo form_error('company_phone') ?>
				</div>
				</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Company Contact Name</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="company_contact_name" id="company_contact_name" placeholder="Company Contact Name" value="<?php echo $company_contact_name; ?>" />
			<?php echo form_error('company_contact_name') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Company Contact Email</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="company_contact_email" id="company_contact_email" placeholder="Company Contact Email" value="<?php echo $company_contact_email; ?>" />
			<?php echo form_error('company_contact_email') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Company Contact Mobile</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="company_contact_mobile" id="company_contact_mobile" placeholder="Company Contact Mobile" value="<?php echo $company_contact_mobile; ?>" />
			<?php echo form_error('company_contact_mobile') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="decimal">Company Discount</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="company_discount" id="company_discount" placeholder="Company Discount" value="<?php echo $company_discount; ?>" />
			<?php echo form_error('company_discount') ?>
		</div>
		</div> <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('company/'); ?>';">Cancel</button>

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
	        company_name: {
	             required: true,
	        },
	        company_address: {
	             required: true,
	        },
	        company_pincode: {
	             required: true,
	        },
	        company_email: {
	             required: true,
	        },
	        company_domain: {
	             required: true,
	        },
	        company_phone: {
	             required: true,
	        },
	        company_contact_name: {
	             required: true,
	        },
	        company_contact_email: {
	             required: true,
	        },
	        company_contact_mobile: {
	             required: true,
	        },
	        company_discount: {
	             required: true,
	        },
	        },
			messages: {
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
</script>