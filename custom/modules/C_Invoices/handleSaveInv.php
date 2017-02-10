<?php
    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

    class handleSaveInv {
        function duplicateInvoices(&$bean, $event, $arguments)
        {
            if($_POST['duplicateSave'] == "true" && $_POST['module']=='C_Invoices'){

                //Update Total, Amount_in_word, Student, Balance, PaymentAttempt, Status
                $opp = BeanFactory::getBean('Opportunities',$bean->c_invoices_opportunities_1opportunities_idb);
                
                $bean->amount = $opp->total_in_invoice;
                include("custom/include/ConvertMoneyString/convert_number_to_string.php");
                $converting = new Integer();
                $bean->amount_in_words = $converting->toText($bean->amount);
                
                //Load all Payments relationship Old Invoice
                $inv = BeanFactory::getBean('C_Invoices',$_POST['duplicateId']);
                $inv->load_relationship('c_invoices_c_payments_1');
                $rel_inv = $inv->c_invoices_c_payments_1->getBeans();
                
                //Transfer all Payments relationship to new Invoice
                $attemp = 0;
                $balance = $opp->total_in_invoice;
                
                foreach ($rel_inv as $key => $value) {
                    if($value->status == 'Paid'){
                    $bean->load_relationship('c_invoices_c_payments_1');  
                    $bean->c_invoices_c_payments_1->add($key);
                    $attemp++;
                    $balance = $balance - $value->payment_amount;
                    }else{
                     $sql = "UPDATE c_payments SET deleted=1 WHERE id='$key';";
                     $result = $GLOBALS['db']->query($sql);   
                    }
                }
                $bean->status = $balance <=0 ? 'Paid' : 'Unpaid';
                $bean->payment_attempts = $attemp;
                $bean->ismoved = 1;
                $bean->balance = $balance;
                $bean->assigned_user_id = $GLOBALS['current_user']->id;
                
                //Set Old Invoices status Cancel
                global $timedate;
                $date = $timedate->asDbDate($timedate->getNow()); 
                $time = $timedate->asDbTime($timedate->getNow());
                $sql_inv = "UPDATE c_invoices SET status='Cancel', payment_attempts = '0', date_modified='$date $time', modified_user_id='".$GLOBALS['current_user']->id."' WHERE id='".$_POST['duplicateId']."';";
                $result_inv = $GLOBALS['db']->query($sql_inv);
                
                $sql_enr = "UPDATE opportunities SET sales_stage='Failure', date_modified='$date $time', modified_user_id='".$GLOBALS['current_user']->id."' WHERE id='{$_REQUEST['old_opp_id']}'";
                $result_enr = $GLOBALS['db']->query($sql_enr);
                
                //Set Sale_stage new Enrollment to : Moved
                $sql10 = "UPDATE opportunities SET sales_stage='Moved', date_modified='$date $time', modified_user_id='".$GLOBALS['current_user']->id."' WHERE id='{$bean->c_invoices_opportunities_1opportunities_idb}'";
                $GLOBALS['db']->query($sql10);
            }
        }
    }
?>
