<?php /* Smarty version 2.6.11, created on 2017-02-07 09:35:59
         compiled from cache/modules/J_School/form_QuickCreate_J_School.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_include', 'cache/modules/J_School/form_QuickCreate_J_School.tpl', 45, false),array('function', 'counter', 'cache/modules/J_School/form_QuickCreate_J_School.tpl', 51, false),array('function', 'sugar_translate', 'cache/modules/J_School/form_QuickCreate_J_School.tpl', 58, false),array('function', 'html_options', 'cache/modules/J_School/form_QuickCreate_J_School.tpl', 116, false),array('function', 'sugar_getimagepath', 'cache/modules/J_School/form_QuickCreate_J_School.tpl', 144, false),array('function', 'sugar_getscript', 'cache/modules/J_School/form_QuickCreate_J_School.tpl', 350, false),array('modifier', 'strip_semicolon', 'cache/modules/J_School/form_QuickCreate_J_School.tpl', 59, false),array('modifier', 'lookup', 'cache/modules/J_School/form_QuickCreate_J_School.tpl', 141, false),array('modifier', 'count', 'cache/modules/J_School/form_QuickCreate_J_School.tpl', 221, false),array('modifier', 'escape', 'cache/modules/J_School/form_QuickCreate_J_School.tpl', 417, false),array('modifier', 'url2html', 'cache/modules/J_School/form_QuickCreate_J_School.tpl', 417, false),array('modifier', 'nl2br', 'cache/modules/J_School/form_QuickCreate_J_School.tpl', 417, false),array('modifier', 'strip_tags', 'cache/modules/J_School/form_QuickCreate_J_School.tpl', 427, false),)), $this); ?>


<script type="text/javascript" src="include/EditView/Panels.js"></script>
<script>
<?php echo '
$(document).ready(function(){
$("ul.clickMenu").each(function(index, node){
$(node).sugarActionMenu();
});
});
'; ?>

</script>
<div class="clear"></div>
<form action="index.php" method="POST" name="<?php echo $this->_tpl_vars['form_name']; ?>
" id="<?php echo $this->_tpl_vars['form_id']; ?>
" <?php echo $this->_tpl_vars['enctype']; ?>
>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="dcQuickEdit">
<tr>
<td class="buttons">
<input type="hidden" name="module" value="<?php echo $this->_tpl_vars['module']; ?>
">
<?php if (isset ( $_REQUEST['isDuplicate'] ) && $_REQUEST['isDuplicate'] == 'true'): ?>
<input type="hidden" name="record" value="">
<input type="hidden" name="duplicateSave" value="true">
<input type="hidden" name="duplicateId" value="<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
">
<?php else: ?>
<input type="hidden" name="record" value="<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
">
<?php endif; ?>
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="action">
<input type="hidden" name="return_module" value="<?php echo $_REQUEST['return_module']; ?>
">
<input type="hidden" name="return_action" value="<?php echo $_REQUEST['return_action']; ?>
">
<input type="hidden" name="return_id" value="<?php echo $_REQUEST['return_id']; ?>
">
<input type="hidden" name="module_tab"> 
<input type="hidden" name="contact_role">
<?php if (( ! empty ( $_REQUEST['return_module'] ) || ! empty ( $_REQUEST['relate_to'] ) ) && ! ( isset ( $_REQUEST['isDuplicate'] ) && $_REQUEST['isDuplicate'] == 'true' )): ?>
<input type="hidden" name="relate_to" value="<?php if ($_REQUEST['return_relationship']):  echo $_REQUEST['return_relationship'];  elseif ($_REQUEST['relate_to'] && empty ( $_REQUEST['from_dcmenu'] )):  echo $_REQUEST['relate_to'];  elseif (empty ( $this->_tpl_vars['isDCForm'] ) && empty ( $_REQUEST['from_dcmenu'] )):  echo $_REQUEST['return_module'];  endif; ?>">
<input type="hidden" name="relate_id" value="<?php echo $_REQUEST['return_id']; ?>
">
<?php endif; ?>
<input type="hidden" name="offset" value="<?php echo $this->_tpl_vars['offset']; ?>
">
<?php $this->assign('place', '_HEADER'); ?> <!-- to be used for id for buttons with custom code in def files-->
<div class="action_buttons"><?php if ($this->_tpl_vars['bean']->aclAccess('save')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="button primary" onclick="var _form = document.getElementById('form_QuickCreate_J_School'); _form.action.value='Popup';return check_form('form_QuickCreate_J_School')" type="submit" name="J_School_popupcreate_save_button" id="J_School_popupcreate_save_button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
"><?php endif; ?>  <input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="toggleDisplay('addform');return false;" name="J_School_popup_cancel_button" type="submit"id="J_School_popup_cancel_button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
">  <?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=J_School", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?><div class="clear"></div></div>
</td>
<td align='right'>
<?php echo $this->_tpl_vars['PAGINATION']; ?>

</td>
</tr>
</table><?php echo smarty_function_sugar_include(array('include' => $this->_tpl_vars['includes']), $this);?>

<span id='tabcounterJS'><script>SUGAR.TabFields=new Array();//this will be used to track tabindexes for references</script></span>
<div id="form_QuickCreate_J_School_tabs"
>
<div >
<div id="detailpanel_1" >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='Default_<?php echo $this->_tpl_vars['module']; ?>
_Subpanel'  class="yui3-skin-sam edit view panelContainer">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['short_name']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['short_name']['acl'] > 0 )): ?>
<td valign="top" id='short_name_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_SHORT_NAME','module' => 'J_School'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' colspan='3'>
<?php if ($this->_tpl_vars['fields']['short_name']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['short_name']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['short_name']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['short_name']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['short_name']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['short_name']['name']; ?>
' size='30' 
maxlength='150' 
value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      accesskey='7'  >
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['short_name']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['short_name']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['short_name']['value']); ?>
<?php endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['short_name']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['short_name']['value']; ?>
</span>
<?php endif; ?>
<?php else: ?>
<td></td><td></td>
<?php endif; ?>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['level']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['level']['acl'] > 0 )): ?>
<td valign="top" id='level_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_LEVEL','module' => 'J_School'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' colspan='3'>
<?php if ($this->_tpl_vars['fields']['level']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! isset ( $this->_tpl_vars['config']['enable_autocomplete'] ) || $this->_tpl_vars['config']['enable_autocomplete'] == false): ?>
<select name="<?php echo $this->_tpl_vars['fields']['level']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['level']['name']; ?>
" 
title=''       
>
<?php if (isset ( $this->_tpl_vars['fields']['level']['value'] ) && $this->_tpl_vars['fields']['level']['value'] != ''): ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['level']['options'],'selected' => $this->_tpl_vars['fields']['level']['value']), $this);?>

<?php else: ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['level']['options'],'selected' => $this->_tpl_vars['fields']['level']['default']), $this);?>

<?php endif; ?>
</select>
<?php else: ?>
<?php $this->assign('field_options', $this->_tpl_vars['fields']['level']['options']); ?>
<?php ob_start();  echo $this->_tpl_vars['fields']['level']['value'];  $this->_smarty_vars['capture']['field_val'] = ob_get_contents(); ob_end_clean(); ?>
<?php $this->assign('field_val', $this->_smarty_vars['capture']['field_val']); ?>
<?php ob_start();  echo $this->_tpl_vars['fields']['level']['name'];  $this->_smarty_vars['capture']['ac_key'] = ob_get_contents(); ob_end_clean(); ?>
<?php $this->assign('ac_key', $this->_smarty_vars['capture']['ac_key']); ?>
<select style='display:none' name="<?php echo $this->_tpl_vars['fields']['level']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['level']['name']; ?>
" 
title=''          
>
<?php if (isset ( $this->_tpl_vars['fields']['level']['value'] ) && $this->_tpl_vars['fields']['level']['value'] != ''): ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['level']['options'],'selected' => $this->_tpl_vars['fields']['level']['value']), $this);?>

<?php else: ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['level']['options'],'selected' => $this->_tpl_vars['fields']['level']['default']), $this);?>

<?php endif; ?>
</select>
<input
id="<?php echo $this->_tpl_vars['fields']['level']['name']; ?>
-input"
name="<?php echo $this->_tpl_vars['fields']['level']['name']; ?>
-input"
size="30"
value="<?php echo ((is_array($_tmp=$this->_tpl_vars['field_val'])) ? $this->_run_mod_handler('lookup', true, $_tmp, $this->_tpl_vars['field_options']) : smarty_modifier_lookup($_tmp, $this->_tpl_vars['field_options'])); ?>
"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-down.png"), $this);?>
" id="<?php echo $this->_tpl_vars['fields']['level']['name']; ?>
-image"></button><button type="button"
id="btn-clear-<?php echo $this->_tpl_vars['fields']['level']['name']; ?>
-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['level']['name']; ?>
-input', '<?php echo $this->_tpl_vars['fields']['level']['name']; ?>
');sync_<?php echo $this->_tpl_vars['fields']['level']['name']; ?>
()"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<?php echo '
<script>
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo ' = [];
'; ?>

<?php echo '
(function (){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['level']['name'];  echo '");
if (typeof select_defaults =="undefined")
select_defaults = [];
select_defaults[selectElem.id] = {key:selectElem.value,text:\'\'};
//get default
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value)
select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
}
//SUGAR.AutoComplete.{$ac_key}.ds = 
//get options array from vardefs
var options = SUGAR.AutoComplete.getOptionsArray("");
YUI().use(\'datasource\', \'datasource-jsonschema\',function (Y) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.ds = new Y.DataSource.Function({
source: function (request) {
var ret = [];
for (i=0;i<selectElem.options.length;i++)
if (!(selectElem.options[i].value==\'\' && selectElem.options[i].innerHTML==\'\'))
ret.push({\'key\':selectElem.options[i].value,\'text\':selectElem.options[i].innerHTML});
return ret;
}
});
});
})();
'; ?>

<?php echo '
YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputNode = Y.one('#<?php echo $this->_tpl_vars['fields']['level']['name']; ?>
-input');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputImage = Y.one('#<?php echo $this->_tpl_vars['fields']['level']['name']; ?>
-image');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputHidden = Y.one('#<?php echo $this->_tpl_vars['fields']['level']['name']; ?>
');
<?php echo '
function SyncToHidden(selectme){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['level']['name'];  echo '");
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
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'change\');
}
//global variable 
sync_';  echo $this->_tpl_vars['fields']['level']['name'];  echo ' = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['level']['name'];  echo '");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.simulate(\'keyup\');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById(\'';  echo $this->_tpl_vars['fields']['level']['name']; ?>
-input<?php echo '\'))
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.set(\'value\',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("';  echo $this->_tpl_vars['fields']['level']['name'];  echo '", syncFromHiddenToWidget);
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 0;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 0;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions = <?php echo count($this->_tpl_vars['field_options']); ?>
;
if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 300) <?php echo '{
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 200;
<?php echo '
}
'; ?>

if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 3000) <?php echo '{
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 500;
<?php echo '
}
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.optionsVisible = false;
<?php echo '
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.plug(Y.Plugin.AutoComplete, {
activateFirstItem: true,
'; ?>

minQueryLength: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen,
queryDelay: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay,
zIndex: 99999,
<?php echo '
source: SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.ds,
resultTextLocator: \'text\',
resultHighlighter: \'phraseMatch\',
resultFilters: \'phraseMatch\',
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.expandHover = function(ex){
var hover = YAHOO.util.Dom.getElementsByClassName(\'dccontent\');
if(hover[0] != null){
if (ex) {
var h = \'1000px\';
hover[0].style.height = h;
}
else{
hover[0].style.height = \'\';
}
}
}
if('; ?>
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen<?php echo ' == 0){
// expand the dropdown options upon focus
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'focus\', function () {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.sendRequest(\'\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible = true;
});
}
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'click\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'click\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'dblclick\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'dblclick\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'focus\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'focus\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'mouseup\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'mouseup\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'mousedown\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'mousedown\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'blur\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'blur\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible = false;
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['level']['name'];  echo '");
//if typed value is a valid option, do nothing
for (i=0;i<selectElem.options.length;i++)
if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\'))
return;
//typed value is invalid, so set the text and the hidden to blank
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.set(\'value\', select_defaults[selectElem.id].text);
SyncToHidden(select_defaults[selectElem.id].key);
});
// when they click on the arrow image, toggle the visibility of the options
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputImage.ancestor().on(\'click\', function () {
if (SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.blur();
} else {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.focus();
}
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'query\', function () {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.set(\'value\', \'\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'visibleChange\', function (e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.expandHover(e.newVal); // expand
});
// when they select an option, set the hidden input with the KEY, to be saved
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'select\', function(e) {
SyncToHidden(e.result.raw.key);
});
});
</script> 
'; ?>

<?php endif; ?>
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['level']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['level']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['level']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['level']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['level']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['level']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['level']['options'][$this->_tpl_vars['fields']['level']['value']]; ?>

<?php endif; ?>
<?php endif; ?>
<?php else: ?>
<td></td><td></td>
<?php endif; ?>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['address_address_street']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['address_address_street']['acl'] > 0 )): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' colspan='3'>
<?php if ($this->_tpl_vars['fields']['address_address_street']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<!--Include Google Maps API: Add by Tung Bui: 13/10/2015-->
<script type="text/javascript" src='https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places'></script>
<?php echo smarty_function_sugar_getscript(array('file' => 'include/SugarFields/Fields/Address/SugarFieldAddress.js'), $this);?>

<fieldset id='ADDRESS_address_fieldset'>
<legend><?php echo smarty_function_sugar_translate(array('label' => 'LBL_ADDRESS_ADDRESS','module' => ''), $this);?>
</legend>
<table border="0" cellspacing="1" cellpadding="0" class="edit" width="100%">
<tr>
<td valign="top" id="address_address_street_label" width='25%' scope='row' >
<label for='address_address_street'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_STREET','module' => ''), $this);?>
:</label>
<?php if ($this->_tpl_vars['fields']['address_address_street']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td width="*">
<input type="text" id="address_address_street" class="address_autocomplete" name="address_address_street" maxlength="150" size="30"   value='<?php echo $this->_tpl_vars['fields']['address_address_street']['value']; ?>
' />
<input type="hidden" class="longitude" name="address_address_longitude" id="address_address_longitude" value="<?php echo $this->_tpl_vars['fields']['address_address_longitude']['value']; ?>
">
<input type="hidden" class="latitude" name="address_address_latitude" id="address_address_latitude" value="<?php echo $this->_tpl_vars['fields']['address_address_latitude']['value']; ?>
">
</td>
</tr>
<tr>
<td id="address_address_city_label" width='%' scope='row' >
<label for='address_address_city'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_CITY','module' => ''), $this);?>
:</label>
<?php if ($this->_tpl_vars['fields']['address_address_city']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="address_address_city" id="address_address_city" size="30" maxlength='100' value='<?php echo $this->_tpl_vars['fields']['address_address_city']['value']; ?>
'  >
</td>
</tr>
<tr>
<td id="address_address_state_label" width='%' scope='row' >
<label for='address_address_state'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_STATE','module' => ''), $this);?>
:</label>
<?php if ($this->_tpl_vars['fields']['address_address_state']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="address_address_state" id="address_address_state" size="30" maxlength='100' value='<?php echo $this->_tpl_vars['fields']['address_address_state']['value']; ?>
'  >
</td>
</tr>
<tr>
<td id="address_address_country_label" width='%' scope='row' >
<label for='address_address_country'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_COUNTRY','module' => ''), $this);?>
:</label>
<?php if ($this->_tpl_vars['fields']['address_address_country']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="address_address_country" id="address_address_country" size="30" maxlength='100' value='<?php echo $this->_tpl_vars['fields']['address_address_country']['value']; ?>
'  >
</td>
</tr>
<tr>
<td colspan='2' NOWRAP>&nbsp;</td>
</tr>
</table>
</fieldset>   
<script type="text/javascript">
    SUGAR.util.doWhen("typeof(SUGAR.AddressField) != 'undefined'", function(){
    address_address = new SUGAR.AddressField("address_checkbox",'', 'address');
    });
</script>
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php echo smarty_function_sugar_getscript(array('file' => 'include/SugarFields/Fields/Address/DisplayMap.js'), $this);?>

<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td width='99%' >
<input type="hidden" class="sugar_field" id="address_address_street" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['address_address_street']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<input type="hidden" class="sugar_field" id="address_address_city" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['address_address_city']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<input type="hidden" class="sugar_field" id="address_address_state" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['address_address_state']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<input type="hidden" class="sugar_field" id="address_address_country" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['address_address_country']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<input type="hidden" class="sugar_field" id="address_address_postalcode" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['address_address_postalcode']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<input type="hidden" class="sugar_field" id="address_address_latitude" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['address_address_latitude']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<input type="hidden" class="sugar_field" id="address_address_longitude" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['address_address_longitude']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<!--Custom code by Bui Kim Tung -- Hide View_map button when address street is empty-->
<!--End custom code by Bui Kim Tung-->
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['address_address_street']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
<br/>
<!--<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['address_address_state']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
<br/>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['address_address_city']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
<br/> 
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['address_address_postalcode']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['address_address_country']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
-->
<?php if (! empty ( $this->_tpl_vars['fields']['address_address_street']['value'] )): ?>
<br/><input type="button"  id="view_map_address" onclick="displayMap(this)" value="<?php echo $this->_tpl_vars['APP']['LBL_VIEW_MAP']; ?>
">  
<?php endif; ?>
</td>
<td class='dataField' width='1%'>
<?php echo $this->_tpl_vars['custom_code_address']; ?>

</td>
</tr>
</table>
<?php endif; ?>
<?php else: ?>
<td></td><td></td>
<?php endif; ?>
<td valign="top" id='_label' width='12.5%' scope="col">
&nbsp;
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' >
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("DEFAULT").style.display='none';</script>
<?php endif; ?>
</div></div>

<script language="javascript">
    var _form_id = '<?php echo $this->_tpl_vars['form_id']; ?>
';
    <?php echo '
    SUGAR.util.doWhen(function(){
        _form_id = (_form_id == \'\') ? \'EditView\' : _form_id;
        return document.getElementById(_form_id) != null;
    }, SUGAR.themes.actionMenu);
    '; ?>

</script>
<?php $this->assign('place', '_FOOTER'); ?> <!-- to be used for id for buttons with custom code in def files-->
<div class="buttons">
<div class="action_buttons"><?php if ($this->_tpl_vars['bean']->aclAccess('save')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="button primary" onclick="var _form = document.getElementById('form_QuickCreate_J_School'); _form.action.value='Popup';return check_form('form_QuickCreate_J_School')" type="submit" name="J_School_popupcreate_save_button" id="J_School_popupcreate_save_button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
"><?php endif; ?>  <input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="toggleDisplay('addform');return false;" name="J_School_popup_cancel_button" type="submit"id="J_School_popup_cancel_button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
">  <?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=J_School", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?><div class="clear"></div></div>
</div>
</form>
<?php echo $this->_tpl_vars['set_focus_block']; ?>

<script>SUGAR.util.doWhen("document.getElementById('EditView') != null",
function(){SUGAR.util.buildAccessKeyLabels();});
</script><script type="text/javascript">
YAHOO.util.Event.onContentReady("form_QuickCreate_J_School",
    function () { initEditView(document.forms.form_QuickCreate_J_School) });
//window.setTimeout(, 100);
window.onbeforeunload = function () { return onUnloadEditView(); };

// bug 55468 -- IE is too aggressive with onUnload event
if ($.browser.msie) {
$(document).ready(function() {
    $(".collapseLink,.expandLink").click(function (e) { e.preventDefault(); });
  });
}

</script><?php echo '
<script type="text/javascript">
addForm(\'form_QuickCreate_J_School\');addToValidate(\'form_QuickCreate_J_School\', \'name\', \'name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'J_School','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_J_School\', \'date_entered_date\', \'date\', false,\'Date Created\' );
addToValidate(\'form_QuickCreate_J_School\', \'date_modified_date\', \'date\', false,\'Date Modified\' );
addToValidate(\'form_QuickCreate_J_School\', \'modified_user_id\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED','module' => 'J_School','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_J_School\', \'modified_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED_NAME','module' => 'J_School','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_J_School\', \'created_by\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'J_School','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_J_School\', \'created_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'J_School','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_J_School\', \'description\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'J_School','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_J_School\', \'deleted\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DELETED','module' => 'J_School','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_J_School\', \'assigned_user_id\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_ID','module' => 'J_School','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_J_School\', \'assigned_user_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_NAME','module' => 'J_School','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_J_School\', \'team_name\', \'teamset\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TEAMS','module' => 'J_School','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_J_School\', \'school_id\', \'varchar\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SCHOOL_ID','module' => 'J_School','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_J_School\', \'short_name\', \'varchar\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHORT_NAME','module' => 'J_School','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_J_School\', \'level\', \'enum\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LEVEL','module' => 'J_School','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_J_School\', \'address_address_street\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ADDRESS_STREET','module' => 'J_School','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_J_School\', \'address_address_city\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ADDRESS_CITY','module' => 'J_School','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_J_School\', \'address_address_state\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ADDRESS_STATE','module' => 'J_School','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_J_School\', \'address_address_postalcode\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ADDRESS_POSTALCODE','module' => 'J_School','for_js' => true), $this); echo '\' );
addToValidate(\'form_QuickCreate_J_School\', \'address_address_country\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ADDRESS_COUNTRY','module' => 'J_School','for_js' => true), $this); echo '\' );
addToValidateBinaryDependency(\'form_QuickCreate_J_School\', \'assigned_user_name\', \'alpha\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'J_School','for_js' => true), $this); echo ': ';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'J_School','for_js' => true), $this); echo '\', \'assigned_user_id\' );
</script><script type=text/javascript>
SUGAR.util.doWhen(\'!SUGAR.util.ajaxCallInProgress() && ((typeof action_sugar_grp1 != "undefined" && action_sugar_grp1 == "Popup") || (typeof DCMenu != "undefined" && DCMenu.module))\', function(){
SUGAR.forms.AssignmentHandler.registerView(\'form_QuickCreate_J_School\');
SUGAR.forms.AssignmentHandler.LINKS[\'form_QuickCreate_J_School\'] = {"created_by_link":{"relationship":"j_school_created_by","module":"Users","id_name":"created_by"},"modified_user_link":{"relationship":"j_school_modified_user","module":"Users","id_name":"modified_user_id"},"assigned_user_link":{"relationship":"j_school_assigned_user","module":"Users","id_name":"assigned_user_id"},"j_school_prospects_1":{"relationship":"j_school_prospects_1","module":"Prospects"},"j_school_contacts_1":{"relationship":"j_school_contacts_1","module":"Contacts"},"j_school_leads_1":{"relationship":"j_school_leads_1","module":"Leads"}}

YAHOO.util.Event.onContentReady(\'form_QuickCreate_J_School\', SUGAR.forms.AssignmentHandler.loadComplete);});</script>'; ?>
