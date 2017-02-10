
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
      
      
		
		{if $fields.contact_id_basic.acl > 0}
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
		
		<label for='contact_id_basic' >{sugar_translate label='LBL_CONTACT_ID' module='Contacts'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{if strlen($fields.contact_id_basic.value) <= 0}
{assign var="value" value=$fields.contact_id_basic.default_value }
{else}
{assign var="value" value=$fields.contact_id_basic.value }
{/if}  
<input type='text' name='{$fields.contact_id_basic.name}' 
    id='{$fields.contact_id_basic.name}' size='30' 
    maxlength='36' 
    value='{$value}' title=''      accesskey='9'  >
   						{/if}
		   	</td>
    
      
		
		{if $fields.full_student_name_basic.acl > 0}
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
		
		<label for='full_student_name_basic' >{sugar_translate label='LBL_FULL_NAME' module='Contacts'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{if strlen($fields.full_student_name_basic.value) <= 0}
{assign var="value" value=$fields.full_student_name_basic.default_value }
{else}
{assign var="value" value=$fields.full_student_name_basic.value }
{/if}  
<input type='text' name='{$fields.full_student_name_basic.name}' 
    id='{$fields.full_student_name_basic.name}' size='30' 
    maxlength='250' 
    value='{$value}' title=''      >
   						{/if}
		   	</td>
    
      
		
		{if $fields.phone_basic.acl > 0}
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
		
		<label for='phone_basic' >{sugar_translate label='LBL_ANY_PHONE' module='Contacts'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{if strlen($fields.phone_basic.value) <= 0}
{assign var="value" value=$fields.phone_basic.default_value }
{else}
{assign var="value" value=$fields.phone_basic.value }
{/if}  
<input type='text' name='{$fields.phone_basic.name}' 
    id='{$fields.phone_basic.name}' size='30' 
     
    value='{$value}' title=''      >
   						{/if}
		   	</td>
    
      
		
		{if $fields.contact_status_basic.acl > 0}
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
		
		<label for='contact_status_basic' >{sugar_translate label='LBL_CONTACT_STATUS' module='Contacts'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{html_options id='contact_status_basic' name='contact_status_basic[]' options=$fields.contact_status_basic.options size="6" style="width: 150px" multiple="1" selected=$fields.contact_status_basic.value}
   						{/if}
		   	</td>
    
      
		
		{if $fields.assigned_user_id_basic.acl > 0}
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
		
		<label for='assigned_user_id_basic' >{sugar_translate label='LBL_ASSIGNED_TO' module='Contacts'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{html_options id='assigned_user_id_basic' name='assigned_user_id_basic[]' options=$fields.assigned_user_id_basic.options size="6" style="width: 150px" multiple="1" selected=$fields.assigned_user_id_basic.value}
   						{/if}
		   	</td>
    
      
		
		{if $fields.current_user_only_basic.acl > 0}
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
		
		<label for='current_user_only_basic' >{sugar_translate label='LBL_CURRENT_USER_FILTER' module='Contacts'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{if strval($fields.current_user_only_basic.value) == "1" || strval($fields.current_user_only_basic.value) == "yes" || strval($fields.current_user_only_basic.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.current_user_only_basic.name}" value="0"> 
<input type="checkbox" id="{$fields.current_user_only_basic.name}" 
name="{$fields.current_user_only_basic.name}" 
value="1" title='' tabindex="" {$checked} >
   						{/if}
		   	</td>
    
      
		
		{if $fields.favorites_only_basic.acl > 0}
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
		
		<label for='favorites_only_basic' >{sugar_translate label='LBL_FAVORITES_FILTER' module='Contacts'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{if strval($fields.favorites_only_basic.value) == "1" || strval($fields.favorites_only_basic.value) == "yes" || strval($fields.favorites_only_basic.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.favorites_only_basic.name}" value="0"> 
<input type="checkbox" id="{$fields.favorites_only_basic.name}" 
name="{$fields.favorites_only_basic.name}" 
value="1" title='' tabindex="" {$checked} >
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
</table>