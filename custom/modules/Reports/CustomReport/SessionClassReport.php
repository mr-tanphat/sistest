<?php
    //Add By Lam Hai
    $ss = new Sugar_Smarty();
    global $app_list_strings, $mod_strings, $current_language, $current_user;
    $filter = str_replace("\n","", $this->where);
    $parts = explode("AND", $filter);

    for($i = 0; $i < count($parts); $i++){
        if(strpos($parts[$i], "l2.id=") !== FALSE){
            $centerID[] = get_string_between($parts[$i]);
        }

        if(strpos($parts[$i], "l1.date_start>=") !== FALSE){
            $startDate = get_string_between($parts[$i]);
            $startDate = str_replace("00:00:00","",$startDate);
        }
        if(strpos($parts[$i], "l1.date_start<=") !== FALSE){
            $endDate = get_string_between($parts[$i]);
            $endDate = str_replace("23:59:59","",$endDate);
        }
        if(strpos($parts[$i], "l1.lesson_number") !== FALSE){
            /*$lessionNumber = get_string_between($parts[$i]);
            $lessionNumber = strstr($parts[$i], 'lesson_number');
            $lessionNumber = preg_replace('/\D+/', '', $lessionNumber); */
            $lessionNumber = strstr($parts[$i], 'lesson_number');
            $lessionNumber = str_replace('lesson_number', '', $lessionNumber);
            $lessionNumber = str_replace(')', '', $lessionNumber);
            if(isset($lessionNumber))
                $lessionNumber = '';
        }
        if(strpos($parts[$i], "l1.not_start_session") !== FALSE){
            $notStartLesson = strstr($parts[$i], 'not_start_session');
            $notStartLesson = str_replace('not_start_session', '', $notStartLesson);
            $notStartLesson = str_replace(')', '', $notStartLesson);
            if(isset($notStartLesson))
                $notStartLesson = '';
        }
    }

    if(!isset($centerID)) {
        $sqlGetCenter = "SELECT id, name, parent_id, description FROM teams WHERE teams.private <> 1 AND teams.deleted <> 1";

        if(!is_admin($current_user)){
            $sqlGetCenter .= "AND teams.id IN
            (SELECT tst.team_set_id
            FROM team_sets_teams tst
            INNER JOIN
            team_memberships team_memberships ON tst.team_id = team_memberships.team_id
            AND team_memberships.user_id = '{$current_user->id}'
            AND team_memberships.deleted = 0)";
        }

    $result = $GLOBALS['db']->query($sqlGetCenter);
        $centerID = array();

        while($row = $GLOBALS['db']->fetchByAssoc($result)) {
            $centerID[] = $row['id'];
        }
    }
    $modStrings = return_module_language($current_language, 'Reports', true);
    $showData = '';
    $i = 1;
    $dataReport = getDataSessionClassReport($startDate, $endDate, $centerID, $lessionNumber, $notStartLesson);

    foreach ($dataReport as $key => $value) {
        $showData .= '  <tr>
                            <td>'. $i ++ .'</td>
                            <td>'. $dataReport[$key]['subject'] .'</td>
                            <td>'. $dataReport[$key]['lesson_number'] .'</td>
                            <td>'. $dataReport[$key]['till_hour'] .'</td>
                            <td>'. $dataReport[$key]['session_status'] .'</td>
                            <td>'. $dataReport[$key]['week_date'] .'</td>
                            <td>'. $dataReport[$key]['date_start'] .'</td>
                            <td>'. $dataReport[$key]['date_end'] .'</td>
                            <td>'. $dataReport[$key]['duration_cal'] .'</td>
                            <td>'. $dataReport[$key]['number_of_student'] .'</td>
                            <td>'. $dataReport[$key]['attended'] .'</td>
                            <td>'. $dataReport[$key]['teacher_name'] .'</td>
                            <td>'. $app_list_strings['teaching_type_options'][$dataReport[$key]['teaching_type']] .'</td>
                            <td>'. $dataReport[$key]['change_teacher_reason'] .'</td>
                        </tr>';
    }

    $ss->assign('MOD', $modStrings);
    $ss->assign('DATA', $showData);
    $ss->display('custom/modules/Reports/tpls/SessionClass.tpl');
    //End
    function getDataSessionClassReport($dateFrom, $dateTo, $centerID, $sessionClosed, $sessionNotStart) {
        global $timedate, $current_user, $sugar_config;

        $dateNow = $timedate->nowDb();

        /*if(strtotime($dateFrom) >= strtotime($dateNow))
            $date = $dateFrom ;
        else {
            if(strtotime($dateTo) <= strtotime($dateNow))
                $date = $dateTo;
            else
                $date = $dateNow;
        }
        $sql2 = "AND m2.date_start <= '". $dateNow ."'";

        $sql = "SELECT meetings.ju_class_id, COUNT(meetings.id) session, IFNULL(temp.session_closed, 0) session_closed, COUNT(meetings.id) - IFNULL(temp.session_closed, 0) as session_not_start
            FROM meetings
            INNER JOIN j_class ju_meetings_rel ON meetings.ju_class_id=ju_meetings_rel.id AND ju_meetings_rel.deleted=0
            LEFT JOIN
                (SELECT m2.ju_class_id, COUNT(m2.id) session_closed
                FROM meetings m2
                WHERE m2.deleted = 0 AND m2.meeting_type = 'Session' AND m2.date_start <= '". $date ."' AND m2.date_start >= '". $dateFrom ."'
                GROUP BY m2.ju_class_id
                ) temp ON meetings.ju_class_id = temp.ju_class_id
            WHERE meetings.deleted=0 AND ju_meetings_rel.team_id = '". $centerID ."'
            AND meetings.meeting_type = 'Session'
            AND meetings.date_start >= '". $dateFrom ."' AND meetings.date_start <= '". $dateTo ."'
            GROUP BY meetings.ju_class_id
        ";

        if($sessionClosed != '') {
            $sql .= "HAVING session_closed ". $sessionClosed;
            if($sessionNotStart != '')
                $sql .= " AND session_not_start ". $sessionNotStart;
        }
        else {
            if($sessionNotStart != '')
                $sql .= "HAVING session_not_start ". $sessionNotStart;
        } */

        $sql = "
        SELECT DISTINCT meetings.ju_class_id
        FROM meetings
        INNER JOIN j_class ju_meetings_rel ON meetings.ju_class_id=ju_meetings_rel.id AND ju_meetings_rel.deleted=0
        INNER JOIN
        (SELECT  distinct l1.id classID, COUNT(m2.id) total_session
        FROM j_class l1
        INNER JOIN meetings m2 ON m2.ju_class_id = l1.id AND m2.deleted = 0
        WHERE l1.deleted = 0
        GROUP BY classID ) temp ON temp.classID = ju_meetings_rel.id
        WHERE meetings.deleted=0 AND ju_meetings_rel.team_id IN ('". implode("','", $centerID) ."')
        AND meetings.meeting_type = 'Session' AND meetings.`status` <> 'Cancelled'
        AND meetings.date_start >= '". $dateFrom ."' AND meetings.date_start <= '". $dateTo ."'
        ";

        if($sessionClosed != '') {
            $sql .= "AND meetings.lesson_number ". $sessionClosed ." AND meetings.date_end <= '". $dateNow ."'";
            if($sessionNotStart != '')
                $sql .= " AND (total_session - m1.lesson_number) ". $sessionNotStart ." AND meetings.date_end <= '". $dateNow ."'";
        }
        else {
            if($sessionNotStart != '')
                $sql .= " AND (total_session - m1.lesson_number) ". $sessionNotStart ." AND meetings.date_end <= '". $dateNow ."'";
        }

        $result = $GLOBALS['db']->query($sql);
        $classList = array();

        while($row = $GLOBALS['db']->fetchByAssoc($result)) {
            $classList[] = $row['ju_class_id'];
            //$classList[$row['ju_class_id']]['id'] = $row['ju_class_id'];
            //$classList[$row['ju_class_id']]['total_session'] = $row['session'];
            //$classList[$row['ju_class_id']]['session_closed'] = $row['session_closed'];
            //$classList[$row['ju_class_id']]['session_not_start'] = $row['session_not_start'];
        }

        $sql3 = "SELECT meetings.id, meetings.name, meetings.lesson_number, meetings.till_hour,
                meetings.session_status, meetings.week_date, meetings.date_start, meetings.date_end,
                meetings.duration_cal, meetings.attended,
                meetings.teaching_type, meetings.change_teacher_reason, meetings.type_of_class,
                COUNT(meetings_contacts.id) num_of_student, COUNT(l1.id) taker,
                CONCAT(c_teachers.last_name,' ',c_teachers.first_name) teacher_name
            FROM meetings
                INNER JOIN j_class ju_meetings_rel ON meetings.ju_class_id=ju_meetings_rel.id AND ju_meetings_rel.deleted=0
                LEFT JOIN meetings_contacts ON meetings.id = meetings_contacts.meeting_id AND meetings_contacts.deleted = 0
                LEFT JOIN contacts ON contacts.id = meetings_contacts.contact_id AND contacts.deleted = 0
                LEFT JOIN c_attendance l1 ON meetings.id = l1.meeting_id AND l1.deleted = 0 AND(l1.attended LIKE 'on' OR l1.attended = '1')
                LEFT JOIN c_teachers c_teachers ON meetings.teacher_id=c_teachers.id AND c_teachers.deleted=0 AND c_teachers.deleted=0
            WHERE meetings.deleted=0 AND ju_meetings_rel.id IN ('". implode("','", $classList) ."')
                AND meetings.date_start >= '". $dateFrom ."' AND meetings.date_start <= '". $dateTo ."'
                AND meetings.`status` <> 'Cancelled'
            GROUP BY meetings.id
            ORDER BY meetings.`name` asc, meetings.lesson_number asc, meetings.date_start asc";
        $result2 = $GLOBALS['db']->query($sql3);
        $data = array();

        while($row2 = $GLOBALS['db']->fetchByAssoc($result2)) {

            if ( $dateNow < $row2['date_start'] ) {
                $sessionStatus = "Not started";
            } else if ($dateNow >= $row2['date_start'] && $dateNow <= $row2['date_end']){
                $sessionStatus = "In progress";
            } else if ($dateNow > $date_end){
                $sessionStatus = "Finished";
            }

            $data[$row2['id']]['subject'] = $row2['name'];
            $data[$row2['id']]['lesson_number'] = $row2['lesson_number'];
            $data[$row2['id']]['till_hour'] = $row2['till_hour'];
            $data[$row2['id']]['session_status'] = $sessionStatus;
            $data[$row2['id']]['week_date'] = date('l',strtotime($row2['date_end']));;
            $data[$row2['id']]['date_start'] = $timedate->to_display_date_time($row2['date_start']);
            $data[$row2['id']]['date_end'] = $timedate->to_display_date_time($row2['date_end']);
            $data[$row2['id']]['duration_cal'] = $row2['duration_cal'];
            $data[$row2['id']]['number_of_student'] = $row2['num_of_student'];
            $data[$row2['id']]['attended'] = $row2['taker'];
            $data[$row2['id']]['teaching_type'] = $row2['teaching_type'];
            $data[$row2['id']]['change_teacher_reason'] = $row2['change_teacher_reason'];
            $data[$row2['id']]['type_of_class'] = $row2['type_of_class'];
            $data[$row2['id']]['teacher_name'] = $row2['teacher_name'];
        }
        return $data;
    }
    //end
?>


