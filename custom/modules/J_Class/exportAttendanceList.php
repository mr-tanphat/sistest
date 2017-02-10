<?php
require_once("custom/include/PHPExcel/Classes/PHPExcel.php");

global $timedate, $current_user;

$fi = new FilesystemIterator("custom/uploads/ReportAttendance", FilesystemIterator::SKIP_DOTS);
if(iterator_count($fi) > 5)
    array_map('unlink', glob("custom/uploads/ReportAttendance/*"));


$objPHPExcel = new PHPExcel();

//get Template
$templateUrl = "custom/include/TemplateExcel/Junior/ReportAttendance.xlsx";

//Import Template
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load($templateUrl);

// Set properties
$objPHPExcel->getProperties()->setCreator("Apollo Center");
$objPHPExcel->getProperties()->setLastModifiedBy("Apollo Center");
$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX");


//get Class data
$class  = BeanFactory::getBean('J_Class', $_REQUEST['record']);
$from   = $_REQUEST['from'];
$to     = $_REQUEST['to'];

//get teacher data
$sqlTeacher = "SELECT teacher_id,
COUNT(teacher_id) count
FROM meetings
WHERE ju_class_id = '{$class->id}'
AND deleted <> 1
AND session_status <> 'Cancelled'
AND teacher_id <> ''
AND lesson_number >= $from
AND lesson_number <= $to
GROUP BY teacher_id
ORDER BY count DESC
LIMIT 1";
$teacherId = $GLOBALS['db']->getOne($sqlTeacher);
$teacher = BeanFactory::getBean("C_Teachers", $teacherId);
$teacherName = $teacher->first_name . $teacher->last_name;

//get table data
$weekday = array(
    '0' => array('short' => 'Mon', 'long' => 'Monday'),
    '1' => array('short' => 'Tue', 'long' => 'Tuesday'),
    '2' => array('short' => 'Wed', 'long' => 'Wednesday'),
    '3' => array('short' => 'Thu', 'long' => 'Thursday'),
    '4' => array('short' => 'Fri', 'long' => 'Friday'),
    '5' => array('short' => 'Sat', 'long' => 'Saturday'),
    '6' => array('short' => 'Sun', 'long' => 'Sunday'),
);
$data = array();
$lessonArr = array();
$scheduleArr = array();
$sqlLesson = "SELECT lesson_number
, id
, DATE(CONVERT_TZ(date_start,'+00:00','+7:00')) date_start
, WEEKDAY(DATE(CONVERT_TZ(date_start,'+00:00','+7:00'))) weekday
FROM meetings
WHERE deleted <> 1
AND session_status <> 'Cancelled'
AND ju_class_id = '{$class->id}'
AND lesson_number >= $from
AND lesson_number <= $to
ORDER BY CAST(lesson_number AS UNSIGNED)";
$resLesson = $GLOBALS['db']->query($sqlLesson);
$ss_arr = array();
while($lesson = $GLOBALS['db']->fetchByAssoc($resLesson)){
    $shortDay = $weekday[$lesson['weekday']]['short'];
    $longDay = $weekday[$lesson['weekday']]['long'];

    if(!in_array($shortDay,$scheduleArr)) $scheduleArr[] = $shortDay;
    $lessonArr[$lesson['lesson_number']] = array(
        'title' => 'Lesson '.$lesson['lesson_number'],
        'weekday' => $longDay,
        'date' => $timedate->to_display_date($lesson['date_start'],false),
    );
    $ss_arr[] = $lesson['id'];
}

$sqlStudents = "SELECT DISTINCT IFNULL(contacts.id,'') student_id,
IFNULL(contacts.full_student_name,'') name,
contacts.first_name first_name,
contacts.last_name last_name,
IFNULL(contacts.nick_name,'') nick_name,
IFNULL(contacts.birthdate,'') birthdate,
IFNULL(contacts.gender,'') gender,
IFNULL(MIN(l2.start_study), '') situation_start_study
FROM contacts
INNER JOIN meetings_contacts l1_1 ON contacts.id=l1_1.contact_id AND l1_1.deleted=0
INNER JOIN meetings l1 ON l1.id=l1_1.meeting_id AND l1.deleted=0
INNER JOIN j_studentsituations l2 ON l2.id=l1_1.situation_id AND l2.deleted=0
WHERE contacts.deleted = 0
AND l1.id IN ('".implode("','",$ss_arr)."')
GROUP BY student_id
#ORDER BY first_name, last_name
union
SELECT DISTINCT IFNULL(l.id,'') student_id,
IFNULL(l.full_lead_name,'') name,
l.first_name first_name,
l.last_name last_name,
IFNULL(l.nick_name,'') nick_name,
IFNULL(l.birthdate,'') birthdate,
IFNULL(l.gender,'') gender,
IFNULL(MIN(ss.start_study), '') situation_start_study
FROM leads l
INNER JOIN meetings_leads ml ON l.id=ml.lead_id AND l.deleted=0
INNER JOIN meetings m ON m.id=ml.meeting_id AND m.deleted=0
INNER JOIN j_studentsituations ss ON ss.lead_id = l.id AND ss.deleted=0 and ss.ju_class_id = m.ju_class_id
WHERE l.deleted = 0
AND ml.meeting_id IN ('".implode("','",$ss_arr)."')
GROUP BY student_id
order by first_name, last_name";
$resStudents = $GLOBALS['db']->query($sqlStudents);
while($student = $GLOBALS['db']->fetchByAssoc($resStudents)){
    if(!is_array($data[$student["student_id"]]))
        $data[$student["student_id"]] = array(
            'student_name' => $student['name'],
            'dob' => $timedate->to_display_date($student['birthdate'],false),
            'gender' => $student['gender'],
            'join_date' => $timedate->to_display_date($student['situation_start_study'],false),
            'english_name' => $student['nick_name'],
        );
}

