{sugar_getscript file="custom/modules/C_Classes/js/classSchedule.js"}
{sugar_getscript file="custom/include/javascripts/Timepicker/js/jquery.timepicker.min.js"}
{sugar_getscript file="custom/include/javascripts/Select2/select2.min.js"}
<link rel='stylesheet' href='{sugar_getjspath file="custom/include/javascripts/Select2/select2.css"}'/>
<link rel='stylesheet' href='{sugar_getjspath file="custom/include/javascripts/Timepicker/css/jquery.timepicker.css"}'/>
<link rel='stylesheet' href='{sugar_getjspath file="custom/modules/C_Classes/tpls/css/style_nd.css"}'/>
<link rel='stylesheet' href='{sugar_getjspath file="custom/modules/C_Classes/tpls/css/table_nd.css"}'/>

{literal}
<script type="text/javascript">
    Calendar.setup ({
        inputField : "start_date",
        daFormat : cal_date_format,
        button : "start_date_trigger",
        singleClick : true,
        dateStr : "",
        step : 1,
        weekNumbers:false
    }
    );
    Calendar.setup ({
        inputField : "end_date",
        daFormat : cal_date_format,
        button : "end_date_trigger",
        singleClick : true,
        dateStr : "",
        step : 1,
        weekNumbers:false
    }
    );
    // begin validate time - function strtotime use for validate time
    function strtotime(input) {
        if (input) {
            var array = input.split(':');
            var hours = parseFloat(array[0]);
            var minutes = parseFloat(array[1]);
            var time = new Date(0, 0, 0, hours, minutes, 0);
            return liseTime(time);
        }
            return null;
        }
        function liseTime(time) {
            time.setFullYear(2001);
            time.setMonth(0);
            time.setDate(0);
            return time;
            }
    //end validate time
</script>
{/literal}
<form action="" method="POST" name="ClassScheduleForm" id="ClassScheduleForm">
    <div class="container">
        <div class="page-header">
            <h1>{$MOD.LBL_CLASS_SCHEDULE_TITLE}</h1>
        </div>
        <table class="table_config">
            <tbody>
                <tr>
                    <td width="15%" nowrap>
                        <b>{$MOD.LBL_CLASS}: <span class="required">*</span> </b>
                    </td>
                    <td nowrap colspan='3'>
                        <input type="text" name="class_name" id="class_name" value="{$CLASS_NAME}">                                      
                        <input type="hidden" name="class_id" id="class_id" value="{$CLASS_ID}">
                        <input type="hidden" name="content_class" id="content_class" value="{$CONTENT}">
                        <input type="hidden" name="start" id="start" value="{$START}">
                        <input type="hidden" name="end" id="end" value="{$END}">
                        <input type="hidden" name="class_type" id="class_type" value="{$CLASS_TYPE}">
                        
                        <input title="{$MOD.LBL_SELECT}" type="button" class="button" value="Select" id="btn_select_class">                                           
                        <a id="eye_dialog" title="View" style="cursor:pointer;"><img border="0" src="themes/RacerX/images/view_inline.png" style="margin-left:5px;"></a>
                        <div id="dialog_help"></div>
                    </td>
                </tr>
                <tr> 
                    <td width="15%" nowrap>
                        <b>{$MOD.LBL_DAY}:</b> <span class="required">*</span> </b></span>
                    </td>
                    <td width="35%" colspan='3' nowrap>
                        <label id="ct_date"><input type="checkbox" name="week_date" id="Mon" value="Mon">{$MOD.LBL_MON} -</label>
                        <label id="ct_date"><input type="checkbox" name="week_date" id="Tue" value="Tue">{$MOD.LBL_TUE} -</label>
                        <label id="ct_date"><input type="checkbox" name="week_date" id="Wed" value="Wed">{$MOD.LBL_WED} -</label>
                        <label id="ct_date"><input type="checkbox" name="week_date" id="Thu" value="Thu">{$MOD.LBL_THU} -</label>
                        <label id="ct_date"><input type="checkbox" name="week_date" id="Fri" value="Fri">{$MOD.LBL_FRI} -</label>
                        <label id="ct_date"><input type="checkbox" name="week_date" id="Sat" value="Sat">{$MOD.LBL_SAT} -</label>
                        <label id="ct_date"><input type="checkbox" name="week_date" id="Sun" value="Sun">{$MOD.LBL_SUN} </label>
                        <input name="validate_weekday" id="validate_weekday" type="text" style="display:none;"/>
                    </td>
                </tr>
                <tr>
                    <td width="15%" nowrap>
                        <b>{$MOD.LBL_CHECK_FROM_DATE}: <span class="required">*</span> </b>
                    </td>
                    <td width='35%' nowrap>
                        <input name="start_date" id="start_date" type="text" value="{$START}">
                        <img border="0" src="custom/themes/default/images/jscalendar.png" alt="Enter Date" id="start_date_trigger" align="absmiddle">
                        <span id="date_string"></span>
                    </td>
                    <td width = "15%" nowrap>
                        <b>{$MOD.LBL_CHECK_TO_DATE}: <span class="required">*</span> </b>                   
                    </td>
                    <td width='35%' nowrap>
                        <input name="end_date" id="end_date" type="text" value="{$END}">
                        <img border="0" src="custom/themes/default/images/jscalendar.png" alt="Enter Date" id="end_date_trigger" align="absmiddle">
                        <span id="date_string"></span>
                    </td>
                </tr>
                <tr>
                    <td width='15%' nowrap>
                        <b>{$MOD.LBL_READY_FOR}: </b>
                    </td>
                    <td NOWRAP colspan='3'>
                        <label><input type="radio" name="check_ready_for" id = "check_ready_for_1" value="6">{$MOD.LBL_NEXT_1_WEEK}</input>&nbsp&nbsp</label>
                        <label><input type="radio" name="check_ready_for" id = "check_ready_for_2" value="13">{$MOD.LBL_NEXT_2_WEEKS}</input> &nbsp&nbsp</label>                        
                        <label><input type="radio" name="check_ready_for" id = "check_ready_for_3" value="20">{$MOD.LBL_NEXT_3_WEEKS}</input> &nbsp&nbsp</label>
                        <label><input type="radio" name="check_ready_for" id = "check_ready_for_4" value="27">{$MOD.LBL_NEXT_4_WEEKS}</input> &nbsp&nbsp</label>
                        <label><input type="radio" name="check_ready_for" id = "check_ready_for_5" value="34">{$MOD.LBL_NEXT_5_WEEKS}</input> &nbsp&nbsp</label>
                        <label><input type="radio" name="check_ready_for" id = "check_ready_for_6" value="optional">{$MOD.LBL_OPTIONAL}</input></label>
                    </td>
                </tr>
                <tr>
                    <td nowrap colspan='2' align='right'>
                    <input class="button primary" type="button" name="ct_check" value="{$MOD.LBL_CHECK_SCHEDULE}" id="ct_check" style="padding: 6px 10px 6px 10px;">                </td>
                    <td nowrap colspan='2' align='left'>
                        <input class="button" type="button" name="ct_clear" value="{$MOD.LBL_CLEAR}" id="ct_clear" style="padding: 6px 10px 6px 10px;" onclick="diableAndClear('top',false)">
                    </td>
                </tr>
            </tbody>
        </table>
        <div id="result_table"></div>
    </div>
</form>
</div>

