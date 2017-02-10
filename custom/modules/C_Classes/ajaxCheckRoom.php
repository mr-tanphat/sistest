<?php
    require_once('custom/include/_helper/studySchedule.php');

    global $db, $current_user;
    $stt = 1;
    $sql = "SELECT name, room_id, id, capacity, location, team_id, team_set_id 
    FROM c_rooms 
    WHERE deleted = '0'";

    $result = $db->query($sql);

    $html = "<div class='page-header'nowrap>
    <h1>Result: </h1>
    </div>";
    $html .= "<table width='100%' style='border:solid 1px #cccccc;' class='table' id='celebs'>";

    $html .= "<thead><tr>
    <th width='30px' style='text-align: center;'> </th>  
    <th>".translate('LBL_ID','C_Rooms')."</th>        
    <th>".translate('LBL_NAME','C_Rooms')."</th>        
    <th>".translate('LBL_CAPACITY','C_Rooms')."</th>    
    <th>".translate('LBL_LOCATION','C_Rooms')."</th>
    <th>".translate('LBL_CENTER','C_Classes')."</th>    
    </tr></thead>
    <tbody>";

    while($row = $db->fetchByAssoc($result)){
        //get Teacher by Team Set Id
        $teamSetBean = new TeamSet();
        $teams = $teamSetBean->getTeams($row['team_set_id']);
        foreach ($teams as $team) {
            if($team->id == $current_user->team_id){
                if(check_room_range($row['id'], $_POST['start_date'], $_POST['end_date'], $_POST['weekday'], $_POST['start_time'], $_POST['end_time'] ))
                {                                     
                    $sql = "SELECT name FROM teams WHERE private <> '1' AND id = '{$row['team_id']}'";
                    $team_name = $GLOBALS['db']->getOne($sql);            
                    $html .="
                    <tr id='{$row['id']}'>
                    <td>{$stt}</td>
                    <td>{$row['room_id']}</td>
                    <td>{$row['name']}</td>            
                    <td>{$row['capacity']}</td>
                    <td>{$row['location']}</td>
                    <td>{$team_name}</td>
                    </tr>";
                    $stt++;
                }   
            }
        }

    }
    $html.= "</tbody></table>";

    $js = "
    <script>
    $(document).ready(function() {
    var table = $('#celebs');
    var oTable = table.dataTable({sPaginationType: 'full_numbers', bStateSave: true, oLanguage:{
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
