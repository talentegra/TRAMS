<h2 style="margin-top:0px">Department <?php echo $button ?></h2>
        <form class="form-horizontal" action="<?php echo $action; ?>" method="post">
 <ul class="nav nav-tabs">
    <li class="active"><a href="#settings">Account</a></li>
    <li><a href="#access">Access</a></li>
    </ul>
<div class="tab-content">
    <div id="settings" class="tab-pane fade in active">
	
	<table class="form_table" width="940" border="0" cellspacing="0" cellpadding="2">
		<thead>
			<tr>
            <th colspan="2">
                <h3>Department Information</h3>
            </th>
			</tr>
		</thead>
		<tbody>
        <tr>
            <td width="180">
                Parent :
            </td>
            <td>
              <select name="pid" class="form-control">
				<option value="">select Department</option>
				<?php 
				foreach($dept_data as $dept)
				
				{
				 $selected = "";
					if($dept->id == $dept->pid)
						$selected = 'selected="selected"';

					echo "<option value='".$dept->id."' $selected>".$dept->name."</option>";
					
				} 
				?>
			</select>
            </td>
        </tr>
        <tr>
            <td width="180" class="required">
                *&nbsp;Name :
            </td>
            <td>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
                &nbsp;<span class="error"><?php echo form_error('name'); ?></span>
     
			</td>
        </tr>
        <tr>
            <td width="180" class="required">
                Type :
            </td>
            <td>
                <label>
                <input type="radio" name="ispublic" value="1" <?php echo $ispublic ? 'checked="checked"':''; ?>><strong>Public</strong>
                </label>
                &nbsp;
                <label>
                <input type="radio" name="ispublic" value="0" <?php echo !$ispublic ?'checked="checked"':''; ?>><strong>Private</strong>
                </label>
                &nbsp;<i class="help-tip icon-question-sign" href="#type"></i>
            </td>
        </tr>
        <tr>
            <td width="180">
                SLA :
            </td>
            <td>
                <select name="sla_id">
                <option value="">select SLA</option>
				<?php 
				foreach($sla_data as $sla)
				{
					echo '<option value="'.$sla->id.'">'.$sla->name."</option>";
				} 
				?>
			    </select>
                &nbsp;<span class="error"><?php echo form_error('sla_id'); ?></span>&nbsp;<i class="help-tip icon-question-sign" href="#sla"></i>
            </td>
        </tr>
        <tr>
            <td width="180">
                Manager :
            </td>
            <td>
                <span>
                  <select name="manager_id" class="form-control">
				<option value="">select Manager</option>
			
			</select>
                &nbsp;<span class="error"><?php echo form_error('manager_id'); ?></span>
                <i class="help-tip icon-question-sign" href="#manager"></i>
                </span>
            </td>
        </tr>
        <tr>
            <td>Ticket Assignment :</td>
            <td>
                <label>
                <input type="checkbox" name="flags" <?php echo
                $flags ?'checked="checked"':''; ?>>
                Restrict ticket assignment to department members
                </label>
                <i class="help-tip icon-question-sign" href="#sandboxing"></i>
            </td>
        </tr>
        <tr>
            <th colspan="2">
                <em><strong>Outgoing Email Settings</strong>:</em>
            </th>
        </tr>
        <tr>
            <td width="180">
                Outgoing Email :
            </td>
            <td>
                <select name="email_id">
                   
                </select>
                &nbsp;<span class="error">&nbsp;<?php echo form_error('email_id'); ?></span>&nbsp;<i class="help-tip icon-question-sign" href="#email"></i>
            </td>
        </tr>
      
        <tr>
            <th colspan="2">
                <em><strong>Autoresponder Settings </strong>:
                <i class="help-tip icon-question-sign" href="#auto_response_settings"></i></em>
            </th>
        </tr>
        <tr>
            <td width="180">
                New Ticket :
            </td>
            <td>
                <label>
                <input type="checkbox" name="ticket_auto_response" value="0" <?php echo !$ticket_auto_response ? 'checked="checked"':''; ?> >

                <strong>Disable</strong> for this Department
                </label>
                <i class="help-tip icon-question-sign" href="#new_ticket"></i>
            </td>
        </tr>
        <tr>
            <td width="180">
                New Message :
            </td>
            <td>
                <label>
                <input type="checkbox" name="message_auto_response" value="0" <?php echo !$message_auto_response?'checked="checked"':''; ?> >
                <strong>Disable</strong> for this Department
                </label>
                <i class="help-tip icon-question-sign" href="#new_message"></i>
            </td>
        </tr>
        <tr>
            <td width="180">
                Auto-Response Email :
            </td>
            <td>
                <span>
                <select name="autoresp_email_id">
                 
                </select>
                &nbsp;<span class="error"><?php echo form_error('autoresp_email_id'); ?></span>
                <i class="help-tip icon-question-sign" href="#auto_response_email"></i>
                </span>
            </td>
        </tr>
        <tr>
            <th colspan="2">
                <em><strong>Alerts and Notices :</strong>
                <i class="help-tip icon-question-sign" href="#group_membership"></i></em>
            </th>
        </tr>
        <tr>
            <td width="180">
                Recipients :
            </td>
            <td>
                <span>
                <select name="group_membership">
				
				 <option value="0">No one (disable Alerts and Notices)</option>
				 <option value="1">Department members only</option>
				<option value="2">Department and extended access members</option>
				
				
          </select>
                <i class="help-tip icon-question-sign" href="#group_membership"></i>
                </span>
            </td>
        </tr>
        <tr>
            <th colspan="2">
                <em><strong>Department Signature</strong>:
                <span class="error">&nbsp;<?php echo form_error('signature'); ?></span>
                <i class="help-tip icon-question-sign" href="#department_signature"></i></em>
            </th>
        </tr>
        <tr>
            <td colspan=2>
                <textarea class="richtext no-bar" name="signature" cols="21"
                    rows="5" style="width: 60%;"></textarea>
            </td>
        </tr>
		</tbody>
		</table>
	</div>

<div id="access" class="tab-pane fade">
		  
		<h3>Department Members</h3>
		
	
	</div>
</div>	
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('dept') ?>" class="btn btn-default">Cancel</a>
	</form>
   
   
   
   
<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
    $('.nav-tabs a').on('shown.bs.tab', function(){
        
    });
});
</script>

