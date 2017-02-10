<?php
    $module_name = 'C_Refunds';
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
                        2 => '<input type="hidden" name="free_balance" id="free_balance" value="{$free_balance}">',
                        3 => '<input type="hidden" name="current_team_id" id="current_team_id" value="{$current_team_id}">',
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
                'javascript' => '{sugar_getscript file="include/javascript/popup_parent_helper.js"}
                {sugar_getscript file="cache/include/javascript/sugar_grp_jsolait.js"}
                {sugar_getscript file="modules/Documents/documents.js"}
                {sugar_getscript file="custom/modules/C_Refunds/js/editview.js"}
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
                'LBL_EDITVIEW_PANEL2' => 
                array (
                    0 => 
                    array (
                        0 => 
                        array (
                            'name' => 'document_name',
                            'customCode' => '{$NEWID}',
                        ),
                    ),
                    1 => 
                    array (
                        0 => 
                        array (
                            'name' => 'refund_type',
                            'customCode' => '{html_options name="refund_type" id="refund_type" options=$fields.refund_type.options selected=$fields.refund_type.value}',
                        ),
                    ),
                    2 => 
                    array (
                        0 => 
                        array (
                            'name' => 'contacts_c_refunds_1_name',
                            'displayParams' => 
                            array (
                                'required' => false,
                            ),
                        ),
                        1 => 
                        array (
                            'name' => 'student_name',
                            'customCode' => '
                            <div id="student" style = "display: inline-flex;">
                            <input type="text" name="student_name" id="student_name" value="{$fields.student_name.value}">
                            <input type="button" class="button" value="Select" id="btn_select_student">
                            <input type="hidden" name="student_id" id="student_id" value="{$fields.student_id.value}">
                            </div>
                            <div id="center">
                            <select name="center_name" id="center_name" selected="{$fields.center_name.value}" onchange="this.form.center_id.value=this.form.center_name.options[selectedIndex].id">{$CENTER_OPTIONS}</select>
                            <input type="hidden" name="center_id" id="center_id" value="{$fields.center_id.value}">
                            </div>
                            ',
                        ),
                    ),
                    //        3 => 
                    //        array (
                    //          0 => '',
                    ////          array (
                    ////            'name' => 'opportunities_c_refunds_1_name',
                    ////            'label' => 'LBL_RELATE_TO_ENROLL',
                    ////          ),
                    //        ),
                    3 => 
                    array (
                        0 => 
                        array (
                            'name' => 'exp_date',
                            'customCode' => '<input value="{$current_balance}" type="text" size="20" name="ending_balance" id="ending_balance" readonly="" style="font-weight: bold; color: rgb(165, 42, 42); text-align: right; background-color: rgb(221, 221, 221);">',
                            'label' => 'LBL_ENDING_BALANCE'
                        ),
                    ),
                    4 => 
                    array (
                        0 => 
                        array (
                            'name' => 'refund_amount',
                            'label' => 'LBL_REFUND_AMOUNT',
                            'customCode' => '
                            <input type="text" name="refund_amount" id="refund_amount" class="currency" size="20" maxlength="26" value="{sugar_number_format var=$fields.refund_amount.value}" style="font-weight: bold; color: rgb(165, 42, 42); text-align: right;" onblur="amount_in_words.value = DocTienBangChu(unformatNumber(this.value,num_grp_sep,dec_sep))">
                            <span id="free_balance_select"></span>',
                        ),
                    ),
                    5 => 
                    array (
                        0 => 
                        array (
                            'name' => 'refond_method',
                            'studio' => 'visible',
                            'label' => 'LBL_REFOND_METHOD',
                            'customCode' => '
                            {if $fields.refond_method.value == "Cash"} {assign var="1checked" value="CHECKED"} {/if}
                            <label><input type="radio" name="refond_method" value="Cash" id="refond_method" {$1checked} title=""><div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; top: 4px; padding: 5px; cursor: pointer;"><img src="custom/themes/default/images/cash-icon.png">&nbsp;<b>Cash</b></div></label>
                            {if $fields.refond_method.value == "CreditDebitCard"} {assign var="2checked" value="CHECKED"} {/if}
                            <label><input type="radio" name="refond_method" value="CreditDebitCard" {$2checked} id="refond_method" title=""><div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; top: 4px; padding: 5px; cursor: pointer;"><img src="custom/themes/default/images/visa-icon.png">&nbsp;<b>Card</b></div></label>
                            {if $fields.refond_method.value == "BankTranfer"} {assign var="3checked" value="CHECKED"} {/if}
                            <label><input type="radio" name="refond_method" value="BankTranfer" {$3checked} id="refond_method" title=""><div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; top: 4px; padding: 5px; cursor: pointer;"><img src="custom/themes/default/images/bank-icon.png">&nbsp;<b>Bank Transfer</b></div></label>
                            {if $fields.refond_method.value == "Loan"} {assign var="4checked" value="CHECKED"} {/if}
                            <label><input type="radio" name="refond_method" value="Loan" {$4checked} id="refond_method" title=""><div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; top: 4px; padding: 5px; cursor: pointer;"><img src="custom/themes/default/images/loan-icon.png">&nbsp;<b>Loan</b></div></label>
                            {if $fields.payment_method.value == "Other"} {assign var="5checked" value="CHECKED"} {/if}
                            <label><input type="radio" name="refond_method" value="Other" {$5checked} id="refond_method" title=""><div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; top: 4px; padding: 5px; cursor: pointer;"><img src="custom/themes/default/images/other-icon.png">&nbsp;<b>Other</b></div></label>',
                        ),
                    ),
                    6 => 
                    array (
                        0 => 
                        array (
                            'name' => 'refund_date',
                            'label' => 'LBL_REFUND_DATE',
                        ),
                    ),
                    7 => 
                    array (
                        0 => 
                        array (
                            'name' => 'description',
                            'customCode' => '<textarea id="description" name="description" rows="6" cols="70" title="" tabindex="0" >{$fields.description.value}</textarea>',
                        ),
                    ),
                    8 => 
                    array (
                        0 => 
                        array (
                            'name' => 'uploadfile',
                            'displayParams' => 
                            array (
                                'onchangeSetFileNameTo' => 'document_name',
                            ),
                        ),
                    ),
                    9 => 
                    array (
                        0 => 'assigned_user_name',
                    ),
                ),
            ),
        ),
    );
