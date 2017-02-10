<?php /* Smarty version 2.6.11, created on 2017-02-07 13:25:48
         compiled from custom/modules/J_Class/tpls/teacher_schedule_screen.tpl */ ?>
<link rel="stylesheet" type="text/css" href="custom/modules/J_Class/tpls/css/teacher_schedule_screen.css">

<div id="dialog_teacher" title="Schedule Teacher" style="display:none;">
    <table style="border: 1px solid #F0F0F0;width:100%;">
        <tr>
            <td width="20%" style="text-align: right; font-weight: bold;padding-right: 10px;"><?php echo $this->_tpl_vars['MOD']['LBL_CLASS_CODE']; ?>
: </td>
            <td width="30%" id="class_code_schedule" name = "class_code" style="color: blue;font-weight: bold;width: 170px;height: 50px;"><?php echo $this->_tpl_vars['CLASS_CODE']; ?>
</td>
            <td width="20%" style="text-align: right; font-weight: bold;padding-right: 10px;"><?php echo $this->_tpl_vars['MOD']['LBL_START_DATE']; ?>
: </td>
            <td width="30%" style="color: blue; font-weight: bold"><?php echo $this->_tpl_vars['fields']['start_date']['value']; ?>
</td>
        </tr>
        <tr>
            <td style="text-align: right; font-weight: bold;padding-right: 10px;"><?php echo $this->_tpl_vars['MOD']['LBL_NAME']; ?>
: </td>
            <td id="class_name_schedule" style="color: blue;font-weight: bold"><?php echo $this->_tpl_vars['NAME']; ?>
</td>
            <td style="text-align: right; font-weight: bold;padding-right: 10px;"><?php echo $this->_tpl_vars['MOD']['LBL_END_DATE']; ?>
: </td>
            <td style="color: blue;font-weight: bold"><?php echo $this->_tpl_vars['fields']['end_date']['value']; ?>
</td>
        </tr>
        <tr>
            <td style="text-align: right; font-weight: bold;padding-right: 10px;"><?php echo $this->_tpl_vars['MOD']['LBL_UPGRADE']; ?>
: </td>
            <td colspan =2 id="upgrade_schedule" name = "upgrade_schedule" style="width: 170px;height: 50px;"><?php echo $this->_tpl_vars['CLASS_CODE']; ?>
</td>
        </tr>
        <tr>
            <td style="text-align: right; font-weight: bold;padding-right: 10px;"><?php echo $this->_tpl_vars['MOD']['LBL_MAIN_SCHEDULE']; ?>
: </td>
            <td colspan =2 id="dlg_class_schedule" name = "dlg_class_schedule" style="width: 170px;height: 50px;"></td>
        </tr>
        <tr>
            <td style="text-align: right; font-weight: bold;">From Date:<span class="required">*</span></td>
            <td style="padding-left: 10px;">
                <span class="dateTime">
                    <input class="date_input" size="11" autocomplete="off" type="text"  maxlength="10" style="font-size: 1em" name="start_schedule" id="start_schedule"/>
                &nbsp<img src="themes/RacerX/images/jscalendar.png" alt="Enter Date" id="start_schedule_trigger" style="vertical-align: middle"> </span>
                <?php echo '
                <script type="text/javascript">
                    Calendar.setup ({
                    inputField : "start_schedule",
                    ifFormat : cal_date_format,
                    daFormat : cal_date_format,
                    button : "start_schedule_trigger",
                    singleClick : true,
                    dateStr : "",
                    startWeekday: 0,
                    step : 1,
                    weekNumbers:false
                    });
                </script>
                '; ?>

            </td>
            <td style="text-align: right; font-weight: bold;">To Date:<span class="required">*</span></td>
            <td style="padding-left: 10px;height: 50px;">
                <span class="dateTime">
                    <input class="date_input" size="11" autocomplete="off" type="text"  maxlength="10" style="font-size: 1em" name="end_schedule" id="end_schedule"/>
                &nbsp<img src="themes/RacerX/images/jscalendar.png" alt="Enter Date" id="end_schedule_trigger" style="vertical-align: middle"> </span>
                <?php echo '
                <script type="text/javascript">
                    Calendar.setup ({
                    inputField : "end_schedule",
                    ifFormat : cal_date_format,
                    daFormat : cal_date_format,
                    button : "end_schedule_trigger",
                    singleClick : true,
                    dateStr : "",
                    startWeekday: 0,
                    step : 1,
                    weekNumbers:false
                    });
                </script>
                '; ?>

                </span>
            </td>
        </tr>
        <tr>
            <td style="text-align: right; font-weight: bold;padding-right: 10px;height:50px;"><?php echo $this->_tpl_vars['MOD']['LBL_DAY']; ?>
