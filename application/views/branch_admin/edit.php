<div role="main" class="right_col" style="min-height: 3687px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Branch Admin</h3>
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form2" novalidate="" method="post" action="<?php echo base_url('branch_admin/edit/'.$branch_admin['id']); ?>">
                      <?php echo validation_errors(); ?> 
                      <div class="form-group">
                        <label for="first_name" class="control-label col-md-3 col-sm-3 col-xs-12">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="first_name" value="<?php echo ($this->input->post('first_name') ? $this->input->post('first_name') : $user['first_name']); ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="last_name" class="control-label col-md-3 col-sm-3 col-xs-12">Last Name  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="last_name" value="<?php echo ($this->input->post('last_name') ? $this->input->post('last_name') : $user['last_name']); ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="phone" class="control-label col-md-3 col-sm-3 col-xs-12">Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="phone" value="<?php echo ($this->input->post('phone') ? $this->input->post('phone') : $user['phone']); ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="zipcode" class="control-label col-md-3 col-sm-3 col-xs-12">Branch <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required="" class="form-control" name="branch_id">
				<option value="">select branch</option>
				<?php 
				foreach($branches as $branch)
				{
                                    $selected = "";
                                    /*if($user['branch_id'] == $branch['id']) {
                                        $selected = "selected";
                                    }*/
                                    echo '<option value="'.$branch['id'].'" '.$selected.'>'.$branch['branch_code']."</option>";
				} 
				?>
			</select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $user['email']); ?>" " />
                        </div>
                      </div>
                                              
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-success" type="submit">Submit</button>  
                          <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('branch_admin/'); ?>';">Cancel</button>
                          
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>