<?php
    global $timedate;
//    echo $this->query;
    $rs1 = $GLOBALS['db']->query($this->query);
    while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
        $number_week = 0;
        $weeks = 0;
        $rs3 = $GLOBALS['db']->query("SELECT date_start, date_end FROM meetings WHERE id = '{$row['primaryid']}'");
        $row3 = $GLOBALS['db']->fetchByAssoc($rs3);

        $week_date = date('l',strtotime($row3['date_start']));
        $interval = date_diff(date_create($row['l2_end_date']),date_create($row['l2_start_date']));
        $number_week = ceil($interval->days /7 ) +1;
            $interval_2 = date_diff(date_create($row['l2_start_date']),date_create(date('Y-m-d',strtotime('+ 7 hours'. $row3['date_start']))));
    
      //  $interval_2 = date_diff(date_create($row['l2_start_date']),date_create(substr($row3['date_start'],0,10)));
        $weeks = ceil($interval_2->days /7 )+ 1;
        $week_per_total = "$weeks | $number_week";

        $last_ss = $GLOBALS[db]->getOne("SELECT DISTINCT
        IFNULL(meetings.id, '') primaryid
        FROM
        meetings
        INNER JOIN
        c_classes l1 ON meetings.class_id = l1.id
        AND l1.deleted = 0
        WHERE
        (((l1.id = '{$row['l2_id']}')
        AND (meetings.date_start < '{$row3['date_start']}')))
        AND meetings.deleted = 0
        ORDER BY meetings.date_start DESC
        LIMIT 1");
        
        if(!empty($last_ss)){
            $count_last_ss = $GLOBALS['db']->getOne("SELECT DISTINCT
                COUNT(DISTINCT l1.id) l1__count
                FROM
                meetings                                          
                INNER JOIN
                meetings_contacts l1_1 ON meetings.id = l1_1.meeting_id
                AND l1_1.deleted = 0
                INNER JOIN
                contacts l1 ON l1.id = l1_1.contact_id
                AND l1.deleted = 0
                WHERE
                (((meetings.id = '$last_ss')))
                AND meetings.deleted = 0");  
        }
        $count_this_ss = $GLOBALS['db']->getOne("SELECT DISTINCT
            COUNT(DISTINCT l1.id) l1__count
            FROM
            meetings
            INNER JOIN
            meetings_contacts l1_1 ON meetings.id = l1_1.meeting_id
            AND l1_1.deleted = 0
            INNER JOIN
            contacts l1 ON l1.id = l1_1.contact_id
            AND l1.deleted = 0
            WHERE
            (((meetings.id = '{$row['primaryid']}')))
            AND meetings.deleted = 0");


        $time_start_end = $timedate->to_display_date($row3['date_start']).': '.$timedate->to_display_time($row3['date_start']).' - '.$timedate->to_display_time($row3['date_end']);

        $q2 = "UPDATE meetings SET week_date='$week_date', time_start_end='$time_start_end', num_of_student_last_week = '$count_last_ss', num_of_student_this_week = '$count_this_ss', week_per_total = '$week_per_total'  WHERE id='{$row['primaryid']}'";
        $GLOBALS['db']->query($q2);
        $last_ss = $row['primaryid'];
    } 
?>
