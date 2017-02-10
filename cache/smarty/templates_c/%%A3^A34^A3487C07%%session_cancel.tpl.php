<?php /* Smarty version 2.6.11, created on 2017-02-07 13:25:48
         compiled from custom/modules/J_Class/tpls/session_cancel.tpl */ ?>
<div style="display: inline-flex;">
    <div id="cancel_dialog" style="display:none;">
        <div>
            <form name = "CancelView" id = "CancelView" method="post" action="cancelSession">
            <input type="hidden" value="" id= "before_ss">
            <input type="hidden" value="" id= "after_ss">
            <input type="hidden" value="" id= "cancel_session_id">

                <table width="100%">
                    <tr>
                        <td style="width:15%; text-align: right; font-weight: bold; "><?php echo $this->_tpl_vars['MOD']['LBL_CLASS_CODE']; ?>
: </td>
                        <td  id="cs_class_code" style="width:35%; color: blue;font-weight: bold"><?php echo $this->_tpl_vars['fields']['class_code']['value']; ?>
</td>
                        <td style="width:15%; text-align: right; font-weight: bold;"><?php echo $this->_tpl_vars['MOD']['LBL_START_DATE']; ?>
: </td>
                        <td  id="cs_start_class"><?php echo $this->_tpl_vars['fields']['start_date']['value']; ?>
</td>
                    </tr>
                    <tr>
                        <td width="15%" style="width:15%; text-align: right; font-weight: bold; height: 35px;"><?php echo $this->_tpl_vars['MOD']['LBL_NAME']; ?>
: </td>
                        <td width="35%" id="cs_class_name" style="color: blue;font-weight: bold"><?php echo $this->_tpl_vars['fields']['name']['value']; ?>
</td>

                        <td width="15%" style="width:15%; text-align: right; font-weight: bold; "><?php echo $this->_tpl_vars['MOD']['LBL_END_DATE']; ?>
: </td>
                        <td width="35%" id="cs_end_class"><?php echo $this->_tpl_vars['fields']['end_date']['value']; ?>
</td>
                    </tr>
                    <tr>
                        <td style="width:15%; text-align: right; font-weight: bold; height: 40px;"><?php echo $this->_tpl_vars['MOD']['LBL_MAIN_SCHEDULE']; ?>
: </td>
                        <td width="85%" colspan="3" id="cs_schedule"><ul><?php echo $this->_tpl_vars['SCHEDULE']; ?>
</ul></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height: 0; padding:0"><hr style="padding:0; margin:0;"></td>
                    </tr>
                    <tr>
                        <td style="width:20%; text-align: right; font-weight: bold; height: 40px;">Cancel Session Date:</td>
                        <td style="width:30%; padding-left: 10px;"><label id="cs_cancel_date"></label></td>
                        <td style="width:15%; text-align: right; font-weight: bold;">Cancel By:</td>
                        <td style="width:35%; padding-left: 10px;">
                            <select id='cs_cancel_by'>
                                <?php echo $this->_tpl_vars['session_cancel_reason_options']; ?>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:20%; text-align: right; font-weight: bold;vertical-align: top;height: 40px;">Reason: <span class="required">*</span></td>
                        <td style="padding-left: 10px;" colspan="3"><textarea rows="3" cols="60" style="resize: none;" id="cs_cancel_reason" name="cs_cancel_reason"></textarea></td>
                    </tr>
                    </tr>
                    <tr>
                        <td style="width:20%; text-align: right; font-weight: bold;vertical-align: top;height: 30px;"></td>
                        <td style="padding-left: 10px;" colspan="3">
                            <label style="vertical-align: inherit;"><input type="radio" name="cs_makeup_type" id="cs_this_schedule" value="this_schedule" checked >  Make up in this Schedule</label>
                            <br>
                            <label style="vertical-align: inherit;"><input type="radio" name="cs_makeup_type" id="cs_other_schedule" value="other_schedule">  Make up in other Schedule</label>
                            <br>
                        </td>
                    </tr>
                </table>
                <div>
                    <fieldset>
                        <table style="width:100%">
                            <tr>
                                <td style="width:20%; text-align: right; font-weight: bold;height: 30px;">Make up Date:<span class="required">*</span></td>
                                <td style="width:30%;padding-left: 10px;">
                                    <span class="dateTime">
                                        <input class="date_input datePicker" value="" oldval = "" size="11" readonly type="text" name="cs_date_makeup" id="cs_date_makeup" title="Make up date" maxlength="10" style="vertical-align: top;">
                                    </span>

                                </td>
                                <td style="width:50%; height: 40px;" colspan="2">
                                    <span class="timeOnly">
                                        <input class="time start" value="" oldval="" type="text" style="width: 70px; text-align: center;" readonly name = 'cs_start'>
                                        - to -
                                        <input class="time end input_readonly" value="" oldval="" type="text" style="width: 70px; text-align: center;" readonly name = 'cs_end'>
                                    </span>
                                    <input type="hidden" value="" oldval="" name='cs_duration_hour' id='cs_duration_hour' class="duration_hour input_readonly" readonly style="width: 70px; text-align: center;">
                                    <input type="button" value="Check" class="btn_check_cancel_session" style="margin-left: 50px;"></input>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td style="width:20%; text-align: right; font-weight: bold;height: 40px;">Teacher Cover: </td>
                                <td style="width:30%;padding-left: 10px;">
                                    <select name = 'cs_teacher' id='cs_teacher'>
                                        <option value = ''> --None--</option>
                                    </select>
                                </td>
                                <td style="width:15%; text-align: right; font-weight: bold;height: 40px;">Room:</td>
                                <td style="width:35%;padding-left: 10px;">
                                    <select name = 'cs_room' id='cs_room'>
                                        <option value = ''> --None--</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:20%; text-align: right; font-weight: bold;height: 40px;">Teacher Type:</td>
                                <td style="width:30%;padding-left: 10px;">
                                    <select name='cs_teaching_type' id='cs_teaching_type'>
                                        <?php echo $this->_tpl_vars['teaching_type_options']; ?>

                                    </select>
                                </td>
                                <td style="width:15%; text-align: right; font-weight: bold;height: 40px;">Change Teacher Reason: <span style="display: none;" class="required cancel_change_required">*</span></td>
                                <td style="width:35%;padding-left: 10px;">
                                    <textarea rows="3" cols="25" style="resize: none;" id = "cs_change_teacher_reason" name="cs_change_teacher_reason"></textarea>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
            </form>
        </div>
    </div>
</div>