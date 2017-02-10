<?php

/**
*
* LICENSE: The contents of this file are subject to the license agreement ("License") which is included
* in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
* agreed to the terms and conditions of the License, and you may not use this file except in compliance
* with the License.
*
* @author     Original Author Biztech Co.
*/


require_once('modules/Users/views/view.list.php');

class CustomUsersViewList extends UsersViewList {
    //customize Survey
    public function preDisplay() {
        //bug #46690: Developer Access to Users/Teams/Roles
        if (!$GLOBALS['current_user']->isAdminForModule('Users') && !$GLOBALS['current_user']->isDeveloperForModule('Users')) {
            //instead of just dying here with unauthorized access will send the user back to his/her settings
            SugarApplication::redirect('index.php?module=Users&action=DetailView&record=' . $GLOBALS['current_user']->id);
        }
        $this->lv = new ListViewSmarty();
        $this->lv->delete = false;
        $this->lv->email = false;
        require_once('custom/include/modules/Administration/plugin.php');
        $checkSurveySubscription = validateSurveySubscription();
        if (!$checkSurveySubscription['success']) {

        } else {
            $this->lv->actionsMenuExtraItems[] = $this->buildMyMenuItem();
        }
    }

    protected function buildMyMenuItem() {
        global $sugar_version;
        echo '<link rel="stylesheet" type="text/css" href="custom/include/css/survey_css/survey.css">';
        echo '<link rel="stylesheet" type="text/css" href="custom/include/css/survey_css/jquery.datetimepicker.css">';
        echo '<script type="text/javascript" src="custom/include/js/survey_js/custom_code.js">';
        $module_name = (!empty($_REQUEST['module'])) ? $_REQUEST['module'] : $this->module;
        $re_sugar_version = '/(6\.4\.[0-9])/';
        if (preg_match($re_sugar_version, $sugar_version)) {
            return "<a id='send_survey' onclick=\"getListRecords('{$module_name}');\" class='menuItem' onmouseover='hiliteItem(this,\"yes\");' onmouseout='unhiliteItem(this);' href='javascript:void(0);' style='width:150px'>Send Survey</a>";
        } else {
            return "<a id='send_survey' onclick=\"getListRecords('{$module_name}');\">Send Survey</a>";
        }
    }
    //END: customize Survey
    public function listViewProcess(){
        $this->processSearchForm();
        $this->lv->searchColumns = $this->searchForm->searchColumns;
        if(!empty($this->where))
            $this->where .= " AND (users.portal_user <> 1) ";
        else
            $this->where .= ' (users.portal_user <> 1) ';

        $this->where.=    ' AND (users.for_portal_only <> 1) ';

        if(!$this->headers)
            return;
        if(empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false){
            $this->lv->ss->assign("SEARCH",true);
            if(!empty($this->where)){
                $this->where .= " AND";
            }
            $this->where .= " (users.status !='Reserved' or users.status is null) ";
            $this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where, $this->params);
            $savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);
            echo $this->lv->display();
        }
    }

}
