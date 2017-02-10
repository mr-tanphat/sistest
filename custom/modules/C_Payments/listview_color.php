<?php 
    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

    class ListviewLogicHookPay { 

        /** 
        * Changing color of listview rows according to Status
        */ 
        function listviewcolor_Pay(&$bean, $event, $arguments) { 

            $colorClass = '';       
            switch($bean->status) { 
                case 'Unpaid':     
                    $colorClass = "textbg_orange"; 
                    break; 
                case 'Paid':     
                    $colorClass = "textbg_green"; 
                    break;
                case 'Deleted':     
                    $colorClass = "textbg_black"; 
                    break;  
                default : 
                    $colorClass = "textbg_nocolor"; 
            }
            $tmp_status = translate('status_payments_list','',$bean->status); 
            $bean->status = "<span class=$colorClass>$tmp_status</span>";

            if($bean->payment_method == 'Cash'){
                $bean->payment_method = "<label>
                <div style='width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; padding: 5px;'>
                <img src='custom/themes/default/images/cash-icon.png'>&nbsp;<b>Cash</b>
                </div>
                </label>" ;
            } elseif ($bean->payment_method == 'CreditDebitCard'){
                $bean->payment_method = "<label>
                <div style='width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; padding: 5px;'>
                <img src='custom/themes/default/images/visa-icon.png'>&nbsp;<b>Card</b>
                </div>
                </label>" ;
            } elseif($bean->payment_method == 'BankTranfer'){
                $bean->payment_method = "<label>
                <div style='width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; padding: 5px;'>
                <img src='custom/themes/default/images/bank-icon.png'>&nbsp;<b>Bank Transfer</b>
                </div>
                </label>" ;
            } elseif($bean->payment_method == 'Loan'){
                $bean->payment_method = "<label>
                <div style='width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; padding: 5px;'>
                <img src='custom/themes/default/images/loan-icon.png'>&nbsp;<b>Loan</b>
                </div>
                </label>" ;
            }elseif($bean->payment_method == 'Other'){
                $bean->payment_method = "<label>
                <div style='width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; padding: 5px;'>
                <img src='custom/themes/default/images/other-icon.png'>&nbsp;<b>Other</b>
                </div>
                </label>" ;
            }
        } 
    }
?>
