<div role="main" class="right_col" style="min-height: 3687px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Create Course</h3>
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form2" novalidate="" method="post" action="<?php echo base_url('courses_catalog/edit/'.$courses_catalog['course_id']); ?>">
                      <?php echo validation_errors(); ?> 
					  <div class="form-group">
                        <label for="course_code" class="control-label col-md-3 col-sm-3 col-xs-12">Course Code <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="course_code" value="<?php echo ($this->input->post('course_code') ? $this->input->post('course_code') : $courses_catalog['course_code']); ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="course_name" class="control-label col-md-3 col-sm-3 col-xs-12">Course Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="course_name" value="<?php echo ($this->input->post('course_name') ? $this->input->post('course_name') : $courses_catalog['course_name']); ?>" />
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="category_id" class="control-label col-md-3 col-sm-3 col-xs-12">Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						  <select required="" class="form-control" name="category_id">
								<option value="">select category</option>
								<?php 
								foreach($categories as $category)
								{
									if(($this->input->post('category_id') ? $this->input->post('category_id') : $courses_catalog['category_id']) == $category['category_id']) {
										$selected = "selected";
									}
									else
									{
										$selected = "";
									}
									echo '<option value="'.$category['category_id'].'"'.$selected.'>'.$category['category_name']."</option>";
								} 
								?>
							</select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="course_summary" class="control-label col-md-3 col-sm-3 col-xs-12">Course Summary <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						  <textarea data-parsley-validation-threshold="10" class="form-control" required="required" name="course_summary" id="course_summary"><?php echo ($this->input->post('course_summary') ? $this->input->post('course_summary') : $courses_catalog['course_summary']); ?>
                          </textarea>
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="course_contents" class="control-label col-md-3 col-sm-3 col-xs-12">Course Contents <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						  <textarea data-parsley-validation-threshold="10" class="form-control" required="required" name="course_contents" id="course_contents"><?php echo ($this->input->post('course_contents') ? $this->input->post('course_contents') : $courses_catalog['course_contents']); ?>
                          </textarea>
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="notes" class="control-label col-md-3 col-sm-3 col-xs-12">Notes <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						  <textarea data-parsley-validation-threshold="10" class="form-control" required="required" name="notes" id="notes"><?php echo ($this->input->post('notes') ? $this->input->post('notes') : $courses_catalog['notes']); ?>
                          </textarea>
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