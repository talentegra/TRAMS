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

                        <h2>Account_type List <small>Manage Account_type</small></h2>
                        <div style="float: right;"><a href="<?php echo base_url('account_type/create'); ?>">
                                <button class="btn btn-success" type="button">Create Account_type</button></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <input type="hidden" name="sortby" id="sortby" value="<?php echo $sort_by; ?>" />
                    <input type="hidden" name="sort_column" id="sort_column" value="<?php echo $sort_column; ?>" /> 
                    <div class="x_content" id="account_type_list"></div>

                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- /page content -->
<script type="text/javascript">
    
    $(document).ready(function() {
        load_acc_type_list(0);

        $('body').on('click', '.pagination_link', function() {
            //alert('clicked '+$(this).data('count'));
            var page = $(this).data('count');

            load_acc_type_list(page);
        });

        $('body').on('change', '#per_page', function() {

            load_acc_type_list(0);
        });
            
        $('body').on('click', '.one_field_arrange_option', function() {
                
            var sortby = $("#sortby").val();
            var sort_column = $(this).data('sortdb');
            if (sortby == "")
            {
                sortby = "DESC";
                $('#' + sort_column).prepend('<i class="icon-sort-down"></i>');
            }
            else if (sortby == "DESC")
            {
                sortby = "ASC";
                $('#' + sort_column).prepend('<i class="icon-sort-up"></i>');
            }
            else if (sortby == "ASC")
            {
                sortby = "DESC";
                $('#' + sort_column).prepend('<i class="icon-sort-down"></i>');
            }
                
            $("#sortby").val(sortby);
            $("#sort_column").val(sort_column);
                
            load_acc_type_list(0);
        });
            
            

    });
        
    function load_acc_type_list(page) {
        //alert('loaded');return false;
        $("#dataloaderimage").show();
        //$('<div></div>').prependTo('body').attr('id', 'overlay');
        var per_page = $("select#per_page option").filter(":selected").val();
        var sortby = $("#sortby").val();
        var sort_column = $("#sort_column").val();
        //var search_priority = $("#hid_priority").val();
        //var search_status = $("#hid_status").val();
        //var search_dept = $("#hid_dept_id").val();
        //var search_radio_sel = $('input:radio[name=search_by_date]:checked').val();
        //var start_date = $("#hid_start_date").val();
        //var end_date = $("#hid_end_date").val();
        //var keyword = $("#hid_keyword").val();
        //var frm_search_keyword = $("#frm_search_keyword").val();
        var dataString = "per_page=" + per_page + "&page=" + page+ "&sortby=" + sortby+ "&sort_column=" + sort_column;
        //alert(dataString);return false;
        $("#dataloaderimage").show();
        $.ajax({
            type: "POST",
            data: dataString,
            url: '<?php echo base_url(); ?>account_type/account_type_list_ajax_data/' + page, //The url where the server req would we made.

            success: function(data) {

                $('#overlay').remove();
                $("#dataloaderimage").hide();
                $("#account_type_list").html(data).fadeIn('slow');
                if(sort_column!=''){
					if(sort_column != 'account_type_id'){
                    var string = $("#"+sort_column).html();
                    if(sortby=='ASC'){
                        string = string.replace(/glyphicon-sort|glyphicon glyphicon-triangle-bottom|glyphicon glyphicon-triangle-top/gi, 'glyphicon-triangle-top');
                    }
                    else{
                        string = string.replace(/glyphicon-sort|glyphicon glyphicon-triangle-bottom|glyphicon glyphicon-triangle-top/gi, 'glyphicon-triangle-bottom');	
                    }
                    $("#"+sort_column).html(string);
				}
                    //alert(string);

                }
					
            }
        });
    }
        
    function submit_excel_form(){
        document.forms["export_ticket_excel"].submit();
    }
    $('#frm_search_keyword').keyup(function() {
        var dInput = this.value;
        if(dInput.length > 3){
            load_acc_type_list(0);
        } 
    });
</script>    
