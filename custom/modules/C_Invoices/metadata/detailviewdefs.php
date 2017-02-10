<?php
    $module_name = 'C_Invoices';
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
    //                    0 => 'EDIT',
  //                      2 => 'DELETE',
                        3 => 
                        array (
                            'customCode' => '{$PAYPOPUP}',
                        ),
                        4 => 
                        array (
                            'customCode' => '{$EXPORT_EXCEL}',
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
                        'file' => 'custom/modules/C_Invoices/js/detailview.js',
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
                            'name' => 'name',
                            'customCode' => '<span class="textbg_blue">{$fields.name.value}</span>',
                        ),
                        1 => 
                        array (
                            'name' => 'amount',
                            'label' => '{$MOD.LBL_AMOUNT} ({$CURRENCY})',
                        ),
                    ),
                    1 => 
                    array (
                        0 => 
                        array (
                            'name' => 'invoice_date',
                            'label' => 'LBL_INVOICE_DATE',
                        ),
                        1 => 
                        array (
                            'name' => 'balance',
                            'label' => '{$MOD.LBL_BALANCE} ({$CURRENCY})',
                        ),
                    ),
                    2 => 
                    array (
                        0 => 
                        array (
                            'name' => 'c_invoices_opportunities_1_name',
                            'label' => 'LBL_C_INVOICES_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
                        ),
                        1 => 
                        array (
                            'name' => 'status',
                            'studio' => 'visible',
                            'label' => 'LBL_STATUS',
                            'customCode' => '<input type="hidden" class="sugar_field" id="status" value="{$fields.status.value}">
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
                    3 => 
                    array (
                        0 => 
                        array (
                            'name' => 'contacts_c_invoices_1_name',
                            'label' => 'LBL_CONTACTS_C_INVOICES_1_FROM_CONTACTS_TITLE',
                        ),
                        1 => 
                        array (
                            'name' => 'payment_attempts',
                            'label' => 'LBL_PAYMENT_ATTEMPTS',
                        ),
                    ),
                    4 => 
                    array (
                        0 => 'description',
                        1 => array (
                            'label' => '{$MOD.LBL_PAYMORE} ({$CURRENCY})',
                            'customCode' => '{$BUTTON_HTML}',
                        ),
                    ),
                    5 => 
                    array (
                        0 => 'printed',
                    ),
                ),
                'lbl_editview_panel1' => 
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
