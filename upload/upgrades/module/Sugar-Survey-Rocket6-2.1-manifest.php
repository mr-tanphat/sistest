<?php

/**
 * This file is used copy all file from package to instance file when the package is install
 *
 * LICENSE: The contents of this file are subject to the license agreement ("License") which is included
 * in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
 * agreed to the terms and conditions of the License, and you may not use this file except in compliance
 * with the License.
 *
 * @author     Original Author Biztech Co.
 */
global $sugar_version;
$manifest = array(
    'acceptable_sugar_flavors' => array('CE', 'PRO'),
    'acceptable_sugar_versions' => array(
        'regex_matches' => array(
            0 => "6\.*\.*",
        ),
    ),
    'readme' => '',
    'key' => 'bc',
    'author' => 'Biztech Consultancy',
    'description' => 'Improve Customer Satisfaction Knowing Your Customers Better Using Survey Rocket - A Smart, Automated Survey Plugin.',
    'icon' => '',
    'is_uninstallable' => true,
    'name' => 'Survey Rocket',
    'published_date' => '2016-09-19 00:00:00',
    'type' => 'module',
    'version' => '2.1',
    'remove_tables' => 'prompt',
);


$installdefs = array(
    'id' => 'CustomerSurvey',
    'beans' =>
    array(
        0 =>
        array(
            'module' => 'bc_submission_data',
            'class' => 'bc_submission_data',
            'path' => 'modules/bc_submission_data/bc_submission_data.php',
            'tab' => false,
        ),
        1 =>
        array(
            'module' => 'bc_survey_submission',
            'class' => 'bc_survey_submission',
            'path' => 'modules/bc_survey_submission/bc_survey_submission.php',
            'tab' => false,
        ),
        2 =>
        array(
            'module' => 'bc_survey_template',
            'class' => 'bc_survey_template',
            'path' => 'modules/bc_survey_template/bc_survey_template.php',
            'tab' => true,
        ),
        3 =>
        array(
            'module' => 'bc_survey',
            'class' => 'bc_survey',
            'path' => 'modules/bc_survey/bc_survey.php',
            'tab' => true,
        ),
        4 =>
        array(
            'module' => 'bc_survey_questions',
            'class' => 'bc_survey_questions',
            'path' => 'modules/bc_survey_questions/bc_survey_questions.php',
            'tab' => false,
        ),
        5 =>
        array(
            'module' => 'bc_survey_pages',
            'class' => 'bc_survey_pages',
            'path' => 'modules/bc_survey_pages/bc_survey_pages.php',
            'tab' => false,
        ),
        6 =>
        array(
            'module' => 'bc_survey_answers',
            'class' => 'bc_survey_answers',
            'path' => 'modules/bc_survey_answers/bc_survey_answers.php',
            'tab' => false,
        ),
        7 =>
        array(
            'module' => 'bc_survey_automizer',
            'class' => 'bc_survey_automizer',
            'path' => 'modules/bc_survey_automizer/bc_survey_automizer.php',
            'tab' => true,
        ),
        8 =>
        array(
            'module' => 'bc_automizer_condition',
            'class' => 'bc_automizer_condition',
            'path' => 'modules/bc_automizer_condition/bc_automizer_condition.php',
            'tab' => false,
        ),
        9 =>
        array(
            'module' => 'bc_automizer_actions',
            'class' => 'bc_automizer_actions',
            'path' => 'modules/bc_automizer_actions/bc_automizer_actions.php',
            'tab' => false,
        ),
    ),
    'relationships' =>
    array(
        0 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_submission_data_bc_survey_questionsMetaData.php',
        ),
        1 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_submission_data_bc_survey_submissionMetaData.php',
        ),
        2 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_submission_data_bc_survey_answersMetaData.php',
        ),
        3 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_survey_submission_bc_surveyMetaData.php',
        ),
        4 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_survey_submission_accountsMetaData.php',
        ),
        5 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_survey_submission_contactsMetaData.php',
        ),
        6 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_survey_submission_leadsMetaData.php',
        ),
        7 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_survey_submission_usersMetaData.php',
        ),
        8 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_survey_submission_prospectsMetaData.php',
        ),
        9 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_survey_template_bc_survey_questionsMetaData.php',
        ),
        10 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_survey_bc_survey_questionsMetaData.php',
        ),
        11 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_survey_bc_survey_templateMetaData.php',
        ),
        12 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_survey_accountsMetaData.php',
        ),
        13 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_survey_contactsMetaData.php',
        ),
        14 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_survey_leadsMetaData.php',
        ),
        15 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_survey_usersMetaData.php',
        ),
        16 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_survey_prospectsMetaData.php',
        ),
        17 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_survey_pages_bc_survey_templateMetaData.php',
        ),
        18 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_survey_pages_bc_surveyMetaData.php',
        ),
        19 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_survey_pages_bc_survey_questionsMetaData.php',
        ),
        20 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_survey_answers_bc_survey_questionsMetaData.php',
        ),
        21 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_survey_automizer_bc_automizer_actionsMetaData.php',
    ),
        22 =>
        array(
            'meta_data' => '<basepath>/SugarModules/relationships/bc_survey_automizer_bc_automizer_conditionMetaData.php',
        ),
    ),
    'language' =>
    array(
        0 =>
        array(
            'from' => '<basepath>/SugarModules/language/application/en_us.surveyplugin.php',
            'to_module' => 'application',
            'language' => 'en_us',
        ),
        1 =>
        array(
            'from' => '<basepath>/SugarModules/language/application/en_us.lang.php',
            'to_module' => 'application',
            'language' => 'en_us',
        ),
        2 =>
        array(
            'from' => '<basepath>/SugarModules/custom/modules/Schedulers/language/en_us.lang.php',
            'to_module' => 'Schedulers',
            'language' => 'en_us'
        ),
        3 =>
        array(
            'from' => '<basepath>/Extension/modules/Administration/Ext/Language/en_us.notification.lang.php',
            'to_module' => 'Administration',
            'language' => 'en_us'
        ),
        4 =>
        array(
            'from' => '<basepath>/Extension/modules/EmailTemplates/Ext/Language/en_us.email_template_survey.php',
            'to_module' => 'EmailTemplates',
            'language' => 'en_us'
        ),
    ),
    'image_dir' => '<basepath>/icons',
    'pre_execute' => array(
        0 => '<basepath>/scripts/pre_execute.php',
    ),
    'post_uninstall' => array(
        '<basepath>/scripts/post_uninstall.php',
    ),
    'post_install' => array(
        '<basepath>/scripts/post_install.php',
    ),
    'action_view_map' =>
    array(
        array(
            'from' => '<basepath>/license_admin/actionviewmap/bc_survey_actionviewmap.php',
            'to_module' => 'bc_survey',
        ),
    ),
    'copy' =>
    array(
        0 =>
        array(
            'from' => '<basepath>/Extension/application/Ext/EntryPointRegistry/',
            'to' => 'custom/Extension/application/Ext/EntryPointRegistry/',
        ),
        10 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_questions/Ext/Language/en_us.CustomerSurvey.php',
            'to' => 'custom/Extension/modules/bc_survey_questions/Ext/Language/en_us.CustomerSurvey.php',
        ),
        11 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_questions/Ext/Vardefs/bc_survey_pages_bc_survey_questions_bc_survey_questions.php',
            'to' => 'custom/Extension/modules/bc_survey_questions/Ext/Vardefs/bc_survey_pages_bc_survey_questions_bc_survey_questions.php',
        ),
        12 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_questions/Ext/Vardefs/bc_submission_data_bc_survey_questions_bc_survey_questions.php',
            'to' => 'custom/Extension/modules/bc_survey_questions/Ext/Vardefs/bc_submission_data_bc_survey_questions_bc_survey_questions.php',
        ),
        13 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_questions/Ext/Vardefs/bc_survey_answers_bc_survey_questions_bc_survey_questions.php',
            'to' => 'custom/Extension/modules/bc_survey_questions/Ext/Vardefs/bc_survey_answers_bc_survey_questions_bc_survey_questions.php',
        ),
        14 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_questions/Ext/Vardefs/bc_survey_template_bc_survey_questions_bc_survey_questions.php',
            'to' => 'custom/Extension/modules/bc_survey_questions/Ext/Vardefs/bc_survey_template_bc_survey_questions_bc_survey_questions.php',
        ),
        15 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_questions/Ext/Vardefs/bc_survey_bc_survey_questions_bc_survey_questions.php',
            'to' => 'custom/Extension/modules/bc_survey_questions/Ext/Vardefs/bc_survey_bc_survey_questions_bc_survey_questions.php',
        ),
        16 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_questions/Ext/Layoutdefs/bc_submission_data_bc_survey_questions_bc_survey_questions.php',
            'to' => 'custom/Extension/modules/bc_survey_questions/Ext/Layoutdefs/bc_submission_data_bc_survey_questions_bc_survey_questions.php',
        ),
        17 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_questions/Ext/Layoutdefs/bc_survey_answers_bc_survey_questions_bc_survey_questions.php',
            'to' => 'custom/Extension/modules/bc_survey_questions/Ext/Layoutdefs/bc_survey_answers_bc_survey_questions_bc_survey_questions.php',
        ),
        18 =>
        array(
            'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/en_us.CustomerSurvey.php',
            'to' => 'custom/Extension/modules/Accounts/Ext/Language/en_us.CustomerSurvey.php',
        ),
        19 =>
        array(
            'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/Account.php',
            'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/Account.php',
        ),
        20 =>
        array(
            'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/bc_survey_accounts_Accounts.php',
            'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/bc_survey_accounts_Accounts.php',
        ),
        21 =>
        array(
            'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/bc_survey_submission_accounts_Accounts.php',
            'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/bc_survey_submission_accounts_Accounts.php',
        ),
        22 =>
        array(
            'from' => '<basepath>/Extension/modules/Accounts/Ext/Layoutdefs/_overrideAccount_subpanel_bc_survey_submission_accounts.php',
            'to' => 'custom/Extension/modules/Accounts/Ext/Layoutdefs/_overrideAccount_subpanel_bc_survey_submission_accounts.php',
        ),
        23 =>
        array(
            'from' => '<basepath>/Extension/modules/Accounts/Ext/Layoutdefs/bc_survey_accounts_Accounts.php',
            'to' => 'custom/Extension/modules/Accounts/Ext/Layoutdefs/bc_survey_accounts_Accounts.php',
        ),
        24 =>
        array(
            'from' => '<basepath>/Extension/modules/Accounts/Ext/Layoutdefs/bc_survey_submission_accounts_Accounts.php',
            'to' => 'custom/Extension/modules/Accounts/Ext/Layoutdefs/bc_survey_submission_accounts_Accounts.php',
        ),
        25 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_submission_data/Ext/Language/en_us.CustomerSurvey.php',
            'to' => 'custom/Extension/modules/bc_submission_data/Ext/Language/en_us.CustomerSurvey.php',
        ),
        26 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_submission_data/Ext/Vardefs/bc_submission_data_bc_survey_questions_bc_submission_data.php',
            'to' => 'custom/Extension/modules/bc_submission_data/Ext/Vardefs/bc_submission_data_bc_survey_questions_bc_submission_data.php',
        ),
        27 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_submission_data/Ext/Vardefs/bc_submission_data_bc_survey_answers_bc_submission_data.php',
            'to' => 'custom/Extension/modules/bc_submission_data/Ext/Vardefs/bc_submission_data_bc_survey_answers_bc_submission_data.php',
        ),
        28 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_submission_data/Ext/Vardefs/bc_submission_data_bc_survey_submission_bc_submission_data.php',
            'to' => 'custom/Extension/modules/bc_submission_data/Ext/Vardefs/bc_submission_data_bc_survey_submission_bc_submission_data.php',
        ),
        29 =>
        array(
            'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/en_us.CustomerSurvey.php',
            'to' => 'custom/Extension/modules/Contacts/Ext/Language/en_us.CustomerSurvey.php',
        ),
        30 =>
        array(
            'from' => '<basepath>/Extension/modules/Contacts/Ext/Vardefs/bc_survey_submission_contacts_Contacts.php',
            'to' => 'custom/Extension/modules/Contacts/Ext/Vardefs/bc_survey_submission_contacts_Contacts.php',
        ),
        31 =>
        array(
            'from' => '<basepath>/Extension/modules/Contacts/Ext/Vardefs/Contact.php',
            'to' => 'custom/Extension/modules/Contacts/Ext/Vardefs/Contact.php',
        ),
        32 =>
        array(
            'from' => '<basepath>/Extension/modules/Contacts/Ext/Vardefs/bc_survey_contacts_Contacts.php',
            'to' => 'custom/Extension/modules/Contacts/Ext/Vardefs/bc_survey_contacts_Contacts.php',
        ),
        33 =>
        array(
            'from' => '<basepath>/Extension/modules/Contacts/Ext/Layoutdefs/bc_survey_submission_contacts_Contacts.php',
            'to' => 'custom/Extension/modules/Contacts/Ext/Layoutdefs/bc_survey_submission_contacts_Contacts.php',
        ),
        34 =>
        array(
            'from' => '<basepath>/Extension/modules/Contacts/Ext/Layoutdefs/_overrideContact_subpanel_bc_survey_submission_contacts.php',
            'to' => 'custom/Extension/modules/Contacts/Ext/Layoutdefs/_overrideContact_subpanel_bc_survey_submission_contacts.php',
        ),
        35 =>
        array(
            'from' => '<basepath>/Extension/modules/Contacts/Ext/Layoutdefs/bc_survey_contacts_Contacts.php',
            'to' => 'custom/Extension/modules/Contacts/Ext/Layoutdefs/bc_survey_contacts_Contacts.php',
        ),
        36 =>
        array(
            'from' => '<basepath>/Extension/modules/Leads/Ext/Language/en_us.CustomerSurvey.php',
            'to' => 'custom/Extension/modules/Leads/Ext/Language/en_us.CustomerSurvey.php',
        ),
        37 =>
        array(
            'from' => '<basepath>/Extension/modules/Leads/Ext/Vardefs/bc_survey_submission_leads_Leads.php',
            'to' => 'custom/Extension/modules/Leads/Ext/Vardefs/bc_survey_submission_leads_Leads.php',
        ),
        38 =>
        array(
            'from' => '<basepath>/Extension/modules/Leads/Ext/Vardefs/Lead.php',
            'to' => 'custom/Extension/modules/Leads/Ext/Vardefs/Lead.php',
        ),
        39 =>
        array(
            'from' => '<basepath>/Extension/modules/Leads/Ext/Vardefs/bc_survey_leads_Leads.php',
            'to' => 'custom/Extension/modules/Leads/Ext/Vardefs/bc_survey_leads_Leads.php',
        ),
        40 =>
        array(
            'from' => '<basepath>/Extension/modules/Leads/Ext/Layoutdefs/bc_survey_submission_leads_Leads.php',
            'to' => 'custom/Extension/modules/Leads/Ext/Layoutdefs/bc_survey_submission_leads_Leads.php',
        ),
        41 =>
        array(
            'from' => '<basepath>/Extension/modules/Leads/Ext/Layoutdefs/_overrideLead_subpanel_bc_survey_submission_leads.php',
            'to' => 'custom/Extension/modules/Leads/Ext/Layoutdefs/_overrideLead_subpanel_bc_survey_submission_leads.php',
        ),
        42 =>
        array(
            'from' => '<basepath>/Extension/modules/Leads/Ext/Layoutdefs/bc_survey_leads_Leads.php',
            'to' => 'custom/Extension/modules/Leads/Ext/Layoutdefs/bc_survey_leads_Leads.php',
        ),
        43 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_pages/Ext/Language/en_us.CustomerSurvey.php',
            'to' => 'custom/Extension/modules/bc_survey_pages/Ext/Language/en_us.CustomerSurvey.php',
        ),
        44 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_pages/Ext/Vardefs/bc_survey_pages_bc_survey_bc_survey_pages.php',
            'to' => 'custom/Extension/modules/bc_survey_pages/Ext/Vardefs/bc_survey_pages_bc_survey_bc_survey_pages.php',
        ),
        45 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_pages/Ext/Vardefs/bc_survey_pages_bc_survey_questions_bc_survey_pages.php',
            'to' => 'custom/Extension/modules/bc_survey_pages/Ext/Vardefs/bc_survey_pages_bc_survey_questions_bc_survey_pages.php',
        ),
        46 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_pages/Ext/Vardefs/bc_survey_pages_bc_survey_template_bc_survey_pages.php',
            'to' => 'custom/Extension/modules/bc_survey_pages/Ext/Vardefs/bc_survey_pages_bc_survey_template_bc_survey_pages.php',
        ),
        47 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_pages/Ext/Layoutdefs/bc_survey_pages_bc_survey_questions_bc_survey_pages.php',
            'to' => 'custom/Extension/modules/bc_survey_pages/Ext/Layoutdefs/bc_survey_pages_bc_survey_questions_bc_survey_pages.php',
        ),
        48 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey/Ext/Language/en_us.CustomerSurvey.php',
            'to' => 'custom/Extension/modules/bc_survey/Ext/Language/en_us.CustomerSurvey.php',
        ),
        49 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey/Ext/Vardefs/bc_survey_contacts_bc_survey.php',
            'to' => 'custom/Extension/modules/bc_survey/Ext/Vardefs/bc_survey_contacts_bc_survey.php',
        ),
        50 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey/Ext/Vardefs/bc_survey_bc_survey_template_bc_survey.php',
            'to' => 'custom/Extension/modules/bc_survey/Ext/Vardefs/bc_survey_bc_survey_template_bc_survey.php',
        ),
        51 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey/Ext/Vardefs/bc_survey_prospects_bc_survey.php',
            'to' => 'custom/Extension/modules/bc_survey/Ext/Vardefs/bc_survey_prospects_bc_survey.php',
        ),
        52 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey/Ext/Vardefs/bc_survey_submission_bc_survey_bc_survey.php',
            'to' => 'custom/Extension/modules/bc_survey/Ext/Vardefs/bc_survey_submission_bc_survey_bc_survey.php',
        ),
        53 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey/Ext/Vardefs/bc_survey_users_bc_survey.php',
            'to' => 'custom/Extension/modules/bc_survey/Ext/Vardefs/bc_survey_users_bc_survey.php',
        ),
        54 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey/Ext/Vardefs/bc_survey_bc_survey_questions_bc_survey.php',
            'to' => 'custom/Extension/modules/bc_survey/Ext/Vardefs/bc_survey_bc_survey_questions_bc_survey.php',
        ),
        55 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey/Ext/Vardefs/bc_survey_accounts_bc_survey.php',
            'to' => 'custom/Extension/modules/bc_survey/Ext/Vardefs/bc_survey_accounts_bc_survey.php',
        ),
        56 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey/Ext/Vardefs/bc_survey_pages_bc_survey_bc_survey.php',
            'to' => 'custom/Extension/modules/bc_survey/Ext/Vardefs/bc_survey_pages_bc_survey_bc_survey.php',
        ),
        57 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey/Ext/Vardefs/bc_survey_leads_bc_survey.php',
            'to' => 'custom/Extension/modules/bc_survey/Ext/Vardefs/bc_survey_leads_bc_survey.php',
        ),
        66 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_submission/Ext/Language/en_us.CustomerSurvey.php',
            'to' => 'custom/Extension/modules/bc_survey_submission/Ext/Language/en_us.CustomerSurvey.php',
        ),
        67 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_submission/Ext/Vardefs/bc_survey_submission_leads_bc_survey_submission.php',
            'to' => 'custom/Extension/modules/bc_survey_submission/Ext/Vardefs/bc_survey_submission_leads_bc_survey_submission.php',
        ),
        68 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_submission/Ext/Vardefs/bc_survey_submission_bc_survey_bc_survey_submission.php',
            'to' => 'custom/Extension/modules/bc_survey_submission/Ext/Vardefs/bc_survey_submission_bc_survey_bc_survey_submission.php',
        ),
        69 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_submission/Ext/Vardefs/bc_survey_submission_accounts_bc_survey_submission.php',
            'to' => 'custom/Extension/modules/bc_survey_submission/Ext/Vardefs/bc_survey_submission_accounts_bc_survey_submission.php',
        ),
        70 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_submission/Ext/Vardefs/bc_survey_submission_contacts_bc_survey_submission.php',
            'to' => 'custom/Extension/modules/bc_survey_submission/Ext/Vardefs/bc_survey_submission_contacts_bc_survey_submission.php',
        ),
        71 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_submission/Ext/Vardefs/bc_survey_submission_users_bc_survey_submission.php',
            'to' => 'custom/Extension/modules/bc_survey_submission/Ext/Vardefs/bc_survey_submission_users_bc_survey_submission.php',
        ),
        72 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_submission/Ext/Vardefs/bc_submission_data_bc_survey_submission_bc_survey_submission.php',
            'to' => 'custom/Extension/modules/bc_survey_submission/Ext/Vardefs/bc_submission_data_bc_survey_submission_bc_survey_submission.php',
        ),
        73 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_submission/Ext/Vardefs/bc_survey_submission_prospects_bc_survey_submission.php',
            'to' => 'custom/Extension/modules/bc_survey_submission/Ext/Vardefs/bc_survey_submission_prospects_bc_survey_submission.php',
        ),
        74 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_submission/Ext/Layoutdefs/bc_submission_data_bc_survey_submission_bc_survey_submission.php',
            'to' => 'custom/Extension/modules/bc_survey_submission/Ext/Layoutdefs/bc_submission_data_bc_survey_submission_bc_survey_submission.php',
        ),
        75 =>
        array(
            'from' => '<basepath>/Extension/modules/Users/Ext/Language/en_us.CustomerSurvey.php',
            'to' => 'custom/Extension/modules/Users/Ext/Language/en_us.CustomerSurvey.php',
        ),
        76 =>
        array(
            'from' => '<basepath>/Extension/modules/Users/Ext/Vardefs/bc_survey_submission_users_Users.php',
            'to' => 'custom/Extension/modules/Users/Ext/Vardefs/bc_survey_submission_users_Users.php',
        ),
        77 =>
        array(
            'from' => '<basepath>/Extension/modules/Users/Ext/Vardefs/bc_survey_users_Users.php',
            'to' => 'custom/Extension/modules/Users/Ext/Vardefs/bc_survey_users_Users.php',
        ),
        78 =>
        array(
            'from' => '<basepath>/Extension/modules/Users/Ext/Layoutdefs/_overrideUser_subpanel_bc_survey_submission_users.php',
            'to' => 'custom/Extension/modules/Users/Ext/Layoutdefs/_overrideUser_subpanel_bc_survey_submission_users.php',
        ),
        79 =>
        array(
            'from' => '<basepath>/Extension/modules/Users/Ext/Layoutdefs/bc_survey_submission_users_Users.php',
            'to' => 'custom/Extension/modules/Users/Ext/Layoutdefs/bc_survey_submission_users_Users.php',
        ),
        80 =>
        array(
            'from' => '<basepath>/Extension/modules/Users/Ext/Layoutdefs/bc_survey_users_Users.php',
            'to' => 'custom/Extension/modules/Users/Ext/Layoutdefs/bc_survey_users_Users.php',
        ),
        81 =>
        array(
            'from' => '<basepath>/Extension/modules/Prospects/Ext/Language/en_us.CustomerSurvey.php',
            'to' => 'custom/Extension/modules/Prospects/Ext/Language/en_us.CustomerSurvey.php',
        ),
        82 =>
        array(
            'from' => '<basepath>/Extension/modules/Prospects/Ext/Vardefs/bc_survey_prospects_Prospects.php',
            'to' => 'custom/Extension/modules/Prospects/Ext/Vardefs/bc_survey_prospects_Prospects.php',
        ),
        83 =>
        array(
            'from' => '<basepath>/Extension/modules/Prospects/Ext/Vardefs/bc_survey_submission_prospects_Prospects.php',
            'to' => 'custom/Extension/modules/Prospects/Ext/Vardefs/bc_survey_submission_prospects_Prospects.php',
        ),
        84 =>
        array(
            'from' => '<basepath>/Extension/modules/Prospects/Ext/Vardefs/Prospect.php',
            'to' => 'custom/Extension/modules/Prospects/Ext/Vardefs/Prospect.php',
        ),
        85 =>
        array(
            'from' => '<basepath>/Extension/modules/Prospects/Ext/Layoutdefs/bc_survey_prospects_Prospects.php',
            'to' => 'custom/Extension/modules/Prospects/Ext/Layoutdefs/bc_survey_prospects_Prospects.php',
        ),
        86 =>
        array(
            'from' => '<basepath>/Extension/modules/Prospects/Ext/Layoutdefs/bc_survey_submission_prospects_Prospects.php',
            'to' => 'custom/Extension/modules/Prospects/Ext/Layoutdefs/bc_survey_submission_prospects_Prospects.php',
        ),
        87 =>
        array(
            'from' => '<basepath>/Extension/modules/Prospects/Ext/Layoutdefs/_overrideProspect_subpanel_bc_survey_submission_prospects.php',
            'to' => 'custom/Extension/modules/Prospects/Ext/Layoutdefs/_overrideProspect_subpanel_bc_survey_submission_prospects.php',
        ),
        88 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_template/Ext/Language/en_us.CustomerSurvey.php',
            'to' => 'custom/Extension/modules/bc_survey_template/Ext/Language/en_us.CustomerSurvey.php',
        ),
        89 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_template/Ext/Vardefs/bc_survey_bc_survey_template_bc_survey_template.php',
            'to' => 'custom/Extension/modules/bc_survey_template/Ext/Vardefs/bc_survey_bc_survey_template_bc_survey_template.php',
        ),
        90 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_template/Ext/Vardefs/bc_survey_template_bc_survey_questions_bc_survey_template.php',
            'to' => 'custom/Extension/modules/bc_survey_template/Ext/Vardefs/bc_survey_template_bc_survey_questions_bc_survey_template.php',
        ),
        91 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_template/Ext/Vardefs/bc_survey_pages_bc_survey_template_bc_survey_template.php',
            'to' => 'custom/Extension/modules/bc_survey_template/Ext/Vardefs/bc_survey_pages_bc_survey_template_bc_survey_template.php',
        ),
        95 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_answers/Ext/Language/en_us.CustomerSurvey.php',
            'to' => 'custom/Extension/modules/bc_survey_answers/Ext/Language/en_us.CustomerSurvey.php',
        ),
        96 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_answers/Ext/Vardefs/override_name.php',
            'to' => 'custom/Extension/modules/bc_survey_answers/Ext/Vardefs/override_name.php',
        ),
        97 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_answers/Ext/Vardefs/bc_submission_data_bc_survey_answers_bc_survey_answers.php',
            'to' => 'custom/Extension/modules/bc_survey_answers/Ext/Vardefs/bc_submission_data_bc_survey_answers_bc_survey_answers.php',
        ),
        98 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_answers/Ext/Vardefs/bc_survey_answers_bc_survey_questions_bc_survey_answers.php',
            'to' => 'custom/Extension/modules/bc_survey_answers/Ext/Vardefs/bc_survey_answers_bc_survey_questions_bc_survey_answers.php',
        ),
        99 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_answers/Ext/Layoutdefs/bc_submission_data_bc_survey_answers_bc_survey_answers.php',
            'to' => 'custom/Extension/modules/bc_survey_answers/Ext/Layoutdefs/bc_submission_data_bc_survey_answers_bc_survey_answers.php',
        ),
        100 =>
        array(
            'from' => '<basepath>/SugarModules/modules/bc_submission_data',
            'to' => 'modules/bc_submission_data',
        ),
        101 =>
        array(
            'from' => '<basepath>/SugarModules/modules/bc_survey_submission',
            'to' => 'modules/bc_survey_submission',
        ),
        102 =>
        array(
            'from' => '<basepath>/SugarModules/modules/bc_survey_template',
            'to' => 'modules/bc_survey_template',
        ),
        103 =>
        array(
            'from' => '<basepath>/SugarModules/modules/bc_survey',
            'to' => 'modules/bc_survey',
        ),
        104 =>
        array(
            'from' => '<basepath>/SugarModules/modules/bc_survey_questions',
            'to' => 'modules/bc_survey_questions',
        ),
        105 =>
        array(
            'from' => '<basepath>/SugarModules/modules/bc_survey_pages',
            'to' => 'modules/bc_survey_pages',
        ),
        106 =>
        array(
            'from' => '<basepath>/SugarModules/modules/bc_survey_answers',
            'to' => 'modules/bc_survey_answers',
        ),
        107 =>
        array(
            'from' => '<basepath>/SugarModules/custom/include/css/',
            'to' => 'custom/include/css/',
        ),
        116 =>
        array(
            'from' => '<basepath>/SugarModules/custom/include/custom_utils.php',
            'to' => 'custom/include/custom_utils.php',
        ),
        117 =>
        array(
            'from' => '<basepath>/SugarModules/custom/include/images/',
            'to' => 'custom/include/images/',
        ),
        119 =>
        array(
            'from' => '<basepath>/SugarModules/custom/include/js/survey_js/',
            'to' => 'custom/include/js/survey_js/',
        ),
        120 =>
        array(
            'from' => '<basepath>/SugarModules/custom/include/SugarFields/',
            'to' => 'custom/include/SugarFields/',
        ),
        121 =>
        array(
            'from' => '<basepath>/SugarModules/custom/include/EditView/',
            'to' => 'custom/include/EditView/',
        ),
        124 =>
        array(
            'from' => '<basepath>/SugarModules/custom/include/modules/bc_survey/',
            'to' => 'custom/include/modules/bc_survey/',
        ),
        125 =>
        array(
            'from' => '<basepath>/SugarModules/custom/include/modules/bc_survey_template/',
            'to' => 'custom/include/modules/bc_survey_template/',
        ),
        126 =>
        array(
            'from' => '<basepath>/SugarModules/custom/include/utilsfunction.php',
            'to' => 'custom/include/utilsfunction.php',
        ),
        127 =>
        array(
            'from' => '<basepath>/preview_survey.php',
            'to' => 'preview_survey.php',
        ),
        128 =>
        array(
            'from' => '<basepath>/survey_submission.php',
            'to' => 'survey_submission.php',
        ),
        130 =>
        array(
            'from' => '<basepath>/unsubscribe.php',
            'to' => 'unsubscribe.php',
        ),
        132 =>
        array(
            'from' => '<basepath>/SugarModules/custom/include/survey-img/',
            'to' => 'custom/include/survey-img/',
        ),
        134 =>
        array(
            'from' => '<basepath>/SugarModules/custom/include/deleteSubmission.php',
            'to' => 'custom/include/deleteSubmission.php',
        ),
        141 =>
        array(
            'from' => '<basepath>/SugarModules/custom/include/modules/Administration/plugin.php',
            'to' => 'custom/include/modules/Administration/plugin.php',
        ),
        148 =>
        array(
            'from' => '<basepath>/Extension/modules/Administration/Ext/Administration/survey_configuration.php',
            'to' => 'custom/Extension/modules/Administration/Ext/Administration/survey_configuration.php',
        ),
        149 =>
        array(
            'from' => '<basepath>/Extension/modules/Administration/Ext/ActionViewMap/',
            'to' => 'custom/Extension/modules/Administration/Ext/ActionViewMap/',
        ),
        151 =>
        array(
            'from' => '<basepath>/SugarModules/custom/include/pagination.class.php',
            'to' => 'custom/include/pagination.class.php',
        ),
        158 =>
        array(
            'from' => '<basepath>/SugarModules/custom/include/generic/SugarWidgets/',
            'to' => 'custom/include/generic/SugarWidgets/',
        ),
        160 =>
        array(
            'from' => '<basepath>/SugarModules/custom/modules/Administration/tpl/',
            'to' => 'custom/modules/Administration/tpl/',
        ),
        162 =>
        array(
            'from' => '<basepath>/SugarModules/custom/modules/Administration/views/',
            'to' => 'custom/modules/Administration/views/',
        ),
        179 =>
        array(
            'from' => '<basepath>/survey_re_submit_request.php',
            'to' => 'survey_re_submit_request.php',
        ),
        185 =>
        array(
            'from' => '<basepath>/Extension/modules/EmailTemplates/Ext/Vardefs/email_template_survey.php',
            'to' => 'custom/Extension/modules/EmailTemplates/Ext/Vardefs/email_template_survey.php',
        ),
        186 =>
        array(
            'from' => '<basepath>/SugarModules/custom/modules/Accounts/views/view.list.php',
            'to' => 'custom/modules/Accounts/views/view.list.php',
        ),
        187 =>
        array(
            'from' => '<basepath>/SugarModules/custom/modules/Accounts/views/view.detail.php',
            'to' => 'custom/modules/Accounts/views/view.detail.php',
        ),
        188 =>
        array(
            'from' => '<basepath>/SugarModules/custom/modules/Contacts/views/view.list.php',
            'to' => 'custom/modules/Contacts/views/view.list.php',
        ),
        189 =>
        array(
            'from' => '<basepath>/SugarModules/custom/modules/Contacts/views/view.detail.php',
            'to' => 'custom/modules/Contacts/views/view.detail.php',
        ),
        190 =>
        array(
            'from' => '<basepath>/SugarModules/custom/modules/Leads/views/view.list.php',
            'to' => 'custom/modules/Leads/views/view.list.php',
        ),
        191 =>
        array(
            'from' => '<basepath>/SugarModules/custom/modules/Prospects/views/view.list.php',
            'to' => 'custom/modules/Prospects/views/view.list.php',
        ),
        192 =>
        array(
            'from' => '<basepath>/SugarModules/custom/modules/Prospects/views/view.detail.php',
            'to' => 'custom/modules/Prospects/views/view.detail.php',
        ),
        193 =>
        array(
            'from' => '<basepath>/SugarModules/custom/modules/Users/views/view.list.php',
            'to' => 'custom/modules/Users/views/view.list.php',
        ),
        194 =>
        array(
            'from' => '<basepath>/SugarModules/custom/modules/Users/views/view.list.php',
            'to' => 'custom/modules/Users/views/view.list.php',
        ),
        195 =>
        array(
            'from' => '<basepath>/Extension/application/Ext/Language/',
            'to' => 'custom/Extension/application/Ext/Language/',
        ),
	196 =>
        array(
            'from' => '<basepath>/license',
            'to' => 'modules/bc_survey',
        ),
        197 =>
        array(
            'from' => '<basepath>/SugarModules/modules/bc_survey_automizer/',
            'to' => 'modules/bc_survey_automizer/',
        ),
        198 =>
        array(
            'from' => '<basepath>/SugarModules/modules/bc_automizer_condition/',
            'to' => 'modules/bc_automizer_condition/',
        ),
        199 =>
        array(
            'from' => '<basepath>/SugarModules/modules/bc_automizer_actions/',
            'to' => 'modules/bc_automizer_actions/',
        ),
        200 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_survey_automizer/',
            'to' => 'custom/Extension/modules/bc_survey_automizer/',
        ),
        201 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_automizer_actions/',
            'to' => 'custom/Extension/modules/bc_automizer_actions/',
        ),
        202 =>
        array(
            'from' => '<basepath>/Extension/modules/bc_automizer_condition/',
            'to' => 'custom/Extension/modules/bc_automizer_condition/',
        ),
    ),
    'logic_hooks' => array(
        array(
            'module' => 'Accounts',
            'hook' => 'after_ui_frame',
            'order' => 1001,
            'description' => 'Include javascript files for Survey',
            'file' => 'modules/bc_survey/addSurveyJsInSupportModules.php',
            'class' => 'addSurveyJsInSupportModules',
            'function' => 'getSurveyScripts',
        ),
        array(
            'module' => 'Contacts',
            'hook' => 'after_ui_frame',
            'order' => 1001,
            'description' => 'Include javascript files for Survey',
            'file' => 'modules/bc_survey/addSurveyJsInSupportModules.php',
            'class' => 'addSurveyJsInSupportModules',
            'function' => 'getSurveyScripts',
        ),
        array(
            'module' => 'Leads',
            'hook' => 'after_ui_frame',
            'order' => 1001,
            'description' => 'Include javascript files for Survey',
            'file' => 'modules/bc_survey/addSurveyJsInSupportModules.php',
            'class' => 'addSurveyJsInSupportModules',
            'function' => 'getSurveyScripts',
        ),
        array(
            'module' => 'Prospects',
            'hook' => 'after_ui_frame',
            'order' => 1001,
            'description' => 'Include javascript files for Survey',
            'file' => 'modules/bc_survey/addSurveyJsInSupportModules.php',
            'class' => 'addSurveyJsInSupportModules',
            'function' => 'getSurveyScripts',
        ),
        array(
            'module' => 'Users',
            'hook' => 'after_ui_frame',
            'order' => 1001,
            'description' => 'Include javascript files for Survey',
            'file' => 'modules/bc_survey/addSurveyJsInSupportModules.php',
            'class' => 'addSurveyJsInSupportModules',
            'function' => 'getSurveyScripts',
        ),
        array(
            'module' => 'Users',
            'hook' => 'after_login',
            'order' => 1001,
            'description' => 'Check plugin subscription',
            'file' => 'modules/bc_survey/addSurveyJsInSupportModules.php',
            'class' => 'addSurveyJsInSupportModules',
            'function' => 'checkSurveySubscription',
        ),
        array(
            'module' => 'bc_survey',
            'hook' => 'after_ui_frame',
            'order' => 1001,
            'description' => 'Include javascript files for Survey',
            'file' => 'modules/bc_survey/addSurveyJsInSupportModules.php',
            'class' => 'addSurveyJsInSupportModules',
            'function' => 'getSurveyScriptsForSurvey',
        ),
        array(
            'module' => 'bc_survey_template',
            'hook' => 'after_ui_frame',
            'order' => 1001,
            'description' => 'Include javascript files for Survey',
            'file' => 'modules/bc_survey/addSurveyJsInSupportModules.php',
            'class' => 'addSurveyJsInSupportModules',
            'function' => 'getSurveyScriptsForSurveyTemplate',
        ),
        array(
            'module' => 'bc_survey_template',
            'hook' => 'process_record',
            'order' => 1001,
            'description' => 'Create Survey Button On ListView',
            'file' => 'modules/bc_survey/addSurveyJsInSupportModules.php',
            'class' => 'addSurveyJsInSupportModules',
            'function' => 'create_survey_button',
        ),
        array(
            'module' => '',
            'hook' => 'before_save',
            'order' => 99,
            'description' => 'Before Save Survey Send Logic Hook',
            'file' => 'modules/bc_survey_automizer/before_save_logichook.php',
            'class' => 'before_save_logichook',
            'function' => 'check_survey_automizer_method',
        ),
        array(
            'module' => '',
            'hook' => 'before_delete',
            'order' => 99,
            'description' => 'submission_after_delete',
            'file' => 'custom/include/deleteSubmission.php',
            'class' => 'deletedSubmission',
            'function' => 'deletedSubmission_method',
        ),
    ),
    'scheduledefs' => array(
        array(
            'from' => '<basepath>/SugarModules/custom/modules/Schedulers/Customer_Survey_Scheduler.php',
        ),
    ),
);
$re_sugar_version = '/(6\.4\.[0-9])/';
if (preg_match($re_sugar_version, $sugar_version)) {
    array_push($installdefs['copy'], array(
        'from' => '<basepath>/SugarModules/Sugar_6.4/custom/modules/Leads/views/view.detail.php',
        'to' => 'custom/modules/Leads/views/view.detail.php',
    ));
    array_push($installdefs['copy'], array(
        'from' => '<basepath>/SugarModules/Sugar_6.4/custom/modules/Users/views/view.detail.php',
        'to' => 'custom/modules/Users/views/view.detail.php',
    ));
    array_push($installdefs['copy'], array(
        'from' => '<basepath>/SugarModules/Sugar_6.4/custom/modules/EmailTemplates/EditView.html',
        'to' => 'custom/modules/EmailTemplates/EditView.html',
    ));
    array_push($installdefs['copy'], array(
        'from' => '<basepath>/SugarModules/Sugar_6.4/custom/modules/EmailTemplates/EditViewMain.html',
        'to' => 'custom/modules/EmailTemplates/EditViewMain.html',
    ));
    array_push($installdefs['copy'], array(
        'from' => '<basepath>/SugarModules/Sugar_6.4/custom/modules/EmailTemplates/EditView.php',
        'to' => 'custom/modules/EmailTemplates/EditView.php',
    ));
} else {
    array_push($installdefs['copy'], array(
        'from' => '<basepath>/SugarModules/custom/modules/Leads/views/view.detail.php',
        'to' => 'custom/modules/Leads/views/view.detail.php',
    ));
    array_push($installdefs['copy'], array(
        'from' => '<basepath>/SugarModules/custom/modules/Users/views/view.detail.php',
        'to' => 'custom/modules/Users/views/view.detail.php',
    ));
    array_push($installdefs['copy'], array(
        'from' => '<basepath>/SugarModules/custom/modules/EmailTemplates/EditView.html',
        'to' => 'custom/modules/EmailTemplates/EditView.html',
    ));
    array_push($installdefs['copy'], array(
        'from' => '<basepath>/SugarModules/custom/modules/EmailTemplates/EditViewMain.html',
        'to' => 'custom/modules/EmailTemplates/EditViewMain.html',
    ));
    array_push($installdefs['copy'], array(
        'from' => '<basepath>/SugarModules/custom/modules/EmailTemplates/EditView.php',
        'to' => 'custom/modules/EmailTemplates/EditView.php',
    ));
}