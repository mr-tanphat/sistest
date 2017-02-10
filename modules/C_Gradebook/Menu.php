<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    global $mod_strings, $app_strings, $sugar_config;
    
    if(ACLController::checkAccess('C_Gradebook', 'edit', true))$module_menu[]=Array("index.php?module=C_Gradebook&action=EditView&return_module=C_Gradebook&return_action=index", $mod_strings['LNK_NEW_RECORD']);
    if(ACLController::checkAccess('C_Gradebook', 'list', true))$module_menu[]=Array("index.php?module=C_Gradebook&action=index&return_module=C_Gradebook&return_action=DetailView", $mod_strings['LNK_LIST']);
    if(ACLController::checkAccess('C_Gradebook', 'import', true))$module_menu[] = Array("index.php?module=C_Gradebook&action=scoreTable", $mod_strings['LBL_INPUT']);

?>
