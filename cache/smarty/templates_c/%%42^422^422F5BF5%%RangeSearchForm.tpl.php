<?php /* Smarty version 2.6.11, created on 2017-02-07 13:21:20
         compiled from include/SugarFields/Fields/Datetimecombo/RangeSearchForm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugarvar', 'include/SugarFields/Fields/Datetimecombo/RangeSearchForm.tpl', 17, false),)), $this); ?>
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

<div style="white-space:nowrap !important;">
<select id="{$id}_range_choice" name="{$id}_range_choice" style="width:125px !important;" onchange="{$id}_range_change(this.value);">
{html_options options=<?php echo smarty_function_sugarvar(array('key' => 'options','string' => true), $this);?>
 selected=$starting_choice}
</select>
</div>

<div id="{$id}_range_div" style="{if preg_match('/^\[/', $smarty.request.<?php echo $this->_tpl_vars['id_range']; ?>
)  || $starting_choice == 'between'}display:none{else}display:''{/if};">
<input autocomplete="off" type="text" name="range_{$id}" id="range_{$id}" value='{if empty($smarty.request.<?php echo $this->_tpl_vars['id_range']; ?>
) && !empty($smarty.request.<?php echo $this->_tpl_vars['original_id']; ?>
)}{$smarty.request.<?php echo $this->_tpl_vars['original_id']; ?>
}{else}{$smarty.request.<?php echo $this->_tpl_vars['id_range']; ?>
}{/if}' title='<?php echo $this->_tpl_vars['vardef']['help']; ?>
' <?php echo $this->_tpl_vars['displayParams']['field']; ?>
 <?php if (! empty ( $this->_tpl_vars['tabindex'] )): ?> tabindex='<?php echo $this->_tpl_vars['tabindex']; ?>
' <?php endif; ?> size="11" style="width:100px !important;">
<?php if (! $this->_tpl_vars['displayParams']['hiddeCalendar']): ?>
{capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="{$id}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}
<?php endif; ?>
<?php if ($this->_tpl_vars['displayParams']['showFormats']): ?>
&nbsp;(<span class="dateFormat">{$USER_DATEFORMAT}</span>)
<?php endif; ?>
<?php if (! $this->_tpl_vars['displayParams']['hiddeCalendar']): ?>
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "range_{$id}",
daFormat : "{$CALENDAR_FORMAT}",
button : "{$id}_trigger",
singleClick : true,
dateStr : "{$date_value}",
startWeekday: {$CALENDAR_FDOW|default:'0'},
step : 1,
weekNumbers:false
{rdelim}
);
</script>
<?php endif; ?>    
</div>

<div id="{$id}_between_range_div" style="{if $starting_choice=='between'}display:'';{else}display:none;{/if}">
{assign var=date_value value=<?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
 }
<input autocomplete="off" type="text" name="start_range_{$id}" id="start_range_{$id}" value='{$smarty.request.<?php echo $this->_tpl_vars['id_range_start']; ?>
 }' title='<?php echo $this->_tpl_vars['vardef']['help']; ?>
' <?php echo $this->_tpl_vars['displayParams']['field']; ?>
 tabindex='<?php echo $this->_tpl_vars['tabindex']; ?>
' size="11" style="width:100px !important;">
<?php if (! $this->_tpl_vars['displayParams']['hiddeCalendar']): ?>
{capture assign="other_attributes"}align="absmiddle" border="0" id="start_range_{$id}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE|escape:'html' other_attributes=$other_attributes}
<?php endif; ?>
<?php if ($this->_tpl_vars['displayParams']['showFormats']): ?>
&nbsp;(<span class="dateFormat">{$USER_DATEFORMAT}</span>)
<?php endif; ?>
<?php if (! $this->_tpl_vars['displayParams']['hiddeCalendar']): ?>
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "start_range_{$id}",
daFormat : "{$CALENDAR_FORMAT}",
button : "start_range_{$id}_trigger",
singleClick : true,
dateStr : "{$date_value}",
step : 1,
weekNumbers:false
{rdelim}
);
</script>
<?php endif; ?> 
{$APP.LBL_AND}
{assign var=date_value value=<?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
 }
<input autocomplete="off" type="text" name="end_range_{$id}" id="end_range_{$id}" value='{$smarty.request.<?php echo $this->_tpl_vars['id_range_end']; ?>
 }' title='<?php echo $this->_tpl_vars['vardef']['help']; ?>
' <?php echo $this->_tpl_vars['displayParams']['field']; ?>
 tabindex='<?php echo $this->_tpl_vars['tabindex']; ?>
' size="11" style="width:100px !important;" maxlength="10">
<?php if (! $this->_tpl_vars['displayParams']['hiddeCalendar']): ?>
{capture assign="other_attributes"}align="absmiddle" border="0" id="end_range_{$id}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE|escape:'html' other_attributes=$other_attributes}
<?php endif; ?>
<?php if ($this->_tpl_vars['displayParams']['showFormats']): ?>
&nbsp;(<span class="dateFormat">{$USER_DATEFORMAT}</span>)
<?php endif; ?>
<?php if (! $this->_tpl_vars['displayParams']['hiddeCalendar']): ?>
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "end_range_{$id}",
daFormat : "{$CALENDAR_FORMAT}",
button : "end_range_{$id}_trigger",
singleClick : true,
dateStr : "{$date_value}",
step : 1,
weekNumbers:false
{rdelim}
);
</script>
<?php endif; ?> 
</div>


<script type='text/javascript'>

function {$id}_range_change(val) 
{ldelim}
  if(val == 'between') {ldelim}
     document.getElementById("range_{$id}").value = '';  
     document.getElementById("{$id}_range_div").style.display = 'none';
     document.getElementById("{$id}_between_range_div").style.display = ''; 
  {rdelim} else if (val == '=' || val == 'not_equal' || val == 'greater_than' || val == 'less_than') {ldelim}
     if((/^\[.*\]$/).test(document.getElementById("range_{$id}").value))
     {ldelim}
     	document.getElementById("range_{$id}").value = '';
     {rdelim}
     document.getElementById("start_range_{$id}").value = '';
     document.getElementById("end_range_{$id}").value = '';
     document.getElementById("{$id}_range_div").style.display = '';
     document.getElementById("{$id}_between_range_div").style.display = 'none';
  {rdelim} else {ldelim}
     if (val != '') {ldelim}
        val = '[' + val + ']';
     {rdelim}
     document.getElementById("range_{$id}").value = val;
     document.getElementById("start_range_{$id}").value = '';
     document.getElementById("end_range_{$id}").value = ''; 
     document.getElementById("{$id}_range_div").style.display = 'none';
     document.getElementById("{$id}_between_range_div").style.display = 'none';         
  {rdelim}
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