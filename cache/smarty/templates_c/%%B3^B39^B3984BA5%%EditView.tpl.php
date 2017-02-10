<?php /* Smarty version 2.6.11, created on 2017-02-07 11:03:41
         compiled from cache/modules/Prospects/EditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_include', 'cache/modules/Prospects/EditView.tpl', 45, false),array('function', 'counter', 'cache/modules/Prospects/EditView.tpl', 51, false),array('function', 'sugar_getimagepath', 'cache/modules/Prospects/EditView.tpl', 54, false),array('function', 'sugar_translate', 'cache/modules/Prospects/EditView.tpl', 57, false),array('function', 'sugar_getimage', 'cache/modules/Prospects/EditView.tpl', 116, false),array('function', 'html_options', 'cache/modules/Prospects/EditView.tpl', 172, false),array('function', 'sugar_ajax_url', 'cache/modules/Prospects/EditView.tpl', 430, false),array('function', 'sugar_phone', 'cache/modules/Prospects/EditView.tpl', 528, false),array('function', 'sugar_getscript', 'cache/modules/Prospects/EditView.tpl', 643, false),array('function', 'sugarvar_teamset', 'cache/modules/Prospects/EditView.tpl', 1202, false),array('modifier', 'default', 'cache/modules/Prospects/EditView.tpl', 50, false),array('modifier', 'replace', 'cache/modules/Prospects/EditView.tpl', 75, false),array('modifier', 'strip_semicolon', 'cache/modules/Prospects/EditView.tpl', 104, false),array('modifier', 'lookup', 'cache/modules/Prospects/EditView.tpl', 197, false),array('modifier', 'count', 'cache/modules/Prospects/EditView.tpl', 277, false),array('modifier', 'escape', 'cache/modules/Prospects/EditView.tpl', 710, false),array('modifier', 'url2html', 'cache/modules/Prospects/EditView.tpl', 710, false),array('modifier', 'nl2br', 'cache/modules/Prospects/EditView.tpl', 710, false),array('modifier', 'strip_tags', 'cache/modules/Prospects/EditView.tpl', 720, false),)), $this); ?>


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
" class="button primary" onclick="var _form = document.getElementById('EditView'); <?php if ($this->_tpl_vars['isDuplicate']): ?>_form.return_id.value=''; <?php endif; ?>_form.action.value='Save'; if(check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" id="SAVE_HEADER"><?php endif; ?>  <?php if (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && ! empty ( $_REQUEST['return_id'] ) )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module=<?php echo $_REQUEST['return_module']; ?>
&record=<?php echo $_REQUEST['return_id']; ?>
'); return false;" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" type="button" id="CANCEL_HEADER"> <?php elseif (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && ! empty ( $this->_tpl_vars['fields']['id']['value'] ) )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module=<?php echo $_REQUEST['return_module']; ?>
&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_HEADER"> <?php elseif (empty ( $_REQUEST['return_action'] ) || empty ( $_REQUEST['return_id'] ) && ! empty ( $this->_tpl_vars['fields']['id']['value'] )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=Prospects'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_HEADER"> <?php else: ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=<?php echo $_REQUEST['return_module']; ?>
&record=<?php echo $_REQUEST['return_id']; ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_HEADER"> <?php endif; ?> <?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=Prospects", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?><div class="clear"></div></div>
</td>
<td align='right'>
<?php echo $this->_tpl_vars['PAGINATION']; ?>

</td>
</tr>
</table><?php echo smarty_function_sugar_include(array('include' => $this->_tpl_vars['includes']), $this);?>

<span id='tabcounterJS'><script>SUGAR.TabFields=new Array();//this will be used to track tabindexes for references</script></span>
<div id="EditView_tabs"
>
<div >
<div id="detailpanel_1" class="<?php echo ((is_array($_tmp=@$this->_tpl_vars['def']['templateMeta']['panelClass'])) ? $this->_run_mod_handler('default', true, $_tmp, 'edit view edit508') : smarty_modifier_default($_tmp, 'edit view edit508')); ?>
">
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<h4>&nbsp;&nbsp;
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(1);">
<img border="0" id="detailpanel_1_img_hide" src="<?php echo smarty_function_sugar_getimagepath(array('file' => "basic_search.gif"), $this);?>
"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(1);">
<img border="0" id="detailpanel_1_img_show" src="<?php echo smarty_function_sugar_getimagepath(array('file' => "advanced_search.gif"), $this);?>
"></a>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_PROSPECT_INFORMATION','module' => 'Prospects'), $this);?>

<script>
document.getElementById('detailpanel_1').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_PROSPECT_INFORMATION'  class="yui3-skin-sam edit view panelContainer">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['name']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['name']['acl'] > 0 )): ?>
<td valign="top" id='name_label' width='12.5%' scope="col">
<label for="name"><?php echo $this->_tpl_vars['MOD']['LBL_NAME']; ?>
 <span class="required">*</span></label>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' colspan='3'>
<?php if ($this->_tpl_vars['fields']['name']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

&nbsp;<input accesskey="7"  tabindex="0"  name="last_name" id="last_name" placeholder="<?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_LAST_NAME'])) ? $this->_run_mod_handler('replace', true, $_tmp, ':', '') : smarty_modifier_replace($_tmp, ':', '')); ?>
" style="width:120px !important" size="15" type="text"  value="<?php echo $this->_tpl_vars['fields']['last_name']['value']; ?>
">
&nbsp;<input accesskey="7"  tabindex="0"  name="first_name" id="first_name" placeholder="<?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_FIRST_NAME'])) ? $this->_run_mod_handler('replace', true, $_tmp, ':', '') : smarty_modifier_replace($_tmp, ':', '')); ?>
" style="width:120px !important" size="15" type="text" value="<?php echo $this->_tpl_vars['fields']['first_name']['value']; ?>
"><br>
<span style=" color: #A99A9A; font-style: italic;"> Bùi Vũ Thanh An  </br> Last Name: Bùi Vũ Thanh </br> First Name:  An </span>
<?php else: ?>
</td>
<td></td><td></td>
</td>		
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
<td valign="top" id='_label' width='12.5%' scope="col">
&nbsp;
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' >
</td>
<?php if ($this->_tpl_vars['fields']['birthdate']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['birthdate']['acl'] > 0 )): ?>
<td valign="top" id='birthdate_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_BIRTHDATE','module' => 'Prospects'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' >
<?php if ($this->_tpl_vars['fields']['birthdate']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="dateTime">
<?php $this->assign('date_value', $this->_tpl_vars['fields']['birthdate']['value']); ?>
<input class="date_input" autocomplete="off" type="text" name="<?php echo $this->_tpl_vars['fields']['birthdate']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['birthdate']['name']; ?>
" value="<?php echo $this->_tpl_vars['date_value']; ?>
" title=''  tabindex='0'    size="11" maxlength="10" >
<?php ob_start(); ?>alt="<?php echo $this->_tpl_vars['APP']['LBL_ENTER_DATE']; ?>
" style="position:relative; top:6px" border="0" id="<?php echo $this->_tpl_vars['fields']['birthdate']['name']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean(); ?>
<?php echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'other_attributes' => ($this->_tpl_vars['other_attributes'])), $this);?>

</span>
<script type="text/javascript">
Calendar.setup ({
inputField : "<?php echo $this->_tpl_vars['fields']['birthdate']['name']; ?>
",
ifFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
button : "<?php echo $this->_tpl_vars['fields']['birthdate']['name']; ?>
_trigger",
singleClick : true,
dateStr : "<?php echo $this->_tpl_vars['date_value']; ?>
",
startWeekday: <?php echo ((is_array($_tmp=@$this->_tpl_vars['CALENDAR_FDOW'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
,
step : 1,
weekNumbers:false
}
);
</script>
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (strlen ( $this->_tpl_vars['fields']['birthdate']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['birthdate']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['birthdate']['value']); ?>
<?php endif; ?>
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['birthdate']['name']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
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
<?php if ($this->_tpl_vars['fields']['gender']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['gender']['acl'] > 0 )): ?>
<td valign="top" id='gender_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_GENDER','module' => 'Prospects'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' >
<?php if ($this->_tpl_vars['fields']['gender']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! isset ( $this->_tpl_vars['config']['enable_autocomplete'] ) || $this->_tpl_vars['config']['enable_autocomplete'] == false): ?>
<select name="<?php echo $this->_tpl_vars['fields']['gender']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['gender']['name']; ?>
" 
title=''       
>
<?php if (isset ( $this->_tpl_vars['fields']['gender']['value'] ) && $this->_tpl_vars['fields']['gender']['value'] != ''): ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['gender']['options'],'selected' => $this->_tpl_vars['fields']['gender']['value']), $this);?>

<?php else: ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['gender']['options'],'selected' => $this->_tpl_vars['fields']['gender']['default']), $this);?>

<?php endif; ?>
</select>
<?php else: ?>
<?php $this->assign('field_options', $this->_tpl_vars['fields']['gender']['options']); ?>
<?php ob_start();  echo $this->_tpl_vars['fields']['gender']['value'];  $this->_smarty_vars['capture']['field_val'] = ob_get_contents(); ob_end_clean(); ?>
<?php $this->assign('field_val', $this->_smarty_vars['capture']['field_val']); ?>
<?php ob_start();  echo $this->_tpl_vars['fields']['gender']['name'];  $this->_smarty_vars['capture']['ac_key'] = ob_get_contents(); ob_end_clean(); ?>
<?php $this->assign('ac_key', $this->_smarty_vars['capture']['ac_key']); ?>
<select style='display:none' name="<?php echo $this->_tpl_vars['fields']['gender']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['gender']['name']; ?>
" 
title=''          
>
<?php if (isset ( $this->_tpl_vars['fields']['gender']['value'] ) && $this->_tpl_vars['fields']['gender']['value'] != ''): ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['gender']['options'],'selected' => $this->_tpl_vars['fields']['gender']['value']), $this);?>

<?php else: ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['gender']['options'],'selected' => $this->_tpl_vars['fields']['gender']['default']), $this);?>

<?php endif; ?>
</select>
<input
id="<?php echo $this->_tpl_vars['fields']['gender']['name']; ?>
-input"
name="<?php echo $this->_tpl_vars['fields']['gender']['name']; ?>
-input"
size="30"
value="<?php echo ((is_array($_tmp=$this->_tpl_vars['field_val'])) ? $this->_run_mod_handler('lookup', true, $_tmp, $this->_tpl_vars['field_options']) : smarty_modifier_lookup($_tmp, $this->_tpl_vars['field_options'])); ?>
"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-down.png"), $this);?>
" id="<?php echo $this->_tpl_vars['fields']['gender']['name']; ?>
-image"></button><button type="button"
id="btn-clear-<?php echo $this->_tpl_vars['fields']['gender']['name']; ?>
-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['gender']['name']; ?>
-input', '<?php echo $this->_tpl_vars['fields']['gender']['name']; ?>
');sync_<?php echo $this->_tpl_vars['fields']['gender']['name']; ?>
()"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<?php echo '
<script>
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo ' = [];
'; ?>

<?php echo '
(function (){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['gender']['name'];  echo '");
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
.inputNode = Y.one('#<?php echo $this->_tpl_vars['fields']['gender']['name']; ?>
-input');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputImage = Y.one('#<?php echo $this->_tpl_vars['fields']['gender']['name']; ?>
-image');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputHidden = Y.one('#<?php echo $this->_tpl_vars['fields']['gender']['name']; ?>
');
<?php echo '
function SyncToHidden(selectme){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['gender']['name'];  echo '");
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
sync_';  echo $this->_tpl_vars['fields']['gender']['name'];  echo ' = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['gender']['name'];  echo '");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.simulate(\'keyup\');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById(\'';  echo $this->_tpl_vars['fields']['gender']['name']; ?>
-input<?php echo '\'))
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.set(\'value\',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("';  echo $this->_tpl_vars['fields']['gender']['name'];  echo '", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['gender']['name'];  echo '");
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



<?php if (is_string ( $this->_tpl_vars['fields']['gender']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['gender']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['gender']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['gender']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['gender']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['gender']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['gender']['options'][$this->_tpl_vars['fields']['gender']['value']]; ?>

<?php endif; ?>
<?php endif; ?>
<?php else: ?>
<td></td><td></td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['j_school_prospects_1_name']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['j_school_prospects_1_name']['acl'] > 0 )): ?>
<td valign="top" id='j_school_prospects_1_name_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_J_SCHOOL_PROSPECTS_1_FROM_J_SCHOOL_TITLE','module' => 'Prospects'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' >
<?php if ($this->_tpl_vars['fields']['j_school_prospects_1_name']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<input type="text" name="<?php echo $this->_tpl_vars['fields']['j_school_prospects_1_name']['name']; ?>
" class="sqsEnabled" tabindex="0" id="<?php echo $this->_tpl_vars['fields']['j_school_prospects_1_name']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['j_school_prospects_1_name']['value']; ?>
" title='' autocomplete="off"  	 >
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['j_school_prospects_1_name']['id_name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['j_school_prospects_1_name']['id_name']; ?>
" 
value="<?php echo $this->_tpl_vars['fields']['j_school_prospects_1j_school_ida']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['j_school_prospects_1_name']['name']; ?>
" id="btn_<?php echo $this->_tpl_vars['fields']['j_school_prospects_1_name']['name']; ?>
" tabindex="0" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SELECT_BUTTON_TITLE'), $this);?>
" class="button firstChild" value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SELECT_BUTTON_LABEL'), $this);?>
"
onclick='open_popup(
"<?php echo $this->_tpl_vars['fields']['j_school_prospects_1_name']['module']; ?>
", 
600, 
400, 
"", 
true, 
false, 
<?php echo '{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"j_school_prospects_1j_school_ida","name":"j_school_prospects_1_name"}}'; ?>
, 
"single", 
true
);' ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-select.png"), $this);?>
"></button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['j_school_prospects_1_name']['name']; ?>
" id="btn_clr_<?php echo $this->_tpl_vars['fields']['j_school_prospects_1_name']['name']; ?>
" tabindex="0" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_RELATE_TITLE'), $this);?>
"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['j_school_prospects_1_name']['name']; ?>
', '<?php echo $this->_tpl_vars['fields']['j_school_prospects_1_name']['id_name']; ?>
');"  value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_RELATE_LABEL'), $this);?>
" ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['j_school_prospects_1_name']['name']; ?>
']) != 'undefined'",
		enableQS
);
</script>
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['j_school_prospects_1j_school_ida']['value'] )): ?>
<?php ob_start(); ?>index.php?module=J_School&action=DetailView&record=<?php echo $this->_tpl_vars['fields']['j_school_prospects_1j_school_ida']['value'];  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('detail_url', ob_get_contents());ob_end_clean(); ?>
<a href="<?php echo smarty_function_sugar_ajax_url(array('url' => $this->_tpl_vars['detail_url']), $this);?>
"><?php endif; ?>
<span id="j_school_prospects_1j_school_ida" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['j_school_prospects_1j_school_ida']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['j_school_prospects_1_name']['value']; ?>
</span>
<?php if (! empty ( $this->_tpl_vars['fields']['j_school_prospects_1j_school_ida']['value'] )): ?></a><?php endif; ?>
<?php endif; ?>
<?php else: ?>
<td></td><td></td>
<?php endif; ?>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() { initPanel(1, 'expanded'); }); </script>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_PROSPECT_INFORMATION").style.display='none';</script>
<?php endif; ?>
<div id="detailpanel_2" class="<?php echo ((is_array($_tmp=@$this->_tpl_vars['def']['templateMeta']['panelClass'])) ? $this->_run_mod_handler('default', true, $_tmp, 'edit view edit508') : smarty_modifier_default($_tmp, 'edit view edit508')); ?>
">
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<h4>&nbsp;&nbsp;
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(2);">
<img border="0" id="detailpanel_2_img_hide" src="<?php echo smarty_function_sugar_getimagepath(array('file' => "basic_search.gif"), $this);?>
"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(2);">
<img border="0" id="detailpanel_2_img_show" src="<?php echo smarty_function_sugar_getimagepath(array('file' => "advanced_search.gif"), $this);?>
"></a>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_EDITVIEW_PANEL1','module' => 'Prospects'), $this);?>

<script>
document.getElementById('detailpanel_2').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_EDITVIEW_PANEL1'  class="yui3-skin-sam edit view panelContainer">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['guardian_name']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['guardian_name']['acl'] > 0 )): ?>
<td valign="top" id='guardian_name_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_GUARDIAN_NAME','module' => 'Prospects'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' colspan='3'>
<?php if ($this->_tpl_vars['fields']['guardian_name']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['guardian_name']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['guardian_name']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['guardian_name']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['guardian_name']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['guardian_name']['name']; ?>
' size='30' 
maxlength='100' 
value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      >
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['guardian_name']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['guardian_name']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['guardian_name']['value']); ?>
<?php endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['guardian_name']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['guardian_name']['value']; ?>
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
<?php if ($this->_tpl_vars['fields']['phone_mobile']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['phone_mobile']['acl'] > 0 )): ?>
<td valign="top" id='phone_mobile_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_MOBILE_PHONE','module' => 'Prospects'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' >
<?php if ($this->_tpl_vars['fields']['phone_mobile']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['phone_mobile']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['phone_mobile']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['phone_mobile']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['phone_mobile']['name']; ?>
' id='<?php echo $this->_tpl_vars['fields']['phone_mobile']['name']; ?>
' size='30' maxlength='100' value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='0'	  class="phone" >
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['phone_mobile']['value'] )): ?>
<?php $this->assign('phone_value', $this->_tpl_vars['fields']['phone_mobile']['value']); ?>
<?php echo smarty_function_sugar_phone(array('value' => $this->_tpl_vars['phone_value'],'usa_format' => '0'), $this);?>

<?php endif; ?>
<?php endif; ?>
<?php else: ?>
<td></td><td></td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['guardian_phone']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['guardian_phone']['acl'] > 0 )): ?>
<td valign="top" id='guardian_phone_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_GUARDIAN_PHONE','module' => 'Prospects'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' >
<?php if ($this->_tpl_vars['fields']['guardian_phone']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['guardian_phone']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['guardian_phone']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['guardian_phone']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['guardian_phone']['name']; ?>
' id='<?php echo $this->_tpl_vars['fields']['guardian_phone']['name']; ?>
' size='30' maxlength='50' value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='0'	  class="phone" >
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['guardian_phone']['value'] )): ?>
<?php $this->assign('phone_value', $this->_tpl_vars['fields']['guardian_phone']['value']); ?>
<?php echo smarty_function_sugar_phone(array('value' => $this->_tpl_vars['phone_value'],'usa_format' => '0'), $this);?>

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
<td valign="top" id='_label' width='12.5%' scope="col">
&nbsp;
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' >
</td>
<?php if ($this->_tpl_vars['fields']['phone_other']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['phone_other']['acl'] > 0 )): ?>
<td valign="top" id='phone_other_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_OTHER_PHONE','module' => 'Prospects'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' >
<?php if ($this->_tpl_vars['fields']['phone_other']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['phone_other']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['phone_other']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['phone_other']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['phone_other']['name']; ?>
' id='<?php echo $this->_tpl_vars['fields']['phone_other']['name']; ?>
' size='30' maxlength='100' value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='0'	  class="phone" >
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['phone_other']['value'] )): ?>
<?php $this->assign('phone_value', $this->_tpl_vars['fields']['phone_other']['value']); ?>
<?php echo smarty_function_sugar_phone(array('value' => $this->_tpl_vars['phone_value'],'usa_format' => '0'), $this);?>

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
<?php if ($this->_tpl_vars['fields']['email1']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['email1']['acl'] > 0 )): ?>
<td valign="top" id='email1_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL_ADDRESS','module' => 'Prospects'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' >
<?php if ($this->_tpl_vars['fields']['email1']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id='email1_span'>
<?php echo $this->_tpl_vars['fields']['email1']['value']; ?>
</span>
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id='email1_span'>
<?php echo $this->_tpl_vars['fields']['email1']['value']; ?>

</span>
<?php endif; ?>
<?php else: ?>
<td></td><td></td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['primary_address_street']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['primary_address_street']['acl'] > 0 )): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' colspan='2'>
<?php if ($this->_tpl_vars['fields']['primary_address_street']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<!--Include Google Maps API: Add by Tung Bui: 13/10/2015-->
<script type="text/javascript" src='https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places'></script>
<?php echo smarty_function_sugar_getscript(array('file' => 'include/SugarFields/Fields/Address/SugarFieldAddress.js'), $this);?>

<fieldset id='PRIMARY_address_fieldset'>
<legend><?php echo smarty_function_sugar_translate(array('label' => 'LBL_PRIMARY_ADDRESS','module' => ''), $this);?>
</legend>
<table border="0" cellspacing="1" cellpadding="0" class="edit" width="100%">
<tr>
<td valign="top" id="primary_address_street_label" width='25%' scope='row' >
<label for='primary_address_street'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_STREET','module' => ''), $this);?>
:</label>
<?php if ($this->_tpl_vars['fields']['primary_address_street']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td width="*">
<input type="text" id="primary_address_street" class="address_autocomplete" name="primary_address_street" maxlength="150" size="30"   value='<?php echo $this->_tpl_vars['fields']['primary_address_street']['value']; ?>
' />
<input type="hidden" class="longitude" name="primary_address_longitude" id="primary_address_longitude" value="<?php echo $this->_tpl_vars['fields']['primary_address_longitude']['value']; ?>
">
<input type="hidden" class="latitude" name="primary_address_latitude" id="primary_address_latitude" value="<?php echo $this->_tpl_vars['fields']['primary_address_latitude']['value']; ?>
">
</td>
</tr>
<tr>
<td id="primary_address_city_label" width='%' scope='row' >
<label for='primary_address_city'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_CITY','module' => ''), $this);?>
:</label>
<?php if ($this->_tpl_vars['fields']['primary_address_city']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="primary_address_city" id="primary_address_city" size="30" maxlength='150' value='<?php echo $this->_tpl_vars['fields']['primary_address_city']['value']; ?>
'  >
</td>
</tr>
<tr>
<td id="primary_address_state_label" width='%' scope='row' >
<label for='primary_address_state'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_STATE','module' => ''), $this);?>
:</label>
<?php if ($this->_tpl_vars['fields']['primary_address_state']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="primary_address_state" id="primary_address_state" size="30" maxlength='150' value='<?php echo $this->_tpl_vars['fields']['primary_address_state']['value']; ?>
'  >
</td>
</tr>
<tr>
<td id="primary_address_country_label" width='%' scope='row' >
<label for='primary_address_country'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_COUNTRY','module' => ''), $this);?>
:</label>
<?php if ($this->_tpl_vars['fields']['primary_address_country']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="primary_address_country" id="primary_address_country" size="30" maxlength='150' value='<?php echo $this->_tpl_vars['fields']['primary_address_country']['value']; ?>
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
    primary_address = new SUGAR.AddressField("primary_checkbox",'', 'primary');
    });
</script>
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php echo smarty_function_sugar_getscript(array('file' => 'include/SugarFields/Fields/Address/DisplayMap.js'), $this);?>

<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td width='99%' >
<input type="hidden" class="sugar_field" id="primary_address_street" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['primary_address_street']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<input type="hidden" class="sugar_field" id="primary_address_city" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['primary_address_city']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<input type="hidden" class="sugar_field" id="primary_address_state" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['primary_address_state']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<input type="hidden" class="sugar_field" id="primary_address_country" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['primary_address_country']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<input type="hidden" class="sugar_field" id="primary_address_postalcode" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['primary_address_postalcode']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<input type="hidden" class="sugar_field" id="primary_address_latitude" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['primary_address_latitude']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<input type="hidden" class="sugar_field" id="primary_address_longitude" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['primary_address_longitude']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<!--Custom code by Bui Kim Tung -- Hide View_map button when address street is empty-->
<!--End custom code by Bui Kim Tung-->
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['primary_address_street']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
<br/>
<!--<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['primary_address_state']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
<br/>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['primary_address_city']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
<br/> 
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['primary_address_postalcode']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['primary_address_country']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
-->
<?php if (! empty ( $this->_tpl_vars['fields']['primary_address_street']['value'] )): ?>
<br/><input type="button"  id="view_map_primary" onclick="displayMap(this)" value="<?php echo $this->_tpl_vars['APP']['LBL_VIEW_MAP']; ?>
">  
<?php endif; ?>
</td>
<td class='dataField' width='1%'>
<?php echo $this->_tpl_vars['custom_code_primary']; ?>

</td>
</tr>
</table>
<?php endif; ?>
<?php else: ?>
<td></td><td></td>
<?php endif; ?>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() { initPanel(2, 'expanded'); }); </script>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_EDITVIEW_PANEL1").style.display='none';</script>
<?php endif; ?>
<div id="detailpanel_3" class="<?php echo ((is_array($_tmp=@$this->_tpl_vars['def']['templateMeta']['panelClass'])) ? $this->_run_mod_handler('default', true, $_tmp, 'edit view edit508') : smarty_modifier_default($_tmp, 'edit view edit508')); ?>
">
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<h4>&nbsp;&nbsp;
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(3);">
<img border="0" id="detailpanel_3_img_hide" src="<?php echo smarty_function_sugar_getimagepath(array('file' => "basic_search.gif"), $this);?>
"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(3);">
<img border="0" id="detailpanel_3_img_show" src="<?php echo smarty_function_sugar_getimagepath(array('file' => "advanced_search.gif"), $this);?>
"></a>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_PANEL_ASSIGNMENT','module' => 'Prospects'), $this);?>

<script>
document.getElementById('detailpanel_3').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_PANEL_ASSIGNMENT'  class="yui3-skin-sam edit view panelContainer">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='_label' width='12.5%' scope="col">
&nbsp;
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' >
</td>
<?php if ($this->_tpl_vars['fields']['status']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['status']['acl'] > 0 )): ?>
<td valign="top" id='status_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_STATUS','module' => 'Prospects'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' >
<?php if ($this->_tpl_vars['fields']['status']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<?php echo $this->_tpl_vars['STATUS']; ?>

<?php else: ?>
</td>
<td></td><td></td>
</td>		
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
<?php if ($this->_tpl_vars['fields']['lead_source']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['lead_source']['acl'] > 0 )): ?>
<td valign="top" id='lead_source_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_LEAD_SOURCE','module' => 'Prospects'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' >
<?php if ($this->_tpl_vars['fields']['lead_source']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<?php echo $this->_tpl_vars['lead_source']; ?>

<?php else: ?>
</td>
<td></td><td></td>
</td>		
<?php endif; ?>
<?php else: ?>
<td></td><td></td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['potential']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['potential']['acl'] > 0 )): ?>
<td valign="top" id='potential_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_POTENTIAL','module' => 'Prospects'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' >
<?php if ($this->_tpl_vars['fields']['potential']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! isset ( $this->_tpl_vars['config']['enable_autocomplete'] ) || $this->_tpl_vars['config']['enable_autocomplete'] == false): ?>
<select name="<?php echo $this->_tpl_vars['fields']['potential']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['potential']['name']; ?>
" 
title=''       
>
<?php if (isset ( $this->_tpl_vars['fields']['potential']['value'] ) && $this->_tpl_vars['fields']['potential']['value'] != ''): ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['potential']['options'],'selected' => $this->_tpl_vars['fields']['potential']['value']), $this);?>

<?php else: ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['potential']['options'],'selected' => $this->_tpl_vars['fields']['potential']['default']), $this);?>

<?php endif; ?>
</select>
<?php else: ?>
<?php $this->assign('field_options', $this->_tpl_vars['fields']['potential']['options']); ?>
<?php ob_start();  echo $this->_tpl_vars['fields']['potential']['value'];  $this->_smarty_vars['capture']['field_val'] = ob_get_contents(); ob_end_clean(); ?>
<?php $this->assign('field_val', $this->_smarty_vars['capture']['field_val']); ?>
<?php ob_start();  echo $this->_tpl_vars['fields']['potential']['name'];  $this->_smarty_vars['capture']['ac_key'] = ob_get_contents(); ob_end_clean(); ?>
<?php $this->assign('ac_key', $this->_smarty_vars['capture']['ac_key']); ?>
<select style='display:none' name="<?php echo $this->_tpl_vars['fields']['potential']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['potential']['name']; ?>
" 
title=''          
>
<?php if (isset ( $this->_tpl_vars['fields']['potential']['value'] ) && $this->_tpl_vars['fields']['potential']['value'] != ''): ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['potential']['options'],'selected' => $this->_tpl_vars['fields']['potential']['value']), $this);?>

<?php else: ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['potential']['options'],'selected' => $this->_tpl_vars['fields']['potential']['default']), $this);?>

<?php endif; ?>
</select>
<input
id="<?php echo $this->_tpl_vars['fields']['potential']['name']; ?>
-input"
name="<?php echo $this->_tpl_vars['fields']['potential']['name']; ?>
-input"
size="30"
value="<?php echo ((is_array($_tmp=$this->_tpl_vars['field_val'])) ? $this->_run_mod_handler('lookup', true, $_tmp, $this->_tpl_vars['field_options']) : smarty_modifier_lookup($_tmp, $this->_tpl_vars['field_options'])); ?>
"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-down.png"), $this);?>
" id="<?php echo $this->_tpl_vars['fields']['potential']['name']; ?>
-image"></button><button type="button"
id="btn-clear-<?php echo $this->_tpl_vars['fields']['potential']['name']; ?>
-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['potential']['name']; ?>
-input', '<?php echo $this->_tpl_vars['fields']['potential']['name']; ?>
');sync_<?php echo $this->_tpl_vars['fields']['potential']['name']; ?>
()"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<?php echo '
<script>
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo ' = [];
'; ?>

<?php echo '
(function (){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['potential']['name'];  echo '");
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
.inputNode = Y.one('#<?php echo $this->_tpl_vars['fields']['potential']['name']; ?>
-input');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputImage = Y.one('#<?php echo $this->_tpl_vars['fields']['potential']['name']; ?>
-image');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputHidden = Y.one('#<?php echo $this->_tpl_vars['fields']['potential']['name']; ?>
');
<?php echo '
function SyncToHidden(selectme){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['potential']['name'];  echo '");
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
sync_';  echo $this->_tpl_vars['fields']['potential']['name'];  echo ' = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['potential']['name'];  echo '");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.simulate(\'keyup\');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById(\'';  echo $this->_tpl_vars['fields']['potential']['name']; ?>
-input<?php echo '\'))
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.set(\'value\',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("';  echo $this->_tpl_vars['fields']['potential']['name'];  echo '", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['potential']['name'];  echo '");
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



<?php if (is_string ( $this->_tpl_vars['fields']['potential']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['potential']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['potential']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['potential']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['potential']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['potential']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['potential']['options'][$this->_tpl_vars['fields']['potential']['value']]; ?>

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
<?php if ($this->_tpl_vars['fields']['lead_source_description']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['lead_source_description']['acl'] > 0 )): ?>
<td valign="top" id='lead_source_description_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_SOURCE_DESCRIPTION','module' => 'Prospects'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' >
<?php if ($this->_tpl_vars['fields']['lead_source_description']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (empty ( $this->_tpl_vars['fields']['lead_source_description']['value'] )): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['lead_source_description']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['lead_source_description']['value']); ?>
<?php endif; ?>  
<textarea  id='<?php echo $this->_tpl_vars['fields']['lead_source_description']['name']; ?>
' name='<?php echo $this->_tpl_vars['fields']['lead_source_description']['name']; ?>
'
rows="2" 
cols="30" 
title='' tabindex="0" 
 ><?php echo $this->_tpl_vars['value']; ?>
</textarea>
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['lead_source_description']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['lead_source_description']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
<?php endif; ?>
<?php else: ?>
<td></td><td></td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['campaign_name']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['campaign_name']['acl'] > 0 )): ?>
<td valign="top" id='campaign_name_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_CAMPAIGN','module' => 'Prospects'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' >
<?php if ($this->_tpl_vars['fields']['campaign_name']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<input type="text" name="<?php echo $this->_tpl_vars['fields']['campaign_name']['name']; ?>
" class="sqsEnabled" tabindex="0" id="<?php echo $this->_tpl_vars['fields']['campaign_name']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['campaign_name']['value']; ?>
" title='' autocomplete="off"  	 >
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['campaign_name']['id_name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['campaign_name']['id_name']; ?>
" 
value="<?php echo $this->_tpl_vars['fields']['campaign_id']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['campaign_name']['name']; ?>
" id="btn_<?php echo $this->_tpl_vars['fields']['campaign_name']['name']; ?>
" tabindex="0" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_CAMPAIGNS_TITLE'), $this);?>
" class="button firstChild" value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_CAMPAIGNS_LABEL'), $this);?>
"
onclick='open_popup(
"<?php echo $this->_tpl_vars['fields']['campaign_name']['module']; ?>
", 
600, 
400, 
"", 
true, 
false, 
<?php echo '{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"campaign_id","name":"campaign_name"}}'; ?>
, 
"single", 
true
);' ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-select.png"), $this);?>
"></button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['campaign_name']['name']; ?>
" id="btn_clr_<?php echo $this->_tpl_vars['fields']['campaign_name']['name']; ?>
" tabindex="0" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_CAMPAIGNS_TITLE'), $this);?>
"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['campaign_name']['name']; ?>
', '<?php echo $this->_tpl_vars['fields']['campaign_name']['id_name']; ?>
');"  value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_CAMPAIGNS_LABEL'), $this);?>
" ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['campaign_name']['name']; ?>
']) != 'undefined'",
		enableQS
);
</script>
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['campaign_id']['value'] )): ?>
<?php ob_start(); ?>index.php?module=Campaigns&action=DetailView&record=<?php echo $this->_tpl_vars['fields']['campaign_id']['value'];  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('detail_url', ob_get_contents());ob_end_clean(); ?>
<a href="<?php echo smarty_function_sugar_ajax_url(array('url' => $this->_tpl_vars['detail_url']), $this);?>
"><?php endif; ?>
<span id="campaign_id" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['campaign_id']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['campaign_name']['value']; ?>
</span>
<?php if (! empty ( $this->_tpl_vars['fields']['campaign_id']['value'] )): ?></a><?php endif; ?>
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
<?php if ($this->_tpl_vars['fields']['assigned_user_name']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['assigned_user_name']['acl'] > 0 )): ?>
<td valign="top" id='assigned_user_name_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_NAME','module' => 'Prospects'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' >
<?php if ($this->_tpl_vars['fields']['assigned_user_name']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<input type="text" name="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" class="sqsEnabled" tabindex="0" id="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['value']; ?>
" title='' autocomplete="off"  	 >
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['id_name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['id_name']; ?>
" 
value="<?php echo $this->_tpl_vars['fields']['assigned_user_id']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" id="btn_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" tabindex="0" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_USERS_TITLE'), $this);?>
" class="button firstChild" value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_USERS_LABEL'), $this);?>
"
onclick='open_popup(
"<?php echo $this->_tpl_vars['fields']['assigned_user_name']['module']; ?>
", 
600, 
400, 
"", 
true, 
false, 
<?php echo '{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"assigned_user_id","user_name":"assigned_user_name"}}'; ?>
, 
"single", 
true
);' ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-select.png"), $this);?>
"></button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" id="btn_clr_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" tabindex="0" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_USERS_TITLE'), $this);?>
"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
', '<?php echo $this->_tpl_vars['fields']['assigned_user_name']['id_name']; ?>
');"  value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_USERS_LABEL'), $this);?>
" ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
']) != 'undefined'",
		enableQS
);
</script>
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id="assigned_user_id" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['assigned_user_id']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['assigned_user_name']['value']; ?>
</span>
<?php endif; ?>
<?php else: ?>
<td></td><td></td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['team_name']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['team_name']['acl'] > 0 )): ?>
<td valign="top" id='team_name_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TEAMS','module' => 'Prospects'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' >
<?php if ($this->_tpl_vars['fields']['team_name']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php echo smarty_function_sugarvar_teamset(array('parentFieldArray' => 'fields','vardef' => $this->_tpl_vars['fields']['team_name'],'tabindex' => 1,'display' => '','labelSpan' => '','fieldSpan' => '','formName' => 'EditView','displayType' => 'renderEditView'), $this);?>

<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php echo smarty_function_sugarvar_teamset(array('parentFieldArray' => 'fields','vardef' => $this->_tpl_vars['fields']['team_name'],'tabindex' => 1,'display' => '','labelSpan' => '','fieldSpan' => '','formName' => 'EditView','displayType' => 'renderDetailView'), $this);?>

<?php endif; ?>
<?php else: ?>
<td></td><td></td>
<?php endif; ?>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() { initPanel(3, 'expanded'); }); </script>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_PANEL_ASSIGNMENT").style.display='none';</script>
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
" class="button primary" onclick="var _form = document.getElementById('EditView'); <?php if ($this->_tpl_vars['isDuplicate']): ?>_form.return_id.value=''; <?php endif; ?>_form.action.value='Save'; if(check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" id="SAVE_FOOTER"><?php endif; ?>  <?php if (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && ! empty ( $_REQUEST['return_id'] ) )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module=<?php echo $_REQUEST['return_module']; ?>
&record=<?php echo $_REQUEST['return_id']; ?>
'); return false;" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" type="button" id="CANCEL_FOOTER"> <?php elseif (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && ! empty ( $this->_tpl_vars['fields']['id']['value'] ) )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module=<?php echo $_REQUEST['return_module']; ?>
&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_FOOTER"> <?php elseif (empty ( $_REQUEST['return_action'] ) || empty ( $_REQUEST['return_id'] ) && ! empty ( $this->_tpl_vars['fields']['id']['value'] )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=Prospects'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_FOOTER"> <?php else: ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=<?php echo $_REQUEST['return_module']; ?>
&record=<?php echo $_REQUEST['return_id']; ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_FOOTER"> <?php endif; ?> <?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=Prospects", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?><div class="clear"></div></div>
</div>
</form>
<?php echo $this->_tpl_vars['set_focus_block']; ?>

<script>SUGAR.util.doWhen("document.getElementById('EditView') != null",
function(){SUGAR.util.buildAccessKeyLabels();});
</script><script type="text/javascript">
YAHOO.util.Event.onContentReady("EditView",
    function () { initEditView(document.forms.EditView) });
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
addForm(\'EditView\');addToValidate(\'EditView\', \'name\', \'name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'date_entered_date\', \'date\', false,\'Date Created\' );
addToValidate(\'EditView\', \'date_modified_date\', \'date\', false,\'Date Modified\' );
addToValidate(\'EditView\', \'modified_user_id\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'modified_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED_NAME','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'created_by\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'created_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'description\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'deleted\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DELETED','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'assigned_user_id\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_ID','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'assigned_user_name\', \'relate\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_NAME','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'team_id\', \'team_list\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TEAM_ID','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'team_set_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TEAM_SET_ID','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'team_count\', \'relate\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TEAMS','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'team_name\', \'teamset\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TEAMS','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'salutation\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SALUTATION','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'first_name\', \'varchar\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FIRST_NAME','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'last_name\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LAST_NAME','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'full_name\', \'fullname\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'title\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TITLE','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'department\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DEPARTMENT','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'do_not_call\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DO_NOT_CALL','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'phone_home\', \'phone\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_HOME_PHONE','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'email\', \'email\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ANY_EMAIL','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'phone_mobile\', \'phone\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MOBILE_PHONE','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'phone_work\', \'phone\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_OFFICE_PHONE','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'phone_other\', \'phone\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_OTHER_PHONE','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'phone_fax\', \'phone\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FAX_PHONE','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'email1\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL_ADDRESS','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'email2\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_OTHER_EMAIL_ADDRESS','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'invalid_email\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_INVALID_EMAIL','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'email_opt_out\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL_OPT_OUT','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'primary_address_street\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PRIMARY_ADDRESS_STREET','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'primary_address_street_2\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PRIMARY_ADDRESS_STREET_2','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'primary_address_street_3\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PRIMARY_ADDRESS_STREET_3','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'primary_address_city\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PRIMARY_ADDRESS_CITY','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'primary_address_state\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PRIMARY_ADDRESS_STATE','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'primary_address_postalcode\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PRIMARY_ADDRESS_POSTALCODE','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'primary_address_country\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PRIMARY_ADDRESS_COUNTRY','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'alt_address_street\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ALT_ADDRESS_STREET','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'alt_address_street_2\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ALT_ADDRESS_STREET_2','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'alt_address_street_3\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ALT_ADDRESS_STREET_3','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'alt_address_city\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ALT_ADDRESS_CITY','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'alt_address_state\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ALT_ADDRESS_STATE','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'alt_address_postalcode\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ALT_ADDRESS_POSTALCODE','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'alt_address_country\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ALT_ADDRESS_COUNTRY','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'assistant\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSISTANT','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'assistant_phone\', \'phone\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSISTANT_PHONE','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'email_addresses_non_primary\', \'email\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL_NON_PRIMARY','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'tracker_key\', \'int\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TRACKER_KEY','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'converted\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CONVERTED','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'birthdate\', \'date\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BIRTHDATE','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'birthmonth\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BIRTH_MONTH','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'full_target_name\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FULL_NAME','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'lead_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LEAD_ID','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'account_name\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ACCOUNT_NAME','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'campaign_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CAMPAIGN_ID','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'campaign_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CAMPAIGN','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'status\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_STATUS','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'j_school_prospects_1_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_J_SCHOOL_PROSPECTS_1_FROM_J_SCHOOL_TITLE','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'j_school_prospects_1j_school_ida\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_J_SCHOOL_PROSPECTS_1_FROM_PROSPECTS_TITLE_ID','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'potential\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_POTENTIAL','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'working_date\', \'date\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_WORKING_DATE','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'lead_source\', \'enum\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LEAD_SOURCE','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'lead_source_description\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SOURCE_DESCRIPTION','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'age\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CONTACT_AGE','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'guardian_phone\', \'phone\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_GUARDIAN_PHONE','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'guardian_name\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_GUARDIAN_NAME','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'team_type\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TEAM_TYPE','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'gender\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_GENDER','module' => 'Prospects','for_js' => true), $this); echo '\' );
addToValidateBinaryDependency(\'EditView\', \'assigned_user_name\', \'alpha\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'Prospects','for_js' => true), $this); echo ': ';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'Prospects','for_js' => true), $this); echo '\', \'assigned_user_id\' );
addToValidateBinaryDependency(\'EditView\', \'campaign_name\', \'alpha\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'Prospects','for_js' => true), $this); echo ': ';  echo smarty_function_sugar_translate(array('label' => 'LBL_CAMPAIGN','module' => 'Prospects','for_js' => true), $this); echo '\', \'campaign_id\' );
addToValidateBinaryDependency(\'EditView\', \'j_school_prospects_1_name\', \'alpha\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'Prospects','for_js' => true), $this); echo ': ';  echo smarty_function_sugar_translate(array('label' => 'LBL_J_SCHOOL_PROSPECTS_1_FROM_J_SCHOOL_TITLE','module' => 'Prospects','for_js' => true), $this); echo '\', \'j_school_prospects_1j_school_ida\' );
</script><script language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'EditView_j_school_prospects_1_name\']={"form":"EditView","method":"query","modules":["J_School"],"group":"or","field_list":["name","id"],"populate_list":["j_school_prospects_1_name","j_school_prospects_1j_school_ida"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'EditView_campaign_name\']={"form":"EditView","method":"query","modules":["Campaigns"],"group":"or","field_list":["name","id"],"populate_list":["campaign_id","campaign_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["campaign_id"],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'EditView_assigned_user_name\']={"form":"EditView","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name","assigned_user_id"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'EditView_team_name\']={"form":"EditView","method":"query","modules":["Teams"],"group":"or","field_list":["name","id"],"populate_list":["team_name","team_id"],"required_list":["team_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""},{"name":"name","op":"like_custom","begin":"(","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};</script><script type=text/javascript>
SUGAR.util.doWhen(\'!SUGAR.util.ajaxCallInProgress() && ((typeof action_sugar_grp1 != "undefined" && action_sugar_grp1 == "Popup") || (typeof DCMenu != "undefined" && DCMenu.module))\', function(){
SUGAR.forms.AssignmentHandler.registerView(\'EditView\');
SUGAR.forms.AssignmentHandler.LINKS[\'EditView\'] = {"created_by_link":{"relationship":"prospects_created_by","module":"Users","id_name":"created_by"},"modified_user_link":{"relationship":"prospects_modified_user","module":"Users","id_name":"modified_user_id"},"assigned_user_link":{"relationship":"prospects_assigned_user","module":"Users","id_name":"assigned_user_id"},"email_addresses_primary":{"relationship":"prospects_email_addresses_primary"},"email_addresses":{"relationship":"prospects_email_addresses"},"campaigns":{"relationship":"prospect_campaign_log","module":"CampaignLog"},"campaign_prospects":{"relationship":"campaign_prospects","module":"Campaigns","id_name":"campaign_id"},"prospect_lists":{"relationship":"prospect_list_prospects","module":"ProspectLists"},"calls":{"relationship":"prospect_calls"},"meetings":{"relationship":"prospect_meetings"},"notes":{"relationship":"prospect_notes"},"tasks":{"relationship":"prospect_tasks"},"bc_survey_submission_prospects":{"relationship":"bc_survey_submission_prospects","module":"bc_survey_submission"},"j_school_prospects_1":{"relationship":"j_school_prospects_1","module":"J_School","id_name":"j_school_prospects_1j_school_ida"},"bc_survey_prospects":{"relationship":"bc_survey_prospects","module":"bc_survey"}}

YAHOO.util.Event.onContentReady(\'EditView\', SUGAR.forms.AssignmentHandler.loadComplete);});</script>'; ?>
