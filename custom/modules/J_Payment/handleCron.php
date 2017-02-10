<?php
include_once('include/MVC/preDispatch.php');
require_once('include/entryPoint.php');
switch ($_GET['type']) {
    case 'drop_expired':
        $result = drop_expired($_GET);
        break;
    default;
        echo 'What\'s do you want ?? ';
        die();
        break;
}


//############## CRON EXPIRED DATE - DROP TO REVENUE AUTOMATIC
function drop_expired($get){
    $date = new DateTime('first day of last month');
    $filter_date = $date->format('Y-m-d');
    die();
    global $timedate;
    $q1 = "SELECT DISTINCT
    IFNULL(j_payment.id, '') primaryid,
    IFNULL(j_payment.name, '')payment_name,
    IFNULL(j_payment.payment_type, '') payment_type,
    j_payment.payment_expired payment_expired,
    j_payment.remain_amount remain_amount,
    j_payment.remain_hours remain_hours,
    IFNULL(l1.id, '') center_id,
    IFNULL(l1.name, '') center_name,
    IFNULL(l2.id, '') student_id,
    CONCAT(IFNULL(l2.last_name, ''),
    ' ',
    IFNULL(l2.first_name, '')) student_name,
    IFNULL(l3.id, '') user_id
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
    INNER JOIN
    users l3 ON j_payment.assigned_user_id = l3.id
    AND l3.deleted = 0
    WHERE
    (((((j_payment.payment_type IN ('Deposit' ,
    'Delay',
    'Transfer In',
    'Moving In',
    'Transfer From AIMS', 'Merge AIMS', 'Placement Test'))
    AND (j_payment.payment_expired < '{$timedate->nowDbDate()}')
    AND (j_payment.do_not_drop_revenue = 0)
    AND (j_payment.status = 'Success')
    AND (((j_payment.remain_amount > 0)
    OR (j_payment.remain_hours > 0)))))))
    AND j_payment.deleted = 0
    AND l1.id = '61c0344a-efc6-f48c-3464-561c61c08052'";
    //    "";

    $drs = $GLOBALS['db']->fetchArray($q1);
    for($i = 0; $i < count($drs); $i++){
//        $q2 = "DELETE FROM c_deliveryrevenue WHERE ju_payment_id = '{$drs[$i]['primaryid']}' AND passed = 0";
//        $GLOBALS['db']->query($q2);

        $delivery = new C_DeliveryRevenue();
        $delivery->name = 'Drop revenue from payment '.$drs[$i]['payment_name'];
        $delivery->student_id = $drs[$i]['student_id'];
        //Get Payment ID
        $delivery->ju_payment_id = $drs[$i]['primaryid'];
        $delivery->type = 'Junior';
        $delivery->amount = format_number($drs[$i]['remain_amount']);
        $delivery->duration = format_number($drs[$i]['remain_hours'],2,2);
        $delivery->date_input = $drs[$i]['payment_expired'];
        $delivery->session_id = '1';
        $delivery->passed = 0;
        $delivery->description = ' Dropped Revenue. Payment '.$drs[$i]['payment_name'].' expired at '.$timedate->to_display_date($drs[$i]['payment_expired'],false);
        $delivery->team_id = $drs[$i]['center_id'];
        $delivery->team_set_id = $drs[$i]['center_id'];
        $delivery->cost_per_hour = format_number($drs[$i]['remain_amount'] / $drs[$i]['remain_hours'],2,2);
        $delivery->assigned_user_id = $drs[$i]['user_id'];
        $delivery->revenue_type = 'Enrolled';
        $delivery->save();  ///#####

        $q3 = "UPDATE j_payment SET remain_amount=0, remain_hours=0, status='Closed'  WHERE id = '{$delivery->ju_payment_id}' AND deleted=0";
        $GLOBALS['db']->query($q3);
    }
}

?>
