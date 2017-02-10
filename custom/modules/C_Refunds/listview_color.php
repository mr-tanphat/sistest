<?php 
    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 
    
    class ListviewLogicHookRef { 

        /** 
        * Changing color of listview rows according to Status
        */ 
        function listviewcolor_Ref(&$bean, $event, $arguments) { 
            
            if($bean->refond_method == 'Cash'){
               $bean->refond_method = "<label>
                    <div style='width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; padding: 5px;'>
                        <img src='custom/themes/default/images/cash-icon.png'>&nbsp;<b>Cash</b>
                    </div>
                </label>" ;
            } elseif ($bean->refond_method == 'CreditDebitCard'){
                $bean->refond_method = "<label>
                    <div style='width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; padding: 5px;'>
                        <img src='custom/themes/default/images/visa-icon.png'>&nbsp;<b>Card</b>
                    </div>
                </label>" ;
            } elseif($bean->refond_method == 'BankTranfer'){
                $bean->refond_method = "<label>
                    <div style='width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; padding: 5px;'>
                        <img src='custom/themes/default/images/bank-icon.png'>&nbsp;<b>Bank Transfer</b>
                    </div>
                </label>" ;
            } elseif($bean->refond_method == 'Loan'){
                $bean->refond_method = "<label>
                    <div style='width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; padding: 5px;'>
                        <img src='custom/themes/default/images/loan-icon.png'>&nbsp;<b>Loan</b>
                    </div>
                </label>" ;
            }elseif($bean->refond_method == 'Other'){
                $bean->refond_method = "<label>
                    <div style='width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; padding: 5px;'>
                        <img src='custom/themes/default/images/other-icon.png'>&nbsp;<b>Other</b>
                    </div>
                </label>" ;
            }
        } 
    }
?>
