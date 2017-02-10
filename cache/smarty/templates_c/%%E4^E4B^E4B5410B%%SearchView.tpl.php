<?php /* Smarty version 2.6.11, created on 2017-02-07 13:21:40
         compiled from include/SugarFields/Fields/Bool/SearchView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugarvar', 'include/SugarFields/Fields/Bool/SearchView.tpl', 20, false),)), $this); ?>
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
{assign var="yes" value=""}
{assign var="no" value=""}
{assign var="default" value=""}

{if strval(<?php echo smarty_function_sugarvar(array('key' => 'value','stringFormat' => 'false'), $this);?>
) == "1"}
	{assign var="yes" value="SELECTED"}
{elseif strval(<?php echo smarty_function_sugarvar(array('key' => 'value','stringFormat' => 'false'), $this);?>
) == "0"}
	{assign var="no" value="SELECTED"}
{else}
	{assign var="default" value="SELECTED"}
{/if}

<select id="<?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
" name="<?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
" <?php if (! empty ( $this->_tpl_vars['tabindex'] )): ?> tabindex="<?php echo $this->_tpl_vars['tabindex']; ?>
" <?php endif; ?>  <?php echo $this->_tpl_vars['displayParams']['field']; ?>
>
 <option value="" {$default}></option>
 <option value = "0" {$no}> {$APP.LBL_SEARCH_DROPDOWN_NO}</option>
 <option value = "1" {$yes}> {$APP.LBL_SEARCH_DROPDOWN_YES}</option>
</select>
