<?php

require_once 'custom/include/PHPExcel/Classes/PHPExcel.php';
include("custom/include/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php");  
include("custom/include/PHPExcel/Classes/PHPExcel/IOFactory.php");  

$objPHPExcel = new PHPExcel();

//Import Template
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load("custom/include/TemplateExcel/FormRefund.xlsx");

// Set properties
$objPHPExcel->getProperties()->setCreator("Apollo Center");
$objPHPExcel->getProperties()->setLastModifiedBy("Apollo Center");
$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setDescription("Form Refund Office 2007 XLSX");


//Add data
$ref = BeanFactory::getBean('C_Refunds',$_REQUEST['record']);

$contact = BeanFactory::getBean('Contacts',$ref->contacts_c_refunds_1contacts_ida);
$contact->load_relationship('c_classes_contacts_1');
$rel_contact_class = $contact->c_classes_contacts_1->getBeans();

$contact->load_relationship('opportunities');
$rel_contact_enr = $contact->opportunities->getBeans();

$contact->load_relationship('contacts_c_payments_1');
$rel_contact_payment = $contact->contacts_c_payments_1->getBeans();

$now = strtotime($GLOBALS['timedate']->nowDbDate());


//Write data
$objPHPExcel->getActiveSheet()->SetCellValue('J7', $ref->refund_date);
$objPHPExcel->getActiveSheet()->SetCellValue('D10', $contact->contact_id);
$objPHPExcel->getActiveSheet()->SetCellValue('I10', $contact->name);
$objPHPExcel->getActiveSheet()->SetCellValue('D12', $contact->primary_address_street);
$objPHPExcel->getActiveSheet()->SetCellValue('I12', $contact->phone_mobile);

foreach ($rel_contact_class as $class){
	$end_date = strtotime($GLOBALS['timedate']->to_db_date($class->end_date));
	if($now <= $end_date){
		$objPHPExcel->getActiveSheet()->SetCellValue('D14', $class->name);
	}
}

$objPHPExcel->getActiveSheet()->SetCellValue('I14', $contact->current_stage.' - '.$contact->current_level);
$objPHPExcel->getActiveSheet()->SetCellValue('D16', $ref->refund_date);

//Get Amount of paid lessons left

$sql = "SELECT DISTINCT
SUM(c_payments.payment_amount) TOTAL
FROM
c_payments
INNER JOIN
contacts_c_payments_1_c l1_1 ON c_payments.id = l1_1.contacts_c_payments_1c_payments_idb
AND l1_1.deleted = 0
INNER JOIN
contacts l1 ON l1.id = l1_1.contacts_c_payments_1contacts_ida
AND l1.deleted = 0
WHERE
(((l1.id = '{$ref->contacts_c_refunds_1contacts_ida}')
AND (c_payments.status = 'Paid')
AND (c_payments.payment_type NOT IN ('Moving in' , 'Transfer in', 'FreeBalance'))))
AND c_payments.deleted = 0";
$total_amount = $GLOBALS['db']->getOne($sql);
$balance_amount = $contact->free_balance;
$studied_amount = $total_amount - $balance_amount;

$objPHPExcel->getActiveSheet()->SetCellValue('E20', format_number($total_amount).' '.$currency->iso4217);
$objPHPExcel->getActiveSheet()->SetCellValue('E22', format_number($studied_amount).' '.$currency->iso4217);
$objPHPExcel->getActiveSheet()->SetCellValue('E24', format_number($balance_amount).' '.$currency->iso4217);
$objPHPExcel->getActiveSheet()->SetCellValue('J20', format_number($ref->refund_amount).' '.$currency->iso4217);
$objPHPExcel->getActiveSheet()->SetCellValue('J24', format_number($ref->refund_amount).' '.$currency->iso4217);

$total_trasfer = 0;
foreach ($rel_contact_payment as $payment){
	if($payment->payment_type == "Transfer in"){
		$total_trasfer = $total_trasfer + $payment->payment_amount;
	}
}

$objPHPExcel->getActiveSheet()->SetCellValue('E26', format_number($total_trasfer).' '.$currency->iso4217);
$objPHPExcel->getActiveSheet()->SetCellValue('E28', format_number($ref->refund_amount).' '.$currency->iso4217);
$objPHPExcel->getActiveSheet()->SetCellValue('H27', $ref->amount_in_words);
$objPHPExcel->getActiveSheet()->SetCellValue('H30', $ref->description);


// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle($ref->name);

// Save Excel 2007 file
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$objWriter->save('custom/uploads/'. $ref->name .'.xlsx');
header('Location: custom/uploads/'. $ref->name .'.xlsx');

//Lưu ý: Không nên save file excel trong thư mục có từ khóa upload nếu không sẽ không hiển thị popup save file.
//ví dụ: custom/upload/Payment.xlsx, hay upload/Payment.xlsx, hay custom/modules/C_Payments/upload/Payment.xlsx....
?>
