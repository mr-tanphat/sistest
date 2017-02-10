<?php
global $timedate,$current_user;
$filter = str_replace(' ','',$this->where);
$parts  = explode("AND", $filter);  
for($i = 0; $i < count($parts); $i++){
    if(strpos($parts[$i], "l1.id=") !== FALSE)                  $team_id    = get_string_between($parts[$i]);   
    if(strpos($parts[$i], "l2.idIN"))                           $team_id    = get_string_between($parts[$i],"('","')");
    if(strpos($parts[$i], "c_carryforward.month=") !== FALSE)   $month      = get_string_between($parts[$i]);
    if(strpos($parts[$i], "c_carryforward.year=") !== FALSE)    $year       = get_string_between($parts[$i]);
}

$ext_team = '';
if(!empty($team_id)) $ext_team = " AND t.id IN ('$team_id')";

$start      = date('Y-m-01',strtotime("$year-$month-01"));
$start_run  = strtotime($start_cf);
$end        = date('Y-m-t',strtotime("$year-$month-01")); //Last date of filter mounth
$end_run    = strtotime($end);
$first_date = get_first_payment_date($team_id);
$first_run  = strtotime($first_date);
/*$start_retention = date('Y-m-26',strtotime("$year-$month-26"));
$end_retention =   date('Y-m-25',strtotime("$year-($month+1)-25"));   */

/*$qTeam = "AND j_studentsituations.team_set_id IN
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
} */

if($this->saved_report->id == 'c737fbaf-fdce-1cf5-4680-585211740989'){
    $row_student = get_list_student($ext_team, $start, $end);    
}else if($this->saved_report->id == '868ad200-37c4-d190-4f2c-5875fba5d4b3'){
    $row_student = get_list_student_teacher_rate($ext_team, $start, $end);
}   

$stu_list = array_column($row_student,'student_id');
$str_student_list = "'".implode("','", array_map(function ($entry) {
    return $entry['student_id'];
    }, $row_student))."'";    

$arr_epp = array();

$row_return_in_month = get_retention_in_month($str_student_list, $start, $end);
$stu_id = '';                                        
foreach($row_student as $key=>$value){   
    $stu_id =    $value['student_id'];
    if(array_key_exists($stu_id, $row_return_in_month)){
        if($value['end_study'] <= $row_return_in_month[$stu_id]['payment_date'] && 
        $row_return_in_month[$stu_id]['payment_amount']>= 500000
        && $row_return_in_month[$stu_id]['team_id'] == $value['team_id']){
            $arr_epp[$stu_id]['student_id'] = $stu_id;
            $arr_epp[$stu_id]['left_class_id'] = $value['ju_class_id'];
            $arr_epp[$stu_id]['class_name'] = $value['class_name'];
            $arr_epp[$stu_id]['student_name'] = $value['student_name'];
            $arr_epp[$stu_id]['center_name'] = $value['center_name'];
            $arr_epp[$stu_id]['center_code'] = $value['center_code'];
            $arr_epp[$stu_id]['end_study'] = $value['end_study'];
            $arr_epp[$stu_id]['return_date'] = $row_return_in_month[$stu_id]['payment_date'];   
            $arr_epp[$stu_id]['kind_of_course'] = $value['kind_of_course'];
            $arr_epp[$stu_id]['count'] = 1;
            $arr_epp[$stu_id]['count_return'] = 1; 
            //unset($row_student[$key]); 
            $arr_search = array_keys($stu_list, $stu_id);
            if(!empty($arr_search)){
                foreach($arr_search as $k=>$v){
                    unset($row_student[$v]);
                    unset($stu_list[$v]);
                }
            }
        }      
    }   
}

//$row_student = array_values($row_student);    

$str_student_list = "'".implode("','", array_map(function ($entry) {
    return $entry['student_id'];
    }, $row_student))."'";  

$row_payment = get_list_payment($str_student_list, $start, $end);

$str_payment_list =   "'".implode("','", array_map(function ($entry) {
    return $entry['payment_id'];
    }, $row_payment))."'";   

$row_collected = get_collected($str_payment_list, $start, $end);

$row_cashin = get_cash_in($str_payment_list, $start, $end);

$row_cashout = get_cash_out($str_payment_list, $start, $end);

$row_revenue = get_revenue($team_id, $str_student_list, $str_payment_list, $first_date, $start, $end);

$row_settle = get_settle($team_id, $str_student_list, $str_payment_list, $first_date, $start, $end);



