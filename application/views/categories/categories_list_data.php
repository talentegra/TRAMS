<table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th style="cursor: pointer;" id="parent_name" class="one_field_arrange_option" data-sortdb="parent_name">Parent Id<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="category_name" class="one_field_arrange_option" data-sortdb="category_name">Category Name<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="active" class="one_field_arrange_option" data-sortdb="active">Active<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="created" class="one_field_arrange_option" data-sortdb="created">Created<i class="fa fa-sort"></i></th>
		<th style="cursor: pointer;" id="updated" class="one_field_arrange_option" data-sortdb="updated">Updated<i class="fa fa-sort"></i></th>
		<th>Action</th>
            </tr><?php
            foreach ($categories_data as $categories)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$page ?></td>
			<td><?php echo $categories->parent_name ?></td>
			<td><?php echo $categories->category_name ?></td>
			<td><?php echo $categories->active ?></td>
			<td><?php echo $categories->created ?></td>
			<td><?php echo $categories->updated ?></td>
			<td style="text-align:center" width="200px">
				<div class="btn-group">
				<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
				<ul class="dropdown-menu"><li><a href="<?php echo site_url('categories/read/'.$categories->category_id); ?>">Read</a></li><li><a href="<?php echo site_url('categories/update/'.$categories->category_id); ?>">Edit</a></li><li><a href="<?php echo site_url('categories/delete/'.$categories->category_id); ?>">Delete</a></li>
			</ul></div></td>
		</tr>
                <?php
            }
            ?>
        </table>
        <?php echo $this->ajax_pagination->create_links(); ?><input type="hidden" id="hid_total_rows" name="hid_total_rows" value="<?php echo $total_rows; ?>" />