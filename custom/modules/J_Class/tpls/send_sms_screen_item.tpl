<tr student_id="{$STUDENT_ID}" student_name_en="{$STUDENT_NAME_EN}" student_phone="{$STUDENT_PHONE}" attend_id = "{$ATTENDANCE_ID}" class="{$IN_CLASS_TYPE}">
    <td nowrap="" style="text-align: center;" >
        <input type="checkbox" class="custom_checkbox" module_name="J_Class" onclick="handleCheckBox($(this));" value="{$STUDENT_ID}">
    </td>
    <td nowrap="" style="text-align: left;" >
        <b><a href={if empty($ATTENDANCE_ID)} "index.php?module=Leads&amp;action=DetailView&amp;record={$STUDENT_ID}" {else} "index.php?module=Contacts&amp;action=DetailView&amp;record={$STUDENT_ID} {/if} " class="gs_link student_name">{$STUDENT_NAME}</a></b>
    </td>
    <td nowrap="" style="text-align: left;" >
        <span>{$BIRTHDATE}</span>
    </td>
    <td>
        {$PARENTNAME}
    </td>
    <td nowrap="" style="text-align: center;" >
        {if $ATTENDANCE_ID == "" }
        <input type="hidden" name="chk_attendance" class="chk_attendance" >   
        {else}
        <input type="checkbox" {$ATTENDANCE_CHECKED} name="chk_attendance" class="chk_attendance" onclick="saveAttendance($(this).closest('tr'));"/>   
        {/if}
    </td>
    <td nowrap="">
        {if $ATTENDANCE_ID == "" }
        <b> This is Lead </b>
        {else}
        <textarea class="description" rows="3" cols="15" style="resize: vertical;vertical-align: middle;margin-bottom: 5px;" onchange="saveAttendance($(this).closest('tr'));">{$DESCRIPTION}</textarea><br>
        {/if}
    </td>
    <td nowrap="">
        <textarea class="sms_content" name="sms_content" rows="2" cols="35" style="resize: vertical;vertical-align: middle;margin-bottom: 5px;" onkeyup="countContentCharater($(this));"></textarea><br>
        <label class="message_counter"></label>
    </td>
    <td nowrap style="text-align: center;" >                    
        <input type="button" class="btn_expand" name="btn_expand" value="{$MOD.LBL_EXPAND}" style="padding: 6px 10px 6px 10px;margin-right: 10px;" onclick="expandContent($(this));"></input>
        <input type="button" class="btn_collapse" name="btn_collapse" value="{$MOD.LBL_COLLAPSE}" style="padding: 6px 10px 6px 10px;display:none;" onclick="collapseContent($(this));"></input>
        
        <input type="button" p_type = {if empty($ATTENDANCE_ID)} "Leads" {else} "Contacts" {/if} name="btn_send" value="{$MOD.LBL_SEND}" style="padding: 6px 10px 6px 10px;" onclick="checkContent($(this));"></input>
        <img class="loading_icon" src="themes/default/images/loading.gif" align="absmiddle" style="width:16;display:none;">
    </td>
</tr>