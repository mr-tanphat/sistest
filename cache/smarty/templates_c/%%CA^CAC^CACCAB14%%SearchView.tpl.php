<?php /* Smarty version 2.6.11, created on 2017-02-07 09:34:13
         compiled from include/SugarFields/Fields/Enum/SearchView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'include/SugarFields/Fields/Enum/SearchView.tpl', 16, false),array('function', 'sugarvar', 'include/SugarFields/Fields/Enum/SearchView.tpl', 17, false),)), $this); ?>
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
<?php ob_start();  echo ((is_array($_tmp=@$this->_tpl_vars['displayParams']['size'])) ? $this->_run_mod_handler('default', true, $_tmp, 6) : smarty_modifier_default($_tmp, 6));  $this->_smarty_vars['capture']['display_size'] = ob_get_contents();  $this->assign('size', ob_get_contents());ob_end_clean(); ?>
{html_options id='<?php echo $this->_tpl_vars['vardef']['name']; ?>
' name='<?php echo $this->_tpl_vars['vardef']['name']; ?>
[]' options=<?php echo smarty_function_sugarvar(array('key' => 'options','string' => true), $this);?>
 size="<?php echo $this->_tpl_vars['size']; ?>
" style="width: 150px" <?php if ($this->_tpl_vars['size'] > 1): ?>multiple="1"<?php endif; ?> selected=<?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
}