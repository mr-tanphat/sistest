<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

global $mod_strings, $app_strings, $sugar_config;

if(ACLController::checkAccess('C_Sponsors', 'edit', true))$module_menu[]=Array("index.php?module=C_Sponsors&action=EditView&return_module=C_Sponsors&return_action=index", $mod_strings['LNK_NEW_RECORD'],"CreateC_Sponsors", 'C_Sponsors');

if(ACLController::checkAccess('C_Sponsors', 'list', true))$module_menu[]=Array("index.php?module=C_Sponsors&action=index&return_module=C_Sponsors&return_action=DetailView", $mod_strings['LNK_LIST'],"C_Sponsors", 'C_Sponsors');
if(empty($sugar_config['disc_client'])){
    if(ACLController::checkAccess('C_Sponsors', 'list', true))$module_menu[]=Array("index.php?module=Reports&action=index&query=true&report_module=C_Sponsors", $mod_strings['LBL_REPORT'],"C_SponsorsReports", 'C_Sponsors');
}
if(ACLController::checkAccess('C_Sponsors', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=C_Sponsors&return_module=Accounts&return_action=index", $mod_strings['LNK_IMPORT_C_SPONSORS'],"Import", 'C_Sponsors');
?>