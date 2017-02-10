<?php
    // created: 2015-09-07 09:49:06
    $layout_defs["Leads"]["subpanel_setup"]['lead_pt'] = array (
        'order' => 200,
        'module' => 'J_PTResult',
        'subpanel_name' => 'default',
        'sort_order' => 'asc',
        'sort_by' => 'id',
        'title_key' => 'LBL_LEAD_PT',
        'get_subpanel_data' => 'function:getSubPTLead',
        'function_parameters' => array(
            'import_function_file' => 'custom/modules/Meetings/subPanelPTResult.php',
            'lead_id' => $this->_focus->id,
            'return_as_array' => 'true'
        ), 
        'top_buttons' => 
        array (
            1 => 
            array (
                'widget_class' => 'SubPanelSelectButtonOnTop',
                'mode' => 'MultiSelect'
            ),
        ),
    );

    $layout_defs["Leads"]["subpanel_setup"]['lead_demo'] = array (
        'order' => 201,
        'module' => 'J_PTResult',
        'subpanel_name' => 'default',
        'sort_order' => 'asc',
        'sort_by' => 'id',
        'title_key' => 'LBL_LEAD_DEMO',
        'get_subpanel_data' => 'function:getSubDemoLead',
        'function_parameters' => array(
            'import_function_file' => 'custom/modules/Meetings/subPanelPTResult.php',
            'lead_id' => $this->_focus->id,
            'return_as_array' => 'true'
        ), 
        'top_buttons' => 
        array (
            1 => 
            array (
                'widget_class' => 'SubPanelSelectButtonOnTop',
                'mode' => 'MultiSelect'
            ),
        ),
    );
	
