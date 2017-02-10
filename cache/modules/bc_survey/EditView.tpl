

<script type="text/javascript" src="include/EditView/Panels.js"></script>
<script>
{literal}
$(document).ready(function(){
$("ul.clickMenu").each(function(index, node){
$(node).sugarActionMenu();
});
});
{/literal}
</script>
<div class="clear"></div>
<form action="index.php" method="POST" name="{$form_name}" id="{$form_id}" {$enctype}>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="dcQuickEdit">
<tr>
<td class="buttons">
<input type="hidden" name="module" value="{$module}">
{if isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true"}
<input type="hidden" name="record" value="">
<input type="hidden" name="duplicateSave" value="true">
<input type="hidden" name="duplicateId" value="{$fields.id.value}">
{else}
<input type="hidden" name="record" value="{$fields.id.value}">
{/if}
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="action">
<input type="hidden" name="return_module" value="{$smarty.request.return_module}">
<input type="hidden" name="return_action" value="{$smarty.request.return_action}">
<input type="hidden" name="return_id" value="{$smarty.request.return_id}">
<input type="hidden" name="module_tab"> 
<input type="hidden" name="contact_role">
{if (!empty($smarty.request.return_module) || !empty($smarty.request.relate_to)) && !(isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true")}
<input type="hidden" name="relate_to" value="{if $smarty.request.return_relationship}{$smarty.request.return_relationship}{elseif $smarty.request.relate_to && empty($smarty.request.from_dcmenu)}{$smarty.request.relate_to}{elseif empty($isDCForm) && empty($smarty.request.from_dcmenu)}{$smarty.request.return_module}{/if}">
<input type="hidden" name="relate_id" value="{$smarty.request.return_id}">
{/if}
<input type="hidden" name="offset" value="{$offset}">
{assign var='place' value="_HEADER"} <!-- to be used for id for buttons with custom code in def files-->
<div class="action_buttons"><input title="{$APP.LBL_SAVE_BUTTON_TITLE}" id="SAVE_HEADER" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="validate()" type="button" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}"/> {if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module}&record={$smarty.request.return_id}'); return false;" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" type="button" id="CANCEL_HEADER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {elseif empty($smarty.request.return_action) || empty($smarty.request.return_id) && !empty($fields.id.value)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=bc_survey'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module={$smarty.request.return_module}&record={$smarty.request.return_id}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {/if} {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=bc_survey", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</td>
<td align='right'>
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<span id='tabcounterJS'><script>SUGAR.TabFields=new Array();//this will be used to track tabindexes for references</script></span>
<div id="EditView_tabs"
>
<div >
<div id="detailpanel_1" >
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='Default_{$module}_Subpanel'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.name.acl > 1 || ($showDetailData && $fields.name.acl > 0)}
<td valign="top" id='name_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_NAME' module='bc_survey'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' colspan='3'>
{if $fields.name.acl > 1}
{counter name="panelFieldCount"}

{if strlen($fields.name.value) <= 0}
{assign var="value" value=$fields.name.default_value }
{else}
{assign var="value" value=$fields.name.value }
{/if}  
<input type='text' name='{$fields.name.name}' 
id='{$fields.name.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      accesskey='7'  >
{else}
{counter name="panelFieldCount"}

{if strlen($fields.name.value) <= 0}
{assign var="value" value=$fields.name.default_value }
{else}
{assign var="value" value=$fields.name.value }
{/if} 
<span class="sugar_field" id="{$fields.name.name}">{$fields.name.value}</span>
{/if}
{else}
<td></td><td></td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.logo.acl > 1 || ($showDetailData && $fields.logo.acl > 0)}
<td valign="top" id='logo_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_LOGO' module='bc_survey'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' colspan='3'>
{if $fields.logo.acl > 1}
{counter name="panelFieldCount"}


{if !empty($fields.logo.value) }
{assign var=showRemove value=true}
{else}
{assign var=showRemove value=false}
{/if}
{assign var=noChange value=false}
<input type="hidden" name="deleteAttachment" value="0">
<input type="hidden" name="{$fields.logo.name}" id="{$fields.logo.name}" value="{$fields.logo.value}">
<span id="{$fields.logo.name}_old" style="display:{if !$showRemove}none;{/if}">
<img src="custom/include/surveylogo_images/{$fields.logo.value}" height="100px" class="tabDetailViewDFLink">
{if !$noChange}
<input type='button' class='button' id='remove_button' value='{$APP.LBL_REMOVE}' onclick='SUGAR.field.file.deleteAttachment("{$fields.logo.name}","",this);'>
{/if}
</span>
{if !$noChange}
<span id="{$fields.logo.name}_new" class="survey-logo-selection" style="display:{if $showRemove}none;{/if}">
<input type="hidden" name="{$fields.logo.name}_escaped">
<input id="{$fields.logo.name}_file" name="{$fields.logo.name}_file" 
type="file" title='' size="30"
maxlength='255'
>&nbsp;&nbsp;<img title="The max upload image size should be 300px." src="themes/Sugar5/images/helpInline.gif?v=9F2a81TErGINGVZgMbDjow">
{else}

{/if}
</span>
{else}
{counter name="panelFieldCount"}


<span class="sugar_field" id="{$fields.logo.name}">
<a href="index.php?entryPoint=download&id={$fields.id.value}&type={$module}" class="tabDetailViewDFLink" target='_blank'>{$fields.logo.value}</a>
</span>
{/if}
{else}
<td></td><td></td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.start_date.acl > 1 || ($showDetailData && $fields.start_date.acl > 0)}
<td valign="top" id='start_date_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_START_DATE' module='bc_survey'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.start_date.acl > 1}
{counter name="panelFieldCount"}

