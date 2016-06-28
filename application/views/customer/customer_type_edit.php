<h2 style="margin-top:0px">Customer Type <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Customer Type <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Customer Type" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Customer Type Desc <?php echo form_error('customer_type_desc') ?></label>
            <input type="text" class="form-control" name="customer_type_desc" id="customer_type_desc" placeholder="Customer Type Desc" value="<?php echo $customer_type_desc; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Customer Type Color <?php echo form_error('customer_type_color') ?></label>
            <input type="text" class="form-control" name="customer_type_color" id="customer_type_color" placeholder="Customer Type Color" value="<?php echo $customer_type_color; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ispublic <?php echo form_error('ispublic') ?></label>
            <input type="text" class="form-control" name="ispublic" id="ispublic" placeholder="Ispublic" value="<?php echo $ispublic; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('customer_type') ?>" class="btn btn-default">Cancel</a>
	</form>