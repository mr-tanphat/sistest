<?php
    require_once 'custom/include/PHPExcel/Classes/PHPExcel.php';
    require_once("custom/include/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php");
    require_once("custom/include/PHPExcel/Classes/PHPExcel/IOFactory.php");
    require_once("custom/include/ConvertMoneyString/convert_number_to_string.php");

    $objPHPExcel = new PHPExcel();

    //Import Template
    $objReader = PHPExcel_IOFactory::createReader('Excel2007');
    $objPHPExcel = $objReader->load("custom/include/TemplateExcel/MaterialDeliveryNote.xlsx");

    // Set properties
    $objPHPExcel->getProperties()->setCreator("Apollo Center");
    $objPHPExcel->getProperties()->setLastModifiedBy("Apollo Center");
    $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
    $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
    $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX");

    //Add data
    $details = BeanFactory::getBean('J_Inventory',$_REQUEST['record']);

    //get to list
    if($details->to_inventory_list == "Student"){
        $payment = BeanFactory::getBean("J_Payment",$this->bean->j_payment_j_inventory_1j_payment_ida);
        $to = BeanFactory::getBean("Contacts",$payment->contacts_j_payment_1contacts_ida);
    }
    elseif($details->to_inventory_list == "Teacher/Library"){
        $to = BeanFactory::getBean("Accounts",$details->to_teacher_id);
    }
    elseif($details->to_inventory_list == "Corp/BEP"){
        $to = BeanFactory::getBean("Accounts",$details->to_corp_id);
    }
    elseif($details->to_inventory_list == "Center"){
        $to = BeanFactory::getBean("Teams",$details->to_team_id);
    }
    $from = BeanFactory::getBean("Teams",$details->from_team_id);
    $objPHPExcel->getActiveSheet()->SetCellValue('C8', $to->name);
    $objPHPExcel->getActiveSheet()->SetCellValue('C10', $from->name);
    $objPHPExcel->getActiveSheet()->SetCellValue('I9', $details->date_create);
    $objPHPExcel->getActiveSheet()->SetCellValue('I8', $details->name);
    $objPHPExcel->getActiveSheet()->SetCellValue('C9', $details->request_no);
    $objPHPExcel->getActiveSheet()->SetCellValue('F28', $details->total_quantity);
    $objPHPExcel->getActiveSheet()->SetCellValue('F28', $details->total_quantity);
    $objPHPExcel->getActiveSheet()->SetCellValue('H28', $details->total_amount);

    //get detail inventory
    $inventory = BeanFactory::getBean('J_Inventory',$details->id);
    $inventory->load_relationship('j_inventory_j_inventorydetail_1');
    $detail_inventory = $inventory->j_inventory_j_inventorydetail_1->getBeans();

    $i = 0;
    foreach($detail_inventory as $detail){
        $row = 14 + $i;
        $book = BeanFactory::getBean("ProductTemplates",$detail->producttemplates_j_inventorydetail_1producttemplates_ida);
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$row, $i+1);
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, $book->code);
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row, $book->name);
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, $book->unit);
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, $detail->quantity);
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$row, $detail->price);
        $objPHPExcel->getActiveSheet()->SetCellValue('H'.$row, $detail->amount);
        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$row, $detail->remark);
        $i++;
    }


    //Rename sheet
    $objPHPExcel->getActiveSheet()->setTitle($details->type.$details->name);

    // Lock file
    $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
    $objPHPExcel->getActiveSheet()->getProtection()->setSort(true);
    $objPHPExcel->getActiveSheet()->getProtection()->setInsertRows(true);
    $objPHPExcel->getActiveSheet()->getProtection()->setFormatCells(true);

    // Save Excel 2007 file
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save('custom/uploads/'. 'Inventory ('.$details->type.$details->name.').xlsx');
    //download to browser
    $file = 'custom/uploads/'. 'Inventory ('.$details->type.$details->name.').xlsx';

    if (file_exists($file)) {
        ob_end_clean();
        header('Content-Description: File Transfer');
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
?>
