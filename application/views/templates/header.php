<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $title ; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/additional-methods.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-typeahead.js"></script>
<script type="text/javascript"> BASE_URL = '<?php echo base_url(); ?>';</script>

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>


  
  <style>
 .navbar-inverse { background-color: #428BCA}
.navbar-inverse .navbar-nav>.active>a:hover,.navbar-inverse .navbar-nav>li>a:hover, .navbar-inverse .navbar-nav>li>a:focus { background-color: #70B8FF}
.navbar-inverse .navbar-nav>.active>a,.navbar-inverse .navbar-nav>.open>a,.navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover,.navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus { background-color: #14ADDB}
.dropdown-menu { background-color: #FFFFFF}
.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus { background-color: #428BCA}
.navbar-inverse { background-image: none; }
.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus { background-image: none; }
.navbar-inverse { border-color: #DAEDE6}
.navbar-inverse .navbar-brand { color: #FFFFFF}
.navbar-inverse .navbar-brand:hover { color: #FFFFFF}
.navbar-inverse .navbar-nav>li>a { color: #FFFFFF}
.navbar-inverse .navbar-nav>li>a:hover, .navbar-inverse .navbar-nav>li>a:focus { color: #F5F5F5}
.navbar-inverse .navbar-nav>.active>a,.navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus { color: #FFFFFF}
.navbar-inverse .navbar-nav>.active>a:hover, .navbar-inverse .navbar-nav>.active>a:focus { color: #FFFFFF}
.dropdown-menu>li>a { color: #333333}
.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus { color: #FFFFFF}
.navbar-inverse .navbar-nav>.dropdown>a .caret { border-top-color: #428BCA}
.navbar-inverse .navbar-nav>.dropdown>a .caret { border-bottom-color: #428BCA}
.navbar-inverse .navbar-nav>.dropdown>a:hover .caret { border-top-color: #FFFFFF}
.navbar-inverse .navbar-nav>.dropdown>a:hover .caret { border-bottom-color: #FFFFFF}
.nav-tabs > li.active > a,
.nav-tabs > li.active > a:hover,
.nav-tabs > li.active > a:focus{
    color: #428BCA;
    background-color: #F5F5F5;  
}
.alert-danger {
    background-color: #f2dede !important;
    border-color: #ebccd1 !important;
    color: #a94442 !important;
}

  </style>
</head>
<body>
<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="<?php echo base_url('ticket/dashboard');?>" class="navbar-brand">TesNow</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
        <li>
          <a href="<?php echo base_url('ticket');?>">Home</a>
        </li>
		
		   <li class="<?php echo active_link('dashboard'); ?>">
          <a href="<?php echo base_url('ticket/dashboard');?>">Dashboard</a>
        </li>
				<li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tickets <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	           <li class="<?php echo active_link('ticket'); ?>"><a href="<?php echo base_url('ticket');?>">Tickets</a></li>
			  <li><a href="<?php echo base_url('ticket/my_tickets'); ?>">My Tickets</a></li>
			   <li><a href="<?php echo base_url('ticket/create'); ?>">Create a New Ticket</a></li>
	          <li><a href="<?php echo base_url('ticket/assigned_tickets'); ?>">Assigned Tickets</a></li>
	          <li><a href="<?php echo base_url('ticket/open_tickets'); ?>">Open Tickets</a></li>
			  <li><a href="<?php echo base_url('ticket/pending_tickets'); ?>">Pending Tickets</a></li>
	          <li><a href="<?php echo base_url('ticket/resolved_tickets'); ?>">Resolved Tickets</a></li>
			  <li><a href="<?php echo base_url('ticket/closed_tickets'); ?>">Closed</a></li>
	        </ul>
	      </li>
		  
		  <li class="dropdown <?php echo active_link('customer'); ?>">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Customer <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	           <li class="<?php echo active_link('customer'); ?>"><a href="<?php echo base_url('customer');?>">Customer List</a></li>
			  <li><a href="<?php echo base_url('customer_site'); ?>">Customer Sites</a></li>
			   <li><a href="<?php echo base_url('customer_type'); ?>">Customer Type</a></li>
	          <li><a href="<?php echo base_url('customer/customer_upload'); ?>">Upload Customer Data</a></li>
	          
	        </ul>
	      </li>
		  		  
		    <li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Product <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	           <li class="<?php echo active_link('ticket'); ?>"><a href="<?php echo base_url('serial');?>">Serial No</a></li>
			  <li><a href="<?php echo base_url('serial');?>">Model</a></li>
			   <li><a href="<?php echo base_url('serial'); ?>">Manufacturer</a></li>
	          <li><a href="<?php echo base_url('serial/serial_upload');?>">Upload Serial Data</a></li>
	          
	        </ul>
	      </li>
		  
		  
		  	<li class="dropdown <?php echo active_link('staff'); ?>">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Staff <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	           <li class="<?php echo active_link('staff'); ?>"><a href="<?php echo base_url('staff');?>">Staff</a></li>
			  <li class="<?php echo active_link('roles'); ?>"><a href="<?php echo base_url('roles');?>">Roles</a></li>
			   <li class="<?php echo active_link('dept'); ?>"><a href="<?php echo base_url('dept'); ?>">Departments</a></li>
	          <li class="<?php echo active_link('team'); ?>"><a href="<?php echo base_url('team');?>">Teams</a></li>
	          <li class="<?php echo active_link('designation'); ?>"><a href="<?php echo base_url('designation');?>">Designation</a></li>
	          <li class="<?php echo active_link('delegation'); ?>"><a href="<?php echo base_url('designation');?>">Delegation</a></li>
	          
	        </ul>
	      </li>
		  
		  <li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Approvals <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	           <li class=""><a href="<?php echo base_url('ticket/my_approvals');?>">My Approvals</a></li>
			  <li><a href="<?php echo base_url('ticket/pending_approvals');?>">Pending Approvals</a></li>
			   <li><a href="<?php echo base_url('ticket/ticket_approvals'); ?>">Approved</a></li>
	        
	        </ul>
	      </li>
		
		<li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	           <li><a href="<?php echo base_url('ticket_priority');?>">Ticket Priority</a></li>
			  <li><a href="<?php echo base_url('ticket_status');?>">Ticket Status</a></li>
			 <li><a href="<?php echo base_url('help_topic');?>">Ticket Type</a></li>
			 
	        </ul>
	      </li>
		
		
		  <!--
		   <li>
          <a href="<?php echo base_url('staff');?>">Settings</a>
        </li>
		
		  
		  	<li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tasks <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	           <li class="<?php echo active_link('ticket'); ?>"><a href="<?php echo base_url('ticket');?>">Tasks</a></li>
			  <li><a href="#">My Task</a></li>
			   <li><a href="<?php echo base_url('ticket/create'); ?>">Open a New Task</a></li>
	          <li><a href="#">Assigned Task</a></li>
	          <li><a href="#">Open Task</a></li>
	          <li><a href="#">Pending Task</a></li>
	          <li><a href="#">Closed</a></li>
	        </ul>
	      </li>
		  
       --> 	
        
     
		
		
		<li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	           <li><a href="<?php echo base_url('sla');?>">SLA</a></li>
			  
			  <li><a href="#">Email</a></li>
			  <li><a href="<?php echo base_url('perms'); ?>" >Permissions</a> </li>
			   <li><a href="<?php echo base_url('org');?>">Organization</a></li>
			     <li><a href="<?php echo base_url('transport');?>">Transport</a></li>
	        
	        </ul>
	      </li>
		
		
		
		
			<li class="dropdown">
			
			<a href="#" class="dropdown-toggle " data-toggle="dropdown"><?php echo $this->session->userdata('email'); ?> <b class="caret"></b></a>
	        
			<ul class="dropdown-menu dropdown-menu-right">
	        
	          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
	          <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
	          <li><a href="#"><span class="glyphicon glyphicon-lock"></span> Change Password</a></li>
	          <li><a href="<?php echo base_url('scp/logout'); ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	          
	        </ul>
	      </li>
		
      </ul>
	
    </nav>
  </div>
</header>

<?php $last = $this->uri->total_segments();
$record_last = $this->uri->segment($last);
?>
<input type="hidden" id="hid_page_url_segment" name="hid_page_url_segment" value="<?php echo $record_last; ?>" />
<div class="container" id="container">
<div class="row">
<div class="jumbotron" >
</div>
</div>

<div class="row">
   <div class=" form-group">
                        <label class="col-sm-2" for="varchar">Keyword </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Search Customer/Product" autocomplete="off" />
                            </div>
                    </div><br><br>
                    <div class=" form-group">
                        <label class="col-sm-2" for="varchar">Search By: </label>
                        <div class="col-sm-4">
                            <input name="search_by_date" value="day" type="radio" />&nbsp;Day &nbsp;
                            <input name="search_by_date" value="period" type="radio" />&nbsp;Period &nbsp;
                            <input name="search_by_date" value="all_date" type="radio" />&nbsp;All Date &nbsp;
                        </div>
                        <div>
                            <span class="text-danger">*</span> <input type="text" class="date-picker" placeholder="Start Date" id="txtStartDate" value="" />
                            <span class="text-danger">*</span> <input type="text" class="date-picker" placeholder="End Date" id="txtEndDate" />
                            <span class='validation' style='color:red;margin-bottom: 20px;display:none'></span>
                        </div>
                    </div>

 <div class=" form-group">
                <label class="col-sm-2" for="enum">Status</label>
                <div class="col-sm-4">
                    <select name="status" id="status" class="form-control">
                        <option value="">Select Status</option>
                        <?php
                        foreach (get_all_ticket_status_details() as $status) {
                            if ($status['name'] == 'Open') {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
							$selected = "";
                            echo '<option value="' . $status['id'] . '" ' . $selected . '>' . $status['name'] . "</option>";
                        }
                        ?>
                    </select>



                    <?php echo form_error('status') ?>
                </div>
            </div>


            <div class=" form-group">
                <label class="col-sm-2" for="int">Priority</label>
                <div class="col-sm-4">
                    <select name="priority_id" id="priority_id" class="form-control">
                        <option value="">select Priority</option>
                        <?php
                        foreach (get_all_ticket_priority_details() as $priority) {
                            if ($priority['priority'] == 'normal') {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
							$selected = "";
                            echo '<option value="' . $priority['priority_id'] . '" ' . $selected . '>' . $priority['priority_desc'] . "</option>";
                        }
                        ?>
                    </select>


                    <?php echo form_error('priority_id') ?>
                </div>
            </div>

<div class=" form-group">
                        <label class="col-sm-2" for="int">Department:</label>
                        <div class="col-sm-4">
                            <select name="dept_id" id="dept_id" class="form-control">
                                <option value="">select Department</option>
                                <?php
                                foreach (get_all_dept_details() as $dept) {
                                    $dept_selected = "";
                                    if($dept_id == $dept['id']) {
                                        $dept_selected = "selected";
                                    }
                                    
                                    
                                    echo '<option value="' . $dept['id'] . '"'. $dept_selected.'>' . $dept['name'] . "</option>";
                                }
                                ?>
                            </select>
                            <?php echo form_error('dept_id') ?>
                        </div>
                    </div>
					<div class=" form-group">
                        <label class="col-sm-2" for="int">Call Logged In:</label>
                        <div class="col-sm-4">
                            <select name="call_logged_in" id="call_logged_in" class="form-control">
                                <option value="">Select Call Logged In</option>
                                <?php
                                foreach (get_all_city_details() as $city) {
                                    echo '<option value="' . $city['city_name'] . '">' . $city['city_name'] . "</option>";
                                }
                                ?>
                            </select>
                            <?php echo form_error('call_logged_in') ?>
                        </div>
                    </div>
					<div class=" form-group">
                        <label class="col-sm-2" for="int">Nature Call:</label>
                        <div class="col-sm-4">
                            <select name="nature_call" id="nature_call" class="form-control">
                                <option value="">Select Nature Call</option>
                                <option value="warranty">Warranty</option>
                                <option value="sms">SMS</option>
                                <option value="amc">AMC</option>
                                <option value="percall">Per Call</option>
                                <option value="freecall">Free Call</option>
                            </select>
                            <?php echo form_error('nature_call') ?>
                        </div>
                    </div>
					
			 <button type="button" class="btn btn-info btn-sm" onclick="search_load_ticket_list(0)">Search</button>	

			<form  target="_blank" name="ticket_list_search_data" id="ticket_list_search_data" method="post" action="<?php echo site_url('/ticket/ticket_list_search_data'); ?>">
            <input type="hidden" name="ticket_search_priority" id="ticket_search_priority" value="" />
            <input type="hidden" name="ticket_search_status" id="ticket_search_status" value="" />
			<input type="hidden" name="ticket_search_dept" id="ticket_search_dept" value="" />
			<input type="hidden" name="ticket_search_call_logged_in" id="ticket_search_call_logged_in" value="" />
			<input type="hidden" name="ticket_search_nature_call" id="ticket_search_nature_call" value="" />
			<input type="hidden" name="ticket_start_date" id="ticket_start_date" value="" /> 
			<input type="hidden" name="ticket_end_date" id="ticket_end_date" value="" />
			<input type="hidden" name="ticket_keyword" id="ticket_keyword" value="" /> 
			<input type="hidden" name="ticket_frm_page" id="ticket_frm_page" value="" /> 
			<input type="hidden" name="ticket_date_type" id="ticket_date_type" value="" /> 			
		
         </form>			 



<div class="row">
<div class="col-md-12">
<?php 
$seg2 = $this->uri->segment(2); 


?>
					
<ul class="nav nav-tabs">
<li class="<?php echo ($seg2 == 'dashboard')? 'active' : ''; ?>"><a href="<?php echo base_url('ticket/dashboard'); ?>" >Dashboard</a> </li>
<li class="<?php echo ($seg2 == 'open_tickets') ? 'active' : ''; ?>"><a href="<?php echo base_url('ticket/open_tickets'); ?>" >Open Tickets</a> </li>
<li class="<?php echo ($seg2 == 'my_tickets')? 'active' : ''; ?>"><a href="<?php echo base_url('ticket/my_tickets'); ?>" >My Tickets</a> </li>
<li class="<?php echo ($seg2 == 'assigned_tickets')? 'active' : ''; ?>"><a href="<?php echo base_url('ticket/assigned_tickets'); ?>" >Assigned Tickets</a> </li>
<li class="<?php echo ($seg2 == 'pending_tickets')? 'active' : ''; ?>"><a href="<?php echo base_url('ticket/pending_tickets'); ?>" >Pending Tickets</a> </li>
<li class="<?php echo ($seg2 == 'resolved_tickets')? 'active' : ''; ?>"><a href="<?php echo base_url('ticket/resolved_tickets'); ?>" >Resolved Tickets</a> </li>
<li class="<?php echo ($seg2 == 'closed_tickets')? 'active' : ''; ?>"><a href="<?php echo base_url('ticket/closed_tickets'); ?>" >Closed Tickets</a> </li>

</ul>

<script type="text/javascript">
$( document ).ready(function() {
	var url_segment = $("#hid_page_url_segment").val();
	if(url_segment != 'ticket_list_search_data'){
			$('input:radio[name="search_by_date"][value="day"]').prop('checked', true);
			var today = new Date();
			 daten = today.toISOString().substring(0, 10);
			$('#txtStartDate').val(daten);
			$('#txtEndDate').val('');
			$("#txtStartDate").removeAttr("disabled"); 
			$("#txtEndDate").attr("disabled", "disabled");
			//$("#hid_start_date").val($('#txtStartDate').val());
		}
		else {
			var date_type = '<?php echo isset($date_type)?$date_type:''; ?>';
			$('input:radio[name="search_by_date"][value='+date_type+']').prop('checked', true);
			if (date_type == 'day') {
            $('#txtStartDate').val('<?php echo isset($start_date)?$start_date:''; ?>');
			$('#txtEndDate').val('');
			$("#txtStartDate").removeAttr("disabled"); 
			$("#txtEndDate").attr("disabled", "disabled");
        }
        else if (date_type ==  'period') {
			$('#txtStartDate').val('<?php echo isset($start_date)?$start_date:''; ?>');
			$('#txtEndDate').val('<?php echo isset($end_date)?$end_date:''; ?>');
			$("#txtStartDate").removeAttr("disabled"); 
            $("#txtEndDate").removeAttr("disabled"); 
        }
		else if (date_type ==  'all_date') {
			$('#txtStartDate').val('');
			$('#txtEndDate').val('');
            $("#txtStartDate").attr("disabled", "disabled");
			$("#txtEndDate").attr("disabled", "disabled");
        }
		$("#priority_id").val('<?php echo isset($search_priority)?$search_priority:''; ?>');
		$("#status").val('<?php echo isset($search_status)?$search_status:''; ?>');
		$("#dept_id").val('<?php echo isset($search_dept)?$search_dept:''; ?>');
		$("#keyword").val('<?php echo isset($keyword)?$keyword:''; ?>');
		$("#nature_call").val('<?php echo isset($search_nature_call)?$search_nature_call:''; ?>');
		$("#call_logged_in").val('<?php echo isset($search_call_logged_in)?$search_call_logged_in:''; ?>');
		}
});
$(document).on('focus', ".date-picker", function() {
            $(this).datepicker({
                locale: 'no',
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                autoclose: true
                //startDate:'today'
            });
        });
		 $('input[type=radio][name=search_by_date]').change(function() {
        if (this.value == 'day') {
           // $("#txtStartDate").datepicker('setDate', new Date());
		   var today = new Date();
			 daten = today.toISOString().substring(0, 10);
			$('#txtStartDate').val(daten);
			$('#txtEndDate').val('');
			$("#txtStartDate").removeAttr("disabled"); 
			$("#txtEndDate").attr("disabled", "disabled");
        }
        else if (this.value == 'period') {
			$('#txtStartDate').val('');
			$('#txtEndDate').val('');
			$("#txtStartDate").removeAttr("disabled"); 
            $("#txtEndDate").removeAttr("disabled"); 
        }
		else if (this.value == 'all_date') {
			$('#txtStartDate').val('');
			$('#txtEndDate').val('');
            $("#txtStartDate").attr("disabled", "disabled");
			$("#txtEndDate").attr("disabled", "disabled");
        }
    });
	
		
function search_load_ticket_list(page) {
            var url_segment = $("#hid_page_url_segment").val();
            //$('<div></div>').prependTo('body').attr('id', 'overlay');
            var per_page = $("select#per_page option").filter(":selected").val();
            var sortby = $("#sortby").val();
            var sort_column = $("#sort_column").val();
			var search_priority = $("#priority_id").val();
			var search_status = $("#status").val();
			var search_dept = $("#dept_id").val();
			var search_call_logged_in = $("#call_logged_in").val();
			var search_nature_call = $("#nature_call").val();
			var search_radio_sel = $('input:radio[name=search_by_date]:checked').val();
			var start_date = "";
			var end_date = "";
			var keyword = $("#keyword").val();
			
			if(search_radio_sel=="day"){
				if($("#txtStartDate").val()!=''){
					start_date = $("#txtStartDate").val();
					end_date = "";
					$(".validation").hide(); 
				}
				else {
					$(".validation").html("Please enter Start Date"); 
					$(".validation").show(); 
					return false;
				}
			}
			if(search_radio_sel=="period"){
				if($("#txtStartDate").val()!='' && $("#txtEndDate").val()){
					if(new Date($("#txtStartDate").val()) < new Date($("#txtEndDate").val())){
					start_date = $("#txtStartDate").val();
					end_date = $("#txtEndDate").val();
					$(".validation").hide(); 
					}
					else {
						$(".validation").html("Please enter End Date greater than Start Date"); 
						$(".validation").show(); 
						return false;
					}
				}
				else {
					$(".validation").html("Please enter Start Date and End Date"); 
					$(".validation").show(); 
					return false;
				}
			}
			if(search_radio_sel=="all_date"){
				$(".validation").hide(); 
				start_date = "";
				end_date = "";
			}
            //alert('per_page '+per_page);
			if(url_segment == 'ticket'||url_segment == 'open_tickets'||url_segment == 'my_tickets'||url_segment == 'assigned_tickets'||url_segment == 'pending_tickets'||url_segment == 'resolved_tickets'||url_segment == 'closed_tickets'||url_segment == 'ticket_list_search_data'){
					$("#hid_priority").val(search_priority);
					$("#hid_status").val(search_status);
					$("#hid_dept_id").val(search_dept);
					$("#hid_call_logged_in").val(search_call_logged_in);
					$("#hid_nature_call").val(search_nature_call);
					$("#hid_start_date").val(start_date);
					$("#hid_end_date").val(end_date);
					$("#hid_keyword").val(keyword);
					}
			else {
					$("#ticket_search_priority").val(search_priority);
					$("#ticket_search_status").val(search_status);
					$("#ticket_search_dept").val(search_dept);
					$("#ticket_search_call_logged_in").val(search_call_logged_in);
					$("#ticket_search_nature_call").val(search_nature_call);
					$("#ticket_start_date").val(start_date);
					$("#ticket_end_date").val(end_date);
					$("#ticket_keyword").val(keyword);
					$("#ticket_frm_page").val(url_segment);
					$("#ticket_date_type").val(search_radio_sel);
				document.getElementById("ticket_list_search_data").submit();
				return false;
			}
            var dataString = "per_page=" + per_page + "&page=" + page+ "&sortby=" + sortby+ "&sort_column=" + sort_column+ "&search_status=" + search_status+ "&search_priority=" + search_priority+ "&search_dept=" + search_dept+ "&search_call_logged_in=" + search_call_logged_in+ "&search_nature_call=" + search_nature_call+ "&start_date=" + start_date+ "&end_date=" + end_date+ "&keyword=" + keyword+ "&frm_page=" +url_segment;
			$("#dataloaderimage").show();
            $.ajax({
                type: "POST",
                data: dataString,
                url: '<?php echo base_url(); ?>ticket/ticket_list_ajax_data/' + page, //The url where the server req would we made.

                success: function(data) {
					
                    $('#overlay').remove();
                    $("#dataloaderimage").hide();
                    $("#ticket_list").html(data).fadeIn('slow');
					if(sort_column!='' && sort_column!='ticket_id' ){
						var string = $("#"+sort_column).html();
						if(sortby=='ASC'){
						string = string.replace(/glyphicon-sort|glyphicon glyphicon-triangle-bottom|glyphicon glyphicon-triangle-top/gi, 'glyphicon-triangle-top');
					    }
						else{
						string = string.replace(/glyphicon-sort|glyphicon glyphicon-triangle-bottom|glyphicon glyphicon-triangle-top/gi, 'glyphicon-triangle-bottom');	
						}
						$("#"+sort_column).html(string);
						//alert(string);
						

					}
					
                }
            });
        }
</script>
