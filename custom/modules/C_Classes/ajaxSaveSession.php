<?php
    $stt = 0;
    include_once("custom/include/_helper/class_utils.php");
    include_once("custom/include/_helper/studySchedule.php");
    $class = BeanFactory::getBean('C_Classes',$_POST['class_id']);
    global $timedate;
    $json = getJSONobj();
    $tmpContent = array(
        'week_day_str' => implode(", ",$_POST['week_day']),
        'week_day' => $_POST['week_day'],
        'start_date' => $_POST['start_date'],
        'end_date' => $_POST['end_date'],
        'start_time' => $_POST['start_time'],
        'end_time' => $_POST['end_time'],
        'teachers' => $_POST['teachers_name'],
        'rooms' => $_POST['rooms_name'],
        'last_created' => $timedate->to_display_date_time($timedate->nowDb()),
    );
    //Get list holiday
    $arr_holiday = array();
    $q1 = "SELECT id, holiday_date FROM holidays WHERE deleted = 0 AND type = 'Public Holiday'";
    $rs1 = $GLOBALS['db']->query($q1);
    while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
        $arr_holiday[] = $GLOBALS['timedate']->to_display_date($row['holiday_date']);
    }

    $now_date = strtotime($timedate->nowDbDate());
    for($i = 0; $i < count($_POST['week_day']); $i++){
        $days = get_array_weekdates($_POST['start_date'], $_POST['end_date'], $_POST['week_day'][$i]);
        //Check lock info - By Lap Nguyen
        foreach($days as $key=>$value){
            $check_date = strtotime('first day of next month '.$timedate->to_db_date($value,false)) + ( (intval($GLOBALS['sugar_config']['lock_date']) - 1) * 86400 );
            if($GLOBALS['sugar_config']['lock_info'] && ($now_date > $check_date) && (!$GLOBALS['current_user']->isAdminForModule('Users')))
                unset($days[$key]); 

        }
        //END Checking lock info

        $days = array_diff($days, $arr_holiday);
        //Make JSON Detail
        $tmpContent[$_POST['week_day'][$i]] = $days;

        foreach ($days as $date){
            $stt++; 
            $db_start = $timedate->to_db($date.' '.$_POST['start_time'][$i]);
            $db_end = $timedate->to_db($date.' '.$_POST['end_time'][$i]);

            //Calculate duration
            $d1 = strtotime($db_start);
            $d2 = strtotime($db_end);
            $interval = $d2 - $d1;
            $minutes = round($interval / 60);;

            $ss = new Meeting();
            $ss->name = $class->name;
            $ss->date_start = $db_start;
            $ss->type = $class->type;

            $ss->duration_hours = floor($minutes / 60);
            $ss->duration_minutes = floor($minutes % 60);


            $ss->meeting_type = 'Session'; 
            $ss->class_id = $_POST['class_id']; 
            $ss->teacher_id = $_POST['teachers'][$i]; 
            $ss->room_id = $_POST['rooms'][$i];
            $ss->teaching_hour = $_POST['teaching_hours'][$i];
            $ss->delivery_hour = $_POST['delivery_hours'][$i];
            $ss->update_vcal = false;
            $ss->type_of_class  = '360';

            $ss->team_id = $class->team_id;
            $ss->team_set_id = $class->team_set_id;
            $ss->assigned_user_id = $GLOBALS['current_user']->id;
            $ss->save();

            //Add student to ALL sessions
            if($_POST['add_students'][$i] == 'Yes'){
                $class = BeanFactory::getBean('C_Classes',$ss->class_id);
                $class->load_relationship('c_classes_contacts_1');
                $student_list = $class->c_classes_contacts_1->getBeans();
                foreach($student_list as $student){
                    //Get Cost per hour
                    $enr_id = $GLOBALS['db']->getOne("SELECT enrollment_id enr_id FROM c_classes_contacts_1_c WHERE c_classes_contacts_1c_classes_ida = '{$class->id}' AND c_classes_contacts_1contacts_idb = '{$student->id}' AND deleted = 0");
                    if(!empty($enr_id)){
                    	addPubToSession($enr_id , $ss->id );
                    }else{
                       addCorpToSession($student->id , $ss->id ); 
                    }   
                }   
            }

            //Add Teacher to Class
            $class->load_relationship('c_classes_c_teachers_1'); 
            $class->c_classes_c_teachers_1->add($ss->teacher_id);

            //Add Room To Class
            $class->load_relationship('c_classes_c_rooms_1'); 
            $class->c_classes_c_rooms_1->add($ss->room_id);


        }
    }
    $tmpContent['total'] = $stt;

    $class->content = $json->encode($tmpContent, false);
    $class->save();
    if($stt > 0)
        echo '1';
    else
        echo '0';
