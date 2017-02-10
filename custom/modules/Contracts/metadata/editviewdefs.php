<?php
$viewdefs['Contracts'] =
array (
    'EditView' =>
    array (
        'templateMeta' =>
        array (
        'form' =>
            array (
                'hidden' =>
                array (
                    0 => '<input type="hidden" name="pmd_id[]" id="pmd_id_1" value="{$pmd.1.pmd_id}">',
                    1 => '<input type="hidden" name="pmd_id[]" id="pmd_id_2" value="{$pmd.2.pmd_id}">',
                    2 => '<input type="hidden" name="pmd_id[]" id="pmd_id_3" value="{$pmd.3.pmd_id}">',
                    3 => '<input type="hidden" name="pmd_id[]" id="pmd_id_4" value="{$pmd.5.pmd_id}">',
                    4 => '<input type="hidden" name="pmd_id[]" id="pmd_id_5" value="{$pmd.6.pmd_id}">',
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
            'javascript' => '{$PROBABILITY_SCRIPT}
            {sugar_getscript file="custom/modules/Contracts/js/editview.js"}
            {sugar_getscript file="custom/include/javascripts/Select2/select2.min.js"}
            <link rel="stylesheet" href="{sugar_getjspath file=\'custom/include/javascripts/Select2/select2.css\'}"/>',
            'useTabs' => false,
            'tabDefs' =>
            array (
                'LBL_CONTRACT_INFORMATION' =>
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
                'LBL_EDITVIEW_PANEL2' =>
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
                'LBL_PANEL_ASSIGNMENT' =>
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
            ),
            'syncDetailEditViews' => true,
        ),
        'panels' =>
        array (
            'lbl_contract_information' =>
            array (
                0 =>
                array (
                    0 =>
                    array (
                        'name' => 'contract_id',
                        'label' => 'LBL_CONTRACT_ID',
                    ),
                    1 => array (
                        'name' => 'status',
                        'customCode' => '{if $fields.status.value == "signed"}
                        {$fields.status.options[$fields.status.value]} <input type="hidden" name="status" id="status" value="{$fields.status.value}">
                        {else}
                        {html_options name="status" id="status" options=$fields.status.options selected=$fields.status.value}
                        {/if}',
                    ),

                ),
                1 =>
                array (
                    0 => 'name',
                    //          1 => 'type',
                ),
                2 =>
                array (
                    0 =>
                    array (
                        'name' => 'total_contract_value',
                        'label' => 'LBL_TOTAL_CONTRACT_VALUE',
                        'displayParams' =>
                        array (
                            'size' => 20,
                            'maxlength' => 25,
                        ),
                    ),
                    1 =>
                    array (
                        'name' => 'total_student',
                        'label' => 'LBL_TOTAL_STUDENT',
                        'customCode' => '<input type="text" name="total_student" id="total_student" size="5" maxlength="13" value="{$fields.total_student.value}">',
                    ),
                ),
                3 =>
                array (
                    0 =>
                    array (
                        'name' => 'amount_per_student',
                        'comment' => 'The overall value of the contract',
                        'label' => 'LBL_AMOUNT_PER_STUDENT',
                        'customCode' => '<input type="text" name="amount_per_student" id="amount_per_student" size="20" maxlength="25" value="{sugar_number_format var=$fields.amount_per_student.value}" title="" tabindex="0" class="currency input_readonly" style="text-align: right;">'
                    ),
                    1 =>
                    array (
                        'name' => 'study_duration',
                        'label' => 'LBL_STUDY_DURATION',
                        'customCode' => '<input type="text" name="study_duration" id="study_duration" size="5" maxlength="13" value="{$fields.study_duration.value}">',
                    ),
                ),
                4 =>
                array (
                    0 =>
                    array (
                        'name' => 'customer_signed_date',
                        'displayParams' =>
                        array (
                            'showFormats' => true,
                            'required' => true,
                        ),
                    ),
                    1 =>
                    array (
                        'name' => 'kind_of_course',
                    ),
                ),
            ),
            'lbl_editview_panel2' =>
            array (
                0 =>
                array (
                    0 =>
                    array (
                        'name' => 'payment_date_1',
                        'comment' => '',
                        'label' => 'LBL_PAYMENT_DATE_1',
                    ),
                    1 =>
                    array (
                        'name' => 'account_name',
                        'displayParams' =>
                        array (
                            'field_to_name_array' =>
                            array (
                                'id' => 'account_id',
                                'name' => 'account_name',
                                'phone_office' => 'account_phone',
                                'tax_code' => 'account_tax_code',
                                'phone_fax' => 'account_fax',
                                'bank_name' => 'account_bank_name',
                                'bank_number' => 'account_bank_number',
                                'billing_address_street' => 'account_address',
                            ),
                            'required' => true,
                        ),
                    ),
                ),
                1 =>
                array (
                    0 =>
                    array (
                        'name' => 'payment_amount_1',
                        'comment' => 'Payment 1',
                        'label' => 'LBL_PAYMENT_AMOUNT_1',
                        'customCode' => '
                        <table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width="40%"><input type="text" name="payment_amount[]" id="payment_amount_1" size="20" maxlength="25" value="{$pmd.1.pmd_amount}" class="currency"></td>
                        <td width="25%" scope="col"><label>Invoice No: </label></td>
                        <td width="35%"><input autocomplete="off" type="text" name="invoice_no[]" id="invoice_no_1" value="{$pmd.1.pmd_invoice_no}" size="10" ></td>
                        </tr></tbody>
                        </table>'
                    ),
                    1 =>
                    array (
                        'name' => 'contact_name',
                        'comment' => 'Contact name',
                        'label' => 'LBL_CONTACT_NAME',
                    ),
                ),
                2 =>
                array (
                    0 =>
                    array (
                        'name' => 'payment_date_2',
                        'comment' => '',
                        'label' => 'LBL_PAYMENT_DATE_2',
                    ),
                    1 =>
                    array (
                        'name' => 'account_phone',
                        'label' => 'LBL_ACCOUNT_PHONE',
                    ),
                ),
                3 =>
                array (
                    0 =>
                    array (
                        'name' => 'payment_amount_2',
                        'comment' => 'Payment 2',
                        'label' => 'LBL_PAYMENT_AMOUNT_2',
                        'customCode' => '
                        <table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width="40%"><input type="text" name="payment_amount[]" id="payment_amount_2" size="20" maxlength="25" value="{$pmd.2.pmd_amount}" class="currency"></td>
                        <td width="25%" scope="col"><label>Invoice No: </label></td>
                        <td width="35%"><input autocomplete="off" type="text" name="invoice_no[]" id="invoice_no_2" value="{$pmd.2.pmd_invoice_no}" size="10" ></td>
                        </tr></tbody>
                        </table>'
                    ),
                    1 =>
                    array (
                        'name' => 'account_tax_code',
                        'label' => 'LBL_ACCOUNT_TAX_CODE',
                    ),
                ),
                4 =>
                array (
                    0 =>
                    array (
                        'name' => 'payment_date_3',
                        'comment' => '',
                        'label' => 'LBL_PAYMENT_DATE_3',
                    ),
                    1 =>
                    array (
                        'name' => 'account_fax',
                        'label' => 'LBL_ACCOUNT_FAX',
                    ),
                ),
                5 =>
                array (
                    0 =>
                    array (
                        'name' => 'payment_amount_3',
                        'comment' => 'Payment 3',
                        'label' => 'LBL_PAYMENT_AMOUNT_3',
                        'customCode' => '
                        <table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width="40%"><input type="text" name="payment_amount[]" id="payment_amount_3" size="20" maxlength="25" value="{$pmd.3.pmd_amount}" class="currency"></td>
                        <td width="25%" scope="col"><label>Invoice No: </label></td>
                        <td width="35%"><input autocomplete="off" type="text" name="invoice_no[]" id="invoice_no_3" value="{$pmd.3.pmd_invoice_no}" size="10" ></td>
                        </tr></tbody>
                        </table>'
                    ),
                    1 =>
                    array (
                        'name' => 'account_bank_name',
                        'label' => 'LBL_ACCOUNT_BANK_NAME',
                    ),
                ),
                6 =>
                array (
                    0 =>
                    array (
                        'name' => 'payment_date_4',
                        'comment' => '',
                        'label' => 'LBL_PAYMENT_DATE_4',
                    ),
                    1 =>
                    array (
                        'name' => 'account_bank_number',
                        'label' => 'LBL_ACCOUNT_BANK_NUMBER',
                    ),
                ),
                7 =>
                array (
                    0 =>
                    array (
                        'name' => 'payment_amount_4',
                        'comment' => 'Payment 4',
                        'label' => 'LBL_PAYMENT_AMOUNT_4',
                        'customCode' => '
                        <table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width="40%"><input type="text" name="payment_amount[]" id="payment_amount_4" size="20" maxlength="25" value="{$pmd.4.pmd_amount}" class="currency"></td>
                        <td width="25%" scope="col"><label>Invoice No: </label></td>
                        <td width="35%"><input autocomplete="off" type="text" name="invoice_no[]" id="invoice_no_4" value="{$pmd.4.pmd_invoice_no}" size="10" ></td>
                        </tr></tbody>
                        </table>'
                    ),
                    1 =>
                    array (
                        'name' => 'account_address',
                        'studio' => 'visible',
                        'label' => 'LBL_ACCOUNT_ADDRESS',
                    ),
                ),
                8 =>
                array (
                    0 =>
                    array (
                        'name' => 'payment_date_5',
                        'comment' => '',
                        'label' => 'LBL_PAYMENT_DATE_5',
                    ),
                ),
                9 =>
                array (
                    0 =>
                    array (
                        'name' => 'payment_amount_5',
                        'comment' => 'Payment 5',
                        'label' => 'LBL_PAYMENT_AMOUNT_5',
                        'customCode' => '
                        <table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width="40%"><input type="text" name="payment_amount[]" id="payment_amount_5" size="20" maxlength="25" value="{$pmd.5.pmd_amount}" class="currency"></td>
                        <td width="25%" scope="col"><label>Invoice No: </label></td>
                        <td width="35%"><input autocomplete="off" type="text" name="invoice_no[]" id="invoice_no_5" value="{$pmd.5.pmd_invoice_no}" size="10" ></td>
                        </tr></tbody>
                        </table>'
                    ),
                    1 => ''
                ),
            ),
            'LBL_PANEL_ASSIGNMENT' =>
            array (
                0 =>
                array (
                    0 =>
                    array (
                        'name' => 'description',
                    ),
                ),
                1 =>
                array (
                    0 => 'assigned_user_name',
                    1 =>
                    array (
                        'name' => 'team_name',
                        'displayParams' =>
                        array (
                            'required' => true,
                        ),
                    ),
                ),
            ),
        ),
    ),
);
