<?php
    require_once('include/MVC/View/views/view.list.php');

    class TeamsViewList extends ViewList
    {
        public function preDisplay()
        {
            //bug #46690: Developer Access to Users/Teams/Roles
            //           if (!$GLOBALS['current_user']->isAdminForModule('Users') && !$GLOBALS['current_user']->isDeveloperForModule('Users'))
            //               sugar_die("Unauthorized access to administration.");


            //Customize Team Management - By Lap Nguyen
            include_once("custom/modules/Teams/_helper.php");
            $ss = new Sugar_Smarty();
            $type = $GLOBALS['app_list_strings']['type_team_list'];
            $region = $GLOBALS['app_list_strings']['region_list']; 
            $nodes = getTeamNodes();
            $ss->assign("MOD", $GLOBALS['mod_strings']);
            $ss->assign("NODES", json_encode($nodes));
            $ss->assign("APPS", $GLOBALS['app_strings']);

            $detail = getTeamDetail('1');
            $ss->assign("team_name", $detail['team_name']);
            $ss->assign("short_name", $detail['short_name']);
            $ss->assign("prefix", $detail['prefix']);
            $ss->assign("type", $detail['type']);
            $ss->assign("select_type", $type);
            $ss->assign("phone_number", $detail['phone_number']);
            $ss->assign("team_id", $detail['team_id']);
            $ss->assign("parent_name", $detail['parent_name']);
            $ss->assign("parent_id", $detail['parent_id']);
            $ss->assign("description", $detail['description']);
            $ss->assign("count_user", $detail['count_user']);
            $ss->assign("region", $detail['region']);
            $ss->assign("select_region", $region);
            //$ss->assign("html_user_list", $detail['html']);

            echo $ss->fetch('custom/modules/Teams/tpls/TeamManagement.tpl');
            $sv = new SugarView();
            $sv->displayFooter();

            die(); // Don't want to show Listview anymore.     
        }
    }
