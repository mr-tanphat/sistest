

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
<div class="action_buttons">{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('form_QuickCreate_J_School'); _form.action.value='Popup';return check_form('form_QuickCreate_J_School')" type="submit" name="J_School_popupcreate_save_button" id="J_School_popupcreate_save_button" value="{$APP.LBL_SAVE_BUTTON_LABEL}">{/if}  <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="toggleDisplay('addform');return false;" name="J_School_popup_cancel_button" type="submit"id="J_School_popup_cancel_button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}">  {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=J_School", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</td>
<td align='right'>
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<span id='tabcounterJS'><script>SUGAR.TabFields=new Array();//this will be used to track tabindexes for references</script></span>
<div id="form_QuickCreate_J_School_tabs"
>
<div >
<div id="detailpanel_1" >
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='Default_{$module}_Subpanel'  class="yui3-skin-sam edit view panelContainer">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.short_name.acl > 1 || ($showDetailData && $fields.short_name.acl > 0)}
<td valign="top" id='short_name_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_SHORT_NAME' module='J_School'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' colspan='3'>
{if $fields.short_name.acl > 1}
{counter name="panelFieldCount"}

{if strlen($fields.short_name.value) <= 0}
{assign var="value" value=$fields.short_name.default_value }
{else}
{assign var="value" value=$fields.short_name.value }
{/if}  
<input type='text' name='{$fields.short_name.name}' 
id='{$fields.short_name.name}' size='30' 
maxlength='150' 
value='{$value}' title=''      accesskey='7'  >
{else}
{counter name="panelFieldCount"}

{if strlen($fields.short_name.value) <= 0}
{assign var="value" value=$fields.short_name.default_value }
{else}
{assign var="value" value=$fields.short_name.value }
{/if} 
<span class="sugar_field" id="{$fields.short_name.name}">{$fields.short_name.value}</span>
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
{if $fields.level.acl > 1 || ($showDetailData && $fields.level.acl > 0)}
<td valign="top" id='level_label' width='12.5%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_LEVEL' module='J_School'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' colspan='3'>
{if $fields.level.acl > 1}
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.level.name}" 
id="{$fields.level.name}" 
title=''       
>
{if isset($fields.level.value) && $fields.level.value != ''}
{html_options options=$fields.level.options selected=$fields.level.value}
{else}
{html_options options=$fields.level.options selected=$fields.level.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.level.options }
{capture name="field_val"}{$fields.level.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.level.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.level.name}" 
id="{$fields.level.name}" 
title=''          
>
{if isset($fields.level.value) && $fields.level.value != ''}
{html_options options=$fields.level.options selected=$fields.level.value}
{else}
{html_options options=$fields.level.options selected=$fields.level.default}
{/if}
</select>
<input
id="{$fields.level.name}-input"
name="{$fields.level.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.level.name}-image"></button><button type="button"
id="btn-clear-{$fields.level.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.level.name}-input', '{$fields.level.name}');sync_{$fields.level.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.level.name}{literal}");
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
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.level.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.level.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.level.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.level.name}{literal}");
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
sync_{/literal}{$fields.level.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.level.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.level.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.level.name}{literal}", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("{/literal}{$fields.level.name}{literal}");
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


{if is_string($fields.level.options)}
<input type="hidden" class="sugar_field" id="{$fields.level.name}" value="{ $fields.level.options }">
{ $fields.level.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.level.name}" value="{ $fields.level.value }">
{ $fields.level.options[$fields.level.value]}
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
{if $fields.address_address_street.acl > 1 || ($showDetailData && $fields.address_address_street.acl > 0)}
{counter name="fieldsUsed"}

<td valign="top" width='37.5%' colspan='3'>
{if $fields.address_address_street.acl > 1}
{counter name="panelFieldCount"}

