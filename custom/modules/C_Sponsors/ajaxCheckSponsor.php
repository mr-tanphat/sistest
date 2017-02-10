<?php
    global $timedate;
    $today = $timedate->nowDbDate();
    //Mo check hang su dung
//    $q1 = "SELECT id, amount, IFNULL(description,'') description, name FROM c_sponsors WHERE deleted = 0 AND name='{$_POST['sponsor_code']}' AND is_used = 0  AND ( expired_date >= '$today' AND issue_date <= '$today')";
    $q1 = "SELECT id, amount, IFNULL(description,'') description, name, sponsor_percent FROM c_sponsors WHERE deleted = 0 AND name='{$_POST['sponsor_code']}' AND is_used = 0";
    $rs1 = $GLOBALS['db']->query($q1);
    $row = $GLOBALS['db']->fetchByAssoc($rs1);
    
    
    if(!empty($row['name']))
        echo json_encode(array(
            "success" => '1',
            "sponsor_code" => $row['name'],
            "sponsor_amount" => $row['amount'],
            "sponsor_percent" => $row['sponsor_percent'],
            "description" => $row['description'],
            "sponsor_id" => $row['id'],
        ));
    else
        echo json_encode(array(
            "success" => '0'
        ));
?>