: <span class="required">*</span></td>
            <td colspan="3">
                <input type=checkbox class="day_of_week" id='Monday' onclick='clearTeacherList();'/><label style="margin-right:10px;" id="lbl_mon"><?php echo $this->_tpl_vars['MOD']['LBL_MON']; ?>
</label>
                <input type=checkbox class="day_of_week" id='Tuesday' onclick='clearTeacherList();'/><label style="margin-right:10px;" id="lbl_tue"><?php echo $this->_tpl_vars['MOD']['LBL_TUE']; ?>
</label>
                <input type=checkbox class="day_of_week" id='Wednesday' onclick='clearTeacherList();'/><label style="margin-right:10px;" id="lbl_wed"><?php echo $this->_tpl_vars['MOD']['LBL_WED']; ?>
</label>
                <input type=checkbox class="day_of_week" id='Thursday' onclick='clearTeacherList();'/><label style="margin-right:10px;" id="lbl_thu"><?php echo $this->_tpl_vars['MOD']['LBL_THU']; ?>
</label>
                <input type=checkbox class="day_of_week" id='Friday' onclick='clearTeacherList();'/><label style="margin-right:10px;" id="lbl_fri"><?php echo $this->_tpl_vars['MOD']['LBL_FRI']; ?>
</label>
                <input type=checkbox class="day_of_week" id='Saturday' onclick='clearTeacherList();'/><label style="margin-right:10px;" id="lbl_sat"><?php echo $this->_tpl_vars['MOD']['LBL_SAT']; ?>
</label>
                <input type=checkbox class="day_of_week" id='Sunday' onclick='clearTeacherList();'/><label style="margin-right:10px;" id="lbl_sun"><?php echo $this->_tpl_vars['MOD']['LBL_SUN']; ?>
</label>
            </td>
        </tr>
        <tr>
            <td style="text-align: right; font-weight: bold;padding-right: 10px;"><?php echo $this->_tpl_vars['MOD']['LBL_TEACHING_TYPE']; ?>
: </td>
            <td colspan =2 style="width: 170px;height: 50px;">
                <select name = 'select_teaching_type' id = 'select_teaching_type' class="select_teaching_type">
                    <?php echo $this->_tpl_vars['teaching_type_options']; ?>

                </select>
            </td>
        </tr>
        <tr>
            <td style="text-align: right; font-weight: bold;padding-right: 10px;"><?php echo $this->_tpl_vars['MOD']['LBL_CHANGE_TEACHER_REASON']; ?>
: <span style="display: none;" class="required change_reason_required">*</span> </td>
            <td colspan =3 style="width: 170px;height: 50px;">
                <textarea id="change_teacher_reason" name="change_teacher_reason" rows="2" cols="60"></textarea>
            </td>
        </tr>
        <tr>

            <td colspan="4" style="text-align: center;">
                <input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_CHECK']; ?>
" id="btn_check_schedule"></input>
                <input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_RESET']; ?>
" id="btn_reset_input"></input>
            </td>
        </tr>
    </table>
    <div>
        <table id="list_teacher" class="list view" style="width: 100%;margin-top: 10px;">
            <thead>
                <tr>
                    <th></th>
                    <th><?php echo $this->_tpl_vars['MOD']['LBL_TEACHER_NAME']; ?>
</th>
                    <th><?php echo $this->_tpl_vars['MOD']['LBL_TEACHER_CONTRACT_TYPE']; ?>
</th>
                    <th><?php echo $this->_tpl_vars['MOD']['LBL_TEACHER_REQUIRED_HOURS']; ?>
</th>
                    <th><?php echo $this->_tpl_vars['MOD']['LBL_TEACHER_TAUGHT_HOURS']; ?>
</th>
                    <th><?php echo $this->_tpl_vars['MOD']['LBL_TEACHER_EXPIRE_DAY']; ?>
</th>
                    <th><?php echo $this->_tpl_vars['MOD']['LBL_DAY_OFF']; ?>
</th>
                    <th><?php echo $this->_tpl_vars['MOD']['LBL_HOLIDAYS']; ?>
</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div style="text-align: center;">
        <input type="hidden" id="teacher_schedule_start_date"></input>
        <input type="hidden" id="teacher_schedule_end_date"></input>
        <input type="hidden" id="teacher_schedule_day_of_week"></input>
        <img id="teacher_schedule_loading_icon" src="themes/default/images/loading.gif" align="absmiddle" style="width:16;display:none;">
        <input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_SAVE']; ?>
" id="btn_teacher_schedule_save" style="display:none;"></input>
        <input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_CLOSED']; ?>
" id="btn_teacher_schedule_close" ></input>
    </div>
</div>