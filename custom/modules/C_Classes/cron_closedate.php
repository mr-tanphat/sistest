<?php
    global $timedate;
    $nowDb = $timedate->nowDbDate();
    $q1 = "SELECT id, end_date FROM c_classes WHERE end_date <= '$nowDb'";
    $rs1 = $GLOBALS['db']->query($q1);
    while($row1 = $GLOBALS['db']->fetchByAssoc($rs1)){
        $q2 = "UPDATE c_classes SET status = 'Closed' WHERE id='{$row1['id']}'";
        $GLOBALS['db']->query($q2); 
    }
?>
