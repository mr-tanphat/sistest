<?php
include_once('include/MVC/preDispatch.php');
//require_once('include/entryPoint.php');
/*$reg_module = array('/&/','/</','/>/','/"/');
if(preg_match('/[<&>\'"]/','abc"125',$matches))
    echo 'debug cai noi';
else echo 'FUCK!!!!';
    */
 $name = 'A2 PH';
    $phone_number = '0123456789';
    $email_address = 'a2ph@localhost.com';

    $sql = "SELECT 
            l.id,
            t.name
    FROM
        leads l
            INNER JOIN
        email_addr_bean_rel er ON l.id = er.bean_id
            AND er.bean_module = 'Leads'
            AND l.deleted = 0
            AND er.deleted = 0
            INNER JOIN
        email_addresses ea ON ea.id = er.email_address_id
            AND ea.deleted = 0
            INNER JOIN
        teams t ON t.id = l.team_id
            AND l.full_lead_name = '$name'
            AND ea.email_address = '$email_address'
            AND l.phone_mobile = '$phone_number'";
    $rs = $GLOBALS['db']->fetchArray($sql);
    $test = '';
    if(!empty($rs)){
        $team_name = implode(", ", $rs);
        return array(
            "success" => "0",
            "notify" => "Thông tin học viên đã tồn tại ở trung tâm $team_name",
        );
    }else{
        return array(
            "success" => "1",            
        );
    } 
/*global $timedate;
$birthdate = $timedate->to_db_date('10/09/1991',false);   
echo $birthdate;
echo "<br>";  
$var = '20/04/1990';
$date = str_replace('/','-',$var);
echo date('Y-m-d', strtotime($date));     */     
//echo phpinfo();
?>

