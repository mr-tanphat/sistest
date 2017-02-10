<?php
/**
* GET LIST: DOANH THU THEO LỚP THEO HỌC VIÊN
* @param start_display    	: Ngày bắt đầu trên hệ CRM
* @param end_display		: Ngày kết thúc trên CRM
* @param class_id   		: ID lớp
* @param student_id       	: ID Học viên
* @param situation_type     : Loại doanh thu cần lấy 'Enrolled', 'Outstanding'
*/
require_once('custom/include/_helper/junior_schedule.php');
function get_list_revenue($student_id = '', $situation_type = "'Enrolled'", $start_display = '', $end_display = '', $class_id = '', $situation_id = '', $team_id = '', $payment_id = '', $is_not_payment = false, $status = ''){
    global $timedate;

    $ext_student = "AND (l1_1.contact_id = '$student_id')";
    if(empty($student_id))
        $ext_student = "";

    $ext_situation = "AND l3.type IN($situation_type)";
    if($situation_type == "All" || empty($situation_type))
        $ext_situation = "";

    if(!empty($start_display)){
        $start_tz 	= date('Y-m-d H:i:s',strtotime("-7 hours ".$timedate->to_db_date($start_display,false)." 00:00:00"));
        $ext_start = "AND (meetings.date_start >= '$start_tz')";
    }else $ext_start = '';

    if(!empty($end_display)){
        $end_tz 	= date('Y-m-d H:i:s',strtotime("-7 hours ".$timedate->to_db_date($end_display	,false)." 23:59:59"));
        $ext_end = "AND (meetings.date_end <= '$end_tz')";
    }else $ext_end = '';

    $ext_class = "AND (l2.id = '$class_id')";
    if(empty($class_id))
        $ext_class = "";

    $ext_situation_id = "AND (l3.id = '$situation_id')";
    if(empty($situation_id))
        $ext_situation_id = "";

    $ext_team = "AND (l5.id = '$team_id')";
    if(empty($team_id) && empty($situation_id) && empty($student_id) && empty($class_id) && empty($payment_id)){
             $ext_team = "AND ((meetings.team_set_id IN (SELECT
        tst.team_set_id
        FROM
        team_sets_teams tst
        INNER JOIN
        team_memberships team_memberships ON tst.team_id = team_memberships.team_id
        AND team_memberships.user_id = '{$GLOBALS['current_user']->id}'
        AND team_memberships.deleted = 0)))";
    }else if (!empty($team_id))
      $ext_team = "AND (l5.id = '$team_id')";
    else $ext_team = "";

    if(is_array($payment_id) && !empty($payment_id)){
        $ext_payment = "AND (l4.id IN('".implode("','",$payment_id)."'))";
    }else{
        $ext_payment = "AND (l4.id = '$payment_id')";
        if(empty($payment_id))
            $ext_payment = "";
        if($is_not_payment && !empty($payment_id))
            $ext_payment = "AND (l4.id <> '$payment_id')";
    }

    $ext_status = "AND (l2.status <> '$status')";
    if(empty($status))
        $ext_status = "";

    $select_date = "meetings.date_start date_start,";
    //Set Revenue Settle
    if($situation_type == "'Settle'"){
        if(!empty($end_display)){
            $end_tz     = $timedate->to_db_date($end_display    ,false);
            $ext_end = "AND (l4.payment_date <= '$end_tz')";
        }else $ext_end = '';
        if(!empty($start_display)){
            $start_tz     = $timedate->to_db_date($start_display,false);
            $ext_start = "AND (l4.payment_date >= '$start_tz')";
        }else $ext_start = '';
        $select_date = "l4.payment_date date_start,";
    }

    $q1 = "SELECT DISTINCT
    IFNULL(meetings.id, '') primaryid,
    $select_date
    meetings.date_end date_end,
    meetings.duration_cal duration_hour,
    meetings.delivery_hour delivery_hour,
    IFNULL(meetings.till_hour, 0) till_hour,
    IFNULL(l3.id, '') situation_id,
    l3.type situation_type,
    IFNULL(l1_1.contact_id, '') student_id,
    IFNULL(l4.id, '') ju_payment_id,
    (CASE
    WHEN IFNULL(l4.payment_amount, 0) > IFNULL(SUM(l6.payment_amount), 0) THEN 'Unpaid'
    ELSE 'Paid'
    END) as revenue_status,
    IFNULL(l5.id, '') team_id,
    l3.total_amount total_amount,
    l3.total_hour total_hour,
    IFNULL((total_amount/total_hour), 0) cost_per_hour,
    IFNULL((total_amount/total_hour * delivery_hour), 0) delivery_revenue
    FROM
    meetings
    INNER JOIN
    meetings_contacts l1_1 ON meetings.id = l1_1.meeting_id
    AND l1_1.deleted = 0
    $ext_student
    INNER JOIN
    contacts l1 ON l1.id = l1_1.contact_id
    AND l1.deleted = 0
    INNER JOIN
    j_class l2 ON meetings.ju_class_id = l2.id
    $ext_class
    $ext_status
    AND l2.deleted = 0
    INNER JOIN
    j_studentsituations l3 ON l1_1.situation_id = l3.id
    AND l3.deleted = 0 $ext_situation
    $ext_situation_id
    LEFT JOIN
    j_payment l4 ON l3.payment_id = l4.id
    AND l4.deleted = 0
    LEFT JOIN
    j_paymentdetail l6 ON l6.payment_id = l4.id
    AND l6.deleted = 0 AND l6.status = 'Paid'
    INNER JOIN
    teams l5 ON meetings.team_id = l5.id
    AND l5.deleted = 0
    WHERE
    ((meetings.deleted = 0
    $ext_team
    $ext_start
    $ext_end
    $ext_payment
    AND (meetings.session_status <> 'Cancelled')))
    GROUP BY primaryid, situation_id
    ORDER BY date_start ASC";
    return $GLOBALS['db']->fetchArray($q1);
}

