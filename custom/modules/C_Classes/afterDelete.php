<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class handleDelete {
    function deleteSession(&$bean, $event, $arguments)
    {
        $bean->load_relationship('meetings');
        $sessions = $bean->meetings->getBeans();
        if(count($sessions) > 1000){
            $GLOBALS['log']->security("Serious error: DELETE SESSIONS - User ID: {$GLOBALS['current_user']->id} - Date: {$GLOBALS['timedate']->nowDate()}");  
            die('Something Wrong, Please, try again !!');
        }

        //Xoa session lien quan
        foreach ($sessions as $session_id => $session) {
            $sql = "DELETE FROM meetings WHERE id ='$session_id'";
            $GLOBALS['db']->query($sql);
            $sql = "DELETE FROM meetings_contacts WHERE meeting_id ='$session_id'";
            $GLOBALS['db']->query($sql);
            $q3 = "DELETE FROM opportunities_meetings_1_c WHERE opportunities_meetings_1meetings_idb = '$session_id'";
            $GLOBALS['db']->query($q3);
            //Xoa contract khoi session
            $q3 = "DELETE FROM contracts_meetings_1_c WHERE contracts_meetings_1meetings_idb = '$session_id' AND deleted = 0";
            $GLOBALS['db']->query($q3);
        }
        //Xoa relate 
        $q4 = "DELETE FROM c_classes_contacts_1_c WHERE c_classes_contacts_1c_classes_ida = '{$bean->id}'";
        $GLOBALS['db']->query($q4);
        $q5 = "DELETE FROM c_classes_opportunities_1_c WHERE c_classes_opportunities_1c_classes_ida = '{$bean->id}'";
        $GLOBALS['db']->query($q5);
        //Xoa contract khoi lop
        $q5 = "DELETE FROM c_classes_contracts_1_c WHERE c_classes_contracts_1c_classes_ida = '{$bean->id}' AND deleted = 0";
        $GLOBALS['db']->query($q5);
    }
}
?>
