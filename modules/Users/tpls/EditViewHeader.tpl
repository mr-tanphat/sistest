{*
/*********************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 *
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 *
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 ********************************************************************************/

*}


{$ROLLOVER}
<script type="text/javascript" src="{sugar_getjspath file='modules/Emails/javascript/vars.js'}"></script>
<script type="text/javascript" src="{sugar_getjspath file='cache/include/javascript/sugar_grp_emails.js'}"></script>
<link rel="stylesheet" type="text/css" href="{sugar_getjspath file='modules/Users/PasswordRequirementBox.css'}">
<script type="text/javascript" src="{sugar_getjspath file='cache/include/javascript/sugar_grp_yui_widgets.js'}"></script>
<script type='text/javascript' src='{sugar_getjspath file='include/SubPanel/SubPanelTiles.js'}'></script>
<script type='text/javascript'>
var ERR_RULES_NOT_MET = '{$MOD.ERR_RULES_NOT_MET}';
var ERR_ENTER_OLD_PASSWORD = '{$MOD.ERR_ENTER_OLD_PASSWORD}';
var ERR_ENTER_NEW_PASSWORD = '{$MOD.ERR_ENTER_NEW_PASSWORD}';
var ERR_ENTER_CONFIRMATION_PASSWORD = '{$MOD.ERR_ENTER_CONFIRMATION_PASSWORD}';
var ERR_REENTER_PASSWORDS = '{$MOD.ERR_REENTER_PASSWORDS}';
</script>
<script type='text/javascript' src='{sugar_getjspath file='modules/Users/User.js'}'></script>
<script type='text/javascript' src='{sugar_getjspath file='modules/Users/UserEditView.js'}'></script>
<script type='text/javascript' src='{sugar_getjspath file='modules/Users/PasswordRequirementBox.js'}'></script>
{$ERROR_STRING}
<!-- This is here for the external API forms -->
<form name="DetailView" id="DetailView" method="POST" action="index.php">
	<input type="hidden" name="record" id="record" value="{$ID}">
	<input type="hidden" name="module" value="Users">
	<input type="hidden" name="return_module" value="Users">
	<input type="hidden" name="return_id" value="{$RETURN_ID}">
	<input type="hidden" name="return_action" value="EditView">
</form>

<form name="EditView" enctype="multipart/form-data" id="EditView" method="POST" action="index.php">
	<input type="hidden" name="display_tabs_def">
	<input type="hidden" name="hide_tabs_def">
	<input type="hidden" name="remove_tabs_def">
	<input type="hidden" name="module" value="Users">
	<input type="hidden" name="record" id="record" value="{$ID}">
	<input type="hidden" name="action">
	<input type="hidden" name="page" value="EditView">
	<input type="hidden" name="return_module" value="{$RETURN_MODULE}">
	<input type="hidden" name="return_id" value="{$RETURN_ID}">
	<input type="hidden" name="return_action" value="{$RETURN_ACTION}">
	<input type="hidden" name="password_change" id="password_change" value="false">
    <input type="hidden" name="required_password" id="required_password" value='{$REQUIRED_PASSWORD}' >
	<input type="hidden" name="old_user_name" value="{$USER_NAME}">
	<input type="hidden" name="type" value="{$REDIRECT_EMAILS_TYPE}">
	<input type="hidden" id="is_group" name="is_group" value='{$IS_GROUP}' {$IS_GROUP_DISABLED}>
	<input type="hidden" id='portal_only' name='portal_only' value='{$IS_PORTALONLY}' {$IS_PORTAL_ONLY_DISABLED}>
	<input type="hidden" name="is_admin" id="is_admin" value='{$IS_FOCUS_ADMIN}' {$IS_ADMIN_DISABLED} >
	<input type="hidden" name="is_current_admin" id="is_current_admin" value='{$IS_ADMIN}' >
	<input type="hidden" name="edit_self" id="edit_self" value='{$EDIT_SELF}' >
	<input type="hidden" name="required_email_address" id="required_email_address" value='{$REQUIRED_EMAIL_ADDRESS}' >
    <input type="hidden" name="isDuplicate" id="isDuplicate" value="{$isDuplicate}">
	<div id="popup_window"></div>

<script type="text/javascript">
var EditView_tabs = new YAHOO.widget.TabView("EditView_tabs");

{literal}
//Override so we do not force submit, just simulate the 'save button' click
SUGAR.EmailAddressWidget.prototype.forceSubmit = function() { document.getElementById('Save').click();}

EditView_tabs.on('contentReady', function(e){
{/literal}
{if $ID}
{literal}
    var eapmTabIndex = 4;
    {/literal}{if !$SHOW_THEMES}{literal}eapmTabIndex = 3;{/literal}{/if}{literal}
    EditView_tabs.getTab(eapmTabIndex).set('dataSrc','index.php?sugar_body_only=1&module=Users&subpanel=eapm&action=SubPanelViewer&inline=1&record={/literal}{$ID}{literal}&layout_def_key=UserEAPM&inline=1&ajaxSubpanel=true');
    EditView_tabs.getTab(eapmTabIndex).set('cacheData',true);
    EditView_tabs.getTab(eapmTabIndex).on('dataLoadedChange',function(){
        //reinit action menus
        $("ul.clickMenu").each(function(index, node){
            $(node).sugarActionMenu();
        });
    });

    if ( document.location.hash == '#tab5' ) {
        EditView_tabs.selectTab(eapmTabIndex);
    }
{/literal}
{/if}


{if $scroll_to_cal}
    {literal}
        //we are coming from the tour welcome page, so we need to simulate a click on the 4th tab
        // and scroll to the calendar_options div after the tabs have rendered
        document.getElementById('tab4').click();
        document.getElementById('calendar_options').scrollIntoView();
    {/literal}
{/if}

});
</script>

<table width="100%" cellpadding="0" cellspacing="0" border="0" class="actionsContainer">
    <tr>
        <td>
            {sugar_action_menu id="userEditActions" class="clickMenu fancymenu" buttons=$ACTION_BUTTON_HEADER flat=true}
        </td>
        <td align="right" nowrap>
            <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span> {$APP.NTC_REQUIRED}
        </td>
    </tr>
</table>

<div id="EditView_tabs" class="yui-navset">
    <ul class="yui-nav">
        <li class="selected"><a id="tab1" href="#tab1"><em>{$MOD.LBL_USER_INFORMATION}</em></a></li>
        <li {if $CHANGE_PWD == 0}style='display:none'{/if}><a id="tab2" href="#tab2"><em>{$MOD.LBL_CHANGE_PASSWORD_TITLE}</em></a></li>
        {if $SHOW_THEMES}
        <li><a id="tab3" href="#tab3" style='display:{$HIDE_FOR_GROUP_AND_PORTAL};'><em>{$MOD.LBL_THEME}</em></a></li>
        {/if}
        <li><a id="tab4" href="#tab4" style='display:{$HIDE_FOR_GROUP_AND_PORTAL};'><em>{$MOD.LBL_ADVANCED}</em></a></li>
        {if $ID}
        <li><a id="tab5" href="#tab5" style='display:{$HIDE_FOR_GROUP_AND_PORTAL};'><em>{$MOD.LBL_EAPM_SUBPANEL_TITLE}</em></a></li>
        {/if}
    </ul>
    <div class="yui-content">
        <div>
<!-- BEGIN METADATA GENERATED CONTENT -->
