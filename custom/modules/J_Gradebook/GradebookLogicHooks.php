<?php
    class GradebookLogicHooks{
        function genagateName(&$bean, $event, $arg) {
                $teamCode = $GLOBALS['db']->getOne("SELECT short_name FROM teams WHERE id = '$bean->team_id' ");
            $thisClass = BeanFactory::getBean("J_Class", $bean->j_class_j_gradebook_1j_class_ida);
            if($thisClass->isAdultKOC() && $bean->type == 'Test 1') {
                $type = "Test";
            } else $type =  $bean->type;
            $bean->name = $teamCode .'-' . $bean->j_class_j_gradebook_1_name .'-'.$type;
        }
        function updateBeforeSave(&$bean, $event, $arg) {
            global $timedate;
            //#420
            if($bean->status == 'Approved' && empty($bean->date_confirm)) {
                $bean->date_confirm = $timedate->nowDbDate();
            }
            //end #420
        }
    }
?>
