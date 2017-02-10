<?php /* Smarty version 2.6.11, created on 2017-02-07 13:39:03
         compiled from custom/modules/J_Payment/tpl/convert_payment.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_number_format', 'custom/modules/J_Payment/tpl/convert_payment.tpl', 10, false),)), $this); ?>
<div id="diaglog_convert_payment" title="Convert Payment" style="display:none;">
    <table width="100%"  class="edit view">
        <tbody>
            <tr>
                <td width="50%">Convert To Payment Type :</td>
                <td width="50%"><b><?php echo $this->_tpl_vars['convertToPaymentType']; ?>
</b> <input name="cp_convert_to_type" id="cp_convert_to_type" type="hidden" value="<?php echo $this->_tpl_vars['convertToPaymentType']; ?>
"></td>
            </tr>
            <tr>
                <td>Total Amount :</td>
                <td><?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['payment_amount']['value']), $this);?>
</td>
            </tr>
            <tr>
                <td>Tuition Hours :<span style="color:red;">*</span></td>
                <td><input name="cp_tuition_hours" style="color: rgb(165, 42, 42);" size="10" id="cp_tuition_hours" type="text" value="<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['tuition_hours']['value']), $this);?>
"></td>
            </tr>
            <tr>
                <td>Remain Amount :</td>
                <td><?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['remain_amount']['value']), $this);?>
</td>
            </tr>
            <tr>
                <td>Remain Hours :<span style="color:red;">*</span></td>
                <td><input name="cp_remain_hours" style="color: rgb(165, 42, 42);" size="10" id="cp_remain_hours" type="text" value="<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['fields']['remain_hours']['value']), $this);?>
"></td>
            </tr>
            <tr>
                <td style="colspan=2">
                    <input type="button" id="btn_submit_convert" value="Submit"/>
                    <span id = "submit_convert_loading" style="display:none;">Saving..</span>
                </td>
            </tr>
        </tbody>
    </table>
</div>