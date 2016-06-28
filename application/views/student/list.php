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
                        <h2>Student List <small>Manage Student</small></h2>
                        <div style="float: right;"><a href="<?php echo base_url('student/add'); ?>"><button class="btn btn-success" type="button">Create Student</button></a></div>
                        <div class="clearfix"></div>

                    </div>
                    <div class="x_content">

                        <table class="table table-striped">
                            <thead>
							<td>Branch</td>
							<td>Student Name</td>
							<td>Middle Name</td>
							<td>Last Name</td>
							<td>Email</td>
							<td>Mobile</td>
							<td>Reg Date</td>
							<td>Photo</td>
							<td>Notes</td>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                <?php foreach ($students as $s): ?>
                                    <tr>
										<td><?php echo $s['branch_code']; ?></td>
										<td><?php echo $s['student_name']; ?></td>
										<td><?php echo $s['middle_name']; ?></td>
										<td><?php echo $s['last_name']; ?></td>
										<td><?php echo $s['email']; ?></td>
										<td><?php echo $s['mobile']; ?></td>
										<td><?php echo $s['reg_date']; ?></td>
										<td><?php echo $s['photo']; ?></td>
										<td><?php echo $s['notes']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo site_url('student/edit/'.$s['student_id']); ?>">Edit</a>
                                                    </li>
                                                    <li><a href="<?php echo site_url('student/remove/'.$s['student_id']); ?>">Delete</a>
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

