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
//Customize Survey
require_once('modules/Users/views/view.detail.php');

class CustomUsersViewDetail extends UsersViewDetail {

    function CustomUsersViewDetail() {
        parent::UsersViewDetail();
    }

    function preDisplay() {
        echo '<link rel="stylesheet" type="text/css" href="custom/include/css/survey_css/jquery.datetimepicker.css">';
        echo '<link rel="stylesheet" type="text/css" href="custom/include/css/survey_css/survey.css">';
        echo '<script type="text/javascript" src="custom/include/js/survey_js/custom_code.js">';
        global $current_user, $app_strings, $sugar_config;

        if (!isset($this->bean->id)) {
            // No reason to set everything up just to have it fail in the display() call
            return;
        }

        parent::preDisplay();

        $viewHelper = new UserViewHelper($this->ss, $this->bean, 'DetailView');
        $viewHelper->setupAdditionalFields();

        $errors = "";
        $msgGood = false;
        if (isset($_REQUEST['pwd_set']) && $_REQUEST['pwd_set'] != 0) {
            if ($_REQUEST['pwd_set'] == '4') {
                require_once('modules/Users/password_utils.php');
                $errors.=canSendPassword();
            } else {
                $errors.=translate('LBL_NEW_USER_PASSWORD_' . $_REQUEST['pwd_set'], 'Users');
                $msgGood = true;
            }
        } else {
            //IF BEAN USER IS LOCKOUT
            if ($this->bean->getPreference('lockout') == '1') {
                $errors.=translate('ERR_USER_IS_LOCKED_OUT', 'Users');
            }
        }
        $this->ss->assign("ERRORS", $errors);
        $this->ss->assign("ERROR_MESSAGE", $msgGood ? translate('LBL_PASSWORD_SENT', 'Users') : translate('LBL_CANNOT_SEND_PASSWORD', 'Users'));
        $buttons = array();
        if ((is_admin($current_user) || $_REQUEST['record'] == $current_user->id
                ) && !empty($sugar_config['default_user_name']) && $sugar_config['default_user_name'] == $this->bean->user_name && isset($sugar_config['lock_default_user_name']) && $sugar_config['lock_default_user_name']) {
            $buttons[] = "<input id='edit_button' accessKey='" . $app_strings['LBL_EDIT_BUTTON_KEY'] . "' name='Edit' title='" . $app_strings['LBL_EDIT_BUTTON_TITLE'] . "' value='" . $app_strings['LBL_EDIT_BUTTON_LABEL'] . "' onclick=\"this.form.return_module.value='Users'; this.form.return_action.value='DetailView'; this.form.return_id.value='" . $this->bean->id . "'; this.form.action.value='EditView'\" type='submit' value='" . $app_strings['LBL_EDIT_BUTTON_LABEL'] . "'>";
        } elseif (is_admin($current_user) || ($GLOBALS['current_user']->isAdminForModule('Users') && !$this->bean->is_admin) || $_REQUEST['record'] == $current_user->id) {
            $buttons[] = "<input title='" . $app_strings['LBL_EDIT_BUTTON_TITLE'] . "' accessKey='" . $app_strings['LBL_EDIT_BUTTON_KEY'] . "' name='Edit' id='edit_button' value='" . $app_strings['LBL_EDIT_BUTTON_LABEL'] . "' onclick=\"this.form.return_module.value='Users'; this.form.return_action.value='DetailView'; this.form.return_id.value='" . $this->bean->id . "'; this.form.action.value='EditView'\" type='submit' value='" . $app_strings['LBL_EDIT_BUTTON_LABEL'] . "'>";
            if ((is_admin($current_user) || $GLOBALS['current_user']->isAdminForModule('Users')
                    )) {
                if (!$current_user->is_group) {
                    $buttons[] = "<input id='duplicate_button' title='" . $app_strings['LBL_DUPLICATE_BUTTON_TITLE'] . "' accessKey='" . $app_strings['LBL_DUPLICATE_BUTTON_KEY'] . "' class='button' onclick=\"this.form.return_module.value='Users'; this.form.return_action.value='DetailView'; this.form.isDuplicate.value=true; this.form.action.value='EditView'\" type='submit' name='Duplicate' value='" . $app_strings['LBL_DUPLICATE_BUTTON_LABEL'] . "'>";

                    if ($this->bean->id != $current_user->id) {
                        $buttons[] = "<input id='delete_button' type='button' class='button' onclick='confirmDelete();' value='" . $app_strings['LBL_DELETE_BUTTON_LABEL'] . "' />";
                    }

                    if (!$this->bean->portal_only && !$this->bean->is_group && !$this->bean->external_auth_only && isset($sugar_config['passwordsetting']['SystemGeneratedPasswordON']) && $sugar_config['passwordsetting']['SystemGeneratedPasswordON']) {
                        $buttons[] = "<input title='" . translate('LBL_GENERATE_PASSWORD_BUTTON_TITLE', 'Users') . "' class='button' LANGUAGE=javascript onclick='generatepwd(\"" . $this->bean->id . "\");' type='button' name='password' value='" . translate('LBL_GENERATE_PASSWORD_BUTTON_LABEL', 'Users') . "'>";
                    }
                }
            }
        }
        require_once('custom/include/modules/Administration/plugin.php');
        $checkSurveySubscription = validateSurveySubscription();
        if (!$checkSurveySubscription['success']) {

        } else {
            $record_id = (!empty($_REQUEST['record'])) ? $_REQUEST['record'] : $this->bean->id;
            $module_name = (!empty($_REQUEST['module'])) ? $_REQUEST['module'] : $this->module;
            $buttons[] = "<a id='send_survey' onclick=\"create_SendSurveydiv('{$record_id}','{$module_name}');\">Send Survey</a>";
        }
        $buttons = array_merge($buttons, $this->ss->get_template_vars('BUTTONS_HEADER'));

        $this->ss->assign('EDITBUTTONS', $buttons);

        $show_roles = (!($this->bean->is_group == '1' || $this->bean->portal_only == '1'));
        $this->ss->assign('SHOW_ROLES', $show_roles);
        //Mark whether or not the user is a group or portal user
        $this->ss->assign('IS_GROUP_OR_PORTAL', ($this->bean->is_group == '1' || $this->bean->portal_only == '1') ? true : false);
        if ($show_roles) {
            ob_start();
            echo "<div>";
            require_once('modules/ACLRoles/DetailUserRole.php');
            echo "</div></div>";


            $role_html = ob_get_contents();
            ob_end_clean();
            $this->ss->assign('ROLE_HTML', $role_html);
        }
    }

