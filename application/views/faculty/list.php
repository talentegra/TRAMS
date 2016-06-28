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
                        <h2>Faculty List <small>Manage Faculty</small></h2>
                        <div style="float: right;"><a href="<?php echo base_url('faculty/add'); ?>"><button class="btn btn-success" type="button">Create Faculty</button></a></div>
                        <div class="clearfix"></div>

                    </div>
                    <div class="x_content">

                        <table class="table table-striped">
                            <thead>
                            <th>Faculty Name</th>
                            <th>Last Name</th>
                            <!--<th>Father Name</th>
                            <th>Husband Name</th>-->
                            <th>Branch Id</th>
                            <th>Dob</th>
                            <!--<th>Dob Place</th>
                            <th>Martial Status</th>
                            <th>Children</th>-->
                            <th>Email</th>
                            <th>Mobile</th>
                            <!--<th>Home Phone</th>-->
                            <th>Photo</th>
                            <th>Joined Date</th>
                            <th>Education</th>
                            <th>Specialization</th>
                            <!--<th>Achivement Awards</th>
                            <th>Events Attended</th>
                            <th>Event Trained</th>
                            <th>Fulltime</th>
                            <th>Notes</th>-->
                            <th>Action</th>
                            </thead>
                            <tbody>
                                <?php foreach ($faculty as $f): ?>
                                    <tr>
                                        <td><?php echo $f['faculty_name']; ?></td>
                                        <td><?php echo $f['last_name']; ?></td>
                                        <!--<td><?php echo $f['father_name']; ?></td>
                                        <td><?php echo $f['husband_name']; ?></td>-->
                                        <td><?php echo $f['branch_id']; ?></td>
                                        <td><?php echo $f['dob']; ?></td>
                                        <!--<td><?php echo $f['dob_place']; ?></td>
                                        <td><?php echo $f['martial_status']; ?></td>
                                        <td><?php echo $f['children']; ?></td>-->
                                        <td><?php echo $f['email']; ?></td>
                                        <td><?php echo $f['mobile']; ?></td>
                                        <!--<td><?php echo $f['home_phone']; ?></td>-->
                                        <td><?php echo $f['photo']; ?></td>
                                        <td><?php echo $f['joined_date']; ?></td>
                                        <td><?php echo $f['education']; ?></td>
                                        <td><?php echo $f['specialization']; ?></td>
                                        <!--<td><?php echo $f['achivement_awards']; ?></td>
                                        <td><?php echo $f['events_attended']; ?></td>
                                        <td><?php echo $f['event_trained']; ?></td>
                                        <td><?php echo $f['fulltime']; ?></td>
                                        <td><?php echo $f['notes']; ?></td>-->
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo site_url('faculty/edit/'.$f['id']); ?>">Edit</a>
                                                    </li>
                                                    <li><a href="<?php echo site_url('faculty/remove/'.$f['id']); ?>">Delete</a>
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

