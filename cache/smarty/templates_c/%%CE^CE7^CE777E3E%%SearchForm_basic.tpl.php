<?php /* Smarty version 2.6.11, created on 2017-02-07 13:22:07
         compiled from cache/modules/Contracts/SearchForm_basic.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'cache/modules/Contracts/SearchForm_basic.tpl', 33, false),array('function', 'math', 'cache/modules/Contracts/SearchForm_basic.tpl', 34, false),array('function', 'sugar_translate', 'cache/modules/Contracts/SearchForm_basic.tpl', 43, false),array('function', 'sugar_getimage', 'cache/modules/Contracts/SearchForm_basic.tpl', 116, false),array('function', 'sugar_getimagepath', 'cache/modules/Contracts/SearchForm_basic.tpl', 134, false),array('modifier', 'count', 'cache/modules/Contracts/SearchForm_basic.tpl', 121, false),)), $this); ?>

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
      
      
		
		<?php if ($this->_tpl_vars['fields']['name_basic']['acl'] > 0): ?>
		<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='1%' >
			<label for='name_basic'> <?php echo smarty_function_sugar_translate(array('label' => 'LBL_CONTRACT_NAME','module' => 'Contracts'), $this);?>

		</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<?php if (strlen ( $this->_tpl_vars['fields']['name_basic']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['name_basic']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['name_basic']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['name_basic']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['name_basic']['name']; ?>
' size='30' 
    maxlength='255' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      accesskey='9'  >
   						<?php endif; ?>
		   	</td>
    
      
		
		<?php if ($this->_tpl_vars['fields']['contract_id_basic']['acl'] > 0): ?>
		<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='contract_id_basic' ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_CONTRACT_ID','module' => 'Contracts'), $this);?>
</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<?php if (strlen ( $this->_tpl_vars['fields']['contract_id_basic']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['contract_id_basic']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['contract_id_basic']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['contract_id_basic']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['contract_id_basic']['name']; ?>
' size='30' 
    maxlength='100' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      >
   						<?php endif; ?>
		   	</td>
    
      
		
		<?php if ($this->_tpl_vars['fields']['team_name_basic']['acl'] > 0): ?>
		<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='team_name_basic' ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_TEAM','module' => 'Contracts'), $this);?>
</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<input type="text" name="<?php echo $this->_tpl_vars['fields']['team_name_basic']['name']; ?>
"  class="sqsEnabled"   id="<?php echo $this->_tpl_vars['fields']['team_name_basic']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['team_name_basic']['value']; ?>
" title='' autocomplete="off"  >
<input type="hidden"  id="<?php echo $this->_tpl_vars['fields']['team_id_basic']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['team_id_basic']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['team_name_basic']['name']; ?>
"   title="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_TITLE']; ?>
" class="button firstChild" value="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_LABEL']; ?>
" onclick='open_popup("<?php echo $this->_tpl_vars['fields']['team_name_basic']['module']; ?>
", 600, 400, "", true, false, <?php echo '{"call_back_function":"set_return","form_name":"search_form","field_to_name_array":{"id":"team_id_basic","name":"team_name_basic"}}'; ?>
, "single", true);'><?php echo smarty_function_sugar_getimage(array('alt' => $this->_tpl_vars['app_strings']['LBL_ID_FF_SELECT'],'name' => "id-ff-select",'ext' => ".png",'other_attributes' => ''), $this);?>
</button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['team_name_basic']['name']; ?>
"   title="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_TITLE']; ?>
" class="button lastChild" onclick="this.form.<?php echo $this->_tpl_vars['fields']['team_name_basic']['name']; ?>
.value = ''; this.form.<?php echo $this->_tpl_vars['fields']['team_id_basic']['name']; ?>
.value = '';" value="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_LABEL']; ?>
"><?php echo smarty_function_sugar_getimage(array('name' => "id-ff-clear",'alt' => $this->_tpl_vars['app_strings']['LBL_ID_FF_CLEAR'],'ext' => ".png",'other_attributes' => ''), $this);?>
</button>
</span>

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
</table><?php echo '<script language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'search_form_modified_by_name_basic\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["modified_by_name_basic","modified_user_id_basic"],"required_list":["modified_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_created_by_name_basic\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["created_by_name_basic","created_by_basic"],"required_list":["created_by"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_assigned_user_name_basic\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name_basic","assigned_user_id_basic"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_team_name_basic\']={"form":"search_form","method":"query","modules":["Teams"],"group":"or","field_list":["name","id"],"populate_list":["team_name_basic","team_id_basic"],"required_list":["team_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""},{"name":"name","op":"like_custom","begin":"(","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_opportunity_name_basic\']={"form":"search_form","method":"query","modules":["Opportunities"],"group":"or","field_list":["name","id"],"populate_list":["opportunity_name_basic","opportunity_id_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_account_name_basic\']={"form":"search_form","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["search_form_account_name_basic","account_id_basic"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["account_id"],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_type_name_basic\']={"form":"search_form","method":"query","modules":["ContractTypes"],"group":"or","field_list":["name","id"],"populate_list":["type_name_basic","type_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_from_contract_name_basic\']={"form":"search_form","method":"query","modules":["Contracts"],"group":"or","field_list":["name","id"],"populate_list":["from_contract_name_basic","from_contract_id_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_drop_student_name_basic\']={"form":"search_form","method":"get_contact_array","modules":["Contacts"],"field_list":["salutation","last_name","first_name","id"],"populate_list":["drop_student_name_basic","drop_student_id_basic","drop_student_id_basic","drop_student_id_basic"],"required_list":["drop_student_id"],"group":"or","conditions":[{"name":"last_name","op":"like_custom","end":"%","value":""},{"name":"first_name","op":"like_custom","end":"%","value":""}],"order":"last_name","limit":"30","no_match_text":"No Match"};</script>'; ?>