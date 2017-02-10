

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
<input type="hidden" name="opportunity_id" value="{$smarty.request.opportunity_id}">   
<input type="hidden" name="lead_id" value="{$lead_id}">   
<input type="hidden" name="case_id" value="{$smarty.request.case_id}">   
<input type="hidden" name="bug_id" value="{$smarty.request.bug_id}">   
<input type="hidden" name="email_id" value="{$smarty.request.email_id}">   
<input type="hidden" name="inbound_email_id" value="{$smarty.request.inbound_email_id}">   
<input type="hidden" name="assigned_user_id_2" value="{$assigned_user_id_2}">   
<input type="hidden" id="contact_id" name value="{$fields.contact_id.value}">   
<input type="hidden" id="team_type" name value="{$team_type}">   
<div class="action_buttons">{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('EditView'); {if $isDuplicate}_form.return_id.value=''; {/if}_form.action.value='Save'; if(check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}" id="SAVE_HEADER">{/if}  {if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module}&record={$smarty.request.return_id}'); return false;" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" type="button" id="CANCEL_HEADER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {elseif empty($smarty.request.return_action) || empty($smarty.request.return_id) && !empty($fields.id.value)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=Contacts'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module={$smarty.request.return_module}&record={$smarty.request.return_id}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {/if} {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=Contacts", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
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
<div id="detailpanel_1" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>&nbsp;&nbsp;
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(1);">
<img border="0" id="detailpanel_1_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(1);">
<img border="0" id="detailpanel_1_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_CONTACT_INFORMATION' module='Contacts'}
<script>
document.getElementById('detailpanel_1').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_CONTACT_INFORMATION'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.name.acl > 1 || ($showDetailData && $fields.name.acl > 0)}
<td valign="top" id='name_label' width='12.5%' scope="col">
<label for="name">{$MOD.LBL_NAME} <span class="required">*</span></label>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.name.acl > 1}
{counter name="panelFieldCount"}
<input accesskey="7"  tabindex="0"  name="last_name" id="last_name" placeholder="{$MOD.LBL_LAST_NAME|replace:':':''}" style="width:120px !important" size="15" type="text"  value="{$fields.last_name.value}">
&nbsp;<input accesskey="7"  tabindex="0"  name="first_name" id="first_name" placeholder="{$MOD.LBL_FIRST_NAME|replace:':':''}" style="width:120px !important" size="15" type="text" value="{$fields.first_name.value}"> </br>
<span style=" color: #A99A9A; font-style: italic;"> Bùi Vũ Thanh An  </br> Last Name: Bùi Vũ Thanh </br> First Name:  An </span>
{else}
</td>
<td></td><td></td>
</td>		
{/if}
{else}
<td></td><td></td>
{/if}
{if $fields.picture.acl > 1 || ($showDetailData && $fields.picture.acl > 0)}
<td valign="top" id='picture_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PICTURE_FILE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.picture.acl > 1}
{counter name="panelFieldCount"}


{if !empty($fields.picture.value) }
{assign var=showRemove value=true}
{else}
{assign var=showRemove value=false}
{/if}
{assign var=noChange value=false}
<input type="hidden" name="deleteAttachment" value="0">
<input type="hidden" name="{$fields.picture.name}" id="{$fields.picture.name}" value="{$fields.picture.value}">
<span id="{$fields.picture.name}_old" style="display:{if !$showRemove}none;{/if}">
<img src="custom/include/surveylogo_images/{$fields.picture.value}" height="100px" class="tabDetailViewDFLink">
{if !$noChange}
<input type='button' class='button' id='remove_button' value='{$APP.LBL_REMOVE}' onclick='SUGAR.field.file.deleteAttachment("{$fields.picture.name}","",this);'>
{/if}
</span>
{if !$noChange}
<span id="{$fields.picture.name}_new" class="survey-logo-selection" style="display:{if $showRemove}none;{/if}">
<input type="hidden" name="{$fields.picture.name}_escaped">
<input id="{$fields.picture.name}_file" name="{$fields.picture.name}_file" 
type="file" title='' size="30"
maxlength='255'
>&nbsp;&nbsp;<img title="The max upload image size should be 300px." src="themes/Sugar5/images/helpInline.gif?v=9F2a81TErGINGVZgMbDjow">
{else}

{/if}
</span>
{else}
{counter name="panelFieldCount"}


<span class="sugar_field" id="{$fields.picture.name}">
<a href="index.php?entryPoint=download&id={$fields.id.value}&type={$module}" class="tabDetailViewDFLink" target='_blank'>{$fields.picture.value}</a>
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
{if $fields.nick_name.acl > 1 || ($showDetailData && $fields.nick_name.acl > 0)}
<td valign="top" id='nick_name_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_NICK_NAME' module='Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.nick_name.acl > 1}
{counter name="panelFieldCount"}

{if strlen($fields.nick_name.value) <= 0}
{assign var="value" value=$fields.nick_name.default_value }
{else}
{assign var="value" value=$fields.nick_name.value }
{/if}  
<input type='text' name='{$fields.nick_name.name}' 
id='{$fields.nick_name.name}' size='30' 
maxlength='100' 
value='{$value}' title=''      >
{else}
{counter name="panelFieldCount"}

{if strlen($fields.nick_name.value) <= 0}
{assign var="value" value=$fields.nick_name.default_value }
{else}
{assign var="value" value=$fields.nick_name.value }
{/if} 
<span class="sugar_field" id="{$fields.nick_name.name}">{$fields.nick_name.value}</span>
{/if}
{else}
<td></td><td></td>
{/if}
{if $fields.birthdate.acl > 1 || ($showDetailData && $fields.birthdate.acl > 0)}
<td valign="top" id='birthdate_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_BIRTHDATE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.birthdate.acl > 1}
{counter name="panelFieldCount"}

<span class="dateTime">
{assign var=date_value value=$fields.birthdate.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.birthdate.name}" id="{$fields.birthdate.name}" value="{$date_value}" title=''  tabindex='0'    size="11" maxlength="10" >
{capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="{$fields.birthdate.name}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}
</span>
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "{$fields.birthdate.name}",
ifFormat : "{$CALENDAR_FORMAT}",
daFormat : "{$CALENDAR_FORMAT}",
button : "{$fields.birthdate.name}_trigger",
singleClick : true,
dateStr : "{$date_value}",
startWeekday: {$CALENDAR_FDOW|default:'0'},
step : 1,
weekNumbers:false
{rdelim}
);
</script>
{else}
{counter name="panelFieldCount"}


{if strlen($fields.birthdate.value) <= 0}
{assign var="value" value=$fields.birthdate.default_value }
{else}
{assign var="value" value=$fields.birthdate.value }
{/if}
<span class="sugar_field" id="{$fields.birthdate.name}">{$value}</span>
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
{if $fields.gender.acl > 1 || ($showDetailData && $fields.gender.acl > 0)}
<td valign="top" id='gender_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_GENDER' module='Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.gender.acl > 1}
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.gender.name}" 
id="{$fields.gender.name}" 
title=''       
>
{if isset($fields.gender.value) && $fields.gender.value != ''}
{html_options options=$fields.gender.options selected=$fields.gender.value}
{else}
{html_options options=$fields.gender.options selected=$fields.gender.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.gender.options }
{capture name="field_val"}{$fields.gender.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.gender.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.gender.name}" 
id="{$fields.gender.name}" 
title=''          
>
{if isset($fields.gender.value) && $fields.gender.value != ''}
{html_options options=$fields.gender.options selected=$fields.gender.value}
{else}
{html_options options=$fields.gender.options selected=$fields.gender.default}
{/if}
</select>
<input
id="{$fields.gender.name}-input"
name="{$fields.gender.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.gender.name}-image"></button><button type="button"
id="btn-clear-{$fields.gender.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.gender.name}-input', '{$fields.gender.name}');sync_{$fields.gender.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.gender.name}{literal}");
if (typeof select_defaults =="undefined")
select_defaults = [];
select_defaults[selectElem.id] = {key:selectElem.value,text:''};
//get default
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value)
select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
}
//SUGAR.AutoComplete.{$ac_key}.ds = 
//get options array from vardefs
var options = SUGAR.AutoComplete.getOptionsArray("");
YUI().use('datasource', 'datasource-jsonschema',function (Y) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds = new Y.DataSource.Function({
source: function (request) {
var ret = [];
for (i=0;i<selectElem.options.length;i++)
if (!(selectElem.options[i].value=='' && selectElem.options[i].innerHTML==''))
ret.push({'key':selectElem.options[i].value,'text':selectElem.options[i].innerHTML});
return ret;
}
});
});
})();
{/literal}
{literal}
YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
{/literal}
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.gender.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.gender.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.gender.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.gender.name}{literal}");
var doSimulateChange = false;
if (selectElem.value!=selectme)
doSimulateChange=true;
selectElem.value=selectme;
for (i=0;i<selectElem.options.length;i++){
selectElem.options[i].selected=false;
if (selectElem.options[i].value==selectme)
selectElem.options[i].selected=true;
}
if (doSimulateChange)
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('change');
}
//global variable 
sync_{/literal}{$fields.gender.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.gender.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.gender.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.gender.name}{literal}", syncFromHiddenToWidget);
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 0;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 0;
SUGAR.AutoComplete.{$ac_key}.numOptions = {$field_options|@count};
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 300) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 200;
{literal}
}
{/literal}
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 3000) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 500;
{literal}
}
{/literal}
SUGAR.AutoComplete.{$ac_key}.optionsVisible = false;
{literal}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.plug(Y.Plugin.AutoComplete, {
activateFirstItem: true,
{/literal}
minQueryLength: SUGAR.AutoComplete.{$ac_key}.minQLen,
queryDelay: SUGAR.AutoComplete.{$ac_key}.queryDelay,
zIndex: 99999,
{literal}
source: SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds,
resultTextLocator: 'text',
resultHighlighter: 'phraseMatch',
resultFilters: 'phraseMatch',
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover = function(ex){
var hover = YAHOO.util.Dom.getElementsByClassName('dccontent');
if(hover[0] != null){
if (ex) {
var h = '1000px';
hover[0].style.height = h;
}
else{
hover[0].style.height = '';
}
}
}
if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
// expand the dropdown options upon focus
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = true;
});
}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('click', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('click');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('dblclick', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('dblclick');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('focus');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mouseup', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mouseup');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mousedown', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mousedown');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('blur');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = false;
var selectElem = document.getElementById("{/literal}{$fields.gender.name}{literal}");
//if typed value is a valid option, do nothing
for (i=0;i<selectElem.options.length;i++)
if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value'))
return;
//typed value is invalid, so set the text and the hidden to blank
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value', select_defaults[selectElem.id].text);
SyncToHidden(select_defaults[selectElem.id].key);
});
// when they click on the arrow image, toggle the visibility of the options
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputImage.ancestor().on('click', function () {
if (SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.blur();
} else {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.focus();
}
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('query', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.set('value', '');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('visibleChange', function (e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover(e.newVal); // expand
});
// when they select an option, set the hidden input with the KEY, to be saved
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('select', function(e) {
SyncToHidden(e.result.raw.key);
});
});
</script> 
{/literal}
{/if}
{else}
{counter name="panelFieldCount"}


{if is_string($fields.gender.options)}
<input type="hidden" class="sugar_field" id="{$fields.gender.name}" value="{ $fields.gender.options }">
{ $fields.gender.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.gender.name}" value="{ $fields.gender.value }">
{ $fields.gender.options[$fields.gender.value]}
{/if}
{/if}
{else}
<td></td><td></td>
{/if}
{if $fields.j_school_contacts_1_name.acl > 1 || ($showDetailData && $fields.j_school_contacts_1_name.acl > 0)}
<td valign="top" id='j_school_contacts_1_name_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_J_SCHOOL_CONTACTS_1_FROM_J_SCHOOL_TITLE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.j_school_contacts_1_name.acl > 1}
{counter name="panelFieldCount"}

<input type="text" name="{$fields.j_school_contacts_1_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.j_school_contacts_1_name.name}" size="" value="{$fields.j_school_contacts_1_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.j_school_contacts_1_name.id_name}" 
id="{$fields.j_school_contacts_1_name.id_name}" 
value="{$fields.j_school_contacts_1j_school_ida.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.j_school_contacts_1_name.name}" id="btn_{$fields.j_school_contacts_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup(
"{$fields.j_school_contacts_1_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"j_school_contacts_1j_school_ida","name":"j_school_contacts_1_name"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.j_school_contacts_1_name.name}" id="btn_clr_{$fields.j_school_contacts_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.j_school_contacts_1_name.name}', '{$fields.j_school_contacts_1_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.j_school_contacts_1_name.name}']) != 'undefined'",
		enableQS
);
</script>
{else}
{counter name="panelFieldCount"}

