<?php
global $timedate;

$filter = $this->where;
$parts = explode("AND", $filter);


for($i = 0; $i < count($parts); $i++){
    if(strpos($parts[$i], "meetings.date_start>='") !== FALSE) $start_date = get_string_between($parts[$i]);
    if(strpos($parts[$i], "meetings.date_start<='") !== FALSE) $end_date     = get_string_between($parts[$i]);
    if(strpos($parts[$i], "l2.id='") !== FALSE) $team_id = get_string_between($parts[$i]);
    if(strpos($parts[$i], "meetings.date_start='") !== FALSE){
        $start_date = get_string_between($parts[$i]);
        $end_date   = $start_date;
    }
}
$p_start_date   = date('Y-m-d', strtotime("+7 hours ".$start_date));
$p_end_date     = date('Y-m-d', strtotime("+7 hours ".$end_date));
$daysdiffernce  = date_diff(date_create($p_start_date),date_create($p_end_date));
$diff           = abs($daysdiffernce->format("%a")) + 1;
$l_start_date   = date('Y-m-d', strtotime("-$diff day".$p_start_date));
$l_end_date     = date('Y-m-d', strtotime("-$diff day".$p_end_date));

echo '<b>This Period: </b> '. date('d/m', strtotime($p_start_date)).' ➜ '.date('d/m', strtotime($p_end_date)).'   &nbsp;&nbsp;&nbsp;'."\n";
echo '<b>Last Period: </b> '. date('d/m', strtotime($l_start_date)).' ➜ '.date('d/m', strtotime($l_end_date)).'<br style="mso-data-placement:same-cell;"/>';

$class_list         = array();
$upgrade_list       = array();
$koc_list           = array();
$rows    = $GLOBALS['db']->fetchArray($this->query);
foreach( $rows as $key => $row){
    if(!in_array($row['l1_id'], array_keys($class_list)) ){
        $koc_list[$row['l1_kind_of_course']]       += 1;
        $class_list[$row['l1_id']]['class_id']      = $row['l1_id'];
        $class_list[$row['l1_id']]['koc']           = $row['l1_kind_of_course'];
        $class_list[$row['l1_id']]['module']       = $row['l1_modules'];
        $class_list[$row['l1_id']]['koclevel']      = $row['l1_kind_of_course'].' '.$row['l1_level'];
        $class_list[$row['l1_id']]['class_name']    = $row['l1_name'];
        $class_list[$row['l1_id']]['class_code']    = $row['l1_class_code'];
        $class_list[$row['l1_id']]['ec_in_charge']  = $row['l3_full_user_name'];
        $class_list[$row['l1_id']]['status']        = $row['l1_status'];
        $class_list[$row['l1_id']]['last_ss_id']    = $row['primaryid'];
        $class_list[$row['l1_id']]['last_ss_time']  = $row['meetings_date_start'];
        $class_list[$row['l1_id']]['last_ss_lesson']= $row['meetings_lesson_number'];
        $class_list[$row['l1_id']]['last_ss_id']            = $row['primaryid'];
        $class_list[$row['l1_id']]['upgrade_to_class_id']   = $row['l5_id'];
        $class_list[$row['l1_id']]['upgrade_to_class_name'] = $row['l5_name'];
        $class_list[$row['l1_id']]['upgrade_to_date']       = !empty($row['l5_date_entered']) ? $timedate->to_display_date_time($row['l5_date_entered']) : '';
        if(!empty($class_list[$row['l1_id']]['upgrade_to_class_id']))
            $upgrade_list[$row['l1_id']] = $class_list[$row['l1_id']]['upgrade_to_class_id'];
    }
    $class_list[$row['l1_id']]['hour_learned'] += $row['meetings_delivery_hour'];
    $class_list[$row['l1_id']]['lesson_per_week'] += 1;

    $this_start = strtotime('+ 7hour '.$row['meetings_date_start']);
    $this_end   = strtotime('+ 7hour '.$row['meetings_date_end']);
    $week_date  = date('D',$this_start);
    $time       = $week_date.": ".date('g:i',$this_start).'-'.date('g:ia',$this_end);


    if(strpos($class_list[$row['l1_id']]['schedule'], $time) === false){
        $class_list[$row['l1_id']]['schedule'] .= $time."<br style=\"mso-data-placement:same-cell;\"/> "."\n";
    }
    if(!empty(trim($row['l4_full_teacher_name'])) && strpos($class_list[$row['l1_id']]['teacher'], $row['l4_full_teacher_name']) === false)
        $class_list[$row['l1_id']]['teacher']       .= $row['l4_full_teacher_name']."($week_date)"."<br style=\"mso-data-placement:same-cell;\"/> "."\n";
}