<table border="0" cellpadding="0" cellspacing="0" class="dateTime">
<tr valign="middle">
<td nowrap>
<input autocomplete="off" type="text" id="{$fields.start_date.name}_date" value="{$fields[$fields.start_date.name].value}" size="11" maxlength="10" title='' tabindex="0" onblur="combo_{$fields.start_date.name}.update();" onchange="combo_{$fields.start_date.name}.update(); "    >
{capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="{$fields.start_date.name}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}&nbsp;
</td>
<td nowrap>
<div id="{$fields.start_date.name}_time_section"></div>
</td>
</tr>
</table>
<input type="hidden" class="DateTimeCombo" id="{$fields.start_date.name}" name="{$fields.start_date.name}" value="{$fields[$fields.start_date.name].value}">
<script type="text/javascript" src="{sugar_getjspath file="include/SugarFields/Fields/Datetimecombo/Datetimecombo.js"}"></script>
<script type="text/javascript">
var combo_{$fields.start_date.name} = new Datetimecombo("{$fields[$fields.start_date.name].value}", "{$fields.start_date.name}", "{$TIME_FORMAT}", "0", '', false, true);
//Render the remaining widget fields
text = combo_{$fields.start_date.name}.html('');
document.getElementById('{$fields.start_date.name}_time_section').innerHTML = text;

//Call eval on the update function to handle updates to calendar picker object
eval(combo_{$fields.start_date.name}.jsscript(''));

//bug 47718: this causes too many addToValidates to be called, resulting in the error messages being displayed multiple times
//    removing it here to mirror the Datetime SugarField, where the validation is not added at this level
//addToValidate('{$form_name}',"{$fields.start_date.name}_date",'date',false,"{$fields.start_date.name}");
addToValidateBinaryDependency('{$form_name}',"{$fields.start_date.name}_hours", 'alpha', false, "{$APP.ERR_MISSING_REQUIRED_FIELDS} {$APP.LBL_HOURS}" ,"{$fields.start_date.name}_date");
addToValidateBinaryDependency('{$form_name}', "{$fields.start_date.name}_minutes", 'alpha', false, "{$APP.ERR_MISSING_REQUIRED_FIELDS} {$APP.LBL_MINUTES}" ,"{$fields.start_date.name}_date");
addToValidateBinaryDependency('{$form_name}', "{$fields.start_date.name}_meridiem", 'alpha', false, "{$APP.ERR_MISSING_REQUIRED_FIELDS} {$APP.LBL_MERIDIEM}","{$fields.start_date.name}_date");

YAHOO.util.Event.onDOMReady(function()
{ldelim}

	Calendar.setup ({ldelim}
	onClose : update_{$fields.start_date.name},
	inputField : "{$fields.start_date.name}_date",
	ifFormat : "{$CALENDAR_FORMAT}",
	daFormat : "{$CALENDAR_FORMAT}",
	button : "{$fields.start_date.name}_trigger",
	singleClick : true,
	step : 1,
	weekNumbers: false,
        startWeekday: {$CALENDAR_FDOW|default:'0'},
	comboObject: combo_{$fields.start_date.name}
	{rdelim});

	//Call update for first time to round hours and minute values
	combo_{$fields.start_date.name}.update(false);

{rdelim}); 
</script>
{else}
{counter name="panelFieldCount"}

{if strlen($fields.start_date.value) <= 0}
{assign var="value" value=$fields.start_date.default_value }
{else}
{assign var="value" value=$fields.start_date.value }
{/if} 
<span class="sugar_field" id="{$fields.start_date.name}">{$fields.start_date.value}</span>
{/if}
{else}
<td></td><td></td>
{/if}
<td valign="top" id='_label' width='12.5%' scope="col">
&nbsp;
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.end_date.acl > 1 || ($showDetailData && $fields.end_date.acl > 0)}
<td valign="top" id='end_date_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_END_DATE' module='bc_survey'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.end_date.acl > 1}
{counter name="panelFieldCount"}

