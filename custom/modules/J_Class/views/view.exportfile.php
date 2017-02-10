<?php
require_once 'custom/include/PHPWord/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();
require_once 'custom/include/PHPExcel/Classes/PHPExcel.php';
include("custom/include/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php");
include("custom/include/PHPExcel/Classes/PHPExcel/IOFactory.php");
include_once("custom/include/utils/file_utils.php");
$studentList = json_decode(html_entity_decode($_REQUEST['studentID']));
$template = $_REQUEST['template'];
$classID = $_REQUEST['classID'];
$certificateNumber = $_REQUEST['certificate_no'];
$class = new J_Class();
$class->retrieve($classID);
$classCode = $class->class_code;
$className = $class->name;
$team = new Team();
$team->retrieve($class->team_id);
$region = $team->region;
global $timedate, $current_user, $sugar_config;
$timedate->get_time_format($current_user);

$forder_template_url = "custom/include/TemplateExcel/Junior";
$forder_upload_file_url = "cache/JuniorTemplate";
if(!file_exists($forder_upload_file_url)) {
    mkdir($forder_upload_file_url, 0777);
}
deleteFileInForder($forder_upload_file_url, 25);

if( $template == 'In Course Report') {
    if($class->hours > 72) {
        $inputFileName = $forder_template_url."/Template_InCourseReport_2016_TemplateForEFL_108.xlsx";
        $filename = "InCourseReport_108course";
    }
    else if($class->hours > 36) {
        $inputFileName = $forder_template_url."/Template_InCourseReport_2016_TemplateForEFL_72.xlsx";
        $filename = "InCourseReport_72course";
    }
    else {
        $inputFileName = $forder_template_url."/Template_InCourseReport.xlsx";
        $filename = "InCourseReport";
    }

    try {
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
    } catch(Exception $e) {
        die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
    }

    // Set document properties
    $objPHPExcel->getProperties()->setCreator($GLOBALS['current_user']->user_name)
    ->setLastModifiedBy($GLOBALS['current_user']->user_name)
    ->setTitle("Apollo")
    ->setSubject("Apollo")
    ->setDescription("Apollo")
    ->setKeywords("Apollo")
    ->setCategory("Apollo");


    //set value in sheet Summary Class
    $objPHPExcel->setActiveSheetIndex(1)
    ->setCellValue('B3', $className)
    ->setCellValue('B4', $classCode);

    $sqlClassSession = "SELECT DISTINCT l1.`name`, m.date_start, m.delivery_hour, m.lesson_number
    FROM meetings m INNER JOIN  j_class l1 ON m.ju_class_id=l1.id AND l1.deleted=0
    WHERE l1.id='" . $classID . "'
    AND  m.deleted=0
    AND m.session_status <> 'Cancelled'";
    $rsClassSession = $GLOBALS['db']->query($sqlClassSession);
    $hour = 0;
    $stt = 1;
    $cell = 8;
    while($rowSession = $GLOBALS['db']->fetchByAssoc($rsClassSession) ) {
        $dateSg = $timedate->to_display_date_time($rowSession['date_start'],true,true,$current_user);

        $hour += $rowSession['delivery_hour'];
        $objPHPExcel->setActiveSheetIndex(1)
        ->setCellValue('A'.$cell, $dateSg)
        ->setCellValue('B'.$cell, $stt)
        ->setCellValue('C'.$cell, $hour);
        $stt ++ ;
        $cell ++ ;
    }
    //set value in sheet SMS and Test Report
    $sqlGetStudents = "SELECT DISTINCT l1.class_code, contact_id, full_student_name, birthdate, phone_mobile, contacts.picture
    FROM contacts
    INNER JOIN  j_class_contacts_1_c l1_1 ON contacts.id = l1_1.j_class_contacts_1contacts_idb AND l1_1.deleted = 0
    INNER JOIN  j_class l1 ON l1.id = l1_1.j_class_contacts_1j_class_ida AND l1.deleted = 0
    WHERE l1.id='{$classID}'
    AND  contacts.deleted=0 AND ( contacts.id = '" . implode("' OR contacts.id ='", $studentList) . "')" ;
    $rsGetStudents = $GLOBALS['db']->query($sqlGetStudents);

    while($rowStudent = $GLOBALS['db']->fetchByAssoc($rsGetStudents)) {
        $smsName = 'SMS '. $rowStudent['contact_id'];
        $objSmsWorkSheetBase = $objPHPExcel->setActiveSheetIndex(2);
        $objSmsWorkSheet = clone $objSmsWorkSheetBase;
        $objSmsWorkSheet->setTitle($smsName);
        $objPHPExcel->addSheet($objSmsWorkSheet);
        if( $rowStudent['birthdate'] == Null || $rowStudent['birthdate'] == '')
            $birthDay = '';
        else
            $birthDay = date('d/m/Y',strtotime($rowStudent['birthdate']));
        $objPHPExcel->setActiveSheetIndexByName($smsName)
        ->setCellValue('G2', $rowStudent['full_student_name'])
        ->setCellValue('G3', $birthDay)
        ->setCellValue('G4', $rowStudent['contact_id'])
        ->setCellValue('G5', $rowStudent['class_code'])
        ->setCellValue('G6', $rowStudent['phone_mobile']);

        $objDrawing = new PHPExcel_Worksheet_Drawing();

        $src = 'upload/'. $rowStudent['picture'];
        if($src == 'upload/' || !file_exists($src))
            $src = 'themes/default/images/noimage.png';

        $objDrawing->setPath($src);
        $objDrawing->setCoordinates('O2');
        $objDrawing->setHeight(160);
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
    }
    $rsGetStudents2 = $GLOBALS['db']->query($sqlGetStudents);
    while($rowStudent = $GLOBALS['db']->fetchByAssoc($rsGetStudents2)) {
        $testName = 'TestReport '. $rowStudent['contact_id'];
        $objTestWorkSheetBase = $objPHPExcel->setActiveSheetIndex(3);
        $objTestWorkSheet = clone $objTestWorkSheetBase;
        $objTestWorkSheet->setTitle($testName);
        $objPHPExcel->addSheet($objTestWorkSheet);
        if( $rowStudent['birthdate'] == Null || $rowStudent['birthdate'] == '')
            $birthDay = '';
        else
            $birthDay = date('d/m/Y',strtotime($rowStudent['birthdate']));
        $objPHPExcel->setActiveSheetIndexByName($testName)
        ->setCellValue('G2', $rowStudent['full_student_name'])
        ->setCellValue('G3', $birthDay)
        ->setCellValue('G4', $rowStudent['contact_id'])
        ->setCellValue('G5', $rowStudent['class_code'])
        ->setCellValue('G6', $rowStudent['phone_mobile']);

        $objDrawing = new PHPExcel_Worksheet_Drawing();

        $src = 'upload/'. $rowStudent['picture'];
        if($src == 'upload/' || !file_exists($src))
            $src = 'themes/default/images/noimage.png';

        $objDrawing->setPath($src);
        $objDrawing->setCoordinates('O2');
        $objDrawing->setHeight(100);
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
    }
    $objPHPExcel->getSheetByName('SMS')->setSheetState(PHPExcel_Worksheet::SHEETSTATE_HIDDEN);
    $objPHPExcel->getSheetByName('TestRecord')->setSheetState(PHPExcel_Worksheet::SHEETSTATE_HIDDEN);

    $filename = "custom/uploads/".$filename."_".create_guid_section(6).".xlsx";
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save($filename);
    ob_end_clean();
    if (file_exists($filename)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($filename));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));
        ob_clean();
        flush();
        readfile($filename);
        unlink($filename);
        exit;
    }
}