$q2 = "SELECT DISTINCT
IFNULL(meetings.id, '') primaryid,
IFNULL(l1.id, '') class_id,
meetings.date_start date_start,
meetings.lesson_number lesson_number,
meetings.delivery_hour delivery_hour
FROM
meetings
INNER JOIN
j_class l1 ON meetings.ju_class_id = l1.id
AND l1.deleted = 0
WHERE
(((l1.id IN ('".implode("','",array_keys($class_list))."')  )
AND (meetings.session_status <> 'Cancelled')))
AND meetings.deleted = 0
ORDER BY class_id, date_start ASC";
$rs2 = $GLOBALS['db']->query($q2);
$ssClass = array();
$cr_class = '';
while($ss = $GLOBALS['db']->fetchByAssoc($rs2) ){
    if($ss['class_id'] != $cr_class){
        $cr_class = $ss['class_id'];
        $key = 0;
    }
    $ssClass[$cr_class][$key]['primaryid']       = $ss['primaryid'];
    $ssClass[$cr_class][$key]['date_start']      = $ss['date_start'];
    $ssClass[$cr_class][$key]['lesson_number']   = $ss['lesson_number'];
    $ssClass[$cr_class][$key]['delivery_hour']   = $ss['delivery_hour'];
    $key++;
}
foreach ($class_list as $class_id => $class_obj) {

    //get sessions
    $arr = array();
    $ssList = $ssClass[$class_id];
    $class_list[$class_id]['total_lesson'] = count($ssList);
    $sum_hour = 0;
    $flag_point1 = true;
    $flag_point2 = true;
    $flag_point3 = true;
    $set_start_point_2 = true;
    $set_start_point_3 = true;
    for($i = 0; $i < count($ssList); $i++) {

        $date_start_int = date('Y-m-d', strtotime("+7 hours ".$ssList[$i]['date_start']));
        if($date_start_int != $last_date_start_int)
            $delivery_hour = $ssList[$i]['delivery_hour'];
        else $delivery_hour += $ssList[$i]['delivery_hour'];

        $arr[$date_start_int]  = $delivery_hour;

        $sum_hour += $ssList[$i]['delivery_hour'];
        //Chia cac moc thoi gian
        if($sum_hour > 36 && $set_start_point_2){
            $start_p_2 = $timedate->to_display_date($date_start_int);
            $set_start_point_2 = false;
        }
        if($sum_hour > 72 && $set_start_point_3){
            $start_p_3 = $timedate->to_display_date($date_start_int);
            $set_start_point_3 = false;
        }

        if($sum_hour >= 36 && $flag_point1){
            $class_list[$class_id]['f36_start']     = $timedate->to_display_date($ssList[0]['date_start']);
            $class_list[$class_id]['f36_finish']    = $timedate->to_display_date($date_start_int);
            $flag_point1 = false;
            $endpoint1 = $date_start_int;
        }elseif($sum_hour >= 72 && $flag_point2){
            $class_list[$class_id]['m36_start']     = $start_p_2;
            $class_list[$class_id]['m36_finish']    = $timedate->to_display_date($date_start_int);
            $flag_point2 = false;
            $endpoint2 = $date_start_int;
        }elseif($sum_hour >= 108 && $flag_point3){
            $class_list[$class_id]['l36_start']     = $start_p_3;
            $class_list[$class_id]['l36_finish']    = $timedate->to_display_date($date_start_int);
            $flag_point3 = false;
        }
        $last_date_start_int = $date_start_int;
    }
}

