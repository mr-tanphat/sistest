<?php /* Smarty version 2.6.11, created on 2017-02-07 09:34:38
         compiled from include/SugarFields/Fields/Relate/EditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugarvar', 'include/SugarFields/Fields/Relate/EditView.tpl', 16, false),)), $this); ?>
{*
/*********************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 *
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 *
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 ********************************************************************************/

*}
<?php ob_start();  echo smarty_function_sugarvar(array('key' => 'name'), $this); $this->_smarty_vars['capture']['idname'] = ob_get_contents();  $this->assign('idname', ob_get_contents());ob_end_clean(); ?>
<?php if (! empty ( $this->_tpl_vars['displayParams']['idName'] )): ?>
    <?php $this->assign('idname', $this->_tpl_vars['displayParams']['idName']); ?>
<?php endif; ?>
<input type="text" name="<?php echo $this->_tpl_vars['idname']; ?>
" class=<?php if (empty ( $this->_tpl_vars['displayParams']['class'] )): ?>"sqsEnabled"<?php else: ?> "<?php echo $this->_tpl_vars['displayParams']['class']; ?>
" <?php endif; ?> tabindex="<?php echo $this->_tpl_vars['tabindex']; ?>
" id="<?php echo $this->_tpl_vars['idname']; ?>
" size="<?php echo $this->_tpl_vars['displayParams']['size']; ?>
" value="<?php echo smarty_function_sugarvar(array('key' => 'value'), $this);?>
" title='<?php echo $this->_tpl_vars['vardef']['help']; ?>
' autocomplete="off" <?php echo $this->_tpl_vars['displayParams']['readOnly']; ?>
 <?php echo $this->_tpl_vars['displayParams']['field']; ?>
	<?php if (! empty ( $this->_tpl_vars['displayParams']['accesskey'] )): ?> accesskey='<?php echo $this->_tpl_vars['displayParams']['accesskey']; ?>
' <?php endif; ?> >
<input type="hidden" name="<?php if (! empty ( $this->_tpl_vars['displayParams']['idNameHidden'] )):  echo $this->_tpl_vars['displayParams']['idNameHidden'];  endif;  echo smarty_function_sugarvar(array('key' => 'id_name'), $this);?>
" 
	id="<?php if (! empty ( $this->_tpl_vars['displayParams']['idNameHidden'] )):  echo $this->_tpl_vars['displayParams']['idNameHidden'];  endif;  echo smarty_function_sugarvar(array('key' => 'id_name'), $this);?>
" 
	<?php if (! empty ( $this->_tpl_vars['vardef']['id_name'] )): ?>value="<?php echo smarty_function_sugarvar(array('memberName' => 'vardef.id_name','key' => 'value'), $this);?>
"<?php endif; ?>>
<?php if (empty ( $this->_tpl_vars['displayParams']['hideButtons'] )): ?>
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['idname']; ?>
" id="btn_<?php echo $this->_tpl_vars['idname']; ?>
" tabindex="<?php echo $this->_tpl_vars['tabindex']; ?>
" title="{sugar_translate label="<?php echo $this->_tpl_vars['displayParams']['accessKeySelectTitle']; ?>
"}" class="button firstChild" value="{sugar_translate label="<?php echo $this->_tpl_vars['displayParams']['accessKeySelectLabel']; ?>
"}"
onclick='open_popup(
    "<?php echo smarty_function_sugarvar(array('key' => 'module'), $this);?>
", 
	600, 
	400, 
	"<?php echo $this->_tpl_vars['displayParams']['initial_filter']; ?>
", 
	true, 
	false, 
	<?php echo $this->_tpl_vars['displayParams']['popupData']; ?>
, 
	"single", 
	true
);' <?php if (isset ( $this->_tpl_vars['displayParams']['javascript']['btn'] )):  echo $this->_tpl_vars['displayParams']['javascript']['btn'];  endif; ?>><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><?php if (empty ( $this->_tpl_vars['displayParams']['selectOnly'] )): ?><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['idname']; ?>
" id="btn_clr_<?php echo $this->_tpl_vars['idname']; ?>
" tabindex="<?php echo $this->_tpl_vars['tabindex']; ?>
" title="{sugar_translate label="<?php echo $this->_tpl_vars['displayParams']['accessKeyClearTitle']; ?>
"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['idname']; ?>
', '<?php if (! empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo $this->_tpl_vars['displayParams']['idName']; ?>
_<?php endif;  echo smarty_function_sugarvar(array('key' => 'id_name'), $this);?>
');"  value="{sugar_translate label="<?php echo $this->_tpl_vars['displayParams']['accessKeyClearLabel']; ?>
"}" <?php if (isset ( $this->_tpl_vars['displayParams']['javascript']['btn_clear'] )):  echo $this->_tpl_vars['displayParams']['javascript']['btn_clear'];  endif; ?>><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
<?php endif; ?>
</span>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['displayParams']['allowNewValue'] )): ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['idname']; ?>
_allow_new_value" id="<?php echo $this->_tpl_vars['idname']; ?>
_allow_new_value" value="true">
<?php endif; ?>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_<?php echo $this->_tpl_vars['idname']; ?>
']) != 'undefined'",
		enableQS
);
</script>