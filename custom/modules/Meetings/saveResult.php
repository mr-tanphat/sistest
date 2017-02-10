<?php
global $timedate, $current_user;

switch ($_POST['type']) {
    case 'ajaxSaveSelect':
        $result = ajaxSaveSelect($_REQUEST);
        break;          
    case 'ajaxRemovePTResult':
        $result = ajaxRemovePTResult($_REQUEST);
        break;
    case 'ajaxSaveDemoResult':
        $result = ajaxSaveDemoResult($_REQUEST);
        break; 
    case 'ajaxSaveAttended':
        $result = ajaxSaveAttended($_REQUEST);
        break;
    case 'ajaxUpdateECNoteDemo':
        $result = ajaxUpdateECNote($_REQUEST);
        break;
    case 'checkStudentLeadMeeting':
        $result = checkStudentLeadMeeting($_REQUEST);
        break;
    case 'ajaxUpdatePTResult':
        $result = ajaxUpdatePTResult($_REQUEST);
        break; 
    case 'deletePTResult':
        $result = deletePTResult($_REQUEST);
        break;
    case 'ajaxMovePTResult':
        echo ajaxMovePTResult($_POST);
        die();
}
if($result)
    echo json_encode(array(
        "success" => "1",
        "id_result" => $result,
    ));   
else
    echo json_encode(array("success" => "0"));
die();
// -----------------------------------------------------------------------------------------------------\\

function ajaxSaveSelect($data){
    global $timedate, $locate;
    //get date add time        
    $first_time_aft = $timedate->to_db($data['first_day_mt']);
    //update meeting frst time when save pt result
    $sql_update="UPDATE meetings 
    SET first_time='$first_time_aft', time_range='{$data['time_range']}' 
    WHERE id='{$data['meeting_id']}'";
    $GLOBALS['db']->query($sql_update);              

    $i = 0;        
    $meeting = BeanFactory::getBean('Meetings',$data['meeting_id']);
    $meeting->load_relationship('meetings_j_ptresult_1');

    $result = new J_PTResult();
    $result->pt_order = $data['order'][$i];

    //get date add time        
    $start_bef_db = $data['get_pt_date'].' '.$data['start_hidden'][$i]; 
    $end_bef_db = $data['get_pt_date'].' '.$data['end_hidden'][$i];

    $result->time_start = $start_bef_db;
    $result->time_end = $end_bef_db;

    $result->speaking = $data['speak_koc'][$i]." | ".$data['speak_levels'][$i];
    $result->writing = $data['write_koc'][$i]." | ".$data['write_levels'][$i];
    $result->listening = $data['listen_koc'][$i]." | ".$data['listen_levels'][$i];
    $result->result = $data['result_koc'][$i]." | ".$data['result_levels'][$i];       
    $result->ec_note= $data['ec_note'][$i];
    $result->teacher_comment= $data['teacher_comment'][$i];

    $result->team_id = $meeting->team_id;
    $result->team_set_id = $meeting->team_set_id;
    $result->assigned_user_id = $meeting->assigned_user_id;

    $result->attended = $data['check_attended'][$i];
    $result->parent = $data['parent'][$i];

    $result->type_result = "Placement Test";

    if($data['parent'][$i]=="Leads"){
        $sql_get_lead="SELECT first_name,last_name FROM leads WHERE id='{$data['pt_id'][$i]}'";
        $result_lead = $GLOBALS['db']->fetchOne($sql_get_lead);
        $result->name= $meeting->name.' - '.$result_lead['last_name'].' '.$result_lead['first_name'];
    }else{
        $sql_get_contact="SELECT full_student_name FROM contacts WHERE id='{$data['pt_id'][$i]}'";
        $row_contact = $GLOBALS['db']->getOne($sql_get_contact) ;
        $result->name = $meeting->name.' - '.$row_contact;
    }
    $result->student_id = $data['pt_id'][$i];
    $result->save();

    $meeting->meetings_j_ptresult_1->add($result->id);

    if($data['parent'][$i]=="Leads"){
        $rela_lead = BeanFactory::getBean('J_PTResult',$result->id);
        $rela_lead->load_relationship('leads_j_ptresult_1');
        $rela_lead->leads_j_ptresult_1->add($data['pt_id'][$i]);  
        //update status leads
        $sql = "UPDATE leads SET date_modified ='".$GLOBALS['timedate']->nowDb()."', status = 'PT/Demo' WHERE id='".$data['pt_id'][$i]."' AND status != 'Converted' ";
        $GLOBALS['db']->query($sql);  
    } else{
        $rela_contact = BeanFactory::getBean('J_PTResult',$result->id);
        $rela_contact->load_relationship('contacts_j_ptresult_1');
        $rela_contact->contacts_j_ptresult_1->add($data['pt_id'][$i]);   
    }
    return $result->id;
}  

