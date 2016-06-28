<h2 style="margin-top:0px">Sla <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Flags <?php echo form_error('flags') ?></label>
            <input type="text" class="form-control" name="flags" id="flags" placeholder="Flags" value="<?php echo $flags; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Grace Period <?php echo form_error('grace_period') ?></label>
            <input type="text" class="form-control" name="grace_period" id="grace_period" placeholder="Grace Period" value="<?php echo $grace_period; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="notes">Notes <?php echo form_error('notes') ?></label>
            <textarea class="form-control" rows="3" name="notes" id="notes" placeholder="Notes"><?php echo $notes; ?></textarea>
        </div>
	
	
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sla') ?>" class="btn btn-default">Cancel</a>
	</form>