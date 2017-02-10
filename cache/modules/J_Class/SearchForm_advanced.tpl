
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
      
      
	
		
		{if $fields.class_code_advanced.acl > 0}
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
		
		<label for='class_code_advanced'>{sugar_translate label='LBL_CLASS_CODE' module='J_Class'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
{if strlen($fields.class_code_advanced.value) <= 0}
{assign var="value" value=$fields.class_code_advanced.default_value }
{else}
{assign var="value" value=$fields.class_code_advanced.value }
{/if}  
<input type='text' name='{$fields.class_code_advanced.name}' 
    id='{$fields.class_code_advanced.name}' size='30' 
    maxlength='50' 
    value='{$value}' title=''      accesskey='9'  >
   	   	</td>
					{/if}
		    
      
	
		
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
			<label for='name_advanced'>{sugar_translate label='LBL_NAME' module='J_Class'}</label>
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
    value='{$value}' title=''      >
   	   	</td>
					{/if}
		    
      
	
		
		{if $fields.class_type_advanced.acl > 0}
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
		
		<label for='class_type_advanced'>{sugar_translate label='LBL_CLASS_TYPE' module='J_Class'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
{html_options id='class_type_advanced' name='class_type_advanced[]' options=$fields.class_type_advanced.options size="6" style="width: 150px" multiple="1" selected=$fields.class_type_advanced.value}
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
		
		<label for='start_date_advanced'>{sugar_translate label='LBL_START_DATE' module='J_Class'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
{assign var="id" value=$fields.start_date_advanced.name }

{if isset($smarty.request.start_date_advanced_range_choice)}
{assign var="starting_choice" value=$smarty.request.start_date_advanced_range_choice}
{else}
{assign var="starting_choice" value="="}
{/if}

<div style="white-space:nowrap !important;">
<select id="{$id}_range_choice" name="{$id}_range_choice" style="width:125px !important;" onchange="{$id}_range_change(this.value);">
{html_options options=$fields.start_date_advanced.options selected=$starting_choice}
</select>
</div>

<div id="{$id}_range_div" style="{if preg_match('/^\[/', $smarty.request.range_start_date_advanced)  || $starting_choice == 'between'}display:none{else}display:''{/if};">
<input autocomplete="off" type="text" name="range_{$id}" id="range_{$id}" value='{if empty($smarty.request.range_start_date_advanced) && !empty($smarty.request.start_date_advanced)}{$smarty.request.start_date_advanced}{else}{$smarty.request.range_start_date_advanced}{/if}' title=''   size="11" style="width:100px !important;">
{capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="{$id}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "range_{$id}",
daFormat : "{$CALENDAR_FORMAT}",
button : "{$id}_trigger",
singleClick : true,
dateStr : "{$date_value}",
startWeekday: {$CALENDAR_FDOW|default:'0'},
step : 1,
weekNumbers:false
{rdelim}
);
</script>
    
</div>

<div id="{$id}_between_range_div" style="{if $starting_choice=='between'}display:'';{else}display:none;{/if}">
{assign var=date_value value=$fields.start_date_advanced.value }
<input autocomplete="off" type="text" name="start_range_{$id}" id="start_range_{$id}" value='{$smarty.request.start_range_start_date_advanced }' title=''  tabindex='' size="11" style="width:100px !important;">
{capture assign="other_attributes"}align="absmiddle" border="0" id="start_range_{$id}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE|escape:'html' other_attributes=$other_attributes}
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "start_range_{$id}",
daFormat : "{$CALENDAR_FORMAT}",
button : "start_range_{$id}_trigger",
singleClick : true,
dateStr : "{$date_value}",
step : 1,
weekNumbers:false
{rdelim}
);
</script>
 
{$APP.LBL_AND}
{assign var=date_value value=$fields.start_date_advanced.value }
<input autocomplete="off" type="text" name="end_range_{$id}" id="end_range_{$id}" value='{$smarty.request.end_range_start_date_advanced }' title=''  tabindex='' size="11" style="width:100px !important;" maxlength="10">
{capture assign="other_attributes"}align="absmiddle" border="0" id="end_range_{$id}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE|escape:'html' other_attributes=$other_attributes}
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "end_range_{$id}",
daFormat : "{$CALENDAR_FORMAT}",
button : "end_range_{$id}_trigger",
singleClick : true,
dateStr : "{$date_value}",
step : 1,
weekNumbers:false
{rdelim}
);
</script>
 
</div>


<script type='text/javascript'>

function {$id}_range_change(val) 
{ldelim}
  if(val == 'between') {ldelim}
     document.getElementById("range_{$id}").value = '';  
     document.getElementById("{$id}_range_div").style.display = 'none';
     document.getElementById("{$id}_between_range_div").style.display = ''; 
  {rdelim} else if (val == '=' || val == 'not_equal' || val == 'greater_than' || val == 'less_than') {ldelim}
     if((/^\[.*\]$/).test(document.getElementById("range_{$id}").value))
     {ldelim}
     	document.getElementById("range_{$id}").value = '';
     {rdelim}
     document.getElementById("start_range_{$id}").value = '';
     document.getElementById("end_range_{$id}").value = '';
     document.getElementById("{$id}_range_div").style.display = '';
     document.getElementById("{$id}_between_range_div").style.display = 'none';
  {rdelim} else {ldelim}
     if (val != '') {ldelim}
        val = '[' + val + ']';
     {rdelim}
     document.getElementById("range_{$id}").value = val;
     document.getElementById("start_range_{$id}").value = '';
     document.getElementById("end_range_{$id}").value = ''; 
     document.getElementById("{$id}_range_div").style.display = 'none';
     document.getElementById("{$id}_between_range_div").style.display = 'none';         
  {rdelim}
{rdelim}

var {$id}_range_reset = function()
{ldelim}
{$id}_range_change('=');
{rdelim}

YAHOO.util.Event.onDOMReady(function() {ldelim}
if(document.getElementById('search_form_clear'))
{ldelim}
YAHOO.util.Event.addListener('search_form_clear', 'click', {$id}_range_reset);
{rdelim}

{rdelim});

YAHOO.util.Event.onDOMReady(function() {ldelim}
 	if(document.getElementById('search_form_clear_advanced'))
 	 {ldelim}
 	     YAHOO.util.Event.addListener('search_form_clear_advanced', 'click', {$id}_range_reset);
 	 {rdelim}

{rdelim});

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
		
		<label for='end_date_advanced'>{sugar_translate label='LBL_END_DATE' module='J_Class'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
{assign var="id" value=$fields.end_date_advanced.name }

{if isset($smarty.request.end_date_advanced_range_choice)}
{assign var="starting_choice" value=$smarty.request.end_date_advanced_range_choice}
{else}
{assign var="starting_choice" value="="}
{/if}

<div style="white-space:nowrap !important;">
<select id="{$id}_range_choice" name="{$id}_range_choice" style="width:125px !important;" onchange="{$id}_range_change(this.value);">
{html_options options=$fields.end_date_advanced.options selected=$starting_choice}
</select>
</div>

<div id="{$id}_range_div" style="{if preg_match('/^\[/', $smarty.request.range_end_date_advanced)  || $starting_choice == 'between'}display:none{else}display:''{/if};">
<input autocomplete="off" type="text" name="range_{$id}" id="range_{$id}" value='{if empty($smarty.request.range_end_date_advanced) && !empty($smarty.request.end_date_advanced)}{$smarty.request.end_date_advanced}{else}{$smarty.request.range_end_date_advanced}{/if}' title=''   size="11" style="width:100px !important;">
{capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="{$id}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "range_{$id}",
daFormat : "{$CALENDAR_FORMAT}",
button : "{$id}_trigger",
singleClick : true,
dateStr : "{$date_value}",
startWeekday: {$CALENDAR_FDOW|default:'0'},
step : 1,
weekNumbers:false
{rdelim}
);
</script>
    
</div>

<div id="{$id}_between_range_div" style="{if $starting_choice=='between'}display:'';{else}display:none;{/if}">
{assign var=date_value value=$fields.end_date_advanced.value }
<input autocomplete="off" type="text" name="start_range_{$id}" id="start_range_{$id}" value='{$smarty.request.start_range_end_date_advanced }' title=''  tabindex='' size="11" style="width:100px !important;">
{capture assign="other_attributes"}align="absmiddle" border="0" id="start_range_{$id}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE|escape:'html' other_attributes=$other_attributes}
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "start_range_{$id}",
daFormat : "{$CALENDAR_FORMAT}",
button : "start_range_{$id}_trigger",
singleClick : true,
dateStr : "{$date_value}",
step : 1,
weekNumbers:false
{rdelim}
);
</script>
 
{$APP.LBL_AND}
{assign var=date_value value=$fields.end_date_advanced.value }
<input autocomplete="off" type="text" name="end_range_{$id}" id="end_range_{$id}" value='{$smarty.request.end_range_end_date_advanced }' title=''  tabindex='' size="11" style="width:100px !important;" maxlength="10">
{capture assign="other_attributes"}align="absmiddle" border="0" id="end_range_{$id}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE|escape:'html' other_attributes=$other_attributes}
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "end_range_{$id}",
daFormat : "{$CALENDAR_FORMAT}",
button : "end_range_{$id}_trigger",
singleClick : true,
dateStr : "{$date_value}",
step : 1,
weekNumbers:false
{rdelim}
);
</script>
 