$objPHPExcel->getActiveSheet()->SetCellValue('H6',$class->period);
$objPHPExcel->getActiveSheet()->SetCellValue('C6',$class->class_code);
$objPHPExcel->getActiveSheet()->SetCellValue('C7',$class->level);
$objPHPExcel->getActiveSheet()->SetCellValue('G7',"From: ".$class->start_date);
$objPHPExcel->getActiveSheet()->SetCellValue('G8',"To: ".$class->end_date);

$scheduleStr = "Schedule: ";
foreach($scheduleArr as $key => $value){
    if($scheduleStr != "Schedule: ") $scheduleStr .= "/";
    $scheduleStr .= $value;
}
$objPHPExcel->getActiveSheet()->SetCellValue('G9',$scheduleStr);

//Print Column
$countLesson = 0;
foreach($lessonArr as $key => $value){
    $colIndexStart = 6 + $countLesson * 2;
    $colStart = PHPExcel_Cell::stringFromColumnIndex($colIndexStart);
    $colEnd = PHPExcel_Cell::stringFromColumnIndex($colIndexStart+1);
    $objPHPExcel->getActiveSheet()->mergeCells($colStart.'12:'.$colEnd.'12');
    $objPHPExcel->getActiveSheet()->mergeCells($colStart.'13:'.$colEnd.'13');
    $objPHPExcel->getActiveSheet()->mergeCells($colStart.'14:'.$colEnd.'14');
    $objPHPExcel->getActiveSheet()->SetCellValue($colStart.'12', $value['title']);
    $objPHPExcel->getActiveSheet()->SetCellValue($colStart.'13', $value['weekday']);
    $objPHPExcel->getActiveSheet()->SetCellValue($colStart.'14', $value['date']);
    $objPHPExcel->getActiveSheet()->SetCellValue($colStart.'15', "Attn");
    $objPHPExcel->getActiveSheet()->SetCellValue($colEnd.'15', "HW");
    $countLesson++;
}
$colIndexStart = 6 + $countLesson * 2;
$colStart = PHPExcel_Cell::stringFromColumnIndex($colIndexStart);
$objPHPExcel->getActiveSheet()->mergeCells($colStart.'12:'.$colStart.'15');
$objPHPExcel->getActiveSheet()->SetCellValue($colStart.'12', "Notes");

//Print Student
$index = 1;
foreach($data as $key => $value){
    $row = $index + 15;
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$row, $index);
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, $value['student_name']);
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row, $value['dob']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, $value['gender']);
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, $value['join_date']);
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, $value['english_name']);
    $index++;
}

//Print sign row
$row = $index + 16;
$objPHPExcel->getActiveSheet()->getStyle('B'.$row)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E'.$row)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('H'.$row)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, "Prepared");
$objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, "Checked");
$objPHPExcel->getActiveSheet()->SetCellValue('H'.$row, "Approval");
$row = $row + 5;
$objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, "NOTE: Please send students whose names are not on register to EC.");

//Set border Title
$endCol = $colStart;
$border_style1 = array(
    'borders' => array(
        'right' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'argb' => '000000'
            ),
        ),
        'left' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'argb' => '000000'
            ),
        ),
        'top' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'argb' => '000000'
            ),
        ),
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'argb' => '000000'
            ),
        ),
    )
);
$border_style2 = array(
    'borders' => array(
        'right' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'argb' => '000000'
            ),
        ),
        'left' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'argb' => '000000'
            ),
        ),
        'top' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'argb' => '000000'
            ),
        ),
    )
);
$border_style3 = array(
    'borders' => array(
        'right' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'argb' => '000000'
            ),
        ),
        'left' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'argb' => '000000'
            ),
        ),
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'argb' => '000000'
            ),
        ),
    )
);
$border_style4 = array(
    'borders' => array(
        'right' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'argb' => '000000'
            ),
        ),
        'left' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'argb' => '000000'
            ),
        ),
        'top' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'argb' => '000000'
            ),
        ),
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'argb' => '000000'
            ),
        ),
    )
);

for ($i = 0; $i <= $colIndexStart; $i++) {
    for ($j = 12; $j < 16; $j++){
        $col = PHPExcel_Cell::stringFromColumnIndex($i);
        if($i > 5 && $j == 13) $objPHPExcel->getActiveSheet()->getStyle($col.$j)->applyFromArray($border_style2);
        elseif($i > 5 && $j == 14) $objPHPExcel->getActiveSheet()->getStyle($col.$j)->applyFromArray($border_style3);
        else
            $objPHPExcel->getActiveSheet()->getStyle($col.$j)->applyFromArray($border_style1);
    }
}

for ($i = 0; $i <= $colIndexStart; $i++) {
    $col = PHPExcel_Cell::stringFromColumnIndex($i);
    for ($j = 16; $j <= $index + 14; $j++){
        $objPHPExcel->getActiveSheet()->getStyle($col.$j)->applyFromArray($border_style4);
    }
}

// Save Excel 2007 file
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$section = create_guid_section(6);
$file = 'custom/uploads/ReportAttendance/ReportAttendance-'.$section.'.xlsx';
ob_end_clean();
$objWriter->save($file);
//download to browser
if (file_exists($file)) {
    ob_end_clean();
    header('Content-Description: File Transfer');
    //header('Content-type: application/vnd.ms-excel');
//    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    unlink($file);
    exit;
}
