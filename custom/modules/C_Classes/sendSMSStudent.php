<?php
    require_once("custom/modules/C_SMS/SMS/sms.php");

    $q1 = "SELECT id, name, content FROM c_classes WHERE id = '{$_POST['record']}'";
    $rs1 = $GLOBALS['db']->query($q1);
    $row1 = $GLOBALS['db']->fetchByAssoc($rs1);


    $json = getJSONobj();
    $ct_arr = $json->decode(htmlspecialchars_decode($row1['content']), false);
    $calendar = $row1['name'].' ';
    for($i = 0; $i < count($ct_arr['week_day']); $i++) {
        $calendar .= '('.weekday_vi($ct_arr['week_day'][$i]).': '.$ct_arr['start_time'][$i].' - '.$ct_arr['end_time'][$i];
        $calendar .= ' Giao vien: '.$ct_arr['teachers'][$i].' '; 
        $calendar .= 'Phong: '.$ct_arr['rooms'][$i].') '; 
    }



    foreach($_POST['student_id'] as $st_id){
        $q2 = "SELECT CONCAT(IFNULL(contacts.last_name, ''),' ',IFNULL(contacts.first_name, '')) contacts_full_name, id, first_name, phone_mobile, other_mobile FROM contacts WHERE id = '$st_id' AND deleted = 0";
        $rs2 = $GLOBALS['db']->query($q2);
        $row2 = $GLOBALS['db']->fetchByAssoc($rs2);
        $row2['first_name'] != '' ? $name = $row2['first_name'] : $name = $row2['contacts_full_name'];

        $tpls = new EmailTemplate();
        $tpls->retrieve_by_string_fields(array('name'=>'SMS TEMPLATE: SEND TIMETABLE','deleted'=>0));
        $content = str_replace('@@name@@',$name,$tpls->body); 
        $content = str_replace('@@calendar@@',$calendar,$content); 
        if(!isset($content)||empty($content))
        {
            echo json_encode(array(
                "success" => "0",
            ));
            return false;            
        }

        //$content = "Apollo360: Chao $name,".' Day la lich hoc cua lop: '.$calendar;

        $sms = new sms();
        if(!empty($row2['phone_mobile']))
            $send1 = $sms->send_message($row2['phone_mobile'],$content,'Contacts',$row2['id']);

        if((int)$send1['return'] < 0){
            if(!empty($row2['other_mobile']))
                $send2 = $sms->send_message($row2['other_mobile'],$content,'Contacts',$row2['id']);  
        }
        if((int)$send1['return'] > 0 || (int)$send2['return'] > 0){
            echo json_encode(array(
                "success" => "1",
            ));   
        }else{
            echo json_encode(array(
                "success" => "0",
            ));  
        } 
    }

    function weekday_vi($string){
        switch ($string) {
            case "Mon":
                $wk="Thu 2";
                break;
            case "Tue":
                $wk="Thu 3";
                break;
            case "Wed":
                $wk="Thu 4";
                break;
            case "Thu":
                $wk="Thu 5";
                break;
            case "Fri":
                $wk="Thu 6";
                break;
            case "Sat":
                $wk="Thu 7";
                break;
            case "Sun":
                $wk="CN";
                break;
        }
        return $wk;
    }

?>
