<?php
    class GradebookConfigLogicHooks{
        function setName(&$bean, $event, $arg) {                
            $teamCode = $GLOBALS['db']->getOne("SELECT short_name FROM teams WHERE id = '$bean->team_id' ");
            /*$code =  ''.$bean->db->getOne("SELECT count(id) FROM {$bean->table_name}");
            while(strlen($code) < 5) {
                $code = '0'.$code; 
            }*/
            $bean->name = $teamCode.'-'.$bean->kind_of_course.''.$bean->level.'-'.$bean->type;
        }
    }
?>
