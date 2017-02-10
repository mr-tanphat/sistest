<?php /* Smarty version 2.6.11, created on 2017-02-07 13:39:03
         compiled from custom/modules/J_Payment/tpl/paymentTemplate.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'custom/modules/J_Payment/tpl/paymentTemplate.tpl', 9, false),)), $this); ?>

<div class="diaglog_payment" title="Collect money" style="display:none;">
    <table width="100%"  class="payment_detail">
        <tbody>
        <input type="hidden" id="dt_payment_detail_id" value>
            <tr style="height: 50px;">
                <td><b> <?php echo $this->_tpl_vars['MOD']['LBL_PAYMENT_METHOD']; ?>
:</b> <span class="required">*</span> </td>
                <td style="color: blue;font-weight: bold" colspan="3" id="dt_payment_method">
                <?php echo smarty_function_html_options(array('name' => 'payment_method','id' => 'payment_method','options' => $this->_tpl_vars['fields']['payment_method']['options']), $this);?>

                </td>
            </tr>
            <tr>
             <td></td>
             <td>
             <?php echo smarty_function_html_options(array('style' => "display: none;",'name' => 'card_type','id' => 'card_type','options' => $this->_tpl_vars['card_type'],'selected' => $this->_tpl_vars['fields']['card_type']['value']), $this);?>

             <?php echo smarty_function_html_options(array('style' => "display: none;",'name' => 'bank_type','id' => 'bank_type','options' => $this->_tpl_vars['bank_type'],'selected' => $this->_tpl_vars['fields']['card_type']['value']), $this);?>

             <input tabindex="0" style="display: none;" type="text" name="method_note" id="method_note" size="20" maxlength="100" value="" title="Note" db-data="">
             </td>
            </tr>
            <tr style="height: 50px;">
                <td style="vertical-align: middle; width: 150px;"><b><?php echo $this->_tpl_vars['MOD']['LBL_PAYMENT_AMOUNT']; ?>
:</b></td>
                <td>
                    <input class="input_readonly" size="20" autocomplete="off" type="text"  maxlength="10" name="dt_payment_amount" id="dt_payment_amount" readonly />
                </td>
            </tr>
            <tr style="height: 50px;">
                <td style="vertical-align: middle; width: 150px;"><b><?php echo $this->_tpl_vars['MOD']['LBL_INVOICE_DATE']; ?>
:</b> <span class="required">*</span></td>
                <td width="30%"><span class="dateTime"><input disabled name="payment_date_collect" size="10" id="payment_date_collect" type="text" value="<?php echo $this->_tpl_vars['today']; ?>
">  <img border="0" src="custom/themes/default/images/jscalendar.png" alt="Enter Date" id="payment_date_trigger" align="absmiddle"></span></td>
            </tr>
            <tr style="height: 50px;">
                <td style="text-align: center" colspan="4">
                    <input type="button" class="button primary" action="save" id="btn_dt_save" value="Save"></input>
<!--                    <input type="button" class="button primary" action="save_get_vat" id="btn_dt_save_get_vat" value="Save & Get VAT No"></input>-->
                    <input type="button" id="btn_dt_cancel" value="Cancel"></input>
                    <span id = "save_loading" style="display:none;">Loading.. <img src="custom/include/images/loader.gif" align="absmiddle" width="16"></span>
                </td>
            </tr>
        </tbody>
    </table>                                                   
</div>