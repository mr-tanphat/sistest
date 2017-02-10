<?php /* Smarty version 2.6.11, created on 2017-02-07 13:25:48
         compiled from custom/modules/J_Class/tpls/export_attendance_dialog.tpl */ ?>
<div id="diaglog_export_attendance" title="Export Attendance List" style="display: none;">
    <table width="100%"  class="edit view">
        <tbody>
            <tr>
                <td style="width:25%;"><?php echo $this->_tpl_vars['MOD']['LBL_CLASS_CODE']; ?>
: </td>
                <td style="width:30%;" id="ot_class_code" style="color: blue;font-weight: bold"><?php echo $this->_tpl_vars['fields']['class_code']['value']; ?>
</td>
                <td style="width:20%;"><?php echo $this->_tpl_vars['MOD']['LBL_START_DATE']; ?>
: </td>
                <td style="width:30%;" id="ot_start_class"><?php echo $this->_tpl_vars['fields']['start_date']['value']; ?>
</td>
            </tr>
            <tr>
                <td><?php echo $this->_tpl_vars['MOD']['LBL_NAME']; ?>
: </td>
                <td id="ot_class_name" style="color: blue;font-weight: bold"><?php echo $this->_tpl_vars['fields']['name']['value']; ?>
</td>
                
                <td><?php echo $this->_tpl_vars['MOD']['LBL_END_DATE']; ?>
: </td>
                <td id="ot_end_class"><?php echo $this->_tpl_vars['fields']['end_date']['value']; ?>
</td>
            </tr>
            <tr>
            <td><?php echo $this->_tpl_vars['MOD']['LBL_MAIN_SCHEDULE']; ?>
: </td>
            <td colspan="3" id="ot_schedule"><?php echo $this->_tpl_vars['SCHEDULE']; ?>
</td>
            </tr>
            <tr>
                <td><?php echo $this->_tpl_vars['MOD']['BTN_EXPORT_FROM_LESSON']; ?>
:<span style="color:red;">*</span></td></td>
                <td>
                    <select id="export_from_lesson"><?php echo $this->_tpl_vars['LESSON_LIST']; ?>
</select>
                </td>
 
                <td><?php echo $this->_tpl_vars['MOD']['BTN_EXPORT_TO_LESSON']; ?>
: </td>
                <td id="total_sessions_text">
                    <select id="export_to_lesson"><?php echo $this->_tpl_vars['LESSON_LIST']; ?>
</select>
                </td>
            </tr>
        </tbody>
    </table>
</div>