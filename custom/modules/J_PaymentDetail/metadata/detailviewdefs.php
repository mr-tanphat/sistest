<?php
$module_name = 'J_PaymentDetail';
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
                    1 => 'DUPLICATE',
                    2 => 
                    array (
                        'customCode' => '{$BTN_DELETE}',
                    ),
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
            'useTabs' => false,
            'tabDefs' => 
            array (
                'DEFAULT' => 
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
                    0 => 'name',
                    1 => 
                    array (
                        'name' => 'payment_date',
                        'label' => 'LBL_PAYMENT_DATE',
                    ),
                ),
                1 => 
                array (
                    0 => 
                    array (
                        'name' => 'payment_name',
                        'label' => 'LBL_PAYMENT_NAME',
                    ),
                    1 => 'status',
                ),
                2 => 
                array (
                    0 => 
                    array (
                        'name' => 'before_discount',
                        'label' => 'LBL_BEFORE_DISCOUNT',
                    ),
                    1 => 
                    array (
                        'name' => 'payment_no',
                        'label' => 'LBL_PAYMENT_NO',
                    ),
                ),
                3 => 
                array (
                    0 => 
                    array (
                        'name' => 'discount_amount',
                        'label' => 'LBL_DISCOUNT_AMOUNT',
                    ),
                    1 => 
                    array (
                        'name' => 'type',
                        'studio' => 'visible',
                        'label' => 'LBL_TYPE',
                    ),
                ),
                4 => 
                array (
                    0 => 
                    array (
                        'name' => 'sponsor_amount',
                        'label' => 'LBL_SPONSOR_AMOUNT',
                    ),
                    1 => '',
                ),
                5 => 
                array (
                    0 => 
                    array (
                        'name' => 'payment_amount',
                        'label' => 'LBL_PAYMENT_AMOUNT',
                    ),
                    1 => 
                    array (
                        'name' => 'payment_method',
                        'studio' => 'visible',
                        'label' => 'LBL_PAYMENT_METHOD',
                    ),
                ),
                6 => 
                array (
                    0 => 'method_note',
                    1 => 'card_type',
                ),
                7 => 
                array (
                    0 => 
                    array (
                        'name' => 'invoice_number',
                        'label' => 'LBL_INVOICE_NUMBER',
                    ),
                    1 => 
                    array (
                        'name' => 'serial_no',
                        'label' => 'LBL_SERIAL_NO',
                    ),
                ),
//               8 => 
//                array (
//                    0 => 
//                    array (
//                        'name' => 'sale_type',
//                        'studio' => 'visible',
//                        'label' => 'LBL_SALE_TYPE',
//                    ),
//                    1 => 
//                    array (
//                        'name' => 'sale_type_date',
//                        'label' => 'LBL_SALE_TYPE_DATE',
//                    ),
//                ),
                9 => 
                array (
                    0 => 'description',
                ),
                10 => array (
                    0 => 'assigned_user_name',
                    1 => array (
                        'name' => 'date_entered',
                        'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
                        'label' => 'LBL_DATE_ENTERED',
                    ),
                ),
                11 => array (
                    0 => 'team_name',
                    1 => 
                    array (
                        'name' => 'date_modified',
                        'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
                        'label' => 'LBL_DATE_MODIFIED',
                    ),
                ),
            ),
        ),
    ),
);
