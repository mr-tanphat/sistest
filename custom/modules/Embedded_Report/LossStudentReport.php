<?php
global $current_user,$timedate;
if(($current_user->is_admin <> '1') && !(ACLController::checkAccess('C_Commission', 'Edit', false)) && !ACLController::checkAccess('J_StudentSitations', 'list', false) )
    die("You do not have permision to view this report.");
$filter = str_replace(' ','',$this->where);
$parts  = explode("AND", $filter);

for($i = 0; $i < count($parts); $i++){
    if(strpos($parts[$i], "j_studentsituations.end_study>='") !== FALSE) $start_date = substr(get_string_between($parts[$i]),0,10);
    if(strpos($parts[$i], "j_studentsituations.end_study<='") !== FALSE) $end_date   = substr(get_string_between($parts[$i]),0,10);
    if(strpos($parts[$i], "j_studentsituations.end_study='") !== FALSE){
        $start_date = get_string_between($parts[$i]);
        $end_date   = $start_date;
    }
}
$html = '<table width="100%" border="0" cellpadding="0" cellspacing="0" class="reportlistView"><tbody>';
$html.= '<tr height="20"><th colspan =2 scope="col" align="center" class="reportlistViewMatrixThS1" valign="middle" wrap="">City</th>';
$html .= '<th colspan = 2  scope="col" align="center" class="reportlistViewMatrixThS1" valign="middle" wrap="">Center</th>';
$html .= '<th rowspan = 2 scope="col" align="center" class="reportlistViewMatrixThS1" valign="middle" wrap="">Student Name</th>';
$html .= '<th rowspan = 2 scope="col" align="center" class="reportlistViewMatrixThS1" valign="middle" wrap="">Birthdate</th>';
$html .= '<th rowspan = 2 scope="col" align="center" class="reportlistViewMatrixThS1" valign="middle" wrap="">Parent Phone</th>';
$html .= '<th rowspan = 2  scope="col" align="center" class="reportlistViewMatrixThS1" valign="middle" wrap="">Last Lesson Date</th>'; 
$html .= '<th rowspan = 2  scope="col" align="center" class="reportlistViewMatrixThS1" valign="middle" wrap="">Class Name</th>'; 
$html .= '<th rowspan = 2  scope="col" align="center" class="reportlistViewMatrixThS1" valign="middle" wrap="">Kind of Course</th>'; 
$html .= '<th rowspan = 2  scope="col" align="center" class="reportlistViewMatrixThS1" valign="middle" wrap="">Level</th>'; 
$html .= '<th rowspan = 2  scope="col" align="center" class="reportlistViewMatrixThS1" valign="middle" wrap="">Center Code</th>'; 
$html.= '<tr height="20"><th  scope="col" align="center" class="reportlistViewMatrixThS1" valign="middle" wrap="">City</th>';
$html .= '<th  scope="col" align="center" class="reportlistViewMatrixThS1" valign="middle" wrap="">Total</th>';
$html .= '<th   scope="col" align="center" class="reportlistViewMatrixThS1" valign="middle" wrap="">Center Name</th>';
$html .= '<th  scope="col" align="center" class="reportlistViewMatrixThS1" valign="middle" wrap="">Total</th></tr>';

$qTeam = "AND j_payment.team_set_id IN

(SELECT 
tst.team_set_id
FROM
team_sets_teams tst
INNER JOIN
team_memberships team_memberships ON tst.team_id = team_memberships.team_id
AND team_memberships.user_id = '{$current_user->id}'
AND team_memberships.deleted = 0)";
if ($GLOBALS['current_user']->isAdmin()){           
    $qTeam = "";
}

$sql_end_situ = "SELECT  
cp.contacts_j_payment_1contacts_ida contact_id,
c.full_student_name,
c.birthdate,
c.phone_mobile,
t.id center_id,
t.name center_name,
t.team_type, 
t.code_prefix center_code,
t2.id city_id,
t2.name city_name,
ss.end_study,
cl.id class_id,
cl.name class_name,
cl.kind_of_course,
cl.level,
SUM(p.remain_amount) remain_amount
FROM
contacts_j_payment_1_c cp
INNER JOIN
j_payment p ON cp.contacts_j_payment_1j_payment_idb = p.id
AND p.deleted = 0
AND cp.deleted = 0
AND p.payment_type IN ('Delay' , 'Transef In',
'Moving In',
'Deposit',
'Cashholder',
'Merge Aims',
'Transfer From Aims')
INNER JOIN

