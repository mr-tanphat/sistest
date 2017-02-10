<?php
//Hoang Quyen

require_once('custom/include/_helper/junior_class_utils.php');
//Subpanel Placement Test In Meeting
function getSubResult($params) {
    global $current_user;
    $args = func_get_args();
    $meetingId = $args[0]['meeting_id'];
    $smarty = new Sugar_Smarty();
    global $timedate;
    global $mod_strings;

    //////////////----------Get Subpanel PT Result-----------/////////////////
    $sql_pt_result="SELECT DISTINCT Ifnull(j_ptresult.id, '') primaryid,
    j_ptresult.pt_order j_ptresult_pt_order,
    j_ptresult.time_start j_ptresult_time_start,
    j_ptresult.time_end j_ptresult_time_end,
    Ifnull(j_ptresult.parent, '') j_ptresult_parent,
    Ifnull(l1.id, '') l1_id,
    Concat(Ifnull(l1.last_name, ''), ' ', Ifnull(l1.first_name, '')) l1_full_name,
    Ifnull(l2.id, '') l2_id,
    l2.full_student_name l2_full_student_name,
    Ifnull(l2.phone_mobile, '') l2_phone_mobile,
    Ifnull(l1.phone_mobile, '') l1_phone_mobile,
    Ifnull(j_ptresult.parent_name, '') parent_name,
    Ifnull(j_ptresult.listening, '') j_ptresult_listening,
    Ifnull(j_ptresult.speaking, '') j_ptresult_speaking,
    Ifnull(j_ptresult.writing, '') j_ptresult_writing,
    Ifnull(j_ptresult.result, '') j_ptresult_result,
    Ifnull(j_ptresult.attended, '') j_ptresult_attended,
    Ifnull(j_ptresult.ec_note, '') j_ptresult_ec_note,
    Concat(Ifnull(l4.last_name, ''), ' ', Ifnull(l4.first_name, '')) lead_first_ec,
    Concat(Ifnull(l5.last_name, ''), ' ', Ifnull(l5.first_name, '')) student_first_ec,
    Ifnull(j_ptresult.teacher_comment, '') j_ptresult_teacher_comment
    FROM   j_ptresult
    LEFT JOIN leads_j_ptresult_1_c l1_1 ON j_ptresult.id = l1_1.leads_j_ptresult_1j_ptresult_idb AND l1_1.deleted = 0
    LEFT JOIN leads l1 ON l1.id = l1_1.leads_j_ptresult_1leads_ida AND l1.deleted = 0
    LEFT JOIN contacts_j_ptresult_1_c l2_1 ON j_ptresult.id = l2_1.contacts_j_ptresult_1j_ptresult_idb AND l2_1.deleted = 0
    LEFT JOIN contacts l2 ON l2.id = l2_1.contacts_j_ptresult_1contacts_ida AND l2.deleted = 0
    INNER JOIN meetings_j_ptresult_1_c l3_1 ON j_ptresult.id = l3_1.meetings_j_ptresult_1j_ptresult_idb AND l3_1.deleted = 0
    INNER JOIN meetings l3 ON l3.id = l3_1.meetings_j_ptresult_1meetings_ida AND l3.deleted = 0
    LEFT JOIN users l4 ON l1.assigned_user_id = l4.id AND l4.deleted = 0
    LEFT JOIN users l5 ON l2.assigned_user_id = l5.id AND l5.deleted = 0
    WHERE  l3.id = '$meetingId'
    AND j_ptresult.deleted = 0
    ORDER  BY j_ptresult_pt_order ASC";
    $result_meeting = $GLOBALS['db']->query($sql_pt_result);
    //////////////----------End Get Subpanel PT Result-----------/////////////////

    //getbean check case edit
    $meeting = BeanFactory::getBean('Meetings',$meetingId);
    //$meeting->load_relationship('meetings_j_ptresult_1');
    //$meetings = $meeting->meetings_j_ptresult_1->getBeans();

    //get time start of PT
    $date_start=$meeting->date_start;
    $time_start=$timedate->getTimePart($date_start);

    $time_format = $timedate->get_time_format($current_user);

    //get duration of PT
    $duration=($meeting->duration_hours*60+$meeting->duration_minutes);

    //get Pt date inorderto save ptresult
    $get_pt_date=$timedate->getDatePart($date_start);

    $html       = '';
    $html_tpl   = getHtmlAddRow( '','','','','','','','','','','','','','','','','','','','',0,true);


    if($GLOBALS['db']->getRowCount($result_meeting) <= 0){   //In Case Create
        $first_time_mt = $time_start;
        $first_duration = $meeting->first_duration*60;
    }
    else{//In Case edit
        //get first time of meeting
        $first_time_mt = $timedate->getTimePart($meeting->first_time);

        ///trường hợp tạo pt từ lead and demo thì time start và first time se khac nhau
        //-> cach giai quyet la lay time start cua meeting gan cho time start khi add pt
        //tu lead va student truong hop ordermax =0
        if($time_start != $first_time_mt || $duration < $first_duration){
        }
        else{
            while($result = $GLOBALS['db']->fetchByAssoc($result_meeting))
            {
                $speak=explode( ' | ', $result['j_ptresult_speaking']);
                $speak_koc=$speak[0];
                $speak_level=$speak[1];

                $write=explode( ' | ', $result['j_ptresult_writing']);
                $write_koc=$write[0];
                $write_level=$write[1];

                $listen=explode( ' | ', $result['j_ptresult_listening']);
                $listen_koc=$listen[0];
                $listen_level=$listen[1];

                $result_pt=explode( ' | ', $result['j_ptresult_result']);
                $result_koc=$result_pt[0];
                $result_level=$result_pt[1];

                $time_start_rs= $timedate->to_display_time($result['j_ptresult_time_start'],true,true);
                $time_end_rs= $timedate->to_display_time($result['j_ptresult_time_end'],true,true);

                $attended=$result['j_ptresult_attended'];
                $ec_note=$result['j_ptresult_ec_note'];
                $teacher_comment=$result['j_ptresult_teacher_comment'];

                $parent=$result['j_ptresult_parent'];
                if($parent=="Leads"){
                    $html .= getHtmlAddRow($result['lead_first_ec'],$result['primaryid'],$result['j_ptresult_pt_order'],$time_start_rs,$time_end_rs,$result['l1_full_name'],$result['l1_id'],$parent,$result['l1_phone_mobile'],$result['parent_name'],$speak_koc,$speak_level,$write_koc,$write_level,$listen_koc,$listen_level,$result_koc,$result_level,$ec_note,$teacher_comment,$attended,false);
                }else{
                    $html .= getHtmlAddRow($result['student_first_ec'],$result['primaryid'],$result['j_ptresult_pt_order'],$time_start_rs,$time_end_rs,$result['l2_full_student_name'],$result['l2_id'],$parent,$result['l2_phone_mobile'],$result['parent_name'],$speak_koc,$speak_level,$write_koc,$write_level,$listen_koc,$listen_level,$result_koc,$result_level,$ec_note,$teacher_comment,$attended,false);
                }
            }
        }
    }
    $smarty->assign('html_tpl',$html_tpl);
    $smarty->assign('html',$html);
    $smarty->assign('duration',$duration);
    $smarty->assign('get_pt_date',$get_pt_date);
    $smarty->assign('MOD',$mod_strings);
    $smarty->assign('time_start_pt',$time_start);
    $smarty->assign('first_time_mt',$first_time_mt);
    $smarty->assign('first_duration',$first_duration);
    $smarty->assign('time_range',$meeting->time_range);
    $smarty->assign('ADD_ANOTHER_BUTTON', '<button  style="float:left; margin-left: 20px;" type="button" id="btnAddAnother">Add to another PT</button>');
    echo $smarty->fetch('custom/modules/Meetings/tpls/tablePTResult.tpl');
}

