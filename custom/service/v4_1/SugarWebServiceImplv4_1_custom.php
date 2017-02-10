<?php

if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('service/v4_1/SugarWebServiceImplv4_1.php');

/*
*   class SugarWebServiceImplv4_1_custom
*   Author: Hieu Nguyen
*   Date: 2015-06-04
*   Purpose: To handle custom webservices
*/

class SugarWebServiceImplv4_1_custom extends SugarWebServiceImplv4_1 {

    // Get language by a given type and language name
    function get_sugar_language($session, $type, $language) {
        $error = new SoapError();

        // Authenticate
        if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', '', 'read', 'no_access',  $error)) {
            return;
        }

        // Process
        if($type == 'app_list_strings') {
            $langString = return_app_list_strings_language($language);
        } else if($type == 'app_strings' ) {
            $langString = return_application_language($language);
        } else{
            $langString = return_module_language($language, $type, true);
        }

        return $langString;
    }

    // Change password
    public function change_password($session, $currentPassword, $newPassword) {
        $error = new SoapError();

        // Authenticate
        if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', '', 'read', 'no_access',  $error)) {
            return;
        }

        global $current_user;
        if(preg_match('/[<&>\'"]/', $newPassword,$matches)){
            return array(
                "status"    => "Error",
                "notify"   => "Password does not contain &, <, >, \", \' characters.",
            );
        }
        if($current_user->checkPasswordMD5($currentPassword, $current_user->user_hash)) {
            $current_user->setNewPassword($newPassword, '0', false) ;
            //$current_user->user_hash = $current_user->getPasswordHash($newPassword);
            //$current_user->save();
            $GLOBALS['db']->query("update contacts set password_generated = '$newPassword' where contact_id = '{$current_user->user_name}'");

            return $current_user->toArray();
        } else {
            return array('status'=>'Error', 'message'=>'Wrong password');
        }
    }  //Tạm thời comment

    /*public function change_password($session, $currentPassword, $newPassword) {
    $error = new SoapError();

    // Authenticate
    if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', '', 'read', 'no_access',  $error)) {
    return;
    }

    global $current_user;

    if($current_user->checkPasswordMD5($currentPassword, $current_user->user_hash)) {
    $current_user->setNewPassword($newPassword, '0', true) ;
    //$current_user->user_hash = $current_user->getPasswordHash($newPassword);
    //$current_user->save();

    return $current_user->toArray();
    } else {
    return array('status'=>'Error', 'message'=>'Wrong password');
    }
    }*/

    // Set user preferences by a given array of preferences
    function set_user_preferences($session, $preferences) {
        $error = new SoapError();

        // Authenticate
        if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', '', 'read', 'no_access',  $error)) {
            return;
        }

        if(!empty($preferences)) {
            global $beanFiles, $current_user;
            require_once($beanFiles['UserPreference']);
            $userPreference = new UserPreference($current_user);

            foreach($preferences as $key => $value) {
                $userPreference->setPreference($key, $value);
            }

            $userPreference->savePreferencesToDB();
        }

        return array('status' => true);
    }

    // Get all enrollment that belong to the given student id. Added by Hieu Nguyen on 2016-05-31
    // Fix bug by Trung Nguyen 2016.07.05
    function get_enrollment_list($session, $studentId) {
        $error = new SoapError();

        // Authenticate
        if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', '', 'read', 'no_access',  $error)) {
            return;
        }

        //get all situation of student
        global $db, $timedate;
        $enrollments = array();
        $sql = "SELECT DISTINCT
        IFNULL(j_studentsituations.id, '') id
        ,IFNULL(l2.name, '') class_name
        ,IFNULL(j_studentsituations.type, '') type
        ,IFNULL(j_studentsituations.total_hour, '') total_hour
        ,IFNULL(j_studentsituations.total_amount, '') total_amount
        ,IFNULL(j_studentsituations.start_study, '') start_study
        ,IFNULL(j_studentsituations.end_study, '') end_study
        ,IFNULL(l3.name,'') team_name
        ,TRIM(CONCAT(u.last_name,' ',u.first_name)) as ec_name

        FROM j_studentsituations
        INNER JOIN contacts l1 ON j_studentsituations.student_id = l1.id AND l1.deleted = 0
        INNER JOIN j_class l2 ON j_studentsituations.ju_class_id = l2.id AND l2.deleted = 0
        INNER JOIN  teams l3 ON j_studentsituations.team_id=l3.id AND l3.deleted=0
        INNER JOIN users u ON u.id = j_studentsituations.assigned_user_id
        WHERE
        l1.id = '{$studentId}'
        AND IFNULL(l2.kind_of_course,'') <> 'Outing Trip'
        AND j_studentsituations.type IN ('Enrolled','OutStanding','Settle','Moving In')
        AND j_studentsituations.deleted = 0
        ORDER BY j_studentsituations.start_study";
        $result = $db->query($sql);
        $situationString = "(";
        while($row = $db->fetchByAssoc($result)){
            $nowDb = $timedate->nowDbDate();
            $enrollments[$row['id']] = array(
                'class_name' => $row['class_name'],
                'total_hour' => $row['total_hour'],
                'total_amount' => format_number($row['total_amount']),
                'start_date' => $row['start_study'],
                'end_date' => $row['end_study'],
                'balance' => '0',
                'balance_hour' => $row['total_hour'],
                'center' => $row['team_name'],
                'ec_name' => $row['ec_name']
            );
            //insert to situationString
            if($situationString != "(") $situationString .= ",";
            $situationString .= "'{$row['id']}'";
        }
        $situationString .= ")";

        //calculate balance
        $sql = "SELECT DISTINCT
        l2.id situation_id
        ,IFNULL(SUM(meetings.delivery_hour),0) total_delivery_hour
        FROM
        meetings
        INNER JOIN meetings_contacts l1_1 ON meetings.id = l1_1.meeting_id AND l1_1.deleted = 0
        INNER JOIN contacts l1 ON l1.id = l1_1.contact_id AND l1.deleted = 0
        INNER JOIN j_studentsituations l2 ON l1_1.situation_id = l2.id AND l2.deleted = 0
        WHERE
        l1.id = '{$studentId}'
        AND l2.id IN ".$situationString."
        AND meetings.date_start >= CONVERT_TZ('".date('Y-m-d H:i:s')."','+07:00','+00:00')
        AND meetings.session_status <> 'Cancelled'
        AND meetings.deleted <> 1
        AND l2.type IN ('Enrolled','Settle','Moving In')
        GROUP BY l2.id
        ";
        //$resultList = array();
        $result = $db->query($sql);
        while($row = $db->fetchByAssoc($result)){
            $nowDb = $timedate->nowDbDate();
            $totalHour = $enrollments[$row['situation_id']]['total_hour'];
            $totalAmount = unformat_number($enrollments[$row['situation_id']]['total_amount']);
            if($totalHour == 0) $balance = 0;
            else $balance = $totalAmount/$totalHour * $row['total_delivery_hour'];
            $enrollments[$row['situation_id']]['balance'] = format_number($balance);
            $enrollments[$row['situation_id']]['balance_hour'] = $row['total_delivery_hour'];
            //$resultList[] = $enrollments[$row['situation_id']];
        }

        return array_values($enrollments);
    }

    // Get schedule that belong to the given student id
    function get_schedules($session, $studentId) {
        $error = new SoapError();

        // Authenticate
        if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', 'Meetings', 'read', 'no_access',  $error)) {
            return;
        }

        global $db, $timedate;
        $schedules = array();

        $sql = "SELECT DISTINCT
        m.id,
        DATE(m.date_start) AS date,
        m.date_start,
        m.date_end,
        c.name AS session_name,
        c.name class_name,
        IFNULL(tc.full_teacher_name, '') AS teacher_name,
        m.duration_cal duration,
        '' as room_name
        FROM
        meetings m
        INNER JOIN
        meetings_contacts mc ON (m.id = mc.meeting_id AND mc.deleted = 0)
        AND m.meeting_type = 'Session'
        AND m.session_status != 'Canceled'
        AND m.deleted = 0
        AND mc.contact_id = '$studentId'
        INNER JOIN
        j_class c ON (m.ju_class_id = c.id AND c.deleted = 0)
        AND c.kind_of_course <> 'Outing Trip'
        LEFT JOIN
        c_teachers tc ON tc.id = m.teacher_id AND tc.deleted = 0
        ORDER BY m.date_start DESC";
        $result = $db->query($sql);

        // Fetch the data and return to the client
        while($row = $db->fetchByAssoc($result)) {
            $schedules[] = $row;
        }

        return $schedules;
    }

    /**
    * get gradebook detail of student in class
    *
    * @param mixed $session
    * @param mixed $student_id
    * @param mixed $class_id
    *
    * @author Trung Nguyen 2016.06.01
    */
    function getGradebookDetail($session, $student_id, $class_id) {
        $error = new SoapError();

        // Authenticate
        if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', 'J_Gradebook', 'read', 'no_access',  $error)) {
            return;
        }

        global $db;
        $sql = "SELECT DISTINCT g.id, g.`name`, cf.weight, g.date_input, gd.total_mark, gd.final_result, gd.content,
        t.name as center_name, c.hours, g.type, c.name as class_name
        FROM j_gradebookdetail gd
        INNER JOIN j_gradebook g ON g.id = gd.gradebook_id AND g.deleted = 0
        INNER JOIN j_class_j_gradebook_1_c cg ON cg.deleted = 0 AND cg.j_class_j_gradebook_1j_gradebook_idb = g.id
        INNER JOIN j_class c ON c.deleted = 0 AND c.id = cg.j_class_j_gradebook_1j_class_ida
        INNER JOIN teams t ON t.id = c.team_id
        INNER JOIN j_gradebookconfig cf ON cf.deleted = 0
        AND cf.team_id = c.team_id AND cf.type = g.type AND cf.koc_id = c.koc_id AND cf.`level` = c.`level`
        WHERE gd.deleted = 0  AND (g.status = 'Approved' OR g.type = 'LMS')
        AND gd.student_id = '$student_id' AND c.id = '$class_id'
        ORDER BY g.type";
        //return array($sql);
        $result = $db->query($sql);
        $data = array();
        while($row = $db->fetchByAssoc($result)) {
            $row['content'] = json_decode(html_entity_decode($row['content']),true);
            $focus = new J_Gradebook();
            $focus->retrieve($row['id']);
            $row['detail'] = $focus->getDetailForStudent($student_id);
            $data[] = $row;
        }
        $total = array();

        include_once("modules/J_Class/J_Class.php");
        $class = new J_Class();
        $class->retrieve($class_id);

        if($data[0] && (
            ($class->isAdultKOC() && count($data) >= 1) ||
            ( !$class->isAdultKOC() &&
                (
                    (count($data) >= 3 && $data[0]['hours'] > 72) ||
                    (count($data) >= 2 && $data[0]['hours'] > 36 && $data[0]['hours'] <= 72 ) ||
                    (count($data) >= 1 && $data[0]['hours'] > 0 && $data[0]['hours'] <= 36)
                )
            )
            )
            ){
                $sql = "SELECT DISTINCT gd.content, gd.certificate_type
                FROM j_gradebookdetail gd
                INNER JOIN j_gradebook g ON g.id = gd.gradebook_id AND g.deleted = 0
                INNER JOIN j_class_j_gradebook_1_c cg ON cg.deleted = 0 AND cg.j_class_j_gradebook_1j_gradebook_idb = g.id
                WHERE gd.deleted = 0 AND g.type = 'Final'  AND g.status = 'Approved'
                AND gd.student_id = '$student_id' AND cg.j_class_j_gradebook_1j_class_ida = '$class_id'
                ";
                //return array($sql);
                $result = $db->fetchOne($sql);
                $totals =   json_decode(html_entity_decode($result['content']),true);
                $total = array(
                    'mark' => (0 + $totals['total_mark'])?0 + round($totals['total_mark']*100,2,2):0,
                    'comment' => $totals['comment_label'],
                    'certificate_type' => $result['certificate_type'],
                );
        }

        return array(
            'gradebooks' => $data,
            'total' => $total,
        );
    }
    // Add by Lam Hai 2016.07.01
    function getCertificate($session, $studentID, $classID) {
        $error = new SoapError();
        // Authenticate
        if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', 'J_Gradebook', 'read', 'no_access',  $error)) {
            return;
        }

        require_once 'custom/include/PHPWord/PhpWord/Autoloader.php';
        \PhpOffice\PhpWord\Autoloader::register();
        include_once("modules/J_Class/J_Class.php");
        include_once("custom/include/utils/file_utils.php");

        global $db, $timedate;
        $forder_template_url = "custom/include/TemplateExcel/Junior";
        $forder_upload_file_url = "cache/JuniorTemplate";
        if(!file_exists($forder_upload_file_url)) {
            mkdir($forder_upload_file_url, 0777);
        }
        deleteFileInForder($forder_upload_file_url, 25);

        $class = new J_Class();
        $class->retrieve($classID);
        $kindOfCourse = $class->kind_of_course;
        $team = new Team();
        $team->retrieve($class->team_id);
        $region = $team->region;
        $data = array();
        $studentInfo = $db->fetchOne("SELECT full_student_name, birthdate, contact_id FROM contacts WHERE id = '$studentID' ");

        $enddate = $timedate->to_display($class->end_date, $timedate->get_date_format(), 'd/m/y');

        $studentInfo['cetificateno'] = $studentInfo['contact_id']. (str_replace('/', '',$enddate));
        if($class->isAdultKOC()) { //case Adult
            $sql = "SELECT SUM(meetings.duration_cal) attendance
            FROM meetings
            INNER JOIN c_attendance a  ON a.meeting_id = meetings.id AND a.deleted = 0
            WHERE meetings.deleted = 0 AND meetings.ju_class_id = '". $classID ."'
            AND meetings.session_status <> 'Cancelled'
            AND a.student_id = '" . $studentID . "'
            GROUP BY a.student_id ";
            $attendanceHour = $db->getOne($sql);

            $sql = "SELECT final_result mark
            FROM j_gradebookdetail gbdetail
            INNER JOIN j_gradebook ON j_gradebook.id = gbdetail.gradebook_id AND j_gradebook.deleted = 0
            INNER JOIN j_class_j_gradebook_1_c cg ON cg.j_class_j_gradebook_1j_gradebook_idb = j_gradebook.id AND cg.deleted = 0
            WHERE gbdetail.deleted = 0 AND cg.j_class_j_gradebook_1j_class_ida = '$classID'
            AND j_gradebook.type = 'Final'
            AND gbdetail.student_id = '$studentID'";
            $studentMark = $db->getOne($sql);

            $sql = "SELECT DISTINCT contacts.id, l1.class_code, level,
            hours, kind_of_course, level, modules, end_date ,
            SUM(meetings.duration_cal) total
            FROM contacts
            INNER JOIN meetings_contacts mc ON mc.contact_id = contacts.id  AND mc.deleted = 0
            INNER JOIN meetings ON  meetings.id = mc.meeting_id AND meetings.deleted = 0
            INNER JOIN j_class l1 ON meetings.ju_class_id = l1.id AND l1.deleted = 0
            INNER JOIN j_studentsituations ss ON ss.id = mc.situation_id AND ss.deleted = 0
            WHERE contacts.deleted = 0 AND meetings.ju_class_id = '". $classID ."'
            AND meetings.session_status <> 'Cancelled'
            AND ss.type IN ('Enrolled','Moving In','OutStanding','Settle')
            AND contacts.id = '" . $studentID . "'
            GROUP BY contacts.id ";
            //return array($sql);

            $result2 = $db->query($sql);
            $kindCourse = $class->getKOC();

            while($row2 = $db->fetchByAssoc($result2)) {
                $attendanceHour = (!empty($attendanceHour))?$attendanceHour + 0 : 0;
                $studentMark = (!empty($studentMark))?$studentMark + 0 : 0;
                $module = ($row2['modules'] != '') ? $row2['modules'] : "";
                $data['attendance'] = number_format($attendanceHour / $row2['total'] * 100, 0);
                $data['hours'] = number_format($row2['hours'], 0);
                $data['kind_of_course'] = $kindCourse[$row2['kind_of_course']];
                $data['end_date'] = date('F Y', strtotime($row2['end_date']));
                $data['level'] = $row2['level'];
                $data['id'] = $row2['id'];

            }
            $temp = 1;
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($forder_template_url.'/Template_Certificate_Adult.docx');
            $templateProcessor->cloneRow('Student_name', 1);
            $templateProcessor->setValue('Student_name#' . $temp, $studentInfo['full_student_name']);
            $templateProcessor->setValue('Dob#' . $temp, date('d/m/Y',strtotime($studentInfo['birthdate'])));
            $templateProcessor->setValue('Course_title#' . $temp, $data['kind_of_course']);
            $templateProcessor->setValue('Level#' . $temp, $data['level']. $module);
            $templateProcessor->setValue('Course_hours#' . $temp, number_format($data['hours'], 0));
            $templateProcessor->setValue('Code#' . $temp, $studentInfo['cetificateno']);
            $templateProcessor->setValue('Attendance#' . $temp, number_format($data['attendance'], 0));
            $templateProcessor->setValue('Date#' . $temp, date('F Y', strtotime($data['end_date'])));

            $link =  $forder_upload_file_url."/Template_Certificate_Adult".(md5($studentID.$classID.date('Y-m-d H:i:s'))).".docx";
            if(file_exists($link))
                unlink($link);
            $templateProcessor->saveAs($link);
            $result = array(
                'file_url' => $GLOBALS['sugar_config']['site_url']."/".$link,
                'success' => true,
            );

        }
        else {     // case Junior
            $sql = "SELECT DISTINCT
            contacts.id,
            gbdetail.final_result,
            gbdetail.certificate_type,
            l1.modules,
            l1.kind_of_course,
            l1.level
            FROM contacts
            INNER JOIN j_class_contacts_1_c l1_1 ON contacts.id = l1_1.j_class_contacts_1contacts_idb AND l1_1.deleted = 0
            INNER JOIN j_class l1 ON l1.id = l1_1.j_class_contacts_1j_class_ida AND l1.deleted = 0
            INNER JOIN j_class_j_gradebook_1_c l2_1 ON l1.id = l2_1.j_class_j_gradebook_1j_class_ida AND l2_1.deleted = 0
            INNER JOIN j_gradebook l2 ON l2.id = l2_1.j_class_j_gradebook_1j_gradebook_idb AND l2.deleted = 0
            INNER JOIN j_gradebookdetail gbdetail ON gbdetail.student_id = contacts.id AND gbdetail.gradebook_id = l2.id
            WHERE l1.id='{$classID}' AND  l1.deleted=0 AND l2.type = 'Final' AND contacts.id = '{$studentID}'
            AND final_result >= 0.5 ";

            $result2 = $db->query($sql);
            $data = array();

            while($row2 = $db->fetchByAssoc($result2)) {
                $module = ($row2['modules'] == '') ? "" : ' Module '. $row2['modules'];
                $data['class_module'] = $row2['kind_of_course']. ' Level ' . $row2['level']. $module;
                $data['final_result'] = $row2['certificate_type'];
                $data['date_of_issue'] = date('Y.m.d');
            }

            if($region == "North") {
                $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($forder_template_url.'/Template_Certificate_North.docx');
            }
            else {
                //$region = "Name"    ;
                $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($forder_template_url.'/Template_Certificate_South.docx');
            }

            $templateProcessor->cloneRow('UserID', 1);
            $temp = 1;
            $templateProcessor->setValue('UserID#1', '');
            $templateProcessor->setValue('Name#1', $studentInfo['full_student_name']);
            $templateProcessor->setValue('Final_Results#1', $data['final_result']);
            $templateProcessor->setValue('DOB#1', date('Y.m.d',strtotime($studentInfo['birthdate'])));
            $templateProcessor->setValue('Class_Module#1', $data['class_module']);
            $templateProcessor->setValue('Code#1', $studentInfo['cetificateno']);
            $templateProcessor->setValue('Date_of_issue#1', date('Y.m.d'));

            $link =  $forder_upload_file_url."/Template_Certificate".(md5($studentID.$classID.date('Y-m-d H:i:s'))).".docx";
            if(file_exists($link))
                unlink($link);

            $templateProcessor->saveAs($link);

            $result = array(
                'file_url' => $GLOBALS['sugar_config']['site_url']."/".$link,
                'success' => true,
                'region' => $region,
            );

        }
        return $result;
    }

    /*function getThankyouTemplate($studentID, $classID) {
    global $db;
    $sql = "SELECT DISTINCT l1.`name`, contacts.contact_id, l1.end_date, l1.kind_of_course, l1.hours, l1.`level`,l1.modules, full_student_name, birthdate, users.sign, users.title, CONCAT(users.last_name, ' ', users.first_name) username
    FROM contacts
    INNER JOIN  j_class_contacts_1_c l1_1 ON contacts.id = l1_1.j_class_contacts_1contacts_idb AND l1_1.deleted = 0
    INNER JOIN  j_class l1 ON l1.id = l1_1.j_class_contacts_1j_class_ida AND l1.deleted = 0
    INNER JOIN  users  ON users.id = l1.assigned_user_id AND users.deleted = 0
    WHERE l1.id='{$classID}'
    AND  contacts.deleted=0 AND contacts.id = '{$studentID}' ";
    //return array($sql);
    $result = $db->query($sql);
    $data = array();
    while($row = $db->fetchByAssoc($result)) {
    if($row['modules'] =='')
    $module = '';
    else
    $module = ' Module '. $row['modules'];

    $certificateNumber = $row['contact_id']. str_replace('/', '', date('d/m/y', strtotime($row['end_date'])));
    $data['id'] = $studentID;
    $data['full_student_name'] = $row['full_student_name'];
    $data['class_module'] = $row['kind_of_course']. '-'. number_format($row['hours'],0). 'h Level '.$row['level']. $module;
    $data['certificate'] = $certificateNumber;
    $data['UserTitle'] = $row['title'];
    $data['UserName'] = $row['username'];
    $data['id'] = $studentID;
    if( $row['sign'] != '' )
    $data['sign'] = array('src' => 'upload/'. $rowStudent['sign'],'swh'=>'200');
    else
    $data['sign'] = '';

    }

    return $data;
    }*/
    function check_session($session){
        $error = new SoapError();
        if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', '', 'read', 'no_access',  $error)) {
            return array('status' => false);
        }
        return array('status' => true);
    }

    function generateSessionId($userId) {
        require_once('include/entryPoint.php');

        $user = BeanFactory::getBean('Users');
        $success = false;
        $user->retrieve($userId);

        if(!empty($user) && !empty($user->id)) {
            $success = true;
        }  else {
            return "";
        }

        if($success) {
            session_start();

            $user->loadPreferences();
            $_SESSION['is_valid_session']= true;
            $_SESSION['ip_address'] = query_client_ip();
            $_SESSION['user_id'] = $user->id;
            $_SESSION['type'] = 'user';
            $_SESSION['avail_modules']= self::$helperObject->get_user_module_list($user);
            $_SESSION['authenticated_user_id'] = $user->id;
            $_SESSION['unique_key'] = $sugar_config['unique_key'];

            return session_id();
        }
        return "";
    }

    //Custom EntryPoint - Lap Nguyen
    function entryPoint($session, $function, $param){
        $error = new SoapError();
        // Authenticate
        if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', '', 'read', 'no_access',  $error)) {
            return;
        }

        require_once('custom/include/utils/SendingData.php');

        switch ($function) {
            case 'getTeamList':
                $result = getTeamList();
                return $result;
                break;
            case 'getSessionBooking':
                $result = getSessionBooking($param);
                return $result;
                break;
            case 'getSSOCode':
                $result = getSSOCode($param);
                return $result;
                break;
            case 'inputBooking':
                $result = inputBooking($param);
                return $result;
                break;
            case 'checkDuplication':
                $result = checkDuplication($param);
                return $result;
                break;
            case 'cancelBooking':
                $result = cancelBooking($param);
                return $result;
                break;
            case 'historyBooking':
                $result = historyBooking($param);
                return $result;
                break;
            case 'getPaymentList':
                $result = getPaymentList($param);
                return $result;
                break;
            default;
                return 'keep me!!';
                die();
                break;
        }

    }
}
?>