<?php
$module_name = 'J_Payment';
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
                    0 => 'EDIT',
                    1 => 'DELETE',
                    2 =>
                    array (
                        'customCode' => '{$EXPORT_FROM_BUTTON} {$CUSTOM_BUTTON}',
                    ),
                    3 =>
                    array (
                        'customCode' => '{$BTN_UNDO}',
                    ),
                ),
                'hidden' =>
                array (
                    0 => '{include file="custom/modules/J_Payment/tpl/paymentTemplate.tpl"}',
                    1 => '
                    {if $team_type == "Junior"}
                    {include file="custom/modules/J_Payment/tpl/delayPayment.tpl"}
                    {else}
                    {include file="custom/modules/J_Payment/tpl/delayPaymentAdult.tpl"}
                    {/if}
                    <input type="hidden" id="team_type" type="team_type" value="{$team_type}"/>
                    ',
                    2 => '{include file="custom/modules/J_Payment/tpl/convert_payment.tpl"}',
                    3 => '<input type="hidden" name="is_corporate" id="is_corporate" value="{$fields.is_corporate.value}">',
                    4 => '<input type="hidden" name="payment_type" id="payment_type" value="{$fields.payment_type.value}">',
                    5 => '<input type="hidden" name="team_id" id="team_id" value="{$fields.team_id.value}">',
                    6 => '<input type="hidden" name="status" id="status" value="{$fields.status.value}">',
                    7 => '<input type="hidden" name="is_paid" id="is_paid" value="{$is_paid}">',
                    8 => '<input type="hidden" name="end_study" id="end_study" value="{$fields.end_study.value}">',
                    9 => '{include file="custom/modules/J_Payment/tpl/addToClassAdult.tpl"}',
                ),
            ),
            'maxColumns' => '3',
            'widths' =>
            array (
                0 =>
                array (
                    'label' => '10',
                    'field' => '20',
                ),
                1 =>
                array (
                    'label' => '10',
                    'field' => '20',
                ),
                2 =>
                array (
                    'label' => '10',
                    'field' => '20',
                ),
            ),
            //'javascript' => '
            //            <link rel="stylesheet" type="text/css" href="{sugar_getjspath file=\'custom/include/javascripts/Bootstrap/bootstrap.min.css\'}">
            //            ',
            'useTabs' => false,
            'tabDefs' =>
            array (
                'LBL_ENROLLMENT' =>
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
                'LBL_CASHHOLDER_ADULT' =>
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
                'LBL_PLACE_HOLDER' =>
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
                'LBL_PAYMENT_PT_BOOK' =>
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
                'LBL_OTHER' =>
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
            ),
            'syncDetailEditViews' => true,
            'includes' =>
            array (
                0 =>
                array (
                    'file' => 'custom/modules/J_Payment/js/detail.js',
                ),
            ),
        ),
        'panels' =>
        array (
            //Payment Enrollment
            'LBL_ENROLLMENT' =>
            array (
                0 => array (
                    0 => array(
                        'name'=>'name',
                        'customCode' => '{$payment_id}',
                    ),
                    1 => array (
                        'name' => 'status',
                        'customCode' => '<b>{$fields.status.value}</b>',
                    ),
                    2 =>
                    array (
                        'name' => 'sale_type',
                        'customCode' => '{$sale_typeQ}',
                    ),
                ),
                1 => array (
                    0 => array (
                        'name' => 'contacts_j_payment_1_name',
                    ),
                    1 => array (
                        'name' => 'payment_type',
                    ),
                    2 =>
                    array (
                        'name' => 'sale_type_date',
                        'customCode' => '{$sale_type_dateQ}',
                    ),
                ),
                2 => array (
                    0 => array (
                        'label' => 'LBL_CLASSES_NAME',
                        'customCode' => '{$html_class}'
                    ),
                    1 =>
                    array (
                        'name' => 'kind_of_course_string',
                        'label' => 'LBL_KIND_OF_COURSE',
                    ),
                    2 => array (
                        'name' => 'payment_date',
                    ),

                ),
                3 => array (
                    0 => array (
                        'name' => 'start_study',
                        'label' => 'LBL_START_STUDY',
                    ),
                    1 => array (
                        'hideLabel' => 'true',
                    ),
                    2 => array (
                        'hideLabel' => 'true',
                    ),

                ),
                4 => array (
                    0 => array (
                        'name' => 'end_study',
                        'label' => 'LBL_END_STUDY',
                    ),
                    1 => 'sessions',
                    2 => array (
                        'hideLabel' => 'true',
                    ),
                ),
                5 => array (
                    0 => array (
                        'name' => 'tuition_fee',
                        'label' => 'LBL_TUITION_FEE',
                    ),
                    1 => 'tuition_hours',
                    2 => 'j_coursefee_j_payment_1_name',

                ),
                7 => array (
                    0 => array (
                        'name' => 'paid_amount',
                        'customLabel' => '{$MOD.LBL_PAID_AMOUNT}:
                        <img border="0" onclick="return SUGAR.util.showHelpTips(this,\'{$MOD.LBL_PAID_AMOUNT_HELP}\');" src="themes/RacerX/images/helpInline.png?v=Iwf_HKfW93hRXHKxiRh5ow" alt="paidAmountHelpTip" class="paidAmountHelpTip">',
                    ),
                    1 => array (
                        'name' => 'paid_hours',
                        'label' => 'LBL_PAID_HOURS',
                    ),
                    2 => array (
                        'hideLabel' => 'true',
                    ),

                ),
                8 => array (
                    0 => 'amount_bef_discount',
                    1 => array (
                        'name' => 'total_hours',
                        'label' => 'LBL_TOTAL_HOURS',
                    ),
                    2 => array (
                        'hideLabel' => 'true',
                    ),
                ),
                9 => array (
                    0 => 'discount_amount',
                    1 => 'discount_percent',
                    2 => 'payment_expired',

                ),
                10 => array (
                    0 => 'final_sponsor',
                    1 => 'final_sponsor_percent',
                    2 => 'loyalty'
                ),
                11 => array (
                    0 => array (
                        'name' => 'total_after_discount',
                    ),
                    1 => array (
                        'hideLabel' => 'true',
                    ),

                    2 => 'account_name'
                ),
                12 => array (
                    0 => 'deposit_amount',
                    1 =>  array (
                        'hideLabel' => 'true',
                    ),
                    2 =>  array (
                        'hideLabel' => 'true',
                    ),
                ),
                13 => array (
                    0 => 'payment_amount',
                    1 => array(
                        'label' => 'LBL_PAID_AMOUNT_2',
                        'customCode' => '{$PAID_AMOUNT}',
                    ),
                    2 => array(
                        'label' => 'LBL_UNPAID_AMOUNT',
                        'customCode' => '{$UNPAID_AMOUNT}',
                    ),
                ),
            ),
            //Payment CashHolder ADULT
            'LBL_CASHHOLDER_ADULT' =>
            array (
                0 => array (
                    0 => array(
                        'name'=>'name',
                        'customCode' => '{$payment_id}',
                    ),
                    1 => array (
                        'name' => 'status',
                        'customCode' => '<b>{$fields.status.value}</b>',
                    ),
                    2 =>
                    array (
                        'name' => 'sale_type',
                        'customCode' => '{$sale_typeQ}',
                    ),
                ),
                1 => array (
                    0 => array (
                        'name' => 'contacts_j_payment_1_name',
                    ),
                    1 => array (
                        'name' => 'payment_type',
                    ),
                    2 =>
                    array (
                        'name' => 'sale_type_date',
                        'customCode' => '{$sale_type_dateQ}',
                    ),
                ),
                2 => array (
                    0 => 'tuition_fee',
                    1 => array (
                        'name' => 'tuition_hours',
                        'customLabel' => '{if $team_type == "Adult"}
                        {$MOD.LBL_TUITION_DAYS}:
                        {else}
                        {$MOD.LBL_TUITION_HOURS}:
                        {/if}',
                    ),
                    2 => 'j_coursefee_j_payment_1_name'
                ),
                3 => array (
                    0 => 'paid_amount',
                    1 => array (
                        'name' => 'paid_hours',
                        'customLabel' => '{if $team_type == "Adult"}
                        {$MOD.LBL_PAID_DAYS}:
                        {else}
                        {$MOD.LBL_PAID_HOURS}:
                        {/if}',
                    ),
                    2 => ''
                ),
                4 => array (
                    0 => 'amount_bef_discount',
                    1 => array (
                        'name' => 'total_hours',
                        'customLabel' => '{if $team_type == "Adult"}
                        {$MOD.LBL_TOTAL_DAYS}:
                        {else}
                        {$MOD.LBL_TOTAL_HOURS}:
                        {/if}',
                    ),
                    2 => ''
                ),
                5 => array (
                    0 => 'discount_amount',
                    1 => 'discount_percent',
                    2 => 'payment_date',


                ),
                6 => array (
                    0 => 'final_sponsor',
                    1 => 'final_sponsor_percent',
                    2 =>
                    array(
                        'name' => 'payment_expired',
                        'customLabel'   => '
                        {if $team_type == "Adult"}
                        {$MOD.LBL_START_STUDY}:
                        {else}
                        {$MOD.LBL_PAYMENT_EXPIRED}:
                        {/if}',
                        'customCode'   => '
                        {if $team_type == "Adult"}
                        {$fields.start_study.value}
                        {else}
                        {$fields.payment_expired.value}
                        {/if}',
                    )

                ),
                7 => array (
                    0 => array (
                        'name' => 'total_after_discount',
                    ),
                    1 => array (
                        'name' => 'kind_of_course',
                        'customCode'=>  '
                        {if $team_type == "Junior"}
                        {$fields.kind_of_course.value}
                        {else}
                        {$fields.kind_of_course_360.value}
                        {/if}'
                    ),
                    2 =>
                    array(
                        'customLabel'   => '
                        {if $team_type == "Adult"}
                        {$MOD.LBL_END_STUDY}:
                        {else}
                        {/if}',
                        'customCode'   => '
                        {if $team_type == "Adult"}
                        {$fields.end_study.value}
                        {else}
                        {/if}',
                    ),
                ),
                8 => array (
                    0 => 'deposit_amount',
                    1 =>  array (
                        'hideLabel' => 'true',
                    ),
                    2 =>  array (
                        'hideLabel' => 'true',
                    ),
                ),
                9 => array (
                    0 =>
                    array (
                        'customLabel'   => '{$MOD.LBL_PAYMENT_AMOUNT}:',
                        'name'          => 'payment_amount',
                    ),
                    1 => '',
                    2 =>
                    array (
                        'name'          => 'loyalty',
                    ),
                ),

                10 => array (
                    0 => 'remain_amount',
                    1 =>
                    array (
                        'customLabel'   => '{if $team_type == "Adult"}
                        {$MOD.LBL_REMAIN_DAYS}:
                        {else}
                        {$MOD.LBL_REMAIN_HOURS}:
                        {/if}',
                        'name'          => 'remain_hours',
                    ),
                    2 => 'account_name'
                ),

                11 => array (
                    0 => array(
                        'label' => 'LBL_PAID_AMOUNT_2',
                        'customCode' => '{$PAID_AMOUNT}',
                    ),
                    1 => array(
                        'label' => 'LBL_UNPAID_AMOUNT',
                        'customCode' => '{$UNPAID_AMOUNT}',
                    ),
                    2 => array(
                        'hideLabel' => 'true',
                    ),
                ),
            ),
            //Payment Place Holder
            'LBL_PLACE_HOLDER' =>
            array (
                0 => array (
                    0 => array(
                        'name'=>'name',
                        'customCode' => '{$payment_id}',
                    ),
                    1 => array (
                        'name' => 'status',
                        'customCode' => '<b>{$fields.status.value}</b>',
                    ),
                    2 =>
                    array (
                        'name' => 'sale_type',
                        'customCode' => '{$sale_typeQ}',
                    ),
                ),
                1 => array (
                    0 => array (
                        'name' => 'contacts_j_payment_1_name',
                    ),
                    1 => array (
                        'name' => 'payment_type',
                    ),
                    2 =>
                    array (
                        'name' => 'sale_type_date',
                        'customCode' => '{$sale_type_dateQ}',
                    ),
                ),
                2 => array (
                    0 => 'amount_bef_discount',
                    1 => array (
                        'name' => 'tuition_hours',
                        'customLabel' => '{if $team_type == "Adult"}
                        {$MOD.LBL_TUITION_DAYS}:
                        {else}
                        {$MOD.LBL_TUITION_HOURS}:
                        {/if}',
                    ),
                    2 => 'j_coursefee_j_payment_1_name'
                ),

                3 => array (
                    0 => 'discount_amount',
                    1 => 'discount_percent',
                    2 => 'payment_date',


                ),
                4 => array (
                    0 => 'final_sponsor',
                    1 => 'final_sponsor_percent',
                    2 =>
                    array(
                        'name' => 'payment_expired',
                        'customLabel'   => '
                        {if $team_type == "Adult"}
                        {$MOD.LBL_START_STUDY}:
                        {else}
                        {$MOD.LBL_PAYMENT_EXPIRED}:
                        {/if}',
                        'customCode'   => '
                        {if $team_type == "Adult"}
                        {$fields.start_study.value}
                        {else}
                        {$fields.payment_expired.value}
                        {/if}',
                    )

                ),
                5 => array (
                    0 => array (
                        'name' => 'total_after_discount',
                    ),
                    1 => array (
                        'name' => 'kind_of_course',
                        'customCode'=>  '
                        {if $team_type == "Junior"}
                        {$fields.kind_of_course.value}
                        {else}
                        {$fields.kind_of_course_360.value}
                        {/if}'
                    ),
                    2 =>
                    array(
                        'customLabel'   => '
                        {if $team_type == "Adult"}
                        {$MOD.LBL_END_STUDY}:
                        {else}
                        {/if}',
                        'customCode'   => '
                        {if $team_type == "Adult"}
                        {$fields.end_study.value}
                        {else}
                        {/if}',
                    ),
                ),
                6 => array (
                    0 =>
                    array (
                        'customLabel'   => '{$MOD.LBL_PAYMENT_AMOUNT}:',
                        'name'          => 'payment_amount',
                    ),
                    1 =>
                    array (
                        'customLabel'   => '{if $team_type == "Adult"}
                        {$MOD.LBL_TOTAL_DAYS}:
                        {else}
                        {$MOD.LBL_TOTAL_HOURS}:
                        {/if}',
                        'name'          => 'total_hours',
                    ),
                    2 =>
                    array (
                        'name'          => 'loyalty',
                    ),
                ),
                7 => array (
                    0 => 'remain_amount',
                    1 =>
                    array (
                        'customLabel'   => '{if $team_type == "Adult"}
                        {$MOD.LBL_REMAIN_DAYS}:
                        {else}
                        {$MOD.LBL_REMAIN_HOURS}:
                        {/if}',
                        'name'          => 'remain_hours',
                    ),
                    2 => 'account_name'
                ),

                8 => array (
                    0 => array(
                        'label' => 'LBL_PAID_AMOUNT_2',
                        'customCode' => '{$PAID_AMOUNT}',
                    ),
                    1 => array(
                        'label' => 'LBL_UNPAID_AMOUNT',
                        'customCode' => '{$UNPAID_AMOUNT}',
                    ),
                    2 => array(
                        'hideLabel' => 'true',
                    ),
                ),
            ),

            //Payment Deposit
            'LBL_DEPOSIT' =>
            array (
                0 => array (
                    0 => array(
                        'name'=>'name',
                        'customCode' => '{$payment_id}',
                    ),
                    1 => array (
                        'name' => 'status',
                        'customCode' => '<b>{$fields.status.value}</b>',
                    ),
                    2 =>
                    array (
                        'name' => 'sale_type',
                        'customCode' => '{$sale_typeQ}',
                    ),
                ),
                1 => array (
                    0 => array (
                        'name' => 'contacts_j_payment_1_name',
                    ),
                    1 => array (
                        'name' => 'payment_type',
                    ),
                    2 =>
                    array (
                        'name' => 'sale_type_date',
                        'customCode' => '{$sale_type_dateQ}',
                    ),
                ),
                2 => array (
                    0 =>
                    array (
                        'customLabel'   => '{$MOD.LBL_PAYMENT_AMOUNT}:',
                        'name'          => 'payment_amount',
                    ),
                    1 => array(
                        'name'          => 'kind_of_course',
                        'customCode' => '{if $team_type == "Junior"}
                        {$fields.kind_of_course.value}
                        {else}
                        {$fields.kind_of_course_360.value}
                        {/if}'
                    ),
                    2 => 'payment_date',

                ),
                3 => array (
                    0 => 'remain_amount',
                    1 => array (
                        'hideLabel' => 'true',
                    ),
                    2 => 'payment_expired',
                ),
                4 => array (
                    0 => array(
                        'label' => 'LBL_PAID_AMOUNT_2',
                        'customCode' => '{$PAID_AMOUNT}',
                    ),
                    1 => array(
                        'label' => 'LBL_UNPAID_AMOUNT',
                        'customCode' => '{$UNPAID_AMOUNT}',
                    ),
                    2 => 'account_name'
                ),
            ),

            //Payment BookGift & Payment Placement Test
            'LBL_BOOK_PLACEMENT_TEST' => array (
                0 => array (
                    0 => array(
                        'name'=>'name',
                        'customCode' => '{$payment_id}',
                    ),
                ),
                1 => array (
                    0 => array (
                        'name' => 'contacts_j_payment_1_name',
                    ),
                    1 => array (
                        'name' => 'payment_type',
                    ),
                    2 => 'payment_date',
                ),
                2 => array (
                    0 => 'amount_bef_discount',
                    1 => array(
                        'hideLabel' => 'true',
                    ),
                    2 => array(
                        'hideLabel' => 'true',
                    ),
                ),

                3 => array (
                    0 => 'discount_amount',
                    1 => 'discount_percent',
                    2 => array (
                        'hideLabel' => 'true',
                    ),

                ),
                4 => array (
                    0 => 'final_sponsor',
                    1 => 'final_sponsor_percent',
                    2 => array (
                        'hideLabel' => 'true',
                    ),

                ),
                5 => array (
                    0 => array (
                        'name' => 'total_after_discount',
                    ),
                    1 => array(
                        'hideLabel' => 'true',
                    ),
                    2 => array(
                        'hideLabel' => 'true',
                    ),
                ),
                6 => array (
                    0 =>
                    array (
                        'customLabel'   => '{$MOD.LBL_PAYMENT_AMOUNT}:',
                        'name'          => 'payment_amount',
                    ),
                    1 => array(
                        'hideLabel' => 'true',
                    ),
                    2 => 'loyalty',
                ),
                7 => array (
                    0 => array(
                        'label' => 'LBL_PAID_AMOUNT_2',
                        'customCode' => '{$PAID_AMOUNT}',
                    ),
                    1 => array(
                        'label' => 'LBL_UNPAID_AMOUNT',
                        'customCode' => '{$UNPAID_AMOUNT}',
                    ),
                    2 => 'account_name'
                ),
            ),

            //Payment Moving Out
            'LBL_MOVING' => array (
                0 => array (
                    0 => 'name',
                    1 => array (
                        'customLabel' => '{$PAYMENT_RELA_LABEL}:',
                        'customCode' => '{$PAYMENT_RELA}',
                    ),
                    2 => array (
                        'hideLabel' => true,
                    ),
                ),
                1 => array (
                    0 => 'contacts_j_payment_1_name',
                    1 => 'payment_type',
                    2 => 'payment_date',
                ),
                2 => array (
                    0 =>
                    array (
                        'customLabel'   => '{if $team_type == "Adult"}
                        {$MOD.LBL_TOTAL_DAYS}:
                        {else}
                        {$MOD.LBL_TOTAL_HOURS}:
                        {/if}',
                        'name'          => 'total_hours',
                    ),
                    1 =>
                    array (
                        'customLabel'   => '{$MOD.LBL_PAYMENT_AMOUNT}:',
                        'name'          => 'payment_amount',
                    ),
                    2 =>
                    array (
                        'customCode'   => '{$fields.use_type.value}',
                        'name'          => 'use_type',
                    ),
                ),
                3 => array (
                    0 =>
                    array (
                        'customLabel'   => '{if $team_type == "Adult"}
                        {$MOD.LBL_REMAIN_DAYS}:
                        {else}
                        {$MOD.LBL_REMAIN_HOURS}:
                        {/if}',
                        'name'          => 'remain_hours',
                    ),
                    1 => 'remain_amount',
                    2 => array (
                        'hideLabel' => true,
                    ),
                ),
            ),

            //Payment Transfer
            'LBL_TRANSFER' => array (
                0 => array (
                    0 => 'name',
                    1 => array (
                        'customLabel' => '{$PAYMENT_RELA_LABEL}',
                        'customCode' => '{$PAYMENT_RELA}',
                    ),
                    2 => 'payment_type',
                ),
                1 => array (
                    0 => 'contacts_j_payment_1_name',
                    1 => array (
                        'customLabel' => '{$STUDENT_RELA_LABEL}',
                        'customCode' => '{$STUDENT_RELA}',
                    ),
                    2 => 'payment_date',
                ),
                2 => array (
                    0 =>
                    array (
                        'customLabel'   => '{if $team_type == "Adult"}
                        {$MOD.LBL_TOTAL_DAYS}:
                        {else}
                        {$MOD.LBL_TOTAL_HOURS}:
                        {/if}',
                        'name'          => 'total_hours',
                    ),
                    1 =>
                    array (
                        'customLabel'   => '{$MOD.LBL_PAYMENT_AMOUNT}:',
                        'name'          => 'payment_amount',
                    ),
                    2 =>
                    array (
                        'customCode'   => '{$fields.use_type.value}',
                        'name'          => 'use_type',
                    ),
                ),
                3 => array (
                    0 =>
                    array (
                        'customLabel'   => '{if $team_type == "Adult"}
                        {$MOD.LBL_REMAIN_DAYS}:
                        {else}
                        {$MOD.LBL_REMAIN_HOURS}:
                        {/if}',
                        'name'          => 'remain_hours',
                    ),
                    1 => 'remain_amount',
                    2 => array (
                        'hideLabel' => true,
                    ),
                ),
            ),
            //Payment Transfer AIMS
            'LBL_TRANSFER_AIMS' => array (
                0 => array (
                    0 => 'name',
                    1 =>  array (
                        'hideLabel' => 'true',
                    ),
                    2 => 'payment_type',
                ),
                1 => array (
                    0 => 'contacts_j_payment_1_name',
                    1 =>  array (
                        'hideLabel' => 'true',
                    ),
                    2 => 'payment_date',
                ),
                2 => array (
                    0 => 'total_hours',
                    1 =>  array (
                        'hideLabel' => 'true',
                    ),
                    2 =>
                    array (
                        'customLabel'   => '{$MOD.LBL_PAYMENT_AMOUNT}:',
                        'name'          => 'payment_amount',
                    ),
                ),
                3 => array (
                    0 =>
                    array (
                        'customLabel'   => '{if $team_type == "Adult"}
                        {$MOD.LBL_REMAIN_DAYS}:
                        {else}
                        {$MOD.LBL_REMAIN_HOURS}:
                        {/if}',
                        'name'          => 'remain_hours',
                    ),
                    1 =>  array (
                        'hideLabel' => 'true',
                    ),
                    2 => 'remain_amount',
                ),
            ),
            //Payment Refund
            'LBL_REFUND' => array (
                0 => array (
                    0 => 'name',
                    1 => array (
                        'hideLabel' => true,
                    ),
                    2 => array (
                        'hideLabel' => true,
                    ),
                ),
                1 => array (
                    0 => 'contacts_j_payment_1_name',
                    1 => array (
                        'hideLabel' => true,
                    ),
                    2 => 'payment_type',
                ),
                2 => array (
                    0 => array (
                        'name' => 'payment_amount',
                        'label' => 'LBL_REFUND_AMOUNT',
                    ),
                    1 => array (
                        'hideLabel' => true,
                    ),
                    2 => array (
                        'name' => 'refund_revenue',
                        'label' => 'LBL_DROP_REVENUE',
                    ),
                ),
                3 => array (
                    0 => array (
                        'name' => 'payment_date',
                        'label' => 'LBL_REFUND_DATE',
                    ),
                    1 => array (
                        'hideLabel' => true,
                    ),
                    2 => 'uploadfile',

                ),
            ),
            // Payment Delay
            'LBL_DELAY' => array (
                0 => array (
                    0 => array(
                        'name'=>'name',
                        'customCode' => '{$payment_id}',
                    ),
                    1 => array (
                        'hideLabel' => true,
                    ),
                    2 => 'payment_type'
                ),
                1 => array (
                    0 => 'contacts_j_payment_1_name',
                    1 =>
                    array (
                        'customCode'   => '{$fields.use_type.value}',
                        'name'          => 'use_type',
                    ),
                    2 => 'payment_date',
                ),
                2 => array (
                    0 =>
                    array (
                        'customLabel'   => '{if $team_type == "Adult"}
                        {$MOD.LBL_TOTAL_DAYS}:
                        {else}
                        {$MOD.LBL_TOTAL_HOURS}:
                        {/if}',
                        'name'          => 'total_hours',
                    ),
                    1 =>
                    array (
                        'customLabel'   => '{$MOD.LBL_PAYMENT_AMOUNT}:',
                        'name'          => 'payment_amount',
                    ),
                    2 => 'payment_expired'
                ),
                3 => array (
                    0 =>
                    array (
                        'customLabel'   => '{if $team_type == "Adult"}
                        {$MOD.LBL_REMAIN_DAYS}:
                        {else}
                        {$MOD.LBL_REMAIN_HOURS}:
                        {/if}',
                        'name'          => 'remain_hours',
                    ),
                    1 => 'remain_amount',
                    2 => array (
                        'hideLabel' => true,
                    ),
                ),
            ),
            //Desctiption & Assign To & Team
            'LBL_OTHER' => array (
                0 => array (
                    0 => 'description',
                    1 =>  array (
                        'name' => 'note',
                        'customCode' => '{$fields.note.value}  {$revenue_link}',
                    ),
                    2 =>  array (
                        'hideLabel' => 'true',
                    ),
                ),
                1 => array (
                    0 =>
                    array (
                        'name' => 'assigned_user_name',
                        'customCode' => '{$assigned_user_idQ}',
                        'customLabel'  => '
                        {if $team_type == "Junior"}
                        {$MOD.LBL_ASSIGNED_USER}
                        {else}
                        {$MOD.LBL_FIRST_SM}
                        {/if}: ',
                    ),
                    1 =>  array (
                        'hideLabel' => 'true',
                    ),
                    2 => array (
                        'name' => 'date_entered',
                        'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
                        'label' => 'LBL_DATE_ENTERED',
                    ),
                ),
                2 => array (
                    0 => 'team_name',
                    1 =>  array (
                        'hideLabel' => 'true',
                    ),
                    2 =>
                    array (
                        'name' => 'date_modified',
                        'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
                        'label' => 'LBL_DATE_MODIFIED',
                    ),
                ),
                3 =>
                array (
                    0=>'',
                    1 =>
                    array (
                        'customCode' => '<h2 style="color: #a90000;" class="nextInvoice">Next invoice number: <span id="nextInvoice"></span></h2>',
                    ),
                ),
            ),
        ),
    ),
);
