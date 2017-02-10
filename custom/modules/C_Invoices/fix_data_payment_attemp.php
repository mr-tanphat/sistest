<?php
    global $timedate;
    $q1 = "SELECT DISTINCT
    IFNULL(c_invoices.id, '') primaryid,
    COUNT(l1.id) l1__allcount,
    COUNT(DISTINCT l1.id) l1__count,
    MAX(IFNULL(c_invoices.payment_attempts, 0)) C_INVOICES_MAX_PAYMENTD9B442
    FROM
    c_invoices
    INNER JOIN
    c_invoices_c_payments_1_c l1_1 ON c_invoices.id = l1_1.c_invoices_c_payments_1c_invoices_ida
    AND l1_1.deleted = 0
    INNER JOIN
    c_payments l1 ON l1.id = l1_1.c_invoices_c_payments_1c_payments_idb
    AND l1.deleted = 0
    WHERE
    (((c_invoices.status <> 'Deleted')))
    AND c_invoices.deleted = 0
    GROUP BY c_invoices.id
    ORDER BY primaryid ASC";

    $rs1 = $GLOBALS['db']->query($q1);
    $count = 0;
    while($row1 = $GLOBALS['db']->fetchByAssoc($rs1)){
        $q2 = "UPDATE c_invoices SET payment_attempts = {$row1['l1__count']} WHERE id='{$row1['primaryid']}'";
        $GLOBALS['db']->query($q2);
        $count++; 
    }
    echo "$count updated";
?>
