<?php
    $module_name = 'C_Classes';
    $viewdefs[$module_name] = 
    array (
        'DetailView' => 
        array (
            'templateMeta' => 
            array (
                'form' => 
                array (
                'hideAudit' => true,
                    'buttons' => 
                    array (
                        0 => 'EDIT',
                        1 => array (
                            'customCode' => '{$UPGRADE_BUTTON}',
                        ),
                        2 => 
                        array (
                            'customCode' => '{$POPUP_CONFIRM}',
                        ),
                        3 => 
                        array (
                            'customCode' => '{$TIME}',
                        ),
                        4 => array (
                            'customCode' => '{$DELETE}',
                        ),
                        5 => 'DUPLICATE',
                    ),
                ),
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
                'includes' => 
                array (
                    1 => 
                    array (
                        'file' => 'custom/modules/C_Classes/js/detailview.js',
                    ),
                    2 => 
                    array (
                        'file' => 'custom/modules/Administration/smsPhone/javascript/smsPhone.js',
                    ),
                    3 =>
                    array(
                        'file' =>   "custom/modules/Administration/smsPhone/javascript/jquery.jmpopups-0.5.1.js",
                    ),
                ),
                'useTabs' => false,
                'tabDefs' => 
                array (
                    'LBL_EDITVIEW_PANEL2' => 
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
                'syncDetailEditViews' => true,
            ),
            'panels' => 
            array (
                'lbl_editview_panel2' => 
                array (
                    0 => 
                    array (
                        0 => 
                        array (
                            'name' => 'class_id',
                            'label' => 'LBL_CLASS_ID',
                            'customCode' => '<span class="textbg_blue">{$fields.class_id.value}</span>',
                        ),
                    ),
                    1 => 
                    array (
                        0 => 'name',
                        1 => array (
                            'name' => 'status',
                            'studio' => 'visible',
                            'label' => 'LBL_STATUS',
                        ),
                    ),
                    2 => 
                    array (
                        0 => 'kind_of_course',
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
                            'name' => 'stage_2',
                            'label' => 'LBL_STAGE_CONNECT_SKILL',
                        ),
                        1 => 
                        array (
                            'name' => 'max',
                            'customCode' => '<span style="color:red;">{$fields.max.value}</span>',
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
                        0 => 
                        array (
                            'name' => 'assigned_user_name',
                        ),
                        1 => 
                        array (
                            'name' => 'date_modified',
                            'label' => 'LBL_DATE_MODIFIED',
                            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
                        ),
                    ),
                    1 => 
                    array (
                        0 => 'team_name',
                        1 => 
                        array (
                            'name' => 'date_entered',
                            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
                        ),
                    ),
                ),
            ),
        ),
    );
