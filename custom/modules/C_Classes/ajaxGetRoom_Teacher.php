<?php
    require_once('custom/include/_helper/studySchedule.php'); 

    //Get Teacher Option
    $sql = "SELECT teacher_id ,id, last_name, first_name, team_id, salutation, title, phone_mobile, team_set_id FROM c_teachers WHERE deleted = 0"; 
    $result = $GLOBALS['db']->query($sql);
    $count1 = 0;
    $team_id_by_class = $GLOBALS['db']->getOne("SELECT team_id FROM c_classes WHERE id='{$_POST['class_id']}'");
  
    $teacher_option ="<select name='select_teacher' style='width:200px' ><option value=''></option>";
    while($row = $GLOBALS['db']->fetchByAssoc($result)){
        //get Teacher by Team Set Id
        $teamSetBean = new TeamSet();
        $teams = $teamSetBean->getTeams($row['team_set_id']);
        foreach ($teams as $team) {
            if($team->id == $team_id_by_class){
                if(check_teacher_date($row['id'], $_POST['start_date'], $_POST['end_date'], $_POST['weekday'], $_POST['start_time'], $_POST['end_time']))
                {
                    $teacher_option.="<option value='".$row['id']."'>".$row['salutation'].' '.$row['first_name'].' '.$row['last_name']."</option>";
                    $count1++;
                }
            }
        }
    }
    $teacher_option .= "</select>";
    
    //Get Room Option
    $sql = "SELECT name, room_id, id, capacity, location, team_id 
    FROM c_rooms 
    WHERE team_id = '$team_id_by_class' AND deleted = 0";
    $result = $GLOBALS['db']->query($sql);
    $count2 = 0;

    $room_option ="<select name='select_room' style='width:200px' ><option value=''></option>";
    while($row = $GLOBALS['db']->fetchByAssoc($result)){
        if(check_room_date($row['id'], $_POST['start_date'], $_POST['end_date'], $_POST['weekday'], $_POST['start_time'], $_POST['end_time'] ))
        {
            $room_option.="<option value='".$row['id']."'>".$row['name']."</option>";
            $count2++;
        }
    }
    $room_option .= "</select>";

    //Javascript
    $js = <<<EOQ
    <script type="text/javascript">
        $("select[name=select_teacher]").select2({placeholder: "Select Teacher",allowClear: true});    
        $("select[name=select_room]").select2({placeholder: "Select Room",allowClear: true});    
    </script>
EOQ;


    if($count1 == 0){
        echo json_encode(array(
            "success" => "1",     
        ));
    }elseif($count2 == 0){
        echo json_encode(array(
            "success" => "2",       
        ));
    }else{
        echo json_encode(array(
            "success" => "3",
            "teacher_option" => $teacher_option,
            "room_option" => $room_option.$js,        
        ));   
    }
?>
