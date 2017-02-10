
<script>
{literal}
	$(function() {
	var $dialog = $('<div></div>')
		.html(SUGAR.language.get('app_strings', 'LBL_SEARCH_HELP_TEXT'))
		.dialog({
			autoOpen: false,
			title: SUGAR.language.get('app_strings', 'LBL_SEARCH_HELP_TITLE'),
			width: 700
		});
		
		$('.help-search').click(function() {
		$dialog.dialog('open');
		// prevent the default action, e.g., following a link
	});
	
	});
{/literal}
</script>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
      
      
	
		
		{if $fields.name_advanced.acl > 0}
		{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$templateMeta.maxColumns
          assign=modVal
    }
	{if ($index % $templateMeta.maxColumns == 1 && $index != 1)}
        {if $isHelperShown==0}
            {assign var="isHelperShown" value="1"}
            <td class="helpIcon" width="*">
                <img alt="{$APP.LBL_SEARCH_HELP_TITLE}" id="helper_popup_image" border="0" src='{sugar_getimagepath file="help-dashlet.gif"}' class="help-search">
            </td>
        {else}
            <td>&nbsp;</td>
        {/if}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='8.3333333333333%' >
			<label for='name_advanced'>{sugar_translate label='LBL_NAME' module='bc_survey'}</label>
		</td>
	<td  nowrap="nowrap" width='25%'>
			
