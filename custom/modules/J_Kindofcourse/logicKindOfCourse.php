<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class logicKindOfCourse {
    //before save
    function handleSave($bean, $event, $arguments){
        if($_POST['module'] == $bean->module_name && $_POST['action'] == 'Save'){
            $jsons_level    = array();
            foreach ($_POST["jsons"] as $key => $json){
                if($key>0)    
                    $jsons_level[] = json_decode(html_entity_decode($json));   
            }
            $bean->content = json_encode($jsons_level);
        }
    }
    //after save
    function addTeam($bean, $event, $arguments){
        if($_POST['module'] == $bean->module_name && $_POST['action'] == 'Save'){
            $bean->name = str_replace(' | ', ' - ', $bean->name);
            $team_list = array();
            // Get all team set
            $teamSetBean = new TeamSet();
            $teams = $teamSetBean->getTeams($bean->team_set_id);
            // Add all team set to  $team_list
            foreach ($teams as $key => $value) {
                $team_list[] = $key;
            }
            // Add children of team set to $team_list
            foreach ($teams as $key => $value) {
                // Get children of team
                $q1 = "SELECT id, name, parent_id FROM teams WHERE private <> 1 AND deleted = 0 AND parent_id = '{$key}'";
                $rs1 = $GLOBALS['db']->query($q1);

                while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
                    if (!isset($teams[$row['id']])) $team_list[] = $row['id'];
                    $q2 = "SELECT id, name, parent_id FROM teams WHERE private <> 1 AND deleted = 0 AND parent_id = '{$row['id']}'";
                    $rs2 = $GLOBALS['db']->query($q2);
                    while($row2 = $GLOBALS['db']->fetchByAssoc($rs2))
                        if (!isset($teams[$row['id']])) $team_list[] = $row2['id'];
                }
            }

            if(!empty($team_list)){
                $bean->team_id = $bean->team_id;
                $bean->load_relationship('teams');
                //Add the teams
                $bean->teams->replace($team_list); 
            }
        }    
    }
    ///to mau id va status Quyen.Cao
    function listViewColorKOC(&$bean, $event, $arguments){
        switch ($bean->status) {
            case "Active":
                $bean->status = '<span class="textbg_dream">'.$bean->status.'</span>';
                break;
            case "Inactive":
                $bean->status = '<span class="textbg_crimson">'.$bean->status.'</span>';
                break;
        }   

    }       
}
?>