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

require_once('modules/Accounts/views/view.detail.php');

class CustomAccountsViewDetail extends AccountsViewDetail {

    function CustomAccountsViewDetail() {
        parent::AccountsViewDetail();
    }

    function display() {
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
        parent::display();
    }
    function _displaySubPanels(){
        require_once ('include/SubPanel/SubPanelTiles.php');
        $subpanel = new SubPanelTiles($this->bean, $this->module);

        /*Sub-Panel buttons hiding code*/
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['contacts']['top_buttons'][1]);
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['accounts_c_payments_1']);
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['accounts_c_invoices_1']);
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['cases']);
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['accounts']);
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['opportunities']);
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['leads']);
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['campaigns']);
        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['account_payments']);
        echo $subpanel->display();
    }

}

?>