$l_paid         = get_count_payment_paid(array_keys($class_list), $l_start_date, $l_end_date);
$l_sponsor20    = get_count_payment_paid(array_keys($class_list), $l_start_date, $l_end_date,20);
$l_sponsor100   = get_count_payment_paid(array_keys($class_list), $l_start_date, $l_end_date,100);
$l_unpaid       = get_count_payment_unpaid(array_keys($class_list), $l_start_date, $l_end_date);

$p_paid         = get_count_payment_paid(array_keys($class_list), $p_start_date, $p_end_date);
$p_sponsor20    = get_count_payment_paid(array_keys($class_list), $p_start_date, $p_end_date,20);
$p_sponsor100   = get_count_payment_paid(array_keys($class_list), $p_start_date, $p_end_date,100);
$p_unpaid       = get_count_payment_unpaid(array_keys($class_list), $p_start_date, $p_end_date);
if(count($upgrade_list) > 0)
    $u_paid         = get_count_payment_paid(array_values($upgrade_list), '', '', 'Upgrade');
foreach ($class_list as $class_id => $class_obj) {
    $class_list[$class_id]['l_paid']        = $l_paid[$class_id];
    $class_list[$class_id]['l_sponsor20']   = $l_sponsor20[$class_id];
    $class_list[$class_id]['l_sponsor100']  = $l_sponsor100[$class_id];
    $class_list[$class_id]['l_unpaid']      = $l_unpaid[$class_id];
    $class_list[$class_id]['l_total']       = $l_paid[$class_id] + $l_sponsor20[$class_id] + $l_sponsor100[$class_id] + $l_unpaid[$class_id];
    $class_list[$class_id]['l_acs']         = $class_list[$class_id]['l_total'] - $l_unpaid[$class_id] - $l_sponsor100[$class_id];

    $class_list[$class_id]['p_paid']        = $p_paid[$class_id];
    $class_list[$class_id]['p_sponsor20']   = $p_sponsor20[$class_id];
    $class_list[$class_id]['p_sponsor100']  = $p_sponsor100[$class_id];
    $class_list[$class_id]['p_unpaid']      = $p_unpaid[$class_id];
    $class_list[$class_id]['p_total']       = $p_paid[$class_id] + $p_sponsor20[$class_id] + $p_sponsor100[$class_id] + $p_unpaid[$class_id];
    $class_list[$class_id]['p_acs']         = $class_list[$class_id]['p_total'] - $p_unpaid[$class_id] - $p_sponsor100[$class_id];

    $class_list[$class_id]['u_paid']        = $u_paid[$upgrade_list[$class_id]];

    $class_list[$class_id] = array_map(function($value) {
        return $value === NULL ? 0 : $value;
        }, $class_list[$class_id]); // array_map should walk through $array
}

