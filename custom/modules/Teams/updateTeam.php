<?php
require_once("custom/modules/Teams/_helper.php");

$action = $_POST['act'];
if(empty($action)){
    echo json_encode(array("success" => "0",));   
}else{


    // ******************(^ _ ^)*********************************

    // Update & Create Team
    if ($action == 'save'){
        if(empty($_POST['team_id']))
            $focus = new Team();
        else
            $focus = BeanFactory::getBean('Teams',$_POST['team_id']);

        $focus->name 		= $_POST['team_name'];
        $focus->short_name 	= $_POST['short_name'];
        $focus->code_prefix = $_POST['prefix'];
        $focus->team_type 	= $_POST['team_type'];
        $focus->phone_number= $_POST['phone_number'];
        $focus->parent_id 	= $_POST['parent_id'];
        $focus->parent_name = $_POST['parent_name'];
        $focus->description = $_POST['description'];
        $focus->region     = $_POST['region'];
        $focus->save();

        //add all users of parent to this team - Except Global
        if(empty($_POST['team_id'])){
            $call_back = 'create';

            if($focus->parent_id != '1'){
                $users_parent = getTeamMembers($focus->parent_id);
                for($i = 0; $i < count($users_parent); $i++){
                    $focus->add_user_to_team($users_parent[$i]['user_id']);
                }    
            }

        }
        else{
            $call_back = 'update';
            //Copy users from parent team to this team

            if($focus->parent_id != '1' && $_POST['copyUserFlag'] == 'true'){
                $users_parent = getTeamMembers($focus->parent_id);
                for($i = 0; $i < count($users_parent); $i++){
                    $focus->add_user_to_team($users_parent[$i]['user_id']);
                }    
            }  
        }
        // Add to all record of parent team
        if(!empty($_POST['parent_id'])){
            //list all module to effect this function ($module_name => $table)
            $modify_modules = array("J_Coursefee" => "j_coursefee", "J_Kindofcourse" => "j_kindofcourse", "J_Discount" => "j_discount", "J_Partnership" => "j_partnership", "Reports" => "saved_reports");
            foreach($modify_modules as $key => $value){
                $q1 = "SELECT ".$value.".id id FROM ".$value." 
                WHERE deleted <> 1 AND team_set_id IN (
                SELECT team_set_id FROM team_sets_teams 
                WHERE deleted <> 1 
                AND team_id = '{$_POST['parent_id']}'
                )";
                $rs1 = $GLOBALS['db']->query($q1);

                while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
                    //Load current list team
                    $bean = BeanFactory::getBean($key, $row['id']);
                    $teamSetBean = new TeamSet();
                    $team_set = $teamSetBean->getTeams($bean->team_set_id);
                    $new_team_list = array();
                    foreach ($team_set as $team_id => $team_bean) {
                        $new_team_list[] = $team_id;
                    }
                    $new_team_list[] = $focus->id;
                    //Add new team list
                    $bean->load_relationship('teams');
                    $bean->teams->replace($new_team_list); 
                    $bean->save();
                }    
            }

        }
        echo json_encode(array( 
            "success" => "1",
            "act" => "save",
            "call_back" => $call_back,
            "team_id" => $focus->id,
            "team_name" => $focus->name,
            "team_type" => $focus->team_type,
            "phone_number" => $focus->phone_number,
            "short_name" => $focus->short_name,
            "prefix" => $focus->code_prefix,
            "parent_id" => $focus->parent_id,
            "parent_name" => $focus->parent_name,
            "description" => $focus->description,
            "region" => $focus->region,
        ));
    }
    // Delete Team 
    elseif(!empty($_POST['team_id']) && $action == 'delete'){
        $focus = new Team();
        $focus->retrieve($_POST['team_id']);
        if($focus->has_records_in_modules()) {
            header("Location: index.php?module=Teams&action=ReassignTeams&record={$focus->id}");
        } else {
            //todo: Verify that no items are still assigned to this team.
            if($focus->id == $focus->global_team) {
                $msg = $GLOBALS['app_strings']['LBL_MASSUPDATE_DELETE_GLOBAL_TEAM'];
                $GLOBALS['log']->fatal($msg);
                $error_message = $app_strings['LBL_MASSUPDATE_DELETE_GLOBAL_TEAM'];
                SugarApplication::appendErrorMessage($error_message);
                header('Location: index.php?module=Teams&action=DetailView&record='.$focus->id);
                return;
            }
            //Call mark_deleted function
            $focus->mark_deleted();
            echo json_encode(array(
                "success" => "1",
                "act" => "delete",
            ));
        }
    }else{
        echo json_encode(array("success" => "0",));   
    }
}
?>