/**
* GET LIST: DOANH THU THEO LỚP THEO SITUATION THEO HỌC VIÊN ...
* @param start_display    	: Ngày bắt đầu trên hệ CRM
* @param end_display		: Ngày kết thúc trên CRM
* @param class_id   		: ID lớp
* @param student_id       	: ID Học viên
* @param situation_type     : Loại doanh thu cần lấy 'Enrolled', 'Outstanding'
*/
function get_total_revenue($student_id = '', $situation_type = "'Enrolled'", $start_display = '', $end_display = '', $class_id = '', $situation_id = '', $payment_id = ''){
    global $timedate;

    $ext_student = "AND (l1_1.contact_id = '$student_id')";
    if(empty($student_id))
        $ext_student = "";

    $ext_situation = "AND l3.type IN($situation_type)";
    if($situation_type == "All" || empty($situation_type))
        $ext_situation = "";

    if(!empty($start_display)){
        $start_tz 	= date('Y-m-d H:i:s',strtotime("-7 hours ".$timedate->to_db_date($start_display,false)." 00:00:00"));
        $ext_start = "AND (meetings.date_start >= '$start_tz')";
    }else $ext_start = '';

    if(!empty($end_display)){
        $end_tz 	= date('Y-m-d H:i:s',strtotime("-7 hours ".$timedate->to_db_date($end_display	,false)." 23:59:59"));
        $ext_end = "AND (meetings.date_end <= '$end_tz')";
    }else $ext_end = '';

    $ext_class = "AND (l2.id = '$class_id')";
    if(empty($class_id))
        $ext_class = "";

    $ext_situation_id = "AND (l3.id = '$situation_id')";
    if(empty($situation_id))
        $ext_situation_id = "";

    $ext_payment_id = "AND (l4.id = '$payment_id')";
    if(empty($payment_id))
        $ext_payment_id = "";

    //	IFNULL((l4.deposit_amount + l4.paid_amount + IFNULL(SUM(l5.payment_amount), 0)),
    //0) total_amount,
    //IFNULL((total_amount / (l3.total_amount / l3.total_hour)),
    //0) total_hour,

    $q1 = "SELECT DISTINCT
    IFNULL(l2.id, '') class_id,
    IFNULL(l2.class_code, '') class_code,
    IFNULL(l2.name, '') class_name,
    l2.start_date class_start_date,
    l2.end_date class_end_date,
    IFNULL(l2.main_schedule, '') class_main_schedule,
    IFNULL(l2.short_schedule, '') class_short_schedule,
    l2.class_type class_type,
    IFNULL(l3.id, '') situation_id,
    l3.start_study start_study,
    l3.end_study end_study,
    l3.total_hour total_hour_situa,
    l3.total_amount total_amount_situa,
    IFNULL(SUM((l3.total_amount / l3.total_hour) * meetings.delivery_hour),
    0) total_revenue,
    IFNULL(SUM(meetings.delivery_hour), 0) total_revenue_hour,
    IFNULL(COUNT(meetings.id), 0) count_session
    FROM
    meetings
    INNER JOIN
    meetings_contacts l1_1 ON meetings.id = l1_1.meeting_id
    $ext_student
    AND l1_1.deleted = 0
    INNER JOIN
    contacts l1 ON l1.id = l1_1.contact_id
    AND l1.deleted = 0
    INNER JOIN
    j_class l2 ON meetings.ju_class_id = l2.id
    AND l2.deleted = 0
    INNER JOIN
    j_studentsituations l3 ON l1_1.situation_id = l3.id
    AND l3.deleted = 0 $ext_situation
    LEFT JOIN
    j_payment l4 ON l3.payment_id = l4.id
    AND l4.deleted = 0
    WHERE
    ((meetings.deleted = 0

    $ext_start $ext_end
    $ext_class
    $ext_situation_id
    $ext_payment_id
    AND (meetings.session_status <> 'Cancelled')))
    GROUP BY situation_id";

    return $GLOBALS['db']->fetchArray($q1);
}

