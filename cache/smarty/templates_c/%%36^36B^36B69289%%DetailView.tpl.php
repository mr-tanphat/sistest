<?php /* Smarty version 2.6.11, created on 2017-02-08 16:04:36
         compiled from cache/modules/C_Carryforward/DetailView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_button', 'cache/modules/C_Carryforward/DetailView.tpl', 27, false),array('function', 'sugar_include', 'cache/modules/C_Carryforward/DetailView.tpl', 34, false),array('function', 'counter', 'cache/modules/C_Carryforward/DetailView.tpl', 39, false),array('function', 'sugar_translate', 'cache/modules/C_Carryforward/DetailView.tpl', 49, false),array('function', 'sugar_number_format', 'cache/modules/C_Carryforward/DetailView.tpl', 147, false),array('function', 'sugarvar_teamset', 'cache/modules/C_Carryforward/DetailView.tpl', 197, false),array('modifier', 'strip_semicolon', 'cache/modules/C_Carryforward/DetailView.tpl', 50, false),)), $this); ?>


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
</form>
<div class="action_buttons"><?php if ($this->_tpl_vars['bean']->aclAccess('edit')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_KEY']; ?>
" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='C_Carryforward'; _form.return_action.value='DetailView'; _form.return_id.value='<?php echo $this->_tpl_vars['id']; ?>
'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
"><?php endif; ?>  <?php if ($this->_tpl_vars['bean']->aclAccess('edit')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_DUPLICATE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_DUPLICATE_BUTTON_KEY']; ?>
" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='C_Carryforward'; _form.return_action.value='DetailView'; _form.isDuplicate.value=true; _form.action.value='EditView'; _form.return_id.value='<?php echo $this->_tpl_vars['id']; ?>
';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Duplicate" value="<?php echo $this->_tpl_vars['APP']['LBL_DUPLICATE_BUTTON_LABEL']; ?>
" id="duplicate_button"><?php endif; ?>  <?php if ($this->_tpl_vars['bean']->aclAccess('delete')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_KEY']; ?>
" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='C_Carryforward'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('<?php echo $this->_tpl_vars['APP']['NTC_DELETE_CONFIRMATION']; ?>
')) SUGAR.ajaxUI.submitForm(_form);" type="submit" name="Delete" value="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_LABEL']; ?>
" id="delete_button"><?php endif; ?>  <?php if ($this->_tpl_vars['bean']->aclAccess('edit') && $this->_tpl_vars['bean']->aclAccess('delete')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_DUP_MERGE']; ?>
" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='C_Carryforward'; _form.return_action.value='DetailView'; _form.return_id.value='<?php echo $this->_tpl_vars['id']; ?>
'; _form.action.value='Step1'; _form.module.value='MergeRecords';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Merge" value="<?php echo $this->_tpl_vars['APP']['LBL_DUP_MERGE']; ?>
" id="merge_duplicate_button"><?php endif; ?>  <?php echo smarty_function_sugar_button(array('module' => ($this->_tpl_vars['module']),'id' => 'REALPDFVIEW','view' => ($this->_tpl_vars['view']),'form_id' => 'formDetailView','record' => $this->_tpl_vars['fields']['id']['value']), $this);?>
 <?php echo smarty_function_sugar_button(array('module' => ($this->_tpl_vars['module']),'id' => 'REALPDFEMAIL','view' => ($this->_tpl_vars['view']),'form_id' => 'formDetailView','record' => $this->_tpl_vars['fields']['id']['value']), $this);?>
 <?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=C_Carryforward", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?><div class="clear"></div></div>
</div>
</td>
<td align="right" width="20%"><?php echo $this->_tpl_vars['ADMIN_EDIT']; ?>

<?php echo $this->_tpl_vars['PAGINATION']; ?>

</td>
</tr>
</table><?php echo smarty_function_sugar_include(array('include' => $this->_tpl_vars['includes']), $this);?>

<div id="C_Carryforward_detailview_tabs"
>
<div >
<div id='detailpanel_1' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<table id='DEFAULT' class="panelContainer" cellspacing='<?php echo $this->_tpl_vars['gridline']; ?>
'>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['payment_id']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['payment_id']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_PAYMENT_ID','module' => 'C_Carryforward'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['payment_id']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['payment_id']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['payment_id']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['payment_id']['value']); ?>
<?php endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['payment_id']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['payment_id']['value']; ?>
</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['type']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['type']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TYPE','module' => 'C_Carryforward'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['type']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['type']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['type']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['type']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['type']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['type']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['type']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['type']['options'][$this->_tpl_vars['fields']['type']['value']]; ?>

<?php endif; ?>
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
<?php if ($this->_tpl_vars['fields']['date_input']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['date_input']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_INPUT','module' => 'C_Carryforward'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['date_input']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (strlen ( $this->_tpl_vars['fields']['date_input']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['date_input']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['date_input']['value']); ?>
<?php endif; ?>
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['date_input']['name']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['this_stock']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['this_stock']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_THIS_STOCK','module' => 'C_Carryforward'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['this_stock']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['this_stock']['name']; ?>
">
<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['this_stock']['value'],'precision' => 2), $this);?>

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
<?php if ($this->_tpl_vars['fields']['assigned_user_name']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['assigned_user_name']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_NAME','module' => 'C_Carryforward'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['assigned_user_name']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id="assigned_user_id" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['assigned_user_id']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['assigned_user_name']['value']; ?>
</span>
<?php endif; ?>
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['team_name']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['team_name']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TEAMS','module' => 'C_Carryforward'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['team_name']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php echo smarty_function_sugarvar_teamset(array('parentFieldArray' => 'fields','vardef' => $this->_tpl_vars['fields']['team_name'],'tabindex' => 1,'display' => '','labelSpan' => '','fieldSpan' => '','formName' => '','displayType' => 'renderDetailView'), $this);?>

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
</table>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("DEFAULT").style.display='none';</script>
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
                for(panel in sugar_panel_collase['C_Carryforward_d'])
                    if(sugar_panel_collase['C_Carryforward_d'][panel])
                        collapsePanel(panel);
                    else
                        expandPanel(panel);
            }
        });
</script><?php echo '
<script type=text/javascript>
SUGAR.util.doWhen(\'!SUGAR.util.ajaxCallInProgress() && ((typeof action_sugar_grp1 != "undefined" && action_sugar_grp1 == "Popup") || (typeof DCMenu != "undefined" && DCMenu.module))\', function(){
SUGAR.forms.AssignmentHandler.registerView(\'DetailView\');
SUGAR.forms.AssignmentHandler.LINKS[\'DetailView\'] = {"created_by_link":{"relationship":"c_carryforward_created_by","module":"Users","id_name":"created_by"},"modified_user_link":{"relationship":"c_carryforward_modified_user","module":"Users","id_name":"modified_user_id"},"assigned_user_link":{"relationship":"c_carryforward_assigned_user","module":"Users","id_name":"assigned_user_id"},"student_forward":{"relationship":"student_forward","module":"Contacts","id_name":"student_id"},"lead_forward":{"relationship":"lead_forward","module":"Leads","id_name":"lead_id"},"ju_payments":{"relationship":"j_payment_carryforward","module":"J_Payment","id_name":"payment_id"},"enrollments":{"relationship":"enrollment_carry","module":"Opportunities"}}

YAHOO.util.Event.onContentReady(\'C_Carryforward_detailview_tabs\', SUGAR.forms.AssignmentHandler.loadComplete);});</script>'; ?>
