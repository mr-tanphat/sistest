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

    $dictionary['J_Targetconfig'] = array(
        'table'=>'j_targetconfig',
        'audited'=>true,
        'duplicate_merge'=>true,
        'fields'=>array (
            'type_targetconfig_list' => 
            array (
                'required' => false,
                'name' => 'type_targetconfig_list',
                'vname' => 'LBL_TYPE_TARGETCONFIG_LIST',
                'type' => 'enum',
                'massupdate' => 0,
                'default' => 'New Sale',
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
                'options' => 'type_targetconfig_list',
                'studio' => 'visible',
                'dependency' => false,
            ),
            'year' => 
            array (
                'required' => false,
                'name' => 'year',
                'vname' => 'LBL_YEAR',
                'type' => 'varchar',
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
                'len' => '255',
                'size' => '20',
            ),
            'month' => 
            array (
                'required' => false,
                'name' => 'month',
                'vname' => 'LBL_MONTH',
                'type' => 'varchar',
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
                'len' => '255',
                'size' => '20',
            ),
            'input_value' => 
            array (
                'required' => false,
                'name' => 'input_value',
                'vname' => 'LBL_INPUT_VALUE',
                'type' => 'varchar',
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
                'len' => '255',
                'size' => '20',
            ),
            'year_targetconfig_list' => 
            array (
                'name'=> 'year_targetconfig_list',
                'vname' => 'LBL_YEAR_TARGETCONFIG_LIST',
                'type'  => 'enum',
                'options' => 'year_targetconfig_list',
                'massupdate' => 0,
                'audited' => false,
            ),
            'date_marketing' => 
            array (
                'name' => 'date_marketing',
                'vname' => 'LBL_DATE_MARKETING',
                'type' => 'date',
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

        ),
        'relationships'=>array (
        ),
        'optimistic_locking'=>true,
        'unified_search'=>true,
    );
    if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
    }
    VardefManager::createVardef('J_Targetconfig','J_Targetconfig', array('basic','team_security','assignable'));