/**
* GET LIST: TỔNG SỐ GIỜ DẠY THEO LỚP
* @param start_display    	: Ngày bắt đầu trên hệ CRM
* @param end_display		: Ngày kết thúc trên CRM
* @param class_id   		: ID lớp
*/
function get_list_lesson_by_class($class_id, $start_display = '', $end_display = '', $arr_type = 'Standard', $not_status = 'Cancelled'){
    global $timedate;

    $ext_start = '';
    if(!empty($start_display)){
        $start_tz 	= date('Y-m-d H:i:s',strtotime("-7 hours ".$timedate->to_db_date($start_display,false)." 00:00:00"));
        $ext_start = "AND (meetings.date_start >= '$start_tz')";
    }
    $ext_end = '';
    if(!empty($end_display)){
        $end_tz 	= date('Y-m-d H:i:s',strtotime("-7 hours ".$timedate->to_db_date($end_display	,false)." 23:59:59"));
        $ext_end = "AND (meetings.date_end <= '$end_tz')";
    }
    $ext_class = "AND (l2.id = '$class_id')";

    $ext_status = "AND (meetings.session_status <> 'Cancelled')";
    if(empty($not_status))
        $ext_status = "";

    $q1 = "SELECT DISTINCT
    IFNULL(l2.id, '') class_id,
    IFNULL(l2.class_code, '') class_code,
    IFNULL(l2.name, '') class_name,
    l2.start_date class_start_date,
    l2.end_date class_end_date,
    l2.hours class_hour,
    IFNULL(meetings.id, '') primaryid,
    meetings.date_start date_start,
    meetings.date_end date_end,
    meetings.lesson_number lesson_number,
    IFNULL(meetings.till_hour, 0) till_hour,
    meetings.session_status session_status,
    IFNULL(meetings.delivery_hour, 0) delivery_hour
    FROM
    meetings
    INNER JOIN
    j_class l2 ON meetings.ju_class_id = l2.id
    AND l2.deleted = 0
    WHERE
    ((
    meetings.deleted = 0
    $ext_class
    $ext_start
    $ext_end
    $ext_status))
    ORDER BY date_start ASC";
    if($arr_type == 'Standard')
        return $GLOBALS['db']->fetchArray($q1);
    elseif($arr_type == 'VIP'){
        $rs1 = $GLOBALS['db']->query($q1);
        $row = array();
        while($ss = $GLOBALS['db']->fetchByAssoc($rs1))
            $row[$ss['primaryid']] = $ss['delivery_hour'];

        return $row;
    }
}


/**
* KIỂM TRA HỌC VIÊN CÓ TỒN TẠI TRONG KHOẢNG THỜI GIAN CỦA LỚP HAY KO
* @param start_display    	: Ngày bắt đầu trên hệ CRM
* @param end_display		: Ngày kết thúc trên CRM
* @param class_id   		: ID lớp
*/
function is_exist_in_class($student_id, $start_display, $end_display, $class_id, $situation_type = 'All'){
    $ses_list = get_list_revenue($student_id, $situation_type, $start_display, $end_display, $class_id);
    if(count($ses_list) > 0)
        return true;
    else return false;
}