$kocc_list = array();
$html = '<table width="100%" border="0" cellpadding="0" cellspacing="0" class="reportlistView"><tbody>';
foreach ($class_list as $class_id => $val) {
    $kocc_list[$val['koc']] += 1;
    if($kocc_list[$val['koc']] == 1){
        $html .= get_table_head($val['koc']);
        $no = 1;
        $l_paidt    = 0;
        $l_unpaidt = 0;
        $l_sponsor20t    = 0;
        $l_sponsor100t   = 0;
        $l_totalt        = 0;
        $p_paidt    = 0;
        $p_unpaidt = 0;
        $p_sponsor20t = 0;
        $p_sponsor100t = 0;
        $p_totalt = 0;
        $l_acst= 0;
        $p_acst= 0;
    }
    $html .= "<tr><td valign='TOP' class='oddListRowS1'>$no</td>";
    $html .= "<td valign='TOP' class='oddListRowS1'>{$val['koclevel']}</td>";
    $html .= "<td valign='TOP' class='oddListRowS1'>".'<a href=index.php?module=J_Class&offset=1&stamp=1441785563066827100&return_module=J_Class&action=DetailView&record='.$val['class_id'].' target=_blank>'.$val['class_name'].'</a>'."</td>";
    $html .= "<td valign='TOP' class='oddListRowS1'>{$val['class_code']}</td>";
    $html .= "<td valign='TOP' class='oddListRowS1'>{$val['status']}</td>";
    $html .= "<td valign='TOP' class='oddListRowS1'>{$val['ec_in_charge']}</td>";
    $html .= "<td valign='TOP' style='mso-number-format:\@;' class='oddListRowS1'>{$val['schedule']}</td>";
    $html .= "<td valign='TOP' style='mso-number-format:\@;text-align: center;' class='oddListRowS1'>".$val['last_ss_lesson'] .'/'.$val['total_lesson']."</td>";
    $html .= "<td valign='TOP' style='text-align: center;' class='oddListRowS1'>".format_number($val['hour_learned'],2,2)."</td>";
    $html .= "<td valign='TOP' style='text-align: center;' class='oddListRowS1'>{$val['lesson_per_week']}</td>";
    if($val['koc'] == 'Teens' && $val['module'] == 'B'){
        $html .= "<td valign='TOP' style='mso-number-format:\"dd/mm/yyyy\";text-align: left;' class='oddListRowS1'> </td>";
        $html .= "<td valign='TOP' style='mso-number-format:\"dd/mm/yyyy\";text-align: left;' class='oddListRowS1'> </td>";
        $html .= "<td valign='TOP' style='mso-number-format:\"dd/mm/yyyy\";text-align: left;' class='oddListRowS1'> </td>";
        $html .= "<td valign='TOP' style='mso-number-format:\"dd/mm/yyyy\";text-align: left;' class='oddListRowS1'> </td>";
        $html .= "<td valign='TOP' style='mso-number-format:\"dd/mm/yyyy\";text-align: left;' class='oddListRowS1'>{$val['f36_start']}</td>";
        $html .= "<td valign='TOP' style='mso-number-format:\"dd/mm/yyyy\";text-align: left;' class='oddListRowS1'>{$val['f36_finish']}</td>";
        $html .= "<td valign='TOP' style='mso-number-format:\"dd/mm/yyyy\";text-align: left;' class='oddListRowS1'>{$val['m36_start']}</td>";
        $html .= "<td valign='TOP' style='mso-number-format:\"dd/mm/yyyy\";text-align: left;' class='oddListRowS1'>{$val['m36_finish']}</td>";
    }
    else{
        $html .= "<td valign='TOP' style='mso-number-format:\"dd/mm/yyyy\";text-align: left;' class='oddListRowS1'>{$val['f36_start']}</td>";
        $html .= "<td valign='TOP' style='mso-number-format:\"dd/mm/yyyy\";text-align: left;' class='oddListRowS1'>{$val['f36_finish']}</td>";
        $html .= "<td valign='TOP' style='mso-number-format:\"dd/mm/yyyy\";text-align: left;' class='oddListRowS1'>{$val['m36_start']}</td>";
        $html .= "<td valign='TOP' style='mso-number-format:\"dd/mm/yyyy\";text-align: left;' class='oddListRowS1'>{$val['m36_finish']}</td>";
        $html .= "<td valign='TOP' style='mso-number-format:\"dd/mm/yyyy\";text-align: left;' class='oddListRowS1'>{$val['l36_start']}</td>";
        $html .= "<td valign='TOP' style='mso-number-format:\"dd/mm/yyyy\";text-align: left;' class='oddListRowS1'>{$val['l36_finish']}</td>";
        $html .= "<td valign='TOP' class='oddListRowS1'>       </td>";
        $html .= "<td valign='TOP' class='oddListRowS1'>       </td>";
    }


    $html .= "<td valign='TOP' style='text-align: center;' class='oddListRowS1'>{$val['l_paid']}</td>";
    $html .= "<td valign='TOP' style='text-align: center;' class='oddListRowS1'>{$val['l_unpaid']}</td>";
    $html .= "<td valign='TOP' style='text-align: center;' class='oddListRowS1'>{$val['l_sponsor20']}</td>";
    $html .= "<td valign='TOP' style='text-align: center;' class='oddListRowS1'>{$val['l_sponsor100']}</td>";
    $html .= "<td valign='TOP' style='text-align: center;' class='oddListRowS1'>{$val['l_total']}</td>";

    $html .= "<td valign='TOP' style='text-align: center;' class='oddListRowS1'>{$val['p_paid']}</td>";
    $html .= "<td valign='TOP' style='text-align: center;' class='oddListRowS1'>{$val['p_unpaid']}</td>";
    $html .= "<td valign='TOP' style='text-align: center;' class='oddListRowS1'>{$val['p_sponsor20']}</td>";
    $html .= "<td valign='TOP' style='text-align: center;' class='oddListRowS1'>{$val['p_sponsor100']}</td>";
    $html .= "<td valign='TOP' style='text-align: center;' class='oddListRowS1'>{$val['p_total']}</td>";


    $html .= "<td valign='TOP' style='text-align: center;' class='oddListRowS1'>{$val['l_acs']}</td>";
    $html .= "<td valign='TOP' style='text-align: center;' class='oddListRowS1'>{$val['p_acs']}</td>";


    $html .= "<td valign='TOP' class='oddListRowS1'>{$val['teacher']}</td>";
    $html .= "<td valign='TOP' class='oddListRowS1'>{$val['teacher_type']}</td>";

    $html .= "<td valign='TOP' class='oddListRowS1'>".'<a href=index.php?module=J_Class&offset=1&stamp=1441785563066827100&return_module=J_Class&action=DetailView&record='.$val['upgrade_to_class_id'].' target=_blank>'.$val['upgrade_to_class_name'].'</a>'."</td>";
    $html .= "<td valign='TOP' class='oddListRowS1' style='mso-number-format:\"dd/mm/yyyy h:mm\";text-align: left;'>{$val['upgrade_to_date']}</td>";
    $html .= "<td valign='TOP' style='text-align: center;' class='oddListRowS1'>{$val['u_paid']}</td>";
    $html .= "<td valign='TOP' class='oddListRowS1'>     </td>";
    $html .= "<td valign='TOP' class='oddListRowS1'>     </td>";
    $html .= "<td valign='TOP' class='oddListRowS1'>     </td></tr>";


    $l_paidt    += $val['l_paid'];
    $l_unpaidt  += $val['l_unpaid'];
    $l_sponsor20t    += $val['l_sponsor20'];
    $l_sponsor100t   += $val['l_sponsor100'];
    $l_totalt        += $val['l_total'];
    $p_paidt    += $val['p_paid'];
    $p_unpaidt  += $val['p_unpaid'];
    $p_sponsor20t    += $val['p_sponsor20'];
    $p_sponsor100t   += $val['p_sponsor100'];
    $p_totalt        += $val['p_total'];
    $l_acst        += $val['l_acs'];
    $p_acst        += $val['p_acs'];

    if($kocc_list[$val['koc']] == $koc_list[$val['koc']]){
        $html .= "<tr><td colspan='18' style='text-align: right;'><h3> Total: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3></td>";
        $html .= "<td><b>".$l_paidt."</b></td>";
        $html .= "<td><b>".$l_unpaidt."</b></td>";
        $html .= "<td><b>".$l_sponsor20t."</b></td>";
        $html .= "<td><b>".$l_sponsor100t."</b></td>";
        $html .= "<td><b>".$l_totalt."</b></td>";

        $html .= "<td><b>".$p_paidt."</b></td>";
        $html .= "<td><b>".$p_unpaidt."</b></td>";
        $html .= "<td><b>".$p_sponsor20t."</b></td>";
        $html .= "<td><b>".$p_sponsor100t."</b></td>";
        $html .= "<td><b>".$p_totalt."</b></td>";


        $html .= "<td><b>".format_number($l_acst / $no,2,2)."</b></td>";
        $html .= "<td><b>".format_number($p_acst / $no,2,2)."</b></td>";

        $html .= "<td></td>";
        $html .= "<td></td>";
        $html .= "<td></td>";
        $html .= "<td></td>";
        $html .= "<td></td>";
        $html .= "<td></td>";
        $html .= "<td></td>";
        $html .= "<td></td></tr>";
    }
    $no++;
}
if(count($class_list) == 0)
    $html .= "<td colspan='38'>No Results!!</td>";