function getHtmlAddRow($assigned_to,$result_id,$order,$start,$end,$pt_name,$pt_id,$parent,$pt_phone,$parent_name, $speak_koc_id,$speak_level_id,$write_koc_id,$write_level_id,$listen_koc_id,$listen_level_id,$result_koc_id,$result_level_id,$ec_note,$teacher_comment,$attended,$showing){
    global $mod_strings;

    if($showing)
        $display = 'style="display:none;"';
    if($attended==1) {
        $class = 'pt_template color_template';
    }else{
        $class = 'pt_template';
    }
    $tpl_addrow  = "<tr class='$class' $display>";
    $tpl_addrow .= '<td align="center">
    <input type="checkbox" class="custom_checkbox" module_name="J_PTResult" onclick="handleCheckBox($(this));" value="'.$result_id.'"/>
    <input type="hidden" name="id_of_result[]" class="id_of_result" value="'.$result_id.'"/>
    ';
    $tpl_addrow .= '<td align="center" class="priority">
    <input type="hidden" class="sequence" name="sequence" value="1" size="6" />'.$order.'</td>';
    $tpl_addrow .= '<td align="center" nowrap="nowrap">
    <input type="hidden" class="order" name="order[]" value="'.$order.'"/>
    <p class="timeOnly">
    <label class="time start" readonly name="start[]" type="text" style="text-align: center;">'.$start.'</label>
    <input class="time start_hidden" hidden readonly name="start_hidden[]" type="hidden" style="text-align: center;" value="'.$start.'" />
    -
    <label class="time end" readonly name="end[]" type="text" style="text-align: center;">'.$end.'</label>
    <input class="time end_hidden"  readonly name="end_hidden[]" type="hidden" style="text-align: center;" value="'.$end.'" /></p></td>';
    if($parent==""){
        $href="#";
    }else{
        $href='index.php?module='.$parent.'&action=DetailView&record='.$pt_id.'';
    }
    $tpl_addrow.= '<td nowrap="nowrap">
    <a href="'.$href.'"  target="_blank" name="pt_name[]" class="pt_name" >'.$pt_name.'</a>
    <input type="hidden" name="pt_id[]" class="pt_id" value="'.$pt_id.'" />
    <input type="hidden" name="parent[]" class="parent" value="'.$parent.'" /></td>';

    if($attended==1) {
        $check='checked';
    }else{
        $check='';
    }
    $tpl_addrow .= '<td nowrap="nowrap" class="phone_mobile">'.$pt_phone.'</td>';
    $tpl_addrow .= '<td nowrap="nowrap" class="parent">'.$parent_name.'</td>';
    $tpl_addrow .= '<td nowrap="nowrap" class="assigned_user_name">'.$assigned_to.'</td>';

    $tpl_addrow .= '<td align="center"><input type="checkbox" '.$check.' id="attended" class="attended"/><input type="hidden" name="check_attended[]" class="check_attended" value="'.$attended.'"/></td>';

    $tpl_addrow .= get_option_koc($speak_koc_id,'speak_koc');
    $tpl_addrow .= get_option_level($speak_koc_id,'speak_levels',$speak_level_id);

    //Writing
    $tpl_addrow .= get_option_koc($write_koc_id,'write_koc');
    $tpl_addrow .= get_option_level($write_koc_id,'write_levels',$write_level_id);

    ////Listen
    $tpl_addrow .= get_option_koc($listen_koc_id,'listen_koc');
    $tpl_addrow .= get_option_level($listen_koc_id,'listen_levels',$listen_level_id);

    ////Result
    $tpl_addrow .= get_option_koc($result_koc_id,'result_koc');
    $tpl_addrow .= get_option_level($result_koc_id,'result_levels',$result_level_id);

    $tpl_addrow .= '<td align="center"><textarea class=\'ec_note\' name="ec_note[]" rows="3" cols="15">'.$ec_note.'</textarea></td>';
    $tpl_addrow .= '<td align="center"><textarea class=\'teacher_comment\' name="teacher_comment[]" rows="3" cols="15">'.$teacher_comment.'</textarea></td>';

    $tpl_addrow .= '<td align="center" nowrap="nowrap">';
    //        $tpl_addrow .= '<input type="button" class="btn btn_enrollment" onclick="createEnrollment($(this).closest(\'tr\'));" value="'.$mod_strings['LBL_ENROLL'].'"/>';
    $tpl_addrow .= '<button style="margin-left: 5px;" type="button" class="btn btn-delete" ><img src="themes/default/images/id-ff-clear.png"></button></td>';
    $tpl_addrow .= '</tr>';

    return $tpl_addrow;
}

