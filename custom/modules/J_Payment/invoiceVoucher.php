<?php
//export file excel
require_once("custom/include/PHPExcel/Classes/PHPExcel.php");
require_once("custom/include/ConvertMoneyString/convert_number_to_string.php");



global $timedate, $current_user;
$fi = new FilesystemIterator("custom/uploads/InvoiceExcel", FilesystemIterator::SKIP_DOTS);
if(iterator_count($fi) > 10)
    array_map('unlink', glob("custom/uploads/InvoiceExcel/*"));

$objPHPExcel = new PHPExcel();

$payment = BeanFactory::getBean('J_PaymentDetail', $_REQUEST['record']);
$qTeam = "SELECT short_name FROM teams WHERE id = '{$payment->team_id}'";
$teamShortName = $GLOBALS['db']->getOne($qTeam);

$templateUrl = "custom/include/TemplateExcel/Junior/InvoicesVoucher_".$teamShortName.".xlsx";
if (!file_exists($templateUrl)) $templateUrl = "custom/include/TemplateExcel/Junior/InvoicesVoucher.xlsx";

//Import Template
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load($templateUrl);

// Set properties
$objPHPExcel->getProperties()->setCreator("Apollo Center");
$objPHPExcel->getProperties()->setLastModifiedBy("Apollo Center");
$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX");

//Add data
$sql = "SELECT DISTINCT
IFNULL(l1.id, '') payment_id,
IFNULL(l1.name, '') l1_name,
IFNULL(l1.company_name, '') company_name,
IFNULL(l1.tax_code, '') tax_code,
IFNULL(l1.kind_of_course, '') kind_of_course,
IFNULL(l1.account_id, '') company_id,
IFNULL(l1.company_address, '') company_address,
IFNULL(l4.name, '') course_fee_name,
IFNULL(l4.extend_vat, '') extend_vat,
l1.final_sponsor_percent final_sponsor_percent,
l4.type_of_course_fee type_of_course_fee,
l1.tuition_fee payment_tuition_fee,
l1.tuition_hours payment_tuition_hours,
IFNULL(j_paymentdetail.id, '') primaryid,
IFNULL(j_paymentdetail.name, '') name,
j_paymentdetail.payment_date payment_date,
j_paymentdetail.printed_date printed_date,
IFNULL(j_paymentdetail.payment_method, '') payment_method,
j_paymentdetail.before_discount before_discount,
j_paymentdetail.discount_amount discount_amount,
j_paymentdetail.sponsor_amount sponsor_amount,
j_paymentdetail.type type,
j_paymentdetail.payment_no payment_no,
j_paymentdetail.payment_amount payment_amount,
l1.tuition_hours tuition_hours,
l1.deposit_amount deposit_amount,
l1.paid_amount paid_amount,
l1.payment_type payment_type,
l1.description description,
j_paymentdetail.description detail_description,
j_paymentdetail.is_discount is_discount,
IFNULL(l2.id, '') l2_id,
IFNULL(l5.team_type, '') team_type,
CONCAT(IFNULL(l2.last_name, ''),
' ',
IFNULL(l2.first_name, '')) assigned_user_name,
IFNULL(l3.id, '') l3_id,
CONCAT(IFNULL(l3.last_name, ''),
' ',
IFNULL(l3.first_name, '')) student_name,
l3.primary_address_street student_address
FROM
j_paymentdetail
LEFT JOIN
j_payment l1 ON j_paymentdetail.payment_id = l1.id
AND l1.deleted = 0
LEFT JOIN
users l2 ON l1.assigned_user_id = l2.id
AND l2.deleted = 0
LEFT JOIN
contacts_j_payment_1_c l3_1 ON l1.id = l3_1.contacts_j_payment_1j_payment_idb
AND l3_1.deleted = 0
LEFT JOIN
contacts l3 ON l3.id = l3_1.contacts_j_payment_1contacts_ida
AND l3.deleted = 0
LEFT JOIN
j_coursefee_j_payment_1_c l4_1 ON l1.id = l4_1.j_coursefee_j_payment_1j_payment_idb
AND l4_1.deleted = 0
LEFT JOIN
j_coursefee l4 ON l4.id = l4_1.j_coursefee_j_payment_1j_coursefee_ida
AND l4.deleted = 0
INNER JOIN
teams l5 ON l1.team_id = l5.id
AND l5.deleted = 0
WHERE
(((j_paymentdetail.id = '{$_REQUEST['record']}')))
AND j_paymentdetail.deleted = 0";
$res     = $GLOBALS['db']->query($sql);
$r         = $GLOBALS['db']->fetchByAssoc($res);

