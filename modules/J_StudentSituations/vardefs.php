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

$dictionary['J_StudentSituations'] = array(
    'table'=>'j_studentsituations',
    'audited'=>false,
    'duplicate_merge'=>true,
    'fields'=>array (
        'type' =>
        array (
            'required' => true,
            'name' => 'type',
            'vname' => 'LBL_TYPE',
            'type' => 'enum',
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
            'len' => 100,
            'size' => '20',
            'options' => 'type_student_situation_list',
            'studio' => 'visible',
            'dependency' => false,
        ),
        'status' =>
        array (
            'required' => true,
            'name' => 'status',
            'vname' => 'LBL_STATUS',
            'type' => 'enum',
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
            'len' => 50,
            'size' => '20',
            'options' => 'situation_error_status_list',
            'studio' => 'visible',
            'dependency' => false,
        ),
        'student_type' =>
        array (
            'name' => 'student_type',
            'vname' => 'LBL_TYPE_STUDENT',
            'type' => 'enum',
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
            'options' => 'situation_student_type_list',
            'len' => 20,
            'size' => '20',
            'studio' => 'visible',
            'dependency' => false,
        ),
        'no_increasement' =>
        array (
            'name' => 'no_increasement',
            'vname' => 'LBL_INCREASEMENT',
            'type' => 'int',
            'len' => '8',
        ),
        'total_hour' =>
        array (
            'required' => false,
            'name' => 'total_hour',
            'vname' => 'LBL_TOTAL_HOUR',
            'type' => 'decimal',
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
            'len' => '8',
            'size' => '20',
            'enable_range_search' => false,
            'precision' => '2',
        ),
        'start_hour' =>
        array (
            'required' => false,
            'name' => 'start_hour',
            'vname' => 'LBL_START_STUDY_HOUR',
            'type' => 'decimal',
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
            'len' => '8',
            'size' => '20',
            'enable_range_search' => false,
            'precision' => '2',
        ),
        'hour_added_in_session' =>
        array (
            'required' => false,
            'name' => 'hour_added_in_session',
            'vname' => 'LBL_TOTAL_HOUR_IN_CLASS',
            'type' => 'decimal',
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
            'len' => '8',
            'size' => '20',
            'enable_range_search' => false,
            'precision' => '2',
        ),
        'total_amount' =>
        array (
            'required' => false,
            'name' => 'total_amount',
            'vname' => 'LBL_TOTAL_AMOUNT',
            'type' => 'currency',
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
            'len' => 13,
            'size' => '20',
            'enable_range_search' => false,
            'precision' => 2,
            'default' => '',
        ),
        // Moving Class Fields
        'moving_hour' =>
        array (
            'required' => false,
            'name' => 'moving_hour',
            'vname' => 'LBL_MOVING_HOUR',
            'type' => 'decimal',
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
            'len' => '8',
            'size' => '20',
            'enable_range_search' => false,
            'precision' => '2',
        ),
        'before_amount' =>
        array (
            'required' => false,
            'name' => 'before_amount',
            'vname' => 'LBL_BEFORE_AMOUNT',
            'type' => 'decimal',
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
            'len' => '13',
            'size' => '20',
            'enable_range_search' => false,
            'precision' => '2',
        ),
        'before_hour' =>
        array (
            'required' => false,
            'name' => 'before_hour',
            'vname' => 'LBL_BEFORE_HOUR',
            'type' => 'decimal',
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
            'len' => '8',
            'size' => '20',
            'enable_range_search' => false,
            'precision' => '2',
        ),
        'used_hour' =>
        array (
            'required' => false,
            'name' => 'used_hour',
            'vname' => 'LBL_USED_HOUR',
            'type' => 'decimal',
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
            'len' => '8',
            'size' => '20',
            'enable_range_search' => false,
            'precision' => '2',
        ),
        'used_amount' =>
        array (
            'required' => false,
            'name' => 'used_amount',
            'vname' => 'LBL_USED_AMOUNT',
            'type' => 'currency',
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
            'len' => 13,
            'size' => '20',
            'enable_range_search' => false,
            'precision' => 2,
            'default' => '',
        ),
        'remaining_hour' =>
        array (
            'required' => false,
            'name' => 'remaining_hour',
            'vname' => 'LBL_REMAINING_HOUR',
            'type' => 'currency',
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
            'len' => '8',
            'size' => '20',
            'enable_range_search' => false,
            'precision' => 2,
            'default' => '',
        ),
        'moving_amount' =>
        array (
            'required' => false,
            'name' => 'moving_amount',
            'vname' => 'LBL_MOVING_AMOUNT',
            'type' => 'currency',
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
            'len' => 13,
            'size' => '20',
            'enable_range_search' => false,
            'precision' => 2,
            'default' => '',
        ),
        'json_moving' =>
        array (
            'name' => 'json_moving',
            'vname' => 'LBL_JSON_MOVING',
            'type' => 'text',
        ),
        'last_lesson_date' =>
        array (
            'required' => true,
            'name' => 'last_lesson_date',
            'vname' => 'LBL_LAST_LESSON_DATE',
            'type' => 'date',
            'massupdate' => 0,
            'display_default' => 'now',
            'comments' => '',
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
        'move_to_class_date' =>
        array (
            'required' => true,
            'name' => 'move_to_class_date',
            'vname' => 'LBL_MOVE_TO_CLASS_DATE',
            'type' => 'date',
            'massupdate' => 0,
            'display_default' => 'now',
            'comments' => '',
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

        'move_to_class_date_end' =>
        array (
            'required' => true,
            'name' => 'move_to_class_date_end',
            'vname' => 'LBL_MOVE_TO_CLASS_DATE_END',
            'type' => 'date',
            'massupdate' => 0,
            'comments' => '',
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
        //END: Moving Class Fields
        'custom_checkbox' =>
        array (
            'name' => 'custom_checkbox',
            'vname' => 'Checkbox',
            'type'        => 'varchar',
            'len'        => '1',
            'source'    => 'non-db',
            'reportable' => false,
            'studio'=>true,
        ),
        'custom_button' =>
        array (
            'name' => 'custom_button',
            'vname' => 'Button',
            'type' => 'varchar',
            'len' => '1',
            'studio' => 'visible',
            'source' => 'non-db',
        ),
        'phone_situation' =>
        array (
            'name' => 'phone_situation',
            'vname' => 'LBL_PHONE_SITUATION',
            'type' => 'varchar',
            'massupdate' => 0,
            'no_default' => false,
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'len' => 50,
            'size' => '20',
            'studio' => 'visible',
            'dependency' => false,
        ),
        'parent_name' =>
        array (
            'name' => 'parent_name',
            'vname' => 'LBL_PARENT',
            'type' => 'varchar',
            'massupdate' => 0,
            'no_default' => false,
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'len' => 100,
            'size' => '20',
            'studio' => 'visible',
            'dependency' => false,
        ),
        'code_delay' =>
        array (
            'name' => 'code_delay',
            'vname' => 'LBL_CODE_DELAY',
            'type' => 'varchar',
            'massupdate' => 0,
            'no_default' => false,
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'len' => 50,
            'size' => '20',
            'studio' => 'visible',
            'dependency' => false,
        ),
        'remain_amount' =>
        array (
            'name' => 'remain_amount',
            'vname' => 'Remain Amount',
            'type' => 'varchar',
            'len' => '1',
            'studio' => 'visible',
            'source' => 'non-db',
        ),
        'remain_hour' =>
        array (
            'name' => 'remain_hour',
            'vname' => 'Remain Hour',
            'type' => 'varchar',
            'len' => '1',
            'studio' => 'visible',
            'source' => 'non-db',
        ),
        'start_studied' =>
        array (
            'required' => true,
            'name' => 'start_studied',
            'vname' => 'LBL_START_STUDIED',
            'type' => 'date',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => 'Start Study',
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
        'end_studied' =>
        array (
            'required' => true,
            'name' => 'end_studied',
            'vname' => 'LBL_END_STUDIED',
            'type' => 'date',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => 'Start Study',
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
        'start_study' =>
        array (
            'required' => true,
            'name' => 'start_study',
            'vname' => 'LBL_START_STUDY',
            'type' => 'date',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => 'Start Study',
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
        'end_study' =>
        array (
            'required' => true,
            'name' => 'end_study',
            'vname' => 'LBL_END_STUDY',
            'type' => 'date',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => 'End Study',
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

        'settle_from_outstanding_id' => array(
            'name'              => 'settle_from_outstanding_id',
            'vname'             => 'LBL_SETTLE_FROM_OUSTANDING_ID',
            'type'              => 'id',
        ),

        //Custom Relationship JUNIOR. Student  - StudentSituation (1-n)  By Lap Nguyen
        'student_name' => array(
            'required'  => true,
            'source'    => 'non-db',
            'name'      => 'student_name',
            'vname'     => 'LBL_STUDENT_NAME',
            'type'      => 'relate',
            'rname'     => 'name',
            'id_name'   => 'student_id',
            'join_name' => 'contacts',
            'link'      => 'ju_contacts',
            'table'     => 'contacts',
            'isnull'    => 'true',
            'module'    => 'Contacts',
        ),

        'student_id' => array(
            'name'              => 'student_id',
            'rname'             => 'id',
            'vname'             => 'LBL_STUDENT_ID',
            'type'              => 'id',
            'table'             => 'contacts',
            'isnull'            => 'true',
            'module'            => 'Contacts',
            'dbType'            => 'id',
            'reportable'        => false,
            'massupdate'        => false,
            'duplicate_merge'   => 'disabled',
        ),

        'ju_contacts' => array(
            'name'          => 'ju_contacts',
            'type'          => 'link',
            'relationship'  => 'contact_studentsituations',
            'module'        => 'Contacts',
            'bean_name'     => 'Contact',
            'source'        => 'non-db',
            'vname'         => 'LBL_STUDENT_NAME',
        ),
        //Custom Relationship JUNIOR. Payment  - StudentSituation (1-n)  By Lap Nguyen
        'payment_name' => array(
            'required'  => false,
            'source'    => 'non-db',
            'name'      => 'payment_name',
            'vname'     => 'LBL_PAYMENT_NAME',
            'type'      => 'relate',
            'rname'     => 'name',
            'id_name'   => 'payment_id',
            'join_name' => 'payment',
            'link'      => 'ju_payments',
            'table'     => 'j_payment',
            'isnull'    => 'true',
            'module'    => 'J_Payment',
        ),

        'payment_id' => array(
            'name'              => 'payment_id',
            'rname'             => 'id',
            'vname'             => 'LBL_PAYMENT_ID',
            'type'              => 'id',
            'table'             => 'j_payment',
            'isnull'            => 'true',
            'module'            => 'J_Payment',
            'dbType'            => 'id',
            'reportable'        => false,
            'massupdate'        => false,
            'duplicate_merge'   => 'disabled',
        ),

        'ju_payments' => array(
            'name'          => 'ju_payments',
            'type'          => 'link',
            'relationship'  => 'j_payment_studentsituations',
            'module'        => 'J_Payment',
            'bean_name'     => 'J_Payment',
            'source'        => 'non-db',
            'vname'         => 'LBL_PAYMENT_NAME',
        ),

        //Custom Relationship JUNIOR. Class  - StudentSituation (1-n)  By Lap Nguyen
        'ju_class_name' => array(
            'required'  => true,
            'source'    => 'non-db',
            'name'      => 'ju_class_name',
            'vname'     => 'LBL_JU_CLASS_NAME',
            'type'      => 'relate',
            'rname'     => 'name',
            'id_name'   => 'ju_class_id',
            'join_name' => 'j_class',
            'link'      => 'junior_class_link',
            'table'     => 'j_class',
            'isnull'    => 'true',
            'module'    => 'J_Class',
        ),

        'ju_class_id' => array(
            'name'              => 'ju_class_id',
            'rname'             => 'id',
            'vname'             => 'LBL_JU_CLASS_ID',
            'type'              => 'id',
            'table'             => 'j_class',
            'isnull'            => 'true',
            'module'            => 'J_Class',
            'dbType'            => 'id',
            'reportable'        => false,
            'massupdate'        => false,
            'duplicate_merge'   => 'disabled',
        ),

        'junior_class_link' => array(
            'name'          => 'junior_class_link',
            'type'          => 'link',
            'relationship'  => 'j_class_studentsituations',
            'module'        => 'J_Class',
            'bean_name'     => 'J_Class',
            'source'        => 'non-db',
            'vname'         => 'LBL_JU_CLASS_NAME',
        ),

        // Add Relationship Situation Delay - Payment (1 - n) - Left Side (n)
        'payment_delay_link' => array(
            'name' => 'payment_delay_link',
            'type' => 'link',
            'relationship' => 'situation_delay_payment_delay',
            'source' => 'non-db',
            'vname' => 'LBL_DELAY_SITUATION_NAME',
        ),

        //Custom Relationship JUNIOR. From StudentSituation  - StudentSituation (1-n): Function Move Class  By Lap Nguyen
        'relate_situation_name' => array(
            'required'  => true,
            'source'    => 'non-db',
            'name'      => 'relate_situation_name',
            'vname'     => 'LBL_RELATE_SITUATION',
            'type'      => 'relate',
            'rname'     => 'name',
            'id_name'   => 'relate_situation_id',
            'join_name' => 'j_studentsituations',
            'link'      => 'relate_situation_n',
            'table'     => 'j_studentsituations',
            'isnull'    => 'true',
            'module'    => 'J_StudentSituations',
        ),

        'relate_situation_id' => array(
            'name'              => 'relate_situation_id',
            'rname'             => 'id',
            'vname'             => 'LBL_RELATE_SITUATION_ID',
            'type'              => 'id',
            'table'             => 'j_studentsituations',
            'isnull'            => 'true',
            'module'            => 'J_StudentSituations',
            'dbType'            => 'id',
            'reportable'        => false,
            'massupdate'        => false,
            'duplicate_merge'   => 'disabled',
        ),

        'relate_situation_n' => array(
            'name'          => 'relate_situation_n',
            'type'          => 'link',
            'relationship'  => 'relate_situation',
            'module'        => 'J_StudentSituations',
            'bean_name'     => 'J_StudentSituations',
            'source'        => 'non-db',
            'vname'         => 'LBL_RELATE_SITUATION',
        ),
        //Custom Relationship JUNIOR. J_StudentSituations - Student Situation  By Lap Nguyen
        'relate_situation_1'=>array(
            'name' => 'relate_situation_1',
            'type' => 'link',
            'relationship' => 'relate_situation',
            'module' => 'J_StudentSituations',
            'bean_name' => 'J_StudentSituations',
            'source' => 'non-db',
            'vname' => 'LBL_RELATE_SITUATION',
        ),

        //Custom Relationship JUNIOR. From Class  - StudentSituation (1-n): Function Move Class  By Lap Nguyen
        'move_to_class' => array(
            'required'  => true,
            'source'    => 'non-db',
            'name'      => 'move_to_class',
            'vname'     => 'LBL_MOVE_TO_CLASS_NAME',
            'type'      => 'relate',
            'rname'     => 'name',
            'id_name'   => 'move_class_id',
            'join_name' => 'j_class',
            'link'      => 'move_classes',
            'table'     => 'j_class',
            'isnull'    => 'true',
            'module'    => 'J_Class',
        ),

        'move_class_id' => array(
            'name'              => 'move_class_id',
            'rname'             => 'id',
            'vname'             => 'LBL_MOVE_TO_CLASS_ID',
            'type'              => 'id',
            'table'             => 'j_class',
            'isnull'            => 'true',
            'module'            => 'J_Class',
            'dbType'            => 'id',
            'reportable'        => false,
            'massupdate'        => false,
            'duplicate_merge'   => 'disabled',
        ),

        'move_classes' => array(
            'name'          => 'move_classes',
            'type'          => 'link',
            'relationship'  => 'move_classes_studentsituations',
            'module'        => 'J_Class',
            'bean_name'     => 'J_Class',
            'source'        => 'non-db',
            'vname'         => 'LBL_MOVE_TO_CLASS_NAME',
        ),
        //Custom Relationship JUNIOR. Lead  - StudentSituation (1-n)  By Nhi Vo
        'lead_name' => array(
            'required'  => false,
            'source'    => 'non-db',
            'name'      => 'lead_name',
            'vname'     => 'LBL_LEAD_NAME',
            'type'      => 'relate',
            'rname'     => 'name',
            'id_name'   => 'lead_id',
            'join_name' => 'leads',
            'link'      => 'ju_leads',
            'table'     => 'leads',
            'isnull'    => 'true',
            'module'    => 'Leads',
        ),

        'lead_id' => array(
            'name'              => 'lead_id',
            'rname'             => 'id',
            'vname'             => 'LBL_LEAD_ID',
            'type'              => 'id',
            'table'             => 'leads',
            'isnull'            => 'true',
            'module'            => 'Leads',
            'dbType'            => 'id',
            'reportable'        => false,
            'massupdate'        => false,
            'duplicate_merge'   => 'disabled',
        ),

        'ju_leads' => array(
            'name'          => 'ju_leads',
            'type'          => 'link',
            'relationship'  => 'lead_studentsituations',
            'module'        => 'Leads',
            'bean_name'     => 'Lead',
            'source'        => 'non-db',
            'vname'         => 'LBL_LEAD_NAME',
        ),
        //Fake Field Student ID, Name , Mobile, Email Status
        'student_id_fake' =>
        array (
            'required' => false,
            'name' => 'student_id_fake',
            'vname' => 'LBL_STUDENT_ID_FAKE',
            'type' => 'varchar',
            'reportable' => true,
            'len' => '50',
        ),
        'email_fake' =>
        array (
            'required' => false,
            'name' => 'email_fake',
            'vname' => 'LBL_EMAIL_FAKE',
            'type' => 'varchar',
            'reportable' => true,
            'len' => '100',
        ),
        'status_fake' =>
        array (
            'required' => false,
            'name' => 'status_fake',
            'vname' => 'LBL_STATUS_FAKE',
            'type' => 'varchar',
            'reportable' => true,
            'len' => '50',
        ),
        'birthdate_fake' =>
        array (
            'name' => 'birthdate_fake',
            'vname' => 'LBL_BIRTHDATE_FAKE',
            'type' => 'date',
            'reportable' => true,
            'size' => '20',
        ),
        // Relationship Situation ( 1 - n ) Delivery Revenue - Lap Nguyen
        'ju_delivery' => array(
            'name'          => 'ju_delivery',
            'type'          => 'link',
            'relationship'  => 'situation_revenues',
            'module'        => 'C_DeliveryRevenue',
            'bean_name'     => 'C_DeliveryRevenue',
            'source'        => 'non-db',
            'vname'         => 'LBL_DELIVERY_REVENUE',
        ),
        'meetings'=>
        array (
            'name' => 'meetings',
            'type' => 'link',
            'relationship' => 'meetings_situations',
            'source' => 'non-db',
            'vname' => 'LBL_MEETINGS',
        ),
    ),
    'indices' => array (
        array(
            'name' => 'idx_student_id',
            'type' => 'index',
            'fields'=> array('student_id'),
        ),
        array(
            'name' => 'idx_payment_id',
            'type' => 'index',
            'fields'=> array('payment_id'),
        ),
        array(
            'name' => 'idx_ju_class_id',
            'type' => 'index',
            'fields'=> array('ju_class_id'),
        ),
    ),
    'relationships'=>array (
        // Relationship Situation ( 1 - n ) Delivery Revenue - Lap Nguyen
        'situation_revenues' => array(
            'lhs_module'        => 'J_StudentSituations',
            'lhs_table'            => 'j_studentsituations',
            'lhs_key'            => 'id',
            'rhs_module'        => 'C_DeliveryRevenue',
            'rhs_table'            => 'c_deliveryrevenue',
            'rhs_key'            => 'situation_id',
            'relationship_type'    => 'one-to-many',
        ),

        //Custom Relationship JUNIOR. J_StudentSituations - J_StudentSituations  By Lap Nguyen
        'relate_situation' => array(
            'lhs_module'        => 'J_StudentSituations',
            'lhs_table'            => 'j_studentsituations',
            'lhs_key'            => 'id',
            'rhs_module'        => 'J_StudentSituations',
            'rhs_table'            => 'j_studentsituations',
            'rhs_key'            => 'relate_situation_id',
            'relationship_type'    => 'one-to-many',
        ),
        //Add Relationship Situation Delay - Payment Delay (1 - n)
        'situation_delay_payment_delay' => array(
            'lhs_module' => 'J_StudentSituations',
            'lhs_table' => 'j_studentsituations',
            'lhs_key' => 'id',
            'rhs_module' => 'J_Payment',
            'rhs_table' => 'j_payment',
            'rhs_key' => 'delay_situation_id',
            'relationship_type' => 'one-to-many'
        ),
    ),
    'optimistic_locking'=>true,
    'unified_search'=>true,
);
if (!class_exists('VardefManager')){
    require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('J_StudentSituations','J_StudentSituations', array('basic','team_security','assignable'));