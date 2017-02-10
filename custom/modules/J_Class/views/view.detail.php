<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class J_ClassViewDetail extends ViewDetail
{
    /**
    * @see SugarView::display()
    *
    * We are overridding the display method to manipulate the portal information.
    * If portal is not enabled then don't show the portal fields.
    */
    public function display()
    {
        $this->ss->assign("team_type", getTeamType($this->bean->team_id));
        global $timedate;
        require_once("custom/include/_helper/junior_revenue_utils.php");
        require_once("custom/include/_helper/class_utils.php");
        //DETAILVIEW LAYOUT
        //kind Of course
        $koc = '';
        $koc .='<label>'.$this->bean->koc_name.'</label>&nbsp &nbsp &nbsp  Level: <label>'.str_replace(',',', ',str_replace('^','',$this->bean->level)).'</label>';
        if(!empty($this->bean->modules)){
            $koc .='&nbsp; &nbsp; &nbsp;Module: <label>'.$this->bean->modules.'</label>';
        }

        $this->ss->assign('KOC',$koc);

        // Display schedule
        $html = '';
        $short_schedule = json_decode(html_entity_decode($this->bean->short_schedule));
        foreach($short_schedule as $key => $value ){
            $html .= '<li>';
            $html .= $value.': '.$key;
            $html .= '</li>';
        }

        $this->ss->assign("SCHEDULE", $html);

        //upgrade to class
        $this->bean->load_relationship('j_class_j_class_1');
        $upgrade_to_class = reset($this->bean->j_class_j_class_1->getBeans());
        $atag = '<a href="index.php?module=J_Class&action=DetailView&record='.$upgrade_to_class->id.'" TARGET=_blank>'.$upgrade_to_class->name.'</a>';
        $this->ss->assign("UTC", $atag);

        //Upgrade Button
        if($this->bean->isupgrade == 0){
            $btn = '<input title="Upgrade" class="button" onclick="var _form = document.getElementById(\'formDetailView\'); _form.return_module.value=\'J_Class\'; _form.return_action.value=\'DetailView\'; _form.isDuplicate.value=true; _form.action.value=\'EditView\'; _form.return_id.value=\''.$this->bean->id.'\';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Duplicate" value="Upgrade" id="duplicate_button">';
            $this->ss->assign("UPGRADE_BUTTON", $btn);
        }

        //Button Submit In Progress
        $btnSubmitInProgress = "";
        if ($this->bean->status == "Planning" && (checkDataLockDate($this->bean->start_date)) )
            $btnSubmitInProgress = '<input type="button" class="button" id="submit_in_progress" name="submit_in_progress" value="'.$GLOBALS['mod_strings']['LBL_SUBMIT_IN_PROGRESS'].'"/>';
        $this->ss->assign("BTN_SUBMIT_IN_PROGRESS", $btnSubmitInProgress);

        //Get list Session & Parse to Json
        $arr = array();
        $q2 = "SELECT DISTINCT
        IFNULL(meetings.id, '') primaryid,
        meetings.date_start date_start,
        meetings.lesson_number lesson_number,
        meetings.delivery_hour delivery_hour
        FROM
        meetings
        INNER JOIN
        j_class l1 ON meetings.ju_class_id = l1.id
        AND l1.deleted = 0
        WHERE
        (((l1.id = '{$this->bean->id}')
        AND (meetings.session_status <> 'Cancelled')))
        AND meetings.deleted = 0
        ORDER BY date_start ASC";
        $rs2 = $GLOBALS['db']->query($q2);
        $count_ss = 0;
        while($ss = $GLOBALS['db']->fetchByAssoc($rs2)){
            $date_start_int = date('Y-m-d',strtotime("+7 hours ".$ss['date_start']));

            if($date_start_int != $last_date_start_int)
                $delivery_hour = $ss['delivery_hour'];
            else $delivery_hour += $ss['delivery_hour'];

            $arr[$date_start_int]  = $delivery_hour;

            $last_date_start_int = $date_start_int;
            $count_ss++;
        }

        $json_ss = json_encode($arr);
        $this->ss->assign("json_ss", $json_ss);

        //Outstanding Variable
        $this->ss->assign("today",$timedate->nowDate());

        if($_GET['function'] == 'addOutstanding'){
            $student_id 	= $_GET['student_id'];
            $sql = "SELECT CONCAT(IFNULL(last_name, ''), ' ', IFNULL(first_name, '')) student_name FROM contacts WHERE id = '$student_id'";
            $student_name = $GLOBALS['db']->getOne($sql);
            $this->ss->assign("ot_student_id", $student_id);
            $this->ss->assign("ot_student_name", $student_name);
        }
        //Handle Demo
        if($_GET['function'] == 'addDemo'){
            $student_type 	= $_GET['student_type'];
            $student_id 	= $_GET['student_id'];
            $sql = "SELECT CONCAT(IFNULL($student_type.last_name, ''), ' ', IFNULL($student_type.first_name, '')) student_name FROM $student_type WHERE id = '$student_id'";
            $student_name = $GLOBALS['db']->getOne($sql);
            $this->ss->assign("dm_student_id", $student_id);
            $this->ss->assign("dm_student_name", $student_name);
            $this->ss->assign("dm_student_type", $student_type);
        }

        //        // Assian main teacher & covered teacher
        //        $sqlGetTeachers = "SELECT teacher_id,
        //        COUNT(teacher_id) count
        //        FROM meetings
        //        WHERE ju_class_id = '{$this->bean->id}'
        //        AND deleted <> 1
        //        AND session_status <> 'Cancelled'
        //        AND teacher_id <> ''
        //        GROUP BY teacher_id
        //        ORDER BY COUNT(teacher_id) DESC";
        //        $rsGetTeachers = $GLOBALS['db']->query($sqlGetTeachers);
        //
        //        $mainTeacher = "";
        //        $coveredTeacher = array();
        //        while($rowTeacher = $GLOBALS['db']->fetchByAssoc($rsGetTeachers) ) {
        //            if($mainTeacher == "") $mainTeacher = $rowTeacher['teacher_id'];
        //            else $coveredTeacher[] = $rowTeacher['teacher_id'];
        //        }

        //Show lesson test
        $lessonTest1 = "";
        $lessonTest2 = "";
        $lessonFinalTest = "";
        if (!empty($this->bean->lesson_test_1)){
            $res = makeLessonTestHtml($this->bean->lesson_test_1,$this->bean->id);
            $lessonTest1 = $res['html'];
            if($this->bean->test_1_date != $res['test_date'])
                $GLOBALS['db']->query("UPDATE j_class SET test_1_date ='".$timedate->to_db_date($res['test_date'],false)."' WHERE id='{$this->bean->id}'");
        }
        if (!empty($this->bean->lesson_test_2)){
            $res = makeLessonTestHtml($this->bean->lesson_test_2,$this->bean->id);
            $lessonTest2 = $res['html'];
            if($this->bean->test_2_date != $res['test_date'])
                $GLOBALS['db']->query("UPDATE j_class SET test_2_date ='".$timedate->to_db_date($res['test_date'],false)."' WHERE id='{$this->bean->id}'");
        }
        if (!empty($this->bean->lesson_final_test)){
            $res = makeLessonTestHtml($this->bean->lesson_final_test,$this->bean->id);
            $lessonFinalTest = $res['html'];
            if($this->bean->final_test_date != $res['test_date'])
                $GLOBALS['db']->query("UPDATE j_class SET final_test_date ='".$timedate->to_db_date($res['test_date'],false)."' WHERE id='{$this->bean->id}'");
        }

        //Get next session date
        $qNextSessionDate = "SELECT DATE(CONVERT_TZ(date_start,'+00:00','+7:00'))
        FROM meetings
        WHERE deleted <> 1
        AND ju_class_id = '{$this->bean->id}'
        AND date_start > NOW()
        ORDER BY date_start ASC
        LIMIT 1";
        $nextSessionDate = $GLOBALS['db']->getOne($qNextSessionDate);
        $nextSessionDate = $timedate->to_display_date($nextSessionDate,false);

        $this->ss->assign("LESSON_TEST_1", $lessonTest1);
        $this->ss->assign("LESSON_TEST_2", $lessonTest2);
        $this->ss->assign("LESSON_FINAL_TEST", $lessonFinalTest);
        $this->ss->assign('session_cancel_reason_options',get_select_options_with_id($GLOBALS['app_list_strings']['session_cancel_reason_options'],''));
        $this->ss->assign('teaching_type_options',get_select_options_with_id($GLOBALS['app_list_strings']['teaching_type_options'],''));
        $this->ss->assign('next_session_date',$nextSessionDate);

        //Add by Tung Bui 04/02/2016 - create option for function export attendance list
        $lessonListHtml = "";
        for ($i = 1; $i <= $count_ss; $i++) {
            $lessonListHtml .= "<option value='{$i}'>".$i."</option>";
        }
        $this->ss->assign('LESSON_LIST',$lessonListHtml);

        //add By Lam Hai 01/06/2016 - get list for function export student list
        $kindOfCourse = $this->bean->kind_of_course;
        $checkAdult = $this->bean->isAdultKOC();
        $sqlGetStudents = "SELECT DISTINCT l1.class_code, contacts.id, contact_id, full_student_name
        FROM contacts
        INNER JOIN  j_class_contacts_1_c l1_1 ON contacts.id = l1_1.j_class_contacts_1contacts_idb AND l1_1.deleted = 0
        INNER JOIN  j_class l1 ON l1.id = l1_1.j_class_contacts_1j_class_ida AND l1.deleted = 0
        WHERE l1.id = '{$this->bean->id}'
        AND  contacts.deleted=0
        ORDER BY full_student_name ASC";
        $rsGetStudents = $GLOBALS['db']->query($sqlGetStudents);
        $studentNo = 1;
        $studentHtml = '';

        while($rowStudent = $GLOBALS['db']->fetchByAssoc($rsGetStudents)) {
            $studentHtml .= '<tr>
            <td class="checkbox"><input type="checkbox" class="check" name = "student_id[]" value="'. $rowStudent['id']. '"></td>
            <td>'. $studentNo. '</td>
            <td>'. $rowStudent['contact_id']. '</td>
            <td class="studentName">'. $rowStudent['full_student_name'] . '</td>
            </tr>';
            $studentNo ++;
        }

        $this->ss->assign('CLASS_ID', $this->bean->id);
        $this->ss->assign('STUDENT_LIST', $studentHtml);
        $this->ss->assign('ISADULT', $checkAdult?1:0);
        //end By Lam Hai

        //Check Role Button Export
        $btnExport = "";
        if(ACLController::checkAccess('J_Class', 'export', true)) {
            if($this->bean->class_type == "Normal Class"){
                $btnExport .= '<input type="button" class="button" id="export_attendance" name="export_attendance" value="'.$GLOBALS['mod_strings']['BTN_TOP_EXPORT_ATTENDANCE'].'" onclick="showDialogExportAttendance();"/>' ;
                $btnExport .= '<input type="button" class="button" id="export" name="export" value="'.$GLOBALS['mod_strings']['BTN_EXPORT_CERTIFICATE'].'" />';
            }

        }
        $this->ss->assign("BTN_EXPORT", $btnExport);
        $this->ss->assign("TEAMTYPE", getTeamType($this->bean->team_id));


        //updateClassSession($this->bean->id);
        $this->bean->closed_date =$timedate->nowDate();

        // Dirty trick to clear cache, a must for EditView:
        $th = new TemplateHandler();
        $th->deleteTemplate('J_Class', 'DetailView');
        if($this->bean->class_type == "Waiting Class"){
            unset($this->dv->defs['panels']['lbl_detailview_panel1']);
            $team_type = getTeamType($this->bean->team_id);
            if($team_type == 'Adult')
                unset($this->dv->defs['panels']['lbl_detailview_panel4'][4]);

        }else{
            unset($this->dv->defs['panels']['lbl_detailview_panel4']);
        }


        parent::display();
    }

    function _displaySubPanels(){
        require_once ('include/SubPanel/SubPanelTiles.php');
        $subpanel = new SubPanelTiles($this->bean, $this->module);

        //hide subpanel Panel Session if type is waiitng
        if($this->bean->class_type == "Waiting Class"){
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['j_class_meetings']);
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['j_class_j_gradebook_1']);
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['j_class_contacts_1']);
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['j_class_meetings_cancel']);
        }
        //        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['j_class_meetings']);
        //        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['j_class_studentsituations']);
        echo $subpanel->display();
    }
}

function makeLessonTestHtml($lessonNumber, $classId){
    global $timedate;
    if ($lessonNumber == 1) $suffix = "st";
    elseif ($lessonNumber == 2) $suffix = "nd";
    elseif ($lessonNumber == 3) $suffix = "rd";
    else $suffix = "th";

    $sql = "SELECT date_start,
    CONVERT_TZ(date_start, '+00:00', '+7:00') date_dis_start
    FROM meetings
    WHERE ju_class_id = '{$classId}'
    AND deleted <> 1
    ANd lesson_number = '{$lessonNumber}'";
    $rs = $GLOBALS['db']->query($sql);
    $row = $GLOBALS['db']->fetchByAssoc($rs);

    $week_date      =  date('l',strtotime($row['date_dis_start']));
    $test_date_time = $timedate->to_display_date_time($row['date_start']);
    $test_date      = $timedate->to_display_date($row['date_start']);

    $html = "<span>{$lessonNumber}{$suffix}: $week_date $test_date_time</span>";
    $rs = array();
    $rs['html'] = $html;
    $rs['test_date'] = $test_date;
    return $rs;
}
