<?php /* Smarty version 2.6.11, created on 2017-02-08 16:50:44
         compiled from cache/modules/bc_survey/SearchForm_advanced.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'cache/modules/bc_survey/SearchForm_advanced.tpl', 28, false),array('function', 'math', 'cache/modules/bc_survey/SearchForm_advanced.tpl', 29, false),array('function', 'sugar_getimagepath', 'cache/modules/bc_survey/SearchForm_advanced.tpl', 37, false),array('function', 'sugar_translate', 'cache/modules/bc_survey/SearchForm_advanced.tpl', 46, false),array('function', 'sugar_getimage', 'cache/modules/bc_survey/SearchForm_advanced.tpl', 92, false),array('function', 'sugar_getjspath', 'cache/modules/bc_survey/SearchForm_advanced.tpl', 138, false),array('function', 'html_options', 'cache/modules/bc_survey/SearchForm_advanced.tpl', 281, false),array('modifier', 'default', 'cache/modules/bc_survey/SearchForm_advanced.tpl', 163, false),)), $this); ?>

<script>
<?php echo '
	$(function() {
	var $dialog = $(\'<div></div>\')
		.html(SUGAR.language.get(\'app_strings\', \'LBL_SEARCH_HELP_TEXT\'))
		.dialog({
			autoOpen: false,
			title: SUGAR.language.get(\'app_strings\', \'LBL_SEARCH_HELP_TITLE\'),
			width: 700
		});
		
		$(\'.help-search\').click(function() {
		$dialog.dialog(\'open\');
		// prevent the default action, e.g., following a link
	});
	
	});
'; ?>

</script>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
      
      
	
		
		<?php if ($this->_tpl_vars['fields']['name_advanced']['acl'] > 0): ?>
		<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0" src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='8.3333333333333%' >
			<label for='name_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'bc_survey'), $this);?>
</label>
		</td>
	<td  nowrap="nowrap" width='25%'>
			
<?php if (strlen ( $this->_tpl_vars['fields']['name_advanced']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['name_advanced']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['name_advanced']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['name_advanced']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['name_advanced']['name']; ?>
' size='30' 
    maxlength='255' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      accesskey='9'  >
   	   	</td>
					<?php endif; ?>
		    
      
	
		
		<?php if ($this->_tpl_vars['fields']['bc_survey_bc_survey_template_name_advanced']['acl'] > 0): ?>
		<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0" src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='8.3333333333333%' >
		
		<label for='bc_survey_bc_survey_template_name_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_BC_SURVEY_BC_SURVEY_TEMPLATE_FROM_BC_SURVEY_TEMPLATE_TITLE','module' => 'bc_survey'), $this);?>
</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
<input type="text" name="<?php echo $this->_tpl_vars['fields']['bc_survey_bc_survey_template_name_advanced']['name']; ?>
"  class="sqsEnabled"   id="<?php echo $this->_tpl_vars['fields']['bc_survey_bc_survey_template_name_advanced']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['bc_survey_bc_survey_template_name_advanced']['value']; ?>
" title='' autocomplete="off"  >
<input type="hidden"  id="<?php echo $this->_tpl_vars['fields']['bc_survey_bc_survey_templatebc_survey_template_ida_advanced']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['bc_survey_bc_survey_templatebc_survey_template_ida_advanced']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['bc_survey_bc_survey_template_name_advanced']['name']; ?>
"   title="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_TITLE']; ?>
" class="button firstChild" value="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_LABEL']; ?>
" onclick='open_popup("<?php echo $this->_tpl_vars['fields']['bc_survey_bc_survey_template_name_advanced']['module']; ?>
", 600, 400, "", true, false, <?php echo '{"call_back_function":"set_return","form_name":"search_form","field_to_name_array":{"id":"bc_survey_bc_survey_templatebc_survey_template_ida_advanced","name":"bc_survey_bc_survey_template_name_advanced"}}'; ?>
, "single", true);'><?php echo smarty_function_sugar_getimage(array('alt' => $this->_tpl_vars['app_strings']['LBL_ID_FF_SELECT'],'name' => "id-ff-select",'ext' => ".png",'other_attributes' => ''), $this);?>
</button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['bc_survey_bc_survey_template_name_advanced']['name']; ?>
"   title="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_TITLE']; ?>
" class="button lastChild" onclick="this.form.<?php echo $this->_tpl_vars['fields']['bc_survey_bc_survey_template_name_advanced']['name']; ?>
.value = ''; this.form.<?php echo $this->_tpl_vars['fields']['bc_survey_bc_survey_templatebc_survey_template_ida_advanced']['name']; ?>
.value = '';" value="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_LABEL']; ?>
"><?php echo smarty_function_sugar_getimage(array('name' => "id-ff-clear",'alt' => $this->_tpl_vars['app_strings']['LBL_ID_FF_CLEAR'],'ext' => ".png",'other_attributes' => ''), $this);?>
</button>
</span>

   	   	</td>
					<?php endif; ?>
		    
      
	
		
		<?php if ($this->_tpl_vars['fields']['start_date_advanced']['acl'] > 0): ?>
		<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0" src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='8.3333333333333%' >
		
		<label for='start_date_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_START_DATE','module' => 'bc_survey'), $this);?>
</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
<table border="0" cellpadding="0" cellspacing="0">
<tr valign="middle">
<td nowrap>
<input autocomplete="off" type="text" id="<?php echo $this->_tpl_vars['fields']['start_date_advanced']['name']; ?>
_date" value="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['fields']['start_date_advanced']['name']]['value']; ?>
" size="11" maxlength="10" title=''   onblur="combo_<?php echo $this->_tpl_vars['fields']['start_date_advanced']['name']; ?>
.update(); ">
<?php ob_start(); ?>alt="<?php echo $this->_tpl_vars['APP']['LBL_ENTER_DATE']; ?>
" style="position:relative; top:6px" border="0" id="<?php echo $this->_tpl_vars['fields']['start_date_advanced']['name']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean(); ?>
<?php echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'other_attributes' => ($this->_tpl_vars['other_attributes'])), $this);?>
&nbsp;
</td>
<td nowrap>
<div id="<?php echo $this->_tpl_vars['fields']['start_date_advanced']['name']; ?>
_time_section"></div>
</td>
</tr>
</table>
<input type="hidden" id="<?php echo $this->_tpl_vars['fields']['start_date_advanced']['name']; ?>
" name="<?php echo $this->_tpl_vars['fields']['start_date_advanced']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['fields']['start_date_advanced']['name']]['value']; ?>
">
<script type="text/javascript" src="<?php echo smarty_function_sugar_getjspath(array('file' => 'include/SugarFields/Fields/Datetimecombo/Datetimecombo.js'), $this);?>
"></script>
<script type="text/javascript">
var combo_<?php echo $this->_tpl_vars['fields']['start_date_advanced']['name']; ?>
 = new Datetimecombo("<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['fields']['start_date_advanced']['name']]['value']; ?>
", "<?php echo $this->_tpl_vars['fields']['start_date_advanced']['name']; ?>
", "<?php echo $this->_tpl_vars['TIME_FORMAT']; ?>
", "", '', '<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['fields']['start_date_advanced']['name_flag']]['value']; ?>
', true);
//Render the remaining widget fields
text = combo_<?php echo $this->_tpl_vars['fields']['start_date_advanced']['name']; ?>
.html('');
document.getElementById('<?php echo $this->_tpl_vars['fields']['start_date_advanced']['name']; ?>
_time_section').innerHTML = text;

//Call eval on the update function to handle updates to calendar picker object
eval(combo_<?php echo $this->_tpl_vars['fields']['start_date_advanced']['name']; ?>
.jsscript(''));
</script>

<script type="text/javascript">
function update_<?php echo $this->_tpl_vars['fields']['start_date_advanced']['name']; ?>
_available() {
      YAHOO.util.Event.onAvailable("<?php echo $this->_tpl_vars['fields']['start_date_advanced']['name']; ?>
_date", this.handleOnAvailable, this);
}

update_<?php echo $this->_tpl_vars['fields']['start_date_advanced']['name']; ?>
_available.prototype.handleOnAvailable = function(me) {
	Calendar.setup ({
	onClose : update_<?php echo $this->_tpl_vars['fields']['start_date_advanced']['name']; ?>
,
	inputField : "<?php echo $this->_tpl_vars['fields']['start_date_advanced']['name']; ?>
_date",
	ifFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
	daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
	button : "<?php echo $this->_tpl_vars['fields']['start_date_advanced']['name']; ?>
_trigger",
	singleClick : true,
	step : 1,
        startWeekday: <?php echo ((is_array($_tmp=@$this->_tpl_vars['CALENDAR_FDOW'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
,
	weekNumbers:false
	});

	//Call update for first time to round hours and minute values
	combo_<?php echo $this->_tpl_vars['fields']['start_date_advanced']['name']; ?>
.update(false);
}

var obj_<?php echo $this->_tpl_vars['fields']['start_date_advanced']['name']; ?>
 = new update_<?php echo $this->_tpl_vars['fields']['start_date_advanced']['name']; ?>
_available();
</script>
   	   	</td>
					<?php endif; ?>
		    
      
	
		
		<?php if ($this->_tpl_vars['fields']['end_date_advanced']['acl'] > 0): ?>
		<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0" src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='8.3333333333333%' >
		
		<label for='end_date_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_END_DATE','module' => 'bc_survey'), $this);?>
</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
<table border="0" cellpadding="0" cellspacing="0">
<tr valign="middle">
<td nowrap>
<input autocomplete="off" type="text" id="<?php echo $this->_tpl_vars['fields']['end_date_advanced']['name']; ?>
_date" value="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['fields']['end_date_advanced']['name']]['value']; ?>
" size="11" maxlength="10" title=''   onblur="combo_<?php echo $this->_tpl_vars['fields']['end_date_advanced']['name']; ?>
.update(); ">
<?php ob_start(); ?>alt="<?php echo $this->_tpl_vars['APP']['LBL_ENTER_DATE']; ?>
" style="position:relative; top:6px" border="0" id="<?php echo $this->_tpl_vars['fields']['end_date_advanced']['name']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean(); ?>
<?php echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'other_attributes' => ($this->_tpl_vars['other_attributes'])), $this);?>
&nbsp;
</td>
<td nowrap>
<div id="<?php echo $this->_tpl_vars['fields']['end_date_advanced']['name']; ?>
_time_section"></div>
</td>
</tr>
</table>
<input type="hidden" id="<?php echo $this->_tpl_vars['fields']['end_date_advanced']['name']; ?>
" name="<?php echo $this->_tpl_vars['fields']['end_date_advanced']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['fields']['end_date_advanced']['name']]['value']; ?>
">
<script type="text/javascript" src="<?php echo smarty_function_sugar_getjspath(array('file' => 'include/SugarFields/Fields/Datetimecombo/Datetimecombo.js'), $this);?>
"></script>
<script type="text/javascript">
var combo_<?php echo $this->_tpl_vars['fields']['end_date_advanced']['name']; ?>
 = new Datetimecombo("<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['fields']['end_date_advanced']['name']]['value']; ?>
", "<?php echo $this->_tpl_vars['fields']['end_date_advanced']['name']; ?>
", "<?php echo $this->_tpl_vars['TIME_FORMAT']; ?>
", "", '', '<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['fields']['end_date_advanced']['name_flag']]['value']; ?>
', true);
//Render the remaining widget fields
text = combo_<?php echo $this->_tpl_vars['fields']['end_date_advanced']['name']; ?>
.html('');
document.getElementById('<?php echo $this->_tpl_vars['fields']['end_date_advanced']['name']; ?>
_time_section').innerHTML = text;

//Call eval on the update function to handle updates to calendar picker object
eval(combo_<?php echo $this->_tpl_vars['fields']['end_date_advanced']['name']; ?>
.jsscript(''));
</script>

<script type="text/javascript">
function update_<?php echo $this->_tpl_vars['fields']['end_date_advanced']['name']; ?>
_available() {
      YAHOO.util.Event.onAvailable("<?php echo $this->_tpl_vars['fields']['end_date_advanced']['name']; ?>
_date", this.handleOnAvailable, this);
}

update_<?php echo $this->_tpl_vars['fields']['end_date_advanced']['name']; ?>
_available.prototype.handleOnAvailable = function(me) {
	Calendar.setup ({
	onClose : update_<?php echo $this->_tpl_vars['fields']['end_date_advanced']['name']; ?>
,
	inputField : "<?php echo $this->_tpl_vars['fields']['end_date_advanced']['name']; ?>
_date",
	ifFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
	daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
	button : "<?php echo $this->_tpl_vars['fields']['end_date_advanced']['name']; ?>
_trigger",
	singleClick : true,
	step : 1,
        startWeekday: <?php echo ((is_array($_tmp=@$this->_tpl_vars['CALENDAR_FDOW'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
,
	weekNumbers:false
	});

	//Call update for first time to round hours and minute values
	combo_<?php echo $this->_tpl_vars['fields']['end_date_advanced']['name']; ?>
.update(false);
}

var obj_<?php echo $this->_tpl_vars['fields']['end_date_advanced']['name']; ?>
 = new update_<?php echo $this->_tpl_vars['fields']['end_date_advanced']['name']; ?>
_available();
</script>
   	   	</td>
					<?php endif; ?>
		    
      
	
		
		<?php if ($this->_tpl_vars['fields']['assigned_user_id_advanced']['acl'] > 0): ?>
		<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0" src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='8.3333333333333%' >
		
		<label for='assigned_user_id_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'bc_survey'), $this);?>
</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
<?php echo smarty_function_html_options(array('id' => 'assigned_user_id_advanced','name' => 'assigned_user_id_advanced[]','options' => $this->_tpl_vars['fields']['assigned_user_id_advanced']['options'],'size' => '6','style' => "width: 150px",'multiple' => '1','selected' => $this->_tpl_vars['fields']['assigned_user_id_advanced']['value']), $this);?>

   	   	</td>
					<?php endif; ?>
			</tr>
<tr>
	<td colspan='20'>
		&nbsp;
	</td>
</tr>	
<?php if ($this->_tpl_vars['DISPLAY_SAVED_SEARCH']): ?>
<tr>
	<td colspan='2'>
		<a class='tabFormAdvLink' onhover href='javascript:toggleInlineSearch()'>
            <?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ALT_SHOW_OPTIONS'), $this); $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('alt_show_hide', ob_get_contents());ob_end_clean(); ?>
		<?php echo smarty_function_sugar_getimage(array('alt' => $this->_tpl_vars['alt_show_hide'],'name' => 'advanced_search','ext' => ".gif",'other_attributes' => 'border="0" id="up_down_img" '), $this);?>
&nbsp;<?php echo $this->_tpl_vars['APP']['LNK_SAVED_VIEWS']; ?>

		</a><br>
		<input type='hidden' id='showSSDIV' name='showSSDIV' value='<?php echo $this->_tpl_vars['SHOWSSDIV']; ?>
'><p>
	</td>
	<td scope='row' width='10%' nowrap="nowrap">
		<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SAVE_SEARCH_AS','module' => 'SavedSearch'), $this);?>
:
	</td>
	<td width='30%' nowrap>
		<input type='text' name='saved_search_name'>
		<input type='hidden' name='search_module' value=''>
		<input type='hidden' name='saved_search_action' value=''>
		<input title='<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
' value='<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
' class='button' type='button' name='saved_search_submit' onclick='SUGAR.savedViews.setChooser(); return SUGAR.savedViews.saved_search_action("save");'>
	</td>
	<td scope='row' width='10%' nowrap="nowrap">
	    <?php echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFY_CURRENT_SEARCH','module' => 'SavedSearch'), $this);?>
:
	</td>
	<td width='30%' nowrap>
        <input class='button' onclick='SUGAR.savedViews.setChooser(); return SUGAR.savedViews.saved_search_action("update")' value='<?php echo $this->_tpl_vars['APP']['LBL_UPDATE']; ?>
' title='<?php echo $this->_tpl_vars['APP']['LBL_UPDATE']; ?>
' name='ss_update' id='ss_update' type='button' >
		<input class='button' onclick='return SUGAR.savedViews.saved_search_action("delete", "<?php echo smarty_function_sugar_translate(array('label' => 'LBL_DELETE_CONFIRM','module' => 'SavedSearch'), $this);?>
")' value='<?php echo $this->_tpl_vars['APP']['LBL_DELETE']; ?>
' title='<?php echo $this->_tpl_vars['APP']['LBL_DELETE']; ?>
' name='ss_delete' id='ss_delete' type='button'>
		<br><span id='curr_search_name'></span>
	</td>
</tr>

<tr>
<td colspan='6'>
<div style='<?php echo $this->_tpl_vars['DISPLAYSS']; ?>
' id='inlineSavedSearch' >
	<?php echo $this->_tpl_vars['SAVED_SEARCH']; ?>

</div>
</td>
</tr>

<?php endif; ?>
<?php if ($this->_tpl_vars['displayType'] != 'popupView'): ?>
<tr>
	<td colspan='5'>
        <input tabindex='2' title='<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_BUTTON_TITLE']; ?>
' onclick='SUGAR.savedViews.setChooser()' class='button' type='submit' name='button' value='<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_BUTTON_LABEL']; ?>
' id='search_form_submit_advanced'/>&nbsp;
        <input tabindex='2' title='<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_TITLE']; ?>
'  onclick='SUGAR.searchForm.clear_form(this.form); document.getElementById("saved_search_select").options[0].selected=true; return false;' class='button' type='button' name='clear' id='search_form_clear_advanced' value='<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_LABEL']; ?>
'/>
        <?php if ($this->_tpl_vars['DOCUMENTS_MODULE']): ?>
        &nbsp;<input title="<?php echo $this->_tpl_vars['APP']['LBL_BROWSE_DOCUMENTS_BUTTON_TITLE']; ?>
" type="button" class="button" value="<?php echo $this->_tpl_vars['APP']['LBL_BROWSE_DOCUMENTS_BUTTON_LABEL']; ?>
" onclick='open_popup("Documents", 600, 400, "&caller=Documents", true, false, "");' />
        <?php endif; ?>
        <a id="basic_search_link" onclick="SUGAR.searchForm.searchFormSelect('<?php echo $this->_tpl_vars['module']; ?>
|basic_search','<?php echo $this->_tpl_vars['module']; ?>
|advanced_search')" href="javascript:void(0)" accesskey="<?php echo $this->_tpl_vars['APP']['LBL_ADV_SEARCH_LNK_KEY']; ?>
" ><?php echo $this->_tpl_vars['APP']['LNK_BASIC_SEARCH']; ?>
</a>
        <span class='white-space'>
            &nbsp;&nbsp;&nbsp;<?php if ($this->_tpl_vars['SAVED_SEARCHES_OPTIONS']): ?>|&nbsp;&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['APP']['LBL_SAVED_SEARCH_SHORTCUT']; ?>
</b>&nbsp;
            <?php echo $this->_tpl_vars['SAVED_SEARCHES_OPTIONS']; ?>
 <?php endif; ?>
            <span id='go_btn_span' style='display:none'><input tabindex='2' title='go_select' id='go_select'  onclick='SUGAR.searchForm.clear_form(this.form);' class='button' type='button' name='go_select' value=' <?php echo $this->_tpl_vars['APP']['LBL_GO_BUTTON_LABEL']; ?>
 '/></span>	
        </span>
	</td>
	<td class="help">
	    <?php if ($this->_tpl_vars['DISPLAY_SEARCH_HELP']): ?>
	    <img  border='0' src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
	    <?php endif; ?>
    </td>
</tr>
<?php endif; ?>
</table>

<script>
<?php echo '
	if(typeof(loadSSL_Scripts)==\'function\'){
		loadSSL_Scripts();
	}
'; ?>
	
</script><?php echo '<script language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'search_form_modified_by_name_advanced\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["modified_by_name_advanced","modified_user_id_advanced"],"required_list":["modified_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_created_by_name_advanced\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["created_by_name_advanced","created_by_advanced"],"required_list":["created_by"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_assigned_user_name_advanced\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name_advanced","assigned_user_id_advanced"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_bc_survey_bc_survey_template_name_advanced\']={"form":"search_form","method":"query","modules":["bc_survey_template"],"group":"or","field_list":["name","id"],"populate_list":["bc_survey_bc_survey_template_name_advanced","bc_survey_bc_survey_templatebc_survey_template_ida_advanced"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};</script>'; ?>