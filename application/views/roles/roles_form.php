<h2 style="margin-top:0px">Roles <?php echo $button ?></h2>
<form action="<?php echo $action; ?>" method="post">

    <ul class="nav nav-tabs">
        <li class="<?php echo active_link('roles'); ?>"><a href="#settings">Roles</a></li>
        <li><a href="#access">Permissions</a></li>
    </ul>
    <div class="tab-content">
        <div id="settings" class="tab-pane fade in active">

            <h3>Role </h3>

            <div class="form-group">
                <label for="varchar">Name <?php echo form_error('name') ?></label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
            </div>
            <div class="form-group">
                <label for="definition">Definition <?php echo form_error('definition') ?></label>
                <textarea class="form-control" rows="3" name="definition" id="definition" placeholder="Definition"><?php echo $definition; ?></textarea>
            </div>
        </div>

        <div id="access" class="tab-pane fade">



            <ul class="nav nav-tabs">
                <li class="<?php echo active_link('roles'); ?>"><a href="#tickets">Tickets</a></li>
                <li><a href="#knowledge">Knowledgebase</a></li>
            </ul>

            <div class="tab-content">
                <div id="tickets" class="tab-pane in active">

                    <h4> Ticket Permissions </h4>

                    <label class="checkbox">
                        <input type="checkbox" name="create_ticket" value="1" <?php if ($create_ticket == 1) { ?> checked="" <?php } ?>/>
                        Create Ticket            </label>
                    <label class="checkbox">
                        <input type="checkbox" name="edit_ticket" value="1" <?php if ($edit_ticket == 1) { ?> checked="" <?php } ?>/>
                        Edit Ticket            </label>
                    <label class="checkbox">
                        <input type="checkbox" name="assign_ticket" value="1" <?php if ($assign_ticket == 1) { ?> checked="" <?php } ?>/>
                        Assign Ticket            </label>
                    <label class="checkbox">
                        <input type="checkbox" name="transfer_ticket" value="1" <?php if ($transfer_ticket == 1) { ?> checked="" <?php } ?>/>
                        Transfer Ticket            </label>
                    <label class="checkbox">
                        <input type="checkbox" name="post_reply" value="1" <?php if ($post_reply == 1) { ?> checked="" <?php } ?>/>
                        Post Reply           </label>
                    <label class="checkbox">
                        <input type="checkbox" name="close_ticket" value="1" <?php if ($close_ticket == 1) { ?> checked="" <?php } ?>/>
                        Close Ticket           </label>

                    <label class="checkbox">
                        <input type="checkbox" name="delete_ticket" value="1" <?php if ($delete_ticket == 1) { ?> checked="" <?php } ?>/>
                        Delete Ticket           </label>  
                    <label class="checkbox">
                        <input type="checkbox" name="view_ticket" value="1" <?php if ($view_ticket == 1) { ?> checked="" <?php } ?>/>
                        View Ticket           </label>  

                    <label class="checkbox">
                        <input type="checkbox" name="edit_thread" value="1" <?php if ($edit_thread == 1) { ?> checked="" <?php } ?>/>
                        Edit Thread           </label>

                    <label class="checkbox">
                        <input type="checkbox" name="spare_replace" value="1" <?php if ($spare_replace == 1) { ?> checked="" <?php } ?>/>
                        Spare Replace           </label>  

                    <label class="checkbox">
                        <input type="checkbox" name="list_ticket" value="1" <?php if ($list_ticket == 1) { ?> checked="" <?php } ?>/>
                        Listing Ticket           </label>  

                    <label class="checkbox">
                        <input type="checkbox" name="transport" value="1" <?php if ($transport == 1) { ?> checked="" <?php } ?>/>
                        Transport           </label> 

                    <label class="checkbox">
                        <input type="checkbox" name="approvals" value="1" <?php if ($approvals == 1) { ?> checked="" <?php } ?>/>
                        Approvals           </label>	

                    <label class="checkbox">
                        <input type="checkbox" name="resolution_notes" value="1" <?php if ($resolution_notes == 1) { ?> checked="" <?php } ?>/>
                        Resolution Notes           </label>


                    <label class="checkbox">
                        <input type="checkbox" name="restrict_view_ticket" value="1" <?php if ($restrict_view_ticket == 1) { ?> checked="" <?php } ?>/>
                        Restrict View Ticket           </label>  

                    <label class="checkbox">
                        <input type="checkbox" name="sla_details" value="1" <?php if ($sla_details == 1) { ?> checked="" <?php } ?>/>
                        SLA Details           </label>


                </div>

                <div id="knowledge" class="tab-pane fade">

                </div>

            </div>		




        </div>
    </div>		

    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    <a href="<?php echo site_url('roles') ?>" class="btn btn-default">Cancel</a>
</form>
</body>
</html>