
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <h2 style="margin-top:0px">My Approvals</h2>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 4px"  id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
</div>
<form class="form-horizontal" method="post" id="frm_approvals" action="<?php echo base_url(); ?>ticket/approve_transport">
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <div style="margin-top: 4px;width: 500px;float: left;">
            <select name="sel_status">
                <option value="">--Select Status--</option>
                <option value="approved">Approve</option>
                <option value="rejected">Reject</option>
            </select>
            <button type="submit" class="btn btn-primary">Update Status</button>
            
        </div>
        <div id="lbl_approval_error"></div>
    </div>

</div>
<table class="table table-bordered table-striped" id="mytable">
    <thead>
        <tr>
            <th width="80px"><input type="checkbox" id="checkAll"/> Check all</th>
            <th>No</th>
            <th>Travel Date</th>
            <th>Customer</th>
            <th>Ticket</th>
            <th>Ticket Created Date</th>
            <th>Subject</th>
            <th>Nature Call</th>
            <th>Priorty</th>
            <th>Site Visited</th>
            <th>Transport Mode</th>
            <th>Travel Start</th>
            <th>Travel Destination</th>
            <th>Travel Kms</th>
            <th>Total</th>

            <th>Approval Status</th>
            <th>Staff Name</th>
            <th>Department</th>
            <th>Travel Comments</th>

            <!--<th>Action</th>-->
        </tr>
    </thead>
    <tbody>
        <?php
        //$start = 0;
        foreach ($ticket_data as $key => $ticket) {
            ?>
            <tr>
                <td><input type="checkbox" id="chk_approval[]" name="chk_approval[]" value="<?php echo ($ticket->ticket_approval_id); ?>"></td>
                <td><?php echo ($key+1); ?></td>
                <td><?php echo $ticket->travel_date ?></td>
                <td><?php echo $ticket->cust_name ?></td> 
                <td><?php echo anchor(site_url('ticket/read/' . $ticket->ticket_id), $ticket->number) ?></td>
                <td><?php echo $ticket->ticket_created ?></td> 
                <td><?php echo anchor(site_url('ticket/read/' . $ticket->ticket_id), $ticket->subject) ?></td>
                <td><?php echo $ticket->nature_call ?></td>
                <td><?php echo $ticket->ticket_transport_created ?></td>
                <td><?php echo $ticket->ticket_transport_created ?></td>
                <td><?php echo $ticket->transport_mode ?></td>
                <td><?php echo $ticket->travel_start ?></td>
                <td><?php echo $ticket->travel_destination ?></td>
                <td><?php echo $ticket->total_kms ?></td>
                <td><?php echo $ticket->total ?></td>
                <td><?php echo $ticket->approval_state ?></td>
                <td><?php echo $ticket->staff_name ?></td>
                <td><?php echo $ticket->dept_name ?></td>
                <td><?php echo $ticket->dept_name ?></td>

                <!--<td style="text-align:center" width="200px">
                    <?php
                    //echo anchor(site_url('ticket/ticket_approval/' . $ticket->ticket_approval_id), '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Approve</button>');
                    //echo ' | ';
                    //echo anchor(site_url('ticket/ticket_approval/' . $ticket->ticket_id), 'Reject');
                    ?>
                </td>-->
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
</form>    
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $("#mytable").dataTable();
    });
    
    $("#checkAll").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });
    
    var form1 = $('#frm_approvals');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);
            
            $('#lbl_approval_error').html('');

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    sel_status: {
                        required: true
                    }
                },
                invalidHandler: function(event, validator) { //display error alert on form submit              

                    var errors = validator.numberOfInvalids();
                    if (errors) {
                        validator.errorList[0].element.focus();
                    }
                },
                highlight: function(element) { // hightlight error inputs
                    $(element)
                            .closest('.form-group').addClass('has-error'); // set error class to the control group
                },
                unhighlight: function(element) { // revert the change done by hightlight
                    $(element)
                            .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },
                success: function(label) {
                    label
                            .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },
                submitHandler: function(form) {

                    var error_span = "";
                    var error_count = 0;
                    
                    var approvals = $("[name='chk_approval[]']:checked").length;
                    
                    //alert('approvals '+approvals);
                    
                    if (approvals == 0) {

                        error_count++;

                    }
                    
                    if (error_count > 0) {
                        error_span = '<span class="text-danger">Please check atleast 1 checkbox.</span>';
                        $('#lbl_approval_error').html(error_span);
                    }
                    else if (error_count == 0) {
                        $('#lbl_approval_error').html('');
                        form.submit();
                    }
                    

                }
            });
</script>







<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Small Modal</button>






<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ticket #<?php echo $ticket->number . ' : ' . $ticket->subject; ?></h4>
            </div>
            <div class="modal-body">

                <table>
                    <tr><th>Ticket Status</th><td> <?php echo $ticket->cust_name; ?></td></tr>
                    <tr><th>Ticket Created</th><td><?php echo $ticket->ticket_created; ?></td></tr>
                    <tr><th>Due Date:</th><td></td></tr>
                    <hr />
                    <tr><th>Assigned To</th><td></td></tr>
                    <tr><th>From</th><td><?php echo $ticket->cust_name; ?></td></tr>
                    <tr><th>Department</th><td><?php echo $ticket->cust_name; ?></td></tr>
                    <tr><th>Ticket Types</th><td><?php echo $ticket->cust_name; ?></td></tr>
                    <hr />
                    <tr><th></th><td></td></tr>


                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