/**
* KIỂM TRA LEAD CÓ TỒN TẠI TRONG KHOẢNG THỜI GIAN CỦA LỚP HAY KO
* @param Lead ID    		: Ngày bắt đầu trên hệ CRM
* @param class_id   		: ID lớp
*/
function is_exist_lead_in_class($lead_id, $class_id){
    $res = get_lead_in_class($lead_id, $class_id);
    if(count($res) > 0)
        return true;
    else return false;
}

/**
* GET LIST: Lead trong lớp
* @param Lead ID    		: Ngày bắt đầu trên hệ CRM
* @param class_id   		: ID lớp
*/
function get_lead_in_class($lead_id, $class_id){
    $ext_lead_id = '';
    if(!empty($lead_id))
        $ext_lead_id = "AND (l1.id = '$lead_id')";

    $ext_class_id = '';
    if(!empty($class_id))
        $ext_class_id = "AND (l2.id = '$class_id')";

    $q1 = "SELECT DISTINCT
    IFNULL(meetings.id, '') primaryid,
    IFNULL(l1_1.id, '') rel_id,
    IFNULL(meetings.name, '') meetings_name,
    meetings.date_start meetings_date_start,
    meetings.date_end meetings_date_end
    FROM
    meetings
    INNER JOIN
    meetings_leads l1_1 ON meetings.id = l1_1.meeting_id
    AND l1_1.deleted = 0
    INNER JOIN
    leads l1 ON l1.id = l1_1.lead_id AND l1.deleted = 0
    INNER JOIN
    j_class l2 ON meetings.ju_class_id = l2.id
    AND l2.deleted = 0
    WHERE
    ((meetings.deleted = 0
    $ext_lead_id
    $ext_class_id))";
    return $GLOBALS['db']->fetchArray($q1);
}

/**
* GET LIST: Payment Detail
*/
function get_list_payment_detail($payment_id, $team_id = '', $student_id = '',  $start_db = '', $end_db = '', $status = 'Paid', $type = ''){
    $ext_pay = '';
    if(!empty($payment_id))
        $ext_pay = "AND (l1.id = '$payment_id')";

    $ext_team = '';
    if(!empty($team_id))
        $ext_team = "AND (l2.id = '$team_id')";

    $ext_stu = '';
    if(!empty($student_id))
        $ext_stu = "AND (l3.id = '$student_id')";

    $ext_start = '';
    if(!empty($start_db))
        $ext_start = "AND (j_paymentdetail.payment_date >= '$start_db')";

    $ext_end = '';
    if(!empty($end_db))
        $ext_end = "AND (j_paymentdetail.payment_date <= '$end_db')";

    $ext_status = '';
    if(!empty($status))
        $ext_status = "AND (j_paymentdetail.status = '$status')";

    $ext_type = '';
    if(!empty($type))
        $ext_type = "AND (j_paymentdetail.type = '$type')";

    $q1 = "SELECT DISTINCT
    IFNULL(j_paymentdetail.id, '') primaryid,
    IFNULL(j_paymentdetail.name, '') name,
    j_paymentdetail.payment_no payment_no,
    IFNULL(j_paymentdetail.invoice_number, '') invoice_number,
    IFNULL(j_paymentdetail.payment_method, '') payment_method,
    j_paymentdetail.before_discount before_discount,
    j_paymentdetail.discount_amount discount_amount,
    j_paymentdetail.sponsor_amount sponsor_amount,
    j_paymentdetail.payment_amount payment_amount,
    IFNULL(j_paymentdetail.type, '') type,
    j_paymentdetail.payment_method_fee payment_method_fee,
    j_paymentdetail.payment_date payment_date,
    IFNULL(l1.id, '') payment_id,
    l1.payment_amount payment_payment_amount,
    IFNULL(l2.id, '') team_id,
    IFNULL(l3.id, '') student_id,
    l3.full_student_name student_name
    FROM
    j_paymentdetail
    INNER JOIN
    j_payment l1 ON j_paymentdetail.payment_id = l1.id
    AND l1.deleted = 0
    INNER JOIN
    teams l2 ON j_paymentdetail.team_id = l2.id
    AND l2.deleted = 0
    LEFT JOIN
    contacts_j_payment_1_c l3_1 ON l1.id = l3_1.contacts_j_payment_1j_payment_idb
    AND l3_1.deleted = 0
    LEFT JOIN
    contacts l3 ON l3.id = l3_1.contacts_j_payment_1contacts_ida
    AND l3.deleted = 0
    WHERE
    (((j_paymentdetail.deleted = 0)
    $ext_pay
    $ext_team
    $ext_stu
    $ext_start
    $ext_end
    $ext_status
    $ext_type))";
    return $GLOBALS['db']->fetchArray($q1);
}