{if !empty($fields.j_school_contacts_1j_school_ida.value)}
{capture assign="detail_url"}index.php?module=J_School&action=DetailView&record={$fields.j_school_contacts_1j_school_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="j_school_contacts_1j_school_ida" class="sugar_field" data-id-value="{$fields.j_school_contacts_1j_school_ida.value}">{$fields.j_school_contacts_1_name.value}</span>
{if !empty($fields.j_school_contacts_1j_school_ida.value)}</a>{/if}
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
{if $fields.description.acl > 1 || ($showDetailData && $fields.description.acl > 0)}
<td valign="top" id='description_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='Contacts'}{/capture}
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
cols="60" 
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
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(1, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_CONTACT_INFORMATION").style.display='none';</script>
{/if}
<div id="detailpanel_2" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>&nbsp;&nbsp;
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(2);">
<img border="0" id="detailpanel_2_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(2);">
<img border="0" id="detailpanel_2_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_PANEL_COMPANY' module='Contacts'}
<script>
document.getElementById('detailpanel_2').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_PANEL_COMPANY'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.guardian_name.acl > 1 || ($showDetailData && $fields.guardian_name.acl > 0)}
<td valign="top" id='guardian_name_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PARENT' module='Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.guardian_name.acl > 1}
{counter name="panelFieldCount"}
<input accesskey=""  tabindex="0"  id = "guardian_name_autocomplete" style="width: 274px;" name = "guardian_name" class = "guardian_name" value ="{$field.c_contacts_contacts_1_name.value}" type="text">
<input accesskey=""  tabindex="0"  id = "c_contacts_contacts_1c_contacts_ida" name = "c_contacts_contacts_1c_contacts_ida" class = "c_contacts_contacts_1c_contacts_ida" value ="{$field.c_contacts_contacts_1c_contacts_ida.value}" type="hidden">
<input accesskey=""  tabindex="0"  id = "c_contacts_contacts_1_name" name = "c_contacts_contacts_1_name" class = "c_contacts_contacts_1_name" value ="{$field.c_contacts_contacts_1_name.value}" type="hidden">
{else}
</td>
<td></td><td></td>
</td>		
{/if}
{else}
<td></td><td></td>
{/if}
{if $fields.contact_rela.acl > 1 || ($showDetailData && $fields.contact_rela.acl > 0)}
<td valign="top" id='contact_rela_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_CONTACT_RELA' module='Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.contact_rela.acl > 1}
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.contact_rela.name}" 
id="{$fields.contact_rela.name}" 
title=''       
>
{if isset($fields.contact_rela.value) && $fields.contact_rela.value != ''}
{html_options options=$fields.contact_rela.options selected=$fields.contact_rela.value}
{else}
{html_options options=$fields.contact_rela.options selected=$fields.contact_rela.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.contact_rela.options }
{capture name="field_val"}{$fields.contact_rela.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.contact_rela.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.contact_rela.name}" 
id="{$fields.contact_rela.name}" 
title=''          
>
{if isset($fields.contact_rela.value) && $fields.contact_rela.value != ''}
{html_options options=$fields.contact_rela.options selected=$fields.contact_rela.value}
{else}
{html_options options=$fields.contact_rela.options selected=$fields.contact_rela.default}
{/if}
</select>
<input
id="{$fields.contact_rela.name}-input"
name="{$fields.contact_rela.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.contact_rela.name}-image"></button><button type="button"
id="btn-clear-{$fields.contact_rela.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.contact_rela.name}-input', '{$fields.contact_rela.name}');sync_{$fields.contact_rela.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.contact_rela.name}{literal}");
if (typeof select_defaults =="undefined")
select_defaults = [];
select_defaults[selectElem.id] = {key:selectElem.value,text:''};
//get default
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value)
select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
}
//SUGAR.AutoComplete.{$ac_key}.ds = 
//get options array from vardefs
var options = SUGAR.AutoComplete.getOptionsArray("");
YUI().use('datasource', 'datasource-jsonschema',function (Y) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds = new Y.DataSource.Function({
source: function (request) {
var ret = [];
for (i=0;i<selectElem.options.length;i++)
if (!(selectElem.options[i].value=='' && selectElem.options[i].innerHTML==''))
ret.push({'key':selectElem.options[i].value,'text':selectElem.options[i].innerHTML});
return ret;
}
});
});
})();
{/literal}
{literal}
YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
{/literal}
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.contact_rela.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.contact_rela.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.contact_rela.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.contact_rela.name}{literal}");
var doSimulateChange = false;
if (selectElem.value!=selectme)
doSimulateChange=true;
selectElem.value=selectme;
for (i=0;i<selectElem.options.length;i++){
selectElem.options[i].selected=false;
if (selectElem.options[i].value==selectme)
selectElem.options[i].selected=true;
}
if (doSimulateChange)
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('change');
}
//global variable 
sync_{/literal}{$fields.contact_rela.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.contact_rela.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.contact_rela.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.contact_rela.name}{literal}", syncFromHiddenToWidget);
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 0;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 0;
SUGAR.AutoComplete.{$ac_key}.numOptions = {$field_options|@count};
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 300) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 200;
{literal}
}
{/literal}
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 3000) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 500;
{literal}
}
{/literal}
SUGAR.AutoComplete.{$ac_key}.optionsVisible = false;
{literal}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.plug(Y.Plugin.AutoComplete, {
activateFirstItem: true,
{/literal}
minQueryLength: SUGAR.AutoComplete.{$ac_key}.minQLen,
queryDelay: SUGAR.AutoComplete.{$ac_key}.queryDelay,
zIndex: 99999,
{literal}
source: SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds,
resultTextLocator: 'text',
resultHighlighter: 'phraseMatch',
resultFilters: 'phraseMatch',
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover = function(ex){
var hover = YAHOO.util.Dom.getElementsByClassName('dccontent');
if(hover[0] != null){
if (ex) {
var h = '1000px';
hover[0].style.height = h;
}
else{
hover[0].style.height = '';
}
}
}
if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
// expand the dropdown options upon focus
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = true;
});
}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('click', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('click');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('dblclick', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('dblclick');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('focus');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mouseup', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mouseup');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mousedown', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mousedown');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('blur');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = false;
var selectElem = document.getElementById("{/literal}{$fields.contact_rela.name}{literal}");
//if typed value is a valid option, do nothing
for (i=0;i<selectElem.options.length;i++)
if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value'))
return;
//typed value is invalid, so set the text and the hidden to blank
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value', select_defaults[selectElem.id].text);
SyncToHidden(select_defaults[selectElem.id].key);
});
// when they click on the arrow image, toggle the visibility of the options
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputImage.ancestor().on('click', function () {
if (SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.blur();
} else {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.focus();
}
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('query', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.set('value', '');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('visibleChange', function (e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover(e.newVal); // expand
});
// when they select an option, set the hidden input with the KEY, to be saved
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('select', function(e) {
SyncToHidden(e.result.raw.key);
});
});
</script> 
{/literal}
{/if}
{else}
{counter name="panelFieldCount"}


{if is_string($fields.contact_rela.options)}
<input type="hidden" class="sugar_field" id="{$fields.contact_rela.name}" value="{ $fields.contact_rela.options }">
{ $fields.contact_rela.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.contact_rela.name}" value="{ $fields.contact_rela.value }">
{ $fields.contact_rela.options[$fields.contact_rela.value]}
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
{if $fields.phone_mobile.acl > 1 || ($showDetailData && $fields.phone_mobile.acl > 0)}
<td valign="top" id='phone_mobile_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_MOBILE_PHONE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.phone_mobile.acl > 1}
{counter name="panelFieldCount"}
<span id='phone_mobile_span'>
{$fields.phone_mobile.value}</span>
{else}
{counter name="panelFieldCount"}
<span id='phone_mobile_span'>
{$fields.phone_mobile.value}
</span>
{/if}
{else}
<td></td><td></td>
{/if}
{if $fields.other_mobile.acl > 1 || ($showDetailData && $fields.other_mobile.acl > 0)}
<td valign="top" id='other_mobile_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_OTHER_MOBILE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.other_mobile.acl > 1}
{counter name="panelFieldCount"}

{if strlen($fields.other_mobile.value) <= 0}
{assign var="value" value=$fields.other_mobile.default_value }
{else}
{assign var="value" value=$fields.other_mobile.value }
{/if}  
<input type='text' name='{$fields.other_mobile.name}' id='{$fields.other_mobile.name}' size='30' maxlength='50' value='{$value}' title='' tabindex='0'	  class="phone" >
{else}
{counter name="panelFieldCount"}

{if !empty($fields.other_mobile.value)}
{assign var="phone_value" value=$fields.other_mobile.value }
{sugar_phone value=$phone_value usa_format="0"}
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
{if $fields.do_not_call.acl > 1 || ($showDetailData && $fields.do_not_call.acl > 0)}
<td valign="top" id='do_not_call_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_DO_NOT_CALL' module='Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' colspan='3'>
{if $fields.do_not_call.acl > 1}
{counter name="panelFieldCount"}

{if strval($fields.do_not_call.value) == "1" || strval($fields.do_not_call.value) == "yes" || strval($fields.do_not_call.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.do_not_call.name}" value="0"> 
<input type="checkbox" id="{$fields.do_not_call.name}" 
name="{$fields.do_not_call.name}" 
value="1" title='' tabindex="0" {$checked} >
{else}
{counter name="panelFieldCount"}

{if strval($fields.do_not_call.value) == "1" || strval($fields.do_not_call.value) == "yes" || strval($fields.do_not_call.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.do_not_call.name}" id="{$fields.do_not_call.name}" value="$fields.do_not_call.value" disabled="true" {$checked}>
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
{if $fields.relationship.acl > 1 || ($showDetailData && $fields.relationship.acl > 0)}
<td valign="top" id='relationship_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_RELATIONSHIP' module='Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.relationship.acl > 1}
{counter name="panelFieldCount"}
{include file ="custom/modules/Contacts/tpls/addRelationship.tpl"}
{else}
</td>
<td></td><td></td>
</td>		
{/if}
{else}
<td></td><td></td>
{/if}
{if $fields.phone_other.acl > 1 || ($showDetailData && $fields.phone_other.acl > 0)}
<td valign="top" id='phone_other_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_OTHER_PHONE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.phone_other.acl > 1}
{counter name="panelFieldCount"}

{if strlen($fields.phone_other.value) <= 0}
{assign var="value" value=$fields.phone_other.default_value }
{else}
{assign var="value" value=$fields.phone_other.value }
{/if}  
<input type='text' name='{$fields.phone_other.name}' id='{$fields.phone_other.name}' size='30' maxlength='100' value='{$value}' title='' tabindex='0'	  class="phone" >
{else}
{counter name="panelFieldCount"}

{if !empty($fields.phone_other.value)}
{assign var="phone_value" value=$fields.phone_other.value }
{sugar_phone value=$phone_value usa_format="0"}
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
{if $fields.describe_relationship.acl > 1 || ($showDetailData && $fields.describe_relationship.acl > 0)}
<td valign="top" id='describe_relationship_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIBE_RELATIONSHIP' module='Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.describe_relationship.acl > 1}
{counter name="panelFieldCount"}

{if empty($fields.describe_relationship.value)}
{assign var="value" value=$fields.describe_relationship.default_value }
{else}
{assign var="value" value=$fields.describe_relationship.value }
{/if}  
<textarea  id='{$fields.describe_relationship.name}' name='{$fields.describe_relationship.name}'
rows="4" 
cols="40" 
title='help' tabindex="0" 
 >{$value}</textarea>
{else}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.describe_relationship.name|escape:'html'|url2html|nl2br}">{$fields.describe_relationship.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
{/if}
{else}
<td></td><td></td>
{/if}
{if $fields.primary_address_street.acl > 1 || ($showDetailData && $fields.primary_address_street.acl > 0)}
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' colspan='2'>
{if $fields.primary_address_street.acl > 1}
{counter name="panelFieldCount"}

<!--Include Google Maps API: Add by Tung Bui: 13/10/2015-->
<script type="text/javascript" src='https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places'></script>
{sugar_getscript file='include/SugarFields/Fields/Address/SugarFieldAddress.js'}
<fieldset id='PRIMARY_address_fieldset'>
<legend>{sugar_translate label='LBL_PRIMARY_ADDRESS' module=''}</legend>
<table border="0" cellspacing="1" cellpadding="0" class="edit" width="100%">
<tr>
<td valign="top" id="primary_address_street_label" width='25%' scope='row' >
<label for='primary_address_street'>{sugar_translate label='LBL_STREET' module=''}:</label>
{if $fields.primary_address_street.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td width="*">
<input type="text" id="primary_address_street" class="address_autocomplete" name="primary_address_street" maxlength="150" size="30"   value='{$fields.primary_address_street.value}' />
<input type="hidden" class="longitude" name="primary_address_longitude" id="primary_address_longitude" value="{$fields.primary_address_longitude.value}">
<input type="hidden" class="latitude" name="primary_address_latitude" id="primary_address_latitude" value="{$fields.primary_address_latitude.value}">
</td>
</tr>
<tr>
<td id="primary_address_city_label" width='%' scope='row' >
<label for='primary_address_city'>{sugar_translate label='LBL_CITY' module=''}:</label>
{if $fields.primary_address_city.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="primary_address_city" id="primary_address_city" size="30" maxlength='150' value='{$fields.primary_address_city.value}'  >
</td>
</tr>
<tr>
<td id="primary_address_state_label" width='%' scope='row' >
<label for='primary_address_state'>{sugar_translate label='LBL_STATE' module=''}:</label>
{if $fields.primary_address_state.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="primary_address_state" id="primary_address_state" size="30" maxlength='150' value='{$fields.primary_address_state.value}'  >
</td>
</tr>
<tr>
<td id="primary_address_country_label" width='%' scope='row' >
<label for='primary_address_country'>{sugar_translate label='LBL_COUNTRY' module=''}:</label>
{if $fields.primary_address_country.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="primary_address_country" id="primary_address_country" size="30" maxlength='150' value='{$fields.primary_address_country.value}'  >
</td>
</tr>
<tr>
<td colspan='2' NOWRAP>&nbsp;</td>
</tr>
</table>
</fieldset>   
<script type="text/javascript">
    SUGAR.util.doWhen("typeof(SUGAR.AddressField) != 'undefined'", function(){ldelim}
    primary_address = new SUGAR.AddressField("primary_checkbox",'', 'primary');
    {rdelim});
</script>
{else}
{counter name="panelFieldCount"}

{sugar_getscript file='include/SugarFields/Fields/Address/DisplayMap.js'}
<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td width='99%' >
<input type="hidden" class="sugar_field" id="primary_address_street" value="{$fields.primary_address_street.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="primary_address_city" value="{$fields.primary_address_city.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="primary_address_state" value="{$fields.primary_address_state.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="primary_address_country" value="{$fields.primary_address_country.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="primary_address_postalcode" value="{$fields.primary_address_postalcode.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="primary_address_latitude" value="{$fields.primary_address_latitude.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="primary_address_longitude" value="{$fields.primary_address_longitude.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<!--Custom code by Bui Kim Tung -- Hide View_map button when address street is empty-->
<!--End custom code by Bui Kim Tung-->
{$fields.primary_address_street.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}<br/>
<!--{$fields.primary_address_state.value|escape:'htmlentitydecode'|strip_tags|url2html|nl2br}<br/>
{$fields.primary_address_city.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}<br/> 
{$fields.primary_address_postalcode.value|escape:'htmlentitydecode'|strip_tags|url2html|nl2br}
{$fields.primary_address_country.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}-->
{if ! empty($fields.primary_address_street.value)}
<br/><input type="button"  id="view_map_primary" onclick="displayMap(this)" value="{$APP.LBL_VIEW_MAP}">  
{/if}
</td>
<td class='dataField' width='1%'>
{$custom_code_primary}
</td>
</tr>
</table>
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
{if $fields.email1.acl > 1 || ($showDetailData && $fields.email1.acl > 0)}
<td valign="top" id='email1_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_EMAIL_ADDRESS' module='Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.email1.acl > 1}
{counter name="panelFieldCount"}
<span id='email1_span'>
{$fields.email1.value}</span>
{else}
{counter name="panelFieldCount"}
<span id='email1_span'>
{$fields.email1.value}
</span>
{/if}
{else}
<td></td><td></td>
{/if}
{if $fields.alt_address_street.acl > 1 || ($showDetailData && $fields.alt_address_street.acl > 0)}
<td valign="top" id='alt_address_street_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_ALTERNATE_ADDRESS' module='Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.alt_address_street.acl > 1}
{counter name="panelFieldCount"}
<textarea accesskey=""  tabindex="0"  rows="2" cols="30" name="alt_address_street" >{$fields.alt_address_street.value}</textarea>
{else}
</td>
<td></td><td></td>
</td>		
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
{if $fields.account_name.acl > 1 || ($showDetailData && $fields.account_name.acl > 0)}
<td valign="top" id='account_name_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_ACCOUNT_NAME' module='Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.account_name.acl > 1}
{counter name="panelFieldCount"}

<input type="text" name="{$fields.account_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.account_name.name}" size="" value="{$fields.account_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.account_name.id_name}" 
id="{$fields.account_name.id_name}" 
value="{$fields.account_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.account_name.name}" id="btn_{$fields.account_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_LABEL"}"
onclick='open_popup(
"{$fields.account_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"account_id","name":"account_name","phone_office":"phone_work"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.account_name.name}" id="btn_clr_{$fields.account_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.account_name.name}', '{$fields.account_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.account_name.name}']) != 'undefined'",
		enableQS
);
</script>
{else}
{counter name="panelFieldCount"}

{if !empty($fields.account_id.value)}
{capture assign="detail_url"}index.php?module=Accounts&action=DetailView&record={$fields.account_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="account_id" class="sugar_field" data-id-value="{$fields.account_id.value}">{$fields.account_name.value}</span>
{if !empty($fields.account_id.value)}</a>{/if}
{/if}
{else}
<td></td><td></td>
{/if}
{if $fields.phone_work.acl > 1 || ($showDetailData && $fields.phone_work.acl > 0)}
<td valign="top" id='phone_work_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_OFFICE_PHONE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.phone_work.acl > 1}
{counter name="panelFieldCount"}

{if strlen($fields.phone_work.value) <= 0}
{assign var="value" value=$fields.phone_work.default_value }
{else}
{assign var="value" value=$fields.phone_work.value }
{/if}  
<input type='text' name='{$fields.phone_work.name}' id='{$fields.phone_work.name}' size='30' maxlength='100' value='{$value}' title='' tabindex='0'	  class="phone" >
{else}
{counter name="panelFieldCount"}

{if !empty($fields.phone_work.value)}
{assign var="phone_value" value=$fields.phone_work.value }
{sugar_phone value=$phone_value usa_format="0"}
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
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(2, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_PANEL_COMPANY").style.display='none';</script>
{/if}
<div id="detailpanel_3" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>&nbsp;&nbsp;
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(3);">
<img border="0" id="detailpanel_3_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(3);">
<img border="0" id="detailpanel_3_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_EDITVIEW_PANEL1' module='Contacts'}
<script>
document.getElementById('detailpanel_3').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_EDITVIEW_PANEL1'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.study_apollo_before.acl > 1 || ($showDetailData && $fields.study_apollo_before.acl > 0)}
<td valign="top" id='study_apollo_before_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_STUDY_APOLLO_BEFORE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.study_apollo_before.acl > 1}
{counter name="panelFieldCount"}

{if empty($fields.study_apollo_before.value)}
{assign var="value" value=$fields.study_apollo_before.default_value }
{else}
{assign var="value" value=$fields.study_apollo_before.value }
{/if}  
<textarea  id='{$fields.study_apollo_before.name}' name='{$fields.study_apollo_before.name}'
rows="4" 
cols="40" 
title='' tabindex="0" 
 >{$value}</textarea>
{else}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.study_apollo_before.name|escape:'html'|url2html|nl2br}">{$fields.study_apollo_before.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
{/if}
{else}
<td></td><td></td>
{/if}
{if $fields.study_other_before.acl > 1 || ($showDetailData && $fields.study_other_before.acl > 0)}
<td valign="top" id='study_other_before_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_STUDY_OTHER_BEFORE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.study_other_before.acl > 1}
{counter name="panelFieldCount"}

{if empty($fields.study_other_before.value)}
{assign var="value" value=$fields.study_other_before.default_value }
{else}
{assign var="value" value=$fields.study_other_before.value }
{/if}  
<textarea  id='{$fields.study_other_before.name}' name='{$fields.study_other_before.name}'
rows="4" 
cols="40" 
title='' tabindex="0" 
 >{$value}</textarea>
{else}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.study_other_before.name|escape:'html'|url2html|nl2br}">{$fields.study_other_before.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
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
{if $fields.time_study_english.acl > 1 || ($showDetailData && $fields.time_study_english.acl > 0)}
<td valign="top" id='time_study_english_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_TIME_STUDY_ENGLISH' module='Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.time_study_english.acl > 1}
{counter name="panelFieldCount"}

{if empty($fields.time_study_english.value)}
{assign var="value" value=$fields.time_study_english.default_value }
{else}
{assign var="value" value=$fields.time_study_english.value }
{/if}  
<textarea  id='{$fields.time_study_english.name}' name='{$fields.time_study_english.name}'
rows="4" 
cols="40" 
title='' tabindex="0" 
 >{$value}</textarea>
{else}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.time_study_english.name|escape:'html'|url2html|nl2br}">{$fields.time_study_english.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
{/if}
{else}
<td></td><td></td>
{/if}
{if $fields.study_with_before.acl > 1 || ($showDetailData && $fields.study_with_before.acl > 0)}
<td valign="top" id='study_with_before_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_STUDY_WITH_BEFORE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.study_with_before.acl > 1}
{counter name="panelFieldCount"}

{if empty($fields.study_with_before.value)}
{assign var="value" value=$fields.study_with_before.default_value }
{else}
{assign var="value" value=$fields.study_with_before.value }
{/if}  
<textarea  id='{$fields.study_with_before.name}' name='{$fields.study_with_before.name}'
rows="4" 
cols="40" 
title='' tabindex="0" 
 >{$value}</textarea>
{else}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.study_with_before.name|escape:'html'|url2html|nl2br}">{$fields.study_with_before.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
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
{if $fields.strong_skills.acl > 1 || ($showDetailData && $fields.strong_skills.acl > 0)}
<td valign="top" id='strong_skills_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_STRONG_SKILLS' module='Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.strong_skills.acl > 1}
{counter name="panelFieldCount"}

{if empty($fields.strong_skills.value)}
{assign var="value" value=$fields.strong_skills.default_value }
{else}
{assign var="value" value=$fields.strong_skills.value }
{/if}  
<textarea  id='{$fields.strong_skills.name}' name='{$fields.strong_skills.name}'
rows="4" 
cols="40" 
title='' tabindex="0" 
 >{$value}</textarea>
{else}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.strong_skills.name|escape:'html'|url2html|nl2br}">{$fields.strong_skills.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
{/if}
{else}
<td></td><td></td>
{/if}
{if $fields.weak_skills.acl > 1 || ($showDetailData && $fields.weak_skills.acl > 0)}
<td valign="top" id='weak_skills_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_WEAK_SKILLS' module='Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.weak_skills.acl > 1}
{counter name="panelFieldCount"}

{if empty($fields.weak_skills.value)}
{assign var="value" value=$fields.weak_skills.default_value }
{else}
{assign var="value" value=$fields.weak_skills.value }
{/if}  
<textarea  id='{$fields.weak_skills.name}' name='{$fields.weak_skills.name}'
rows="4" 
cols="40" 
title='' tabindex="0" 
 >{$value}</textarea>
{else}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.weak_skills.name|escape:'html'|url2html|nl2br}">{$fields.weak_skills.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
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
{if $fields.expectation.acl > 1 || ($showDetailData && $fields.expectation.acl > 0)}
<td valign="top" id='expectation_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_EXPECTATION' module='Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.expectation.acl > 1}
{counter name="panelFieldCount"}

{if empty($fields.expectation.value)}
{assign var="value" value=$fields.expectation.default_value }
{else}
{assign var="value" value=$fields.expectation.value }
{/if}  
<textarea  id='{$fields.expectation.name}' name='{$fields.expectation.name}'
rows="4" 
cols="40" 
title='' tabindex="0" 
 >{$value}</textarea>
{else}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.expectation.name|escape:'html'|url2html|nl2br}">{$fields.expectation.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
{/if}
{else}
<td></td><td></td>
{/if}
{if $fields.other_note.acl > 1 || ($showDetailData && $fields.other_note.acl > 0)}
<td valign="top" id='other_note_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_OTHER_NOTE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.other_note.acl > 1}
{counter name="panelFieldCount"}

{if empty($fields.other_note.value)}
{assign var="value" value=$fields.other_note.default_value }
{else}
{assign var="value" value=$fields.other_note.value }
{/if}  
<textarea  id='{$fields.other_note.name}' name='{$fields.other_note.name}'
rows="4" 
cols="40" 
title='' tabindex="0" 
 >{$value}</textarea>
{else}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.other_note.name|escape:'html'|url2html|nl2br}">{$fields.other_note.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
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
{if $fields.preferred_kind_of_course.acl > 1 || ($showDetailData && $fields.preferred_kind_of_course.acl > 0)}
<td valign="top" id='preferred_kind_of_course_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PREFERRED_KIND_OF_COURSE_NUMERIC' module='Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' colspan='3'>
{if $fields.preferred_kind_of_course.acl > 1}
{counter name="panelFieldCount"}
{$html_koc}
{else}
</td>
<td></td><td></td>
</td>		
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
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(3, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL1").style.display='none';</script>
{/if}
<div id="detailpanel_4" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>&nbsp;&nbsp;
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(4);">
<img border="0" id="detailpanel_4_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(4);">
<img border="0" id="detailpanel_4_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_PORTAL_INFORMATION' module='Contacts'}
<script>
document.getElementById('detailpanel_4').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_PORTAL_INFORMATION'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.portal_name.acl > 1 || ($showDetailData && $fields.portal_name.acl > 0)}
<td valign="top" id='portal_name_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PORTAL_NAME' module='Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.portal_name.acl > 1}
{counter name="panelFieldCount"}
<table border="0" cellspacing="0" cellpadding="0"><tr><td>
{if !empty($fields.portal_name.value)}
<input accesskey=""  tabindex="0"  class="input_readonly" id="portal_name" name="portal_name" type="text" size="30" maxlength="{$fields.portal_name.len|default:'30'}" value="{$fields.portal_name.value}" autocomplete="off">
{else}
<input accesskey=""  tabindex="0"  class="input_readonly" id="portal_name" name="portal_name" type="text" size="30" maxlength="{$fields.portal_name.len|default:'30'}" value="Auto-Generate" autocomplete="off">
{/if}
<input accesskey=""  tabindex="0"  type="hidden" id="portal_name_existing" value="{$fields.portal_name.value}" autocomplete="off">
</td><tr><tr><td><input accesskey=""  tabindex="0"  type="hidden" id="portal_name_verified" value="true"></td></tr></table>
{else}
</td>
<td></td><td></td>
</td>		
{/if}
{else}
<td></td><td></td>
{/if}
{if $fields.portal_active.acl > 1 || ($showDetailData && $fields.portal_active.acl > 0)}
<td valign="top" id='portal_active_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PORTAL_ACTIVE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.portal_active.acl > 1}
{counter name="panelFieldCount"}

{if strval($fields.portal_active.value) == "1" || strval($fields.portal_active.value) == "yes" || strval($fields.portal_active.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.portal_active.name}" value="0"> 
<input type="checkbox" id="{$fields.portal_active.name}" 
name="{$fields.portal_active.name}" 
value="1" title='' tabindex="0" {$checked} >
{else}
{counter name="panelFieldCount"}

{if strval($fields.portal_active.value) == "1" || strval($fields.portal_active.value) == "yes" || strval($fields.portal_active.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.portal_active.name}" id="{$fields.portal_active.name}" value="$fields.portal_active.value" disabled="true" {$checked}>
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
{counter name="panelFieldCount"}
<input accesskey=""  tabindex="0"  id="portal_password" name="portal_password" type="hidden" size="32" maxlength="{$fields.portal_password.len|default:'32'}" value="{$fields.portal_password.value}" autocomplete="off"><a href="#" class="left" id="myLink" style="margin-left:20px; margin-top:6px; display:none;">Generate a password</a>
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(4, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_PORTAL_INFORMATION").style.display='none';</script>
{/if}
<div id="detailpanel_5" class="{$def.templateMeta.panelClass|default:'edit view edit508'}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>&nbsp;&nbsp;
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(5);">
<img border="0" id="detailpanel_5_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(5);">
<img border="0" id="detailpanel_5_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_PANEL_ASSIGNMENT' module='Contacts'}
<script>
document.getElementById('detailpanel_5').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_PANEL_ASSIGNMENT'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.lead_source.acl > 1 || ($showDetailData && $fields.lead_source.acl > 0)}
<td valign="top" id='lead_source_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_LEAD_SOURCE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.lead_source.acl > 1}
{counter name="panelFieldCount"}
{$lead_source}
{else}
</td>
<td></td><td></td>
</td>		
{/if}
{else}
<td></td><td></td>
{/if}
{if $fields.contact_status.acl > 1 || ($showDetailData && $fields.contact_status.acl > 0)}
<td valign="top" id='contact_status_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_CONTACT_STATUS' module='Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.contact_status.acl > 1}
{counter name="panelFieldCount"}
{$STATUS}
{else}
</td>
<td></td><td></td>
</td>		
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
{if $fields.lead_source_description.acl > 1 || ($showDetailData && $fields.lead_source_description.acl > 0)}
<td valign="top" id='lead_source_description_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_LEAD_SOURCE_DESCRIPTION' module='Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.lead_source_description.acl > 1}
{counter name="panelFieldCount"}

{if empty($fields.lead_source_description.value)}
{assign var="value" value=$fields.lead_source_description.default_value }
{else}
{assign var="value" value=$fields.lead_source_description.value }
{/if}  
<textarea  id='{$fields.lead_source_description.name}' name='{$fields.lead_source_description.name}'
rows="4" 
cols="40" 
title='' tabindex="0" 
 >{$value}</textarea>
{else}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.lead_source_description.name|escape:'html'|url2html|nl2br}">{$fields.lead_source_description.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
{/if}
{else}
<td></td><td></td>
{/if}
{if $fields.campaign_name.acl > 1 || ($showDetailData && $fields.campaign_name.acl > 0)}
<td valign="top" id='campaign_name_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_CAMPAIGN' module='Contacts'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.campaign_name.acl > 1}
{counter name="panelFieldCount"}

<input type="text" name="{$fields.campaign_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.campaign_name.name}" size="" value="{$fields.campaign_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.campaign_name.id_name}" 
id="{$fields.campaign_name.id_name}" 
value="{$fields.campaign_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.campaign_name.name}" id="btn_{$fields.campaign_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_CAMPAIGNS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_CAMPAIGNS_LABEL"}"
onclick='open_popup(
"{$fields.campaign_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"campaign_id","name":"campaign_name"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.campaign_name.name}" id="btn_clr_{$fields.campaign_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CAMPAIGNS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.campaign_name.name}', '{$fields.campaign_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CAMPAIGNS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.campaign_name.name}']) != 'undefined'",
		enableQS
);
</script>
{else}
{counter name="panelFieldCount"}

{if !empty($fields.campaign_id.value)}
{capture assign="detail_url"}index.php?module=Campaigns&action=DetailView&record={$fields.campaign_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="campaign_id" class="sugar_field" data-id-value="{$fields.campaign_id.value}">{$fields.campaign_name.value}</span>
{if !empty($fields.campaign_id.value)}</a>{/if}
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
{if $fields.assigned_user_name.acl > 1 || ($showDetailData && $fields.assigned_user_name.acl > 0)}
<td valign="top" id='assigned_user_name_label' width='12.5%' scope="col">
<label for="assigned_user_name">
{if $team_type == "Junior"}
{$MOD.LBL_FIRST_EC}
{else}
{$MOD.LBL_FIRST_SM}
{/if}:</label>
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.assigned_user_name.acl > 1}
{counter name="panelFieldCount"}

<input type="text" name="{$fields.assigned_user_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.assigned_user_name.name}" size="" value="{$fields.assigned_user_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.assigned_user_name.id_name}" 
id="{$fields.assigned_user_name.id_name}" 
value="{$fields.assigned_user_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.assigned_user_name.name}" id="btn_{$fields.assigned_user_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_USERS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_USERS_LABEL"}"
onclick='open_popup(
"{$fields.assigned_user_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"assigned_user_id","user_name":"assigned_user_name"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.assigned_user_name.name}" id="btn_clr_{$fields.assigned_user_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_USERS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.assigned_user_name.name}', '{$fields.assigned_user_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_USERS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.assigned_user_name.name}']) != 'undefined'",
		enableQS
);
</script>
{else}
{counter name="panelFieldCount"}

