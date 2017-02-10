<?php /* Smarty version 2.6.11, created on 2017-02-07 09:33:52
         compiled from themes/RacerX/tpls/_head.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getjspath', 'themes/RacerX/tpls/_head.tpl', 32, false),array('function', 'sugar_getscript', 'themes/RacerX/tpls/_head.tpl', 40, false),array('function', 'sugar_getimagepath', 'themes/RacerX/tpls/_head.tpl', 99, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html <?php echo $this->_tpl_vars['langHeader']; ?>
>
<head>
    <link rel="SHORTCUT ICON" href="<?php echo $this->_tpl_vars['FAVICON_URL']; ?>
">
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['APP']['LBL_CHARSET']; ?>
">
    <title><?php echo $this->_tpl_vars['SYSTEM_NAME']; ?>
</title>
    <meta http-equiv="cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <?php echo $this->_tpl_vars['SUGAR_CSS']; ?>


    <?php if ($this->_tpl_vars['AUTHENTICATED']): ?>
    <link rel='stylesheet' type="text/css" href='<?php echo smarty_function_sugar_getjspath(array('file' => "include/ytree/TreeView/css/folders/tree.css"), $this);?>
'/>
    <link rel='stylesheet' type="text/css" href='<?php echo smarty_function_sugar_getjspath(array('file' => "include/SugarCharts/Jit/css/base.css"), $this);?>
'/>
    <link rel="stylesheet" type="text/css" href="<?php echo smarty_function_sugar_getjspath(array('file' => 'custom/include/javascripts/MultipleSelect/multiple-select.css'), $this);?>
"/>
    <link rel="stylesheet" type="text/css" href="<?php echo smarty_function_sugar_getjspath(array('file' => 'custom/include/css/CustomStyle.css'), $this);?>
"/>
    <link rel="stylesheet" type="text/css" href="<?php echo smarty_function_sugar_getjspath(array('file' => "custom/include/javascripts/alertifyjs/alertify.min.css"), $this);?>
"/>
    <link rel="stylesheet" type="text/css" href="<?php echo smarty_function_sugar_getjspath(array('file' => 'custom/include/javascripts/Spinner/Spinner.css'), $this);?>
"/>
    <?php endif; ?>
    <?php echo $this->_tpl_vars['SUGAR_JS']; ?>

    <?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/alertifyjs/alertify.min.js"), $this);?>

    <?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/CustomDCMenu.js"), $this);?>

    <?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/DCBoxFix.js"), $this);?>

    <?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/CustomSubpanel.js"), $this);?>

    <?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/currency_fm.js"), $this);?>

    <?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/Numeric.js"), $this);?>

    <?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/DateJS/date.js"), $this);?>

    <?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/CursorPosition.js"), $this);?>


    <?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/StringUtil.js"), $this);?>

    <?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/MultipleSelect/jquery.multiple.select.js"), $this);?>

    <?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/CustomMultiSelectFields.js"), $this);?>


    <?php echo smarty_function_sugar_getscript(array('file' => "custom/modules/C_DuplicationDetection/js/DuplicationDetectionHandler.js"), $this);?>

    <?php echo smarty_function_sugar_getscript(array('file' => "custom/modules/C_HelpTextConfig/js/HelpTextConfigHandler.js"), $this);?>

    <?php echo smarty_function_sugar_getscript(array('file' => "custom/modules/C_FieldHighlighter/js/FieldHighlighterHandler.js"), $this);?>


    <?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/Spinner/Spinner.js"), $this);?>

    <?php echo '
    <script type="text/javascript">
    //LOCK-DATA VARIABLE - Add By Lap Nguyen
     var sugar_config_lock_info     = \'';  echo $this->_tpl_vars['sugar_config_lock_info'];  echo '\';
     var sugar_config_lock_date     = \'';  echo $this->_tpl_vars['sugar_config_lock_date'];  echo '\';
     var except_lock_for_user_name  = \'';  echo $this->_tpl_vars['except_lock_for_user_name'];  echo '\';
     var current_user_name          = \'';  echo $this->_tpl_vars['current_user_name'];  echo '\';
     var is_admin                   = \'';  echo $this->_tpl_vars['is_admin'];  echo '\';
     var max_tabs 				    = \'';  echo $this->_tpl_vars['default_max_tabs'];  echo '\';
    </script>
    '; ?>

    <?php echo smarty_function_sugar_getscript(array('file' => "themes/RacerX/js/utils.js"), $this);?>


    <?php echo '
    <style type="text/css" id="jstree-stylesheet">
        .input_readonly, .input_readonly:focus{
        background-color: rgb(221, 221, 221);
        color: rgb(165, 42, 42);
        }
        option[value=\'not_empty\'] {
            font-weight: bold;
        }
        .curency_readonly, .curency_readonly:focus{
        font-weight: bold;
        color: rgb(165, 42, 42);
        text-align: right;
        background-color: rgb(221, 221, 221);
        }
		.vr {
	display: inline;
    height: 30px;
    width: 0px;
    border: 1px dashed #cccccc;
    margin-left: 10px;
    margin-right: 10px;
    float: left;
    		}
    </style>
    <script type="text/javascript">
        <!--
        SUGAR.themes.theme_name      = \'';  echo $this->_tpl_vars['THEME'];  echo '\';
        SUGAR.themes.hide_image      = \'';  echo smarty_function_sugar_getimagepath(array('file' => "hide.gif"), $this); echo '\';
        SUGAR.themes.show_image      = \'';  echo smarty_function_sugar_getimagepath(array('file' => "show.gif"), $this); echo '\';
        SUGAR.themes.loading_image      = \'';  echo smarty_function_sugar_getimagepath(array('file' => "img_loading.gif"), $this); echo '\';
        if ( YAHOO.env.ua )
        UA = YAHOO.env.ua;
        -->
    </script>
    '; ?>

    <?php if ($_GET['action'] != 'repair'): ?><script type="text/javascript" src="index.php?entryPoint=GetJSLanguage"></script><?php endif; ?>
</head>