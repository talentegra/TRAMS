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
                        <h2>Faculty Admin List <small>Manage Faculty Admins</small></h2>
                        <div style="float: right;"><a href="<?php echo base_url('faculty_admin/add'); ?>"><button class="btn btn-success" type="button">Create Faculty Admin</button></a></div>
                        <div class="clearfix"></div>

                    </div>
                    <div class="x_content">

                        <table class="table table-striped">
                            <thead>
                            <th>ID</th>
                            <th>Faculty code</th>
                            <th>Admin name</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php foreach ($faculty_admins as $f): ?>
                                    <tr>
                                        <td><?php echo $f['id']; ?></td>
                                        <td><?php echo $f['faculty_name']; ?></td>
                                        <td><?php echo $f['first_name'] . ' ' . $f['last_name']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo site_url('faculty_admin/edit/'.$f['id']); ?>">Edit</a>
                                                    </li>
                                                    <li><a href="<?php echo site_url('faculty_admin/remove/'.$f['id']); ?>">Delete</a>
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

