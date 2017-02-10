<?php
class logicLead{
    //Save relationship
    function saveRelationship(&$bean, $event, $arguments){
        $bean->full_lead_name = $bean->last_name .' '. $bean->first_name;
        if(!empty($bean->birthdate))
            $bean->birthmonth  = date('n', strtotime($bean->birthdate));
        else $bean->birthmonth = '';
        $bean->assistant = viToEn($bean->full_lead_name);
        if($_POST['module'] == 'Import'){
            $user_id = $GLOBALS['db']->getOne("SELECT id FROM users WHERE user_name = '{$bean->created_by}' AND deleted = 0");
            if(!empty($user_id))
                $bean->created_by = $user_id;

            $bean->date_modified    = $bean->date_entered;
            $bean->modified_user_id = $bean->created_by;
        }
        //set source - Also do when import
        if (!empty($bean->campaign_id))
            $bean->lead_source = "Campaign";

        //save team type - Also do when import
        $lead_type = $GLOBALS['db']->getOne("SELECT team_type FROM teams WHERE id = '{$bean->team_id}'");
        $bean->team_type = $lead_type;

        if($_POST['module'] == $bean->module_name && $_POST['action'] == 'Save'){
            //Delete old relationship
            $GLOBALS['db']->query("DELETE FROM leads_leads_1_c WHERE leads_leads_1leads_ida='{$bean->id}'");
            $GLOBALS['db']->query("DELETE FROM leads_contacts_1_c WHERE leads_contacts_1leads_ida='{$bean->id}'");
            $bean->load_relationship('leads_leads_1');
            $bean->load_relationship('leads_contacts_1');
            //Save json relationship
            foreach ($_POST["jsons"] as $key => $json){
                if($key>0){
                    $jsons_rela = json_decode(html_entity_decode($json));
                    if($jsons_rela->select == "Leads"){
                        $bean->leads_leads_1->add($jsons_rela->rela_id);
                        //Update related type
                        $GLOBALS['db']->query("UPDATE leads_leads_1_c SET related= '{$jsons_rela->select_rela}' WHERE leads_leads_1leads_ida='{$bean->id}' AND leads_leads_1leads_idb = '{$jsons_rela->rela_id}' AND deleted = 0");
                    }
                    if ($jsons_rela->select == "Contacts"){
                        $bean->leads_contacts_1->add($jsons_rela->rela_id);
                        //Update related type
                        $GLOBALS['db']->query("UPDATE leads_contacts_1_c SET related= '{$jsons_rela->select_rela}' WHERE leads_contacts_1leads_ida='{$bean->id}' AND leads_contacts_1contacts_idb = '{$jsons_rela->rela_id}' AND deleted = 0");
                    }
                }
            }
        }
        if (isset($_POST['prospect_id']) &&  !empty($_POST['prospect_id'])) {
            $prospect=new Prospect();
            $prospect->retrieve($_POST['prospect_id']);
            $prospect->lead_id= $bean->id;
            // Set to keep email in target
            $prospect->in_workflow = true;
            $prospect->converted = true;
            $prospect->save();

            //Copy Log Call
            $GLOBALS['db']->query("UPDATE calls SET parent_id = '{$bean->id}', parent_type = 'Leads' WHERE parent_id = '{$prospect->id}' AND deleted = 0");

            $GLOBALS['db']->query("INSERT INTO calls_leads (id, call_id, lead_id, required, accept_status, date_modified, deleted)
                SELECT id, id, '{$bean->id}', 1, 'none', date_modified, deleted FROM calls WHERE parent_id = '{$bean->id}' AND deleted = 0;");

            //Copy Task
            $GLOBALS['db']->query("UPDATE tasks SET parent_id = '{$bean->id}', parent_type = 'Leads' WHERE parent_id = '{$prospect->id}' AND deleted = 0");

            //Copy Meeting
            $GLOBALS['db']->query("UPDATE meetings SET parent_id = '{$bean->id}', parent_type = 'Leads' WHERE parent_id = '{$prospect->id}' AND deleted = 0 AND meeting_type = 'Meeting'");

            $GLOBALS['db']->query("INSERT INTO meetings_leads (id, meeting_id, lead_id, required, accept_status, date_modified, deleted)
                SELECT id, id, '{$bean->id}', 1, 'none', date_modified, deleted FROM meetings WHERE parent_id = '{$bean->id}' AND deleted = 0;");
        }

        //Update PT/Demo
        $GLOBALS['db']->query("UPDATE j_ptresult SET last_name='{$bean->last_name}', first_name='{$bean->first_name}', student_name='".$bean->last_name.' '.$bean->first_name."', student_mobile='{$bean->phone_mobile}', student_email='{$bean->email1}', student_birthdate='{$bean->birthdate}', parent_name='{$bean->guardian_name}', assigned_user_id='{$bean->assigned_user_id}' WHERE student_id='{$bean->id}'");

        //Update Status
        if($bean->status != 'Converted'){
            if($bean->potential == 'Ready To PT/Demo')
                $bean->status = 'PT/Demo';
            elseif($bean->potential == 'Not Interested'){
                $bean->status = 'Dead';
            }elseif($bean->status == 'Dead' && $bean->potential != 'Not Interested')
                $bean->status = 'Recycled';
        }
        if(!empty($_POST['assigned_user_id_2']) && empty($_POST['assigned_user_id']))
            $bean->assigned_user_id = $_POST['assigned_user_id_2'];
    }
    function listviewcolor(&$bean, $event, $arguments) {
        $colorClass = '';
        if($_REQUEST['action']=='Popup'){

        }else{
            switch($bean->status) {
                case 'New':
                    $colorClass = "textbg_green";
                    break;
                case 'Assigned':
                    $colorClass = "textbg_bluelight";
                    break;
                case 'In Process':
                    $colorClass = "textbg_blue";
                    break;
                case 'Converted':
                    $colorClass = "textbg_red";
                    break;
                case 'PT/Demo':
                    $colorClass = "textbg_violet";
                    break;
                case 'Recycled':
                    $colorClass = "textbg_orange";
                    break;
                case 'Dead':
                    $colorClass = "textbg_black";
                    break;
                default :
                    $colorClass = "No_color";
            }
            $tmp_status = translate('lead_status_dom','',$bean->status);
            $bean->status = "<span class=$colorClass >$tmp_status</span>";
        }
    }

}
?>
