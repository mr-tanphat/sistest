<?php /* Smarty version 2.6.11, created on 2017-02-07 13:25:48
         compiled from custom/modules/J_Class/tpls/viewExport.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getjspath', 'custom/modules/J_Class/tpls/viewExport.tpl', 1, false),array('function', 'sugar_getscript', 'custom/modules/J_Class/tpls/viewExport.tpl', 2, false),)), $this); ?>
<link rel="stylesheet" type="text/css" href="<?php echo smarty_function_sugar_getjspath(array('file' => 'custom/modules/J_Class/css/showExport.css'), $this);?>
">
<?php echo smarty_function_sugar_getscript(array('file' => 'custom/modules/J_Class/js/showExport.js'), $this);?>

<div id="div_change_session" title="<?php echo $this->_tpl_vars['MOD']['BTN_EXPORT']; ?>
" style="display: none;" >
    <input type="hidden" value="<?php echo $this->_tpl_vars['CLASS_ID']; ?>
" id="classID">
    <input type="hidden" value="<?php echo $this->_tpl_vars['TEAMTYPE']; ?>
" id="team_type">
    <div id ="change_template">
        <label for="template" class="span5"><?php echo $this->_tpl_vars['MOD']['LBL_CHOOSE_TEMPLATE']; ?>
:</label>
        <?php if ($this->_tpl_vars['ISADULT'] == 1): ?>          
        <select name='template' id='template'>
            <option value="Thanks you Template">Thank you Template</option>
            <option value="Certificate Adult">Certificate Adult</option>
            <option value="In Course Report">In Course Report</option>            
        </select>
        <?php elseif ($this->_tpl_vars['TEAMTYPE'] == 'Adult'): ?>
        <select name='template' id='template'>
            <option value="-None-">--None--</option>
            <option value="Certificate Adult">Certificate Adult</option>
            <option value="In-Course Report Adult">In-Course Report Adult</option>
            <!--<option value="In Course Report">In Course Report</option>-->            
        </select>
        <label class="certificate_no" style="display: none;">
            Certificate No: 
        </label>
        <input type="text" id="certificate_no" class="certificate_no" style="display: none;" />
        <?php else: ?>
        <select name='template' id='template'>           
            <option value="Thanks you Template">Thank you Template</option>
            <option value="Certificate Junior">Certificate Junior</option>
            <option value="In Course Report">In Course Report</option>
        </select>
        <?php endif; ?>
    </div>
    <table class="studentList" id="tbl_change_session">
        <tbody>
            <?php if ($this->_tpl_vars['ISADULT'] == 1): ?>
                <tr style="vertical-align: top;">
                    <th><?php echo $this->_tpl_vars['MOD']['LBL_EXPORT_CHECK_ALL']; ?>
<br><input type="checkbox" id="checkAll"></th>
                    <th><?php echo $this->_tpl_vars['MOD']['LBL_EXPORT_STUDENT_NO']; ?>
</th>
                    <th><?php echo $this->_tpl_vars['MOD']['LBL_EXPORT_STUDENT_ID']; ?>
</th>
                    <th><?php echo $this->_tpl_vars['MOD']['LBL_EXPORT_STUDENT_NAME']; ?>
</th>
                </tr>
                <tr>
                    <td colspan="5"><hr></td>
                    
                </tr>
            <?php else: ?>               
                <tr style="vertical-align: top;">
                    <th><?php echo $this->_tpl_vars['MOD']['LBL_EXPORT_CHECK_ALL']; ?>
<br><input type="checkbox" id="checkAll"></th>
                    <th><?php echo $this->_tpl_vars['MOD']['LBL_EXPORT_STUDENT_NO']; ?>
</th>
                    <th><?php echo $this->_tpl_vars['MOD']['LBL_EXPORT_STUDENT_ID']; ?>
</th>
                    <th><?php echo $this->_tpl_vars['MOD']['LBL_EXPORT_STUDENT_NAME']; ?>
</th>
                </tr>
                <tr>
                    <td colspan="4"><hr></td>
                    
                </tr>
            <?php endif; ?>
            
            <?php echo $this->_tpl_vars['STUDENT_LIST']; ?>
    
        </tbody>
    </table>
</div>