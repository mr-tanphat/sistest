<?php /* Smarty version 2.6.11, created on 2017-02-07 09:34:20
         compiled from include/SugarFields/Fields/Enum/DetailView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugarvar', 'include/SugarFields/Fields/Enum/DetailView.tpl', 18, false),array('function', 'sugarvar_connector', 'include/SugarFields/Fields/Enum/DetailView.tpl', 26, false),)), $this); ?>
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
{* This is here so currency fields, who don't really have dropdown
lists can work. *}
{if is_string(<?php echo smarty_function_sugarvar(array('key' => 'options','string' => true), $this);?>
)}
<input type="hidden" class="sugar_field" id="<?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
" value="{ <?php echo smarty_function_sugarvar(array('key' => 'options','string' => true), $this);?>
 }">
{ <?php echo smarty_function_sugarvar(array('key' => 'options','string' => true), $this);?>
 }
{else}
<input type="hidden" class="sugar_field" id="<?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
" value="{ <?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
 }">
{ <?php echo smarty_function_sugarvar(array('key' => 'options','string' => true), $this);?>
[<?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
]}
{/if}
<?php if (! empty ( $this->_tpl_vars['displayParams']['enableConnectors'] )): ?>
<?php echo smarty_function_sugarvar_connector(array('view' => 'DetailView'), $this);?>

<?php endif; ?>