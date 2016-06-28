<table class="table table-bordered" style="margin-bottom: 10px">
    <tr>
        <th>No</th>
        <th style="cursor: pointer;" id="account_mode" class="one_field_arrange_option" data-sortdb="account_mode">Account Mode<i class="fa fa-sort"></i></th>
        <th style="cursor: pointer;" id="account_type" class="one_field_arrange_option" data-sortdb="account_type">Account Type<i class="fa fa-sort"></i></th>
        <th style="cursor: pointer;" id="created" class="one_field_arrange_option" data-sortdb="created">Created<i class="fa fa-sort"></i></th>
        <th style="cursor: pointer;" id="updated" class="one_field_arrange_option" data-sortdb="updated">Updated<i class="fa fa-sort"></i></th>
        <th>Action</th>
    </tr><?php
foreach ($account_type_data as $account_type) {
   ?>
    <tr>
        <td width="80px"><?php echo++$page ?></td>
        <td><?php echo $account_type->account_mode ?></td>
        <td><?php echo $account_type->account_type ?></td>
        <td><?php echo $account_type->created ?></td>
        <td><?php echo $account_type->updated ?></td>
        
        <td style="text-align:center" width="200px">

            <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('account_type/read/' . $account_type->account_type_id); ?>">Read</a>
                    </li>
                    <li><a href="<?php echo site_url('account_type/update/' . $account_type->account_type_id); ?>">Edit</a>
                    </li>
                    <li><a href="<?php echo site_url('account_type/delete/' . $account_type->account_type_id); ?>">Delete</a>
                    </li>

                </ul>


            </div> </td>
        </tr>
        <?php
    }
    ?>
</table>
<?php echo $this->ajax_pagination->create_links(); ?><input type="hidden" id="hid_total_rows" name="hid_total_rows" value="<?php echo $total_rows; ?>" />