<?php
/**
* Kiểm tra giáo viên đã dạy session nào trong khoảng thời gian truyển vào hay không
*
* @param id         : teacher id
* @param db_start   : yyyy-mm-dd hh:mm:ss
* @param db_end     : yyyy-mm-dd hh:mm:ss
*
* @return if teacher is free: true || if busy: false
*/
function checkTeacherInDateime($id, $db_start, $db_end, $session_id = ''){
    $sql = "SELECT DISTINCT id FROM meetings
    WHERE teacher_id = '$id'
    AND ((('$db_start' >= date_start) AND ('$db_start' < date_end))
    OR (('$db_end' > date_start) AND ('$db_end' <= date_end))
    OR (('$db_start' < date_start) AND ('$db_end' > date_end)))
    AND deleted=0
    AND (timesheet_id = '' OR timesheet_id IS NULL)
    AND session_status <> 'Cancelled' AND id <> '$session_id' ";
    $id = $GLOBALS['db']->getOne($sql);

    if(!empty($id)) return false;
    else return true;
}
/**
* Kiểm tra xem giáo viên đã dạy session nào trùng thời gian với session truyển vào hay không
*
* @return if teacher is free: true || if busy: false
*/
function checkTeacherInSession($teacherId, $sessionId){
    $sqlGetSession = "SELECT date_start, date_end
    FROM meetings
    WHERE id = '{$sessionId}' AND session_status <> 'Cancelled'";
    $rs = $GLOBALS['db']->query($sqlGetSession);
    $row = $GLOBALS['db']->fetchByAssoc($rs);

    return checkTeacherInDateime($teacherId,$row['date_start'],$row['date_end']);
}

/**
* Check priority of teacher
*
* @param teacherId  : teacher id
* @param classId    : class id
* @param dayOff     : teacher day off: array("Monday", "Tuesday",...)
* @param dayOfWeek  : day of session in week:  array("Monday", "Tuesday",...)
* @param dayOfWoeek : array("Mon","Tue")
*
* @return 1 or 2 or 3
*/
function checkTeacherPriority($teacherId, $classId, $dayOff, $dayOfWeek){
    foreach ($dayOff as $value){
        if (in_array($value,$dayOfWeek)) {
            return "3";
        }
    }

    //Get previous class
    $sql = "SELECT j_class_j_class_1j_class_ida
    FROM j_class_j_class_1_c
    WHERE j_class_j_class_1j_class_idb = '{$classId}'";

    $previousClassId = $GLOBALS['db']->getOne($sql);
    if ($previousClassId == $classId) $previousClassId = "";

    if ($previousClassId != ""){
        $sqlGetTeacher = "SELECT DISTINCT teacher_id
        FROM meetings
        WHERE deleted <> 1
        AND ju_class_id = '{$previousClassId}'
        AND session_status <> 'Cancelled'
        ";
        $rs = $GLOBALS['db']->query($sqlGetTeacher);

        while($row = $GLOBALS['db']->fetchByAssoc($rs)){
            if ($row["teacher_id"] == $teacherId) return "1";
        }
    }

    return "2";
}

/**
* fix array day of week
*
* @param string: '^Mon^,^Tue^'
*
* @return array("Monday", "Tuesday",...)
*/
function fixArrayDayOff($dayOff){
    $dayOff = explode(",",$dayOff);

    for ($i = 0; $i < count($dayOff); $i++) {
        switch ($dayOff[$i]) {
            case '^Mon^':
                $dayOff[$i] = "Monday";
                break;
            case '^Tue^':
                $dayOff[$i] = "Tuesday";
                break;
            case '^Wed^':
                $dayOff[$i] = "Wednesday";
                break;
            case '^Thu^':
                $dayOff[$i] = "Thursday";
                break;
            case '^Fri^':
                $dayOff[$i] = "Friday";
                break;
            case '^Sat^':
                $dayOff[$i] = "Saturday";
                break;
            case '^Sun^':
                $dayOff[$i] = "Sunday";
                break;
        }
    }
    return $dayOff;
}

