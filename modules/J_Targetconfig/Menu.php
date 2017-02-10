<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 
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


global $mod_strings, $app_strings, $sugar_config;
// 
//if(ACLController::checkAccess('J_Targetconfig', 'edit', true))$module_menu[]=Array("index.php?module=J_Targetconfig&action=EditView&return_module=J_Targetconfig&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateJ_Targetconfig", 'J_Targetconfig');
//if(ACLController::checkAccess('J_Targetconfig', 'list', true))$module_menu[]=Array("index.php?module=J_Targetconfig&action=index&return_module=J_Targetconfig&return_action=DetailView", $mod_strings['LNK_LIST'],"J_Targetconfig", 'J_Targetconfig');
//if(ACLController::checkAccess('J_Targetconfig', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=J_Targetconfig&return_module=J_Targetconfig&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'J_Targetconfig');
//

if(ACLController::checkAccess('J_Targetconfig', 'edit', true))$module_menu[] = Array("index.php?module=J_Targetconfig&action=ConfigEnquires", $mod_strings['LBL_SET_TARGET_ENQUIRES']);
if(ACLController::checkAccess('J_Targetconfig', 'edit', true))$module_menu[] = Array("index.php?module=J_Targetconfig&action=ConfigNewsale", $mod_strings['LBL_SET_NEW_SALE']);
if(ACLController::checkAccess('J_Targetconfig', 'edit', true))$module_menu[] = Array("index.php?module=J_Targetconfig&action=ConfigRevenue", $mod_strings['LBL_SET_TARGET_REVENUE']);
