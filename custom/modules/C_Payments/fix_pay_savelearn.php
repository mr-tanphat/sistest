<?php
    global $timedate;
    $q1 = "SELECT DISTINCT IFNULL(c_payments.id,'') primaryid ,IFNULL(c_payments.name,'') c_payments_name ,c_payments.payment_amount c_payments_payment_amount ,IFNULL( c_payments.currency_id,'') C_PAYMENTS_PAYMENT_AMOF1CE92 ,IFNULL(c_payments.payment_method,'') c_payments_payment_method ,IFNULL(c_payments.payment_type,'') c_payments_payment_type ,IFNULL(l3.id,'') l3_id ,IFNULL(l3.name,'') l3_name FROM c_payments INNER JOIN c_invoices_c_payments_1_c l1_1 ON c_payments.id=l1_1.c_invoices_c_payments_1c_payments_idb AND l1_1.deleted=0 INNER JOIN c_invoices l1 ON l1.id=l1_1.c_invoices_c_payments_1c_invoices_ida AND l1.deleted=0 INNER JOIN c_invoices_opportunities_1_c l2_1 ON l1.id=l2_1.c_invoices_opportunities_1c_invoices_ida AND l2_1.deleted=0 INNER JOIN opportunities l2 ON l2.id=l2_1.c_invoices_opportunities_1opportunities_idb AND l2.deleted=0 INNER JOIN c_packages_opportunities_1_c l3_1 ON l2.id=l3_1.c_packages_opportunities_1opportunities_idb AND l3_1.deleted=0 INNER JOIN c_packages l3 ON l3.id=l3_1.c_packages_opportunities_1c_packages_ida AND l3.deleted=0 WHERE (((l3.package_type = 'Save&Learn' ))) AND c_payments.deleted=0 ORDER BY l3_name ASC ";
    $rs1 = $GLOBALS['db']->query($q1);
    $count = 0;
    while($row1 = $GLOBALS['db']->fetchByAssoc($rs1)){
        
      $q2 = "UPDATE c_payments SET payment_method='Other', payment_type = 'Transfer in' WHERE id='{$row1['primaryid']}'";
      $GLOBALS['db']->query($q2);
      $count++;
    }
    echo "<b>Updated $count</b>";
?>
