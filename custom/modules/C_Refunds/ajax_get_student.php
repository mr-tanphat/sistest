<?php
    $student = BeanFactory::getBean('Contacts', $_POST['student_id']);
    //Count Free Balance
    $sql = "SELECT DISTINCT
    SUM(c_payments.remain) total_free_balance
    FROM
    c_payments
    INNER JOIN
    contacts_c_payments_1_c l1_1 ON c_payments.id = l1_1.contacts_c_payments_1c_payments_idb
    AND l1_1.deleted = 0
    INNER JOIN
    contacts l1 ON l1.id = l1_1.contacts_c_payments_1contacts_ida
    AND l1.deleted = 0
    WHERE
    (((c_payments.remain > 0)
    AND (c_payments.status = 'Paid')
    AND (l1.id = '{$_POST['student_id']}')))
    AND c_payments.deleted = 0";
    $free_balance = $GLOBALS['db']->getOne($sql);

    $free_balance = format_number($free_balance,0,0);
    $current_team_id = $student->team_id;
    
    // Get payment free balance
    $student_id = $_POST['student_id'];
    $sql = "SELECT DISTINCT
    IFNULL(c_payments.id, '') primaryid,
    IFNULL(c_payments.payment_type, '') payment_type,
    c_payments.payment_amount payment_amount,
    c_payments.remain remain
    FROM
    c_payments
    INNER JOIN
    contacts_c_payments_1_c l1_1 ON c_payments.id = l1_1.contacts_c_payments_1c_payments_idb
    AND l1_1.deleted = 0
    INNER JOIN
    contacts l1 ON l1.id = l1_1.contacts_c_payments_1contacts_ida
    AND l1.deleted = 0
    WHERE
    (((l1.id = '$student_id')
    AND (c_payments.payment_type IN ('FreeBalance'))
    AND (c_payments.remain > 0)))
    AND c_payments.deleted = 0";

    $payment_list = $GLOBALS['db']->fetchArray($sql);
    $html = "<label id='free_balance_select_label' style='color: rgb(68, 68, 68); padding: 0.6em; display: inline; background-color: rgb(238, 238, 238);'>Payment List: </label>
    <select name='payment_list[]' id='payment_list' style='vertical-align: middle;'>";
    for($i =0 ; $i < count($payment_list) ; $i++){
        if($i == 0)
            $sle = "selected";
        else
            $sle = "";
        $html .= "<option $sle amount='".format_number($payment_list[$i]['remain'])."' value='{$payment_list[$i]['primaryid']}'>{$payment_list[$i]['payment_type']} : ".format_number($payment_list[$i]['remain'])."</option>";  
    }
    $html .= "</select>";
    //Javascript
    $js = <<<EOQ
    <script type="text/javascript">
        $('#payment_list').change(Calculated);  
    </script>
EOQ;

    echo json_encode(array(
        "success" => "1",
        "current_team_id" => $current_team_id,
        "month_year" => $last_date,
        "ending_balance" => $free_balance,
        "enroll_id" => $enroll_id,
        "enroll_name" => $enroll_name,
        "free_balance" => $free_balance,
        "html" => $html.$js,
    ));