/**
* update lesson number for class
* Update Start End Date for class
*
* @param mixed $class_id
*
* @author Trung Nguyen 2015.12.12
*/
function updateClassSession($class_id, $class_type_adult = '', $level = '', $module = '') {
    //Update lesson no
    $q1 = "SELECT DISTINCT
    IFNULL(meetings.id, '') primaryid,
    meetings.date_start date_start,
    meetings.date_end date_end,
    meetings.lesson_number lesson_number,
    meetings.delivery_hour delivery_hour
    FROM
    meetings
    WHERE
    ((meetings.deleted = 0
    AND (meetings.session_status <> 'Cancelled')
    AND (meetings.ju_class_id = '$class_id') ))
    ORDER BY date_start ASC";
    $ss_list = $GLOBALS['db']->fetchArray($q1);
    $bug_lesson_count = 0;
    $cr_lesson = 0;
    $till = 0;
    for($i = 0; $i < count($ss_list); $i++){
        $cr_lesson++;
        if($cr_lesson != $ss_list[$i]['lesson_number'])
            $bug_lesson_count++;
        //Update till hours
        $till += $ss_list[$i]['delivery_hour'];
        //Update SSO Code
        $ext_sso_code='';

        $q2 = "UPDATE meetings SET till_hour = $till  WHERE id = '{$ss_list[$i]['primaryid']}'";

        $GLOBALS['db']->query($q2);
    }

    if($bug_lesson_count > 0){
        for($i = 0; $i < count($ss_list); $i++){
            $q3 = "UPDATE meetings SET lesson_number = '".($i+1)."' WHERE id = '{$ss_list[$i]['primaryid']}'";
            $GLOBALS['db']->query($q3);
        }
    }
    if($class_type_adult == 'Practice'){
        if(count($ss_list) == 10){
            $sql = "UPDATE
                meetings m
                INNER JOIN
            alpha_classroom ac ON ac.sis_state = '$level'
                AND m.ju_class_id = '$class_id'
                AND ac.sis_lesson_number = m.till_hour / 3
                #AND ac.sis_lesson_number = ROUND((m.lesson_number + .1) / 2, 0)
                AND ac.sis_level = '$module'
        SET
            m.sso_code = ac.sso_code";
        }else{
            $sql = "UPDATE
                meetings m
                INNER JOIN
            alpha_classroom ac ON ac.sis_state = '$level'
                AND m.ju_class_id = '$class_id'
                AND ac.sis_lesson_number = m.lesson_number
                AND ac.sis_level = '$module'
        SET
            m.sso_code = ac.sso_code";
        }

        $GLOBALS['db']->query($sql);
    }

    //Return DB class start - end date
    $rsClass = array();
    $first = reset($ss_list);
    $start_date = date('Y-m-d',strtotime("+7 hours ".$first['date_start']));

    $last = end($ss_list);
    $end_date = date('Y-m-d',strtotime("+7 hours ".$last['date_start']));

    return array(
        'start_date' => $start_date,
        'end_date'   => $end_date
    );
}

