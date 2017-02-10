

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
<input type="hidden" name="content" value="{$fields.content.value}">   
{include file="custom/modules/J_Payment/tpl/discountTable.tpl"}
{include file="custom/modules/J_Payment/tpl/sponTable.tpl"}   
{$discount_list}{$sponsor_list}   
<input type="hidden" name="payment_list" id="payment_list" value="{$fields.payment_list.value}">   
<input type="hidden" name="class_list" id="class_list" value="{$fields.class_list.value}">   
<input type="hidden" name="sponsor_id" id="sponsor_id" value="">   
<input type="hidden" name="sub_discount_amount" id="sub_discount_amount" value="{sugar_number_format var=$fields.sub_discount_amount.value}">
<input type="hidden" name="sub_discount_percent" id="sub_discount_percent" value="{sugar_number_format var=$fields.sub_discount_percent.value precision=2}">   
<input type="hidden" name="lead_id" id="lead_id" value="{$fields.lead_id.value}">   
{$lock_assigned_to}   
<input type="hidden" name="outstanding_list" value="{$fields.outstanding_list.value}">   
<input type="hidden" name="is_outstanding" value="{$fields.is_outstanding.value}">   
<input type="hidden" name="ratio" id="ratio" value="{$ratio}">   
<input type="hidden" name="catch_limit" id="catch_limit" value="{$fields.catch_limit.value}">   
<input type="hidden" name="is_outing" id="is_outing" value="{$fields.is_outing.value}">   
<input type="hidden" name="aims_id" id="aims_id" value="{$fields.aims_id.value}">   
<input type="hidden" name="team_type" id="team_type" value="{$team_type}">   
<input type="hidden" name="student_corporate_name" id="student_corporate_name" value="">   
<input type="hidden" name="student_corporate_id" id="student_corporate_id" value="">   
<div class="action_buttons">{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('EditView'); {if $isDuplicate}_form.return_id.value=''; {/if}_form.action.value='Save'; if(check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}" id="SAVE_HEADER">{/if}  {if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module}&record={$smarty.request.return_id}'); return false;" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" type="button" id="CANCEL_HEADER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {elseif empty($smarty.request.return_action) || empty($smarty.request.return_id) && !empty($fields.id.value)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=J_Payment'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module={$smarty.request.return_module}&record={$smarty.request.return_id}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {/if} {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=J_Payment", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
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
{sugar_translate label='LBL_PAYMENT_TRANSFER_FROM_AIMS' module='J_Payment'}
<script>
document.getElementById('detailpanel_1').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_PAYMENT_TRANSFER_FROM_AIMS'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='_label' width='10%' scope="col">
<label for="">{$MOD.LBL_TRANSFER_FROM} AIMS Center:</label>
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='45%' >
{counter name="panelFieldCount"}
{html_options name="from_AIMS_center_id" id="from_AIMS_center_id" options=$from_AIMS_center_id}
</td>
{if $fields.contacts_j_payment_1_name.acl > 1 || ($showDetailData && $fields.contacts_j_payment_1_name.acl > 0)}
<td valign="top" id='contacts_j_payment_1_name_label' width='10%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_TRANSFER_TO_STUDENT_NAME' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='35%' >
{if $fields.contacts_j_payment_1_name.acl > 1}
{counter name="panelFieldCount"}

<input type="text" name="{$fields.contacts_j_payment_1_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.contacts_j_payment_1_name.name}" size="" value="{$fields.contacts_j_payment_1_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.contacts_j_payment_1_name.id_name}" 
id="{$fields.contacts_j_payment_1_name.id_name}" 
value="{$fields.contacts_j_payment_1contacts_ida.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.contacts_j_payment_1_name.name}" id="btn_{$fields.contacts_j_payment_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_CONTACTS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_CONTACTS_LABEL"}"
onclick='open_popup(
"{$fields.contacts_j_payment_1_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"contacts_j_payment_1contacts_ida","name":"contacts_j_payment_1_name"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.contacts_j_payment_1_name.name}" id="btn_clr_{$fields.contacts_j_payment_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CONTACTS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.contacts_j_payment_1_name.name}', '{$fields.contacts_j_payment_1_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CONTACTS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.contacts_j_payment_1_name.name}']) != 'undefined'",
		enableQS
);
</script>
{else}
{counter name="panelFieldCount"}

