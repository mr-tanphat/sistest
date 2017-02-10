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
 
if(ACLController::checkAccess('C_Teachers', 'edit', true))$module_menu[]=Array("index.php?module=C_Teachers&action=EditView&return_module=C_Teachers&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateC_Teachers", 'C_Teachers');
if(ACLController::checkAccess('C_Teachers', 'edit', true))$module_menu[]=Array("index.php?module=C_Teachers&action=ImportVCard", $mod_strings['LNK_IMPORT_VCARD'],"CreateC_Teachers", 'C_Teachers');if(ACLController::checkAccess('C_Teachers', 'list', true))$module_menu[]=Array("index.php?module=C_Teachers&action=index&return_module=C_Teachers&return_action=DetailView", $mod_strings['LNK_LIST'],"C_Teachers", 'C_Teachers');
