<?php
global $timedate, $current_user;
$html = '<table width="100%" border="0" cellpadding="0" cellspacing="0" class="reportlistView"><tbody><tr>';
$html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">No.</th>';
$html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">Student ID</th>';
$html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">Student Name</th>';
$html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">Parent</th>';
$html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">Mobile</th>';
$html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">Email</th>';
$html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">Birthdate</th>';
$html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">Gender</th>';
$html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">Source</th>';
$html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">Payment Type</th>';
$html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">Before Discount</th>';
$html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">Discount Amount</th>';
$html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">Sponsor Amount</th>';
$html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">Payment Amount</th>';
$html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">Invoice Date</th>';
$html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">VAT No.</th>';
$html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">Sale type</th>';
$html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">Sale Type Date</th>';
if($current_user->team_type == 'Junior')
    $html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">First EC</th>';
else
    $html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">First SM</th>';
$html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">Center</th>';
$html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">Center Code</th></tr>';
$count = 0;
//STUDENT:
$student_arr     = array();
$rows    = $GLOBALS['db']->fetchArray($this->query);
foreach( $rows as $key => $row){
    if(!in_array($row['l3_id'], $student_arr)){
        $student_arr[] = $row['l3_id'];
    }
}
$filter = str_replace(' ','',$this->where);
$parts  = explode("AND", $filter);
for($i = 0; $i < count($parts); $i++){
    if(strpos($parts[$i], "l2.id="))            $team_id = get_string_between($parts[$i]);
    if(strpos($parts[$i], "l2.idIN"))            $team_id = get_string_between($parts[$i],"('","')");
    if(strpos($parts[$i], "j_paymentdetail.payment_date>='") !== FALSE) $start_date = substr(get_string_between($parts[$i]),0,10);
    if(strpos($parts[$i], "j_paymentdetail.payment_date<='") !== FALSE) $end_date   = substr(get_string_between($parts[$i]),0,10);
    if(strpos($parts[$i], "j_paymentdetail.payment_date='") !== FALSE){
        $start_date = get_string_between($parts[$i]);
        $end_date   = $start_date;
    }
}
$ext_team = " AND p.team_id IN ('$team_id') ";
if(empty($team_id))
    $ext_team = "AND p.team_set_id IN
(SELECT
tst.team_set_id
FROM
team_sets_teams tst
INNER JOIN
team_memberships team_memberships ON tst.team_id = team_memberships.team_id
AND team_memberships.user_id = '{$current_user->id}'
AND team_memberships.deleted = 0)";
//PAYMENT
/*$sql = "SELECT DISTINCT
IFNULL(j_paymentdetail.id, '') primaryid,
j_paymentdetail.payment_date payment_date,
IFNULL(l2.id, '') l2_id
FROM
j_paymentdetail
INNER JOIN
j_payment l1 ON j_paymentdetail.payment_id = l1.id
AND l1.deleted = 0
INNER JOIN
contacts_j_payment_1_c l2_1 ON l1.id = l2_1.contacts_j_payment_1j_payment_idb
AND l2_1.deleted = 0
INNER JOIN
contacts l2 ON l2.id = l2_1.contacts_j_payment_1contacts_ida
AND l2.deleted = 0
WHERE
(((j_paymentdetail.status = 'Paid')
AND (j_paymentdetail.numeric_vat_no > 0)
AND (l1.payment_type IN ('Enrollment','Deposit','Cashholder'))
AND (l2.id IN ('".implode("','",$student_arr)."'))))
AND j_paymentdetail.deleted = 0
GROUP BY l2_id, payment_date ASC";
$row_payment = $GLOBALS['db']->fetchArray($sql); */
$sql = "SELECT
    cp.contacts_j_payment_1contacts_ida contact_id,
    p.id payment_id,
    ifnull(pd.id,'') primaryid,
    pd.invoice_number,
    pd.numeric_vat_no,
    p.sale_type,
    pd.payment_date invoice_date
FROM
    contacts_j_payment_1_c cp
        INNER JOIN
    j_payment p ON cp.contacts_j_payment_1j_payment_idb = p.id
        AND p.deleted = 0
        AND p.sale_type IN ('New Sale' , 'Not Set')
        AND p.kind_of_course NOT IN ('Outing Trip','Cambridge')
        AND (p.payment_type IN ('Deposit' , 'Cashholder')
        OR (p.payment_type = 'Enrollment'
        AND p.deposit_amount = 0
        AND p.paid_amount = 0))
        INNER JOIN
    j_paymentdetail pd ON pd.payment_id = p.id
        AND pd.status = 'Paid'
        AND pd.numeric_vat_no > 0
        $ext_team
GROUP BY contact_id, payment_id
HAVING MIN(pd.payment_date) BETWEEN '$start_date' AND '$end_date'
order by contact_id, invoice_date ";
$row_payment = $GLOBALS['db']->fetchArray($sql);
$student_payment = array();
$flag_student = '';