<!--Include Google Maps API: Add by Tung Bui: 13/10/2015-->
<script type="text/javascript" src='https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places'></script>
{sugar_getscript file='include/SugarFields/Fields/Address/SugarFieldAddress.js'}
<fieldset id='ADDRESS_address_fieldset'>
<legend>{sugar_translate label='LBL_ADDRESS_ADDRESS' module=''}</legend>
<table border="0" cellspacing="1" cellpadding="0" class="edit" width="100%">
<tr>
<td valign="top" id="address_address_street_label" width='25%' scope='row' >
<label for='address_address_street'>{sugar_translate label='LBL_STREET' module=''}:</label>
{if $fields.address_address_street.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td width="*">
<input type="text" id="address_address_street" class="address_autocomplete" name="address_address_street" maxlength="150" size="30"   value='{$fields.address_address_street.value}' />
<input type="hidden" class="longitude" name="address_address_longitude" id="address_address_longitude" value="{$fields.address_address_longitude.value}">
<input type="hidden" class="latitude" name="address_address_latitude" id="address_address_latitude" value="{$fields.address_address_latitude.value}">
</td>
</tr>
<tr>
<td id="address_address_city_label" width='%' scope='row' >
<label for='address_address_city'>{sugar_translate label='LBL_CITY' module=''}:</label>
{if $fields.address_address_city.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="address_address_city" id="address_address_city" size="30" maxlength='100' value='{$fields.address_address_city.value}'  >
</td>
</tr>
<tr>
<td id="address_address_state_label" width='%' scope='row' >
<label for='address_address_state'>{sugar_translate label='LBL_STATE' module=''}:</label>
{if $fields.address_address_state.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="address_address_state" id="address_address_state" size="30" maxlength='100' value='{$fields.address_address_state.value}'  >
</td>
</tr>
<tr>
<td id="address_address_country_label" width='%' scope='row' >
<label for='address_address_country'>{sugar_translate label='LBL_COUNTRY' module=''}:</label>
{if $fields.address_address_country.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="address_address_country" id="address_address_country" size="30" maxlength='100' value='{$fields.address_address_country.value}'  >
</td>
</tr>
<tr>
<td colspan='2' NOWRAP>&nbsp;</td>
</tr>
</table>
</fieldset>   
<script type="text/javascript">
    SUGAR.util.doWhen("typeof(SUGAR.AddressField) != 'undefined'", function(){ldelim}
    address_address = new SUGAR.AddressField("address_checkbox",'', 'address');
    {rdelim});
</script>
{else}
{counter name="panelFieldCount"}

{sugar_getscript file='include/SugarFields/Fields/Address/DisplayMap.js'}
<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td width='99%' >
<input type="hidden" class="sugar_field" id="address_address_street" value="{$fields.address_address_street.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="address_address_city" value="{$fields.address_address_city.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="address_address_state" value="{$fields.address_address_state.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="address_address_country" value="{$fields.address_address_country.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="address_address_postalcode" value="{$fields.address_address_postalcode.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="address_address_latitude" value="{$fields.address_address_latitude.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="address_address_longitude" value="{$fields.address_address_longitude.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<!--Custom code by Bui Kim Tung -- Hide View_map button when address street is empty-->
<!--End custom code by Bui Kim Tung-->
{$fields.address_address_street.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}<br/>
<!--{$fields.address_address_state.value|escape:'htmlentitydecode'|strip_tags|url2html|nl2br}<br/>
{$fields.address_address_city.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}<br/> 
{$fields.address_address_postalcode.value|escape:'htmlentitydecode'|strip_tags|url2html|nl2br}
{$fields.address_address_country.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}-->
{if ! empty($fields.address_address_street.value)}
<br/><input type="button"  id="view_map_address" onclick="displayMap(this)" value="{$APP.LBL_VIEW_MAP}">  
{/if}
</td>
<td class='dataField' width='1%'>
{$custom_code_address}
</td>
</tr>
</table>
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
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("DEFAULT").style.display='none';</script>
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
<div class="action_buttons">{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('form_QuickCreate_J_School'); _form.action.value='Popup';return check_form('form_QuickCreate_J_School')" type="submit" name="J_School_popupcreate_save_button" id="J_School_popupcreate_save_button" value="{$APP.LBL_SAVE_BUTTON_LABEL}">{/if}  <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="toggleDisplay('addform');return false;" name="J_School_popup_cancel_button" type="submit"id="J_School_popup_cancel_button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}">  {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=J_School", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</div>
</form>
{$set_focus_block}
<script>SUGAR.util.doWhen("document.getElementById('EditView') != null",
function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script><script type="text/javascript">
YAHOO.util.Event.onContentReady("form_QuickCreate_J_School",
    function () {ldelim} initEditView(document.forms.form_QuickCreate_J_School) {rdelim});
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
addForm('form_QuickCreate_J_School');addToValidate('form_QuickCreate_J_School', 'name', 'name', false,'{/literal}{sugar_translate label='LBL_NAME' module='J_School' for_js=true}{literal}' );
addToValidate('form_QuickCreate_J_School', 'date_entered_date', 'date', false,'Date Created' );
addToValidate('form_QuickCreate_J_School', 'date_modified_date', 'date', false,'Date Modified' );
addToValidate('form_QuickCreate_J_School', 'modified_user_id', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_MODIFIED' module='J_School' for_js=true}{literal}' );
addToValidate('form_QuickCreate_J_School', 'modified_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_MODIFIED_NAME' module='J_School' for_js=true}{literal}' );
addToValidate('form_QuickCreate_J_School', 'created_by', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_CREATED' module='J_School' for_js=true}{literal}' );
addToValidate('form_QuickCreate_J_School', 'created_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_CREATED' module='J_School' for_js=true}{literal}' );
addToValidate('form_QuickCreate_J_School', 'description', 'text', false,'{/literal}{sugar_translate label='LBL_DESCRIPTION' module='J_School' for_js=true}{literal}' );
addToValidate('form_QuickCreate_J_School', 'deleted', 'bool', false,'{/literal}{sugar_translate label='LBL_DELETED' module='J_School' for_js=true}{literal}' );
addToValidate('form_QuickCreate_J_School', 'assigned_user_id', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_ID' module='J_School' for_js=true}{literal}' );
addToValidate('form_QuickCreate_J_School', 'assigned_user_name', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='J_School' for_js=true}{literal}' );
addToValidate('form_QuickCreate_J_School', 'team_name', 'teamset', false,'{/literal}{sugar_translate label='LBL_TEAMS' module='J_School' for_js=true}{literal}' );
addToValidate('form_QuickCreate_J_School', 'school_id', 'varchar', true,'{/literal}{sugar_translate label='LBL_SCHOOL_ID' module='J_School' for_js=true}{literal}' );
addToValidate('form_QuickCreate_J_School', 'short_name', 'varchar', true,'{/literal}{sugar_translate label='LBL_SHORT_NAME' module='J_School' for_js=true}{literal}' );
addToValidate('form_QuickCreate_J_School', 'level', 'enum', true,'{/literal}{sugar_translate label='LBL_LEVEL' module='J_School' for_js=true}{literal}' );
addToValidate('form_QuickCreate_J_School', 'address_address_street', 'varchar', false,'{/literal}{sugar_translate label='LBL_ADDRESS_STREET' module='J_School' for_js=true}{literal}' );
addToValidate('form_QuickCreate_J_School', 'address_address_city', 'varchar', false,'{/literal}{sugar_translate label='LBL_ADDRESS_CITY' module='J_School' for_js=true}{literal}' );
addToValidate('form_QuickCreate_J_School', 'address_address_state', 'varchar', false,'{/literal}{sugar_translate label='LBL_ADDRESS_STATE' module='J_School' for_js=true}{literal}' );
addToValidate('form_QuickCreate_J_School', 'address_address_postalcode', 'varchar', false,'{/literal}{sugar_translate label='LBL_ADDRESS_POSTALCODE' module='J_School' for_js=true}{literal}' );
addToValidate('form_QuickCreate_J_School', 'address_address_country', 'varchar', false,'{/literal}{sugar_translate label='LBL_ADDRESS_COUNTRY' module='J_School' for_js=true}{literal}' );
addToValidateBinaryDependency('form_QuickCreate_J_School', 'assigned_user_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='J_School' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_ASSIGNED_TO' module='J_School' for_js=true}{literal}', 'assigned_user_id' );
</script><script type=text/javascript>
SUGAR.util.doWhen('!SUGAR.util.ajaxCallInProgress() && ((typeof action_sugar_grp1 != "undefined" && action_sugar_grp1 == "Popup") || (typeof DCMenu != "undefined" && DCMenu.module))', function(){
SUGAR.forms.AssignmentHandler.registerView('form_QuickCreate_J_School');
SUGAR.forms.AssignmentHandler.LINKS['form_QuickCreate_J_School'] = {"created_by_link":{"relationship":"j_school_created_by","module":"Users","id_name":"created_by"},"modified_user_link":{"relationship":"j_school_modified_user","module":"Users","id_name":"modified_user_id"},"assigned_user_link":{"relationship":"j_school_assigned_user","module":"Users","id_name":"assigned_user_id"},"j_school_prospects_1":{"relationship":"j_school_prospects_1","module":"Prospects"},"j_school_contacts_1":{"relationship":"j_school_contacts_1","module":"Contacts"},"j_school_leads_1":{"relationship":"j_school_leads_1","module":"Leads"}}

YAHOO.util.Event.onContentReady('form_QuickCreate_J_School', SUGAR.forms.AssignmentHandler.loadComplete);});</script>{/literal}
