
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Customer Site List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('customer_site/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Cust Id</th>
		    <th>Name</th>
		    <th>Address</th>
		    <th>Pincode</th>
		    <th>Location</th>
		    <th>Area</th>
		    <th>City</th>
		    <th>Phone</th>
		    <th>Phone Ext</th>
		    <th>Manager</th>
		    <th>Manager Mobile</th>
		    <th>Manager Email</th>
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
            foreach ($customer_site_data as $customer_site)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $customer_site->cust_id ?></td>
		    <td><?php echo $customer_site->name ?></td>
		    <td><?php echo $customer_site->address ?></td>
		    <td><?php echo $customer_site->pincode ?></td>
		    <td><?php echo $customer_site->location ?></td>
		    <td><?php echo $customer_site->area ?></td>
		    <td><?php echo $customer_site->city ?></td>
		    <td><?php echo $customer_site->phone ?></td>
		    <td><?php echo $customer_site->phone_ext ?></td>
		    <td><?php echo $customer_site->manager ?></td>
		    <td><?php echo $customer_site->manager_mobile ?></td>
		    <td><?php echo $customer_site->manager_email ?></td>
		    <td><?php echo $customer_site->status ?></td>
		    <td><?php echo $customer_site->domain ?></td>
		    <td><?php echo $customer_site->extra ?></td>
		    <td><?php echo $customer_site->created ?></td>
		    <td><?php echo $customer_site->updated ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('customer_site/read/'.$customer_site->id),'Read'); 
			echo ' | '; 
			echo anchor(site_url('customer_site/update/'.$customer_site->id),'Update'); 
			echo ' | '; 
			echo anchor(site_url('customer_site/delete/'.$customer_site->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
    </body>
</html>