<span id="assigned_user_id" class="sugar_field" data-id-value="{$fields.assigned_user_id.value}">{$fields.assigned_user_name.value}</span>
{/if}
{else}
<td></td><td></td>
{/if}
{if $fields.team_name.acl > 1 || ($showDetailData && $fields.team_name.acl > 0)}
<td valign="top" id='team_name_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_TEAMS' module='Contacts'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' >
{if $fields.team_name.acl > 1}
{counter name="panelFieldCount"}

{sugarvar_teamset parentFieldArray=fields vardef=$fields.team_name tabindex='0' display='' labelSpan='' fieldSpan='' formName='EditView' tabindex=1 displayType='renderEditView'  	 }
{else}
{counter name="panelFieldCount"}

{sugarvar_teamset parentFieldArray=fields vardef=$fields.team_name tabindex='0' display='' labelSpan='' fieldSpan='' formName='EditView' tabindex=1 displayType='renderDetailView'  	 }
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
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(5, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_PANEL_ASSIGNMENT").style.display='none';</script>
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
<div class="action_buttons">{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('EditView'); {if $isDuplicate}_form.return_id.value=''; {/if}_form.action.value='Save'; if(check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}" id="SAVE_FOOTER">{/if}  {if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module}&record={$smarty.request.return_id}'); return false;" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" type="button" id="CANCEL_FOOTER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {elseif empty($smarty.request.return_action) || empty($smarty.request.return_id) && !empty($fields.id.value)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=Contacts'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module={$smarty.request.return_module}&record={$smarty.request.return_id}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {/if} {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=Contacts", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</div>
</form>
{$set_focus_block}
<!-- Begin Meta-Data Javascript -->
{sugar_getscript file="custom/include/javascripts/Select2/select2.min.js"}
{sugar_getscript file="custom/modules/Contacts/js/custom.edit.view.js"}
{sugar_getscript file="custom/include/javascripts/Multifield/jquery.multifield.js"}
{sugar_getscript file="custom/modules/Contacts/js/pGenerator.jquery.js"}
{sugar_getscript file="custom/include/javascripts/AutoComplete/src/js/textext.core.js"}
{sugar_getscript file="custom/include/javascripts/AutoComplete/src/js/textext.plugin.autocomplete.js"}
<link rel="stylesheet" href="{sugar_getjspath file=custom/include/javascripts/Select2/select2.css}"/>
<link rel="stylesheet" href="{sugar_getjspath file=custom/include/javascripts/AutoComplete/src/css/textext.core.css}"/>
<link rel="stylesheet" href="{sugar_getjspath file=custom/include/javascripts/AutoComplete/src/css/textext.plugin.autocomplete.css}"/>
<!-- End Meta-Data Javascript -->
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
addForm('EditView');addToValidate('EditView', 'name', 'name', false,'{/literal}{sugar_translate label='LBL_NAME' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'date_entered_date', 'date', false,'Date Created' );
addToValidate('EditView', 'date_modified_date', 'date', false,'Date Modified' );
addToValidate('EditView', 'modified_user_id', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_MODIFIED' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'modified_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_MODIFIED_NAME' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'created_by', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_CREATED' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'created_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_CREATED' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'description', 'text', false,'{/literal}{sugar_translate label='LBL_DESCRIPTION' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'deleted', 'bool', false,'{/literal}{sugar_translate label='LBL_DELETED' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'assigned_user_id', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_ID' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'assigned_user_name', 'relate', true,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'team_id', 'team_list', false,'{/literal}{sugar_translate label='LBL_TEAM_ID' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'team_set_id', 'id', false,'{/literal}{sugar_translate label='LBL_TEAM_SET_ID' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'team_count', 'relate', true,'{/literal}{sugar_translate label='LBL_TEAMS' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'team_name', 'teamset', true,'{/literal}{sugar_translate label='LBL_TEAMS' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'salutation', 'enum', false,'{/literal}{sugar_translate label='LBL_SALUTATION' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'first_name', 'varchar', true,'{/literal}{sugar_translate label='LBL_FIRST_NAME' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'last_name', 'varchar', true,'{/literal}{sugar_translate label='LBL_LAST_NAME' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'full_name', 'fullname', false,'{/literal}{sugar_translate label='LBL_NAME' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'title', 'varchar', false,'{/literal}{sugar_translate label='LBL_TITLE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'department', 'varchar', false,'{/literal}{sugar_translate label='LBL_DEPARTMENT' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'do_not_call', 'bool', false,'{/literal}{sugar_translate label='LBL_DO_NOT_CALL' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'phone_home', 'phone', false,'{/literal}{sugar_translate label='LBL_HOME_PHONE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'email', 'email', false,'{/literal}{sugar_translate label='LBL_ANY_EMAIL' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'phone_mobile', 'function', true,'{/literal}{sugar_translate label='LBL_MOBILE_PHONE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'phone_work', 'phone', false,'{/literal}{sugar_translate label='LBL_OFFICE_PHONE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'phone_other', 'phone', false,'{/literal}{sugar_translate label='LBL_OTHER_PHONE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'phone_fax', 'phone', false,'{/literal}{sugar_translate label='LBL_FAX_PHONE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'email1', 'varchar', true,'{/literal}{sugar_translate label='LBL_EMAIL_ADDRESS' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'email2', 'varchar', false,'{/literal}{sugar_translate label='LBL_OTHER_EMAIL_ADDRESS' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'invalid_email', 'bool', false,'{/literal}{sugar_translate label='LBL_INVALID_EMAIL' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'email_opt_out', 'bool', false,'{/literal}{sugar_translate label='LBL_EMAIL_OPT_OUT' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'primary_address_street', 'varchar', true,'{/literal}{sugar_translate label='LBL_PRIMARY_ADDRESS_STREET' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'primary_address_street_2', 'varchar', false,'{/literal}{sugar_translate label='LBL_PRIMARY_ADDRESS_STREET_2' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'primary_address_street_3', 'varchar', false,'{/literal}{sugar_translate label='LBL_PRIMARY_ADDRESS_STREET_3' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'primary_address_city', 'varchar', false,'{/literal}{sugar_translate label='LBL_PRIMARY_ADDRESS_CITY' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'primary_address_state', 'varchar', false,'{/literal}{sugar_translate label='LBL_PRIMARY_ADDRESS_STATE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'primary_address_postalcode', 'varchar', false,'{/literal}{sugar_translate label='LBL_PRIMARY_ADDRESS_POSTALCODE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'primary_address_country', 'varchar', false,'{/literal}{sugar_translate label='LBL_PRIMARY_ADDRESS_COUNTRY' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'alt_address_street', 'varchar', false,'{/literal}{sugar_translate label='LBL_ALT_ADDRESS_STREET' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'alt_address_street_2', 'varchar', false,'{/literal}{sugar_translate label='LBL_ALT_ADDRESS_STREET_2' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'alt_address_street_3', 'varchar', false,'{/literal}{sugar_translate label='LBL_ALT_ADDRESS_STREET_3' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'alt_address_city', 'varchar', false,'{/literal}{sugar_translate label='LBL_ALT_ADDRESS_CITY' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'alt_address_state', 'varchar', false,'{/literal}{sugar_translate label='LBL_ALT_ADDRESS_STATE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'alt_address_postalcode', 'varchar', false,'{/literal}{sugar_translate label='LBL_ALT_ADDRESS_POSTALCODE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'alt_address_country', 'varchar', false,'{/literal}{sugar_translate label='LBL_ALT_ADDRESS_COUNTRY' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'assistant', 'varchar', false,'{/literal}{sugar_translate label='LBL_ASSISTANT' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'assistant_phone', 'phone', false,'{/literal}{sugar_translate label='LBL_ASSISTANT_PHONE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'email_addresses_non_primary', 'email', false,'{/literal}{sugar_translate label='LBL_EMAIL_NON_PRIMARY' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'picture', 'image', false,'{/literal}{sugar_translate label='LBL_PICTURE_FILE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'email_and_name1', 'varchar', false,'{/literal}{sugar_translate label='LBL_NAME' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'lead_source', 'enum', true,'{/literal}{sugar_translate label='LBL_LEAD_SOURCE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'birthmonth', 'enum', false,'{/literal}{sugar_translate label='LBL_BIRTH_MONTH' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'account_name', 'relate', false,'{/literal}{sugar_translate label='LBL_ACCOUNT_NAME' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'account_id', 'id', false,'{/literal}{sugar_translate label='LBL_ACCOUNT_ID' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'opportunity_role_fields', 'relate', false,'{/literal}{sugar_translate label='LBL_ACCOUNT_NAME' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'opportunity_role_id', 'varchar', false,'{/literal}{sugar_translate label='LBL_OPPORTUNITY_ROLE_ID' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'opportunity_role', 'enum', false,'{/literal}{sugar_translate label='LBL_OPPORTUNITY_ROLE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'reports_to_id', 'id', false,'{/literal}{sugar_translate label='LBL_REPORTS_TO_ID' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'report_to_name', 'relate', false,'{/literal}{sugar_translate label='LBL_REPORTS_TO' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'birthdate', 'date', true,'{/literal}{sugar_translate label='LBL_BIRTHDATE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'portal_name', 'varchar', false,'{/literal}{sugar_translate label='LBL_PORTAL_NAME' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'portal_active', 'bool', false,'{/literal}{sugar_translate label='LBL_PORTAL_ACTIVE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'portal_password', 'password', false,'{/literal}{sugar_translate label='LBL_USER_PASSWORD' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'portal_password1', 'varchar', false,'{/literal}{sugar_translate label='LBL_USER_PASSWORD' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'portal_app', 'varchar', false,'{/literal}{sugar_translate label='LBL_PORTAL_APP' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'preferred_language', 'enum', false,'{/literal}{sugar_translate label='LBL_PREFERRED_LANGUAGE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'campaign_id', 'id', false,'{/literal}{sugar_translate label='LBL_CAMPAIGN_ID' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'campaign_name', 'relate', false,'{/literal}{sugar_translate label='LBL_CAMPAIGN' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'c_accept_status_fields', 'relate', false,'{/literal}{sugar_translate label='LBL_LIST_ACCEPT_STATUS' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'm_accept_status_fields', 'relate', false,'{/literal}{sugar_translate label='LBL_LIST_ACCEPT_STATUS' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'accept_status_id', 'varchar', false,'{/literal}{sugar_translate label='LBL_LIST_ACCEPT_STATUS' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'accept_status_name', 'enum', false,'{/literal}{sugar_translate label='LBL_LIST_ACCEPT_STATUS' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'sync_contact', 'bool', false,'{/literal}{sugar_translate label='LBL_SYNC_CONTACT' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'contact_id', 'varchar', false,'{/literal}{sugar_translate label='LBL_CONTACT_ID' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'user_id', 'id', false,'{/literal}{sugar_translate label='LBL_USER_ID' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'full_student_name', 'varchar', false,'{/literal}{sugar_translate label='LBL_FULL_NAME' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'aims_id', 'varchar', false,'{/literal}{sugar_translate label='LBL_AIMS_ID' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'aims_code', 'varchar', false,'{/literal}{sugar_translate label='LBL_AIMS_CODE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'payments_corporate', 'varchar', false,'{/literal}{sugar_translate label='LBL_PAYMENT_CORPORATE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'student_type', 'enum', true,'{/literal}{sugar_translate label='LBL_STUDENT_TYPE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'school_name', 'varchar', false,'{/literal}{sugar_translate label='LBL_SCHOOL_NAME' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'c_memberships_contacts_2_name', 'relate', false,'{/literal}{sugar_translate label='LBL_C_MEMBERSHIPS_CONTACTS_2_FROM_C_MEMBERSHIPS_TITLE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'c_memberships_contacts_2c_memberships_ida', 'id', false,'{/literal}{sugar_translate label='LBL_C_MEMBERSHIPS_CONTACTS_2_FROM_C_MEMBERSHIPS_TITLE_ID' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'custom_checkbox_class', 'varchar', false,'{/literal}{sugar_translate label='LBL_CHECKBOX' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'j_school_contacts_1_name', 'relate', true,'{/literal}{sugar_translate label='LBL_J_SCHOOL_CONTACTS_1_FROM_J_SCHOOL_TITLE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'j_school_contacts_1j_school_ida', 'id', false,'{/literal}{sugar_translate label='LBL_J_SCHOOL_CONTACTS_1_FROM_CONTACTS_TITLE_ID' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'c_contacts_contacts_1_name', 'relate', false,'{/literal}{sugar_translate label='LBL_C_CONTACTS_CONTACTS_1_FROM_C_CONTACTS_TITLE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'c_contacts_contacts_1c_contacts_ida', 'id', false,'{/literal}{sugar_translate label='LBL_C_CONTACTS_CONTACTS_1_FROM_CONTACTS_TITLE_ID' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'gender', 'enum', true,'{/literal}{sugar_translate label='LBL_GENDER' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'nationality', 'varchar', false,'{/literal}{sugar_translate label='LBL_NATIONALITY' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'occupation', 'varchar', false,'{/literal}{sugar_translate label='LBL_OCCUPATION' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'nick_name', 'varchar', false,'{/literal}{sugar_translate label='LBL_NICK_NAME' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'other_mobile', 'phone', false,'{/literal}{sugar_translate label='LBL_OTHER_MOBILE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'password_generated', 'varchar', false,'{/literal}{sugar_translate label='LBL_PASS' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'issues_content', 'text', false,'{/literal}{sugar_translate label='LBL_ISSUES_CONTENT' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'issues_fee', 'text', false,'{/literal}{sugar_translate label='LBL_ISSUES_FEE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'issues_other', 'text', false,'{/literal}{sugar_translate label='LBL_ISSUES_OTHER' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'free_balance', 'currency', false,'{/literal}{sugar_translate label='LBL_FREE_BALANCE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'class_name', 'varchar', false,'{/literal}{sugar_translate label='LBL_CLASS_NAME' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'class_year', 'int', false,'{/literal}{sugar_translate label='LBL_CLASS_YEAR' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'closed_date', 'date', false,'{/literal}{sugar_translate label='LBL_CLOSED_DATE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'contact_status', 'enum', false,'{/literal}{sugar_translate label='LBL_CONTACT_STATUS' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'type', 'enum', false,'{/literal}{sugar_translate label='LBL_TYPE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'checkbox', 'varchar', false,'{/literal}{sugar_translate label='LBL_CHECKBOX' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'subpanel_button', 'varchar', false,'{/literal}{sugar_translate label='LBL_SUBPANEL_BUTTON' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'current_stage', 'enum', false,'{/literal}{sugar_translate label='LBL_CURRENT_STAGE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'current_level', 'enum', false,'{/literal}{sugar_translate label='LBL_CURRENT_LEVEL' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'lead_source_description', 'text', false,'{/literal}{sugar_translate label='LBL_LEAD_SOURCE_DESCRIPTION' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'guardian_name', 'varchar', true,'{/literal}{sugar_translate label='LBL_GUARDIAN_NAME' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'guardian_email', 'varchar', false,'{/literal}{sugar_translate label='LBL_GUARDIAN_EMAIL' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'guardian_phone', 'varchar', false,'{/literal}{sugar_translate label='LBL_GUARDIAN_PHONE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'relationship', 'text', false,'{/literal}{sugar_translate label='LBL_RELATIONSHIP' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'describe_relationship', 'text', false,'{/literal}{sugar_translate label='LBL_DESCRIBE_RELATIONSHIP' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'preferred_kind_of_course', 'enum', false,'{/literal}{sugar_translate label='LBL_PREFERRED_KIND_OF_COURSE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'company_name', 'varchar', false,'{/literal}{sugar_translate label='LBL_COMPANY_NAME' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'contact_rela', 'enum', false,'{/literal}{sugar_translate label='LBL_CONTACT_RELA' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'study_apollo_before', 'text', true,'{/literal}{sugar_translate label='LBL_STUDY_APOLLO_BEFORE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'study_other_before', 'text', true,'{/literal}{sugar_translate label='LBL_STUDY_OTHER_BEFORE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'time_study_english', 'text', true,'{/literal}{sugar_translate label='LBL_TIME_STUDY_ENGLISH' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'study_with_before', 'text', true,'{/literal}{sugar_translate label='LBL_STUDY_WITH_BEFORE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'strong_skills', 'text', true,'{/literal}{sugar_translate label='LBL_STRONG_SKILLS' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'weak_skills', 'text', true,'{/literal}{sugar_translate label='LBL_WEAK_SKILLS' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'expectation', 'text', false,'{/literal}{sugar_translate label='LBL_EXPECTATION' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'other_note', 'text', false,'{/literal}{sugar_translate label='LBL_OTHER_NOTE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'team_type', 'enum', false,'{/literal}{sugar_translate label='LBL_TEAM_TYPE_STUDENT' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'age', 'varchar', false,'{/literal}{sugar_translate label='LBL_CONTACT_AGE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'pt_date', 'varchar', false,'{/literal}{sugar_translate label='LBL_PT_DATE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'demo_date', 'varchar', false,'{/literal}{sugar_translate label='LBL_DEMO_DATE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'payment_type', 'varchar', false,'{/literal}{sugar_translate label='LBL_PAYMENT_METHOD' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'sms_today', 'varchar', false,'{/literal}{sugar_translate label='LBL_SMS_TODAY' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'contact_attendance', 'relate', false,'{/literal}{sugar_translate label='LBL_CONTACT_ATTENDANCE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'display_attendance', 'varchar', false,'{/literal}{sugar_translate label='LBL_ATTENDANCE' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'attendance_id', 'varchar', false,'{/literal}{sugar_translate label='LBL_ATTENDANCE_ID' module='Contacts' for_js=true}{literal}' );
addToValidate('EditView', 'situation_type', 'varchar', false,'{/literal}{sugar_translate label='LBL_SITUATION_TYPE' module='Contacts' for_js=true}{literal}' );
addToValidateBinaryDependency('EditView', 'assigned_user_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='Contacts' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_ASSIGNED_TO' module='Contacts' for_js=true}{literal}', 'assigned_user_id' );
addToValidateBinaryDependency('EditView', 'account_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='Contacts' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_ACCOUNT_NAME' module='Contacts' for_js=true}{literal}', 'account_id' );
addToValidateBinaryDependency('EditView', 'campaign_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='Contacts' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_CAMPAIGN' module='Contacts' for_js=true}{literal}', 'campaign_id' );
addToValidateBinaryDependency('EditView', 'j_school_contacts_1_name', 'alpha', true,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='Contacts' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_J_SCHOOL_CONTACTS_1_FROM_J_SCHOOL_TITLE' module='Contacts' for_js=true}{literal}', 'j_school_contacts_1j_school_ida' );
</script><script language="javascript">if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['EditView_j_school_contacts_1_name']={"form":"EditView","method":"query","modules":["J_School"],"group":"or","field_list":["name","id"],"populate_list":["j_school_contacts_1_name","j_school_contacts_1j_school_ida"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_account_name']={"form":"EditView","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["EditView_account_name","account_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["account_id"],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_campaign_name']={"form":"EditView","method":"query","modules":["Campaigns"],"group":"or","field_list":["name","id"],"populate_list":["campaign_id","campaign_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["campaign_id"],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_assigned_user_name']={"form":"EditView","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name","assigned_user_id"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['EditView_team_name']={"form":"EditView","method":"query","modules":["Teams"],"group":"or","field_list":["name","id"],"populate_list":["team_name","team_id"],"required_list":["team_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""},{"name":"name","op":"like_custom","begin":"(","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};</script><script type=text/javascript>
SUGAR.util.doWhen('!SUGAR.util.ajaxCallInProgress() && ((typeof action_sugar_grp1 != "undefined" && action_sugar_grp1 == "Popup") || (typeof DCMenu != "undefined" && DCMenu.module))', function(){
SUGAR.forms.AssignmentHandler.registerView('EditView');
SUGAR.forms.AssignmentHandler.LINKS['EditView'] = {"created_by_link":{"relationship":"contacts_created_by","module":"Users","id_name":"created_by"},"modified_user_link":{"relationship":"contacts_modified_user","module":"Users","id_name":"modified_user_id"},"assigned_user_link":{"relationship":"contacts_assigned_user","module":"Users","id_name":"assigned_user_id"},"email_addresses_primary":{"relationship":"contacts_email_addresses_primary"},"email_addresses":{"relationship":"contacts_email_addresses","module":"EmailAddress"},"accounts":{"relationship":"accounts_contacts","id_name":"account_id","module":"Accounts"},"reports_to_link":{"relationship":"contact_direct_reports","id_name":"reports_to_id","module":"Contacts"},"opportunities":{"relationship":"opportunities_contacts","module":"Opportunities"},"bugs":{"relationship":"contacts_bugs"},"calls":{"relationship":"calls_contacts"},"cases":{"relationship":"contacts_cases"},"direct_reports":{"relationship":"contact_direct_reports"},"documents":{"relationship":"documents_contacts"},"leads":{"relationship":"contact_leads"},"products":{"relationship":"contact_products"},"contracts":{"relationship":"contracts_contacts"},"meetings":{"relationship":"meetings_contacts"},"notes":{"relationship":"contact_notes"},"project":{"relationship":"projects_contacts"},"project_resource":{"relationship":"projects_contacts_resources"},"quotes":{"relationship":"quotes_contacts_shipto","module":"Quotes"},"billing_quotes":{"relationship":"quotes_contacts_billto","module":"Quotes"},"tasks":{"relationship":"contact_tasks"},"tasks_parent":{"relationship":"contact_tasks_parent"},"user_sync":{"relationship":"contacts_users"},"campaigns":{"relationship":"contact_campaign_log","module":"CampaignLog"},"campaign_contacts":{"relationship":"campaign_contacts","id_name":"campaign_id","module":"Campaigns"},"prospect_lists":{"relationship":"prospect_list_contacts","module":"ProspectLists"},"contacts_contacts_1":{"relationship":"contacts_contacts_1","module":"Contacts"},"bc_survey_contacts":{"relationship":"bc_survey_contacts","module":"bc_survey"},"j_class_contacts_1":{"relationship":"j_class_contacts_1","module":"J_Class"},"leads_contacts_1":{"relationship":"leads_contacts_1","module":"Leads"},"contacts_j_ptresult_1":{"relationship":"contacts_j_ptresult_1","module":"J_PTResult"},"c_memberships_contacts_2":{"relationship":"c_memberships_contacts_2","module":"C_Memberships","id_name":"c_memberships_contacts_2c_memberships_ida"},"contacts_c_payments_2":{"relationship":"contacts_c_payments_2","module":"C_Payments"},"contacts_j_feedback_1":{"relationship":"contacts_j_feedback_1","module":"J_Feedback"},"contacts_c_refunds_1":{"relationship":"contacts_c_refunds_1","module":"C_Refunds"},"contact_c_sms":{"relationship":"contact_c_sms"},"bc_survey_submission_contacts":{"relationship":"bc_survey_submission_contacts","module":"bc_survey_submission"},"j_school_contacts_1":{"relationship":"j_school_contacts_1","module":"J_School","id_name":"j_school_contacts_1j_school_ida"},"c_contacts_contacts_1":{"relationship":"c_contacts_contacts_1","module":"C_Contacts","id_name":"c_contacts_contacts_1c_contacts_ida"},"contacts_c_invoices_1":{"relationship":"contacts_c_invoices_1","module":"C_Invoices"},"student_attendances":{"relationship":"student_attendances","module":"C_Attendance"},"student_revenue":{"relationship":"student_revenue","module":"C_DeliveryRevenue"},"student_forward":{"relationship":"student_forward","module":"C_Carryforward"},"ju_studentsituations":{"relationship":"contact_studentsituations","module":"J_StudentSituations"},"ju_vouchers":{"relationship":"contact_vouchers","module":"J_Voucher"},"contacts_sms":{"relationship":"contact_smses","module":"C_SMS"},"student_j_inventory":{"relationship":"student_j_inventory","module":"J_Inventory"},"student_j_gradebookdetail":{"relationship":"student_j_gradebookdetail","module":"J_GradebookDetail"},"c_classes_contacts_1":{"relationship":"c_classes_contacts_1","module":"C_Classes"},"contacts_c_payments_1":{"relationship":"contacts_c_payments_1","module":"C_Payments"},"contacts_j_payment_1":{"relationship":"contacts_j_payment_1","module":"J_Payment"}}

YAHOO.util.Event.onContentReady('EditView', SUGAR.forms.AssignmentHandler.loadComplete);});</script>{/literal}
