<?php
switch ($_REQUEST['type']) {
    case 'getParentData':
        $result = call_user_func($_REQUEST['type'],$_REQUEST);
        break;
    case 'ajaxGetReceiversFromExcel':
        $result = ajaxGetReceiversFromExcel();
        break;
    case 'ajaxStopStudent':
    $result = ajaxStopStudent();
    break;
}
echo $result;
die;

function getParentData($data){
    global $current_user;
    $team_id = $data['team_id'];
    if(empty($team_id))
        $team_id = $current_user->team_id;
    $parent_team = $GLOBALS['db']->getOne("SELECT DISTINCT
        IFNULL(l1.id, '') l1_id
        FROM
        teams
        INNER JOIN
        teams l1 ON teams.parent_id = l1.id
        AND l1.deleted = 0
        WHERE
        (((teams.id = '$team_id')))
        AND teams.deleted = 0");

    $sql = "SELECT DISTINCT
    IFNULL(c_contacts.id, '') id,
    IFNULL(c_contacts.name, '') name,
    IFNULL(c_contacts.mobile_phone, '') phone,
    IFNULL(c_contacts.address, '') address,
    IFNULL(c_contacts.email1, '') email1
    FROM
    c_contacts
    INNER JOIN
    teams l1 ON c_contacts.team_id = l1.id
    AND l1.deleted = 0
    WHERE
    (((l1.id = '$parent_team')))
    AND c_contacts.deleted = 0
    LIMIT 10";
    $result = $GLOBALS['db']->fetchArray($sql);
    echo json_encode($result);
}

function ajaxGetReceiversFromExcel() {
    require_once("custom/include/PHPExcel/Classes/PHPExcel.php");
    $info = pathinfo($_FILES['fileToUpload']['name']);
    $ext = $info['extension']; // get the extension of the file

    if($ext != "xlsx" && $ext != "xls"){
        return json_encode(array(
            "success" => "0",
            "errorLabel" => "LBL_PLEASE_UPLOAD_EXCEL_FILE",
        ));
    }

    $newname = "phone_number_list.".$ext;
    $filename = 'custom/uploads/'.$newname;
    unlink($filename);
    move_uploaded_file( $_FILES['fileToUpload']['tmp_name'], $filename);

    $inputFileType = PHPExcel_IOFactory::identify($filename);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objReader->setReadDataOnly(true);
    $objPHPExcel = $objReader->load("$filename");
    $objWorksheet  = $objPHPExcel->setActiveSheetIndex(0);
    $highestRow    = $objWorksheet->getHighestRow();
    $highestColumn = $objWorksheet->getHighestColumn();
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

    $phoneNumArr = array();
    for ($row = 1; $row <= $highestRow; ++$row){
        $col = 0; //Read first column
        $value = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
        if(!preg_match("/[a-z]/i", $value) && !in_array($value,$phoneNumArr)){
            $phoneNumArr[] = $value;
        }
    }
    unlink($filename);

    $phoneNumbers = "";
    foreach($phoneNumArr as $value){
        if ($phoneNumbers != "") $phoneNumbers .= ",";
        $phoneNumbers .= $value;
    }

    return json_encode(array(
        "success" => "1",
        "phoneNumbers" => $phoneNumbers,
    ));
}
function ajaxStopStudent() {
    global $timedate, $db;
    $studentID = $_POST['student_id'];
    $currentDate = $timedate->nowDbDate();

    $student = new Contact();
    $student->retrieve($studentID);
    //check student have total remain_amount = 0 and count number of student situation = 0

    $sql = "SELECT IFNULL(SUM(l2.remain_amount),0) remain_amount
    FROM contacts
    INNER JOIN contacts_j_payment_1_c l1 ON contacts.id = l1.contacts_j_payment_1contacts_ida AND l1.deleted = 0
    INNER JOIN j_payment l2 ON l2.id = l1.contacts_j_payment_1j_payment_idb AND l2.deleted = 0
    WHERE contacts.id = '". $studentID ."'
    AND l2.payment_type IN ('Cashholder','Deposit','Transfer In','Moving In', 'Delay')
    ";
    $totalRemain = $db->getOne($sql);

    $sql = "SELECT IFNULL(COUNT(j_studentsituations.id),0) situations
    FROM contacts l4
    INNER JOIN j_studentsituations WHERE j_studentsituations.deleted = 0 AND j_studentsituations.student_id = l4.id
    AND j_studentsituations.type IN ('Enrolled','OutStanding','Settle','Moving In', 'Waiting Class')
    AND j_studentsituations.end_study >= '". $currentDate ."' AND l4.id = '". $studentID ."'
    ";

    $numSituation = $db->getOne($sql);

    //change student status to stop and return ajaxresult
    if($totalRemain == 0 && $numSituation == 0) {
        $student->contact_status = 'Delayed';
        $student->save();
        echo '1';
    } else
        echo '0';
}

?>