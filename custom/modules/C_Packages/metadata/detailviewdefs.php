<?php
    $module_name = 'C_Packages';
    $viewdefs[$module_name] = 
    array (
        'DetailView' => 
        array (
            'templateMeta' => 
            array (
                'form' => 
                array (
                    'buttons' => 
                    array (
                        0 => 'EDIT',
                        1 => 'DUPLICATE',
                        2 => 'DELETE',
                        3 => 'FIND_DUPLICATES',
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
                    0 =>                       
                    array (
                        'file' => 'custom/modules/C_Packages/js/custom.detail.js',
                    ),
                ),
                'useTabs' => false,
                'tabDefs' => 
                array (
                    'DEFAULT' => 
                    array (
                        'newTab' => false,
                        'panelDefault' => 'expanded',
                    ),
                    'LBL_DETAILVIEW_PANEL1' => 
                    array (
                        'newTab' => false,
                        'panelDefault' => 'expanded',
                    ),
                    'LBL_DETAILVIEW_PANEL2' => 
                    array (
                        'newTab' => false,
                        'panelDefault' => 'expanded',
                    ),
                ),
                'syncDetailEditViews' => true,
            ),
            'panels' => 
            array (
                'default' => 
                array (
                    0 => 
                    array (
                        0 => 
                        array (
                            'name' => 'package_id',
                            'label' => 'LBL_PACKAGE_ID',
                            'customCode' => '<span class="textbg_blue">{$fields.package_id.value}</span>',
                        ),
                        1 => '',
                    ),
                    1 => 
                    array (
                        0 => 'kind_of_course',
                        1 => 'package_type',
                    ),
                    2 => 
                    array (
                        0 => 
                        array (
                            'name' => 'interval_package',
                            'studio' => 'visible',
                            'label' => 'LBL_INTERVAL_PACKAGE',
                        ),
                        1 => 'start_date',
                    ),
                     3 => 
                    array (
                        0 => 
                        array (
                            'name' => 'total_hours',
                            'label' => 'LBL_TOTAL_HOURS',
                        ),
                        1 => 'end_date',
                    ),
                    4=> 
                    array (
                        0 => 'name',
                        1 => 'isdiscount',
                    ),
                    5=> 
                    array (
                        0 => 
                        array (
                            'name' => 'price',
                            'label' => 'LBL_PRICE',
                        ),
                        1 => 'discount_amount',
                    ),
                ),
                'lbl_detailview_panel1' => 
                array (
                    0 => 
                    array (
                        0 => 
                        array (
                            'name' => 'number_of_payments',
                            'studio' => 'visible',
                            'label' => 'LBL_NUMBER_OF_PAYMENTS',
                        ),
                        1 => '',
                    ),
                    1 => 
                    array (
                        0 => 
                        array (
                            'name' => 'payment_price_1',
                            'label' => 'LBL_PAYMENT_PRICE_1',
                            'customCode' => '{$pay_1}'
                        ),
                        1 => 
                        array (
                            'name' => 'after_discount_1',
                        ),
                    ),
                    2 => 
                    array (
                        0 => 
                        array (
                            'name' => 'payment_price_2',
                            'label' => 'LBL_PAYMENT_PRICE_2',
                            'customCode' => '{$pay_2}'
                        ),
                        1 => 
                        array (
                            'name' => 'after_discount_2',
                        ),
                    ),
                    3 => 
                    array (
                        0 => 
                        array (
                            'name' => 'payment_price_3',
                            'label' => 'LBL_PAYMENT_PRICE_3',
                            'customCode' => '{$pay_3}'
                        ),
                        1 => 
                        array (
                            'name' => 'after_discount_3',
                        ),
                    ),
                    4 => 
                    array (
                        0 => 
                        array (
                            'name' => 'payment_price_4',
                            'label' => 'LBL_PAYMENT_PRICE_4',
                            'customCode' => '{$pay_4}'
                        ),
                        1 => 
                        array (
                            'name' => 'after_discount_4',
                        ),
                    ),
                ),
                'lbl_detailview_panel2' => 
                array (
                    0 => 
                    array (
                        0 => 'description',
                    ),
                   1 => 
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
                    2 => 
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