<table border="0" cellpadding="0" cellspacing="0" class="dateTime">
<tr valign="middle">
<td nowrap>
<input autocomplete="off" type="text" id="{$fields.end_date.name}_date" value="{$fields[$fields.end_date.name].value}" size="11" maxlength="10" title='' tabindex="0" onblur="combo_{$fields.end_date.name}.update();" onchange="combo_{$fields.end_date.name}.update(); "    >
{capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="{$fields.end_date.name}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}&nbsp;
</td>
<td nowrap>
<div id="{$fields.end_date.name}_time_section"></div>
</td>
</tr>
</table>
<input type="hidden" class="DateTimeCombo" id="{$fields.end_date.name}" name="{$fields.end_date.name}" value="{$fields[$fields.end_date.name].value}">
<script type="text/javascript" src="{sugar_getjspath file="include/SugarFields/Fields/Datetimecombo/Datetimecombo.js"}"></script>
<script type="text/javascript">
var combo_{$fields.end_date.name} = new Datetimecombo("{$fields[$fields.end_date.name].value}", "{$fields.end_date.name}", "{$TIME_FORMAT}", "0", '', false, true);
//Render the remaining widget fields
text = combo_{$fields.end_date.name}.html('');
document.getElementById('{$fields.end_date.name}_time_section').innerHTML = text;

//Call eval on the update function to handle updates to calendar picker object
eval(combo_{$fields.end_date.name}.jsscript(''));

//bug 47718: this causes too many addToValidates to be called, resulting in the error messages being displayed multiple times
//    removing it here to mirror the Datetime SugarField, where the validation is not added at this level
//addToValidate('{$form_name}',"{$fields.end_date.name}_date",'date',false,"{$fields.end_date.name}");
addToValidateBinaryDependency('{$form_name}',"{$fields.end_date.name}_hours", 'alpha', false, "{$APP.ERR_MISSING_REQUIRED_FIELDS} {$APP.LBL_HOURS}" ,"{$fields.end_date.name}_date");
addToValidateBinaryDependency('{$form_name}', "{$fields.end_date.name}_minutes", 'alpha', false, "{$APP.ERR_MISSING_REQUIRED_FIELDS} {$APP.LBL_MINUTES}" ,"{$fields.end_date.name}_date");
addToValidateBinaryDependency('{$form_name}', "{$fields.end_date.name}_meridiem", 'alpha', false, "{$APP.ERR_MISSING_REQUIRED_FIELDS} {$APP.LBL_MERIDIEM}","{$fields.end_date.name}_date");

YAHOO.util.Event.onDOMReady(function()
{ldelim}

	Calendar.setup ({ldelim}
	onClose : update_{$fields.end_date.name},
	inputField : "{$fields.end_date.name}_date",
	ifFormat : "{$CALENDAR_FORMAT}",
	daFormat : "{$CALENDAR_FORMAT}",
	button : "{$fields.end_date.name}_trigger",
	singleClick : true,
	step : 1,
	weekNumbers: false,
        startWeekday: {$CALENDAR_FDOW|default:'0'},
	comboObject: combo_{$fields.end_date.name}
	{rdelim});

	//Call update for first time to round hours and minute values
	combo_{$fields.end_date.name}.update(false);

{rdelim}); 
</script>
{else}
{counter name="panelFieldCount"}

{if strlen($fields.end_date.value) <= 0}
{assign var="value" value=$fields.end_date.default_value }
{else}
{assign var="value" value=$fields.end_date.value }
{/if} 
<span class="sugar_field" id="{$fields.end_date.name}">{$fields.end_date.value}</span>
{/if}
{else}
<td></td><td></td>
{/if}
<td valign="top" id='_label' width='12.5%' scope="col">
&nbsp;
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.description.acl > 1 || ($showDetailData && $fields.description.acl > 0)}
<td valign="top" id='description_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='bc_survey'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' colspan='3'>
{if $fields.description.acl > 1}
{counter name="panelFieldCount"}

{if empty($fields.description.value)}
{assign var="value" value=$fields.description.default_value }
{else}
{assign var="value" value=$fields.description.value }
{/if}  
<textarea  id='{$fields.description.name}' name='{$fields.description.name}'
rows="4" 
cols="80" 
title='' tabindex="0" 
 >{$value}</textarea>
{else}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.description.name|escape:'html'|url2html|nl2br}">{$fields.description.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
{/if}
{else}
<td></td><td></td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.redirect_url.acl > 1 || ($showDetailData && $fields.redirect_url.acl > 0)}
<td valign="top" id='redirect_url_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_REDIRECT_URL' module='bc_survey'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' colspan='3'>
{if $fields.redirect_url.acl > 1}
{counter name="panelFieldCount"}

