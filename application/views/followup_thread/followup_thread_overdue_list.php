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

                        <h2>Followup List <small>Manage Followup</small></h2>
                        <!--<div style="float: right;"><a href="<?php //echo base_url('followup_thread/create'); ?>"><button class="btn btn-success" type="button">Create Followup</button></a></div>-->
                        <div class="clearfix"></div>

                    </div>
                    <div class="x_content">		




                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-md-4 text-center">
                                <div style="margin-top: 8px" id="message">
                                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                </div>
                            </div>
                            <div class="col-md-5 text-right">
                            </div>
                            <div class="col-md-3 text-right">
                                <div class="input-group">
                                    <input type="text" class="form-control"  id="q" name="q" value="<?php echo $q; ?>">
                                    <span class="input-group-btn" id="btn_grp">
                                        <?php
                                        if ($q <> '') {
                                            ?>
                                            <a href="<?php echo site_url('followup_thread'); ?>" class="btn btn-default">Reset</a>
                                            <?php
                                        }
                                        ?>
                                        <button id ="search_q" class="btn btn-primary" type="submit">Search</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="sortby" id="sortby" value="<?php echo $sort_by; ?>" />
                        <input type="hidden" name="sort_column" id="sort_column" value="<?php echo $sort_column; ?>" /> 
                        <div class="x_content" id="data_list"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="btn btn-primary">Total Record :  <span id="span_total_rec" ></span></a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
		
		<!-- modals -->
        <!-- Large modal -->
        <div aria-hidden="true" role="dialog" tabindex="-1" class="modal fade bs-example-modal-lg" id="modal_follow_up" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="frm_add_followup" name="frm_add_followup" class="form-horizontal form-label-left" data-parsley-validate="" action="<?php echo base_url('followup_thread/create_action'); ?>" method="post">
                        <input type="text" id="lead_id" name="lead_id" value="">
                        <input type="text" id="frm_page" name="frm_page" value="lead_modal">
                               
                        <div class="modal-header">
                            <button data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span>
                            </button>
                            <h4 id="myModalLabel" class="modal-title">Add Follow Up</h4>
                        </div>
                        <div class="modal-body">

                            <h4>Lead Details/Source - <span id="lead_details"></span></h4>

                            <div role="main" class="">
                                <div class="">


                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="x_panel">

                                                <div class="x_content">
                                                    <br>

                                                    <!--<div class=" form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Followup Type</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" class="form-control col-md-7 col-xs-12" name="followup_type" id="followup_type" placeholder="Followup Type" value="" />
                                                    <?php echo form_error('followup_type') ?>
                                                        </div>
                                                    </div>-->
                                                    <div class=" form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Interest Level</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <select class="form-control col-md-7 col-xs-12" name="interest_level" id="interest_level" placeholder="Interest Level">
                                                                <option value="">-Select-</option>
                                                                <?php
                                                                if ($interest_level_list) {
                                                                    foreach ($interest_level_list as $interest_data) {
                                                                        echo '<option value="' . $interest_data->interest_level_id . '">' . $interest_data->interest_level . "</option>";
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                            <?php echo form_error('interest_level') ?>
                                                        </div>
                                                    </div>
                                                    <div class=" form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="datetime">Followup Date</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" class="date-picker form-control col-md-7 col-xs-12" name="followup_date" id="followup_date" placeholder="Followup Date" value="" />
                                                            <?php echo form_error('followup_date') ?>
                                                        </div>
                                                    </div>
                                                    <div class=" form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Followup Action</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <select class="form-control col-md-7 col-xs-12" name="followup_action" id="followup_action" placeholder="Followup Action">
                                                                <option value="">-Select-</option>
                                                                <?php
                                                                if ($followup_action_list) {
                                                                    foreach ($followup_action_list as $action_data) {
                                                                        echo '<option value="' . $action_data->followup_action_id . '">' . $action_data->followup_action . "</option>";
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                            <?php echo form_error('followup_action') ?>
                                                        </div>
                                                    </div>
                                                    <div class=" form-group"> 
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="followup_comments">Followup Comments</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <textarea class="form-control col-md-7 col-xs-12" rows="3" name="followup_comments" id="followup_comments" placeholder="Followup Comments"></textarea>
                                                            <?php echo form_error('followup_comments') ?>
                                                        </div>
                                                    </div>
                                                    <div class=" form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="datetime">Next Followup Date</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" class="date-picker form-control col-md-7 col-xs-12" name="next_followup_date" id="next_followup_date" placeholder="Next Followup Date" value="" />
                                                            <?php echo form_error('next_followup_date') ?>
                                                        </div>
                                                    </div>
                                                    <div class=" form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Next Followup Action</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <select class="form-control col-md-7 col-xs-12" name="next_followup_action" id="next_followup_action" placeholder="Next Followup Action">
                                                                <option value="">-Select-</option>
                                                                <?php
                                                                if ($followup_action_list) {
                                                                    foreach ($followup_action_list as $action_data) {
                                                                        echo '<option value="' . $action_data->followup_action_id . '">' . $action_data->followup_action . "</option>";
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                            <?php echo form_error('next_followup_action') ?>
                                                        </div>
                                                    </div>
                                                    <div class=" form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Assign Staff</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <select name="staff_id" id="staff_id" class="form-control">
                                                                <option value="">select Staff</option>
                                                                <?php
                                                                foreach ($staff_data as $staff) {
                                                                    echo '<option value="' . $staff['staff_id'] . '">' . $staff['staff_name'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            <?php echo form_error('staff_id') ?>
                                                        </div>
                                                    </div>
                                                    <div class=" form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Status</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <select class="form-control col-md-7 col-xs-12" name="status" id="status" placeholder="Status">
                                                                <option value="1">Active</option>
                                                                <option value="0">Inactive</option>
                                                            </select>
                                                            <?php echo form_error('status') ?>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div> 
                                        </div>
                                    </div> 
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </div>
                    </form>   
                </div>
            </div>
        </div>
		
    </div>
</div>
<!-- /page content -->
<script type='text/javascript'>
    
    $(document).ready(function() {
        load_list(0);

        $('body').on('click', '.pagination_link', function() {
            //alert('clicked '+$(this).data('count'));
            var page = $(this).data('count');

            load_list(page);
        });

        $('body').on('change', '#per_page', function() {

            load_list(0);
        });
            
        $('body').on('click', '.one_field_arrange_option', function() {
                
            var sortby = $('#sortby').val();
            var sort_column = $(this).data('sortdb');
            if (sortby == '')
            {
                sortby = 'DESC';
                $('#' + sort_column).prepend('<i class="icon-sort-down"></i>');
            }
            else if (sortby == 'DESC')
            {
                sortby = 'ASC';
                $('#' + sort_column).prepend('<i class="icon-sort-up"></i>');
            }
            else if (sortby == 'ASC')
            {
                sortby = 'DESC';
                $('#' + sort_column).prepend('<i class="icon-sort-down"></i>');
            }
                
            $('#sortby').val(sortby);
            $('#sort_column').val(sort_column);
                
            load_list(0);
        });
            
            

    });
        
    function load_list(page) {
        $('#dataloaderimage').show();
        var per_page = $('select#per_page option').filter(':selected').val();
        var sortby = $('#sortby').val();
        var sort_column = $('#sort_column').val();
        var q = $('#q').val();
        var dataString = 'per_page=' + per_page + '&page=' + page+ '&sortby=' + sortby+ '&sort_column=' + sort_column+ '&q=' + q;
        $('#dataloaderimage').show();
        $.ajax({
            type: 'POST',
            data: dataString,
            url: '<?php echo base_url(); ?>followup_thread/list_data/' + page, //The url where the server req would we made.

            success: function(data) {

                $('#overlay').remove();
                $('#dataloaderimage').hide();
                $('#data_list').html(data).fadeIn('slow');
                $('#span_total_rec').html($('#hid_total_rows').val());
                if($('#q').val()!=''){
                    $( '#btn_grp' ).prepend( '<a id="btn_reset" href="" class="btn btn-default">Reset</a>' );
                }
                else {
                    $('#btn_reset').remove();
                }
                if(sort_column!=''){
                    if(sort_column != 'followup_thread_id'){
                        var string = $('#'+sort_column).html();
                        if(sortby=='ASC'){
                            string = string.replace(/fa-sort|fa fa-sort-desc|fa fa-sort-asc/gi, 'fa fa-sort-asc');
                        }
                        else{
                            string = string.replace(/fa-sort|fa fa-sort-desc|fa fa-sort-asc/gi, 'fa fa-sort-desc');	
                        }
                        $('#'+sort_column).html(string);
                    }
                    //alert(string);

                }
					
            }
        });
    }
    
    $('#search_q').click(function() {
        load_list(0);
    });
    $('#btn_reset').click(function() {
        load_list(0);
    });
	function follow_up(lead_id) {
        var source = $("#source_"+lead_id).text();
        var name = $("#fname_"+lead_id).text()+' '+$("#lname_"+lead_id).text();
        
        $("#lead_details").text(name+' / '+source);
        $("#lead_id").val(lead_id);
        $("#modal_follow_up").modal('show');
    }
    
    var form2 = $('#frm_add_followup');
    var error1 = $('.alert-danger', form2);
    var success1 = $('.alert-success', form2);

    form2.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            /*followup_type: {
                required: true,
            },*/
            interest_level: {
                required: true,
            },
            followup_date: {
                required: true,
            },
            followup_action: {
                required: true,
            },
            followup_comments: {
                required: true,
            },
            next_followup_date: {
                required: true,
            },
            next_followup_action: {
                required: true,
            },
            staff_id: {
                required: true,
            },
            status: {
                required: true,
            },
        },
        messages: {
        },highlight: function(element) { // hightlight error inputs
            $(element)
            .closest('.form-group').addClass('has-error'); // set error class to the control group

            $(".tab-content").find("div.tab-pane:has(div.has-error)").each(function(index, tab) {
                var id = $(tab).attr("id");
                $('a[href="#' + id + '"]').addClass('alert-danger');

            });

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
            form.submit();
              
        }
    });
</script>     

