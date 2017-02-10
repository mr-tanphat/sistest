<?php
// create by leduytan - checkRoom controller
function loadTimeSheet(){
    global $current_user;
    $ss = new Sugar_Smarty();
    $ss->assign("MOD", $GLOBALS['mod_strings']);

    //Get Teacher Option
    $sql = "SELECT teacher_id ,id, last_name, first_name, team_id, salutation, title, phone_mobile, team_set_id FROM c_teachers WHERE deleted = 0"; 
    $result = $GLOBALS['db']->query($sql);

    $teacher_option ="<select multiple name='tmp_teacher_id' id='tmp_teacher_id' ><option value=''></option>";
    while($row = $GLOBALS['db']->fetchByAssoc($result)){
        //get Teacher by Team Set Id
        $teamSetBean = new TeamSet();
        $teams = $teamSetBean->getTeams($row['team_set_id']);
        foreach ($teams as $team) {
            if($team->id == $current_user->team_id){
                $teacher_option.="<option value='".$row['id']."'>".$row['salutation'].' '.$row['last_name'].' '.$row['first_name']."</option>";
            }
        }
    }
    $teacher_option .= "</select>";
    $js = <<<EOQ
    <script>
        $("select[name=tmp_teacher_id]").select2();    
    </script>
EOQ;
    //Get Timesheet on Calendar
    $ext_team = "AND c_timesheet.team_set_id IN
    (SELECT 
    tst.team_set_id
    FROM
    team_sets_teams tst
    INNER JOIN
    team_memberships team_memberships ON tst.team_id = team_memberships.team_id
    AND team_memberships.user_id = '{$current_user->id}'
    AND team_memberships.deleted = 0)";
    if($current_user->isAdmin())
        $ext_team = '';

    $q2 = "SELECT DISTINCT add_date FROM c_timesheet WHERE deleted = 0 AND add_date IS NOT NULL $ext_team"; 
    $rs2 = $GLOBALS['db']->query($q2);
    $js_temp = "";
    while($row2 = $GLOBALS['db']->fetchByAssoc($rs2)){
        $js_temp .= " jQuery('#example1').glDatePicker('setSelectedDate', new Date('{$row2['add_date']}'), 'timesheet'); ";    
    }

    $js2 = <<<EOQ
    <script>
    $( document ).ready(function() {
           $js_temp
        });   
    </script>
EOQ;


    $ss->assign("JAVASCRIPT", $js2);
    $ss->assign("TEACHER_OPTION", $teacher_option.$js);
    $ss->assign("DATE_ADD", $GLOBALS['timedate']->nowDbDate());
    $ss->assign("current_user_name", $current_user->last_name.' '.$current_user->first_name);
    $ss->assign("current_user_id", $current_user->id);
    $ss->assign("current_team_name", $current_user->team_name);
    $ss->assign("current_team_id", $current_user->team_id);
    $ss->assign("TASK_OPTION", get_select_options($GLOBALS['app_list_strings']['timesheet_tasklist_list']));
    $ss->assign("MINUTES_OPTION", get_select_options($GLOBALS['app_list_strings']['timesheet_minutes_list']));


    return $ss->fetch('custom/modules/C_Timesheet/tpls/timesheet.tpl'); 

}  
echo  loadTimeSheet();