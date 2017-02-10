<?php
    $js = <<<EOQ
    <script>
    $(function(){ $('#printPDFButton').hide(); });
    </script>
EOQ;
    echo $js;

    if(!isset($_POST['record']) || empty($_POST['record'])){
        die();
    }


    require_once 'custom/include/PHPExcel/Classes/PHPExcel.php';
    include("custom/include/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php");
    include("custom/include/PHPExcel/Classes/PHPExcel/IOFactory.php");

    $objPHPExcel = new PHPExcel();


    //Import Template
    $objReader = PHPExcel_IOFactory::createReader('Excel2007');
    $objPHPExcel = $objReader->load("custom/include/TemplateExcel/Bangkebanra.xlsx");

    // Set properties
    $objPHPExcel->getProperties()->setCreator("Apollo Center");
    $objPHPExcel->getProperties()->setLastModifiedBy("Apollo Center");
    $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
    $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
    $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX");

    //get Now DB Date
    global $timedate;

    $filter = $this->where;
    $parts = explode("AND", $filter);

    $beginDB = get_string_between($parts[0],"'","'");
    $begin = $timedate->to_display_date($beginDB,false);

    $endDB = get_string_between($parts[1],"'","'");
    $end = $timedate->to_display_date($endDB,false);


    $team_id = get_string_between($parts[2],"'","'");

    //get cell data
    $sql = "SELECT DISTINCT
    IFNULL(c_payments.id, '') primaryid,
    IFNULL(c_payments.name, '') c_payments_name,
    c_payments.payment_amount c_payments_payment_amount,
    IFNULL(c_payments.currency_id, '') C_PAYMENTS_PAYMENT_AMOF1CE92,
    IFNULL(c_payments.payment_type, '') c_payments_payment_type,
    IFNULL(l4.id, '') l4_id,
    l4.is_company l4_is_company,
    l4.tax_code l4_tax_code,
    l4.company_name l4_company_name,
    c_payments.payment_date c_payments_payment_date,
    IFNULL(c_payments.invoice_num, '') c_payments_invoice_num,
    IFNULL(c_payments.serial_num, '') c_payments_serial_num,
    IFNULL(l2.id, '') l2_id,
    CONCAT(IFNULL(l2.last_name, ''),
    ' ',
    IFNULL(l2.first_name, '')) l2_full_name,
    IFNULL(l3.id, '') l3_id,
    CONCAT(IFNULL(l3.last_name, ''),
    ' ',
    IFNULL(l3.first_name, '')) l3_full_name,
    IFNULL(l5.id, '') l5_id,
    IFNULL(l5.name, '') l5_name,
    IFNULL(l6.id, '') l6_id,
    IFNULL(l6.name, '') l6_name,
    l6.interval_package l6_interval_package,
    l6.kind_of_course l7_name
    FROM
    c_payments
    LEFT JOIN
    teams l1 ON c_payments.team_id = l1.id
    AND l1.deleted = 0
    LEFT JOIN
    leads_c_payments_1_c l2_1 ON c_payments.id = l2_1.leads_c_payments_1c_payments_idb
    AND l2_1.deleted = 0
    LEFT JOIN
    leads l2 ON l2.id = l2_1.leads_c_payments_1leads_ida
    AND l2.deleted = 0
    LEFT JOIN
    contacts_c_payments_1_c l3_1 ON c_payments.id = l3_1.contacts_c_payments_1c_payments_idb
    AND l3_1.deleted = 0
    LEFT JOIN
    contacts l3 ON l3.id = l3_1.contacts_c_payments_1contacts_ida
    AND l3.deleted = 0
    LEFT JOIN
    c_invoices_c_payments_1_c l4_1 ON c_payments.id = l4_1.c_invoices_c_payments_1c_payments_idb
    AND l4_1.deleted = 0
    LEFT JOIN
    c_invoices l4 ON l4.id = l4_1.c_invoices_c_payments_1c_invoices_ida
    AND l4.deleted = 0
    LEFT JOIN
    c_invoices_opportunities_1_c l5_1 ON l4.id = l5_1.c_invoices_opportunities_1c_invoices_ida
    AND l5_1.deleted = 0
    LEFT JOIN
    opportunities l5 ON l5.id = l5_1.c_invoices_opportunities_1opportunities_idb
    AND l5.deleted = 0
    LEFT JOIN
    c_packages_opportunities_1_c l6_1 ON l5.id = l6_1.c_packages_opportunities_1opportunities_idb
    AND l6_1.deleted = 0
    LEFT JOIN
    c_packages l6 ON l6.id = l6_1.c_packages_opportunities_1c_packages_ida
    AND l6.deleted = 0
    WHERE
    (((c_payments.payment_type IN ('Normal' , 'Deposit',
    'Extend Balance',
    'Placement Test',
    'Penalty',
    'FreeBalance'))
    AND (c_payments.payment_date >= '$beginDB'
    AND c_payments.payment_date <= '$endDB')
    AND (l1.id = '$team_id')
    AND ((COALESCE(LENGTH(c_payments.invoice_num), 0) > 0)) ))
    AND c_payments.deleted = 0
    ORDER BY c_payments.invoice_num ASC";

    $i = 17;
    $stt = 1;
    $total_DT = 0;
    $total_VAT = 0;
    $flag1 = true;
    $flag2 = true;
    $flag3 = true;
    $flag4 = true;

    $styleAlignLeft = array(
        'alignment' => array(
            'wrap'       => true,
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        ),
    );
    $styleAlignCenter = array(
        'alignment' => array(
            'wrap'       => true,
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ),
    );
    $styleBorder = array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
            )
        )
    );
    $objPHPExcel->getActiveSheet()->SetCellValue('B7', "Kỳ tính thuế: $begin - $end");

    //NONE VAT
    $rs = $GLOBALS['db']->query($sql);
    while($row = $GLOBALS['db']->fetchByAssoc($rs)){
        if($flag1){
            $objPHPExcel->getActiveSheet()->mergeCells('B'. $i .':H'. $i );
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$i, '1. Hàng hoá, dịch vụ không chịu thuế GTGT:');
            $objPHPExcel->getActiveSheet()->getStyle('B'.$i)->applyFromArray($styleAlignLeft);
            $flag1 = false;
            $totaldt1 = 0;
            $totalvat1 = 0;
            $i++;
        }

        $objPHPExcel->getActiveSheet()->setCellValueExplicit('B'.$i, $stt);
        $objPHPExcel->getActiveSheet()->setCellValueExplicit('C'.$i, $row['c_payments_serial_num']);
        $objPHPExcel->getActiveSheet()->setCellValueExplicit('D'.$i, $row['c_payments_invoice_num']);
        $objPHPExcel->getActiveSheet()->setCellValueExplicit('E'.$i, $GLOBALS['timedate']->to_display_date($row['c_payments_payment_date']));
        switch ($row['c_payments_payment_type']) {
            case 'Deposit':
            case 'Normal':
            case 'FreeBalance':
                if($row['l4_is_company'] == '1')
                    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row['l4_company_name']);
                else
                    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row['l3_full_name']);
                $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, (string)$row['l4_tax_code']);


                $pack_name = 'Thu học phí tiếng Anh (Khóa '.$row['l7_name'];
                if(!empty($row['l6_interval_package'])){
                    $int_thang = $row['l6_interval_package'] - 3;
                    $pack_name .= " $int_thang tháng)";
                }else
                    $pack_name .= ')';

                $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, $pack_name);
                break;
            case 'Extend Balance':
                $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row['l3_full_name']);
                $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, 'Mở rộng học phí');
                break;
            case 'Penalty':
                $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row['l3_full_name']);
                $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, 'Phí phạt nộp trễ');
                break;
            case 'Placement Test':
                $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row['l2_full_name']);
                $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, 'Phí làm bài test');
                break;
        }
        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, format_number($row['c_payments_payment_amount'],0,0));
        $objPHPExcel->getActiveSheet()->SetCellValue('J'.$i, format_number($row['c_payments_payment_amount'] * 0 ,0,0));
        $total_DT += $row['c_payments_payment_amount'];
        $total_VAT =$total_VAT + ($row['c_payments_payment_amount'] * 0) ;
        $totaldt1 += $row['c_payments_payment_amount'];
        $totalvat1 = $totalvat1 +  ($row['c_payments_payment_amount'] * 0 );
        $stt++;
        $i++;
    }
    if(!$flag1){
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$i, 'Tổng');
        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, format_number($totaldt1,0,0));
        $objPHPExcel->getActiveSheet()->SetCellValue('J'.$i, format_number($totalvat1,0,0));
        $objPHPExcel->getActiveSheet()->getStyle('B'.$i.':K'.$i)->getFont()->setBold(true);
        $i++;
    }
    //END: NONE VAT

    $objPHPExcel->getActiveSheet()->getStyle('B17:K'. ($i-1))->applyFromArray($styleBorder);
    $i = $i + 3;

    $date = $timedate->nowDbDate();
    $date = explode('-', $date);
    $day = $date[2];
    $month   = $date[1];
    $year  = $date[0];

    $objPHPExcel->getActiveSheet()->mergeCells('B'.$i.':F'.$i);
    $objPHPExcel->getActiveSheet()->mergeCells('B'. ($i+1) .':F'. ($i+1) );

    $objPHPExcel->getActiveSheet()->mergeCells('I'. ($i+3) .':K'. ($i+3) );
    $objPHPExcel->getActiveSheet()->mergeCells('I'. ($i+4) .':K'. ($i+4) );
    $objPHPExcel->getActiveSheet()->mergeCells('I'. ($i+5) .':K'. ($i+5) );
    $objPHPExcel->getActiveSheet()->mergeCells('I'. ($i+6) .':K'. ($i+6) );

    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$i, 'Tổng doanh thu hàng hóa, dịch vụ bán ra: '.format_number($total_DT,0,0));
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.($i+1), 'Tổng thuế GTGT của hàng hóa, dịch vụ bán ra: '.format_number($total_VAT,0,0));
    $objPHPExcel->getActiveSheet()->getStyle('B'.$i.':F'. ($i+1))->applyFromArray($styleAlignLeft);

    $objPHPExcel->getActiveSheet()->SetCellValue('I'.($i+3), 'Ngày '.$day.' tháng '.$month.' năm '. $year);
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.($i+4), 'NGƯỜI NỘP THUẾ hoặc');
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.($i+5), 'ĐẠI DIỆN HỢP PHÁP CỦA NGƯỜI NỘP THUẾ');
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.($i+6), ' Ký tên, đóng dấu (ghi rõ họ tên và chức vụ)');
    $objPHPExcel->getActiveSheet()->getStyle('I'.($i+3).':K'. ($i+6))->applyFromArray($styleAlignCenter);




    // Save Excel 2007 file
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save('custom/uploads/'. 'BanKeHD('.$timedate->to_db_date($begin) .'-'.$timedate->to_db_date($end).').xlsx');
    header('Location: custom/uploads/'. 'BanKeHD('.$timedate->to_db_date($begin).'-'.$timedate->to_db_date($end).').xlsx');

?>
