
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Department List</h2>
            </div>
             <div class="col-md-4 text-center">
                 <?php if ($this->session->userdata('message') == TRUE): ?>
			<div class="alert alert-success" id="message"><?php echo $this->session->userdata('message'); ?></div>
				<?php endif; ?>
						
				  <?php if ($this->session->flashdata('error') == TRUE): ?>
			<div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
				<?php endif; ?>
				
            </div>


            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('dept/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Pid</th>
		   
		    <th>Sla Id</th>
		 
		    <th>Manager Id</th>
		  
		    <th>Name</th>
		    <th>Signature</th>
		    <th>Type</th>
		    <th>Group Membership</th>
		    <th>Ticket Auto Response</th>
		    <th>Message Auto Response</th>
		 
		    <th>Updated</th>
		    <th>Created</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($dept_data as $dept)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $dept['pid']; ?></td>
		    
		    <td><?php echo $dept['sla_id']; ?></td>
		    <td><?php echo $dept['manager_id']; ?></td>
		    
		    <td><?php echo $dept['name']; ?></td>
		    <td><?php echo $dept['signature']; ?></td>
		    <td><?php echo $dept['ispublic'] ? 'Public' : 'Private'; ?></td>
		    <td><?php echo $dept['group_membership']; ?></td>
		    <td><?php echo $dept['ticket_auto_response'] ;?></td>
		    <td><?php echo $dept['message_auto_response']; ?></td>
		 
		    <td><?php echo $dept['updated']; ?></td>
		    <td><?php echo $dept['created'] ;?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('dept/read/'.$dept['id']),'Read'); 
			echo ' | '; 
			echo anchor(site_url('dept/update/'.$dept['id']),'Update'); 
			echo ' | '; 
			echo anchor(site_url('dept/delete/'.$dept['id']),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
 