/**
* check teacher holidays in a list of session
*
* @param teacherId  : teacher id
* @param sessions   : array of session
*
* @return number of holidays
*/
function checkTeacherHolidays($teacherId, $session_date){
    //    $count = 0;
    $sql = "SELECT count(holiday_date)
    FROM holidays
    WHERE teacher_id = '$teacherId'
    AND holiday_date in ($session_date)";
    return $GLOBALS['db']-> getOne($sql);
    /*foreach ($sessionList as $key => $value){
    $sql = "SELECT id
    FROM holidays
    WHERE teacher_id = '{$teacherId}'
    AND holiday_date = '{$value['start_date']}'
    AND deleted = 0;
    ";

    $id = $GLOBALS['db']->getOne($sql);
    if(!empty($id)) $count++;
    }

    return $count;*/
}

function sortTeacherListByTaughtHour($teacherList){
    $hourList = array();
    foreach($teacherList as $value) {
        $hour = $value["total_hour"];
        if (!in_array($hour,$hourList)) $hourList[] = $hour;
    }
    sort($hourList,1);

    $result = array();
    foreach($hourList as $hourItem) {
        foreach($teacherList as $teacherId => $teacher) {
            if ($teacher["total_hour"] == $hourItem) $result[$teacherId] = $teacher;
        }
    }
    return $result;
}

/**
* Check total hours of teacher in this month
*
* @return number of hours. Ex: 20
*/
function checkTaughtHoursThisMonth($teacherId, $start_date, $end_date){
    $sql = "SELECT
    MAX(sum_hour)
    FROM
    (SELECT
    teacher_id,
    SUM(teaching_hour) sum_hour,
    DATE_FORMAT(date_start, '%Y-%m') month_year
    FROM
    meetings
    WHERE
    LENGTH(ju_class_id) > 30
    AND LENGTH(teacher_id) > 30
    AND DATE_FORMAT(date_start, '%Y-%m') >= DATE_FORMAT('$start_date', '%Y-%m')
    AND DATE_FORMAT(date_end, '%Y-%m') <= DATE_FORMAT('$end_date', '%Y-%m')
    AND status <> 'Cancelled'
    GROUP BY teacher_id , month_year) a
    WHERE
    teacher_id = '$teacherId'
    GROUP BY teacher_id";

    return $GLOBALS['db']->getOne($sql);
}

/**
* Get available teachers for a class
*
* @param classId    : class id
* @param date_start : display format ex:dd/mm/yyyy
* @param date_end   : display format ex:dd/mm/yyyy
* @param dayOfWoeek : array("Monday","Tuesday")
*
* @return array of teachers info
*/
function getClassSession($classId, $date_start, $date_end, $dayOfWeek){
    global $timedate;
    $date_start_db = $timedate->to_db_date($date_start,false);
    $date_end_db = $timedate->to_db_date($date_end,false);
    $date_name = "'".implode("','",$dayOfWeek)."'";
    // Get list of session in class form $db_start to $db_end
    //    $sessionList = array();
    $sqlGetSessionList = "SELECT
    id meeting_id,
    convert_tz(date_start,'+0:00','+7:00') time_start,
    convert_tz(date_end,'+0:00','+7:00') time_end,
    Date_format(convert_tz(date_start,'+0:00','+7:00'),'%Y-%m-%d') start_date
    FROM
    meetings
    WHERE
    ju_class_id = '$classId'
    AND deleted = 0
    AND Date_format(convert_tz(date_start,'+0:00','+7:00'),'%Y-%m-%d') >= '$date_start_db'
    AND Date_format(convert_tz(date_end,'+0:00','+7:00'), '%Y-%m-%d') <= '$date_end_db'
    and DAYNAME(convert_tz(date_start,'+0:00','+7:00')) in ($date_name)
    AND session_status <> 'Cancelled'
    ORDER BY  start_date";
    return $GLOBALS['db']->fetchArray($sqlGetSessionList);

    /*while($rowSession = $GLOBALS['db']->fetchByAssoc($rsSessionList)){
    $sessionWeekDate = date('l',strtotime($rowSession['date_start']));
    if (in_array($sessionWeekDate,$dayOfWeek)) {
    $sessionList[$rowSession["id"]] = array(
    "date_start" => $rowSession['date_start'],
    "date_end" => $rowSession['date_end'],
    );
    }
    }

    return $sessionList;    */
}

