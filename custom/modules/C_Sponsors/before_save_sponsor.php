<?php
    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

    class handleSaveSponsor {
        function handleSaveSponsor(&$bean, $event, $arguments){
            if(!empty($bean->amount) && isset($bean->amount)){
                $bean->sponsor_percent = '';  
            }
            if($bean->sponsor_percent > 100){
                $bean->sponsor_percent = 100;  
            }
        }
    }
?>
