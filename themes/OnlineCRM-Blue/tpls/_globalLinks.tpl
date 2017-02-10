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
<div class="dcmenuDivider" id="globalLinksDivider"></div>
<div id="globalLinksModule">
    <ul class="clickMenu" id="globalLinks">
        <li>
            <ul class="subnav iefixed">
                {foreach from=$GCLS item=GCL name=gcl key=gcl_key}
                <li><a id="{$gcl_key}_link" href="{$GCL.URL}" {if $smarty.foreach.gcl.last}class="last"{/if}{if !empty($GCL.ONCLICK)} onclick="{$GCL.ONCLICK}"{/if}>{$GCL.LABEL}</a></li>

                {foreach from=$GCL.SUBMENU item=GCL_SUBMENU name=gcl_submenu key=gcl_submenu_key}
                <a id="{$gcl_submenu_key}_link" href="{$GCL_SUBMENU.URL}"{if !empty($GCL_SUBMENU.ONCLICK)} onclick="{$GCL_SUBMENU.ONCLICK}"{/if}>{$GCL_SUBMENU.LABEL}</a>
                {/foreach}
                {/foreach}
                {if !empty($LOGOUT_LINK) && !empty($LOGOUT_LABEL)}
                <li><a id="logout_link" href='{$LOGOUT_LINK}' class='utilsLink'>{$LOGOUT_LABEL}</a> </li>
                {/if}
            </ul>
            <span> 
                <div id="dcmenuUserIcon" {$NOTIFCLASS}>
                    {$NOTIFICON}
                </div>
                <a id="welcome_link" href='javascript: void(0);'>{$CURRENT_USER}</a>

            </span>
        </li>
    </ul>
</div>

{if $NOTIFCODE != ""}
<div class="dcmenuDivider" id="notifDivider"></div>
<!--<div id="dcmenuSugarCube" {$NOTIFCLASS} {if $ISADMIN}onclick="DCMenu.notificationsList();" title="{$APP.LBL_PENDING_NOTIFICATIONS}"{/if}>
{$NOTIFCODE}
</div>-->
<!--<div id="dcmenuSugarCube" {$NOTIFCLASS} {if $ISADMIN}onclick="DCMenu.notificationsList();" title="{$APP.LBL_PENDING_NOTIFICATIONS}"{/if}>-->
<div id="dcmenuSugarCube" {$NOTIFCLASS}>
    <ul class="nav navbar-nav pull-right">
    {if $PENDING_NOTIFY_COUNT >0}
        <li class="dropdown dropdown-extended dropdown-notification">
            <i class="fa fa-bell-o fa-2"></i>
            <span class="{if $PENDING_NOTIFY_COUNT >9}badge-plus{else}badge{/if} badge-default"> {if $PENDING_NOTIFY_COUNT >9}9<sup>+</sup> {else}{$PENDING_NOTIFY_COUNT}{/if} </span>
            <ul class="dropdown-menu">
                <li class="dropdown-menu-title"><span><b>{$PENDING_NOTIFY_COUNT}</b> {$APP.LBL_PENDING_NOTIFY}</span></li>
                <li>
                    <div class="dropdown-menu-list fancyScrollbar">
                        <ul>
                            {$LIST_PENDING}
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        {/if}
        {if $NEW_NOTIFY_COUNT >0}
        <li class="dropdown dropdown-extended dropdown-notification">
            <i class="fa fa-envelope-o fa-2"></i>
            <span class="{if $NEW_NOTIFY_COUNT >9}badge-plus{else}badge{/if} badge-default"> {if $NEW_NOTIFY_COUNT >9}9<sup>+</sup> {else}{$NEW_NOTIFY_COUNT}{/if} </span>
            <ul class="dropdown-menu">
                <li class="dropdown-menu-title"><span><b>{$NEW_NOTIFY_COUNT}</b> {$APP.LBL_NEW_NOTIFY}</span></li>
                <li>
                    <div class="dropdown-menu-list fancyScrollbar">
                        <ul>
                            {$LIST_NEW}
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        {/if}
        {if $UPCOMMING_BIRTHDAY_COUNT >0}
        <li class="dropdown dropdown-extended dropdown-notification">
            <i class="fa fa-calendar fa-2"></i>
            <span class="{if $UPCOMMING_BIRTHDAY_COUNT >9}badge-plus{else}badge{/if} badge-default"> {if $UPCOMMING_BIRTHDAY_COUNT >9}9<sup>+</sup> {else}{$UPCOMMING_BIRTHDAY_COUNT}{/if} </span>
            <ul class="dropdown-menu">
                <li class="dropdown-menu-title"><span><b>{$UPCOMMING_BIRTHDAY_COUNT}</b> {$APP.LBL_UPCOMING_BIRTHDAY}</span></li>
                <li>
                    <div class="dropdown-menu-list fancyScrollbar">
                        <ul>
                            {$LIST_UPCOMING_BIRTHDAY}   
                        </ul>
                    </div>
                </li>
            </ul>

        </li>
        {/if}
        {if $TODAY_BIRTHDAY_COUNT >0}
        <li class="dropdown dropdown-extended dropdown-notification">
            <i class="fa fa-gift fa-3"></i>
            <span class="{if $TODAY_BIRTHDAY_COUNT >9}badge-plus{else}badge{/if} badge-default"> {if $TODAY_BIRTHDAY_COUNT >9}9<sup>+</sup> {else}{$TODAY_BIRTHDAY_COUNT}{/if} </span>
            <ul class="dropdown-menu">
                <li class="dropdown-menu-title"><span><b>{$TODAY_BIRTHDAY_COUNT}</b> {$APP.LBL_TODAY_BIRTHDAY}</span></li>
                <li>
                    <div class="dropdown-menu-list fancyScrollbar">
                        <ul>
                            {$LIST_TODAY_BIRTHDAY}
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        {/if}
    </ul>
	</div>
{else}
<div id="dcmenuSugarCubeEmpty"></div>
{/if}