//Subpanel Demo In Meeting
function getSubDemoResult($params){
    global $mod_strings;
    global $timedate;
    $smarty = new Sugar_Smarty();
    $smarty->assign('MOD',$mod_strings);
    $args = func_get_args();
    $meetingId = $args[0]['meeting_id'];

    //getbean check case edit
    $meeting = BeanFactory::getBean('Meetings',$meetingId);
    $meeting->load_relationship('meetings_j_ptresult_1');
    $meetings = $meeting->meetings_j_ptresult_1->getBeans();

    //////////////----------Get Subpanel Demo Result-----------/////////////////
    $sql_get_demo="
    SELECT DISTINCT
    IFNULL(l2.id, '') l2_id,
    l2.last_name l2_last_name,
    l2.first_name l2_first_name,
    l2.status l2_status,
    l2.birthdate l2_birthdate,
    l2.gender l2_gender,
    IFNULL(l3.id, '') l3_id,
    l3.email_address l3_email_address,
    l2.phone_mobile l2_phone_mobile,
    IFNULL(l4.id, '') l4_id,
    l4.full_student_name l4_full_student_name,
    l4.contact_status l4_contact_status,
    l4.birthdate l4_birthdate,
    l4.gender l4_gender,
    l4.phone_mobile l4_phone_mobile,
    IFNULL(j_ptresult.id, '') primaryid,
    IFNULL(j_ptresult.attended, '') j_ptresult_attended,
    IFNULL(j_ptresult.parent, '') j_ptresult_parent,
    IFNULL(j_ptresult.parent_name, '') parent_name,
    IFNULL(j_ptresult.ec_note, '') j_ptresult_description,
    IFNULL(l5.id, '') l5_id,
    IFNULL(l6.full_user_name, '') l6_full_user_name,
    l5.email_address l5_email_address
    FROM j_ptresult
    INNER JOIN meetings_j_ptresult_1_c l1_1 ON j_ptresult.id = l1_1.meetings_j_ptresult_1j_ptresult_idb AND l1_1.deleted = 0
    INNER JOIN meetings l1 ON l1.id = l1_1.meetings_j_ptresult_1meetings_ida AND l1.deleted = 0
    LEFT JOIN leads_j_ptresult_1_c l2_1 ON j_ptresult.id = l2_1.leads_j_ptresult_1j_ptresult_idb AND l2_1.deleted = 0
    LEFT JOIN leads l2 ON l2.id = l2_1.leads_j_ptresult_1leads_ida AND l2.deleted = 0
    LEFT JOIN email_addr_bean_rel l3_1 ON l2.id = l3_1.bean_id AND l3_1.deleted = 0 AND l3_1.primary_address = '1'
    LEFT JOIN email_addresses l3 ON l3.id = l3_1.email_address_id AND l3.deleted = 0
    LEFT JOIN contacts_j_ptresult_1_c l4_1 ON j_ptresult.id = l4_1.contacts_j_ptresult_1j_ptresult_idb AND l4_1.deleted = 0
    LEFT JOIN contacts l4 ON l4.id = l4_1.contacts_j_ptresult_1contacts_ida AND l4.deleted = 0
    LEFT JOIN email_addr_bean_rel l5_1 ON l4.id = l5_1.bean_id AND l5_1.deleted = 0 AND l5_1.primary_address = '1'
    LEFT JOIN email_addresses l5 ON l5.id = l5_1.email_address_id AND l5.deleted = 0
    LEFT JOIN users l6 ON j_ptresult.assigned_user_id = l6.id
    WHERE l1.id = '$meetingId' AND j_ptresult.deleted = 0 ";

    $result_demo = $GLOBALS['db']->query($sql_get_demo);

    $html       = '';
    $html_tpl   = getDemoAddRow('','','','','','','','','','','','',1,true);

    if(count($meetings)<=0){   //In Case Create

    }
    else{//In Case edit
        while($row = $GLOBALS['db']->fetchByAssoc($result_demo)) {
            $parent=$row['j_ptresult_parent'];
            $full_name_lead = $row['l2_last_name'].' '.$row['l2_first_name'];
            if($row['l4_birthdate']=="0000-00-00"){
                $birthday_student = "";
            }else{
                $birthday_student = $timedate->to_display_date($row['l4_birthdate'],true,true);
            }
            if($row['l2_birthdate']=="0000-00-00"){
                $birthday_lead = "";
            }else{
                $birthday_lead = $timedate->to_display_date($row['l2_birthdate'],true,true);
            }
            if($parent=="Leads"){
                $html .= getDemoAddRow($row['l6_full_user_name'],$row['primaryid'],$full_name_lead,$row['l2_id'],$parent,$row['l2_status'],$birthday_lead,$row['l2_gender'],$row['l2_phone_mobile'],$row['parent_name'] ,$row['l3_email_address'],$row['j_ptresult_description'],$row['j_ptresult_attended'],false);
            }else{
                $html .= getDemoAddRow($row['l6_full_user_name'],$row['primaryid'],$row['l4_full_student_name'],$row['l4_id'],$parent,$row['l4_contact_status'],$birthday_student,$row['l4_gender'],$row['l4_phone_mobile'], $row['parent_name'], $row['l5_email_address'],$row['j_ptresult_description'],$row['j_ptresult_attended'],false);
            }
        }
    }


    $smarty->assign('ADD_ANOTHER_BUTTON', '<button  style="float:left; margin-left: 20px;" type="button" id="btnAddAnother">Add to another Demo</button>');
    $smarty->assign('html_tpl',$html_tpl);
    $smarty->assign('html',$html);
    echo $smarty->fetch('custom/modules/Meetings/tpls/tableDemoResult.tpl');
}

