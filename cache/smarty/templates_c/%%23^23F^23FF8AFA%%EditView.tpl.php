<?php /* Smarty version 2.6.11, created on 2017-02-07 09:34:38
         compiled from include/SugarFields/Fields/Text/EditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugarvar', 'include/SugarFields/Fields/Text/EditView.tpl', 16, false),)), $this); ?>
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
{if empty(<?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
)}
{assign var="value" value=<?php echo smarty_function_sugarvar(array('key' => 'default_value','string' => true), $this);?>
 }
{else}
{assign var="value" value=<?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
 }
{/if}  


<?php ob_start();  echo smarty_function_sugarvar(array('key' => 'name'), $this); $this->_smarty_vars['capture']['idname'] = ob_get_contents();  $this->assign('idname', ob_get_contents());ob_end_clean(); ?>
<?php if (! empty ( $this->_tpl_vars['displayParams']['idName'] )): ?>
    <?php $this->assign('idname', $this->_tpl_vars['displayParams']['idName']); ?>
<?php endif; ?>


<textarea  id='<?php echo $this->_tpl_vars['idname']; ?>
' name='<?php echo $this->_tpl_vars['idname']; ?>
'
rows="<?php if (! empty ( $this->_tpl_vars['displayParams']['rows'] )):  echo $this->_tpl_vars['displayParams']['rows'];  elseif (! empty ( $this->_tpl_vars['vardef']['rows'] )):  echo $this->_tpl_vars['vardef']['rows'];  else:  echo 4;  endif; ?>" 
cols="<?php if (! empty ( $this->_tpl_vars['displayParams']['cols'] )):  echo $this->_tpl_vars['displayParams']['cols'];  elseif (! empty ( $this->_tpl_vars['vardef']['cols'] )):  echo $this->_tpl_vars['vardef']['cols'];  else:  echo 60;  endif; ?>" 
title='<?php echo $this->_tpl_vars['vardef']['help']; ?>
' tabindex="<?php echo $this->_tpl_vars['tabindex']; ?>
" <?php echo $this->_tpl_vars['displayParams']['field']; ?>

<?php if (! empty ( $this->_tpl_vars['displayParams']['accesskey'] )): ?> accesskey='<?php echo $this->_tpl_vars['displayParams']['accesskey']; ?>
' <?php endif; ?> >{$value}</textarea>


