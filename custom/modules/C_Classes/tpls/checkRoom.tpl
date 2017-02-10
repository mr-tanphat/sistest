{sugar_getscript file="custom/include/javascripts/Timepicker/js/jquery.timepicker.min.js"}
<link rel='stylesheet' href='{sugar_getjspath file="custom/include/javascripts/Timepicker/css/jquery.timepicker.css"}'/>
<link rel='stylesheet' href='{sugar_getjspath file="custom/modules/C_Classes/tpls/css/style_nd.css"}'/>
<link rel='stylesheet' href='{sugar_getjspath file="custom/modules/C_Classes/tpls/css/table_nd.css"}'/>
{sugar_getscript file="include/javascript/jquery/jquery-ui-min.js"}
{sugar_getscript file="custom/modules/C_Classes/js/checkRoom.js"}
{literal}
<script type="text/javascript">
    Calendar.setup ({
    inputField : "start_date",
    ifFormat : cal_date_format,
    daFormat : cal_date_format,
    button : "start_date_trigger",
    singleClick : true,
    dateStr : "",
    startWeekday: 0,
    step : 1,
    weekNumbers:false
    }
    );
    Calendar.setup ({
    inputField : "end_date",
    ifFormat : cal_date_format,
    daFormat : cal_date_format,
    button : "end_date_trigger",
    singleClick : true,
    dateStr : "",
    startWeekday: 0,
    step : 1,
    weekNumbers:false
    }
    );
</script>
{/literal}
<form action="" method="POST" name="CheckRoomForm" id="CheckRoomForm">
    <div class="container">
        <div class="page-header">
            <h1>{$MOD.LBL_CR_TITLE}</h1>
        </div>
        <table class="table_config">
            <tbody>
                <tr> 
                    <td width="15%" nowrap>
                        <b>{$MOD.LBL_DAY}:</b> <span class="required">*</span> </b></span>
                    </td>
                    <td width="35%" colspan='3' nowrap>
                        <label id="ct_date"><input type="checkbox" name="week_date" id="ct_mon" value="Mon">Mon -</label>
                        <label id="ct_date"><input type="checkbox" name="week_date" id="ct_tue" value="Tue">Tue -</label>
                        <label id="ct_date"><input type="checkbox" name="week_date" id="ct_wed" value="Wed">Wed -</label>
                        <label id="ct_date"><input type="checkbox" name="week_date" id="ct_thu" value="Thu">Thu -</label>
                        <label id="ct_date"><input type="checkbox" name="week_date" id="ct_fri" value="Fri">Fri -</label>
                        <label id="ct_date"><input type="checkbox" name="week_date" id="ct_sat" value="Sat">Sat -</label>
                        <label id="ct_date"><input type="checkbox" name="week_date" id="ct_sun" value="Sun">Sun </label>
                        <input name="validate_weekday" id="validate_weekday" type="text" style="display:none;"/>
                    </td>
                </tr>                                
                <tr>
                    <td width="15%" nowrap>
                        <b>{$MOD.LBL_START_TIME}: <span class="required">*</span> </b>
                    </td>
                    <td width="35%">
                        <input name="start_time" id="start_time" type="text" style="width: 70px; text-align: center;"/>
                    </td>
                    <td width="15%">
                        <span for="category"><b>{$MOD.LBL_START_DATE}: <span class="required">*</span> </b></span>
                    </td>
                    <td width="35%">
                        <input name="start_date" id="start_date" type="text" style="width: 100px; text-align: center;">
                        <img border="0" src="custom/themes/default/images/jscalendar.png" alt="Enter Date" id="start_date_trigger" align="absmiddle">
                        <span id="date_string"></span>
                    </td>
                </tr>
                <tr> 
                    <td width="15%">                                            
                        <b>{$MOD.LBL_END_TIME}: <span class="required">*</span> </b>                                            
                    </td>
                    <td width="35%">
                        <input name="end_time" id="end_time" type="text" style="width: 70px; text-align: center;">
                    </td> 
                    <td width="15%">
                        <b>{$MOD.LBL_END_DATE}: <span class="required">*</span> </b>
                    </td>
                    <td width="35%">
                        <input name="end_date" id="end_date" type="text" style="width: 100px; text-align: center;">
                        <img border="0" src="custom/themes/default/images/jscalendar.png" alt="Enter Date" id="end_date_trigger" align="absmiddle">
                        <span id="date_string"></span>
                    </td>
                </tr>
                <tr>
                    <td width='15%' nowrap>
                        <b>{$MOD.LBL_READY_FOR}:</b>
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
                    <input class="button primary" type="button" name="ct_check" value="{$MOD.LBL_CHECK_SCHEDULE_2}" id="ct_check" style="padding: 6px 10px 6px 10px;">             
                    </td>
                    <td nowrap colspan='2' align='left'>
                        <input class="button" type="button" name="ct_clear" value="{$MOD.LBL_CLEAR}" id="ct_clear" style="padding: 6px 10px 6px 10px;">
                    </td>
                </tr>
            </tbody>
        </table>
        <div id="result_table"></div>
    </div>
</form>
