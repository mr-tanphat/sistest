<?php
    if($_POST['act'] == 'add_user'){
        if(!empty($_POST['team_list']) && !empty($_POST['users_list'])){

            foreach ($_POST['team_list'] as $team_id){
                foreach($_POST['users_list'] as $user_id){
                    $focus = new Team();
                    $focus->retrieve($team_id);
                    $focus->add_user_to_team($user_id);   
                } 
            }

            echo json_encode(array("success" => "1"));   
        }else{
            echo json_encode(array("success" => "0"));  
        }   
    }elseif($_POST['act'] == 'remove_user'){

        if(!empty($_POST['team_list']) && !empty($_POST['user_id'])){

            foreach ($_POST['team_list'] as $team_id){
                $focus = new Team();
                $focus->retrieve($team_id);
                $focus->remove_user_from_team($_POST['user_id']);   
            }

            echo json_encode(array("success" => "1"));   
        }else{
            echo json_encode(array("success" => "0"));  
        } 

    }elseif($_POST['act'] == 'update_role_team'){

        if(!empty($_POST['user_id']) && !empty($_POST['primary_team_id'])){
            $user = new User();
            $user->retrieve($_POST['user_id']);
            if($user->is_admin != '1'){
                //remove user from current roles
                $sql = "UPDATE acl_roles_users SET deleted='1', date_modified='{$GLOBALS['timedate']->nowDb()}' WHERE user_id='{$_POST['user_id']}'";
                $GLOBALS['db']->query($sql);
                if(!empty($_POST['roles']))   
                    foreach ($_POST['roles'] as $role_id){
                        $focus = new ACLRole();
                        $focus->retrieve($role_id);
                        $focus->set_relationship('acl_roles_users', array('role_id'=>$focus->id ,'user_id'=>$_POST['user_id']), false);   
                }
            }

            //update Defaut Team
            $user->retrieve($_POST['user_id']);
            $user->team_id      = $_POST['primary_team_id'];
            $user->status      = $_POST['status'];
            $user->team_set_id  = $_POST['primary_team_id'];
            $user->save(); 

            echo json_encode(array("success" => "1"));   
        }else{
            echo json_encode(array("success" => "0"));  
        }
    }



