
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Customer type List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('customer_type/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Customer Type</th>
		    <th>Customer Type Desc</th>
		    <th>Customer Type Color</th>
		    <th>Ispublic</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($customer_type_data as $customer_type)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $customer_type->name ?></td>
		    <td><?php echo $customer_type->customer_type_desc ?></td>
		    <td><?php echo $customer_type->customer_type_color ?></td>
		    <td><?php echo $customer_type->ispublic ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('customer_type/read/'.$customer_type->id),'Read'); 
			echo ' | '; 
			echo anchor(site_url('customer_type/update/'.$customer_type->id),'Update'); 
			echo ' | '; 
			echo anchor(site_url('customer_type/delete/'.$customer_type->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
    