foreach( $row_payment as $key => $row_p){
    if($flag_student != $row_p['contact_id']){
        $flag_student = $row_p['contact_id'];
        $student_payment[] = $row_p['primaryid'];
    }
}

//EXPORT HTML
foreach( $rows as $key => $row){
    if(in_array($row['primaryid'], $student_payment)){
        $count++;
        $student_arr[] = $row['l3_id'];
        $html .= "<tr><td valign='TOP' class='oddListRowS1'>$count</td>";
        $html .= "<td valign='TOP' class='oddListRowS1'>{$row['l3_contact_id']}</td>";
        $html .= "<td valign='TOP' class='oddListRowS1'><a href='index.php?module=Contacts&action=DetailView&record={$row['l3_id']}' target='_blank'>{$row['l3_full_name']}</a></td>";
        $html .= "<td valign='TOP' class='oddListRowS1'>{$row['l5_name']}</td>";
        $html .= "<td valign='TOP' class='oddListRowS1' style=\"mso-number-format:\@;\" >{$row['l3_phone_mobile']}</td>";
        $html .= "<td valign='TOP' class='oddListRowS1'>{$row['l6_email_address']}</td>";
        $html .= "<td valign='TOP' class='oddListRowS1' style='mso-number-format:\"dd\/mm\/yyyy\";text-align: left;' >".$timedate->to_display_date($row['l3_birthdate'],false)."</td>";
        $html .= "<td valign='TOP' class='oddListRowS1'>{$row['l3_gender']}</td>";
        $html .= "<td valign='TOP' class='oddListRowS1'>{$row['l3_lead_source']}</td>";
        $html .= "<td valign='TOP' class='oddListRowS1'><a href='index.php?module=J_Payment&action=DetailView&record={$row['l1_id']}' target='_blank'>{$row['l1_payment_type']}</a></td>";

        $before    = format_number($row['J_PAYMENTDETAIL_BEFOREFD0B79']);
        $discount  = format_number($row['J_PAYMENTDETAIL_DISCOUB7F307']);
        $sponsor   = format_number($row['J_PAYMENTDETAIL_SPONSO604AE6']);
        $payment   = format_number($row['J_PAYMENTDETAIL_PAYMENF729B2']);

        $html .= "<td valign='TOP' class='oddListRowS1'>$before</td>";
        $html .= "<td valign='TOP' class='oddListRowS1'>$discount</td>";
        $html .= "<td valign='TOP' class='oddListRowS1'>$sponsor</td>";
        $html .= "<td valign='TOP' class='oddListRowS1'>$payment</td>";

        $html .= "<td valign='TOP' class='oddListRowS1' style='mso-number-format:\"dd\/mm\/yyyy\";text-align: left;' >".$timedate->to_display_date($row['J_PAYMENTDETAIL_PAYMEN74FF09'],false)."</td>";
        $html .= "<td valign='TOP' class='oddListRowS1' style=\"mso-number-format:\@;\" >{$row['J_PAYMENTDETAIL_INVOIC3CE203']}</td>";
        $html .= "<td valign='TOP' class='oddListRowS1'>{$GLOBALS['app_list_strings']['sale_type_payment_list'][$row['l1_sale_type']]}</td>";
        $html .= "<td valign='TOP' class='oddListRowS1' style='mso-number-format:\"dd\/mm\/yyyy\";text-align: left;' >".$timedate->to_display_date($row['l1_sale_type_date'],false)."</td>";
        $html .= "<td valign='TOP' class='oddListRowS1'>{$row['l4_full_user_name']}</td>";
        $html .= "<td valign='TOP' class='oddListRowS1'>{$row['l2_name']}</td>";
        $html .= "<td valign='TOP' class='oddListRowS1' style=\"mso-number-format:\@;\" >{$row['l2_code_prefix']}</td>";

        $beforet    += unformat_number($before);
        $discountt  += unformat_number($discount);
        $sponsort   += unformat_number($sponsor);
        $paymentt   += unformat_number($payment);
    }
}
$html .= "<tr>
<td colspan='10'><h3><span>Grand Total</span></h3></td>
<td><b>".format_number($beforet)."</b></td>
<td><b>".format_number($discountt)."</b></td>
<td><b>".format_number($sponsort)."</b></td>
<td><b>".format_number($paymentt)."</b></td>
<td colspan='7'></td>
</tr>
</tbody></table>";


$html .= '<table id="query_table" width="100%" cellpadding="0" cellspacing="0" border="0" class="formHeader h3Row">
<tbody><tr>
<td nowrap=""></td><td width="100%"><img height="1" width="1" src="themes/default/images/blank.gif" alt=""></td></tr>
</tbody></table>';

echo $html;
?>
