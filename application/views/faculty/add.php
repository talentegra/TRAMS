<div role="main" class="right_col" style="min-height: 3687px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create Faculty</h3>
            </div>

        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">
                        <br>
                        <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form2" novalidate="" method="post" action="<?php echo base_url('faculty/add'); ?>">
                            <?php echo validation_errors(); ?> 
                            <div class="form-group">
                                <label for="faculty_name" class="control-label col-md-3 col-sm-3 col-xs-12">Faculty Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12" name="faculty_name" value="<?php echo $this->input->post('faculty_name'); ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="control-label col-md-3 col-sm-3 col-xs-12">Last Name  <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12" name="last_name" id="address" value="<?php echo $this->input->post('last_name'); ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="father_name" class="control-label col-md-3 col-sm-3 col-xs-12">Father Name  <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12" name="father_name" value="<?php echo $this->input->post('father_name'); ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="husband_name" class="control-label col-md-3 col-sm-3 col-xs-12">Husband Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12" name="husband_name" value="<?php echo $this->input->post('husband_name'); ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="branch_id" class="control-label col-md-3 col-sm-3 col-xs-12">Branch Id <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select required="" class="form-control" name="branch_id">
                                        <option value="">select branch</option>
                                        <?php
                                        foreach ($branches as $branch) {
                                            echo '<option value="' . $branch['id'] . '">' . $branch['branch_code'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dob" class="control-label col-md-3 col-sm-3 col-xs-12">Dob  <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" required="required" class="date-picker form-control col-md-7 col-xs-12" name="dob" id="dob" value="<?php echo $this->input->post('dob'); ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dob_place" class="control-label col-md-3 col-sm-3 col-xs-12">Dob Place <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12" name="dob_place" value="<?php echo $this->input->post('dob_place'); ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="martial_status" class="control-label col-md-3 col-sm-3 col-xs-12">Martial Status <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12" name="martial_status" value="<?php echo $this->input->post('martial_status'); ?>" />
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="children" class="control-label col-md-3 col-sm-3 col-xs-12">Children <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12" name="children" value="<?php echo $this->input->post('children'); ?>" />
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
                                <label for="home_phone" class="control-label col-md-3 col-sm-3 col-xs-12">Home Phone <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12" name="home_phone" value="<?php echo $this->input->post('home_phone'); ?>" />
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="photo" class="control-label col-md-3 col-sm-3 col-xs-12">Photo  <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12" name="photo" value="<?php echo $this->input->post('photo'); ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="joined_date" class="control-label col-md-3 col-sm-3 col-xs-12">Joined Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" required="required" class="date-picker form-control col-md-7 col-xs-12" name="joined_date" id="joined_date" value="<?php echo $this->input->post('joined_date'); ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="education" class="control-label col-md-3 col-sm-3 col-xs-12">Education <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12" name="education" value="<?php echo $this->input->post('education'); ?>" />
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="specialization" class="control-label col-md-3 col-sm-3 col-xs-12">Specialization <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12" name="specialization" value="<?php echo $this->input->post('specialization'); ?>" />
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="achivement_awards" class="control-label col-md-3 col-sm-3 col-xs-12">Achivement Awards  <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12" name="achivement_awards" value="<?php echo $this->input->post('achivement_awards'); ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="events_attended" class="control-label col-md-3 col-sm-3 col-xs-12">Events Attended  <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12" name="events_attended" value="<?php echo $this->input->post('events_attended'); ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="event_trained" class="control-label col-md-3 col-sm-3 col-xs-12">Event Trained  <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12" name="event_trained" value="<?php echo $this->input->post('event_trained'); ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fulltime" class="control-label col-md-3 col-sm-3 col-xs-12">Fulltime  <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12" name="fulltime" value="<?php echo $this->input->post('fulltime'); ?>" />
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
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('faculty/'); ?>';">Cancel</button>

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
        $('#joined_date').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            calender_style: "picker_2"
        }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        
        $('#dob').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            calender_style: "picker_2"
        }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
    });
</script>
<!-- /bootstrap-daterangepicker -->
