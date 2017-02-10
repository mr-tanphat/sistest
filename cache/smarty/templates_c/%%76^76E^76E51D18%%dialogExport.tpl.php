<?php /* Smarty version 2.6.11, created on 2017-02-07 13:20:20
         compiled from custom/modules/Contacts/tpls/dialogExport.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getjspath', 'custom/modules/Contacts/tpls/dialogExport.tpl', 1, false),array('function', 'sugar_getscript', 'custom/modules/Contacts/tpls/dialogExport.tpl', 2, false),)), $this); ?>
<link rel="stylesheet" type="text/css" href="<?php echo smarty_function_sugar_getjspath(array('file' => 'custom/modules/Contacts/css/dialogExport.css'), $this);?>
">
<?php echo smarty_function_sugar_getscript(array('file' => 'custom/modules/Contacts/js/dialogExport.js'), $this);?>

    <div id="div_dialog_export" title="<?php echo $this->_tpl_vars['MOD']['BTN_EXPORT_FORM']; ?>
" style="display: none;" >
    <div id ="change_template">
        <input type="hidden" id="default_template" value="<?php echo $this->_tpl_vars['DEFAULT_TEMPLATE']; ?>
"></input>
        <label for="template" class="span5"><?php echo $this->_tpl_vars['MOD']['LBL_CHOOSE_TEMPLATE']; ?>
:</label>
        <select name='slc_template' id='slc_template'>
            <option value="AD_PremiumRegistration_Form_DN.docx">AD_PremiumRegistration_Form_DN.docx</option>
            <option value="AD_PremiumRegistration_Form_HP.docx">AD_PremiumRegistration_Form_HP.docx</option>
            <option value="AD_Registration_Form_DN.docx">AD_Registration_Form_DN.docx</option>
            <option value="AD_Registration_Form_HP.docx">AD_Registration_Form_HP.docx</option>
            <option value="Junior_PremiumRegistration_Forms_HN.docx">Junior_PremiumRegistration_Forms_HN.docx</option>
            <option value="Junior_PremiumRegistration_Forms_Nationwide.docx">Junior_PremiumRegistration_Forms_Nationwide.docx</option>
            <option value="Junior_Registration_Forms_Nationwide.docx">Junior_Registration_Forms_Nationwide.docx</option>
        </select>
    </div>
</div>