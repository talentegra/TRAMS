 <!DOCTYPE html>
<html lang="en">
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<meta name="description" content="">
    <meta name="author" content="">
	 <title>TesNow-support :: Staff Control Panel</title>
	 
	  bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/4.2.0/css/font-awesome.min.css');?>" />
		 <link rel="stylesheet" href="<?php echo base_url('css/autosuggest_inquisitor.css');?>" type="text/css" media="screen" charset="utf-8">
		 
		 	<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url('assets/fonts/fonts.googleapis.com.css');?>" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/ace.min.css');?>" class="ace-main-stylesheet" id="main-ace-style" />
-->
		<!-- 
		[if lte IE 9]>
			<link rel="stylesheet" href="a../ssets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo base_url('assets/js/ace-extra.min.js');?>"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		
		<style>
		
		.navbar {
	margin-bottom:-1px;
    border-radius:0;
}

#submenu {
    background-color: #e7e7e7;
    margin-bottom:20px;
}

.collapsing {
	display:none;
}
		</style>
		
</head>	
	<body class="no-skin">
		<nav id="navbar" class="navbar navbar-default navbar-fixed-top">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.php" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							TesNow Ticketing System
						</small>
					</a>
				</div>

		
			
			
			
			<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url('assets/avatars/user.jpg');?>" alt="User's Photo" />
								<span class="user-info">
									<small>Welcome </small>
									<?php echo $this->session->userdata('email'); ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="admin.php?t=settings">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.php">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo base_url('scp/logout');?>">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div> <!-- navbar-container -->
		
		</nav> 	
	

<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			
			
			<div class="main-content">
				<div class="main-content-inner">
					
					
					<div class="page-content">
					
					<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
							
					
<ul class="nav nav-tabs">
<li><a href="<?php echo base_url('staff/dashboard'); ?>" >Dashboard</a> </li>
<li><a href="<?php echo base_url('staff'); ?>" >Staff</a> </li>
<li><a href="<?php echo base_url('role'); ?>" >Roles</a> </li>
<li><a href="<?php echo base_url('dept'); ?>" >Department</a> </li>
</ul>		

						
					<?php //if($message) { ?>
				<div class="alert alert-danger" id="system_notice"><span class="label label-danger arrowed-in"> <?php //echo $message; ?></span></div>
			
					<?php // } ?>
						<div class="row">
								
										

									<div class="col-xs-12">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												
											</ul>

											<div class="nav nav-tabs tab-content">
										
											
											
											
											
									<div class="row">
									<div class="col-xs-12">	
					
    