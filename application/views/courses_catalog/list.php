<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><small></small></h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Course List <small>Manage Course</small></h2>
                        <div style="float: right;"><a href="<?php echo base_url('courses_catalog/add'); ?>"><button class="btn btn-success" type="button">Create Course</button></a></div>
                        <div class="clearfix"></div>

                    </div>
                    <div class="x_content">

                        <table class="table table-striped">
                            <thead>
							<td>Category</td>
							<td>Course Code</td>
							<td>Course Name</td>
							<td>Course Summary</td>
							<td>Course Contents</td>
							<td>Notes</td>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                <?php foreach ($courses_catalog as $c): ?>
                                    <tr>
										<td><?php echo $c['category_name']; ?></td>
										<td><?php echo $c['course_code']; ?></td>
										<td><?php echo $c['course_name']; ?></td>
										<td><?php echo $c['course_summary']; ?></td>
										<td><?php echo $c['course_contents']; ?></td>
										<td><?php echo $c['notes']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo site_url('courses_catalog/edit/'.$c['course_id']); ?>">Edit</a>
                                                    </li>
                                                    <li><a href="<?php echo site_url('courses_catalog/remove/'.$c['course_id']); ?>">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- /page content -->

