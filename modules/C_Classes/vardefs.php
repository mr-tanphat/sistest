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

    $dictionary['C_Classes'] = array(
        'table'=>'c_classes',
        'audited'=>true,
        'duplicate_merge'=>true,
        'fields'=>array (
            'class_id' => 
            array (
                'required' => false,
                'name' => 'class_id',
                'vname' => 'LBL_CLASS_ID',
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
                'calculated' => false,
                'len' => '255',
                'size' => '20',
            ),
            'status' => 
            array (
                'required' => false,
                'name' => 'status',
                'vname' => 'LBL_STATUS',
                'type' => 'enum',
                'massupdate' => 0,
                'default' => 'Opening',
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
                'options' => 'status_classes_list',
                'studio' => 'visible',
                'dependency' => false,
            ),
            'number_of_students' => 
            array (
                'required' => false,
                'name' => 'number_of_students',
                'vname' => 'LBL_NUMBER_OF_STUDENTS',
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
                'calculated' => false,
                'len' => '20',
                'size' => '20',
                'enable_range_search' => false,
                'disable_num_format' => '',
                'min' => 0,
                'max' => false,
                'validation' => 
                array (
                    'type' => 'range',
                    'min' => 0,
                    'max' => false,
                ),
            ),
            'max' => 
            array (
                'required' => false,
                'name' => 'max',
                'vname' => 'LBL_MAX',
                'type' => 'enum',
                'massupdate' => 0,
                'default' => '20',
                'no_default' => false,
                'importable' => 'true',
                'reportable' => true,
                'len' => 10,
                'size' => '20',
                'options' => 'capacity_list',
                'studio' => 'visible',
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
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'size' => '20',
                'enable_range_search' => true,
                'options' => 'date_range_search_dom',
                'display_default' => 'now',
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
                'importable' => 'false',
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
            //Bo sung Field Kind Of Course thay the Module Program
            'kind_of_course' => 
            array (
                'name' => 'kind_of_course',
                'vname' => 'LBL_KIND_OF_COURSE',
                'type' => 'enum',
                'comments' => '',
                'help' => '',
                'default' => '',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'len' => 200,
                'size' => '20',
                'options' => 'kind_of_course_360_list',
                'studio' => 'visible',
                'required' => true,
            ),
            //END - Field Kind Of Course
        ),
        'relationships'=>array (
        ),
        'optimistic_locking'=>true,
        'unified_search'=>true,
    );
    if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
    }
    VardefManager::createVardef('C_Classes','C_Classes', array('basic','team_security','assignable'));