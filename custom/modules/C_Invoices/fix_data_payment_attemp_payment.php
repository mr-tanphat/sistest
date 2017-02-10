<?php
    global $timedate;
    $q1 = "SELECT DISTINCT
    IFNULL(c_payments.id, '') primaryid,
    IFNULL(c_payments.name, '') c_payments_name,
    c_payments.payment_amount c_payments_payment_amount,
    IFNULL(c_payments.currency_id, '') C_PAYMENTS_PAYMENT_AMOF1CE92,
    IFNULL(c_payments.payment_attempt, '') c_payments_payment_attempt,
    IFNULL(l1.id, '') l1_id,
    l1.payment_attempts l1_payment_attempts
FROM
    c_payments
        INNER JOIN
    c_invoices_c_payments_1_c l1_1 ON c_payments.id = l1_1.c_invoices_c_payments_1c_payments_idb
        AND l1_1.deleted = 0
        INNER JOIN
    c_invoices l1 ON l1.id = l1_1.c_invoices_c_payments_1c_invoices_ida
        AND l1.deleted = 0
WHERE
    (((c_payments.payment_type = 'Normal')
        AND (l1.payment_attempts = 1)
        AND ((c_payments.payment_attempt IS NULL
        OR c_payments.payment_attempt = 0))))
        AND c_payments.deleted = 0";

    $rs1 = $GLOBALS['db']->query($q1);
    $count = 0;
    while($row1 = $GLOBALS['db']->fetchByAssoc($rs1)){
        $q2 = "UPDATE c_payments SET payment_attempt = 1 WHERE id='{$row1['primaryid']}'";
        $GLOBALS['db']->query($q2);
        $count++; 
    }
    echo "$count updated";
?>
