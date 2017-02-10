<?php
  global $timedate;
    $q1 = "SELECT * FROM c_payments WHERE deleted = 0 AND status='Paid' AND (payment_date is null or payment_date = '' or payment_date='0000-00-00')";
    $rs1 = $GLOBALS['db']->query($q1);
    $count = 0;
    while($row1 = $GLOBALS['db']->fetchByAssoc($rs1)){
      $date_modified = $timedate->to_display_date_time($row1['date_modified']);  
      $payment_date = $timedate->to_db_date(substr($date_modified,0,10),false);
      
      $q2 = "UPDATE c_payments SET payment_date='$payment_date' WHERE id='{$row1['id']}'";
      $GLOBALS['db']->query($q2);
      $count++;
    }
    echo "<b>Updated $count</b>";
?>