/**
* Get available teachers for a class
*
* @param classId    : class id
* @param date_start : display format ex:dd/mm/yyyy
* @param date_end   : display format ex:dd/mm/yyyy
* @param dayOfWoeek : array("Monday","Tuesday")
*
* @return array of teachers info
*/
function checkTeacherInClass($classId, $date_start, $date_end, $dayOfWeek){
    global $locale;
    global $timedate;
    $start_date = $timedate->to_db_date($date_start,false);
    $end_date = $timedate->to_db_date($date_end,false);
    $classBean = BeanFactory::getBean("J_Class", $classId);
    //    $schedule_list = get_class_schedule($classId, $start_date, $end_date, $dayOfWeek);
    $sessionList = getClassSession($classId, $date_start, $date_end, $dayOfWeek);
    $firstSession = reset($sessionList);
    $endSession = end($sessionList);
    $first_session_date = $firstSession['start_date'];
    //    $firstSessionStartDate = reset(explode(" ",$firstSessionStartDate));
    $last_session_date = $endSession['start_date'];
    //    $lastSessionEndDate = reset(explode(" ",$lastSessionEndDate));


    // Get all teacher, contract is available form $db_start to $db_end
    $teacherList = array();
    $sql_teacher_id = "SELECT DISTINCT
    teacher.id teacher_id
    FROM
    j_teachercontract
    INNER JOIN
    c_teachers_j_teachercontract_1_c l1_1 ON j_teachercontract.id = l1_1.c_teachers_j_teachercontract_1j_teachercontract_idb
    AND l1_1.deleted = 0
    INNER JOIN
    c_teachers teacher ON teacher.id = l1_1.c_teachers_j_teachercontract_1c_teachers_ida
    AND teacher.deleted = 0
    INNER JOIN
    team_sets_teams tst ON tst.team_set_id = teacher.team_set_id
    AND tst.deleted = 0
    INNER JOIN
    teams ts ON ts.id = tst.team_id AND ts.deleted = 0
    AND ts.id = '{$classBean->team_id}'
    WHERE
    j_teachercontract.deleted <> 1
    AND j_teachercontract.status = 'Active'
    AND j_teachercontract.contract_date <= '$start_date'
    AND j_teachercontract.contract_until >= '$start_date'
    ORDER BY j_teachercontract.contract_until";
    $teacher_list = $GLOBALS['db']->fetchArray($sql_teacher_id);
    $arr_teacher_id = array();
    foreach($teacher_list as $key => $value) {
        $arr_teacher_id[] = $value['teacher_id'];
    }

    $str_teacher_id =   "'".implode("','",$arr_teacher_id)."'";
    $session_date = array();
    $arr_condition = array();

    foreach($sessionList as $key => $value){
        $session_date[] = $value['start_date'];
        $arr_condition[] = "CONVERT_TZ(date_start, '+0:00', '+7:00') < '{$value['time_end']}'
        AND CONVERT_TZ(date_end, '+0:00', '+7:00') > '{$value['time_start']}'";
    }
    $str_session_date =   "'".implode("','",$session_date)."'";
    $str_condition = "(".implode(") OR (", $arr_condition).")";
    $sql_teacher_in_work = "SELECT DISTINCT
    teacher_id
    FROM
    meetings
    WHERE
    ($str_condition)
    AND teacher_id in ($str_teacher_id)
    AND meeting_type = 'Session'
    AND session_status <> 'Cancelled'
    AND deleted = 0";
    $row_teacher = $GLOBALS['db']->fetchArray($sql_teacher_in_work);
    $teacher_in_work = array();
    foreach($row_teacher as $key => $value){
        $teacher_in_work[] = $value['teacher_id'];
    }
    $arr_teacher_id = array_diff($arr_teacher_id, $teacher_in_work);
    $str_teacher_id  =   "'".implode("','",$arr_teacher_id)."'";
    $sqlTeacherList = "SELECT DISTINCT
    teacher.id teacher_id,
    teacher.salutation teacher_salutation,
    teacher.first_name teacher_firstname,
    teacher.last_name teacher_lastname,
    j_teachercontract.id contract_id,
    j_teachercontract.contract_date contract_date,
    j_teachercontract.contract_until contract_until,
    IFNULL(j_teachercontract.day_off, '') day_off,
    IFNULL(j_teachercontract.contract_type, '') contract_type,
    j_teachercontract.working_hours_monthly working_hours_monthly,
    mh.max_hour taught_hours
    FROM
    j_teachercontract
    INNER JOIN
    c_teachers_j_teachercontract_1_c l1_1 ON j_teachercontract.id = l1_1.c_teachers_j_teachercontract_1j_teachercontract_idb
    AND l1_1.deleted = 0
    INNER JOIN
    c_teachers teacher ON teacher.id = l1_1.c_teachers_j_teachercontract_1c_teachers_ida
    AND teacher.deleted = 0
    INNER JOIN
    team_sets_teams tst ON tst.team_set_id = teacher.team_set_id
    AND tst.deleted = 0
    INNER JOIN
    teams ts ON ts.id = tst.team_id AND ts.deleted = 0
    AND ts.id = '{$classBean->team_id}'
    LEFT OUTER JOIN
    (SELECT
    teacher_id, MAX(sum_hour) max_hour
    FROM
    (SELECT
    teacher_id,
    SUM(teaching_hour) sum_hour,
    DATE_FORMAT(date_start, '%Y-%m') month_year
    FROM
    meetings
    WHERE
    LENGTH(ju_class_id) > 30
    AND LENGTH(teacher_id) > 30
    AND DATE_FORMAT(date_start, '%Y-%m') >= DATE_FORMAT('20160825', '%Y-%m')
    AND DATE_FORMAT(date_end, '%Y-%m') <= DATE_FORMAT('20170103', '%Y-%m')
    AND status <> 'Cancelled'
    GROUP BY teacher_id , month_year) a
    GROUP BY teacher_id) mh ON mh.teacher_id = teacher.id
    WHERE
    j_teachercontract.deleted <> 1
    AND j_teachercontract.status = 'Active'
    AND j_teachercontract.contract_date <= '$start_date'
    AND j_teachercontract.contract_until >= '$start_date'
    AND teacher.id in ($str_teacher_id)
    ORDER BY j_teachercontract.contract_until";

    $rsTeacherList = $GLOBALS['db']->query($sqlTeacherList);

    while($rowTeacher = $GLOBALS['db']->fetchByAssoc($rsTeacherList)){
        /*$free = true;
        foreach($sessionList as $key => $value){
        if (!checkTeacherInSession($rowTeacher["teacher_id"],$key)){
        $free = false;
        break;
        }
        }*/
        //$free = check_teacher_schedule($rowTeacher['teacher_id'],$classId, $sessionList);
        // If teacher is available in all session
        $holidays = checkTeacherHolidays($rowTeacher["teacher_id"], $str_session_date);
        //        $taughtHours = checkTaughtHoursThisMonth($rowTeacher["teacher_id"], $first_session_date, $last_session_date);

        $dayOff = fixArrayDayOff($rowTeacher["day_off"]);
        $priority = checkTeacherPriority($rowTeacher["teacher_id"],$classId,$dayOff,$dayOfWeek);
        $teacherList[$rowTeacher["teacher_id"]] = array(
            "teacher_id"      => $rowTeacher["teacher_id"],
            "teacher_name"    =>   $locale->getLocaleFormattedName($rowTeacher["teacher_firstname"],$rowTeacher["teacher_lastname"],$rowTeacher["teacher_salutation"]) ,
            "contract_id"     => $rowTeacher["contract_id"],
            "contract_type"   => $rowTeacher["contract_type"],
            "require_hours"   => $rowTeacher["working_hours_monthly"],
            "total_hour"      => $rowTeacher['taught_hours'],
            "contract_until"  => $rowTeacher["contract_until"],
            "day_off"         => $rowTeacher["day_off"],
            "holiday"         => $holidays,
            "priority"        => $priority,
        );
    }

    $teacherList = sortTeacherListByTaughtHour($teacherList);

    return $teacherList;
}


