<?php /* Smarty version 2.6.11, created on 2017-02-07 13:21:40
         compiled from cache/modules/Opportunities/SearchForm_basic.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'cache/modules/Opportunities/SearchForm_basic.tpl', 33, false),array('function', 'math', 'cache/modules/Opportunities/SearchForm_basic.tpl', 34, false),array('function', 'sugar_translate', 'cache/modules/Opportunities/SearchForm_basic.tpl', 43, false),array('function', 'html_options', 'cache/modules/Opportunities/SearchForm_basic.tpl', 80, false),array('function', 'sugar_getimagepath', 'cache/modules/Opportunities/SearchForm_basic.tpl', 137, false),array('modifier', 'count', 'cache/modules/Opportunities/SearchForm_basic.tpl', 124, false),)), $this); ?>

<?php if (! isset ( $this->_tpl_vars['templateMeta']['maxColumnsBasic'] )): ?>
	<?php $this->assign('basicMaxColumns', $this->_tpl_vars['templateMeta']['maxColumns']); ?>
<?php else: ?>
    <?php $this->assign('basicMaxColumns', $this->_tpl_vars['templateMeta']['maxColumnsBasic']); ?>
<?php endif; ?>
<script>
<?php echo '
	$(function() {
	var $dialog = $(\'<div></div>\')
		.html(SUGAR.language.get(\'app_strings\', \'LBL_SEARCH_HELP_TEXT\'))
		.dialog({
			autoOpen: false,
			title: SUGAR.language.get(\'app_strings\', \'LBL_HELP\'),
			width: 700
		});
		
		$(\'#filterHelp\').click(function() {
		$dialog.dialog(\'open\');
		// prevent the default action, e.g., following a link
	});
	
	});
'; ?>

</script>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
      
      
		
		<?php if ($this->_tpl_vars['fields']['name_basic']['acl'] > 0): ?>
		<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='1%' >
			<label for='name_basic'> <?php echo smarty_function_sugar_translate(array('label' => 'LBL_OPPORTUNITY_NAME','module' => 'Opportunities'), $this);?>

		</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<?php if (strlen ( $this->_tpl_vars['fields']['name_basic']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['name_basic']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['name_basic']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['name_basic']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['name_basic']['name']; ?>
' size='30' 
    maxlength='225' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      accesskey='9'  >
   						<?php endif; ?>
		   	</td>
    
      
		
		<?php if ($this->_tpl_vars['fields']['sales_stage_basic']['acl'] > 0): ?>
		<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='1%' >
			<label for='sales_stage_basic'> <?php echo smarty_function_sugar_translate(array('label' => 'LBL_SALES_STAGE','module' => 'Opportunities'), $this);?>

		</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<?php echo smarty_function_html_options(array('id' => 'sales_stage_basic','name' => 'sales_stage_basic[]','options' => $this->_tpl_vars['fields']['sales_stage_basic']['options'],'size' => '6','style' => "width: 150px",'multiple' => '1','selected' => $this->_tpl_vars['fields']['sales_stage_basic']['value']), $this);?>

   						<?php endif; ?>
		   	</td>
    
      
		
		<?php if ($this->_tpl_vars['fields']['added_to_class_basic']['acl'] > 0): ?>
		<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='added_to_class_basic' ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_ADDED_TO_CLASS','module' => 'Opportunities'), $this);?>
</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<?php $this->assign('yes', ""); ?>
<?php $this->assign('no', ""); ?>
<?php $this->assign('default', ""); ?>

<?php if (strval ( $this->_tpl_vars['fields']['added_to_class_basic']['value'] ) == '1'): ?>
	<?php $this->assign('yes', 'SELECTED'); ?>
<?php elseif (strval ( $this->_tpl_vars['fields']['added_to_class_basic']['value'] ) == '0'): ?>
	<?php $this->assign('no', 'SELECTED'); ?>
<?php else: ?>
	<?php $this->assign('default', 'SELECTED'); ?>
<?php endif; ?>

<select id="<?php echo $this->_tpl_vars['fields']['added_to_class_basic']['name']; ?>
" name="<?php echo $this->_tpl_vars['fields']['added_to_class_basic']['name']; ?>
"   >
 <option value="" <?php echo $this->_tpl_vars['default']; ?>
></option>
 <option value = "0" <?php echo $this->_tpl_vars['no']; ?>
> <?php echo $this->_tpl_vars['APP']['LBL_SEARCH_DROPDOWN_NO']; ?>
</option>
 <option value = "1" <?php echo $this->_tpl_vars['yes']; ?>
> <?php echo $this->_tpl_vars['APP']['LBL_SEARCH_DROPDOWN_YES']; ?>
</option>
</select>

   						<?php endif; ?>
		   	</td>
    <?php if (count($this->_tpl_vars['formData']) >= $this->_tpl_vars['basicMaxColumns']+1): ?>
    </tr>
    <tr>
	<td colspan="<?php echo $this->_tpl_vars['searchTableColumnCount']; ?>
">
    <?php else: ?>
	<td class="sumbitButtons">
    <?php endif; ?>
        <input tabindex="2" title="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_BUTTON_TITLE']; ?>
" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_BUTTON_LABEL']; ?>
" id="search_form_submit"/>&nbsp;
	    <input tabindex='2' title='<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_TITLE']; ?>
' onclick='SUGAR.searchForm.clear_form(this.form); return false;' class='button' type='button' name='clear' id='search_form_clear' value='<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_LABEL']; ?>
'/>
        <?php if ($this->_tpl_vars['HAS_ADVANCED_SEARCH']): ?>
	    &nbsp;&nbsp;<a id="advanced_search_link" onclick="SUGAR.searchForm.searchFormSelect('<?php echo $this->_tpl_vars['module']; ?>
|advanced_search','<?php echo $this->_tpl_vars['module']; ?>
|basic_search')" href="javascript:void(0);" accesskey="<?php echo $this->_tpl_vars['APP']['LBL_ADV_SEARCH_LNK_KEY']; ?>
" ><?php echo $this->_tpl_vars['APP']['LNK_ADVANCED_SEARCH']; ?>
</a>
	    <?php endif; ?>
    </td>
	<td class="helpIcon" width="*"><img alt="Help" border='0' id="filterHelp" src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
'></td>
	</tr>
</table>