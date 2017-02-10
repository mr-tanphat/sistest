<?php
    $q1 = "SELECT DISTINCT opportunities.id primary_id, IFNULL(l1.id,'') l1_id ,IFNULL(l1.name,'') l1_name ,l1.amount l1_amount ,IFNULL( l1.currency_id,'') l1_amount_currency ,l1.balance l1_balance ,IFNULL( l1.currency_id,'') l1_balance_currency ,IFNULL(l1.status,'') l1_status FROM opportunities INNER JOIN c_invoices_opportunities_1_c l1_1 ON opportunities.id=l1_1.c_invoices_opportunities_1opportunities_idb AND l1_1.deleted=0 INNER JOIN c_invoices l1 ON l1.id=l1_1.c_invoices_opportunities_1c_invoices_ida AND l1.deleted=0 WHERE (((opportunities.sales_stage = 'Success' ) AND (l1.amount > 0 ))) AND opportunities.deleted=0";
    $rs1 = $GLOBALS['db']->query($q1);
    $count = 0;
    while($row1 = $GLOBALS['db']->fetchByAssoc($rs1)){
        $q2 = "SELECT DISTINCT
        IFNULL(c_payments.id, '') primaryid,
        c_payments.payment_amount c_payments_payment_amount,
        c_payments.payment_attempt c_payments_payment_attempt,
        IFNULL(c_payments.currency_id, '') C_PAYMENTS_PAYMENT_AMOF1CE92,
        IFNULL(c_payments.status, '') c_payments_status,
        c_payments.payment_date c_payments_payment_date
        FROM
        c_payments
        INNER JOIN
        c_invoices_c_payments_1_c l1_1 ON c_payments.id = l1_1.c_invoices_c_payments_1c_payments_idb
        AND l1_1.deleted = 0
        INNER JOIN
        c_invoices l1 ON l1.id = l1_1.c_invoices_c_payments_1c_invoices_ida
        AND l1.deleted = 0
        INNER JOIN
        c_invoices_opportunities_1_c l2_1 ON l1.id = l2_1.c_invoices_opportunities_1c_invoices_ida
        AND l2_1.deleted = 0
        INNER JOIN
        opportunities l2 ON l2.id = l2_1.c_invoices_opportunities_1opportunities_idb
        AND l2.deleted = 0
        WHERE
        (((l2.id = '{$row1['primary_id']}')))
        AND c_payments.deleted = 0
        ORDER BY c_payments_payment_attempt ASC";
        $total_paid = 0;
        $rs2 = $GLOBALS['db']->query($q2);
        while($row2 = $GLOBALS['db']->fetchByAssoc($rs2)){
            if($row2['c_payments_status'] == 'Paid')
                $total_paid += $row2['c_payments_payment_amount'];   
        }
        if($total_paid >= $row1['l1_amount']){
            $q2 = "UPDATE c_invoices SET balance = 0, status = 'Paid' WHERE id='{$row1['l1_id']}'";
            $GLOBALS['db']->query($q2);   
        }else{
            $balance =  $row1['l1_amount'] - $total_paid;
           $q3 = "UPDATE c_invoices SET balance = $balance, status = 'Unpaid' WHERE id='{$row1['l1_id']}'";
           $GLOBALS['db']->query($q3); 
        }
        $count++; 
    }
    echo "$count updated";
?>