function ajaxUpdateECNote($data){
    $sql_update_koc="UPDATE j_ptresult SET ec_note='{$data['ec_note'][0]}'  WHERE id='{$data['id_of_result'][0]}'";
    return $GLOBALS['db']->query($sql_update_koc);          
}

function ajaxRemovePTResult($data){
    global $timedate;     
    $meeting = BeanFactory::getBean('Meetings',$data['meeting_id']);
    $meeting->load_relationship('meetings_j_ptresult_1');
    $sql_update="UPDATE meetings SET time_range='{$data['time_range']}' WHERE id='{$meeting->id}'";
    $GLOBALS['db']->query($sql_update);     
    for($i = 1; $i< count($data['id_of_result']); $i++){
        $result = new J_PTResult(); 
        $result->retrieve($data['id_of_result'][$i]);
        if($result->id) {
            $result->pt_order= $data['order'][$i]; 

            $start_bef_db = $data['get_pt_date'].' '.$data['start_hidden'][$i];                  
            $end_bef_db = $data['get_pt_date'].' '.$data['end_hidden'][$i];                

            $result->time_start = $start_bef_db;
            $result->time_end = $end_bef_db;  

            $result->save();
        }
    }
    return true; 
}

function ajaxSaveDemoResult($data){
    global $timedate; 
    $meeting = BeanFactory::getBean('Meetings',$data['meeting_id']);
    $meeting->load_relationship('meetings_j_ptresult_1');  
    $i = 0;      
    $result = new J_PTResult();            
    $result->team_id = $meeting->team_id;
    $result->team_set_id = $meeting->team_set_id;
    $result->assigned_user_id = $meeting->assigned_user_id;  
    $result->attended = $data['check_attended'][$i];
    $result->parent = $data['parent'][$i];
    $result->ec_note = $data['ec_note'][$i];
    $result->type_result="Demo";

    if($data['parent'][$i]=="Leads"){
        $sql_get_lead="SELECT first_name,last_name FROM leads WHERE id='{$data['demo_id'][$i]}'";              
        $result_lead = $GLOBALS['db']->fetchOne($sql_get_lead);
        $result->name= $meeting->name.' - '.$result_lead['last_name'].' '.$result_lead['first_name'];
    }else{
        $sql_get_contact="SELECT full_student_name FROM contacts WHERE id='{$data['demo_id'][$i]}'";
        $row_contact = $GLOBALS['db']->getOne($sql_get_contact) ;
        $result->name = $meeting->name.' - '.$row_contact;
    }   
    $result->student_id = $data['demo_id'][$i];
    $result->save();

    $meeting->meetings_j_ptresult_1->add($result->id);

    if($result->parent == "Leads"){
        $rela_lead = BeanFactory::getBean('J_PTResult',$result->id);
        $rela_lead->load_relationship('leads_j_ptresult_1');
        $rela_lead->leads_j_ptresult_1->add($data['demo_id'][$i]); 
        //update status leads
        $sql = "UPDATE leads 
        SET date_modified ='".$GLOBALS['timedate']->nowDb()."',
        status = 'PT/Demo' 
        WHERE id='".$data['demo_id'][$i]."' AND status != 'Converted' ";
        $GLOBALS['db']->query($sql);  
    } else{
        $rela_contact = BeanFactory::getBean('J_PTResult',$result->id);
        $rela_contact->load_relationship('contacts_j_ptresult_1');
        $rela_contact->contacts_j_ptresult_1->add($data['demo_id'][$i]);   
    }        
    return $result->id;
}   

