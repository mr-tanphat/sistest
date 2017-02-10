<?php /* Smarty version 2.6.11, created on 2017-02-07 13:44:04
         compiled from include/SugarFields/Fields/Int/RangeSearchForm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugarvar', 'include/SugarFields/Fields/Int/RangeSearchForm.tpl', 16, false),array('modifier', 'default', 'include/SugarFields/Fields/Int/RangeSearchForm.tpl', 78, false),)), $this); ?>
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

<?php if (empty ( $this->_tpl_vars['displayParams']['idName'] )): ?>
{assign var="id" value=<?php echo smarty_function_sugarvar(array('key' => 'name','string' => true), $this);?>
 }
<?php else: ?>
{assign var="id" value=<?php echo $this->_tpl_vars['displayParams']['idName']; ?>
 }
<?php endif; ?>

{if isset($smarty.request.<?php echo $this->_tpl_vars['id_range_choice']; ?>
)}
{assign var="starting_choice" value=$smarty.request.<?php echo $this->_tpl_vars['id_range_choice']; ?>
}
{else}
{assign var="starting_choice" value="="}
{/if}

<script type='text/javascript'>
function {$id}_range_change(val) 
{ldelim}
  calculate_between = (val == 'between');

  //Clear the values depending on the operation
  if(calculate_between) {ldelim}
     document.getElementById("range_{$id}").value = '';   
  {rdelim} else {ldelim}
     document.getElementById("start_range_{$id}").value = '';
     document.getElementById("end_range_{$id}").value = '';
  {rdelim}
 
  document.getElementById("{$id}_range_div").style.display = calculate_between ? 'none' : '';
  document.getElementById("{$id}_between_range_div").style.display = calculate_between ? '' : 'none';
{rdelim}

var {$id}_range_reset = function()
{ldelim}
{$id}_range_change('=');
{rdelim}

YAHOO.util.Event.onDOMReady(function() {ldelim}
if(document.getElementById('search_form_clear'))
{ldelim}
YAHOO.util.Event.addListener('search_form_clear', 'click', {$id}_range_reset);
{rdelim}

{rdelim});

YAHOO.util.Event.onDOMReady(function() {ldelim}
 	 if(document.getElementById('search_form_clear_advanced'))
 	 {ldelim}
 	     YAHOO.util.Event.addListener('search_form_clear_advanced', 'click', {$id}_range_reset);
 	 {rdelim}
{rdelim});

</script>

<span style="white-space:nowrap !important;">
<select id="{$id}_range_choice" name="{$id}_range_choice" style="width:190px !important;" onchange="{$id}_range_change(this.value);">
{html_options options=<?php echo smarty_function_sugarvar(array('key' => 'options','string' => true), $this);?>
 selected=$starting_choice}
</select>
<div id="{$id}_range_div" style="{if $starting_choice=='between'}display:none;{else}display:'';{/if}">
<input type='text' name='range_{$id}' id='range_{$id}' style='width:75px !important;' size='<?php echo ((is_array($_tmp=@$this->_tpl_vars['displayParams']['size'])) ? $this->_run_mod_handler('default', true, $_tmp, 20) : smarty_modifier_default($_tmp, 20)); ?>
' 
    <?php if (isset ( $this->_tpl_vars['displayParams']['maxlength'] )): ?>maxlength='<?php echo $this->_tpl_vars['displayParams']['maxlength']; ?>
'<?php endif; ?> 
    value='{if empty($smarty.request.<?php echo $this->_tpl_vars['id_range']; ?>
) && !empty($smarty.request.<?php echo $this->_tpl_vars['original_id']; ?>
)}{$smarty.request.<?php echo $this->_tpl_vars['original_id']; ?>
}{else}{$smarty.request.<?php echo $this->_tpl_vars['id_range']; ?>
}{/if}' tabindex='<?php echo $this->_tpl_vars['tabindex']; ?>
' <?php echo $this->_tpl_vars['displayParams']['field']; ?>
>
</div>
<div id="{$id}_between_range_div" style="{if $starting_choice=='between'}display:'';{else}display:none;{/if}">
<input type='text' name='start_range_{$id}' 
    id='start_range_{$id}' style='width:75px !important;' size='<?php echo ((is_array($_tmp=@$this->_tpl_vars['displayParams']['size'])) ? $this->_run_mod_handler('default', true, $_tmp, 10) : smarty_modifier_default($_tmp, 10)); ?>
' 
    <?php if (isset ( $this->_tpl_vars['displayParams']['maxlength'] )): ?>maxlength='<?php echo $this->_tpl_vars['displayParams']['maxlength']; ?>
'<?php endif; ?> 
    value='{$smarty.request.<?php echo $this->_tpl_vars['id_range_start']; ?>
 }' tabindex='<?php echo $this->_tpl_vars['tabindex']; ?>
'>
{$APP.LBL_AND}
<input type='text' name='end_range_{$id}' 
    id='end_range_{$id}' style='width:75px !important;' size='<?php echo ((is_array($_tmp=@$this->_tpl_vars['displayParams']['size'])) ? $this->_run_mod_handler('default', true, $_tmp, 10) : smarty_modifier_default($_tmp, 10)); ?>
' 
    <?php if (isset ( $this->_tpl_vars['displayParams']['maxlength'] )): ?>maxlength='<?php echo $this->_tpl_vars['displayParams']['maxlength']; ?>
'<?php endif; ?> 
    value='{$smarty.request.<?php echo $this->_tpl_vars['id_range_end']; ?>
 }' tabindex='<?php echo $this->_tpl_vars['tabindex']; ?>
'>    
</div> 
</span>