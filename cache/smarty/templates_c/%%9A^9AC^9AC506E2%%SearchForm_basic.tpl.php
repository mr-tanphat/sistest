<?php /* Smarty version 2.6.11, created on 2017-02-07 13:20:13
         compiled from cache/modules/Contacts/SearchForm_basic.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'cache/modules/Contacts/SearchForm_basic.tpl', 33, false),array('function', 'math', 'cache/modules/Contacts/SearchForm_basic.tpl', 34, false),array('function', 'sugar_translate', 'cache/modules/Contacts/SearchForm_basic.tpl', 44, false),array('function', 'html_options', 'cache/modules/Contacts/SearchForm_basic.tpl', 146, false),array('function', 'sugar_getimagepath', 'cache/modules/Contacts/SearchForm_basic.tpl', 250, false),array('modifier', 'count', 'cache/modules/Contacts/SearchForm_basic.tpl', 237, false),)), $this); ?>

<?php if (! isset ( $this->_tpl_vars['templateMeta']['maxColumnsBasic'] )): ?>
	<?php $this->assign('basicMaxColumns', $this->_tpl_vars['templateMeta']['maxColumns']); ?>
<?php else: ?>
    <?php $this->assign('basicMaxColumns', $this->_tpl_vars['templateMeta']['maxColumnsBasic']); ?>
<?php endif; ?>
<script>
<?php echo '
	$(function() {
	var $dialog = $(\'<div></div>\')
		.html(SUGAR.language.get(\'app_strings\', \'LBL_SEARCH_HELP_TEXT\'))
		.dialog({
			autoOpen: false,
			title: SUGAR.language.get(\'app_strings\', \'LBL_HELP\'),
			width: 700
		});
		
		$(\'#filterHelp\').click(function() {
		$dialog.dialog(\'open\');
		// prevent the default action, e.g., following a link
	});
	
	});
'; ?>

</script>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
      
      
		
		<?php if ($this->_tpl_vars['fields']['contact_id_basic']['acl'] > 0): ?>
		<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='contact_id_basic' ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_CONTACT_ID','module' => 'Contacts'), $this);?>
</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<?php if (strlen ( $this->_tpl_vars['fields']['contact_id_basic']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['contact_id_basic']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['contact_id_basic']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['contact_id_basic']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['contact_id_basic']['name']; ?>
' size='30' 
    maxlength='36' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      accesskey='9'  >
   						<?php endif; ?>
		   	</td>
    
      
		
		<?php if ($this->_tpl_vars['fields']['full_student_name_basic']['acl'] > 0): ?>
		<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='full_student_name_basic' ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_FULL_NAME','module' => 'Contacts'), $this);?>
</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<?php if (strlen ( $this->_tpl_vars['fields']['full_student_name_basic']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['full_student_name_basic']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['full_student_name_basic']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['full_student_name_basic']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['full_student_name_basic']['name']; ?>
' size='30' 
    maxlength='250' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      >
   						<?php endif; ?>
		   	</td>
    
      
		
		<?php if ($this->_tpl_vars['fields']['phone_basic']['acl'] > 0): ?>
		<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='phone_basic' ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_ANY_PHONE','module' => 'Contacts'), $this);?>
</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<?php if (strlen ( $this->_tpl_vars['fields']['phone_basic']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['phone_basic']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['phone_basic']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['phone_basic']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['phone_basic']['name']; ?>
' size='30' 
     
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      >
   						<?php endif; ?>
		   	</td>
    
      
		
		<?php if ($this->_tpl_vars['fields']['contact_status_basic']['acl'] > 0): ?>
		<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='contact_status_basic' ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_CONTACT_STATUS','module' => 'Contacts'), $this);?>
</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<?php echo smarty_function_html_options(array('id' => 'contact_status_basic','name' => 'contact_status_basic[]','options' => $this->_tpl_vars['fields']['contact_status_basic']['options'],'size' => '6','style' => "width: 150px",'multiple' => '1','selected' => $this->_tpl_vars['fields']['contact_status_basic']['value']), $this);?>

   						<?php endif; ?>
		   	</td>
    
      
		
		<?php if ($this->_tpl_vars['fields']['assigned_user_id_basic']['acl'] > 0): ?>
		<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='assigned_user_id_basic' ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'Contacts'), $this);?>
</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<?php echo smarty_function_html_options(array('id' => 'assigned_user_id_basic','name' => 'assigned_user_id_basic[]','options' => $this->_tpl_vars['fields']['assigned_user_id_basic']['options'],'size' => '6','style' => "width: 150px",'multiple' => '1','selected' => $this->_tpl_vars['fields']['assigned_user_id_basic']['value']), $this);?>

   						<?php endif; ?>
		   	</td>
    
      
		
		<?php if ($this->_tpl_vars['fields']['current_user_only_basic']['acl'] > 0): ?>
		<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='current_user_only_basic' ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_CURRENT_USER_FILTER','module' => 'Contacts'), $this);?>
</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<?php if (strval ( $this->_tpl_vars['fields']['current_user_only_basic']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['current_user_only_basic']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['current_user_only_basic']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'CHECKED'); ?>
<?php else: ?>
<?php $this->assign('checked', ""); ?>
<?php endif; ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['current_user_only_basic']['name']; ?>
" value="0"> 
<input type="checkbox" id="<?php echo $this->_tpl_vars['fields']['current_user_only_basic']['name']; ?>
" 
name="<?php echo $this->_tpl_vars['fields']['current_user_only_basic']['name']; ?>
" 
value="1" title='' tabindex="" <?php echo $this->_tpl_vars['checked']; ?>
 >
   						<?php endif; ?>
		   	</td>
    
      
		
		<?php if ($this->_tpl_vars['fields']['favorites_only_basic']['acl'] > 0): ?>
		<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='favorites_only_basic' ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_FAVORITES_FILTER','module' => 'Contacts'), $this);?>
</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<?php if (strval ( $this->_tpl_vars['fields']['favorites_only_basic']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['favorites_only_basic']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['favorites_only_basic']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'CHECKED'); ?>
<?php else: ?>
<?php $this->assign('checked', ""); ?>
<?php endif; ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['favorites_only_basic']['name']; ?>
" value="0"> 
<input type="checkbox" id="<?php echo $this->_tpl_vars['fields']['favorites_only_basic']['name']; ?>
" 
name="<?php echo $this->_tpl_vars['fields']['favorites_only_basic']['name']; ?>
" 
value="1" title='' tabindex="" <?php echo $this->_tpl_vars['checked']; ?>
 >
   						<?php endif; ?>
		   	</td>
    <?php if (count($this->_tpl_vars['formData']) >= $this->_tpl_vars['basicMaxColumns']+1): ?>
    </tr>
    <tr>
	<td colspan="<?php echo $this->_tpl_vars['searchTableColumnCount']; ?>
">
    <?php else: ?>
	<td class="sumbitButtons">
    <?php endif; ?>
        <input tabindex="2" title="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_BUTTON_TITLE']; ?>
" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_BUTTON_LABEL']; ?>
" id="search_form_submit"/>&nbsp;
	    <input tabindex='2' title='<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_TITLE']; ?>
' onclick='SUGAR.searchForm.clear_form(this.form); return false;' class='button' type='button' name='clear' id='search_form_clear' value='<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_LABEL']; ?>
'/>
        <?php if ($this->_tpl_vars['HAS_ADVANCED_SEARCH']): ?>
	    &nbsp;&nbsp;<a id="advanced_search_link" onclick="SUGAR.searchForm.searchFormSelect('<?php echo $this->_tpl_vars['module']; ?>
|advanced_search','<?php echo $this->_tpl_vars['module']; ?>
|basic_search')" href="javascript:void(0);" accesskey="<?php echo $this->_tpl_vars['APP']['LBL_ADV_SEARCH_LNK_KEY']; ?>
" ><?php echo $this->_tpl_vars['APP']['LNK_ADVANCED_SEARCH']; ?>
</a>
	    <?php endif; ?>
    </td>
	<td class="helpIcon" width="*"><img alt="Help" border='0' id="filterHelp" src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
'></td>
	</tr>
</table><?php echo '<script language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'search_form_modified_by_name_basic\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["modified_by_name_basic","modified_user_id_basic"],"required_list":["modified_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_created_by_name_basic\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["created_by_name_basic","created_by_basic"],"required_list":["created_by"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_assigned_user_name_basic\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name_basic","assigned_user_id_basic"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_team_name_basic\']={"form":"search_form","method":"query","modules":["Teams"],"group":"or","field_list":["name","id"],"populate_list":["team_name_basic","team_id_basic"],"required_list":["team_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""},{"name":"name","op":"like_custom","begin":"(","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_account_name_basic\']={"form":"search_form","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["search_form_account_name_basic","account_id_basic"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["account_id"],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_report_to_name_basic\']={"form":"search_form","method":"get_contact_array","modules":["Contacts"],"field_list":["salutation","last_name","first_name","id"],"populate_list":["report_to_name_basic","reports_to_id_basic","reports_to_id_basic","reports_to_id_basic"],"required_list":["reports_to_id"],"group":"or","conditions":[{"name":"last_name","op":"like_custom","end":"%","value":""},{"name":"first_name","op":"like_custom","end":"%","value":""}],"order":"last_name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_campaign_name_basic\']={"form":"search_form","method":"query","modules":["Campaigns"],"group":"or","field_list":["name","id"],"populate_list":["campaign_id_basic","campaign_id_basic"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["campaign_id"],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_c_memberships_contacts_2_name_basic\']={"form":"search_form","method":"query","modules":["C_Memberships"],"group":"or","field_list":["name","id"],"populate_list":["c_memberships_contacts_2_name_basic","c_memberships_contacts_2c_memberships_ida_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_j_school_contacts_1_name_basic\']={"form":"search_form","method":"query","modules":["J_School"],"group":"or","field_list":["name","id"],"populate_list":["j_school_contacts_1_name_basic","j_school_contacts_1j_school_ida_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_c_contacts_contacts_1_name_basic\']={"form":"search_form","method":"query","modules":["C_Contacts"],"group":"or","field_list":["name","id"],"populate_list":["c_contacts_contacts_1_name_basic","c_contacts_contacts_1c_contacts_ida_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};</script>'; ?>