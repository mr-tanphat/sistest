<?php

    require_once 'custom/include/PHPExcel/Classes/PHPExcel.php';
    require_once("custom/include/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php");  
    require_once("custom/include/PHPExcel/Classes/PHPExcel/IOFactory.php");  
    require_once("custom/include/ConvertMoneyString/convert_number_to_string.php");
    
    $objPHPExcel = new PHPExcel();

    //Import Template
    $objReader = PHPExcel_IOFactory::createReader('Excel2007');
    $objPHPExcel = $objReader->load("custom/include/TemplateExcel/ReceiptVoucher.xlsx");

    // Set properties
    $objPHPExcel->getProperties()->setCreator("Apollo Center");
    $objPHPExcel->getProperties()->setLastModifiedBy("Apollo Center");
    $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
    $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
    $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX");


    //Add data
    $pay = BeanFactory::getBean('C_Payments',$_REQUEST['record']);
    $pay->load_relationship('contacts_c_payments_1');
    $ct = reset($pay->contacts_c_payments_1->getBeans());

    $date = $GLOBALS['timedate']->to_db_date($pay->date_modified,false);
    $date = explode('-', $date);
    $day = $date[2];
    $month   = $date[1];
    $year  = $date[0];

    //Write data
    //    $objPHPExcel->getActiveSheet()->SetCellValue('F2', $pay->name);
    //    $objPHPExcel->getActiveSheet()->SetCellValue('F37', $pay->name);
    $objPHPExcel->getActiveSheet()->SetCellValue('C7', "Ngày ".$day."  tháng ".$month."  năm ".$year);
    $objPHPExcel->getActiveSheet()->SetCellValue('C44', "Ngày ".$day."  tháng ".$month."  năm ".$year);

    if($pay->contacts_c_payments_1_name != ""){
        $objPHPExcel->getActiveSheet()->SetCellValue('C10', $ct->last_name.' '.$ct->first_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('C47', $ct->last_name.' '.$ct->first_name);
    } else {
        $objPHPExcel->getActiveSheet()->SetCellValue('C10', $pay->accounts_c_payments_1_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('C47', $pay->accounts_c_payments_1_name);
    }
    //Currency - Payment method
    $currency = new Currency();
    $currency->retrieve($pay->currency_id);
    switch ($pay->payment_method) {
            case "Cash":
                $pmmt="TM";
                break;
            case "CreditDebitCard":
            case "BankTranfer":
            case "Loan":
            case "Other":
                $pmmt="CK";
                break;
        }
    $city = '';
    if(!empty($ct->primary_address_city)){
        $city = ' ,'.$ct->primary_address_city;  
    }

    $inv = BeanFactory::getBean('C_Invoices', $pay->c_invoices_c_payments_1c_invoices_ida);
    $qu1 = "SELECT DISTINCT IFNULL(l3.name,'') l3_name, IFNULL(l3.id,'') l3_id FROM c_payments INNER JOIN c_invoices_c_payments_1_c l1_1 ON c_payments.id=l1_1.c_invoices_c_payments_1c_payments_idb AND l1_1.deleted=0 INNER JOIN c_invoices l1 ON l1.id=l1_1.c_invoices_c_payments_1c_invoices_ida AND l1.deleted=0 INNER JOIN c_invoices_opportunities_1_c l2_1 ON l1.id=l2_1.c_invoices_opportunities_1c_invoices_ida AND l2_1.deleted=0 INNER JOIN opportunities l2 ON l2.id=l2_1.c_invoices_opportunities_1opportunities_idb AND l2.deleted=0 INNER JOIN c_packages_opportunities_1_c l3_1 ON l2.id=l3_1.c_packages_opportunities_1opportunities_idb AND l3_1.deleted=0 INNER JOIN c_packages l3 ON l3.id=l3_1.c_packages_opportunities_1c_packages_ida AND l3.deleted=0 WHERE (((c_payments.id='{$pay->id}' ))) AND c_payments.deleted=0";
    $pac_name = $GLOBALS['db']->getOne($qu1);

    $objPHPExcel->getActiveSheet()->SetCellValue('C13', $ct->primary_address_street.$city);
    $objPHPExcel->getActiveSheet()->SetCellValue('C50', $ct->primary_address_street.$city);
    $objPHPExcel->getActiveSheet()->SetCellValue('C16', "Thu học phí tiếng Anh ( {$pac_name} )");
    $objPHPExcel->getActiveSheet()->SetCellValue('C53', "Thu học phí tiếng Anh ( {$pac_name} )");
    $objPHPExcel->getActiveSheet()->SetCellValue('C19', format_number($pay->payment_amount,0,0));
    $objPHPExcel->getActiveSheet()->SetCellValue('C56', format_number($pay->payment_amount,0,0));
    $int = new Integer();
    $text = $int->toText($pay->payment_amount);
    $objPHPExcel->getActiveSheet()->SetCellValue('C22', $text);
    $objPHPExcel->getActiveSheet()->SetCellValue('C59', $text);
    
    $objPHPExcel->getActiveSheet()->SetCellValue('E25', $pmmt);
    $objPHPExcel->getActiveSheet()->SetCellValue('E62', $pmmt);

    $objPHPExcel->getActiveSheet()->SetCellValue('C30', $pay->assigned_user_name);
    $objPHPExcel->getActiveSheet()->SetCellValue('C67', $pay->assigned_user_name);

    if($pay->contacts_c_payments_1_name != ""){
        $objPHPExcel->getActiveSheet()->SetCellValue('E30', $ct->last_name.' '.$ct->first_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('E67', $ct->last_name.' '.$ct->first_name);
    } else {
        $objPHPExcel->getActiveSheet()->SetCellValue('E30', $pay->accounts_c_payments_1_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('E67', $pay->accounts_c_payments_1_name);
    }

    // Rename sheet
    $objPHPExcel->getActiveSheet()->setTitle($pay->name);
    
    //Lock file
    $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
    $objPHPExcel->getActiveSheet()->getProtection()->setSort(true);
    $objPHPExcel->getActiveSheet()->getProtection()->setInsertRows(true);
    $objPHPExcel->getActiveSheet()->getProtection()->setFormatCells(true);

    // Save Excel 2007 file
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save('custom/uploads/'. 'Receipt Voucher ('. $pay->name .').xlsx');
    header('Location: custom/uploads/'. 'Receipt Voucher ('. $pay->name .').xlsx');

?>
