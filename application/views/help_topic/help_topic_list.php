<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Help_topic List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('help_topic/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Topic Pid</th>
		    <th>Isactive</th>
		    <th>Ispublic</th>
		    <th>Noautoresp</th>
		    <th>Flags</th>
		    <th>Status Id</th>
		    <th>Priority Id</th>
		    <th>Dept Id</th>
		    <th>Staff Id</th>
		    <th>Team Id</th>
		    <th>Sla Id</th>
		    <th>Page Id</th>
		    <th>Sequence Id</th>
		    <th>Sort</th>
		    <th>Topic</th>
		    <th>Number Format</th>
		    <th>Notes</th>
		    <th>Created</th>
		    <th>Updated</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($help_topic_data as $help_topic)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $help_topic->topic_pid ?></td>
		    <td><?php echo $help_topic->isactive ?></td>
		    <td><?php echo $help_topic->ispublic ?></td>
		    <td><?php echo $help_topic->noautoresp ?></td>
		    <td><?php echo $help_topic->flags ?></td>
		    <td><?php echo $help_topic->status_id ?></td>
		    <td><?php echo $help_topic->priority_id ?></td>
		    <td><?php echo $help_topic->dept_id ?></td>
		    <td><?php echo $help_topic->staff_id ?></td>
		    <td><?php echo $help_topic->team_id ?></td>
		    <td><?php echo $help_topic->sla_id ?></td>
		    <td><?php echo $help_topic->page_id ?></td>
		    <td><?php echo $help_topic->sequence_id ?></td>
		    <td><?php echo $help_topic->sort ?></td>
		    <td><?php echo $help_topic->topic ?></td>
		    <td><?php echo $help_topic->number_format ?></td>
		    <td><?php echo $help_topic->notes ?></td>
		    <td><?php echo $help_topic->created ?></td>
		    <td><?php echo $help_topic->updated ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('help_topic/read/'.$help_topic->topic_id),'Read'); 
			echo ' | '; 
			echo anchor(site_url('help_topic/update/'.$help_topic->topic_id),'Update'); 
			echo ' | '; 
			echo anchor(site_url('help_topic/delete/'.$help_topic->topic_id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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