<?php /* Smarty version 2.6.11, created on 2017-02-07 13:25:48
         compiled from include/SugarFields/Fields/Float/DetailView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugarvar', 'include/SugarFields/Fields/Float/DetailView.tpl', 16, false),array('function', 'sugarvar_connector', 'include/SugarFields/Fields/Float/DetailView.tpl', 20, false),)), $this); ?>
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
<span class="sugar_field" id="<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )):  echo smarty_function_sugarvar(array('key' => 'name'), $this); else:  echo $this->_tpl_vars['displayParams']['idName'];  endif; ?>">
{sugar_number_format var=<?php echo smarty_function_sugarvar(array('key' => 'value','stringFormat' => 'false'), $this);?>
 <?php if (isset ( $this->_tpl_vars['vardef']['precision'] )): ?>precision=<?php echo $this->_tpl_vars['vardef']['precision'];  endif; ?> }
</span>
<?php if (! empty ( $this->_tpl_vars['displayParams']['enableConnectors'] )): ?>
<?php echo smarty_function_sugarvar_connector(array('view' => 'DetailView'), $this);?>
 
<?php endif; ?>