function getDemoAddRow($assigned_to, $result_id,$demo_name,$demo_id,$parent,$status,$birthdate,$gender,$phone_mobile,$parent_name,$email,$ec_note,$attended,$showing){
    if($showing)
        $display = 'style="display:none;"';

    $tpl_addrow  = "<tr class=demo_template $display>";
    $tpl_addrow .= '<td align="center">
    <input type="checkbox" class="custom_checkbox" module_name="J_PTResult" onclick="handleCheckBox($(this));" value="'.$result_id.'"/>
    <input type="hidden" name="id_of_result[]" class="id_of_result" value="'.$result_id.'"/></td>';
    if($parent==""){
        $href="#";
    }else{
        $href='index.php?module='.$parent.'&action=DetailView&record='.$demo_id.'';
    }
    $tpl_addrow.= '<td nowrap="nowrap" style="text-align: center;">
    <a href="'.$href.'" name="demo_name[]" class="demo_name" >'.$demo_name.'</a>
    <input type="hidden" name="demo_id[]" class="demo_id" value="'.$demo_id.'" />
    <input type="hidden" name="parent[]" value="'.$parent.'" class="parent"/></td>';
    if($attended==1) {
        $check='checked';
    }else{
        $check='';
    }
    $tpl_addrow .= '<td align="center"><input type="checkbox" '.$check.' id="attended" class="attended"/><input type="hidden" name="check_attended[]" class="check_attended" value="'.$attended.'"/></td>';


    $tpl_addrow .= '<td align="center"><label class="status">'.$status.'</label></td>';

    $tpl_addrow .= '<td align="center"><label class="birthdate">'.$birthdate.'</label></td>';
    $tpl_addrow .= '<td align="center"><label class="gender">'.$gender.'</label></td>';
    $tpl_addrow .= '<td align="center"><label class="phone_mobile">'.$phone_mobile.'</label></td>';
    $tpl_addrow .= '<td align="center"><label class="parent">'.$parent_name.'</label></td>';
    $tpl_addrow .= '<td align="center"><label class="assigned_user_name">'.$assigned_to.'</label></td>';
    $tpl_addrow .= '<td align="center"><label class="email">'.$email.'</label></td>';
    $tpl_addrow .= '<td align="center"><textarea class=\'ec_note\' name="ec_note[]" rows="3" cols="15">'.$ec_note.'</textarea></td>';

    $tpl_addrow .= '<td align="center" nowrap="nowrap">';
    //        $tpl_addrow .= '<ul class="clickMenu fancymenu SugarActionMenu" style="width: 140px;">';
    //        if($parent == 'Leads'){
    //            $tpl_addrow .='<li class="sugar_action_button"><a class="add_to_class" onclick="window.open(\'index.php?module=Leads&action=ConvertLead&record='.$demo_id.'\');">Add To Class</a>';
    //            $tpl_addrow .= '<ul class="subnav" style="display:none;">';
    //            $tpl_addrow .='<li><a class="lession_demo" student_id="'.$demo_id.'" onclick="addLeadToLessionDemo(this);">Add To Another Demo</a></li>';
    //            $tpl_addrow .='<li><a class="another_pt" student_id="'.$demo_id.'" onclick="addLeadToAnotherPT(this);">Add To PT</a></li>';
    //            $tpl_addrow .='<li><a class="add_outstading" onclick="window.open(\'index.php?module=Leads&action=ConvertLead&record='.$demo_id.'\');">Add Outstanding</a></li>';
    //            $tpl_addrow .='<li><a class="waiting_class" parent="Leads" student_id="'.$demo_id.'" onclick="addDemoToWaitingClass(this);">Add To Waiting Class</a></li>';
    //            $tpl_addrow .='<li><a class="class_demo" parent="Leads" student_id="'.$demo_id.'" student_name="'.$demo_name.'" onclick="addToClassDemo(this);">Add To Class Demo</a></li>';
    //        }else{
    //            $tpl_addrow .='<li class="sugar_action_button"><a class="add_to_class" onclick="window.open(\'index.php?module=J_Payment&action=EditView&return_module=J_Payment&return_action=DetailView&payment_type=Enrollment&student_id='.$demo_id.'\');">Add To Class</a>';
    //            $tpl_addrow .= '<ul class="subnav" style="display:none;">';
    //            $tpl_addrow .='<li><a class="lession_demo" student_id="'.$demo_id.'" onclick="addContactToLessionDemo(this);">Add To Another Demo</a></li>';
    //            $tpl_addrow .='<li><a class="another_pt" student_id="'.$demo_id.'" onclick="addContactToAnotherPT(this);">Add To PT</a></li>';
    //            $tpl_addrow .='<li><a class="add_outstading" student_id="'.$demo_id.'" student_name="'.$demo_name.'" onclick="addContactOutstanding(this);">Add Outstanding</a></li>';
    //            $tpl_addrow .='<li><a class="waiting_class" parent="Contacts" student_id="'.$demo_id.'" onclick="addDemoToWaitingClass(this);">Add To Waiting Class</a></li>';
    //            $tpl_addrow .='<li><a class="class_demo" parent="Contacts" student_id="'.$demo_id.'" student_name="'.$demo_name.'" onclick="addToClassDemo(this);">Add To Class Demo</a></li>';
    //        }

    //        $tpl_addrow .='</ul><span class="ab" onclick="click_choose_action(this, event);"></span></li></ul>';

    $tpl_addrow .= '<button style="margin-left: 5px;" type="button" class="btn btn_delete"><img src="themes/default/images/id-ff-clear.png"></button>';
    $tpl_addrow .= '</td>';
    $tpl_addrow .= '</tr>';


    return $tpl_addrow;



}


