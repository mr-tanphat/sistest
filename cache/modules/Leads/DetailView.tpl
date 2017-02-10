

{assign var=preForm value="<table width='100%' border='1' cellspacing='0' cellpadding='0'><tr><td><table width='100%'><tr><td>"}
{assign var=displayPreform value=false}
{if isset($bean->contact_id) && !empty($bean->contact_id)}
{assign var=displayPreform value=true}
{assign var=preForm value=$preForm|cat:$MOD.LBL_CONVERTED_CONTACT}
{assign var=preForm value=$preForm|cat:"&nbsp;<a href='index.php?module=Contacts&action=DetailView&record="}
{assign var=preForm value=$preForm|cat:$bean->contact_id}
{assign var=preForm value=$preForm|cat:"'>"}
{assign var=preForm value=$preForm|cat:$Contacts->name}
{assign var=preForm value=$preForm|cat:"</a>"}
{/if}
{assign var=preForm value=$preForm|cat:"</td><td>"}
{if isset($bean->account_id) && !empty($bean->account_id)}
{assign var=displayPreform value=true}
{assign var=preForm value=$preForm|cat:$MOD.LBL_CONVERTED_ACCOUNT}
{assign var=preForm value=$preForm|cat:"&nbsp;<a href='index.php?module=Accounts&action=DetailView&record="}
{assign var=preForm value=$preForm|cat:$bean->account_id}
{assign var=preForm value=$preForm|cat:"'>"}
{assign var=preForm value=$preForm|cat:$bean->account_name}
{assign var=preForm value=$preForm|cat:"</a>"}
{/if}
{assign var=preForm value=$preForm|cat:"</td><td>"}
{if isset($bean->opportunity_id) && !empty($bean->opportunity_id)}
{assign var=displayPreform value=true}
{assign var=preForm value=$preForm|cat:$MOD.LBL_CONVERTED_OPP}
{assign var=preForm value=$preForm|cat:"&nbsp;<a href='index.php?module=Opportunities&action=DetailView&record="}
{assign var=preForm value=$preForm|cat:$bean->opportunity_id}
{assign var=preForm value=$preForm|cat:"'>"}
{assign var=preForm value=$preForm|cat:$bean->opportunity_name}
{assign var=preForm value=$preForm|cat:"</a>"}
{/if}
{assign var=preForm value=$preForm|cat:"</td></tr></table></td></tr></table>"}
{if $displayPreform}
{$preForm}
<br>
{/if}

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
</form>
<div class="action_buttons">{if $bean->aclAccess("edit")}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Leads'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if}  {if $bean->aclAccess("edit")}<input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Leads'; _form.return_action.value='DetailView'; _form.isDuplicate.value=true; _form.action.value='EditView'; _form.return_id.value='{$id}';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Duplicate" value="{$APP.LBL_DUPLICATE_BUTTON_LABEL}" id="duplicate_button">{/if}  {if $bean->aclAccess("delete")}<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Leads'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('{$APP.NTC_DELETE_CONFIRMATION}')) SUGAR.ajaxUI.submitForm(_form);" type="submit" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" id="delete_button">{/if}  {$btn_convert_2} {$send_survey} {sugar_button module="$module" id="REALPDFVIEW" view="$view" form_id="formDetailView" record=$fields.id.value} {sugar_button module="$module" id="REALPDFEMAIL" view="$view" form_id="formDetailView" record=$fields.id.value} {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=Leads", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</div>
</td>
<td align="right" width="20%">{$ADMIN_EDIT}
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<div id="Leads_detailview_tabs"
>
<div >
<div id='detailpanel_1' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(1);">
<img border="0" id="detailpanel_1_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(1);">
<img border="0" id="detailpanel_1_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_CONTACT_INFORMATION' module='Leads'}
<script>
document.getElementById('detailpanel_1').className += ' expanded';
</script>
</h4>
<table id='LBL_CONTACT_INFORMATION' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.name.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NAME' module='Leads'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%' colspan='3' >
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
{capture name="label" assign="label"}{sugar_translate label='LBL_NICK_NAME' module='Leads'}{/capture}
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
{capture name="label" assign="label"}{sugar_translate label='LBL_BIRTHDATE' module='Leads'}{/capture}
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
{capture name="label" assign="label"}{sugar_translate label='LBL_GENDER' module='Leads'}{/capture}
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
{if $fields.j_school_leads_1_name.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.j_school_leads_1_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_J_SCHOOL_LEADS_1_FROM_J_SCHOOL_TITLE' module='Leads'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.j_school_leads_1_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.j_school_leads_1j_school_ida.value)}
{capture assign="detail_url"}index.php?module=J_School&action=DetailView&record={$fields.j_school_leads_1j_school_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="j_school_leads_1j_school_ida" class="sugar_field" data-id-value="{$fields.j_school_leads_1j_school_ida.value}">{$fields.j_school_leads_1_name.value}</span>
{if !empty($fields.j_school_leads_1j_school_ida.value)}</a>{/if}
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
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='Leads'}{/capture}
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
{sugar_translate label='LBL_PANEL_GUARDIAN' module='Leads'}
<script>
document.getElementById('detailpanel_2').className += ' expanded';
</script>
</h4>
<table id='LBL_PANEL_GUARDIAN' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.guardian_name.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.guardian_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_GUARDIAN_NAME' module='Leads'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.guardian_name.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.guardian_name.value) <= 0}
{assign var="value" value=$fields.guardian_name.default_value }
{else}
{assign var="value" value=$fields.guardian_name.value }
{/if} 
<span class="sugar_field" id="{$fields.guardian_name.name}">{$fields.guardian_name.value}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.contact_rela.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.contact_rela.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CONTACT_RELA' module='Leads'}{/capture}
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
{capture name="label" assign="label"}{sugar_translate label='LBL_MOBILE_PHONE' module='Leads'}{/capture}
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
{capture name="label" assign="label"}{sugar_translate label='LBL_OTHER_MOBILE' module='Leads'}{/capture}
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
{if $fields.phone_other.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.phone_other.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OTHER_PHONE' module='Leads'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%' colspan='3' class="phone">
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
{if $fields.email1.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.email1.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_EMAIL_ADDRESS' module='Leads'}{/capture}
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
{if $fields.primary_address_street.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.primary_address_street.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PRIMARY_ADDRESS' module='Leads'}{/capture}
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
{if $fields.relationship.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.relationship.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_RELATIONSHIP' module='Leads'}{/capture}
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
{if $fields.describe_relationship.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.describe_relationship.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIBE_RELATIONSHIP' module='Leads'}{/capture}
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
{capture name="label" assign="label"}{sugar_translate label='LBL_ACCOUNT_NAME' module='Leads'}{/capture}
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
{if !empty($fields.account_id.value)}
{/if}
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.phone_work.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.phone_work.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OFFICE_PHONE' module='Leads'}{/capture}
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
<script>document.getElementById("LBL_PANEL_GUARDIAN").style.display='none';</script>
{/if}
<div id='detailpanel_3' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(3);">
<img border="0" id="detailpanel_3_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(3);">
<img border="0" id="detailpanel_3_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_EDITVIEW_PANEL1' module='Leads'}
<script>
document.getElementById('detailpanel_3').className += ' expanded';
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
{capture name="label" assign="label"}{sugar_translate label='LBL_STUDY_APOLLO_BEFORE' module='Leads'}{/capture}
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
{capture name="label" assign="label"}{sugar_translate label='LBL_STUDY_OTHER_BEFORE' module='Leads'}{/capture}
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
{capture name="label" assign="label"}{sugar_translate label='LBL_TIME_STUDY_ENGLISH' module='Leads'}{/capture}
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
{capture name="label" assign="label"}{sugar_translate label='LBL_STUDY_WITH_BEFORE' module='Leads'}{/capture}
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
{capture name="label" assign="label"}{sugar_translate label='LBL_STRONG_SKILLS' module='Leads'}{/capture}
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
{capture name="label" assign="label"}{sugar_translate label='LBL_WEAK_SKILLS' module='Leads'}{/capture}
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
{capture name="label" assign="label"}{sugar_translate label='LBL_EXPECTATION' module='Leads'}{/capture}
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
{capture name="label" assign="label"}{sugar_translate label='LBL_OTHER_NOTE' module='Leads'}{/capture}
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
{capture name="label" assign="label"}{sugar_translate label='LBL_PREFERRED_KIND_OF_COURSE' module='Leads'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.preferred_kind_of_course.hidden}
{counter name="panelFieldCount"}
<span id="preferred_kind_of_course" class="sugar_field">{$KOC}</span>
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
<script>document.getElementById("LBL_EDITVIEW_PANEL1").style.display='none';</script>
{/if}
<div id='detailpanel_4' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(4);">
<img border="0" id="detailpanel_4_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(4);">
<img border="0" id="detailpanel_4_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
{sugar_translate label='LBL_PANEL_ADVANCED' module='Leads'}
<script>
document.getElementById('detailpanel_4').className += ' expanded';
</script>
</h4>
<table id='LBL_PANEL_ADVANCED' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.lead_source.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.lead_source.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_LEAD_SOURCE' module='Leads'}{/capture}
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
{if $fields.status.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.status.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_STATUS' module='Leads'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.status.hidden}
{counter name="panelFieldCount"}
<span id="status" class="sugar_field">{if $fields.status.value == "New"}
<span class="textbg_green"><b>{$fields.status.value}<b></span>
{elseif $fields.status.value == "Assigned"}
<span class="textbg_bluelight"><b>{$fields.status.value}<b></span>
{elseif $fields.status.value == "In Process"}
<span class="textbg_blue"><b>{$fields.status.value}<b></span>
{elseif $fields.status.value == "Converted"}
<span class="textbg_red"><b>{$fields.status.value}<b></span>
{elseif $fields.status.value == "PT/Demo"}
<span class="textbg_violet"><b>{$fields.status.value}<b></span>
{elseif $fields.status.value == "Recycled"}
<span class="textbg_orange"><b>{$fields.status.value}<b></span>
{elseif $fields.status.value == "Dead"}
<span class="textbg_black"><b>{$fields.status.value}<b></span>
{else}
<span><b>{$fields.status.value}<b></span>
{/if}</span>
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
{capture name="label" assign="label"}{sugar_translate label='LBL_LEAD_SOURCE_DESCRIPTION' module='Leads'}{/capture}
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
{if $fields.potential.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.potential.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_POTENTIAL' module='Leads'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%'  >
{if !$fields.potential.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.potential.options)}
<input type="hidden" class="sugar_field" id="{$fields.potential.name}" value="{ $fields.potential.options }">
{ $fields.potential.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.potential.name}" value="{ $fields.potential.value }">
{ $fields.potential.options[$fields.potential.value]}
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
{if $fields.campaign_name.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.campaign_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CAMPAIGN' module='Leads'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%' colspan='3' >
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
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='Leads'}{/capture}
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
{if $fields.date_entered.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.date_entered.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_ENTERED' module='Leads'}{/capture}
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
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.team_name.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.team_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TEAMS' module='Leads'}{/capture}
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
{if $fields.date_modified.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.date_modified.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_MODIFIED' module='Leads'}{/capture}
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
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(4, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_PANEL_ADVANCED").style.display='none';</script>
{/if}
</div>
</div>

</form>

{sugar_getscript file="custom/modules/Leads/js/addToPT.js"}
{sugar_getscript file="modules/Leads/Lead.js"}

<script>SUGAR.util.doWhen("document.getElementById('form') != null",
function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script><script type="text/javascript">
SUGAR.util.doWhen("typeof collapsePanel == 'function'",
        function(){ldelim}
            var sugar_panel_collase = Get_Cookie("sugar_panel_collase");
            if(sugar_panel_collase != null) {ldelim}
                sugar_panel_collase = YAHOO.lang.JSON.parse(sugar_panel_collase);
                for(panel in sugar_panel_collase['Leads_d'])
                    if(sugar_panel_collase['Leads_d'][panel])
                        collapsePanel(panel);
                    else
                        expandPanel(panel);
            {rdelim}
        {rdelim});
</script>{literal}
<script type=text/javascript>
SUGAR.util.doWhen('!SUGAR.util.ajaxCallInProgress() && ((typeof action_sugar_grp1 != "undefined" && action_sugar_grp1 == "Popup") || (typeof DCMenu != "undefined" && DCMenu.module))', function(){
SUGAR.forms.AssignmentHandler.registerView('DetailView');
SUGAR.forms.AssignmentHandler.LINKS['DetailView'] = {"created_by_link":{"relationship":"leads_created_by","module":"Users","id_name":"created_by"},"modified_user_link":{"relationship":"leads_modified_user","module":"Users","id_name":"modified_user_id"},"assigned_user_link":{"relationship":"leads_assigned_user","module":"Users","id_name":"assigned_user_id"},"email_addresses_primary":{"relationship":"leads_email_addresses_primary"},"email_addresses":{"relationship":"leads_email_addresses"},"reports_to_link":{"relationship":"lead_direct_reports"},"reportees":{"relationship":"lead_direct_reports"},"contacts":{"relationship":"contact_leads","module":"Contacts"},"accounts":{"relationship":"account_leads","module":"Accounts","id_name":"account_id"},"contact":{"relationship":"contact_leads"},"opportunity":{"relationship":"opportunity_leads"},"campaign_leads":{"relationship":"campaign_leads","id_name":"campaign_id","module":"Campaigns"},"tasks":{"relationship":"lead_tasks"},"notes":{"relationship":"lead_notes"},"meetings":{"relationship":"meetings_leads"},"calls":{"relationship":"calls_leads"},"oldmeetings":{"relationship":"lead_meetings"},"oldcalls":{"relationship":"lead_calls"},"campaigns":{"relationship":"lead_campaign_log","module":"CampaignLog"},"prospect_lists":{"relationship":"prospect_list_leads","module":"ProspectLists"},"leads_c_payments_1":{"relationship":"leads_c_payments_1","module":"C_Payments"},"bc_survey_leads":{"relationship":"bc_survey_leads","module":"bc_survey"},"c_memberships_leads_1":{"relationship":"c_memberships_leads_1","module":"C_Memberships","id_name":"c_memberships_leads_1c_memberships_ida"},"leads_leads_1":{"relationship":"leads_leads_1","module":"Leads"},"leads_j_ptresult_1":{"relationship":"leads_j_ptresult_1","module":"J_PTResult"},"lead_c_sms":{"relationship":"lead_c_sms"},"j_school_leads_1":{"relationship":"j_school_leads_1","module":"J_School","id_name":"j_school_leads_1j_school_ida"},"j_class_leads_1":{"relationship":"j_class_leads_1","module":"J_Class"},"c_contacts_leads_1":{"relationship":"c_contacts_leads_1","module":"C_Contacts","id_name":"c_contacts_leads_1c_contacts_ida"},"bc_survey_submission_leads":{"relationship":"bc_survey_submission_leads","module":"bc_survey_submission"},"lead_revenue":{"relationship":"lead_revenue","module":"C_DeliveryRevenue"},"lead_forward":{"relationship":"lead_forward","module":"C_Carryforward"},"leads_sms":{"relationship":"lead_smses","module":"C_SMS"},"ju_studentsituations":{"relationship":"lead_studentsituations","module":"J_StudentSituations"},"payment_link":{"relationship":"lead_payments","module":"J_Payment"},"leads_contacts_1":{"relationship":"leads_contacts_1","module":"Contacts"}}

YAHOO.util.Event.onContentReady('Leads_detailview_tabs', SUGAR.forms.AssignmentHandler.loadComplete);});</script>{/literal}
