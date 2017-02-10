<?php 
    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 
    
    class ListviewLogicHookInv { 

        /** 
        * Changing color of listview rows according to Status
        */ 
        function listviewcolor_Inv(&$bean, $event, $arguments) { 
            
            $colorClass = '';       
            switch($bean->status) { 
                case 'Unpaid':     
                    $colorClass = "textbg_orange"; 
                    break; 
                case 'Paid':     
                    $colorClass = "textbg_green"; 
                    break; 
                case 'Cancel':     
                    $colorClass = "textbg_red"; 
                    break;
                case 'Deleted':     
                    $colorClass = "textbg_black"; 
                    break; 
                default : 
                    $colorClass = "textbg_nocolor"; 
            }
            $tmp_status = translate('status_invoice_list','',$bean->status); 
            $bean->status = "<span class=$colorClass>$tmp_status</span>";
        } 
    }
?>