//Subpanel Demo In Lead
function getSubDemoLead($params){
    $args = func_get_args();
    $lead_id = $args[0]['lead_id'];
    $sql_demo_lead = "
    SELECT DISTINCT
    IFNULL(j_ptresult.id, '') id,
    IFNULL(j_ptresult.name, '') name,
    IFNULL(meetings.name, '') meetings_j_ptresult_1_name,
    meetings.date_start date_start,
    meetings.date_end ,
    meetings.duration_cal duration_cal,
    IFNULL(j_ptresult.attended, '') attended,
    l3.full_teacher_name full_teacher_name,
    IFNULL(l4.name, '') room_name
    FROM
    j_ptresult
    INNER JOIN
    leads_j_ptresult_1_c l1_1 ON j_ptresult.id = l1_1.leads_j_ptresult_1j_ptresult_idb
    AND l1_1.deleted = 0
    INNER JOIN
    leads  ON leads.id = l1_1.leads_j_ptresult_1leads_ida
    AND leads.deleted = 0
    INNER JOIN
    meetings_j_ptresult_1_c l2_1 ON j_ptresult.id = l2_1.meetings_j_ptresult_1j_ptresult_idb
    AND l2_1.deleted = 0
    INNER JOIN
    meetings ON meetings.id = l2_1.meetings_j_ptresult_1meetings_ida
    AND meetings.deleted = 0
    LEFT JOIN
    c_teachers l3 ON meetings.teacher_id = l3.id AND l3.deleted = 0
    LEFT JOIN
    c_rooms l4 ON meetings.room_id = l4.id AND l4.deleted = 0
    WHERE
    (((leads.id = '$lead_id')
    AND (j_ptresult.type_result = 'Demo')))
    AND j_ptresult.deleted = 0
    ";
    return $sql_demo_lead;
}