function ajaxSaveAttended($data){
    $sql_up_taken="UPDATE j_ptresult SET attended='{$data['check_attended'][0]}' WHERE id='{$data['id_of_result'][0]}'";
    return $GLOBALS['db']->query($sql_up_taken);
}
function checkStudentLeadMeeting($data){
    //kiem tra neu student or lead do da co trong situation thi bo qua khong them nua
    $sql_check = "
    SELECT count(j_ptresult.id)
    FROM j_ptresult
    LEFT JOIN leads_j_ptresult_1_c l1_1 ON j_ptresult.id = l1_1.leads_j_ptresult_1j_ptresult_idb AND l1_1.deleted = 0
    LEFT JOIN leads l1 ON l1.id = l1_1.leads_j_ptresult_1leads_ida AND l1.deleted = 0
    LEFT JOIN contacts_j_ptresult_1_c l2_1 ON j_ptresult.id = l2_1.contacts_j_ptresult_1j_ptresult_idb AND l2_1.deleted = 0
    LEFT JOIN contacts l2 ON l2.id = l2_1.contacts_j_ptresult_1contacts_ida AND l2.deleted = 0
    INNER JOIN meetings_j_ptresult_1_c l3_1 ON j_ptresult.id = l3_1.meetings_j_ptresult_1j_ptresult_idb AND l3_1.deleted = 0 
    INNER JOIN meetings l3 ON l3.id = l3_1.meetings_j_ptresult_1meetings_ida AND l3.deleted = 0
    WHERE (l3.id = '{$data['meeting_id']}') AND j_ptresult.deleted = 0
    AND j_ptresult.type_result = '{$data['meeting_type']}'
    AND ( l1.id = '{$data['student_id']}' OR l2.id='{$data['student_id']}' ) ";

    return  ($GLOBALS['db']->getOne($sql_check)?false:true);
} 

function ajaxUpdatePTResult($data) { 
    $id_result = $data['id_of_result'][0];
    $koc_name = $data['result_koc'][0];
    $sql_koc = "SELECT case when kind_of_course = '' then kind_of_course_adult else kind_of_course end as kind_of_course FROM j_kindofcourse WHERE name = '$koc_name' AND deleted = 0";
    $result_koc = $GLOBALS['db']->getOne($sql_koc); 
    $reg_module =  array('/ A/','/ B/','/ C/','/ D/','/ 1/','/ 2/','/ 3/','/ 4/','/ 5/','/ 6/');
    $result_lvl = preg_replace($reg_module,'',$data['result_levels'][0]);          
    $thisResult = array(             
        'speaking' => $data['speak_koc'][0]." | ".$data['speak_levels'][0],
        'writing' => $data['write_koc'][0]." | ".$data['write_levels'][0],
        'listening' => $data['listen_koc'][0]." | ".$data['listen_levels'][0],
        'result' => $data['result_koc'][0]." | ".$data['result_levels'][0],
        'result_koc' => $result_koc,
        'result_lvl' => $result_lvl,
        'attended' => $data['check_attended'][0],
        'ec_note' => $data['ec_note'][0],
        'teacher_comment' => $data['teacher_comment'][0],             
    );
    $update_value = array();

    foreach($thisResult as $key => $val) {
        $update_value[] =  " $key = '$val'";
    }
    $sql_update = "UPDATE j_ptresult SET ".implode(',', $update_value)." WHERE id='$id_result'";
    return $GLOBALS['db']->query($sql_update);
}

function deletePTResult($data) {
    $thisResult = new J_PTResult();
    $thisResult->retrieve($data['result_id']);
    if($thisResult->id) {
        $thisResult->mark_deleted($thisResult->id);
        return true;
    }
    return false;
}

function ajaxMovePTResult($data){
    $results = $data["results"];
    $meetingId = $data["meeting_id"];

    foreach($results as $id){
        $result = BeanFactory::getBean('J_PTResult',$id);
        $meeting = BeanFactory::getBean('Meetings',$meetingId);
        $result->team_id = $meeting->team_id;
        $result->team_set_id = $meeting->team_set_id;
        $result->assigned_user_id = $meeting->assigned_user_id;  
        $result->ec_note = "";  
        $result->save();
        
        $meeting = BeanFactory::getBean('Meetings',$meetingId);
        $meeting->load_relationship('meetings_j_ptresult_1');  
        $meeting->meetings_j_ptresult_1->add($id);    
    }

    return json_encode(array(
        "success" => "1"
    )); 
}
?>
