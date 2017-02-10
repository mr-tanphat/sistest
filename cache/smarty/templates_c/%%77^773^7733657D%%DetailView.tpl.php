<?php /* Smarty version 2.6.11, created on 2017-02-07 09:34:20
         compiled from include/SugarFields/Fields/Datetime/DetailView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugarvar', 'include/SugarFields/Fields/Datetime/DetailView.tpl', 23, false),array('function', 'sugarvar_connector', 'include/SugarFields/Fields/Datetime/DetailView.tpl', 35, false),)), $this); ?>
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
{*
    check to see if 'date_formatted_value' has been added to the vardefs, and use it if it has, otherwise use the normal sugarvar function
*}
<?php if (! empty ( $this->_tpl_vars['vardef']['date_formatted_value'] )): ?>
    {assign var="value" value=<?php echo $this->_tpl_vars['vardef']['date_formatted_value']; ?>
 }
<?php else: ?>
    {if strlen(<?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
) <= 0}
        {assign var="value" value=<?php echo smarty_function_sugarvar(array('key' => 'default_value','string' => true), $this);?>
 }
    {else}
        {assign var="value" value=<?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
 }
    {/if}
<?php endif; ?>



<span class="sugar_field" id="<?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
">{$value}</span>
<?php if (! empty ( $this->_tpl_vars['displayParams']['enableConnectors'] )): ?>
{if !empty($value)}
<?php echo smarty_function_sugarvar_connector(array('view' => 'DetailView'), $this);?>

{/if}
<?php endif; ?>