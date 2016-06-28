<div role="main" class="right_col" style="min-height: 3687px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Create Faculty Admin</h3>
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form2" novalidate="" method="post" action="<?php echo base_url('faculty_admin/add'); ?>">
                      <?php echo validation_errors(); ?> 
                      <div class="form-group">
                        <label for="first_name" class="control-label col-md-3 col-sm-3 col-xs-12">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="first_name" value="<?php echo $this->input->post('first_name'); ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="last_name" class="control-label col-md-3 col-sm-3 col-xs-12">Last Name  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="last_name" value="<?php echo $this->input->post('last_name'); ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="phone" class="control-label col-md-3 col-sm-3 col-xs-12">Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="phone" value="<?php echo $this->input->post('phone'); ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="zipcode" class="control-label col-md-3 col-sm-3 col-xs-12">Faculty <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required="" class="form-control" name="faculty_id[]" multiple="multiple">
							<option value="">select faculty</option>
							<?php 
							foreach($faculties as $faculty) 
							{
								echo '<option value="'.$faculty['id'].'">'.$faculty['faculty_name']."</option>";
							} 
							?>
						</select>
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
                        <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="password" value="<?php echo $this->input->post('password'); ?>" />
                        </div>
                      </div>
                        
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-success" type="submit">Submit</button>  
                          <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('faculty_admin/'); ?>';">Cancel</button>
                          
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>