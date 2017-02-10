<?php

    require_once 'custom/include/PHPExcel/Classes/PHPExcel.php';
    include("custom/include/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php");  
    include("custom/include/PHPExcel/Classes/PHPExcel/IOFactory.php");

    $type = $_POST['type_use'];
    $inv_id = $_POST['record_use_2']; 

    if($type == 'saveprint_use' || $type == 'save_use'){
        $sql1 = "UPDATE c_invoices SET invoice_num='{$_POST['invoice_num']}', serial_num='{$_POST['serial_num']}' WHERE id='$inv_id'";
        $GLOBALS['db']->query($sql1);

        if($type == 'save_use')
            header('Location: index.php?module=C_Invoices&return_module=C_Invoices&action=DetailView&record='.$inv_id.'');
    }

    if($type == 'saveprint_use' || $type == 'print_use'){
        $sql2 = "UPDATE c_invoices SET printed='1' WHERE id='$inv_id'";
        $GLOBALS['db']->query($sql2);

        $objPHPExcel = new PHPExcel();

        //Import Template
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objPHPExcel = $objReader->load("custom/include/TemplateExcel/InvoicesVoucher.xlsx");

        // Set properties
        $objPHPExcel->getProperties()->setCreator("Apollo Center");
        $objPHPExcel->getProperties()->setLastModifiedBy("Apollo Center");
        $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
        $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
        $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX");

        //Add $inv
        $inv = BeanFactory::getBean('C_Invoices',$inv_id);
        $opp =  BeanFactory::getBean('Opportunities',$inv->c_invoices_opportunities_1opportunities_idb);
        $pk =  BeanFactory::getBean('C_Packages',$opp->c_packages_opportunities_1c_packages_ida);

        $sql_query = "SELECT first_name, last_name, primary_address_street, primary_address_city, primary_address_country FROM contacts WHERE id='".$inv->contacts_c_invoices_1contacts_ida."' AND deleted = '0';";

        $result = $GLOBALS['db']->query($sql_query);
        $row = $GLOBALS['db']->fetchByAssoc($result);

        $date = $GLOBALS['timedate']->to_db_date($inv->invoice_date,false);
        $date = explode('-', $date);
        $day = $date[2];
        $month   = $date[1];
        $year  = $date[0];

        //Calculated amount in invoice
        $amount = $opp->amount;
        $tax = $opp->tax_amount;
        $discount = $opp->discount_amount;
        $amount_inv = $opp->total_in_invoice; 

        //Currency - Payment method
        $sql_pay = "SELECT 
        c_payments.payment_method
        FROM
        c_payments
        LEFT JOIN
        c_invoices_c_payments_1_c ON c_payments.id = c_invoices_c_payments_1_c.c_invoices_c_payments_1c_payments_idb
        LEFT JOIN
        c_invoices ON c_invoices_c_payments_1_c.c_invoices_c_payments_1c_invoices_ida = c_invoices.id
        WHERE
        c_payments.deleted = 0
        AND c_invoices_c_payments_1_c.deleted = 0
        AND c_invoices.id = '".$inv->id."'
        AND payment_attempt = 1";

        $result_pay = $GLOBALS['db']->query($sql_pay);

        while($row_pay = $GLOBALS['db']->fetchByAssoc($result_pay))
        {
            $payment_method = $row_pay['payment_method'];
        }
        $currency = new Currency();
        $currency->retrieve($inv->currency_id);
        switch ($payment_method) {
            case "Cash":
                $invmt="TM";
                break;
            case "CreditDebitCard":
                $invmt="Thẻ";
                break;
            case "BankTranfer":
                $invmt="NH";
                break;
            case "Loan":
                $invmt="VT";
                break;
        }

        //Write $inv
        $objPHPExcel->getActiveSheet()->SetCellValue('E2', $day);
        $objPHPExcel->getActiveSheet()->SetCellValue('I2', $month);
        $objPHPExcel->getActiveSheet()->SetCellValue('M2', $year);


        if($inv->is_company){
            $objPHPExcel->getActiveSheet()->SetCellValue('D5', $inv->company_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('D7', $inv->company_address);
            $objPHPExcel->getActiveSheet()->SetCellValue('D6', $inv->tax_code); 
        }else{
            $objPHPExcel->getActiveSheet()->SetCellValue('F4', $row['last_name']." ".$row['first_name']);
            if(!empty($row['primary_address_city']))
                $city = ', '.$row['primary_address_city'];         
            if(!empty($row['primary_address_country']))
                $country = ', '.$row['primary_address_country'];
            $objPHPExcel->getActiveSheet()->SetCellValue('D7', $row['primary_address_street'].$city.$country);
        }
        $objPHPExcel->getActiveSheet()->SetCellValue('F9', $invmt);

        $pack_name = 'Thu học phí tiếng Anh (Khóa '.$pk->c_programs_c_packages_1_name;
        if(!empty($pk->interval_package))
            $pack_name .= ' '.$pk->interval_package.' tháng)';
        else
            $pack_name .= ')';

        $objPHPExcel->getActiveSheet()->SetCellValue('C11', $pack_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('N11', format_number($amount,0,0));
        $objPHPExcel->getActiveSheet()->SetCellValue('N18', format_number($amount,0,0));
        $objPHPExcel->getActiveSheet()->SetCellValue('N19', $discount == 0 ? '': format_number($discount,0,0));
        $objPHPExcel->getActiveSheet()->SetCellValue('N21', $amount - $discount == 0 ? '': format_number($amount - $discount,0,0 ));
        $objPHPExcel->getActiveSheet()->SetCellValue('N23', $tax == 0 ? '': format_number($tax,0,0));
        $objPHPExcel->getActiveSheet()->SetCellValue('N25', $amount_inv == 0 ? '': format_number($amount_inv,0,0) . " ");
        $objPHPExcel->getActiveSheet()->SetCellValue('C27', $inv->amount_in_words.' chẵn');
        $objPHPExcel->getActiveSheet()->SetCellValue('C30', "Ghi chú: " . $inv->description);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('M31', $inv->assigned_user_name);

        // Rename sheet
        $objPHPExcel->getActiveSheet()->setTitle($inv->name);

        $objPHPExcel->getActiveSheet()->mergeCells('C30:Q30');
        $objPHPExcel->getActiveSheet()->getStyle('C30')->getAlignment()->setWrapText(true);


        //Lock file
        $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
        $objPHPExcel->getActiveSheet()->getProtection()->setSort(true);
        $objPHPExcel->getActiveSheet()->getProtection()->setInsertRows(true);
        $objPHPExcel->getActiveSheet()->getProtection()->setFormatCells(true);

        // Save Excel 2007 file
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('custom/uploads/'. 'Invoice Voucher ('. $inv->name .').xlsx');
        header('Location: custom/uploads/'. 'Invoice Voucher ('. $inv->name .').xlsx');
    }
    //Lưu ý: Không nên save file excel trong thư mục có từ khóa upload nếu không sẽ không hiển thị popup save file.
    //ví dụ: custom/upload/Payment.xlsx, hay upload/Payment.xlsx, hay custom/modules/C_Payments/upload/Payment.xlsx....
?>