for($i = 0; $i < count($row_payment); $i++){      
    $collected_amount_alloc     = 0; 
    $revenue_amount_alloc       = 0;   
    if($i==97) $abc = 0;   
    $payment_id  = $row_payment[$i]['payment_id'];           

    $revenue_this_amount = $row_revenue[$payment_id]['this']['amount'];

    $revenue_till_this_amount = $row_revenue[$payment_id]['before_this']['amount'] + $row_revenue[$payment_id]['this']['amount'];

    $settle_this_amount = $row_settle[$payment_id]['this']['amount'];

    $settle_before_this_amount = $row_settle[$payment_id]['before_this']['amount'];

    $invoice_number = $row_collected[$payment_id]['before_this']['invoice_number'];
    if(empty($invoice_number)){
        $invoice_number = $row_collected[$payment_id]['this']['invoice_number'];
    } 

    $before_discount = (float)$row_collected[$payment_id]['this']['before_discount'];

    $discount_amount = (float)$row_collected[$payment_id]['this']['discount_amount'];

    $sponsor_amount = (float)$row_collected[$payment_id]['this']['sponsor_amount'];

    $collected_amount_this = (float)$row_collected[$payment_id]['this']['payment_amount'];

    $collected_amount_till_this = $collected_amount_this + (float)$row_collected[$payment_id]['before_this']['payment_amount'];

    //delay-cash-in
    $cash_in_this_amount = (float)$row_cashin[$payment_id]['this']['delay_cash_in']['amount'];

    $cash_in_before_this_amount = (float)$row_cashin[$payment_id]['before_this']['delay_cash_in']['amount'];

    $cash_out_this_amount = (float)$row_cashout[$payment_id]['this']['delay_cash_out']['amount'];

    $cash_out_before_this_amount = (float)$row_cashout[$payment_id]['before_this']['delay_cash_out']['amount'];

    $mv_tf_in_this_amount = (float)$row_cashin[$payment_id]['this']['moving_transfer_in']['amount'];

    $mv_tf_in_before_this_amount = (float)$row_cashin[$payment_id]['before_this']['moving_transfer_in']['amount'];

    //moving-transfer-out
    $mv_tf_out_this_amount = (float)$row_cashout[$payment_id]['this']['moving_transfer_out']['amount'];

    $mv_tf_out_before_this_amount = (float)$row_cashout[$payment_id]['before_this']['moving_transfer_out']['amount'];

    $refund_this_amount = (float)$row_cashout[$payment_id]['this']['refund']['amount'];

    $refund_before_this_amount = (float)$row_cashout[$payment_id]['before_this']['refund']['amount'];

    $beginning_amount = $collected_amount_till_this - $collected_amount_this - $revenue_till_this_amount + $revenue_this_amount + $mv_tf_in_before_this_amount - $mv_tf_out_before_this_amount + $cash_in_before_this_amount - $cash_out_before_this_amount - $refund_before_this_amount - $settle_before_this_amount;

    $carry_amount = $beginning_amount + $collected_amount_this - $revenue_this_amount + $mv_tf_in_this_amount - $mv_tf_out_this_amount + $cash_in_this_amount - $cash_out_this_amount - $refund_this_amount - $settle_this_amount;

    $cr_i = $i;             

    //Lam tron so 
    if(abs($carry_amount) < 1000){
        $carry_amount = 0;  
    } 
    if(abs($beginning_amount) < 1000 ){
        $beginning_amount = 0;    
    }

    //outstanding amount
    $out_standing     = 0;      
    $carry_amount_temp  = $carry_amount;   

    if($carry_amount < 0){       
        $out_standing = abs($carry_amount);
        $carry_amount_temp = 0;
    }

    if($carry_amount != 0 || $beginning_amount != 0 || $collected_amount_this != 0 || $revenue_till_this_amount != 0 ||  $mv_tf_in_this_amount != 0 || $mv_tf_out__this_amount != 0 || $cash_in__this_amount != 0 || $cash_out_this_amount != 0 || $refund_this_amount != 0){
        $count++;                           
        $beginning_amountt +=$beginning_amount;
        $before_discountt +=$before_discount;
        $discount_amountt +=$discount_amount;
        $sponsor_amountt +=$sponsor_amount;
        $collected_amountt +=$collected_amount_this;   
        $collected_hrs_alloct +=$collected_days_till_this;
        $collected_amount_alloct +=$collected_amount_till_this;   
        $cash_in_amountt +=$cash_in_this_amount;   
        $cash_out_amountt +=$cash_out_this_amount;   
        $revenue_amountt +=$revenue_this_amount;         
        $revenue_amount_alloct +=$revenue_till_this_amount; 
        $mv_tf_in_amountt +=$mv_tf_in_this_amount;   
        $mv_tf_out_amountt +=$mv_tf_out_this_amount;  
        $refund_amountt +=$refund_this_amount;  
        $carry_amount_tempt +=$carry_amount_temp;  
        $out_standingt +=$out_standing;
        //Tinh bao cao cho Bac Hung
        $arr_student[$row_payment[$i]['student_id']]['carry_amount']  += $carry_amount_temp;  
        /*if( ($carry_amount_temp) <= 500000)
        $arr_student[$row_payment[$i]['student_id']]['count_zero']  += 1;*/   //Student Run  
    }
}

$arr_student_epp = array();                            
foreach($arr_student as $keys=>$values){         
    if( $values['carry_amount'] <= 500000 ){              
        $arr_student_epp[] = $keys;                           
        /*if(in_array($keys, $stu_list)){
        unset($row_student[array_search($keys,$stu_list)]);  
        } */ 
    }                   
}

$list_stu_epp = "'".implode("','", $arr_student_epp)."'";

$arr_retention = check_retention($list_stu_epp, $end);

$stu_id = '';
foreach($row_student as $key=>$value){
    if($stu_id == $value['student_id']){
        unset($row_student[$key]);
        unset($stu_list[$key]);
    }else{
        $stu_id = $value['student_id'];
        if(in_array($stu_id, $arr_student_epp)){
            if(array_key_exists($stu_id, $arr_retention)){
                $arr_epp[$stu_id]['student_id'] = $stu_id;
                $arr_epp[$stu_id]['left_class_id'] = $value['ju_class_id'];
                $arr_epp[$stu_id]['class_name'] = $value['class_name'];
                $arr_epp[$stu_id]['student_name'] = $value['student_name'];
                $arr_epp[$stu_id]['center_name'] = $value['center_name'];
                $arr_epp[$stu_id]['center_code'] = $value['center_code'];
                $arr_epp[$stu_id]['end_study'] = $value['end_study'];
                $arr_epp[$stu_id]['return_date'] = $arr_retention[$stu_id]['return_date'];    
                $arr_epp[$stu_id]['kind_of_course'] = $value['kind_of_course'];
                $arr_epp[$stu_id]['count'] = 1;
                $arr_epp[$stu_id]['count_return'] = 1; 
                unset($row_student[$key]);
                unset($stu_list[$key]); 
            }else{
                $arr_epp[$stu_id]['student_id'] = $stu_id;
                $arr_epp[$stu_id]['left_class_id'] = $value['ju_class_id'];
                $arr_epp[$stu_id]['class_name'] = $value['class_name'];
                $arr_epp[$stu_id]['student_name'] = $value['student_name'];
                $arr_epp[$stu_id]['center_name'] = $value['center_name'];
                $arr_epp[$stu_id]['center_code'] = $value['center_code'];
                $arr_epp[$stu_id]['end_study'] = $value['end_study'];       
                $arr_epp[$stu_id]['kind_of_course'] = $value['kind_of_course'];
                $arr_epp[$stu_id]['count'] = 1;
                $arr_epp[$stu_id]['count_return'] = 0; 
            }  
        }    
    }  
}

$str_student_list = "'".implode("','", $stu_list)."'";
$arr_prepaid = check_pre_paid($str_student_list, $end);    
foreach($row_student as $key=>$value){
    $stu_id = $value['student_id'];
    if(array_key_exists($stu_id, $arr_prepaid) && $value['payment_date'] < $arr_prepaid[$stu_id]['payment_date']){
        $arr_epp[$stu_id]['student_id'] = $stu_id;
        $arr_epp[$stu_id]['left_class_id'] = $value['ju_class_id'];
        $arr_epp[$stu_id]['class_name'] = $value['class_name'];
        $arr_epp[$stu_id]['student_name'] = $value['student_name'];
        $arr_epp[$stu_id]['center_name'] = $value['center_name'];
        $arr_epp[$stu_id]['center_code'] = $value['center_code'];
        $arr_epp[$stu_id]['end_study'] = $value['end_study'];
        $arr_epp[$stu_id]['return_date'] = $arr_prepaid[$stu_id]['payment_date'];   
        $arr_epp[$stu_id]['kind_of_course'] = $value['kind_of_course'];
        $arr_epp[$stu_id]['count'] = 1;
        $arr_epp[$stu_id]['count_return'] = 1;    
    }
}

