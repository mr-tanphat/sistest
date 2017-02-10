<?php /* Smarty version 2.6.11, created on 2017-02-07 09:34:15
         compiled from include/SugarFields/Fields/Teamset/TeamsetListView.tpl */ ?>
<?php if ($this->_tpl_vars['rowData']['TEAM_COUNT'] > 1): ?>
<span id='div_<?php echo $this->_tpl_vars['rowData']['ID']; ?>
_teams'>
<?php echo $this->_tpl_vars['rowData'][$this->_tpl_vars['col']]; ?>
<a href="#" style='text-decoration:none;' onMouseOver="javascript:toggleMore('div_<?php echo $this->_tpl_vars['rowData']['ID']; ?>
_teams','img_<?php echo $this->_tpl_vars['rowData']['ID']; ?>
_teams', 'Teams', 'DisplayInlineTeams', 'team_set_id=<?php echo $this->_tpl_vars['rowData']['TEAM_SET_ID']; ?>
&team_id=<?php echo $this->_tpl_vars['rowData']['TEAM_ID']; ?>
');"  onFocus="javascript:toggleMore('div_<?php echo $this->_tpl_vars['rowData']['ID']; ?>
_teams','img_<?php echo $this->_tpl_vars['rowData']['ID']; ?>
_teams', 'Teams', 'DisplayInlineTeams', 'team_set_id=<?php echo $this->_tpl_vars['rowData']['TEAM_SET_ID']; ?>
');" id='div_<?php echo $this->_tpl_vars['rowData']['ID']; ?>
_teams'>+</a>
</span>
<?php else: ?>
<?php echo $this->_tpl_vars['rowData'][$this->_tpl_vars['col']]; ?>

<?php endif; ?>