//Subpanel Placement Test In Lead
function getSubPTLead($params){
    global $current_user;
    $args = func_get_args();
    $lead_id = $args[0]['lead_id'];
    $sql_pt_lead = "
    SELECT DISTINCT
    IFNULL(j_ptresult.id, '') id,
    IFNULL(j_ptresult.name, '') name,
    IFNULL(meetings.name, '') meetings_j_ptresult_1_name,
    IFNULL(j_ptresult.speaking, '') speaking,
    IFNULL(j_ptresult.listening, '') listening,
    IFNULL(j_ptresult.writing, '') writing,
    IFNULL(j_ptresult.result, '') result,
    IFNULL(j_ptresult.ec_note, '') ec_note,
    IFNULL(j_ptresult.teacher_comment, '') teacher_comment,
    IFNULL(j_ptresult.attended, '') attended
    FROM
    j_ptresult
    INNER JOIN
    leads_j_ptresult_1_c l1_1 ON j_ptresult.id = l1_1.leads_j_ptresult_1j_ptresult_idb
    AND l1_1.deleted = 0
    INNER JOIN
    leads ON leads.id = l1_1.leads_j_ptresult_1leads_ida
    AND leads.deleted = 0
    INNER JOIN
    meetings_j_ptresult_1_c l2_1 ON j_ptresult.id = l2_1.meetings_j_ptresult_1j_ptresult_idb
    AND l2_1.deleted = 0
    INNER JOIN
    meetings  ON meetings.id = l2_1.meetings_j_ptresult_1meetings_ida
    AND meetings.deleted = 0
    WHERE
    (((leads.id = '$lead_id')
    AND (j_ptresult.type_result = 'Placement Test')))
    AND j_ptresult.deleted = 0
    ";
    return $sql_pt_lead;
}

