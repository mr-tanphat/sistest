<?php /* Smarty version 2.6.11, created on 2017-02-07 13:39:02
         compiled from cache/modules/J_Payment/DetailView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_button', 'cache/modules/J_Payment/DetailView.tpl', 42, false),array('function', 'sugar_include', 'cache/modules/J_Payment/DetailView.tpl', 49, false),array('function', 'counter', 'cache/modules/J_Payment/DetailView.tpl', 54, false),array('function', 'sugar_getimagepath', 'cache/modules/J_Payment/DetailView.tpl', 57, false),array('function', 'sugar_translate', 'cache/modules/J_Payment/DetailView.tpl', 60, false),array('function', 'sugar_ajax_url', 'cache/modules/J_Payment/DetailView.tpl', 152, false),array('function', 'sugar_number_format', 'cache/modules/J_Payment/DetailView.tpl', 368, false),array('function', 'sugarvar_teamset', 'cache/modules/J_Payment/DetailView.tpl', 926, false),array('modifier', 'strip_semicolon', 'cache/modules/J_Payment/DetailView.tpl', 75, false),array('modifier', 'escape', 'cache/modules/J_Payment/DetailView.tpl', 820, false),array('modifier', 'url2html', 'cache/modules/J_Payment/DetailView.tpl', 820, false),array('modifier', 'nl2br', 'cache/modules/J_Payment/DetailView.tpl', 820, false),)), $this); ?>


<script type="text/javascript" src="include/EditView/Panels.js"></script>
<script language="javascript">
<?php echo '
SUGAR.util.doWhen(function(){
    return $("#contentTable").length == 0 && YAHOO.util.Event.DOMReady;
}, SUGAR.themes.actionMenu);
'; ?>

</script>
<table cellpadding="0" cellspacing="0" border="0" width="100%" id="">
<tr>
<td class="buttons" align="left" NOWRAP width="80%">
<div class="actionsContainer">
<form action="index.php" method="post" name="DetailView" id="formDetailView">
<input type="hidden" name="module" value="<?php echo $this->_tpl_vars['module']; ?>
">
<input type="hidden" name="record" value="<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
">
<input type="hidden" name="return_action">
<input type="hidden" name="return_module">
<input type="hidden" name="return_id">
<input type="hidden" name="module_tab">
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="offset" value="<?php echo $this->_tpl_vars['offset']; ?>
">
<input type="hidden" name="action" value="EditView">
<input type="hidden" name="sugar_body_only">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "custom/modules/J_Payment/tpl/paymentTemplate.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($this->_tpl_vars['team_type'] == 'Junior'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "custom/modules/J_Payment/tpl/delayPayment.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "custom/modules/J_Payment/tpl/delayPaymentAdult.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<input type="hidden" id="team_type" type="team_type" value="<?php echo $this->_tpl_vars['team_type']; ?>
"/>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "custom/modules/J_Payment/tpl/convert_payment.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<input type="hidden" name="is_corporate" id="is_corporate" value="<?php echo $this->_tpl_vars['fields']['is_corporate']['value']; ?>
">
<input type="hidden" name="payment_type" id="payment_type" value="<?php echo $this->_tpl_vars['fields']['payment_type']['value']; ?>
">
<input type="hidden" name="team_id" id="team_id" value="<?php echo $this->_tpl_vars['fields']['team_id']['value']; ?>
">
<input type="hidden" name="status" id="status" value="<?php echo $this->_tpl_vars['fields']['status']['value']; ?>
">
<input type="hidden" name="is_paid" id="is_paid" value="<?php echo $this->_tpl_vars['is_paid']; ?>
">
<input type="hidden" name="end_study" id="end_study" value="<?php echo $this->_tpl_vars['fields']['end_study']['value']; ?>
">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "custom/modules/J_Payment/tpl/addToClassAdult.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</form>
<div class="action_buttons"><?php if ($this->_tpl_vars['bean']->aclAccess('edit')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_KEY']; ?>
" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='J_Payment'; _form.return_action.value='DetailView'; _form.return_id.value='<?php echo $this->_tpl_vars['id']; ?>
'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
"><?php endif; ?>  <?php if ($this->_tpl_vars['bean']->aclAccess('delete')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_KEY']; ?>
" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='J_Payment'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('<?php echo $this->_tpl_vars['APP']['NTC_DELETE_CONFIRMATION']; ?>
')) SUGAR.ajaxUI.submitForm(_form);" type="submit" name="Delete" value="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_LABEL']; ?>
" id="delete_button"><?php endif; ?>  <?php echo $this->_tpl_vars['EXPORT_FROM_BUTTON'];  echo $this->_tpl_vars['CUSTOM_BUTTON']; ?>
 <?php echo $this->_tpl_vars['BTN_UNDO']; ?>
 <?php echo smarty_function_sugar_button(array('module' => ($this->_tpl_vars['module']),'id' => 'REALPDFVIEW','view' => ($this->_tpl_vars['view']),'form_id' => 'formDetailView','record' => $this->_tpl_vars['fields']['id']['value']), $this);?>
 <?php echo smarty_function_sugar_button(array('module' => ($this->_tpl_vars['module']),'id' => 'REALPDFEMAIL','view' => ($this->_tpl_vars['view']),'form_id' => 'formDetailView','record' => $this->_tpl_vars['fields']['id']['value']), $this);?>
 <?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=J_Payment", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?><div class="clear"></div></div>
</div>
</td>
<td align="right" width="20%"><?php echo $this->_tpl_vars['ADMIN_EDIT']; ?>

<?php echo $this->_tpl_vars['PAGINATION']; ?>

</td>
</tr>
</table><?php echo smarty_function_sugar_include(array('include' => $this->_tpl_vars['includes']), $this);?>

<div id="J_Payment_detailview_tabs"
>
<div >
<div id='detailpanel_1' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(1);">
<img border="0" id="detailpanel_1_img_hide" src="<?php echo smarty_function_sugar_getimagepath(array('file' => "basic_search.gif"), $this);?>
"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(1);">
<img border="0" id="detailpanel_1_img_show" src="<?php echo smarty_function_sugar_getimagepath(array('file' => "advanced_search.gif"), $this);?>
"></a>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ENROLLMENT','module' => 'J_Payment'), $this);?>

<script>
document.getElementById('detailpanel_1').className += ' expanded';
</script>
</h4>
<table id='LBL_ENROLLMENT' class="panelContainer" cellspacing='<?php echo $this->_tpl_vars['gridline']; ?>
'>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['name']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['name']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['name']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="name" class="sugar_field"><?php echo $this->_tpl_vars['payment_id']; ?>
</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['status']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['status']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_STATUS','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['status']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="status" class="sugar_field"><b><?php echo $this->_tpl_vars['fields']['status']['value']; ?>
</b></span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['sale_type']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['sale_type']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_SALE_TYPE','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['sale_type']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="sale_type" class="sugar_field"><?php echo $this->_tpl_vars['sale_typeQ']; ?>
</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['contacts_j_payment_1_name']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['contacts_j_payment_1_name']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_CONTACTS_J_PAYMENT_1_FROM_CONTACTS_TITLE','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['contacts_j_payment_1_name']['hidden']): ?>
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
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['payment_type']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['payment_type']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_PAYMENT_TYPE','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['payment_type']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['payment_type']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['payment_type']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['payment_type']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['payment_type']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['payment_type']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['payment_type']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['payment_type']['options'][$this->_tpl_vars['fields']['payment_type']['value']]; ?>

<?php endif; ?>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['sale_type_date']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['sale_type_date']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_SALE_TYPE_DATE','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['sale_type_date']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="sale_type_date" class="sugar_field"><?php echo $this->_tpl_vars['sale_type_dateQ']; ?>
</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_CLASSES_NAME','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<td width='22.22%'  >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="" class="sugar_field"><?php echo $this->_tpl_vars['html_class']; ?>
</span>
</td>
<?php if ($this->_tpl_vars['fields']['kind_of_course_string']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['kind_of_course_string']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_KIND_OF_COURSE','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['kind_of_course_string']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['kind_of_course_string']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['kind_of_course_string']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['kind_of_course_string']['value']); ?>
<?php endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['kind_of_course_string']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['kind_of_course_string']['value']; ?>
</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['payment_date']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['payment_date']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_PAYMENT_DATE','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['payment_date']['hidden']): ?>
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
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['start_study']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['start_study']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_START_STUDY','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['start_study']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (strlen ( $this->_tpl_vars['fields']['start_study']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['start_study']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['start_study']['value']); ?>
<?php endif; ?>
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['start_study']['name']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

</td>
<td width='22.22%' colspan='2' >
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

</td>
<td width='22.22%' colspan='2' >
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['end_study']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['end_study']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_END_STUDY','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['end_study']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (strlen ( $this->_tpl_vars['fields']['end_study']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['end_study']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['end_study']['value']); ?>
<?php endif; ?>
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['end_study']['name']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['sessions']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['sessions']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_SESSIONS','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['sessions']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['sessions']['name']; ?>
">
<?php echo smarty_function_sugar_number_format(array('precision' => 0,'var' => $this->_tpl_vars['fields']['sessions']['value']), $this);?>

</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

</td>
<td width='22.22%' colspan='2' >
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['tuition_fee']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['tuition_fee']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TUITION_FEE','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['tuition_fee']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id='<?php echo $this->_tpl_vars['fields']['tuition_fee']['name']; ?>
'>
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['tuition_fee']['value']), $this);?>

</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['tuition_hours']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['tuition_hours']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TUITION_HOURS','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['tuition_hours']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['tuition_hours']['name']; ?>
">
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['tuition_hours']['value'],'precision' => 2), $this);?>

</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['j_coursefee_j_payment_1_name']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['j_coursefee_j_payment_1_name']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_J_COURSEFEE_J_PAYMENT_1_FROM_J_COURSEFEE_TITLE','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['j_coursefee_j_payment_1_name']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['j_coursefee_j_payment_1j_coursefee_ida']['value'] )): ?>
<?php ob_start(); ?>index.php?module=J_Coursefee&action=DetailView&record=<?php echo $this->_tpl_vars['fields']['j_coursefee_j_payment_1j_coursefee_ida']['value'];  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('detail_url', ob_get_contents());ob_end_clean(); ?>
<a href="<?php echo smarty_function_sugar_ajax_url(array('url' => $this->_tpl_vars['detail_url']), $this);?>
"><?php endif; ?>
<span id="j_coursefee_j_payment_1j_coursefee_ida" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['j_coursefee_j_payment_1j_coursefee_ida']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['j_coursefee_j_payment_1_name']['value']; ?>
</span>
<?php if (! empty ( $this->_tpl_vars['fields']['j_coursefee_j_payment_1j_coursefee_ida']['value'] )): ?></a><?php endif; ?>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['amount_bef_discount']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['amount_bef_discount']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_AMOUNT_BEF_DISCOUNT','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['amount_bef_discount']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id='<?php echo $this->_tpl_vars['fields']['amount_bef_discount']['name']; ?>
'>
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['amount_bef_discount']['value']), $this);?>

</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['total_hours']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['total_hours']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TOTAL_HOURS','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['total_hours']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['total_hours']['name']; ?>
">
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['total_hours']['value'],'precision' => 2), $this);?>

</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

</td>
<td width='22.22%' colspan='2' >
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['discount_amount']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['discount_amount']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DISCOUNT_AMOUNT','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['discount_amount']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id='<?php echo $this->_tpl_vars['fields']['discount_amount']['name']; ?>
'>
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['discount_amount']['value']), $this);?>

</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['discount_percent']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['discount_percent']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DISCOUNT_PERCENT','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['discount_percent']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['discount_percent']['name']; ?>
">
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['discount_percent']['value'],'precision' => 2), $this);?>

</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['payment_expired']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['payment_expired']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_PAYMENT_EXPIRED','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['payment_expired']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (strlen ( $this->_tpl_vars['fields']['payment_expired']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['payment_expired']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['payment_expired']['value']); ?>
<?php endif; ?>
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['payment_expired']['name']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['final_sponsor']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['final_sponsor']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_FINAL_SPONSOR','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['final_sponsor']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id='<?php echo $this->_tpl_vars['fields']['final_sponsor']['name']; ?>
'>
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['final_sponsor']['value']), $this);?>

</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['final_sponsor_percent']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['final_sponsor_percent']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_FINAL_SPONSOR_PERCENT','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['final_sponsor_percent']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['final_sponsor_percent']['name']; ?>
">
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['final_sponsor_percent']['value'],'precision' => 2), $this);?>

</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['loyalty']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['loyalty']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_LOYALTY','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['loyalty']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['loyalty']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['loyalty']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['loyalty']['value']); ?>
<?php endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['loyalty']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['loyalty']['value']; ?>
</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['total_after_discount']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['total_after_discount']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TOTAL_AFTER_DISCOUNT','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['total_after_discount']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id='<?php echo $this->_tpl_vars['fields']['total_after_discount']['name']; ?>
'>
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['total_after_discount']['value']), $this);?>

</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

</td>
<td width='22.22%' colspan='2' >
</td>
<?php if ($this->_tpl_vars['fields']['account_name']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['account_name']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ACCOUNT_NAME','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['account_name']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['account_id']['value'] )): ?>
<?php ob_start(); ?>index.php?module=Accounts&action=DetailView&record=<?php echo $this->_tpl_vars['fields']['account_id']['value'];  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('detail_url', ob_get_contents());ob_end_clean(); ?>
<a href="<?php echo smarty_function_sugar_ajax_url(array('url' => $this->_tpl_vars['detail_url']), $this);?>
"><?php endif; ?>
<span id="account_id" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['account_id']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['account_name']['value']; ?>
</span>
<?php if (! empty ( $this->_tpl_vars['fields']['account_id']['value'] )): ?></a><?php endif; ?>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['payment_amount']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['payment_amount']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_GRAND_TOTAL','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['payment_amount']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id='<?php echo $this->_tpl_vars['fields']['payment_amount']['name']; ?>
'>
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['payment_amount']['value']), $this);?>

</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_PAID_AMOUNT_2','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<td width='22.22%'  >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="" class="sugar_field"><?php echo $this->_tpl_vars['PAID_AMOUNT']; ?>
</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_UNPAID_AMOUNT','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<td width='22.22%'  >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="" class="sugar_field"><?php echo $this->_tpl_vars['UNPAID_AMOUNT']; ?>
</span>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() { initPanel(1, 'expanded'); }); </script>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_ENROLLMENT").style.display='none';</script>
<?php endif; ?>
<div id='detailpanel_2' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(2);">
<img border="0" id="detailpanel_2_img_hide" src="<?php echo smarty_function_sugar_getimagepath(array('file' => "basic_search.gif"), $this);?>
"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(2);">
<img border="0" id="detailpanel_2_img_show" src="<?php echo smarty_function_sugar_getimagepath(array('file' => "advanced_search.gif"), $this);?>
"></a>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_OTHER','module' => 'J_Payment'), $this);?>

<script>
document.getElementById('detailpanel_2').className += ' expanded';
</script>
</h4>
<table id='LBL_OTHER' class="panelContainer" cellspacing='<?php echo $this->_tpl_vars['gridline']; ?>
'>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['description']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['description']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['description']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['description']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['description']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlentitydecode') : smarty_modifier_escape($_tmp, 'htmlentitydecode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['note']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['note']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_NOTE','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['note']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="note" class="sugar_field"><?php echo $this->_tpl_vars['fields']['note']['value']; ?>
  <?php echo $this->_tpl_vars['revenue_link']; ?>
</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

</td>
<td width='22.22%' colspan='2' >
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['assigned_user_name']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['assigned_user_name']['hidden']): ?>
<?php if ($this->_tpl_vars['team_type'] == 'Junior'): ?>
<?php echo $this->_tpl_vars['MOD']['LBL_ASSIGNED_USER']; ?>

<?php else: ?>
<?php echo $this->_tpl_vars['MOD']['LBL_FIRST_SM']; ?>

<?php endif; ?>: 
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['assigned_user_name']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="assigned_user_name" class="sugar_field"><?php echo $this->_tpl_vars['assigned_user_idQ']; ?>
</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

</td>
<td width='22.22%' colspan='2' >
</td>
<?php if ($this->_tpl_vars['fields']['date_entered']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['date_entered']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_ENTERED','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['date_entered']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="date_entered" class="sugar_field"><?php echo $this->_tpl_vars['fields']['date_entered']['value']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_BY']; ?>
 <?php echo $this->_tpl_vars['fields']['created_by_name']['value']; ?>
</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['team_name']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['team_name']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TEAMS','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['team_name']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php echo smarty_function_sugarvar_teamset(array('parentFieldArray' => 'fields','vardef' => $this->_tpl_vars['fields']['team_name'],'tabindex' => 1,'display' => '','labelSpan' => '','fieldSpan' => '','formName' => '','displayType' => 'renderDetailView'), $this);?>

<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

</td>
<td width='22.22%' colspan='2' >
</td>
<?php if ($this->_tpl_vars['fields']['date_modified']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
<?php if (! $this->_tpl_vars['fields']['date_modified']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_MODIFIED','module' => 'J_Payment'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='22.22%'  >
<?php if (! $this->_tpl_vars['fields']['date_modified']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="date_modified" class="sugar_field"><?php echo $this->_tpl_vars['fields']['date_modified']['value']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_BY']; ?>
 <?php echo $this->_tpl_vars['fields']['modified_by_name']['value']; ?>
</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
&nbsp;
</td>
<td width='22.22%' colspan='2' >
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='11.11%' scope="col">
&nbsp;
</td>
<td width='22.22%' colspan='3' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="" class="sugar_field"><h2 style="color: #a90000;" class="nextInvoice">Next invoice number: <span id="nextInvoice"></span></h2></span>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() { initPanel(2, 'expanded'); }); </script>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_OTHER").style.display='none';</script>
<?php endif; ?>
</div>
</div>

</form>


<script>SUGAR.util.doWhen("document.getElementById('form') != null",
function(){SUGAR.util.buildAccessKeyLabels();});
</script><script type="text/javascript">
SUGAR.util.doWhen("typeof collapsePanel == 'function'",
        function(){
            var sugar_panel_collase = Get_Cookie("sugar_panel_collase");
            if(sugar_panel_collase != null) {
                sugar_panel_collase = YAHOO.lang.JSON.parse(sugar_panel_collase);
                for(panel in sugar_panel_collase['J_Payment_d'])
                    if(sugar_panel_collase['J_Payment_d'][panel])
                        collapsePanel(panel);
                    else
                        expandPanel(panel);
            }
        });
</script><?php echo '
<script type=text/javascript>
SUGAR.util.doWhen(\'!SUGAR.util.ajaxCallInProgress() && ((typeof action_sugar_grp1 != "undefined" && action_sugar_grp1 == "Popup") || (typeof DCMenu != "undefined" && DCMenu.module))\', function(){
SUGAR.forms.AssignmentHandler.registerView(\'DetailView\');
SUGAR.forms.AssignmentHandler.LINKS[\'DetailView\'] = {"created_by_link":{"relationship":"j_payment_created_by","module":"Users","id_name":"created_by"},"modified_user_link":{"relationship":"j_payment_modified_user","module":"Users","id_name":"modified_user_id"},"assigned_user_link":{"relationship":"j_payment_assigned_user","module":"Users","id_name":"assigned_user_id"},"c_carryforward":{"relationship":"j_payment_carryforward","module":"C_Carryforward"},"ju_studentsituations":{"relationship":"j_payment_studentsituations","module":"J_StudentSituations"},"ju_sponsor":{"relationship":"j_payment_j_sponsor","module":"J_Sponsor"},"ju_payment_in":{"relationship":"j_payment_moving_transfer","module":"J_Payment"},"ju_payment_out":{"relationship":"j_payment_moving_transfer","module":"J_Payment","id_name":"payment_out_id"},"situation_delay_link":{"relationship":"situation_delay_payment_delay","id_name":"delay_situation_id","module":"J_StudentSituations"},"paymentdetail_link":{"relationship":"payment_paymentdetails","module":"J_PaymentDetail"},"lead_link":{"relationship":"lead_payments","id_name":"lead_name","module":"Leads"},"account_link":{"relationship":"account_payments","id_name":"account_id","module":"Accounts"},"revenue_link":{"relationship":"ju_payment_revenue","module":"C_DeliveryRevenue"},"contract_link":{"relationship":"contract_j_payment","id_name":"contract_id","module":"Contracts"},"j_payment_j_discount_1":{"relationship":"j_payment_j_discount_1","module":"J_Discount"},"j_partnership_j_payment_1":{"relationship":"j_partnership_j_payment_1","module":"J_Partnership","id_name":"j_partnership_j_payment_1j_partnership_ida"},"j_payment_j_inventory_1":{"relationship":"j_payment_j_inventory_1","module":"J_Inventory","id_name":"j_payment_j_inventory_1j_inventory_idb"},"j_payment_j_payment_1":{"relationship":"j_payment_j_payment_1","module":"J_Payment"},"j_payment_j_payment_1_right":{"relationship":"j_payment_j_payment_1","module":"J_Payment","id_name":"j_payment_j_payment_1j_payment_ida"},"j_coursefee_j_payment_1":{"relationship":"j_coursefee_j_payment_1","module":"J_Coursefee","id_name":"j_coursefee_j_payment_1j_coursefee_ida"},"contacts_j_payment_1":{"relationship":"contacts_j_payment_1","module":"Contacts","id_name":"contacts_j_payment_1contacts_ida"}}

YAHOO.util.Event.onContentReady(\'J_Payment_detailview_tabs\', SUGAR.forms.AssignmentHandler.loadComplete);});</script>'; ?>
