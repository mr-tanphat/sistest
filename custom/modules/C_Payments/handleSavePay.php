<?php
    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

    class handleSavePay {
        function createPayment(&$bean, $event, $arguments)
        {
            if($bean->payment_type == 'Normal' || $bean->payment_type == 'Deposit'){
                $payment_id = $bean->id;
                // Update discount in Payment khi so tien duoc giam khi thanh toan bang the
                if(array_key_exists($bean->payment_method, $GLOBALS['app_list_strings']['discount_in_payment_list'])){
                    $discount_method =  $GLOBALS['app_list_strings']['discount_in_payment_list'][$bean->payment_method];
                    $bean->discount_in_pay = $bean->discount_in_pay + $discount_method;
                } 
                if(!empty($bean->c_invoices_c_payments_1c_invoices_ida)){
                    //UPDATE INVOICE
                    $q2 = "SELECT id, balance, status, payment_attempts, amount FROM c_invoices WHERE id = '{$bean->c_invoices_c_payments_1c_invoices_ida}'";
                    $rs2 = $GLOBALS['db']->query($q2);
                    $inv = $GLOBALS['db']->fetchByAssoc($rs2);
                    //Invoice Balance
                    $inv_balance = $inv['balance'];
                    if($bean->status == 'Paid')
                        $inv_balance = $inv['balance'] - $bean->payment_amount;        

                    //Invoice amount
                    $inv_amount = $inv['amount'];  

                    //Status of invoice
                    $status = $inv['status'];
                    if($inv_balance <= 0){
                        $status = 'Paid';
                        $inv_balance = 0; 
                    }

                    //Update Payment Attempt in Module Invoice
                    if($bean->date_entered == $bean->date_modified){
                        $inv_attempt = $inv['payment_attempts'] + 1;
                    } else $inv_attempt = $inv['payment_attempts'];

                    //Query Update Invoice
                    $query = "UPDATE c_invoices SET balance = '$inv_balance', amount = '$inv_amount', status = '$status', payment_attempts = '$inv_attempt' WHERE id='{$inv['id']}'";    
                    $rs = $GLOBALS['db']->query($query);
                    //END - UPDATE INVOICE   
                }else{
                    $bean->remain 			= $bean->payment_amount;
                    if($bean->payment_type == 'Deposit'){
						$bean->payment_attempt = 0;
                    }
                }
            }

            //UPDATE STUDENT'S ENROLL BALANCE - 03/09/2014 - by MTN
            elseif($bean->payment_type == 'Extend Balance'){
                $contact = BeanFactory::getBean('Contacts', $bean->contacts_c_payments_1contacts_ida);
                $enroll_balance = $contact->enroll_balance + $bean->payment_amount;
                $sql = "UPDATE contacts SET enroll_balance = $enroll_balance WHERE id='{$bean->contacts_c_payments_1contacts_ida}'"; 
                $GLOBALS['db']->query($sql);
            }
            //                //END UPDATE ENROLL BALANCE
            //                elseif($bean->payment_type == 'Placement Test'){
            //                    $month = date('n');
            //                    $year = date('Y');
            //                    global $timedate;
            //
            //                    $lead = BeanFactory::getBean('Leads',$bean->leads_c_payments_1leads_ida);
            //                    //Carry Forward
            //                    $cr = new C_Carryforward();
            //                    $cr->name = 'Placement Test';
            //                    $cr->team_id = $lead->team_id;
            //                    $cr->team_set_id = $lead->team_id;
            //                    $cr->assigned_user_id = '1';
            //                    $cr->lead_id =$lead->id;
            //                    $cr->date_input = $timedate->nowDbDate();
            //
            //                    $cr->month = $month;
            //                    $cr->year = $year;
            //
            //                    $cr->collected = $bean->payment_amount;
            //                    $cr->delivery = $bean->payment_amount;
            //
            //                    $cr->this_stock = 0;
            //                    $cr->save();
            //
            //                    // Delivery
            //                    $delivery = new C_DeliveryRevenue();
            //
            //                    $delivery->name = 'Placement Test Fee For Lead';
            //                    $delivery->team_id = $lead->team_id;
            //                    $delivery->team_set_id = $lead->team_set_id;
            //                    $delivery->assigned_user_id = '1';
            //                    $delivery->lead_id = $lead->id;
            //                    $delivery->amount = $bean->payment_amount;
            //                    $delivery->date_input = $timedate->nowDbDate();
            //                    $delivery->passed = 0;
            //                    $delivery->save();
            //
            //                }
        }

        function deletePayment(&$bean, $event, $arguments)
        {
            if($bean->payment_type == 'Normal' || $bean->payment_type == 'Deposit'){
                //UPDATE INVOICE
                $inv = BeanFactory::getBean('C_Invoices',$bean->c_invoices_c_payments_1c_invoices_ida);
                //Invoice Balance
                $inv_balance = $inv->balance;
                if($bean->status == 'Paid')
                    $inv_balance = $inv->balance + $bean->payment_amount;  

                //Status of invoice
                $status = $inv->status;
                if($inv_balance > 0)
                    $status = 'Unpaid';

                //Payment Attempt
                $inv_attempt = $inv->payment_attempts - 1;

                //Query Update Invoice
                $query= "UPDATE c_invoices SET balance = '$inv_balance', status = '$status', payment_attempts = '$inv_attempt' WHERE id='{$inv->id}'";    
                $rs = $GLOBALS['db']->query($query);
                //END - UPDATE INVOICE
            }

            //UPDATE STUDENT'S ENROLL BALANCE 
            elseif($bean->payment_type == 'Extend Balance'){
                $contact = BeanFactory::getBean('Contacts', $bean->contacts_c_payments_1contacts_ida);
                $enroll_balance = $contact->enroll_balance - $bean->payment_amount;
                $sql = "UPDATE contacts SET enroll_balance = {$enroll_balance} WHERE id='{$bean->contacts_c_payments_1contacts_ida}'"; 
                $GLOBALS['db']->query($sql);
            }
        }
    }
?>
