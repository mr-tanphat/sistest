<?php
    $module_name = 'C_Payments';
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
                        2 => 'DELETE',
                        3 => 
                        array (
                            'customCode' => '{$PAYMENTEXPORT}',
                        ),
                        7 => 
                        array (
                            'customCode' => '{$CONVERT_TO_REVENUE}',
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
                'includes' => 
                array (
                    0 => 
                    array (
                        'file' => 'custom/modules/C_Payments/js/custom.detail.js',
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
                            'name' => 'name',
                            'customCode' => '<span class="textbg_blue">{$fields.name.value}</span>',
                        ),
                        1 => 
                        array (
                            'name' => 'payment_date',
                            'customCode' => '{$FIELD_DATE}',
                        ),
                    ),
                    1 => 
                    array (
                        0 => 
                        array (
                            'name' => 'payment_amount',
                            'label' => '{$MOD.LBL_PAYMENT_AMOUNT} ({$CURRENCY})',
                        ),
                        1 => 
                        array (
                            'name' => 'contacts_c_payments_2_name',
                            'label' => 'LBL_FROM_STUDENT',
                        ),
                    ),
                    2 => 
                    array (
                        0 => 
                        array (
                             'name' => 'remain',
                        ),
                        1 => 
                        array (
                            'name' => 'contacts_c_payments_1_name',
                            'customLabel' => '{$LBL_STUDENT}',
                        ),
                    ),

                    3 => 
                    array (
                        0 => 
                        array (

                        ),
                        1 => 
                        array (
                            'name' => 'leads_c_payments_1_name',
                        ),

                    ),
                    4 => 
                    array (
                        0 => 
                        array (
                            'name' => 'c_invoices_c_payments_1_name',
                            'label' => 'LBL_C_INVOICE',

                        ),
                        1 => 
                        array (
                            'name' => 'payment_method',
                            'studio' => 'visible',
                            'label' => 'LBL_PAYMENT_METHOD',
                            'customCode' => '
                            {if $fields.payment_method.value == "Cash"}
                            <label>
                            <div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; padding: 5px;">
                            <img src="custom/themes/default/images/cash-icon.png">&nbsp;<b>Cash</b>
                            </div>
                            </label>
                            {elseif $fields.payment_method.value == "CreditDebitCard"}
                            <label>
                            <div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; padding: 5px;">
                            <img src="custom/themes/default/images/visa-icon.png">&nbsp;<b>Card</b>
                            </div>
                            </label>
                            {elseif $fields.payment_method.value == "BankTranfer"}
                            <label>
                            <div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; padding: 5px;">
                            <img src="custom/themes/default/images/bank-icon.png">&nbsp;<b>Bank Transfer</b>
                            </div>
                            </label>
                            {elseif $fields.payment_method.value == "Loan"}
                            <label>
                            <div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; padding: 5px;">
                            <img src="custom/themes/default/images/loan-icon.png">&nbsp;<b>Loan</b>
                            </div>
                            </label>
                            {elseif $fields.payment_method.value == "Other"}
                            <label>
                            <div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; padding: 5px;">
                            <img src="custom/themes/default/images/other-icon.png">&nbsp;<b>Other</b>
                            </div>
                            </label>
                            {else}
                            <span><b>{$fields.payment_method.value}<b></span>
                            {/if}
                            <input type= "hidden" name="payment_method" id="payment_method" value="{$fields.payment_method.value}"/>',
                        ),

                    ),
                    5 => 
                    array (
                        0 => 
                        array (
                            'name' => 'serial_num',
                            'customCode' => '<span id="span_serial_num">{$fields.serial_num.value}</span>',
                        ),
                        1 => 
                        array (
                            'name' => 'payment_type',
                        ),
                    ),
                    6 => 
                    array (
                        0 => 
                        array (
                            'name' => 'invoice_num',
                            'customCode' => '<span id="span_invoice_num">{$fields.invoice_num.value}</span>',
                        ),
                        1 => 
                        array (
                            'name' => 'status',
                            'studio' => 'visible',
                            'label' => 'LBL_STATUS',
                            'customCode' => '
                            {if $fields.status.value == "Unpaid"}
                            <span class="textbg_orange"><b>{$fields.status.value}<b></span>
                            {elseif $fields.status.value == "Paid"}
                            <span class="textbg_green"><b>{$fields.status.value}<b></span>
                            {elseif $fields.status.value == "Cancel"}
                            <span class="textbg_red"><b>{$fields.status.value}<b></span>
                            {elseif $fields.status.value == "Deleted"}
                            <span class="textbg_black"><b>{$fields.status.value}<b></span>
                            {else}
                            <span><b>{$fields.status.value}<b></span>
                            {/if}',
                        ),
                    ),
                    7 => 
                    array (
                        0 => 
                        array (
                            'name' => 'card_type',
                            'studio' => 'visible',
                            'label' => 'LBL_CARD_TYPE',
                        ),
                        1 => 
                        array (
                            'name' => 'card_name',
                            'label' => 'LBL_CARD_NAME',
                        ),
                    ),
                    8 => 
                    array (
                        0 => 
                        array (
                            'name' => 'expiration_date',
                            'studio' => 'visible',
                            'label' => 'LBL_EXPIRATION_DATE',
                            'customCode' => '<span id="expiration_date">&nbsp;{$fields.expiration_date.value} - {$fields.expiration_year.value}</span> {$JSPAYMENT}',
                        ),
                        1 => 
                        array (
                            'name' => 'card_number',
                            'label' => 'LBL_CARD_NUMBER',
                        ),
                    ),
                    9 => 
                    array (
                        0 => 
                        array (
                            'name' => 'printed',
                        ),
                        1 => 
                        array (
                            'name' => 'sponsor_amount',
                        ),
                    ),
                    10 => 
                    array (
                        0 => 'description',
                        1 => 
                        array (
                            
                        ),
                    ),
                ),
                'lbl_detailview_panel1' => 
                array (
                    0 => 
                    array (
                        0 => 'assigned_user_name',
                        1 => 
                        array (
                            'name' => 'date_modified',
                            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
                            'label' => 'LBL_DATE_MODIFIED',
                        ),
                    ),
                    1 => 
                    array (
                        0 => 'team_name',
                        1 => 
                        array (
                            'name' => 'date_entered',
                            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
                            'label' => 'LBL_DATE_ENTERED',
                        ),
                    ),
                ),
            ),
        ),
    );