{if !empty($fields.contacts_j_payment_1contacts_ida.value)}
{capture assign="detail_url"}index.php?module=Contacts&action=DetailView&record={$fields.contacts_j_payment_1contacts_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="contacts_j_payment_1contacts_ida" class="sugar_field" data-id-value="{$fields.contacts_j_payment_1contacts_ida.value}">{$fields.contacts_j_payment_1_name.value}</span>
{if !empty($fields.contacts_j_payment_1contacts_ida.value)}</a>{/if}
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
{if $fields.payment_date.acl > 1 || ($showDetailData && $fields.payment_date.acl > 0)}
<td valign="top" id='payment_date_label' width='10%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_TRANSFER_IN_DATE' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='45%' >
{if $fields.payment_date.acl > 1}
{counter name="panelFieldCount"}

<span class="dateTime">
{assign var=date_value value=$fields.payment_date.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.payment_date.name}" id="{$fields.payment_date.name}" value="{$date_value}" title='Payment Date'  tabindex='0'    size="11" maxlength="10" >
{capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="{$fields.payment_date.name}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}
</span>
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "{$fields.payment_date.name}",
ifFormat : "{$CALENDAR_FORMAT}",
daFormat : "{$CALENDAR_FORMAT}",
button : "{$fields.payment_date.name}_trigger",
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


{if strlen($fields.payment_date.value) <= 0}
{assign var="value" value=$fields.payment_date.default_value }
{else}
{assign var="value" value=$fields.payment_date.value }
{/if}
<span class="sugar_field" id="{$fields.payment_date.name}">{$value}</span>
{/if}
{else}
<td></td><td></td>
{/if}
{if $fields.use_type.acl > 1 || ($showDetailData && $fields.use_type.acl > 0)}
<td valign="top" id='use_type_label' width='10%' scope="col">
<label for="use_type">{$MOD.LBL_TRANSFER_TYPE}:</label>
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='35%' >
{if $fields.use_type.acl > 1}
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.use_type.name}" 
id="{$fields.use_type.name}" 
title=''       
>
{if isset($fields.use_type.value) && $fields.use_type.value != ''}
{html_options options=$fields.use_type.options selected=$fields.use_type.value}
{else}
{html_options options=$fields.use_type.options selected=$fields.use_type.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.use_type.options }
{capture name="field_val"}{$fields.use_type.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.use_type.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.use_type.name}" 
id="{$fields.use_type.name}" 
title=''          
>
{if isset($fields.use_type.value) && $fields.use_type.value != ''}
{html_options options=$fields.use_type.options selected=$fields.use_type.value}
{else}
{html_options options=$fields.use_type.options selected=$fields.use_type.default}
{/if}
</select>
<input
id="{$fields.use_type.name}-input"
name="{$fields.use_type.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.use_type.name}-image"></button><button type="button"
id="btn-clear-{$fields.use_type.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.use_type.name}-input', '{$fields.use_type.name}');sync_{$fields.use_type.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.use_type.name}{literal}");
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
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.use_type.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.use_type.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.use_type.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.use_type.name}{literal}");
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
sync_{/literal}{$fields.use_type.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.use_type.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.use_type.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.use_type.name}{literal}", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("{/literal}{$fields.use_type.name}{literal}");
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


{if is_string($fields.use_type.options)}
<input type="hidden" class="sugar_field" id="{$fields.use_type.name}" value="{ $fields.use_type.options }">
{ $fields.use_type.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.use_type.name}" value="{ $fields.use_type.value }">
{ $fields.use_type.options[$fields.use_type.value]}
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
<td valign="top" id='_label' width='10%' scope="col">
&nbsp;
</td>
{counter name="fieldsUsed"}

<td valign="top" width='45%' >
</td>
{if $fields.payment_amount.acl > 1 || ($showDetailData && $fields.payment_amount.acl > 0)}
<td valign="top" id='payment_amount_label' width='10%' scope="col">
<label for="payment_amount">{$MOD.LBL_TRANSFER_AMOUNT}: <span class="required">*</span></label>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='35%' >
{if $fields.payment_amount.acl > 1}
{counter name="panelFieldCount"}
<input accesskey=""  tabindex="0"  class="currency" type="text" name="payment_amount" id="payment_amount" size="20" maxlength="26" value="{sugar_number_format var=$fields.payment_amount.value}" title="{$MOD.LBL_TRANSFER_AMOUNT}" tabindex="0"  style="font-weight: bold; color: rgb(165, 42, 42);">{$payment_type}
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
<td valign="top" id='_label' width='10%' scope="col">
&nbsp;
</td>
{counter name="fieldsUsed"}

