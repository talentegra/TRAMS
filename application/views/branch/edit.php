<div role="main" class="right_col" style="min-height: 3687px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Branch</h3>
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form2" novalidate="" method="post" action="<?php echo base_url('branch/edit/'.$branch['id']); ?>">
                      <?php echo validation_errors(); ?> 
                      <div class="form-group">
                        <label for="branch_code" class="control-label col-md-3 col-sm-3 col-xs-12">Branch Code <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="branch_code" value="<?php echo ($this->input->post('branch_code') ? $this->input->post('branch_code') : $branch['branch_code']); ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="address" class="control-label col-md-3 col-sm-3 col-xs-12">Address  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea data-parsley-validation-threshold="10" class="form-control" required="required" name="address" id="address"><?php echo ($this->input->post('address') ? $this->input->post('address') : $branch['address']); ?>
                          </textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="branch_area" class="control-label col-md-3 col-sm-3 col-xs-12">Branch Area  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="branch_area" value="<?php echo ($this->input->post('branch_area') ? $this->input->post('branch_area') : $branch['branch_area']); ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="city" class="control-label col-md-3 col-sm-3 col-xs-12">City <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="city" value="<?php echo ($this->input->post('city') ? $this->input->post('city') : $branch['city']); ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="zipcode" class="control-label col-md-3 col-sm-3 col-xs-12">Zipcode <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="zipcode" value="<?php echo ($this->input->post('zipcode') ? $this->input->post('zipcode') : $branch['zipcode']); ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="branch_admin" class="control-label col-md-3 col-sm-3 col-xs-12">Branch Admin  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="branch_admin" value="<?php echo ($this->input->post('branch_admin') ? $this->input->post('branch_admin') : $branch['branch_admin']); ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="branch_type" class="control-label col-md-3 col-sm-3 col-xs-12">Branch Type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="branch_type" value="<?php echo ($this->input->post('branch_type') ? $this->input->post('branch_type') : $branch['branch_type']); ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="phone" class="control-label col-md-3 col-sm-3 col-xs-12">Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="phone" value="<?php echo ($this->input->post('phone') ? $this->input->post('phone') : $branch['phone']); ?>" />
                        </div>
                      </div>  
                      <div class="form-group">
                        <label for="extn" class="control-label col-md-3 col-sm-3 col-xs-12">Extn  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="extn" value="<?php echo ($this->input->post('extn') ? $this->input->post('extn') : $branch['extn']); ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $branch['email']); ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="mobile" class="control-label col-md-3 col-sm-3 col-xs-12">Mobile <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="mobile" value="<?php echo ($this->input->post('mobile') ? $this->input->post('mobile') : $branch['mobile']); ?>" />
                        </div>
                      </div> 
                        <div class="form-group">
                        <label for="domain" class="control-label col-md-3 col-sm-3 col-xs-12">Domain <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="domain" value="<?php echo ($this->input->post('domain') ? $this->input->post('domain') : $branch['domain']); ?>" />
                        </div>
                      </div>  
                      <div class="form-group">
                        <label for="branch_area" class="control-label col-md-3 col-sm-3 col-xs-12">Capacity  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="capacity" value="<?php echo ($this->input->post('capacity') ? $this->input->post('capacity') : $branch['capacity']); ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="notes" class="control-label col-md-3 col-sm-3 col-xs-12">Notes <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="notes" value="<?php echo ($this->input->post('notes') ? $this->input->post('notes') : $branch['notes']); ?>" />
                        </div>
                      </div>
                        
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-success" type="submit">Submit</button>  
                          <button class="btn btn-primary" type="submit">Cancel</button>
                          
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>