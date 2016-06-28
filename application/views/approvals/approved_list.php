
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Approved List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('ticket/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('ticket/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Ticket</th>
			<th>Date</th>
			<th>Subject</th>
			<th>From</th>
		    <th>Manufacturer</th>
		    <th>Model</th>
		    <th>Serial No</th>
		    <th>Nature Call</th>
		    <th>Priorty</th>
		    <th>Department</th>
			<th>Site Visited</th>
			<th>Transport Mode</th>
			<th>Travel Date</th>
			<th>Travel Comments</th>
			<th>Travel Start</th>
			<th>Travel Destination</th>
			<th>Travel Kms</th>
			<th>Total</th>
			<th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($ticket_data as $ticket)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo anchor(site_url('ticket/read/'.$ticket->ticket_id), $ticket->number)  ?></td>
		    <td><?php echo $ticket->ticket_created ?></td>
		    <td><?php echo anchor(site_url('ticket/read/'.$ticket->ticket_id), $ticket->subject) ?></td>
		    <td><?php echo $ticket->name ?></td>
		    <td><?php echo $ticket->manufacturer ?></td>
		    <td><?php echo $ticket->model_no ?></td>
		    <td><?php echo $ticket->serial_no ?></td>
		    <td><?php echo $ticket->call_logged_in ?></td>
		    <td><?php echo $ticket->nature_call ?></td>
		    <td><?php echo $ticket->priority_desc ?></td>
		    <td><?php echo $ticket->dept_name ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('ticket/update/'.$ticket->ticket_id),'Update'); 
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