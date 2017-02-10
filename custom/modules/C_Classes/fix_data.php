<?php
    global $timedate;
    $q1 = "SELECT * FROM c_classes WHERE deleted = 0";
    $rs1 = $GLOBALS['db']->query($q1);
    $count = 0;
    while($row1 = $GLOBALS['db']->fetchByAssoc($rs1)){
        $q2 = "UPDATE c_classes SET stage_2='^{$row1['stage']}^' WHERE id='{$row1['id']}'";
        $GLOBALS['db']->query($q2);
        $count++;    
    }
    echo "<b>Updated $count</b>";
?>