//////////////// CHECK NEW SALE -  BY LAP NGUYEN \\\\\\\\\\\\\\\\\\\\\\\\\
function checkSaleType($payment_id, $pmd_db_date = ''){
    global $timedate;
    $q1 = "SELECT DISTINCT
    IFNULL(j_payment.id, '') payment_id,
    j_payment.tuition_hours tuition_hours,
    j_payment.payment_date payment_date,
    j_payment.payment_amount payment_amount,
    IFNULL(j_payment.payment_type, '') payment_type,
    IFNULL(j_payment.kind_of_course, '') kind_of_course,
    IFNULL(l1.id, '') team_id,
    IFNULL(l2.id, '') student_id
    FROM
    j_payment
    INNER JOIN
    teams l1 ON j_payment.team_id = l1.id
    AND l1.deleted = 0
    INNER JOIN
    contacts_j_payment_1_c l2_1 ON j_payment.id = l2_1.contacts_j_payment_1j_payment_idb
    AND l2_1.deleted = 0
    INNER JOIN
    contacts l2 ON l2.id = l2_1.contacts_j_payment_1contacts_ida
    AND l2.deleted = 0
    WHERE
    (((j_payment.id = '$payment_id')))
    AND j_payment.deleted = 0";
    $rs1 = $GLOBALS['db']->query($q1);
    $row = $GLOBALS['db']->fetchByAssoc($rs1);

    $student_id = $row['student_id'];
    $db_payment_date = $row['payment_date'];

    if($row['kind_of_course'] == 'Outing Trip' ||$row['kind_of_course'] == 'Cambridge' )
        return '';  //Outing, Cambridge => Not set

    $basic_rule = newsaleSixMonth($student_id, $payment_id, $db_payment_date) && newsaleMovingTransfer($payment_id);
    $sale_type = 'Not set';

    if($row['payment_type'] == 'Enrollment'){
        if($basic_rule && newsaleRelPay24($row, $basic_rule, $pmd_db_date))
            $sale_type = 'New Sale';
        else $sale_type = 'Retention';

    }elseif($row['payment_type'] == 'Deposit'){
        $_target = getTargetNewSale($row['team_id']);
        if($row['payment_amount'] >= $_target){
            if($basic_rule) $sale_type = 'New Sale';
            else $sale_type = 'Retention';
        }else{
            if($basic_rule) $sale_type = 'Not set';
            else $sale_type = 'Retention';
        }
        // else not set

    }elseif($row['payment_type'] == 'Cashholder'){
        $_target = $row['tuition_hours'];
        if($_target >= 24 ){
            if($basic_rule) $sale_type = 'New Sale';
            else $sale_type = 'Retention';
        }else{
            if($basic_rule) $sale_type = 'Not set';
            else $sale_type = 'Retention';
        }
        // else not set
    }
    return $sale_type;
}
//Rule 1: Học viên không có lesson học trong 6tháng về trước
function newsaleSixMonth($student_id, $payment_id, $paymentDate){
    $listRevenue = get_list_revenue($student_id,"'Enrolled', 'Moving In', 'Settle'",'','','','','',$payment_id,true);
    if($listRevenue){
        end($listRevenue);
        $lastSessionEnd = strtotime($listRevenue[key($listRevenue)]["date_end"]);
        $paymentDateStr = strtotime($paymentDate." - 6 months  - 7 hours");
        if ($lastSessionEnd > $paymentDateStr) return false;
        else return true;
    }else return true;
}

//Rule 2: Nếu sử dụng payment moving/transfer
function newsaleMovingTransfer($payment_id){
    $q1 = "SELECT DISTINCT
    COUNT(IFNULL(l1.id, '')) count
    FROM
    j_payment
    INNER JOIN
    j_payment_j_payment_1_c l1_1 ON j_payment.id = l1_1.j_payment_j_payment_1j_payment_ida
    AND l1_1.deleted = 0
    INNER JOIN
    j_payment l1 ON l1.id = l1_1.j_payment_j_payment_1j_payment_idb
    AND l1.deleted = 0
    WHERE
    (((j_payment.id = '$payment_id')
    AND (l1.payment_type IN ('Transfer In' , 'Moving In', 'Transfer From AIMS'))))
    AND j_payment.deleted = 0";
    $count = $GLOBALS['db']->getOne($q1);
    if($count > 0) return false;
    else return true;
}

