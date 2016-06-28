<?php if (isset($error)): ?>
    <div class="alert alert-error"><?php echo $error; ?></div>
<?php endif; ?>
<?php if ($this->session->flashdata('message') == TRUE): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
<?php endif; ?>

<?php
$attributes = array('name' => 'customer_upload_submit', 'id' => 'customer_upload_submit', 'enctype' => 'multipart/form-data');
echo form_open('customer/customer_upload_submit', $attributes);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="xcrud-list table table-striped table-hover table-bordered">

    <tr>
        <td><h2>Customer Upload</h2></td>
    </tr>	
    <tr >
        <td height="35" align="center" valign="middle">Upload File</td>
        <td height="25" valign="middle">
            <input type="file" name="userfile" id="userfile" size="20" class="btn btn-default"/>
        </td>
    </tr>

    <tr >
        <td height="25" colspan="2" align="center" valign="middle" style="text-align:center;"><span >
                <input type="submit" id="btn_upload"  name="btn_upload" value="Submit" class="btn btn-primary"/>
            </span></td>
    </tr>

</table>

<?php form_close(); ?>	      