$html .= "</tbody></table>";

echo $html;
//##############------------------------------------######################-----------------------

function get_count_payment_paid($class_ids, $start = '', $end = '', $sponsor = ''){
    $ext_sponsor = 'AND (j_studentsituations.total_amount > 0)  AND ((((( l3.total_after_discount - l3.amount_bef_discount) /l3.total_after_discount) * 100) < 20) OR (l3.paid_hours = l3.tuition_hours)) '; //0 -> 20
    if($sponsor == 20)
        $ext_sponsor = 'AND (j_studentsituations.total_amount > 0 ) AND (((( l3.total_after_discount - l3.amount_bef_discount) /l3.total_after_discount) * 100) >= 20)'; //20 -> 100
    if($sponsor == 100)
        $ext_sponsor = 'AND (j_studentsituations.total_amount = 0 )'; //100% Sponsor

    if($sponsor == 'Upgrade') //Count Paid in Upgrade Class
        $ext_sponsor = 'AND (j_studentsituations.total_amount > 0 )'; //100% Sponsor

    $ext_start = '';
    if(!empty($start)){
        $start_tz     = date('Y-m-d H:i:s',strtotime("-7 hours ".$start." 00:00:00"));
        $ext_start = " AND (l1.date_start >= '$start_tz') ";
    }
    $ext_end = '';
    if(!empty($end)){
        $end_tz     = date('Y-m-d H:i:s',strtotime("-7 hours ".$end." 23:59:59"));
        $ext_end = " AND (l1.date_start <= '$end_tz') ";
    }

    $sql = "SELECT DISTINCT
    IFNULL(l2.id, '') l2_id,
    COUNT(DISTINCT l4.id) l4__count
    FROM
    j_studentsituations
    INNER JOIN
    meetings_contacts l1_1 ON j_studentsituations.id = l1_1.situation_id
    AND l1_1.deleted = 0
    INNER JOIN
    meetings l1 ON l1.id = l1_1.meeting_id
    AND l1.deleted = 0
    INNER JOIN
    j_class l2 ON j_studentsituations.ju_class_id = l2.id
    AND l2.deleted = 0
    INNER JOIN
    j_payment l3 ON j_studentsituations.payment_id = l3.id
    AND l3.deleted = 0
    INNER JOIN
    contacts l4 ON j_studentsituations.student_id = l4.id
    AND l4.deleted = 0
    WHERE
    ((j_studentsituations.deleted = 0
    $ext_start
    $ext_end
    AND (l1.session_status <> 'Cancelled')
    AND (l2.id IN ('".implode("','",$class_ids)."'))
    AND (j_studentsituations.type IN ('Enrolled' , 'Settle', 'Moving In'))
    $ext_sponsor   ))
    AND j_studentsituations.deleted = 0
    GROUP BY l2.id
    ORDER BY l2_id ASC";
    $rs = $GLOBALS['db']->query($sql);
    $res = array();
    while($row = $GLOBALS['db']->fetchByAssoc($rs) )
        $res[$row['l2_id']]   = $row['l4__count'];

    return $res;
}

