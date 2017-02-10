
{assign var="alt_start" value=$navStrings.start}
{assign var="alt_next" value=$navStrings.next}
{assign var="alt_prev" value=$navStrings.previous}
{assign var="alt_end" value=$navStrings.end}


<script type="text/javascript" src="{sugar_getjspath file='include/javascript/sugar_3.js'}"></script>
<script type="text/javascript" src="{sugar_getjspath file='include/javascript/popup_helper.js'}"></script>
    <script type="text/javascript" src='https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places'></script>
<script type="text/javascript">
	{$ASSOCIATED_JAVASCRIPT_DATA}

{literal}
function clearAll() {
   for(i=0; i < document.popup_query_form.length; i++) {
       if(/select/i.test(document.popup_query_form.elements[i].type)) {
          for(x=0; x < document.popup_query_form.elements[i].options.length; x++) {
             document.popup_query_form.elements[i].options[x].removeAttribute('selected');
          }
       }
   }
}
{/literal}
</script>
{$SEARCH_FORM_HEADER}
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="edit view">
<tr>
<td>
<form action="index.php" method="post" name="popup_query_form" id="popup_query_form">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr><td>
{$searchForm}
</td></tr>
<tr>
<td>
<input type="hidden" name="module" value="{$module}" />
<input type="hidden" name="action" value="Popup" />
<input type="hidden" name="query" value="true" />
<input type="hidden" name="func_name" value="" />
<input type="hidden" name="request_data" value="{$request_data}" />
<input type="hidden" name="populate_parent" value="false" />
<input type="hidden" name="hide_clear_button" value="true" />
<input type="hidden" name="record_id" value="" />
{$MODE}
<input type="submit" name="button" class="button" id="search_form_submit"
	title="{$APP.LBL_SEARCH_BUTTON_TITLE}"
	value="{$APP.LBL_SEARCH_BUTTON_LABEL}" />
<input type="reset" onclick="SUGAR.searchForm.clear_form(this.form); return false;" class="button" id="search_form_clear"
	title="{$APP.LBL_CLEAR_BUTTON_TITLE}"
	value="{$APP.LBL_CLEAR_BUTTON_LABEL}"/>