//Prepare
// - Date
$date     = explode('-', $r['payment_date']);
$day     = $date[2];
$month  = $date[1];
$year      = $date[0];

// - Method
if ($r['payment_method'] == "Cash") $pmmt="TM";
else $pmmt="CK";

// - Discount
$total_dicount     = intval($r['discount_amount']) + intval($r['sponsor_amount']);

// - Money to String
$int = new Integer();
$text = $int->toText($r['payment_amount']);

// Write file
$objPHPExcel->getActiveSheet()->SetCellValue('E2', $day);
$objPHPExcel->getActiveSheet()->SetCellValue('I2', $month);
$objPHPExcel->getActiveSheet()->SetCellValue('M2', $year);

if ($_REQUEST['type'] == "student" || $_REQUEST['type'] == "both"){
    $objPHPExcel->getActiveSheet()->SetCellValue('F4', $r['student_name']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D7', html_entity_decode_utf8($r['student_address']));
    if(strlen($r['student_address']) > 60)
        $objPHPExcel->getActiveSheet()->getStyle("D7")->getFont()->setSize(9);
}
if($_REQUEST['type'] == "corporate" || $_REQUEST['type'] == "both"){
    $q2 = "SELECT tax_code, billing_address_street, name FROM accounts WHERE id = '{$r['company_id']}'";
    $rs2     = $GLOBALS['db']->query($q2);
    $r_company         = $GLOBALS['db']->fetchByAssoc($rs2);
    $objPHPExcel->getActiveSheet()->SetCellValue('D5', $r_company['name']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D6', $r_company['tax_code']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D7', html_entity_decode_utf8($r_company['billing_address_street']) );
    if(strlen($r_company['billing_address_street']) > 65)
        $objPHPExcel->getActiveSheet()->getStyle("D7")->getFont()->setSize(9);
}

$objPHPExcel->getActiveSheet()->SetCellValue('F9', $pmmt);
$content = generateContent($objPHPExcel, $r);
$description = '';
if($r['is_discount'] == '1')
    $description .= $r['description'];
if($r['payment_type'] != 'Book/Gift'){

    if($r['payment_type'] == 'Cashholder' || $r['payment_type'] == 'Enrollment'){
        $price = ( $r['payment_tuition_fee'] )/$r['payment_tuition_hours'] ;
        $hours = ($r['before_discount'])/$price;
        if($price != 0 && ($r['kind_of_course'] != 'Cambridge' || $r['kind_of_course'] != 'Outing Trip') && $r['team_type'] == 'Junior'){
            $objPHPExcel->getActiveSheet()->SetCellValue('F11', 'Giờ');

            $objPHPExcel->getActiveSheet()->SetCellValue('I11', format_number($hours,2,2));

            $objPHPExcel->getActiveSheet()->SetCellValue('L11', format_number($price,0,0));
        }
        //Get Sponsor Number
        $q6 = "SELECT DISTINCT
        IFNULL(j_sponsor.id, '') primaryid,
        IFNULL(j_sponsor.name, '') name,
        IFNULL(j_sponsor.sponsor_number, '') sponsor_number,
        IFNULL(j_sponsor.foc_type, '') foc_type,
        j_sponsor.amount j_sponsor_amount,
        j_sponsor.percent j_sponsor_percent,
        j_sponsor.total_down total_down
        FROM
        j_sponsor
        INNER JOIN
        j_payment l1 ON j_sponsor.payment_id = l1.id
        AND l1.deleted = 0
        WHERE
        (((l1.id = '{$r['payment_id']}')))
        AND j_sponsor.deleted = 0
        ORDER BY name ASC";
        $rs6 = $GLOBALS['db']->query($q6);
        $count_sc   = 0;
        $percent_sc = 0;
        while($spon = $GLOBALS['db']->fetchByAssoc($rs6)){
            if(!empty($spon['sponsor_number']) && ($spon['foc_type'] != 'Staff children'))
                $description .= "\n Sponsor Code: {$spon['sponsor_number']}";

            if(($spon['foc_type'] == 'Staff children')){
                $count_sc++;
                $percent_sc += $spon['j_sponsor_percent'];
                $percent_sc += $spon['j_sponsor_amount']/$r['before_discount']*100;
            }
        }

        //bo sung extend trong VAT
        if(!empty($r['extend_vat']))
            $content .= $r['extend_vat'];

        //Bổ sung Referce hóa đơn
        if($r['payment_no'] > 1){
            $q2 = "SELECT DISTINCT
            IFNULL(j_paymentdetail.id, '') primaryid,
            j_paymentdetail.payment_amount payment_amount,
            IFNULL(j_paymentdetail.invoice_number, '') invoice_number,
            j_paymentdetail.payment_no payment_no
            FROM
            j_paymentdetail
            INNER JOIN
            j_payment l1 ON j_paymentdetail.payment_id = l1.id
            AND l1.deleted = 0
            WHERE
            (((l1.id = '{$r['payment_id']}')
            AND ((COALESCE(LENGTH(j_paymentdetail.invoice_number),
            0) > 0))
            AND (j_paymentdetail.status = 'Paid')
            AND (j_paymentdetail.payment_no < {$r['payment_no']})))
            AND j_paymentdetail.deleted = 0
            ORDER BY payment_no ASC";
            $rs2 = $GLOBALS['db']->query($q2);
            while($r2 = $GLOBALS['db']->fetchByAssoc($rs2)) {
                $description .= "\n Thu lần {$r2['payment_no']} - Số HD: {$r2['invoice_number']}";
            }
        }
        if(!empty($r['detail_description']))
            $description.= "\n - {$r['detail_description']}";
    }
    $objPHPExcel->getActiveSheet()->SetCellValue('C11', $content);
    $objPHPExcel->getActiveSheet()->SetCellValue('N11', format_number($r['before_discount'],0,0));
}



$_dicount = format_number($total_dicount,0,0);
if($_dicount == 0)
    $_dicount = '';

//Update Description Payment Detail


$objPHPExcel->getActiveSheet()->SetCellValue('N18', format_number($r['before_discount'],0,0));
$objPHPExcel->getActiveSheet()->SetCellValue('N19', $_dicount);
$objPHPExcel->getActiveSheet()->SetCellValue('N21', format_number($r['payment_amount'],0,0));
$objPHPExcel->getActiveSheet()->SetCellValue('N23', 'x');
$objPHPExcel->getActiveSheet()->SetCellValue('N25', format_number($r['payment_amount'],0,0));
$objPHPExcel->getActiveSheet()->SetCellValue('C27', $text);

//Staff children
if($count_sc > 0){ //Fix lại nội dung - By Lap nguyen 01/07/2016
    //    $objPHPExcel->getActiveSheet()->SetCellValue('I11', format_number($hours * $percent_sc / 100 ,2,2));
    $objPHPExcel->getActiveSheet()->SetCellValue('I11', "");
    //    $objPHPExcel->getActiveSheet()->SetCellValue('N11', format_number($r['before_discount'] * $percent_sc / 100,0,0));
    //    $objPHPExcel->getActiveSheet()->SetCellValue('N18', format_number($r['before_discount'] * $percent_sc / 100,0,0));
    //    $objPHPExcel->getActiveSheet()->SetCellValue('N19', '');
    $objPHPExcel->getActiveSheet()->SetCellValue('N11', format_number($r['payment_amount'],0,0));
    $objPHPExcel->getActiveSheet()->SetCellValue('N18', format_number($r['payment_amount'],0,0));
    $objPHPExcel->getActiveSheet()->SetCellValue('N19', '');
    $r['tuition_hours'] = $r['tuition_hours'] * $percent_sc / 100;
    $content = generateContent($objPHPExcel, $r);
    $objPHPExcel->getActiveSheet()->SetCellValue('C11', $content);
}

$GLOBALS['db']->query("UPDATE j_paymentdetail SET content_vat_invoice = '$content' WHERE id = '{$r['primaryid']}'");

$objPHPExcel->getActiveSheet()->SetCellValue('C30', html_entity_decode_utf8($description));

$objPHPExcel->getActiveSheet()->SetCellValue('M31', $current_user->name);

// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle($r['name']);

//Lock file
$objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
$objPHPExcel->getActiveSheet()->getProtection()->setSort(true);
$objPHPExcel->getActiveSheet()->getProtection()->setInsertRows(true);
$objPHPExcel->getActiveSheet()->getProtection()->setFormatCells(true);
$objPHPExcel->getActiveSheet()->getProtection()->setPassword('7779');

// Save Excel 2007 file
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$section = create_guid_section(6);
$file = 'custom/uploads/InvoiceExcel/VAT_Invoice_'.$r['l1_name'].'-'.$section.'.xlsx';

$objWriter->save($file);
//download to browser         /custom/uploads/default.xlsx
$src = 'https://view.officeapps.live.com/op/view.aspx?src='.$GLOBALS['sugar_config']['site_url'].'/'.$file;
header('Location: '.$file);

function generateContent($objPHPExcel, $r){
    switch ($r['payment_type']) {
        case "Book/Gift":
            $payment = BeanFactory::getBean('J_Payment', $r['payment_id']);
            $inventory = BeanFactory::getBean('J_Inventory',$payment->j_payment_j_inventory_1j_inventory_idb);
            $inventory->load_relationship('j_inventory_j_inventorydetail_1');
            $detail_inventory = $inventory->j_inventory_j_inventorydetail_1->getBeans();
            $i = 0;
            $row = array(11, 13, 14, 15, 16);
            foreach($detail_inventory as $detail){

                $book         = BeanFactory::getBean("ProductTemplates",$detail->producttemplates_j_inventorydetail_1producttemplates_ida);
                $objPHPExcel->getActiveSheet()->SetCellValue('A'.$row[$i], $i + 1);
                $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row[$i], $book->name);
                $objPHPExcel->getActiveSheet()->SetCellValue('F'.$row[$i], $GLOBALS['app_list_strings']['unit_ProductTemplates_list'][$book->unit]);
                $objPHPExcel->getActiveSheet()->SetCellValue('I'.$row[$i], $detail->quantity);
                $objPHPExcel->getActiveSheet()->SetCellValue('L'.$row[$i], format_number($detail->price,0,0));
                $objPHPExcel->getActiveSheet()->SetCellValue('N'.$row[$i], format_number($detail->amount,0,0));
                $i++;

            }
            break;
        case "Enrollment":
            $sql_get_class="SELECT DISTINCT
            l2.class_code l2_class_code,
            l2.kind_of_course kind_of_course
            FROM
            j_payment
            INNER JOIN j_studentsituations l1 ON j_payment.id = l1.payment_id
            AND l1.deleted = 0
            INNER JOIN j_class l2 ON l1.ju_class_id = l2.id
            AND l2.deleted = 0
            WHERE
            (((j_payment.id = '{$r['payment_id']}')))
            AND j_payment.deleted = 0";
            $result_get_class = $GLOBALS['db']->query($sql_get_class);
            $is_first = true;
            $count_outing = 0;
            $count_cambridge = 0;
            $content = "Thu học phí tiếng anh lớp: ";
            while($row = $GLOBALS['db']->fetchByAssoc($result_get_class)) {
                if(!empty($row['l2_class_code']))
                    if($is_first){
                        $content .= $row['l2_class_code'];
                        $is_first = false;
                    }  else
                        $content .= ",".$row['l2_class_code'];
                if($row['kind_of_course'] == 'Outing Trip')
                    $count_outing ++;
            }
            if($r['type'] == 'Deposit') $content .= ' (đặt cọc)';
            if($count_outing > 0) $content = 'Thu tiền ngoại khóa.';

            break;
        case "Deposit":
            $content = "Thu tiền đặt cọc khóa học tiếng anh.";
            if($r['kind_of_course'] == 'Outing Trip')
                $content = "Thu tiền ngoại khóa.";
            if($r['kind_of_course'] == 'Cambridge')
                $content = "Lệ phí thi Cambridge.";
            break;
        case "Cashholder":
            //            if($r['type'] == 'Deposit')
            //                $content = "Thu tiền đặt cọc khóa học tiếng anh ".format_number($r['tuition_hours'],2,2)." giờ.";
            //            else
            if ($r['team_type'] == 'Junior')
                $content = "Thu tiền khóa học tiếng anh ".format_number($r['tuition_hours'],2,2)." giờ.";
            else  $content = "Thu tiền khóa học tiếng anh.";
            break;
        case "Placement Test":
            $content = "Thu tiền kiểm tra trình độ.";
            break;
        case "Freeze Fee":
            $content = "Thu phí bảo lưu khóa học tiếng anh.";
            break;
        case "Travelling Fee":
        case "Tutor Package":
            $content = "Thu học phí tiếng anh.";
            break;
        default:
    }
    return $content;
}