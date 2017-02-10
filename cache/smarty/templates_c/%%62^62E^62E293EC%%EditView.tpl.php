<?php /* Smarty version 2.6.11, created on 2017-02-07 09:34:03
         compiled from include/SugarFields/Fields/Base/EditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugarvar', 'include/SugarFields/Fields/Base/EditView.tpl', 16, false),array('modifier', 'default', 'include/SugarFields/Fields/Base/EditView.tpl', 22, false),)), $this); ?>
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
{if strlen(<?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
) <= 0}
{assign var="value" value=<?php echo smarty_function_sugarvar(array('key' => 'default_value','string' => true), $this);?>
 }
{else}
{assign var="value" value=<?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
 }
{/if}  
<input type='text' name='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>' 
    id='<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>' size='<?php echo ((is_array($_tmp=@$this->_tpl_vars['displayParams']['size'])) ? $this->_run_mod_handler('default', true, $_tmp, 30) : smarty_modifier_default($_tmp, 30)); ?>
' 
    <?php if (isset ( $this->_tpl_vars['displayParams']['maxlength'] )): ?>maxlength='<?php echo $this->_tpl_vars['displayParams']['maxlength']; ?>
'<?php elseif (isset ( $this->_tpl_vars['vardef']['len'] )): ?>maxlength='<?php echo $this->_tpl_vars['vardef']['len']; ?>
'<?php endif; ?> 
    value='{$value}' title='<?php echo $this->_tpl_vars['vardef']['help']; ?>
' <?php if (! empty ( $this->_tpl_vars['tabindex'] )): ?> tabindex='<?php echo $this->_tpl_vars['tabindex']; ?>
' <?php endif; ?>
    <?php if (! empty ( $this->_tpl_vars['displayParams']['accesskey'] )): ?> accesskey='<?php echo $this->_tpl_vars['displayParams']['accesskey']; ?>
' <?php endif; ?> <?php echo $this->_tpl_vars['displayParams']['field']; ?>
>