<?php /* Smarty version 2.6.11, created on 2017-02-07 09:34:03
         compiled from include/SugarFields/Fields/Relate/SearchView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugarvar', 'include/SugarFields/Fields/Relate/SearchView.tpl', 16, false),)), $this); ?>
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
<input type="text" name="<?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
"  class=<?php if (empty ( $this->_tpl_vars['displayParams']['class'] )): ?>"sqsEnabled"<?php else: ?> "<?php echo $this->_tpl_vars['displayParams']['class']; ?>
" <?php endif; ?> <?php if (! empty ( $this->_tpl_vars['tabindex'] )): ?> tabindex="<?php echo $this->_tpl_vars['tabindex']; ?>
" <?php endif; ?>  id="<?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
" size="<?php echo $this->_tpl_vars['displayParams']['size']; ?>
" value="<?php echo smarty_function_sugarvar(array('key' => 'value'), $this);?>
" title='<?php echo $this->_tpl_vars['vardef']['help']; ?>
' autocomplete="off" <?php echo $this->_tpl_vars['displayParams']['readOnly']; ?>
 <?php echo $this->_tpl_vars['displayParams']['field']; ?>
>
<input type="hidden" <?php if ($this->_tpl_vars['displayParams']['useIdSearch']): ?>name="<?php echo smarty_function_sugarvar(array('memberName' => 'vardef.id_name','key' => 'name'), $this);?>
"<?php endif; ?> id="<?php echo smarty_function_sugarvar(array('memberName' => 'vardef.id_name','key' => 'name'), $this);?>
" value="<?php echo smarty_function_sugarvar(array('memberName' => 'vardef.id_name','key' => 'value'), $this);?>
">
<?php if (empty ( $this->_tpl_vars['displayParams']['hideButtons'] )): ?>
<span class="id-ff multiple">
<?php if (empty ( $this->_tpl_vars['displayParams']['clearOnly'] )): ?>
<button type="button" name="btn_<?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
" <?php if (! empty ( $this->_tpl_vars['tabindex'] )): ?> tabindex="<?php echo $this->_tpl_vars['tabindex']; ?>
" <?php endif; ?>  title="{$APP.LBL_SELECT_BUTTON_TITLE}" class="button<?php if (empty ( $this->_tpl_vars['displayParams']['selectOnly'] )): ?> firstChild<?php endif; ?>" value="{$APP.LBL_SELECT_BUTTON_LABEL}" onclick='open_popup("<?php echo smarty_function_sugarvar(array('key' => 'module'), $this);?>
", 600, 400, "<?php echo $this->_tpl_vars['displayParams']['initial_filter']; ?>
", true, false, <?php echo $this->_tpl_vars['displayParams']['popupData']; ?>
, "single", true);'>{sugar_getimage alt=$app_strings.LBL_ID_FF_SELECT name="id-ff-select" ext=".png" other_attributes=''}</button><?php endif; ?>
<?php if (empty ( $this->_tpl_vars['displayParams']['selectOnly'] )): ?><button type="button" name="btn_clr_<?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
" <?php if (! empty ( $this->_tpl_vars['tabindex'] )): ?> tabindex="<?php echo $this->_tpl_vars['tabindex']; ?>
" <?php endif; ?>  title="{$APP.LBL_CLEAR_BUTTON_TITLE}" class="button<?php if (empty ( $this->_tpl_vars['displayParams']['clearOnly'] )): ?> lastChild<?php endif; ?>" onclick="this.form.<?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
.value = ''; this.form.<?php echo smarty_function_sugarvar(array('memberName' => 'vardef.id_name','key' => 'name'), $this);?>
.value = '';" value="{$APP.LBL_CLEAR_BUTTON_LABEL}">{sugar_getimage name="id-ff-clear" alt=$app_strings.LBL_ID_FF_CLEAR ext=".png" other_attributes=''}</button>
<?php endif; ?>
</span>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['displayParams']['allowNewValue'] )): ?>
<input type="hidden" name="<?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
_allow_new_value" id="<?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
_allow_new_value" value="true">
<?php endif; ?>