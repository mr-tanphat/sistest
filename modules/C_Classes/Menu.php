<?php
    //create by leduytan 22/7/2014 - Insert menu into Class
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    global $mod_strings, $app_strings, $sugar_config;

    if(ACLController::checkAccess('C_Classes', 'import', true))$module_menu[]=Array("index.php?module=C_Classes&action=EditView&return_module=C_Classes&return_action=DetailView", $mod_strings['LNK_NEW_RECORD']);

    if(ACLController::checkAccess('C_Classes', 'list', true))$module_menu[]=Array("index.php?module=C_Classes&action=index&return_module=C_Classes&return_action=DetailView", $mod_strings['LNK_LIST']);
    
    if(empty($sugar_config['disc_client'])){
        if(ACLController::checkAccess('C_Classes', 'list', true))$module_menu[]=Array("index.php?module=Reports&action=index&query=true&report_module=C_Classes", $mod_strings['LNK_CLASS_REPORTS']);
    }

    if(ACLController::checkAccess('C_Classes', 'import', true))
        $module_menu[] = Array("index.php?module=C_Classes&action=checkTeacher", $mod_strings['LNK_CHECK_TEACHER']);
    
    if(ACLController::checkAccess('C_Classes', 'import', true))
        $module_menu[] = Array("index.php?module=C_Classes&action=checkRoom", $mod_strings['LNK_CHECK_ROOM']);
    
    if(ACLController::checkAccess('C_Classes', 'import', true))
        $module_menu[] = Array("index.php?module=C_Classes&action=classSchedule", $mod_strings['LNK_CLASS_SCHEDULE']);

?>
