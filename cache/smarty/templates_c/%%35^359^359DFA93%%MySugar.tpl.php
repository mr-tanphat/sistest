<?php /* Smarty version 2.6.11, created on 2017-02-07 10:12:33
         compiled from include/MySugar/tpls/MySugar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getscript', 'include/MySugar/tpls/MySugar.tpl', 38, false),array('function', 'counter', 'include/MySugar/tpls/MySugar.tpl', 67, false),array('function', 'sugar_getjspath', 'include/MySugar/tpls/MySugar.tpl', 115, false),array('function', 'sugar_getimage', 'include/MySugar/tpls/MySugar.tpl', 157, false),array('function', 'sugar_getlink', 'include/MySugar/tpls/MySugar.tpl', 168, false),)), $this); ?>
<?php echo '
<style>
.menu{
	z-index:100;
}

.subDmenu{
	z-index:100;
}

div.moduleTitle {
height: 10px;
	}
</style>
'; ?>




<?php echo smarty_function_sugar_getscript(array('file' => "cache/include/javascript/sugar_grp_yui_widgets.js"), $this);?>

<?php echo smarty_function_sugar_getscript(array('file' => 'include/javascript/dashlets.js'), $this);?>


<?php echo $this->_tpl_vars['chartResources']; ?>

<?php echo $this->_tpl_vars['mySugarChartResources']; ?>


<script type="text/javascript">
var numPages = <?php echo $this->_tpl_vars['numPages']; ?>
;
var loadedPages = new Array();
loadedPages[0] = '<?php echo $this->_tpl_vars['loadedPage']; ?>
';
var numCols = <?php echo $this->_tpl_vars['numCols']; ?>
;
var activePage = <?php echo $this->_tpl_vars['activePage']; ?>
;
var theme = '<?php echo $this->_tpl_vars['theme']; ?>
';
current_user_id = '<?php echo $this->_tpl_vars['current_user']; ?>
';
jsChartsArray = new Array();
var moduleName = '<?php echo $this->_tpl_vars['module']; ?>
';
document.body.setAttribute("class", "yui-skin-sam");
<?php echo '
var mySugarLoader = new YAHOO.util.YUILoader({
	require : ["my_sugar", "sugar_charts"],
    // Bug #48940 Skin always must be blank
    skin: {
        base: \'blank\',
        defaultSkin: \'\'
    },
	onSuccess: function(){
		initMySugar();
		initmySugarCharts();
		'; ?>

		<?php echo smarty_function_counter(array('assign' => 'hiddenCounter','start' => 0,'print' => false), $this);?>

		<?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['colNum'] => $this->_tpl_vars['data']):
?>
			<?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
				SUGAR.mySugar.attachToggleToolsetEvent('<?php echo $this->_tpl_vars['id']; ?>
');
			<?php endforeach; endif; unset($_from); ?>
		<?php echo smarty_function_counter(array(), $this);?>

		<?php endforeach; endif; unset($_from); ?>
		<?php echo '
		SUGAR.mySugar.maxCount = 	';  echo $this->_tpl_vars['maxCount'];  echo ';
		SUGAR.mySugar.homepage_dd = new Array();
		var j = 0;

		'; ?>

		var dashletIds = <?php echo $this->_tpl_vars['dashletIds']; ?>
;

		<?php if (! $this->_tpl_vars['lock_homepage']): ?>
			SUGAR.mySugar.attachDashletCtrlEvent();
			for(i in dashletIds) {
				SUGAR.mySugar.homepage_dd[j] = new ygDDList('dashlet_' + dashletIds[i]);
				SUGAR.mySugar.homepage_dd[j].setHandleElId('dashlet_header_' + dashletIds[i]);
                // Bug #47097 : Dashlets not displayed after moving them
                // add new property to save real id of dashlet, it needs to have ability reload dashlet by id
                SUGAR.mySugar.homepage_dd[j].dashletID = dashletIds[i];
				SUGAR.mySugar.homepage_dd[j].onMouseDown = SUGAR.mySugar.onDrag;
				SUGAR.mySugar.homepage_dd[j].afterEndDrag = SUGAR.mySugar.onDrop;
				j++;
			}
			<?php if ($this->_tpl_vars['hiddenCounter'] > 0): ?>
			for(var wp = 0; wp <= <?php echo $this->_tpl_vars['hiddenCounter']; ?>
; wp++) {
				SUGAR.mySugar.homepage_dd[j++] = new ygDDListBoundary('page_'+activePage+'_hidden' + wp);
			}
			<?php endif; ?>
			YAHOO.util.DDM.mode = 1;
		<?php endif; ?>
		<?php echo '
		SUGAR.mySugar.renderDashletsDialog();
		SUGAR.mySugar.renderAddPageDialog();
		SUGAR.mySugar.renderChangeLayoutDialog();
		SUGAR.mySugar.renderLoadingDialog();
		SUGAR.mySugar.sugarCharts.loadSugarCharts(activePage);
		'; ?>

		<?php echo $this->_tpl_vars['activeTabJavascript']; ?>

		<?php echo '
	}
});
mySugarLoader.addModule({
	name :"my_sugar",
	type : "js",
	fullpath: '; ?>
"<?php echo smarty_function_sugar_getjspath(array('file' => 'include/MySugar/javascript/MySugar.js'), $this);?>
"<?php echo ',
	varName: "initMySugar",
	requires: []
});
mySugarLoader.addModule({
	name :"sugar_charts",
	type : "js",
	fullpath: '; ?>
"<?php echo smarty_function_sugar_getjspath(array('file' => "include/SugarCharts/Jit/js/mySugarCharts.js"), $this);?>
"<?php echo ',
	varName: "initmySugarCharts",
	requires: []
});
mySugarLoader.insert();
'; ?>

</script>




<?php echo $this->_tpl_vars['form_header']; ?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" id="tabListContainerTable">
<tr>
<td nowrap id="tabListContainerTD">
<div id="tabListContainer" class="yui-module yui-scroll">
	<div class="yui-hd">
		<span class="yui-scroll-controls">
			<a title="scroll left" class="yui-scrollup"><em>scroll left</em></a>
			<a title="scroll right" class="yui-scrolldown"><em>scroll right</em></a>
		</span>
	</div>

	<div class="yui-bd">
		<ul class="subpanelTablist" id="tabList">
		<?php $_from = $this->_tpl_vars['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pageNum'] => $this->_tpl_vars['pageData']):
?>
		<li id="pageNum_<?php echo $this->_tpl_vars['pageNum']; ?>
" <?php if (( $this->_tpl_vars['pageNum'] == $this->_tpl_vars['activePage'] )): ?>class="active"<?php endif; ?>>
		<a id="pageNum_<?php echo $this->_tpl_vars['pageNum']; ?>
_anchor" class="<?php echo $this->_tpl_vars['pageData']['tabClass']; ?>
" href="javascript:SUGAR.mySugar.togglePages('<?php echo $this->_tpl_vars['pageNum']; ?>
');" title="<?php echo $this->_tpl_vars['pageData']['pageTitle']; ?>
">
			<span id="pageNum_<?php echo $this->_tpl_vars['pageNum']; ?>
_input_span" style="display:none;">
			<input type="hidden" id="pageNum_<?php echo $this->_tpl_vars['pageNum']; ?>
_name_hidden_input" value="<?php echo $this->_tpl_vars['pageData']['pageTitle']; ?>
"/>
			<input type="text" id="pageNum_<?php echo $this->_tpl_vars['pageNum']; ?>
_name_input" value="<?php echo $this->_tpl_vars['pageData']['pageTitle']; ?>
" size="10" onblur="SUGAR.mySugar.savePageTitle('<?php echo $this->_tpl_vars['pageNum']; ?>
',this.value);"/>
			</span>
			<span id="pageNum_<?php echo $this->_tpl_vars['pageNum']; ?>
_link_span" class="tabText">
			<span id="pageNum_<?php echo $this->_tpl_vars['pageNum']; ?>
_title_text" <?php if (! $this->_tpl_vars['lock_homepage']): ?>ondblclick="SUGAR.mySugar.renamePage('<?php echo $this->_tpl_vars['pageNum']; ?>
');"<?php endif; ?>><?php echo $this->_tpl_vars['pageData']['pageTitle']; ?>
</span></span>
			<?php ob_start(); ?>align="absmiddle" border="0" class="deletePageImg" id="pageNum_<?php echo $this->_tpl_vars['pageNum']; ?>
_delete_page_img" style="display: none;" onclick="return SUGAR.mySugar.deletePage()"  alt="<?php echo $this->_tpl_vars['app']['LBL_DELETE_PAGE']; ?>
"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('attr', ob_get_contents());ob_end_clean(); ?>
			<?php echo smarty_function_sugar_getimage(array('name' => "info-del.png",'attr' => $this->_tpl_vars['attr']), $this);?>

		   </a>
	   </li>
	   <?php endforeach; endif; unset($_from); ?>
		</ul>
	</div>

</div>
	<div id="addPage">
		<?php ob_start(); ?>id="add_page" onclick="return SUGAR.mySugar.showAddPageDialog();"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('attr', ob_get_contents());ob_end_clean(); ?>
		<?php ob_start(); ?>align="absmiddle" border="0" alt="<?php echo $this->_tpl_vars['app']['LBL_ADD_PAGE']; ?>
"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('img_attr', ob_get_contents());ob_end_clean(); ?>
		<?php echo smarty_function_sugar_getlink(array('url' => "javascript:void(0)",'title' => 'Add page','attr' => $this->_tpl_vars['attr'],'img_name' => "info-add-page.png",'img_attr' => $this->_tpl_vars['img_attr']), $this);?>

	</div>
</td>

<?php if (! $this->_tpl_vars['lock_homepage']): ?>
<td nowrap id="dashletCtrlsTD">
	<div id="dashletCtrls">
			<?php ob_start(); ?>id="add_dashlets" onclick="return SUGAR.mySugar.showDashletsDialog();" class="utilsLink"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('attr', ob_get_contents());ob_end_clean(); ?>
			<?php ob_start(); ?> border="0"  alt=""<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('img_attr', ob_get_contents());ob_end_clean(); ?>
			<?php echo smarty_function_sugar_getlink(array('url' => "javascript:void(0)",'title' => $this->_tpl_vars['mod']['LBL_ADD_DASHLETS'],'attr' => $this->_tpl_vars['attr'],'img_name' => "info-add.png",'img_attr' => $this->_tpl_vars['img_attr'],'img_placement' => 'left'), $this);?>

			<?php ob_start(); ?>id="change_layout" onclick="return SUGAR.mySugar.showChangeLayoutDialog();" class="utilsLink"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('attr', ob_get_contents());ob_end_clean(); ?>
			<?php ob_start(); ?> border="0" alt=""<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('img_attr', ob_get_contents());ob_end_clean(); ?>
			<?php echo smarty_function_sugar_getlink(array('url' => "javascript:void(0)",'title' => $this->_tpl_vars['app']['LBL_CHANGE_LAYOUT'],'attr' => $this->_tpl_vars['attr'],'img_name' => "info-layout.png",'img_attr' => $this->_tpl_vars['img_attr'],'img_placement' => 'left'), $this);?>

	</div>
</td>
<?php endif; ?>
</tr>
</table>
<div class="clear"></div>
<div id="pageContainer" class="yui-skin-sam">
<div id="pageNum_<?php echo $this->_tpl_vars['activePage']; ?>
_div">
<table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top: 5px;">
	<?php if ($this->_tpl_vars['numCols'] > 1): ?>
 	<tr>
 		<?php if ($this->_tpl_vars['numCols'] > 2): ?>
	 	<td>

		</td>

		<td rowspan="3">
				<?php echo smarty_function_sugar_getimage(array('name' => "blank.gif",'width' => '40','height' => '1','border' => '0'), $this);?>

		</td>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['numCols'] > 1): ?>
		<td>

		</td>
		<td rowspan="3">
				<?php echo smarty_function_sugar_getimage(array('name' => "blank.gif",'width' => '40','height' => '1','border' => '0'), $this);?>

		</td>
		<?php endif; ?>
	</tr>
	<?php endif; ?>
	<tr>
		<?php echo smarty_function_counter(array('assign' => 'hiddenCounter','start' => 0,'print' => false), $this);?>

		<?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['colNum'] => $this->_tpl_vars['data']):
?>
		<td valign='top' width='<?php echo $this->_tpl_vars['data']['width']; ?>
'>
			<ul class='noBullet' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
'>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b' style='height: 5px; margin-top:12px;' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
		        <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
				<li class='noBullet' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
'>
					<div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
' class='dashletPanel'>
						<?php echo $this->_tpl_vars['dashlet']['script']; ?>

					<?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

						<?php echo $this->_tpl_vars['dashlet']['display']; ?>

                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

                  </div>
				</li>
				<?php endforeach; endif; unset($_from); ?>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<?php echo smarty_function_counter(array(), $this);?>

		<?php endforeach; endif; unset($_from); ?>
	</tr>
</table>
	</div>

	<?php $_from = $this->_tpl_vars['divPages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['divPageIndex'] => $this->_tpl_vars['divPageNum']):
?>
	<div id="pageNum_<?php echo $this->_tpl_vars['divPageNum']; ?>
_div" style="display:none;">
	</div>
	<?php endforeach; endif; unset($_from); ?>

	<div id="addPageDialog" style="display:none;">
		<div class="hd"><?php echo $this->_tpl_vars['lblAddPage']; ?>
</div>
		<div class="bd">
			<form method="POST" action="index.php?module=Home&action=DynamicAction&DynamicAction=addTab&to_pdf=1">
				<label><?php echo $this->_tpl_vars['lblPageName']; ?>
: </label><input type="textbox" name="pageName" /><br /><br />
				<label><?php echo $this->_tpl_vars['lblNumberOfColumns']; ?>
:</label>
				<table align="center" cellpadding="8">
					<tr>
						<td align="center"><?php echo smarty_function_sugar_getimage(array('alt' => $this->_tpl_vars['app']['LBL_ICON_COLUMN_1'],'name' => "icon_Column_1.gif",'attr' => 'border="0"'), $this);?>
<br />
							<input type="radio" name="numColumns" value="1" /></td>
						<td align="center"><?php echo smarty_function_sugar_getimage(array('alt' => $this->_tpl_vars['app']['LBL_ICON_COLUMN_2'],'name' => "icon_Column_2.gif",'attr' => 'border="0"'), $this);?>
<br />
							<input type="radio" name="numColumns" value="2" checked="yes" /></td>
						<td align="center"><?php echo smarty_function_sugar_getimage(array('alt' => $this->_tpl_vars['app']['LBL_ICON_COLUMN_3'],'name' => "icon_Column_3.gif",'attr' => 'border="0"'), $this);?>
<br />
							<input type="radio" name="numColumns" value="3" /></td>
                    </tr>
				</table>
			</form>
		</div>
	</div>

	<div id="changeLayoutDialog" style="display:none;">
		<div class="hd"><?php echo $this->_tpl_vars['lblChangeLayout']; ?>
</div>
		<div class="bd">
			<label><?php echo $this->_tpl_vars['lblNumberOfColumns']; ?>
:</label>
			<br /><br />
			<table align="center" cellpadding="15">
				<tr>
					<td align="center">
						<?php ob_start(); ?>border="0"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('img_attr', ob_get_contents());ob_end_clean(); ?>
						<?php echo smarty_function_sugar_getlink(array('url' => "javascript:SUGAR.mySugar.changePageLayout(1);",'attr' => 'id="change_layout_1_column"','title' => $this->_tpl_vars['app']['LBL_ICON_COLUMN_1'],'img_name' => "icon_Column_1.gif",'img_attr' => $this->_tpl_vars['img_attr']), $this);?>

					</td>
					<td align="center">
					    <?php ob_start(); ?>border="0"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('img_attr', ob_get_contents());ob_end_clean(); ?>
						<?php echo smarty_function_sugar_getlink(array('url' => "javascript:SUGAR.mySugar.changePageLayout(2);",'attr' => 'id="change_layout_2_column"','title' => $this->_tpl_vars['app']['LBL_ICON_COLUMN_2'],'img_name' => "icon_Column_2.gif",'img_attr' => $this->_tpl_vars['img_attr']), $this);?>

					</td>
					<td align="center">
					    <?php ob_start(); ?>border="0"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('img_attr', ob_get_contents());ob_end_clean(); ?>
						<?php echo smarty_function_sugar_getlink(array('url' => "javascript:SUGAR.mySugar.changePageLayout(3);",'attr' => 'id="change_layout_3_column"','title' => $this->_tpl_vars['app']['LBL_ICON_COLUMN_3'],'img_name' => "icon_Column_3.gif",'img_attr' => $this->_tpl_vars['img_attr']), $this);?>

					</td>
				</tr>
			</table>
		</div>
	</div>

	<div id="dashletsDialog" style="display:none;">
		<div class="hd" id="dashletsDialogHeader"><a href="javascript:void(0)" onClick="javascript:SUGAR.mySugar.closeDashletsDialog();">
			<div class="container-close">&nbsp;</div></a><?php echo $this->_tpl_vars['lblAdd']; ?>

		</div>
		<div class="bd" id="dashletsList">
			<form></form>
		</div>

	</div>
				
	
</div>

<?php if ($this->_tpl_vars['view_tour']): ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function() {
SUGAR.tour.init({
    id: \'tour\',
    modals: modals,
    modalUrl: "index.php?module=Home&action=tour&to_pdf=1",
    prefUrl: "index.php?module=Users&action=UpdateTourStatus&to_pdf=true&viewed=true",
    className: \'whatsnew\',
    onTourFinish: function() {}
    });
});
</script>
'; ?>


<?php endif; ?>