$arr_epp = array_orderby($arr_epp, 'center_code', SORT_STRING, 'kind_of_course', SORT_STRING, 'class_name', SORT_STRING);

$html = '';
//$diff = date_diff($end, $timedate->nowDbDate());
if($this->saved_report->id == 'c737fbaf-fdce-1cf5-4680-585211740989'){
    $count_koc = array();
    foreach($arr_epp as $key=>$value){
        $count_koc[$value['center_name']][$value['kind_of_course']]['count'] += 1;
        $count_koc[$value['center_name']]['total']['count'] += 1;
        if($value['kind_of_course'] == 'Kindy' || $value['kind_of_course'] == 'Kids' || $value['kind_of_course'] == 'Kids Plus' || $value['kind_of_course'] == 'Kids Extra' || $value['kind_of_course'] == 'Teens')
            $count_koc[$value['center_name']]['total_yl']['count'] += 1;
        if($value['count_return'] == 1){
            $count_koc[$value['center_name']][$value['kind_of_course']]['count_return'] += 1;
            $count_koc[$value['center_name']]['total']['count_return'] += 1;
            if($value['kind_of_course'] == 'Kindy' || $value['kind_of_course'] == 'Kids' || $value['kind_of_course'] == 'Kids Plus' || $value['kind_of_course'] == 'Kids Extra' || $value['kind_of_course'] == 'Teens')
                $count_koc[$value['center_name']]['total_yl']['count_return'] += 1;    
        }    
    }
    if(round(abs(strtotime($timedate->nowDbDate())-strtotime($end))/86400,0) < 180)
        $html .= "Tháng được chọn chưa hết hạn retention, số liệu chỉ mang tính tham khảo. <br><br><br>";
    $html .= '<table width="100%" border="0" cellpadding="0" cellspacing="0" class="reportlistView"><tbody>';
    $html .= '<tr height="20"><th rowspan = 2 align="center" class="reportlistViewThS1" valign="middle" nowrap="">Center</th>';
    $html .= '<th colspan = 4 align="center" class="reportlistViewThS1" valign="middle" nowrap="">Kindy</th>';
    $html .= '<th colspan = 4 align="center" class="reportlistViewThS1" valign="middle" nowrap="">Kids</th>';
    $html .= '<th colspan = 4 align="center" class="reportlistViewThS1" valign="middle" nowrap="">Kids Plus</th>';
    $html .= '<th colspan = 4 align="center" class="reportlistViewThS1" valign="middle" nowrap="">Kids Extra</th>';
    $html .= '<th colspan = 4 align="center" class="reportlistViewThS1" valign="middle" nowrap="">Teens</th>';
    $html .= '<th colspan = 4 align="center" class="reportlistViewThS1" valign="middle" nowrap="">Total YL</th>';
    $html .= '<th colspan = 4 align="center" class="reportlistViewThS1" valign="middle" nowrap="">GE</th>';
    $html .= '<th colspan = 4 align="center" class="reportlistViewThS1" valign="middle" nowrap="">BE</th>';
    $html .= '<th colspan = 4 align="center" class="reportlistViewThS1" valign="middle" nowrap="">Total Adult</th>';
    $html .= '<th colspan = 4 align="center" class="reportlistViewThS1" valign="middle" nowrap="">Total</th></tr>';

    $html .= '<tr><th width = 60 align="center" valign="middle" nowrap="">Total EPP student</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total student re-enroll</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total loss student</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">%</th>'; 
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total EPP student</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total student re-enroll</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total loss student</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">%</th>'; 
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total EPP student</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total student re-enroll</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total loss student</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">%</th>'; 
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total EPP student</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total student re-enroll</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total loss student</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">%</th>';  
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total EPP student</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total student re-enroll</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total loss student</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">%</th>'; 
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total EPP student</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total student re-enroll</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total loss student</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">%</th>'; 
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total EPP student</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total student re-enroll</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total loss student</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">%</th>'; 
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total EPP student</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total student re-enroll</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total loss student</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">%</th>'; 
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total EPP student</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total student re-enroll</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total loss student</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">%</th>'; 
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total EPP student</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total student re-enroll</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">Total loss student</th>';
    $html .= '<th width = 60 align="center"  valign="middle" nowrap="">%</th></tr>';  

    foreach($count_koc as $key=>$value){
        $html .=  "<td nowrap=''><strong>".$key."</strong></td>
        <td>".format_number($value['Kindy']['count'])."</td>
        <td>".format_number($value['Kindy']['count_return'])."</td>
        <td>".format_number($value['Kindy']['count']-$value['Kindy']['count_return'])."</td>
        <td>".format_number($value['Kindy']['count_return']/$value['Kindy']['count']*100,2,2)."%</td>
        <td>".format_number($value['Kids']['count'])."</td>
        <td>".format_number($value['Kids']['count_return'])."</td>
        <td>".format_number($value['Kids']['count']-$value['Kids']['count_return'])."</td>
        <td>".format_number($value['Kids']['count_return']/$value['Kids']['count']*100,2,2)."%</td>
        <td>".format_number($value['Kids Plus']['count'])."</td>
        <td>".format_number($value['Kids Plus']['count_return'])."</td>
        <td>".format_number($value['Kids Plus']['count']-$value['Kids Plus']['count_return'])."</td>
        <td>".format_number($value['Kids Plus']['count_return']/$value['Kids Plus']['count']*100,2,2)."%</td>
        <td>".format_number($value['Kids Extra']['count'])."</td>
        <td>".format_number($value['Kids Extra']['count_return'])."</td>
        <td>".format_number($value['Kids Extra']['count']-$value['Kids Extra']['count_return'])."</td>
        <td>".format_number($value['Kids Extra']['count_return']/$value['Kids Extra']['count']*100,2,2)."%</td>
        <td>".format_number($value['Teens']['count'])."</td>
        <td>".format_number($value['Teens']['count_return'])."</td>
        <td>".format_number($value['Teens']['count']-$value['Teens']['count_return'])."</td>
        <td>".format_number($value['Teens']['count_return']/$value['Teens']['count']*100,2,2)."%</td>
        <td>".format_number($value['total_yl']['count'])."</td>
        <td>".format_number($value['total_yl']['count_return'])."</td>
        <td>".format_number($value['total_yl']['count']-$value['total_yl']['count_return'])."</td>
        <td>".format_number($value['total_yl']['count_return']/$value['total_yl']['count']*100,2,2)."%</td>
        <td>".format_number($value['GE']['count'])."</td>
        <td>".format_number($value['GE']['count_return'])."</td>
        <td>".format_number($value['GE']['count']-$value['GE']['count_return'])."</td>
        <td>".format_number($value['GE']['count_return']/$value['GE']['count']*100,2,2)."%</td>
        <td>".format_number($value['BE']['count'])."</td>
        <td>".format_number($value['BE']['count_return'])."</td>
        <td>".format_number($value['BE']['count']-$value['BE']['count_return'])."</td>
        <td>".format_number($value['BE']['count_return']/$value['BE']['count']*100,2,2)."%</td>
        <td>".format_number($value['total']['count'] - $value['total_yl']['count'])."</td>
        <td>".format_number($value['total']['count_return'] - $value['total_yl']['count_return'])."</td>
        <td>".format_number($value['total']['count'] - $value['total_yl']['count'] - $value['total']['count_return'] + $value['total_yl']['count_return'])."</td>
        <td>".format_number(($value['total']['count_return'] - $value['total_yl']['count_return'])/($value['total']['count'] - $value['total_yl']['count'])*100,2,2)."%</td>
        <td>".format_number($value['total']['count'])."</td>
        <td>".format_number($value['total']['count_return'])."</td>
        <td>".format_number($value['total']['count']-$value['total']['count_return'])."</td>
        <td>".format_number($value['total']['count_return']/$value['total']['count']*100,2,2)."%</td></tr>";
    }  
    $html .= "</tbody></table>";
    //if(empty(strpos("'",$team_id)) && !empty($team_id)){
    $html .= "<br><br>";
    $html .= "<h3>Student List</h3><br><br>";
    $html .= '<table width="59%" border="0" cellpadding="0" cellspacing="0" class="reportlistView"><tbody>';
    $html .= '<tr height="20"><th width = 50 align="center" class="reportlistViewThS1" valign="middle" nowrap="">SEQ</th>';
    $html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">Student Name</th>';
    $html .= '<th align="center" class="reportlistViewThS1" valign="middle" nowrap="">Class Name</th>';
    $html .= '<th width = 100 align="center" class="reportlistViewThS1" valign="middle" nowrap="">Kind of Course</th>';
    $html .= '<th width = 100 align="center" class="reportlistViewThS1" valign="middle" nowrap="">Last Lesson Date</th>';
    $html .= '<th width = 100 align="center" class="reportlistViewThS1" valign="middle" nowrap="">Return Date</th>';  
    $html .= '<th width = 50 align="center" class="reportlistViewThS1" valign="middle" nowrap="">Center Code</th></tr>';  
    /*usort($arr_epp, function($a, $b) {
    return strcmp($a['class_name'], $b['class_name']);
    });*/ 
    $seq = 0;
    foreach($arr_epp as $key=>$value){
        $seq++;
        $html .= "<tr><td valign='TOP' class='oddListRowS1'>$seq</td>";
        $html .= "<td valign='TOP' class='oddListRowS1'><a href='index.php?module=Contacts&action=DetailView&record={$value['student_id']}' target='_blank'>".$value['student_name']."</td>";
        $html .= "<td valign='TOP' class='oddListRowS1'><a href='index.php?module=J_Class&action=DetailView&record={$value['left_class_id']}' target='_blank'>".$value['class_name']."</td>";
        $html .= "<td valign='TOP' class='oddListRowS1'>".$value['kind_of_course']."</td>";
        $html .= "<td valign='TOP' class='oddListRowS1' style='mso-number-format:\"Short Date\";text-align: center;'>".$timedate->to_display_date($value['end_study'],false)."</td>";
        $html .= "<td valign='TOP' class='oddListRowS1' style='mso-number-format:\"Short Date\";text-align: center;'>".$timedate->to_display_date($value['return_date'],false)."</td>"; 
        $html .= "<td valign='TOP' class='oddListRowS1'>".$value['center_code']."</td></tr>";              
    }
    //}
    $html .= "</tbody></table>";

}



