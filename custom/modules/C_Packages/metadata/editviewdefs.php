<?php
    $module_name = 'C_Packages';
    $viewdefs[$module_name] = 
    array (
        'EditView' => 
        array (
            'templateMeta' => 
            array (
                'form' => 
                array (
                    'hidden' => 
                    array (
                        1 => '<input type="hidden" name="payment_rate_1" id="payment_rate_1" value="{sugar_number_format precision=2 var=$fields.payment_rate_1.value}">',
                        2 => '<input type="hidden" name="payment_rate_2" id="payment_rate_2" value="{sugar_number_format precision=2 var=$fields.payment_rate_2.value}">',
                        3 => '<input type="hidden" name="payment_rate_3" id="payment_rate_3" value="{sugar_number_format precision=2 var=$fields.payment_rate_3.value}">',
                        4 => '<input type="hidden" name="payment_rate_4" id="payment_rate_4" value="{sugar_number_format precision=2 var=$fields.payment_rate_4.value}">',
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
                'javascript' => '{sugar_getscript file="custom/modules/C_Packages/js/custom.edit.js"}
                {sugar_getscript file="custom/include/javascripts/Select2/select2.min.js"}
                <link rel="stylesheet" href="{sugar_getjspath file=\'custom/include/javascripts/Select2/select2.css\'}"/>',
                'useTabs' => false,
                'tabDefs' => 
                array (
                    'LBL_PANEL_1' => 
                    array (
                        'newTab' => false,
                        'panelDefault' => 'expanded',
                    ),
                ),
                'syncDetailEditViews' => false,
            ),
            'panels' => 
            array (
                'lbl_panel_1' => 
                array (
                    0 => 
                    array (
                        0 => 
                        array (
                            'name' => 'package_id',
                            'label' => 'LBL_PACKAGE_ID',
                            'customCode' => '{$NEWID}',
                        ),
                    ),
                    1 => 
                    array (
                        0 =>  array (
                            'name' => 'kind_of_course',
                            'customCode' => '{html_options name="kind_of_course" style="width: 50%" id="kind_of_course" options=$fields.kind_of_course.options selected=$fields.kind_of_course.value}',
                        ),
                        1 => 'package_type'
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
                        0 => 'name',
                        1 => 'end_date',
                    ),
                    4 => 
                    array (
                        0 =>
                        array(
                            'name' => 'total_hours',
                            'customCode' => '<input type="text" name="total_hours" id="total_hours" size="10" maxlength="20" value="{sugar_number_format var=$fields.total_hours.value precision=2}">',
                        ),
                        1 => array(
                            'name' => 'isdiscount',
                        ),
                    ),
                    5 => 
                    array (
                        0 => 
                        array (
                            'name' => 'price',
                            'label' => 'LBL_PRICE',
                            'customCode' => '<input type="text" name="price" id="price" size="25" maxlength="26" value="{sugar_number_format var=$fields.price.value}" class="currency" style="background-color: #FAFFBD;">',
                            'displayParams' => 
                            array (
                                'required' => true,
                            ),
                        ),
                        1 => array(
                            'name' => 'discount_amount',
                            'customCode' => '<input type="text" name="discount_amount" id="discount_amount" size="25" maxlength="26" value="{sugar_number_format var=$fields.discount_amount.value}" class="currency" style="background-color: #FAFFBD;">',
                        ),
                    ),
                ),
                'LBL_PANEL_PAYMENT' => 
                array (
                    0 => 
                    array (
                        0 => 'number_of_payments',
                        1 => array(
                            'customLabel' => '<label id = "total_label">{$MOD.LBL_TOTAL_AMOUNT}: </label>',
                            'customCode' => '<span id="after_discount_text" style="font-weight:bold;"></span>',
                        ),
                    ),
                    1 => 
                    array (
                        0 => 
                        array (
                            'name' => 'payment_price_1',
                            'label' => 'LBL_PAYMENT_PRICE_1',
                            'customCode' => '<input type="text" name="payment_price_1" id="payment_price_1" size="20" maxlength="26" value="{sugar_number_format var=$fields.payment_price_1.value}" class="currency"><label width="12.5%" style="background-color:#eee; color: #444; padding:.6em">Reminder</label>{html_options name="payment_type_1" id="payment_type_1" options=$fields.payment_type_1.options selected=$fields.payment_type_1.value}',
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
                            'customCode' => '<input type="text" name="payment_price_2" id="payment_price_2" size="20" maxlength="26" value="{sugar_number_format var=$fields.payment_price_2.value}" class="currency"><label width="12.5%" style="background-color:#eee; color: #444; padding:.6em">Reminder</label>{html_options name="payment_type_2" id="payment_type_2" options=$fields.payment_type_2.options selected=$fields.payment_type_2.value}',
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
                            'customCode' => '<input type="text" name="payment_price_3" id="payment_price_3" size="20" maxlength="26" value="{sugar_number_format var=$fields.payment_price_3.value}" class="currency"><label width="12.5%" style="background-color:#eee; color: #444; padding:.6em">Reminder</label>{html_options name="payment_type_3" id="payment_type_3" options=$fields.payment_type_3.options selected=$fields.payment_type_3.value}',

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
                            'customCode' => '<input type="text" name="payment_price_4" id="payment_price_4" size="20" maxlength="26" value="{sugar_number_format var=$fields.payment_price_4.value}" class="currency"><label width="12.5%" style="background-color:#eee; color: #444; padding:.6em">Reminder</label>{html_options name="payment_type_4" id="payment_type_4" options=$fields.payment_type_4.options selected=$fields.payment_type_4.value}',

                        ),
                        1 => 
                        array (
                            'name' => 'after_discount_4',
                        ),
                    ),
                ),
                'LBL_PANEL_ADVANCED' => 
                array (
                    0 => 
                    array (
                        0 => 'description',
                        1 => '',
                    ),
                    1 => 
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
