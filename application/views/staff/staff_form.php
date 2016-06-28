<div role="main" class="right_col" style="min-height: 3687px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create Staff</h3>
            </div>

        </div>

		
<form id="frm_create" name="frm_create" class="form-horizontal form-label-left" data-parsley-validate="" action="<?php echo $action; ?>" method="post">
	<div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">
                        <br>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Organization</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="org_id" id="org_id" placeholder="Org Id" value="<?php echo $org_id; ?>" >
						<option value="">-Select-</option>
						<?php
						if ($organization_list) {
							foreach ($organization_list as $organization_data) {
								if($org_id == $organization_data->id) {
									$selected = "selected";
								}
								else
								{
									$selected = "";
								}
								echo '<option value="'.$organization_data->id.'"'.$selected.'>'.$organization_data->name."</option>";  
							}
						}
						?>
					</select>
					<?php echo form_error('org_id') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Branch</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="branch_id" id="branch_id" placeholder="Branch Id" value="<?php echo $branch_id; ?>" >
						<option value="">-Select-</option>
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
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Group</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="group_id" id="group_id" placeholder="Group Id" value="<?php echo $group_id; ?>" >
						<option value="">-Select-</option>
						<?php
						if ($group_list) {
							foreach ($group_list as $group_data) {
								if($group_id == $group_data->id) {
									$selected = "selected";
								}
								else
								{
									$selected = "";
								}
								echo '<option value="'.$group_data->id.'"'.$selected.'>'.$group_data->name."</option>";  
							}
						}
						?>
					</select>
					<?php echo form_error('group_id') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Manager</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="manager_id" id="manager_id" placeholder="Manager Id" value="<?php echo $manager_id; ?>" >
						<option value="">-Select-</option>
						<?php
						if ($staff_details_list) {
							foreach ($staff_details_list as $staff_data) {
								if($manager_id == $staff_data->staff_id) {
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
					<?php echo form_error('manager_id') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Designation</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="designation_id" id="designation_id" placeholder="Designation Id" value="<?php echo $designation_id; ?>" >
						<option value="">-Select-</option>
						<?php
						if ($designation_list) {
							foreach ($designation_list as $designation_data) {
								if($designation_id == $designation_data->id) {
									$selected = "selected";
								}
								else
								{
									$selected = "";
								}
								echo '<option value="'.$designation_data->id.'"'.$selected.'>'.$designation_data->name."</option>";  
							}
						}
						?>
					</select>
					<?php echo form_error('designation_id') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Status</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" >
						<option value="">-Select-</option>
						<?php
						if ($status_list) {
							foreach ($status_list as $status_data) {
								if($status == $status_data->status_id) {
									$selected = "selected";
								}
								else
								{
									$selected = "";
								}
								echo '<option value="'.$status_data->status_id.'"'.$selected.'>'.$status_data->status."</option>";
							}
						}
						?>
					</select>
					<?php echo form_error('status') ?>
				</div>
				</div>
	    <div class=" form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="signature">Signature</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<textarea class="form-control col-md-7 col-xs-12" rows="3" name="signature" id="signature" placeholder="Signature"><?php echo $signature; ?></textarea>
					<?php echo form_error('signature') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Language</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" class="form-control col-md-7 col-xs-12" name="lang" id="lang" placeholder="Lang" value="<?php echo $lang; ?>" />
					<?php echo form_error('lang') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Timezone</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="timezone" id="timezone" placeholder="Timezone" value="<?php echo $timezone; ?>" >
						<option value="">-Select-</option>
						<?php
						$timezone_list = generate_timezone_list();
						if ($timezone_list) {
							foreach ($timezone_list as $key => $timezone_data) {
								if($timezone == $key) {
									$selected = "selected";
								}
								else
								{
									$selected = "";
								}
								echo '<option value="'.$key.'"'.$selected.'>'.$timezone_data."</option>";  
							}
						}
						?>
					</select>
					<?php echo form_error('timezone') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Locale</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="locale" id="locale" placeholder="Locale" value="<?php echo $locale; ?>" >
					<option value="">-Select-</option>
						<?php
						$locale_list = generate_locale_list();
						if ($locale_list) {
							foreach ($locale_list as $key => $locale_data) {
								if($locale == $key) {
									$selected = "selected";
								}
								else
								{
									$selected = "";
								}
								echo '<option value="'.$key.'"'.$selected.'>'.$locale_data."</option>";  
							}
						}
						?>
					</select>
					<?php echo form_error('locale') ?>
				</div>
				</div>
	    <div class=" form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="notes">Notes</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<textarea class="form-control col-md-7 col-xs-12" rows="3" name="notes" id="notes" placeholder="Notes"><?php echo $notes; ?></textarea>
					<?php echo form_error('notes') ?>
				</div>
				</div>
				
				</div>
				</div> 
			</div>
		</div> 
		
		<div class="clearfix"></div>
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">
                        <br>
		<!--Personal details for staff_details table-->
		<div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Firstname</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="firstname" id="firstname" placeholder="Firstname" value="<?php echo $firstname; ?>" />
			<?php echo form_error('firstname') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Lastname</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="lastname" id="lastname" placeholder="Lastname" value="<?php echo $lastname; ?>" />
			<?php echo form_error('lastname') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Father Name</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="father_name" id="father_name" placeholder="Father Name" value="<?php echo $father_name; ?>" />
			<?php echo form_error('father_name') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Husband Name</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="husband_name" id="husband_name" placeholder="Husband Name" value="<?php echo $husband_name; ?>" />
			<?php echo form_error('husband_name') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Phone</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
			<?php echo form_error('phone') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Phone Ext</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="phone_ext" id="phone_ext" placeholder="Phone Ext" value="<?php echo $phone_ext; ?>" />
			<?php echo form_error('phone_ext') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Mobile</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="mobile" id="mobile" placeholder="Mobile" value="<?php echo $mobile; ?>" />
			<?php echo form_error('mobile') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Home Phone</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="home_phone" id="home_phone" placeholder="Home Phone" value="<?php echo $home_phone; ?>" />
			<?php echo form_error('home_phone') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Photo</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="photo" id="photo" placeholder="Photo" value="<?php echo $photo; ?>" />
			<?php echo form_error('photo') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Dob</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="dob" id="dob" placeholder="Dob" value="<?php echo $dob; ?>" />
			<?php echo form_error('dob') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Dob Place</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="dob_place" id="dob_place" placeholder="Dob Place" value="<?php echo $dob_place; ?>" />
			<?php echo form_error('dob_place') ?>
		</div>
		</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Martial Status</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<?php 
					if($martial_status==''){
						$martial_status = 'single';
					}
					?>
					<label><input type="radio" <?php echo ($martial_status== 'single')?'checked':''; ?> style="width:1%" class="form-control" name="martial_status" id="martial_status" placeholder="Martial Status" value="single"/>
					Single</label>

					<label><input type="radio" <?php echo ($martial_status== 'married')?'checked':''; ?> style="width:1%" class="form-control" name="martial_status" id="martial_status" placeholder="Martial Status" value="married"/>
					Married</label>
					<?php echo form_error('martial_status') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tinyint">Children</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" class="form-control col-md-7 col-xs-12" name="children" id="children" placeholder="Children" value="<?php echo $children; ?>" />
					<?php echo form_error('children') ?>
				</div>
				</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Occupation</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="occupation" id="occupation" placeholder="Occupation" value="<?php echo $occupation; ?>" />
			<?php echo form_error('occupation') ?>
		</div>
		</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Joined Date</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" class="date-picker form-control col-md-7 col-xs-12" name="joined_date" id="joined_date" placeholder="Joined Date" value="<?php echo $joined_date; ?>" />
					<?php echo form_error('joined_date') ?>
				</div>
				</div>
	    <div class=" form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="education">Education</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<textarea class="form-control col-md-7 col-xs-12" rows="3" name="education" id="education" placeholder="Education"><?php echo $education; ?></textarea>
					<?php echo form_error('education') ?>
				</div>
				</div>
	    <div class=" form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="achivement_awards">Achivement Awards</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<textarea class="form-control col-md-7 col-xs-12" rows="3" name="achivement_awards" id="achivement_awards" placeholder="Achivement Awards"><?php echo $achivement_awards; ?></textarea>
					<?php echo form_error('achivement_awards') ?>
				</div>
				</div>
				
				</div>
				</div>
		</div>
		<div class="col-md-6 col-xs-12">
		<div class="x_panel">

			<div class="x_content">
				<br>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Events Attended</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="events_attended" id="events_attended" placeholder="Events Attended" value="<?php echo $events_attended; ?>" />
			<?php echo form_error('events_attended') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Event Trained</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="event_trained" id="event_trained" placeholder="Event Trained" value="<?php echo $event_trained; ?>" />
			<?php echo form_error('event_trained') ?>
		</div>
		</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="char">Fulltime</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<?php 
					if($fulltime==''){
						$fulltime = 'yes';
					}
					
					?>
					<label><input type="radio" <?php echo ($fulltime== 'yes')?'checked':''; ?> style="width:1%" class="form-control" name="fulltime" id="fulltime" placeholder="Fulltime" value="yes"/>
					Yes</label>

					<label><input type="radio" <?php echo ($fulltime== 'no')?'checked':''; ?> style="width:1%" class="form-control" name="fulltime" id="fulltime" placeholder="Fulltime" value="no"/>
					No</label>
					<?php echo form_error('fulltime') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tinyint">Sms Notification</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<?php 
					if($sms_notification==''){
						$sms_notification = '0';
					}
					?>
					<label><input type="radio" <?php echo ($sms_notification== '1')?'checked':''; ?> style="width:1%" class="form-control" name="sms_notification" id="sms_notification" placeholder="Sms Notification" value="1"/>
					Yes</label>

					<label><input type="radio" <?php echo ($sms_notification== '0')?'checked':''; ?> style="width:1%" class="form-control" name="sms_notification" id="sms_notification" placeholder="Sms Notification" value="0"/>
					No</label>
					<?php echo form_error('sms_notification') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tinyint">Isadmin</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<?php 
					if($isadmin==''){
						$isadmin = '0';
					}
					?>
					<label><input type="radio" <?php echo ($isadmin== '1')?'checked':''; ?> style="width:1%" class="form-control" name="isadmin" id="isadmin" placeholder="Isadmin" value="1"/>
					Yes</label>

					<label><input type="radio" <?php echo ($isadmin== '0')?'checked':''; ?> style="width:1%" class="form-control" name="isadmin" id="isadmin" placeholder="Isadmin" value="0"/>
					No</label>
					<?php echo form_error('isadmin') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tinyint">Isvisible</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<?php 
					if($isvisible==''){
						$isvisible = '1';
					}
					?>
					<label><input type="radio" <?php echo ($isvisible== '1')?'checked':''; ?> style="width:1%" class="form-control" name="isvisible" id="isvisible" placeholder="Isvisible" value="1"/>
					Yes</label>

					<label><input type="radio" <?php echo ($isvisible== '0')?'checked':''; ?> style="width:1%" class="form-control" name="isvisible" id="isvisible" placeholder="Isvisible" value="0"/>
					No</label>
					<?php echo form_error('isvisible') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tinyint">Onvacation</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<?php 
					if($onvacation==''){
						$onvacation = '0';
					}
					?>
					<label><input type="radio" <?php echo ($onvacation== '1')?'checked':''; ?> style="width:1%" class="form-control" name="onvacation" id="onvacation" placeholder="Onvacation" value="1"/>
					Yes</label>

					<label><input type="radio" <?php echo ($onvacation== '0')?'checked':''; ?> style="width:1%" class="form-control" name="onvacation" id="onvacation" placeholder="Onvacation" value="0"/>
					No</label>
					<?php echo form_error('onvacation') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tinyint">Assigned Only</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<?php 
					if($assigned_only==''){
						$assigned_only = '0';
					}
					?>
					<label><input type="radio" <?php echo ($assigned_only== '1')?'checked':''; ?> style="width:1%" class="form-control" name="assigned_only" id="assigned_only" placeholder="Assigned Only" value="1"/>
				    Yes</label>

					<label><input type="radio" <?php echo ($assigned_only== '0')?'checked':''; ?> style="width:1%" class="form-control" name="assigned_only" id="assigned_only" placeholder="Assigned Only" value="0"/>
					No</label>
					<?php echo form_error('assigned_only') ?>
				</div>
				</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Max Page Size</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="max_page_size" id="max_page_size" placeholder="Max Page Size" value="<?php echo $max_page_size; ?>" />
			<?php echo form_error('max_page_size') ?>
		</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Auto Refresh Rate</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="auto_refresh_rate" id="auto_refresh_rate" placeholder="Auto Refresh Rate" value="<?php echo $auto_refresh_rate; ?>" />
			<?php echo form_error('auto_refresh_rate') ?>
		</div>
		</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="enum">Default Signature Type</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="default_signature_type" id="default_signature_type" placeholder="Default Signature Type" value="<?php echo $default_signature_type; ?>" >
					<option <?php echo ($default_signature_type== 'none')?'selected':''; ?> value="none">none</option>
					<option <?php echo ($default_signature_type== 'mine')?'selected':''; ?> value="mine">mine</option>
					<option <?php echo ($default_signature_type== 'dept')?'selected':''; ?> value="dept">dept</option>
					</select>
					<?php echo form_error('default_signature_type') ?>
				</div>
				</div>
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="enum">Default Paper Size</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="default_paper_size" id="default_paper_size" placeholder="Default Paper Size" value="<?php echo $default_paper_size; ?>" >
					<option <?php echo ($default_paper_size== 'Letter')?'selected':''; ?> value="Letter">Letter</option>
					<option <?php echo ($default_paper_size== 'Legal')?'selected':''; ?> value="Legal">Legal</option>
					<option <?php echo ($default_paper_size== 'A4')?'selected':''; ?> value="A4">A4</option>
					<option <?php echo ($default_paper_size== 'A3')?'selected':''; ?> value="A3">A3</option>
					</select>
					<?php echo form_error('default_paper_size') ?>
				</div>
				</div>
	    <div class=" form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="extra">Extra</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<textarea class="form-control col-md-7 col-xs-12" rows="3" name="extra" id="extra" placeholder="Extra"><?php echo $extra; ?></textarea>
					<?php echo form_error('extra') ?>
				</div>
				</div>
	    <div class=" form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="permissions">Permissions</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<textarea class="form-control col-md-7 col-xs-12" rows="3" name="permissions" id="permissions" placeholder="Permissions"><?php echo $permissions; ?></textarea>
					<?php echo form_error('permissions') ?>
				</div>
				</div>
				
				</div>
				</div> 
			</div>
		</div> 
		
		
		<div class="clearfix"></div>
        <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">
                        <br>
	 <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('staff/'); ?>';">Cancel</button>

                                </div>
                            </div>
				
					</div>
				</div> 
			</div>
		</div>
			</form>
					
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
	        org_id: {
	             required: true,
	        },
	        branch_id: {
	             required: true,
	        },
	        group_id: {
	             required: true,
	        },
	        designation_id: {
	             required: true,
	        },
	        status: {
	             required: true,
	        },
	        signature: {
	             required: true,
	        },
	        lang: {
	             required: true,
	        },
	        timezone: {
	             required: true,
	        },
	        locale: {
	             required: true,
	        },
			firstname: {
	             required: true,
	        },
	        lastname: {
	             required: true,
	        },
	        mobile: {
	             required: true,
	        },
	        dob: {
	             required: true,
				 date: true,
	        },
	        dob_place: {
	             required: true,
	        },
	        martial_status: {
	             required: true,
	        },
	        children: {
	             required: true,
	             digits: true,
	        },
	        joined_date: {
	             required: true,
	             date: true,
	        },
	        education: {
	             required: true,
	        },
	        fulltime: {
	             required: true,
	        },
	        max_page_size: {
	             required: true,
	             digits: true,
	        },
	        auto_refresh_rate: {
	             required: true,
	             digits: true,
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
		$(document).ready(function() {
				$('.date-picker').daterangepicker({
					singleDatePicker: true,
					calender_style: "picker_1",
				}, function(start, end, label) {
					console.log(start.toISOString(), end.toISOString(), label);
				});
				});
</script>