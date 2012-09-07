<?php
$user = get_userdata( $current_user->ID );
$name = isset( $user->first_name ) && $user->first_name? $user->first_name : $user->display_name;
?>

<div id="postbox" class="well" style="margin-top:50px;">
	<form id="new_post" name="new_post" method="post" action="<?php bloginfo( 'url' ); ?>/" >
		<input type="hidden" name="action" value="post" />
        <input type="hidden" name="notification_usersid" id="notification_usersid" value="" />
		<?php wp_nonce_field( 'new-post' ); ?>
			<div class="inputarea">
			<div>
				

				<textarea placeholder="Updates, Status, Questions, Links Here" name="posttext" id="posttext" tabindex="1" rows="3" cols="60"></textarea>
			</div>
            
            
            
          <?php
          if(get_option('post_notification') || get_option('post_attachment'))
		  {
		  ?>
            <p class="show"><a href="javascript:void(0);" onclick="ReverseDisplay('show_options');" id="show_hide_options_id"> + Upload Files</a></p>
           <?php }?>
           <div id="show_options" style="display:none;">
            <?php
            if(get_option('post_attachment'))
			{
			?>
            <div class="row">
            	A file at a time.
            	<input type="hidden" name="attachmentfile" id="attachmentfile" />
                 <div id="attachmentfile1_div" style="width:60%; float:left; margin-top:-7px;" >
                  <iframe name="mktlogoframe" id="upload_target" class="well" style="border: none; width:100%; height: 70px;padding:10px;margin:10px;" scrolling="no" src="<?php echo bloginfo('template_url');?>/upload/index.php?img=attachmentfile&nonce=mktnonce" ></iframe></div>
            <ul class="file_list alert alert-info" id="attachmentfile_p_id"> 
             </ul>
            </div>
            <?php }?>

            </div>
            
            
            
            
<label class="post-error" for="posttext" id="posttext_error"></label>  
			<div class="postrow">
				<input type="text" name="tags" id="tags" tabindex="2" autocomplete="off" value="<?php echo attribute_escape(__('Tag it', 'p2')); ?>"
					onfocus="this.value=(this.value=='<?php echo js_escape(__('Tag it', 'p2')); ?>') ? '' : this.value;"
					onblur="this.value=(this.value=='') ? '<?php echo js_escape(__('Tag it', 'p2')); ?>' : this.value;" />
				<input id="submit" type="submit" tabindex="3" value="<?php echo attribute_escape(__('Post it', 'p2')); ?>" onclick="recordAction();" />
			</div>
            <span class="progress" id="ajaxActivity"><img src="<?php bloginfo('template_directory'); ?>/i/indicator.gif"
				alt="<?php echo attribute_escape(__('Loading...', 'p2')); ?>" title='<?php echo attribute_escape(__('Loading...', 'p2')); ?>'/></span>
		</div>
		<div class="clear"></div>
	</form>
</div> <!-- // postbox -->
<script language="javascript">
function remove_attachment(li_id)
{
	var attachment_files = document.getElementById('attachmentfile').value;
	var my_array=attachment_files.split(",");
	var file_string = '';
	for(i=0;i<my_array.length;i++)
	{
		if(i!=li_id)
		{
			if(file_string=='')
			{
				file_string = my_array[i];
			}else
			{
				file_string = file_string + ',' + my_array[i];
			}
		}
	}
	document.getElementById('attachmentfile').value = file_string;
	document.getElementById('li_'+li_id).innerHTML = '';
}
</script>
<script type="text/javascript" language="JavaScript">
function HideContent(d) {
document.getElementById(d).style.display = "none";
}
function ShowContent(d) {
document.getElementById(d).style.display = "block";
}
function ReverseDisplay(d) {
	if(document.getElementById(d).style.display == "none") 
	{ 
		document.getElementById(d).style.display = "block"; 
		document.getElementById('show_hide_options_id').innerHTML = "&minus; Hide Upload Options";
	}
	else 
	{
		document.getElementById(d).style.display = "none";
		document.getElementById('show_hide_options_id').innerHTML = "+ Upload Files";	
	}
}

	function checkAll(field)
	{
	for (i = 0; i < field.length; i++)
		field[i].checked = true ;
	}
	
	function uncheckAll(field)
	{
	for (i = 0; i < field.length; i++)
		field[i].checked = false ;
	}
	
	function selectCheckBox()
	{
		field = document.getElementsByName('list[]');
		var i;
		ch	= document.getElementById('check');
		if(ch.checked)
		{
			checkAll(field);
		}
		else
		{
			uncheckAll(field);
		}
	}
	
	function recordAction()
	{
		
		document.getElementById('notification_usersid').value = '';
		var chklength = document.getElementsByName("list[]").length;
		var flag      = false;
		var temp	  ='';
		var useridstr = '';
		for(i=1;i<=chklength;i++)
		{
		   temp = document.getElementById("check_"+i+"").checked; 
		   if(temp == true)
		   {
		   		flag = true;
				useridstr = useridstr+","+document.getElementById("check_"+i+"").value;
			}
		}
		document.getElementById('notification_usersid').value = useridstr.substring(1);
		field = document.getElementsByName('list[]');
		uncheckAll(field);
	}
 
</script>