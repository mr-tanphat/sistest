<?php
    class StudentsCron{
        function create_pdf_st()
        {
            require_once("custom/include/tcpdf/tcpdf.php");
            require_once("modules/Calendar/CalendarUtils.php"); 
            require_once('include/TimeDate.php');

            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('ApolloCRM');
            $pdf->SetTitle('PDF_Lichday');
            $pdf->SetSubject('PDF Lichday');
            $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

            // set default header data
            global $timedate;
            $class_id =  $_POST["record"];
            $sql = "SELECT CONCAT(name,' - Type: ', type) as name FROM c_classes WHERE id = '{$class_id}'"; 
            $class_name = $GLOBALS['db']->getOne($sql);
            //$ngay = date('H:i:s d/m/Y',strtotime($timedate->to_display_date_time($timedate->getNow()->date)));
            $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Timetable - Class '.$class_name,"ApolloCRM - APOLLO English\nWHERE THE BEST BECOME BETTER");;

            // set header and footer fonts
            $pdf->setHeaderFont(Array('freesans', '', '10'));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            // set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // ---------------------------------------------------------
            // set font
            $pdf->SetFont('freesans',''); 

            // add a page
            $pdf->AddPage('L', 'A4');

            // column titles
            $header = array(translate('LBL_NO'),translate('LBL_DAY'), translate('LBL_DATE'), translate('LBL_START_TIME'), translate('LBL_END_TIME'), translate('LBL_ROOM'), translate('LBL_TEACHER'));
            // print colored table
            $pdf->SetFillColor(255, 0, 0);
            $pdf->SetTextColor(255);
            $pdf->SetDrawColor(128, 0, 0);
            $pdf->SetLineWidth(0.3);
            // Header
            $w = array(30, 35, 35, 35,35, 40, 58);
            $num_headers = count($header);
            for($i = 0; $i < $num_headers; ++$i) {
                $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
            }
            $pdf->Ln();
            // Color and font restoration
            $pdf->SetFillColor(224, 235, 255);
            $pdf->SetTextColor(0);
            // Data
            $fill = 0;
            $stt = 1;
            global $timedate; 
            $sql = "SELECT name, teacher_id, room_id, id, type, date_start, date_end
            FROM meetings
            WHERE class_id = '{$class_id}' AND deleted = 0
            ORDER BY date_start";
            $rs = $GLOBALS['db']->query($sql);
            while($row = $GLOBALS['db']->fetchByAssoc($rs)){
                $pdf->Cell($w[0], 6, number_format($stt), 'LR', 0, 'C', $fill);
                //get day of week
                $day_of_week_temp =  $GLOBALS['timedate']->to_display_date($row['date_start']);
                $day_of_week = $GLOBALS['timedate']->to_db_date($day_of_week_temp, false);
                //end
                $pdf->Cell($w[1], 6, date('l', strtotime($day_of_week)), 'LR', 0, 'L', $fill);
                $pdf->Cell($w[2], 6, $GLOBALS['timedate']->to_display_date($row['date_start']), 'LR', 0, 'C', $fill, '', 1);
                $pdf->Cell($w[3], 6, $GLOBALS['timedate']->to_display_time($row['date_start']), 'LR', 0, 'C', $fill);
                $pdf->Cell($w[4], 6, $GLOBALS['timedate']->to_display_time($row['date_end']), 'LR', 0, 'C', $fill);
                $sql1 = "Select name from c_rooms where id = '{$row['room_id']}' and deleted = 0";
                $rs1 = $GLOBALS['db']->query($sql1);
                while($row1 = $GLOBALS['db']->fetchByAssoc($rs1)){
                    $pdf->Cell($w[5], 6, $row1['name'], 'LR', 0, 'L', $fill,'',1);
                }
                $sql2 = "select CONCAT(first_name, ' ', last_name) as name from c_teachers where id = '{$row['teacher_id']}' and deleted = 0";
                $rs2 = $GLOBALS['db']->query($sql2);
                while($row2 = $GLOBALS['db']->fetchByAssoc($rs2)){
                    $pdf->Cell($w[6], 6, $row2['name'], 'LR', 0, 'L', $fill,'',1);
                }
                $pdf->Ln();
                $fill=!$fill;
                $stt++;
            }
            $pdf->Cell(array_sum($w), 0, '', 'T');
            // close and output PDF document
            $fileNL = "custom/uploads/pdf/"."Timetable_".$class_id.".pdf";
            // $fileNL = "Timetable_".vn_str_filter($class->name).".pdf";           
            $pdf->Output($fileNL, 'F'); 
        }
        function send_mail_st(){
            require_once("include/SugarPHPMailer.php");
            require_once("include/workflow/alert_utils.php");
            require_once("custom/modules/C_Teachers/_helper.php");
            global $current_user;
            $team_id = $current_user->team_id;
            $admin = new Administration();
            $admin->retrieveSettings();
            $class_id =  $_POST["record"];
            $student_array = $_POST["student_id"];
            $class = BeanFactory::getBean('C_Classes',$class_id);
            $class->load_relationship('c_classes_contacts_1');
            $student_beans = $class->c_classes_contacts_1->getBeans();
            $sql = "SELECT name 
            FROM C_Classes
            where id = '{$class_id}' AND deleted = 0";
            $name = $GLOBALS['db']->getOne($sql);
            foreach ($student_beans as $key => $student) {
                if(in_array($key,$student_array))
                {
                    $mail = new SugarPHPMailer;
                    setup_mail_object($mail, $admin); 
                    $mail->addAddress($student->email1, vn_str_filter($student->name));  // Add a recipient
                    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
                    $mail->addAttachment('custom/uploads/pdf/'.'Timetable_'.$class_id.'.pdf','Timetable_'.vn_str_filter($name).'.pdf');         // Add attachments
                    $mail->isHTML(true); //  Set email format to HTML
                    $mail->Subject = '[Apollo English] Timetable for Class '.$name;
                    $mail->Body    = 'Dear <b>'.vn_str_filter($student->name).'!</b><br>ApolloCRM send you a PDF file, this is a Timetable of Class <b>'.$name.'</b>. <br> Enjoy your courses. Thank you!';
                    if(!$mail->Send()) 
                    {
                        $GLOBALS['log']->warn("Notifications: error sending e-mail (method: {$mail->Mailer}), (error: {$mail->ErrorInfo})");
                    }
                }

            }

        }
    }

?>
