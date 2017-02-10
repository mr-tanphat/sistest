<?php

/**
 * survey table structure
 * 
 * LICENSE: The contents of this file are subject to the license agreement ("License") which is included
 * in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
 * agreed to the terms and conditions of the License, and you may not use this file except in compliance
 * with the License.
 *
 * @author     Original Author Biztech Co.
 */
$dictionary['bc_survey'] = array(
    'table' => 'bc_survey',
    'audited' => true,
    'duplicate_merge' => true,
    'fields' => array(
        'name' =>
        array(
            'name' => 'name',
            'vname' => 'LBL_NAME',
            'type' => 'name',
            'link' => true,
            'dbType' => 'varchar',
            'len' => '255',
            'unified_search' => false,
            'full_text_search' =>
            array(
                'boost' => 3,
            ),
            'required' => true,
            'importable' => 'required',
            'duplicate_merge' => 'disabled',
            'merge_filter' => 'disabled',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => '',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'size' => '20',
        ),
        'email_template_subject' =>
        array(
            'name' => 'email_template_subject',
            'vname' => 'LBL_EMAIL_TEMPLATE_SUBJECT',
            'type' => 'name',
            'link' => true,
            'dbType' => 'varchar',
            'len' => '255',
            'unified_search' => false,
            'full_text_search' =>
            array(
                'boost' => 3,
            ),
            'required' => true,
            'importable' => 'required',
            'duplicate_merge' => 'disabled',
            'merge_filter' => 'disabled',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => '',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'size' => '20',
        ),
        'logo' =>
        array(
            'required' => false,
            'name' => 'logo',
            'vname' => 'LBL_LOGO',
            'type' => 'varchar',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'len' => '255',
            'size' => '20',
        ),
        'start_date' =>
        array(
            'required' => false,
            'name' => 'start_date',
            'vname' => 'LBL_START_DATE',
            'type' => 'datetimecombo',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'size' => '20',
            'enable_range_search' => false,
            'dbType' => 'datetime',
        ),
        'end_date' =>
        array(
            'required' => false,
            'name' => 'end_date',
            'vname' => 'LBL_END_DATE',
            'type' => 'datetimecombo',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'size' => '20',
            'enable_range_search' => false,
            'dbType' => 'datetime',
        ),
        'theme' =>
        array(
            'required' => false,
            'name' => 'theme',
            'vname' => 'LBL_THEME',
            'type' => 'varchar',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'len' => '255',
            'size' => '20',
        ),
        'email_template' =>
        array(
            'required' => false,
            'name' => 'email_template',
            'vname' => 'LBL_EMAIL_TEMPLATE',
            'type' => 'text',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'size' => '20',
            'studio' => 'visible',
            'rows' => '4',
            'cols' => '20',
        ),
        'survey_page' =>
        array(
            'name' => 'survey_page',
            'vname' => 'LBL_SURVEY_PAGE',
            'source' => 'non-db',
            'type' => 'AddSurveyPagefield',
            'inline_edit' => false,
        ),
        'redirect_url' =>
        array(
            'name' => 'redirect_url',
            'vname' => 'LBL_REDIRECT_URL',
            'type' => 'url',
            'dbType' => 'varchar',
            'len' => 255,
            'comment' => 'URL of redirect after survey is submitted',
        ),
        'is_progress' =>
        array(
            'required' => false,
            'name' => 'is_progress',
            'vname' => 'LBL_IS_PROGRESS',
            'type' => 'bool',
            'massupdate' => 0,
            'default' => '1',
            'no_default' => false,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'len' => '255',
            'studio' => 'visible',
            'size' => '20',
        ),
        'base_score' =>
        array(
            'required' => false,
            'name' => 'base_score',
            'vname' => 'LBL_BASE_SCORE',
            'type' => 'int',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'len' => '11',
            'size' => '20',
            'studio' => 'visible',
        ),
        'allowed_resubmit_count' =>
        array(
            'required' => false,
            'name' => 'allowed_resubmit_count',
            'vname' => 'LBL_ALLOWED_RESUBMIT_COUNT',
            'type' => 'int',
            'dbType' => 'varchar',
            'massupdate' => 0,
            'default' => '1',
            'no_default' => false,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'len' => 11,
            'size' => '20',
            'studio' => 'visible',
            'dependency' => false,
    ),
    ),
    'relationships' => array(
    ),
    'optimistic_locking' => true,
    'unified_search' => true,
);
if (!class_exists('VardefManager')) {
    require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('bc_survey', 'bc_survey', array('basic', 'assignable'));