//Rule 3 - 4: Học viên đóng Enrollment có Dep/Cash < or <= 24h -> Sale Type là -none-:
function newsaleRelPay24($payment, $currentSaleType, $pmd_db_date = ''){
    global $timedate;    //get Team Code
    $q1 = "SELECT code_prefix FROM teams WHERE id = '{$payment['team_id']}'";
    $code_prefix = $GLOBALS['db']->getOne($q1);
    $mainday = (int)$GLOBALS['app_list_strings']['new_sale_range'][$code_prefix];
    if (empty($mainday) || !isset($mainday)) $mainday = 30;

    $payment_date_int = strtotime("-$mainday days ".$timedate->to_db_date($payment['payment_date']));
    if($currentSaleType) $currentSaleType = 'New Sale';
    else $currentSaleType = 'Retention';
    $q1 = "SELECT DISTINCT
    IFNULL(l1.id, '') l1_id,
    IFNULL(l1.name, '') l1_name,
    l1.total_hours l1_total_hours,
    l1.payment_date l1_payment_date,
    l1.sale_type  l1_sale_type,
    l1.sale_type_date  l1_sale_type_date,
    l1.payment_amount l1_payment_amount
    FROM
    j_payment
    INNER JOIN
    j_payment_j_payment_1_c l1_1 ON j_payment.id = l1_1.j_payment_j_payment_1j_payment_ida
    AND l1_1.deleted = 0
    INNER JOIN
    j_payment l1 ON l1.id = l1_1.j_payment_j_payment_1j_payment_idb
    AND l1.deleted = 0
    WHERE
    (((j_payment.id = '{$payment['payment_id']}')
    AND (l1.sale_type IN ('Retention', 'New Sale', 'Not set'))
    AND (l1.payment_type IN ('Deposit', 'Cashholder'))))
    AND j_payment.deleted = 0";
    $rs1 = $GLOBALS['db']->query($q1);
    while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
        $rel_date_int = strtotime($row['l1_payment_date']);
        if($row['l1_sale_type'] == 'Not set'){
            // TH 1 - 2
            if($currentSaleType == 'New Sale' && $payment_date_int >= $rel_date_int)
                $currentSaleType =  'Retention';
            if(empty($pmd_db_date))
                $GLOBALS['db']->query("UPDATE j_payment SET sale_type = '$currentSaleType', sale_type_date = '{$payment['payment_date']}' WHERE id = '{$row['l1_id']}'");
            else
                $GLOBALS['db']->query("UPDATE j_payment SET sale_type = '$currentSaleType', sale_type_date = '$pmd_db_date' WHERE id = '{$row['l1_id']}'");

        }else{
            //TH3 & 4:
            if($currentSaleType == 'New Sale' && $payment_date_int >= $rel_date_int)
                $currentSaleType =  'Retention';

            //TH5:
            if($row['l1_sale_type'] == 'Retention')
                $currentSaleType =  'Retention';

            //Fix bug thiếu Sale Type Date
            if(empty($row['l1_sale_type_date']))
                $GLOBALS['db']->query("UPDATE j_payment SET sale_type_date = '{$row['l1_payment_date']}' WHERE id = '{$row['l1_id']}'");
        }
    }
    if($currentSaleType == 'New Sale')
        return true;
    else return false;
}

function getTargetNewSale($team_id){
    $q1 = "SELECT l2.code_prefix code_prefix FROM teams LEFT JOIN teams l2 ON teams.parent_id = l2.id AND l2.deleted = 0 WHERE teams.id = '$team_id'";
    $parent_prefix = $GLOBALS['db']->getOne($q1);

    $amount = (int)$GLOBALS['app_list_strings']['new_sale_target_deposit'][$parent_prefix];
    if(empty($amount)) $amount=5280000;

    return $amount;
}
// END CHECK NEW SALE

//Get Waiting Class Enrolled from Student
function get_waiting_class($student_id){
    $q1 = "SELECT DISTINCT
    IFNULL(j_studentsituations.id, '') primaryid,
    IFNULL(j_studentsituations.name, '') name,
    IFNULL(l2.name, '') class_name,
    IFNULL(l2.id, '') class_id,
    IFNULL(l2.class_code, '') class_code,
    l2.class_type class_type,
    j_studentsituations.total_amount total_amount,
    j_studentsituations.total_hour total_hour
    FROM
    j_studentsituations
    INNER JOIN
    contacts l1 ON j_studentsituations.student_id = l1.id
    AND l1.deleted = 0
    INNER JOIN
    j_class l2 ON j_studentsituations.ju_class_id = l2.id
    AND l2.deleted = 0
    WHERE
    (((l1.id = '$student_id')
    AND (l2.class_type = 'Waiting Class')
    AND (j_studentsituations.type = 'Enrolled')))
    AND j_studentsituations.deleted = 0";
    return $GLOBALS['db']->fetchArray($q1);
}

