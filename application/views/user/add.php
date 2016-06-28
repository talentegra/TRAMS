<?php echo validation_errors(); ?>

<?php echo form_open('user/add'); ?>

	<div>Username : <input type="text" name="username" value="<?php echo $this->input->post('username'); ?>" /><div>
	<div>Password : <input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" /><div>
	<div>Email : <input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" /><div>
	<div>First Name : <input type="text" name="first_name" value="<?php echo $this->input->post('first_name'); ?>" /><div>
	<div>Last Name : <input type="text" name="last_name" value="<?php echo $this->input->post('last_name'); ?>" /><div>
	<div>Phone : <input type="text" name="phone" value="<?php echo $this->input->post('phone'); ?>" /><div>
	
	<button type="submit">Save</button>

<?php echo form_close(); ?>

<?php echo validation_errors(); ?>