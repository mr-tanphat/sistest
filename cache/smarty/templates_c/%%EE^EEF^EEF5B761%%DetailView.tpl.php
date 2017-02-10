<?php /* Smarty version 2.6.11, created on 2017-02-07 10:13:56
         compiled from include/SugarFields/Fields/Link/DetailView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugarvar', 'include/SugarFields/Fields/Link/DetailView.tpl', 16, false),array('function', 'sugarvar_connector', 'include/SugarFields/Fields/Link/DetailView.tpl', 26, false),array('modifier', 'replace', 'include/SugarFields/Fields/Link/DetailView.tpl', 18, false),)), $this); ?>
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
{capture name=getLink assign=link}<?php echo smarty_function_sugarvar(array('key' => 'value'), $this);?>
{/capture}
<?php if ($this->_tpl_vars['vardef']['gen']): ?>
{sugar_replace_vars subject='<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['vardef']['default'])) ? $this->_run_mod_handler('replace', true, $_tmp, '{', '[') : smarty_modifier_replace($_tmp, '{', '[')))) ? $this->_run_mod_handler('replace', true, $_tmp, '}', ']') : smarty_modifier_replace($_tmp, '}', ']')); ?>
' assign='link'}
<?php endif; ?>
{if !empty($link)}
{capture name=getStart assign=linkStart}{$link|substr:0:7}{/capture}
<span class="sugar_field" id="<?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
">
<a href='{$link|to_url}' <?php if ($this->_tpl_vars['displayParams']['link_target']): ?>target='<?php echo $this->_tpl_vars['displayParams']['link_target']; ?>
'<?php elseif ($this->_tpl_vars['vardef']['link_target']): ?>target='<?php echo $this->_tpl_vars['vardef']['link_target']; ?>
'<?php endif; ?> ><?php if (! empty ( $this->_tpl_vars['displayParams']['title'] )): ?>{sugar_translate label='<?php echo $this->_tpl_vars['displayParams']['title']; ?>
' module=$module}<?php else: ?>{$link}<?php endif; ?></a>
</span>
<?php if (! empty ( $this->_tpl_vars['displayParams']['enableConnectors'] )): ?>
<?php echo smarty_function_sugarvar_connector(array('view' => 'DetailView'), $this);?>

<?php endif; ?>
{/if}