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


    $module_name='C_Gradebook';
    $subpanel_layout = array(
        'top_buttons' => array(
            array('widget_class' => 'SubPanelTopCreateButton'),
            array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => $module_name),
        ),

        'where' => '',

        'list_fields' => array(
            'name'=>array(
                'vname' => 'LBL_NAME',
                'widget_class' => 'SubPanelDetailViewLink',
                'width' => '20%',
            ),
            'class_name' => 
            array (
                'type' => 'relate',
                'vname' => 'LBL_CLASS_NAME',
                'width' => '10%',
            ),
            'status'=>array(
                'type' => 'enum',
                'default' => true,
                'studio' => 'visible',
                'vname' => 'LBL_STATUS',
                'width' => '10%',
            ),
            'date_input'=>array(
                'type' => 'date',
                'vname' => 'LBL_DATE_INPUT',
                'width' => '10%',
                'default' => true,
            ),
            'team_name' => 
            array (
                'width' => '9%',
                'vname' => 'LBL_TEAM',
                'default' => true,
            ),
        ),
    );

?>