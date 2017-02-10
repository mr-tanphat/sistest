<?php /* Smarty version 2.6.11, created on 2017-02-08 13:23:19
         compiled from cache/modules/J_Payment/EditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_number_format', 'cache/modules/J_Payment/EditView.tpl', 46, false),array('function', 'sugar_include', 'cache/modules/J_Payment/EditView.tpl', 65, false),array('function', 'counter', 'cache/modules/J_Payment/EditView.tpl', 71, false),array('function', 'sugar_getimagepath', 'cache/modules/J_Payment/EditView.tpl', 74, false),array('function', 'sugar_translate', 'cache/modules/J_Payment/EditView.tpl', 77, false),array('function', 'html_options', 'cache/modules/J_Payment/EditView.tpl', 94, false),array('function', 'sugar_ajax_url', 'cache/modules/J_Payment/EditView.tpl', 138, false),array('function', 'sugar_getimage', 'cache/modules/J_Payment/EditView.tpl', 169, false),array('function', 'sugar_getscript', 'cache/modules/J_Payment/EditView.tpl', 623, false),array('function', 'sugar_getjspath', 'cache/modules/J_Payment/EditView.tpl', 638, false),array('modifier', 'default', 'cache/modules/J_Payment/EditView.tpl', 70, false),array('modifier', 'strip_semicolon', 'cache/modules/J_Payment/EditView.tpl', 99, false),array('modifier', 'lookup', 'cache/modules/J_Payment/EditView.tpl', 241, false),array('modifier', 'count', 'cache/modules/J_Payment/EditView.tpl', 321, false),array('modifier', 'escape', 'cache/modules/J_Payment/EditView.tpl', 532, false),array('modifier', 'url2html', 'cache/modules/J_Payment/EditView.tpl', 532, false),array('modifier', 'nl2br', 'cache/modules/J_Payment/EditView.tpl', 532, false),)), $this); ?>


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
<input type="hidden" name="content" value="<?php echo $this->_tpl_vars['fields']['content']['value']; ?>
">   
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "custom/modules/J_Payment/tpl/discountTable.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "custom/modules/J_Payment/tpl/sponTable.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   
<?php echo $this->_tpl_vars['discount_list'];  echo $this->_tpl_vars['sponsor_list']; ?>
   
<input type="hidden" name="payment_list" id="payment_list" value="<?php echo $this->_tpl_vars['fields']['payment_list']['value']; ?>
">   
<input type="hidden" name="class_list" id="class_list" value="<?php echo $this->_tpl_vars['fields']['class_list']['value']; ?>
">   
<input type="hidden" name="sponsor_id" id="sponsor_id" value="">   
<input type="hidden" name="sub_discount_amount" id="sub_discount_amount" value="<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['sub_discount_amount']['value']), $this);?>
">
<input type="hidden" name="sub_discount_percent" id="sub_discount_percent" value="<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['sub_discount_percent']['value'],'precision' => 2), $this);?>
">   
<input type="hidden" name="lead_id" id="lead_id" value="<?php echo $this->_tpl_vars['fields']['lead_id']['value']; ?>
">   
<?php echo $this->_tpl_vars['lock_assigned_to']; ?>
   
<input type="hidden" name="outstanding_list" value="<?php echo $this->_tpl_vars['fields']['outstanding_list']['value']; ?>
">   
<input type="hidden" name="is_outstanding" value="<?php echo $this->_tpl_vars['fields']['is_outstanding']['value']; ?>
">   
<input type="hidden" name="ratio" id="ratio" value="<?php echo $this->_tpl_vars['ratio']; ?>
">   
<input type="hidden" name="catch_limit" id="catch_limit" value="<?php echo $this->_tpl_vars['fields']['catch_limit']['value']; ?>
">   
<input type="hidden" name="is_outing" id="is_outing" value="<?php echo $this->_tpl_vars['fields']['is_outing']['value']; ?>
">   
<input type="hidden" name="aims_id" id="aims_id" value="<?php echo $this->_tpl_vars['fields']['aims_id']['value']; ?>
">   
<input type="hidden" name="team_type" id="team_type" value="<?php echo $this->_tpl_vars['team_type']; ?>
">   
<input type="hidden" name="student_corporate_name" id="student_corporate_name" value="">   
<input type="hidden" name="student_corporate_id" id="student_corporate_id" value="">   
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
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=J_Payment'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_HEADER"> <?php else: ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=<?php echo $_REQUEST['return_module']; ?>
&record=<?php echo $_REQUEST['return_id']; ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_HEADER"> <?php endif; ?> <?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=J_Payment", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
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
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_PAYMENT_TRANSFER_FROM_AIMS','module' => 'J_Payment'), $this);?>

<script>
document.getElementById('detailpanel_1').className += ' expanded';
</script>
</h4>
<table width="100%" border="0" cellspacing="1" cellpadding="0"  id='LBL_PAYMENT_TRANSFER_FROM_AIMS'  class="yui3-skin-sam edit view panelContainer">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='_label' width='10%' scope="col">
<label for=""><?php echo $this->_tpl_vars['MOD']['LBL_TRANSFER_FROM']; ?>
 AIMS Center:</label>
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='45%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<?php echo smarty_function_html_options(array('name' => 'from_AIMS_center_id','id' => 'from_AIMS_center_id','options' => $this->_tpl_vars['from_AIMS_center_id']), $this);?>

</td>
<?php if ($this->_tpl_vars['fields']['contacts_j_payment_1_name']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['contacts_j_payment_1_name']['acl'] > 0 )): ?>
<td valign="top" id='contacts_j_payment_1_name_label' width='10%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TRANSFER_TO_STUDENT_NAME','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='35%' >
<?php if ($this->_tpl_vars['fields']['contacts_j_payment_1_name']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<input type="text" name="<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name']['name']; ?>
" class="sqsEnabled" tabindex="0" id="<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name']['value']; ?>
" title='' autocomplete="off"  	 >
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name']['id_name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name']['id_name']; ?>
" 
value="<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1contacts_ida']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name']['name']; ?>
" id="btn_<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name']['name']; ?>
" tabindex="0" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_CONTACTS_TITLE'), $this);?>
" class="button firstChild" value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_CONTACTS_LABEL'), $this);?>
"
onclick='open_popup(
"<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name']['module']; ?>
", 
600, 
400, 
"", 
true, 
false, 
<?php echo '{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"contacts_j_payment_1contacts_ida","name":"contacts_j_payment_1_name"}}'; ?>
, 
"single", 
true
);' ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-select.png"), $this);?>
"></button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name']['name']; ?>
" id="btn_clr_<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name']['name']; ?>
" tabindex="0" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_CONTACTS_TITLE'), $this);?>
"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name']['name']; ?>
', '<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name']['id_name']; ?>
');"  value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_CONTACTS_LABEL'), $this);?>
" ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name']['name']; ?>
']) != 'undefined'",
		enableQS
);
</script>
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['contacts_j_payment_1contacts_ida']['value'] )): ?>
<?php ob_start(); ?>index.php?module=Contacts&action=DetailView&record=<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1contacts_ida']['value'];  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('detail_url', ob_get_contents());ob_end_clean(); ?>
<a href="<?php echo smarty_function_sugar_ajax_url(array('url' => $this->_tpl_vars['detail_url']), $this);?>
"><?php endif; ?>
<span id="contacts_j_payment_1contacts_ida" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1contacts_ida']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name']['value']; ?>
</span>
<?php if (! empty ( $this->_tpl_vars['fields']['contacts_j_payment_1contacts_ida']['value'] )): ?></a><?php endif; ?>
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
<?php if ($this->_tpl_vars['fields']['payment_date']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['payment_date']['acl'] > 0 )): ?>
<td valign="top" id='payment_date_label' width='10%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TRANSFER_IN_DATE','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='45%' >
<?php if ($this->_tpl_vars['fields']['payment_date']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="dateTime">
<?php $this->assign('date_value', $this->_tpl_vars['fields']['payment_date']['value']); ?>
<input class="date_input" autocomplete="off" type="text" name="<?php echo $this->_tpl_vars['fields']['payment_date']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['payment_date']['name']; ?>
" value="<?php echo $this->_tpl_vars['date_value']; ?>
" title='Payment Date'  tabindex='0'    size="11" maxlength="10" >
<?php ob_start(); ?>alt="<?php echo $this->_tpl_vars['APP']['LBL_ENTER_DATE']; ?>
" style="position:relative; top:6px" border="0" id="<?php echo $this->_tpl_vars['fields']['payment_date']['name']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean(); ?>
<?php echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'other_attributes' => ($this->_tpl_vars['other_attributes'])), $this);?>

</span>
<script type="text/javascript">
Calendar.setup ({
inputField : "<?php echo $this->_tpl_vars['fields']['payment_date']['name']; ?>
",
ifFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
button : "<?php echo $this->_tpl_vars['fields']['payment_date']['name']; ?>
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



<?php if (strlen ( $this->_tpl_vars['fields']['payment_date']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['payment_date']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['payment_date']['value']); ?>
<?php endif; ?>
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['payment_date']['name']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</span>
<?php endif; ?>
<?php else: ?>
<td></td><td></td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['use_type']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['use_type']['acl'] > 0 )): ?>
<td valign="top" id='use_type_label' width='10%' scope="col">
<label for="use_type"><?php echo $this->_tpl_vars['MOD']['LBL_TRANSFER_TYPE']; ?>
:</label>
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='35%' >
<?php if ($this->_tpl_vars['fields']['use_type']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! isset ( $this->_tpl_vars['config']['enable_autocomplete'] ) || $this->_tpl_vars['config']['enable_autocomplete'] == false): ?>
<select name="<?php echo $this->_tpl_vars['fields']['use_type']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['use_type']['name']; ?>
" 
title=''       
>
<?php if (isset ( $this->_tpl_vars['fields']['use_type']['value'] ) && $this->_tpl_vars['fields']['use_type']['value'] != ''): ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['use_type']['options'],'selected' => $this->_tpl_vars['fields']['use_type']['value']), $this);?>

<?php else: ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['use_type']['options'],'selected' => $this->_tpl_vars['fields']['use_type']['default']), $this);?>

<?php endif; ?>
</select>
<?php else: ?>
<?php $this->assign('field_options', $this->_tpl_vars['fields']['use_type']['options']); ?>
<?php ob_start();  echo $this->_tpl_vars['fields']['use_type']['value'];  $this->_smarty_vars['capture']['field_val'] = ob_get_contents(); ob_end_clean(); ?>
<?php $this->assign('field_val', $this->_smarty_vars['capture']['field_val']); ?>
<?php ob_start();  echo $this->_tpl_vars['fields']['use_type']['name'];  $this->_smarty_vars['capture']['ac_key'] = ob_get_contents(); ob_end_clean(); ?>
<?php $this->assign('ac_key', $this->_smarty_vars['capture']['ac_key']); ?>
<select style='display:none' name="<?php echo $this->_tpl_vars['fields']['use_type']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['use_type']['name']; ?>
" 
title=''          
>
<?php if (isset ( $this->_tpl_vars['fields']['use_type']['value'] ) && $this->_tpl_vars['fields']['use_type']['value'] != ''): ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['use_type']['options'],'selected' => $this->_tpl_vars['fields']['use_type']['value']), $this);?>

<?php else: ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['use_type']['options'],'selected' => $this->_tpl_vars['fields']['use_type']['default']), $this);?>

<?php endif; ?>
</select>
<input
id="<?php echo $this->_tpl_vars['fields']['use_type']['name']; ?>
-input"
name="<?php echo $this->_tpl_vars['fields']['use_type']['name']; ?>
-input"
size="30"
value="<?php echo ((is_array($_tmp=$this->_tpl_vars['field_val'])) ? $this->_run_mod_handler('lookup', true, $_tmp, $this->_tpl_vars['field_options']) : smarty_modifier_lookup($_tmp, $this->_tpl_vars['field_options'])); ?>
"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-down.png"), $this);?>
" id="<?php echo $this->_tpl_vars['fields']['use_type']['name']; ?>
-image"></button><button type="button"
id="btn-clear-<?php echo $this->_tpl_vars['fields']['use_type']['name']; ?>
-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['use_type']['name']; ?>
-input', '<?php echo $this->_tpl_vars['fields']['use_type']['name']; ?>
');sync_<?php echo $this->_tpl_vars['fields']['use_type']['name']; ?>
()"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<?php echo '
<script>
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo ' = [];
'; ?>

<?php echo '
(function (){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['use_type']['name'];  echo '");
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
.inputNode = Y.one('#<?php echo $this->_tpl_vars['fields']['use_type']['name']; ?>
-input');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputImage = Y.one('#<?php echo $this->_tpl_vars['fields']['use_type']['name']; ?>
-image');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputHidden = Y.one('#<?php echo $this->_tpl_vars['fields']['use_type']['name']; ?>
');
<?php echo '
function SyncToHidden(selectme){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['use_type']['name'];  echo '");
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
sync_';  echo $this->_tpl_vars['fields']['use_type']['name'];  echo ' = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['use_type']['name'];  echo '");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.simulate(\'keyup\');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById(\'';  echo $this->_tpl_vars['fields']['use_type']['name']; ?>
-input<?php echo '\'))
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.set(\'value\',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("';  echo $this->_tpl_vars['fields']['use_type']['name'];  echo '", syncFromHiddenToWidget);
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
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['use_type']['name'];  echo '");
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



<?php if (is_string ( $this->_tpl_vars['fields']['use_type']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['use_type']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['use_type']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['use_type']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['use_type']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['use_type']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['use_type']['options'][$this->_tpl_vars['fields']['use_type']['value']]; ?>

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
<td valign="top" id='_label' width='10%' scope="col">
&nbsp;
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='45%' >
</td>
<?php if ($this->_tpl_vars['fields']['payment_amount']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['payment_amount']['acl'] > 0 )): ?>
<td valign="top" id='payment_amount_label' width='10%' scope="col">
<label for="payment_amount"><?php echo $this->_tpl_vars['MOD']['LBL_TRANSFER_AMOUNT']; ?>
: <span class="required">*</span></label>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='35%' >
<?php if ($this->_tpl_vars['fields']['payment_amount']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<input accesskey=""  tabindex="0"  class="currency" type="text" name="payment_amount" id="payment_amount" size="20" maxlength="26" value="<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['payment_amount']['value']), $this);?>
" title="<?php echo $this->_tpl_vars['MOD']['LBL_TRANSFER_AMOUNT']; ?>
" tabindex="0"  style="font-weight: bold; color: rgb(165, 42, 42);"><?php echo $this->_tpl_vars['payment_type']; ?>

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
<td valign="top" id='_label' width='10%' scope="col">
&nbsp;
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='45%' >
</td>
<?php if ($this->_tpl_vars['fields']['total_hours']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['total_hours']['acl'] > 0 )): ?>
<td valign="top" id='total_hours_label' width='10%' scope="col">
<label for="total_hours"><?php echo $this->_tpl_vars['MOD']['LBL_TRANSFER_HOURS']; ?>
: <span class="required">*</span></label>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='35%' >
<?php if ($this->_tpl_vars['fields']['total_hours']['acl'] > 1): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<input accesskey=""  tabindex="0"  type="text" name="total_hours" id="total_hours" size="5" maxlength="5" value="<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['total_hours']['value'],'precision' => 2), $this);?>
" title="<?php echo $this->_tpl_vars['MOD']['LBL_TRANSFER_HOURS']; ?>
" tabindex="0"  style="text-align: right; color: rgb(165, 42, 42);">
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
<?php if ($this->_tpl_vars['fields']['description']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['description']['acl'] > 0 )): ?>
<td valign="top" id='description_label' width='10%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='45%' colspan='3'>
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
rows="2" 
cols="60" 
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
<?php if ($this->_tpl_vars['fields']['assigned_user_name']['acl'] > 1 || ( $this->_tpl_vars['showDetailData'] && $this->_tpl_vars['fields']['assigned_user_name']['acl'] > 0 )): ?>
<td valign="top" id='assigned_user_name_label' width='10%' scope="col">
<label for="assigned_user_name">
<?php if ($this->_tpl_vars['team_type'] == 'Junior'): ?>
<?php echo $this->_tpl_vars['MOD']['LBL_ASSIGNED_USER']; ?>

<?php else: ?>
<?php echo $this->_tpl_vars['MOD']['LBL_FIRST_SM']; ?>

<?php endif; ?>: <span class="required">*</span></label>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>


<td valign="top" width='45%' colspan='3'>
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
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() { initPanel(1, 'expanded'); }); </script>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_PAYMENT_TRANSFER_FROM_AIMS").style.display='none';</script>
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
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=J_Payment'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_FOOTER"> <?php else: ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=<?php echo $_REQUEST['return_module']; ?>
&record=<?php echo $_REQUEST['return_id']; ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL_FOOTER"> <?php endif; ?> <?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=J_Payment", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?><div class="clear"></div></div>
</div>
</form>
<?php echo $this->_tpl_vars['set_focus_block']; ?>

<!-- Begin Meta-Data Javascript -->
<?php if ($this->_tpl_vars['fields']['payment_type']['value'] == 'Moving Out' || $this->_tpl_vars['fields']['payment_type']['value'] == 'Transfer Out' || $this->_tpl_vars['fields']['payment_type']['value'] == 'Refund'): ?>
<?php echo smarty_function_sugar_getscript(array('file' => "custom/modules/J_Payment/js/edit_moving_transfer_refunds.js"), $this);?>

<?php elseif ($this->_tpl_vars['fields']['payment_type']['value'] == 'Transfer From AIMS'): ?>
<?php echo smarty_function_sugar_getscript(array('file' => "custom/modules/J_Payment/js/editview_tf_from_aims.js"), $this);?>

<?php else: ?>
<?php if ($this->_tpl_vars['team_type'] == 'Adult'): ?>
<?php echo smarty_function_sugar_getscript(array('file' => "custom/modules/J_Payment/js/edit_enrollment_adults.js"), $this);?>

<?php else: ?>
<?php echo smarty_function_sugar_getscript(array('file' => "custom/modules/J_Payment/js/edit_enrollmentssss.js"), $this);?>

<?php endif; ?>
<?php echo smarty_function_sugar_getscript(array('file' => "custom/modules/J_Payment/js/extention_layout.js"), $this);?>

<?php endif; ?>
<?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/Bootstrap/bootstrap.min.js"), $this);?>

<?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/BootstrapSelect/bootstrap-select.min.js"), $this);?>

<?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/AjaxBootstrapSelect/js/ajax-bootstrap-select.js"), $this);?>

<?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/BootstrapMultiselect/js/bootstrap-multiselect.js"), $this);?>

<link rel="stylesheet" href="<?php echo smarty_function_sugar_getjspath(array('file' => "custom/include/javascripts/Bootstrap/bootstrap.min.css"), $this);?>
"/>
<link rel="stylesheet" href="<?php echo smarty_function_sugar_getjspath(array('file' => "custom/include/javascripts/BootstrapSelect/bootstrap-select.min.css"), $this);?>
"/>
<link rel="stylesheet" href="<?php echo smarty_function_sugar_getjspath(array('file' => "custom/include/javascripts/AjaxBootstrapSelect/css/ajax-bootstrap-select.css"), $this);?>
"/>
<link rel="stylesheet" href="<?php echo smarty_function_sugar_getjspath(array('file' => "custom/include/javascripts/BootstrapMultiselect/css/bootstrap-multiselect.css"), $this);?>
"/>
<link rel="stylesheet" href="<?php echo smarty_function_sugar_getjspath(array('file' => "custom/modules/J_Payment/css/custom_style.css"), $this);?>
"/>
<?php echo $this->_tpl_vars['limit_discount_percent']; ?>

<!-- End Meta-Data Javascript -->
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
addForm(\'EditView\');addToValidate(\'EditView\', \'name\', \'name\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'date_entered_date\', \'date\', false,\'Date Created\' );
addToValidate(\'EditView\', \'date_modified_date\', \'date\', false,\'Date Modified\' );
addToValidate(\'EditView\', \'modified_user_id\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'modified_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED_NAME','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'created_by\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'created_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'description\', \'text\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'deleted\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DELETED','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'team_id\', \'team_list\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TEAM_ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'team_set_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TEAM_SET_ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'team_count\', \'relate\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TEAMS','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'team_name\', \'teamset\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TEAMS','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'assigned_user_id\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'assigned_user_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_NAME','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'payment_type\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PAYMENT_TYPE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'payment_date\', \'date\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PAYMENT_DATE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'number_of_skill\', \'int\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_NUMBER_OF_SKILL','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'number_of_connect\', \'int\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_NUMBER_OF_CONNECT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'number_of_practice\', \'int\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_NUMBER_OF_PRACTICE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'card_type\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CARD_TYPE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'number_of_payment\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_NUMBER_OF_PAYMENT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'moving_tran_out_date\', \'date\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MOVING_TRANSFER_OUT_DATE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'moving_tran_in_date\', \'date\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MOVING_TRANSFER_IN_DATE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'number_class\', \'int\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_NUMBER_CLASS','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'sale_type\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SALE_TYPE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'start_study\', \'date\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_START_STUDY','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'end_study\', \'date\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_END_STUDY','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'class_start\', \'date\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CLASS_START','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'class_end\', \'date\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CLASS_END','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'sessions\', \'int\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SESSIONS','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'tuition_fee\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TUITION_FEE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'currency_id\', \'currency_id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CURRENCY','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'delay_amount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DELAY_AMOUNT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'paid_amount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PAID_AMOUNT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'amount_bef_discount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_AMOUNT_BEF_DISCOUNT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'discount_amount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DISCOUNT_AMOUNT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'remaining_freebalace\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_REMAINING_FREEBALANCE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'discount_percent\', \'decimal\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DISCOUNT_PERCENT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'ratio\', \'decimal\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_RATIO','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'sub_discount_amount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SUB_DISCOUNT_AMOUNT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'sub_discount_percent\', \'decimal\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SUB_DISCOUNT_PERCENT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'total_after_discount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TOTAL_AFTER_DISCOUNT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'deposit_amount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DEPOSIT_AMOUNT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'payment_amount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_GRAND_TOTAL','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'total_amount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TOTAL_AMOUNT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'total_hours_adult\', \'decimal\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TUITION_HOURS_ADULT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'holiday_list\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_HOLIDAYS_LIST','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'tuition_hours\', \'decimal\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TUITION_HOURS','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'paid_hours\', \'decimal\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PAID_HOURS','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'total_hours\', \'decimal\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TOTAL_HOURS','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'payment_expired\', \'date\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PAYMENT_EXPIRED','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'loyalty\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LOYALTY','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'class_string\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CLASS_STRING','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'level_string\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LEVEL_STRING','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'kind_of_course_string\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_KIND_OF_COURSE_STRING','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'sponsor_number\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SPONSOR_NUMBER','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'foc_type\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FOC_TYPE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'sponsor_amount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SPONSOR_AMOUNT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'sponsor_percent\', \'decimal\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SPONSOR_PERCENT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'final_sponsor\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FINAL_SPONSOR','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'final_sponsor_percent\', \'decimal\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FINAL_SPONSOR_PERCENT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'payment_method\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PAYMENT_METHOD','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'outstanding_amount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_OUTSTANDING_AMOUNT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'outstanding_hours\', \'decimal\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_OUTSTANDING_HOURS','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'company_name\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_COMPANY_NAME','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'tax_code\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TAX_CODE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'company_address\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_COMPANY_ADDRESS','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'delay_hours\', \'decimal\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DELAY_HOURS','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'used_hours\', \'decimal\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_USED_HOURS','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'remain_hours\', \'decimal\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_REMAIN_HOURS','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'used_amount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_USED_AMOUNT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'remain_amount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_REMAIN_AMOUNT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'payment_list\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CONTENT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'note\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_NOTE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'outstanding_list\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CONTENT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'content\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CONTENT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'do_not_drop_revenue\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DO_NOT_DROP_REVENUE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'printed_date\', \'date\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PRINTED_DATE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'split_payment\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SPLIT_PAYMENT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'charge_book\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CHARGE_BOOK','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'is_corporate\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_IS_CORPORATE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'is_outstanding\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_IS_OUTSTANDING','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'is_outing\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_IS_OUTING','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'status_payment_detail\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_STATUS_PAYMENT_DETAIL','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'related_payment_detail\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_RELATED_PAYMENT_DETAIL','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'status\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_STATUS','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'sponsor_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SPONSOR_ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'charge\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CHARGE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'move_to_center_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => '','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'move_to_center_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MOVE_TO_CENTER_NAME','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'move_from_center_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => '','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'move_from_center_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MOVE_FROM_CENTER_NAME','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'transfer_to_student_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => '','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'transfer_to_student_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TRANSFER_TO_STUDENT_NAME','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'filename\', \'varchar\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FILENAME','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'file_ext\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FILE_EXTENSION','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'file_mime_type\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MIME','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'uploadfile\', \'file\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FILE_UPLOAD','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'payment_out_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PAYMENT_OUT_NAME','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'payment_out_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PAYMENT_OUT_ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'enrollment_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'Enrollment ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'delay_situation_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DELAY_SITUATION_ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'delay_situation_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DELAY_SITUATION_NAME','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'lead_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LEAD_ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'lead_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LEAD_NAME','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'account_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ACCOUNT_ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'account_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ACCOUNT_NAME','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'payment_use_payment\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PAYMENT_USE_PAYMENT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'display_used_amount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_USE_AMOUNT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'display_used_hours\', \'decimal\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_USE_HOURS','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'use_payment_id\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ATTENDANCE_ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'use_type\', \'enum\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_USE_TYPE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'refund_revenue\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DROP_REVENUE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'sale_type_date\', \'date\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SALE_TYPE_DATE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'catch_limit\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CATCH_LIMIT','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'kind_of_course\', \'enum\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_KIND_OF_COURSE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'kind_of_course_360\', \'enum\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_KIND_OF_COURSE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'aims_id\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_AIMS_ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'class_aims_id\', \'varchar\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CLASS_AIMS_ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'student_aims_id\', \'varchar\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_STUDENT_AIMS_ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'transfer_in_aims_id\', \'varchar\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TRANSFER_IN_AIMS_ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'from_payment_aims_id\', \'varchar\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FROM_PAYMENT_AIMS_ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'serial_no\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SERIAL_NO','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'invoice_number\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_INVOICE_NUMBER','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'invoice_date\', \'date\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_INVOICE_DATE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'contract_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CONTRACT_ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'contract_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CONTRACT_NAME','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'j_partnership_j_payment_1_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_J_PARTNERSHIP_J_PAYMENT_1_FROM_J_PARTNERSHIP_TITLE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'j_partnership_j_payment_1j_partnership_ida\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_J_PARTNERSHIP_J_PAYMENT_1_FROM_J_PAYMENT_TITLE_ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'j_payment_j_inventory_1_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_J_PAYMENT_J_INVENTORY_1_FROM_J_INVENTORY_TITLE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'j_payment_j_inventory_1j_inventory_idb\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_J_PAYMENT_J_INVENTORY_1_FROM_J_INVENTORY_TITLE_ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'j_payment_j_payment_1_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_J_PAYMENT_J_PAYMENT_1_FROM_J_PAYMENT_L_TITLE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'j_payment_j_payment_1j_payment_ida\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_J_PAYMENT_J_PAYMENT_1_FROM_J_PAYMENT_R_TITLE_ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'j_coursefee_j_payment_1_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_J_COURSEFEE_J_PAYMENT_1_FROM_J_COURSEFEE_TITLE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'j_coursefee_j_payment_1j_coursefee_ida\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_J_COURSEFEE_J_PAYMENT_1_FROM_J_PAYMENT_TITLE_ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'contacts_j_payment_1_name\', \'relate\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CONTACTS_J_PAYMENT_1_FROM_CONTACTS_TITLE','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'contacts_j_payment_1contacts_ida\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CONTACTS_J_PAYMENT_1_FROM_J_PAYMENT_TITLE_ID','module' => 'J_Payment','for_js' => true), $this); echo '\' );
addToValidateBinaryDependency(\'EditView\', \'assigned_user_name\', \'alpha\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'J_Payment','for_js' => true), $this); echo ': ';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'J_Payment','for_js' => true), $this); echo '\', \'assigned_user_id\' );
addToValidateBinaryDependency(\'EditView\', \'contacts_j_payment_1_name\', \'alpha\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'J_Payment','for_js' => true), $this); echo ': ';  echo smarty_function_sugar_translate(array('label' => 'LBL_CONTACTS_J_PAYMENT_1_FROM_CONTACTS_TITLE','module' => 'J_Payment','for_js' => true), $this); echo '\', \'contacts_j_payment_1contacts_ida\' );
</script><script language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'EditView_contacts_j_payment_1_name\']={"form":"EditView","method":"get_contact_array","modules":["Contacts"],"field_list":["salutation","last_name","first_name","id"],"populate_list":["contacts_j_payment_1_name","contacts_j_payment_1contacts_ida","contacts_j_payment_1contacts_ida","contacts_j_payment_1contacts_ida"],"required_list":["contacts_j_payment_1contacts_ida"],"group":"or","conditions":[{"name":"last_name","op":"like_custom","end":"%","value":""},{"name":"first_name","op":"like_custom","end":"%","value":""}],"order":"last_name","limit":"30","no_match_text":"No Match"};sqs_objects[\'EditView_assigned_user_name\']={"form":"EditView","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name","assigned_user_id"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};</script><script type=text/javascript>
SUGAR.util.doWhen(\'!SUGAR.util.ajaxCallInProgress() && ((typeof action_sugar_grp1 != "undefined" && action_sugar_grp1 == "Popup") || (typeof DCMenu != "undefined" && DCMenu.module))\', function(){
SUGAR.forms.AssignmentHandler.registerView(\'EditView\');
SUGAR.forms.AssignmentHandler.LINKS[\'EditView\'] = {"created_by_link":{"relationship":"j_payment_created_by","module":"Users","id_name":"created_by"},"modified_user_link":{"relationship":"j_payment_modified_user","module":"Users","id_name":"modified_user_id"},"assigned_user_link":{"relationship":"j_payment_assigned_user","module":"Users","id_name":"assigned_user_id"},"c_carryforward":{"relationship":"j_payment_carryforward","module":"C_Carryforward"},"ju_studentsituations":{"relationship":"j_payment_studentsituations","module":"J_StudentSituations"},"ju_sponsor":{"relationship":"j_payment_j_sponsor","module":"J_Sponsor"},"ju_payment_in":{"relationship":"j_payment_moving_transfer","module":"J_Payment"},"ju_payment_out":{"relationship":"j_payment_moving_transfer","module":"J_Payment","id_name":"payment_out_id"},"situation_delay_link":{"relationship":"situation_delay_payment_delay","id_name":"delay_situation_id","module":"J_StudentSituations"},"paymentdetail_link":{"relationship":"payment_paymentdetails","module":"J_PaymentDetail"},"lead_link":{"relationship":"lead_payments","id_name":"lead_name","module":"Leads"},"account_link":{"relationship":"account_payments","id_name":"account_id","module":"Accounts"},"revenue_link":{"relationship":"ju_payment_revenue","module":"C_DeliveryRevenue"},"contract_link":{"relationship":"contract_j_payment","id_name":"contract_id","module":"Contracts"},"j_payment_j_discount_1":{"relationship":"j_payment_j_discount_1","module":"J_Discount"},"j_partnership_j_payment_1":{"relationship":"j_partnership_j_payment_1","module":"J_Partnership","id_name":"j_partnership_j_payment_1j_partnership_ida"},"j_payment_j_inventory_1":{"relationship":"j_payment_j_inventory_1","module":"J_Inventory","id_name":"j_payment_j_inventory_1j_inventory_idb"},"j_payment_j_payment_1":{"relationship":"j_payment_j_payment_1","module":"J_Payment"},"j_payment_j_payment_1_right":{"relationship":"j_payment_j_payment_1","module":"J_Payment","id_name":"j_payment_j_payment_1j_payment_ida"},"j_coursefee_j_payment_1":{"relationship":"j_coursefee_j_payment_1","module":"J_Coursefee","id_name":"j_coursefee_j_payment_1j_coursefee_ida"},"contacts_j_payment_1":{"relationship":"contacts_j_payment_1","module":"Contacts","id_name":"contacts_j_payment_1contacts_ida"}}

YAHOO.util.Event.onContentReady(\'EditView\', SUGAR.forms.AssignmentHandler.loadComplete);});</script>'; ?>
