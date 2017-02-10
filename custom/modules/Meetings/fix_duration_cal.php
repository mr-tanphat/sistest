<?php
global $timedate;
$q1 = "SELECT DISTINCT
IFNULL(meetings.id, '') primaryid,
meetings.duration_cal duration_cal,
IFNULL(l2.id, '') l2_id,
IFNULL(l2.name, '') l2_name
FROM
meetings
INNER JOIN
c_classes l1 ON meetings.class_id = l1.id
AND l1.deleted = 0
INNER JOIN
teams l2 ON meetings.team_id = l2.id
AND l2.deleted = 0
WHERE
(((meetings.date_start >= '2016-06-30 17:00:00'
AND meetings.date_start <= '2016-07-31 16:59:59')
AND (meetings.meeting_type = 'Session')
AND (l1.type = 'Connect Club')))
AND meetings.deleted = 0";
$rs1 = $GLOBALS['db']->query($q1);
$count = 0;
while($row1 = $GLOBALS['db']->fetchByAssoc($rs1)){
    $teaching_hour = $row1['duration_cal'] * 2;
    $q2 = "UPDATE meetings SET teaching_hour=$teaching_hour WHERE id='{$row1['primaryid']}'";
    $GLOBALS['db']->query($q2);
    $count++;
}
echo "<b>Updated $count</b>";
?>
