<?php /* Smarty version 2.6.11, created on 2017-02-07 13:25:48
         compiled from custom/modules/J_Class/tpls/demo_template.tpl */ ?>
<div id="diaglog_demo" title="Add Demo" style="display:none;">
    <table width="100%"  class="edit view">
        <tbody>
        <input type="hidden" id="dm_type_student" value="<?php echo $this->_tpl_vars['dm_student_type']; ?>
">
        <input type="hidden" id="dm_student_id" value="<?php echo $this->_tpl_vars['dm_student_id']; ?>
">
            <tr>
                <td> <?php echo $this->_tpl_vars['MOD']['LBL_STUDENT_NAME']; ?>
: </td>
                <td style="color: blue;font-weight: bold" colspan="3" id="dm_student_name"><?php echo $this->_tpl_vars['dm_student_name']; ?>
</td>
            </tr>
            <tr>
            <td><?php echo $this->_tpl_vars['MOD']['LBL_CLASS_CODE']; ?>
: </td>
            <td id="dm_class_code" style="color: blue;font-weight: bold"><?php echo $this->_tpl_vars['fields']['class_code']['value']; ?>
</td>
            <td><?php echo $this->_tpl_vars['MOD']['LBL_START_DATE']; ?>
: </td>
            <td id="dm_start_date"><?php echo $this->_tpl_vars['fields']['start_date']['value']; ?>
</td>
            </tr>
            <tr>
            <td><?php echo $this->_tpl_vars['MOD']['LBL_NAME']; ?>
: </td>
            <td id="dm_class_name_demo" style="color: blue;font-weight: bold"><?php echo $this->_tpl_vars['fields']['name']['value']; ?>
</td>
            <td><?php echo $this->_tpl_vars['MOD']['LBL_END_DATE']; ?>
: </td>
            <td id="dm_end_date"><?php echo $this->_tpl_vars['fields']['end_date']['value']; ?>
</td>
            </tr>
            <tr>
            <td><?php echo $this->_tpl_vars['MOD']['LBL_MAIN_SCHEDULE']; ?>
: </td>
            <td id="dm_schedule"><?php echo $this->_tpl_vars['SCHEDULE']; ?>
</td>
            </tr>
            <tr>
            <td><?php echo $this->_tpl_vars['MOD']['LBL_LESSON_DATE']; ?>
:</td>
            <td><span class="dateTime"><input disabled id="dm_lesson_date" name="dm_lesson_date" size="10" type="text" value="<?php echo $this->_tpl_vars['today']; ?>
">  <img border="0" src="custom/themes/default/images/jscalendar.png" alt="Enter Date" id="dm_lesson_date_trigger" align="absmiddle"></span></td>
            </tr>
            <tr>
                <td style="colspan=4;">
                    <input type="button" id="btn_add_demo" value="Add"/>
                    <span id = "add_demo_loading" style="display:none;">Loading.. <img src="custom/include/images/loader.gif" align="absmiddle" width="16"></span>
                </td>
            </tr>
        </tbody>
    </table>
</div>