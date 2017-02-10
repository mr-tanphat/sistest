<?php
    //add By Lam Hai 17/08/2016
    switch($_POST['type']) {
        case 'check_session': 
            checkSession();
            break;
        case 'check_contract':
            checkContract();
            break;
    }
    die;  
    function checkSession() {
        global $mod_strings, $timedate;
        $sql = "SELECT contract_until 
                FROM j_teachercontract 
                WHERE id = '". $_POST['teacher_contract'] ."'
        ";
        $dateTo = date('Y-m-d H:i:s', strtotime($GLOBALS['db']->getOne($sql)));
        $dateFrom = $_POST['contract_until'];

        $dateFromDB = $timedate->to_db($dateFrom);
        
        
        $sql = "SELECT DISTINCT meetings.`name`
                FROM meetings LEFT JOIN c_rooms c_rooms ON meetings.room_id=c_rooms.id AND c_rooms.deleted=0 AND c_rooms.deleted=0 
                    LEFT JOIN teams tj ON meetings.team_id=tj.id AND tj.deleted=0 AND tj.deleted=0 
                    LEFT JOIN team_sets ts1 ON meetings.team_set_id=ts1.id AND ts1.deleted=0 AND ts1.deleted=0 
                    INNER JOIN c_teachers meetings_rel ON meetings.teacher_id=meetings_rel.id AND meetings_rel.deleted=0
                WHERE meetings.teacher_id='". $_POST['teacher_id'] ."' AND meetings.deleted=0
                    AND meetings.date_start >= '". $dateFromDB ."' AND meetings.date_start <= '". $dateTo ."'
                    AND meetings.session_status <> 'Cancelled' 
                ";
        $result = $GLOBALS['db']->query($sql);        
        $count = $GLOBALS['db']->getRowCount($result);
        $data = array();
        
        while($row = $GLOBALS['db']->fetchByAssoc($result)) {
            $data[] = $row['name'];    
        }      
            
        if($count > 0)
            echo json_encode($data);
        else    
            echo 'false';    
    }
    
    function checkContract() {
        global $mod_strings, $timedate;
        $dateFrom = $_POST['contract_begin'];
        $dateFromDB = $timedate->to_db($dateFrom);
        
        $sql = "SELECT count(*)  
        FROM j_teachercontract t
            INNER JOIN c_teachers_j_teachercontract_1_c tc 
                ON tc.c_teachers_j_teachercontract_1j_teachercontract_idb = t.id AND tc.deleted = 0  
        WHERE t.contract_until >= '". $dateFromDB ."' AND t.contract_date <= '". $dateFromDB ."' AND t.deleted = 0
            AND tc.c_teachers_j_teachercontract_1c_teachers_ida = '". $_POST['teacher_id'] ."'
            AND t.`status` = 'Active'
        ";
        //$result = $GLOBALS['db']->query($sql);        
        $count = $GLOBALS['db']->getOne($sql);
             
        if($count > 0)
            echo 'true';
        else 
            echo 'false';   
    }
?>