function get_list_lesson_by_situation($class_id = '', $situation_id, $start_display = '', $end_display = '', $join = 'LEFT'){
    global $timedate;

    //    if(is_array($situation_id))
    //        $in_ext =  "IN ('".implode("','",$situation_id)."')";
    //    else $in_ext = "= '$situation_id'";

    $ext_start = '';
    if(!empty($start_display)){
        $start_tz     = date('Y-m-d H:i:s',strtotime("-7 hours ".$timedate->to_db_date($start_display,false)." 00:00:00"));
        $ext_start = "AND (meetings.date_start >= '$start_tz')";
    }
    $ext_end = '';
    if(!empty($end_display)){
        $end_tz     = date('Y-m-d H:i:s',strtotime("-7 hours ".$timedate->to_db_date($end_display    ,false)." 23:59:59"));
        $ext_end = "AND (meetings.date_end <= '$end_tz')";
    }
    $ext_class = '';
    if(!empty($class_id))
        $ext_class = "AND (l2.id = '$class_id')";

    $q1 = "SELECT DISTINCT
    IFNULL(l2.id, '') class_id,
    IFNULL(l3.id, '') situation_id,
    IFNULL(meetings.id, '') primaryid,
    meetings.lesson_number lesson_number,
    meetings.date_start date_start,
    meetings.date_end date_end,
    meetings.delivery_hour delivery_hour
    FROM
    meetings
    INNER JOIN
    j_class l2 ON meetings.ju_class_id = l2.id
    AND l2.deleted = 0
    $join JOIN
    meetings_contacts l1_1 ON meetings.id = l1_1.meeting_id
    AND l1_1.deleted = 0 AND l1_1.situation_id = '$situation_id'
    $join JOIN
    j_studentsituations l3 ON l1_1.situation_id = l3.id
    AND l3.deleted = 0 AND l3.id = '$situation_id'
    WHERE
    ((meetings.deleted = 0
    $ext_class
    $ext_start
    $ext_end
    AND (meetings.session_status <> 'Cancelled')))
    ORDER BY date_start ASC";

    return $GLOBALS['db']->fetchArray($q1);
}

function get_list_revenue_adult($student_id = '', $start_date = '', $end_date = '', $team_id = ''){
    $holiday_list = get_list_holidays_adult_revenue($start_date, $end_date);
    $ext_student = '';
    if(!empty($student_id)){
        $ext_student = "AND c.id = '$student_id'";
    }
    $sql_get_payment_list = "SELECT
    c.id student_id,
    jp.id payment_id,
    CASE
    WHEN jp.start_study >= '$start_date' THEN jp.start_study
    ELSE '$start_date'
    END AS start_study,
    CASE
    WHEN jp.end_study <= '$end_date' THEN jp.end_study
    ELSE '$end_date'
    END AS end_study,
    (jp.payment_amount + jp.deposit_amount + jp.paid_amount) / jp.tuition_hours AS payment_price
    FROM
    j_payment jp
    INNER JOIN
    contacts_j_payment_1_c cjp ON cjp.contacts_j_payment_1j_payment_idb = jp.id
    AND cjp.deleted = 0
    AND jp.deleted = 0
    AND jp.start_study <= '$end_date'
    AND jp.end_study >= '$start_date'
    INNER JOIN
    contacts c ON c.id = cjp.contacts_j_payment_1contacts_ida
    AND c.deleted = 0
    $ext_student
    AND jp.team_id = '$team_id'";
    $payment_list = array();
    $rs = $GLOBALS['db']->query($sql_get_payment_list);
    while($row_payment = $GLOBALS['db']->fetchByAssoc($rs)){
        $delivery_day = count_revenue_date_adult($row_payment['start_study'], $row_payment['end_study'], $holiday_list);
        $payment_list[] = array(
            'student_id'        => $row_payment['student_id'],
            'delivery_day'      => $delivery_day,
            'delivery_revenue'  => $delivery_day * $row_payment['payment_price'],
            'date_start'        => $row_payment['start_study'],
            'cost_per_day'      => $row_payment['payment_price'],
            'payment_id'        => $row_payment['payment_id'],
        );
    }
    return $payment_list;
}

function count_revenue_date_adult($start_date, $end_date, $holiday_list){
    $revenue_day = 0;
    $end = strtotime($end_date);
    $run_date = strtotime($start_date);
    while($run_date <= $end){
        if(!in_array($run_date,$holiday_list))
            $revenue_day += 1;
        $run_date = strtotime('+1 day', $run_date);
    }
    return $revenue_day;
}
function cal_finish_date_adult($pay_start_db, $run_remain){
        $holidays = get_list_holidays_adult($pay_start_db);
        $run_date = $pay_start_db;
        $holiday_list = array();
        while($run_remain > 1){
            if(!in_array($run_date , $holidays))
                $run_remain-=1;
            else
                $holiday_list[] = $run_date;

            $run_date = date('Y-m-d',strtotime('+1 day ', strtotime($run_date)));
        }
        $pay_end_db = $run_date;
        return $pay_end_db;
}
?>
