<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

class handleSaveRefund {
	function handleSaveRefund(&$bean, $event, $arguments)
	{
		if($_POST['module'] == $bean->module_name && $_POST['action'] == 'Save' && $_POST['is_ajax_call'] != '1'){	
			include_once("custom/include/ConvertMoneyString/convert_number_to_string.php");   
			//When moving the between 2 centers
			//Add relationship form bean to enrollment
			$free_balance_id = $_POST['payment_list'][0];

			$sql = "SELECT drop_from_enrollment_id, remain, team_id  FROM c_payments WHERE id = '$free_balance_id'";
			$res = $GLOBALS['db']->query($sql);
			$row = $GLOBALS['db']->fetchByAssoc($res);
			$remain = unformat_number($row['remain']);
			//Thêm mới quan hệ moving out, tranfer out với refund để đáp ứng báo cáo CF
			$drop_from_enrollment_id 	= $row['drop_from_enrollment_id'];
			$bean->load_relationship('opportunities_c_refunds_1');
			$bean->opportunities_c_refunds_1->add($drop_from_enrollment_id); 

			// Update this free balance remain = 0
			$remain = $remain - unformat_number($bean->refund_amount);
			$sql_update_free_balance = "UPDATE c_payments SET remain = $remain WHERE id = '$free_balance_id'";
			$result = $GLOBALS['db']->query($sql_update_free_balance);

			//Update Team refund out - transer out - moving out
			$from_student       = BeanFactory::getBean('Contacts', $bean->contacts_c_refunds_1contacts_ida);
            $bean->team_id      = $row['team_id'];
			if($bean->team_id == $bean->center_id || empty($bean->team_id)){
				$enr_drop 			= BeanFactory::getBean('Opportunities',$drop_from_enrollment_id);
				$bean->team_id      = $enr_drop->team_id;
			}
            $bean->team_set_id = $bean->team_id;
            
			if($bean->refund_type == "Moving out"){
				$from_student->load_relationship('teams');
				$from_student->teams->add($bean->center_id);
				$q1 = "UPDATE contacts SET team_id = '{$bean->center_id}' WHERE id='{$from_student->id}'";
				$GLOBALS['db']->query($q1);

				//Create New Payment with Payment type is moving in
				$pm = new C_Payments();
				$pm->payment_amount = $bean->refund_amount;
				$pm->payment_method = $bean->refond_method;
				$converting = new Integer();
				$pm->amount_in_words = $converting->toText($pm->payment_amount);
				$pm->payment_date = $bean->refund_date;
				$pm->contacts_c_payments_1contacts_ida = $from_student->id;
				//add relationship payment - refund
				$pm->c_payments_c_refunds_1c_refunds_idb = $bean->id;
				$pm->payment_type = 'Moving in';
				$pm->status = 'Paid';
				$pm->description = $bean->description;
				$pm->remain = $pm->payment_amount;
				$pm->drop_from_enrollment_id = $drop_from_enrollment_id;

				$pm->assigned_user_id = $bean->assigned_user_id;
				$pm->team_id = $bean->center_id;
				$pm->team_set_id = $bean->center_id;
				$pm->save();
			}
			//When transfer the between 2 student
			elseif($bean->refund_type == "Transfer out"){
				$to_student = BeanFactory::getBean('Contacts', $bean->student_id);

				//Create New Payment with Payment type is transfer in 
				$pm = new C_Payments();
				$pm->payment_amount = $bean->refund_amount;
				$pm->remain = $pm->payment_amount;
				$pm->payment_method = $bean->refond_method;
				$converting = new Integer();
				$pm->amount_in_words = $converting->toText($pm->payment_amount);
				$pm->payment_date = $bean->refund_date;
				$pm->contacts_c_payments_1contacts_ida = $to_student->id;
				$pm->contacts_c_payments_2contacts_ida = $from_student->id;
				//add relationship payment - refund
				$pm->c_payments_c_refunds_1c_refunds_idb = $bean->id;
				$pm->drop_from_enrollment_id = $drop_from_enrollment_id;
				$pm->payment_method = $bean->refond_method;
				$pm->payment_type = 'Transfer in';
				$pm->status = 'Paid';
				$pm->description = $bean->description;
				$pm->assigned_user_id = $bean->assigned_user_id;
				$pm->team_id = $to_student->team_id;
				$pm->team_set_id = $to_student->team_id;
				$pm->save();

				//Update Free Balance New Student
				$to_student->free_balance = $to_student->free_balance + $bean->refund_amount;
				$to_student->save();

				//Update Free Balance for Student Refund
				$from_student->free_balance = $from_student->free_balance - $bean->refund_amount;
				$from_student->save(); 
			}
			elseif($bean->refund_type == "Normal"){
				//Update Free Balance for Student Refund
				$student = BeanFactory::getBean('Contacts', $bean->contacts_c_refunds_1contacts_ida);
				$student->free_balance = $student->free_balance - $bean->refund_amount;
				$student->save();
			}
			$converting = new Integer();
			$bean->amount_in_words = $converting->toText($bean->refund_amount);
		}
	}
}
?>