echo $html;

function check_pre_paid($student_id, $end){
    $sql_pre_paid = "SELECT 
    cp.contacts_j_payment_1contacts_ida student_id,
    p.id payment_id,
    MAX(p.payment_date) payment_date
    FROM
    contacts_j_payment_1_c cp
    INNER JOIN
    j_payment p ON p.id = cp.contacts_j_payment_1j_payment_idb
    AND cp.deleted = 0
    AND p.deleted = 0
    AND p.payment_date < '$end'
    AND p.sale_type = 'Retention'
    AND cp.contacts_j_payment_1contacts_ida IN ($student_id)
    INNER JOIN
    j_paymentdetail pd ON pd.payment_id = p.id AND pd.deleted = 0
    AND pd.status = 'Paid'
    AND pd.payment_amount > 500000
    GROUP BY student_id";
    $rs_pre_paid = $GLOBALS['db']->query($sql_pre_paid);
    $data_pre_paid = array();
    while($row_prepaid = $GLOBALS['db']->fetchByAssoc($rs_pre_paid)){
        $data_pre_paid[$row_prepaid['student_id']]['payment_date'] = $row_prepaid['payment_date'];
        $data_pre_paid[$row_prepaid['student_id']]['payment_id'] = $row_prepaid['payment_id'];   
    }
    return $data_pre_paid;
}

function check_retention($student_id, $end){
    $sql_check = "SELECT 
    cp.contacts_j_payment_1contacts_ida student_id,
    MIN(pd.payment_date)   return_date
    FROM
    contacts_j_payment_1_c cp
    INNER JOIN
    j_payment p ON p.id = cp.contacts_j_payment_1j_payment_idb
    AND cp.deleted = 0
    AND p.deleted = 0
    INNER JOIN
    j_paymentdetail pd ON pd.payment_id = p.id AND pd.deleted = 0
    AND pd.status = 'Paid'
    AND pd.payment_amount > 0
    AND p.sale_type = 'Retention'
    AND pd.payment_date > '$end'
    AND cp.contacts_j_payment_1contacts_ida IN ($student_id)
    GROUP BY student_id ";
    $rs_reten =  $GLOBALS['db']->query($sql_check);
    $data_reten = array();
    while($row_reten = $GLOBALS['db']->fetchByAssoc($rs_reten)){
        $data_reten[$row_reten['student_id']]['return_date'] = $row_reten['return_date'];    
    }    
    return $data_reten; 
}

