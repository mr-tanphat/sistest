

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
<input type="hidden" name="password" id="password" value="">
</form>
<div class="action_buttons">{if $bean->aclAccess("edit")}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Contacts'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if}  {if $bean->aclAccess("delete")}<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Contacts'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('{$APP.NTC_DELETE_CONFIRMATION}')) SUGAR.ajaxUI.submitForm(_form);" type="submit" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" id="delete_button">{/if}  {$custom_button} {$HIDDEN_HTML} <input type="button" id="reset_password" name="reset_password" value="Reset Password" onClick="ajaxResetPassword()"/> {$send_survey} {sugar_button module="$module" id="REALPDFVIEW" view="$view" form_id="formDetailView" record=$fields.id.value} {sugar_button module="$module" id="REALPDFEMAIL" view="$view" form_id="formDetailView" record=$fields.id.value}<div class="clear"></div></div>
</div>
</td>
<td align="right" width="20%">{$ADMIN_EDIT}
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<div id="Contacts_detailview_tabs"
>
<div >
<div id='detailpanel_1' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(1);">
<img border="0" id="detailpanel_1_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(1);">
<img border="0" id="detailpanel_1_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_CONTACT_INFORMATION' module='Contacts'}
<script>
document.getElementById('detailpanel_1').className += ' expanded';
</script>
</h4>
<table id='LBL_CONTACT_INFORMATION' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.contact_id.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.contact_id.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CONTACT_ID' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.contact_id.hidden}
{counter name="panelFieldCount"}
<span id="contact_id" class="sugar_field">{if $fields.type.value == "Corporate"}
<span class="textbg_dream">{$fields.contact_id.value}</span>
{elseif $fields.type.value == "Public/Corp"}
<span class="textbg_blood">{$fields.contact_id.value}</span>
{else}
<span class="textbg_blue">{$fields.contact_id.value}</span>
{/if}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.aims_code.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.aims_code.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_AIMS_CODE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.aims_code.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.aims_code.value) <= 0}
{assign var="value" value=$fields.aims_code.default_value }
{else}
{assign var="value" value=$fields.aims_code.value }
{/if} 
<span class="sugar_field" id="{$fields.aims_code.name}">{$fields.aims_code.value}</span>
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
{capture name="label" assign="label"}{sugar_translate label='LBL_NAME' module='Contacts'}{/capture}
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
{if $fields.picture.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.picture.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PICTURE_FILE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.picture.hidden}
{counter name="panelFieldCount"}


<span class="sugar_field" id="{$fields.picture.name}">
<a href="index.php?entryPoint=download&id={$fields.id.value}&type={$module}" class="tabDetailViewDFLink" target='_blank'>{$fields.picture.value}</a>
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
{if $fields.nick_name.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.nick_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NICK_NAME' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.nick_name.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.nick_name.value) <= 0}
{assign var="value" value=$fields.nick_name.default_value }
{else}
{assign var="value" value=$fields.nick_name.value }
{/if} 
<span class="sugar_field" id="{$fields.nick_name.name}">{$fields.nick_name.value}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.birthdate.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.birthdate.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_BIRTHDATE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.birthdate.hidden}
{counter name="panelFieldCount"}


