<?php /* Smarty version 2.6.11, created on 2017-02-07 09:34:03
         compiled from include/SugarFields/Fields/Bool/EditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugarvar', 'include/SugarFields/Fields/Bool/EditView.tpl', 16, false),)), $this); ?>
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
{if strval(<?php echo smarty_function_sugarvar(array('key' => 'value','stringFormat' => 'false'), $this);?>
) == "1" || strval(<?php echo smarty_function_sugarvar(array('key' => 'value','stringFormat' => 'false'), $this);?>
) == "yes" || strval(<?php echo smarty_function_sugarvar(array('key' => 'value','stringFormat' => 'false'), $this);?>
) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>" value="0"> 
<input type="checkbox" id="<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>" 
name="<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>" 
value="1" title='<?php echo $this->_tpl_vars['vardef']['help']; ?>
' tabindex="<?php echo $this->_tpl_vars['tabindex']; ?>
" <?php if (! empty ( $this->_tpl_vars['displayParams']['accesskey'] )): ?> accesskey='<?php echo $this->_tpl_vars['displayParams']['accesskey']; ?>
' <?php endif; ?>
{$checked} <?php echo $this->_tpl_vars['displayParams']['field']; ?>
>