function get_retention_in_month($student_id, $start, $end){
    $sql_retention_in_month = "SELECT 
    cp.contacts_j_payment_1contacts_ida student_id,
    p.id payment_id,
    pd.payment_amount,
    pd.invoice_number,
    pd.payment_date,
    pd.team_id
    FROM
    contacts_j_payment_1_c cp
    INNER JOIN
    j_payment p ON p.id = cp.contacts_j_payment_1j_payment_idb
    AND p.deleted = 0
    AND cp.deleted = 0
    INNER JOIN
    j_paymentdetail pd ON p.id = pd.payment_id AND pd.deleted = 0
    AND pd.status = 'Paid'
    AND pd.payment_amount > 0
    AND p.sale_type = 'Retention'
    AND pd.payment_date BETWEEN '$start' AND '$end'
    AND cp.contacts_j_payment_1contacts_ida IN ($student_id)";
    $rs =  $GLOBALS['db']->query($sql_retention_in_month);
    $data = array();
    while($row = $GLOBALS['db']->fetchByAssoc($rs)){
        //$data[$row['student_id']]['payment_id']  += $row['payment_id'];
        $data[$row['student_id']]['payment_amount']  += $row['payment_amount'];
        //$data[$row['student_id']]['invoice_number']  += $row['invoice_number'];
        $data[$row['student_id']]['payment_date']  = max($row['payment_date'],$data[$row['student_id']]['payment_date']);
        if($data[$row['student_id']]['team_id'] !== $row['team_id'])
            $data[$row['student_id']]['team_id']  .= $row['team_id'];
    }
    $sql_transfer_in = "SELECT 
    cp.contacts_j_payment_1contacts_ida student_id,
    p.id payment_id,
    p.payment_amount,
    p.payment_date,
    p.team_id
    FROM
    contacts_j_payment_1_c cp
    INNER JOIN
    j_payment p ON p.id = cp.contacts_j_payment_1j_payment_idb
    AND p.deleted = 0
    AND cp.deleted = 0
    AND p.payment_date BETWEEN '$start' AND '$end'
    AND p.payment_type IN ('Transefer In' , 'Transfer From AIMS')
    AND cp.contacts_j_payment_1contacts_ida IN ($student_id)";
    $rs2 = $GLOBALS['db']->query($sql_transfer_in);
    while($row2 = $GLOBALS['db']->fetchByAssoc($rs2)){
        $data[$row2['student_id']]['payment_amount']  += $row2['payment_amount'];         
        $data[$row2['student_id']]['payment_date']  = max($row2['payment_date'],$data[$row2['student_id']]['payment_date']);
        if($data[$row2['student_id']]['team_id'] !== $row2['team_id'])
            $data[$row2['student_id']]['team_id']  .= $row2['team_id'];    
    }
    return $data;
}

function get_revenue($team_id, $student_id, $payment_id, $first_date, $start, $end){
    $data =  get_list_revenue_report($team_id, $student_id, $payment_id, "'Enrolled','Moving In','Stopped'", $first_date, $start, $end, 'Planning');

    //Tinh doanh thu Drop
    $ext_student = '';
    if(!empty($student_id))
        $ext_student = "AND (c_deliveryrevenue.student_id IN ($student_id))";

    $ext_team = '';
    if(!empty($team_id))
        $ext_team = "AND (l3.id = '$team_id')";

    $q1 = "SELECT
    IFNULL(l1.id, '') ju_payment_id,
    c_deliveryrevenue.date_input,
    IFNULL(SUM(c_deliveryrevenue.amount), 0) amount   
    FROM
    c_deliveryrevenue
    INNER JOIN
    j_payment l1 ON c_deliveryrevenue.ju_payment_id = l1.id
    AND l1.deleted = 0
    INNER JOIN
    users l2 ON c_deliveryrevenue.created_by = l2.id
    AND l2.deleted = 0
    INNER JOIN
    teams l3 ON c_deliveryrevenue.team_id = l3.id
    AND l3.deleted = 0
    WHERE
    (((c_deliveryrevenue.passed IS NULL
    OR c_deliveryrevenue.passed = '0')
    AND (c_deliveryrevenue.date_input >= '$first_date'
    AND c_deliveryrevenue.date_input <= '$end')
    $ext_team
    $ext_student))
    AND c_deliveryrevenue.deleted = 0
    GROUP BY ju_payment_id, date_input";
    $rs = $GLOBALS['db']->query($q1);
    while($row = $GLOBALS['db']->fetchbyAssoc($rs)){
        if($row['date_input'] < $start){
            $data[$row['ju_payment_id']]['before_this']['amount']  += $row['amount'];      
        }else{
            $data[$row['ju_payment_id']]['this']['amount']  += $row['amount'];        
        }
    }
    return $data;
}    

function get_settle($team_id, $student_id, $payment_id, $first_date, $start, $end){
    //Tính doanh thu Settle
    $data =  get_list_revenue_report($team_id, $student_id, $payment_id, "'Settle'", $first_date, $start, $end, 'Planning');
    return $data;
}

