<?php
    $module_name = 'C_Classes';
    $viewdefs[$module_name] = 
    array (
        'EditView' => 
        array (
            'templateMeta' => 
            array (
                'maxColumns' => '2',
                'widths' => 
                array (
                    0 => 
                    array (
                        'label' => '10',
                        'field' => '30',
                    ),
                    1 => 
                    array (
                        'label' => '10',
                        'field' => '30',
                    ),
                ),
                'javascript' => '{sugar_getscript file="custom/modules/C_Classes/js/editview.js"}
                {sugar_getscript file="custom/include/javascripts/Select2/select2.min.js"}
                <link rel="stylesheet" href="{sugar_getjspath file=\'custom/include/javascripts/Select2/select2.css\'}"/>',
                'useTabs' => false,
                'tabDefs' => 
                array (
                    'DEFAULT' => 
                    array (
                        'newTab' => false,
                        'panelDefault' => 'expanded',
                    ),
                    'LBL_EDITVIEW_PANEL1' => 
                    array (
                        'newTab' => false,
                        'panelDefault' => 'expanded',
                    ),
                ),
            ),
            'panels' => 
            array (
                'default' => 
                array (
                    0 => 
                    array (
                        0 => 
                        array (
                            'name' => 'class_id',
                            'label' => 'LBL_CLASS_ID',
                            'customCode' => '{$ID}',
                        ),
                    ),
                    1 => 
                    array (
                        0 => 'name',
                        1 => 
                        array (
                            'name' => 'status',
                            'studio' => 'visible',
                            'label' => 'LBL_STATUS',
                        ),
                    ),
                    2 => 
                    array (
                        0 =>  array (
                            'name' => 'kind_of_course',
                            'customCode' => '{html_options name="kind_of_course" style="width: 50%" id="kind_of_course" options=$fields.kind_of_course.options selected=$fields.kind_of_course.value}',
                        ),
                        1 => 
                        array (
                            'name' => 'start_date',
                            'label' => 'LBL_START_DATE',
                        ),
                    ),
                    3 => 
                    array (
                        0 => 
                        array (
                            'name' => 'type',
                            'label' => 'LBL_TYPE',
                        ),
                        1 => 
                        array (
                            'name' => 'end_date',
                            'label' => 'LBL_END_DATE',
                        ),
                    ),
                    4 => 
                    array (
                        0 => 
                        array (
                            'name' => 'stage',
                            'label' => 'LBL_STAGE_CONNECT_SKILL',
                            'customCode' => '{html_options name="stage" id="stage" options=$fields.stage.options selected=$fields.stage.value}{html_options name="stage_2[]" id="stage_2" multiple="multiple" options=$fields.stage_2.options selected=$STAGE_2_SELECTED}',
                        ),
                        1 => 
                        array (
                            'name' => 'max',
                            'studio' => 'visible',
                            'label' => 'LBL_MAX',
                        ),
                    ),
                    5 => 
                    array (
                        0 => 
                        array (
                            'name' => 'level',
                            'label' => 'LBL_LEVEL',
                        ),
                    ),
                    6 => 
                    array (
                        0 => 'description',
                    ),
                ),
                'lbl_editview_panel1' => 
                array (
                    0 => 
                    array (
                        0 => 'assigned_user_name',
                        1 => 
                        array (
                            'name' => 'team_name',
                            'displayParams' => 
                            array (
                                'display' => true,
                            ),
                        ),
                    ),
                ),
            ),
        ),
    );
