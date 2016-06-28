<h2 style="margin-top:0px">Team Read</h2>
        <table class="table">
	    <tr><td>Lead Id</td><td><?php echo $lead_id; ?></td></tr>
	    <tr><td>Flags</td><td><?php echo $flags?'Active':'Disable' ; ?></td></tr>
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Notes</td><td><?php echo $notes; ?></td></tr>
	    <tr><td>Created</td><td><?php echo $created; ?></td></tr>
	    <tr><td>Updated</td><td><?php echo $updated; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('team') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        