<?php
    if(!empty($_POST['team_id']) && !empty($_POST['users_list'])){
        $focus = new Team();
        $focus->retrieve($_POST['team_id']);
        foreach($_POST['users_list'] as $user_id){
            $focus->add_user_to_team($user_id);   
        }
        echo json_encode(array("success" => "1"));   
    }else{
        echo json_encode(array("success" => "0"));  
    }


