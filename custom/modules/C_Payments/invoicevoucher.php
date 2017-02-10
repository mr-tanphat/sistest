<?php

require_once 'custom/include/PHPExcel/Classes/PHPExcel.php';
include("custom/include/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php");  
include("custom/include/PHPExcel/Classes/PHPExcel/IOFactory.php");
include("custom/include/ConvertMoneyString/convert_number_to_string.php");
include("custom/include/_helper/convertNumbertToText.php");
global $timedate, $current_user; 
$type = $_POST['type_use'];
$payment_id = $_POST['record_use'];
if($type == 'saveprint_use' || $type == 'save_use'){
    $sql1 = "UPDATE c_payments SET invoice_num='{$_POST['invoice_num']}', serial_num='{$_POST['serial_num']}' WHERE id='$payment_id'";
    $GLOBALS['db']->query($sql1);

    if($type == 'save_use')
        header('Location: index.php?module=C_Payments&return_module=C_Payments&action=DetailView&record='.$payment_id.'');
}
if($type == 'saveprint_use' || $type == 'print_use'){

    $sql2 = "UPDATE c_payments SET printed='1' WHERE id='$payment_id'";
    $GLOBALS['db']->query($sql2);

    array_map('unlink', glob("custom/uploads/*"));
    $objPHPExcel = new PHPExcel();

    //Import Template
    $objReader = PHPExcel_IOFactory::createReader('Excel2007');

    $team_id_print = $current_user->team_id;
    switch ($team_id_print) {
        case 'bb96d785-f77a-b077-ba26-543305f988ed':
            $team_name = '-PH';
            break;
        case '4676d1e2-8d4e-5611-38e8-537da8e79494':
            $team_name = '-XT';
            break;
        case '86fbaa73-7941-e54b-acab-5358cbbb40df':
            $team_name = '-NT';
            break;
        case '608eaa10-a949-745e-e0a3-55262baaede0':
            $team_name = '-PNT';
            break;
        default:
        $team_name = '';
    }
    $objPHPExcel = $objReader->load("custom/include/TemplateExcel/InvoicesVoucher$team_name.xlsx");

    // Set properties
    $objPHPExcel->getProperties()->setCreator("Apollo Center");
    $objPHPExcel->getProperties()->setLastModifiedBy("Apollo Center");
    $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
    $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
    $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX");

    //Prepare
    $pay = BeanFactory::getBean('C_Payments',$payment_id);
    $date = $timedate->to_db_date($pay->payment_date,false);
    $date = explode('-', $date);
    $day = $date[2];
    $month   = $date[1];
    $year  = $date[0];
    $assign = $GLOBALS['db']->getOne("SELECT DISTINCT CONCAT(IFNULL(users.last_name,''),' ',IFNULL(users.first_name,'')) users_full_name FROM users WHERE (((users.id='{$pay->assigned_user_id}' )))");

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

    if($pay->payment_type != 'Placement Test'){
        $inv = BeanFactory::getBean('C_Invoices',$pay->c_invoices_c_payments_1c_invoices_ida);
        $opp =  BeanFactory::getBean('Opportunities',$inv->c_invoices_opportunities_1opportunities_idb);
        $qu1 = "SELECT DISTINCT IFNULL(l3.id,'') l3_id, IFNULL(l3.name,'') l3_name FROM c_payments INNER JOIN c_invoices_c_payments_1_c l1_1 ON c_payments.id=l1_1.c_invoices_c_payments_1c_payments_idb AND l1_1.deleted=0 INNER JOIN c_invoices l1 ON l1.id=l1_1.c_invoices_c_payments_1c_invoices_ida AND l1.deleted=0 INNER JOIN c_invoices_opportunities_1_c l2_1 ON l1.id=l2_1.c_invoices_opportunities_1c_invoices_ida AND l2_1.deleted=0 INNER JOIN opportunities l2 ON l2.id=l2_1.c_invoices_opportunities_1opportunities_idb AND l2.deleted=0 INNER JOIN c_packages_opportunities_1_c l3_1 ON l2.id=l3_1.c_packages_opportunities_1opportunities_idb AND l3_1.deleted=0 INNER JOIN c_packages l3 ON l3.id=l3_1.c_packages_opportunities_1c_packages_ida AND l3.deleted=0 WHERE (((c_payments.id='{$pay->id}' ))) AND c_payments.deleted=0";
        $pac_id = $GLOBALS['db']->getOne($qu1);
        $pk =  BeanFactory::getBean('C_Packages',$pac_id);


        $q1 = "SELECT first_name, last_name, primary_address_street, primary_address_city, primary_address_country FROM contacts WHERE id='".$inv->contacts_c_invoices_1contacts_ida."' AND deleted = 0";
        $rs1 = $GLOBALS['db']->query($q1);
        $row = $GLOBALS['db']->fetchByAssoc($rs1);


        $objPHPExcel->getActiveSheet()->SetCellValue('E2', $day);
        $objPHPExcel->getActiveSheet()->SetCellValue('I2', $month);
        $objPHPExcel->getActiveSheet()->SetCellValue('M2', $year);         


        if($inv->is_company){
            $objPHPExcel->getActiveSheet()->SetCellValue('D7', $inv->company_address);
            $objPHPExcel->getActiveSheet()->SetCellValue('D5', $inv->company_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('D6', $inv->tax_code); 
        }else{
            $objPHPExcel->getActiveSheet()->SetCellValue('F4', $row['last_name']." ".$row['first_name']);
            if(!empty($row['primary_address_city']))
                $city = ', '.$row['primary_address_city'];         
            if(!empty($row['primary_address_country']))
                $country = ', '.$row['primary_address_country'];
            $objPHPExcel->getActiveSheet()->SetCellValue('D7', $row['primary_address_street'].$city.$country);
        }
        $objPHPExcel->getActiveSheet()->SetCellValue('F9', $pmmt);
        $objPHPExcel->getActiveSheet()->SetCellValue('N9', ' '.str_replace('-','',$pay->card_number));

        if($pay->payment_type == 'Deposit'){
            $objPHPExcel->getActiveSheet()->SetCellValue('N11', format_number($pay->payment_amount,0,0));
            $objPHPExcel->getActiveSheet()->SetCellValue('N18', format_number($pay->payment_amount,0,0));
            $objPHPExcel->getActiveSheet()->SetCellValue('N19', " " );
            $objPHPExcel->getActiveSheet()->SetCellValue('N21', " ");
            $objPHPExcel->getActiveSheet()->SetCellValue('N23', " ");
            $objPHPExcel->getActiveSheet()->SetCellValue('N25', format_number($pay->payment_amount,0,0));    
            $int = new Integer();
            $text = $int->toText($pay->payment_amount);
            $objPHPExcel->getActiveSheet()->SetCellValue('C27', $text);
        }else{
            //Fix bug tạm - Xuất Invoice bị âm
            if($pay->payment_type == 'Normal' && $pay->payment_attempt != '1'){
                $count = 0;
                $count_des = 0;
                //Get Number Of Payment
                $sql7 = "SELECT DISTINCT
                IFNULL(c_payments.id, '') primaryid,
                IFNULL(c_payments.payment_type, '') payment_type
                FROM
                c_payments
                INNER JOIN
                c_invoices_c_payments_1_c l1_1 ON c_payments.id = l1_1.c_invoices_c_payments_1c_payments_idb
                AND l1_1.deleted = 0
                INNER JOIN
                c_invoices l1 ON l1.id = l1_1.c_invoices_c_payments_1c_invoices_ida
                AND l1.deleted = 0
                INNER JOIN
                c_invoices_opportunities_1_c l2_1 ON l1.id = l2_1.c_invoices_opportunities_1c_invoices_ida
                AND l2_1.deleted = 0
                INNER JOIN
                opportunities l2 ON l2.id = l2_1.c_invoices_opportunities_1opportunities_idb
                AND l2.deleted = 0
                WHERE
                (((l2.id = '".$opp->id."')))
                AND c_payments.deleted = 0";
                $rs7 = $GLOBALS['db']->query($sql7);
                while($row7 = $GLOBALS['db']->fetchByAssoc($rs7)){
                    $count++;
                    if($row7['payment_type'] == 'Deposit')
                        $count_des++;
                }
                if($count == 2 && $count_des == 1){
                    $pay->payment_attempt = '1';
                    $q5 = "UPDATE c_payments SET payment_attempt='1' WHERE id='{$pay->id}'";
                    $GLOBALS['db']->query($q5);
                }


            }
            $price_temp = 'payment_price_'.$pay->payment_attempt;
            if($pay->payment_attempt == '1'){
                // kiểm tra trước đó có deposit ko
                $q7 = "SELECT DISTINCT l2.payment_amount l2_payment_amount, IFNULL(l2.id,'') l2_id ,IFNULL( l2.currency_id,'') l2_payment_amount_currency FROM opportunities INNER JOIN c_invoices_opportunities_1_c l1_1 ON opportunities.id=l1_1.c_invoices_opportunities_1opportunities_idb AND l1_1.deleted=0 INNER JOIN c_invoices l1 ON l1.id=l1_1.c_invoices_opportunities_1c_invoices_ida AND l1.deleted=0 INNER JOIN c_invoices_c_payments_1_c l2_1 ON l1.id=l2_1.c_invoices_c_payments_1c_invoices_ida AND l2_1.deleted=0 INNER JOIN c_payments l2 ON l2.id=l2_1.c_invoices_c_payments_1c_payments_idb AND l2.deleted=0 WHERE (((opportunities.id='".$opp->id."' ) AND (l2.payment_type = 'Deposit' ))) AND opportunities.deleted=0";    
                $deposit = $GLOBALS['db']->getOne($q7);

                $objPHPExcel->getActiveSheet()->SetCellValue('N11', format_number($pk->$price_temp - $deposit,0,0));
                $objPHPExcel->getActiveSheet()->SetCellValue('N18', format_number($pk->$price_temp - $deposit,0,0));

                $total_discount = ($pk->$price_temp - $pay->payment_amount - $deposit) + $pay->discount_in_payment; 
                $after_discount = ($pk->$price_temp - $deposit) - $total_discount;

                $objPHPExcel->getActiveSheet()->SetCellValue('N19', format_number($total_discount,0,0) );
                $objPHPExcel->getActiveSheet()->SetCellValue('N21', format_number($after_discount,0,0) );
                $objPHPExcel->getActiveSheet()->SetCellValue('N23', " ");
                $objPHPExcel->getActiveSheet()->SetCellValue('N25', format_number($after_discount,0,0));
                $int = new Integer();
                $text = $int->toText($after_discount);
                $objPHPExcel->getActiveSheet()->SetCellValue('C27', $text);
            }else{
                // kiểm tra trước đó có tranfer moving ko
                $q7 = "SELECT DISTINCT IFNULL(SUM(l2.payment_amount), 0) amount FROM opportunities INNER JOIN c_invoices_opportunities_1_c l1_1 ON opportunities.id=l1_1.c_invoices_opportunities_1opportunities_idb AND l1_1.deleted=0 INNER JOIN c_invoices l1 ON l1.id=l1_1.c_invoices_opportunities_1c_invoices_ida AND l1.deleted=0 INNER JOIN c_invoices_c_payments_1_c l2_1 ON l1.id=l2_1.c_invoices_c_payments_1c_invoices_ida AND l2_1.deleted=0 INNER JOIN c_payments l2 ON l2.id=l2_1.c_invoices_c_payments_1c_payments_idb AND l2.deleted=0 WHERE (((opportunities.id='".$opp->id."' ) AND ((l2.payment_type = 'Transfer in' ) OR (l2.payment_type = 'Moving in' ) OR (l2.payment_type = 'FreeBalance' )))) AND opportunities.deleted=0";    
                $transfer_moving_amount = $GLOBALS['db']->getOne($q7);
                if($transfer_moving_amount > 0){
                    $q9 = "SELECT IFNULL(SUM(amount), 0) amount FROM opportunities WHERE id = '".$opp->id."'";
                    $opp_price = $GLOBALS['db']->getOne($q9);
                    $subtotal        = $opp_price - $transfer_moving_amount;
                    $total_discount  = $subtotal - $pay->payment_amount;

                    $objPHPExcel->getActiveSheet()->SetCellValue('N11', format_number($subtotal,0,0));
                    $objPHPExcel->getActiveSheet()->SetCellValue('N18', format_number($subtotal,0,0));

                    $after_discount = $pay->payment_amount;

                    $objPHPExcel->getActiveSheet()->SetCellValue('N19', format_number($total_discount,0,0) );
                    $objPHPExcel->getActiveSheet()->SetCellValue('N21', format_number($after_discount,0,0) );
                    $objPHPExcel->getActiveSheet()->SetCellValue('N23', " ");
                    $objPHPExcel->getActiveSheet()->SetCellValue('N25', format_number($after_discount,0,0));
                    $int = new Integer();
                    $text = $int->toText($after_discount);
                    $objPHPExcel->getActiveSheet()->SetCellValue('C27', $text);   
                }else{

                    $objPHPExcel->getActiveSheet()->SetCellValue('N11', format_number($pk->$price_temp,0,0));
                    $objPHPExcel->getActiveSheet()->SetCellValue('N18', format_number($pk->$price_temp,0,0));

                    $total_discount = ($pk->$price_temp - $pay->payment_amount) + $pay->discount_in_payment; 
                    $after_discount = $pk->$price_temp  - $total_discount;

                    $objPHPExcel->getActiveSheet()->SetCellValue('N19', format_number($total_discount,0,0) );
                    $objPHPExcel->getActiveSheet()->SetCellValue('N21', format_number($after_discount,0,0) );
                    $objPHPExcel->getActiveSheet()->SetCellValue('N23', " ");
                    $objPHPExcel->getActiveSheet()->SetCellValue('N25', format_number($after_discount,0,0));
                    $int = new Integer();
                    $text = $int->toText($after_discount);
                    $objPHPExcel->getActiveSheet()->SetCellValue('C27', $text);  
                }

            }
        }
        $str_deposit = "";
        if($pay->payment_type == 'Deposit')
            $str_deposit = " (Đặt cọc) ";
        if($pay->id = '82836456-3b92-0b6a-d25d-5774f510079e')
            $str_deposit = "";
        if(!empty($pk->kind_of_course)){
            if($pk->package_type != 'Premium'){
                $pack_name = 'Thu học phí tiếng Anh (Khóa '.$pk->kind_of_course;
                if(!empty($pk->interval_package)){
                    $int_thang = $pk->interval_package - 3;
                    $pack_name .= " $int_thang tháng)".$str_deposit;    
                }else
                    $pack_name .= ')'.$str_deposit;  
            }else{
                $pack_name = 'Thu học phí tiếng Anh (Khóa '.$pk->name.')'.$str_deposit; 
            }   
        }else{
            $pack_name = 'Đặt cọc';
        }

        $objPHPExcel->getActiveSheet()->SetCellValue('C11', $pack_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('C30', "Ghi chú: " . $pay->description);
        $objPHPExcel->getActiveSheet()->SetCellValue('M31', $assign);
    }else{
        $q3 = "SELECT first_name, last_name, primary_address_street, primary_address_city, primary_address_country FROM leads WHERE id='".$pay->leads_c_payments_1leads_ida."' AND deleted = 0";
        $rs3 = $GLOBALS['db']->query($q3);
        $row = $GLOBALS['db']->fetchByAssoc($rs3);

        $objPHPExcel->getActiveSheet()->SetCellValue('E2', $day);
        $objPHPExcel->getActiveSheet()->SetCellValue('I2', $month);
        $objPHPExcel->getActiveSheet()->SetCellValue('M2', $year);
        $objPHPExcel->getActiveSheet()->SetCellValue('F4', $row['last_name']." ".$row['first_name']);
        if(!empty($row['primary_address_city']))
            $city = ', '.$row['primary_address_city'];         
        if(!empty($row['primary_address_country']))
            $country = ', '.$row['primary_address_country'];
        $objPHPExcel->getActiveSheet()->SetCellValue('D7', $row['primary_address_street'].$city.$country);
        $objPHPExcel->getActiveSheet()->SetCellValue('F9', $pmmt);
        $objPHPExcel->getActiveSheet()->SetCellValue('N9', ' '.str_replace('-','',$pay->card_number));
        $objPHPExcel->getActiveSheet()->SetCellValue('N11', format_number($pay->payment_amount,0,0));
        $objPHPExcel->getActiveSheet()->SetCellValue('C11', 'Thu phí Placement Test');
        $objPHPExcel->getActiveSheet()->SetCellValue('N18', format_number($pay->payment_amount,0,0));
        $objPHPExcel->getActiveSheet()->SetCellValue('N19', " ");
        $objPHPExcel->getActiveSheet()->SetCellValue('N21', " ");
        $objPHPExcel->getActiveSheet()->SetCellValue('N23', " ");
        $objPHPExcel->getActiveSheet()->SetCellValue('N25', format_number($pay->payment_amount,0,0));
        $int = new Integer();
        $text = $int->toText($pay->payment_amount);
        $objPHPExcel->getActiveSheet()->SetCellValue('C27', $text);
        $objPHPExcel->getActiveSheet()->SetCellValue('C30', "Ghi chú: " . $pay->description);
        $objPHPExcel->getActiveSheet()->SetCellValue('M31', $assign);
        //         $objPHPExcel->getActiveSheet()->SetCellValue('M31', $pay->assigned_user_name);

    }


    // Rename sheet
    $objPHPExcel->getActiveSheet()->setTitle($pay->name);

    //Lock file
    //        $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
    //        $objPHPExcel->getActiveSheet()->getProtection()->setSort(true);
    //        $objPHPExcel->getActiveSheet()->getProtection()->setInsertRows(true);
    //        $objPHPExcel->getActiveSheet()->getProtection()->setFormatCells(true);

    // Save Excel 2007 file
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save('custom/uploads/'. 'Invoice Voucher ('. $pay->name .').xlsx');
    header('Location: custom/uploads/'. 'Invoice Voucher ('. $pay->name .').xlsx');   
}
//Lưu ý: Không nên save file excel trong thư mục có từ khóa upload nếu không sẽ không hiển thị popup save file.
//ví dụ: custom/upload/Payment.xlsx, hay upload/Payment.xlsx, hay custom/modules/C_Payments/upload/Payment.xlsx....
?>
