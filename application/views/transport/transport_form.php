<h2 style="margin-top:0px">Transport <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Transport Mode <?php echo form_error('transport_mode') ?></label>
            <input type="text" class="form-control" name="transport_mode" id="transport_mode" placeholder="Transport Mode" value="<?php echo $transport_mode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Transport Desc <?php echo form_error('transport_desc') ?></label>
            <input type="text" class="form-control" name="transport_desc" id="transport_desc" placeholder="Transport Desc" value="<?php echo $transport_desc; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Transport Per Unit <?php echo form_error('transport_per_unit') ?></label>
            <input type="text" class="form-control" name="transport_per_unit" id="transport_per_unit" placeholder="Transport Per Unit" value="<?php echo $transport_per_unit; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Transport Price <?php echo form_error('transport_price') ?></label>
            <input type="text" class="form-control" name="transport_price" id="transport_price" placeholder="Transport Price" value="<?php echo $transport_price; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ispublic <?php echo form_error('ispublic') ?></label>
            <input type="text" class="form-control" name="ispublic" id="ispublic" placeholder="Ispublic" value="<?php echo $ispublic; ?>" />
        </div>
	    <input type="hidden" name="transport_id" value="<?php echo $transport_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('transport') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>