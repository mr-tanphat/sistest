

<script type="text/javascript" src="include/EditView/Panels.js"></script>
<script language="javascript">
{literal}
SUGAR.util.doWhen(function(){
    return $("#contentTable").length == 0 && YAHOO.util.Event.DOMReady;
}, SUGAR.themes.actionMenu);
{/literal}
</script>
<table cellpadding="0" cellspacing="0" border="0" width="100%" id="">
<tr>
<td class="buttons" align="left" NOWRAP width="80%">
<div class="actionsContainer">
<form action="index.php" method="post" name="DetailView" id="formDetailView">
<input type="hidden" name="module" value="{$module}">
<input type="hidden" name="record" value="{$fields.id.value}">
<input type="hidden" name="return_action">
<input type="hidden" name="return_module">
<input type="hidden" name="return_id">
<input type="hidden" name="module_tab">
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="offset" value="{$offset}">
<input type="hidden" name="action" value="EditView">
<input type="hidden" name="sugar_body_only">
{if $team_type == "Junior"}
{if $fields.class_type.value == "Waiting Class"}
{include file="custom/modules/J_Class/tpls/delayClassWaiting.tpl"}
{else}
{include file="custom/modules/J_Class/tpls/oustanding_template.tpl"}
{include file="custom/modules/J_Class/tpls/delayClass.tpl"}
{/if}
{else}
{include file="custom/modules/J_Class/tpls/removeFromClassAdult.tpl"}
{/if}
{include file="custom/modules/J_Class/tpls/export_attendance_dialog.tpl"}
{include file="custom/modules/J_Class/tpls/teacher_schedule_screen.tpl"}
{include file="custom/modules/J_Class/tpls/closeClass.tpl"}
{include file="custom/modules/J_Class/tpls/situationNotify.tpl"}
<input type="hidden" name="json_sessions" id="json_sessions" value={$json_ss}>
<input type="hidden" name="next_session_date" id="next_session_date" value={$next_session_date}>
<input type="hidden" name="current_status" id="current_status" value={$fields.status.value}>
<input type="hidden" name="kind_of_course" id="kind_of_course" value={$fields.kind_of_course.value}>
{include file="custom/modules/J_Class/tpls/demo_template.tpl"}
<input type="hidden" id="accept_schedule_change" name="accept_schedule_change" value="0"/>
</form>
<div class="action_buttons">{if $bean->aclAccess("edit")}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='J_Class'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if}  {if $bean->aclAccess("delete")}<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='J_Class'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('{$APP.NTC_DELETE_CONFIRMATION}')) SUGAR.ajaxUI.submitForm(_form);" type="submit" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" id="delete_button">{/if}  {
if $fields.class_type.value == "Normal Class"}{$UPGRADE_BUTTON}{/if} {if $fields.class_type.value == "Normal Class"}{$BTN_SUBMIT_IN_PROGRESS}{/if} {if $fields.status.value != "Closed" && $fields.status.value == "In Progress"}<input type="button" class="button" id="btn_submit_close" name="btn_submit_close" value="{$MOD.BTN_CLOSE}" //>{/if} {if $fields.class_type.value == "Normal Class"}<input type="button" class="button" id="send_SMS" name="send_SMS" value="{$MOD.BTN_TOP_SEND_SMS}" //>{/if} {$BTN_EXPORT} {sugar_button module="$module" id="REALPDFVIEW" view="$view" form_id="formDetailView" record=$fields.id.value} {sugar_button module="$module" id="REALPDFEMAIL" view="$view" form_id="formDetailView" record=$fields.id.value} {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=J_Class", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</div>
</td>
<td align="right" width="20%">{$ADMIN_EDIT}
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<div id="J_Class_detailview_tabs"
>
<div >
<div id='detailpanel_1' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(1);">
<img border="0" id="detailpanel_1_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(1);">
<img border="0" id="detailpanel_1_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_DETAILVIEW_PANEL1' module='J_Class'}
<script>
document.getElementById('detailpanel_1').className += ' expanded';
</script>
</h4>
<table id='LBL_DETAILVIEW_PANEL1' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.class_code.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.class_code.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CLASS_CODE' module='J_Class'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.class_code.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.class_code.value) <= 0}
{assign var="value" value=$fields.class_code.default_value }
{else}
{assign var="value" value=$fields.class_code.value }
{/if} 
<span class="sugar_field" id="{$fields.class_code.name}">{$fields.class_code.value}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.status.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.status.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_STATUS' module='J_Class'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.status.hidden}
{counter name="panelFieldCount"}
<span id="status" class="sugar_field">{if $fields.status.value == "In Progress"}
<span style="color: blue;font-weight: bold;">{$fields.status.value}</span>
{elseif $fields.status.value == "Closed"}
<span style="color: #272727;font-weight: bold;">{$fields.status.value}</span>
{elseif $fields.status.value == "Finish"}
<span style="color: #A8141B;font-weight: bold;">{$fields.status.value}</span>
{elseif $fields.status.value == "Planning"}
<span style="color: #468931;font-weight: bold;">{$fields.status.value}</span>
{/if}
</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.name.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NAME' module='J_Class'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.name.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.name.value) <= 0}
{assign var="value" value=$fields.name.default_value }
{else}
{assign var="value" value=$fields.name.value }
{/if} 
<span class="sugar_field" id="{$fields.name.name}">{$fields.name.value}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.class_type.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.class_type.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CLASS_TYPE' module='J_Class'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.class_type.hidden}
{counter name="panelFieldCount"}
<span id="class_type" class="sugar_field">{if $team_type == "Adult"}
{$fields.class_type_adult.value}
{else}{$fields.class_type.value}{/if}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.j_class_j_class_1_name.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.j_class_j_class_1_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_J_CLASS_J_CLASS_1_FROM_J_CLASS_L_TITLE' module='J_Class'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.j_class_j_class_1_name.hidden}
{counter name="panelFieldCount"}
<span id="j_class_j_class_1_name" class="sugar_field">
<a href="index.php?module=J_Class&action=DetailView&record={$fields.j_class_j_class_1j_class_ida.value}">
<span id="j_class_j_class_1j_class_ida" class="sugar_field" data-id-value="{$fields.j_class_j_class_1j_class_ida.value}">{$fields.j_class_j_class_1_name.value}</span></a>
&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Upgrade To: {$UTC}
</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.start_date.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.start_date.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_START_DATE' module='J_Class'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.start_date.hidden}
{counter name="panelFieldCount"}


