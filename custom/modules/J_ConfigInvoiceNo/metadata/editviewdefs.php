<?php
$module_name = 'J_ConfigInvoiceNo';
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
                    0 => 
                    array (
                        'name' => 'team_name',
                        'displayParams' => 
                        array (
                            'display' => true,
                        ),
                    ),
                ),
                1 => 
                array (
                    0 => 
                    array (
                        'name' => 'serial_no',
                        'label' => 'LBL_SERIAL_NO',
                    ),
                ),
                2 => 
                array (
                    0 => 
                    array (
                        'name' => 'invoice_no_from',
                        'label' => 'LBL_INVOICE_NO_FORM',
                    ),
                ),
                3 => 
                array (
                    0 => 
                    array (
                        'name' => 'invoice_no_to',
                        'label' => 'LBL_INVOICE_NO_TO',
                    ),
                ),
                4 => 
                array (
                    0 => 
                    array (
                        'name' => 'invoice_no_current',
                        'label' => 'LBL_INVOICE_NO_CURRENT',
                    ),
                ),
                5 => 
                array (
                    0 => 
                    array (
                        'name' => 'active',
                        'label' => 'LBL_ACTIVE',
                    ),
                ),
            ),
        ),
    ),
);
