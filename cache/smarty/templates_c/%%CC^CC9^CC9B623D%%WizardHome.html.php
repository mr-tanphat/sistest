<?php /* Smarty version 2.6.11, created on 2015-09-22 14:29:33
         compiled from modules/Campaigns/WizardHome.html */ ?>
<!--
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

/*********************************************************************************

 ********************************************************************************/
-->
<form id="wizform" name="wizform" method="POST" action="index.php">
	<input type="hidden" id="module" name="module" value="Campaigns">
	<input type="hidden" id="action" name="action" = "WizardHome">
	<input type="hidden" id="process_form" name="process_form" value='false' >		
	<input type="hidden" id="return_module" name="return_module" value="<?php echo $this->_tpl_vars['RETURN_MODULE']; ?>
">
	<input type="hidden" id="return_id" name="return_id" value="<?php echo $this->_tpl_vars['RETURN_ID']; ?>
">
	<input type="hidden" id="return_action" name="return_action" value="<?php echo $this->_tpl_vars['RETURN_ACTION']; ?>
">
	<input type="hidden" id="record" name="record" value="<?php echo $this->_tpl_vars['ID']; ?>
">	
	<input type="hidden" id="direct_step" name="direct_step" value="1">		
	<input type="hidden" id="campaign_id" name="campaign_id" value="">			
	<input type="hidden" id="wiz_mass" name="wiz_mass" value="">			
	<input type="hidden" id="mode" name="mode" value="">					



<table class='other view' cellspacing="1">
<tr>
<td rowspan='2' width='10%' scope='row' style='vertical-align: top;'>
<div id='nav' >
<?php echo $this->_tpl_vars['NAV_ITEMS']; ?>


</div>

</td>

<td class='edit view' rowspan='2' width='100%'>
<?php echo $this->_tpl_vars['CAMPAIGN_DIAGNOSTIC_LINK']; ?>
<p>
<table  width="100%" border="0" cellspacing="1" cellpadding="0" >
	<tr><td>
		<div id='campaign_summary'><?php echo $this->_tpl_vars['CAMPAIGN_TBL']; ?>
</div><p>
	</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>
		<p><div id='campaign_trackers'><?php echo $this->_tpl_vars['TRACKERS_TBL']; ?>
</div>
	</td></tr>
	<tr><td>&nbsp;</td></tr>			
	<tr><td>
		<p><div id='campaign_targets'><?php echo $this->_tpl_vars['TARGETS_TBL']; ?>
</div>
	</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>
		<p><div id='campaign_marketing'><?php echo $this->_tpl_vars['MARKETING_TBL']; ?>
</div>
	</td></tr>
</table>		

		
</td></tr></table>
<script>
<?php echo $this->_tpl_vars['MSG_SCRIPT']; ?>

</script>
</form>
		