</div>


<script type='text/javascript'>

function {$id}_range_change(val) 
{ldelim}
  if(val == 'between') {ldelim}
     document.getElementById("range_{$id}").value = '';  
     document.getElementById("{$id}_range_div").style.display = 'none';
     document.getElementById("{$id}_between_range_div").style.display = ''; 
  {rdelim} else if (val == '=' || val == 'not_equal' || val == 'greater_than' || val == 'less_than') {ldelim}
     if((/^\[.*\]$/).test(document.getElementById("range_{$id}").value))
     {ldelim}
     	document.getElementById("range_{$id}").value = '';
     {rdelim}
     document.getElementById("start_range_{$id}").value = '';
     document.getElementById("end_range_{$id}").value = '';
     document.getElementById("{$id}_range_div").style.display = '';
     document.getElementById("{$id}_between_range_div").style.display = 'none';
  {rdelim} else {ldelim}
     if (val != '') {ldelim}
        val = '[' + val + ']';
     {rdelim}
     document.getElementById("range_{$id}").value = val;
     document.getElementById("start_range_{$id}").value = '';
     document.getElementById("end_range_{$id}").value = ''; 
     document.getElementById("{$id}_range_div").style.display = 'none';
     document.getElementById("{$id}_between_range_div").style.display = 'none';         
  {rdelim}
{rdelim}

