<div id="the-lookup-form">
<h3>Lookup or Create Customer</h3>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">User Lookup or Create Customer</h4>
      </div>
      <div class="modal-body">
       
	<div><p>Search existing customer or add a new customer</p></div>
	<div style="margin-bottom:10px;">
<input type="text" class="search-input" style="width:100%;" placeholder="Search by email, mobile, phone or name" id="user-search" />
</div>
<div id="selected-user-info">
<form method="post" class="form-horizontal" action="<?php echo base_url('#users/lookup');?>">
<input type="hidden" id="user-id" name="id" value=""/>
</form>
</div>


<div id="new-user-form">
<form method="post" class="user" action="">
    <table width="100%" class="fixed">
	Create New Customer
	</table>	
	   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>