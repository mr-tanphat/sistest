<?php /* Smarty version 2.6.11, created on 2017-02-07 09:34:20
         compiled from include/SugarFields/Fields/Relate/DetailView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugarvar', 'include/SugarFields/Fields/Relate/DetailView.tpl', 17, false),array('function', 'sugarvar_connector', 'include/SugarFields/Fields/Relate/DetailView.tpl', 27, false),)), $this); ?>
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
<?php if (! $this->_tpl_vars['nolink'] && ! empty ( $this->_tpl_vars['vardef']['id_name'] )): ?> 
{if !empty(<?php echo smarty_function_sugarvar(array('memberName' => 'vardef.id_name','key' => 'value','string' => 'true'), $this);?>
)}
{capture assign="detail_url"}index.php?module=<?php echo $this->_tpl_vars['vardef']['module']; ?>
&action=DetailView&record=<?php echo smarty_function_sugarvar(array('memberName' => 'vardef.id_name','key' => 'value'), $this);?>
{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<?php endif; ?>
<span id="<?php echo $this->_tpl_vars['vardef']['id_name']; ?>
" class="sugar_field" data-id-value="<?php echo smarty_function_sugarvar(array('memberName' => 'vardef.id_name','key' => 'value'), $this);?>
"><?php echo smarty_function_sugarvar(array('key' => 'value'), $this);?>
</span>
<?php if (! $this->_tpl_vars['nolink'] && ! empty ( $this->_tpl_vars['vardef']['id_name'] )): ?>
{if !empty(<?php echo smarty_function_sugarvar(array('memberName' => 'vardef.id_name','key' => 'value','string' => 'true'), $this);?>
)}</a>{/if}
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['displayParams']['enableConnectors'] ) && ! empty ( $this->_tpl_vars['vardef']['id_name'] )): ?>
{if !empty(<?php echo smarty_function_sugarvar(array('memberName' => 'vardef.id_name','key' => 'value','string' => 'true'), $this);?>
)}
<?php echo smarty_function_sugarvar_connector(array('view' => 'DetailView'), $this);?>
 
{/if}
<?php endif; ?>