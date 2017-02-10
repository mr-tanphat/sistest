<?php
    $module_name = 'C_Payments';
    $viewdefs[$module_name] = 
    array (
        'EditView' => 
        array (
            'templateMeta' => 
            array (
                'form' => 
                array (
                    'enctype' => 'multipart/form-data',
                    'hidden' => 
                    array (
                        0 => '<input type="hidden" name="amount_in_words" id="amount_in_words" value="{$fields.amount_in_words.value}">',
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
                        'file' => 'custom/modules/C_Payments/js/custom.edit.js',
                    ),
                ),
                'javascript' => '{sugar_getscript file="include/javascript/popup_parent_helper.js"}
                {sugar_getscript file="cache/include/javascript/sugar_grp_jsolait.js"}
                {sugar_getscript file="modules/Documents/documents.js"}
                {sugar_getscript file="custom/include/javascripts/currency_word.js"}',
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
                'syncDetailEditViews' => false,
            ),
            'panels' => 
            array (
                'lbl_editview_panel2' => 
                array (
                    0 => 
                    array (
                        0 => array (
                            'name' => 'payment_type',
                        )
                    ),
                    1 => 
                    array (
                        0 => 
                        array (
                            'name' => 'leads_c_payments_1_name',
                        ),
                    ),
                    2 => 
                    array (
                        0 => 
                        array (
                            'name' => 'contacts_c_payments_1_name',
                            'label' => 'LBL_STUDENT',
                        ),
                    ),
                    3 => 
                    array (
                        0 => array(
                            'name' => 'amount',
                            'customCode' => '<input tabindex="0" size="30" value="{sugar_number_format var=$fields.amount.value}" type="text" class="currency" name="amount" id="amount" readonly style="font-weight: bold; color: #A52A2A; text-align: right; background-color:#DDDDDD !important;">'
                        ),
                    ),
                    4 => 
                    array (
                        0 => 
                        array (
                            'name' => 'payment_method',
                            'studio' => 'visible',
                            'label' => 'LBL_PAYMENT_METHOD',
                            'customCode' => '{if $fields.payment_method.value == "Cash"} {assign var="1checked" value="CHECKED"} {/if}
                            <label><input type="radio" name="payment_method" value="Cash" id="payment_method" {$1checked} title=""><div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; top: 4px; padding: 5px; cursor: pointer;"><img src="custom/themes/default/images/cash-icon.png">&nbsp;<b>Cash</b></div></label>
                            {if $fields.payment_method.value == "CreditDebitCard"} {assign var="2checked" value="CHECKED"} {/if}
                            <label><input type="radio" name="payment_method" value="CreditDebitCard" {$2checked} id="payment_method" title=""><div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; top: 4px; padding: 5px; cursor: pointer;"><img src="custom/themes/default/images/visa-icon.png">&nbsp;<b>Card</b></div></label>
                            {if $fields.payment_method.value == "BankTranfer"} {assign var="3checked" value="CHECKED"} {/if}
                            <label><input type="radio" name="payment_method" value="BankTranfer" {$3checked} id="payment_method" title=""><div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; top: 4px; padding: 5px; cursor: pointer;"><img src="custom/themes/default/images/bank-icon.png">&nbsp;<b>Bank Transfer</b></div></label>
                            {if $fields.payment_method.value == "Loan"} {assign var="4checked" value="CHECKED"} {/if}
                            <label><input type="radio" name="payment_method" value="Loan" {$4checked} id="payment_method" title=""><div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; top: 4px; padding: 5px; cursor: pointer;"><img src="custom/themes/default/images/loan-icon.png">&nbsp;<b>Loan</b></div></label>
                            {if $fields.payment_method.value == "Other"} {assign var="5checked" value="CHECKED"} {/if}
                            <label><input type="radio" name="payment_method" value="Other" {$5checked} id="payment_method" title=""><div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; top: 4px; padding: 5px; cursor: pointer;"><img src="custom/themes/default/images/other-icon.png">&nbsp;<b>Other</b></div></label>',
                        ),
                    ),
                    5 => 
                    array (
                        0 => array (
                            'type' => 'hidden',
                            'hideLabel' => true,
                            'customCode' => '              
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
                            {html_options name="expiration_date" style = "width: 47%; height: 25px;" id="expiration_date" options=$fields.expiration_date.options selected=$fields.expiration_date.value}&nbsp;&nbsp;&nbsp;&nbsp;{html_options name="expiration_year" style = "width: 46%; height: 25px;" id="expiration_year" options=$fields.expiration_year.options selected=$fields.expiration_year.value}
                            </td>
                            </tr>
                            <tr>
                            <td id="remaining_label" scope="col" valign="top" width="133px">
                            {$MOD.LBL_CARD_AMOUNT}:                      
                            </td>
                            <td valign="top">
                            <input type="text" class="currency" readonly="" style = "background-color: rgb(221, 221, 221); background-position: initial initial; background-repeat: initial initial;" name="card_rate" id="card_rate" value="{sugar_number_format precision=2 var=$fields.card_rate.value}"> %
                            <input type="text" class="currency" readonly="" style = "background-color: rgb(221, 221, 221); background-position: initial initial; background-repeat: initial initial;" name="card_amount" id="card_amount" value="{sugar_number_format var=$fields.card_amount.value}">
                            </td>
                            </tr>
                            </table>
                            </fieldset>
                            <fieldset id="loan_info" style="min-height:50px;">
                            <legend><b> {$MOD.LBL_LOAN_INFO} </b></legend>
                            <table>
                            <tbody>
                            <tr>                           
                            <td id="remaining_label" scope="col" valign="top" width="133px">
                            {$MOD.LBL_LOAN_TYPE}:    
                            </td>
                            <td valign="top">
                            {html_options name="loan_type" style = "height: 25px;" id="loan_type" options=$fields.loan_type.options selected=$fields.loan_type.value}
                            </td>
                            </tr>
                            <tr>                           
                            <td id="remaining_label" scope="col" valign="top" width="133px">
                            {$MOD.LBL_BANK_NAME}:    
                            </td>
                            <td valign="top">
                            {html_options name="bank_name" style = "height: 25px;" id="bank_name" options=$fields.bank_name.options selected=$fields.bank_name.value}
                            </td>
                            </tr>
                            <tr>                           
                            <td id="remaining_label" scope="col" valign="top" width="133px">
                            {$MOD.LBL_BANK_FEE_RATE}:    
                            </td>
                            <td valign="top" nowrap>
                            <input type="text" name="bank_fee_rate" class="currency" id="bank_fee_rate"> %
                            <input type="text" name="bank_fee_amount" class="currency" readonly="" style="background-color: rgb(221, 221, 221); background-position: initial initial; background-repeat: initial initial;" id="bank_fee_amount">
                            </td>
                            </tr>
                            <tr>                           
                            <td id="remaining_label" scope="col" valign="top" width="133px">
                            {$MOD.LBL_LOAN_FEE_RATE}:    
                            </td>
                            <td valign="top" nowrap>
                            <input type="text" name="loan_fee_rate" class="currency" id="loan_fee_rate"> %
                            <input type="text" name="loan_fee_amount" class="currency" readonly="" style="background-color: rgb(221, 221, 221); background-position: initial initial; background-repeat: initial initial;" id="loan_fee_amount">
                            </td>
                            </tr>
                            </tbody></table>
                            </fieldset>
                            ',
                        ),
                    ),
                    6 => 
                    array (
                        0 => 
                        array (
                            'name' => 'remaining',
                            'label' => 'LBL_REMAINING',
                            'customCode' => '<input tabindex="0" size="30" value="{sugar_number_format var=$fields.remaining.value}" type="text" class="currency" name="remaining" id="remaining" readonly style="font-weight: bold; color: #A52A2A; text-align: right; background-color:#DDDDDD !important;">',
                        ),
                    ),
                    7 => 
                    array (
                        0 => 
                        array (
                            'name' => 'payment_amount',
                            'label' => 'LBL_PAYMENT_AMOUNT',
                            'customCode' => '<input class="currency" value="{sugar_number_format var=$fields.payment_amount.value}" type="text" size="30" name="payment_amount" id="payment_amount" style="font-weight: bold; color: brown;" >',
                        ),
                    ), 
                    8 => 
                    array (
                        0 => 
                        array (
                            'name' => 'payment_balance',
                            'label' => 'LBL_PAYMENT_BALANCE',
                            'customCode' => '<input tabindex="0" size="30" value="{sugar_number_format var=$fields.payment_balance.value}" type="text" class="currency" name="payment_balance" id="payment_balance" readonly style="font-weight: bold; color: #A52A2A; text-align: right; background-color:#DDDDDD !important;">',
                        ),
                    ),
                    9 => 
                    array (
                        0 => 
                        array (
                            'name' => 'payment_date',
                            'label' => 'LBL_PAYMENT_DATE',
                        ),
                    ),
                    10 => 
                    array (
                        0 => 
                        array (
                            'name' => 'uploadfile',
                            'displayParams' => 
                            array (
                                'onchangeSetFileNameTo' => 'document_name',
                            ),
                        ),
                        1 => array(
                            'hideLabel' => true
                        ),
                    ),
                    11 => 
                    array (
                        0 => 'description'
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
