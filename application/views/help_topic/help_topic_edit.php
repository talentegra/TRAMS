<h2 style="margin-top:0px">Help_topic <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Topic Pid <?php echo form_error('topic_pid') ?></label>
            <input type="text" class="form-control" name="topic_pid" id="topic_pid" placeholder="Topic Pid" value="<?php echo $topic_pid; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Isactive <?php echo form_error('isactive') ?></label>
            <input type="text" class="form-control" name="isactive" id="isactive" placeholder="Isactive" value="<?php echo $isactive; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ispublic <?php echo form_error('ispublic') ?></label>
            <input type="text" class="form-control" name="ispublic" id="ispublic" placeholder="Ispublic" value="<?php echo $ispublic; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Noautoresp <?php echo form_error('noautoresp') ?></label>
            <input type="text" class="form-control" name="noautoresp" id="noautoresp" placeholder="Noautoresp" value="<?php echo $noautoresp; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Flags <?php echo form_error('flags') ?></label>
            <input type="text" class="form-control" name="flags" id="flags" placeholder="Flags" value="<?php echo $flags; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Status Id <?php echo form_error('status_id') ?></label>
            <input type="text" class="form-control" name="status_id" id="status_id" placeholder="Status Id" value="<?php echo $status_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Priority Id <?php echo form_error('priority_id') ?></label>
            <input type="text" class="form-control" name="priority_id" id="priority_id" placeholder="Priority Id" value="<?php echo $priority_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Dept Id <?php echo form_error('dept_id') ?></label>
            <input type="text" class="form-control" name="dept_id" id="dept_id" placeholder="Dept Id" value="<?php echo $dept_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Staff Id <?php echo form_error('staff_id') ?></label>
            <input type="text" class="form-control" name="staff_id" id="staff_id" placeholder="Staff Id" value="<?php echo $staff_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Team Id <?php echo form_error('team_id') ?></label>
            <input type="text" class="form-control" name="team_id" id="team_id" placeholder="Team Id" value="<?php echo $team_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Sla Id <?php echo form_error('sla_id') ?></label>
            <input type="text" class="form-control" name="sla_id" id="sla_id" placeholder="Sla Id" value="<?php echo $sla_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Page Id <?php echo form_error('page_id') ?></label>
            <input type="text" class="form-control" name="page_id" id="page_id" placeholder="Page Id" value="<?php echo $page_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Sequence Id <?php echo form_error('sequence_id') ?></label>
            <input type="text" class="form-control" name="sequence_id" id="sequence_id" placeholder="Sequence Id" value="<?php echo $sequence_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Sort <?php echo form_error('sort') ?></label>
            <input type="text" class="form-control" name="sort" id="sort" placeholder="Sort" value="<?php echo $sort; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Topic <?php echo form_error('topic') ?></label>
            <input type="text" class="form-control" name="topic" id="topic" placeholder="Topic" value="<?php echo $topic; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Number Format <?php echo form_error('number_format') ?></label>
            <input type="text" class="form-control" name="number_format" id="number_format" placeholder="Number Format" value="<?php echo $number_format; ?>" />
        </div>
	    <div class="form-group">
            <label for="notes">Notes <?php echo form_error('notes') ?></label>
            <textarea class="form-control" rows="3" name="notes" id="notes" placeholder="Notes"><?php echo $notes; ?></textarea>
        </div>
	
	
	    <input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('help_topic') ?>" class="btn btn-default">Cancel</a>
	</form>