{if !empty($fields.redirect_url.value)}
<input type='text' name='{$fields.redirect_url.name}' id='{$fields.redirect_url.name}' size='30' 
maxlength='255' value='{$fields.redirect_url.value}' title='' tabindex='0'  >
{else}
<input type='text' name='{$fields.redirect_url.name}' id='{$fields.redirect_url.name}' size='30' 
maxlength='255'	   	   {if $displayView=='advanced_search'||$displayView=='basic_search'}value=''{else}value='http://'{/if} 
title='' tabindex='0'  >
{/if}
{else}
{counter name="panelFieldCount"}

{capture name=getLink assign=link}{$fields.redirect_url.value}{/capture}
{if !empty($link)}
{capture name=getStart assign=linkStart}{$link|substr:0:7}{/capture}
<span class="sugar_field" id="{$fields.redirect_url.name}">
<a href='{$link|to_url}'  >{$link}</a>
</span>
{/if}
{/if}
{else}
<td></td><td></td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.is_progress.acl > 1 || ($showDetailData && $fields.is_progress.acl > 0)}
<td valign="top" id='is_progress_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_IS_PROGRESS' module='bc_survey'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' colspan='3'>
{if $fields.is_progress.acl > 1}
{counter name="panelFieldCount"}

{if strval($fields.is_progress.value) == "1" || strval($fields.is_progress.value) == "yes" || strval($fields.is_progress.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.is_progress.name}" value="0"> 
<input type="checkbox" id="{$fields.is_progress.name}" 
name="{$fields.is_progress.name}" 
value="1" title='' tabindex="0" {$checked} >
{else}
{counter name="panelFieldCount"}

{if strval($fields.is_progress.value) == "1" || strval($fields.is_progress.value) == "yes" || strval($fields.is_progress.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.is_progress.name}" id="{$fields.is_progress.name}" value="$fields.is_progress.value" disabled="true" {$checked}>
{/if}
{else}
<td></td><td></td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.allowed_resubmit_count.acl > 1 || ($showDetailData && $fields.allowed_resubmit_count.acl > 0)}
<td valign="top" id='allowed_resubmit_count_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_ALLOWED_RESUBMIT_COUNT' module='bc_survey'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' colspan='3'>
{if $fields.allowed_resubmit_count.acl > 1}
{counter name="panelFieldCount"}

{if strlen($fields.allowed_resubmit_count.value) <= 0}
{assign var="value" value=$fields.allowed_resubmit_count.default_value }
{else}
{assign var="value" value=$fields.allowed_resubmit_count.value }
{/if}  
<input type='text' name='{$fields.allowed_resubmit_count.name}' 
id='{$fields.allowed_resubmit_count.name}' size='30' maxlength='11' value='{sugar_number_format precision=0 var=$value}' title='' tabindex='0'    >
{else}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.allowed_resubmit_count.name}">
{sugar_number_format precision=0 var=$fields.allowed_resubmit_count.value}
</span>
{/if}
{else}
<td></td><td></td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='_label' width='12.5%' scope="col">
&nbsp;
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' colspan='3'>
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("DEFAULT").style.display='none';</script>
{/if}
<div id="detailpanel_2" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>&nbsp;&nbsp;
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(2);">
<img border="0" id="detailpanel_2_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(2);">
<img border="0" id="detailpanel_2_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_EDITVIEW_PANEL1' module='bc_survey'}
<script>
document.getElementById('detailpanel_2').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_EDITVIEW_PANEL1'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.survey_page.acl > 1 || ($showDetailData && $fields.survey_page.acl > 0)}
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' colspan='3'>
{if $fields.survey_page.acl > 1}
{counter name="panelFieldCount"}

