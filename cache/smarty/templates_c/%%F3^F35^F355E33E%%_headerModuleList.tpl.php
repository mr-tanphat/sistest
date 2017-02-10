<?php /* Smarty version 2.6.11, created on 2017-02-07 11:00:17
         compiled from themes/RacerX/tpls/_headerModuleList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_link', 'themes/RacerX/tpls/_headerModuleList.tpl', 57, false),array('function', 'sugar_ajax_url', 'themes/RacerX/tpls/_headerModuleList.tpl', 74, false),array('modifier', 'replace', 'themes/RacerX/tpls/_headerModuleList.tpl', 74, false),)), $this); ?>
<?php $this->assign('underscore', '_'); ?>

<script type="text/javascript">
sugar_theme_gm_current = '<?php echo $this->_tpl_vars['currentGroupTab']; ?>
';
Set_Cookie('sugar_theme_gm_current','<?php echo $this->_tpl_vars['currentGroupTab']; ?>
',30,'/','','');
</script>


<?php if ($this->_tpl_vars['AJAX'] != '1'): ?>
<div id="moduleList">
<?php endif;  $this->assign('overflowSuffix', 'Overflow');  $this->assign('overflowHidden', 'Hidden');  $_from = $this->_tpl_vars['groupTabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tabGroups'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tabGroups']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tabGroupName'] => $this->_tpl_vars['tabGroup']):
        $this->_foreach['tabGroups']['iteration']++;
 
$tabGroupName = str_replace(" ", "_", $this->get_template_vars('tabGroupName'));
$currentGroupTab = str_replace(" ", "_", $this->get_template_vars('currentGroupTab'));
$this->assign('tabGroupName', $tabGroupName);
$this->assign('currentGroupTab', $currentGroupTab);
 ?>
    <?php if ($this->_tpl_vars['tabGroupName'] == $this->_tpl_vars['APP']['LBL_TABGROUP_ALL']): ?>
  <?php $this->assign('groupTabId', ''); ?>
  <?php else: ?>
  <?php $this->assign('groupTabId', ($this->_tpl_vars['tabGroupName']).($this->_tpl_vars['underscore'])); ?>
  <?php endif; ?>
	<ul id="themeTabGroupMenu_<?php echo $this->_tpl_vars['tabGroupName']; ?>
" class="sf-menu" style="<?php if ($this->_tpl_vars['tabGroupName'] != $this->_tpl_vars['currentGroupTab']): ?>display:none;<?php endif; ?>">
		<?php $_from = $this->_tpl_vars['tabGroup']['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['moduleList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['moduleList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['module']):
        $this->_foreach['moduleList']['iteration']++;
?>
	<?php if ($this->_tpl_vars['name'] == 'Home'): ?>
		<?php $this->assign('homeImageLabel', $this->_tpl_vars['homeImage']); ?>
		<?php $this->assign('homeClass', 'home'); ?>
		<?php $this->assign('title', $this->_tpl_vars['APP']['LBL_TABGROUP_HOME']); ?>
	<?php else: ?>
		<?php $this->assign('homeImageLabel', ''); ?>
		<?php $this->assign('homeClass', ''); ?>
		<?php $this->assign('title', ''); ?>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['name'] == $this->_tpl_vars['MODULE_TAB']): ?>
		<li class="current <?php echo $this->_tpl_vars['homeClass']; ?>
"><?php echo smarty_function_sugar_link(array('id' => "moduleTab_".($this->_tpl_vars['tabGroupName']).($this->_tpl_vars['name']),'module' => $this->_tpl_vars['name'],'data' => $this->_tpl_vars['module'],'label' => $this->_tpl_vars['homeImageLabel'],'title' => $this->_tpl_vars['title'],'class' => "sf-with-ul"), $this);?>

	<?php else: ?>
		<li class="<?php echo $this->_tpl_vars['homeClass']; ?>
"><?php echo smarty_function_sugar_link(array('id' => "moduleTab_".($this->_tpl_vars['tabGroupName']).($this->_tpl_vars['name']),'module' => $this->_tpl_vars['name'],'data' => $this->_tpl_vars['module'],'label' => $this->_tpl_vars['homeImageLabel'],'title' => $this->_tpl_vars['title'],'class' => "sf-with-ul"), $this);?>

	<?php endif; ?>
		<?php if ($this->_tpl_vars['shortcutTopMenu'][$this->_tpl_vars['name']]): ?>
		<ul class="megamenu">
		<li >
			<div class="megawrapper">
				<div class="megacolumn">
					<div class="megacolumn-content divider">
					<ul class="MMShortcuts">
					<li class="groupLabel"><?php echo $this->_tpl_vars['APP']['LBL_LINK_ACTIONS']; ?>
</li>
					<?php $_from = $this->_tpl_vars['shortcutTopMenu'][$this->_tpl_vars['name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['shortcut_item']):
?>
					  <?php if ($this->_tpl_vars['shortcut_item']['URL'] == "-"): ?>
		              	<hr style="margin-top: 2px; margin-bottom: 2px" />
					  <?php else: ?>
		                <?php if ($this->_tpl_vars['module'] == 'Calendar'): ?>
					  		<li><a id="<?php echo ((is_array($_tmp=$this->_tpl_vars['shortcut_item']['LABEL'])) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', '') : smarty_modifier_replace($_tmp, ' ', ''));  echo $this->_tpl_vars['module'];  echo $this->_tpl_vars['tabGroupName']; ?>
" href="<?php echo smarty_function_sugar_ajax_url(array('url' => $this->_tpl_vars['shortcut_item']['URL']), $this);?>
"><?php echo $this->_tpl_vars['shortcut_item']['LABEL']; ?>
</a></li>
					  	<?php else: ?>
		                	<li><a id="<?php echo ((is_array($_tmp=$this->_tpl_vars['shortcut_item']['LABEL'])) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', '') : smarty_modifier_replace($_tmp, ' ', ''));  echo $this->_tpl_vars['tabGroupName']; ?>
" href="<?php echo smarty_function_sugar_ajax_url(array('url' => $this->_tpl_vars['shortcut_item']['URL']), $this);?>
"><?php echo $this->_tpl_vars['shortcut_item']['LABEL']; ?>
</a></li>
					  	<?php endif; ?>
					  <?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
					</ul>
					</div>
				</div>
				<div class="megacolumn">
					<div class="megacolumn-content divider">
					<?php if ($this->_tpl_vars['groupTabId']): ?>
					<ul id="lastViewedContainer<?php echo $this->_tpl_vars['tabGroupName']; ?>
_<?php echo $this->_tpl_vars['name']; ?>
" class="MMLastViewed">
						<li class="groupLabel"><?php echo $this->_tpl_vars['APP']['LBL_LAST_VIEWED']; ?>
</li>
						<li id="shortCutsLoading<?php echo $this->_tpl_vars['tabGroupName']; ?>
_<?php echo $this->_tpl_vars['name']; ?>
"><a href="#">&nbsp;</a></li>
					</ul>
					<?php else: ?>
					<ul id="lastViewedContainer<?php echo $this->_tpl_vars['name']; ?>
" class="MMLastViewed">
						<li class="groupLabel"><?php echo $this->_tpl_vars['APP']['LBL_LAST_VIEWED']; ?>
</li>
						<li id="shortCutsLoading<?php echo $this->_tpl_vars['tabGroupName']; ?>
_<?php echo $this->_tpl_vars['name']; ?>
"><a href="#">&nbsp;</a></li>
					</ul>
					<?php endif; ?>
					</div>
				</div>
                <div class="megacolumn">
                    <div class="megacolumn-content">
                    <ul class="MMFavorites">
                        <li class="groupLabel"><?php echo $this->_tpl_vars['APP']['LBL_FAVORITES']; ?>
</li>
                        <li><a href="javascript: void(0);">&nbsp;</a></li>
                    </ul>
                    </div>
                </div>
			</div>
		</li>
		</ul>
		<?php endif; ?>
	</li>
	<?php endforeach; endif; unset($_from); ?>
	
	
		
		<li class="moduleTabExtraMenu more" id="moduleTabExtraMenu<?php echo $this->_tpl_vars['tabGroupName']; ?>
">
		<a href="javascript: void(0);" class="sf-with-ul more"><span style="float: left;"><?php echo $this->_tpl_vars['APP']['LBL_MORE']; ?>
</span><em>&gt;&gt;</em></a>
		<ul class="megamenu moduleTabExtraMenu">
		<li>
			<div class="megawrapper">
				<div class="megacolumn">
					<div class="megacolumn-content">
							<ul id="moduleTabMore<?php echo $this->_tpl_vars['tabGroupName']; ?>
" class="showLess moduleTabMore megamenuSiblings">
							
														<?php $_from = $this->_tpl_vars['tabGroup']['extra']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['moduleList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['moduleList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['module'] => $this->_tpl_vars['name']):
        $this->_foreach['moduleList']['iteration']++;
?>
				
							<li <?php if (($this->_foreach['moduleList']['iteration']-1) > 4): ?>class="moreOverflow"<?php endif; ?>><?php echo smarty_function_sugar_link(array('id' => "moduleTab_".($this->_tpl_vars['tabGroupName']).($this->_tpl_vars['module']),'module' => ($this->_tpl_vars['module']),'data' => ($this->_tpl_vars['name']),'class' => "sf-with-ul"), $this);?>

								<?php if ($this->_tpl_vars['shortcutExtraMenu'][$this->_tpl_vars['module']]): ?>
								<ul class="megamenu">
								<li >
									<div class="megawrapper">
										<div class="megacolumn">
											<div class="megacolumn-content divider">
											<ul class="MMShortcuts">
											<li class="groupLabel"><?php echo $this->_tpl_vars['APP']['LBL_LINK_ACTIONS']; ?>
</li>
											<?php $_from = $this->_tpl_vars['shortcutExtraMenu'][$this->_tpl_vars['module']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['shortcut_item']):
?>
											  <?php if ($this->_tpl_vars['shortcut_item']['URL'] == "-"): ?>
								              	<hr style="margin-top: 2px; margin-bottom: 2px" />
											  <?php else: ?>
											  	<?php if ($this->_tpl_vars['module'] == 'Calendar'): ?>
											  		<li><a id="<?php echo ((is_array($_tmp=$this->_tpl_vars['shortcut_item']['LABEL'])) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', '') : smarty_modifier_replace($_tmp, ' ', ''));  echo $this->_tpl_vars['module'];  echo $this->_tpl_vars['tabGroupName']; ?>
" href="<?php echo smarty_function_sugar_ajax_url(array('url' => $this->_tpl_vars['shortcut_item']['URL']), $this);?>
"><?php echo $this->_tpl_vars['shortcut_item']['LABEL']; ?>
</a></li>
											  	<?php else: ?>
								                	<li><a id="<?php echo ((is_array($_tmp=$this->_tpl_vars['shortcut_item']['LABEL'])) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', '') : smarty_modifier_replace($_tmp, ' ', ''));  echo $this->_tpl_vars['tabGroupName']; ?>
" href="<?php echo smarty_function_sugar_ajax_url(array('url' => $this->_tpl_vars['shortcut_item']['URL']), $this);?>
"><?php echo $this->_tpl_vars['shortcut_item']['LABEL']; ?>
</a></li>
											  	<?php endif; ?>
											  <?php endif; ?>
											<?php endforeach; endif; unset($_from); ?>
											</ul>
											</div>
										</div>
										<div class="megacolumn">
											<div class="megacolumn-content divider">
											<?php if ($this->_tpl_vars['groupTabId']): ?>
											<ul id="lastViewedContainer<?php echo $this->_tpl_vars['tabGroupName']; ?>
_<?php echo $this->_tpl_vars['name']; ?>
" class="MMLastViewed">
												<li class="groupLabel"><?php echo $this->_tpl_vars['APP']['LBL_LAST_VIEWED']; ?>
</li>
												<li id="shortCutsLoading<?php echo $this->_tpl_vars['tabGroupName']; ?>
_<?php echo $this->_tpl_vars['name']; ?>
"><a href="#">&nbsp;</a></li>
											</ul>
											<?php else: ?>
											<ul id="lastViewedContainer<?php echo $this->_tpl_vars['name']; ?>
" class="MMLastViewed">
												<li class="groupLabel"><?php echo $this->_tpl_vars['APP']['LBL_LAST_VIEWED']; ?>
</li>
												<li id="shortCutsLoading<?php echo $this->_tpl_vars['tabGroupName']; ?>
_<?php echo $this->_tpl_vars['name']; ?>
"><a href="#">&nbsp;</a></li>
											</ul>
											<?php endif; ?>
											</div>
										</div>
                                        <div class="megacolumn">
                                            <div class="megacolumn-content">
                                                <ul class="MMFavorites">
                                                    <li class="groupLabel"><?php echo $this->_tpl_vars['APP']['LBL_FAVORITES']; ?>
</li>
                                                    <li><a href="#">&nbsp;</a></li>
                                                </ul>
                                            </div>
                                        </div>
									</div>
								</li>
								</ul>
								<?php endif; ?>
								</li>
							<?php endforeach; endif; unset($_from); ?>
							<?php if (count ( $this->_tpl_vars['tabGroup']['extra'] ) > 5): ?>
							<li class="moduleMenuOverFlowMore" id="moduleMenuOverFlowMore<?php echo $this->_tpl_vars['currentGroupTab']; ?>
"><a href="javascript: SUGAR.themes.toggleMenuOverFlow('moduleTabMore<?php echo $this->_tpl_vars['currentGroupTab']; ?>
','more');"><?php echo $this->_tpl_vars['APP']['LBL_SHOW_MORE']; ?>
 <div class="showMoreArrow"></div></a></li>
							<li class="moduleMenuOverFlowLess" id="moduleMenuOverFlowLess<?php echo $this->_tpl_vars['currentGroupTab']; ?>
"><a href="javascript: SUGAR.themes.toggleMenuOverFlow('moduleTabMore<?php echo $this->_tpl_vars['currentGroupTab']; ?>
','less');"><?php echo $this->_tpl_vars['APP']['LBL_SHOW_LESS']; ?>
 <div class="showLessArrow"></div></a></li>
							<?php endif; ?>
							</ul>		
							<ul class="filterBy megamenuSiblings">
														<?php if ($this->_tpl_vars['USE_GROUP_TABS']): ?>
					 		<?php if (count ( $this->_tpl_vars['tabGroup']['extra'] ) > 0): ?>
					 		<li class="menuHR"></li>
					 		<?php endif; ?>
				
					 		<li><a href="#" class="group sf-with-ul" title="<?php echo $this->_tpl_vars['tabGroupName']; ?>
"><?php echo $this->_tpl_vars['APP']['LBL_FILTER_MENU_BY']; ?>
</a>
					
								<ul class="sf-menu filter-menu">
						          <?php $_from = $this->_tpl_vars['groupTabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['groupList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['groupList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group'] => $this->_tpl_vars['module']):
        $this->_foreach['groupList']['iteration']++;
?>
				                      <?php 
				                          $group = str_replace(" ", "_", $this->get_template_vars('group'));
				                          $this->assign('group_id', $group);
				                       ?>
						          <li <?php if ($this->_tpl_vars['tabGroupName'] == $this->_tpl_vars['group']): ?>class="selected"<?php endif; ?>><a href="javascript:(SUGAR.themes.sugar_theme_gm_switch('<?php echo $this->_tpl_vars['group']; ?>
', '<?php echo $this->_tpl_vars['group_id']; ?>
') && false)" class="<?php if ($this->_tpl_vars['tabGroupName'] == $this->_tpl_vars['group']): ?>selected<?php endif; ?>"><?php echo $this->_tpl_vars['group']; ?>
</a></li>
						          <?php endforeach; endif; unset($_from); ?>
								</ul>
				   				</li>
				        	</ul>
					 		<?php endif; ?>
					 		</div>
				 		</div>
			 		</div>
		 		</li>
			</ul>
		</li>
	
	
</ul>
<?php endforeach; endif; unset($_from);  if ($this->_tpl_vars['AJAX'] != '1'): ?>
</div>
<?php endif; ?>