{if strlen($fields.birthdate.value) <= 0}
{assign var="value" value=$fields.birthdate.default_value }
{else}
{assign var="value" value=$fields.birthdate.value }
{/if}
<span class="sugar_field" id="{$fields.birthdate.name}">{$value}</span>
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
{if $fields.gender.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.gender.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_GENDER' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.gender.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.gender.options)}
<input type="hidden" class="sugar_field" id="{$fields.gender.name}" value="{ $fields.gender.options }">
{ $fields.gender.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.gender.name}" value="{ $fields.gender.value }">
{ $fields.gender.options[$fields.gender.value]}
{/if}
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.j_school_contacts_1_name.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.j_school_contacts_1_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_J_SCHOOL_CONTACTS_1_FROM_J_SCHOOL_TITLE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.j_school_contacts_1_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.j_school_contacts_1j_school_ida.value)}
{capture assign="detail_url"}index.php?module=J_School&action=DetailView&record={$fields.j_school_contacts_1j_school_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="j_school_contacts_1j_school_ida" class="sugar_field" data-id-value="{$fields.j_school_contacts_1j_school_ida.value}">{$fields.j_school_contacts_1_name.value}</span>
{if !empty($fields.j_school_contacts_1j_school_ida.value)}</a>{/if}
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
{if $fields.c_memberships_contacts_2_name.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.c_memberships_contacts_2_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MEMBERSHIP' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.c_memberships_contacts_2_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.c_memberships_contacts_2c_memberships_ida.value)}
{capture assign="detail_url"}index.php?module=C_Memberships&action=DetailView&record={$fields.c_memberships_contacts_2c_memberships_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="c_memberships_contacts_2c_memberships_ida" class="sugar_field" data-id-value="{$fields.c_memberships_contacts_2c_memberships_ida.value}">{$fields.c_memberships_contacts_2_name.value}</span>
{if !empty($fields.c_memberships_contacts_2c_memberships_ida.value)}</a>{/if}
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
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.description.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.description.name|escape:'html'|url2html|nl2br}">{$fields.description.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
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
<script>document.getElementById("LBL_CONTACT_INFORMATION").style.display='none';</script>
{/if}
<div id='detailpanel_2' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(2);">
<img border="0" id="detailpanel_2_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(2);">
<img border="0" id="detailpanel_2_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_PANEL_COMPANY' module='Contacts'}
<script>
document.getElementById('detailpanel_2').className += ' expanded';
</script>
</h4>
<table id='LBL_PANEL_COMPANY' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.c_contacts_contacts_1_name.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.c_contacts_contacts_1_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CONTACT_PARENT_NAME' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.c_contacts_contacts_1_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.c_contacts_contacts_1c_contacts_ida.value)}
{capture assign="detail_url"}index.php?module=C_Contacts&action=DetailView&record={$fields.c_contacts_contacts_1c_contacts_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="c_contacts_contacts_1c_contacts_ida" class="sugar_field" data-id-value="{$fields.c_contacts_contacts_1c_contacts_ida.value}">{$fields.c_contacts_contacts_1_name.value}</span>
{if !empty($fields.c_contacts_contacts_1c_contacts_ida.value)}</a>{/if}
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.contact_rela.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.contact_rela.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CONTACT_RELA' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.contact_rela.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.contact_rela.options)}
<input type="hidden" class="sugar_field" id="{$fields.contact_rela.name}" value="{ $fields.contact_rela.options }">
{ $fields.contact_rela.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.contact_rela.name}" value="{ $fields.contact_rela.value }">
{ $fields.contact_rela.options[$fields.contact_rela.value]}
{/if}
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
{if $fields.phone_mobile.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.phone_mobile.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MOBILE_PHONE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.phone_mobile.hidden}
{counter name="panelFieldCount"}
<span id='phone_mobile_span'>
{$fields.phone_mobile.value}
</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.other_mobile.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.other_mobile.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OTHER_MOBILE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  class="phone">
{if !$fields.other_mobile.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.other_mobile.value)}
{assign var="phone_value" value=$fields.other_mobile.value }
{sugar_phone value=$phone_value usa_format="0"}
{/if}
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
{if $fields.do_not_call.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.do_not_call.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DO_NOT_CALL' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.do_not_call.hidden}
{counter name="panelFieldCount"}

{if strval($fields.do_not_call.value) == "1" || strval($fields.do_not_call.value) == "yes" || strval($fields.do_not_call.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.do_not_call.name}" id="{$fields.do_not_call.name}" value="$fields.do_not_call.value" disabled="true" {$checked}>
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
{if $fields.relationship.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.relationship.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_RELATIONSHIP' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.relationship.hidden}
{counter name="panelFieldCount"}
<span id="relationship" class="sugar_field">{$RELATIONSHIP}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.phone_other.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.phone_other.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OTHER_PHONE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  class="phone">
{if !$fields.phone_other.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.phone_other.value)}
{assign var="phone_value" value=$fields.phone_other.value }
{sugar_phone value=$phone_value usa_format="0"}
{/if}
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
{if $fields.describe_relationship.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.describe_relationship.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIBE_RELATIONSHIP' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.describe_relationship.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.describe_relationship.name|escape:'html'|url2html|nl2br}">{$fields.describe_relationship.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.primary_address_street.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.primary_address_street.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PRIMARY_ADDRESS' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.primary_address_street.hidden}
{counter name="panelFieldCount"}

{sugar_getscript file='include/SugarFields/Fields/Address/DisplayMap.js'}
<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td width='99%' >
<input type="hidden" class="sugar_field" id="primary_address_street" value="{$fields.primary_address_street.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="primary_address_city" value="{$fields.primary_address_city.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="primary_address_state" value="{$fields.primary_address_state.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="primary_address_country" value="{$fields.primary_address_country.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="primary_address_postalcode" value="{$fields.primary_address_postalcode.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="primary_address_latitude" value="{$fields.primary_address_latitude.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="primary_address_longitude" value="{$fields.primary_address_longitude.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<!--Custom code by Bui Kim Tung -- Hide View_map button when address street is empty-->
<!--End custom code by Bui Kim Tung-->
{$fields.primary_address_street.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}<br/>
<!--{$fields.primary_address_state.value|escape:'htmlentitydecode'|strip_tags|url2html|nl2br}<br/>
{$fields.primary_address_city.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}<br/> 
{$fields.primary_address_postalcode.value|escape:'htmlentitydecode'|strip_tags|url2html|nl2br}
{$fields.primary_address_country.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}-->
{if ! empty($fields.primary_address_street.value)}
<br/><input type="button"  id="view_map_primary" onclick="displayMap(this)" value="{$APP.LBL_VIEW_MAP}">  
{/if}
</td>
<td class='dataField' width='1%'>
{$custom_code_primary}
</td>
</tr>
</table>
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
{if $fields.email1.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.email1.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_EMAIL_ADDRESS' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.email1.hidden}
{counter name="panelFieldCount"}
<span id='email1_span'>
{$fields.email1.value}
</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.alt_address_street.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.alt_address_street.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ALTERNATE_ADDRESS' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.alt_address_street.hidden}
{counter name="panelFieldCount"}

{sugar_getscript file='include/SugarFields/Fields/Address/DisplayMap.js'}
<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td width='99%' >
<input type="hidden" class="sugar_field" id="alt_address_street" value="{$fields.alt_address_street.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="alt_address_city" value="{$fields.alt_address_city.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="alt_address_state" value="{$fields.alt_address_state.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="alt_address_country" value="{$fields.alt_address_country.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="alt_address_postalcode" value="{$fields.alt_address_postalcode.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="alt_address_latitude" value="{$fields.alt_address_latitude.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="alt_address_longitude" value="{$fields.alt_address_longitude.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<!--Custom code by Bui Kim Tung -- Hide View_map button when address street is empty-->
<!--End custom code by Bui Kim Tung-->
{$fields.alt_address_street.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}<br/>
<!--{$fields.alt_address_state.value|escape:'htmlentitydecode'|strip_tags|url2html|nl2br}<br/>
{$fields.alt_address_city.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}<br/> 
{$fields.alt_address_postalcode.value|escape:'htmlentitydecode'|strip_tags|url2html|nl2br}
{$fields.alt_address_country.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}-->
{if ! empty($fields.alt_address_street.value)}
<br/><input type="button"  id="view_map_alt" onclick="displayMap(this)" value="{$APP.LBL_VIEW_MAP}">  
{/if}
</td>
<td class='dataField' width='1%'>
{$custom_code_alt}
</td>
</tr>
</table>
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
{if $fields.account_name.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.account_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ACCOUNT_NAME' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
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
{if $fields.phone_work.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.phone_work.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OFFICE_PHONE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  class="phone">
{if !$fields.phone_work.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.phone_work.value)}
{assign var="phone_value" value=$fields.phone_work.value }
{sugar_phone value=$phone_value usa_format="0"}
{/if}
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
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(2, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_PANEL_COMPANY").style.display='none';</script>
{/if}
<div id='detailpanel_3' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(3);">
<img border="0" id="detailpanel_3_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(3);">
<img border="0" id="detailpanel_3_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_PORTAL_INFORMATION' module='Contacts'}
<script>
document.getElementById('detailpanel_3').className += ' expanded';
</script>
</h4>
<table id='LBL_PORTAL_INFORMATION' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if !(empty($PORTAL_ENABLED)) }
{if $fields.portal_name.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.portal_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PORTAL_NAME' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.portal_name.hidden}
{counter name="panelFieldCount"}
<span id="portal_name" class="sugar_field"><a href="index.php?module=Users&return_module=Users&action=DetailView&record={$fields.user_id.value}">{$fields.portal_name.value}</a></span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if !(empty($PORTAL_ENABLED)) }
{if $fields.portal_active.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.portal_active.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PORTAL_ACTIVE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.portal_active.hidden}
{counter name="panelFieldCount"}

{if strval($fields.portal_active.value) == "1" || strval($fields.portal_active.value) == "yes" || strval($fields.portal_active.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.portal_active.name}" id="{$fields.portal_active.name}" value="$fields.portal_active.value" disabled="true" {$checked}>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
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
{if $fields.password_generated.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.password_generated.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PASS_GENERATED' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.password_generated.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.password_generated.value) <= 0}
{assign var="value" value=$fields.password_generated.default_value }
{else}
{assign var="value" value=$fields.password_generated.value }
{/if} 
<span class="sugar_field" id="{$fields.password_generated.name}">{$fields.password_generated.value}</span>
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
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(3, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_PORTAL_INFORMATION").style.display='none';</script>
{/if}
<div id='detailpanel_4' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(4);">
<img border="0" id="detailpanel_4_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(4);">
<img border="0" id="detailpanel_4_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_EDITVIEW_PANEL1' module='Contacts'}
<script>
document.getElementById('detailpanel_4').className += ' expanded';
</script>
</h4>
<table id='LBL_EDITVIEW_PANEL1' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.study_apollo_before.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.study_apollo_before.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_STUDY_APOLLO_BEFORE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.study_apollo_before.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.study_apollo_before.name|escape:'html'|url2html|nl2br}">{$fields.study_apollo_before.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.study_other_before.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.study_other_before.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_STUDY_OTHER_BEFORE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.study_other_before.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.study_other_before.name|escape:'html'|url2html|nl2br}">{$fields.study_other_before.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
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
{if $fields.time_study_english.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.time_study_english.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TIME_STUDY_ENGLISH' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.time_study_english.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.time_study_english.name|escape:'html'|url2html|nl2br}">{$fields.time_study_english.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.study_with_before.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.study_with_before.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_STUDY_WITH_BEFORE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.study_with_before.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.study_with_before.name|escape:'html'|url2html|nl2br}">{$fields.study_with_before.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
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
{if $fields.strong_skills.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.strong_skills.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_STRONG_SKILLS' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.strong_skills.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.strong_skills.name|escape:'html'|url2html|nl2br}">{$fields.strong_skills.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.weak_skills.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.weak_skills.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_WEAK_SKILLS' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.weak_skills.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.weak_skills.name|escape:'html'|url2html|nl2br}">{$fields.weak_skills.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
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
{if $fields.expectation.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.expectation.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_EXPECTATION' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.expectation.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.expectation.name|escape:'html'|url2html|nl2br}">{$fields.expectation.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.other_note.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.other_note.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OTHER_NOTE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.other_note.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.other_note.name|escape:'html'|url2html|nl2br}">{$fields.other_note.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
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
{if $fields.preferred_kind_of_course.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.preferred_kind_of_course.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PREFERRED_KIND_OF_COURSE_NUMERIC' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.preferred_kind_of_course.hidden}
{counter name="panelFieldCount"}
<span id="preferred_kind_of_course" class="sugar_field">{$fields.preferred_kind_of_course.value}</span>
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
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(4, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL1").style.display='none';</script>
{/if}
<div id='detailpanel_5' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(5);">
<img border="0" id="detailpanel_5_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(5);">
<img border="0" id="detailpanel_5_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_PANEL_ASSIGNMENT' module='Contacts'}
<script>
document.getElementById('detailpanel_5').className += ' expanded';
</script>
</h4>
<table id='LBL_PANEL_ASSIGNMENT' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.lead_source.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.lead_source.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_LEAD_SOURCE' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.lead_source.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.lead_source.options)}
<input type="hidden" class="sugar_field" id="{$fields.lead_source.name}" value="{ $fields.lead_source.options }">
{ $fields.lead_source.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.lead_source.name}" value="{ $fields.lead_source.value }">
{ $fields.lead_source.options[$fields.lead_source.value]}
{/if}
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.contact_status.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.contact_status.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CONTACT_STATUS' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.contact_status.hidden}
{counter name="panelFieldCount"}
<span id="contact_status" class="sugar_field">{$COLOR}</span>
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
{if $fields.lead_source_description.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.lead_source_description.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_LEAD_SOURCE_DESCRIPTION' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.lead_source_description.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.lead_source_description.name|escape:'html'|url2html|nl2br}">{$fields.lead_source_description.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.campaign_name.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.campaign_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CAMPAIGN' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.campaign_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.campaign_id.value)}
{capture assign="detail_url"}index.php?module=Campaigns&action=DetailView&record={$fields.campaign_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="campaign_id" class="sugar_field" data-id-value="{$fields.campaign_id.value}">{$fields.campaign_name.value}</span>
{if !empty($fields.campaign_id.value)}</a>{/if}
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
{if $fields.assigned_user_name.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.assigned_user_name.hidden}
{if $team_type == "Junior"}
{$MOD.LBL_FIRST_EC}
{else}
{$MOD.LBL_FIRST_SM}
{/if}: 
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
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_MODIFIED' module='Contacts'}{/capture}
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
{capture name="label" assign="label"}{sugar_translate label='LBL_TEAMS' module='Contacts'}{/capture}
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
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_ENTERED' module='Contacts'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
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
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(5, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_PANEL_ASSIGNMENT").style.display='none';</script>
{/if}
</div>
</div>

</form>

{sugar_getscript file="custom/modules/Contacts/js/detailview.js"}
{sugar_getscript file="custom/modules/Contacts/js/pGenerator.jquery.js"}
{sugar_getscript file="custom/modules/Contacts/js/handlePTDemoContact.js"}

<script>SUGAR.util.doWhen("document.getElementById('form') != null",
function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script><script type="text/javascript">
SUGAR.util.doWhen("typeof collapsePanel == 'function'",
        function(){ldelim}
            var sugar_panel_collase = Get_Cookie("sugar_panel_collase");
            if(sugar_panel_collase != null) {ldelim}
                sugar_panel_collase = YAHOO.lang.JSON.parse(sugar_panel_collase);
                for(panel in sugar_panel_collase['Contacts_d'])
                    if(sugar_panel_collase['Contacts_d'][panel])
                        collapsePanel(panel);
                    else
                        expandPanel(panel);
            {rdelim}
        {rdelim});
</script>{literal}
<script type=text/javascript>
SUGAR.util.doWhen('!SUGAR.util.ajaxCallInProgress() && ((typeof action_sugar_grp1 != "undefined" && action_sugar_grp1 == "Popup") || (typeof DCMenu != "undefined" && DCMenu.module))', function(){
SUGAR.forms.AssignmentHandler.registerView('DetailView');
SUGAR.forms.AssignmentHandler.LINKS['DetailView'] = {"created_by_link":{"relationship":"contacts_created_by","module":"Users","id_name":"created_by"},"modified_user_link":{"relationship":"contacts_modified_user","module":"Users","id_name":"modified_user_id"},"assigned_user_link":{"relationship":"contacts_assigned_user","module":"Users","id_name":"assigned_user_id"},"email_addresses_primary":{"relationship":"contacts_email_addresses_primary"},"email_addresses":{"relationship":"contacts_email_addresses","module":"EmailAddress"},"accounts":{"relationship":"accounts_contacts","id_name":"account_id","module":"Accounts"},"reports_to_link":{"relationship":"contact_direct_reports","id_name":"reports_to_id","module":"Contacts"},"opportunities":{"relationship":"opportunities_contacts","module":"Opportunities"},"bugs":{"relationship":"contacts_bugs"},"calls":{"relationship":"calls_contacts"},"cases":{"relationship":"contacts_cases"},"direct_reports":{"relationship":"contact_direct_reports"},"documents":{"relationship":"documents_contacts"},"leads":{"relationship":"contact_leads"},"products":{"relationship":"contact_products"},"contracts":{"relationship":"contracts_contacts"},"meetings":{"relationship":"meetings_contacts"},"notes":{"relationship":"contact_notes"},"project":{"relationship":"projects_contacts"},"project_resource":{"relationship":"projects_contacts_resources"},"quotes":{"relationship":"quotes_contacts_shipto","module":"Quotes"},"billing_quotes":{"relationship":"quotes_contacts_billto","module":"Quotes"},"tasks":{"relationship":"contact_tasks"},"tasks_parent":{"relationship":"contact_tasks_parent"},"user_sync":{"relationship":"contacts_users"},"campaigns":{"relationship":"contact_campaign_log","module":"CampaignLog"},"campaign_contacts":{"relationship":"campaign_contacts","id_name":"campaign_id","module":"Campaigns"},"prospect_lists":{"relationship":"prospect_list_contacts","module":"ProspectLists"},"contacts_contacts_1":{"relationship":"contacts_contacts_1","module":"Contacts"},"bc_survey_contacts":{"relationship":"bc_survey_contacts","module":"bc_survey"},"j_class_contacts_1":{"relationship":"j_class_contacts_1","module":"J_Class"},"leads_contacts_1":{"relationship":"leads_contacts_1","module":"Leads"},"contacts_j_ptresult_1":{"relationship":"contacts_j_ptresult_1","module":"J_PTResult"},"c_memberships_contacts_2":{"relationship":"c_memberships_contacts_2","module":"C_Memberships","id_name":"c_memberships_contacts_2c_memberships_ida"},"contacts_c_payments_2":{"relationship":"contacts_c_payments_2","module":"C_Payments"},"contacts_j_feedback_1":{"relationship":"contacts_j_feedback_1","module":"J_Feedback"},"contacts_c_refunds_1":{"relationship":"contacts_c_refunds_1","module":"C_Refunds"},"contact_c_sms":{"relationship":"contact_c_sms"},"bc_survey_submission_contacts":{"relationship":"bc_survey_submission_contacts","module":"bc_survey_submission"},"j_school_contacts_1":{"relationship":"j_school_contacts_1","module":"J_School","id_name":"j_school_contacts_1j_school_ida"},"c_contacts_contacts_1":{"relationship":"c_contacts_contacts_1","module":"C_Contacts","id_name":"c_contacts_contacts_1c_contacts_ida"},"contacts_c_invoices_1":{"relationship":"contacts_c_invoices_1","module":"C_Invoices"},"student_attendances":{"relationship":"student_attendances","module":"C_Attendance"},"student_revenue":{"relationship":"student_revenue","module":"C_DeliveryRevenue"},"student_forward":{"relationship":"student_forward","module":"C_Carryforward"},"ju_studentsituations":{"relationship":"contact_studentsituations","module":"J_StudentSituations"},"ju_vouchers":{"relationship":"contact_vouchers","module":"J_Voucher"},"contacts_sms":{"relationship":"contact_smses","module":"C_SMS"},"student_j_inventory":{"relationship":"student_j_inventory","module":"J_Inventory"},"student_j_gradebookdetail":{"relationship":"student_j_gradebookdetail","module":"J_GradebookDetail"},"c_classes_contacts_1":{"relationship":"c_classes_contacts_1","module":"C_Classes"},"contacts_c_payments_1":{"relationship":"contacts_c_payments_1","module":"C_Payments"},"contacts_j_payment_1":{"relationship":"contacts_j_payment_1","module":"J_Payment"}}

YAHOO.util.Event.onContentReady('Contacts_detailview_tabs', SUGAR.forms.AssignmentHandler.loadComplete);});</script>{/literal}