<td valign="top" width='45%' >
</td>
{if $fields.total_hours.acl > 1 || ($showDetailData && $fields.total_hours.acl > 0)}
<td valign="top" id='total_hours_label' width='10%' scope="col">
<label for="total_hours">{$MOD.LBL_TRANSFER_HOURS}: <span class="required">*</span></label>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='35%' >
{if $fields.total_hours.acl > 1}
{counter name="panelFieldCount"}
<input accesskey=""  tabindex="0"  type="text" name="total_hours" id="total_hours" size="5" maxlength="5" value="{sugar_number_format var=$fields.total_hours.value precision=2}" title="{$MOD.LBL_TRANSFER_HOURS}" tabindex="0"  style="text-align: right; color: rgb(165, 42, 42);">
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
{if $fields.description.acl > 1 || ($showDetailData && $fields.description.acl > 0)}
<td valign="top" id='description_label' width='10%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='45%' colspan='3'>
{if $fields.description.acl > 1}
{counter name="panelFieldCount"}

{if empty($fields.description.value)}
{assign var="value" value=$fields.description.default_value }
{else}
{assign var="value" value=$fields.description.value }
{/if}  
<textarea  id='{$fields.description.name}' name='{$fields.description.name}'
rows="2" 
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
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.assigned_user_name.acl > 1 || ($showDetailData && $fields.assigned_user_name.acl > 0)}
<td valign="top" id='assigned_user_name_label' width='10%' scope="col">
<label for="assigned_user_name">
{if $team_type == "Junior"}
{$MOD.LBL_ASSIGNED_USER}
{else}
{$MOD.LBL_FIRST_SM}
{/if}: <span class="required">*</span></label>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='45%' colspan='3'>
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
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(1, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_PAYMENT_TRANSFER_FROM_AIMS").style.display='none';</script>
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
<div class="action_buttons">{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('EditView'); {if $isDuplicate}_form.return_id.value=''; {/if}_form.action.value='Save'; if(check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}" id="SAVE_FOOTER">{/if}  {if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module}&record={$smarty.request.return_id}'); return false;" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" type="button" id="CANCEL_FOOTER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {elseif empty($smarty.request.return_action) || empty($smarty.request.return_id) && !empty($fields.id.value)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=J_Payment'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module={$smarty.request.return_module}&record={$smarty.request.return_id}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {/if} {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=J_Payment", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</div>
</form>
{$set_focus_block}
<!-- Begin Meta-Data Javascript -->
{if $fields.payment_type.value == "Moving Out" || $fields.payment_type.value == "Transfer Out" || $fields.payment_type.value == "Refund"}
{sugar_getscript file="custom/modules/J_Payment/js/edit_moving_transfer_refunds.js"}
{elseif $fields.payment_type.value == "Transfer From AIMS"}
{sugar_getscript file="custom/modules/J_Payment/js/editview_tf_from_aims.js"}
{else}
{if $team_type == "Adult"}
{sugar_getscript file="custom/modules/J_Payment/js/edit_enrollment_adults.js"}
{else}
{sugar_getscript file="custom/modules/J_Payment/js/edit_enrollmentssss.js"}
{/if}
{sugar_getscript file="custom/modules/J_Payment/js/extention_layout.js"}
{/if}
{sugar_getscript file="custom/include/javascripts/Bootstrap/bootstrap.min.js"}
{sugar_getscript file="custom/include/javascripts/BootstrapSelect/bootstrap-select.min.js"}
{sugar_getscript file="custom/include/javascripts/AjaxBootstrapSelect/js/ajax-bootstrap-select.js"}
{sugar_getscript file="custom/include/javascripts/BootstrapMultiselect/js/bootstrap-multiselect.js"}
<link rel="stylesheet" href="{sugar_getjspath file=custom/include/javascripts/Bootstrap/bootstrap.min.css}"/>
<link rel="stylesheet" href="{sugar_getjspath file=custom/include/javascripts/BootstrapSelect/bootstrap-select.min.css}"/>
<link rel="stylesheet" href="{sugar_getjspath file=custom/include/javascripts/AjaxBootstrapSelect/css/ajax-bootstrap-select.css}"/>
<link rel="stylesheet" href="{sugar_getjspath file=custom/include/javascripts/BootstrapMultiselect/css/bootstrap-multiselect.css}"/>
<link rel="stylesheet" href="{sugar_getjspath file=custom/modules/J_Payment/css/custom_style.css}"/>
{$limit_discount_percent}
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
addForm('EditView');addToValidate('EditView', 'name', 'name', true,'{/literal}{sugar_translate label='LBL_NAME' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'date_entered_date', 'date', false,'Date Created' );
addToValidate('EditView', 'date_modified_date', 'date', false,'Date Modified' );
addToValidate('EditView', 'modified_user_id', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_MODIFIED' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'modified_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_MODIFIED_NAME' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'created_by', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_CREATED' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'created_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_CREATED' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'description', 'text', true,'{/literal}{sugar_translate label='LBL_DESCRIPTION' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'deleted', 'bool', false,'{/literal}{sugar_translate label='LBL_DELETED' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'team_id', 'team_list', false,'{/literal}{sugar_translate label='LBL_TEAM_ID' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'team_set_id', 'id', false,'{/literal}{sugar_translate label='LBL_TEAM_SET_ID' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'team_count', 'relate', true,'{/literal}{sugar_translate label='LBL_TEAMS' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'team_name', 'teamset', true,'{/literal}{sugar_translate label='LBL_TEAMS' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'assigned_user_id', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_ID' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'assigned_user_name', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'payment_type', 'enum', false,'{/literal}{sugar_translate label='LBL_PAYMENT_TYPE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'payment_date', 'date', true,'{/literal}{sugar_translate label='LBL_PAYMENT_DATE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'number_of_skill', 'int', false,'{/literal}{sugar_translate label='LBL_NUMBER_OF_SKILL' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'number_of_connect', 'int', false,'{/literal}{sugar_translate label='LBL_NUMBER_OF_CONNECT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'number_of_practice', 'int', false,'{/literal}{sugar_translate label='LBL_NUMBER_OF_PRACTICE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'card_type', 'varchar', false,'{/literal}{sugar_translate label='LBL_CARD_TYPE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'number_of_payment', 'enum', false,'{/literal}{sugar_translate label='LBL_NUMBER_OF_PAYMENT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'moving_tran_out_date', 'date', true,'{/literal}{sugar_translate label='LBL_MOVING_TRANSFER_OUT_DATE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'moving_tran_in_date', 'date', true,'{/literal}{sugar_translate label='LBL_MOVING_TRANSFER_IN_DATE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'number_class', 'int', false,'{/literal}{sugar_translate label='LBL_NUMBER_CLASS' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'sale_type', 'enum', false,'{/literal}{sugar_translate label='LBL_SALE_TYPE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'start_study', 'date', true,'{/literal}{sugar_translate label='LBL_START_STUDY' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'end_study', 'date', true,'{/literal}{sugar_translate label='LBL_END_STUDY' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'class_start', 'date', false,'{/literal}{sugar_translate label='LBL_CLASS_START' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'class_end', 'date', false,'{/literal}{sugar_translate label='LBL_CLASS_END' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'sessions', 'int', false,'{/literal}{sugar_translate label='LBL_SESSIONS' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'tuition_fee', 'currency', false,'{/literal}{sugar_translate label='LBL_TUITION_FEE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'currency_id', 'currency_id', false,'{/literal}{sugar_translate label='LBL_CURRENCY' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'delay_amount', 'currency', false,'{/literal}{sugar_translate label='LBL_DELAY_AMOUNT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'paid_amount', 'currency', false,'{/literal}{sugar_translate label='LBL_PAID_AMOUNT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'amount_bef_discount', 'currency', false,'{/literal}{sugar_translate label='LBL_AMOUNT_BEF_DISCOUNT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'discount_amount', 'currency', false,'{/literal}{sugar_translate label='LBL_DISCOUNT_AMOUNT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'remaining_freebalace', 'currency', false,'{/literal}{sugar_translate label='LBL_REMAINING_FREEBALANCE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'discount_percent', 'decimal', false,'{/literal}{sugar_translate label='LBL_DISCOUNT_PERCENT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'ratio', 'decimal', false,'{/literal}{sugar_translate label='LBL_RATIO' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'sub_discount_amount', 'currency', false,'{/literal}{sugar_translate label='LBL_SUB_DISCOUNT_AMOUNT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'sub_discount_percent', 'decimal', false,'{/literal}{sugar_translate label='LBL_SUB_DISCOUNT_PERCENT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'total_after_discount', 'currency', false,'{/literal}{sugar_translate label='LBL_TOTAL_AFTER_DISCOUNT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'deposit_amount', 'currency', false,'{/literal}{sugar_translate label='LBL_DEPOSIT_AMOUNT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'payment_amount', 'currency', false,'{/literal}{sugar_translate label='LBL_GRAND_TOTAL' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'total_amount', 'currency', false,'{/literal}{sugar_translate label='LBL_TOTAL_AMOUNT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'total_hours_adult', 'decimal', false,'{/literal}{sugar_translate label='LBL_TUITION_HOURS_ADULT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'holiday_list', 'text', false,'{/literal}{sugar_translate label='LBL_HOLIDAYS_LIST' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'tuition_hours', 'decimal', false,'{/literal}{sugar_translate label='LBL_TUITION_HOURS' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'paid_hours', 'decimal', false,'{/literal}{sugar_translate label='LBL_PAID_HOURS' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'total_hours', 'decimal', false,'{/literal}{sugar_translate label='LBL_TOTAL_HOURS' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'payment_expired', 'date', false,'{/literal}{sugar_translate label='LBL_PAYMENT_EXPIRED' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'loyalty', 'varchar', false,'{/literal}{sugar_translate label='LBL_LOYALTY' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'class_string', 'varchar', false,'{/literal}{sugar_translate label='LBL_CLASS_STRING' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'level_string', 'varchar', false,'{/literal}{sugar_translate label='LBL_LEVEL_STRING' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'kind_of_course_string', 'varchar', false,'{/literal}{sugar_translate label='LBL_KIND_OF_COURSE_STRING' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'sponsor_number', 'varchar', false,'{/literal}{sugar_translate label='LBL_SPONSOR_NUMBER' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'foc_type', 'enum', false,'{/literal}{sugar_translate label='LBL_FOC_TYPE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'sponsor_amount', 'currency', false,'{/literal}{sugar_translate label='LBL_SPONSOR_AMOUNT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'sponsor_percent', 'decimal', false,'{/literal}{sugar_translate label='LBL_SPONSOR_PERCENT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'final_sponsor', 'currency', false,'{/literal}{sugar_translate label='LBL_FINAL_SPONSOR' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'final_sponsor_percent', 'decimal', false,'{/literal}{sugar_translate label='LBL_FINAL_SPONSOR_PERCENT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'payment_method', 'enum', false,'{/literal}{sugar_translate label='LBL_PAYMENT_METHOD' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'outstanding_amount', 'currency', false,'{/literal}{sugar_translate label='LBL_OUTSTANDING_AMOUNT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'outstanding_hours', 'decimal', false,'{/literal}{sugar_translate label='LBL_OUTSTANDING_HOURS' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'company_name', 'varchar', false,'{/literal}{sugar_translate label='LBL_COMPANY_NAME' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'tax_code', 'varchar', false,'{/literal}{sugar_translate label='LBL_TAX_CODE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'company_address', 'varchar', false,'{/literal}{sugar_translate label='LBL_COMPANY_ADDRESS' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'delay_hours', 'decimal', false,'{/literal}{sugar_translate label='LBL_DELAY_HOURS' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'used_hours', 'decimal', false,'{/literal}{sugar_translate label='LBL_USED_HOURS' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'remain_hours', 'decimal', false,'{/literal}{sugar_translate label='LBL_REMAIN_HOURS' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'used_amount', 'currency', false,'{/literal}{sugar_translate label='LBL_USED_AMOUNT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'remain_amount', 'currency', false,'{/literal}{sugar_translate label='LBL_REMAIN_AMOUNT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'payment_list', 'text', false,'{/literal}{sugar_translate label='LBL_CONTENT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'note', 'varchar', false,'{/literal}{sugar_translate label='LBL_NOTE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'outstanding_list', 'text', false,'{/literal}{sugar_translate label='LBL_CONTENT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'content', 'text', false,'{/literal}{sugar_translate label='LBL_CONTENT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'do_not_drop_revenue', 'bool', false,'{/literal}{sugar_translate label='LBL_DO_NOT_DROP_REVENUE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'printed_date', 'date', true,'{/literal}{sugar_translate label='LBL_PRINTED_DATE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'split_payment', 'bool', false,'{/literal}{sugar_translate label='LBL_SPLIT_PAYMENT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'charge_book', 'bool', false,'{/literal}{sugar_translate label='LBL_CHARGE_BOOK' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'is_corporate', 'bool', false,'{/literal}{sugar_translate label='LBL_IS_CORPORATE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'is_outstanding', 'bool', false,'{/literal}{sugar_translate label='LBL_IS_OUTSTANDING' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'is_outing', 'bool', false,'{/literal}{sugar_translate label='LBL_IS_OUTING' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'status_payment_detail', 'enum', false,'{/literal}{sugar_translate label='LBL_STATUS_PAYMENT_DETAIL' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'related_payment_detail', 'varchar', false,'{/literal}{sugar_translate label='LBL_RELATED_PAYMENT_DETAIL' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'status', 'enum', false,'{/literal}{sugar_translate label='LBL_STATUS' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'sponsor_id', 'id', false,'{/literal}{sugar_translate label='LBL_SPONSOR_ID' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'charge', 'varchar', false,'{/literal}{sugar_translate label='LBL_CHARGE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'move_to_center_id', 'id', false,'{/literal}{sugar_translate label='' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'move_to_center_name', 'relate', false,'{/literal}{sugar_translate label='LBL_MOVE_TO_CENTER_NAME' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'move_from_center_id', 'id', false,'{/literal}{sugar_translate label='' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'move_from_center_name', 'relate', false,'{/literal}{sugar_translate label='LBL_MOVE_FROM_CENTER_NAME' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'transfer_to_student_id', 'id', false,'{/literal}{sugar_translate label='' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'transfer_to_student_name', 'relate', false,'{/literal}{sugar_translate label='LBL_TRANSFER_TO_STUDENT_NAME' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'filename', 'varchar', true,'{/literal}{sugar_translate label='LBL_FILENAME' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'file_ext', 'varchar', false,'{/literal}{sugar_translate label='LBL_FILE_EXTENSION' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'file_mime_type', 'varchar', false,'{/literal}{sugar_translate label='LBL_MIME' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'uploadfile', 'file', false,'{/literal}{sugar_translate label='LBL_FILE_UPLOAD' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'payment_out_name', 'relate', false,'{/literal}{sugar_translate label='LBL_PAYMENT_OUT_NAME' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'payment_out_id', 'id', false,'{/literal}{sugar_translate label='LBL_PAYMENT_OUT_ID' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'enrollment_id', 'id', false,'{/literal}{sugar_translate label='Enrollment ID' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'delay_situation_id', 'id', false,'{/literal}{sugar_translate label='LBL_DELAY_SITUATION_ID' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'delay_situation_name', 'relate', false,'{/literal}{sugar_translate label='LBL_DELAY_SITUATION_NAME' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'lead_id', 'id', false,'{/literal}{sugar_translate label='LBL_LEAD_ID' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'lead_name', 'relate', false,'{/literal}{sugar_translate label='LBL_LEAD_NAME' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'account_id', 'id', false,'{/literal}{sugar_translate label='LBL_ACCOUNT_ID' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'account_name', 'relate', false,'{/literal}{sugar_translate label='LBL_ACCOUNT_NAME' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'payment_use_payment', 'relate', false,'{/literal}{sugar_translate label='LBL_PAYMENT_USE_PAYMENT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'display_used_amount', 'currency', false,'{/literal}{sugar_translate label='LBL_USE_AMOUNT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'display_used_hours', 'decimal', false,'{/literal}{sugar_translate label='LBL_USE_HOURS' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'use_payment_id', 'varchar', false,'{/literal}{sugar_translate label='LBL_ATTENDANCE_ID' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'use_type', 'enum', true,'{/literal}{sugar_translate label='LBL_USE_TYPE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'refund_revenue', 'currency', false,'{/literal}{sugar_translate label='LBL_DROP_REVENUE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'sale_type_date', 'date', true,'{/literal}{sugar_translate label='LBL_SALE_TYPE_DATE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'catch_limit', 'bool', false,'{/literal}{sugar_translate label='LBL_CATCH_LIMIT' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'kind_of_course', 'enum', true,'{/literal}{sugar_translate label='LBL_KIND_OF_COURSE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'kind_of_course_360', 'enum', true,'{/literal}{sugar_translate label='LBL_KIND_OF_COURSE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'aims_id', 'varchar', false,'{/literal}{sugar_translate label='LBL_AIMS_ID' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'class_aims_id', 'varchar', true,'{/literal}{sugar_translate label='LBL_CLASS_AIMS_ID' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'student_aims_id', 'varchar', true,'{/literal}{sugar_translate label='LBL_STUDENT_AIMS_ID' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'transfer_in_aims_id', 'varchar', true,'{/literal}{sugar_translate label='LBL_TRANSFER_IN_AIMS_ID' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'from_payment_aims_id', 'varchar', true,'{/literal}{sugar_translate label='LBL_FROM_PAYMENT_AIMS_ID' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'serial_no', 'varchar', false,'{/literal}{sugar_translate label='LBL_SERIAL_NO' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'invoice_number', 'varchar', false,'{/literal}{sugar_translate label='LBL_INVOICE_NUMBER' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'invoice_date', 'date', true,'{/literal}{sugar_translate label='LBL_INVOICE_DATE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'contract_id', 'id', false,'{/literal}{sugar_translate label='LBL_CONTRACT_ID' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'contract_name', 'relate', false,'{/literal}{sugar_translate label='LBL_CONTRACT_NAME' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'j_partnership_j_payment_1_name', 'relate', false,'{/literal}{sugar_translate label='LBL_J_PARTNERSHIP_J_PAYMENT_1_FROM_J_PARTNERSHIP_TITLE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'j_partnership_j_payment_1j_partnership_ida', 'id', false,'{/literal}{sugar_translate label='LBL_J_PARTNERSHIP_J_PAYMENT_1_FROM_J_PAYMENT_TITLE_ID' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'j_payment_j_inventory_1_name', 'relate', false,'{/literal}{sugar_translate label='LBL_J_PAYMENT_J_INVENTORY_1_FROM_J_INVENTORY_TITLE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'j_payment_j_inventory_1j_inventory_idb', 'id', false,'{/literal}{sugar_translate label='LBL_J_PAYMENT_J_INVENTORY_1_FROM_J_INVENTORY_TITLE_ID' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'j_payment_j_payment_1_name', 'relate', false,'{/literal}{sugar_translate label='LBL_J_PAYMENT_J_PAYMENT_1_FROM_J_PAYMENT_L_TITLE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'j_payment_j_payment_1j_payment_ida', 'id', false,'{/literal}{sugar_translate label='LBL_J_PAYMENT_J_PAYMENT_1_FROM_J_PAYMENT_R_TITLE_ID' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'j_coursefee_j_payment_1_name', 'relate', false,'{/literal}{sugar_translate label='LBL_J_COURSEFEE_J_PAYMENT_1_FROM_J_COURSEFEE_TITLE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'j_coursefee_j_payment_1j_coursefee_ida', 'id', false,'{/literal}{sugar_translate label='LBL_J_COURSEFEE_J_PAYMENT_1_FROM_J_PAYMENT_TITLE_ID' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'contacts_j_payment_1_name', 'relate', true,'{/literal}{sugar_translate label='LBL_CONTACTS_J_PAYMENT_1_FROM_CONTACTS_TITLE' module='J_Payment' for_js=true}{literal}' );
addToValidate('EditView', 'contacts_j_payment_1contacts_ida', 'id', false,'{/literal}{sugar_translate label='LBL_CONTACTS_J_PAYMENT_1_FROM_J_PAYMENT_TITLE_ID' module='J_Payment' for_js=true}{literal}' );
addToValidateBinaryDependency('EditView', 'assigned_user_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='J_Payment' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_ASSIGNED_TO' module='J_Payment' for_js=true}{literal}', 'assigned_user_id' );
addToValidateBinaryDependency('EditView', 'contacts_j_payment_1_name', 'alpha', true,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='J_Payment' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_CONTACTS_J_PAYMENT_1_FROM_CONTACTS_TITLE' module='J_Payment' for_js=true}{literal}', 'contacts_j_payment_1contacts_ida' );
</script><script language="javascript">if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['EditView_contacts_j_payment_1_name']={"form":"EditView","method":"get_contact_array","modules":["Contacts"],"field_list":["salutation","last_name","first_name","id"],"populate_list":["contacts_j_payment_1_name","contacts_j_payment_1contacts_ida","contacts_j_payment_1contacts_ida","contacts_j_payment_1contacts_ida"],"required_list":["contacts_j_payment_1contacts_ida"],"group":"or","conditions":[{"name":"last_name","op":"like_custom","end":"%","value":""},{"name":"first_name","op":"like_custom","end":"%","value":""}],"order":"last_name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_assigned_user_name']={"form":"EditView","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name","assigned_user_id"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};</script><script type=text/javascript>
SUGAR.util.doWhen('!SUGAR.util.ajaxCallInProgress() && ((typeof action_sugar_grp1 != "undefined" && action_sugar_grp1 == "Popup") || (typeof DCMenu != "undefined" && DCMenu.module))', function(){
SUGAR.forms.AssignmentHandler.registerView('EditView');
SUGAR.forms.AssignmentHandler.LINKS['EditView'] = {"created_by_link":{"relationship":"j_payment_created_by","module":"Users","id_name":"created_by"},"modified_user_link":{"relationship":"j_payment_modified_user","module":"Users","id_name":"modified_user_id"},"assigned_user_link":{"relationship":"j_payment_assigned_user","module":"Users","id_name":"assigned_user_id"},"c_carryforward":{"relationship":"j_payment_carryforward","module":"C_Carryforward"},"ju_studentsituations":{"relationship":"j_payment_studentsituations","module":"J_StudentSituations"},"ju_sponsor":{"relationship":"j_payment_j_sponsor","module":"J_Sponsor"},"ju_payment_in":{"relationship":"j_payment_moving_transfer","module":"J_Payment"},"ju_payment_out":{"relationship":"j_payment_moving_transfer","module":"J_Payment","id_name":"payment_out_id"},"situation_delay_link":{"relationship":"situation_delay_payment_delay","id_name":"delay_situation_id","module":"J_StudentSituations"},"paymentdetail_link":{"relationship":"payment_paymentdetails","module":"J_PaymentDetail"},"lead_link":{"relationship":"lead_payments","id_name":"lead_name","module":"Leads"},"account_link":{"relationship":"account_payments","id_name":"account_id","module":"Accounts"},"revenue_link":{"relationship":"ju_payment_revenue","module":"C_DeliveryRevenue"},"contract_link":{"relationship":"contract_j_payment","id_name":"contract_id","module":"Contracts"},"j_payment_j_discount_1":{"relationship":"j_payment_j_discount_1","module":"J_Discount"},"j_partnership_j_payment_1":{"relationship":"j_partnership_j_payment_1","module":"J_Partnership","id_name":"j_partnership_j_payment_1j_partnership_ida"},"j_payment_j_inventory_1":{"relationship":"j_payment_j_inventory_1","module":"J_Inventory","id_name":"j_payment_j_inventory_1j_inventory_idb"},"j_payment_j_payment_1":{"relationship":"j_payment_j_payment_1","module":"J_Payment"},"j_payment_j_payment_1_right":{"relationship":"j_payment_j_payment_1","module":"J_Payment","id_name":"j_payment_j_payment_1j_payment_ida"},"j_coursefee_j_payment_1":{"relationship":"j_coursefee_j_payment_1","module":"J_Coursefee","id_name":"j_coursefee_j_payment_1j_coursefee_ida"},"contacts_j_payment_1":{"relationship":"contacts_j_payment_1","module":"Contacts","id_name":"contacts_j_payment_1contacts_ida"}}

YAHOO.util.Event.onContentReady('EditView', SUGAR.forms.AssignmentHandler.loadComplete);});</script>{/literal}
