<h2 style="margin-top:0px">Customer Site <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Cust Id <?php echo form_error('cust_id') ?></label>
            <input type="text" class="form-control" name="cust_id" id="cust_id" placeholder="Cust Id" value="<?php echo $cust_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="address">Address <?php echo form_error('address') ?></label>
            <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"><?php echo $address; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Pincode <?php echo form_error('pincode') ?></label>
            <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode" value="<?php echo $pincode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Location <?php echo form_error('location') ?></label>
            <input type="text" class="form-control" name="location" id="location" placeholder="Location" value="<?php echo $location; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Area <?php echo form_error('area') ?></label>
            <input type="text" class="form-control" name="area" id="area" placeholder="Area" value="<?php echo $area; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">City <?php echo form_error('city') ?></label>
            <input type="text" class="form-control" name="city" id="city" placeholder="City" value="<?php echo $city; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Phone <?php echo form_error('phone') ?></label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Phone Ext <?php echo form_error('phone_ext') ?></label>
            <input type="text" class="form-control" name="phone_ext" id="phone_ext" placeholder="Phone Ext" value="<?php echo $phone_ext; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Manager <?php echo form_error('manager') ?></label>
            <input type="text" class="form-control" name="manager" id="manager" placeholder="Manager" value="<?php echo $manager; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Manager Mobile <?php echo form_error('manager_mobile') ?></label>
            <input type="text" class="form-control" name="manager_mobile" id="manager_mobile" placeholder="Manager Mobile" value="<?php echo $manager_mobile; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Manager Email <?php echo form_error('manager_email') ?></label>
            <input type="text" class="form-control" name="manager_email" id="manager_email" placeholder="Manager Email" value="<?php echo $manager_email; ?>" />
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
	    <a href="<?php echo site_url('customer_site') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>