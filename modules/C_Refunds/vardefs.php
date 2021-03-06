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

    $dictionary['C_Refunds'] = array(
        'table'=>'c_refunds',
        'audited'=>true,
        'fields'=>array (
            'refund_amount' => 
            array (
                'required' => false,
                'name' => 'refund_amount',
                'vname' => 'LBL_REFUND_AMOUNT',
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
                'len' => 26,
                'size' => '20',
                'enable_range_search' => false,
                'options' => 'numeric_range_search_dom',
                'precision' => 6,
            ),
            'currency_id' => 
            array (
                'required' => false,
                'name' => 'currency_id',
                'vname' => 'LBL_CURRENCY',
                'type' => 'currency_id',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => 0,
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'len' => 36,
                'size' => '20',
                'dbType' => 'id',
                'studio' => 'visible',
                'function' => 
                array (
                    'name' => 'getCurrencyDropDown',
                    'returns' => 'html',
                ),
            ),
            'description' => 
            array (
                'name' => 'description',
                'vname' => 'LBL_DESCRIPTION',
                'type' => 'text',
                'comment' => 'Full text of the note',
                'rows' => '6',
                'cols' => '80',
                'required' => true,
                'massupdate' => 0,
                'no_default' => false,
                'comments' => 'Full text of the note',
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
                'studio' => 'visible',
            ),
            'refond_method' => 
            array (
                'required' => false,
                'name' => 'refond_method',
                'vname' => 'LBL_REFOND_METHOD',
                'type' => 'radioenum',
                'massupdate' => 0,
                'default' => 'Cash',
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
                'options' => 'menthod_payments_list',
                'studio' => 'visible',
                'dbType' => 'enum',
            ),
            'refund_address_street' => 
            array (
                'required' => false,
                'name' => 'refund_address_street',
                'vname' => 'LBL_REFUND_ADDRESS_STREET',
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
                'group' => 'refund_address',
            ),
            'refund_address_city' => 
            array (
                'required' => false,
                'name' => 'refund_address_city',
                'vname' => 'LBL_REFUND_ADDRESS_CITY',
                'type' => 'varchar',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => 0,
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'len' => 100,
                'size' => '20',
                'group' => 'refund_address',
            ),
            'refund_address_state' => 
            array (
                'required' => false,
                'name' => 'refund_address_state',
                'vname' => 'LBL_REFUND_ADDRESS_STATE',
                'type' => 'varchar',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => 0,
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'len' => 100,
                'size' => '20',
                'group' => 'refund_address',
            ),
            'refund_address_postalcode' => 
            array (
                'required' => false,
                'name' => 'refund_address_postalcode',
                'vname' => 'LBL_REFUND_ADDRESS_POSTALCODE',
                'type' => 'varchar',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => 0,
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'len' => 20,
                'size' => '20',
                'group' => 'refund_address',
            ),
            'refund_address_country' => 
            array (
                'required' => false,
                'name' => 'refund_address_country',
                'vname' => 'LBL_REFUND_ADDRESS_COUNTRY',
                'type' => 'varchar',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => 0,
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'len' => 100,
                'size' => '20',
                'group' => 'refund_address',
            ),
            'amount_usd' => 
            array (
                'required' => false,
                'name' => 'amount_usd',
                'vname' => 'LBL_AMOUNT_USD',
                'type' => 'currency',
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
                'len' => 26,
                'size' => '20',
                'enable_range_search' => false,
                'precision' => 6,
            ),
            'document_name' => 
            array (
                'name' => 'document_name',
                'vname' => 'LBL_NAME',
                'type' => 'name',
                'link' => true,
                'dbType' => 'varchar',
                'len' => '100',
                'required' => false,
                'unified_search' => false,
                'full_text_search' => 
                array (
                    'boost' => 3,
                ),
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'size' => '20',
            ),
            'amount_in_words' => 
            array (
                'required' => false,
                'name' => 'amount_in_words',
                'vname' => 'LBL_AMOUNT_IN_WORDS',
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
                'len' => '300',
                'size' => '20',
            ),
            'refund_date' => 
            array (
                'required' => true,
                'name' => 'refund_date',
                'vname' => 'LBL_REFUND_DATE',
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
            //Add field - 12/08/2014 - by MTN
            'refund_type' =>
            array (
                'name' => 'refund_type',
                'vname' => 'LBL_REFUND_TYPE',
                'type' => 'enum',
                'len' => '100',
                'default' => 'Normal',
                'options' => 'refund_type_dom',
            ),
            'center_id' =>
            array (
                'required' => false,
                'name' => 'center_id',
                'vname' => 'LBL_CENTER_ID',
                'type' => 'id',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'false',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => 0,
                'audited' => false,
                'reportable' => false,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'len' => 36,
                'size' => '20',
                'dbType' => 'id',
                'studio' => 'visible',
            ),
            'center_name' =>
            array (
                'required' => false,
                'name' => 'center_name',
                'vname' => 'LBL_CENTER_NAME',
                'type' => 'enum',
                'massupdate' => 0,
                'default' => '',
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
                'len' => '255',
                'size' => '20',
                'options' => 'center_name_list',
                'studio' => 'visible',
                'dependency' => false,
            ),
            'student_id' => 
            array(
                'required' => false,
                'name' => 'student_id',
                'vname' => 'LBL_STUDENT_ID',
                'type' => 'id',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'false',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => 0,
                'audited' => false,
                'reportable' => false,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'len' => 36,
                'size' => '20',
                'dbType' => 'id',
                'studio' => 'visible',
            ),
            'student_name' => array(
                'name' => 'student_name',
                'vname' => 'LBL_STUDENT_NAME',
                'type' => 'name',
                'link' => true,
                'dbType' => 'varchar',
                'len' => '255',
                'unified_search' => false,
                'required' => false,
                'importable' => 'false',
                'duplicate_merge' => 'disabled',
                'merge_filter' => 'disabled',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => false,
                'calculated' => false,
                'size' => '20',
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
    VardefManager::createVardef('C_Refunds','C_Refunds', array('basic','team_security','assignable','file'));