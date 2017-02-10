<?php
$today = date('Y-m-d');

//UPDATE In Progress
//$q1 = "SELECT DISTINCT
//IFNULL(contacts.id, '') primaryid
//FROM
//contacts
//INNER JOIN
//j_studentsituations l1 ON contacts.id = l1.student_id
//AND l1.deleted = 0
//WHERE
//(((l1.start_study <= '$today')
//AND (l1.end_study >= '$today')
//AND (l1.type IN ('Enrolled','Settle','Moving In'))))
//AND contacts.deleted = 0";
//$row1 = $GLOBALS['db']->fetchArray($q1);
//if(!empty($row1)){
//    $u1 = "UPDATE contacts SET contact_status = 'In Progress' WHERE id IN ('".implode("','",array_column($row1, 'primaryid'))."')";
//    $GLOBALS['db']->query($u1);
//}
//UPDATE OutStanding
//$q2 = "SELECT DISTINCT
//IFNULL(contacts.id, '') primaryid
//FROM
//contacts
//INNER JOIN
//j_studentsituations l1 ON contacts.id = l1.student_id
//AND l1.deleted = 0
//WHERE
//(((l1.start_study <= '$today')
//AND (l1.end_study >= '$today')
//AND (l1.type IN ('OutStanding'))
//AND contacts.contact_status NOT IN ('In Progress')))
//AND contacts.deleted = 0";
//$row2 = $GLOBALS['db']->fetchArray($q2);
//if(!empty($row2)){
//    $u2 = "UPDATE contacts SET contact_status = 'OutStanding' WHERE id IN ('".implode("','",array_column($row2, 'primaryid'))."')";
//    $GLOBALS['db']->query($u2);
//}
//
//UPDATE Delayed
//$q3 = "SELECT DISTINCT
//IFNULL(contacts.id, '') primaryid
//FROM
//contacts
//INNER JOIN
//j_studentsituations l1 ON contacts.id = l1.student_id
//AND l1.deleted = 0
//WHERE
//(((l1.start_study <= '$today')
//AND (l1.end_study >= '$today')
//AND (l1.type IN ('Delayed','Stopped'))
//AND contacts.contact_status IN ('In Progress', 'OutStanding')))
//AND contacts.deleted = 0";
//$row3 = $GLOBALS['db']->fetchArray($q3);
//if(!empty($row3)){
//    $u3 = "UPDATE contacts SET contact_status = 'Delayed' WHERE id IN ('".implode("','",array_column($row3, 'primaryid'))."')";
//    $GLOBALS['db']->query($u3);
//}

//UPDATE Finished
$q4 = "SELECT DISTINCT
IFNULL(st.id, '') primaryid
FROM
contacts st
INNER JOIN
j_studentsituations ss ON ss.student_id = st.id AND ss.deleted = 0
AND st.deleted = 0
AND st.contact_status = 'In Progress'
GROUP BY st.id
HAVING MAX(ss.end_study) <= '$today'";
$row4 = $GLOBALS['db']->fetchArray($q4);
if(!empty($row4)){
    $u4 = "UPDATE contacts SET contact_status = 'Finished' WHERE id IN ('".implode("','",array_column($row4, 'primaryid'))."')";
    $GLOBALS['db']->query($u4);
}

//UPDATE Waiting for class
//$u5 = "UPDATE contacts SET contact_status = 'Waiting for class' WHERE contact_status NOT IN ('In Progress', 'OutStanding', 'Delayed', 'Finished') AND deleted = 0";
//$GLOBALS['db']->query($u5);
?>