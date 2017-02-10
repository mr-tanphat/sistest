<?php /* Smarty version 2.6.11, created on 2017-02-07 13:44:04
         compiled from cache/modules/J_Payment/SearchForm_advanced.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'cache/modules/J_Payment/SearchForm_advanced.tpl', 28, false),array('function', 'math', 'cache/modules/J_Payment/SearchForm_advanced.tpl', 29, false),array('function', 'sugar_getimagepath', 'cache/modules/J_Payment/SearchForm_advanced.tpl', 37, false),array('function', 'sugar_translate', 'cache/modules/J_Payment/SearchForm_advanced.tpl', 46, false),array('function', 'sugar_getimage', 'cache/modules/J_Payment/SearchForm_advanced.tpl', 92, false),array('function', 'html_options', 'cache/modules/J_Payment/SearchForm_advanced.tpl', 125, false),array('function', 'sugarvar_teamset', 'cache/modules/J_Payment/SearchForm_advanced.tpl', 992, false),array('modifier', 'default', 'cache/modules/J_Payment/SearchForm_advanced.tpl', 181, false),array('modifier', 'escape', 'cache/modules/J_Payment/SearchForm_advanced.tpl', 194, false),)), $this); ?>

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
			<label for='name_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'J_Payment'), $this);?>
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
		    
      
	
		
		<?php if ($this->_tpl_vars['fields']['contacts_j_payment_1_name_advanced']['acl'] > 0): ?>
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
		
		<label for='contacts_j_payment_1_name_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_CONTACTS_J_PAYMENT_1_FROM_CONTACTS_TITLE','module' => 'J_Payment'), $this);?>
</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
<input type="text" name="<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name_advanced']['name']; ?>
"  class="sqsEnabled"   id="<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name_advanced']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name_advanced']['value']; ?>
" title='' autocomplete="off"  >
<input type="hidden"  id="<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1contacts_ida_advanced']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1contacts_ida_advanced']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name_advanced']['name']; ?>
"   title="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_TITLE']; ?>
" class="button firstChild" value="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_LABEL']; ?>
" onclick='open_popup("<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name_advanced']['module']; ?>
", 600, 400, "", true, false, <?php echo '{"call_back_function":"set_return","form_name":"search_form","field_to_name_array":{"id":"contacts_j_payment_1contacts_ida_advanced","name":"contacts_j_payment_1_name_advanced"}}'; ?>
, "single", true);'><?php echo smarty_function_sugar_getimage(array('alt' => $this->_tpl_vars['app_strings']['LBL_ID_FF_SELECT'],'name' => "id-ff-select",'ext' => ".png",'other_attributes' => ''), $this);?>
</button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name_advanced']['name']; ?>
"   title="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_TITLE']; ?>
" class="button lastChild" onclick="this.form.<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1_name_advanced']['name']; ?>
.value = ''; this.form.<?php echo $this->_tpl_vars['fields']['contacts_j_payment_1contacts_ida_advanced']['name']; ?>
.value = '';" value="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_LABEL']; ?>
"><?php echo smarty_function_sugar_getimage(array('name' => "id-ff-clear",'alt' => $this->_tpl_vars['app_strings']['LBL_ID_FF_CLEAR'],'ext' => ".png",'other_attributes' => ''), $this);?>
</button>
</span>

   	   	</td>
					<?php endif; ?>
		    
      
	
		
		<?php if ($this->_tpl_vars['fields']['payment_type_advanced']['acl'] > 0): ?>
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
		
		<label for='payment_type_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_PAYMENT_TYPE','module' => 'J_Payment'), $this);?>
</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
<?php echo smarty_function_html_options(array('id' => 'payment_type_advanced','name' => 'payment_type_advanced[]','options' => $this->_tpl_vars['fields']['payment_type_advanced']['options'],'size' => '6','style' => "width: 150px",'multiple' => '1','selected' => $this->_tpl_vars['fields']['payment_type_advanced']['value']), $this);?>

   	   	</td>
					<?php endif; ?>
		    
      
	
		
		<?php if ($this->_tpl_vars['fields']['payment_date_advanced']['acl'] > 0): ?>
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
		
		<label for='payment_date_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_PAYMENT_DATE','module' => 'J_Payment'), $this);?>
</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
<?php $this->assign('id', $this->_tpl_vars['fields']['payment_date_advanced']['name']); ?>

<?php if (isset ( $_REQUEST['payment_date_advanced_range_choice'] )): ?>
<?php $this->assign('starting_choice', $_REQUEST['payment_date_advanced_range_choice']); ?>
<?php else: ?>
<?php $this->assign('starting_choice', "="); ?>
<?php endif; ?>

<div style="white-space:nowrap !important;">
<select id="<?php echo $this->_tpl_vars['id']; ?>
_range_choice" name="<?php echo $this->_tpl_vars['id']; ?>
_range_choice" style="width:125px !important;" onchange="<?php echo $this->_tpl_vars['id']; ?>
_range_change(this.value);">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['payment_date_advanced']['options'],'selected' => $this->_tpl_vars['starting_choice']), $this);?>

</select>
</div>

<div id="<?php echo $this->_tpl_vars['id']; ?>
_range_div" style="<?php if (preg_match ( '/^\[/' , $_REQUEST['range_payment_date_advanced'] ) || $this->_tpl_vars['starting_choice'] == 'between'): ?>display:none<?php else: ?>display:''<?php endif; ?>;">
<input autocomplete="off" type="text" name="range_<?php echo $this->_tpl_vars['id']; ?>
" id="range_<?php echo $this->_tpl_vars['id']; ?>
" value='<?php if (empty ( $_REQUEST['range_payment_date_advanced'] ) && ! empty ( $_REQUEST['payment_date_advanced'] )):  echo $_REQUEST['payment_date_advanced'];  else:  echo $_REQUEST['range_payment_date_advanced'];  endif; ?>' title='Payment Date'   size="11" style="width:100px !important;">
<?php ob_start(); ?>alt="<?php echo $this->_tpl_vars['APP']['LBL_ENTER_DATE']; ?>
" style="position:relative; top:6px" border="0" id="<?php echo $this->_tpl_vars['id']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean(); ?>
<?php echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'other_attributes' => ($this->_tpl_vars['other_attributes'])), $this);?>

<script type="text/javascript">
Calendar.setup ({
inputField : "range_<?php echo $this->_tpl_vars['id']; ?>
",
daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
button : "<?php echo $this->_tpl_vars['id']; ?>
_trigger",
singleClick : true,
dateStr : "<?php echo $this->_tpl_vars['date_value']; ?>
",
startWeekday: <?php echo ((is_array($_tmp=@$this->_tpl_vars['CALENDAR_FDOW'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
,
step : 1,
weekNumbers:false
}
);
</script>
    
</div>

<div id="<?php echo $this->_tpl_vars['id']; ?>
_between_range_div" style="<?php if ($this->_tpl_vars['starting_choice'] == 'between'): ?>display:'';<?php else: ?>display:none;<?php endif; ?>">
<?php $this->assign('date_value', $this->_tpl_vars['fields']['payment_date_advanced']['value']); ?>
<input autocomplete="off" type="text" name="start_range_<?php echo $this->_tpl_vars['id']; ?>
" id="start_range_<?php echo $this->_tpl_vars['id']; ?>
" value='<?php echo $_REQUEST['start_range_payment_date_advanced']; ?>
' title='Payment Date'  tabindex='' size="11" style="width:100px !important;">
<?php ob_start(); ?>align="absmiddle" border="0" id="start_range_<?php echo $this->_tpl_vars['id']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean(); ?>
<?php echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'alt' => ((is_array($_tmp=$this->_tpl_vars['APP']['LBL_ENTER_DATE'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')),'other_attributes' => $this->_tpl_vars['other_attributes']), $this);?>

<script type="text/javascript">
Calendar.setup ({
inputField : "start_range_<?php echo $this->_tpl_vars['id']; ?>
",
daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
button : "start_range_<?php echo $this->_tpl_vars['id']; ?>
_trigger",
singleClick : true,
dateStr : "<?php echo $this->_tpl_vars['date_value']; ?>
",
step : 1,
weekNumbers:false
}
);
</script>
 
<?php echo $this->_tpl_vars['APP']['LBL_AND']; ?>

<?php $this->assign('date_value', $this->_tpl_vars['fields']['payment_date_advanced']['value']); ?>
<input autocomplete="off" type="text" name="end_range_<?php echo $this->_tpl_vars['id']; ?>
" id="end_range_<?php echo $this->_tpl_vars['id']; ?>
" value='<?php echo $_REQUEST['end_range_payment_date_advanced']; ?>
' title='Payment Date'  tabindex='' size="11" style="width:100px !important;" maxlength="10">
<?php ob_start(); ?>align="absmiddle" border="0" id="end_range_<?php echo $this->_tpl_vars['id']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean(); ?>
<?php echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'alt' => ((is_array($_tmp=$this->_tpl_vars['APP']['LBL_ENTER_DATE'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')),'other_attributes' => $this->_tpl_vars['other_attributes']), $this);?>

<script type="text/javascript">
Calendar.setup ({
inputField : "end_range_<?php echo $this->_tpl_vars['id']; ?>
",
daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
button : "end_range_<?php echo $this->_tpl_vars['id']; ?>
_trigger",
singleClick : true,
dateStr : "<?php echo $this->_tpl_vars['date_value']; ?>
",
step : 1,
weekNumbers:false
}
);
</script>
 
</div>


<script type='text/javascript'>

function <?php echo $this->_tpl_vars['id']; ?>
_range_change(val) 
{
  if(val == 'between') {
     document.getElementById("range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';  
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_range_div").style.display = 'none';
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_between_range_div").style.display = ''; 
  } else if (val == '=' || val == 'not_equal' || val == 'greater_than' || val == 'less_than') {
     if((/^\[.*\]$/).test(document.getElementById("range_<?php echo $this->_tpl_vars['id']; ?>
").value))
     {
     	document.getElementById("range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
     }
     document.getElementById("start_range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
     document.getElementById("end_range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_range_div").style.display = '';
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_between_range_div").style.display = 'none';
  } else {
     if (val != '') {
        val = '[' + val + ']';
     }
     document.getElementById("range_<?php echo $this->_tpl_vars['id']; ?>
").value = val;
     document.getElementById("start_range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
     document.getElementById("end_range_<?php echo $this->_tpl_vars['id']; ?>
").value = ''; 
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_range_div").style.display = 'none';
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_between_range_div").style.display = 'none';         
  }
}

var <?php echo $this->_tpl_vars['id']; ?>
_range_reset = function()
{
<?php echo $this->_tpl_vars['id']; ?>
_range_change('=');
}

YAHOO.util.Event.onDOMReady(function() {
if(document.getElementById('search_form_clear'))
{
YAHOO.util.Event.addListener('search_form_clear', 'click', <?php echo $this->_tpl_vars['id']; ?>
_range_reset);
}

});

YAHOO.util.Event.onDOMReady(function() {
 	if(document.getElementById('search_form_clear_advanced'))
 	 {
 	     YAHOO.util.Event.addListener('search_form_clear_advanced', 'click', <?php echo $this->_tpl_vars['id']; ?>
_range_reset);
 	 }

});

</script>
   	   	</td>
					<?php endif; ?>
		    
      
	
		
		<?php if ($this->_tpl_vars['fields']['date_entered_advanced']['acl'] > 0): ?>
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
		
		<label for='date_entered_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_ENTERED','module' => 'J_Payment'), $this);?>
</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
<?php $this->assign('id', $this->_tpl_vars['fields']['date_entered_advanced']['name']); ?>

<?php if (isset ( $_REQUEST['date_entered_advanced_range_choice'] )): ?>
<?php $this->assign('starting_choice', $_REQUEST['date_entered_advanced_range_choice']); ?>
<?php else: ?>
<?php $this->assign('starting_choice', "="); ?>
<?php endif; ?>

<div style="white-space:nowrap !important;">
<select id="<?php echo $this->_tpl_vars['id']; ?>
_range_choice" name="<?php echo $this->_tpl_vars['id']; ?>
_range_choice" style="width:125px !important;" onchange="<?php echo $this->_tpl_vars['id']; ?>
_range_change(this.value);">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['date_entered_advanced']['options'],'selected' => $this->_tpl_vars['starting_choice']), $this);?>

</select>
</div>

<div id="<?php echo $this->_tpl_vars['id']; ?>
_range_div" style="<?php if (preg_match ( '/^\[/' , $_REQUEST['range_date_entered_advanced'] ) || $this->_tpl_vars['starting_choice'] == 'between'): ?>display:none<?php else: ?>display:''<?php endif; ?>;">
<input autocomplete="off" type="text" name="range_<?php echo $this->_tpl_vars['id']; ?>
" id="range_<?php echo $this->_tpl_vars['id']; ?>
" value='<?php if (empty ( $_REQUEST['range_date_entered_advanced'] ) && ! empty ( $_REQUEST['date_entered_advanced'] )):  echo $_REQUEST['date_entered_advanced'];  else:  echo $_REQUEST['range_date_entered_advanced'];  endif; ?>' title=''   size="11" style="width:100px !important;">
<?php ob_start(); ?>alt="<?php echo $this->_tpl_vars['APP']['LBL_ENTER_DATE']; ?>
" style="position:relative; top:6px" border="0" id="<?php echo $this->_tpl_vars['id']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean(); ?>
<?php echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'other_attributes' => ($this->_tpl_vars['other_attributes'])), $this);?>

<script type="text/javascript">
Calendar.setup ({
inputField : "range_<?php echo $this->_tpl_vars['id']; ?>
",
daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
button : "<?php echo $this->_tpl_vars['id']; ?>
_trigger",
singleClick : true,
dateStr : "<?php echo $this->_tpl_vars['date_value']; ?>
",
startWeekday: <?php echo ((is_array($_tmp=@$this->_tpl_vars['CALENDAR_FDOW'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
,
step : 1,
weekNumbers:false
}
);
</script>
    
</div>

<div id="<?php echo $this->_tpl_vars['id']; ?>
_between_range_div" style="<?php if ($this->_tpl_vars['starting_choice'] == 'between'): ?>display:'';<?php else: ?>display:none;<?php endif; ?>">
<?php $this->assign('date_value', $this->_tpl_vars['fields']['date_entered_advanced']['value']); ?>
<input autocomplete="off" type="text" name="start_range_<?php echo $this->_tpl_vars['id']; ?>
" id="start_range_<?php echo $this->_tpl_vars['id']; ?>
" value='<?php echo $_REQUEST['start_range_date_entered_advanced']; ?>
' title=''  tabindex='' size="11" style="width:100px !important;">
<?php ob_start(); ?>align="absmiddle" border="0" id="start_range_<?php echo $this->_tpl_vars['id']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean(); ?>
<?php echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'alt' => ((is_array($_tmp=$this->_tpl_vars['APP']['LBL_ENTER_DATE'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')),'other_attributes' => $this->_tpl_vars['other_attributes']), $this);?>

<script type="text/javascript">
Calendar.setup ({
inputField : "start_range_<?php echo $this->_tpl_vars['id']; ?>
",
daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
button : "start_range_<?php echo $this->_tpl_vars['id']; ?>
_trigger",
singleClick : true,
dateStr : "<?php echo $this->_tpl_vars['date_value']; ?>
",
step : 1,
weekNumbers:false
}
);
</script>
 
<?php echo $this->_tpl_vars['APP']['LBL_AND']; ?>

<?php $this->assign('date_value', $this->_tpl_vars['fields']['date_entered_advanced']['value']); ?>
<input autocomplete="off" type="text" name="end_range_<?php echo $this->_tpl_vars['id']; ?>
" id="end_range_<?php echo $this->_tpl_vars['id']; ?>
" value='<?php echo $_REQUEST['end_range_date_entered_advanced']; ?>
' title=''  tabindex='' size="11" style="width:100px !important;" maxlength="10">
<?php ob_start(); ?>align="absmiddle" border="0" id="end_range_<?php echo $this->_tpl_vars['id']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean(); ?>
<?php echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'alt' => ((is_array($_tmp=$this->_tpl_vars['APP']['LBL_ENTER_DATE'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')),'other_attributes' => $this->_tpl_vars['other_attributes']), $this);?>

<script type="text/javascript">
Calendar.setup ({
inputField : "end_range_<?php echo $this->_tpl_vars['id']; ?>
",
daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
button : "end_range_<?php echo $this->_tpl_vars['id']; ?>
_trigger",
singleClick : true,
dateStr : "<?php echo $this->_tpl_vars['date_value']; ?>
",
step : 1,
weekNumbers:false
}
);
</script>
 
</div>


<script type='text/javascript'>

function <?php echo $this->_tpl_vars['id']; ?>
_range_change(val) 
{
  if(val == 'between') {
     document.getElementById("range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';  
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_range_div").style.display = 'none';
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_between_range_div").style.display = ''; 
  } else if (val == '=' || val == 'not_equal' || val == 'greater_than' || val == 'less_than') {
     if((/^\[.*\]$/).test(document.getElementById("range_<?php echo $this->_tpl_vars['id']; ?>
").value))
     {
     	document.getElementById("range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
     }
     document.getElementById("start_range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
     document.getElementById("end_range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_range_div").style.display = '';
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_between_range_div").style.display = 'none';
  } else {
     if (val != '') {
        val = '[' + val + ']';
     }
     document.getElementById("range_<?php echo $this->_tpl_vars['id']; ?>
").value = val;
     document.getElementById("start_range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
     document.getElementById("end_range_<?php echo $this->_tpl_vars['id']; ?>
").value = ''; 
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_range_div").style.display = 'none';
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_between_range_div").style.display = 'none';         
  }
}

var <?php echo $this->_tpl_vars['id']; ?>
_range_reset = function()
{
<?php echo $this->_tpl_vars['id']; ?>
_range_change('=');
}

YAHOO.util.Event.onDOMReady(function() {
if(document.getElementById('search_form_clear'))
{
YAHOO.util.Event.addListener('search_form_clear', 'click', <?php echo $this->_tpl_vars['id']; ?>
_range_reset);
}

});

YAHOO.util.Event.onDOMReady(function() {
 	if(document.getElementById('search_form_clear_advanced'))
 	 {
 	     YAHOO.util.Event.addListener('search_form_clear_advanced', 'click', <?php echo $this->_tpl_vars['id']; ?>
_range_reset);
 	 }

});

</script>
   	   	</td>
					<?php endif; ?>
		    
      
	
		
		<?php if ($this->_tpl_vars['fields']['date_modified_advanced']['acl'] > 0): ?>
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
		
		<label for='date_modified_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_MODIFIED','module' => 'J_Payment'), $this);?>
</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
<?php $this->assign('id', $this->_tpl_vars['fields']['date_modified_advanced']['name']); ?>

<?php if (isset ( $_REQUEST['date_modified_advanced_range_choice'] )): ?>
<?php $this->assign('starting_choice', $_REQUEST['date_modified_advanced_range_choice']); ?>
<?php else: ?>
<?php $this->assign('starting_choice', "="); ?>
<?php endif; ?>

<div style="white-space:nowrap !important;">
<select id="<?php echo $this->_tpl_vars['id']; ?>
_range_choice" name="<?php echo $this->_tpl_vars['id']; ?>
_range_choice" style="width:125px !important;" onchange="<?php echo $this->_tpl_vars['id']; ?>
_range_change(this.value);">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['date_modified_advanced']['options'],'selected' => $this->_tpl_vars['starting_choice']), $this);?>

</select>
</div>

<div id="<?php echo $this->_tpl_vars['id']; ?>
_range_div" style="<?php if (preg_match ( '/^\[/' , $_REQUEST['range_date_modified_advanced'] ) || $this->_tpl_vars['starting_choice'] == 'between'): ?>display:none<?php else: ?>display:''<?php endif; ?>;">
<input autocomplete="off" type="text" name="range_<?php echo $this->_tpl_vars['id']; ?>
" id="range_<?php echo $this->_tpl_vars['id']; ?>
" value='<?php if (empty ( $_REQUEST['range_date_modified_advanced'] ) && ! empty ( $_REQUEST['date_modified_advanced'] )):  echo $_REQUEST['date_modified_advanced'];  else:  echo $_REQUEST['range_date_modified_advanced'];  endif; ?>' title=''   size="11" style="width:100px !important;">
<?php ob_start(); ?>alt="<?php echo $this->_tpl_vars['APP']['LBL_ENTER_DATE']; ?>
" style="position:relative; top:6px" border="0" id="<?php echo $this->_tpl_vars['id']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean(); ?>
<?php echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'other_attributes' => ($this->_tpl_vars['other_attributes'])), $this);?>

<script type="text/javascript">
Calendar.setup ({
inputField : "range_<?php echo $this->_tpl_vars['id']; ?>
",
daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
button : "<?php echo $this->_tpl_vars['id']; ?>
_trigger",
singleClick : true,
dateStr : "<?php echo $this->_tpl_vars['date_value']; ?>
",
startWeekday: <?php echo ((is_array($_tmp=@$this->_tpl_vars['CALENDAR_FDOW'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
,
step : 1,
weekNumbers:false
}
);
</script>
    
</div>

<div id="<?php echo $this->_tpl_vars['id']; ?>
_between_range_div" style="<?php if ($this->_tpl_vars['starting_choice'] == 'between'): ?>display:'';<?php else: ?>display:none;<?php endif; ?>">
<?php $this->assign('date_value', $this->_tpl_vars['fields']['date_modified_advanced']['value']); ?>
<input autocomplete="off" type="text" name="start_range_<?php echo $this->_tpl_vars['id']; ?>
" id="start_range_<?php echo $this->_tpl_vars['id']; ?>
" value='<?php echo $_REQUEST['start_range_date_modified_advanced']; ?>
' title=''  tabindex='' size="11" style="width:100px !important;">
<?php ob_start(); ?>align="absmiddle" border="0" id="start_range_<?php echo $this->_tpl_vars['id']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean(); ?>
<?php echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'alt' => ((is_array($_tmp=$this->_tpl_vars['APP']['LBL_ENTER_DATE'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')),'other_attributes' => $this->_tpl_vars['other_attributes']), $this);?>

<script type="text/javascript">
Calendar.setup ({
inputField : "start_range_<?php echo $this->_tpl_vars['id']; ?>
",
daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
button : "start_range_<?php echo $this->_tpl_vars['id']; ?>
_trigger",
singleClick : true,
dateStr : "<?php echo $this->_tpl_vars['date_value']; ?>
",
step : 1,
weekNumbers:false
}
);
</script>
 
<?php echo $this->_tpl_vars['APP']['LBL_AND']; ?>

<?php $this->assign('date_value', $this->_tpl_vars['fields']['date_modified_advanced']['value']); ?>
<input autocomplete="off" type="text" name="end_range_<?php echo $this->_tpl_vars['id']; ?>
" id="end_range_<?php echo $this->_tpl_vars['id']; ?>
" value='<?php echo $_REQUEST['end_range_date_modified_advanced']; ?>
' title=''  tabindex='' size="11" style="width:100px !important;" maxlength="10">
<?php ob_start(); ?>align="absmiddle" border="0" id="end_range_<?php echo $this->_tpl_vars['id']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean(); ?>
<?php echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'alt' => ((is_array($_tmp=$this->_tpl_vars['APP']['LBL_ENTER_DATE'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')),'other_attributes' => $this->_tpl_vars['other_attributes']), $this);?>

<script type="text/javascript">
Calendar.setup ({
inputField : "end_range_<?php echo $this->_tpl_vars['id']; ?>
",
daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
button : "end_range_<?php echo $this->_tpl_vars['id']; ?>
_trigger",
singleClick : true,
dateStr : "<?php echo $this->_tpl_vars['date_value']; ?>
",
step : 1,
weekNumbers:false
}
);
</script>
 
</div>


<script type='text/javascript'>

function <?php echo $this->_tpl_vars['id']; ?>
_range_change(val) 
{
  if(val == 'between') {
     document.getElementById("range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';  
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_range_div").style.display = 'none';
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_between_range_div").style.display = ''; 
  } else if (val == '=' || val == 'not_equal' || val == 'greater_than' || val == 'less_than') {
     if((/^\[.*\]$/).test(document.getElementById("range_<?php echo $this->_tpl_vars['id']; ?>
").value))
     {
     	document.getElementById("range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
     }
     document.getElementById("start_range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
     document.getElementById("end_range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_range_div").style.display = '';
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_between_range_div").style.display = 'none';
  } else {
     if (val != '') {
        val = '[' + val + ']';
     }
     document.getElementById("range_<?php echo $this->_tpl_vars['id']; ?>
").value = val;
     document.getElementById("start_range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
     document.getElementById("end_range_<?php echo $this->_tpl_vars['id']; ?>
").value = ''; 
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_range_div").style.display = 'none';
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_between_range_div").style.display = 'none';         
  }
}

var <?php echo $this->_tpl_vars['id']; ?>
_range_reset = function()
{
<?php echo $this->_tpl_vars['id']; ?>
_range_change('=');
}

YAHOO.util.Event.onDOMReady(function() {
if(document.getElementById('search_form_clear'))
{
YAHOO.util.Event.addListener('search_form_clear', 'click', <?php echo $this->_tpl_vars['id']; ?>
_range_reset);
}

});

YAHOO.util.Event.onDOMReady(function() {
 	if(document.getElementById('search_form_clear_advanced'))
 	 {
 	     YAHOO.util.Event.addListener('search_form_clear_advanced', 'click', <?php echo $this->_tpl_vars['id']; ?>
_range_reset);
 	 }

});

</script>
   	   	</td>
					<?php endif; ?>
		    
      
	
		
		<?php if ($this->_tpl_vars['fields']['sale_type_advanced']['acl'] > 0): ?>
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
		
		<label for='sale_type_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_SALE_TYPE','module' => 'J_Payment'), $this);?>
</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
<?php echo smarty_function_html_options(array('id' => 'sale_type_advanced','name' => 'sale_type_advanced[]','options' => $this->_tpl_vars['fields']['sale_type_advanced']['options'],'size' => '6','style' => "width: 150px",'multiple' => '1','selected' => $this->_tpl_vars['fields']['sale_type_advanced']['value']), $this);?>

   	   	</td>
					<?php endif; ?>
		    
      
	
		
		<?php if ($this->_tpl_vars['fields']['payment_amount_advanced']['acl'] > 0): ?>
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
		
		<label for='payment_amount_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_PAYMENT_AMOUNT','module' => 'J_Payment'), $this);?>
</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
<?php if (strlen ( $this->_tpl_vars['fields']['payment_amount_advanced']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['payment_amount_advanced']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['payment_amount_advanced']['value']); ?>
<?php endif; ?>

<?php $this->assign('id', $this->_tpl_vars['fields']['payment_amount_advanced']['name']); ?>

<?php if (isset ( $_REQUEST['payment_amount_advanced_range_choice'] )): ?>
<?php $this->assign('starting_choice', $_REQUEST['payment_amount_advanced_range_choice']); ?>
<?php else: ?>
<?php $this->assign('starting_choice', "="); ?>
<?php endif; ?>

<script type='text/javascript'>
function <?php echo $this->_tpl_vars['id']; ?>
_range_change(val) 
{
  calculate_between = (val == 'between');

  //Clear the values depending on the operation
  if(calculate_between) {
     document.getElementById("range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';   
  } else {
     document.getElementById("start_range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
     document.getElementById("end_range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
  }
 
  document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_range_div").style.display = calculate_between ? 'none' : '';
  document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_between_range_div").style.display = calculate_between ? '' : 'none';
}

var <?php echo $this->_tpl_vars['id']; ?>
_range_reset = function()
{
<?php echo $this->_tpl_vars['id']; ?>
_range_change('=');
}

YAHOO.util.Event.onDOMReady(function() {
if(document.getElementById('search_form_clear'))
{
YAHOO.util.Event.addListener('search_form_clear', 'click', <?php echo $this->_tpl_vars['id']; ?>
_range_reset);
}

});

YAHOO.util.Event.onDOMReady(function() {
 	 if(document.getElementById('search_form_clear_advanced'))
 	 {
 	     YAHOO.util.Event.addListener('search_form_clear_advanced', 'click', <?php echo $this->_tpl_vars['id']; ?>
_range_reset);
 	 }
});

</script>

<span style="white-space:nowrap !important;">
<select id="<?php echo $this->_tpl_vars['id']; ?>
_range_choice" name="<?php echo $this->_tpl_vars['id']; ?>
_range_choice" style="width:190px !important;" onchange="<?php echo $this->_tpl_vars['id']; ?>
_range_change(this.value);">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['payment_amount_advanced']['options'],'selected' => $this->_tpl_vars['starting_choice']), $this);?>

</select>
<div id="<?php echo $this->_tpl_vars['id']; ?>
_range_div" style="<?php if ($this->_tpl_vars['starting_choice'] == 'between'): ?>display:none;<?php else: ?>display:'';<?php endif; ?>">
<input type='text' name='range_<?php echo $this->_tpl_vars['id']; ?>
' id='range_<?php echo $this->_tpl_vars['id']; ?>
' style='width:75px !important;' size='20' 
     
    value='<?php if (empty ( $_REQUEST['range_payment_amount_advanced'] ) && ! empty ( $_REQUEST['payment_amount_advanced'] )):  echo $_REQUEST['payment_amount_advanced'];  else:  echo $_REQUEST['range_payment_amount_advanced'];  endif; ?>' tabindex='' >
</div>
<div id="<?php echo $this->_tpl_vars['id']; ?>
_between_range_div" style="<?php if ($this->_tpl_vars['starting_choice'] == 'between'): ?>display:'';<?php else: ?>display:none;<?php endif; ?>">
<input type='text' name='start_range_<?php echo $this->_tpl_vars['id']; ?>
' 
    id='start_range_<?php echo $this->_tpl_vars['id']; ?>
' style='width:75px !important;' size='10' 
     
    value='<?php echo $_REQUEST['start_range_payment_amount_advanced']; ?>
' tabindex=''>
<?php echo $this->_tpl_vars['APP']['LBL_AND']; ?>

<input type='text' name='end_range_<?php echo $this->_tpl_vars['id']; ?>
' 
    id='end_range_<?php echo $this->_tpl_vars['id']; ?>
' style='width:75px !important;' size='10' 
     
    value='<?php echo $_REQUEST['end_range_payment_amount_advanced']; ?>
' tabindex=''>    
</div> 
</span>
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
		
		<label for='assigned_user_id_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'J_Payment'), $this);?>
</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
<?php echo smarty_function_html_options(array('id' => 'assigned_user_id_advanced','name' => 'assigned_user_id_advanced[]','options' => $this->_tpl_vars['fields']['assigned_user_id_advanced']['options'],'size' => '6','style' => "width: 150px",'multiple' => '1','selected' => $this->_tpl_vars['fields']['assigned_user_id_advanced']['value']), $this);?>

   	   	</td>
					<?php endif; ?>
		    
      
	
		
		<?php if ($this->_tpl_vars['fields']['remain_amount_advanced']['acl'] > 0): ?>
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
		
		<label for='remain_amount_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_REMAIN_AMOUNT','module' => 'J_Payment'), $this);?>
</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
<?php if (strlen ( $this->_tpl_vars['fields']['remain_amount_advanced']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['remain_amount_advanced']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['remain_amount_advanced']['value']); ?>
<?php endif; ?>

<?php $this->assign('id', $this->_tpl_vars['fields']['remain_amount_advanced']['name']); ?>

<?php if (isset ( $_REQUEST['remain_amount_advanced_range_choice'] )): ?>
<?php $this->assign('starting_choice', $_REQUEST['remain_amount_advanced_range_choice']); ?>
<?php else: ?>
<?php $this->assign('starting_choice', "="); ?>
<?php endif; ?>

<script type='text/javascript'>
function <?php echo $this->_tpl_vars['id']; ?>
_range_change(val) 
{
  calculate_between = (val == 'between');

  //Clear the values depending on the operation
  if(calculate_between) {
     document.getElementById("range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';   
  } else {
     document.getElementById("start_range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
     document.getElementById("end_range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
  }
 
  document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_range_div").style.display = calculate_between ? 'none' : '';
  document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_between_range_div").style.display = calculate_between ? '' : 'none';
}

var <?php echo $this->_tpl_vars['id']; ?>
_range_reset = function()
{
<?php echo $this->_tpl_vars['id']; ?>
_range_change('=');
}

YAHOO.util.Event.onDOMReady(function() {
if(document.getElementById('search_form_clear'))
{
YAHOO.util.Event.addListener('search_form_clear', 'click', <?php echo $this->_tpl_vars['id']; ?>
_range_reset);
}

});

YAHOO.util.Event.onDOMReady(function() {
 	 if(document.getElementById('search_form_clear_advanced'))
 	 {
 	     YAHOO.util.Event.addListener('search_form_clear_advanced', 'click', <?php echo $this->_tpl_vars['id']; ?>
_range_reset);
 	 }
});

</script>

<span style="white-space:nowrap !important;">
<select id="<?php echo $this->_tpl_vars['id']; ?>
_range_choice" name="<?php echo $this->_tpl_vars['id']; ?>
_range_choice" style="width:190px !important;" onchange="<?php echo $this->_tpl_vars['id']; ?>
_range_change(this.value);">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['remain_amount_advanced']['options'],'selected' => $this->_tpl_vars['starting_choice']), $this);?>

</select>
<div id="<?php echo $this->_tpl_vars['id']; ?>
_range_div" style="<?php if ($this->_tpl_vars['starting_choice'] == 'between'): ?>display:none;<?php else: ?>display:'';<?php endif; ?>">
<input type='text' name='range_<?php echo $this->_tpl_vars['id']; ?>
' id='range_<?php echo $this->_tpl_vars['id']; ?>
' style='width:75px !important;' size='20' 
     
    value='<?php if (empty ( $_REQUEST['range_remain_amount_advanced'] ) && ! empty ( $_REQUEST['remain_amount_advanced'] )):  echo $_REQUEST['remain_amount_advanced'];  else:  echo $_REQUEST['range_remain_amount_advanced'];  endif; ?>' tabindex='' >
</div>
<div id="<?php echo $this->_tpl_vars['id']; ?>
_between_range_div" style="<?php if ($this->_tpl_vars['starting_choice'] == 'between'): ?>display:'';<?php else: ?>display:none;<?php endif; ?>">
<input type='text' name='start_range_<?php echo $this->_tpl_vars['id']; ?>
' 
    id='start_range_<?php echo $this->_tpl_vars['id']; ?>
' style='width:75px !important;' size='10' 
     
    value='<?php echo $_REQUEST['start_range_remain_amount_advanced']; ?>
' tabindex=''>
<?php echo $this->_tpl_vars['APP']['LBL_AND']; ?>

<input type='text' name='end_range_<?php echo $this->_tpl_vars['id']; ?>
' 
    id='end_range_<?php echo $this->_tpl_vars['id']; ?>
' style='width:75px !important;' size='10' 
     
    value='<?php echo $_REQUEST['end_range_remain_amount_advanced']; ?>
' tabindex=''>    
</div> 
</span>
   	   	</td>
					<?php endif; ?>
		    
      
	
		
		<?php if ($this->_tpl_vars['fields']['remain_hours_advanced']['acl'] > 0): ?>
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
		
		<label for='remain_hours_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_REMAIN_HOURS','module' => 'J_Payment'), $this);?>
</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
<?php if (strlen ( $this->_tpl_vars['fields']['remain_hours_advanced']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['remain_hours_advanced']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['remain_hours_advanced']['value']); ?>
<?php endif; ?>

<?php $this->assign('id', $this->_tpl_vars['fields']['remain_hours_advanced']['name']); ?>

<?php if (isset ( $_REQUEST['remain_hours_advanced_range_choice'] )): ?>
<?php $this->assign('starting_choice', $_REQUEST['remain_hours_advanced_range_choice']); ?>
<?php else: ?>
<?php $this->assign('starting_choice', "="); ?>
<?php endif; ?>

<script type='text/javascript'>
function <?php echo $this->_tpl_vars['id']; ?>
_range_change(val) 
{
  calculate_between = (val == 'between');

  //Clear the values depending on the operation
  if(calculate_between) {
     document.getElementById("range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';   
  } else {
     document.getElementById("start_range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
     document.getElementById("end_range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
  }
 
  document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_range_div").style.display = calculate_between ? 'none' : '';
  document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_between_range_div").style.display = calculate_between ? '' : 'none';
}

var <?php echo $this->_tpl_vars['id']; ?>
_range_reset = function()
{
<?php echo $this->_tpl_vars['id']; ?>
_range_change('=');
}

YAHOO.util.Event.onDOMReady(function() {
if(document.getElementById('search_form_clear'))
{
YAHOO.util.Event.addListener('search_form_clear', 'click', <?php echo $this->_tpl_vars['id']; ?>
_range_reset);
}

});

YAHOO.util.Event.onDOMReady(function() {
 	 if(document.getElementById('search_form_clear_advanced'))
 	 {
 	     YAHOO.util.Event.addListener('search_form_clear_advanced', 'click', <?php echo $this->_tpl_vars['id']; ?>
_range_reset);
 	 }
});

</script>

<span style="white-space:nowrap !important;">
<select id="<?php echo $this->_tpl_vars['id']; ?>
_range_choice" name="<?php echo $this->_tpl_vars['id']; ?>
_range_choice" style="width:190px !important;" onchange="<?php echo $this->_tpl_vars['id']; ?>
_range_change(this.value);">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['remain_hours_advanced']['options'],'selected' => $this->_tpl_vars['starting_choice']), $this);?>

</select>
<div id="<?php echo $this->_tpl_vars['id']; ?>
_range_div" style="<?php if ($this->_tpl_vars['starting_choice'] == 'between'): ?>display:none;<?php else: ?>display:'';<?php endif; ?>">
<input type='text' name='range_<?php echo $this->_tpl_vars['id']; ?>
' id='range_<?php echo $this->_tpl_vars['id']; ?>
' style='width:75px !important;' size='20' 
     
    value='<?php if (empty ( $_REQUEST['range_remain_hours_advanced'] ) && ! empty ( $_REQUEST['remain_hours_advanced'] )):  echo $_REQUEST['remain_hours_advanced'];  else:  echo $_REQUEST['range_remain_hours_advanced'];  endif; ?>' tabindex='' >
</div>
<div id="<?php echo $this->_tpl_vars['id']; ?>
_between_range_div" style="<?php if ($this->_tpl_vars['starting_choice'] == 'between'): ?>display:'';<?php else: ?>display:none;<?php endif; ?>">
<input type='text' name='start_range_<?php echo $this->_tpl_vars['id']; ?>
' 
    id='start_range_<?php echo $this->_tpl_vars['id']; ?>
' style='width:75px !important;' size='10' 
     
    value='<?php echo $_REQUEST['start_range_remain_hours_advanced']; ?>
' tabindex=''>
<?php echo $this->_tpl_vars['APP']['LBL_AND']; ?>

<input type='text' name='end_range_<?php echo $this->_tpl_vars['id']; ?>
' 
    id='end_range_<?php echo $this->_tpl_vars['id']; ?>
' style='width:75px !important;' size='10' 
     
    value='<?php echo $_REQUEST['end_range_remain_hours_advanced']; ?>
' tabindex=''>    
</div> 
</span>
   	   	</td>
					<?php endif; ?>
		    
      
	
		
		<?php if ($this->_tpl_vars['fields']['team_name_advanced']['acl'] > 0): ?>
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
		
		<label for='team_name_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_TEAMS','module' => 'J_Payment'), $this);?>
</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
<?php echo smarty_function_sugarvar_teamset(array('parentFieldArray' => 'fields','vardef' => $this->_tpl_vars['fields']['team_name'],'tabindex' => 1,'display' => '','labelSpan' => '','fieldSpan' => '','formName' => 'search_form','displayType' => 'renderSearchView'), $this);?>

   	   	</td>
					<?php endif; ?>
		    
      
	
		
		<?php if ($this->_tpl_vars['fields']['current_user_only_advanced']['acl'] > 0): ?>
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
		
		<label for='current_user_only_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_CURRENT_USER_FILTER','module' => 'J_Payment'), $this);?>
</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
<?php if (strval ( $this->_tpl_vars['fields']['current_user_only_advanced']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['current_user_only_advanced']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['current_user_only_advanced']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'CHECKED'); ?>
<?php else: ?>
<?php $this->assign('checked', ""); ?>
<?php endif; ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['current_user_only_advanced']['name']; ?>
" value="0"> 
<input type="checkbox" id="<?php echo $this->_tpl_vars['fields']['current_user_only_advanced']['name']; ?>
" 
name="<?php echo $this->_tpl_vars['fields']['current_user_only_advanced']['name']; ?>
" 
value="1" title='' tabindex="" <?php echo $this->_tpl_vars['checked']; ?>
 >
   	   	</td>
					<?php endif; ?>
		    
      
	
		
		<?php if ($this->_tpl_vars['fields']['favorites_only_advanced']['acl'] > 0): ?>
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
		
		<label for='favorites_only_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_FAVORITES_FILTER','module' => 'J_Payment'), $this);?>
</label>
    	</td>
	<td  nowrap="nowrap" width='25%'>
			
<?php if (strval ( $this->_tpl_vars['fields']['favorites_only_advanced']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['favorites_only_advanced']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['favorites_only_advanced']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'CHECKED'); ?>
<?php else: ?>
<?php $this->assign('checked', ""); ?>
<?php endif; ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['favorites_only_advanced']['name']; ?>
" value="0"> 
<input type="checkbox" id="<?php echo $this->_tpl_vars['fields']['favorites_only_advanced']['name']; ?>
" 
name="<?php echo $this->_tpl_vars['fields']['favorites_only_advanced']['name']; ?>
" 
value="1" title='' tabindex="" <?php echo $this->_tpl_vars['checked']; ?>
 >
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
	
</script><?php echo '<script language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'search_form_modified_by_name_advanced\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["modified_by_name_advanced","modified_user_id_advanced"],"required_list":["modified_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_created_by_name_advanced\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["created_by_name_advanced","created_by_advanced"],"required_list":["created_by"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_team_name_advanced\']={"form":"search_form","method":"query","modules":["Teams"],"group":"or","field_list":["name","id"],"populate_list":["team_name_advanced","team_id_advanced"],"required_list":["team_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""},{"name":"name","op":"like_custom","begin":"(","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_assigned_user_name_advanced\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name_advanced","assigned_user_id_advanced"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_move_to_center_name_advanced\']={"form":"search_form","method":"query","modules":["Teams"],"group":"or","field_list":["name","id"],"populate_list":["move_to_center_name_advanced","move_to_center_id_advanced"],"required_list":["team_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""},{"name":"name","op":"like_custom","begin":"(","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_move_from_center_name_advanced\']={"form":"search_form","method":"query","modules":["Teams"],"group":"or","field_list":["name","id"],"populate_list":["move_from_center_name_advanced","move_from_center_id_advanced"],"required_list":["team_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""},{"name":"name","op":"like_custom","begin":"(","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_transfer_to_student_name_advanced\']={"form":"search_form","method":"get_contact_array","modules":["Contacts"],"field_list":["salutation","last_name","first_name","id"],"populate_list":["transfer_to_student_name_advanced","transfer_to_student_id_advanced","transfer_to_student_id_advanced","transfer_to_student_id_advanced"],"required_list":["transfer_to_student_id"],"group":"or","conditions":[{"name":"last_name","op":"like_custom","end":"%","value":""},{"name":"first_name","op":"like_custom","end":"%","value":""}],"order":"last_name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_payment_out_name_advanced\']={"form":"search_form","method":"query","modules":["J_Payment"],"group":"or","field_list":["name","id"],"populate_list":["payment_out_name_advanced","payment_out_id_advanced"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_delay_situation_name_advanced\']={"form":"search_form","method":"query","modules":["J_StudentSituations"],"group":"or","field_list":["name","id"],"populate_list":["delay_situation_name_advanced","delay_situation_id_advanced"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_lead_name_advanced\']={"form":"search_form","method":"query","modules":["Leads"],"group":"or","field_list":["name","id"],"populate_list":["lead_name_advanced","lead_name_advanced"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_account_name_advanced\']={"form":"search_form","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["search_form_account_name_advanced","account_id_advanced"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["account_id"],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_contract_name_advanced\']={"form":"search_form","method":"query","modules":["Contracts"],"group":"or","field_list":["name","id"],"populate_list":["contract_name_advanced","contract_id_advanced"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_j_partnership_j_payment_1_name_advanced\']={"form":"search_form","method":"query","modules":["J_Partnership"],"group":"or","field_list":["name","id"],"populate_list":["j_partnership_j_payment_1_name_advanced","j_partnership_j_payment_1j_partnership_ida_advanced"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_j_payment_j_inventory_1_name_advanced\']={"form":"search_form","method":"query","modules":["J_Inventory"],"group":"or","field_list":["name","id"],"populate_list":["j_payment_j_inventory_1_name_advanced","j_payment_j_inventory_1j_inventory_idb_advanced"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_j_payment_j_payment_1_name_advanced\']={"form":"search_form","method":"query","modules":["J_Payment"],"group":"or","field_list":["name","id"],"populate_list":["j_payment_j_payment_1_name_advanced","j_payment_j_payment_1j_payment_ida_advanced"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_j_coursefee_j_payment_1_name_advanced\']={"form":"search_form","method":"query","modules":["J_Coursefee"],"group":"or","field_list":["name","id"],"populate_list":["j_coursefee_j_payment_1_name_advanced","j_coursefee_j_payment_1j_coursefee_ida_advanced"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_contacts_j_payment_1_name_advanced\']={"form":"search_form","method":"get_contact_array","modules":["Contacts"],"field_list":["salutation","last_name","first_name","id"],"populate_list":["contacts_j_payment_1_name_advanced","contacts_j_payment_1contacts_ida_advanced","contacts_j_payment_1contacts_ida_advanced","contacts_j_payment_1contacts_ida_advanced"],"required_list":["contacts_j_payment_1contacts_ida"],"group":"or","conditions":[{"name":"last_name","op":"like_custom","end":"%","value":""},{"name":"first_name","op":"like_custom","end":"%","value":""}],"order":"last_name","limit":"30","no_match_text":"No Match"};</script>'; ?>