/**
* Get list holiday in date range
*
*/
function getPublicHolidays($start_date, $end_date = '', $team_type = 'Junior'){
    global $timedate;
    //Get list Public Holiday
    $ext_end = '';
    if(!empty($end_date))
        $ext_end = "AND holiday_date <= '{$timedate->to_db_date($end_date,false)}'";

    $ext_type = "AND apply_for = 'apollo_junior'";
    if($team_type == 'Adult')
        $ext_type = "AND apply_for = 'apollo_360'";

    $q1 = "SELECT id,
    holiday_date,
    description
    FROM holidays
    WHERE deleted = 0
    AND type = 'Public Holiday'
    $ext_type
    AND holiday_date >= '{$timedate->to_db_date($start_date,false)}'
    $ext_end";
    $rs1 = $GLOBALS['db']->query($q1);
    $holiday_list   = array();
    while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
        $holiday_list[$row['holiday_date']] = $row['description'];
    }
    return $holiday_list;
}

/**
* get all teacher of Centers
*
* @param array center id $center_id
*
* @author Trung Nguyen at 2015.12.09
*/
function getTeacherOfCenter($center_id = array()) {
    if (!in_array($center_id)) $center_id = array($center_id) ;
    $teacher = array();
    global $locale;
    $sql = "SELECT t.id, t.first_name, t.last_name
    FROM c_teachers t
    INNER JOIN team_sets_teams tst ON tst.team_set_id = t.team_set_id AND tst.deleted = 0
    INNER JOIN teams ts ON ts.id = tst.team_id AND ts.deleted = 0 AND ts.id IN ('".implode("','",$center_id)."')
    WHERE t.deleted = 0";
    $result = $GLOBALS['db']->query($sql);
    while($row = $GLOBALS['db']->fetchByAssoc($result)) {
        $row['name'] = $locale->getLocaleFormattedName($row['first_name'], $row['last_name'],'');
        $teacher[$row['id']] = $row['name'];
    }
    return $teacher;
}

