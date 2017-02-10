<?php /* Smarty version 2.6.11, created on 2017-02-07 09:33:52
         compiled from themes/OnlineCRM-Blue/tpls/_head.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getscript', 'themes/OnlineCRM-Blue/tpls/_head.tpl', 21, false),)), $this); ?>

<!--Inheritance theme Racex: Add by MTN: 11/03/2015-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "themes/RacerX/tpls/_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>          

<!--Custom Theme: Add by MTN: 09/02/2015-->
<?php echo smarty_function_sugar_getscript(array('file' => "themes/OnlineCRM-Blue/js/customTheme.js"), $this);?>