{literal}
<script type="text/javascript" src="custom/include/js/survey_js/drag-drop.js"></script>
<link rel="stylesheet" type="text/css" href="custom/include/css/font-awesome/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="custom/include/modules/bc_survey_template/css/survey.css" />      
<script type="text/javascript" src="custom/include/js/survey_js/validation.js"></script>
<script type="text/javascript" src="custom/include/js/survey_js/jquery.multiple.select.js"></script>
<script type="text/javascript">
        //for scrollable left sidebar    
        $(function () {
            var $sidebar = $("#left-nav"),
                    $window = $(window),
                    offset = $sidebar.offset(),
                    topPadding = 0;

            $window.scroll(function () {
                if ($window.scrollTop() > offset.top) {
                    $sidebar.stop().css({
                        marginTop: $window.scrollTop() - offset.top + topPadding
                    });
                } else {
                    $sidebar.stop().css({
                        marginTop: 0
                    });
                }
            });
            if ($('#EditView').find("input[name='module']").val() == "bc_survey") {
                $(".component").show();
                $(".template").hide();
            } else {
                $(".template").show();
                $(".component").hide();
            }
            $(".survey_theme_image").click(function (event) {
                $(event.currentTarget).parent().find('input[type="radio"]').prop('checked', true);
            });
            $(".theme-label").click(function (event) {
                $(event.currentTarget).parent().find('input[type="radio"]').prop('checked', true);
            });
        });
    </script>
{/literal}   
<img src="themes/Sugar5/images/loading.gif" id="loading-image"  class="ajax-loader" style="display:none; left: 30%; top: 70%; position: absolute;"/>
<div class="upgraded-survey-layout">
<div id="right-nav">
<input type="hidden" name="page_no" value="0" id="last_page_no" />
<input type="hidden" name="record_id" id="record_id" />
<div class="add-pages">
<div class="SurveyPage" tabindex="-1">
<div class="add-survey-page">
<div align="center">
<p align="center">Add a Survey Page</p>
<a><i style="opacity:0.8; cursor: pointer" class="fa fa-plus fa-4x" id="plus-image"></i></a>
</div>
</div>
</div>
</div>
</div>
<div id="left-nav">
<div class="component">
<a class="advance_tab active tab-left" id="page" style="width: 43%;" onclick="change_pagecompo(this);"><i class="fa  fa-file-o" title="close" style="font-size: 15px;" tabindex="-1"></i> &nbsp;&nbsp;Page Component</a>
<a class="advance_tab tab-right" id="theme" style="width: 43%;" onclick="change_pagecompo(this);"><i class="fa fa-dashboard" style="font-size: 15px;" title="open" tabindex="-1"></i>&nbsp;&nbsp;Survey Theme</a>
</div>
<div class="template" style="background-color: #c5c5c5; padding: 12px; font-weight: bold;">
<center><i class="fa  fa-file-o" title="close" style="font-size: 15px;" tabindex="-1"></i> &nbsp; &nbsp;Page Component</center>
</div>
<div class="list-group">
<div class="new-page">
<div class="btn_icon"><i class="fa fa-file-o" aria-hidden="true"></i></div><div style="display: inline-block;margin-top: 7px;"><p>&nbsp; New Page</p></div>
</div>
<div>
<div style="float:left; " class="Checkbox">
<div class="btn_icon"><i class="fa  fa-check-square-o" aria-hidden="true"></i></div><div style="display: inline-block;margin-top: 7px;"><p>&nbsp; CheckBox</p></div>
</div>
<div style="float:right; " class="DrodownList">
<div class="btn_icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></div><div style="display: inline-block;margin-top: 7px;"><p>&nbsp; Dropdown List</p></div>
</div>
</div>
<div>
<div style="float:left; " class="RadioButton">
<div class="btn_icon"><i class="fa fa-dot-circle-o" aria-hidden="true"></i></div><div style="display: inline-block;margin-top: 7px;"><p>&nbsp; Radio Button</p></div>
</div>
<div style="float:right; " class="MultiSelectList">
<div class="btn_icon"><i class="fa fa-list-ul" aria-hidden="true"></i></div><div style="display: inline-block;margin-top: 7px;"><p>&nbsp; MultiSelect List</p></div>
</div>
</div>
<div>
<div style="float:left; " class="Matrix">
<div class="btn_icon"><i class="fa fa-th" aria-hidden="true"></i></div><div style="display: inline-block;margin-top: 7px;"><p>&nbsp;Matrix / Grid</p></div>
</div>
<div style="float:right; " class="Date">
<div class="btn_icon"><i class="fa fa-calendar" aria-hidden="true"></i></div><div style="display: inline-block;margin-top: 7px;"><p>&nbsp;    DateTime </p></div>
</div>
</div>
<div>
<div style="float:left; " class="Textbox">
<div class="btn_icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></div><div style="display: inline-block;margin-top: 7px;"><p>&nbsp; Textbox</p></div>
</div>
<div style="float:right; " class="CommentTextbox">
<div class="btn_icon"><i class="fa fa-comments-o" aria-hidden="true"></i></div><div style="display: inline-block;margin-top: 7px;"><p>&nbsp; Comment Textbox</p></div>
</div>
</div>
<div>
<div style="float:left; " class="Scale">
<div class="btn_icon"><i class="fa fa-arrows-h" aria-hidden="true"></i></div><div style="display: inline-block;margin-top: 7px;"><p>&nbsp;  Scale </p></div>
</div>
<div style="float:right; " class="Rating">
<div class="btn_icon"><i class="fa fa-star" aria-hidden="true"></i></div><div style="display: inline-block;margin-top: 7px;"><p>&nbsp; Rating</p></div>
</div>
</div>
<div>
<div style="float:left; " class="Image">
<div class="btn_icon"><i class="fa fa-picture-o" aria-hidden="true"></i></div><div style="display: inline-block;margin-top: 7px;"><p>&nbsp;  Image </p></div>
</div>
<div style="float:right; " class="Video">
<div class="btn_icon"><i class="fa fa-video-camera" aria-hidden="true"></i></div><div style="display: inline-block;margin-top: 7px;"><p>&nbsp;  Video </p></div>
</div>
</div>
<div>
<div style="float:left;" class="ContactInformation">
<div class="btn_icon"><i class="fa fa-list-alt" aria-hidden="true"></i></div><div style="display: inline-block;margin-top: 7px;"><p>&nbsp; Contact Information</p></div>
</div>
</div>
</div>
<div class="custom_theme_inner" style='display:none;'>
<div class="accordion-inner" id='custom_theme_data'>
<div class="theme_selection">
<div style="vertical-align: top; margin:5px;" class="SurveyTheme">
<div>
<input type="radio" name="survey_theme" value="theme1" checked="checked" aria-label="Survey Theme" class="theme-radio">
<label class="theme-label">Innovative</label>
</div>
<label class='survey_theme_image'  style="background: url(custom/include/survey-img/theme1-hover.png); width: 100%;  color:#fff; ">
<img src="custom/include/survey-img/theme1-hover.png" class="zoom">
</label>
</div>
<div style="vertical-align: top; margin:5px;" class="SurveyTheme">
<div>
<input type="radio" name="survey_theme" value="theme2" aria-label="Survey Theme" class="theme-radio">
<label class="theme-label">Ultimate</label>
</div>
<label class='survey_theme_image' style="background: url(custom/include/survey-img/theme2-hover.png);width: 100%;  color:white;">
<img src="custom/include/survey-img/theme2-hover.png" class="zoom">
</label>
</div>
<div style="vertical-align: top; margin:5px;" class="SurveyTheme">
<div>
<input type="radio" name="survey_theme" value="theme3" aria-label="Survey Theme" class="theme-radio">
<label class="theme-label">Incredible</label>
</div>
<label class='survey_theme_image' style="background: url(custom/include/survey-img/theme3-hover.png); width: 100%;  color:white;">
<img src="custom/include/survey-img/theme3-hover.png" class="zoom">
</label>
</div>
<div style="vertical-align: top; margin:5px;" class="SurveyTheme">
<div>
<input type="radio" name="survey_theme" value="theme4" aria-label="Survey Theme" class="theme-radio">
<label class="theme-label">Agile</label>
</div>
<label class='survey_theme_image' style="background:url(custom/include/survey-img/theme4-hover.png); width: 100%;  color:white;">
<img src="custom/include/survey-img/theme4-hover.png" class="zoom">
</label>
</div>
<div style="vertical-align: top; margin:5px;" class="SurveyTheme">
<div>
<input type="radio" name="survey_theme" value="theme5" aria-label="Survey Theme" class="theme-radio">
<label class="theme-label">Contemporary</label>
</div>
<label class='survey_theme_image' style="background: url(custom/include/survey-img/theme5-hover.png); width: 100%;  color:white;">
<img src="custom/include/survey-img/theme5-hover.png" class="zoom">
</label>
</div>
<div style="vertical-align: top; margin:5px;" class="SurveyTheme">
<div>
<input type="radio" name="survey_theme" value="theme6" aria-label="Survey Theme" class="theme-radio">
<label class="theme-label">Creative</label>
</div>
<label class='survey_theme_image' style="background: url(custom/include/survey-img/theme6-hover.png); width: 100%;  color:white;">
<img src="custom/include/survey-img/theme6-hover.png" class="zoom">
</label>
</div>
<div style="vertical-align: top; margin:5px;" class="SurveyTheme">
<div>
<input type="radio" name="survey_theme" value="theme7" aria-label="Survey Theme" class="theme-radio">
<label class="theme-label">Proffesional</label>
</div>
<label class='survey_theme_image' style="background: url(custom/include/survey-img/theme7-hover.png); width: 100%;  color:white;">
<img src="custom/include/survey-img/theme7-hover.png" class="zoom">
</label>
</div>
<div style="vertical-align: top; margin:5px;" class="SurveyTheme">
<div>
<input type="radio" name="survey_theme" value="theme8" aria-label="Survey Theme" class="theme-radio">
<label class="theme-label">Elegant</label>
</div>
<label class='survey_theme_image' style="background: url(custom/include/survey-img/theme8-hover.png); width: 100%;  color:white;">
<img src="custom/include/survey-img/theme8-hover.png" class="zoom">
</label>
</div>
<div style="vertical-align: top; margin:5px;" class="SurveyTheme">
<div>
<input type="radio" name="survey_theme" value="theme9" aria-label="Survey Theme" class="theme-radio">
<label class="theme-label">Automated</label>
</div>
<label class='survey_theme_image' style="background: url(custom/include/survey-img/theme9-hover.png); width: 100%;  color:white;">
<img src="custom/include/survey-img/theme9-hover.png" class="zoom">
</label>
</div>
<div style="vertical-align: top; margin:5px;" class="SurveyTheme">
<div>
<input type="radio" name="survey_theme" value="theme10" aria-label="Survey Theme" class="theme-radio">
<label class="theme-label">Exclusive</label>
</div>
<label class='survey_theme_image' style="background: url(custom/include/survey-img/theme10-hover.png); width: 100%;  color:white;">
<img src="custom/include/survey-img/theme10-hover.png" class="zoom">
</label>
</div>
<div></div>
</div>
</div>
</div>
</div>
</div>
{else}
{counter name="panelFieldCount"}

