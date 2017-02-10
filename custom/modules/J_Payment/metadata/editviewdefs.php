<?php
$module_name = 'J_Payment';
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
                    1 => '<input type="hidden" name="content" value="{$fields.content.value}">',
                    2 => '{include file="custom/modules/J_Payment/tpl/discountTable.tpl"}
                    {include file="custom/modules/J_Payment/tpl/sponTable.tpl"}',
                    3 => '{$discount_list}{$sponsor_list}',
                    4 => '<input type="hidden" name="payment_list" id="payment_list" value="{$fields.payment_list.value}">',
                    6 => '<input type="hidden" name="class_list" id="class_list" value="{$fields.class_list.value}">',
                    7 => '<input type="hidden" name="sponsor_id" id="sponsor_id" value="">',
                    8 => '
                    <input type="hidden" name="sub_discount_amount" id="sub_discount_amount" value="{sugar_number_format var=$fields.sub_discount_amount.value}">
                    <input type="hidden" name="sub_discount_percent" id="sub_discount_percent" value="{sugar_number_format var=$fields.sub_discount_percent.value precision=2}">',
                    9 => '<input type="hidden" name="lead_id" id="lead_id" value="{$fields.lead_id.value}">',
                    10 => '{$lock_assigned_to}',
                    11 => '<input type="hidden" name="outstanding_list" value="{$fields.outstanding_list.value}">',
                    12 => '<input type="hidden" name="is_outstanding" value="{$fields.is_outstanding.value}">',
                    13 => '<input type="hidden" name="ratio" id="ratio" value="{$ratio}">',
                    14 => '<input type="hidden" name="catch_limit" id="catch_limit" value="{$fields.catch_limit.value}">',
                    15 => '<input type="hidden" name="is_outing" id="is_outing" value="{$fields.is_outing.value}">',
                    16 => '<input type="hidden" name="aims_id" id="aims_id" value="{$fields.aims_id.value}">',
                    17 => '<input type="hidden" name="team_type" id="team_type" value="{$team_type}">',
                    18 => '<input type="hidden" name="student_corporate_name" id="student_corporate_name" value="">',
                    19 => '<input type="hidden" name="student_corporate_id" id="student_corporate_id" value="">',
                ),
            ),
            'maxColumns' => '2',
            'widths' =>
            array (
                0 =>
                array (
                    'label' => '10',
                    'field' => '45',
                ),
                1 =>
                array (
                    'label' => '10',
                    'field' => '35',
                ),
            ),
            'javascript' => '
            {if $fields.payment_type.value == "Moving Out" || $fields.payment_type.value == "Transfer Out" || $fields.payment_type.value == "Refund"}
            {sugar_getscript file="custom/modules/J_Payment/js/edit_moving_transfer_refunds.js"}
            {elseif $fields.payment_type.value == "Transfer From AIMS"}
            {sugar_getscript file="custom/modules/J_Payment/js/editview_tf_from_aims.js"}
            {else}
            {if $team_type == "Adult"}
            {sugar_getscript file="custom/modules/J_Payment/js/edit_enrollment_adults.js"}
            {else}
            {sugar_getscript file="custom/modules/J_Payment/js/edit_enrollmentssss.js"}
            {/if}
            {sugar_getscript file="custom/modules/J_Payment/js/extention_layout.js"}
            {/if}
            {sugar_getscript file="custom/include/javascripts/Bootstrap/bootstrap.min.js"}
            {sugar_getscript file="custom/include/javascripts/BootstrapSelect/bootstrap-select.min.js"}
            {sugar_getscript file="custom/include/javascripts/AjaxBootstrapSelect/js/ajax-bootstrap-select.js"}
            {sugar_getscript file="custom/include/javascripts/BootstrapMultiselect/js/bootstrap-multiselect.js"}
            <link rel="stylesheet" href="{sugar_getjspath file=custom/include/javascripts/Bootstrap/bootstrap.min.css}"/>
            <link rel="stylesheet" href="{sugar_getjspath file=custom/include/javascripts/BootstrapSelect/bootstrap-select.min.css}"/>
            <link rel="stylesheet" href="{sugar_getjspath file=custom/include/javascripts/AjaxBootstrapSelect/css/ajax-bootstrap-select.css}"/>
            <link rel="stylesheet" href="{sugar_getjspath file=custom/include/javascripts/BootstrapMultiselect/css/bootstrap-multiselect.css}"/>
            <link rel="stylesheet" href="{sugar_getjspath file=custom/modules/J_Payment/css/custom_style.css}"/>
            {$limit_discount_percent}
            ',
            'useTabs' => false,
            'tabDefs' =>
            array (
                'LBL_SELECT_PAYMENT' =>
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
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
                'LBL_OTHER_PAYMENT' =>
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
                'LBL_PAYMENT_MOVING' =>
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
                'LBL_PAYMENT_TRANSFER' =>
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
                'LBL_PAYMENT_REFUND' =>
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
                'LBL_EDITVIEW_PANEL2' =>
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
            ),
            'syncDetailEditViews' => false,
        ),
        'panels' =>
        array (
            'LBL_SELECT_PAYMENT' =>
            array (
                0 =>
                array (
                    0 => array (
                        'hideLabel' => true,
                        'customCode' => '{include file="custom/modules/J_Payment/tpl/paymentList.tpl"}'
                    )
                ),
            ),
            'LBL_ENROLLMENT' =>
            array (
                0 =>
                array (
                    1 =>
                    array (
                        'hideLabel' => true
                    ),
                ),
                1 =>
                array (
                    0 =>
                    array (
                        'name' => 'contacts_j_payment_1_name',
                        'customLabel' => '{$MOD.LBL_STUDENT}: <span class="required">*</span>',
                        'customCode' => '{include file="custom/modules/J_Payment/tpl/fieldStudent.tpl"}'
                    ),
                    1 =>
                    array (
                        'hideLabel' => 'true',
                    ),
                ),
                2 =>
                array (
                    0 =>
                    array (
                        'customLabel' => '{$MOD.LBL_SCLASSES}: <span class="required">*</span>',
                        'customCode' => '<select id="classes" name="classes[]" multiple="multiple"> {$CLASS_OPTIONS} </select>',
                    ),
                    1 => array(
                        'name' => 'payment_type',
                        'customCode' => '{$payment_type}',
                    ),
                ),
                3 =>
                array (
                    0 =>
                    array (
                        'name' => 'start_study',
                    ),
                    1 =>
                    array (
                        'name' => 'class_start',
                        'label' => 'LBL_CLASS_SCHEDULE',
                        'customCode' => '<input class="date_input input_readonly" style="display:none;" autocomplete="off" type="text" name="class_start" id="class_start" value="{$fields.class_start.value}" tabindex="0" size="11" maxlength="10" readonly>
                        <div id="div_sclass_schedule"></div>
                        ',
                    ),
                ),
                4 =>
                array (
                    0 =>
                    array (
                        'name' => 'end_study',
                        'customCode' => '
                        <table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width = "40%">
                        <span class="dateTime">
                        <input class="date_input" autocomplete="off" type="text" name="end_study" id="end_study" value="{$fields.end_study.value}" title="{$MOD.LBL_END_STUDY}" tabindex="0" size="11" maxlength="10">
                        <img src="themes/RacerX/images/jscalendar.png" alt="Enter Date" style="position:relative; top:6px" border="0" id="end_study_trigger">
                        </span>
                        {literal}
                        <script type="text/javascript">
                        Calendar.setup ({
                        inputField : "end_study",
                        daFormat : cal_date_format,
                        button : "end_study_trigger",
                        singleClick : true,
                        dateStr : "",
                        step : 1,
                        weekNumbers:false
                        });</script>{/literal}</td>
                        <td width="25%" scope="col"><label>{$MOD.LBL_LESSONS}: </label></td>
                        <td width="35%"><input class="input_readonly" autocomplete="off" type="text" name="sessions" id="sessions" value="{$fields.sessions.value}" tabindex="0" size="4" maxlength="10" readonly></td>
                        </tr></tbody>
                        </table>',
                    ),
                    1 => array(
                        'name' => 'class_end',
                        'customLabel' => ' ',
                        'customCode' => '<input class="date_input input_readonly" style="display:none;" autocomplete="off" type="text" name="class_end" id="class_end" value="{$fields.class_end.value}" tabindex="0" size="11" maxlength="10" readonly>
                        <input type="button" id="btn_show_hide_schedule" value="{$MOD.LBL_HIDE_SCHEDULE}" onclick="showClassSchedule();"/>',
                    )
                ),
                5 =>
                array (
                    0 =>
                    array (
                        'name' => 'tuition_fee',
                        'label' => 'LBL_TUITION_FEE',
                        'customCode' => '
                        <table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width = "40%"><input class="currency input_readonly" type="text" name="tuition_fee" id="tuition_fee" size="20" maxlength="26" value="{sugar_number_format var=$fields.tuition_fee.value}" title="{$MOD.LBL_TUITION_FEE}" tabindex="0"  style="font-weight: bold;" readonly></td>
                        <td width="25%" scope="col"><label>
                        {$MOD.LBL_TUITION_HOURS}: </label></td>
                        <td width="35%"><input class="input_readonly" autocomplete="off" type="text" name="tuition_hours" id="tuition_hours" value="{sugar_number_format var=$fields.tuition_hours.value precision=2}" tabindex="0" size="4" maxlength="10" style="color: rgb(165, 42, 42);" readonly></td>
                        </tr></tbody>
                        </table>',
                    ),
                    1 =>
                    array (
                        'name' => 'j_coursefee_j_payment_1j_coursefee_ida',
                        'customCode' => '{$coursefee}',
                        'customLabel' => '{$MOD.LBL_COURSE_FEE_ID}: <span class="required">*</span>',
                    ),
                ),
                7 =>
                array (
                    0 =>
                    array (
                        'name' => 'paid_amount',
                        'customLabel' => '<label style="color: green;">{$MOD.LBL_PAID_AMOUNT}: </label>',
                        'customCode' => '<table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width = "40%"><input class="currency input_readonly" type="text" name="paid_amount" id="paid_amount" size="20" maxlength="26" value="" title="{$MOD.LBL_PAID_AMOUNT}" tabindex="0"  style="font-weight: bold;" readonly></td>
                        <td width="25%" scope="col"><label style="color: green;">{$MOD.LBL_PAID_HOURS}: </label></td>
                        <td width="35%"><input class="input_readonly" autocomplete="off" type="text" name="paid_hours" id="paid_hours" value="{sugar_number_format var=$fields.paid_hours.value precision=2}" tabindex="0" size="4" maxlength="10" readonly></td>
                        </tr></tbody>
                        </table>',
                    ),
                    1 =>
                    array (
                        'hideLabel' => true,
                    ),
                ),
                8 =>
                array (
                    0 =>
                    array (
                        'name' => 'amount_bef_discount',
                        'label' => 'LBL_AMOUNT_BEF_DISCOUNT',
                        'customCode' => '<table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width = "40%"><input class="currency input_readonly" type="text" name="amount_bef_discount" id="amount_bef_discount" size="20" maxlength="26" value="{sugar_number_format var=$fields.amount_bef_discount.value}" title="{$MOD.LBL_AMOUNT_BEF_DISCOUNT}" tabindex="0"  style="font-weight: bold;" readonly></td>
                        <td width="25%" scope="col"><label>{$MOD.LBL_TOTAL_HOURS}: </label></td>
                        <td width="35%"><input class="input_readonly" autocomplete="off" type="text" name="total_hours" id="total_hours" value="{sugar_number_format var=$fields.total_hours.value precision=2}" tabindex="0" size="4" maxlength="10" readonly></td>
                        </tr></tbody>
                        </table>',
                    ),

                    1 =>array (
                        'name' => 'loyalty',
                        'label' => 'LBL_LOYALTY',
                        'customCode' => '<input type="text" name="loyalty" id="loyalty" size="20" maxlength="100" value="{$fields.loyalty.value}" title="{$MOD.LBL_LOYALTY}">',
                    ),
                ),
                9 =>
                array (
                    0 =>
                    array (
                        'customCode' => '
                        <div id="discount_detail"></div>
                        <input class="button primary" type="button" name="btn_get_discount" value="Get Discount" id="btn_get_discount">',
                    ),
                    //                    1 =>
                    //                    array (
                    //                        'name' => 'sponsor_amount',
                    //                        'label' => 'LBL_SPONSOR_AMOUNT',
                    //                        'customCode' => '<table width="100%" style="padding:0px!important;">
                    //                        <tbody><tr colspan="3">
                    //                        <td style="padding: 0px !important;" width = "40%"><input class="currency" type="text" name="sponsor_amount" id="sponsor_amount" size="20" maxlength="26" value="{sugar_number_format var=$fields.sponsor_amount.value}" title="{$MOD.LBL_SPONSOR_AMOUNT}" tabindex="0"  style="font-weight: bold;"></td>
                    //                        <td width="25%" scope="col"><label>{$MOD.LBL_SPONSOR_PERCENT}: </label></td>
                    //                        <td width="35%"><input class=""  autocomplete="off" type="text" name="sponsor_percent" id="sponsor_percent" value="{sugar_number_format var=$fields.sponsor_percent.value precision=2}" tabindex="0" size="4" maxlength="10"></td>
                    //                        </tr></tbody>
                    //                        </table>',
                    //                    ),
                    1 =>
                    array (
                        'customCode' => '
                        <div id="sponsor_detail"></div>
                        <input class="button primary" type="button" name="btn_add_sponsor" value="Add Sponsor" id="btn_add_sponsor">',
                    ),
                ),
                10 =>
                array (
                    0 =>
                    array (
                        'name' => 'discount_amount',
                        'label' => 'LBL_DISCOUNT_AMOUNT',
                        'customCode' => '
                        <table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width = "40%"><input class="currency input_readonly" type="text" name="discount_amount" id="discount_amount" size="20" maxlength="26" value="{sugar_number_format var=$fields.discount_amount.value}" title="{$MOD.LBL_DISCOUNT_AMOUNT}" tabindex="0"  style="font-weight: bold;" readonly></td>
                        <td width="25%" scope="col"><label>{$MOD.LBL_DISCOUNT_PERCENT}: </label></td>
                        <td width="35%"><input class="input_readonly" autocomplete="off" type="text" name="discount_percent" id="discount_percent" value="{sugar_number_format var=$fields.discount_percent.value precision=2}" tabindex="0" size="4" maxlength="10" readonly></td>
                        </tr></tbody>
                        </table>',
                    ),

                    1 =>array (
                        'name' => 'final_sponsor',
                        'label' => 'LBL_FINAL_SPONSOR',
                        'customCode' => '
                        <table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width = "40%">
                        <input readonly size="20" maxlength="26" class="currency input_readonly" name="final_sponsor" type="text" id="final_sponsor" value="{sugar_number_format var=$fields.final_sponsor.value}" tabindex="0"  style="font-weight: bold;"></td>
                        <td width="25%" scope="col"><label>{$MOD.LBL_FINAL_SPONSOR_PERCENT}: </label></td>
                        <td width="35%"><input class="input_readonly" autocomplete="off" type="text" name="final_sponsor_percent" id="final_sponsor_percent" value="{sugar_number_format var=$fields.final_sponsor_percent.value precision=2}" tabindex="0" size="4" maxlength="10" readonly></td>
                        </tr></tbody>
                        </table>
                        ',
                    ),
                ),
                12 =>
                array (
                    0 =>
                    array (
                        'name' => 'total_after_discount',
                        'customCode' => '<input class="currency input_readonly" type="text" name="total_after_discount" id="total_after_discount" size="20" maxlength="26" value="{sugar_number_format var=$fields.total_after_discount.value}" title="{$MOD.LBL_TOTAL_AFTER_DISCOUNT}" tabindex="0"  style="font-weight: bold;" readonly>',
                    ),
                ),
                13 =>
                array (
                    0 =>
                    array (
                        'name' => 'deposit_amount',
                        'customCode' => '
                        <table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width = "40%"><input class="currency input_readonly" type="text" name="deposit_amount" id="deposit_amount" size="20" maxlength="26" value="{sugar_number_format var=$fields.deposit_amount.value}" title="{$MOD.LBL_DISCOUNT_AMOUNT}" tabindex="0"  style="font-weight: bold;" readonly></td>
                        <td width="25%" scope="col"><label style="color: green;">{$MOD.LBL_REMAINING_FREEBALANCE}: </label></td>
                        <td width="35%"><input class="currency input_readonly" type="text" name="remaining_freebalace" id="remaining_freebalace" size="15" maxlength="26" value="{sugar_number_format var=$fields.remaining_freebalace.value}" title="{$MOD.LBL_REMAINING_FREEBALANCE}" tabindex="0"  style="font-weight: bold;" readonly></td>
                        </tr></tbody>
                        </table>',
                        'customLabel' => '<label style="color: green;">{$MOD.LBL_DEPOSIT_AMOUNT}: </label>'
                    ),
                    1 =>
                    array (
                        'hideLabel' => true,
                    ),
                ),
                14 =>
                array (
                    0 =>
                    array (
                        'name' => 'payment_amount',
                        'customLabel' => '<b>{$MOD.LBL_GRAND_TOTAL}:</b>',
                        'customCode' => '<input class="currency input_readonly" type="text" name="payment_amount" id="payment_amount" size="20" maxlength="26" value="{sugar_number_format var=$fields.payment_amount.value}" title="{$MOD.LBL_GRAND_TOTAL}" tabindex="0"  style="font-weight: bold; color: rgb(165, 42, 42);" readonly>',
                    ),
                    1 => 'payment_date'
                ),
                16 =>
                array (
                    0 =>
                    array (
                        'name' => 'split_payment',
                        'customCode' => '
                        {html_options name="number_of_payment" id="number_of_payment" options=$fields.number_of_payment.options selected=$fields.number_of_payment.value}
                        ',
                    ),
                    1 =>
                    array (
                        'name' => 'is_corporate',
                    ),
                ),
                17 =>
                array (
                    0 =>
                    array (
                        'hideLabel' => true,
                        //                        'customCode' => '{$PAYMENT_DETAILS}',
                        'customCode' => '{include file="custom/modules/J_Payment/tpl/payment_detail.tpl"}'
                    ),
                    1 =>
                    array (
                        'hideLabel' => true,
                        'customCode' => '{include file="custom/modules/J_Payment/tpl/is_corporate.tpl"}'
                    ),
                ),
            ),
            // PAYMENT ADULT
            'LBL_CASHHOLDER_ADULT' =>
            array (
                1 =>
                array (
                    0 =>
                    array (
                        'name' => 'contacts_j_payment_1_name',
                        'customLabel' => '{$MOD.LBL_STUDENT}: <span class="required">*</span>',
                        'customCode' => '{include file="custom/modules/J_Payment/tpl/fieldStudent.tpl"}'
                    ),
                    1 =>
                    array (
                        'name' => 'payment_type',
                        'customCode' => '
                        {if !empty($fields.id.value)}
                        {$fields.payment_type.value}<input type="hidden" name="payment_type" id="payment_type" value="{$fields.payment_type.value}"/>
                        {else}
                        {html_options name="payment_type" id="payment_type" options=$payment_type selected=$payment_type_selected}{/if}
                        ',
                    ),
                ),
                2 =>
                array (
                    0 => array (
                        'hideLabel' => true
                    ),
                    1 =>array (
                        'name' => 'kind_of_course',
                        'customCode'=> '{if $team_type == "Junior"}
                        {html_options name="kind_of_course" id="kind_of_course" options=$fields.kind_of_course.options selected=$fields.kind_of_course.value}
                        {else}
                        {html_options name="kind_of_course_360" id="kind_of_course_360" options=$fields.kind_of_course_360.options selected=$fields.kind_of_course_360.value}{/if}'
                    ),
                ),
                3 =>
                array (
                    0 =>
                    array (
                        'name' => 'tuition_fee',
                        'label' => 'LBL_TUITION_FEE',
                        'customCode' => '
                        <table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width = "40%"><input class="currency input_readonly" type="text" name="tuition_fee" id="tuition_fee" size="20" maxlength="26" value="{sugar_number_format var=$fields.tuition_fee.value}" title="{$MOD.LBL_TUITION_FEE}" tabindex="0"  style="font-weight: bold;" readonly></td>
                        <td width="25%" scope="col"><label>
                        {$MOD.LBL_TUITION_DAYS}: </label></td>
                        <td width="35%"><input class="input_readonly" autocomplete="off" type="text" name="tuition_hours" id="tuition_hours" value="{sugar_number_format var=$fields.tuition_hours.value precision=2}" tabindex="0" size="4" maxlength="10" style="color: rgb(165, 42, 42);" readonly></td>
                        </tr></tbody>
                        </table>',
                    ),
                    1 =>
                    array (
                        'name' => 'j_coursefee_j_payment_1j_coursefee_ida',
                        'customCode' => '{$coursefee}',
                        'customLabel' => '<span class="coursefee">{$MOD.LBL_COURSE_FEE_ID}: <span class="required">*</span></span>',
                    ),

                ),
                4 =>
                array (
                    0 =>
                    array (
                        'name' => 'paid_amount',
                        'customLabel' => '<label style="color: green;">{$MOD.LBL_PAID_AMOUNT}: </label>',
                        'customCode' => '<table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width = "40%"><input class="currency input_readonly" type="text" name="paid_amount" id="paid_amount" size="20" maxlength="26" value="" title="{$MOD.LBL_PAID_AMOUNT}" tabindex="0"  style="font-weight: bold;" readonly></td>
                        <td width="25%" scope="col"><label style="color: green;">{$MOD.LBL_PAID_DAYS}: </label></td>
                        <td width="35%"><input class="input_readonly" autocomplete="off" type="text" name="paid_hours" id="paid_hours" value="{sugar_number_format var=$fields.paid_hours.value precision=2}" tabindex="0" size="4" maxlength="10" readonly></td>
                        </tr></tbody>
                        </table>',
                    ),
                    1 =>
                    array (
                        'hideLabel' => true,
                    ),
                ),
                5 =>
                array (
                    0 =>
                    array (
                        'name' => 'amount_bef_discount',
                        'label' => 'LBL_AMOUNT_BEF_DISCOUNT',
                        'customCode' => '<table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width = "40%"><input class="currency input_readonly" type="text" name="amount_bef_discount" id="amount_bef_discount" size="20" maxlength="26" value="{sugar_number_format var=$fields.amount_bef_discount.value}" title="{$MOD.LBL_AMOUNT_BEF_DISCOUNT}" tabindex="0"  style="font-weight: bold;" readonly></td>
                        <td width="25%" scope="col"><label>{$MOD.LBL_TOTAL_DAYS}: </label></td>
                        <td width="35%"><input class="input_readonly" autocomplete="off" type="text" name="total_hours" id="total_hours" value="{sugar_number_format var=$fields.total_hours.value precision=2}" tabindex="0" size="4" maxlength="10" readonly></td>
                        </tr></tbody>
                        </table>',
                    ),

                    1 =>array (
                        'name' => 'loyalty',
                        'label' => 'LBL_LOYALTY',
                        'customCode' => '<input type="text" name="loyalty" id="loyalty" size="20" maxlength="100" value="{$fields.loyalty.value}" title="{$MOD.LBL_LOYALTY}">',
                    ),
                ),
                6 =>
                array (
                    0 =>
                    array (
                        'customCode' => '
                        <div id="discount_detail"></div>
                        <input class="button primary" type="button" name="btn_get_discount" value="Get Discount" id="btn_get_discount">',
                    ),
                    1 =>
                    array (
                        'customCode' => '
                        <div id="sponsor_detail"></div>
                        <input class="button primary" type="button" name="btn_add_sponsor" value="Add Sponsor" id="btn_add_sponsor">',
                    ),
                ),
                7 =>
                array (
                    0 =>
                    array (
                        'name' => 'discount_amount',
                        'label' => 'LBL_DISCOUNT_AMOUNT',
                        'customCode' => '
                        <table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width = "40%"><input class="currency input_readonly" type="text" name="discount_amount" id="discount_amount" size="20" maxlength="26" value="{sugar_number_format var=$fields.discount_amount.value}" title="{$MOD.LBL_DISCOUNT_AMOUNT}" tabindex="0"  style="font-weight: bold;" readonly></td>
                        <td width="25%" scope="col"><label>{$MOD.LBL_DISCOUNT_PERCENT}: </label></td>
                        <td width="35%"><input class="input_readonly" autocomplete="off" type="text" name="discount_percent" id="discount_percent" value="{sugar_number_format var=$fields.discount_percent.value precision=2}" tabindex="0" size="4" maxlength="10" readonly></td>
                        </tr></tbody>
                        </table>',
                    ),
                    1 =>array (
                        'name' => 'final_sponsor',
                        'label' => 'LBL_FINAL_SPONSOR',
                        'customCode' => '
                        <table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width = "40%">
                        <input readonly size="20" maxlength="26" class="currency input_readonly" name="final_sponsor" type="text" id="final_sponsor" value="{sugar_number_format var=$fields.final_sponsor.value}" tabindex="0"  style="font-weight: bold;"></td>
                        <td width="25%" scope="col"><label>{$MOD.LBL_FINAL_SPONSOR_PERCENT}: </label></td>
                        <td width="35%"><input class="input_readonly" autocomplete="off" type="text" name="final_sponsor_percent" id="final_sponsor_percent" value="{sugar_number_format var=$fields.final_sponsor_percent.value precision=2}" tabindex="0" size="4" maxlength="10" readonly></td>
                        </tr></tbody>
                        </table>
                        ',
                    ),
                ),
                8 =>
                array (
                    0 =>
                    array (
                        'name' => 'total_after_discount',
                        'customCode' => '<input class="currency input_readonly" type="text" name="total_after_discount" id="total_after_discount" size="20" maxlength="26" value="{sugar_number_format var=$fields.total_after_discount.value}" title="{$MOD.LBL_TOTAL_AFTER_DISCOUNT}" tabindex="0"  style="font-weight: bold;" readonly>',
                    ),
                    1 =>
                    array (
                        'name' => 'loyalty',
                        'label' => 'LBL_LOYALTY',
                        'customCode' => '<input type="text" name="loyalty" id="loyalty" size="20" maxlength="100" value="{$fields.loyalty.value}" title="{$MOD.LBL_LOYALTY}">',
                    ),

                ),
                9 =>
                array (
                    0 =>
                    array (
                        'name' => 'deposit_amount',
                        'customCode' => '
                        <table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width = "40%"><input class="currency input_readonly" type="text" name="deposit_amount" id="deposit_amount" size="20" maxlength="26" value="{sugar_number_format var=$fields.deposit_amount.value}" title="{$MOD.LBL_DISCOUNT_AMOUNT}" tabindex="0"  style="font-weight: bold;" readonly></td>
                        <td width="25%" scope="col"><label style="color: green;">{$MOD.LBL_REMAINING_FREEBALANCE}: </label></td>
                        <td width="35%"><input class="currency input_readonly" type="text" name="remaining_freebalace" id="remaining_freebalace" size="15" maxlength="26" value="{sugar_number_format var=$fields.remaining_freebalace.value}" title="{$MOD.LBL_REMAINING_FREEBALANCE}" tabindex="0"  style="font-weight: bold;" readonly></td>
                        </tr></tbody>
                        </table>',
                        'customLabel' => '<label style="color: green;">{$MOD.LBL_DEPOSIT_AMOUNT}: </label>'
                    ),
                    1 =>
                    array (
                        'hideLabel' => true,
                    ),
                ),
                10 =>
                array (
                    0 =>
                    array (
                        'name' => 'payment_amount',
                        'customLabel' => '<b>{$MOD.LBL_GRAND_TOTAL}:</b>',
                        'customCode' => '<input class="currency input_readonly" type="text" name="payment_amount" id="payment_amount" size="20" maxlength="26" value="{sugar_number_format var=$fields.payment_amount.value}" title="{$MOD.LBL_GRAND_TOTAL}" tabindex="0"  style="font-weight: bold;color: rgb(165, 42, 42);" readonly>',
                    ),
                    1 => 'payment_date'
                ),
                11 =>
                array (
                    0 =>
                    array (
                        'name' => 'split_payment',
                        'customCode' => '
                        {html_options name="number_of_payment" id="number_of_payment" options=$fields.number_of_payment.options selected=$fields.number_of_payment.value}
                        ',
                    ),
                    1 =>
                    array (
                        'name' => 'is_corporate',
                    ),
                ),
                12 =>
                array (
                    0 =>
                    array (
                        'hideLabel' => true,
                        'customCode' => '{include file="custom/modules/J_Payment/tpl/payment_detail.tpl"}'
                    ),
                    1 =>
                    array (
                        'hideLabel' => true,
                        'customCode' => '{include file="custom/modules/J_Payment/tpl/is_corporate.tpl"}'
                    ),
                ),
            ),
            // PAYMENT OTHER JUNIOR
            'LBL_OTHER_PAYMENT' =>
            array (
                1 =>
                array (
                    0 =>
                    array (
                        'name' => 'contacts_j_payment_1_name',
                        'customLabel' => '{$MOD.LBL_STUDENT}: <span class="required">*</span>',
                        'customCode' => '{include file="custom/modules/J_Payment/tpl/fieldStudent.tpl"}'
                    ),
                    1 =>
                    array (
                        'name' => 'payment_type',
                        'customCode' => '
                        {if !empty($fields.id.value)}
                        {$fields.payment_type.value}<input type="hidden" name="payment_type" id="payment_type" value="{$fields.payment_type.value}"/>
                        {else}
                        {html_options name="payment_type" id="payment_type" options=$payment_type selected=$payment_type_selected}{/if}
                        ',
                    ),
                ),
                2 =>
                array (
                    0 => array (
                        'hideLabel' => true
                    ),
                    1 =>array (
                        'name' => 'kind_of_course',
                        'customCode'=> '{if $team_type == "Junior"}
                        {html_options name="kind_of_course" id="kind_of_course" options=$fields.kind_of_course.options selected=$fields.kind_of_course.value}
                        {else}
                        {html_options name="kind_of_course_360" id="kind_of_course_360" options=$fields.kind_of_course_360.options selected=$fields.kind_of_course_360.value}{/if}'
                    ),
                ),
                3 =>
                array (
                    0 =>
                    array (
                        'name' => 'amount_bef_discount',
                        'label' => 'LBL_AMOUNT_BEF_DISCOUNT',
                        'customCode' => '<table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width = "40%">
                        <input type="hidden" name="tuition_fee" id="tuition_fee" value="{sugar_number_format var=$fields.tuition_fee.value}">
                        <input class="currency" type="text" name="amount_bef_discount" id="amount_bef_discount" size="20" maxlength="26" value="{sugar_number_format var=$fields.amount_bef_discount.value}" title="{$MOD.LBL_AMOUNT_BEF_DISCOUNT}" tabindex="0"  style="font-weight: bold;color: rgb(165, 42, 42);"></td>
                        <td width="25%" scope="col" class="tuition_hours">
                        {if $team_type == "Junior"}
                        {$MOD.LBL_TUITION_HOURS}
                        {else}
                        {$MOD.LBL_TUITION_DAYS}
                        {/if}:</td>
                        <td width="35%">
                        <input autocomplete="off" type="text" class="tuition_hours" name="tuition_hours" id="tuition_hours" value="{sugar_number_format var=$fields.tuition_hours.value precision=2}" tabindex="0" size="4" maxlength="10"  style="color: rgb(165, 42, 42);" >
                        <input type="hidden" name="total_hours" id="total_hours" value="{$fields.total_hours.value}">
                        </td>
                        </tr></tbody>
                        </table>',
                    ),
                    1 =>
                    array (
                        'name' => 'j_coursefee_j_payment_1j_coursefee_ida',
                        'customCode' => '{$coursefee}',
                        'customLabel' => '<span class="coursefee">{$MOD.LBL_COURSE_FEE_ID}: <span class="required">*</span></span>',
                    ),

                ),
                4 =>
                array (
                    0 =>
                    array (
                        'customCode' => '
                        <div id="discount_detail"></div>
                        <input class="button primary" type="button" name="btn_get_discount" value="Get Discount" id="btn_get_discount">',
                    ),
                    1 =>
                    array (
                        'customCode' => '
                        <div id="sponsor_detail"></div>
                        <input class="button primary" type="button" name="btn_add_sponsor" value="Add Sponsor" id="btn_add_sponsor">',
                    ),
                ),
                5 =>
                array (
                    0 =>
                    array (
                        'name' => 'discount_amount',
                        'label' => 'LBL_DISCOUNT_AMOUNT',
                        'customCode' => '
                        <table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width = "40%"><input class="currency input_readonly" type="text" name="discount_amount" id="discount_amount" size="20" maxlength="26" value="{sugar_number_format var=$fields.discount_amount.value}" title="{$MOD.LBL_DISCOUNT_AMOUNT}" tabindex="0"  style="font-weight: bold;" readonly></td>
                        <td width="25%" scope="col"><label>{$MOD.LBL_DISCOUNT_PERCENT}: </label></td>
                        <td width="35%"><input class="input_readonly" autocomplete="off" type="text" name="discount_percent" id="discount_percent" value="{sugar_number_format var=$fields.discount_percent.value precision=2}" tabindex="0" size="4" maxlength="10" readonly></td>
                        </tr></tbody>
                        </table>',
                    ),
                    1 =>array (
                        'name' => 'final_sponsor',
                        'label' => 'LBL_FINAL_SPONSOR',
                        'customCode' => '
                        <table width="100%" style="padding:0px!important;">
                        <tbody><tr colspan="3">
                        <td style="padding: 0px !important;" width = "40%">
                        <input readonly size="20" maxlength="26" class="currency input_readonly" name="final_sponsor" type="text" id="final_sponsor" value="{sugar_number_format var=$fields.final_sponsor.value}" tabindex="0"  style="font-weight: bold;"></td>
                        <td width="25%" scope="col"><label>{$MOD.LBL_FINAL_SPONSOR_PERCENT}: </label></td>
                        <td width="35%"><input class="input_readonly" autocomplete="off" type="text" name="final_sponsor_percent" id="final_sponsor_percent" value="{sugar_number_format var=$fields.final_sponsor_percent.value precision=2}" tabindex="0" size="4" maxlength="10" readonly></td>
                        </tr></tbody>
                        </table>
                        ',
                    ),
                ),
                6 =>
                array (
                    0 =>
                    array (
                        'name' => 'total_after_discount',
                        'customCode' => '<input class="currency input_readonly" type="text" name="total_after_discount" id="total_after_discount" size="20" maxlength="26" value="{sugar_number_format var=$fields.total_after_discount.value}" title="{$MOD.LBL_TOTAL_AFTER_DISCOUNT}" tabindex="0"  style="font-weight: bold;" readonly>',
                    ),
                    1 =>
                    array (
                        'name' => 'loyalty',
                        'label' => 'LBL_LOYALTY',
                        'customCode' => '<input type="text" name="loyalty" id="loyalty" size="20" maxlength="100" value="{$fields.loyalty.value}" title="{$MOD.LBL_LOYALTY}">',
                    ),

                ),
//                7 =>
//                array (
//                    0 =>
//                    array (
//                        'name' => 'deposit_amount',
//                        'customCode' => '
//                        <table width="100%" style="padding:0px!important;">
//                        <tbody><tr colspan="3">
//                        <td style="padding: 0px !important;" width = "40%"><input class="currency input_readonly" type="text" name="deposit_amount" id="deposit_amount" size="20" maxlength="26" value="{sugar_number_format var=$fields.deposit_amount.value}" title="{$MOD.LBL_DISCOUNT_AMOUNT}" tabindex="0"  style="font-weight: bold;" readonly></td>
//                        <td width="25%" scope="col"><label style="color: green;">{$MOD.LBL_REMAINING_FREEBALANCE}: </label></td>
//                        <td width="35%"><input class="currency input_readonly" type="text" name="remaining_freebalace" id="remaining_freebalace" size="15" maxlength="26" value="{sugar_number_format var=$fields.remaining_freebalace.value}" title="{$MOD.LBL_REMAINING_FREEBALANCE}" tabindex="0"  style="font-weight: bold;" readonly></td>
//                        </tr></tbody>
//                        </table>',
//                        'customLabel' => '<label style="color: green;">{$MOD.LBL_DEPOSIT_AMOUNT}: </label>'
//                    ),
//                    1 =>
//                    array (
//                        'hideLabel' => true,
//                    ),
//                ),
                7 =>
                array (
                    0 =>
                    array (
                        'name' => 'payment_amount',
                        'customLabel' => '<b>{$MOD.LBL_GRAND_TOTAL}:</b>',
                        'customCode' => '<input class="currency input_readonly" type="text" name="payment_amount" id="payment_amount" size="20" maxlength="26" value="{sugar_number_format var=$fields.payment_amount.value}" title="{$MOD.LBL_GRAND_TOTAL}" tabindex="0"  style="font-weight: bold;color: rgb(165, 42, 42);" readonly>',
                    ),
                    1 => 'payment_date'
                ),
                8 =>
                array (
                    0 =>
                    array (
                        'name' => 'split_payment',
                        'customCode' => '
                        {html_options name="number_of_payment" id="number_of_payment" options=$fields.number_of_payment.options selected=$fields.number_of_payment.value}',
                    ),
                    1 =>
                    array (
                        'name' => 'is_corporate',
                    ),
                ),
                9 =>
                array (
                    0 =>
                    array (
                        'hideLabel' => true,
                        'customCode' => '{include file="custom/modules/J_Payment/tpl/payment_detail.tpl"}'
                    ),
                    1 =>
                    array (
                        'hideLabel' => true,
                        'customCode' => '{include file="custom/modules/J_Payment/tpl/is_corporate.tpl"}'
                    ),
                ),
            ),
            // Payment Moving
            'LBL_PAYMENT_MOVING' =>
            array (
                1 =>
                array (
                    0 => array (
                        'name' => 'contacts_j_payment_1_name',
                        'customLabel' => '{$MOD.LBL_STUDENT}: <span class="required">*</span>',
                    ),
                    1 => array (
                        'name' => 'move_to_center_name',
                    ),
                ),
                2 => array (
                    0 => array (
                        'name' => 'total_hours',
                        'customLabel' => '{if $team_type == "Junior"}
                        {$MOD.LBL_MOVING_HOURS}
                        {else}
                        {$MOD.LBL_MOVING_DAYS}
                        {/if} : <span class="required">*</span>',
                        'customCode' => '<input class="input_readonly" type="text" name="total_hours" id="total_hours" size="20" maxlength="26" value="{sugar_number_format var=$fields.total_hours.value precision=2}" title="{$MOD.LBL_MOVING_HOURS}" tabindex="0"  style="font-weight: bold; text-align:right; color: rgb(165, 42, 42);" readonly>
                        {$payment_type}
                        <input type="hidden" id="json_student_info" name="json_student_info">
                        <input type="hidden" id="json_payment_list" name="json_payment_list">
                        ',
                    ),
                    1 => array (
                        'name' => 'payment_amount',
                        'customLabel' => '{$MOD.LBL_MOVING_AMOUNT}: <span class="required">*</span>',
                        'customCode' => '<input class="currency input_readonly" type="text" name="payment_amount" id="payment_amount" size="20" maxlength="26" value="{sugar_number_format var=$fields.payment_amount.value}" title="{$MOD.LBL_MOVING_AMOUNT}" tabindex="0"  style="font-weight: bold;color: rgb(165, 42, 42);" readonly>',
                    ),
                ),
                3 =>
                array (
                    0 =>  array(
                        'name' => 'moving_tran_out_date',
                        'label' => 'LBL_MOVING_OUT_DATE',
                        'customCode' => '<span class="dateTime"><input class="date_input input_readonly" autocomplete="off" type="text" name="moving_tran_out_date" id="moving_tran_out_date" value="{$fields.moving_tran_out_date.value}" tabindex="0" size="11" maxlength="10" readonly></span>',
                    ),
                    1 =>  array(
                        'name' => 'moving_tran_in_date',
                        'label' => 'LBL_MOVING_IN_DATE',
                        'customCode' => '<span class="dateTime"><input class="date_input input_readonly" autocomplete="off" type="text" name="moving_tran_in_date" id="moving_tran_in_date" value="{$fields.moving_tran_in_date.value}" tabindex="0" size="11" maxlength="10" readonly></span>',
                    ),
                ),
                4 =>
                array (
                    0 =>  array (
                        'name' => 'description',
                        'label' => 'LBL_DESCRIPTION',
                        'displayParams' =>
                        array (
                            'required' => true,
                        ),
                    ),
                ),
                5 =>
                array (
                    0 =>  array (
                        'name' => 'assigned_user_name',
                        'customLabel'  => '
                        {if $team_type == "Junior"}
                        {$MOD.LBL_ASSIGNED_USER}
                        {else}
                        {$MOD.LBL_FIRST_SM}
                        {/if}: <span class="required">*</span>',
                    ),
                ),
            ),
            //Panel Transfer
            'LBL_PAYMENT_TRANSFER' =>
            array (
                1 =>
                array (
                    0 => array (
                        'name' => 'contacts_j_payment_1_name',
                        'customLabel' => '{$MOD.LBL_STUDENT}: <span class="required">*</span>',
                    ),
                    1 => array (
                        'name' => 'transfer_to_student_name',
                        'displayParams' =>
                            array (
                                'field_to_name_array' =>
                                array (
                                    'id' => 'transfer_to_student_id',
                                    'name' => 'transfer_to_student_name',
                                    'account_id' => 'student_corporate_id',
                                    'account_name' => 'student_corporate_name',
                                ),
                                'required' => true,
                                'class' => 'sqsNoAutofill',
                            ),
                    ),
                ),
                2 => array (
                    0 => array (
                        'name' => 'total_hours',
                        'customLabel' => '
                        {if $team_type == "Junior"}
                        {$MOD.LBL_TRANSFER_HOURS}
                        {else}
                        {$MOD.LBL_TRANSFER_DAYS}
                        {/if}

                        : <span class="required">*</span>',
                        'customCode' => '<input class="input_readonly" type="text" name="total_hours" id="total_hours" size="20" maxlength="26" value="{sugar_number_format var=$fields.total_hours.value precision=2}" title="{$MOD.LBL_TRANSFER_HOURS}" tabindex="0"  style="font-weight: bold; text-align:right; color: rgb(165, 42, 42);" readonly>
                        {$payment_type}
                        <input type="hidden" id="json_student_info" name="json_student_info">
                        <input type="hidden" id="json_payment_list" name="json_payment_list">',
                    ),
                    1 => array (
                        'name' => 'payment_amount',
                        'customLabel' => '{$MOD.LBL_TRANSFER_AMOUNT}: <span class="required">*</span>',
                        'customCode' => '<input class="currency input_readonly" type="text" name="payment_amount" id="payment_amount" size="20" maxlength="26" value="{sugar_number_format var=$fields.payment_amount.value}" title="{$MOD.LBL_TRANSFER_AMOUNT}" tabindex="0"  style="font-weight: bold;color: rgb(165, 42, 42);" readonly>',
                    ),
                ),
                3 =>
                array (
                    0 =>  array(
                        'name' => 'moving_tran_out_date',
                        'label' => 'LBL_TRANSFER_OUT_DATE',
                        'customCode' => '<span class="dateTime"><input class="date_input input_readonly" autocomplete="off" type="text" name="moving_tran_out_date" id="moving_tran_out_date" value="{$fields.moving_tran_out_date.value}" tabindex="0" size="11" maxlength="10" readonly></span>',

                    ),
                    1 =>  array(
                        'name' => 'moving_tran_in_date',
                        'label' => 'LBL_TRANSFER_IN_DATE',
                        'customCode' => '<span class="dateTime"><input class="date_input input_readonly" autocomplete="off" type="text" name="moving_tran_in_date" id="moving_tran_in_date" value="{$fields.moving_tran_in_date.value}" tabindex="0" size="11" maxlength="10" readonly></span>',

                    ),
                ),
                4 =>
                array (
                    0 =>  array (
                        'name' => 'description',
                        'displayParams' =>
                        array (
                            'required' => true,
                        ),

                    ),
                ),
                5 =>
                array (
                    0 =>  array (
                        'name' => 'assigned_user_name',
                        'customLabel'  => '
                        {if $team_type == "Junior"}
                        {$MOD.LBL_ASSIGNED_USER}
                        {else}
                        {$MOD.LBL_FIRST_SM}
                        {/if}: <span class="required">*</span>',
                    ),
                ),
            ),
            //Panel Transfer
            'LBL_PAYMENT_TRANSFER_FROM_AIMS' =>
            array (
                1 =>
                array (
                    0 => array (
                        'customLabel' => '{$MOD.LBL_TRANSFER_FROM} AIMS Center:',
                        'customCode' => '{html_options name="from_AIMS_center_id" id="from_AIMS_center_id" options=$from_AIMS_center_id}',
                        'displayParams' =>
                        array (
                            'required' => true,
                        ),
                    ),
                    1 => array (
                        'name' => 'contacts_j_payment_1_name',
                        'label' => 'LBL_TRANSFER_TO_STUDENT_NAME',
                        'displayParams' =>
                        array (
                            'required' => true,
                        ),
                    ),
                ),
                2 => array (
                    // 0 =>  '',
                    0 =>  array(
                        'name' => 'payment_date',
                        'label' => 'LBL_TRANSFER_IN_DATE',
                    ),
                    1 => array (
                        'name' => 'use_type',
                        'customLabel' => '{$MOD.LBL_TRANSFER_TYPE}:',
                        //                        'customCode' => '{html_options name="use_type" id="use_type" style="width: 100px;margin-left:10px;" options=$fields.use_type.options selected=$fields.use_type.value}
                        //                        <label class="total_hours" width="12.5%" style="background-color:#eee; color: #444; padding:.6em">{$MOD.LBL_TRANSFER_HOURS}: <span class="required">*</span></label>
                        //                        <input class="currency total_hours" type="text" name="total_hours" id="total_hours" size="5" maxlength="26" value="{sugar_number_format var=$fields.total_hours.value precision=2}" title="{$MOD.LBL_TRANSFER_HOURS}" tabindex="0">',
                    ),
                ),
                3 => array (
                    0 =>  '',
                    1 => array (
                        'name' => 'payment_amount',
                        'customLabel' => '{$MOD.LBL_TRANSFER_AMOUNT}: <span class="required">*</span>',
                        'customCode' => '<input class="currency" type="text" name="payment_amount" id="payment_amount" size="20" maxlength="26" value="{sugar_number_format var=$fields.payment_amount.value}" title="{$MOD.LBL_TRANSFER_AMOUNT}" tabindex="0"  style="font-weight: bold; color: rgb(165, 42, 42);">{$payment_type}',
                    ),
                ),
                4 => array (
                    0 =>  '',
                    1 => array (
                        'name' => 'total_hours',
                        'customLabel' => '{$MOD.LBL_TRANSFER_HOURS}: <span class="required">*</span>',
                        'customCode' => '<input type="text" name="total_hours" id="total_hours" size="5" maxlength="5" value="{sugar_number_format var=$fields.total_hours.value precision=2}" title="{$MOD.LBL_TRANSFER_HOURS}" tabindex="0"  style="text-align: right; color: rgb(165, 42, 42);">',
                    ),
                ),
                5 =>
                array (
                    0 =>  array (
                        'name' => 'description',
                        'displayParams' =>
                        array (
                            'rows' => 2,
                            'cols' => 60,
                            'required' => true,
                        ),
                    ),
                ),
                6 =>
                array (
                    0 =>  array (
                        'name' => 'assigned_user_name',
                        'customLabel'  => '
                        {if $team_type == "Junior"}
                        {$MOD.LBL_ASSIGNED_USER}
                        {else}
                        {$MOD.LBL_FIRST_SM}
                        {/if}: <span class="required">*</span>',
                    ),
                ),
            ),
            //Panel Refund
            'LBL_PAYMENT_REFUND' =>
            array (
                1 =>
                array (
                    0 => array (
                        'name' => 'contacts_j_payment_1_name',
                        'customLabel' => '{$MOD.LBL_STUDENT}: <span class="required">*</span>',
                    ),
                ),
                2 => array (
                    0 => array (
                        'name' => 'payment_amount',
                        'customLabel' => '{$MOD.LBL_REFUND_AMOUNT}: ',
                        'customCode' => '<input class="currency" type="text" name="payment_amount" id="payment_amount" size="20" maxlength="26" value="{sugar_number_format var=$fields.payment_amount.value}" title="{$MOD.LBL_REFUND_AMOUNT}" tabindex="0"  style="font-weight: bold;color: rgb(165, 42, 42);" >',
                    ),

                    1 => array (
                        'name' => 'refund_revenue',
                        'customLabel' => '{$MOD.LBL_DROP_REVENUE}: ',
                        'customCode' => '<input type="text" name="refund_revenue" class="currency" id="refund_revenue" size="20" maxlength="26" value="{sugar_number_format var=$fields.refund_revenue.value}" title="{$MOD.LBL_REFUND_REVENUE}" tabindex="0"  style="font-weight: bold; text-align:right; color: rgb(165, 42, 42);" >
                        <input type="hidden" id="payment_type" name="payment_type" value={$fields.payment_type.value}>
                        <input type="hidden" id="json_student_info" name="json_student_info">
                        <input type="hidden" id="json_payment_list" name="json_payment_list">',
                    ),

                ),
                3 => array (
                    0 => array(
                        'hideLabel' => true,
                        'customCode' => '<img src="themes/RacerX/images/helpInline.png" class="paidAmountHelpTip">Refund Amount may be less than or equal to the Total remain amount of the payment is selected'
                    ),
                    1 => array(
                        'hideLabel' => true,
                        'customCode' => '<img src="themes/RacerX/images/helpInline.png" class="paidAmountHelpTip">If the Admin Charge equal zero system will not generate Revenue drop'
                    ),
                ),
                4 =>
                array (
                    0 =>  array(
                        'name' => 'moving_tran_out_date',
                        'label' => 'LBL_REFUND_DATE',
                        'customCode' => '<span class="dateTime"><input class="date_input input_readonly" autocomplete="off" type="text" name="moving_tran_out_date" id="moving_tran_out_date" value="{$fields.moving_tran_out_date.value}" tabindex="0" size="11" maxlength="10" readonly></span>',
                    ),
                    1 =>
                    array (
                        'name' => 'uploadfile',
                        'displayParams' =>
                        array (
                            'onchangeSetFileNameTo' => 'document_name',
                        ),
                    ),
                ),
                5 =>
                array (
                    0 =>  array (
                        'name' => 'description',
                        'displayParams' =>
                        array (
                            'required' => true,
                        ),
                    ),
                ),
                6 =>
                array (
                    0 =>  array (
                        'name' => 'assigned_user_name',
                        'customLabel'  => '
                        {if $team_type == "Junior"}
                        {$MOD.LBL_ASSIGNED_USER}
                        {else}
                        {$MOD.LBL_FIRST_SM}
                        {/if}: <span class="required">*</span>',
                    ),
                ),
            ),
            'LBL_BOOK_LIST' =>
            array (
                0 =>
                array (
                    0 =>
                    array (
                        'name' => 'charge_book',
                        'customCode' => '{if strval($fields.charge_book.value) == "1" || strval($fields.charge_book.value) == "yes" || strval($fields.charge_book.value) == "on"}
                        {assign var="checked" value="CHECKED"}
                        {else}
                        {assign var="checked" value=""}
                        {/if}
                        <input type="hidden" name="charge_book" value="0">
                        <input {$checked} type="checkbox" id="charge_book" name="charge_book" value="1"> Free Of Charge
                        {include file="custom/modules/J_Payment/tpl/BookTemplate.tpl"}',
                    ),
                ),
            ),
            'LBL_OTHER' =>
            array (
                0 =>
                array (
                    0 =>
                    array (
                        'name' => 'description',
                        'label' => 'LBL_DESCRIPTION_EDIT',
                        'displayParams' =>
                        array (
                            'rows' => 4,
                            'cols' => 60,
                        ),
                    ),
                    1 =>
                    array (
                        'name' => 'note',
                        'label' => 'LBL_NOTE',
                        'customCode' => '<textarea id="note" name="note" rows="4" cols="50" title="Note" tabindex="0">{$fields.note.value}</textarea>'
                    ),
                ),
                1 =>
                array (
                    0 =>
                    array (
                        'name' => 'assigned_user_name',
                        'customLabel'  => '
                        {if $team_type == "Junior"}
                        {$MOD.LBL_ASSIGNED_USER}
                        {else}
                        {$MOD.LBL_FIRST_SM}
                        {/if}: <span class="required">*</span>',
                    ),
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