function get_list_revenue_report($team_id = '', $student_id = '', $payment_id = '', $situation_type = "'Enrolled'", $first_date ,$start = '', $end = '', $not_status = ''){

    $ext_team = "AND (l5.id = '$team_id')";
    if(empty($team_id))
        $ext_team = "";

    $ext_student = "AND (l1.id IN ($student_id))";
    if(empty($student_id))
        $ext_student = "";

    $ext_payment_id  = "AND l4.id IN ($payment_id)";
    if(empty($payment_id))
        $ext_payment_id = "";

    $ext_situation = "AND l3.type IN($situation_type)";
    if($situation_type == "All" || empty($situation_type))
        $ext_situation = "";

    if(!empty($first_date)){
        $start_tz     = date('Y-m-d H:i:s',strtotime("-7 hours ".$first_date." 00:00:00"));
        $ext_start = "AND (meetings.date_start >= '$start_tz')";
    }else $ext_start = '';

    if(!empty($end)){
        $end_tz     = date('Y-m-d H:i:s',strtotime("-7 hours ".$end." 23:59:59"));
        $ext_end = "AND (meetings.date_end <= '$end_tz')";
    }else $ext_end = '';

    $ext_status = "AND (l2.status <> '$not_status')";
    if(empty($not_status))
        $ext_status = "";

    $select_date = "DATE_ADD(meetings.date_start, INTERVAL 7 HOUR)";
    //Set Revenue Settle
    if($situation_type == "'Settle'"){
        if(!empty($end)){
            $ext_end = "AND (l4.payment_date <= '$end')";
        }else $ext_end = '';

        if(!empty($first_date)){
            $ext_start = "AND (l4.payment_date >= '$first_date')";
        }else $ext_start = '';
        $select_date = "l4.payment_date";
    }
    //    AVG(IFNULL((l3.total_amount/l3.total_hour), 0)) cost_per_hour,
    $q1 = "SELECT DISTINCT
    IFNULL(l4.id, '') ju_payment_id,
    #DATE_FORMAT($select_date, '%m-%Y') month_year,
    CASE
    WHEN
    CONVERT($select_date, DATE) < '$start'
    THEN
    'before_this'
    ELSE 'this'
    END AS till_time,
    SUM(IFNULL(meetings.delivery_hour, 0)) total_revenue_hours,
    SUM(IFNULL((IFNULL((l3.total_amount/l3.total_hour), 0) * meetings.delivery_hour), 0)) total_revenue_amount
    FROM
    meetings
    INNER JOIN
    meetings_contacts l1_1 ON meetings.id = l1_1.meeting_id
    AND l1_1.deleted = 0
    INNER JOIN
    contacts l1 ON l1.id = l1_1.contact_id
    AND l1.deleted = 0
    INNER JOIN
    j_class l2 ON meetings.ju_class_id = l2.id
    AND l2.deleted = 0
    INNER JOIN
    j_studentsituations l3 ON l1_1.situation_id = l3.id
    AND l3.deleted = 0 $ext_situation
    LEFT JOIN
    j_payment l4 ON l3.payment_id = l4.id
    AND l4.deleted = 0
    INNER JOIN
    teams l5 ON meetings.team_id = l5.id
    AND l5.deleted = 0
    WHERE
    ((meetings.deleted = 0
    $ext_student
    $ext_payment_id
    $ext_start $ext_end
    $ext_team
    $ext_status
    AND (meetings.session_status <> 'Cancelled')))
    GROUP BY ju_payment_id, till_time";
    $rs = $GLOBALS['db']->query($q1);

    while($row = $GLOBALS['db']->fetchbyAssoc($rs)){
        $data[$row['ju_payment_id']][$row['till_time']]['amount']  = $row['total_revenue_amount'];  
    }
    return $data;
}

function get_cash_out($payment_id, $start, $end){
    /*$ext_student = '';
    if(!empty($student_id)){
    $ext_student = "AND (l3.id IN ($student_id))";   
    }*/
    $q1 = "SELECT
    IFNULL(l1.id, '') payment_id_out,
    CASE
    WHEN
    DATE_ADD(j_payment.date_entered,
    INTERVAL 7 HOUR) < '$start'
    THEN
    'before_this'
    ELSE 'this'
    END AS till_time,
    (CASE 
    WHEN j_payment.payment_type IN ('Transfer Out', 'Moving Out') THEN 'moving_transfer_out'
    WHEN j_payment.payment_type IN ('Refund') THEN 'refund'
    ELSE 'delay_cash_out'
    END) as payment_type_group,
    IFNULL(SUM(l1_1.amount), 0) amount
    FROM
    j_payment
    INNER JOIN
    j_payment_j_payment_1_c l1_1 ON j_payment.id = l1_1.j_payment_j_payment_1j_payment_ida
    AND l1_1.deleted = 0
    INNER JOIN
    j_payment l1 ON l1.id = l1_1.j_payment_j_payment_1j_payment_idb
    AND l1.deleted = 0
    WHERE 
    l1.id IN ($payment_id)
    AND convert(date_add(j_payment.date_entered, interval 7 hour),date) <= '$end' 
    AND j_payment.deleted = 0
    GROUP BY payment_id_out, till_time, payment_type_group";

    $rs = $GLOBALS['db']->query($q1);
    $data = array();
    while($row = $GLOBALS['db']->fetchbyAssoc($rs)){
        $data[$row['payment_id_out']][$row['till_time']][$row['payment_type_group']]['amount'] = $row['amount'];           
    }
    return $data;

}

function get_cash_in($payment_id, $start, $end){
    /*$ext_student = '';
    if(!empty($student_id)){
    $ext_student = "AND (l3.id IN ($student_id))";   
    } */
    $q1 = "SELECT
    IFNULL(j_payment.id, '') payment_id,
    CASE
    WHEN
    DATE_ADD(j_payment.date_entered,
    INTERVAL 7 HOUR) < '$start'
    THEN
    'before_this'
    ELSE 'this'
    END AS till_time,
    (CASE 
    WHEN l1.payment_type IN ('Transfer In', 'Moving In', 'Transfer From AIMS') THEN 'moving_transfer_in'
    ELSE 'delay_cash_in'
    END) as payment_type_group,
    IFNULL(SUM(l1_1.amount), 0) amount
    FROM
    j_payment
    INNER JOIN
    j_payment_j_payment_1_c l1_1 ON j_payment.id = l1_1.j_payment_j_payment_1j_payment_ida
    AND l1_1.deleted = 0
    INNER JOIN
    j_payment l1 ON l1.id = l1_1.j_payment_j_payment_1j_payment_idb
    AND l1.deleted = 0
    WHERE
    j_payment.id in ($payment_id)
    AND convert(date_add(j_payment.date_entered, interval 7 hour),date) <= '$end'
    AND j_payment.deleted = 0
    GROUP BY payment_id, till_time, payment_type_group"; 
    $rs = $GLOBALS['db']->query($q1);
    $data = array();
    while($row = $GLOBALS['db']->fetchbyAssoc($rs)){        
        $data[$row['payment_id']][$row['till_time']][$row['payment_type_group']]['amount'] = $row['amount'];   
    }
    //    var_dump($data); die();
    return $data;

}

