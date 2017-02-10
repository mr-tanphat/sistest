<?php /* Smarty version 2.6.11, created on 2017-02-07 09:34:38
         compiled from include/EditView/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_button', 'include/EditView/header.tpl', 60, false),array('function', 'sugar_action_menu', 'include/EditView/header.tpl', 70, false),)), $this); ?>
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
<script type="text/javascript" src="include/EditView/Panels.js"></script>
<script>
    {literal}
    $(document).ready(function(){
	    $("ul.clickMenu").each(function(index, node){
	        $(node).sugarActionMenu();
	    });
    });
    {/literal}
</script>
<div class="clear"></div>
<form action="index.php" method="POST" name="{$form_name}" id="{$form_id}" {$enctype}>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="dcQuickEdit">
<tr>
<td class="buttons">
<input type="hidden" name="module" value="{$module}">
{if isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true"}
<input type="hidden" name="record" value="">
<input type="hidden" name="duplicateSave" value="true">
<input type="hidden" name="duplicateId" value="{$fields.id.value}">
{else}
<input type="hidden" name="record" value="{$fields.id.value}">
{/if}
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="action">
<input type="hidden" name="return_module" value="{$smarty.request.return_module}">
<input type="hidden" name="return_action" value="{$smarty.request.return_action}">
<input type="hidden" name="return_id" value="{$smarty.request.return_id}">
<input type="hidden" name="module_tab"> 
<input type="hidden" name="contact_role">
{if (!empty($smarty.request.return_module) || !empty($smarty.request.relate_to)) && !(isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true")}
<input type="hidden" name="relate_to" value="{if $smarty.request.return_relationship}{$smarty.request.return_relationship}{elseif $smarty.request.relate_to && empty($smarty.request.from_dcmenu)}{$smarty.request.relate_to}{elseif empty($isDCForm) && empty($smarty.request.from_dcmenu)}{$smarty.request.return_module}{/if}">
<input type="hidden" name="relate_id" value="{$smarty.request.return_id}">
{/if}
<input type="hidden" name="offset" value="{$offset}">
{assign var='place' value="_HEADER"} <!-- to be used for id for buttons with custom code in def files-->
<?php if (isset ( $this->_tpl_vars['form']['hidden'] )): ?>
<?php $_from = $this->_tpl_vars['form']['hidden']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
<?php echo $this->_tpl_vars['field']; ?>
   
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
<?php if (empty ( $this->_tpl_vars['form']['button_location'] ) || $this->_tpl_vars['form']['button_location'] == 'top'): ?>
<?php if (! empty ( $this->_tpl_vars['form'] ) && ! empty ( $this->_tpl_vars['form']['buttons'] )): ?>
   <?php $_from = $this->_tpl_vars['form']['buttons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['button']):
?>
      <?php echo smarty_function_sugar_button(array('module' => ($this->_tpl_vars['module']),'id' => ($this->_tpl_vars['button']),'form_id' => ($this->_tpl_vars['form_id']),'view' => ($this->_tpl_vars['view']),'appendTo' => 'header_buttons','location' => 'HEADER'), $this);?>

   <?php endforeach; endif; unset($_from); ?>
<?php else: ?>
<?php echo smarty_function_sugar_button(array('module' => ($this->_tpl_vars['module']),'id' => 'SAVE','view' => ($this->_tpl_vars['view']),'form_id' => ($this->_tpl_vars['form_id']),'location' => 'HEADER','appendTo' => 'header_buttons'), $this);?>

<?php echo smarty_function_sugar_button(array('module' => ($this->_tpl_vars['module']),'id' => 'CANCEL','view' => ($this->_tpl_vars['view']),'form_id' => ($this->_tpl_vars['form_id']),'location' => 'HEADER','appendTo' => 'header_buttons'), $this);?>

<?php endif; ?>
<?php if (empty ( $this->_tpl_vars['form']['hideAudit'] ) || ! $this->_tpl_vars['form']['hideAudit']): ?>
<?php echo smarty_function_sugar_button(array('module' => ($this->_tpl_vars['module']),'id' => 'Audit','view' => ($this->_tpl_vars['view']),'form_id' => ($this->_tpl_vars['form_id']),'appendTo' => 'header_buttons'), $this);?>

<?php endif; ?>
<?php endif; ?>
<?php echo smarty_function_sugar_action_menu(array('buttons' => $this->_tpl_vars['header_buttons'],'class' => 'fancymenu','flat' => true), $this);?>

</td>
<td align='right'><?php echo $this->_tpl_vars['ADMIN_EDIT']; ?>

<?php if ($this->_tpl_vars['panelCount'] == 0): ?>
    	<?php if ($this->_tpl_vars['SHOW_VCR_CONTROL']): ?>
		{$PAGINATION}
	<?php endif; ?>
<?php endif; ?>
</td>
</tr>
</table>