{if strlen($fields.start_date.value) <= 0}
{assign var="value" value=$fields.start_date.default_value }
{else}
{assign var="value" value=$fields.start_date.value }
{/if}
<span class="sugar_field" id="{$fields.start_date.name}">{$value}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.max_size.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.max_size.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MAX_SIZE' module='J_Class'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.max_size.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.max_size.options)}
<input type="hidden" class="sugar_field" id="{$fields.max_size.name}" value="{ $fields.max_size.options }">
{ $fields.max_size.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.max_size.name}" value="{ $fields.max_size.value }">
{ $fields.max_size.options[$fields.max_size.value]}
{/if}
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.end_date.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.end_date.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_END_DATE' module='J_Class'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.end_date.hidden}
{counter name="panelFieldCount"}


{if strlen($fields.end_date.value) <= 0}
{assign var="value" value=$fields.end_date.default_value }
{else}
{assign var="value" value=$fields.end_date.value }
{/if}
<span class="sugar_field" id="{$fields.end_date.name}">{$value}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.kind_of_course.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.kind_of_course.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_KIND_OF_COURSE' module='J_Class'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.kind_of_course.hidden}
{counter name="panelFieldCount"}
<span id="kind_of_course" class="sugar_field">{$KOC}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.lesson_test_1.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.lesson_test_1.hidden}
{if !empty($LESSON_TEST_1)} {$MOD.LBL_LESSON_TEST_1}: {/if}
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.lesson_test_1.hidden}
{counter name="panelFieldCount"}
<span id="lesson_test_1" class="sugar_field">{if !empty($LESSON_TEST_1)} {$LESSON_TEST_1} {/if}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.hours.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.hours.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_HOURS' module='J_Class'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.hours.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.hours.name}">
{sugar_number_format var=$fields.hours.value precision=1 }
</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.lesson_test_2.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.lesson_test_2.hidden}
{if !empty($LESSON_TEST_2)} {$MOD.LBL_LESSON_TEST_2}: {/if}
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.lesson_test_2.hidden}
{counter name="panelFieldCount"}
<span id="lesson_test_2" class="sugar_field">{if !empty($LESSON_TEST_2)} {$LESSON_TEST_2} {/if}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.main_schedule.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.main_schedule.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MAIN_SCHEDULE' module='J_Class'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.main_schedule.hidden}
{counter name="panelFieldCount"}
<span id="main_schedule" class="sugar_field">{$SCHEDULE}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.lesson_final_test.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.lesson_final_test.hidden}
{if !empty($LESSON_FINAL_TEST)} {$MOD.LBL_LESSON_FINAL_TEST}: {/if}
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.lesson_final_test.hidden}
{counter name="panelFieldCount"}
<span id="lesson_final_test" class="sugar_field">{if !empty($LESSON_FINAL_TEST)} {$LESSON_FINAL_TEST} {/if}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.description.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.description.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='J_Class'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.description.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.description.name|escape:'html'|url2html|nl2br}">{$fields.description.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.period.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.period.hidden}
{if $team_type == "Junior"} {$MOD.LBL_PERIOD}: {/if}
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.period.hidden}
{counter name="panelFieldCount"}
<span id="period" class="sugar_field">{if $team_type == "Junior"} {$fields.period.value} {/if}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(1, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_DETAILVIEW_PANEL1").style.display='none';</script>
{/if}
<div id='detailpanel_2' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(2);">
<img border="0" id="detailpanel_2_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(2);">
<img border="0" id="detailpanel_2_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_DETAILVIEW_PANEL2' module='J_Class'}
<script>
document.getElementById('detailpanel_2').className += ' expanded';
</script>
</h4>
<table id='LBL_DETAILVIEW_PANEL2' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.assigned_user_name.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.assigned_user_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='J_Class'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.assigned_user_name.hidden}
{counter name="panelFieldCount"}

