<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class ViewConfigNewsale  extends SugarView{
        function ViewConfigNewsale() {
            parent::display();
        }

        function display() {
            $ss = new Sugar_Smarty();
            $ss->assign("MOD", $GLOBALS['mod_strings']);

            $sql_team  = "SELECT id, name, team_type 
            FROM teams 
            WHERE deleted = 0 AND private = 0
            AND id NOT IN(SELECT parent_id FROM teams WHERE deleted = 0 AND (parent_id != '' OR !ISNULL(parent_id)))"; 
            $result = $GLOBALS['db']->query($sql_team); 
            $html = '<select multiple class="choose_team" name=\'choose_team[]\' id=\'choose_team\'>';
            while($choose_team = $GLOBALS['db']->fetchByAssoc($result))
            {     
                $html.= '<option value="'.$choose_team['id'].'">'.$choose_team['name']."(".$choose_team['team_type'].")".'</option>';
            }
            $html .= '</select>';
            $ss->assign("LBL_CONFIG_TITLE",$GLOBALS['mod_strings']['LBL_SET_NEW_SALE']);
            $ss->assign("target_type","New Sale");
            $ss->assign("html",$html);
            $ss->assign("year_list_options",get_select_options_with_id($GLOBALS['app_list_strings']['year_targetconfig_list'],date('Y')));
            $ss->display('custom/modules/J_Targetconfig/tpls/targetDisplay.tpl');
        }
    }
