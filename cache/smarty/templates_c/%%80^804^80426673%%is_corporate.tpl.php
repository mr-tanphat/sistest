<?php /* Smarty version 2.6.11, created on 2017-02-07 13:26:44
         compiled from custom/modules/J_Payment/tpl/is_corporate.tpl */ ?>
<fieldset id="vat-corp-info" class="fieldset-border" style="width: 90%; display: none;">
<table>
<tbody>
<tr>
<td valign="top" width="12.5%" scope="col">Company Name:<span class="required">*</span></td>
<td valign="top" width="37.5%" nowrap>
<input type="text" size="15" name="account_name" id="account_name" class="yui-ac-input" value="<?php echo $this->_tpl_vars['fields']['company_name']['value']; ?>
">
<input type="hidden" name="account_id" id="account_id" value="<?php echo $this->_tpl_vars['fields']['account_id']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_account_name" id="btn_account_name" class="button" class="button firstChild"><img src="themes/default/images/id-ff-select.png"></button>
<button type="button" name="btn_clr_account_name" style="margin-left: 0px;" id="btn_clr_account_name" class="button lastChild"><img src="themes/default/images/id-ff-clear.png"></button>
</span></td>
 <td valign="top" width="12.5%" scope="col">Name in<br>VAT<br>Invoice: <span class="required">*</span></td>                 
<td valign="top" width="37.5%">
<input type="text" name="company_name" id="company_name" size="15" value="<?php echo $this->_tpl_vars['fields']['company_name']['value']; ?>
">
</td>
</tr>
<tr>
<td valign="top" width="12.5%" scope="col">Address: <span class="required">*</span></td>
<td valign="top" width="37.5%">
<textarea cols="24" rows="2" name="company_address" id="company_address"><?php echo $this->_tpl_vars['fields']['company_address']['value']; ?>
</textarea>
</td>
<td valign="top" width="12.5%" scope="col">Tax Code: <span class="required">*</span></td>
<td valign="top" width="37.5%">
<input type="text" name="tax_code" id="tax_code" size="15" value="<?php echo $this->_tpl_vars['fields']['tax_code']['value']; ?>
">
</td>
</tr>
</tbody>
</table>
</fieldset>