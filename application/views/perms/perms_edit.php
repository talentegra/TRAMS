<h2 style="margin-top:0px">Permissions <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="definition">Definition <?php echo form_error('definition') ?></label>
            <textarea class="form-control" rows="3" name="definition" id="definition" placeholder="Definition"><?php echo $definition; ?></textarea>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('perms') ?>" class="btn btn-default">Cancel</a>
	</form>