<?php
function getGradebook($class_id, $gradebook_id = '') {         
    return array('html' => getGradebookSelectOptions($class_id, $gradebook_id));
}

function getGradebookDetail($gradebook_id, $reloadconfig) {         
    $thisGradebook = new J_Gradebook();
    $thisGradebook->retrieve($gradebook_id);
    if($thisGradebook->type == "Final" ) {
        return array(
            'html' => $thisGradebook->loadGradeContent(false, $reloadconfig + 0),
            'grade_config' => $thisGradebook->config,
            'weight' => $thisGradebook->weight,
        );
    }
    return array(
        'html' => $thisGradebook->loadGradeContent($reloadconfig + 0),
        'grade_config' => $thisGradebook->config,
        'weight' => $thisGradebook->weight,
    );
}
function getGradebookSelectOptions($class_id, $gradebook_id = '') {
    $class = new J_Class();
    $class->retrieve($class_id);
    $class->load_relationship('j_class_j_gradebook_1');
    $gradebooks = $class->j_class_j_gradebook_1->getBeans();
    $list = array();
    $select_html = "";
    foreach($gradebooks as $id => $bean) {
        if($id == $gradebook_id) $selected = "selected";
        else  $selected = "";
        $select_html .= "<option value = '{$id}' label = '{$bean->name}' $selected 
        teacher_id = '{$bean->c_teachers_j_gradebook_1c_teachers_ida}' 
        teacher_name = '{$bean->c_teachers_j_gradebook_1_name}'>
        {$bean->name}</option>";
        $list[$id] = $bean->name;
    }
    return $select_html;//get_select_options_with_id($list, $gradebook_id);
}