function get_collected($payment_id, $start, $end)  {
    // get total payment
    /*$ext_student = '';
    if(!empty($student_id)){
    $ext_student = "AND (l3.id = '$student_id')";   
    } */
    $q1 = "  SELECT
    IFNULL(l2.id, '') payment_id,
    IFNULL(GROUP_CONCAT(j_paymentdetail.invoice_number SEPARATOR ' '), '') invoice_number,
    CASE
    WHEN
    j_paymentdetail.payment_date < '$start'
    THEN
    'before_this'
    ELSE 'this'
    END AS till_time,
    IFNULL(SUM(j_paymentdetail.before_discount), 0) before_discount,
    IFNULL(SUM(j_paymentdetail.discount_amount), 0) discount_amount,
    IFNULL(SUM(j_paymentdetail.sponsor_amount), 0) sponsor_amount,
    IFNULL(SUM(j_paymentdetail.payment_amount), 0) payment_amount
    FROM
    j_paymentdetail
    INNER JOIN
    /*teams l1 ON j_paymentdetail.team_id = l1.id
    AND l1.deleted = 0 
    INNER JOIN */
    j_payment l2 ON j_paymentdetail.payment_id = l2.id
    AND l2.deleted = 0
    INNER JOIN
    contacts_j_payment_1_c l3_1 ON l2.id = l3_1.contacts_j_payment_1j_payment_idb
    AND l3_1.deleted = 0
    INNER JOIN
    contacts l3 ON l3.id = l3_1.contacts_j_payment_1contacts_ida
    AND l3.deleted = 0     
    WHERE
    j_paymentdetail.payment_id in ($payment_id)
    AND j_paymentdetail.payment_date <= '$end'
    AND j_paymentdetail.status = 'Paid'
    AND j_paymentdetail.deleted = 0
    GROUP BY payment_id, till_time";
    //    AND ((COALESCE(LENGTH(j_paymentdetail.invoice_number),0) > 0))
    $rs = $GLOBALS['db']->query($q1);
    $data = array();
    while($row = $GLOBALS['db']->fetchbyAssoc($rs)){

        $data[$row['payment_id']][$row['till_time']]['invoice_number']   = $row['invoice_number'];     
        $data[$row['payment_id']][$row['till_time']]['before_discount']   = $row['before_discount'];     
        $data[$row['payment_id']][$row['till_time']]['discount_amount']   = $row['discount_amount'];     
        $data[$row['payment_id']][$row['till_time']]['sponsor_amount']    = $row['sponsor_amount'];     
        $data[$row['payment_id']][$row['till_time']]['payment_amount']    = $row['payment_amount'];  
    }
    return $data;  
}

function get_list_payment($student_list, $start, $end){
    $sql_payment_list = "SELECT DISTINCT
    IFNULL(j_payment.id, '') payment_id,
    IFNULL(j_payment.kind_of_course_string, '') kind_of_course_string,
    IFNULL(j_payment.level_string, '') level_string,
    IFNULL(j_payment.class_string, '') class_string,
    IFNULL(l2.id, '') student_id,
    IFNULL(l2.contact_id, '') student_code,
    IFNULL(l2.aims_code, '') aims_code,
    IFNULL(l2.aims_id, '') aims_id,
    IFNULL(l1.id, '') team_id,
    CONCAT(IFNULL(l2.last_name, ''),
    ' ',
    IFNULL(l2.first_name, '')) student_name,
    j_payment.payment_date payment_date,
    IFNULL(j_payment.payment_type, '') payment_type,
    IFNULL(j_payment.tuition_hours, 0) tuition_hours,
    IFNULL(j_payment.total_hours, 0) total_hours,
    IFNULL(j_payment.discount_percent, 0) discount_percent,
    IFNULL(j_payment.final_sponsor_percent, 0) final_sponsor_percent,
    IFNULL(j_payment.payment_amount, 0) payment_amount,
    IFNULL(j_payment.deposit_amount, 0) deposit_amount,
    IFNULL(j_payment.paid_amount, 0) paid_amount,
    IFNULL((j_payment.payment_amount + j_payment.deposit_amount) / (j_payment.total_hours),
    0) payment_price,
    IFNULL(j_payment.aims_id,0) payment_aims_id
    FROM
    j_payment
    LEFT OUTER JOIN
    (SELECT
    cd.date_input, jp.id payment_id
    FROM
    c_deliveryrevenue cd
    INNER JOIN j_payment jp ON jp.id = cd.ju_payment_id
    AND jp.payment_type = 'Enrollment'
    WHERE
    cd.passed = 0 AND cd.deleted = 0
    AND cd.type = 'Junior') cd ON cd.payment_id = j_payment.id
    INNER JOIN
    (SELECT
    j_payment.id,
    MAX(IFNULL(jp2.date_entered, j_payment.date_entered)) AS date_modified
    FROM
    j_payment
    LEFT JOIN j_payment_j_payment_1_c jjp ON j_payment.id = jjp.j_payment_j_payment_1j_payment_idb
    LEFT JOIN j_payment jp2 ON jp2.id = jjp.j_payment_j_payment_1j_payment_ida
    WHERE
    j_payment.deleted = 0

    GROUP BY j_payment.id) jpm ON j_payment.id = jpm.id
    LEFT JOIN
    (SELECT
    payment_id, MIN(start_study) start_study, MAX(end_study) end_study
    FROM
    j_studentsituations
    WHERE
    IFNULL(payment_id, '') <> ''
    AND deleted = 0
    AND student_id in ($student_list)
    GROUP BY payment_id) gss ON gss.payment_id = j_payment.id
    INNER JOIN
    teams l1 ON j_payment.team_id = l1.id
    AND  l1.deleted = 0 
    INNER JOIN
    contacts_j_payment_1_c cjp ON j_payment.id = cjp.contacts_j_payment_1j_payment_idb
    AND cjp.deleted = 0
    INNER JOIN
    contacts l2 ON l2.id = cjp.contacts_j_payment_1contacts_ida
    AND l2.deleted = 0
    WHERE
    ((j_payment.payment_type IN ('Deposit' , 'Cashholder',
    'Delay',
    'Transfer In',
    'Transfer From AIMS',
    'Moving In',
    'Merge AIMS',
    'Placement Test',
    'Schedule Change')
    AND (j_payment.remain_amount > 0      
    OR (j_payment.payment_amount - j_payment.used_amount > 0
    AND j_payment.payment_expired >= '$start')
    OR date_add(jpm.date_modified, interval 7 hour) >= '$start'))
    OR (j_payment.payment_type = 'Enrollment'
    AND (ifnull(gss.end_study,j_payment.end_study) >= '$start'
    OR  date_add(jpm.date_modified, interval 7 hour) >= '$start'
    OR j_payment.class_string LIKE '%-W'
    OR IFNULL(cd.date_input, '1900-01-01') >= '$start')))
    AND (j_payment.payment_date <= '$end'
    OR convert(date_add(j_payment.date_entered, interval 7 hour),date) <= '$end')
    AND j_payment.deleted = 0
    and l2.id in ($student_list)
    GROUP BY j_payment.id
    ORDER BY l2.id ASC";

    return $GLOBALS['db']->fetchArray($sql_payment_list);
}

