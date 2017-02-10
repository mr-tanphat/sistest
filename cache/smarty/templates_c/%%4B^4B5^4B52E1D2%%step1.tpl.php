<?php /* Smarty version 2.6.11, created on 2017-02-07 15:03:26
         compiled from modules/Import/tpls/step1.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_help', 'modules/Import/tpls/step1.tpl', 69, false),)), $this); ?>

<?php echo '
<style>
#smtpButtonGroup .yui-button {
    padding-top: 10px;
}
#smtpButtonGroup .yui-radio-button-checked button, .yui-checkbox-button-checked button {
    background-color: #CCCCCC;
    color: #FFFFFF;
    text-shadow: none;
}


'; ?>

</style>
<?php if ($this->_tpl_vars['ERROR'] != ''): ?>
<span class="error"><?php echo $this->_tpl_vars['ERROR']; ?>
</span>
<?php endif;  echo $this->_tpl_vars['INSTRUCTION']; ?>


<form enctype="multipart/form-data" name="importstep1" method="post" action="index.php" id="importstep1">
<input type="hidden" name="module" value="Import">
<input type="hidden" name="action" value="Step2">
<input type="hidden" name="current_step" value="1">
<input type="hidden" name="external_source" value="">
<input type="hidden" name="from_admin_wizard" value="<?php echo $this->_tpl_vars['FROM_ADMIN']; ?>
">
<input type="hidden" name="import_module" value="<?php echo $this->_tpl_vars['IMPORT_MODULE']; ?>
">
<p>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td valign="top" width='100%' scope="row">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <?php if ($this->_tpl_vars['showModuleSelection']): ?>
                                <tr>
                                    <td align="left" scope="row" colspan="3"><h3><?php echo $this->_tpl_vars['MOD']['LBL_STEP_MODULE']; ?>
&nbsp;</h3></td>
                                </tr>
                                <tr>
                                    <td><select tabindex='4' name='admin_import_module' id='admin_import_module'><?php echo $this->_tpl_vars['IMPORTABLE_MODULES_OPTIONS']; ?>
</select></td>
                                </tr>
                                <tr>
                                    <td align="left" scope="row" colspan="3"><div class="hr">&nbsp;</div></td>
                                </tr>
                            <?php endif; ?>
                            <tr id="ext_source_help">
                                <td align="left" scope="row" colspan="3"><h3><?php echo $this->_tpl_vars['MOD']['LBL_WHAT_IS']; ?>
&nbsp;</h3></td>
                            </tr>
                            <tr id="ext_source_csv">
                                <td colspan="3" scope="row">
                                    <span><input class="radio" type="radio" name="source" value="csv" checked="checked" id="csv_source" />
                                  &nbsp;<label for="source"><?php echo $this->_tpl_vars['MOD']['LBL_CSV']; ?>
</label>&nbsp;</span><?php echo smarty_function_sugar_help(array('text' => $this->_tpl_vars['MOD']['LBL_DELIMITER_COMMA_HELP']), $this);?>

                                </td>
                            </tr>
                            <tr id="ext_source_tr">
                                <td colspan="3" scope="row"><span><input class="radio" type="radio" name="source" value="external" id="ext_source" />
                  &nbsp;<label for="source"><?php echo $this->_tpl_vars['MOD']['LBL_EXTERNAL_SOURCE']; ?>
</label>&nbsp;</span><?php echo smarty_function_sugar_help(array('text' => $this->_tpl_vars['MOD']['LBL_EXTERNAL_SOURCE_HELP']), $this);?>

                                </td>
                            </tr>
                            <tr scope="row" id="external_sources_tr" style="display:none;" >
                                <td colspan="2" width="35%" style="padding-top: 10px;">
                                    <div id="smtpButtonGroup" class="yui-buttongroup">
                                    <?php $_from = $this->_tpl_vars['EXTERNAL_SOURCES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
                                        <span id="<?php echo $this->_tpl_vars['k']; ?>
" class="yui-button yui-radio-button<?php if ($this->_tpl_vars['selectExternalSource'] == $this->_tpl_vars['k']): ?> yui-button-checked<?php endif; ?>">
                                            <span class="first-child">
                                                <button type="button" name="external_source_button" value="<?php echo $this->_tpl_vars['k']; ?>
">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['v']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;
                                                </button>
                                            </span>
                                        </span>
                                    <?php endforeach; endif; unset($_from); ?>

                                    </div>
                                </td>
                                <td  style="padding-top: 10px;">
                                    <input id="ext_source_sign_in_bttn" type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_EXT_SOURCE_SIGN_IN']; ?>
" style="display:none;vertical-align:top; !important">
                                </td>
                            </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</p>
<br>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td align="left"><input title="<?php echo $this->_tpl_vars['MOD']['LBL_NEXT']; ?>
"  class="button" type="submit" name="button" value="  <?php echo $this->_tpl_vars['MOD']['LBL_NEXT']; ?>
  "  id="gonext"></td>
    </tr>
</table>
</form>