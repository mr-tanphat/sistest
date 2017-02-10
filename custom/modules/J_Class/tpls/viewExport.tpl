<link rel="stylesheet" type="text/css" href="{sugar_getjspath file='custom/modules/J_Class/css/showExport.css'}">
{sugar_getscript file='custom/modules/J_Class/js/showExport.js'}
<div id="div_change_session" title="{$MOD.BTN_EXPORT}" style="display: none;" >
    <input type="hidden" value="{$CLASS_ID}" id="classID">
    <input type="hidden" value="{$TEAMTYPE}" id="team_type">
    <div id ="change_template">
        <label for="template" class="span5">{$MOD.LBL_CHOOSE_TEMPLATE}:</label>
        {if $ISADULT == 1 }          
        <select name='template' id='template'>
            <option value="Thanks you Template">Thank you Template</option>
            <option value="Certificate Adult">Certificate Adult</option>
            <option value="In Course Report">In Course Report</option>            
        </select>
        {elseif  $TEAMTYPE == 'Adult' }
        <select name='template' id='template'>
            <option value="-None-">--None--</option>
            <option value="Certificate Adult">Certificate Adult</option>
            <option value="In-Course Report Adult">In-Course Report Adult</option>
            <!--<option value="In Course Report">In Course Report</option>-->            
        </select>
        <label class="certificate_no" style="display: none;">
            Certificate No: 
        </label>
        <input type="text" id="certificate_no" class="certificate_no" style="display: none;" />
        {else}
        <select name='template' id='template'>           
            <option value="Thanks you Template">Thank you Template</option>
            <option value="Certificate Junior">Certificate Junior</option>
            <option value="In Course Report">In Course Report</option>
        </select>
        {/if}
    </div>
    <table class="studentList" id="tbl_change_session">
        <tbody>
            {if $ISADULT == 1}
                <tr style="vertical-align: top;">
                    <th>{$MOD.LBL_EXPORT_CHECK_ALL}<br><input type="checkbox" id="checkAll"></th>
                    <th>{$MOD.LBL_EXPORT_STUDENT_NO}</th>
                    <th>{$MOD.LBL_EXPORT_STUDENT_ID}</th>
                    <th>{$MOD.LBL_EXPORT_STUDENT_NAME}</th>
                </tr>
                <tr>
                    <td colspan="5"><hr></td>
                    
                </tr>
            {else}               
                <tr style="vertical-align: top;">
                    <th>{$MOD.LBL_EXPORT_CHECK_ALL}<br><input type="checkbox" id="checkAll"></th>
                    <th>{$MOD.LBL_EXPORT_STUDENT_NO}</th>
                    <th>{$MOD.LBL_EXPORT_STUDENT_ID}</th>
                    <th>{$MOD.LBL_EXPORT_STUDENT_NAME}</th>
                </tr>
                <tr>
                    <td colspan="4"><hr></td>
                    
                </tr>
            {/if}
            
            {$STUDENT_LIST}    
        </tbody>
    </table>
</div>