{literal}
<script type="text/javascript" src="custom/include/js/survey_js/drag-drop.js"></script>
{/literal}
<form action="index.php" method="post" name="DetailView" id="formDetailView">
<input type="hidden" name="module" value="bc_survey_template">
<input type="hidden" name="record" value="{$template->id}">
<input type="hidden" name="return_action" value="index">
<input type="hidden" name="return_module" value="{$module}">
<input type="hidden" name="return_id" value="{$template->id}">
<input type="hidden" name="module_tab">
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="offset" value="1">
<input type="hidden" name="action" value="EditView">
<input type="hidden" name="sugar_body_only">
<div class="survey-view-section">
</div>
</form>
{/if}
{else}
<td></td><td></td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(2, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL1").style.display='none';</script>
{/if}
</div></div>

<script language="javascript">
    var _form_id = '{$form_id}';
    {literal}
    SUGAR.util.doWhen(function(){
        _form_id = (_form_id == '') ? 'EditView' : _form_id;
        return document.getElementById(_form_id) != null;
    }, SUGAR.themes.actionMenu);
    {/literal}
</script>
{assign var='place' value="_FOOTER"} <!-- to be used for id for buttons with custom code in def files-->
<div class="buttons">
<div class="action_buttons"><input title="{$APP.LBL_SAVE_BUTTON_TITLE}" id="SAVE_HEADER" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="validate()" type="button" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}"/> {if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module}&record={$smarty.request.return_id}'); return false;" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" type="button" id="CANCEL_FOOTER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {elseif empty($smarty.request.return_action) || empty($smarty.request.return_id) && !empty($fields.id.value)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=bc_survey'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module={$smarty.request.return_module}&record={$smarty.request.return_id}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {/if} {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=bc_survey", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</div>
</form>
{$set_focus_block}
<script>SUGAR.util.doWhen("document.getElementById('EditView') != null",
function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script><script type="text/javascript">
YAHOO.util.Event.onContentReady("EditView",
    function () {ldelim} initEditView(document.forms.EditView) {rdelim});
//window.setTimeout(, 100);
window.onbeforeunload = function () {ldelim} return onUnloadEditView(); {rdelim};

// bug 55468 -- IE is too aggressive with onUnload event
if ($.browser.msie) {ldelim}
$(document).ready(function() {ldelim}
    $(".collapseLink,.expandLink").click(function (e) {ldelim} e.preventDefault(); {rdelim});
  {rdelim});
{rdelim}

</script>{literal}
<script type="text/javascript">
addForm('EditView');addToValidate('EditView', 'name', 'name', true,'{/literal}{sugar_translate label='LBL_NAME' module='bc_survey' for_js=true}{literal}' );
addToValidate('EditView', 'date_entered_date', 'date', false,'Date Created' );
addToValidate('EditView', 'date_modified_date', 'date', false,'Date Modified' );
addToValidate('EditView', 'modified_user_id', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_MODIFIED' module='bc_survey' for_js=true}{literal}' );
addToValidate('EditView', 'modified_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_MODIFIED_NAME' module='bc_survey' for_js=true}{literal}' );
addToValidate('EditView', 'created_by', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_CREATED' module='bc_survey' for_js=true}{literal}' );
addToValidate('EditView', 'created_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_CREATED' module='bc_survey' for_js=true}{literal}' );
addToValidate('EditView', 'description', 'text', false,'{/literal}{sugar_translate label='LBL_DESCRIPTION' module='bc_survey' for_js=true}{literal}' );
addToValidate('EditView', 'deleted', 'bool', false,'{/literal}{sugar_translate label='LBL_DELETED' module='bc_survey' for_js=true}{literal}' );
addToValidate('EditView', 'assigned_user_id', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_ID' module='bc_survey' for_js=true}{literal}' );
addToValidate('EditView', 'assigned_user_name', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='bc_survey' for_js=true}{literal}' );
addToValidate('EditView', 'email_template_subject', 'name', true,'{/literal}{sugar_translate label='LBL_EMAIL_TEMPLATE_SUBJECT' module='bc_survey' for_js=true}{literal}' );
addToValidate('EditView', 'logo', 'varchar', false,'{/literal}{sugar_translate label='LBL_LOGO' module='bc_survey' for_js=true}{literal}' );
addToValidate('EditView', 'start_date_date', 'date', false,'Start Date' );
addToValidate('EditView', 'end_date_date', 'date', false,'End Date' );
addToValidate('EditView', 'theme', 'varchar', false,'{/literal}{sugar_translate label='LBL_THEME' module='bc_survey' for_js=true}{literal}' );
addToValidate('EditView', 'email_template', 'text', false,'{/literal}{sugar_translate label='LBL_EMAIL_TEMPLATE' module='bc_survey' for_js=true}{literal}' );
addToValidate('EditView', 'survey_page', 'AddSurveyPagefield', false,'{/literal}{sugar_translate label='LBL_SURVEY_PAGE' module='bc_survey' for_js=true}{literal}' );
addToValidate('EditView', 'redirect_url', 'url', false,'{/literal}{sugar_translate label='LBL_REDIRECT_URL' module='bc_survey' for_js=true}{literal}' );
addToValidate('EditView', 'is_progress', 'bool', false,'{/literal}{sugar_translate label='LBL_IS_PROGRESS' module='bc_survey' for_js=true}{literal}' );
addToValidate('EditView', 'base_score', 'int', false,'{/literal}{sugar_translate label='LBL_BASE_SCORE' module='bc_survey' for_js=true}{literal}' );
addToValidate('EditView', 'allowed_resubmit_count', 'int', false,'{/literal}{sugar_translate label='LBL_ALLOWED_RESUBMIT_COUNT' module='bc_survey' for_js=true}{literal}' );
addToValidate('EditView', 'bc_survey_bc_survey_template_name', 'relate', false,'{/literal}{sugar_translate label='LBL_BC_SURVEY_BC_SURVEY_TEMPLATE_FROM_BC_SURVEY_TEMPLATE_TITLE' module='bc_survey' for_js=true}{literal}' );
addToValidate('EditView', 'bc_survey_bc_survey_templatebc_survey_template_ida', 'id', false,'{/literal}{sugar_translate label='LBL_BC_SURVEY_BC_SURVEY_TEMPLATE_FROM_BC_SURVEY_TITLE' module='bc_survey' for_js=true}{literal}' );
addToValidateBinaryDependency('EditView', 'assigned_user_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='bc_survey' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_ASSIGNED_TO' module='bc_survey' for_js=true}{literal}', 'assigned_user_id' );
</script><script type=text/javascript>
SUGAR.util.doWhen('!SUGAR.util.ajaxCallInProgress() && ((typeof action_sugar_grp1 != "undefined" && action_sugar_grp1 == "Popup") || (typeof DCMenu != "undefined" && DCMenu.module))', function(){
SUGAR.forms.AssignmentHandler.registerView('EditView');
SUGAR.forms.AssignmentHandler.LINKS['EditView'] = {"created_by_link":{"relationship":"bc_survey_created_by","module":"Users","id_name":"created_by"},"modified_user_link":{"relationship":"bc_survey_modified_user","module":"Users","id_name":"modified_user_id"},"assigned_user_link":{"relationship":"bc_survey_assigned_user","module":"Users","id_name":"assigned_user_id"},"bc_survey_submission_bc_survey":{"relationship":"bc_survey_submission_bc_survey","module":"bc_survey_submission"},"bc_survey_users":{"relationship":"bc_survey_users","module":"Users"},"bc_survey_prospects":{"relationship":"bc_survey_prospects","module":"Prospects"},"bc_survey_leads":{"relationship":"bc_survey_leads","module":"Leads"},"bc_survey_pages_bc_survey":{"relationship":"bc_survey_pages_bc_survey","module":"bc_survey_pages"},"bc_survey_bc_survey_questions":{"relationship":"bc_survey_bc_survey_questions","module":"bc_survey_questions"},"bc_survey_accounts":{"relationship":"bc_survey_accounts","module":"Accounts"},"bc_survey_bc_survey_template":{"relationship":"bc_survey_bc_survey_template","module":"bc_survey_template"},"bc_survey_bc_survey_template_right":{"relationship":"bc_survey_bc_survey_template","id_name":"bc_survey_bc_survey_templatebc_survey_template_ida","module":"bc_survey_template"},"bc_survey_contacts":{"relationship":"bc_survey_contacts","module":"Contacts"}}

YAHOO.util.Event.onContentReady('EditView', SUGAR.forms.AssignmentHandler.loadComplete);});</script>{/literal}
