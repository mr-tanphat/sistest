<?php /* Smarty version 2.6.11, created on 2017-02-07 09:47:24
         compiled from modules/Prospects/tpls/DetailViewHeader.tpl */ ?>
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

{assign var=preForm value="<table width='100%' border='1' cellspacing='0' cellpadding='0'><tr><td><table width='100%'><tr><td>"}
{assign var=displayPreform value=false}
{if isset($bean->lead_id) && !empty($bean->lead_id)}
{assign var=displayPreform value=true}
{assign var=preForm value=$preForm|cat:$MOD.LBL_CONVERTED_LEAD}
{assign var=preForm value=$preForm|cat:"&nbsp;<a href='index.php?module=Leads&action=DetailView&record="}
{assign var=preForm value=$preForm|cat:$bean->lead_id}
{assign var=preForm value=$preForm|cat:"'>"}
{assign var=preForm value=$preForm|cat:$lead->name}
{assign var=preForm value=$preForm|cat:"</a>"}
{/if}

{assign var=preForm value=$preForm|cat:"</td><td>"}
{assign var=preForm value=$preForm|cat:"</td></tr></table></td></tr></table>"}
{if $displayPreform}
{$preForm}
<br>
{/if}

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'include/DetailView/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>