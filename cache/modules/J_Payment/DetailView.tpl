

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
{include file="custom/modules/J_Payment/tpl/paymentTemplate.tpl"}
{if $team_type == "Junior"}
{include file="custom/modules/J_Payment/tpl/delayPayment.tpl"}
{else}
{include file="custom/modules/J_Payment/tpl/delayPaymentAdult.tpl"}
{/if}
<input type="hidden" id="team_type" type="team_type" value="{$team_type}"/>
{include file="custom/modules/J_Payment/tpl/convert_payment.tpl"}
<input type="hidden" name="is_corporate" id="is_corporate" value="{$fields.is_corporate.value}">
<input type="hidden" name="payment_type" id="payment_type" value="{$fields.payment_type.value}">
<input type="hidden" name="team_id" id="team_id" value="{$fields.team_id.value}">
<input type="hidden" name="status" id="status" value="{$fields.status.value}">
<input type="hidden" name="is_paid" id="is_paid" value="{$is_paid}">
<input type="hidden" name="end_study" id="end_study" value="{$fields.end_study.value}">
{include file="custom/modules/J_Payment/tpl/addToClassAdult.tpl"}
</form>
<div class="action_buttons">{if $bean->aclAccess("edit")}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='J_Payment'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if}  {if $bean->aclAccess("delete")}<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='J_Payment'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('{$APP.NTC_DELETE_CONFIRMATION}')) SUGAR.ajaxUI.submitForm(_form);" type="submit" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" id="delete_button">{/if}  {$EXPORT_FROM_BUTTON}{$CUSTOM_BUTTON} {$BTN_UNDO} {sugar_button module="$module" id="REALPDFVIEW" view="$view" form_id="formDetailView" record=$fields.id.value} {sugar_button module="$module" id="REALPDFEMAIL" view="$view" form_id="formDetailView" record=$fields.id.value} {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=J_Payment", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</div>
</td>
<td align="right" width="20%">{$ADMIN_EDIT}
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<div id="J_Payment_detailview_tabs"
>
<div >
<div id='detailpanel_1' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(1);">
<img border="0" id="detailpanel_1_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(1);">
<img border="0" id="detailpanel_1_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_ENROLLMENT' module='J_Payment'}
<script>
document.getElementById('detailpanel_1').className += ' expanded';
</script>
</h4>
<table id='LBL_ENROLLMENT' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.name.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NAME' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.name.hidden}
{counter name="panelFieldCount"}
<span id="name" class="sugar_field">{$payment_id}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.status.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.status.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_STATUS' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.status.hidden}
{counter name="panelFieldCount"}
<span id="status" class="sugar_field"><b>{$fields.status.value}</b></span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.sale_type.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.sale_type.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SALE_TYPE' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.sale_type.hidden}
{counter name="panelFieldCount"}
<span id="sale_type" class="sugar_field">{$sale_typeQ}</span>
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
{if $fields.contacts_j_payment_1_name.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.contacts_j_payment_1_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CONTACTS_J_PAYMENT_1_FROM_CONTACTS_TITLE' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.contacts_j_payment_1_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.contacts_j_payment_1contacts_ida.value)}
{capture assign="detail_url"}index.php?module=Contacts&action=DetailView&record={$fields.contacts_j_payment_1contacts_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="contacts_j_payment_1contacts_ida" class="sugar_field" data-id-value="{$fields.contacts_j_payment_1contacts_ida.value}">{$fields.contacts_j_payment_1_name.value}</span>
{if !empty($fields.contacts_j_payment_1contacts_ida.value)}</a>{/if}
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.payment_type.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.payment_type.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PAYMENT_TYPE' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.payment_type.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.payment_type.options)}
<input type="hidden" class="sugar_field" id="{$fields.payment_type.name}" value="{ $fields.payment_type.options }">
{ $fields.payment_type.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.payment_type.name}" value="{ $fields.payment_type.value }">
{ $fields.payment_type.options[$fields.payment_type.value]}
{/if}
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.sale_type_date.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.sale_type_date.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SALE_TYPE_DATE' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.sale_type_date.hidden}
{counter name="panelFieldCount"}
<span id="sale_type_date" class="sugar_field">{$sale_type_dateQ}</span>
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
<td width='11.11%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_CLASSES_NAME' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
</td>
<td width='22.22%'  >
{counter name="panelFieldCount"}
<span id="" class="sugar_field">{$html_class}</span>
</td>
{if $fields.kind_of_course_string.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.kind_of_course_string.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_KIND_OF_COURSE' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.kind_of_course_string.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.kind_of_course_string.value) <= 0}
{assign var="value" value=$fields.kind_of_course_string.default_value }
{else}
{assign var="value" value=$fields.kind_of_course_string.value }
{/if} 
<span class="sugar_field" id="{$fields.kind_of_course_string.name}">{$fields.kind_of_course_string.value}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.payment_date.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.payment_date.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PAYMENT_DATE' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.payment_date.hidden}
{counter name="panelFieldCount"}


{if strlen($fields.payment_date.value) <= 0}
{assign var="value" value=$fields.payment_date.default_value }
{else}
{assign var="value" value=$fields.payment_date.value }
{/if}
<span class="sugar_field" id="{$fields.payment_date.name}">{$value}</span>
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
{if $fields.start_study.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.start_study.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_START_STUDY' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.start_study.hidden}
{counter name="panelFieldCount"}


{if strlen($fields.start_study.value) <= 0}
{assign var="value" value=$fields.start_study.default_value }
{else}
{assign var="value" value=$fields.start_study.value }
{/if}
<span class="sugar_field" id="{$fields.start_study.name}">{$value}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{counter name="fieldsUsed"}
</td>
<td width='22.22%' colspan='2' >
</td>
{counter name="fieldsUsed"}
</td>
<td width='22.22%' colspan='2' >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.end_study.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.end_study.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_END_STUDY' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.end_study.hidden}
{counter name="panelFieldCount"}


{if strlen($fields.end_study.value) <= 0}
{assign var="value" value=$fields.end_study.default_value }
{else}
{assign var="value" value=$fields.end_study.value }
{/if}
<span class="sugar_field" id="{$fields.end_study.name}">{$value}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.sessions.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.sessions.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SESSIONS' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.sessions.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.sessions.name}">
{sugar_number_format precision=0 var=$fields.sessions.value}
</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{counter name="fieldsUsed"}
</td>
<td width='22.22%' colspan='2' >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.tuition_fee.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.tuition_fee.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TUITION_FEE' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.tuition_fee.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.tuition_fee.name}'>
{sugar_number_format var=$fields.tuition_fee.value }
</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.tuition_hours.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.tuition_hours.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TUITION_HOURS' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.tuition_hours.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.tuition_hours.name}">
{sugar_number_format var=$fields.tuition_hours.value precision=2 }
</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.j_coursefee_j_payment_1_name.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.j_coursefee_j_payment_1_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_J_COURSEFEE_J_PAYMENT_1_FROM_J_COURSEFEE_TITLE' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.j_coursefee_j_payment_1_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.j_coursefee_j_payment_1j_coursefee_ida.value)}
{capture assign="detail_url"}index.php?module=J_Coursefee&action=DetailView&record={$fields.j_coursefee_j_payment_1j_coursefee_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="j_coursefee_j_payment_1j_coursefee_ida" class="sugar_field" data-id-value="{$fields.j_coursefee_j_payment_1j_coursefee_ida.value}">{$fields.j_coursefee_j_payment_1_name.value}</span>
{if !empty($fields.j_coursefee_j_payment_1j_coursefee_ida.value)}</a>{/if}
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
{if $fields.amount_bef_discount.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.amount_bef_discount.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_AMOUNT_BEF_DISCOUNT' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.amount_bef_discount.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.amount_bef_discount.name}'>
{sugar_number_format var=$fields.amount_bef_discount.value }
</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.total_hours.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.total_hours.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TOTAL_HOURS' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.total_hours.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.total_hours.name}">
{sugar_number_format var=$fields.total_hours.value precision=2 }
</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{counter name="fieldsUsed"}
</td>
<td width='22.22%' colspan='2' >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.discount_amount.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.discount_amount.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DISCOUNT_AMOUNT' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.discount_amount.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.discount_amount.name}'>
{sugar_number_format var=$fields.discount_amount.value }
</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.discount_percent.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.discount_percent.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DISCOUNT_PERCENT' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.discount_percent.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.discount_percent.name}">
{sugar_number_format var=$fields.discount_percent.value precision=2 }
</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.payment_expired.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.payment_expired.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PAYMENT_EXPIRED' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.payment_expired.hidden}
{counter name="panelFieldCount"}


{if strlen($fields.payment_expired.value) <= 0}
{assign var="value" value=$fields.payment_expired.default_value }
{else}
{assign var="value" value=$fields.payment_expired.value }
{/if}
<span class="sugar_field" id="{$fields.payment_expired.name}">{$value}</span>
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
{if $fields.final_sponsor.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.final_sponsor.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FINAL_SPONSOR' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.final_sponsor.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.final_sponsor.name}'>
{sugar_number_format var=$fields.final_sponsor.value }
</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.final_sponsor_percent.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.final_sponsor_percent.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FINAL_SPONSOR_PERCENT' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.final_sponsor_percent.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.final_sponsor_percent.name}">
{sugar_number_format var=$fields.final_sponsor_percent.value precision=2 }
</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.loyalty.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.loyalty.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_LOYALTY' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.loyalty.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.loyalty.value) <= 0}
{assign var="value" value=$fields.loyalty.default_value }
{else}
{assign var="value" value=$fields.loyalty.value }
{/if} 
<span class="sugar_field" id="{$fields.loyalty.name}">{$fields.loyalty.value}</span>
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
{if $fields.total_after_discount.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.total_after_discount.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TOTAL_AFTER_DISCOUNT' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.total_after_discount.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.total_after_discount.name}'>
{sugar_number_format var=$fields.total_after_discount.value }
</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{counter name="fieldsUsed"}
</td>
<td width='22.22%' colspan='2' >
</td>
{if $fields.account_name.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.account_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ACCOUNT_NAME' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.account_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.account_id.value)}
{capture assign="detail_url"}index.php?module=Accounts&action=DetailView&record={$fields.account_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="account_id" class="sugar_field" data-id-value="{$fields.account_id.value}">{$fields.account_name.value}</span>
{if !empty($fields.account_id.value)}</a>{/if}
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
{if $fields.payment_amount.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.payment_amount.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_GRAND_TOTAL' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.payment_amount.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.payment_amount.name}'>
{sugar_number_format var=$fields.payment_amount.value }
</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_PAID_AMOUNT_2' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
</td>
<td width='22.22%'  >
{counter name="panelFieldCount"}
<span id="" class="sugar_field">{$PAID_AMOUNT}</span>
</td>
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{capture name="label" assign="label"}{sugar_translate label='LBL_UNPAID_AMOUNT' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
</td>
<td width='22.22%'  >
{counter name="panelFieldCount"}
<span id="" class="sugar_field">{$UNPAID_AMOUNT}</span>
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(1, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_ENROLLMENT").style.display='none';</script>
{/if}
<div id='detailpanel_2' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(2);">
<img border="0" id="detailpanel_2_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(2);">
<img border="0" id="detailpanel_2_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_OTHER' module='J_Payment'}
<script>
document.getElementById('detailpanel_2').className += ' expanded';
</script>
</h4>
<table id='LBL_OTHER' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.description.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.description.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.description.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.description.name|escape:'html'|url2html|nl2br}">{$fields.description.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.note.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.note.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NOTE' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.note.hidden}
{counter name="panelFieldCount"}
<span id="note" class="sugar_field">{$fields.note.value}  {$revenue_link}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{counter name="fieldsUsed"}
</td>
<td width='22.22%' colspan='2' >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.assigned_user_name.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.assigned_user_name.hidden}
{if $team_type == "Junior"}
{$MOD.LBL_ASSIGNED_USER}
{else}
{$MOD.LBL_FIRST_SM}
{/if}: 
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.assigned_user_name.hidden}
{counter name="panelFieldCount"}
<span id="assigned_user_name" class="sugar_field">{$assigned_user_idQ}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{counter name="fieldsUsed"}
</td>
<td width='22.22%' colspan='2' >
</td>
{if $fields.date_entered.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.date_entered.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_ENTERED' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.date_entered.hidden}
{counter name="panelFieldCount"}
<span id="date_entered" class="sugar_field">{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}</span>
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
<td width='11.11%' scope="col">
{if !$fields.team_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TEAMS' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
{if !$fields.team_name.hidden}
{counter name="panelFieldCount"}

{sugarvar_teamset parentFieldArray=fields vardef=$fields.team_name tabindex='' display='' labelSpan='' fieldSpan='' formName='' tabindex=1 displayType='renderDetailView'  	 }
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{counter name="fieldsUsed"}
</td>
<td width='22.22%' colspan='2' >
</td>
{if $fields.date_modified.acl > 0}
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
{if !$fields.date_modified.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_MODIFIED' module='J_Payment'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='22.22%'  >
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
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
&nbsp;
</td>
<td width='22.22%' colspan='2' >
</td>
{counter name="fieldsUsed"}
<td width='11.11%' scope="col">
&nbsp;
</td>
<td width='22.22%' colspan='3' >
{counter name="panelFieldCount"}
<span id="" class="sugar_field"><h2 style="color: #a90000;" class="nextInvoice">Next invoice number: <span id="nextInvoice"></span></h2></span>
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
<script>document.getElementById("LBL_OTHER").style.display='none';</script>
{/if}
</div>
</div>

</form>


<script>SUGAR.util.doWhen("document.getElementById('form') != null",
function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script><script type="text/javascript">
SUGAR.util.doWhen("typeof collapsePanel == 'function'",
        function(){ldelim}
            var sugar_panel_collase = Get_Cookie("sugar_panel_collase");
            if(sugar_panel_collase != null) {ldelim}
                sugar_panel_collase = YAHOO.lang.JSON.parse(sugar_panel_collase);
                for(panel in sugar_panel_collase['J_Payment_d'])
                    if(sugar_panel_collase['J_Payment_d'][panel])
                        collapsePanel(panel);
                    else
                        expandPanel(panel);
            {rdelim}
        {rdelim});
</script>{literal}
<script type=text/javascript>
SUGAR.util.doWhen('!SUGAR.util.ajaxCallInProgress() && ((typeof action_sugar_grp1 != "undefined" && action_sugar_grp1 == "Popup") || (typeof DCMenu != "undefined" && DCMenu.module))', function(){
SUGAR.forms.AssignmentHandler.registerView('DetailView');
SUGAR.forms.AssignmentHandler.LINKS['DetailView'] = {"created_by_link":{"relationship":"j_payment_created_by","module":"Users","id_name":"created_by"},"modified_user_link":{"relationship":"j_payment_modified_user","module":"Users","id_name":"modified_user_id"},"assigned_user_link":{"relationship":"j_payment_assigned_user","module":"Users","id_name":"assigned_user_id"},"c_carryforward":{"relationship":"j_payment_carryforward","module":"C_Carryforward"},"ju_studentsituations":{"relationship":"j_payment_studentsituations","module":"J_StudentSituations"},"ju_sponsor":{"relationship":"j_payment_j_sponsor","module":"J_Sponsor"},"ju_payment_in":{"relationship":"j_payment_moving_transfer","module":"J_Payment"},"ju_payment_out":{"relationship":"j_payment_moving_transfer","module":"J_Payment","id_name":"payment_out_id"},"situation_delay_link":{"relationship":"situation_delay_payment_delay","id_name":"delay_situation_id","module":"J_StudentSituations"},"paymentdetail_link":{"relationship":"payment_paymentdetails","module":"J_PaymentDetail"},"lead_link":{"relationship":"lead_payments","id_name":"lead_name","module":"Leads"},"account_link":{"relationship":"account_payments","id_name":"account_id","module":"Accounts"},"revenue_link":{"relationship":"ju_payment_revenue","module":"C_DeliveryRevenue"},"contract_link":{"relationship":"contract_j_payment","id_name":"contract_id","module":"Contracts"},"j_payment_j_discount_1":{"relationship":"j_payment_j_discount_1","module":"J_Discount"},"j_partnership_j_payment_1":{"relationship":"j_partnership_j_payment_1","module":"J_Partnership","id_name":"j_partnership_j_payment_1j_partnership_ida"},"j_payment_j_inventory_1":{"relationship":"j_payment_j_inventory_1","module":"J_Inventory","id_name":"j_payment_j_inventory_1j_inventory_idb"},"j_payment_j_payment_1":{"relationship":"j_payment_j_payment_1","module":"J_Payment"},"j_payment_j_payment_1_right":{"relationship":"j_payment_j_payment_1","module":"J_Payment","id_name":"j_payment_j_payment_1j_payment_ida"},"j_coursefee_j_payment_1":{"relationship":"j_coursefee_j_payment_1","module":"J_Coursefee","id_name":"j_coursefee_j_payment_1j_coursefee_ida"},"contacts_j_payment_1":{"relationship":"contacts_j_payment_1","module":"Contacts","id_name":"contacts_j_payment_1contacts_ida"}}

YAHOO.util.Event.onContentReady('J_Payment_detailview_tabs', SUGAR.forms.AssignmentHandler.loadComplete);});</script>{/literal}
