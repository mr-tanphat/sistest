<?php
    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class listColor {
        function listColor(&$bean, $event, $arguments)
        {
            $colorClass = '';       
            switch($bean->type) {  
                case 'Skill':     
                case 'Connect Club':     
                    $colorClass = "textbg_yellow_light"; 
                    break; 
                case 'Practice':     
                    $colorClass = "textbg_green"; 
                    break;
                default : 
                    $colorClass = "textbg_nocolor"; 
            }
            $bean->class_id = "<span class='$colorClass'>". $bean->class_id ."</span>";

        }
    }
?>