function get_count_payment_unpaid($class_ids, $start, $end){
    $ext_start = '';
    if(!empty($start)){
        $start_tz     = date('Y-m-d H:i:s',strtotime("-7 hours ".$start." 00:00:00"));
        $ext_start = " AND (l1.date_start >= '$start_tz') ";
    }
    $ext_end = '';
    if(!empty($end)){
        $end_tz     = date('Y-m-d H:i:s',strtotime("-7 hours ".$end." 23:59:59"));
        $ext_end = " AND (l1.date_start <= '$end_tz') ";
    }

    $sql = "SELECT DISTINCT
    IFNULL(l2.id, '') l2_id,
    COUNT(DISTINCT j_studentsituations.id) j_studentsituations__count
    FROM
    j_studentsituations
    INNER JOIN
    meetings_contacts l1_1 ON j_studentsituations.id = l1_1.situation_id
    AND l1_1.deleted = 0
    INNER JOIN
    meetings l1 ON l1.id = l1_1.meeting_id
    AND l1.deleted = 0
    INNER JOIN
    j_class l2 ON j_studentsituations.ju_class_id = l2.id
    AND l2.deleted = 0
    WHERE
    ((j_studentsituations.deleted = 0
    $ext_start
    $ext_end
    AND (l1.session_status <> 'Cancelled')
    AND (l2.id IN ('".implode("','",$class_ids)."'))
    AND (j_studentsituations.type IN ('OutStanding' , 'Demo'))))
    GROUP BY l2.id
    ORDER BY l2_id ASC";
    $rs = $GLOBALS['db']->query($sql);
    $res = array();
    while($row = $GLOBALS['db']->fetchByAssoc($rs))
        $res[$row['l2_id']]   = $row['j_studentsituations__count'];

    return $res;
}

