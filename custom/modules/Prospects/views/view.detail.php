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


require_once('include/MVC/View/views/view.detail.php');

class ProspectsViewDetail extends ViewDetail {

    function display() {
        //Customize Survey
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
        //END: Customize Survey


        if(isset($this->bean->lead_id) && !empty($this->bean->lead_id)){
            //get lead name
            $lead = new Lead();
            $lead->retrieve($this->bean->lead_id);
            $this->ss->assign('lead', $lead);
        }
        //status color
        $color = '';
        switch($this->bean->status) {
            case 'New':
                $color = "textbg_green";
                break;
            case 'In Process':
                $color = "textbg_blue";
                break;
            case 'Dead':
                $color = "textbg_black";
                break;
            case 'Converted':
                $color = "textbg_red";
                break;
        }
        $this->ss->assign('STATUS',"<span class='$color'>{$this->bean->status}</span>");

        $btn_convert = '<input class="button" name="CONVERT_LEAD_BTN" id="convert_target_button" title="'.translate('LBL_CONVERT_BUTTON_TITLE','Prospects').'" onclick="var _form = document.getElementById(\'formDetailView\');_form.return_module.value=\'Prospects\'; _form.return_action.value=\'DetailView\'; _form.return_id.value=\''.$this->bean->id.'\';_form.module.value=\'Leads\';_form.action.value=\'EditView\';_form.submit();" type="button" value="'.translate('LBL_CONVERT_BUTTON_TITLE','Prospects').'">';
        if($this->bean->converted == true || $this->bean->converted == '1')
            $btn_convert = '';
        $this->ss->assign('btn_convert',$btn_convert);
        $this->bean->assigned_user_name = get_assigned_user_name($this->bean->assigned_user_id);
        $this->bean->created_by_name = get_assigned_user_name($this->bean->created_by);
        $this->bean->modified_by_name = get_assigned_user_name($this->bean->modified_user_id);
        parent::display();
    }

}
