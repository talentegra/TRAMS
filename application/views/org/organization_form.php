<h2 style="margin-top:0px">Organization <?php echo $button ?></h2>
        <form class="form-horizontal" action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Manager <?php echo form_error('manager') ?></label>
            <input type="text" class="form-control" name="manager" id="manager" placeholder="Manager" value="<?php echo $manager; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Domain <?php echo form_error('domain') ?></label>
            <input type="text" class="form-control" name="domain" id="domain" placeholder="Domain" value="<?php echo $domain; ?>" />
        </div>
	    <div class="form-group">
            <label for="extra">Extra <?php echo form_error('extra') ?></label>
            <textarea class="form-control" rows="3" name="extra" id="extra" placeholder="Extra"><?php echo $extra; ?></textarea>
        </div>
	
	
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('org') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>