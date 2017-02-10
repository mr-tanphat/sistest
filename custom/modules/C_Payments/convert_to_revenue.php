<?php
         $payment 					= BeanFactory::getBean('C_Payments',$_POST['record_use_2']);
         
         $delivery 					= new C_DeliveryRevenue();
         $delivery->name 			= 'Converted Payment '.$payment->name.' to revenue';
         $delivery->student_id 		= $payment->contacts_c_payments_1contacts_ida;
         $delivery->enrollment_id 	= $payment->drop_from_enrollment_id;
         
         $delivery->duration 		= 0;
         $delivery->amount 			= unformat_number($payment->remain);
         $delivery->date_input 		= $timedate->to_db_date($_POST['to_revenue_date'],true);
         
         $delivery->cost_per_hour 	= 0;
         $delivery->session_id 		= '1';
         $delivery->passed 			= 0;
         $delivery->created_by 		= '1';
         $delivery->modified_user_id= '1';
         
         $delivery->team_id 		= $payment->team_id;
         $delivery->team_set_id 	= $payment->team_set_id;
         $delivery->assigned_user_id 	= '1';
         $delivery->save();
         
         $sql = "UPDATE c_payments SET remain = 0, description = 'This payment has been droped to Revenue' WHERE id = '{$payment->id}'";
         $res = $GLOBALS['db']->query($sql);
         header('Location: index.php?module=C_Payments&action=DetailView&record='.$payment->id);
?>