{if strlen($fields.name_advanced.value) <= 0}
{assign var="value" value=$fields.name_advanced.default_value }
{else}
{assign var="value" value=$fields.name_advanced.value }
{/if}  
<input type='text' name='{$fields.name_advanced.name}' 
    id='{$fields.name_advanced.name}' size='30' 
    maxlength='255' 
    value='{$value}' title=''      accesskey='9'  >
   	   	</td>
					{/if}
		    
      
	
		
		{if $fields.bc_survey_bc_survey_template_name_advanced.acl > 0}
		{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$templateMeta.maxColumns
          assign=modVal
    }
	{if ($index % $templateMeta.maxColumns == 1 && $index != 1)}
        {if $isHelperShown==0}
            {assign var="isHelperShown" value="1"}
            <td class="helpIcon" width="*">
                <img alt="{$APP.LBL_SEARCH_HELP_TITLE}" id="helper_popup_image" border="0" src='{sugar_getimagepath file="help-dashlet.gif"}' class="help-search">
            </td>
        {else}
            <td>&nbsp;</td>
        {/if}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='8.3333333333333%' >
		
		<label for='bc_survey_bc_survey_template_name_advanced'>{sugar_translate label='LBL_BC_SURVEY_BC_SURVEY_TEMPLATE_FROM_BC_SURVEY_TEMPLATE_TITLE' module='bc_survey'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
<input type="text" name="{$fields.bc_survey_bc_survey_template_name_advanced.name}"  class="sqsEnabled"   id="{$fields.bc_survey_bc_survey_template_name_advanced.name}" size="" value="{$fields.bc_survey_bc_survey_template_name_advanced.value}" title='' autocomplete="off"  >
<input type="hidden"  id="{$fields.bc_survey_bc_survey_templatebc_survey_template_ida_advanced.name}" value="{$fields.bc_survey_bc_survey_templatebc_survey_template_ida_advanced.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.bc_survey_bc_survey_template_name_advanced.name}"   title="{$APP.LBL_SELECT_BUTTON_TITLE}" class="button firstChild" value="{$APP.LBL_SELECT_BUTTON_LABEL}" onclick='open_popup("{$fields.bc_survey_bc_survey_template_name_advanced.module}", 600, 400, "", true, false, {literal}{"call_back_function":"set_return","form_name":"search_form","field_to_name_array":{"id":"bc_survey_bc_survey_templatebc_survey_template_ida_advanced","name":"bc_survey_bc_survey_template_name_advanced"}}{/literal}, "single", true);'>{sugar_getimage alt=$app_strings.LBL_ID_FF_SELECT name="id-ff-select" ext=".png" other_attributes=''}</button><button type="button" name="btn_clr_{$fields.bc_survey_bc_survey_template_name_advanced.name}"   title="{$APP.LBL_CLEAR_BUTTON_TITLE}" class="button lastChild" onclick="this.form.{$fields.bc_survey_bc_survey_template_name_advanced.name}.value = ''; this.form.{$fields.bc_survey_bc_survey_templatebc_survey_template_ida_advanced.name}.value = '';" value="{$APP.LBL_CLEAR_BUTTON_LABEL}">{sugar_getimage name="id-ff-clear" alt=$app_strings.LBL_ID_FF_CLEAR ext=".png" other_attributes=''}</button>
</span>

   	   	</td>
					{/if}
		    
      
	
		
		{if $fields.start_date_advanced.acl > 0}
		{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$templateMeta.maxColumns
          assign=modVal
    }
	{if ($index % $templateMeta.maxColumns == 1 && $index != 1)}
        {if $isHelperShown==0}
            {assign var="isHelperShown" value="1"}
            <td class="helpIcon" width="*">
                <img alt="{$APP.LBL_SEARCH_HELP_TITLE}" id="helper_popup_image" border="0" src='{sugar_getimagepath file="help-dashlet.gif"}' class="help-search">
            </td>
        {else}
            <td>&nbsp;</td>
        {/if}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='8.3333333333333%' >
		
		<label for='start_date_advanced'>{sugar_translate label='LBL_START_DATE' module='bc_survey'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
<table border="0" cellpadding="0" cellspacing="0">
<tr valign="middle">
<td nowrap>
<input autocomplete="off" type="text" id="{$fields.start_date_advanced.name}_date" value="{$fields[$fields.start_date_advanced.name].value}" size="11" maxlength="10" title=''   onblur="combo_{$fields.start_date_advanced.name}.update(); ">
{capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="{$fields.start_date_advanced.name}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}&nbsp;
</td>
<td nowrap>
<div id="{$fields.start_date_advanced.name}_time_section"></div>
</td>
</tr>
</table>
<input type="hidden" id="{$fields.start_date_advanced.name}" name="{$fields.start_date_advanced.name}" value="{$fields[$fields.start_date_advanced.name].value}">
<script type="text/javascript" src="{sugar_getjspath file='include/SugarFields/Fields/Datetimecombo/Datetimecombo.js'}"></script>
<script type="text/javascript">
var combo_{$fields.start_date_advanced.name} = new Datetimecombo("{$fields[$fields.start_date_advanced.name].value}", "{$fields.start_date_advanced.name}", "{$TIME_FORMAT}", "", '', '{$fields[$fields.start_date_advanced.name_flag].value}', true);
//Render the remaining widget fields
text = combo_{$fields.start_date_advanced.name}.html('');
document.getElementById('{$fields.start_date_advanced.name}_time_section').innerHTML = text;

//Call eval on the update function to handle updates to calendar picker object
eval(combo_{$fields.start_date_advanced.name}.jsscript(''));
</script>

<script type="text/javascript">
function update_{$fields.start_date_advanced.name}_available() {ldelim}
      YAHOO.util.Event.onAvailable("{$fields.start_date_advanced.name}_date", this.handleOnAvailable, this);
{rdelim}

update_{$fields.start_date_advanced.name}_available.prototype.handleOnAvailable = function(me) {ldelim}
	Calendar.setup ({ldelim}
	onClose : update_{$fields.start_date_advanced.name},
	inputField : "{$fields.start_date_advanced.name}_date",
	ifFormat : "{$CALENDAR_FORMAT}",
	daFormat : "{$CALENDAR_FORMAT}",
	button : "{$fields.start_date_advanced.name}_trigger",
	singleClick : true,
	step : 1,
        startWeekday: {$CALENDAR_FDOW|default:'0'},
	weekNumbers:false
	{rdelim});

	//Call update for first time to round hours and minute values
	combo_{$fields.start_date_advanced.name}.update(false);
{rdelim}

var obj_{$fields.start_date_advanced.name} = new update_{$fields.start_date_advanced.name}_available();
</script>
   	   	</td>
					{/if}
		    
      
	
		
		{if $fields.end_date_advanced.acl > 0}
		{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$templateMeta.maxColumns
          assign=modVal
    }
	{if ($index % $templateMeta.maxColumns == 1 && $index != 1)}
        {if $isHelperShown==0}
            {assign var="isHelperShown" value="1"}
            <td class="helpIcon" width="*">
                <img alt="{$APP.LBL_SEARCH_HELP_TITLE}" id="helper_popup_image" border="0" src='{sugar_getimagepath file="help-dashlet.gif"}' class="help-search">
            </td>
        {else}
            <td>&nbsp;</td>
        {/if}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='8.3333333333333%' >
		
		<label for='end_date_advanced'>{sugar_translate label='LBL_END_DATE' module='bc_survey'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
<table border="0" cellpadding="0" cellspacing="0">
<tr valign="middle">
<td nowrap>
<input autocomplete="off" type="text" id="{$fields.end_date_advanced.name}_date" value="{$fields[$fields.end_date_advanced.name].value}" size="11" maxlength="10" title=''   onblur="combo_{$fields.end_date_advanced.name}.update(); ">
{capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="{$fields.end_date_advanced.name}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}&nbsp;
</td>
<td nowrap>
<div id="{$fields.end_date_advanced.name}_time_section"></div>
</td>
</tr>
</table>
<input type="hidden" id="{$fields.end_date_advanced.name}" name="{$fields.end_date_advanced.name}" value="{$fields[$fields.end_date_advanced.name].value}">
<script type="text/javascript" src="{sugar_getjspath file='include/SugarFields/Fields/Datetimecombo/Datetimecombo.js'}"></script>
<script type="text/javascript">
var combo_{$fields.end_date_advanced.name} = new Datetimecombo("{$fields[$fields.end_date_advanced.name].value}", "{$fields.end_date_advanced.name}", "{$TIME_FORMAT}", "", '', '{$fields[$fields.end_date_advanced.name_flag].value}', true);
//Render the remaining widget fields
text = combo_{$fields.end_date_advanced.name}.html('');
document.getElementById('{$fields.end_date_advanced.name}_time_section').innerHTML = text;

//Call eval on the update function to handle updates to calendar picker object
eval(combo_{$fields.end_date_advanced.name}.jsscript(''));
</script>

<script type="text/javascript">
function update_{$fields.end_date_advanced.name}_available() {ldelim}
      YAHOO.util.Event.onAvailable("{$fields.end_date_advanced.name}_date", this.handleOnAvailable, this);
{rdelim}

update_{$fields.end_date_advanced.name}_available.prototype.handleOnAvailable = function(me) {ldelim}
	Calendar.setup ({ldelim}
	onClose : update_{$fields.end_date_advanced.name},
	inputField : "{$fields.end_date_advanced.name}_date",
	ifFormat : "{$CALENDAR_FORMAT}",
	daFormat : "{$CALENDAR_FORMAT}",
	button : "{$fields.end_date_advanced.name}_trigger",
	singleClick : true,
	step : 1,
        startWeekday: {$CALENDAR_FDOW|default:'0'},
	weekNumbers:false
	{rdelim});

	//Call update for first time to round hours and minute values
	combo_{$fields.end_date_advanced.name}.update(false);
{rdelim}

var obj_{$fields.end_date_advanced.name} = new update_{$fields.end_date_advanced.name}_available();
</script>
   	   	</td>
					{/if}
		    
      
	
		
		{if $fields.assigned_user_id_advanced.acl > 0}
		{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$templateMeta.maxColumns
          assign=modVal
    }
	{if ($index % $templateMeta.maxColumns == 1 && $index != 1)}
        {if $isHelperShown==0}
            {assign var="isHelperShown" value="1"}
            <td class="helpIcon" width="*">
                <img alt="{$APP.LBL_SEARCH_HELP_TITLE}" id="helper_popup_image" border="0" src='{sugar_getimagepath file="help-dashlet.gif"}' class="help-search">
            </td>
        {else}
            <td>&nbsp;</td>
        {/if}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='8.3333333333333%' >
		
		<label for='assigned_user_id_advanced'>{sugar_translate label='LBL_ASSIGNED_TO' module='bc_survey'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
{html_options id='assigned_user_id_advanced' name='assigned_user_id_advanced[]' options=$fields.assigned_user_id_advanced.options size="6" style="width: 150px" multiple="1" selected=$fields.assigned_user_id_advanced.value}
   	   	</td>
					{/if}
			</tr>
<tr>
	<td colspan='20'>
		&nbsp;
	</td>
</tr>	
{if $DISPLAY_SAVED_SEARCH}
<tr>
	<td colspan='2'>
		<a class='tabFormAdvLink' onhover href='javascript:toggleInlineSearch()'>
            {capture assign="alt_show_hide"}{sugar_translate label='LBL_ALT_SHOW_OPTIONS'}{/capture}
		{sugar_getimage alt=$alt_show_hide name="advanced_search" ext=".gif" other_attributes='border="0" id="up_down_img" '}&nbsp;{$APP.LNK_SAVED_VIEWS}
		</a><br>
		<input type='hidden' id='showSSDIV' name='showSSDIV' value='{$SHOWSSDIV}'><p>
	</td>
	<td scope='row' width='10%' nowrap="nowrap">
		{sugar_translate label='LBL_SAVE_SEARCH_AS' module='SavedSearch'}:
	</td>
	<td width='30%' nowrap>
		<input type='text' name='saved_search_name'>
		<input type='hidden' name='search_module' value=''>
		<input type='hidden' name='saved_search_action' value=''>
		<input title='{$APP.LBL_SAVE_BUTTON_LABEL}' value='{$APP.LBL_SAVE_BUTTON_LABEL}' class='button' type='button' name='saved_search_submit' onclick='SUGAR.savedViews.setChooser(); return SUGAR.savedViews.saved_search_action("save");'>
	</td>
	<td scope='row' width='10%' nowrap="nowrap">
	    {sugar_translate label='LBL_MODIFY_CURRENT_SEARCH' module='SavedSearch'}:
	</td>
	<td width='30%' nowrap>
        <input class='button' onclick='SUGAR.savedViews.setChooser(); return SUGAR.savedViews.saved_search_action("update")' value='{$APP.LBL_UPDATE}' title='{$APP.LBL_UPDATE}' name='ss_update' id='ss_update' type='button' >
		<input class='button' onclick='return SUGAR.savedViews.saved_search_action("delete", "{sugar_translate label='LBL_DELETE_CONFIRM' module='SavedSearch'}")' value='{$APP.LBL_DELETE}' title='{$APP.LBL_DELETE}' name='ss_delete' id='ss_delete' type='button'>
		<br><span id='curr_search_name'></span>
	</td>
</tr>

<tr>
<td colspan='6'>
<div style='{$DISPLAYSS}' id='inlineSavedSearch' >
	{$SAVED_SEARCH}
</div>
</td>
</tr>

{/if}
{if $displayType != 'popupView'}
<tr>
	<td colspan='5'>
        <input tabindex='2' title='{$APP.LBL_SEARCH_BUTTON_TITLE}' onclick='SUGAR.savedViews.setChooser()' class='button' type='submit' name='button' value='{$APP.LBL_SEARCH_BUTTON_LABEL}' id='search_form_submit_advanced'/>&nbsp;
        <input tabindex='2' title='{$APP.LBL_CLEAR_BUTTON_TITLE}'  onclick='SUGAR.searchForm.clear_form(this.form); document.getElementById("saved_search_select").options[0].selected=true; return false;' class='button' type='button' name='clear' id='search_form_clear_advanced' value='{$APP.LBL_CLEAR_BUTTON_LABEL}'/>
        {if $DOCUMENTS_MODULE}
        &nbsp;<input title="{$APP.LBL_BROWSE_DOCUMENTS_BUTTON_TITLE}" type="button" class="button" value="{$APP.LBL_BROWSE_DOCUMENTS_BUTTON_LABEL}" onclick='open_popup("Documents", 600, 400, "&caller=Documents", true, false, "");' />
        {/if}
        <a id="basic_search_link" onclick="SUGAR.searchForm.searchFormSelect('{$module}|basic_search','{$module}|advanced_search')" href="javascript:void(0)" accesskey="{$APP.LBL_ADV_SEARCH_LNK_KEY}" >{$APP.LNK_BASIC_SEARCH}</a>
        <span class='white-space'>
            &nbsp;&nbsp;&nbsp;{if $SAVED_SEARCHES_OPTIONS}|&nbsp;&nbsp;&nbsp;<b>{$APP.LBL_SAVED_SEARCH_SHORTCUT}</b>&nbsp;
            {$SAVED_SEARCHES_OPTIONS} {/if}
            <span id='go_btn_span' style='display:none'><input tabindex='2' title='go_select' id='go_select'  onclick='SUGAR.searchForm.clear_form(this.form);' class='button' type='button' name='go_select' value=' {$APP.LBL_GO_BUTTON_LABEL} '/></span>	
        </span>
	</td>
	<td class="help">
	    {if $DISPLAY_SEARCH_HELP}
	    <img  border='0' src='{sugar_getimagepath file="help-dashlet.gif"}' class="help-search">
	    {/if}
    </td>
</tr>
{/if}
</table>

<script>
{literal}
	if(typeof(loadSSL_Scripts)=='function'){
		loadSSL_Scripts();
	}
{/literal}	
</script>{literal}<script language="javascript">if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['search_form_modified_by_name_advanced']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["modified_by_name_advanced","modified_user_id_advanced"],"required_list":["modified_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_created_by_name_advanced']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["created_by_name_advanced","created_by_advanced"],"required_list":["created_by"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_assigned_user_name_advanced']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name_advanced","assigned_user_id_advanced"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_bc_survey_bc_survey_template_name_advanced']={"form":"search_form","method":"query","modules":["bc_survey_template"],"group":"or","field_list":["name","id"],"populate_list":["bc_survey_bc_survey_template_name_advanced","bc_survey_bc_survey_templatebc_survey_template_ida_advanced"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};</script>{/literal}