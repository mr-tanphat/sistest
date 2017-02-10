<?php /* Smarty version 2.6.11, created on 2017-02-07 09:34:38
         compiled from include/SugarFields/Fields/Datetime/EditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugarvar', 'include/SugarFields/Fields/Datetime/EditView.tpl', 16, false),)), $this); ?>
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
<?php ob_start();  echo smarty_function_sugarvar(array('key' => 'name'), $this); $this->_smarty_vars['capture']['idname'] = ob_get_contents();  $this->assign('idname', ob_get_contents());ob_end_clean(); ?>
<?php if (! empty ( $this->_tpl_vars['displayParams']['idName'] )): ?>
    <?php $this->assign('idname', $this->_tpl_vars['displayParams']['idName']); ?>
<?php endif; ?>
<span class="dateTime">
{assign var=date_value value=<?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
 }
<input class="date_input" autocomplete="off" type="text" name="<?php echo $this->_tpl_vars['idname']; ?>
" id="<?php echo $this->_tpl_vars['idname']; ?>
" value="{$date_value}" title='<?php echo $this->_tpl_vars['vardef']['help']; ?>
' <?php echo $this->_tpl_vars['displayParams']['field']; ?>
 tabindex='<?php echo $this->_tpl_vars['tabindex']; ?>
' <?php if (! empty ( $this->_tpl_vars['displayParams']['accesskey'] )): ?> accesskey='<?php echo $this->_tpl_vars['displayParams']['accesskey']; ?>
' <?php endif; ?>   size="11" maxlength="10" >
<?php if (! $this->_tpl_vars['displayParams']['hiddeCalendar']): ?>
{capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="<?php echo $this->_tpl_vars['idname']; ?>
_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}
<?php endif; ?>
<?php if ($this->_tpl_vars['displayParams']['showFormats']): ?>
&nbsp;(<span class="dateFormat">{$USER_DATEFORMAT}</span>)
<?php endif; ?>
</span>
<?php if (! $this->_tpl_vars['displayParams']['hiddeCalendar']): ?>
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "<?php echo $this->_tpl_vars['idname']; ?>
",
ifFormat : "{$CALENDAR_FORMAT}",
daFormat : "{$CALENDAR_FORMAT}",
button : "<?php echo $this->_tpl_vars['idname']; ?>
_trigger",
singleClick : true,
dateStr : "{$date_value}",
startWeekday: {$CALENDAR_FDOW|default:'0'},
step : 1,
weekNumbers:false
{rdelim}
);
</script>
<?php endif; ?>