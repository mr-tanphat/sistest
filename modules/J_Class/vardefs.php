<?php
/*********************************************************************************
* By installing or using this file, you are confirming on behalf of the entity
* subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
* the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
* http://www.sugarcrm.com/master-subscription-agreement
*
* If Company is not bound by the MSA, then by installing or using this file
* you are agreeing unconditionally that Company will be bound by the MSA and
* certifying that you have authority to bind Company accordingly.
*
* Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
********************************************************************************/

$dictionary['J_Class'] = array(
    'table'=>'j_class',
    'audited'=>true,
    'unified_search' => true, 'full_text_search' => true, 'unified_search_default_enabled' => true,
    'duplicate_merge'=>true, 
    'fields'=>array (
        'kind_of_course_adult' => array (
            'required' => true,
            'name' => 'kind_of_course_adult',
            'vname' => 'LBL_KIND_OF_COURSE',
            'type' => 'enum',
            'massupdate' => 0,
            'default' => '',
            'no_default' => false,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => true,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'len' => 100,
            'size' => '20',
            'options' => 'kind_of_course_360_list',
            'studio' => 'visible',
            'dependency' => false,
        ),
        'class_type_adult' => 
        array (
            'required' => true,
            'name' => 'class_type_adult',
            'vname' => 'LBL_CLASS_TYPE',
            'type' => 'enum',
            'massupdate' => 0,
            'default' => '',
            'no_default' => false,
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'len' => 100,
            'size' => '20',
            'options' => 'class_type_list',
            'studio' => 'visible',
            'dependency' => false,
        ),
        'period' => 
        array (
            'required' => false,
            'name' => 'period',
            'vname' => 'LBL_PERIOD',
            'type' => 'enum',
            'massupdate' => 0,
            'default' => '',
            'no_default' => false,
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'len' => 100,
            'size' => '20',
            'options' => 'period_junior_program_list',
            'studio' => 'visible',
            'dependency' => false,
        ),
        'class_code' => 
        array (
            'required' => false,
            'name' => 'class_code',
            'vname' => 'LBL_CLASS_CODE',
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
            'unified_search' => true,
            'full_text_search' => array('boost' => 3),
            'merge_filter' => 'disabled',
            'calculated' => false,
            'len' => '50',
            'size' => '20',
        ),
        'status' => 
        array (
            'required' => false,
            'name' => 'status',
            'vname' => 'LBL_STATUS',
            'type' => 'enum',
            'massupdate' => 0,
            'default' => 'Planning',
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
            'calculated' => false,
            'len' => 100,
            'size' => '20',
            'options' => 'status_class_list',
            'studio' => 'visible',
            'dependency' => false,
        ),
        'max_size' => 
        array (
            'required' => false,
            'name' => 'max_size',
            'vname' => 'LBL_MAX_SIZE',
            'type' => 'enum',
            'massupdate' => 0,
            'default' => '20',
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
            'calculated' => false,
            'len' => 100,
            'size' => '20',
            'options' => 'maxsize_class_list',
            'studio' => 'visible',
            'dependency' => false,
        ),
        'hours' => 
        array (
            'required' => false,
            'name' => 'hours',
            'vname' => 'LBL_HOURS',
            'type' => 'decimal',
            'massupdate' => 0,
            'comments' => '',
            'help' => 'Hours Decimal',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'len' => '6',
            'size' => '20',
            'enable_range_search' => true,
            'options' => 'numeric_range_search_dom',
            'precision' => '1',
            'default' => '',
        ),
        'lesson_test_2' => 
        array (
            'required' => false,
            'name' => 'lesson_test_2',
            'vname' => 'LBL_LESSON_TEST_2',
            'type' => 'int',
            'dbType' => 'varchar',
            'len' => '5',
            'enable_range_search' => true,
            'options' => 'numeric_range_search_dom',
        ),
        'lesson_test_1' => 
        array (
            'required' => false,
            'name' => 'lesson_test_1',
            'vname' => 'LBL_LESSON_TEST_1',
            'type' => 'int',
            'dbType' => 'varchar',
            'len' => '5',
            'enable_range_search' => true,
            'options' => 'numeric_range_search_dom',

        ),
        'number_of_session' => 
        array (
            'required' => false,
            'name' => 'number_of_session',
            'vname' => 'LBL_NUMBER_OF_LESSON',
            'type' => 'int',
            'massupdate' => 0,
            'default' => '',
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'len' => '5',
            'size' => '20',
            'enable_range_search' => false,
            'disable_num_format' => '',
        ),
        'number_of_student' => 
        array (
            'required' => false,
            'name' => 'number_of_student',
            'vname' => 'LBL_NUMBER_OF_STUDENT',
            'type' => 'varchar',
            'len' => '5',
            'size' => '20',
            'source' => 'non-db',
        ),
        'lesson_final_test' => 
        array (
            'required' => false,
            'name' => 'lesson_final_test',
            'vname' => 'LBL_LESSON_FINAL_TEST',
            'type' => 'int',
            'dbType' => 'varchar',
            'len' => '5',
            'enable_range_search' => true,
            'options' => 'numeric_range_search_dom',
        ),
        'test_1_date' => 
        array (
            'name' => 'test_1_date',
            'vname' => 'LBL_TEST_1_DATE',
            'type' => 'date',
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
            'calculated' => false,
            'size' => '20',
            'enable_range_search' => true,
            'options' => 'date_range_search_dom',
        ),
        'test_2_date' => 
        array (
            'name' => 'test_2_date',
            'vname' => 'LBL_TEST_2_DATE',
            'type' => 'date',
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
            'calculated' => false,
            'size' => '20',
            'enable_range_search' => true,
            'options' => 'date_range_search_dom',
        ),
        'final_test_date' => 
        array (
            'name' => 'final_test_date',
            'vname' => 'LBL_FINAL_TEST_DATE',
            'type' => 'date',
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
            'calculated' => false,
            'size' => '20',
            'enable_range_search' => true,
            'options' => 'date_range_search_dom',
        ),
        'start_date' => 
        array (
            'required' => true,
            'name' => 'start_date',
            'vname' => 'LBL_START_DATE',
            'type' => 'date',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => true,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'size' => '20',
            'enable_range_search' => true,
            'options' => 'date_range_search_dom',
        ),
        'end_date' => 
        array (
            'required' => true,
            'name' => 'end_date',
            'vname' => 'LBL_END_DATE',
            'type' => 'date',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => true,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'size' => '20',
            'enable_range_search' => true,
            'options' => 'date_range_search_dom',
        ),
        'closed_date' => 
        array (
            'required' => true,
            'name' => 'closed_date',
            'vname' => 'LBL_CLOSED_DATE',
            'type' => 'date',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => true,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'size' => '20',
            'enable_range_search' => true,
            'options' => 'date_range_search_dom',
        ),
        'change_date_from' => 
        array (
            'required' => false,
            'name' => 'change_date_from',
            'vname' => 'LBL_CHANGE_DATE_FROM',
            'type' => 'date',
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
            'calculated' => false,
            'size' => '20',
            'enable_range_search' => true,
            'options' => 'date_range_search_dom',
        ),
        'change_date_to' => 
        array (
            'required' => false,
            'name' => 'change_date_to',
            'vname' => 'LBL_CHANGE_DATE_TO',
            'type' => 'date',
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
            'calculated' => false,
            'size' => '20',
            'enable_range_search' => true,
            'options' => 'date_range_search_dom',
        ),
        'kind_of_course' => 
        array (
            'required' => true,
            'name' => 'kind_of_course',
            'vname' => 'LBL_KIND_OF_COURSE',
            'type' => 'enum',
            'massupdate' => 0,
            'default' => '',
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
            'calculated' => false,
            'len' => 100,
            'size' => '20',
            'options' => 'kind_of_course_junior_program_list',
            'studio' => 'visible',
            'dependency' => false,
        ),
        //Bổ sung quan hệ  Kind of Course - Class
        'koc_name' => 
        array(
            'required'  => true,
            'source'    => 'non-db',
            'name'      => 'koc_name',
            'vname'     => 'LBL_KOC_NAME',
            'type'      => 'relate',
            'rname'     => 'name',
            'id_name'   => 'koc_id',
            'join_name' => 'j_kindofcourse',
            'link'      => 'kindofcourse_class',
            'table'     => 'j_kindofcourse',
            'isnull'    => 'true',
            'module'    => 'J_Kindofcourse',
        ),
        'koc_id' => 
        array(
            'name'              => 'koc_id',
            'rname'             => 'id',
            'vname'             => 'LBL_KOC_ID',
            'type'              => 'id',
            'table'             => 'j_kindofcourse',
            'isnull'            => 'true',
            'module'            => 'J_Kindofcourse',
            'dbType'            => 'id',
            'reportable'        => false,
            'massupdate'        => false,
            'duplicate_merge'   => 'disabled',
        ),
        'kindofcourse_class' => 
        array(
            'name'          => 'kindofcourse_class',
            'type'          => 'link',
            'relationship'  => 'kindofcourse_class',
            'module'        => 'J_Kindofcourse',
            'bean_name'     => 'J_Kindofcourse',
            'source'        => 'non-db',
            'vname'         => 'LBL_KOC_NAME',
        ),
        'level' => 
        array (
            'required' => true,
            'name' => 'level',
            'vname' => 'LBL_LEVEL',
            'type' => 'multienum',
            'massupdate' => 0,
            'default' => '',
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
            'calculated' => false,
            'size' => '20',
            'options' => 'level_junior_program_list',
            'studio' => 'visible',
            'dependency' => false,
        ),
        'modules' => 
        array (
            'required' => false,
            'name' => 'modules',
            'vname' => 'LBL_MODULE',
            'type' => 'enum',
            'massupdate' => 0,
            'default' => '',
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
            'calculated' => false,
            'len' => 100,
            'size' => '20',
            'options' => 'module_junior_program_list',
            'studio' => 'visible',
            'dependency' => false,
        ),
        'content' =>
        array (
            'name' => 'content',
            'vname' => 'LBL_CONTENT',
            'type' => 'longtext',
            'reportable' => false,
        ),
        'content_2' =>
        array (
            'name' => 'content_2',
            'vname' => 'LBL_CONTENT_2',
            'type' => 'longtext',
            'reportable' => false,
        ),
        'change_reason'=>
        array(
            'name'=>'change_reason',
            'vname'=>'LBL_CHANGE_REASON',
            'type'=>'text',
            'comment'=>'',
            'rows' => 4,
            'cols' => 60,
            'audited' => true,
        ),
        'isupgrade' => 
        array (
            'name' => 'isupgrade',
            'vname' => 'LBL_ISUPGRADE',
            'type' => 'bool',
            'audited' => false,
            'reportable' => true,
        ),
        'is_weekday' => 
        array (
            'name' => 'is_weekday',
            'vname' => 'LBL_ISWEEKDAY',
            'type' => 'bool',
            'audited' => false,
            'reportable' => true,
        ),
        'is_lateshift' => 
        array (
            'name' => 'is_lateshift',
            'vname' => 'LBL_ISLATESHIFT',
            'type' => 'bool',
            'audited' => false,
            'reportable' => true,
        ),
        'history' =>
        array (
            'name' => 'history',
            'vname' => 'LBL_HISTORY',
            'type' => 'longtext',
            'reportable' => false,
        ),
        'main_schedule' =>
        array (
            'name' => 'main_schedule',
            'vname' => 'LBL_MAIN_SCHEDULE',
            'type' => 'longtext',
            'reportable' => true,
        ),
        'short_schedule' =>
        array (
            'name' => 'short_schedule',
            'vname' => 'LBL_SHORT_SCHEDULE',
            'type' => 'text',
            'reportable' => true,
        ),
        'class_type' => 
        array (
            'required' => false,
            'name' => 'class_type',
            'vname' => 'LBL_CLASS_TYPE',
            'type' => 'enum',
            'massupdate' => 0,
            'default' => 'Normal Class',
            'no_default' => false,
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'len' => 100,
            'size' => '20',
            'options' => 'type_class_list',
            'studio' => 'visible',
            'dependency' => false,
        ),
        'class_time_type' => 
        array (
            'required' => false,
            'name' => 'class_time_type',
            'vname' => 'LBL_CLASS_TIME_TYPE',
            'type' => 'enum',
            'massupdate' => 0,
            'default' => '',
            'no_default' => false,
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'len' => 100,
            'size' => '20',
            'options' => 'class_time_type_list',
            'studio' => 'visible',
            'dependency' => false,
        ),
        'date' => 
        array (
            'required' => true,
            'name' => 'date',
            'vname' => 'LBL_DATE',
            'type' => 'date',
            'massupdate' => 0,
            'no_default' => false,
            'importable' => 'false',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'size' => '20',
            'enable_range_search' => true,
            'options' => 'date_range_search_dom',
        ),
        //Custom Relationship JUNIOR. Class - Meeting  By Lap Nguyen
        'ju_meetings'=>array(
            'name' => 'ju_meetings',
            'type' => 'link',
            'relationship' => 'j_class_meetings',
            'module' => 'Meetings',
            'bean_name' => 'Meetings',
            'source' => 'non-db',
            'vname' => 'LBL_JU_MEETING',
        ),

        //Custom Relationship JUNIOR. Class - Student Situation  By Lap Nguyen
        'ju_studentsituations'=>array(
            'name' => 'ju_studentsituations',
            'type' => 'link',
            'relationship' => 'j_class_studentsituations',
            'module' => 'J_StudentSituations',
            'bean_name' => 'J_StudentSituations',
            'source' => 'non-db',
            'vname' => 'LBL_STUDENT_SITUATION',
        ),

        //Custom Relationship JUNIOR. Move Class - Student Situation  Function: Move Class  By Lap Nguyen
        'ju_studentsituations_move_class'=>array(
            'name' => 'ju_studentsituations_move_class',
            'type' => 'link',
            'relationship' => 'move_classes_studentsituations',
            'module' => 'J_StudentSituations',
            'bean_name' => 'J_StudentSituations',
            'source' => 'non-db',
            'vname' => 'LBL_STUDENT_SITUATION_MOVE_CLASS',
        ),
        // ******** TASK IMPORT ***********************
        'aims_id' => 
        array (
            'required' => false,
            'name' => 'aims_id',
            'vname' => 'LBL_AIMS_ID',
            'type' => 'varchar',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => 'AIMS ID Int',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'unified_search' => true,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'len' => '10',
            'size' => '20',
            'enable_range_search' => true,
            'options' => 'numeric_range_search_dom',
            'disable_num_format' => true,
        ),
        'upgrade_aims_id' => 
        array (
            'required' => false,
            'name' => 'upgrade_aims_id',
            'vname' => 'LBL_UPGRADE_AIMS_ID',
            'type' => 'int',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => 'AIMS ID Int',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'len' => '10',
            'size' => '20',
            'enable_range_search' => true,
            'options' => 'numeric_range_search_dom',
            'disable_num_format' => true,
        ),
        // ******** END: TASK IMPORT ***********************
    ),
    'indices' => array (
        array(
            'name' => 'aims_id',
            'type' => 'index',
            'fields'=> array('aims_id'),
        ),
    ),
    'relationships'=>array (
        //Custom Relationship JUNIOR. Class - Meeting  By Lap Nguyen
        'j_class_meetings' => array(
            'lhs_module'        => 'J_Class',
            'lhs_table'            => 'j_class',
            'lhs_key'            => 'id',
            'rhs_module'        => 'Meetings',
            'rhs_table'            => 'meetings',
            'rhs_key'            => 'ju_class_id',
            'relationship_type'    => 'one-to-many',
        ),

        //Custom Relationship JUNIOR. Class - Student Situation  By Lap Nguyen
        'j_class_studentsituations' => array(
            'lhs_module'        => 'J_Class',
            'lhs_table'            => 'j_class',
            'lhs_key'            => 'id',
            'rhs_module'        => 'J_StudentSituations',
            'rhs_table'            => 'j_studentsituations',
            'rhs_key'            => 'ju_class_id',
            'relationship_type'    => 'one-to-many',
        ),

        //Custom Relationship JUNIOR. Move Class - Student Situation. Function: Move Class  By Lap Nguyen
        'move_classes_studentsituations' => array(
            'lhs_module'        => 'J_Class',
            'lhs_table'            => 'j_class',
            'lhs_key'            => 'id',
            'rhs_module'        => 'J_StudentSituations',
            'rhs_table'            => 'j_studentsituations',
            'rhs_key'            => 'move_class_id',
            'relationship_type'    => 'one-to-many',
        ),
    ),
    'optimistic_locking'=>true,
    'unified_search'=>true,
);
if (!class_exists('VardefManager')){
    require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('J_Class','J_Class', array('basic','team_security','assignable'));