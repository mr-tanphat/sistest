
{if !isset($templateMeta.maxColumnsBasic)}
	{assign var="basicMaxColumns" value=$templateMeta.maxColumns}
{else}
    {assign var="basicMaxColumns" value=$templateMeta.maxColumnsBasic}
{/if}
<script>
{literal}
	$(function() {
	var $dialog = $('<div></div>')
		.html(SUGAR.language.get('app_strings', 'LBL_SEARCH_HELP_TEXT'))
		.dialog({
			autoOpen: false,
			title: SUGAR.language.get('app_strings', 'LBL_HELP'),
			width: 700
		});
		
		$('#filterHelp').click(function() {
		$dialog.dialog('open');
		// prevent the default action, e.g., following a link
	});
	
	});
{/literal}
</script>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
      
      
		
		{if $fields.name_basic.acl > 0}
		{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
			<label for='name_basic'> {sugar_translate label='LBL_NAME' module='J_Gradebook'}
		</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{if strlen($fields.name_basic.value) <= 0}
{assign var="value" value=$fields.name_basic.default_value }
{else}
{assign var="value" value=$fields.name_basic.value }
{/if}  
<input type='text' name='{$fields.name_basic.name}' 
    id='{$fields.name_basic.name}' size='30' 
    maxlength='255' 
    value='{$value}' title=''      accesskey='9'  >
   						{/if}
		   	</td>
    
      
		
		{if $fields.j_class_j_gradebook_1_name_basic.acl > 0}
		{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='j_class_j_gradebook_1_name_basic' >{sugar_translate label='LBL_J_CLASS_J_GRADEBOOK_1_FROM_J_CLASS_TITLE' module='J_Gradebook'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<input type="text" name="{$fields.j_class_j_gradebook_1_name_basic.name}"  class="sqsEnabled"   id="{$fields.j_class_j_gradebook_1_name_basic.name}" size="" value="{$fields.j_class_j_gradebook_1_name_basic.value}" title='' autocomplete="off"  >
<input type="hidden"  id="{$fields.j_class_j_gradebook_1j_class_ida_basic.name}" value="{$fields.j_class_j_gradebook_1j_class_ida_basic.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.j_class_j_gradebook_1_name_basic.name}"   title="{$APP.LBL_SELECT_BUTTON_TITLE}" class="button firstChild" value="{$APP.LBL_SELECT_BUTTON_LABEL}" onclick='open_popup("{$fields.j_class_j_gradebook_1_name_basic.module}", 600, 400, "", true, false, {literal}{"call_back_function":"set_return","form_name":"search_form","field_to_name_array":{"id":"j_class_j_gradebook_1j_class_ida_basic","name":"j_class_j_gradebook_1_name_basic"}}{/literal}, "single", true);'>{sugar_getimage alt=$app_strings.LBL_ID_FF_SELECT name="id-ff-select" ext=".png" other_attributes=''}</button><button type="button" name="btn_clr_{$fields.j_class_j_gradebook_1_name_basic.name}"   title="{$APP.LBL_CLEAR_BUTTON_TITLE}" class="button lastChild" onclick="this.form.{$fields.j_class_j_gradebook_1_name_basic.name}.value = ''; this.form.{$fields.j_class_j_gradebook_1j_class_ida_basic.name}.value = '';" value="{$APP.LBL_CLEAR_BUTTON_LABEL}">{sugar_getimage name="id-ff-clear" alt=$app_strings.LBL_ID_FF_CLEAR ext=".png" other_attributes=''}</button>
</span>

   						{/if}
		   	</td>
    
      
		
		{if $fields.team_name_basic.acl > 0}
		{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='team_name_basic' >{sugar_translate label='LBL_TEAM' module='J_Gradebook'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<input type="text" name="{$fields.team_name_basic.name}"  class="sqsEnabled"   id="{$fields.team_name_basic.name}" size="" value="{$fields.team_name_basic.value}" title='' autocomplete="off"  >
<input type="hidden"  id="{$fields.team_id_basic.name}" value="{$fields.team_id_basic.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.team_name_basic.name}"   title="{$APP.LBL_SELECT_BUTTON_TITLE}" class="button firstChild" value="{$APP.LBL_SELECT_BUTTON_LABEL}" onclick='open_popup("{$fields.team_name_basic.module}", 600, 400, "", true, false, {literal}{"call_back_function":"set_return","form_name":"search_form","field_to_name_array":{"id":"team_id_basic","name":"team_name_basic"}}{/literal}, "single", true);'>{sugar_getimage alt=$app_strings.LBL_ID_FF_SELECT name="id-ff-select" ext=".png" other_attributes=''}</button><button type="button" name="btn_clr_{$fields.team_name_basic.name}"   title="{$APP.LBL_CLEAR_BUTTON_TITLE}" class="button lastChild" onclick="this.form.{$fields.team_name_basic.name}.value = ''; this.form.{$fields.team_id_basic.name}.value = '';" value="{$APP.LBL_CLEAR_BUTTON_LABEL}">{sugar_getimage name="id-ff-clear" alt=$app_strings.LBL_ID_FF_CLEAR ext=".png" other_attributes=''}</button>
</span>

   						{/if}
		   	</td>
    {if $formData|@count >= $basicMaxColumns+1}
    </tr>
    <tr>
	<td colspan="{$searchTableColumnCount}">
    {else}
	<td class="sumbitButtons">
    {/if}
        <input tabindex="2" title="{$APP.LBL_SEARCH_BUTTON_TITLE}" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="{$APP.LBL_SEARCH_BUTTON_LABEL}" id="search_form_submit"/>&nbsp;
	    <input tabindex='2' title='{$APP.LBL_CLEAR_BUTTON_TITLE}' onclick='SUGAR.searchForm.clear_form(this.form); return false;' class='button' type='button' name='clear' id='search_form_clear' value='{$APP.LBL_CLEAR_BUTTON_LABEL}'/>
        {if $HAS_ADVANCED_SEARCH}
	    &nbsp;&nbsp;<a id="advanced_search_link" onclick="SUGAR.searchForm.searchFormSelect('{$module}|advanced_search','{$module}|basic_search')" href="javascript:void(0);" accesskey="{$APP.LBL_ADV_SEARCH_LNK_KEY}" >{$APP.LNK_ADVANCED_SEARCH}</a>
	    {/if}
    </td>
	<td class="helpIcon" width="*"><img alt="Help" border='0' id="filterHelp" src='{sugar_getimagepath file="help-dashlet.gif"}'></td>
	</tr>
</table>{literal}<script language="javascript">if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['search_form_modified_by_name_basic']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["modified_by_name_basic","modified_user_id_basic"],"required_list":["modified_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_created_by_name_basic']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["created_by_name_basic","created_by_basic"],"required_list":["created_by"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_team_name_basic']={"form":"search_form","method":"query","modules":["Teams"],"group":"or","field_list":["name","id"],"populate_list":["team_name_basic","team_id_basic"],"required_list":["team_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""},{"name":"name","op":"like_custom","begin":"(","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['search_form_assigned_user_name_basic']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name_basic","assigned_user_id_basic"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_j_class_j_gradebook_1_name_basic']={"form":"search_form","method":"query","modules":["J_Class"],"group":"or","field_list":["name","id"],"populate_list":["j_class_j_gradebook_1_name_basic","j_class_j_gradebook_1j_class_ida_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['search_form_c_teachers_j_gradebook_1_name_basic']={"form":"search_form","method":"query","modules":["C_Teachers"],"group":"or","field_list":["name","id"],"populate_list":["c_teachers_j_gradebook_1_name_basic","c_teachers_j_gradebook_1c_teachers_ida_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};</script>{/literal}