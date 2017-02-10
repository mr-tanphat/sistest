<?php
$q1 = "SELECT DISTINCT
IFNULL(meetings_contacts.id, '') primaryid,
IFNULL(meetings_contacts.contact_id, '') contact_id,
IFNULL(meetings_contacts.meeting_id, '') meeting_id,
date(DATE_ADD(mt.date_start,INTERVAL 7 hour)) date_start,
st.start_study start_study,
IFNULL(st.id, '') situation_demo_id
FROM
meetings_contacts
INNER JOIN
meetings mt ON mt.id = meetings_contacts.meeting_id
AND mt.deleted = 0
INNER JOIN
j_class cl ON mt.ju_class_id = cl.id
AND cl.deleted = 0
LEFT JOIN
contacts ct ON ct.id = meetings_contacts.contact_id
AND ct.deleted = 0
LEFT JOIN
j_studentsituations st ON st.student_id = ct.id AND st.deleted = 0
AND st.type = 'Demo'
WHERE
meetings_contacts.deleted = 0
AND (meetings_contacts.situation_id = ''
OR meetings_contacts.situation_id IS NULL)";
$rs1 = $GLOBALS['db']->query($q1);
while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
    if(empty($row['situation_demo_id'])){
        $GLOBALS['db']->query("DELETE FROM meetings_contacts WHERE id='{$row['primaryid']}'");
    }else{
        if($row['date_start'] == $row['start_study']){
            $GLOBALS['db']->query("UPDATE meetings_contacts SET situation_id = '{$row['situation_demo_id']}' WHERE id = '{$row['primaryid']}'");
        }else{
            $GLOBALS['db']->query("DELETE FROM meetings_contacts WHERE id='{$row['primaryid']}'");
        }
    }
}