</td>
<td align='right'></td>
</tr>
</table>
</form>
</td>
</tr>
</table>
<p>
<div id='addformlink'>
<input type="button" name="showAdd" class="button" value="{$popupMeta.create.createButton}" onclick="toggleDisplay('addform');" />
</div>
<div id='addform' style='display:none;position:relative;z-index:2;left:0px;top:0px;'>
<form name="form_QuickCreate_{$module}" id="form_QuickCreate_{$module}" {*onsubmit="return check_form('form_popupQuickCreate{$module}');"*} method="post" action="index.php">
{$ADDFORMHEADER}
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="edit view">
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td>
<input type="hidden" name="doAction" value="save" />
<input type="hidden" name="query" value="true" />
{$ADDFORM}
</td></tr>
</table></td></tr></table>
</form>
</div>
</p>
{$jsLang}
{$LIST_HEADER}
{if $should_process}
	<table cellpadding='0' cellspacing='0' width='100%' border='0' class='list view'>
		<tr class='pagination'  role='presentation'>
			<td colspan='{$colCount+1}' align='right'>
				<table border='0' cellpadding='0' cellspacing='0' width='100%'>
					<tr>
						<td align='left' >
							&nbsp;</td>
						<td  align='right' nowrap='nowrap'>						
							{if $pageData.urls.startPage}
								<button type='button' id='popupViewStartButton' title='{$navStrings.start}' class='button' {if $prerow}onclick='return sListView.save_checks(0, "{$moduleString}");'{else} onClick='location.href="{$pageData.urls.startPage}"' {/if}>
									{sugar_getimage name="start" ext=".png" other_attributes='align="absmiddle" border="0" ' alt="$alt_start"}
								</button>						
								<!--<a href='{$pageData.urls.startPage}' {if $prerow}onclick="return sListView.save_checks(0, '{$moduleString}')"{/if} >{sugar_getimage name="start" ext=".png" alt=$navStrings.start other_attributes='align="absmiddle" border="0" '}&nbsp;{$navStrings.start}</a>&nbsp;-->
							{else}
								<button type='button' id='popupViewStartButton' title='{$navStrings.start}' class='button' disabled>
									{sugar_getimage name="start_off" ext=".png" alt=$navStrings.start other_attributes='align="absmiddle" border="0" '}
								</button>
								<!--{sugar_getimage name="start_off" ext=".png" alt=$navStrings.start other_attributes='align="absmiddle" border="0" '}&nbsp;{$navStrings.start}&nbsp;&nbsp;-->
							{/if}
							{if $pageData.urls.prevPage}
								<button type='button' id='popupViewPrevButton' title='{$navStrings.previous}' class='button' {if $prerow}onclick='return sListView.save_checks({$pageData.offsets.prev}, "{$moduleString}")' {else} onClick='location.href="{$pageData.urls.prevPage}"'{/if}>
									{sugar_getimage name="previous" ext=".png" other_attributes='align="absmiddle" border="0" ' alt="$alt_prev"}
								</button>
								<!--<a href='{$pageData.urls.prevPage}' {if $prerow}onclick="return sListView.save_checks({$pageData.offsets.prev}, '{$moduleString}')"{/if} >{sugar_getimage name="previous" ext=".png" alt=$navStrings.previous other_attributes='align="absmiddle" border="0" '}&nbsp;{$navStrings.previous}</a>&nbsp;-->
							{else}
								<button type='button' id='popupViewPrevButton' class='button' disabled title='{$navStrings.previous}'>
									{sugar_getimage name="previous_off" ext=".png" alt=$navStrings.previous other_attributes='align="absmiddle" border="0" '}
								</button>
								<!--{sugar_getimage name="previous_off" ext=".png" alt=$navStrings.previous other_attributes='align="absmiddle" border="0" '}&nbsp;{$navStrings.previous}&nbsp;-->
							{/if}
								<span class='pageNumbers'>({if $pageData.offsets.lastOffsetOnPage == 0}0{else}{$pageData.offsets.current+1}{/if} - {$pageData.offsets.lastOffsetOnPage} {$navStrings.of} {if $pageData.offsets.totalCounted}{$pageData.offsets.total}{else}{$pageData.offsets.total}{if $pageData.offsets.lastOffsetOnPage != $pageData.offsets.total}+{/if}{/if})</span>
							{if $pageData.urls.nextPage}
								<button type='button' id='popupViewNextButton' title='{$navStrings.next}' class='button' {if $prerow}onclick='return sListView.save_checks({$pageData.offsets.next}, "{$moduleString}")' {else} onClick='location.href="{$pageData.urls.nextPage}"'{/if}>
									{sugar_getimage name="next" ext=".png" other_attributes='align="absmiddle" border="0" ' alt="$alt_next"}
								</button>
								<!--&nbsp;<a href='{$pageData.urls.nextPage}' {if $prerow}onclick="return sListView.save_checks({$pageData.offsets.next}, '{$moduleString}')"{/if} >{$navStrings.next}&nbsp;{sugar_getimage name="next" ext=".png" alt=$navStrings.next other_attributes='align="absmiddle" border="0" '}</a>&nbsp;-->
							{else}
								<button type='button' id='popupViewNextButton' class='button' title='{$navStrings.next}' disabled>
									{sugar_getimage name="next_off" ext=".png" alt=$navStrings.next other_attributes='align="absmiddle" border="0" '}
								</button>
								<!--&nbsp;{$navStrings.next}&nbsp;{sugar_getimage name="next_off" ext=".png" alt=$navStrings.next other_attributes='align="absmiddle" border="0" '}-->
							{/if}
							{if $pageData.urls.endPage  && $pageData.offsets.total != $pageData.offsets.lastOffsetOnPage}
								<button type='button' id='popupViewEndButton' title='{$navStrings.end}' class='button' {if $prerow}onclick='return sListView.save_checks("end", "{$moduleString}")' {else} onClick='location.href="{$pageData.urls.endPage}"'{/if}>
									{sugar_getimage name="end" ext=".png" other_attributes='align="absmiddle" border="0" ' alt="$alt_end"}
								</button>
								<!--<a href='{$pageData.urls.endPage}' {if $prerow}onclick="return sListView.save_checks({$pageData.offsets.end}, '{$moduleString}')"{/if} >{$navStrings.end}&nbsp;{sugar_getimage name="end" ext=".png" alt=$navStrings.end other_attributes='align="absmiddle" border="0" '}</a></td>-->
							{elseif !$pageData.offsets.totalCounted || $pageData.offsets.total == $pageData.offsets.lastOffsetOnPage}
								<button type='button' id='popupViewEndButton' class='button' disabled title='{$navStrings.end}'>
								 	{sugar_getimage name="end_off" ext=".png" alt=$navStrings.end other_attributes='align="absmiddle" border="0" '}
								</button>
								<!--&nbsp;{$navStrings.end}&nbsp;{sugar_getimage name="end_off" ext=".png" alt=$navStrings.end other_attributes='align="absmiddle" border="0" '}-->
							{/if}
						</td>
					</tr>
				</table>
			</td>
		</tr>
	
		<tr height='20'>
			{if $prerow}
				<td nowrap="nowrap" width="43px" class="selectCol td_alt">
				<div style="width:43px">
					{sugar_action_menu id=$link_select_id params=$selectLink}
				</div>
				</td>
				<td class='td_alt' nowrap="nowrap" width='1%'>&nbsp;</td>
			{/if}
			{counter start=0 name="colCounter" print=false assign="colCounter"}
			{foreach from=$displayColumns key=colHeader item=params}
				<th scope='col' width='{$params.width}%' nowrap="nowrap">
					<div style='white-space: normal;'width='100%' align='{$params.align|default:'left'}'>
	                {if $params.sortable|default:true}
                                <a href="{$pageData.urls.orderBy}{$params.orderBy|default:$colHeader|lower}" onclick='sListView.save_checks(0, "{$moduleString}");' class='listViewThLinkS1'>{sugar_translate label=$params.label module=$pageData.bean.moduleDir}&nbsp;&nbsp;
						{if $params.orderBy|default:$colHeader|lower == $pageData.ordering.orderBy}
							{if $pageData.ordering.sortOrder == 'ASC'}
                                {capture assign="arrowAlt"}{sugar_translate label='LBL_ALT_SORT_DESC'}{/capture}
                                {capture assign="imageName"}arrow_down.{$arrowExt}{/capture}
								{sugar_getimage name="$imageName" ext='gif' width="$arrowWidth" height="$arrowHeight" alt="$arrowAlt" other_attributes='align="absmiddle" border="0"'}
							{else}
                                {capture assign="arrowAlt"}{sugar_translate label='LBL_ALT_SORT_ASC'}{/capture}
                                {capture assign="imageName"}arrow_up.{$arrowExt}{/capture}
								{sugar_getimage name="$imageName" ext='gif'  width="$arrowWidth" height="$arrowHeight" alt="$arrowAlt" other_attributes='align="absmiddle" border="0"'}
							{/if}
						{else}
                            {capture assign="arrowAlt"}{sugar_translate label='LBL_ALT_SORT'}{/capture}
                            {capture assign="imageName"}arrow.{$arrowExt}{/capture}
							{sugar_getimage name="$imageName" ext='gif' width="$arrowWidth" height="$arrowHeight" alt="$arrowAlt" other_attributes='align="absmiddle" border="0"'}
						{/if}
					{else}
						{sugar_translate label=$params.label module=$pageData.bean.moduleDir}
					{/if}
					</div>
				</th>
				{counter name="colCounter"}
			{/foreach}
			{if !empty($quickViewLinks)}
			<td class='td_alt' nowrap="nowrap" width='1%'>&nbsp;</td>
			{/if}
		</tr>
			
		{foreach name=rowIteration from=$data key=id item=rowData}
			{if $smarty.foreach.rowIteration.iteration is odd}
				{assign var='_rowColor' value=$rowColor[0]}
			{else}
				{assign var='_rowColor' value=$rowColor[1]}
			{/if}
			<tr height='20' class='{$_rowColor}S1'>
				{if $prerow}
				<td width='1%' nowrap='nowrap'>
						<input onclick='sListView.check_item(this, document.MassUpdate)' type='checkbox' class='checkbox' name='mass[]' value='{$rowData.ID}'>
				</td>
				<td width='1%' nowrap='nowrap'>
						{$pageData.additionalDetails.$id}
				</td>
				{/if}
				{counter start=0 name="colCounter" print=false assign="colCounter"}
				{foreach from=$displayColumns key=col item=params}
					<td scope='row' align='{$params.align|default:'left'}' valign=top class='{$_rowColor}S1' bgcolor='{$_bgColor}'>
						{if $params.link && !$params.customCode}
							
							<{$pageData.tag.$id[$params.ACLTag]|default:$pageData.tag.$id.MAIN} href='javascript:void(0)' onclick="send_back('{if $params.dynamic_module}{$rowData[$params.dynamic_module]}{else}{$params.module|default:$pageData.bean.moduleDir}{/if}','{$rowData[$params.id]|default:$rowData.ID}');">
                            
                            {sugar_field parentFieldArray=$rowData vardef=$params displayType=ListView field=$col}
                            </{$pageData.tag.$id[$params.ACLTag]|default:$pageData.tag.$id.MAIN}>
	
						{elseif $params.customCode} 
							{sugar_evalcolumn_old var=$params.customCode rowData=$rowData}
						{elseif $params.currency_format} 
							{sugar_currency_format 
	                            var=$rowData.$col 
	                            round=$params.currency_format.round 
	                            decimals=$params.currency_format.decimals 
	                            symbol=$params.currency_format.symbol
	                            convert=$params.currency_format.convert
	                            currency_symbol=$params.currency_format.currency_symbol
							}
						{elseif $params.type == 'bool'}
								<input type='checkbox' disabled=disabled class='checkbox'
								{if !empty($rowData[$col])}
									checked=checked
								{/if}
								/>
                        {elseif $params.type == 'teamset'}
                            <{$pageData.tag.$id[$params.ACLTag]|default:$pageData.tag.$id.MAIN} href='javascript:void(0)' onclick="send_back('{if $params.dynamic_module}{$rowData[$params.dynamic_module]}{else}{$params.module|default:$pageData.bean.moduleDir}{/if}','{$rowData[$params.id]|default:$rowData.ID}');">
                            {if $rowData.TEAM_COUNT > 1}
                                <span id='div_{$rowData.ID}_teams'>
                                {$rowData.$col}<a href="javascript:toggleMore('div_{$rowData.ID}_teams','img_{$rowData.ID}_teams', 'Teams', 'DisplayInlineTeams', 'team_set_id={$rowData.TEAM_SET_ID}&team_id={$rowData.TEAM_ID}');" style='text-decoration:none;' onMouseOver="javascript:toggleMore('div_{$rowData.ID}_teams','img_{$rowData.ID}_teams', 'Teams', 'DisplayInlineTeams', 'team_set_id={$rowData.TEAM_SET_ID}&team_id={$rowData.TEAM_ID}');"  onFocus="javascript:toggleMore('div_{$rowData.ID}_teams','img_{$rowData.ID}_teams', 'Teams', 'DisplayInlineTeams', 'team_set_id={$rowData.TEAM_SET_ID}');" id='more_feather'>+</a>
                                </span>
                            {else}
                                {$rowData.$col}
                            {/if}
                            </{$pageData.tag.$id[$params.ACLTag]|default:$pageData.tag.$id.MAIN}>
                        {elseif $params.type == 'multienum' } 
								{counter name="oCount" assign="oCount" start=0}
								{multienum_to_array string=$rowData.$col assign="vals"}
								{foreach from=$vals item=item}
									{counter name="oCount"}
									{sugar_translate label=$params.options select=$item}{if $oCount !=  count($vals)},{/if} 
								{/foreach}
                        {else}
                            {sugar_field parentFieldArray=$rowData vardef=$params displayType=ListView field=$col}
						{/if}
					</td>
					{counter name="colCounter"}
				{/foreach}
		 	
		{/foreach}
		<tr class='pagination' role='presentation'>
			<td colspan='{$colCount+1}' align='right'>
				<table border='0' cellpadding='0' cellspacing='0' width='100%'>
					<tr>
						<td align='left' >
							&nbsp;</td>
						<td  align='right' nowrap='nowrap'>						
							{if $pageData.urls.startPage}
								<button type='button' title='{$navStrings.start}' class='button' {if $prerow}onclick='return sListView.save_checks(0, "{$moduleString}");'{else} onClick='location.href="{$pageData.urls.startPage}"' {/if}>
									{sugar_getimage name="start" ext=".png" other_attributes='align="absmiddle" border="0" ' alt="$alt_start"}
								</button>						
								<!--<a href='{$pageData.urls.startPage}' {if $prerow}onclick="return sListView.save_checks(0, '{$moduleString}')"{/if} >{sugar_getimage name="start" ext=".png" alt=$navStrings.start other_attributes='align="absmiddle" border="0" '}&nbsp;{$navStrings.start}</a>&nbsp;-->
							{else}
								<button type='button' title='{$navStrings.start}' class='button' disabled>
									{sugar_getimage name="start_off" ext=".png" alt=$navStrings.start other_attributes='align="absmiddle" border="0" '}
								</button>
								<!--{sugar_getimage name="start_off" ext=".png" alt=$navStrings.start other_attributes='align="absmiddle" border="0" '}&nbsp;{$navStrings.start}&nbsp;&nbsp;-->
							{/if}
							{if $pageData.urls.prevPage}
								<button type='button' title='{$navStrings.previous}' class='button' {if $prerow}onclick='return sListView.save_checks({$pageData.offsets.prev}, "{$moduleString}")' {else} onClick='location.href="{$pageData.urls.prevPage}"'{/if}>
									{sugar_getimage name="previous" ext=".png" other_attributes='align="absmiddle" border="0" ' alt="$alt_prev"}
								</button>
								<!--<a href='{$pageData.urls.prevPage}' {if $prerow}onclick="return sListView.save_checks({$pageData.offsets.prev}, '{$moduleString}')"{/if} >{sugar_getimage name="previous" ext=".png" alt=$navStrings.previous other_attributes='align="absmiddle" border="0" '}&nbsp;{$navStrings.previous}</a>&nbsp;-->
							{else}
								<button type='button' class='button' disabled title='{$navStrings.previous}'>
									{sugar_getimage name="previous_off" ext=".png" alt=$navStrings.previous other_attributes='align="absmiddle" border="0" '}
								</button>
								<!--{sugar_getimage name="previous_off" ext=".png" alt=$navStrings.previous other_attributes='align="absmiddle" border="0" '}&nbsp;{$navStrings.previous}&nbsp;-->
							{/if}
								<span class='pageNumbers'>({if $pageData.offsets.lastOffsetOnPage == 0}0{else}{$pageData.offsets.current+1}{/if} - {$pageData.offsets.lastOffsetOnPage} {$navStrings.of} {if $pageData.offsets.totalCounted}{$pageData.offsets.total}{else}{$pageData.offsets.total}{if $pageData.offsets.lastOffsetOnPage != $pageData.offsets.total}+{/if}{/if})</span>
							{if $pageData.urls.nextPage}
								<button type='button' title='{$navStrings.next}' class='button' {if $prerow}onclick='return sListView.save_checks({$pageData.offsets.next}, "{$moduleString}")' {else} onClick='location.href="{$pageData.urls.nextPage}"'{/if}>
									{sugar_getimage name="next" ext=".png" other_attributes='align="absmiddle" border="0" ' alt="$alt_next"}
								</button>
								<!--&nbsp;<a href='{$pageData.urls.nextPage}' {if $prerow}onclick="return sListView.save_checks({$pageData.offsets.next}, '{$moduleString}')"{/if} >{$navStrings.next}&nbsp;{sugar_getimage name="next" ext=".png" alt=$navStrings.next other_attributes='align="absmiddle" border="0" '}</a>&nbsp;-->
							{else}
								<button type='button' class='button' title='{$navStrings.next}' disabled>
									{sugar_getimage name="next_off" ext=".png" alt=$navStrings.next other_attributes='align="absmiddle" border="0" '}
								</button>
								<!--&nbsp;{$navStrings.next}&nbsp;{sugar_getimage name="next_off" ext=".png" alt=$navStrings.next other_attributes='align="absmiddle" border="0" '}-->
							{/if}
							{if $pageData.urls.endPage  && $pageData.offsets.total != $pageData.offsets.lastOffsetOnPage}
								<button type='button' title='{$navStrings.end}' class='button' {if $prerow}onclick='return sListView.save_checks({$pageData.offsets.end}, "{$moduleString}")' {else} onClick='location.href="{$pageData.urls.endPage}"'{/if}>
									{sugar_getimage name="end" ext=".png" other_attributes='align="absmiddle" border="0" ' alt="$alt_end"}
								</button>
								<!--<a href='{$pageData.urls.endPage}' {if $prerow}onclick="return sListView.save_checks({$pageData.offsets.end}, '{$moduleString}')"{/if} >{$navStrings.end}&nbsp;{sugar_getimage name="end" ext=".png" alt=$navStrings.end other_attributes='align="absmiddle" border="0" '}</a></td>-->
							{elseif !$pageData.offsets.totalCounted || $pageData.offsets.total == $pageData.offsets.lastOffsetOnPage}
								<button type='button' class='button' disabled title='{$navStrings.end}'>
								 	{sugar_getimage name="end_off" ext=".png" alt=$navStrings.end other_attributes='align="absmiddle" border="0" '}
								</button>
								<!--&nbsp;{$navStrings.end}&nbsp;{sugar_getimage name="end_off" ext=".png" alt=$navStrings.end other_attributes='align="absmiddle" border="0" '}-->
							{/if}
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	{if $prerow}
	<script>
	{literal}function lvg_dtails(id){return SUGAR.util.getAdditionalDetails( '{/literal}{$module}{literal}',id, 'adspan_'+id);}{/literal}
	</script>
	{/if}
{else}
	{$APP.LBL_SEARCH_POPULATE_ONLY}
{/if}

