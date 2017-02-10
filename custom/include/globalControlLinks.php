<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    global $app_strings, $current_user;

    if (is_admin($current_user) || $current_user->isDeveloperForAnyModule()) {
        $global_control_links['admin'] = array(
            'linkinfo' => array($app_strings['LBL_ADMIN'] => 'index.php?module=Administration&action=index'),
            'submenu' => ''
        );
        $global_control_links['R&R'] = array(
            'linkinfo' => array($app_strings['LBL_QUICK_REPAIR_AND_REBUILD'] => 'index.php?module=Administration&action=repair'),
            'submenu' => ''
        );
        $global_control_links['relationship'] = array(
            'linkinfo' => array($app_strings['LBL_REPAIR_RELATIONSHIP'] => 'index.php?module=Administration&action=RebuildRelationship'),
            'submenu' => ''
        );
        $global_control_links['team_management'] = array(
            'linkinfo' => array($app_strings['LBL_TEAM_MANAGEMENT'] => 'index.php?module=Teams&action=index'),
            'submenu' => ''
        );
        $global_control_links['studio'] = array(
            'linkinfo' => array($app_strings['LBL_STUDIO'] => 'index.php?module=ModuleBuilder&action=index&type=studio#ajaxUILoc=&mbContent=module%3DModuleBuilder%26action%3Dwizard'),
            'submenu' => ''
        );
        $global_control_links['import'] = array(
            'linkinfo' => array('Import' => 'index.php?module=Import&action=step1&import_module=Administration'),
            'submenu' => ''
        );
        $global_control_links['cf'] = array(
            'linkinfo' => array('Carryforward' => 'index.php?module=C_Carryforward&action=index'),
            'submenu' => ''
        );
        
        $global_control_links['revenue'] = array(
            'linkinfo' => array('Revenue' => 'index.php?module=C_DeliveryRevenue&action=index'),
            'submenu' => ''
        );
    }

    if(isset($_SESSION['impersonating_user'])) {
        $title = string_format($app_strings['LBL_UNIMPERSONATE'], array('user_name'=>$_SESSION['impersonating_user']->name));
        $global_control_links['unimpersonate'] = array(
            'linkinfo' => array($title => 'index.php?module=Users&action=Unimpersonate'),
            'submenu' => ''
        );
    }

    $global_control_links['users'] = array(
        'linkinfo' => array($app_strings['LBL_LOGOUT'] => 'index.php?module=Users&action=Logout'),
        'submenu' => ''
    );
    $global_control_links['guide'] = array(
        'linkinfo' => array($app_strings['LBL_GUIDE'] => 'javascript:void(window.open(\'https://docs.google.com/document/d/1h-Af4_M5FSe4kOEZS7TWQjK2D4uftMljq4VEvE8OC70/edit?usp=sharing\'))'),
        'submenu' => ''
    );

    unset($global_control_links['training']);
    unset($global_control_links['about']);
?>