function get_list_student($ext_team, $start, $end){
    $qTeam = "AND ss.team_set_id IN
    (SELECT 
    tst.team_set_id
    FROM
    team_sets_teams tst
    INNER JOIN
    team_memberships team_memberships ON tst.team_id = team_memberships.team_id
    AND team_memberships.user_id = '{$GLOBALS['current_user']->id}'
    AND team_memberships.deleted = 0)";
    if ($GLOBALS['current_user']->isAdmin()){           
        $qTeam = "";
    }
    $sql_student = "SELECT 
    ss.student_id,
    ss.name student_name,
    CASE
    WHEN ss.type = 'Settle' THEN p.payment_date
    ELSE ss.end_study
    END AS end_study,
    ss.total_hour,
    ss.ju_class_id,
    c.name class_name,
    ss.payment_id,
    p.payment_date,
    c.kind_of_course,
    ss.team_id,
    t.name center_name,
    t.code_prefix center_code
    FROM
    j_studentsituations ss
    INNER JOIN
    j_class c ON c.id = ss.ju_class_id AND c.deleted = 0
    INNER JOIN
    teams t on t.id = ss.team_id
    $ext_team 
    $qTeam   
    inner join 
    j_kindofcourse koc ON koc.id = c.koc_id
    AND (koc.kind_of_course IN ('Kindy' , 'Kids', 'Kids Plus', 'Kids Extra')
    OR (koc.kind_of_course = 'Teens'
    AND c.level NOT IN ('Advance'))
    OR (koc.kind_of_course IN ('GE','BE')
    AND c.level NOT IN ('Advance' , 'Upper Inter')))
    INNER JOIN
    j_payment p ON p.id = ss.payment_id AND p.deleted = 0
    WHERE
    ss.end_study BETWEEN '$start' AND '$end'
    AND ss.deleted = 0
    AND (ss.type IN ('Enrolled' , 'Moving In')
    OR (ss.type = 'Settle'
    AND ROUND(p.payment_amount + p.paid_amount + p.deposit_amount,
    0) = ROUND(ss.total_amount, 0)))
    group by student_id, ss.payment_id
    ORDER BY student_id ASC , end_study DESC";

    return $GLOBALS['db']->fetchArray($sql_student);    
}

function get_list_student_teacher_rate($ext_team, $start, $end){
    $qTeam = "AND c.team_set_id IN
    (SELECT 
    tst.team_set_id
    FROM
    team_sets_teams tst
    INNER JOIN
    team_memberships team_memberships ON tst.team_id = team_memberships.team_id
    AND team_memberships.user_id = '{$GLOBALS['current_user']->id}'
    AND team_memberships.deleted = 0)";
    if ($GLOBALS['current_user']->isAdmin()){           
        $qTeam = "";
    }
    $sql = "SELECT 
    c.id class_id,
    c.end_date,
    ct.id student_id,
    ct.full_student_name,
    c.name class_name
    FROM
    j_class c
    INNER JOIN
    j_class_contacts_1_c cc ON cc.j_class_contacts_1j_class_ida = c.id
    AND c.deleted = 0
    AND cc.deleted = 0
    $qTeam
    AND c.end_date BETWEEN '$start' AND '$end'
    INNER JOIN
    contacts ct ON ct.id = cc.j_class_contacts_1contacts_idb
    AND ct.deleted = 0
    INNER JOIN
    (SELECT 
    ju_class_id, student_id
    FROM
    j_studentsituations
    WHERE
    deleted = 0
    AND type IN ('Moving In' , 'Enrolled', 'Settle')
    GROUP BY ju_class_id , student_id) ss ON ss.student_id = ct.id
    AND ss.ju_class_id = c.id";
    return $GLOBALS['db']->fetchArray($sql);  
}    

function get_first_payment_date($team_id, $student_id = ''){
    $ext_team = '';
    if(!empty($team_id))
        $ext_team = "AND (l2.id IN ('$team_id'))"; 

    $ext_student = '';
    if(!empty($student_id))
        $ext_student = "AND (l1.id = '$student_id')";  

    $q1 = "SELECT 
    IFNULL(j_payment.payment_date, '') payment_date
    FROM
    j_payment
    INNER JOIN
    contacts_j_payment_1_c l1_1 ON j_payment.id = l1_1.contacts_j_payment_1j_payment_idb
    AND l1_1.deleted = 0
    INNER JOIN
    contacts l1 ON l1.id = l1_1.contacts_j_payment_1contacts_ida
    AND l1.deleted = 0
    INNER JOIN
    teams l2 ON j_payment.team_id = l2.id
    AND l2.deleted = 0
    WHERE
    (((j_payment.deleted = 0) $ext_student
    $ext_team))
    ORDER BY payment_date ASC LIMIT 1;";

    $f_date = $GLOBALS['db']->getOne($q1);

    if(empty($f_date))
        $f_date = $GLOBALS['timedate']->nowDbDate(); 

    return date('Y-m-01',strtotime('- 3month '.$f_date));
}

function array_orderby()
{
    $args = func_get_args();
    $data = array_shift($args);
    foreach ($args as $n => $field) {
        if (is_string($field)) {
            $tmp = array();
            foreach ($data as $key => $row)
                $tmp[$key] = $row[$field];
            $args[$n] = $tmp;
        }
    }
    $args[] = &$data;
    call_user_func_array('array_multisort', $args);
    return array_pop($args);
}

$js = 
<<<EOQ
        <script>
        SUGAR.util.doWhen(
        function() { 
           return $('#rowid1').find('td').eq(3).length == 1;
        },
        function() {
            $('#rowid1').find('td').eq(1).html('<b style="margin:18px;">EPP</b>');   
            $('#rowid2').find('td').eq(1).html('<b style="margin:18px;">EPP</b>'); 
            });
        </script>
EOQ;
echo $js;  

?>