var {$id}_range_reset = function()
{ldelim}
{$id}_range_change('=');
{rdelim}

YAHOO.util.Event.onDOMReady(function() {ldelim}
if(document.getElementById('search_form_clear'))
{ldelim}
YAHOO.util.Event.addListener('search_form_clear', 'click', {$id}_range_reset);
{rdelim}

{rdelim});

YAHOO.util.Event.onDOMReady(function() {ldelim}
 	if(document.getElementById('search_form_clear_advanced'))
 	 {ldelim}
 	     YAHOO.util.Event.addListener('search_form_clear_advanced', 'click', {$id}_range_reset);
 	 {rdelim}

{rdelim});

</script>
   	   	</td>
					{/if}
		    
      
	
		
		{if $fields.status_advanced.acl > 0}
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
		
		<label for='status_advanced'>{sugar_translate label='LBL_STATUS' module='J_Class'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
{html_options id='status_advanced' name='status_advanced[]' options=$fields.status_advanced.options size="6" style="width: 150px" multiple="1" selected=$fields.status_advanced.value}
   	   	</td>
					{/if}
		    
      
	
		
		{if $fields.kind_of_course_advanced.acl > 0}
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
		
		<label for='kind_of_course_advanced'>{sugar_translate label='LBL_KIND_OF_COURSE' module='J_Class'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
{html_options id='kind_of_course_advanced' name='kind_of_course_advanced[]' options=$fields.kind_of_course_advanced.options size="6" style="width: 150px" multiple="1" selected=$fields.kind_of_course_advanced.value}
   	   	</td>
					{/if}
		    
      
	
		
		{if $fields.hours_advanced.acl > 0}
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
		
		<label for='hours_advanced'>{sugar_translate label='LBL_HOURS' module='J_Class'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
{if strlen($fields.hours_advanced.value) <= 0}
{assign var="value" value=$fields.hours_advanced.default_value }
{else}
{assign var="value" value=$fields.hours_advanced.value }
{/if}

{assign var="id" value=$fields.hours_advanced.name }

{if isset($smarty.request.hours_advanced_range_choice)}
{assign var="starting_choice" value=$smarty.request.hours_advanced_range_choice}
{else}
{assign var="starting_choice" value="="}
{/if}

<script type='text/javascript'>
function {$id}_range_change(val) 
{ldelim}
  calculate_between = (val == 'between');

  //Clear the values depending on the operation
  if(calculate_between) {ldelim}
     document.getElementById("range_{$id}").value = '';   
  {rdelim} else {ldelim}
     document.getElementById("start_range_{$id}").value = '';
     document.getElementById("end_range_{$id}").value = '';
  {rdelim}
 
  document.getElementById("{$id}_range_div").style.display = calculate_between ? 'none' : '';
  document.getElementById("{$id}_between_range_div").style.display = calculate_between ? '' : 'none';
{rdelim}

var {$id}_range_reset = function()
{ldelim}
{$id}_range_change('=');
{rdelim}

YAHOO.util.Event.onDOMReady(function() {ldelim}
if(document.getElementById('search_form_clear'))
{ldelim}
YAHOO.util.Event.addListener('search_form_clear', 'click', {$id}_range_reset);
{rdelim}

{rdelim});

YAHOO.util.Event.onDOMReady(function() {ldelim}
 	 if(document.getElementById('search_form_clear_advanced'))
 	 {ldelim}
 	     YAHOO.util.Event.addListener('search_form_clear_advanced', 'click', {$id}_range_reset);
 	 {rdelim}
{rdelim});

</script>

<span style="white-space:nowrap !important;">
<select id="{$id}_range_choice" name="{$id}_range_choice" style="width:190px !important;" onchange="{$id}_range_change(this.value);">
{html_options options=$fields.hours_advanced.options selected=$starting_choice}
</select>
<div id="{$id}_range_div" style="{if $starting_choice=='between'}display:none;{else}display:'';{/if}">
<input type='text' name='range_{$id}' id='range_{$id}' style='width:75px !important;' size='20' 
     
    value='{if empty($smarty.request.range_hours_advanced) && !empty($smarty.request.hours_advanced)}{$smarty.request.hours_advanced}{else}{$smarty.request.range_hours_advanced}{/if}' tabindex='' >
</div>
<div id="{$id}_between_range_div" style="{if $starting_choice=='between'}display:'';{else}display:none;{/if}">
<input type='text' name='start_range_{$id}' 
    id='start_range_{$id}' style='width:75px !important;' size='10' 
     
    value='{$smarty.request.start_range_hours_advanced }' tabindex=''>
{$APP.LBL_AND}
<input type='text' name='end_range_{$id}' 
    id='end_range_{$id}' style='width:75px !important;' size='10' 
     
    value='{$smarty.request.end_range_hours_advanced }' tabindex=''>    
</div> 
</span>
   	   	</td>
					{/if}
		    
      
	
		
		{if $fields.max_size_advanced.acl > 0}
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
		
		<label for='max_size_advanced'>{sugar_translate label='LBL_MAX_SIZE' module='J_Class'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
{html_options id='max_size_advanced' name='max_size_advanced[]' options=$fields.max_size_advanced.options size="6" style="width: 150px" multiple="1" selected=$fields.max_size_advanced.value}
   	   	</td>
					{/if}
		    
      
	
		
		{if $fields.isupgrade_advanced.acl > 0}
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
		
		<label for='isupgrade_advanced'>{sugar_translate label='LBL_ISUPGRADE' module='J_Class'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
{assign var="yes" value=""}
{assign var="no" value=""}
{assign var="default" value=""}

{if strval($fields.isupgrade_advanced.value) == "1"}
	{assign var="yes" value="SELECTED"}
{elseif strval($fields.isupgrade_advanced.value) == "0"}
	{assign var="no" value="SELECTED"}
{else}
	{assign var="default" value="SELECTED"}
{/if}

<select id="{$fields.isupgrade_advanced.name}" name="{$fields.isupgrade_advanced.name}"   >
 <option value="" {$default}></option>
 <option value = "0" {$no}> {$APP.LBL_SEARCH_DROPDOWN_NO}</option>
 <option value = "1" {$yes}> {$APP.LBL_SEARCH_DROPDOWN_YES}</option>
</select>

   	   	</td>
					{/if}
		    
      
	
		
		{if $fields.level_advanced.acl > 0}
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
		
		<label for='level_advanced'>{sugar_translate label='LBL_LEVEL' module='J_Class'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
{html_options id='level_advanced' name='level_advanced[]' options=$fields.level_advanced.options size="6" style="width: 150px" multiple="1" selected=$fields.level_advanced.value}
   	   	</td>
					{/if}
		    
      
	
		
		{if $fields.modules_advanced.acl > 0}
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
		
		<label for='modules_advanced'>{sugar_translate label='LBL_MODULE' module='J_Class'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
{html_options id='modules_advanced' name='modules_advanced[]' options=$fields.modules_advanced.options size="6" style="width: 150px" multiple="1" selected=$fields.modules_advanced.value}
   	   	</td>
					{/if}
		    
      
	
		
		{if $fields.period_advanced.acl > 0}
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
		
		<label for='period_advanced'>{sugar_translate label='LBL_PERIOD' module='J_Class'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
{html_options id='period_advanced' name='period_advanced[]' options=$fields.period_advanced.options size="6" style="width: 150px" multiple="1" selected=$fields.period_advanced.value}
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
		
		<label for='assigned_user_id_advanced'>{sugar_translate label='LBL_ASSIGNED_TO' module='J_Class'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
{html_options id='assigned_user_id_advanced' name='assigned_user_id_advanced[]' options=$fields.assigned_user_id_advanced.options size="6" style="width: 150px" multiple="1" selected=$fields.assigned_user_id_advanced.value}
   	   	</td>
					{/if}
		    
      
	
		
		{if $fields.current_user_only_advanced.acl > 0}
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
		
		<label for='current_user_only_advanced'>{sugar_translate label='LBL_CURRENT_USER_FILTER' module='J_Class'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
{if strval($fields.current_user_only_advanced.value) == "1" || strval($fields.current_user_only_advanced.value) == "yes" || strval($fields.current_user_only_advanced.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.current_user_only_advanced.name}" value="0"> 
<input type="checkbox" id="{$fields.current_user_only_advanced.name}" 
name="{$fields.current_user_only_advanced.name}" 
value="1" title='' tabindex="" {$checked} >
   	   	</td>
					{/if}
		    
      
	
		
		{if $fields.favorites_only_advanced.acl > 0}
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
		
		<label for='favorites_only_advanced'>{sugar_translate label='LBL_FAVORITES_FILTER' module='J_Class'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
{if strval($fields.favorites_only_advanced.value) == "1" || strval($fields.favorites_only_advanced.value) == "yes" || strval($fields.favorites_only_advanced.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.favorites_only_advanced.name}" value="0"> 
<input type="checkbox" id="{$fields.favorites_only_advanced.name}" 
name="{$fields.favorites_only_advanced.name}" 
value="1" title='' tabindex="" {$checked} >
   	   	</td>
					{/if}
		    
      
	
		
		{if $fields.team_name_advanced.acl > 0}
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
		
		<label for='team_name_advanced'>{sugar_translate label='LBL_TEAMS' module='J_Class'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
{sugarvar_teamset parentFieldArray=fields vardef=$fields.team_name tabindex='' display='' labelSpan='' fieldSpan='' formName='search_form' tabindex=1 displayType='renderSearchView'  	 }
   	   	</td>
					{/if}
		    
      
	
		
		{if $fields.description_advanced.acl > 0}
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
		
		<label for='description_advanced'>{sugar_translate label='LBL_DESCRIPTION' module='J_Class'}</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
{if empty($fields.description_advanced.value)}
{assign var="value" value=$fields.description_advanced.default_value }
{else}
{assign var="value" value=$fields.description_advanced.value }
{/if}  




<textarea  id='{$fields.description_advanced.name}' name='{$fields.description_advanced.name}'
rows="4" 
cols="30" 
title='' tabindex="" 
 >{$value}</textarea>



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
</script>{literal}<script language="javascript">if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['search_form_modified_by_name_advanced']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["modified_by_name_advanced","modified_user_id_advanced"],"required_list":["modified_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_created_by_name_advanced']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["created_by_name_advanced","created_by_advanced"],"required_list":["created_by"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_team_name_advanced']={"form":"search_form","method":"query","modules":["Teams"],"group":"or","field_list":["name","id"],"populate_list":["team_name_advanced","team_id_advanced"],"required_list":["team_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""},{"name":"name","op":"like_custom","begin":"(","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['search_form_assigned_user_name_advanced']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name_advanced","assigned_user_id_advanced"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_koc_name_advanced']={"form":"search_form","method":"query","modules":["J_Kindofcourse"],"group":"or","field_list":["name","id"],"populate_list":["koc_name_advanced","koc_id_advanced"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['search_form_j_class_j_class_1_name_advanced']={"form":"search_form","method":"query","modules":["J_Class"],"group":"or","field_list":["name","id"],"populate_list":["j_class_j_class_1_name_advanced","j_class_j_class_1j_class_ida_advanced"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['search_form_j_coursefee_j_class_1_name_advanced']={"form":"search_form","method":"query","modules":["J_Coursefee"],"group":"or","field_list":["name","id"],"populate_list":["j_coursefee_j_class_1_name_advanced","j_coursefee_j_class_1j_coursefee_ida_advanced"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};</script>{/literal}