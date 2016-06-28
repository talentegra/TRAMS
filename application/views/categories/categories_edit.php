<div role="main" class="right_col" style="min-height: 3687px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Categories</h3>
            </div>

        </div>

	<div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">
                        <br>
<form id="frm_edit" class="form-horizontal form-label-left" data-parsley-validate="" action="<?php echo $action; ?>" method="post">
<input type="hidden"  name="category_id" name="category_id" value="<?php echo $category_id; ?>" />
	    <div class=" form-group">
					 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Parent Id</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12" name="parent_id" id="parent_id" placeholder="Parent Id" value="<?php echo $parent_id; ?>" >
					<option value="">--select--</option>
					<?php
						if ($category_list) {
							foreach ($category_list as $category_data) {
								if($category_data->category_id == $category_id){
									continue;
								}
								if($parent_id == $category_data->category_id) {
									$selected = "selected";
								}
								else
								{
									$selected = "";
								}
								echo '<option value="'.$category_data->category_id.'"'.$selected.'>'.$category_data->category_name."</option>";  
							}
						}
						?>
					</select>
					<?php echo form_error('parent_id') ?>
				</div>
				</div>
	    <div class=" form-group">
			 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Category Name</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="category_name" id="category_name" placeholder="Category Name" value="<?php echo $category_name; ?>" />
			<?php echo form_error('category_name') ?>
		</div>
		</div>
	
	 <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('categories/'); ?>';">Cancel</button>

                                </div>
                            </div>
			</form>
					</div>
				</div> 
			</div>
		</div> 
	</div>
</div>
<script type="text/javascript">

var form2 = $('#frm_edit');
        var error1 = $('.alert-danger', form2);
        var success1 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
	        category_name: {
	             required: true,
				 remote: {
											url: "<?php echo base_url(); ?>Categories/check_exist",
											type: "post",
											data: {
											  val: function() {
												return $( "#category_name" ).val();
											  },
											  col : 'category_name',
											  id : "<?php echo $category_id; ?>"
											}
										  }
	        },
	        },
			messages: {
				category_name:{
                remote: "Already taken! Try another."
            }
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