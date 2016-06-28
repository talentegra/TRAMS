<div role="main" class="right_col" style="min-height: 3687px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create Batches_students</h3>
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
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Student Id</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="student_id" id="student_id" placeholder="Student Id" value="<?php echo $student_id; ?>" />
			<?php echo form_error('student_id') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Faculty Id</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="faculty_id" id="faculty_id" placeholder="Faculty Id" value="<?php echo $faculty_id; ?>" />
			<?php echo form_error('faculty_id') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Student Rating</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="student_rating" id="student_rating" placeholder="Student Rating" value="<?php echo $student_rating; ?>" />
			<?php echo form_error('student_rating') ?>
		</div>
		</div>
	    <div class=" form-group"> 
            <label class="col-md-6 col-sm-6 col-xs-12" for="student_comments">Student Comments</label>
            <div class="col-sm-6">
			<textarea class="form-control" rows="3" name="student_comments" id="student_comments" placeholder="Student Comments"><?php echo $student_comments; ?></textarea>
			<?php echo form_error('student_comments') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Faculty Rating</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="faculty_rating" id="faculty_rating" placeholder="Faculty Rating" value="<?php echo $faculty_rating; ?>" />
			<?php echo form_error('faculty_rating') ?>
		</div>
		</div>
	    <div class=" form-group"> 
            <label class="col-md-6 col-sm-6 col-xs-12" for="faculty_comments">Faculty Comments</label>
            <div class="col-sm-6">
			<textarea class="form-control" rows="3" name="faculty_comments" id="faculty_comments" placeholder="Faculty Comments"><?php echo $faculty_comments; ?></textarea>
			<?php echo form_error('faculty_comments') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tinyint">Active</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="active" id="active" placeholder="Active" value="<?php echo $active; ?>" />
			<?php echo form_error('active') ?>
		</div>
		</div>
	
	 <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('batches_students/'); ?>';">Cancel</button>

                                </div>
                            </div>
			</form>
					</div>
				</div> 
			</div>
		</div> 
	</div>
</div>