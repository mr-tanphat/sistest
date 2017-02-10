<?php
    class GradebookDetailLogicHooks{

        function showDetail(&$bean, $event, $arg) {
            if(strlen($bean->description) > 30) {
                $bean->description = "<span title = '{$bean->description}'>"
                .(substr($bean->description,0,25)."...")."</span>";

            }
            $bean->final_result_text = "<span>". ($bean->final_result * 100) ."</span>";
        }
    }
?>