function saveInputMark($_data) {         
    global $timedate, $current_user;
    $gradebook = new J_Gradebook();
    $gradebook->retrieve($_data['gradebook_id']);

    if(empty($gradebook->id)){
        return json_encode(array(
            "success" => "0",
            "errorLabel" => "LBL_GRADEBOOK_NOT_FOUND",
        ));
    }

    $gradebook->grade_config = $_data['grade_config'];
    $gradebook->weight = $_data['weight'];
    $gradebook->c_teachers_j_gradebook_1c_teachers_ida = $_data['c_teachers_j_gradebook_1c_teachers_ida'];
    $gradebook->c_teachers_j_gradebook_1_name = $_data['c_teachers_j_gradebook_1_name'];
    $gradebook->date_input = $timedate->nowDate();  // request of mrHung
    $gradebook->save();
    //Edit by Lam Hoang: only run SQL query when save Final Test
    if($gradebook->type == 'Final'){
        if(strpos($gradebook->team_name,'360')){
            //get minimum LMS score
            //tam thoi khong dung
            /*$sql_check_lms = "SELECT 
            cc.j_class_contacts_1contacts_idb student_id,
            MIN(IFNULL(ls.score, 0)) score
            FROM
            alpha_lessonname al
            INNER JOIN
            alpha_classroom ac ON al.alpha_classroom_id = ac.id
            INNER JOIN
            meetings m ON ac.sso_code = m.sso_code
            AND m.ju_class_id = 'e33b145e-d8b3-46cf-0649-57edc5aab064'
            INNER JOIN
            j_class_contacts_1_c cc ON cc.j_class_contacts_1j_class_ida = m.ju_class_id
            AND cc.deleted = 0
            LEFT JOIN
            (SELECT 
            MAX(score) score,
            MAX(passed) passed,
            skill,
            level,
            title,
            alpha_student_id,
            alpha_classroom_id
            FROM
            alpha_lessons
            GROUP BY alpha_student_id , alpha_classroom_id , unit_id) ls ON ls.alpha_classroom_id = ac.alpha_classroom_id
            AND ls.title = al.lesson_name
            GROUP BY student_id";
            $lms_rs = $GLOBALS['db']->query($sql_check_lms);
            $lms_result_arr = array(); 
            while($row = $GLOBALS['db']->fetchByAssoc($lms_rs)){
                $lms_result_arr[$row['student_id']] = $row['score'];
            }*/
            //get all score to check
            $sql_get_score = "SELECT 
            gd.student_id, g.type ,gd.final_result final_score
            FROM
            j_gradebookdetail gd
            INNER JOIN
            j_gradebook g ON g.deleted = 0 AND gd.deleted = 0
            AND g.id = gd.gradebook_id
            AND g.type NOT IN ('LMS','Final')
            AND gd.j_class_id = '{$gradebook->j_class_j_gradebook_1j_class_ida}'";
            $result_score = $GLOBALS['db']->query($sql_get_score);
            $arr_result_score = array();
            while ($row = $GLOBALS['db']->fetchByAssoc($result_score)){
                $arr_result_score[$row['student_id']][$row['type']] = $row['final_score'];
            }

        }else{
            //Change sql query by Lam Hoang
            $sql = "SELECT 
            mc.contact_id, SUM(m.duration_cal)
            FROM
            meetings_contacts mc
            INNER JOIN
            j_studentsituations ss ON mc.situation_id = ss.id
            AND mc.deleted = 0
            AND ss.deleted = 0
            AND ss.type IN ('Enrolled' , 'settle', 'moving in')
            INNER JOIN
            (SELECT 
            id, duration_cal
            FROM
            meetings
            WHERE
            deleted = 0
            AND session_status <> 'Cancelled'
            AND meeting_type = 'session'
            AND ju_class_id = '{$gradebook->j_class_j_gradebook_1j_class_ida}') m ON m.id = mc.meeting_id
            INNER JOIN
            c_attendance a ON a.meeting_id = m.id
            AND a.student_id = mc.contact_id
            AND a.leaving_type = 'P'
            AND a.deleted <> 1
            GROUP BY mc.contact_id";
            $result = $GLOBALS['db']->query($sql);
            $attendedHour = array();
            while($row = $GLOBALS['db']->fetchByAssoc($result)) {
                //save the first test in array studentTest1
                $attendedHour[$row['student_id']] = $row['attendance'] ;  
            }           
            //Change sql query by Lam Hoang
            $sql = "SELECT 
            mc.contact_id contacts.id,
            SUM(m.duration_cal)  total
            FROM
            meetings_contacts mc
            INNER JOIN
            j_studentsituations ss ON mc.situation_id = ss.id
            AND mc.deleted = 0
            AND ss.deleted = 0
            AND ss.type IN ('Enrolled' , 'settle', 'moving in')
            INNER JOIN
            (SELECT 
            id, duration_cal
            FROM
            meetings
            WHERE
            deleted = 0
            AND session_status <> 'Cancelled'
            AND ju_class_id = '{$gradebook->j_class_j_gradebook_1j_class_ida}') m ON m.id = mc.meeting_id
            GROUP BY mc.contact_id";
            $result = $GLOBALS['db']->query($sql);
            $totalHour = array();
            while($row = $GLOBALS['db']->fetchByAssoc($result)) {
                //save the first test in array studentTest1
                $totalHour[$row['id']] = $row['total'];  
            } 
        }
    }

    $keys = json_decode(html_entity_decode($_data['key']),true);
    $max_result = $_data['max_marks'];
    //danh dau xoa cac detail cu
    $dateModifield = $timedate->nowDb();
    $GLOBALS['db']->query("UPDATE j_gradebookdetail 
        SET deleted = 1,
        date_modified = '{$dateModifield}',
        description = 'delete by function saveInputMark.',
        modified_user_id = '{$current_user->id}' 
        WHERE gradebook_id = '{$gradebook->id}'
        AND deleted <> 1"); 
    $GLOBALS['db']->query("UPDATE j_gradebook 
        SET date_modified = '$dateModifield',
        modified_user_id = '{$current_user->id}'
        WHERE id = '{$gradebook->id}'");                  

    $countSaveErrors = 0; //Add by Tung Bui - 03.10.2016 - Check log save gradebook detail
    for($i = 0; $i < count($_data['student_id']); $i++){
        $detail = new J_GradebookDetail();

        $detail->student_id = $_data['student_id'][$i]; 
        $detail->gradebook_id = $gradebook->id; 
        $detail->team_id = $gradebook->team_id; 
        $detail->team_set_id = $gradebook->team_set_id; 

        $content = array();
        for($j = 0; $j < count($keys); $j++) {
            $key = $keys[$j];
            $content[$key] = $_data[$key][$i];
        }
        // $detail->final_result = $content[$key]/100;
        // $detail->total_mark = $detail->final_result * $max_result ;

        $detail->total_mark = $content[$key];
        $detail->final_result = round($detail->total_mark/$max_result, 4);

        $content['comment_key'] = json_decode(html_entity_decode($_data['key_teacher_comment'][$i]),true);
        $content['comment_label'] = base64_encode($_data['value_teacher_comment'][$i]);
        $detail->content = json_encode($content);
        $detail->description = $_data['value_teacher_comment'][$i];
        $detail->j_class_id = $gradebook->j_class_j_gradebook_1j_class_ida;
        $detail->teacher_id = $gradebook->c_teachers_j_gradebook_1c_teachers_ida;

        $detail->date_input = $gradebook->date_input;
        if($gradebook->type == 'Final') {
            $class = new J_Class();
            $class->retrieve($gradebook->j_class_j_gradebook_1j_class_ida);
            if(strpos($class->team_name,'360')){
                //certificate type 360 goes here
                //comment by Lam Hoang
                /*$sql_lms = "SELECT 
                m.ju_class_id class_id,
                s.sis_student_id student_id,
                ac.name lesson_name,
                ls.title RE_tittle,
                ls.skill,
                ls.score
                FROM
                (SELECT 
                MAX(score) score,
                MAX(passed) passed,
                skill,
                level,
                title,
                alpha_student_id,
                alpha_classroom_id
                FROM
                alpha_lessons
                GROUP BY alpha_student_id , alpha_classroom_id , unit_id) ls
                INNER JOIN
                alpha_students s ON s.alpha_student_id = ls.alpha_student_id
                AND ls.alpha_classroom_id = s.alpha_classroom_id
                INNER JOIN
                alpha_classroom ac ON ac.alpha_classroom_id = ls.alpha_classroom_id
                INNER JOIN
                meetings m ON m.deleted = 0
                AND m.sso_code = ac.sso_code
                AND m.id = s.session_id
                AND m.ju_class_id = '{$class->id}'        
                AND s.sis_student_id = '{$detail->student_id}'
                WHERE
                ls.score < 80
                GROUP BY s.sis_student_id , ac.sso_code , ls.title";
                $lms_check = $GLOBALS['db']->fetchArray($sql_lms);*/
                /*if($attResult[$detail->student_id] < 0.8 || $detail->final_result < 0.8 || $lms_result_arr[$detail->student_id] < 80 || $arr_mini_check[$detail->student_id] < 0.8 ) {
                $detail->cerificate_type = 'Fail';    
                }else $detail->certificate_type = 'Completed';*/
//                if($arr_result_score[$detail->student_id]['Mini Check'] < 0.8 || $detail->final_result < 0.8 || $lms_result_arr[$detail->student_id] < 80 || $arr_result_score[$detail->student_id]['Attendance'] < 0.8 || $arr_result_score[$detail->student_id]['Class Progress'] ) {
                if($detail->final_result < 0.5 || $arr_result_score[$detail->student_id]['Attendance'] < 0.8 ) {
                    $detail->certificate_type = 'Fail';    
                }else $detail->certificate_type = 'Completed';

            }else{
                if ($class->isAdultKOC()) {
                    $attentedPer = ($totalHour[$detail->student_id]) ? $attendedHour[$detail->student_id]/$totalHour[$detail->student_id] : 0;
                    if($attentedPer < 0.7) {
                        if($detail->final_result >= 0.6) {
                            $detail->certificate_type = 'Competence';
                        } else {
                            $detail->certificate_type = 'Fail';
                        }
                    } else {
                        if( $detail->final_result < 0.6 ){
                            $detail->certificate_type = "Attendance";
                        }else if( $detail->final_result < 0.85 ){
                            $detail->certificate_type = 'Achievement';                        
                        }else if( $detail->final_result <= 1 ) {
                            $detail->certificate_type = 'Excellent Achievement'; 
                        }
                    } 
                } else {   
                    if( $detail->final_result < 0.5 ){
                        $detail->certificate_type = "Fail";
                    }else if( $detail->final_result < 0.65 ){
                        $detail->certificate_type = 'Pass';
                    }else if( $detail->final_result < 0.9 ) {
                        $detail->certificate_type = 'Merit';
                    }else if( $detail->final_result <= 1 ) {
                        $detail->certificate_type = 'Distinction'; 
                    }
                }    
            }

        }
        try {
            $detail->save();
        } catch(Exception $e) {
            $countSaveErrors++;
        }

    }

    //Add by Tung Bui - 03.10.2016 - Check log save gradebook detail
    if($countSaveErrors == 0){ 
        return json_encode(array(
            "success" => "1",
        )); 
    }else{
        return json_encode(array(
            "success" => "0",
            "errorLabel" => "LBL_SAVE_INPUT_GRADEBOOK_UNSUCCESSFULL",
        ));
    }
}

function showConfig($gradebook_id) {
    $gradebook = new J_Gradebook();
    $gradebook->retrieve($gradebook_id); 
    $gradebook->_constructDefault(false);
    return array(
        'html' =>  $gradebook->gradebookConfig->getConfigHTML($gradebook->grade_config),
    );              
}
//add by Lam Hai 22/7/2016
function checkDuplicateTest($gradebook_id, $class_id, $type) {
    $sql = "SELECT count(j_gradebook.id)       
    FROM j_gradebook
    INNER JOIN j_class_j_gradebook_1_c cg ON j_gradebook.id = cg.j_class_j_gradebook_1j_gradebook_idb AND cg.deleted = 0
    WHERE j_gradebook.deleted = 0 
    AND cg.j_class_j_gradebook_1j_class_ida = '{$class_id}' 
    AND j_gradebook.type = '{$type}' 
    AND j_gradebook.id != '{$gradebook_id}' ";
    $count = $GLOBALS['db']->getOne($sql);      

    if($count > 0) {
        return true;
    }

    return false;             
}
?>
