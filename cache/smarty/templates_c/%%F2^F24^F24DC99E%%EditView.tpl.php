<?php /* Smarty version 2.6.11, created on 2017-02-07 10:13:56
         compiled from cache/modules/bc_survey/EditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_include', 'cache/modules/bc_survey/EditView.tpl', 45, false),array('function', 'counter', 'cache/modules/bc_survey/EditView.tpl', 51, false),array('function', 'sugar_translate', 'cache/modules/bc_survey/EditView.tpl', 58, false),array('function', 'sugar_getimage', 'cache/modules/bc_survey/EditView.tpl', 170, false),array('function', 'sugar_getjspath', 'cache/modules/bc_survey/EditView.tpl', 178, false),array('function', 'sugar_number_format', 'cache/modules/bc_survey/EditView.tpl', 470, false),array('function', 'sugar_getimagepath', 'cache/modules/bc_survey/EditView.tpl', 510, false),array('modifier', 'strip_semicolon', 'cache/modules/bc_survey/EditView.tpl', 59, false),array('modifier', 'default', 'cache/modules/bc_survey/EditView.tpl', 207, false),array('modifier', 'escape', 'cache/modules/bc_survey/EditView.tpl', 358, false),array('modifier', 'url2html', 'cache/modules/bc_survey/EditView.tpl', 358, false),array('modifier', 'nl2br', 'cache/modules/bc_survey/EditView.tpl', 358, false),array('modifier', 'substr', 'cache/modules/bc_survey/EditView.tpl', 395, false),array('modifier', 'to_url', 'cache/modules/bc_survey/EditView.tpl', 397, false),)), $this); ?>


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
<div class="action_buttons"><input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" id="SAVE_HEADER" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="button primary" onclick="validate()" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
"/> <?php if (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && ! empty ( $_REQUEST['return_id'] ) )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
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
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=bc_survey'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_HEADER"> <?php else: ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=<?php echo $_REQUEST['return_module']; ?>
&record=<?php echo $_REQUEST['return_id']; ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_HEADER"> <?php endif; ?> <?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=bc_survey", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
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
<div id="detailpanel_1" >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='Default_<?php echo $this->_tpl_vars['module']; ?>
_Subpanel'  class="yui3-skin-sam edit view panelContainer">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['name']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['name']['acl'] > 0 )): ?>
<td valign="top" id='name_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'bc_survey'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' colspan='3'>
<?php if ($this->_tpl_vars['fields']['name']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['name']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['name']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['name']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
' size='30' 
maxlength='255' 
value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      accesskey='7'  >
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['name']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['name']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['name']['value']); ?>
<?php endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['name']['value']; ?>
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
<?php if ($this->_tpl_vars['fields']['logo']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['logo']['acl'] > 0 )): ?>
<td valign="top" id='logo_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_LOGO','module' => 'bc_survey'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' colspan='3'>
<?php if ($this->_tpl_vars['fields']['logo']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (! empty ( $this->_tpl_vars['fields']['logo']['value'] )):  $this->assign('showRemove', true);  else:  $this->assign('showRemove', false);  endif;  $this->assign('noChange', false); ?>
<input type="hidden" name="deleteAttachment" value="0">
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['logo']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['logo']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['logo']['value']; ?>
">
<span id="<?php echo $this->_tpl_vars['fields']['logo']['name']; ?>
_old" style="display:<?php if (! $this->_tpl_vars['showRemove']): ?>none;<?php endif; ?>">
<img src="custom/include/surveylogo_images/<?php echo $this->_tpl_vars['fields']['logo']['value']; ?>
" height="100px" class="tabDetailViewDFLink">
<?php if (! $this->_tpl_vars['noChange']): ?>
<input type='button' class='button' id='remove_button' value='<?php echo $this->_tpl_vars['APP']['LBL_REMOVE']; ?>
' onclick='SUGAR.field.file.deleteAttachment("<?php echo $this->_tpl_vars['fields']['logo']['name']; ?>
","",this);'>
<?php endif; ?>
</span>
<?php if (! $this->_tpl_vars['noChange']): ?>
<span id="<?php echo $this->_tpl_vars['fields']['logo']['name']; ?>
_new" class="survey-logo-selection" style="display:<?php if ($this->_tpl_vars['showRemove']): ?>none;<?php endif; ?>">
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['logo']['name']; ?>
_escaped">
<input id="<?php echo $this->_tpl_vars['fields']['logo']['name']; ?>
_file" name="<?php echo $this->_tpl_vars['fields']['logo']['name']; ?>
_file" 
type="file" title='' size="30"
maxlength='255'
>&nbsp;&nbsp;<img title="The max upload image size should be 300px." src="themes/Sugar5/images/helpInline.gif?v=9F2a81TErGINGVZgMbDjow">
<?php else: ?>

<?php endif; ?>
</span>
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['logo']['name']; ?>
">
<a href="index.php?entryPoint=download&id=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&type=<?php echo $this->_tpl_vars['module']; ?>
" class="tabDetailViewDFLink" target='_blank'><?php echo $this->_tpl_vars['fields']['logo']['value']; ?>
</a>
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
<?php if ($this->_tpl_vars['fields']['start_date']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['start_date']['acl'] > 0 )): ?>
<td valign="top" id='start_date_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_START_DATE','module' => 'bc_survey'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' >
<?php if ($this->_tpl_vars['fields']['start_date']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<table border="0" cellpadding="0" cellspacing="0" class="dateTime">
<tr valign="middle">
<td nowrap>
<input autocomplete="off" type="text" id="<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
_date" value="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['fields']['start_date']['name']]['value']; ?>
" size="11" maxlength="10" title='' tabindex="0" onblur="combo_<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
.update();" onchange="combo_<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
.update(); "    >
<?php ob_start(); ?>alt="<?php echo $this->_tpl_vars['APP']['LBL_ENTER_DATE']; ?>
" style="position:relative; top:6px" border="0" id="<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean(); ?>
<?php echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'other_attributes' => ($this->_tpl_vars['other_attributes'])), $this);?>
&nbsp;
</td>
<td nowrap>
<div id="<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
_time_section"></div>
</td>
</tr>
</table>
<input type="hidden" class="DateTimeCombo" id="<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
" name="<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['fields']['start_date']['name']]['value']; ?>
">
<script type="text/javascript" src="<?php echo smarty_function_sugar_getjspath(array('file' => "include/SugarFields/Fields/Datetimecombo/Datetimecombo.js"), $this);?>
"></script>
<script type="text/javascript">
var combo_<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
 = new Datetimecombo("<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['fields']['start_date']['name']]['value']; ?>
", "<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
", "<?php echo $this->_tpl_vars['TIME_FORMAT']; ?>
", "0", '', false, true);
//Render the remaining widget fields
text = combo_<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
.html('');
document.getElementById('<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
_time_section').innerHTML = text;

//Call eval on the update function to handle updates to calendar picker object
eval(combo_<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
.jsscript(''));

//bug 47718: this causes too many addToValidates to be called, resulting in the error messages being displayed multiple times
//    removing it here to mirror the Datetime SugarField, where the validation is not added at this level
//addToValidate('<?php echo $this->_tpl_vars['form_name']; ?>
',"<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
_date",'date',false,"<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
");
addToValidateBinaryDependency('<?php echo $this->_tpl_vars['form_name']; ?>
',"<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
_hours", 'alpha', false, "<?php echo $this->_tpl_vars['APP']['ERR_MISSING_REQUIRED_FIELDS']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_HOURS']; ?>
" ,"<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
_date");
addToValidateBinaryDependency('<?php echo $this->_tpl_vars['form_name']; ?>
', "<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
_minutes", 'alpha', false, "<?php echo $this->_tpl_vars['APP']['ERR_MISSING_REQUIRED_FIELDS']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_MINUTES']; ?>
" ,"<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
_date");
addToValidateBinaryDependency('<?php echo $this->_tpl_vars['form_name']; ?>
', "<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
_meridiem", 'alpha', false, "<?php echo $this->_tpl_vars['APP']['ERR_MISSING_REQUIRED_FIELDS']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_MERIDIEM']; ?>
","<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
_date");

YAHOO.util.Event.onDOMReady(function()
{

	Calendar.setup ({
	onClose : update_<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
,
	inputField : "<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
_date",
	ifFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
	daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
	button : "<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
_trigger",
	singleClick : true,
	step : 1,
	weekNumbers: false,
        startWeekday: <?php echo ((is_array($_tmp=@$this->_tpl_vars['CALENDAR_FDOW'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
,
	comboObject: combo_<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>

	});

	//Call update for first time to round hours and minute values
	combo_<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
.update(false);

}); 
</script>
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['start_date']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['start_date']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['start_date']['value']); ?>
<?php endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['start_date']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['start_date']['value']; ?>
</span>
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
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['end_date']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['end_date']['acl'] > 0 )): ?>
<td valign="top" id='end_date_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_END_DATE','module' => 'bc_survey'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' >
<?php if ($this->_tpl_vars['fields']['end_date']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<table border="0" cellpadding="0" cellspacing="0" class="dateTime">
<tr valign="middle">
<td nowrap>
<input autocomplete="off" type="text" id="<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
_date" value="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['fields']['end_date']['name']]['value']; ?>
" size="11" maxlength="10" title='' tabindex="0" onblur="combo_<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
.update();" onchange="combo_<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
.update(); "    >
<?php ob_start(); ?>alt="<?php echo $this->_tpl_vars['APP']['LBL_ENTER_DATE']; ?>
" style="position:relative; top:6px" border="0" id="<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean(); ?>
<?php echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'other_attributes' => ($this->_tpl_vars['other_attributes'])), $this);?>
&nbsp;
</td>
<td nowrap>
<div id="<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
_time_section"></div>
</td>
</tr>
</table>
<input type="hidden" class="DateTimeCombo" id="<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
" name="<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['fields']['end_date']['name']]['value']; ?>
">
<script type="text/javascript" src="<?php echo smarty_function_sugar_getjspath(array('file' => "include/SugarFields/Fields/Datetimecombo/Datetimecombo.js"), $this);?>
"></script>
<script type="text/javascript">
var combo_<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
 = new Datetimecombo("<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['fields']['end_date']['name']]['value']; ?>
", "<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
", "<?php echo $this->_tpl_vars['TIME_FORMAT']; ?>
", "0", '', false, true);
//Render the remaining widget fields
text = combo_<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
.html('');
document.getElementById('<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
_time_section').innerHTML = text;

//Call eval on the update function to handle updates to calendar picker object
eval(combo_<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
.jsscript(''));

//bug 47718: this causes too many addToValidates to be called, resulting in the error messages being displayed multiple times
//    removing it here to mirror the Datetime SugarField, where the validation is not added at this level
//addToValidate('<?php echo $this->_tpl_vars['form_name']; ?>
',"<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
_date",'date',false,"<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
");
addToValidateBinaryDependency('<?php echo $this->_tpl_vars['form_name']; ?>
',"<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
_hours", 'alpha', false, "<?php echo $this->_tpl_vars['APP']['ERR_MISSING_REQUIRED_FIELDS']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_HOURS']; ?>
" ,"<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
_date");
addToValidateBinaryDependency('<?php echo $this->_tpl_vars['form_name']; ?>
', "<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
_minutes", 'alpha', false, "<?php echo $this->_tpl_vars['APP']['ERR_MISSING_REQUIRED_FIELDS']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_MINUTES']; ?>
" ,"<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
_date");
addToValidateBinaryDependency('<?php echo $this->_tpl_vars['form_name']; ?>
', "<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
_meridiem", 'alpha', false, "<?php echo $this->_tpl_vars['APP']['ERR_MISSING_REQUIRED_FIELDS']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_MERIDIEM']; ?>
","<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
_date");

YAHOO.util.Event.onDOMReady(function()
{

	Calendar.setup ({
	onClose : update_<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
,
	inputField : "<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
_date",
	ifFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
	daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
	button : "<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
_trigger",
	singleClick : true,
	step : 1,
	weekNumbers: false,
        startWeekday: <?php echo ((is_array($_tmp=@$this->_tpl_vars['CALENDAR_FDOW'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
,
	comboObject: combo_<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>

	});

	//Call update for first time to round hours and minute values
	combo_<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
.update(false);

}); 
</script>
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['end_date']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['end_date']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['end_date']['value']); ?>
<?php endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['end_date']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['end_date']['value']; ?>
</span>
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
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['description']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['description']['acl'] > 0 )): ?>
<td valign="top" id='description_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'bc_survey'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' colspan='3'>
<?php if ($this->_tpl_vars['fields']['description']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (empty ( $this->_tpl_vars['fields']['description']['value'] )): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['description']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['description']['value']); ?>
<?php endif; ?>  
<textarea  id='<?php echo $this->_tpl_vars['fields']['description']['name']; ?>
' name='<?php echo $this->_tpl_vars['fields']['description']['name']; ?>
'
rows="4" 
cols="80" 
title='' tabindex="0" 
 ><?php echo $this->_tpl_vars['value']; ?>
</textarea>
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['description']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['description']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
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
<?php if ($this->_tpl_vars['fields']['redirect_url']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['redirect_url']['acl'] > 0 )): ?>
<td valign="top" id='redirect_url_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_REDIRECT_URL','module' => 'bc_survey'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' colspan='3'>
<?php if ($this->_tpl_vars['fields']['redirect_url']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['redirect_url']['value'] )): ?>
<input type='text' name='<?php echo $this->_tpl_vars['fields']['redirect_url']['name']; ?>
' id='<?php echo $this->_tpl_vars['fields']['redirect_url']['name']; ?>
' size='30' 
maxlength='255' value='<?php echo $this->_tpl_vars['fields']['redirect_url']['value']; ?>
' title='' tabindex='0'  >
<?php else: ?>
<input type='text' name='<?php echo $this->_tpl_vars['fields']['redirect_url']['name']; ?>
' id='<?php echo $this->_tpl_vars['fields']['redirect_url']['name']; ?>
' size='30' 
maxlength='255'	   	   <?php if ($this->_tpl_vars['displayView'] == 'advanced_search' || $this->_tpl_vars['displayView'] == 'basic_search'): ?>value=''<?php else: ?>value='http://'<?php endif; ?> 
title='' tabindex='0'  >
<?php endif; ?>
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php ob_start();  echo $this->_tpl_vars['fields']['redirect_url']['value'];  $this->_smarty_vars['capture']['getLink'] = ob_get_contents();  $this->assign('link', ob_get_contents());ob_end_clean(); ?>
<?php if (! empty ( $this->_tpl_vars['link'] )): ?>
<?php ob_start();  echo ((is_array($_tmp=$this->_tpl_vars['link'])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 7) : substr($_tmp, 0, 7));  $this->_smarty_vars['capture']['getStart'] = ob_get_contents();  $this->assign('linkStart', ob_get_contents());ob_end_clean(); ?>
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['redirect_url']['name']; ?>
">
<a href='<?php echo ((is_array($_tmp=$this->_tpl_vars['link'])) ? $this->_run_mod_handler('to_url', true, $_tmp) : smarty_modifier_to_url($_tmp)); ?>
'  ><?php echo $this->_tpl_vars['link']; ?>
</a>
</span>
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
<?php if ($this->_tpl_vars['fields']['is_progress']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['is_progress']['acl'] > 0 )): ?>
<td valign="top" id='is_progress_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_IS_PROGRESS','module' => 'bc_survey'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' colspan='3'>
<?php if ($this->_tpl_vars['fields']['is_progress']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['is_progress']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['is_progress']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['is_progress']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'CHECKED'); ?>
<?php else: ?>
<?php $this->assign('checked', ""); ?>
<?php endif; ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['is_progress']['name']; ?>
" value="0"> 
<input type="checkbox" id="<?php echo $this->_tpl_vars['fields']['is_progress']['name']; ?>
" 
name="<?php echo $this->_tpl_vars['fields']['is_progress']['name']; ?>
" 
value="1" title='' tabindex="0" <?php echo $this->_tpl_vars['checked']; ?>
 >
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['is_progress']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['is_progress']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['is_progress']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'CHECKED'); ?>
<?php else: ?>
<?php $this->assign('checked', ""); ?>
<?php endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['is_progress']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['is_progress']['name']; ?>
" value="$fields.is_progress.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
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
<?php if ($this->_tpl_vars['fields']['allowed_resubmit_count']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['allowed_resubmit_count']['acl'] > 0 )): ?>
<td valign="top" id='allowed_resubmit_count_label' width='12.5%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ALLOWED_RESUBMIT_COUNT','module' => 'bc_survey'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' colspan='3'>
<?php if ($this->_tpl_vars['fields']['allowed_resubmit_count']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['allowed_resubmit_count']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['allowed_resubmit_count']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['allowed_resubmit_count']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['allowed_resubmit_count']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['allowed_resubmit_count']['name']; ?>
' size='30' maxlength='11' value='<?php echo smarty_function_sugar_number_format(array('precision' => 0,'var' => $this->_tpl_vars['value']), $this);?>
' title='' tabindex='0'    >
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['allowed_resubmit_count']['name']; ?>
">
<?php echo smarty_function_sugar_number_format(array('precision' => 0,'var' => $this->_tpl_vars['fields']['allowed_resubmit_count']['value']), $this);?>

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
<td valign="top" id='_label' width='12.5%' scope="col">
&nbsp;
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' colspan='3'>
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
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_EDITVIEW_PANEL1','module' => 'bc_survey'), $this);?>

<script>
document.getElementById('detailpanel_2').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_EDITVIEW_PANEL1'  class="yui3-skin-sam edit view panelContainer">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['survey_page']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['survey_page']['acl'] > 0 )): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='37.5%' colspan='3'>
<?php if ($this->_tpl_vars['fields']['survey_page']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php echo '
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
            if ($(\'#EditView\').find("input[name=\'module\']").val() == "bc_survey") {
                $(".component").show();
                $(".template").hide();
            } else {
                $(".template").show();
                $(".component").hide();
            }
            $(".survey_theme_image").click(function (event) {
                $(event.currentTarget).parent().find(\'input[type="radio"]\').prop(\'checked\', true);
            });
            $(".theme-label").click(function (event) {
                $(event.currentTarget).parent().find(\'input[type="radio"]\').prop(\'checked\', true);
            });
        });
    </script>
'; ?>
   
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
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php echo '
<script type="text/javascript" src="custom/include/js/survey_js/drag-drop.js"></script>
'; ?>

<form action="index.php" method="post" name="DetailView" id="formDetailView">
<input type="hidden" name="module" value="bc_survey_template">
<input type="hidden" name="record" value="<?php echo $this->_tpl_vars['template']->id; ?>
">
<input type="hidden" name="return_action" value="index">
<input type="hidden" name="return_module" value="<?php echo $this->_tpl_vars['module']; ?>
">
<input type="hidden" name="return_id" value="<?php echo $this->_tpl_vars['template']->id; ?>
">
<input type="hidden" name="module_tab">
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="offset" value="1">
<input type="hidden" name="action" value="EditView">
<input type="hidden" name="sugar_body_only">
<div class="survey-view-section">
</div>
</form>
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
<div class="action_buttons"><input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" id="SAVE_HEADER" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="button primary" onclick="validate()" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
"/> <?php if (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && ! empty ( $_REQUEST['return_id'] ) )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
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
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=bc_survey'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_FOOTER"> <?php else: ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=<?php echo $_REQUEST['return_module']; ?>
&record=<?php echo $_REQUEST['return_id']; ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_FOOTER"> <?php endif; ?> <?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=bc_survey", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
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
addForm(\'EditView\');addToValidate(\'EditView\', \'name\', \'name\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'bc_survey','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'date_entered_date\', \'date\', false,\'Date Created\' );
addToValidate(\'EditView\', \'date_modified_date\', \'date\', false,\'Date Modified\' );
addToValidate(\'EditView\', \'modified_user_id\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED','module' => 'bc_survey','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'modified_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED_NAME','module' => 'bc_survey','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'created_by\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'bc_survey','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'created_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'bc_survey','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'description\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'bc_survey','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'deleted\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DELETED','module' => 'bc_survey','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'assigned_user_id\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_ID','module' => 'bc_survey','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'assigned_user_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_NAME','module' => 'bc_survey','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'email_template_subject\', \'name\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL_TEMPLATE_SUBJECT','module' => 'bc_survey','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'logo\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LOGO','module' => 'bc_survey','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'start_date_date\', \'date\', false,\'Start Date\' );
addToValidate(\'EditView\', \'end_date_date\', \'date\', false,\'End Date\' );
addToValidate(\'EditView\', \'theme\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_THEME','module' => 'bc_survey','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'email_template\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL_TEMPLATE','module' => 'bc_survey','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'survey_page\', \'AddSurveyPagefield\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SURVEY_PAGE','module' => 'bc_survey','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'redirect_url\', \'url\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_REDIRECT_URL','module' => 'bc_survey','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'is_progress\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_IS_PROGRESS','module' => 'bc_survey','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'base_score\', \'int\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BASE_SCORE','module' => 'bc_survey','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'allowed_resubmit_count\', \'int\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ALLOWED_RESUBMIT_COUNT','module' => 'bc_survey','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'bc_survey_bc_survey_template_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BC_SURVEY_BC_SURVEY_TEMPLATE_FROM_BC_SURVEY_TEMPLATE_TITLE','module' => 'bc_survey','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'bc_survey_bc_survey_templatebc_survey_template_ida\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BC_SURVEY_BC_SURVEY_TEMPLATE_FROM_BC_SURVEY_TITLE','module' => 'bc_survey','for_js' => true), $this); echo '\' );
addToValidateBinaryDependency(\'EditView\', \'assigned_user_name\', \'alpha\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'bc_survey','for_js' => true), $this); echo ': ';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'bc_survey','for_js' => true), $this); echo '\', \'assigned_user_id\' );
</script><script type=text/javascript>
SUGAR.util.doWhen(\'!SUGAR.util.ajaxCallInProgress() && ((typeof action_sugar_grp1 != "undefined" && action_sugar_grp1 == "Popup") || (typeof DCMenu != "undefined" && DCMenu.module))\', function(){
SUGAR.forms.AssignmentHandler.registerView(\'EditView\');
SUGAR.forms.AssignmentHandler.LINKS[\'EditView\'] = {"created_by_link":{"relationship":"bc_survey_created_by","module":"Users","id_name":"created_by"},"modified_user_link":{"relationship":"bc_survey_modified_user","module":"Users","id_name":"modified_user_id"},"assigned_user_link":{"relationship":"bc_survey_assigned_user","module":"Users","id_name":"assigned_user_id"},"bc_survey_submission_bc_survey":{"relationship":"bc_survey_submission_bc_survey","module":"bc_survey_submission"},"bc_survey_users":{"relationship":"bc_survey_users","module":"Users"},"bc_survey_prospects":{"relationship":"bc_survey_prospects","module":"Prospects"},"bc_survey_leads":{"relationship":"bc_survey_leads","module":"Leads"},"bc_survey_pages_bc_survey":{"relationship":"bc_survey_pages_bc_survey","module":"bc_survey_pages"},"bc_survey_bc_survey_questions":{"relationship":"bc_survey_bc_survey_questions","module":"bc_survey_questions"},"bc_survey_accounts":{"relationship":"bc_survey_accounts","module":"Accounts"},"bc_survey_bc_survey_template":{"relationship":"bc_survey_bc_survey_template","module":"bc_survey_template"},"bc_survey_bc_survey_template_right":{"relationship":"bc_survey_bc_survey_template","id_name":"bc_survey_bc_survey_templatebc_survey_template_ida","module":"bc_survey_template"},"bc_survey_contacts":{"relationship":"bc_survey_contacts","module":"Contacts"}}

YAHOO.util.Event.onContentReady(\'EditView\', SUGAR.forms.AssignmentHandler.loadComplete);});</script>'; ?>
