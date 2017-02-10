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

require_once('modules/Leads/views/view.detail.php');

class CustomLeadsViewDetail extends LeadsViewDetail {

    function display() {
        //Custom Survey
        global $current_user;
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
        //END Custom Survey


        //get student name
        if(isset($this->bean->contact_id) && !empty($this->bean->contact_id)){
            $contacts = new Contact();
            $contacts->retrieve($this->bean->contact_id);
            $this->ss->assign('Contacts', $contacts);
        }
        //        //If the convert lead action has been disabled for already converted leads, disable the action link.
        //        $disableConvert = ($this->bean->status == 'Converted' && !empty($sugar_config['disable_convert_lead'])) ? TRUE : FALSE;
        //        $this->ss->assign("DISABLE_CONVERT_ACTION", $disableConvert);

        //display relationship
        $this->bean->load_relationship('leads_contacts_1');
        $relationship= $this->bean->leads_contacts_1->getBeans();
        $this->bean->load_relationship('leads_leads_1');
        $relationship_lead= $this->bean->leads_leads_1->getBeans();
        $htm = '<ul style="margin-left: 0;">';
        foreach ($relationship as $rela){
            $sql = "SELECT related FROM leads_contacts_1_c WHERE leads_contacts_1leads_ida='".$this->bean->id."' AND leads_contacts_1contacts_idb='".$rela->id."' AND DELETED=0 ";
            $related = $GLOBALS['db']->getone($sql);
            $htm .= '<li>';
            $htm .= '<a href=index.php?action=DetailView&module=Contacts&record='.$rela->id.' TARGET=_blank>'.$rela->name.'</a>';
            $htm .= '<span> <b> - '.$related.' </b> </span>';
            $htm .= '<span> <b> (Student) </b> </span>';
            $htm .= '</li>';
        }
        foreach ($relationship_lead as $rela_lead){
            $sql = "SELECT related FROM leads_leads_1_c WHERE leads_leads_1leads_ida='".$this->bean->id."' AND leads_leads_1leads_idb='".$rela_lead->id."' AND DELETED=0";
            $related = $GLOBALS['db']->getone($sql);
            $htm .= '<li>';
            $htm .= '<a href=index.php?module=Leads&offset=20&stamp=1444012184035136100&return_module=Leads&action=DetailView&record='.$rela_lead->id.' TARGET=_blank>'.$rela_lead->name.'</a>';
            $htm .= '<span> <b> - '.$related.' </b> </span>';
            $htm .= '<span> <b> (Lead) </b> </span>';
            $htm .= '</li>';
        }
        $htm .= '</ul>';
        $this->ss->assign('RELATIONSHIP',$htm);


        // Prefered KOC
        $koc = $this->bean->preferred_kind_of_course;
        $this->ss->assign('KOC',$koc);


        //Display parent
        $this->bean->load_relationship('c_contacts_leads_1');
        $parent = reset($this->bean->c_contacts_leads_1->getBeans());
        if(!empty($parent)){
            $par = '<a href="index.php?module=C_Contacts&offset=2&stamp=1443079476077587300&return_module=C_Contacts&action=DetailView&record='.$parent->id.'" TARGET=_blank>'.$parent->name.'</a>';
            $par .= ' ('.$this->bean->contact_rela.')';
            $this->ss->assign('PARENT',$par);
        }

        //Display company
        $this->bean->load_relationship('accounts');
        $corporates = reset($this->bean->accounts->getBeans());
        $com = '<a href="index.php?module=Accounts&offset=3&stamp=1445239126024798600&return_module=Accounts&action=DetailView&record='.$corporates->id.'" TARGET=_blank>'.$corporates->name.'</a>';
        $this->ss->assign('COMPANY',$com);

        //status color
        $color = '';
        if($this->bean->status == "New")
            $color .= ' <span class="textbg_green"><b>'.$this->bean->status.'<b></span>';
        else if($this->bean->status == "Working Date")
            $color .= ' <span class="textbg_bluelight"><b>'.$this->bean->status.'<b></span>';
            else if($this->bean->status == "In Process")
                $color .= ' <span class="textbg_blue"><b>'.$this->bean->status.'<b></span>';
                else if($this->bean->status == "PT/Demo")
                    $color .= ' <span class="textbg_violet "><b>'.$this->bean->status.'<b></span>';
                    else if($this->bean->status == "Converted")
                        $color .= ' <span class="textbg_red"><b>'.$this->bean->status.'<b></span>';
                        $this->ss->assign('COLOR',$color);

        //Custom Testing Score - By Lap Nguyen
        //        $html = '
        //        <link rel="stylesheet" href="custom/include/Ledit/ledit.css">
        //        <script src="custom/include/Ledit/save_ledit.js"></script>
        //        <div style="margin-left: 10%; margin-right: 10%">
        //        <table border="1" class="ledit">
        //        <tr><td>Listening</td><td>Writing</td><td>Speaking</td><td>Reading</td><td>Overall</td><td>Stage</td><td>Level</td><td> </td></tr>
        //        <tr>
        //
        //        <td><span id="span_listening">'.format_number($this->bean->listening,2,2).'</span><input id="input_listening" type="text" size="3" value="'.format_number($this->bean->listening,2,2).'" class="editbox" /></td>
        //        <td><span id="span_writing">'.format_number($this->bean->writing,2,2).'</span><input id="input_writing" type="text" size="3" value="'.format_number($this->bean->writing,2,2).'" class="editbox" /></td>
        //        <td><span id="span_speaking">'.format_number($this->bean->speaking,2,2).'</span><input id="input_speaking" type="text" size="3" value="'.format_number($this->bean->speaking,2,2).'" class="editbox" /></td>
        //        <td><span id="span_reading">'.format_number($this->bean->reading,2,2).'</span><input id="input_reading" type="text" size="3" value="'.format_number($this->bean->reading,2,2).'" class="editbox" /></td>
        //        <td><span id="span_gpa">'.format_number($this->bean->gpa,2,2).'</span><input id="input_gpa" type="text" size="3" value="'.format_number($this->bean->gpa,2,2).'" class="editbox" /></td>
        //        <td><span id="span_stage">'.$this->bean->stage.'</span><select id="stage" name="stage" class="editbox">'.get_select_options_with_id($GLOBALS['app_list_strings']['stage_score_list'], $this->bean->stage).'</select></td>
        //        <td><span id="span_level">'.$this->bean->level.'</span><select id="level" name="level" class="editbox">'.get_select_options_with_id($GLOBALS['app_list_strings']['level_score_list'], $this->bean->level).'</select></td>
        //
        //        <td>
        //        <a href="javascript:void(0)" id="'.$this->bean->id.'" class="btn btn-primary edit_tr">edit</a>
        //        <a href="javascript:void(0)" id="'.$this->bean->id.'" class="btn save_tr">save</a>
        //        </td>
        //        </tr>
        //        </table>
        //        </div>
        //        ';
        //
        //        //END - By Lap Nguyen

        $lead_type = $GLOBALS['db']->getOne("SELECT team_type FROM teams WHERE id = '{$this->bean->team_id}'");
        //        if($lead_type == "Adult"){
        //            unset($this->dv->defs['templateMeta']['form']['buttons'][3]);
        //            $this->ss->assign("TESTINGSCORE", $html);
        //        }
        //        if($lead_type == "Junior"){
        //            unset($this->dv->defs['templateMeta']['form']['buttons'][4]);
        //        }
        //Button Convert To Student
        if(empty($this->bean->contact_id))
            $btn_convert_2 = '<input class="button" name="CONVERT_STUDENT_BTN" id="convert_student_button" title="'.translate('LBL_CONVERTLEAD','Leads').'" onclick="var _form = document.getElementById(\'formDetailView\');_form.return_module.value=\'Leads\'; _form.return_action.value=\'DetailView\'; _form.return_id.value=\''.$this->bean->id.'\';_form.module.value=\'Contacts\';_form.action.value=\'EditView\';_form.submit();" type="button" value="'.translate('LBL_CONVERTLEAD','Leads').'">';
        else $btn_convert_2 = '';
        $this->ss->assign('btn_convert_2',$btn_convert_2);

        parent::display();
    }
    function _displaySubPanels(){
        require_once ('include/SubPanel/SubPanelTiles.php');
        $subpanel = new SubPanelTiles($this->bean, $this->module);
        $lead_type = $GLOBALS['db']->getOne("SELECT team_type FROM teams WHERE id = '{$this->bean->team_id}'");

        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['leads_c_payments_1']);

        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['leads_contacts_1']);
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['leads_leads_1']);

        echo $subpanel->display();
    }
}
