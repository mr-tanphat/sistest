<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


global $mod_strings, $app_strings, $sugar_config;

if(ACLController::checkAccess('Meetings', 'edit', true))
    $module_menu[]=Array("index.php?module=Meetings&action=EditView&return_module=Meetings&return_action=DetailView&type=PT", $mod_strings['LNK_NEW_TESTING'],"CreateMeetings", "Meetings");

if(ACLController::checkAccess('Meetings', 'edit', true))
    $module_menu[]=Array("index.php?module=Meetings&action=EditView&return_module=Meetings&return_action=DetailView&type=Demo", $mod_strings['LNK_NEW_DEMO'],"CreateMeetings", "Meetings");

if(ACLController::checkAccess('Meetings', 'edit', true))
    $module_menu[]=Array("index.php?module=Meetings&action=EditView&return_module=Meetings&return_action=DetailView&type=Meeting", $mod_strings['LNK_NEW_MEETING'],"CreateMeetings", "Meetings");



//if(ACLController::checkAccess('Meetings', 'list', true))
//    $module_menu[]=Array("index.php?module=Meetings&action=index&return_module=Meetings&return_action=DetailView&type_list=PT&meeting_type_advanced=Placement Test", $mod_strings['LNK_PT_LIST'],"Meetings");
//
//if(ACLController::checkAccess('Meetings', 'list', true))
//    $module_menu[]=Array("index.php?module=Meetings&action=index&return_module=Meetings&return_action=DetailView&type_list=Demo&meeting_type_advanced=Demo", $mod_strings['LNK_DEMO_LIST'],"Meetings");

if(ACLController::checkAccess('Meetings', 'list', true))
    $module_menu[]=Array("index.php?module=Meetings&action=index&return_module=Meetings&return_action=DetailView&type_list=Meeting&meeting_type_advanced=Meeting", $mod_strings['LNK_MEETING_LIST'],"Meetings");

?>