//export Thank you template
else if( $template == 'Thanks you Template') {   //
    $inputFileName = $forder_template_url.'/Template_Thankyou_Certificate.xlsx';

    try {
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
    } catch(Exception $e) {
        die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
    }

    // Set document properties
    $objPHPExcel->getProperties()->setCreator($GLOBALS['current_user']->user_name)
    ->setLastModifiedBy($GLOBALS['current_user']->user_name)
    ->setTitle("Apollo")
    ->setSubject("Apollo")
    ->setDescription("Apollo")
    ->setKeywords("Apollo")
    ->setCategory("Apollo");

    //Get data
    $sqlGetStudents = "SELECT DISTINCT l1.`name`, contacts.contact_id, l1.end_date, l1.kind_of_course, l1.hours, l1.`level`,l1.modules, full_student_name,contacts.first_name first_name, birthdate, users.sign, users.title, CONCAT(users.last_name, ' ', users.first_name) username
    FROM contacts
    INNER JOIN  j_class_contacts_1_c l1_1 ON contacts.id = l1_1.j_class_contacts_1contacts_idb AND l1_1.deleted = 0
    INNER JOIN  j_class l1 ON l1.id = l1_1.j_class_contacts_1j_class_ida AND l1.deleted = 0
    INNER JOIN  users  ON users.id = l1.assigned_user_id AND users.deleted = 0
    WHERE l1.id='{$classID}'
    AND  contacts.deleted=0 AND ( contacts.id = '" . implode("' OR contacts.id ='", $studentList) . "')" ;
    $rsGetStudents = $GLOBALS['db']->query($sqlGetStudents);
    $sheetCount = 0;

    while($rowStudent = $GLOBALS['db']->fetchByAssoc($rsGetStudents)) {
        if(strlen($rowStudent['full_student_name']) <= 31)
            $sheet_name = $rowStudent['full_student_name'];
        else    $sheet_name = $rowStudent['first_name'];

        if($sheetCount > 0){
            //Clone sheet
            $objWorkSheetBase = $objPHPExcel->setActiveSheetIndex(0);
            $objWorkSheet = clone $objWorkSheetBase;
            $objWorkSheet->setTitle($sheet_name);
            $objPHPExcel->addSheet($objWorkSheet);
            $objPHPExcel->setActiveSheetIndexByName($sheet_name);
        }
        else  $objPHPExcel->setActiveSheetIndex($sheetCount)->setTitle($sheet_name);

        //Write date
        if($rowStudent['modules'] == '') $module = '';
        else $module = ' Module '. $rowStudent['modules'];

        $certificateNumber = $rowStudent['contact_id']. str_replace('/', '', date('d/m/y', strtotime($rowStudent['end_date'])));

        $objPHPExcel->setActiveSheetIndex($sheetCount)
        ->setCellValue('C4', $rowStudent['full_student_name'])
        ->setCellValue('C6', "Has participated in the course ".$rowStudent['kind_of_course']. ' Level '.$rowStudent['level']. $module )
        ->setCellValue('G18', "Certificate No: ".$certificateNumber);
        $sheetCount++;
    }

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $section = create_guid_section(6);
    $outputFileName = 'custom/uploads/Thankyou_Certificate_'.$section.'.xlsx';
    $objWriter->save($outputFileName);

    if (file_exists($outputFileName)) {
        ob_end_clean();
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($outputFileName));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($outputFileName));
        ob_clean();
        flush();
        readfile($outputFileName);
        unlink($outputFileName);
    }
    exit;
}
//export Certificate Junior template
else if( $template == 'Certificate Junior') {
    $inputFileName = $forder_template_url.'/Template_CertificateJunior_Nationwide.xlsx';

    try {
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
    } catch(Exception $e) {
        die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
    }

    // Set document properties
    $objPHPExcel->getProperties()->setCreator($GLOBALS['current_user']->user_name)
    ->setLastModifiedBy($GLOBALS['current_user']->user_name)
    ->setTitle("Apollo")
    ->setSubject("Apollo")
    ->setDescription("Apollo")
    ->setKeywords("Apollo")
    ->setCategory("Apollo");

    //Get Data
    $sqlGetStudents = "SELECT DISTINCT
    l1.class_code,
    contacts.id,
    contacts.birthdate,
    contacts.contact_id,
    contacts.full_student_name,
    contacts.first_name,
    l1.kind_of_course,
    l1.level,
    l1.modules,
    l1.end_date ,
    gbdetail.final_result,
    gbdetail.certificate_type
    FROM contacts
    INNER JOIN j_class_contacts_1_c l1_1 ON contacts.id = l1_1.j_class_contacts_1contacts_idb AND l1_1.deleted = 0
    INNER JOIN j_class l1 ON l1.id = l1_1.j_class_contacts_1j_class_ida AND l1.deleted = 0
    INNER JOIN j_class_j_gradebook_1_c l2_1 ON l1.id = l2_1.j_class_j_gradebook_1j_class_ida AND l2_1.deleted = 0
    INNER JOIN j_gradebook l2 ON l2.id = l2_1.j_class_j_gradebook_1j_gradebook_idb AND l2.deleted = 0
    INNER JOIN j_gradebookdetail gbdetail ON gbdetail.student_id = contacts.id AND gbdetail.gradebook_id = l2.id AND gbdetail.deleted = 0
    WHERE l1.id='{$classID}'
    AND l1.deleted=0 AND l2.type = 'Final'
    AND gbdetail.certificate_type != ''
    AND final_result >= 0.5
    AND contacts.id IN ('".implode("','",$studentList)."')
    ";
    $rsGetStudents = $GLOBALS['db']->query($sqlGetStudents);
    $count = $GLOBALS['db']->getRowCount($rsGetStudents);

    $sheetCount = 0;
    while($rowStudent = $GLOBALS['db']->fetchByAssoc($rsGetStudents)) {
        if(strlen($rowStudent['full_student_name']) <= 31)
            $sheet_name =  $rowStudent['full_student_name'];
        else    $sheet_name =  $rowStudent['first_name'];

        if($sheetCount > 0){
            //Clone sheet
            $objWorkSheetBase = $objPHPExcel->setActiveSheetIndex(0);
            $objWorkSheet = clone $objWorkSheetBase;
            $objWorkSheet->setTitle($sheet_name);
            $objPHPExcel->addSheet($objWorkSheet);
            $objPHPExcel->setActiveSheetIndexByName($sheet_name);
        }
        else  $objPHPExcel->setActiveSheetIndex($sheetCount)->setTitle($sheet_name);

        //Write date
        if($rowStudent['modules'] =='') $module = '';
        else $module = ' Module '. $rowStudent['modules'];

        if(!$rowStudent['birthdate']) $birthDay = '';
        else $birthDay = date('d.m.Y',strtotime($rowStudent['birthdate']));

        $certificateNumber = $rowStudent['contact_id']. str_replace('/', '', date('d/m/y', strtotime($rowStudent['end_date'])));

        $objPHPExcel->setActiveSheetIndex($sheetCount)
        ->setCellValue('B4', $rowStudent['full_student_name'])
        ->setCellValue('B6', "D.O.B. ".$birthDay)
        ->setCellValue('B8', "Has achieved ".$rowStudent['certificate_type']." in ".$rowStudent['kind_of_course']. ' Level '.$rowStudent['level']. $module)
        ->setCellValue('G18', "Certificate No: ".$certificateNumber)
        ->setCellValue('G20', "Date of issue: ".date('Y.m.d'));
        $sheetCount++;
    }

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $section = create_guid_section(6);
    $outputFileName = 'custom/uploads/Template_Certificate_'.$section.'.xlsx';
    $objWriter->save($outputFileName);

    if (file_exists($outputFileName)) {
        ob_end_clean();
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($outputFileName));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($outputFileName));
        ob_clean();
        flush();
        readfile($outputFileName);
        unlink($outputFileName);
        exit;
    }
}
//export Certificate Adult template
else if( $template == 'Certificate Adult' && $class->isAdultKOC() == 1) {
    $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($forder_template_url.'/Template_Certificate_Adult.docx');
    $temp = 1;
    $KOC = $class->getKOC();
    $attendanceHour = array();
    //$studentMark = array();
    $student = array();

    $sqlGetStudents = "SELECT a.student_id, SUM(meetings.duration_cal) attendance
    FROM meetings INNER JOIN c_attendance a  ON a.meeting_id = meetings.id AND a.deleted = 0
    WHERE meetings.deleted = 0 AND meetings.ju_class_id = '". $classID ."'
    AND meetings.session_status <> 'Cancelled' AND a.attended = 1 AND meeting_type = 'Session'
    AND ( a.student_id = '" . implode("' OR a.student_id ='", $studentList) . "')
    GROUP BY a.student_id ";
    $rsGetStudents = $GLOBALS['db']->query($sqlGetStudents);

    while($rowStudent = $GLOBALS['db']->fetchByAssoc($rsGetStudents)) {
        $attendanceHour[$rowStudent['student_id']] = $rowStudent['attendance'] ;
    }

    $sqlGetStudents2 = "SELECT DISTINCT
    contacts.id,
    l1.class_code,
    contacts.contact_id,
    l1.level,
    contacts.full_student_name,
    contacts.first_name,
    contacts.birthdate, hours,
    l1.kind_of_course,
    l1.level,
    l1.modules,
    l1.end_date ,
    SUM(meetings.duration_cal) total
    FROM contacts INNER JOIN meetings_contacts mc ON mc.contact_id = contacts.id  AND mc.deleted = 0
    INNER JOIN meetings ON  meetings.id = mc.meeting_id AND meetings.deleted = 0
    INNER JOIN j_class l1 ON meetings.ju_class_id = l1.id AND l1.deleted = 0
    INNER JOIN j_studentsituations ss ON ss.id = mc.situation_id AND ss.deleted = 0
    WHERE contacts.deleted = 0 AND meetings.ju_class_id = '". $classID ."'
    AND meetings.session_status <> 'Cancelled' AND meeting_type = 'Session'
    AND ( contacts.id = '" . implode("' OR contacts.id ='", $studentList) . "')
    AND ss.type IN ('Enrolled','Moving In','OutStanding','Settle')
    GROUP BY contacts.id";
    $rsGetStudents2 = $GLOBALS['db']->query($sqlGetStudents2);
    $count = $GLOBALS['db']->getRowCount($rsGetStudents2);
    //$templateProcessor->cloneBlock('CLONEME', $count);
    $templateProcessor->cloneRow('Student_name', $count);

    while($rowStudent2 = $GLOBALS['db']->fetchByAssoc($rsGetStudents2)) {
        if( isset($attendanceHour[$rowStudent2['id']]))
            $percent = $attendanceHour[$rowStudent2['id']];
        else
            $percent = 0;

        $student[$rowStudent2['id']]['attendance'] = $percent / $rowStudent2['total'] * 100 ;
        $student[$rowStudent2['id']]['contact_id'] = $rowStudent2['contact_id'] ;
        $student[$rowStudent2['id']]['full_student_name'] = $rowStudent2['full_student_name'] ;
        $student[$rowStudent2['id']]['birthdate'] = $rowStudent2['birthdate'] ;
        $student[$rowStudent2['id']]['hours'] = $rowStudent2['hours'] ;
        $student[$rowStudent2['id']]['kind_of_course'] = $rowStudent2['kind_of_course'] ;
        $student[$rowStudent2['id']]['modules'] = $rowStudent2['modules'] ;
        $student[$rowStudent2['id']]['end_date'] = $rowStudent2['end_date'] ;
        //$student[$rowStudent2['id']]['level'] = $rowStudent2['level'] ;
    }

    foreach ($student as $key => $value) {

        if($value['modules'] == '')
            $module = '';
        else
            $module = $value['modules'];

        if( $value['birthdate'] == Null || $value['birthdate'] == '')
            $birthDay = '';
        else
            $birthDay = date('d/m/Y',strtotime($value['birthdate']));

        $certificateNumber = $value['contact_id']. str_replace('/', '', date('d/m/y', strtotime($value['end_date'])));
        $templateProcessor->setValue('Student_name#' . $temp, $value['full_student_name']);
        $templateProcessor->setValue('Dob#' . $temp, $birthDay);
        $templateProcessor->setValue('Course_title#' . $temp, $KOC[$value['kind_of_course']]);
        $templateProcessor->setValue('Level#' . $temp, $value['level']. $module);
        $templateProcessor->setValue('Course_hours#' . $temp, number_format($value['hours'], 0));
        $templateProcessor->setValue('Code#' . $temp, $certificateNumber);
        $templateProcessor->setValue('Attendance#' . $temp, number_format($value['attendance'], 0));
        $templateProcessor->setValue('Date#' . $temp, date('F Y', strtotime($value['end_date'])));
        $temp ++;
    }

    $templateProcessor->saveAs($forder_upload_file_url.'/Template_Certificate_Adult.docx');
    header("Location: ". $sugar_config['site_url'] ."/".$forder_upload_file_url."/Template_Certificate_Adult.docx");
    exit;
}else if($template == 'Certificate Adult' && strpos($class->team_name,'360')){
    $inputFileName = $forder_template_url.'/Template_A360_Cer.xlsx';

    try {
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
    } catch(Exception $e) {
        die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
    }

    // Set document properties
    $objPHPExcel->getProperties()->setCreator($GLOBALS['current_user']->user_name)
    ->setLastModifiedBy($GLOBALS['current_user']->user_name)
    ->setTitle("Apollo")
    ->setSubject("Apollo")
    ->setDescription("Apollo")
    ->setKeywords("Apollo")
    ->setCategory("Apollo");

    //Get Data
    $sqlAttendance = "SELECT 
    gb.student_id, gb.final_result attendance_result
    FROM
    j_gradebookdetail gb
    INNER JOIN
    j_gradebook g ON g.id = gb.gradebook_id
    AND gb.deleted = 0
    AND g.deleted = 0
    AND g.type = 'Attendance'
    AND gb.j_class_id = '$classID'
    AND gb.student_id IN ('".implode("','",$studentList)."')";
    $rsAtten = $GLOBALS['db']->query($sqlAttendance);
    $arr_att = array();
    while($rowAtten = $GLOBALS['db']->fetchByAssoc($rsAtten)){
        $arr_att[$rowAtten['student_id']]['attendance'] = $rowAtten['attendance_result'];
    }

    $sqlGetStudents = "SELECT DISTINCT
    l1.class_code,
    contacts.id,
    contacts.birthdate,
    contacts.contact_id,
    contacts.full_student_name,
    contacts.first_name,
    l1.kind_of_course_adult,
    l1.level,
    l1.modules,
    l1.start_date,
    l1.end_date ,
    gbdetail.final_result,
    gbdetail.certificate_type
    FROM contacts
    INNER JOIN j_class_contacts_1_c l1_1 ON contacts.id = l1_1.j_class_contacts_1contacts_idb AND l1_1.deleted = 0
    INNER JOIN j_class l1 ON l1.id = l1_1.j_class_contacts_1j_class_ida AND l1.deleted = 0
    INNER JOIN j_class_j_gradebook_1_c l2_1 ON l1.id = l2_1.j_class_j_gradebook_1j_class_ida AND l2_1.deleted = 0
    INNER JOIN j_gradebook l2 ON l2.id = l2_1.j_class_j_gradebook_1j_gradebook_idb AND l2.deleted = 0
    INNER JOIN j_gradebookdetail gbdetail ON gbdetail.student_id = contacts.id AND gbdetail.gradebook_id = l2.id AND gbdetail.deleted = 0
    WHERE l1.id='{$classID}'
    AND l1.deleted=0 AND l2.type = 'Final'
    AND gbdetail.certificate_type != ''
    AND final_result >= 0.5
    AND contacts.id IN ('".implode("','",$studentList)."')
    ";
    $rsGetStudents = $GLOBALS['db']->query($sqlGetStudents);
    $count = $GLOBALS['db']->getRowCount($rsGetStudents);

    $sheetCount = 0;
    while($rowStudent = $GLOBALS['db']->fetchByAssoc($rsGetStudents)) {
        if(strlen($rowStudent['full_student_name']) <= 31)
            $sheet_name =  $rowStudent['full_student_name'];
        else    $sheet_name =  $rowStudent['first_name'];

        if($sheetCount > 0){
            //Clone sheet
            $objWorkSheetBase = $objPHPExcel->setActiveSheetIndex(0);
            $objWorkSheet = clone $objWorkSheetBase;
            $objWorkSheet->setTitle($sheet_name);
            $objPHPExcel->addSheet($objWorkSheet);
            $objPHPExcel->setActiveSheetIndexByName($sheet_name);
        }
        else  $objPHPExcel->setActiveSheetIndex($sheetCount)->setTitle($sheet_name);

        //Write date
        $level = get_level($rowStudent['level'])." ".$rowStudent['modules'];

        /*if(!$rowStudent['birthdate']) $birthDay = '';
        else $birthDay = date('d.m.Y',strtotime($rowStudent['birthdate']));  */

        if(!$rowStudent['start_date']) $start_date = '';
        else $start_date = date('d-M-Y',strtotime($rowStudent['start_date'])); 

        if(!$rowStudent['end_date']) $end_date = '';
        else $end_date = date('d-M-Y',strtotime($rowStudent['end_date'])); 



        $objPHPExcel->setActiveSheetIndex($sheetCount)
        ->setCellValue('A18', $rowStudent['full_student_name'])
        ->setCellValue('C21', $level)
        ->setCellValue('E24', $end_date)
        ->setCellValue('E25', $start_date." to ".$end_date)
        ->setCellValue('E26', $arr_att[$rowStudent['id']]['attendance']*100)
        ->setCellValue('D40', $certificateNumber) ;
        $sheetCount++;
    }

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $section = create_guid_section(6);
    $outputFileName = 'custom/uploads/Template_Certificate_'.$section.'.xlsx';
    $objWriter->save($outputFileName);

    if (file_exists($outputFileName)) {
        ob_end_clean();
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($outputFileName));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($outputFileName));
        ob_clean();
        flush();
        readfile($outputFileName);
        unlink($outputFileName);
        exit;
    }
}else if($template == 'In-Course Report Adult'){
    $inputFileName = $forder_template_url.'/Template_A360_Inc.xlsx';

    try {
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
    } catch(Exception $e) {
        die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
    }

    // Set document properties
    $objPHPExcel->getProperties()->setCreator($GLOBALS['current_user']->user_name)
    ->setLastModifiedBy($GLOBALS['current_user']->user_name)
    ->setTitle("Apollo")
    ->setSubject("Apollo")
    ->setDescription("Apollo")
    ->setKeywords("Apollo")
    ->setCategory("Apollo");

    //Get Data
    $sqlScore = "SELECT 
    gb.student_id, gb.final_result, g.type, gb.content
    FROM
    j_gradebookdetail gb
    INNER JOIN
    j_gradebook g ON g.id = gb.gradebook_id AND g.deleted = 0
    AND gb.deleted = 0
    AND g.type IN ('Attendance' , 'LMS', 'Class Progress')
    AND gb.j_class_id = '$classID'
    AND gb.student_id IN ('".implode("','",$studentList)."')";
    $rsScore = $GLOBALS['db']->query($sqlScore);
    $arrScore = array();
    while($rowScore = $GLOBALS['db']->fetchByAssoc($rsScore)){  
        $arrScore[$rowScore['student_id']][$rowScore['type']]['final_result']  = $rowScore['final_result'] ;
        $arrScore[$rowScore['student_id']][$rowScore['type']]['content'] = $rowScore['content'];                                           
    }
    $sqlTeacher = "select tc.full_teacher_name from c_teachers tc inner join
    (SELECT 
    teacher_id
    FROM
    meetings
    WHERE
    ju_class_id = 'cf556b00-67ca-fe9d-b5fb-582d1ed5cf07'
    AND teaching_type = 'main_teacher'
    GROUP BY teacher_id
    ORDER BY SUM(duration_cal) DESC
    LIMIT 1) m on m.teacher_id = tc.id ";
    $teacher_name = $GLOBALS['db']->getOne($sqlTeacher);
    $sqlGetStudents = "SELECT DISTINCT
    l1.class_code,
    contacts.id,
    contacts.birthdate,
    contacts.contact_id,
    contacts.full_student_name,
    contacts.first_name,
    l1.kind_of_course_adult,
    l1.level,
    l1.modules,
    l1.start_date,
    l1.end_date         
    FROM contacts
    INNER JOIN j_class_contacts_1_c l1_1 ON contacts.id = l1_1.j_class_contacts_1contacts_idb AND l1_1.deleted = 0
    INNER JOIN j_class l1 ON l1.id = l1_1.j_class_contacts_1j_class_ida AND l1.deleted = 0
    WHERE l1.id='{$classID}'
    AND l1.deleted=0
    AND contacts.id IN ('".implode("','",$studentList)."')";
    $rsGetStudents = $GLOBALS['db']->query($sqlGetStudents);
    $count = $GLOBALS['db']->getRowCount($rsGetStudents);

    $sheetCount = 0;
    while($rowStudent = $GLOBALS['db']->fetchByAssoc($rsGetStudents)) {
        if(strlen($rowStudent['full_student_name']) <= 31)
            $sheet_name =  $rowStudent['full_student_name'];
        else    $sheet_name =  $rowStudent['first_name'];

        if($sheetCount > 0){
            //Clone sheet
            $objWorkSheetBase = $objPHPExcel->setActiveSheetIndex(0);
            $objWorkSheet = clone $objWorkSheetBase;
            $objWorkSheet->setTitle($sheet_name);
            $objPHPExcel->addSheet($objWorkSheet);
            $objPHPExcel->setActiveSheetIndexByName($sheet_name);
        }
        else  $objPHPExcel->setActiveSheetIndex($sheetCount)->setTitle($sheet_name);

        //Write date
        $level = get_level($rowStudent['level'])." ".$rowStudent['modules'];

        if(!$rowStudent['start_date']) $start_date = '';
        else $start_date = date('d-M-Y',strtotime($rowStudent['start_date'])); 

        if(!$rowStudent['end_date']) $end_date = '';
        else $end_date = date('d-M-Y',strtotime($rowStudent['end_date'])); 

        $content_js = $arrScore[$rowStudent['id']]['Class Progress']['content'];
        $content =  json_decode(html_entity_decode($content_js));
        $comment = '';
        foreach($content->comment_key as $key=>$value){
            $comment .= $value;
        }

        $objPHPExcel->setActiveSheetIndex($sheetCount)
        ->setCellValue('C3', $rowStudent['full_student_name'])
        ->setCellValue('C4', $rowStudent['contact_id'])
        ->setCellValue('C5', $rowStudent['class_code'])
        ->setCellValue('C6', $level)      
        ->setCellValue('C7', $start_date." to ".$end_date)    
        ->setCellValue('D11', $content->A)    
        ->setCellValue('D12', $content->B)    
        ->setCellValue('D13', $content->C)    
        ->setCellValue('D14', $content->D)    
        ->setCellValue('E11', $comment)    
        ->setCellValue('L23', $teacher_name)    
        ->setCellValue('D16', $arrScore[$rowStudent['id']]['LMS']['final_result']*100)
        ->setCellValue('D17', $arrScore[$rowStudent['id']]['Attendance']['final_result']*100) ;
        $sheetCount++;
    }

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $section = create_guid_section(6);
    $outputFileName = 'custom/uploads/Template_Certificate_'.$section.'.xlsx';
    $objWriter->save($outputFileName);

    if (file_exists($outputFileName)) {
        ob_end_clean();
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($outputFileName));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($outputFileName));
        ob_clean();
        flush();
        readfile($outputFileName);
        unlink($outputFileName);
        exit;
    }
}

function get_level($lev){
    switch($lev){
        case "Inter" :
            return "Intermediate";
            break;
        case "Upper Inter":
            return "Upper-Intermediate";
            break;
        case "Pre Inter":
            return "Pre-Intermediate";
            break;
        case "Beginner":
            return "Beginner";
            break;
        case "Advance":
            return "Advance";
            break;
        case "Master":
            return "Master";
            break;
    }
}
?>