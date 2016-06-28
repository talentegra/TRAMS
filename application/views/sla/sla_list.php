
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Sla List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('sla/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Flags</th>
		    <th>Grace Period</th>
		    <th>Name</th>
		    <th>Notes</th>
		    <th>Created</th>
		    <th>Updated</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($sla_data as $sla)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $sla->flags ?></td>
		    <td><?php echo $sla->grace_period ?></td>
		    <td><?php echo $sla->name ?></td>
		    <td><?php echo $sla->notes ?></td>
		    <td><?php echo $sla->created ?></td>
		    <td><?php echo $sla->updated ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('sla/read/'.$sla->id),'Read'); 
			echo ' | '; 
			echo anchor(site_url('sla/update/'.$sla->id),'Update'); 
			echo ' | '; 
			echo anchor(site_url('sla/delete/'.$sla->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
 