<span id="assigned_user_id" class="sugar_field" data-id-value="{$fields.assigned_user_id.value}">{$fields.assigned_user_name.value}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.date_modified.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.date_modified.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_MODIFIED' module='J_Class'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.date_modified.hidden}
{counter name="panelFieldCount"}
<span id="date_modified" class="sugar_field">{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.team_name.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.team_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TEAMS' module='J_Class'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.team_name.hidden}
{counter name="panelFieldCount"}

{sugarvar_teamset parentFieldArray=fields vardef=$fields.team_name tabindex='' display='' labelSpan='' fieldSpan='' formName='' tabindex=1 displayType='renderDetailView'  	 }
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.date_entered.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.date_entered.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_ENTERED' module='J_Class'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.date_entered.hidden}
{counter name="panelFieldCount"}
<span id="date_entered" class="sugar_field">
{$fields.date_entered.value} {$APP.LBL_BY}
{$fields.created_by_name.value}
</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
&nbsp;
</td>
<td width='37.5%' colspan='3' >
{counter name="panelFieldCount"}
<span id="" class="sugar_field">{include file="custom/modules/J_Class/tpls/viewExport.tpl"}</span>
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(2, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_DETAILVIEW_PANEL2").style.display='none';</script>
{/if}
</div>
</div>

</form>

{if $fields.class_type.value == "Waiting Class"}
{sugar_getscript file="custom/modules/J_Class/js/handleDelayWaiting.js"}
{sugar_getscript file="custom/modules/J_Class/js/handleWaitingClass.js"}
{sugar_getscript file="custom/include/javascripts/bootstrap-number-input.js"}
{else}
{include file="custom/modules/J_Class/tpls/session_cancel.tpl"}
{sugar_getscript file="custom/modules/J_Class/js/custom.detail.view.js"}
{sugar_getscript file="custom/modules/J_Class/js/handleOutStanding.js"}
{sugar_getscript file="custom/modules/J_Class/js/handleDemoClass.js"}
{sugar_getscript file="custom/modules/J_Class/js/handleSchedule.js"}
{sugar_getscript file="custom/include/javascripts/CustomDatePicker.js"}
{sugar_getscript file="custom/include/javascripts/Timepicker/js/jquery.timepicker.min.js"}
{sugar_getscript file="custom/include/javascripts/Timepicker/js/datepair.min.js"}
{sugar_getscript file="custom/modules/J_Class/js/handleCancel.js"}
{sugar_getscript file="custom/modules/J_Class/js/handleDelay.js"}
{/if}
<link rel='stylesheet' href='{sugar_getjspath file="custom/include/javascripts/Timepicker/css/jquery.timepicker.css"}'/>

<script>SUGAR.util.doWhen("document.getElementById('form') != null",
function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script><script type="text/javascript">
SUGAR.util.doWhen("typeof collapsePanel == 'function'",
        function(){ldelim}
            var sugar_panel_collase = Get_Cookie("sugar_panel_collase");
            if(sugar_panel_collase != null) {ldelim}
                sugar_panel_collase = YAHOO.lang.JSON.parse(sugar_panel_collase);
                for(panel in sugar_panel_collase['J_Class_d'])
                    if(sugar_panel_collase['J_Class_d'][panel])
                        collapsePanel(panel);
                    else
                        expandPanel(panel);
            {rdelim}
        {rdelim});
</script>{literal}
<script type=text/javascript>
SUGAR.util.doWhen('!SUGAR.util.ajaxCallInProgress() && ((typeof action_sugar_grp1 != "undefined" && action_sugar_grp1 == "Popup") || (typeof DCMenu != "undefined" && DCMenu.module))', function(){
SUGAR.forms.AssignmentHandler.registerView('DetailView');
SUGAR.forms.AssignmentHandler.LINKS['DetailView'] = {"created_by_link":{"relationship":"j_class_created_by","module":"Users","id_name":"created_by"},"modified_user_link":{"relationship":"j_class_modified_user","module":"Users","id_name":"modified_user_id"},"assigned_user_link":{"relationship":"j_class_assigned_user","module":"Users","id_name":"assigned_user_id"},"kindofcourse_class":{"relationship":"kindofcourse_class","module":"J_Kindofcourse","id_name":"koc_id"},"ju_meetings":{"relationship":"j_class_meetings","module":"Meetings"},"ju_studentsituations":{"relationship":"j_class_studentsituations","module":"J_StudentSituations"},"ju_studentsituations_move_class":{"relationship":"move_classes_studentsituations","module":"J_StudentSituations"},"j_class_j_class_1":{"relationship":"j_class_j_class_1","module":"J_Class"},"j_class_j_class_1_right":{"relationship":"j_class_j_class_1","module":"J_Class","id_name":"j_class_j_class_1j_class_ida"},"j_class_contacts_1":{"relationship":"j_class_contacts_1","module":"Contacts"},"j_class_j_feedback_1":{"relationship":"j_class_j_feedback_1","module":"J_Feedback"},"j_class_leads_1":{"relationship":"j_class_leads_1","module":"Leads"},"j_coursefee_j_class_1":{"relationship":"j_coursefee_j_class_1","module":"J_Coursefee","id_name":"j_coursefee_j_class_1j_coursefee_ida"},"contracts_j_class_1":{"relationship":"contracts_j_class_1","module":"Contracts"},"j_class_j_gradebook_1":{"relationship":"j_class_j_gradebook_1","module":"J_Gradebook"}}

YAHOO.util.Event.onContentReady('J_Class_detailview_tabs', SUGAR.forms.AssignmentHandler.loadComplete);});</script>{/literal}
