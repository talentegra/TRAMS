<div role="main" class="right_col" style="min-height: 3687px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create Courses_catalog</h3>
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
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Category</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="category_id" id="category_id" placeholder="Category Id" value="<?php echo $category_id; ?>" >
					<option value="">--select--</option>
					<?php
						if ($category_list) {
							foreach ($category_list as $category_data) {
								if($category_id == $category_data->category_id) {
									$selected = "selected";
								}
								else
								{
									$selected = "";
								}
								echo '<option value="'.$category_data->category_id.'"'.$selected.'>'.$category_data->category_name."</option>";  
							}
						}
						?>
					</select>
					<?php echo form_error('category_id') ?>
				</div>
				</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Course Code</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="course_code" id="course_code" placeholder="Course Code" value="<?php echo $course_code; ?>" />
			<?php echo form_error('course_code') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Course Name</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="course_name" id="course_name" placeholder="Course Name" value="<?php echo $course_name; ?>" />
			<?php echo form_error('course_name') ?>
		</div>
		</div>
	    <div class=" form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_summary">Course Summary</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<textarea class="form-control col-md-7 col-xs-12" rows="3" name="course_summary" id="course_summary" placeholder="Course Summary"><?php echo $course_summary; ?></textarea>
					<?php echo form_error('course_summary') ?>
				</div>
				</div>
	    <div class=" form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_contents">Course Contents</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<textarea class="form-control col-md-7 col-xs-12" rows="3" name="course_contents" id="course_contents" placeholder="Course Contents"><?php echo $course_contents; ?></textarea>
					<?php echo form_error('course_contents') ?>
				</div>
				</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Course Duration</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="course_duration" id="course_duration" placeholder="Course Duration" value="<?php echo $course_duration; ?>" />
			<?php echo form_error('course_duration') ?>
		</div>
		</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tinyint">Course Fee Type</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="course_fee_type" id="course_fee_type" placeholder="Course Fee Type" value="<?php echo $course_fee_type; ?>" >
					<option value="">--select--</option>
					<?php
						if ($course_fee_type_list) {
							foreach ($course_fee_type_list as $course_fee_type_data) {
								if($course_fee_type == $course_fee_type_data->course_fee_type_id) {
									$selected = "selected";
								}
								else
								{
									$selected = "";
								}
								echo '<option value="'.$course_fee_type_data->course_fee_type_id.'"'.$selected.'>'.$course_fee_type_data->course_fee_type."</option>";  
							}
						}
						?>
					</select>
					<?php echo form_error('course_fee_type') ?>
				</div>
				</div>
	    <div class=" form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="notes">Notes</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<textarea class="form-control col-md-7 col-xs-12" rows="3" name="notes" id="notes" placeholder="Notes"><?php echo $notes; ?></textarea>
					<?php echo form_error('notes') ?>
				</div>
				</div>
	
	 <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('courses/'); ?>';">Cancel</button>

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
	        category_id: {
	             required: true,
	        },
	        course_code: {
	             required: true,
				 remote: {
											url: "<?php echo base_url(); ?>courses/check_exist",
											type: "post",
											data: {
											  val: function() {
												return $( "#course_code" ).val();
											  },
											  col : 'course_code'
											}
										  }
	        },
	        course_name: {
	             required: true,
				  remote: {
											url: "<?php echo base_url(); ?>courses/check_exist",
											type: "post",
											data: {
											  val: function() {
												return $( "#course_name" ).val();
											  },
											  col : 'course_name'
											}
										  }
	        },
	        },
			messages: {
				course_code:{
                remote: "Already taken! Try another."
            },
	        course_name:{
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
</script>