    public function getMetaDataFile() {
        $userType = 'Regular';
        if ($this->bean->is_group == 1) {
            $userType = 'Group';
        }

        if ($userType != 'Regular') {
            $oldType = $this->type;
            $this->type = $oldType . 'group';
        }
        $metadataFile = parent::getMetaDataFile();
        if ($userType != 'Regular') {
            $this->type = $oldType;
        }
        return $metadataFile;
    }

    function display() {
        if ($this->bean->portal_only == 1 || $this->bean->is_group == 1) {
            $this->options['show_subpanels'] = false;
            $this->dv->formName = 'DetailViewGroup';
            $this->dv->view = 'DetailViewGroup';
        }

        //handle request to reset the homepage
        if (isset($_REQUEST['reset_homepage'])) {
            $this->bean->resetPreferences('Home');
            global $current_user;
            if ($this->bean->id == $current_user->id) {
                $_COOKIE[$current_user->id . '_activePage'] = '0';
                setcookie($current_user->id . '_activePage', '0', 3000);
            }
        }

        return parent::display();
    }

    /**
     * getHelpText
     *
     * This is a protected function that returns the help text portion.  It is called from getModuleTitle.
     * We override the function from SugarView.php to make sure the create link only appears if the current user
     * meets the valid criteria.
     *
     * @param $module String the formatted module name
     * @return $theTitle String the HTML for the help text
     */
    protected function getHelpText($module) {
        $theTitle = '';

        if ($GLOBALS['current_user']->isAdminForModule('Users')
        ) {
            $createImageURL = SugarThemeRegistry::current()->getImageURL('create-record.gif');
            $url = ajaxLink("index.php?module=$module&action=EditView&return_module=$module&return_action=DetailView");
            $theTitle = <<<EOHTML
&nbsp;
<img src='{$createImageURL}' alt='{$GLOBALS['app_strings']['LNK_CREATE']}'>
<a href="{$url}" class="utilsLink">
{$GLOBALS['app_strings']['LNK_CREATE']}
</a>
EOHTML;
        }
        return $theTitle;
    }

}

//END: Customize Survey