(SELECT 
student_id, MAX(end_study) end_study, ju_class_id

FROM
j_studentsituations
WHERE
type IN ('Enrolled' , 'Moving In')
AND deleted = 0
GROUP BY student_id
HAVING MAX(end_study) BETWEEN '$start_date' AND '$end_date') ss ON ss.student_id = cp.contacts_j_payment_1contacts_ida
INNER JOIN
j_studentsituations ss2 ON ss2.student_id = ss.student_id
AND ss.end_study = ss2.end_study
AND ss2.type IN ('moving in' , 'enrolled')
INNER JOIN
j_class cl ON cl.id = ss2.ju_class_id AND cl.deleted = 0 
AND cl.kind_of_course NOT IN ('Cambridge' , 'Outing Trip')
AND cl.class_type <> 'Waiting Class'
INNER JOIN
teams t ON t.id = cl.team_id
AND t.team_type = 'Junior'
INNER JOIN
teams t2 ON t2.id = t.parent_id
AND t2.parent_id IN ('4e3de4c1-2c5e-6c00-3494-55667b495afe')
INNER JOIN
contacts c ON c.id = cp.contacts_j_payment_1contacts_ida
INNER JOIN
(SELECT
j_payment.id payment_id,
MAX(IFNULL(jp2.date_entered, j_payment.date_entered)) AS date_modified
FROM
j_payment
LEFT JOIN j_payment_j_payment_1_c jjp ON j_payment.id = jjp.j_payment_j_payment_1j_payment_idb
LEFT JOIN j_payment jp2 ON jp2.id = jjp.j_payment_j_payment_1j_payment_ida
WHERE
j_payment.deleted = 0
$qTeam
GROUP BY j_payment.id) jpm ON jpm.payment_id = p.id
#AND convert(date_add(jpm.date_modified, interval -7 day),date) <= '$end_date'
GROUP BY contact_id
HAVING remain_amount < 500000
ORDER BY CASE city_name WHEN 'HCM' then 0
when 'HN' then 1
when 'HP' then 2
WHEN 'BN' then 3
WHEN 'DN' then 4
WHEN 'BH' then 5
WHEN 'BD' then 6 end, center_name";
$end_situ_rs = $GLOBALS['db']->fetchArray($sql_end_situ);
$row_span = array();
foreach($end_situ_rs as $key=>$value){
    $row_span[$value['city_id']]['total']+= 1;
    $row_span[$value['city_id']][$value['center_id']]+= 1;
}
if(!empty($end_situ_rs)){
    $first = reset($end_situ_rs);
    $city_id = $first['city_id'];
    $center_id = $first['center_id'];
    $student_id = $first['contact_id'];
    $city_name = $first['city_name'] ;
    $total_of_city = $row_span[$first['city_id']]['total'];
    $center_name = $first['center_name'];
    $total_of_center = $row_span[$first['city_id']][$first['center_id']];
    $html .= '<tr height="20"><td rowspan = "'.$total_of_city.'" scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap=""  ><b>'.$city_name.'</b></td>';
    $html .= '<td rowspan = "'.$total_of_city.'" scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$total_of_city.'</td>';
    $html .= '<td rowspan = "'.$total_of_center.'" scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$center_name.'</td>';
    $html .= '<td rowspan = "'.$total_of_center.'" scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$total_of_center.'</td>';       
    $html .= "<td valign='TOP' class='oddListRowS1'><a href='index.php?module=Contacts&action=DetailView&record=$student_id' target='_blank'>".$first['full_student_name']."</td>";
    $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$timedate->to_display_date($first['birthdate'],false).'</td>';
    $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$first['phone_mobile'].'</td>';
    $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$timedate->to_display_date($first['end_study'],false).'</td>';
    $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$first['class_name'].'</td>';
    $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$first['kind_of_course'].'</td>';
    $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$first['level'].'</td>';
    $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$first['center_code'].'</td>';


}

