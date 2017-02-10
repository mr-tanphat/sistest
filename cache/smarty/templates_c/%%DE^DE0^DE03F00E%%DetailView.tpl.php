<?php /* Smarty version 2.6.11, created on 2017-02-07 09:34:07
         compiled from cache/modules/bc_survey/DetailView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_button', 'cache/modules/bc_survey/DetailView.tpl', 27, false),array('function', 'sugar_include', 'cache/modules/bc_survey/DetailView.tpl', 34, false),array('function', 'counter', 'cache/modules/bc_survey/DetailView.tpl', 39, false),array('function', 'sugar_translate', 'cache/modules/bc_survey/DetailView.tpl', 49, false),array('function', 'sugar_number_format', 'cache/modules/bc_survey/DetailView.tpl', 210, false),array('modifier', 'strip_semicolon', 'cache/modules/bc_survey/DetailView.tpl', 50, false),array('modifier', 'escape', 'cache/modules/bc_survey/DetailView.tpl', 121, false),array('modifier', 'url2html', 'cache/modules/bc_survey/DetailView.tpl', 121, false),array('modifier', 'nl2br', 'cache/modules/bc_survey/DetailView.tpl', 121, false),)), $this); ?>


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
" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='bc_survey'; _form.return_action.value='DetailView'; _form.return_id.value='<?php echo $this->_tpl_vars['id']; ?>
'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
"><?php endif; ?>  <?php if ($this->_tpl_vars['bean']->aclAccess('delete')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_KEY']; ?>
" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='bc_survey'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('<?php echo $this->_tpl_vars['APP']['NTC_DELETE_CONFIRMATION']; ?>
')) SUGAR.ajaxUI.submitForm(_form);" type="submit" name="Delete" value="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_LABEL']; ?>
" id="delete_button"><?php endif; ?>  <input title="Analyse Survey" id="analyse_survey" type="button" name="analyse_survey" value="Analyse Survey" onclick="window.open('index.php?module=bc_survey&action=viewreport&survey_id=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&type=status','_blank')" //> <input title="Preview Survey" id="preview_survey" type="button" name="preview_survey" value="Preview Survey" onclick="window.open('preview_survey.php?survey_id=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
','_blank')" //> <?php echo smarty_function_sugar_button(array('module' => ($this->_tpl_vars['module']),'id' => 'REALPDFVIEW','view' => ($this->_tpl_vars['view']),'form_id' => 'formDetailView','record' => $this->_tpl_vars['fields']['id']['value']), $this);?>
 <?php echo smarty_function_sugar_button(array('module' => ($this->_tpl_vars['module']),'id' => 'REALPDFEMAIL','view' => ($this->_tpl_vars['view']),'form_id' => 'formDetailView','record' => $this->_tpl_vars['fields']['id']['value']), $this);?>
 <?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=bc_survey", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?><div class="clear"></div></div>
</div>
</td>
<td align="right" width="20%"><?php echo $this->_tpl_vars['ADMIN_EDIT']; ?>

<?php echo $this->_tpl_vars['PAGINATION']; ?>

</td>
</tr>
</table><?php echo smarty_function_sugar_include(array('include' => $this->_tpl_vars['includes']), $this);?>

<div id="bc_survey_detailview_tabs"
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
<?php if ($this->_tpl_vars['fields']['name']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['name']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'bc_survey'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='37.5%' colspan='3' >
<?php if (! $this->_tpl_vars['fields']['name']['hidden']): ?>
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
<?php if ($this->_tpl_vars['fields']['logo']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['logo']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_LOGO','module' => 'bc_survey'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='37.5%' colspan='3' >
<?php if (! $this->_tpl_vars['fields']['logo']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="logo" class="sugar_field"><?php if ($this->_tpl_vars['fields']['logo']['value'] != ""): ?><img src="custom/include/surveylogo_images/<?php echo $this->_tpl_vars['fields']['logo']['value']; ?>
" height="120" width="100"/><?php else: ?>No Image<?php endif; ?></span>
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
<?php if ($this->_tpl_vars['fields']['description']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['description']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'bc_survey'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='37.5%' colspan='3' >
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
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean(); ?>
<?php if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']): ?>
<?php echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php if ($this->_tpl_vars['fields']['start_date']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['start_date']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_START_DATE','module' => 'bc_survey'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['start_date']['hidden']): ?>
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
</td>
<?php else: ?>
<td>&nbsp;</td><td>&nbsp;</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']['end_date']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['end_date']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_END_DATE','module' => 'bc_survey'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['end_date']['hidden']): ?>
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
<?php if ($this->_tpl_vars['fields']['allowed_resubmit_count']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['allowed_resubmit_count']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ALLOWED_RESUBMIT_COUNT','module' => 'bc_survey'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='37.5%' colspan='3' >
<?php if (! $this->_tpl_vars['fields']['allowed_resubmit_count']['hidden']): ?>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['allowed_resubmit_count']['name']; ?>
">
<?php echo smarty_function_sugar_number_format(array('precision' => 0,'var' => $this->_tpl_vars['fields']['allowed_resubmit_count']['value']), $this);?>

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
<?php if ($this->_tpl_vars['fields']['survey_page']['acl'] > 0): ?>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['survey_page']['hidden']): ?>
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_SURVEYPAGES','module' => 'bc_survey'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php else: ?>
<?php echo smarty_function_counter(array('name' => 'fieldsHidden'), $this);?>

<?php endif; ?>
</td>
<td width='37.5%' colspan='3' >
<?php if (! $this->_tpl_vars['fields']['survey_page']['hidden']): ?>
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
                for(panel in sugar_panel_collase['bc_survey_d'])
                    if(sugar_panel_collase['bc_survey_d'][panel])
                        collapsePanel(panel);
                    else
                        expandPanel(panel);
            }
        });
</script><?php echo '
<script type=text/javascript>
SUGAR.util.doWhen(\'!SUGAR.util.ajaxCallInProgress() && ((typeof action_sugar_grp1 != "undefined" && action_sugar_grp1 == "Popup") || (typeof DCMenu != "undefined" && DCMenu.module))\', function(){
SUGAR.forms.AssignmentHandler.registerView(\'DetailView\');
SUGAR.forms.AssignmentHandler.LINKS[\'DetailView\'] = {"created_by_link":{"relationship":"bc_survey_created_by","module":"Users","id_name":"created_by"},"modified_user_link":{"relationship":"bc_survey_modified_user","module":"Users","id_name":"modified_user_id"},"assigned_user_link":{"relationship":"bc_survey_assigned_user","module":"Users","id_name":"assigned_user_id"},"bc_survey_submission_bc_survey":{"relationship":"bc_survey_submission_bc_survey","module":"bc_survey_submission"},"bc_survey_users":{"relationship":"bc_survey_users","module":"Users"},"bc_survey_prospects":{"relationship":"bc_survey_prospects","module":"Prospects"},"bc_survey_leads":{"relationship":"bc_survey_leads","module":"Leads"},"bc_survey_pages_bc_survey":{"relationship":"bc_survey_pages_bc_survey","module":"bc_survey_pages"},"bc_survey_bc_survey_questions":{"relationship":"bc_survey_bc_survey_questions","module":"bc_survey_questions"},"bc_survey_accounts":{"relationship":"bc_survey_accounts","module":"Accounts"},"bc_survey_bc_survey_template":{"relationship":"bc_survey_bc_survey_template","module":"bc_survey_template"},"bc_survey_bc_survey_template_right":{"relationship":"bc_survey_bc_survey_template","id_name":"bc_survey_bc_survey_templatebc_survey_template_ida","module":"bc_survey_template"},"bc_survey_contacts":{"relationship":"bc_survey_contacts","module":"Contacts"}}

YAHOO.util.Event.onContentReady(\'bc_survey_detailview_tabs\', SUGAR.forms.AssignmentHandler.loadComplete);});</script>'; ?>
