

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
<div class="action_buttons">{if $bean->aclAccess("edit")}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='bc_survey'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if}  {if $bean->aclAccess("delete")}<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='bc_survey'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('{$APP.NTC_DELETE_CONFIRMATION}')) SUGAR.ajaxUI.submitForm(_form);" type="submit" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" id="delete_button">{/if}  <input title="Analyse Survey" id="analyse_survey" type="button" name="analyse_survey" value="Analyse Survey" onclick="window.open('index.php?module=bc_survey&action=viewreport&survey_id={$fields.id.value}&type=status','_blank')" //> <input title="Preview Survey" id="preview_survey" type="button" name="preview_survey" value="Preview Survey" onclick="window.open('preview_survey.php?survey_id={$fields.id.value}','_blank')" //> {sugar_button module="$module" id="REALPDFVIEW" view="$view" form_id="formDetailView" record=$fields.id.value} {sugar_button module="$module" id="REALPDFEMAIL" view="$view" form_id="formDetailView" record=$fields.id.value} {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=bc_survey", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</div>
</td>
<td align="right" width="20%">{$ADMIN_EDIT}
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<div id="bc_survey_detailview_tabs"
>
<div >
<div id='detailpanel_1' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table id='DEFAULT' class="panelContainer" cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.name.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NAME' module='bc_survey'}{/capture}
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
{if $fields.logo.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.logo.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_LOGO' module='bc_survey'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.logo.hidden}
{counter name="panelFieldCount"}
<span id="logo" class="sugar_field">{if $fields.logo.value != ""}<img src="custom/include/surveylogo_images/{$fields.logo.value}" height="120" width="100"/>{else}No Image{/if}</span>
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
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='bc_survey'}{/capture}
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
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{if $fields.start_date.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.start_date.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_START_DATE' module='bc_survey'}{/capture}
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
<span class="sugar_field" id="{$fields.start_date.name}">{$fields.start_date.value}</span>
{/if}
</td>
{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
{if $fields.end_date.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.end_date.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_END_DATE' module='bc_survey'}{/capture}
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
<span class="sugar_field" id="{$fields.end_date.name}">{$fields.end_date.value}</span>
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
{if $fields.allowed_resubmit_count.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.allowed_resubmit_count.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ALLOWED_RESUBMIT_COUNT' module='bc_survey'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.allowed_resubmit_count.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.allowed_resubmit_count.name}">
{sugar_number_format precision=0 var=$fields.allowed_resubmit_count.value}
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
{if $fields.survey_page.acl > 0}
{counter name="fieldsUsed"}
<td width='12.5%' scope="col">
{if !$fields.survey_page.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SURVEYPAGES' module='bc_survey'}{/capture}
{$label|strip_semicolon}:
{else}
{counter name="fieldsHidden"}
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.survey_page.hidden}
{counter name="panelFieldCount"}

{literal}
<script type="text/javascript" src="custom/include/js/survey_js/drag-drop.js"></script>
{/literal}
<form action="index.php" method="post" name="DetailView" id="formDetailView">
<input type="hidden" name="module" value="bc_survey_template">
<input type="hidden" name="record" value="{$template->id}">
<input type="hidden" name="return_action" value="index">
<input type="hidden" name="return_module" value="{$module}">
<input type="hidden" name="return_id" value="{$template->id}">
<input type="hidden" name="module_tab">
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="offset" value="1">
<input type="hidden" name="action" value="EditView">
<input type="hidden" name="sugar_body_only">
<div class="survey-view-section">
</div>
</form>
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
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("DEFAULT").style.display='none';</script>
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
                for(panel in sugar_panel_collase['bc_survey_d'])
                    if(sugar_panel_collase['bc_survey_d'][panel])
                        collapsePanel(panel);
                    else
                        expandPanel(panel);
            {rdelim}
        {rdelim});
</script>{literal}
<script type=text/javascript>
SUGAR.util.doWhen('!SUGAR.util.ajaxCallInProgress() && ((typeof action_sugar_grp1 != "undefined" && action_sugar_grp1 == "Popup") || (typeof DCMenu != "undefined" && DCMenu.module))', function(){
SUGAR.forms.AssignmentHandler.registerView('DetailView');
SUGAR.forms.AssignmentHandler.LINKS['DetailView'] = {"created_by_link":{"relationship":"bc_survey_created_by","module":"Users","id_name":"created_by"},"modified_user_link":{"relationship":"bc_survey_modified_user","module":"Users","id_name":"modified_user_id"},"assigned_user_link":{"relationship":"bc_survey_assigned_user","module":"Users","id_name":"assigned_user_id"},"bc_survey_submission_bc_survey":{"relationship":"bc_survey_submission_bc_survey","module":"bc_survey_submission"},"bc_survey_users":{"relationship":"bc_survey_users","module":"Users"},"bc_survey_prospects":{"relationship":"bc_survey_prospects","module":"Prospects"},"bc_survey_leads":{"relationship":"bc_survey_leads","module":"Leads"},"bc_survey_pages_bc_survey":{"relationship":"bc_survey_pages_bc_survey","module":"bc_survey_pages"},"bc_survey_bc_survey_questions":{"relationship":"bc_survey_bc_survey_questions","module":"bc_survey_questions"},"bc_survey_accounts":{"relationship":"bc_survey_accounts","module":"Accounts"},"bc_survey_bc_survey_template":{"relationship":"bc_survey_bc_survey_template","module":"bc_survey_template"},"bc_survey_bc_survey_template_right":{"relationship":"bc_survey_bc_survey_template","id_name":"bc_survey_bc_survey_templatebc_survey_template_ida","module":"bc_survey_template"},"bc_survey_contacts":{"relationship":"bc_survey_contacts","module":"Contacts"}}

YAHOO.util.Event.onContentReady('bc_survey_detailview_tabs', SUGAR.forms.AssignmentHandler.loadComplete);});</script>{/literal}