function get_table_head($koc = ''){
    $html = "<tr><td colspan='38' style='text-align: left;'><h3 style='color: #000 !important;'>".strtoupper($koc)." CLASSES</h3></td></tr>";
    $html .= '<tr><th rowspan="3" align="center" class="reportlistViewThS1" valign="middle" nowrap="">No.</th>';
    $html .= '<th rowspan="3" align="center" class="reportlistViewThS1" valign="middle" nowrap="">Level</th>';
    $html .= '<th rowspan="3" align="center" class="reportlistViewThS1" valign="middle" nowrap="">Class Name</th>';
    $html .= '<th rowspan="3" align="center" class="reportlistViewThS1" valign="middle" nowrap="">Class Code</th>';
    $html .= '<th rowspan="3" align="center" class="reportlistViewThS1" valign="middle" nowrap="">Class Status</th>';
    $html .= '<th rowspan="3" align="center" class="reportlistViewThS1" valign="middle" nowrap="">EC In Charge</th>';
    $html .= '<th rowspan="3" align="center" class="reportlistViewThS1" style="width: 150px;" valign="middle" nowrap="">Schedule</th>';
    $html .= '<th rowspan="3" align="center" class="reportlistViewThS1" valign="middle">Lesson <br style="mso-data-placement:same-cell;"/>Studied</th>';
    $html .= '<th rowspan="3" align="center" class="reportlistViewThS1" valign="middle">Hours learned <br style="mso-data-placement:same-cell;"/>/period</th>';
    $html .= '<th rowspan="3" align="center" class="reportlistViewThS1" valign="middle">No of lesson/ <br style="mso-data-placement:same-cell;"/>period</th>';


    $html .= '<th colspan="8" align="center" class="reportlistViewThS1" valign="middle" nowrap="">Time</th>';
    $html .= '<th colspan="10" align="center" class="reportlistViewThS1" valign="middle" nowrap="">Number of Student</th>';
    $html .= '<th colspan="2" rowspan="2" align="center" class="reportlistViewThS1" valign="middle" nowrap="">ACS</th>';

    $html .= '<th rowspan="3" align="center" class="reportlistViewThS1" style="width: 150px;" valign="middle" nowrap="">Teacher</th>';
    $html .= '<th rowspan="3" align="center" class="reportlistViewThS1" valign="middle">Teacher <br style="mso-data-placement:same-cell;"/>Type</th>';
    $html .= '<th rowspan="3" align="center" class="reportlistViewThS1" valign="middle">Class <br style="mso-data-placement:same-cell;"/>Upgrade</th>';
    $html .= '<th rowspan="3" align="center" class="reportlistViewThS1" valign="middle">Upgrade <br style="mso-data-placement:same-cell;"/>Date</th>';
    $html .= '<th rowspan="3" align="center" class="reportlistViewThS1" valign="middle" style="width: 70px;">No of <br style="mso-data-placement:same-cell;"/>paid in <br style="mso-data-placement:same-cell;"/>upgrading <br style="mso-data-placement:same-cell;"/>class</th>';
    $html .= '<th rowspan="3" align="center" class="reportlistViewThS1" valign="middle">Opening <br style="mso-data-placement:same-cell;"/>probability</th>';
    $html .= '<th rowspan="3" align="center" class="reportlistViewThS1" valign="middle" nowrap="">Note</th>';
    $html .= '<th rowspan="3" align="center" class="reportlistViewThS1" valign="middle" nowrap="">Room</th></tr>';

    if($koc != 'Teens'){
        $html .= '<tr><th colspan="2" align="center" valign="middle" nowrap="">F36</th>';
        $html .= '<th colspan="2" align="center" valign="middle" nowrap="">M36</th>';
        $html .= '<th colspan="2" align="center" valign="middle" nowrap="">L36</th>';
        $html .= '<th colspan="2" align="center" valign="middle" style="width: 50px;" nowrap=""> </th>';
    }else{
        $html .= '<tr><th colspan="2" align="center" valign="middle" nowrap="">AF36</th>';
        $html .= '<th colspan="2" align="center" valign="middle" nowrap="">AM36</th>';
        $html .= '<th colspan="2" align="center" valign="middle" nowrap="">BM36</th>';
        $html .= '<th colspan="2" align="center" valign="middle" nowrap="">BL36</th>';
    }

    $html .= '<th colspan="5" align="center" valign="middle" nowrap="">Last period</th>';
    $html .= '<th colspan="5" align="center" valign="middle" nowrap="">This period</th></tr>';

    $html .= '<tr><th align="center" valign="middle" nowrap="">Start</th>';
    $html .= '<th align="center" valign="middle" nowrap="">Finish</th>';
    $html .= '<th align="center" valign="middle" nowrap="">Start</th>';
    $html .= '<th align="center" valign="middle" nowrap="">Finish</th>';
    $html .= '<th align="center" valign="middle" nowrap="">Start</th>';
    $html .= '<th align="center" valign="middle" nowrap="">Finish</th>';
    if($koc != 'Teens'){
        $html .= '<th align="center" valign="middle" nowrap=""></th>';
        $html .= '<th align="center" valign="middle" nowrap=""></th>';
    }else{
        $html .= '<th align="center" valign="middle" nowrap="">Start</th>';
        $html .= '<th align="center" valign="middle" nowrap="">Finish</th>';
    }

    $html .= '<th align="center" valign="middle" nowrap="">Paid</th>';
    $html .= '<th align="center" valign="middle" nowrap="">Unpaid</th>';
    $html .= '<th align="center" valign="middle">Sponsor <br style="mso-data-placement:same-cell;"/>20➜100%</th>';
    $html .= '<th align="center" valign="middle">Sponsor <br style="mso-data-placement:same-cell;"/>100%</th>';
    $html .= '<th align="center" valign="middle" nowrap="">Total</th>';

    $html .= '<th align="center" valign="middle" nowrap="">Paid</th>';
    $html .= '<th align="center" valign="middle" nowrap="">Unpaid</th>';
    $html .= '<th align="center" valign="middle">Sponsor <br style="mso-data-placement:same-cell;"/>20➜100%</th>';
    $html .= '<th align="center" valign="middle">Sponsor <br style="mso-data-placement:same-cell;"/> 100%</th>';
    $html .= '<th align="center" valign="middle" nowrap="">Total</th>';

    $html .= '<th align="center" valign="middle" nowrap="">Last period</th>';
    $html .= '<th align="center" valign="middle" nowrap="">This period</th></tr>';
    return $html;
}