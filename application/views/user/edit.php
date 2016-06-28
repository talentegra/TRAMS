<?php echo validation_errors(); ?>

<?php echo form_open('user/edit/'.$user['id']); ?>

	<div>Ip Address : <input type="text" name="ip_address" value="<?php echo ($this->input->post('ip_address') ? $this->input->post('ip_address') : $user['ip_address']); ?>" /><div>
	<div>Username : <input type="text" name="username" value="<?php echo ($this->input->post('username') ? $this->input->post('username') : $user['username']); ?>" /><div>
	<div>Password : <input type="password" name="password" value="<?php echo ($this->input->post('password') ? $this->input->post('password') : $user['password']); ?>" /><div>
	<div>Salt : <input type="text" name="salt" value="<?php echo ($this->input->post('salt') ? $this->input->post('salt') : $user['salt']); ?>" /><div>
	<div>Email : <input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $user['email']); ?>" /><div>
	<div>Activation Code : <input type="text" name="activation_code" value="<?php echo ($this->input->post('activation_code') ? $this->input->post('activation_code') : $user['activation_code']); ?>" /><div>
	<div>Forgotten Password Code : <input type="password" name="forgotten_password_code" value="<?php echo ($this->input->post('forgotten_password_code') ? $this->input->post('forgotten_password_code') : $user['forgotten_password_code']); ?>" /><div>
	<div>Forgotten Password Time : <input type="password" name="forgotten_password_time" value="<?php echo ($this->input->post('forgotten_password_time') ? $this->input->post('forgotten_password_time') : $user['forgotten_password_time']); ?>" /><div>
	<div>Remember Code : <input type="text" name="remember_code" value="<?php echo ($this->input->post('remember_code') ? $this->input->post('remember_code') : $user['remember_code']); ?>" /><div>
	<div>Created On : <input type="text" name="created_on" value="<?php echo ($this->input->post('created_on') ? $this->input->post('created_on') : $user['created_on']); ?>" /><div>
	<div>Modified On : <input type="text" name="modified_on" value="<?php echo ($this->input->post('modified_on') ? $this->input->post('modified_on') : $user['modified_on']); ?>" /><div>
	<div>Last Login : <input type="text" name="last_login" value="<?php echo ($this->input->post('last_login') ? $this->input->post('last_login') : $user['last_login']); ?>" /><div>
	<div>Active : <input type="text" name="active" value="<?php echo ($this->input->post('active') ? $this->input->post('active') : $user['active']); ?>" /><div>
	<div>First Name : <input type="text" name="first_name" value="<?php echo ($this->input->post('first_name') ? $this->input->post('first_name') : $user['first_name']); ?>" /><div>
	<div>Last Name : <input type="text" name="last_name" value="<?php echo ($this->input->post('last_name') ? $this->input->post('last_name') : $user['last_name']); ?>" /><div>
	<div>Company : <input type="text" name="company" value="<?php echo ($this->input->post('company') ? $this->input->post('company') : $user['company']); ?>" /><div>
	<div>Phone : <input type="text" name="phone" value="<?php echo ($this->input->post('phone') ? $this->input->post('phone') : $user['phone']); ?>" /><div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>