/**
* get room of center
*
* @param mixed $center_id
*
* @author Trung Nguyen 2015.12.09
*/
function getRoomOfCenter($center_id = array()) {
    if (!in_array($center_id)) $center_id = array($center_id) ;
    $room = array();
    $sql = "SELECT t.id, t.name
    FROM c_rooms t
    INNER JOIN team_sets_teams tst ON tst.team_set_id = t.team_set_id AND tst.deleted = 0
    INNER JOIN teams ts ON ts.id = tst.team_id AND ts.deleted = 0 AND ts.id IN ('".implode("','",$center_id)."')
    WHERE t.deleted = 0";
    $result = $GLOBALS['db']->query($sql);
    while($row = $GLOBALS['db']->fetchByAssoc($result)) {
        $room[$row['id']] = $row['name'];
    }
    return $room;
}


function checkRoomInDateime($id, $db_start, $db_end, $session_id = ""){
    $sql = "SELECT count(id) FROM meetings
    WHERE room_id = '$id'
    AND ((('$db_start' >= date_start) AND ('$db_start' < date_end))
    OR (('$db_end' > date_start) AND ('$db_end' <= date_end))
    OR (('$db_start' < date_start) AND ('$db_end' > date_end)))
    AND deleted=0  AND id <> '$session_id'
    AND session_status <> 'Cancelled'";

    return ($GLOBALS['db']->getOne($sql)?false:true);
}

/**
* function check teacher is working
*
* @param mixed $teacher_id
* @param mixed $start_time
* @param mixed $end_time
*/
function checkTeacherWorking($teacher_id,$start_time, $end_time, $return = 'bool') {
    $ext_start = '';
    if(!empty($start_time))
        $ext_start = "AND tc.contract_date <= '$start_time'";

    $ext_end = '';
    if(!empty($end_time))
        $ext_end = "AND tc.contract_until >= '$end_time'";

    $sqlTeacherList = "SELECT tc.id
    FROM
    j_teachercontract tc
    INNER JOIN c_teachers_j_teachercontract_1_c l1_1 ON tc.id = l1_1.c_teachers_j_teachercontract_1j_teachercontract_idb AND l1_1.deleted = 0
    INNER JOIN c_teachers t ON t.id = l1_1.c_teachers_j_teachercontract_1c_teachers_ida AND t.deleted = 0
    WHERE  tc.deleted <> 1 AND tc.status = 'Active'
    $ext_start $ext_end
    AND t.id = '$teacher_id'
    ORDER BY tc.contract_until DESC ";
    $teacher_contract_id = $GLOBALS['db']->getOne($sqlTeacherList);
    if(empty($teacher_contract_id))
        $teacher_contract_id = '';
    if ($return == 'id') return $teacher_contract_id;
    return !empty($teacher_contract_id) ? true : false;
}

function checkExistTeacherInClass($class_id, $teacher_id) {
    $sql = "SELECT count(id)
    FROM meetings
    WHERE ju_class_id = '$class_id' AND teacher_id = '$teacher_id'
    AND deleted = 0 AND session_status <> 'Cancelled' ";
    return $GLOBALS['db']->getOne($sql);
}

