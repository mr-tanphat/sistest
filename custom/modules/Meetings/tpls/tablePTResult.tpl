{sugar_getscript file="custom/modules/Administration/smsPhone/javascript/jquery.jmpopups-0.5.1.js"}
{sugar_getscript file="custom/modules/Administration/smsPhone/javascript/smsPhone.js"}
<link rel="stylesheet" type="text/css" href="custom/modules/Administration/smsPhone/style/smsPhone.css" />
 
{literal}
<style>
    .ui-sortable tr {
    cursor:move;
    }
    .pt_template:hover td{
    background:#ecf7ff;
    }

</style>       
{/literal}
<form method="POST" name="form_result" id="form_result" enctype="multipart/form-data">
    <table class="list view" id="diagnosis_list"> 
        <thead>
            <tr class="row" style="margin-left: 5px;margin-top: 10px;">
                <td colspan="7">
                    <select style="float:left;" name="parent_type" id="parent_type" style="margin-left: 20px;">
                        <option value="Leads">Lead</option>
                        <option value="Contacts">Student</option> 
                    </select>
                    <button  style="float:left; margin-left: 20px;" type="button" id="btnSelect" class="button" onclick="clickChooseLead()" >{$MOD.LBL_SELECT}</button>
                    <button  style="float:left; margin-left: 20px;display:none"  type="button" id="btnAddRow" class="button" >{$MOD.LBL_SELECT}</button>
                    <button  style="float:left; margin-left: 20px;" type="button" id="btnFreeText" class="button" >{$MOD.LBL_FREE_TEXT}</button>
                    {$ADD_ANOTHER_BUTTON}
                    
                     <a target="_blank" style="float:left; margin-left: 20px;" href="index.php?action=ReportCriteriaResults&module=Reports&page=report&id=5d5a754e-d0df-d227-cb78-57bd61d9413b" class="button">Export PT List</a>
                    <div style="float:left; margin-left: 20px;" class="selectedTopSupanel"></div></td>
                <td colspan="2"> Time Range: <input type="text" onkeyup="checkTimeRange()" id="time_range" name="time_range" value="{$time_range}" style="width: 30px;text-align: right;">  Minutes</td>
                
                <td> <input type="hidden" id="time_start_pt" value="{$time_start_pt}"/></td>
                <td> 
                    <input type="hidden" id="first_time_mt" value="{$first_time_mt}"/>
                    <input type="hidden" id="first_duration" value="{$first_duration}"/>  
                </td>
                <td> <input type="hidden" id="first_day_mt" name="first_day_mt" value="{$first_day_mt}"/></td>
                <td> <input type="hidden" id="meeting_id" name="meeting_id"/></td>
                <td> <input type="hidden" id="duration_pt" value="{$duration}"/></td>
                <td> <input type="hidden" id="limit_row_pt" /></td>
                <td> <input type="hidden" id="get_pt_date" name="get_pt_date" value="{$get_pt_date}"/></td>

            </tr>
            <tr>
                <th style="text-align: center;" colspan="2">
                    <input  type="checkbox" class="checkall_custom_checkbox" module_name="J_PTResult" onclick="handleCheckBox($(this));"/>
                    {$MOD.LBL_ORDER}</th>
                <th style="text-align: center;">{$MOD.LBL_TIME_SLOT}</th>
                <th style="text-align: center;">{$MOD.LBL_NAME}</th>
                <th style="text-align: center;">{$MOD.LBL_MOBILE}</th>
                <th style="text-align: center;">Parent</th>
                <th style="text-align: center;">First EC</th>
                <th style="text-align: center;">{$MOD.LBL_ATTENDED}</th>
                <th style="text-align: center;">{$MOD.LBL_SPEAKING}</th>
                <th style="text-align: center;">{$MOD.LBL_WRITING}</th>
                <th style="text-align: center;">{$MOD.LBL_LISTENING}</th>
                <th style="text-align: center;">{$MOD.LBL_RESULT}</th>
                <th style="text-align: center;">{$MOD.LBL_EC_NOTE}</th>
                <th style="text-align: center;">{$MOD.LBL_TEACHER_COMMENT}</th>
                <th style="text-align: center;">&nbsp;</th>
            </tr>
        </thead>
        <tbody id="tbodyPT">
            {$html_tpl}
            {$html}
        </tbody>
        <tfoot id="noti">
            <tr></tr>
        </tfoot>
    </table>
</form>
{sugar_getscript file="custom/modules/Meetings/js/tablePTDrag.js"}