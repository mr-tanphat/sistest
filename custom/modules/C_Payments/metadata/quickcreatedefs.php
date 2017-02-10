<?php
    $module_name = 'C_Payments';
    $viewdefs[$module_name] = 
    array (
        'QuickCreate' => 
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
                'includes' => 
                array (
                    0 =>                       
                    array (
                        'file' => 'custom/modules/C_Payments/js/custom.edit.js',
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
                    'LBL_EDITVIEW_PANEL1' => 
                    array (
                        'newTab' => false,
                        'panelDefault' => 'expanded',
                    ),
                ),
                'syncDetailEditViews' => false,
            ),
            'panels' => 
            array (
                'default' => 
                array (
                    0 => 
                    array (
                        0 => 
                        array (
                            'name' => 'c_invoices_c_payments_1_name',
                            'studio' => 'visible',
                            'fields' => 
                            array (
                                0 => 
                                array (
                                    'name' => 'c_invoices_c_payments_1_name',
                                    'displayParams' => 
                                    array (
                                        'field_to_name_array' => 
                                        array (
                                            'id' => 'c_invoices_c_payments_1c_invoices_ida',
                                            'name' => 'c_invoices_c_payments_1_name',
                                            'amount' => 'amount',
                                            'balance' => 'remaining',
                                            'contacts_c_invoices_1contacts_ida' => 'contacts_c_payments_1contacts_ida',
                                            'contacts_c_invoices_1_name' => 'contacts_c_payments_1_name',
                                            'accounts_c_invoices_1_name' => 'accounts_c_payments_1_name',
                                            'accounts_c_invoices_1accounts_ida' => 'accounts_c_payments_1accounts_ida',
                                        ),
                                        'initial_filter' => '&status_advanced=Unpaid',
                                        'call_back_function' => 'set_money_return'
                                    ),
                                ),
                            ),
                        ),
                        1 => 
                        array (
                            'name' => 'name',
                            'customCode'=>'{$NEWID}',
                        ),
                    ),
                    1 => 
                    array (
                        0 => '',
                        1 => 
                        array (
                            'name' => 'contacts_c_payments_1_name',
                            'label' => 'LBL_CONTACTS_C_PAYMENTS',
                            'customCode' => '<input type="hidden" id="contacts_c_payments_1contacts_ida" name="contacts_c_payments_1contacts_ida" value="{$fields.contacts_c_payments_1contacts_ida.value}"/><input type="text" style = "width: 195px; border: medium none;" id="contacts_c_payments_1_name" name="contacts_c_payments_1_name" value="{$fields.contacts_c_payments_1_name.value}" readonly/>',
                        ),
                    ),
                    2 => 
                    array (
                        0 => '',
                        1 => 
                        array (
                            'name' => 'accounts_c_payments_1_name',
                            'label' => 'LBL_ACCOUNTS_C_PAYMENTS',
                            'customCode' => '<input type="hidden" id="accounts_c_payments_1accounts_ida" name="accounts_c_payments_1accounts_ida" value="{$fields.accounts_c_payments_1accounts_ida.value}"/><input type="text" style = "width: 195px; border: medium none;" id="accounts_c_payments_1_name" name="accounts_c_payments_1_name" value="{$fields.accounts_c_payments_1_name.value}" readonly/>',
                        ),
                    ),
                    3 => 
                    array (
                        0 => '',
                        1 => 
                        array (
                            'name' => 'amount',
                            'label' => 'LBL_AMOUNT',
                            'customCode' => '<input type="text" style = "width: 195px; border: medium none;" id="amount" name="amount" value="{$fields.amount.value}" readonly/>',
                        ),
                    ),
                    4 => 
                    array (
                        0 => 
                        array (
                            'name' => 'payment_method',
                            'studio' => 'visible',
                            'label' => 'LBL_PAYMENT_METHOD',
                            'customCode' => '<label><input type="radio" name="payment_method" value="Cash" checked="checked" id="payment_method" title=""><div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; top: 4px; padding: 5px; cursor: pointer;"><img src="custom/themes/default/images/cash-icon.png">&nbsp;<b>Cash</b></div></label>
<label><input type="radio" name="payment_method" value="CreditDebitCard" id="payment_method" title=""><div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; top: 4px; padding: 5px; cursor: pointer;"><img src="custom/themes/default/images/visa-icon.png">&nbsp;<b>Credit / Debit card</b></div></label>
<label><input type="radio" name="payment_method" value="BankTranfer" id="payment_method" title=""><div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; top: 4px; padding: 5px; cursor: pointer;"><img src="custom/themes/default/images/bank-icon.png">&nbsp;<b>Bank Transfer</b></div></label>',
                        ),
                        1 => '',
                    ),
                    5 => 
                    array (
                        0 => array (
                            'type' => 'hidden',
                            'hideLabel' => true,
                            'customCode' => '              
                                <fieldset id="status_info" style="min-height:50px;">
                                    <legend><b> Bank Infomation </b></legend>
                                    <table>
                                    <tr>                           
                                        <td id="remaining_label" scope="col" valign="top" width="133px">
                                        {$MOD.LBL_STATUS}:    
                                        </td>
                                        <td valign="top">
                                            {html_options name="status" style = "width: 120px; height: 25px;" id="status" options=$fields.status.options selected=$fields.status.value}
                                        </td>
                                    </tr>
                                    </table>
                                </fieldset>
                                <fieldset id="credit_info" style="min-height:50px;">
                                    <legend><b> Credit Card Infomation </b></legend>
                                    <table>
                                        <tr>                           
                                            <td id="remaining_label" scope="col" valign="top" width="133px">
                                            {$MOD.LBL_CARD_TYPE}:    
                                            </td>
                                            <td valign="top">
                                                {html_options name="card_type" style = "width: 100%; height: 25px;" id="card_type" options=$fields.card_type.options selected=$fields.card_type.value}
                                            </td>
                                        </tr>
                                        <tr>                           
                                            <td id="remaining_label" scope="col" valign="top" width="133px">
                                            {$MOD.LBL_CARD_NAME}:    
                                            </td>
                                            <td valign="top">
                                                <input type="text" size="30" id="card_name" name="card_name" value="{$fields.card_name.value}"/>
                                            </td>
                                        </tr>
                                        <tr>                           
                                            <td id="remaining_label" scope="col" valign="top" width="133px">
                                            {$MOD.LBL_CARD_NUMBER}:    
                                            </td>
                                            <td valign="top">
                                                <input type="text" size="30" id="card_number" name="card_number" value="{$fields.card_number.value}"/>
                                            </td>
                                        </tr>
                                        <tr>                           
                                            <td id="remaining_label" scope="col" valign="top" width="133px">
                                            {$MOD.LBL_EXPIRATION_DATE}:                      
                                            </td>
                                            <td valign="top">
                                                 {html_options name="expiration_date" style = "width: 50%; height: 25px;" id="expiration_date" options=$fields.expiration_date.options selected=$fields.expiration_date.value}&nbsp;{html_options name="expiration_year" style = "width: 46%; height: 25px;" id="expiration_year" options=$fields.expiration_year.options selected=$fields.expiration_year.value}
                                            </td>
                                        </tr>
                                    </table>
                                </fieldset>
                            ',
                        ),
                        1 => '',
                    ),
                    6 => 
                    array (
                        0 => 
                        array (
                            'name' => 'remaining',
                            'label' => 'LBL_REMAINING',
                            'customCode' => '<input value="{$fields.remaining.value}" type="text" size="30" name="remaining" id="remaining" readonly="" style="background-color: rgb(221, 221, 221); background-position: initial initial; background-repeat: initial initial;" >',
                        ),
                        1 => '',
                    ),
                    7 => 
                    array (
                        0 => 
                        array (
                            'name' => 'payment_amount',
                            'label' => 'LBL_PAYMENT_AMOUNT',
                        ),
                        1 => '',
                    ),
                    8 => 
                    array (
                        0 => 
                        array (
                            'name' => 'payment_balance',
                            'label' => 'LBL_PAYMENT_BALANCE',
                            'customCode' => '<input value="{$fields.payment_balance.value}" type="text" size="30" name="payment_balance" id="payment_balance" readonly="" style="background-color: rgb(221, 221, 221); background-position: initial initial; background-repeat: initial initial;" >',
                        ),
                        1 => '',
                    ),
                    9 => 
                    array (
                        0 => 
                        array (
                            'name' => 'payment_date',
                            'label' => 'LBL_PAYMENT_DATE',
                        ),
                        1 => '',
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
                    1 => 
                    array (
                        0 => 'description',
                    ),
                ),
            ),
        ),
    );