foreach($end_situ_rs as $key=>$row){
    if($city_id == $row['city_id']) {
        if($center_id == $row['center_id']){
            if($student_id !== $row['contact_id']){
                $student_id = $row['contact_id'];
                $html .= "<td valign='TOP' class='oddListRowS1'><a href='index.php?module=Contacts&action=DetailView&record=$student_id' target='_blank'>".$row['full_student_name'].'</td>';
                $html .= '<td  scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$timedate->to_display_date($row['birthdate'],false).'</td>';
                $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$row['phone_mobile'].'</td>';
                $html .= '<td  scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$timedate->to_display_date($row['end_study'],false).'</td>';
                $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$row['class_name'].'</td>';
                $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$row['kind_of_course'].'</td>';
                $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$row['level'].'</td>';
                $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$row['center_code'].'</td>';
            }
        }else{
            $center_id = $row['center_id'];
            $student_id = $row['contact_id'];
            $html .= '<td rowspan = "'.$row_span[$city_id][$center_id].'" scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$row['center_name'].'</td>';
            $html .= '<td rowspan = "'.$row_span[$city_id][$center_id].'" scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$row_span[$city_id][$center_id].'</td>';
            $html .= "<td valign='TOP' class='oddListRowS1'><a href='index.php?module=Contacts&action=DetailView&record=$student_id' target='_blank'>".$row['full_student_name'].'</td>';
            $html .= '<td  scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$timedate->to_display_date($row['birthdate'],false).'</td>';
            $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$row['phone_mobile'].'</td>';
            $html .= '<td  scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$timedate->to_display_date($row['end_study'],false).'</td>';
            $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$row['class_name'].'</td>';
            $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$row['kind_of_course'].'</td>';
            $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$row['level'].'</td>';
            $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$row['center_code'].'</td>';
        }
    }else{
        $html.='</tr>';
        $city_id = $row['city_id'];
        $center_id = $row['center_id'];
        $student_id  = $row['student_id'];
        $html .= '<tr height="20"><td rowspan = "'.$row_span[$city_id]['total'].'" scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap=""  ><b>'.$row['city_name'].'</b></td>';
        $html .= '<td rowspan = "'.$row_span[$city_id]['total'].'" scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$row_span[$city_id]['total'].'</td>';
        $html .= '<td rowspan = "'.$row_span[$city_id][$center_id].'" scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$row['center_name'].'</td>';
        $html .= '<td rowspan = "'.$row_span[$city_id][$center_id].'" scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$row_span[$city_id][$center_id].'</td>';
        $html .= "<td valign='TOP' class='oddListRowS1'><a href='index.php?module=Contacts&action=DetailView&record=$student_id' target='_blank'>".$row['full_student_name'].'</td>';
        $html .= '<td  scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$timedate->to_display_date($row['birthdate'],false).'</td>';
        $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$row['phone_mobile'].'</td>';
        $html .= '<td  scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$timedate->to_display_date($row['end_study'],false).'</td>';
        $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$row['class_name'].'</td>';
        $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$row['kind_of_course'].'</td>';
        $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$row['level'].'</td>';
        $html .= '<td scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap="">'.$row['center_code'].'</td>';
    }
    $html.='</tr>';
}
$html .= '<tr height="20"><th colspan = 4 scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap=""  ><b>Total of Loss</b></th>';
$html .= '<th colspan = 8 scope="col" align="center" class="reportGroupByDataMatrixEvenListRowS1" valign="middle" wrap=""  ><b>'.count($end_situ_rs).'</b></th></tr>';

$html .= "</tbody></table>";
echo $html;

//JS
$js =
<<<EOQ
        <script>
        SUGAR.util.doWhen(
        function() {
           return $('#rowid0').find('td').eq(3).length == 1;
        },
        function() {
            $('#rowid0').find('td').eq(1).text('Last Lesson Date');
            $('#rowid0').find('td').eq(3).text('');
            });
        </script>
EOQ;

echo $js;    

?>
