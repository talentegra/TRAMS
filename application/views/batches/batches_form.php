<div role="main" class="right_col" style="min-height: 3687px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create Batches</h3>
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
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Course</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="course_id" id="course_id" placeholder="Course" value="<?php echo $course_id; ?>" >
					<option value="">--select--</option>
					<?php
						if ($course_list) {
							foreach ($course_list as $course_data) {
								if($course_id == $course_data->course_id) {
									$selected = "selected";
								}
								else
								{
									$selected = "";
								}
								echo '<option value="'.$course_data->course_id.'"'.$selected.'>'.$course_data->course_name."</option>";  
							}
						}
						?>
					</select>
					<?php echo form_error('course_id') ?>
				</div>
				</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Batch Title</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="batch_title" id="batch_title" placeholder="Batch Title" value="<?php echo $batch_title; ?>" />
			<?php echo form_error('batch_title') ?>
		</div>
		</div>
	    <div class=" form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<textarea class="form-control col-md-7 col-xs-12" rows="3" name="description" id="description" placeholder="Description"><?php echo $description; ?></textarea>
					<?php echo form_error('description') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Faculty</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="faculty_id" id="faculty_id" placeholder="Faculty" value="<?php echo $faculty_id; ?>" >
					<option value="">--select--</option>
					<?php
						if ($staff_list) {
							foreach ($staff_list as $staff_data) {
								if($faculty_id == $staff_data->staff_id) {
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
					<?php echo form_error('faculty_id') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Branch</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="branch_id" id="branch_id" placeholder="Branch" value="<?php echo $branch_id; ?>" >
					<option value="">--select--</option>
					<?php
						if ($branch_list) {
							foreach ($branch_list as $branch_data) {
								if($branch_id == $branch_data->branch_id) {
									$selected = "selected";
								}
								else
								{
									$selected = "";
								}
								echo '<option value="'.$branch_data->branch_id.'"'.$selected.'>'.$branch_data->branch_name."</option>";  
							}
						}
						?>
					</select>
					<?php echo form_error('branch_id') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Batch Type</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="batch_type" id="batch_type" placeholder="Batch Type" value="<?php echo $batch_type; ?>" >
					<option value="">--select--</option>
					<?php
						if ($batch_type_list) {
							foreach ($batch_type_list as $batch_type_data) {
								if($batch_type == $batch_type_data->batch_type_id) {
									$selected = "selected";
								}
								else
								{
									$selected = "";
								}
								echo '<option value="'.$batch_type_data->batch_type_id.'"'.$selected.'>'.$batch_type_data->batch_type_name."</option>";  
							}
						}
						?>
					</select>
					<?php echo form_error('batch_type') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Batch Pattern</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="batch_pattern" id="batch_pattern" placeholder="Batch Pattern" value="<?php echo $batch_pattern; ?>" >
					<option value="">--select--</option>
					<?php
						if ($batch_pattern_list) {
							foreach ($batch_pattern_list as $batch_pattern_data) {
								if($batch_pattern == $batch_pattern_data->batch_pattern_id) {
									$selected = "selected";
								}
								else
								{
									$selected = "";
								}
								echo '<option value="'.$batch_pattern_data->batch_pattern_id.'"'.$selected.'>'.$batch_pattern_data->batch_pattern."</option>";  
							}
						}
						?>
					</select>
					<?php echo form_error('batch_pattern') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="datetime">Start Date</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" class="date-picker form-control col-md-7 col-xs-12" name="start_date" id="start_date" placeholder="Start Date" value="<?php echo $start_date; ?>" />
					<?php echo form_error('start_date') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="datetime">End Date</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" class="date-picker form-control col-md-7 col-xs-12" name="end_date" id="end_date" placeholder="End Date" value="<?php echo $end_date; ?>" />
					<?php echo form_error('end_date') ?>
				</div>
				</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Week Days</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="week_days" id="week_days" placeholder="Week Days" value="<?php echo $week_days; ?>" />
			<?php echo form_error('week_days') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Student Enrolled</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="student_enrolled" id="student_enrolled" placeholder="Student Enrolled" value="<?php echo $student_enrolled; ?>" />
			<?php echo form_error('student_enrolled') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Batch Capacity</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="batch_capacity" id="batch_capacity" placeholder="Batch Capacity" value="<?php echo $batch_capacity; ?>" />
			<?php echo form_error('batch_capacity') ?>
		</div>
		</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tinyint">Iscorporate</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<?php 
					if($iscorporate==''){
						$iscorporate = '0';
					}
					
					?>
					<label><input type="radio" <?php echo ($iscorporate== '1')?'checked':''; ?> style="width:1%" class="form-control" name="iscorporate" id="iscorporate" placeholder="Iscorporate" value="1"/>
					Yes</label>

					<label><input type="radio" <?php echo ($iscorporate== '0')?'checked':''; ?> style="width:1%" class="form-control" name="iscorporate" id="iscorporate" placeholder="Iscorporate" value="0"/>
					No</label>
					<?php echo form_error('iscorporate') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Currency</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="currency_id" id="currency_id" placeholder="Currency" value="<?php echo $currency_id; ?>" >
					<option value="">--select--</option>
					<?php
						if ($currrency_list) {
							foreach ($currrency_list as $currrency_data) {
								if($currency_id == $currrency_data->currency_id) {
									$selected = "selected";
								}
								else
								{
									$selected = "";
								}
								echo '<option value="'.$currrency_data->currency_id.'"'.$selected.'>'.$currrency_data->currency_name."</option>";  
							}
						}
						?>
					</select>
					<?php echo form_error('currency_id') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tinyint">Batch Fee Type</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="batch_fee_type" id="batch_fee_type" placeholder="Batch Fee Type" value="<?php echo $batch_fee_type; ?>" >
					<option value="">--select--</option>
					<?php
						if ($course_fee_type_list) {
							foreach ($course_fee_type_list as $course_fee_type_data) {
								if($batch_fee_type == $course_fee_type_data->course_fee_type_id) {
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
					<?php echo form_error('batch_fee_type') ?>
				</div>
				</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="decimal">Fees</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="fees" id="fees" placeholder="Fees" value="<?php echo $fees; ?>" />
			<?php echo form_error('fees') ?>
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
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="float">Course Fee</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="course_fee" id="course_fee" placeholder="Course Fee" value="<?php echo $course_fee; ?>" />
			<?php echo form_error('course_fee') ?>
		</div>
		</div>
	
	 <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('batches/'); ?>';">Cancel</button>

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
	        course_id: {
	             required: true,
	        },
	        batch_title: {
	             required: true,
	             remote: {
											url: "<?php echo base_url(); ?>Batches/check_exist",
											type: "post",
											data: {
											  val: function() {
												return $( "#batch_title" ).val();
											  },
											  col : 'batch_title'
											}
										  }
	        },
	        branch_id: {
	             required: true,
	        },
	        batch_type: {
	             required: true,
	        },
	        batch_pattern: {
	             required: true,
	        },
	        start_date: {
	             required: true,
	             date: true,
	        },
	        end_date: {
	             required: true,
	             date: true,
	        },
	        student_enrolled: {
	             digits: true,
	        },
	        batch_capacity: {
	             digits: true,
	        },
	        currency_id: {
	             required: true,
	        },
	        batch_fee_type: {
	             required: true,
	        },
	        fees: {
	             number: true,
	        },
	        course_fee_type: {
	             required: true,
	        },
	        course_fee: {
	             number: true,
	        },
	        },
			messages: {
	        batch_title:{
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
	   $(document).ready(function() {
				$('.date-picker').daterangepicker({
					singleDatePicker: true,
					calender_style: "picker_1",
				}, function(start, end, label) {
					console.log(start.toISOString(), end.toISOString(), label);
				});
				});
</script>