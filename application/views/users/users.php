<?php
$id = '';
  if(!empty($data['id'])){$id = $data['id']; }
//print_r(data);
$attributes = array('class' => 'frmusers', 'name' => 'frm_users' , 'id'=>"frmusers"); 
echo form_open_multipart(base_url('users/save_users/'.$id), $attributes); ?>
<!-- <php echo base_url('test');if(!isset($data['id']) && empty($data['id'])){ echo form_open_multipart(base_url('user/index');}else{ echo form_open_multipart(base_url('user/index');}?> -->
<table border=1; colspan="0"; colspace="0" width="100%">
<?php if(!empty($this->session->flashdata('message'))){ ?>
	<tr>
		<th align="center" colspan=2><?php if(!empty($this->session->flashdata('message'))){ echo $this->session->flashdata('message'); } ?></th>
	</tr>
<?php }?>	
	
	<tr>
		<th align="right" valign="top" width="20%">Name</th>
		<td>
				<input type="text" name="name" class="form_input" id="name" value="<?php if(!empty($data['name'])){echo html_escape($data['name']); }?>"/>
		</td>
	</tr>
<tr>
		<th align="right" valign="top" width="20%">Phone</th>
		<td>
				<input type="text" name="phone" class="form_input" id="phone" value="<?php if(!empty($data['phone'])){echo html_escape($data['phone']); }?>"/>
	</td>
	</tr>

<tr>
		<th align="right" valign="top" width="20%">email</th>
		<td>
				<input type="text" name="email" class="form_input" id="email" value="<?php if(!empty($data['email'])){echo html_escape($data['email']); }?>"/>
		</td>
	</tr>
	<tr>
		<th align="right" valign="top" width="20%">avatar</th>
		<td>
				<input type="file" name="avatar" class="form_input" id="avatar" accept= "image/*"/>		</td>
	</tr>

	<tr>
		<th align="right" valign="top" width="20%">General</th>
		<td>
			<select name="general" id="general">
				<option value="">Select</option>
				<option <?php if($data['general']=='male'){?> selected <?php }?> value="male">Male</option>
				<option  <?php if($data['general']=='female'){?> selected <?php }?> value="female">FeMale</option>
			</select>	
				
				<?php echo form_error('general');?>
		</td>
	</tr>
	<tr>
		<th></th>
		<td><input type="submit" class="form_button" name="btn_save" id="btn_save" value="Save"/></td>
		<div id="results"></div>
	</tr>
</table>	

<?php echo form_close();?>
<script type="text/javascript">
var files 
$('input[type=file]').on('change', prepareUpload);
	function prepareUpload(event)
{
  files = event.target.files;
  console.log(files);
}
	$("#frmusers").validate({
	rules: {
		name: "required",
		phone: "required",
		email: {
			required :true,
				email: true
		},		
		avatar: {
			required: true,
			//accept: "image/jpeg, image/pjpeg"
		}
	},	
		submitHandler: function(form) 
		{
			return true;
		},
	//return false;		
    });
		//	return false;
		/*	var data1 = $('#results').html();
    $.each(files, function(key, value)
    {
    	console.log(key);
        data1.append(key, value);
    });
			console.log(data1);
			return false;
			//var data = new FormData();
			console.log(new FormData(files));
			return false;
			$.ajax({
			url  : SITE_URL+'users/save_users',
			data :  data ,
			//
			type : 'POST',
			sucess : function(data)
			{

			},
			error : function(xhr,status,error)
			{

			}
		});
			return false;
		}
	});*/

</script>