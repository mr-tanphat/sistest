<?php
    require_once('custom/include/_helper/studySchedule.php');
    require_once('modules/Teams/TeamSet.php');

    global $db, $current_user, $timedate;
    $stt = 1;
    $sql = "SELECT teacher_id ,id, last_name, first_name, team_id, team_set_id, salutation, title, phone_mobile 
    FROM c_teachers 
    WHERE deleted = '0'";

    $result = $db->query($sql);

    $html = "<div class='page-header'nowrap>
    <h1>Result: </h1>
    </div>";
    $html .= "<table width='100%' style='border:solid 1px #cccccc;' class='table' id='celebs'>";

    $html .= "<thead><tr>
    <th width='30px' style='text-align: center;'> </th>

    <th>".translate('LBL_NAME','C_Teachers')."</th>

    <th>".translate('LBL_TITLE','C_Teachers')."</th>
    <th>".translate('LBL_MOBILE_PHONE','C_Teachers')."</th>
    <th>".translate('LBL_CONTRACT_DATE','C_Teachers')."</th>
    <th style='text-align: center;'>".translate('LBL_CONTRACT_UNTIL','C_Teachers')."</th>
    <th>".translate('LBL_SESSION_LIST','C_Classes')."</th>
    <th>".translate('LBL_AVAIABLE_CENTER','C_Classes')."</th>

    </tr></thead>
    <tbody>";

    while($row = $db->fetchByAssoc($result)){
        //get Teacher by Team Set Id
        $teamSetBean = new TeamSet();
        $teams = $teamSetBean->getTeams($row['team_set_id']);
        $team_name = '';
        foreach ($teams as $team) {

            if($team->id == $current_user->team_id){                                    
                $teamSetBean = new TeamSet();
                $teams = $teamSetBean->getTeams($row['team_set_id']);
                foreach ($teams as $team) {
                    $team_name .= $team->name.'<br>';
                }            
                $tea = BeanFactory::getBean('C_Teachers',$row['id']);
                $html .="
                <tr id='{$row['id']}'>
                <td>{$stt}</td>
                <td><a target='_blank' style='text-decoration: none;' href='index.php?module=C_Teachers&amp;offset=2&amp;stamp=1409974088061426500&amp;return_module=C_Teachers&amp;action=DetailView&amp;record={$row['id']}'>".$row['salutation'].' '.$row['first_name'].' '.$row['last_name']."</a></td>
                <td>{$row['title']}</td>
                <td>{$row['phone_mobile']}</td>
                <td>{$tea->contract_date}</td>";
                if(empty($tea->contract_until))
                    $html .= "<td style='color:red; text-align:center;'> <b>null</b></td>";
                else{
                    $date_until = new DateTime($timedate->to_db_date($tea->contract_until,false));
                    $today      = new DateTime($timedate->nowDbDate());
                    $interval = $today->diff($date_until);; 

                    if($interval->invert == 1)
                        $html .= "<td style='color:red; text-align:center;'><b>{$tea->contract_until}, {$interval->days} days ago</b></td>";
                    else 
                        $html .= "<td style='text-align:center;'>{$tea->contract_until}, {$interval->days} days remain</td>";   
                }
                $session_list_html = '';
                $session_list = get_list_teaching_session($row['id'], $_POST['start_date'], $_POST['end_date'], $_POST['weekday'], $_POST['start_time'], $_POST['end_time']);
                foreach($session_list as $key=> $value){
                 $session_list_html .= "<a target='_blank' style='text-decoration: none;' href='index.php?module=Meetings&action=DetailView&record=$key'>$value</a><br>";   
                }
                
                $html .= "
                <td>$session_list_html</td>
                <td>$team_name</td>
                </tr>";
                $stt++;
            }
        }
    }
    $html.= "</tbody></table>";

    $js = "
    <script>
    $(document).ready(function() {
    var table = $('#celebs');
    var oTable = table.dataTable({sPaginationType: 'full_numbers', bStateSave: true, iDisplayLength: 100, oLanguage:{
    sLengthMenu: '".$GLOBALS['app_strings']['LBL_JDATATABLE1']."_MENU_".$GLOBALS['app_strings']['LBL_JDATATABLE2']."',
    sZeroRecords: '".$GLOBALS['app_strings']['LBL_JDATATABLE13']."',
    sInfo: '".$GLOBALS['app_strings']['LBL_JDATATABLE6']."_START_".$GLOBALS['app_strings']['LBL_JDATATABLE7']."_END_".$GLOBALS['app_strings']['LBL_JDATATABLE8']."_TOTAL_".$GLOBALS['app_strings']['LBL_JDATATABLE2']."',
    sInfoEmpty: '".$GLOBALS['app_strings']['LBL_JDATATABLE15']."',
    sEmptyTable: '".$GLOBALS['app_strings']['LBL_JDATATABLE14']."',
    sInfoFiltered: '',
    oPaginate: {
    sFirst: '".$GLOBALS['app_strings']['LBL_JDATATABLE9']."',
    sNext: '".$GLOBALS['app_strings']['LBL_JDATATABLE10']."',
    sPrevious: '".$GLOBALS['app_strings']['LBL_JDATATABLE11']."',
    sLast: '".$GLOBALS['app_strings']['LBL_JDATATABLE12']."',
    },
    iTabIndex: 1,
    sSearch: '".$GLOBALS['app_strings']['LBL_JDATATABLE3']."'
    },}); 
    }); 
    </script>";

    echo json_encode(array(
        "success" => "1",
        "html" => $html.$js,
    ));       
