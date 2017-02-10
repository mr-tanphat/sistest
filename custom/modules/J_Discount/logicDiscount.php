<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

class logicDiscount {
    //before save
    function handleSaveDiscount(&$bean, $event, $arguments){
        if($_POST['module'] == $bean->module_name && $_POST['action'] == 'Save'){
            //save gift by json
            if($_POST["type"]=="Gift"){
                $result= array();
                for ($i=0; $i<count($_POST['book_id']);$i++){
                    if($_POST['book_id'][$i]!=''){
                        $result[$_POST['book_id'][$i]]=array(
                            'book_name'=> $_POST['book_name'][$i],
                            'qty_book'=> $_POST['qty_book'][$i],  
                        );
                    } 
                }
                $bean->content=json_encode($result);
            }
            // save partnership
            if($_POST["type"]=="Partnership"){
                $sql = "DELETE FROM j_discount_j_partnership_1_c WHERE j_discount_j_partnership_1j_discount_ida='{$bean->id}'";
                $delete =  $GLOBALS['db']->query($sql);
                $bean->load_relationship('j_discount_j_partnership_1');
                $bean->j_discount_j_partnership_1->add(array_filter($_POST["pa_id"]));
            }

            // save "do not apply with" list
            $notApplyList = array();
            foreach ($_POST['check_schema'] as $value){
                if ($value == "Reward" || $value == "Partnership"){
                    if (in_array($value,$notApplyList)) continue;
                }
                $notApplyList[] = $value;
            } 
            $bean->disable_list = json_encode($notApplyList);

            if($bean->type == 'Partnership' ||$bean->type == 'Reward')
                $bean->order_no = 99;

            $bean->assigned_user_id=$GLOBALS['current_user']->id;
        }
    }
    //after save
    function addTeam($bean, $event, $arguments){
        if($_POST['module'] == $bean->module_name && $_POST['action'] == 'Save'){
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
    function listViewColorDiscount(&$bean, $event, $arguments){
        switch ($bean->status) {
            case "Active":
                $bean->status = '<span class="textbg_green">'.$bean->status.'</span>';
                break;
            case "Inactive":
                $bean->status = '<span class="textbg_orange">'.$bean->status.'</span>';
                break;
        } 
    }
}