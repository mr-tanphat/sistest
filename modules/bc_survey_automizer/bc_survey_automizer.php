<?php

/* * *******************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 * ****************************************************************************** */

/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once('modules/bc_survey_automizer/bc_survey_automizer_sugar.php');

class bc_survey_automizer extends bc_survey_automizer_sugar {

    function __construct($init = true) {
        global $current_user;
        parent::__construct();
        if ($init) {
            $this->get_workflow_admin_modules_for_user($current_user);
        }
    }
     function get_workflow_admin_modules_for_user($user)
    {
        /* Workflow modules blacklist */
        $workflowNotSupportedModules = array(
            'iFrames',
            'Feeds',
            'Home',
            'Dashboard',
            'Calendar',
            'Activities',
            'Reports',
            'pmse_Business_Rules', // Process Business Rules
            'pmse_Project', // Process Definitions
            'pmse_Emails_Templates', // Process Emails Templates
            'pmse_Inbox', // Processes
        );

        global $moduleList,$app_list_strings;
        $workflow_mod_list = array();
        foreach ($moduleList as $module) {
            $workflow_mod_list[$module] = $module;
        }

        $workflow_admin_modules = array();
        if (empty($user)) {
            return $workflow_admin_modules;
        }
        $actions = ACLAction::getUserActions($user->id);
        foreach ($workflow_mod_list as $key=>$val) {
            if (!in_array($val, $workflow_admin_modules) && !in_array($val, $workflowNotSupportedModules) &&
               ($user->isDeveloperForModule($key))) {
                    $workflow_admin_modules[$key] = $val;
            }
        }
        $app_list_strings['bc_moduleList'] = $workflow_admin_modules ;
        if (!empty($app_list_strings['bc_moduleList'])) {
            foreach ($app_list_strings['bc_moduleList'] as $mkey => $mvalue) {
                if ((!isset($workflow_admin_modules[$mkey]) || str_begin($mkey, 'bc_')) || (!isset($workflow_admin_modules[$mkey]) || str_begin($mkey, 'AOW_')) || str_begin($mkey, 'AM_') || str_begin($mkey, 'AOS_') || str_begin($mkey, 'AOR_') || str_begin($mkey, 'jjwg_') || str_begin($mkey, 'FP_') || str_begin($mkey, 'AOK_') || str_begin($mkey, 'Reminders') || str_begin($mkey, 'SecurityGroups')) {
                    unset($app_list_strings['bc_moduleList'][$mkey]);
                }
            }
        }
        asort($app_list_strings['bc_moduleList']);
    }
}

?>