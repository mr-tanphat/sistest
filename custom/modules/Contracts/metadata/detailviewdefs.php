<?php
$viewdefs['Contracts'] =
array (
    'DetailView' =>
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
                    'file' => 'custom/modules/Contracts/js/detailview.js',
                ),
            ),
            'form' =>
            array (
                'hidden' =>
                array (
                    0 => '{include file="custom/modules/J_Payment/tpl/addToClassAdult.tpl"}',
                ),
                'buttons' =>
                array (
                    0 => 'EDIT',
                    2 => 'DUPLICATE',
                    3 => 'DELETE',
                ),
            ),
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
                        'customCode' => '<span class="textbg_blue">{$fields.contract_id.value}</span><input type="hidden" name="contract_id" id="contract_id" value="{$fields.contract_id.value}">',
                    ),
                    1 => 'status',
                ),
                1 =>
                array (
                    0 =>
                    array (
                        'name' => 'name',
                        'label' => 'LBL_CONTRACT_NAME',
                    ),
                ),
                2 =>
                array (
                    0 =>
                    array (
                        'name' => 'total_contract_value',
                        'label' => '{$MOD.LBL_TOTAL_CONTRACT_VALUE}',
                    ),
                    1 =>
                    array (
                        'name' => 'total_student',
                        'label' => 'LBL_TOTAL_STUDENT',
                    ),
                ),
                3 =>
                array (
                    0 =>
                    array (
                        'name' => 'remain_amount',
                        'label' => '{$MOD.LBL_REMAIN_AMOUNT}',
                    ),
                    1 =>
                    array (
                        'name' => 'number_of_student',
                        'label' => 'LBL_NUMBER_OF_STUDENT',
                    ),
                ),
                4 =>
                array (
                    0 =>
                    array (
                        'name' => 'amount_per_student',
                        'comment' => 'The overall value of the contract',
                        'label' => 'LBL_AMOUNT_PER_STUDENT',
                    ),
                    1 =>
                    array (
                        'name' => 'study_duration',
                        'label' => 'LBL_STUDY_DURATION',
                    ),
                ),
                5 =>
                array (
                    0 => 'customer_signed_date',
                    1 => 'kind_of_course',
                ),
                6 => array (
                    0 => array(
                        'label' => 'Paid Amount',
                        'customCode' => '{$PAID_AMOUNT}',
                    ),
                    1 => array(
                        'label' => 'Unpaid Amount',
                        'customCode' => '{$UNPAID_AMOUNT}',
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
                    1 => 'account_name',
                ),
                1 =>
                array (
                    0 =>
                    array (
                        'name' => 'payment_amount_1',
                        'comment' => 'Payment 1',
                        'label' => 'LBL_PAYMENT_AMOUNT_1',
                        'customCode' => '
                        {$pmd.1.pmd_amount}
                        {if !empty($pmd.1.pmd_amount)}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Invoice No:
                        {$pmd.1.pmd_invoice_no}
                        {/if}'
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
                        {$pmd.2.pmd_amount}
                        {if !empty($pmd.2.pmd_amount)}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Invoice No:
                        {$pmd.2.pmd_invoice_no}
                        {/if}'
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
                        {$pmd.3.pmd_amount}
                        {if !empty($pmd.3.pmd_amount)}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Invoice No:
                        {$pmd.3.pmd_invoice_no}
                        {/if}'
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
                        {$pmd.4.pmd_amount}
                        {if !empty($pmd.4.pmd_amount)}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Invoice No:
                        {$pmd.4.pmd_invoice_no}
                        {/if}'
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
                        {$pmd.5.pmd_amount}
                        {if !empty($pmd.5.pmd_amount)}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Invoice No:
                        {$pmd.5.pmd_invoice_no}
                        {/if}
                        '
                    ),
                ),
            ),
            'LBL_PANEL_ASSIGNMENT' =>
            array (
                0 =>
                array (
                    0 => 'description',
                ),
                                1 =>
                array (
                    0 => 'assigned_user_name',
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
