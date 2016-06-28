<table class="table table-striped">
    <thead>	



        <tr>
            <th width="80px">No</th>
            <th style="cursor: pointer;" id="account_mode" class="one_field_arrange_option" data-sortdb="account_mode">Account Mode<i class="glyphicon glyphicon-sort"></i></th>
            <th style="cursor: pointer;" id="account_type" class="one_field_arrange_option" data-sortdb="account_type">Account Type<i class="glyphicon glyphicon-sort"></i></th>
            <th style="cursor: pointer;" id="created" class="one_field_arrange_option" data-sortdb="created">Created<i class="glyphicon glyphicon-sort"></i></th>
            <th style="cursor: pointer;" id="updated" class="one_field_arrange_option" data-sortdb="updated">Updated<i class="glyphicon glyphicon-sort"></i></th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $start = $page;
        foreach ($account_type_data as $account_type) {
            ?>
            <tr>
                <td><?php echo++$start ?></td>
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
    </tbody>
</table>
<?php echo $this->ajax_pagination->create_links(); ?>
<div class="bottom_selector">
    <select name="per_page" id="per_page" class="col-xs-12 col-sm-1 filter_field">
        <option value="5" <?php if($set_user_pagination_status==5){echo 'selected';}?>>5</option>
        <option value="10" <?php if($set_user_pagination_status==10){echo 'selected';}?>>10</option>
        <option value="15" <?php if($set_user_pagination_status==15){echo 'selected';}?>>15</option>
        <option value="20" <?php if($set_user_pagination_status==20){echo 'selected';}?>>20</option>
        <option value="50" <?php if($set_user_pagination_status == 50){echo 'selected';}?>>50</option>
    </select>
</div>