//Subpanel Demo In Contact
function getSubDemoContact($params){
    $args = func_get_args();
    $contact_id = $args[0]['contact_id'];
    $sql_demo_contact = "
    SELECT DISTINCT
    IFNULL(j_ptresult.id, '') id,
    IFNULL(j_ptresult.name, '') name,
    IFNULL(meetings.date_start, '') date_start,
    IFNULL(meetings.date_end, '') date_end,
    IFNULL(meetings.duration_cal, '') duration_cal,
    IFNULL(j_ptresult.attended, '') attended,
    IFNULL(c_teachers.full_teacher_name, '') full_teacher_name,
    IFNULL(c_rooms.name, '') room_name
    FROM
    j_ptresult
    INNER JOIN
    contacts_j_ptresult_1_c l1_1 ON j_ptresult.id = l1_1.contacts_j_ptresult_1j_ptresult_idb
    AND l1_1.deleted = 0
    INNER JOIN
    contacts ON contacts.id = l1_1.contacts_j_ptresult_1contacts_ida
    AND contacts.deleted = 0
    INNER JOIN
    meetings_j_ptresult_1_c l2_1 ON j_ptresult.id = l2_1.meetings_j_ptresult_1j_ptresult_idb
    AND l2_1.deleted = 0
    INNER JOIN
    meetings ON meetings.id = l2_1.meetings_j_ptresult_1meetings_ida
    AND meetings.deleted = 0
    LEFT JOIN
    c_teachers ON meetings.teacher_id = c_teachers.id AND c_teachers.deleted = 0
    LEFT JOIN
    c_rooms ON meetings.room_id = c_rooms.id AND c_rooms.deleted = 0
    WHERE
    (((j_ptresult.type_result = 'Demo')
    AND (contacts.id = '$contact_id')))
    AND j_ptresult.deleted = 0
    ";
    return $sql_demo_contact;
}

//Subpanel Placement Test In Contact
function getSubPTContact($params){
    global $current_user;
    $args = func_get_args();
    $contact_id = $args[0]['contact_id'];
    $sql_pt_contact = "
    SELECT DISTINCT
    IFNULL(j_ptresult.id, '') id,
    IFNULL(j_ptresult.name, '') name,
    j_ptresult.time_start time_start,
    j_ptresult.time_end time_end,
    IFNULL(j_ptresult.speaking, '') speaking,
    IFNULL(j_ptresult.listening, '') listening,
    IFNULL(j_ptresult.writing, '') writing,
    IFNULL(j_ptresult.result, '') result,
    IFNULL(j_ptresult.attended, '') attended,
    IFNULL(j_ptresult.ec_note, '') ec_note,
    IFNULL(j_ptresult.teacher_comment, '') teacher_comment
    FROM
    j_ptresult
    INNER JOIN
    contacts_j_ptresult_1_c l1_1 ON j_ptresult.id = l1_1.contacts_j_ptresult_1j_ptresult_idb
    AND l1_1.deleted = 0
    INNER JOIN
    contacts  ON contacts.id = l1_1.contacts_j_ptresult_1contacts_ida
    AND contacts.deleted = 0
    WHERE
    (((j_ptresult.type_result = 'Placement Test')
    AND (contacts.id = '$contact_id')))
    AND j_ptresult.deleted = 0
    ";
    return $sql_pt_contact;
}
//    //add by Lam Hai
//    //Subpanel Demo In Lead
//    function getSubPanelDemoContact($params){
//        $args = func_get_args();
//        $contactId = $args[0]['contact_id'];
//
//        $sqlDemoContact = "
//        SELECT DISTINCT
//        IFNULL(j_ptresult.id, '') id,
//        IFNULL(j_ptresult.name, '') name,
//        IFNULL(meetings.name, '') meetings_j_ptresult_1_name,
//        meetings.date_start date_start,
//        meetings.date_end ,
//        meetings.duration_cal duration_cal,
//        IFNULL(j_ptresult.attended, '') attended,
//        l3.full_teacher_name full_teacher_name,
//        IFNULL(l4.name, '') room_name
//        FROM
//        j_ptresult
//        INNER JOIN
//        leads_j_ptresult_1_c l1_1 ON j_ptresult.id = l1_1.leads_j_ptresult_1j_ptresult_idb
//        AND l1_1.deleted = 0
//        INNER JOIN
//        leads  ON leads.id = l1_1.leads_j_ptresult_1leads_ida
//        AND leads.deleted = 0
//        INNER JOIN
//        meetings_j_ptresult_1_c l2_1 ON j_ptresult.id = l2_1.meetings_j_ptresult_1j_ptresult_idb
//        AND l2_1.deleted = 0
//        INNER JOIN
//        meetings ON meetings.id = l2_1.meetings_j_ptresult_1meetings_ida
//        AND meetings.deleted = 0
//        INNER JOIN
//        contacts ON contacts.id = leads.contact_id
//        AND contacts.deleted = 0
//        LEFT JOIN
//        c_teachers l3 ON meetings.teacher_id = l3.id AND l3.deleted = 0
//        LEFT JOIN
//        c_rooms l4 ON meetings.room_id = l4.id AND l4.deleted = 0
//        WHERE
//        (((contacts.id = '$contactId')
//        AND (j_ptresult.type_result = 'Demo')))
//        AND j_ptresult.deleted = 0
//        ";
//        return $sqlDemoContact;
//    }
//
//    //Subpanel Placement Test In Lead
//    function getSubPanelPTContact($params){
//        global $current_user;
//        $args = func_get_args();
//        $contactId = $args[0]['contact_id'];
//        $sqlPTContact = "
//        SELECT DISTINCT
//        IFNULL(j_ptresult.id, '') id,
//        IFNULL(j_ptresult.name, '') name,
//        IFNULL(meetings.name, '') meetings_j_ptresult_1_name,
//        IFNULL(j_ptresult.speaking, '') speaking,
//        IFNULL(j_ptresult.listening, '') listening,
//        IFNULL(j_ptresult.writing, '') writing,
//        IFNULL(j_ptresult.result, '') result,
//        IFNULL(j_ptresult.ec_note, '') ec_note,
//        IFNULL(j_ptresult.teacher_comment, '') teacher_comment,
//        IFNULL(j_ptresult.attended, '') attended
//        FROM
//        j_ptresult
//        INNER JOIN
//        leads_j_ptresult_1_c l1_1 ON j_ptresult.id = l1_1.leads_j_ptresult_1j_ptresult_idb
//        AND l1_1.deleted = 0
//        INNER JOIN
//        leads ON leads.id = l1_1.leads_j_ptresult_1leads_ida
//        AND leads.deleted = 0
//        INNER JOIN
//        meetings_j_ptresult_1_c l2_1 ON j_ptresult.id = l2_1.meetings_j_ptresult_1j_ptresult_idb
//        AND l2_1.deleted = 0
//        INNER JOIN
//        meetings  ON meetings.id = l2_1.meetings_j_ptresult_1meetings_ida
//        AND meetings.deleted = 0
//        INNER JOIN
//        contacts ON contacts.id = leads.contact_id
//        AND contacts.deleted = 0
//        WHERE
//        (((contacts.id = '$contactId')
//        AND (j_ptresult.type_result = 'Placement Test')))
//        AND j_ptresult.deleted = 0
//        ";
//        return $sqlPTContact;
//    }
//
//    //end Lam Hai
/*
* Function get_option_koc,get_option_level: generate Kind of course and level in pt result
*
*/
function get_option_koc($koc_id,$name){
    $koc_list = generateKOC();
    //Generate html option
    $tpl_addrow = '<td align="center"><select name="'.$name.'[]" class="'.$name.' koc"><option label="-none-" value = "" >-none-</option>';
    for($i =0 ; $i < count($koc_list) ; $i++){
        $selected = "";
        if($koc_id == $koc_list[$i]['name']){
            $selected = "selected";
        }
        $tpl_addrow .= "<option $selected json='".$koc_list[$i]['content']."'  value='".$koc_list[$i]['name']."'>".$koc_list[$i]['name']."</option>";
    }
    $tpl_addrow .= '</select>';
    return $tpl_addrow;
}

