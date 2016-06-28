<div role="main" class="right_col" style="min-height: 3687px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Create Student</h3>
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form2" novalidate="" method="post" action="<?php echo base_url('student/add'); ?>">
                      <?php echo validation_errors(); ?> 
                      <div class="form-group">
                        <label for="student_name" class="control-label col-md-3 col-sm-3 col-xs-12">Student Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="student_name" value="<?php echo $this->input->post('student_name'); ?>" />
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="middle_name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="middle_name" value="<?php echo $this->input->post('middle_name'); ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="last_name" class="control-label col-md-3 col-sm-3 col-xs-12">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="text" class="form-control col-md-7 col-xs-12" name="last_name" id="address" value="<?php echo $this->input->post('last_name'); ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="email" value="<?php echo $this->input->post('email'); ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="mobile" class="control-label col-md-3 col-sm-3 col-xs-12">Mobile <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="mobile" value="<?php echo $this->input->post('mobile'); ?>" />
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="reg_date" class="control-label col-md-3 col-sm-3 col-xs-12">Reg Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="date-picker form-control col-md-7 col-xs-12" id="reg_date" name="reg_date" value="<?php echo $this->input->post('reg_date'); ?>" />
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="branch_id" class="control-label col-md-3 col-sm-3 col-xs-12">Branch Id <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required="" class="form-control" name="branch_id">
							<option value="">select branch</option>
							<?php 
							foreach($branches as $branch)
							{
								echo '<option value="'.$branch['id'].'">'.$branch['branch_code']."</option>";
							} 
							?>
						</select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="photo" class="control-label col-md-3 col-sm-3 col-xs-12">Photo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="photo" value="<?php echo $this->input->post('photo'); ?>" />
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="notes" class="control-label col-md-3 col-sm-3 col-xs-12">Notes <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="notes" value="<?php echo $this->input->post('notes'); ?>" />
                        </div>
                      </div>
                        
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-success" type="submit">Submit</button>  
                          <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('student/'); ?>';">Cancel</button>
                          
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<!-- bootstrap-daterangepicker -->
<script>
    $(document).ready(function() {
        $('#reg_date').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_1"
        }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        
        
    });
</script>
<!-- /bootstrap-daterangepicker -->