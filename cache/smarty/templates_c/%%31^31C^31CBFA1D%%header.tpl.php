<?php /* Smarty version 2.6.11, created on 2017-02-07 09:33:52
         compiled from themes/OnlineCRM-Blue/tpls/header.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "themes/OnlineCRM-Blue/tpls/_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body class="yui-skin-sam">
    <a name="top"></a>
    <div style="position:fixed;top:0;left:0;width:1px;height:1px;z-index:21;"></div>
    <?php if (! $this->_tpl_vars['ISPRINT']): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "themes/OnlineCRM-Blue/tpls/_dcmenu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>

	<div class="clear"></div>
    <div class="clear"></div>

<?php echo '
<iframe id=\'ajaxUI-history-iframe\' src=\'index.php?entryPoint=getImage&imageName=blank.png\'  title=\'empty\'  style=\'display:none\'></iframe>
<input id=\'ajaxUI-history-field\' type=\'hidden\'>
<script type=\'text/javascript\'>
if (SUGAR.ajaxUI && !SUGAR.ajaxUI.hist_loaded)
{
	YAHOO.util.History.register(\'ajaxUILoc\', "", SUGAR.ajaxUI.go);
	';  if ($_REQUEST['module'] != 'ModuleBuilder'): ?>	YAHOO.util.History.initialize("ajaxUI-history-field", "ajaxUI-history-iframe");
	<?php endif;  echo '
}
</script>
'; ?>

<script>
var max_tabs = <?php echo $this->_tpl_vars['max_tabs']; ?>
;
</script>

<div id="main">
    <div id="content">
        <?php if ($this->_tpl_vars['use_table_container']): ?>
        <table style="width:100%" id="contentTable"><tr><td>
        <?php endif; ?>