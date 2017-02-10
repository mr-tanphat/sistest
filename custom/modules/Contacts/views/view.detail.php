<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
/**
*
* LICENSE: The contents of this file are subject to the license agreement ("License") which is included
* in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
* agreed to the terms and conditions of the License, and you may not use this file except in compliance
* with the License.
*
* @author     Original Author Biztech Co.
*/

require_once('modules/Contacts/views/view.detail.php');

class CustomContactsViewDetail extends ContactsViewDetail {

    /**
    * @see SugarView::display()
    *
    * We are overridding the display method to manipulate the portal information.
    * If portal is not enabled then don't show the portal fields.
    */
    function display() {
        // Customize Survey
        global $current_user, $mod_strings;
        echo '<link rel="stylesheet" type="text/css" href="custom/include/css/survey_css/jquery.datetimepicker.css">';
        echo '<link rel="stylesheet" type="text/css" href="custom/include/css/survey_css/survey.css">';
        echo '<script type="text/javascript" src="custom/include/js/survey_js/custom_code.js">';
        require_once('custom/include/modules/Administration/plugin.php');
        $checkSurveySubscription = validateSurveySubscription();
        if (!$checkSurveySubscription['success']) {

        } else {
            $record_id = (!empty($_REQUEST['record'])) ? $_REQUEST['record'] : $this->bean->id;
            $module_name = (!empty($_REQUEST['module'])) ? $_REQUEST['module'] : $this->module;

            $send_survey = "<input  type='button' id='send_survey' onclick=\"create_SendSurveydiv('{$record_id}','{$module_name}');\" value='Send Survey'>";

            $this->ss->assign('send_survey', $send_survey);
        }
        //End Customize Survey

        $this->ss->assign("PORTAL_ENABLED", true);

        $team_type = getTeamType($this->bean->team_id);
        $html_bt = "";
        if($team_type == "Adult"){
            $html_bt .= '<input class="button" type="button" onClick="window.open(\'index.php?module=J_Payment&action=EditView&return_module=J_Payment&return_action=DetailView&payment_type=Moving%20Out&student_id='.$this->bean->id.'\',\'_blank\')" value="'.$GLOBALS['mod_strings']['LNK_NEW_MOVING'].'" id="juniorMoving">';
            $html_bt .= '<input class="button" type="button" onClick="window.open(\'index.php?module=J_Payment&action=EditView&return_module=J_Payment&return_action=DetailView&payment_type=Refund&student_id='.$this->bean->id.'\',\'_blank\')" value="'.$GLOBALS['mod_strings']['LNK_NEW_REFUND'].'" id="juniorRefund">';
            $html_bt .= '<input class="button" type="button" onClick="window.open(\'index.php?module=J_Payment&action=EditView&return_module=J_Payment&return_action=DetailView&payment_type=Transfer%20Out&student_id='.$this->bean->id.'\',\'_blank\')" value="'.$GLOBALS['mod_strings']['LNK_NEW_TRANSFER'].'" id="juniorTransfer">';
        }
        elseif ($team_type == "Junior"){
            $html_bt .= '<input class="button" type="button" onClick="window.open(\'index.php?module=J_StudentSituations&action=EditView&return_module=J_StudentSituations&return_action=DetailView&type=Moving%20Out&student_id='.$this->bean->id.'\',\'_blank\')" value="'.$GLOBALS['mod_strings']['LBL_MOVING_CLASS'].'" id="juniorMovingClass">';
            $html_bt .= '<input class="button" type="button" onClick="window.open(\'index.php?module=J_Payment&action=EditView&return_module=J_Payment&return_action=DetailView&payment_type=Moving%20Out&student_id='.$this->bean->id.'\',\'_blank\')" value="'.$GLOBALS['mod_strings']['LNK_NEW_MOVING'].'" id="juniorMoving">';
            $html_bt .= '<input class="button" type="button" onClick="window.open(\'index.php?module=J_Payment&action=EditView&return_module=J_Payment&return_action=DetailView&payment_type=Refund&student_id='.$this->bean->id.'\',\'_blank\')" value="'.$GLOBALS['mod_strings']['LNK_NEW_REFUND'].'" id="juniorRefund">';
            $html_bt .= '<input class="button" type="button" onClick="window.open(\'index.php?module=J_Payment&action=EditView&return_module=J_Payment&return_action=DetailView&payment_type=Transfer%20Out&student_id='.$this->bean->id.'\',\'_blank\')" value="'.$GLOBALS['mod_strings']['LNK_NEW_TRANSFER'].'" id="juniorTransfer">';
            //$html_bt .= '<input class="button" type="button" onClick="window.open(\'index.php?module=J_Payment&action=EditView&return_module=J_Payment&return_action=DetailView&payment_type=Transfer%20From%20AIMS&student_id='.$this->bean->id.'\',\'_blank\')" value="'.$GLOBALS['mod_strings']['LNK_NEW_TRANSFER_FROM_AIMS'].'" id="juniorTransferAIMS">';
            if($this->bean->user_id && $this->bean->portal_active)
                $html_bt .= '<input class="button" type="button" onClick="window.open(\'index.php?module=Contacts&action=LoginPortal&record='.$this->bean->id.'\',\'_blank\')" value="'.$GLOBALS['mod_strings']['LBL_LOGIN_PORTAL'].'" id="loginportal">';

        }
        $html_bt .= '<input id="btn_view_change_log" title="View Change Log" class="button" onclick="open_popup(\'Audit\', \'600\', \'400\', \'&record='.$this->bean->id.'&module_name=Contacts\', true, false,  { \'call_back_function\':\'set_return\',\'form_name\':\'EditView\',\'field_to_name_array\':[] } ); return false;" type="button" value="View Change Log">';
        $html_bt .= '<input class="button" type="button" onClick="showDialogExportForm()" value="'.$GLOBALS['mod_strings']['BTN_EXPORT_FORM'].'" id="btn_export_form">';
        $this->ss->assign('custom_button',$html_bt);
        $this->ss->assign('team_type',$team_type);

        //display relationship
        $this->bean->load_relationship('contacts_contacts_1');
        $relationship= $this->bean->contacts_contacts_1->getBeans();
        $this->bean->load_relationship('leads_contacts_1');
        $relationship_lead= $this->bean->leads_contacts_1->getBeans();
        $html .= '<ul style="margin-left: 0;">';
        foreach ($relationship as $rela){
            $sql = "SELECT related FROM contacts_contacts_1_c WHERE contacts_contacts_1contacts_ida='".$this->bean->id."' AND contacts_contacts_1contacts_idb='".$rela->id."' AND DELETED=0 ";
            $related = $GLOBALS['db']->getone($sql);
            $html .= '<li>';
            $html .= '<a href=index.php?action=DetailView&module=Contacts&record='.$rela->id.' TARGET=_blank>'.$rela->name.'</a>';
            $html .= '<span> <b> - '.$related.' </b> </span>';
            $html .= '<span> <b> (Student) </b> </span>';
            $html .= '</li>';
        }
        foreach ($relationship_lead as $rela_lead){
            $sql = "SELECT related FROM leads_contacts_1_c WHERE leads_contacts_1leads_ida='".$rela_lead->id."' AND leads_contacts_1contacts_idb='".$this->bean->id."' AND DELETED=0 ";
            $related = $GLOBALS['db']->getone($sql);
            $html .= '<li>';
            $html .= '<a href=index.php?module=Leads&offset=20&stamp=1444012184035136100&return_module=Leads&action=DetailView&record='.$rela_lead->id.' TARGET=_blank>'.$rela_lead->name.'</a>';
            $html .= '<span> <b> - '.$related.' </b> </span>';
            $html .= '<span> <b> (Lead) </b> </span>';
            $html .= '</li>';
        }
        $html .= '</ul>';
        $this->ss->assign('RELATIONSHIP',$html);
        //Handle Lock Data
        if($team_type == 'Adult'){
            //Dialog
            echo $GLOBALS['app_strings']['LBL_THONGBAO_SUSPEND'];
            echo $GLOBALS['app_strings']['LBL_THONGBAO_MOVESTUDENT'];
            $this->bean->load_relationship('contracts');
            $contract = reset($this->bean->contracts->getBeans());
            $atag = '<a href="index.php?module=Contracts&action=DetailView&record='.$contract->id.'">'.$contract->name.'</a>';
            $this->ss->assign('contract_name',$atag);
        }

        //Total Payment - Junior
        $sql1 = "SELECT DISTINCT
        COUNT(j_payment.id) j_payment__allcount
        FROM
        j_payment
        INNER JOIN
        contacts_j_payment_1_c l1_1 ON j_payment.id = l1_1.contacts_j_payment_1j_payment_idb
        AND l1_1.deleted = 0
        INNER JOIN
        contacts l1 ON l1.id = l1_1.contacts_j_payment_1contacts_ida
        AND l1.deleted = 0
        WHERE
        (((l1.id = '{$this->bean->id}')))
        AND j_payment.deleted = 0";
        $bt_delete = '<input title="Delete" accesskey="d" class="button" onclick="var _form = document.getElementById(\'formDetailView\'); _form.return_module.value=\'Contacts\'; _form.return_action.value=\'ListView\'; _form.action.value=\'Delete\'; if(confirm(\'Are you sure you want to delete this record?\')) SUGAR.ajaxUI.submitForm(_form);" type="submit" name="Delete" value="Delete" id="delete_button">';
        $this->ss->assign('DELETE',$bt_delete);
        //status color
        $color = '';
        if($this->bean->contact_status == "Waiting for class")    $color .= ' <span class="textbg_crimson"><b>'.$this->bean->contact_status.'<b></span>';
        else if($this->bean->contact_status == "In Progress")      $color .= ' <span class="textbg_blue"><b>'.$this->bean->contact_status.'<b></span>';
            else if($this->bean->contact_status == "Delayed")            $color .= ' <span class="textbg_black"><b>'.$this->bean->contact_status.'<b></span>';
                else if($this->bean->contact_status == "OutStanding")     $color .= ' <span class="textbg_orange"><b>'.$this->bean->contact_status.'<b></span>';
                    else if($this->bean->contact_status == "Finished")     $color .= ' <span class="textbg_green"><b>'.$this->bean->contact_status.'<b></span>';
                        $this->ss->assign('COLOR',$color);

        //Assign hidden HTML
        //1. Export Form Dialog
        $parentTeam = getParentTeamName($this->bean->team_id);
        $defaultTemplate = "";
        if($this->bean->preferred_kind_of_course == "Premium"){
            switch($parentTeam){
                case 'DN':
                    $defaultTemplate = 'AD_PremiumRegistration_Form_DN.docx';
                    break;
                case 'HP':
                    $defaultTemplate = 'AD_PremiumRegistration_Form_HP.docx';
                    break;
                case 'HN':
                    $defaultTemplate = 'Junior_PremiumRegistration_Forms_HN.docx';
                    break;
                default:
                    $defaultTemplate = 'Junior_PremiumRegistration_Forms_Nationwide.docx';
                    break;
            }
        }
        else{
            switch($parentTeam){
                case 'DN':
                    $defaultTemplate = 'AD_Registration_Form_DN.docx';
                    break;
                case 'HP':
                    $defaultTemplate = 'AD_Registration_Form_HP.docx';
                    break;
                default:
                    $defaultTemplate = 'Junior_Registration_Forms_Nationwide.docx';
                    break;
            }
        }


        $smarty = new Sugar_Smarty();
        $smarty->assign('DEFAULT_TEMPLATE',$defaultTemplate);
        $html = $smarty->fetch('custom/modules/Contacts/tpls/dialogExport.tpl');
        $this->ss->assign('HIDDEN_HTML',$html);


        parent::display();
    }

    function _displaySubPanels(){
        require_once ('include/SubPanel/SubPanelTiles.php');
        $subpanel = new SubPanelTiles($this->bean, $this->module);

        $student_type = $GLOBALS['db']->getOne("SELECT team_type FROM teams WHERE id = '{$this->bean->team_id}'");
        if($student_type == 'Junior'){
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['c_classes_contacts_1']);
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['opportunities']);
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['contacts_c_payments_2']);
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['contacts_c_refunds_1']);
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['contacts_c_payments_1']);
        }
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['contacts_c_payments_1']);
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['contacts_c_payments_2']);
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['contacts_c_refunds_1']);



        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['contacts_c_invoices_1']);
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['documents']);
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['contacts_contacts_1']);
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['quotes']);
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['cases']);
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['contacts']);
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['contracts']);
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['leads_contacts_1']);

        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['leads']['top_buttons'][0]);//hiding create
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['leads']['top_buttons'][1]);//hiding select
        //hide activities and history
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['campaigns']);
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['contacts_c_invoices_1']);
        //unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['j_class_contacts_1']);
        //unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['student_j_gradebookdetail']);
        echo $subpanel->display();
    }

}
