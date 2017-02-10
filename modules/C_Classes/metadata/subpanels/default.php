<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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


    $module_name='C_Classes';
    $subpanel_layout = array(
        'top_buttons' => array(
            array('widget_class' => 'SubPanelTopCreateButton'),
            array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => $module_name),
        ),

        'where' => '',

        'list_fields' => array(
            'class_id' => 
            array (
                'type' => 'varchar',
                'vname' => 'LBL_CLASS_ID',
                'width' => '10%',
            ),
            'name'=>array(
                'vname' => 'LBL_NAME',
                'widget_class' => 'SubPanelDetailViewLink',
                'width' => '20%',
            ),
            'type' => 
            array (
                'type' => 'enum',
                'vname' => 'LBL_TYPE',
                'width' => '10%',
            ),
            'status' => 
            array (
                'type' => 'enum',
                'vname' => 'LBL_STATUS',
                'width' => '10%',
            ),
            'start_date' => 
            array (
                'type' => 'date',
                'vname' => 'LBL_START_DATE',
                'width' => '10%',
            ),
            'end_date' => 
            array (
                'type' => 'date',
                'vname' => 'LBL_END_DATE',
                'width' => '10%',
            ),
            'content' => 
            array (
                'name' => 'content',
                'usage' => 'query_only',
            ),
        ),
    );

?>