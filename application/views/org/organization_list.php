
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Organization List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('org/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Name</th>
		    <th>Manager</th>
		    <th>Status</th>
		    <th>Domain</th>
		    <th>Extra</th>
		    <th>Created</th>
		    <th>Updated</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($org_data as $org)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $org->name ?></td>
		    <td><?php echo $org->manager ?></td>
		    <td><?php echo $org->status ?></td>
		    <td><?php echo $org->domain ?></td>
		    <td><?php echo $org->extra ?></td>
		    <td><?php echo $org->created ?></td>
		    <td><?php echo $org->updated ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('org/read/'.$org->id),'Read'); 
			echo ' | '; 
			echo anchor(site_url('org/update/'.$org->id),'Update'); 
			echo ' | '; 
			echo anchor(site_url('org/delete/'.$org->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
  