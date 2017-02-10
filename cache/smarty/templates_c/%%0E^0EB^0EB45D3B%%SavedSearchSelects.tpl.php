<?php /* Smarty version 2.6.11, created on 2017-02-07 09:34:03
         compiled from modules/SavedSearch/SavedSearchSelects.tpl */ ?>

<?php if ($this->_tpl_vars['SAVED_SEARCHES_OPTIONS'] != null): ?>
<select style="width: auto !important; min-width: 150px;" name='saved_search_select' id='saved_search_select' onChange='SUGAR.savedViews.shortcut_select(this, "<?php echo $this->_tpl_vars['SEARCH_MODULE']; ?>
");'>
	<?php echo $this->_tpl_vars['SAVED_SEARCHES_OPTIONS']; ?>

</select>
<input type='checkbox' name='publish_saved_search_chk' id='publish_saved_search_chk' onclick="return CheckSavedSearchClick()" />
<input type='button' name='btnPublishSavedSearch' id='btnPublishSavedSearch' value='Publish to' title='Publish this search to all users' onclick='return PublishSavedSearch();' disabled />
<span id='availability_status_department' style='display:none;margin-left:10px'><img src='themes/default/images/loading.gif' align='absmiddle' width='16'></span>
<select multiple='multiple' name='department[]' id='department' onchange='return ChangeDepartment();' style='width:120px;margin-left:10px;display:none'></select>
<span id='availability_status_user_id' style='display:none;margin-left:10px'><img src='themes/default/images/loading.gif' align='absmiddle' width='16'></span>
<select multiple='multiple' name='user_id[]' id='user_id' onchange='return ChangeUser();' style='width:120px;display:none;margin-left:10px'></select>
<span id='availability_status_publish' style='margin-left:10px;display:none'><img src='themes/default/images/loading.gif' align='absmiddle' width='16'></span>
<span id='publish_saved_search_status' style='color:blue;margin-left:10px;display:none'></span>

 
<script>
<?php echo '
	//if the function exists, call the function that will populate the searchform
	//labels based on the value of the saved search dropdown
	if(typeof(fillInLabels)==\'function\'){
		fillInLabels();
	}
    
    
    
    
    
'; ?>
	
</script>
<?php endif; ?>