/**
* Get array week days from date to date DB Format
*
* @param display date $start_date. eg:1/12/2013
* @param display date $end_date. eg:30/12/2013
* @param day of week $weekdate. eg:Tue
* @return array eg: : array = 0: string = "03/12/2013"  1: string = "10/12/2013"
*/
function get_array_weekdates_db_junior($start_date, $end_date, $weekdate){
    global $timedate;
    date_default_timezone_set("Asia/Bangkok");
    // $start_date = $start_date.' 00:00:00';
    //  $end_date = $end_date.' 23:59:59';
    $days = array();
    $i = 0;
    $start = strtotime($timedate->to_db_date($start_date,false));
    $end = strtotime($timedate->to_db_date($end_date,false));
    $end = strtotime('+ 23 hours', $end);
    while($start <= $end){
        if (array_key_exists(date('D', $start), $weekdate)){
            $days[$i]=date('Y-m-d', $start);
            $i++;
        }
        $start = strtotime('+1 day', $start);
    }
    return $days;
}

function get_class_schedule($classid, $start_date, $end_date, $day_of_week){
    $date_name = "'".implode("','",$day_of_week)."'";
    $sql_schedule_list = "SELECT
    DAYNAME(convert_tz(date_start,'+0:00','+7:00')) date_name,
    DATE_FORMAT(convert_tz(date_start,'+0:00','+7:00'), '%T') time_start,
    DATE_FORMAT(convert_tz(date_end,'+0:00','+7:00'), '%T') time_end,
    MIN(Date_format(convert_tz(date_start,'+0:00','+7:00'),'%Y-%m-%d')) start_date,
    MAX(Date_format(convert_tz(date_end,'+0:00','+7:00'), '%Y-%m-%d')) end_date
    FROM
    meetings
    WHERE
    ju_class_id = '$classid'
    AND deleted = 0
    AND Date_format(convert_tz(date_start,'+0:00','+7:00'),'%Y-%m-%d') >= '$start_date'
    AND Date_format(convert_tz(date_end,'+0:00','+7:00'), '%Y-%m-%d') <= '$end_date'
    and DAYNAME(convert_tz(date_start,'+0:00','+7:00')) in ($date_name)
    AND session_status <> 'Cancelled'
    GROUP BY date_name";
    return $GLOBALS['db']->fetchArray($sql_schedule_list);
}

function check_teacher_schedule($teacher_id, $classId, $session_list){
    foreach($session_list as $key => $value){
        $sql = "SELECT
        id
        FROM
        meetings
        WHERE
        CONVERT_TZ(date_start, '+0:00', '+7:00') <= '{$value['time_end']}'
        AND CONVERT_TZ(date_end, '+0:00', '+7:00') >= '{$value['time_start']}'
        AND (teacher_id = '$teacher_id' OR teacher_cover_id = '$teacher_id') ";
        $result = $GLOBALS['db']->getOne($sql);
        if(!empty($result)) return false;
    }
    return true;
}

function get_list_holidays_adult($start_date, $end_date){
    if(!empty($start_date))
        $ext_start = "AND holiday_date >= '$start_date'";

    if(!empty($end_date))
        $ext_end = "AND holiday_date <= '$end_date'";


    $q1 = "SELECT id,
    holiday_date
    FROM holidays
    WHERE deleted = 0
    AND type = 'Public Holiday'
    AND apply_for = 'apollo_360'
    $ext_start
    $ext_end";
    $rs1 = $GLOBALS['db']->query($q1);

    $holiday_list   = array();
    while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
        $holiday_list[$row['id']] = $row['holiday_date'];
    }
    return $holiday_list;
}

function get_list_holidays_adult_revenue($start_date, $end_date){
    global $timedate;
    if(!empty($end_date))
        $ext_end = "AND holiday_date <= '$end_date'";

    $q1 = "SELECT id,
    holiday_date,
    description
    FROM holidays
    WHERE deleted = 0
    AND type = 'Public Holiday'
    AND apply_for = 'apollo_360'
    AND holiday_date >= '$start_date'
    $ext_end";
    $rs1 = $GLOBALS['db']->query($q1);

    $holiday_list   = array();
    while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
        $holiday_list[] = strtotime($row['holiday_date']);
    }
    return $holiday_list;
}

?>
