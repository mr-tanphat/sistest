<?php
class logicImport{
    //Import Payment
    function importPT(&$bean, $event, $arguments){
        global $timedate;
        if($_POST['module'] == 'Import'){
            $user_id = $GLOBALS['db']->getOne("SELECT id FROM users WHERE user_name = '{$bean->assigned_user_id}' AND deleted = 0");
            if(!empty($user_id))
                $bean->assigned_user_id = $user_id;

            $user_CR_id = $GLOBALS['db']->getOne("SELECT id FROM users WHERE user_name = '{$bean->created_by}' AND deleted = 0");    
            if(!empty($user_CR_id))
                $bean->created_by = $user_CR_id; 

            //Get Student ID
            $parent_type = 'Contacts';
            $rs = $GLOBALS['db']->query("SELECT id, CONCAT(IFNULL(last_name, ''),' ',IFNULL(first_name, '')) name FROM contacts WHERE aims_id = '{$bean->student_aims_id}' AND deleted = 0");
            $student = $GLOBALS['db']->fetchByAssoc($rs);
            if(empty($student)){
                $parent_type = 'Leads';
                $rs = $GLOBALS['db']->query("SELECT id, CONCAT(IFNULL(last_name, ''),' ',IFNULL(first_name, '')) name FROM leads WHERE aims_id = '{$bean->student_aims_id}' AND deleted = 0");
                $student = $GLOBALS['db']->fetchByAssoc($rs);   
            }

            $rss = $GLOBALS['db']->query("SELECT id, date_start FROM meetings WHERE aims_id = '{$bean->aims_id_pt}' AND deleted = 0");
            $ss = $GLOBALS['db']->fetchByAssoc($rss);

            if(empty($ss)){
                $filter = str_replace(' ','',$bean->subject_pt);            
                $parts  = explode("-", $filter);
                $start_obj  = DateTime::createFromFormat('d/m/Y H:i', $parts[0].' '.$parts[1]);
                $end_obj    = DateTime::createFromFormat('d/m/Y H:i', $parts[0].' '.$parts[2]);

                $date_start = $start_obj->format('d/m/Y h:i A');
                $date_end   = $end_obj->format('d/m/Y h:i A');
                $minutes    = (  strtotime($end_obj->format('Y-m-d H:i:s')) - strtotime($start_obj->format('Y-m-d H:i:s')) )/ 60;
                //Create new PT
                $ss                 = new Meeting();
                $sql_get_team_name = "SELECT short_name FROM teams WHERE id = '{$bean->team_id}' and deleted = 0";                  
                $team_name = $GLOBALS['db']->getOne($sql_get_team_name); 
                $ss->name           = $team_name.'-PT-'.$bean->subject_pt;
                $ss->date_start     = $date_start;
                $ss->aims_id        = $bean->aims_id_pt;
                $ss->type           = 'Sugar';
                $ss->duration_hours     = floor($minutes / 60);
                $ss->duration_minutes   = floor($minutes % 60);

                $ss->type_of_class  = 'Junior'; 
                $ss->meeting_type   = 'Placement Test'; 
                $ss->teaching_hour  = $ss->duration_hours + ($ss->duration_minutes / 60);
                $ss->delivery_hour  = $ss->duration_hours + ($ss->duration_minutes / 60);
                $ss->update_vcal    = false;
                $ss->description    = $bean->dedescription_pt;

                $ss->team_id            = $bean->team_id;     
                $ss->team_set_id        = $bean->team_id;
                $ss->assigned_user_id   = $bean->assigned_user_id;
                $ss->save();
                $ss_id     = $ss->id;
                $start_ss = $ss->date_start;
            }else{
                $ss_id = $ss['id']; 
                $start_ss = $ss['date_start'];
            }

            if(!empty($student)){
                $ptrs = $GLOBALS['db']->query("SELECT DISTINCT
                    IFNULL(j_ptresult.id, '') primaryid,
                    j_ptresult.pt_order pt_order,
                    j_ptresult.time_start time_start
                    FROM
                    j_ptresult
                    INNER JOIN
                    meetings_j_ptresult_1_c l1_1 ON j_ptresult.id = l1_1.meetings_j_ptresult_1j_ptresult_idb
                    AND l1_1.deleted = 0
                    INNER JOIN
                    meetings l1 ON l1.id = l1_1.meetings_j_ptresult_1meetings_ida
                    AND l1.deleted = 0
                    WHERE
                    (((l1.id = '$ss_id')))
                    AND j_ptresult.deleted = 0
                    ORDER BY pt_order ASC");
                $pt_result = $GLOBALS['db']->fetchByAssoc($ptrs);

                $bean->name          = $student['name'];
                if(!empty($pt_result)){
                    $bean->pt_order      = $pt_result['pt_order'] + 1;
                    $bean->time_start    = $pt_result['time_start'];
                }else{
                    $bean->pt_order      = 1;
                    $bean->time_start    = $start_ss;
                }


                $bean->time_end      = date('Y-m-d H:i:s',strtotime('+10 minute '.$bean->time_start));
                $bean->attended      = 1;
                $bean->parent        = $parent_type;
                $bean->type_result   ='Placement Test';

                if($bean->parent == 'Leads'){
                    $bean->load_relationship('leads_j_ptresult_1');
                    $bean->leads_j_ptresult_1->add($student['id']);
                }else{
                    $bean->load_relationship('contacts_j_ptresult_1');
                    $bean->contacts_j_ptresult_1->add($student['id']);    
                }

                $bean->load_relationship('meetings_j_ptresult_1');
                $bean->meetings_j_ptresult_1->add($ss_id);  
            }else{
                $bean->deleted = 1;
            }


        }
    }
}
?>