function get_option_level($koc_id, $name, $level_id){
    $tpl_addrow ='<select  style="margin-left: 5px;width: 100px;" name="'.$name.'[]" class="'.$name.' level"><option value = "">-none-</option>';
    if(!empty($koc_id)){
        //$custom_where = "";
        $sql_get_option = "
        SELECT DISTINCT
        Ifnull(j_kindofcourse.content, '')        j_kindofcourse_content
        FROM   j_kindofcourse
        WHERE  (( 1 = 1 ))
        AND j_kindofcourse.deleted = 0
        AND name = '".$koc_id."'
        ";
        $result_get_option = $GLOBALS['db']->query($sql_get_option);

        while($level = $GLOBALS['db']->fetchByAssoc($result_get_option)) {
            $tmpContent = json_decode(html_entity_decode($level['j_kindofcourse_content']),true);
            foreach($tmpContent as $key => $value){
                $tpl_addrow .= "<optgroup label='Level: {$value['levels']}'>";
                foreach($value['modules'] as $key_1 => $value_1){
                    $select = '';
                    if(!empty($level_id)){
                        if($value['levels'].' '.$value_1 == $level_id) {
                       // $_level = explode(' ',$level_id);
                        //if($_level[0]==$value['levels'] && $_level[1] == $value_1){
                            $select = 'selected';
                        }
                    }
                    $tpl_addrow .= '<option '.$select.' value="'.$value['levels'].' '.$value_1.'">'.$value['levels'].' '.$value_1.'</option>';
                }
                $tpl_addrow.='</optgroup>';
            }
        }
    }
    $tpl_addrow .='</select></td>';
    return $tpl_addrow;
}
?>
