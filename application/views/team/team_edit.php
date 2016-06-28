<h2 style="margin-top:0px">Team <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Lead Id <?php echo form_error('lead_id') ?></label>
        	<select name="lead_id" id="lead_id" class="form-control">
				<option value="">select staff</option>
				<?php 
				foreach($staff_data as $staff)
				{
					$selected = "";
					if($staff->id == $team->lead_id)
						$selected = 'selected="selected"';

					echo "<option value='".$staff->id."' $selected>".$staff->username."</option>";
				} 
				?>
			</select>
		</div>
	   
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="notes">Notes <?php echo form_error('notes') ?></label>
            <textarea class="form-control" rows="3" name="notes" id="notes" placeholder="Notes"><?php echo $notes; ?></textarea>
        </div>
		
		 <div class="form-group">
            <label for="int">Status <?php echo form_error('flags') ?></label>
            <input type="radio" id="flags" name="flags" value="1" <?php echo ($flags) ?'checked="checked"':''; ?>><strong>Active</strong>
            <input type="radio" id="flags" name="flags" value="0" <?php echo ($flags) ?'checked="checked"':''; ?>>Disabled
		</div>
	
	    <input type="hidden" name="team_id" value="<?php echo $team_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('team') ?>" class="btn btn-default">Cancel</a>
	</form>