<?php
    global $timedate;
    $q1 = "SELECT id, name, enrollment_id, created_by FROM c_deliveryrevenue WHERE passed = 0 ORDER BY c_deliveryrevenue.name ASC";
    $rs1 = $GLOBALS['db']->query($q1);
    $count = 0;
    while($row1 = $GLOBALS['db']->fetchByAssoc($rs1)){
        $q2 = "UPDATE opportunities SET sales_stage='Closed' WHERE id='{$row1['enrollment_id']}'";
        $GLOBALS['db']->query($q2);
        $count++;    
    }
    echo "<b>Updated $count</b>";
?>
