<?php
    global $timedate;
    $date = $timedate->to_db_date($_POST['date'],false);
    $module = strtolower($_POST['module']);
    $q1 = "UPDATE {$_POST['module']} SET {$_POST['field']}='$date' WHERE id='{$_POST['id']}'";
    $rs1 = $GLOBALS['db']->query($q1);
    
    $q2 = "SELECT {$_POST['field']} FROM {$_POST['module']} WHERE id='{$_POST['id']}'";
    $select_date = $GLOBALS['db']->getOne($q2);
    $select_date = $timedate->to_display_date($select_date,false);
        echo json_encode(array(
            "success" => "1",
            "date" => $select_date,
        ));
        
        
        function qry_insert($table, $data){
        $fields = array_keys( $data );  
        $values = array_values( $data );
        return $GLOBALS['db']->query("INSERT INTO $table(".implode(",",$fields).") VALUES ('".implode("','", $values )."');");
    }
?>
