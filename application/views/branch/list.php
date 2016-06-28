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
                        <h2>Branch List <small>Manage Branches</small></h2>
                        <div style="float: right;"><a href="<?php echo base_url('branch/add'); ?>"><button class="btn btn-success" type="button">Create Branch</button></a></div>
                        <div class="clearfix"></div>
                        
                    </div>
                    <div class="x_content">

                        <table class="table table-striped">
                            <thead>
                            <th>Branch Code</th>
                            <th>Address</th>
                            <th>Branch Area</th>
                            <th>City</th>
                            <th>Zipcode</th>
                            <th>Branch Admin</th>
                            <th>Branch Type</th>
                            <th>Phone</th>
                            <th>Extn</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <!--<th>Domain</th>-->
                            <th>Capacity</th>
                            <!--<th>Notes</th>-->
                            <th>Action</th>
                                </thead>
                            <tbody>
                                <?php foreach ($branch as $b): ?>
                                    <tr>
                                        <td><?php echo $b['branch_code']; ?></td>
                                        <td><?php echo $b['address']; ?></td>
                                        <td><?php echo $b['branch_area']; ?></td>
                                        <td><?php echo $b['city']; ?></td>
                                        <td><?php echo $b['zipcode']; ?></td>
                                        <td><?php echo $b['branch_admin']; ?></td>
                                        <td><?php echo $b['branch_type']; ?></td>
                                        <td><?php echo $b['phone']; ?></td>
                                        <td><?php echo $b['extn']; ?></td>
                                        <td><?php echo $b['email']; ?></td>
                                        <td><?php echo $b['mobile']; ?></td>
                                        <!--<td><?php echo $b['domain']; ?></td>-->
                                        <td><?php echo $b['capacity']; ?></td>
                                        <!--<td><?php echo $b['notes']; ?></td>-->
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo site_url('branch/edit/' . $b['id']); ?>">Edit</a>
                                                    </li>
                                                    <li><a href="<?php echo site_url('branch/remove/' . $b['id']); ?>">Delete</a>
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

