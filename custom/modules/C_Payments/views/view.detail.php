<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class C_PaymentsViewDetail extends ViewDetail
{

	public function display()
	{
		global $timedate;
		if($this->bean->payment_method != 'CreditDebitCard'){
			$jspayment = '
			<script>
			$(document).ready(function(){
			$("#card_type").closest(\'tr\').hide();
			$("#expiration_date").closest(\'tr\').hide();
			});
			</script>';                                   
		}

		//Curency
		$currency = new Currency();
		if(isset($this->bean->currency_id) && !empty($this->bean->currency_id))
		{
			$currency->retrieve($this->bean->currency_id);
			if( $currency->deleted != 1){
				$this->ss->assign('CURRENCY', $currency->iso4217 .' '.$currency->symbol);
			}else {
				$this->ss->assign('CURRENCY', $currency->getDefaultISO4217() .' '.$currency->getDefaultCurrencySymbol());    
			}
		}else{
			$this->ss->assign('CURRENCY', $currency->getDefaultISO4217() .' '.$currency->getDefaultCurrencySymbol());
		}
		$this->ss->assign('JSPAYMENT',$jspayment);
		
		$html = "";
		if( (($this->bean->status == "Paid") && ($this->bean->payment_type == "Normal" || $this->bean->payment_type == "Deposit")) ){                                                                                                                                                                                                      
			$html .= '<input class="button" type="submit" value="'.$GLOBALS['mod_strings']['LBL_EXPORT_RECEIPT_VOUCHER'].'" name="receiptvoucher" onclick="javascript:location.href=\'index.php?module=C_Payments&action=receiptvoucher&record='.$this->bean->id.'\'" title="'.$GLOBALS['mod_strings']['LBL_EXPORT_RECEIPT_VOUCHER'].'"></input>';
			$html .= '<input class="button" type="button" value="'.$GLOBALS['mod_strings']['LBL_EXPORT_INVOICE_VOUCHER'].'" name="invoicevoucher" id="invoicevoucher" title="Input Serial and export"></input>';


			if(empty($this->bean->serial_num) && empty($this->bean->invoice_num)){
				$toggle_print   = 'style="display:none;"';
				$toggle_save    = '';
				$toggle_export  = ''; 
			}
			else{
				$toggle_print = '';
				$toggle_save  = '';
				$toggle_export  = 'style="display:none;"';    
			}  

			//pop up
			$html .= '<link rel="stylesheet" href="modules/C_ConfigID/tpls/css/style_config.css"> 
			<div class="entry-form" id = "entry-form_1">
			<form name="configinfo" action="index.php?module=C_Payments&action=invoicevoucher&sugar_body_only=true" method="POST" id="configinfo"> 
			<table width="100%" class="table-list" border="0" cellpadding="4" cellspacing="0">
			<tr>
			</tr>
			<tr>
			<td nowrap>'.$GLOBALS['mod_strings']['LBL_SERIAL_NUM'].':<span class="required">*</span> </td>
			<td nowrap>
			<input value="'.$this->bean->serial_num.'" type="text" size="40" name="serial_num" id="serial_num" style="font-weight: bold;">

			</td>
			</tr>
			<tr>
			<td nowrap>'.$GLOBALS['mod_strings']['LBL_INVOICE_NUM'].' :<span class="required">*</span> </td>
			<td nowrap><input value="'.$this->bean->invoice_num.'" type="text" size="40" name="invoice_num" id="invoice_num" style="font-weight: bold;">
			<span id = "invoice_num_ok" style = "color: red;"></span>
			</td>
			</tr>
			<tr> 
			<tr>
			<td align="right">
			<input type="hidden" name="type_use" id="type_use" value="">
			<input type="hidden" name="record_use" id="record_use" value="">
			</td> 
			<td>
			<div class="action_buttons">
			<input title="'.$GLOBALS['mod_strings']['LBL_SAVE'].'" class="button" name="save_use" type="button" value="'.$GLOBALS['mod_strings']['LBL_SAVE'].'" id="save_use" '.$toggle_save.'>  
			<input title="'.$GLOBALS['mod_strings']['LBL_PRINT'].'" class="button primary" name="print_use" type="button" value="'.$GLOBALS['mod_strings']['LBL_PRINT'].'" id="print_use" '.$toggle_print.'>  
			<input title="'.$GLOBALS['mod_strings']['LBL_SAVE_PRINT'].'" class="button primary" type="button" name="saveprint_use" value="'.$GLOBALS['mod_strings']['LBL_SAVE_PRINT'].'" id="saveprint_use" '.$toggle_export.'>  

			<div class="clear"></div></div>
			</td>
			</tr>
			</table>
			</form>
			</div>';
			$this->ss->assign('PAYMENTEXPORT',$html);
		}
		if(  ( $this->bean->payment_type == 'Moving in' || $this->bean->payment_type == 'Transfer in' || $this->bean->payment_type == 'FreeBalance') && unformat_number($this->bean->remain) > 0){
			//Convert to Revenue - Pop up
			if(ACLController::checkAccess('C_Payments', 'import', true)){
				$read_only = 'readonly';
				$bt_chosse_date = '<img src="themes/Sugar/images/jscalendar.png" alt="Enter Date" style="position:relative; top:6px" border="0" id="to_revenue_date_trigger">';    
			}else{
				$read_only = 'readonly';
				$bt_chosse_date = '<br><br><p style="color:red;">Only IT, BOD, ACCOUNTANT can change the convert date!</p>';   
			}

			$pop_reve = '<input class="button" type="button" value="Drop To Revenue" name="drop_to_revenue" id="drop_to_revenue" title="Drop To Revenue">';

			$pop_reve .= '<link rel="stylesheet" href="modules/C_ConfigID/tpls/css/style_config.css"> 
			<div class="entry-form" id = "entry-form_2">
			<form name="convert_to_revenue_frm" action="index.php?module=C_Payments&action=convert_to_revenue" method="POST" id="convert_to_revenue_frm"> 
			<table width="100%" class="table-list" border="0" cellpadding="4" cellspacing="0">
			<tr>
			</tr>
			<tr>
			<td nowrap>'.$GLOBALS['mod_strings']['LBL_CONVERT_TO_REVENUE'].':<span class="required">*</span> </td>
			<td nowrap>
			<div id="div_date_3">
			<span class="dateTime">
			<input class="date_input" '.$read_only.' autocomplete="off" type="text" name="to_revenue_date" id="to_revenue_date" value="'.$timedate->nowDate().'" size="11" maxlength="10">
			'.$bt_chosse_date.'
			</span>
			</td>

			<tr>
			<tr>
			<td align="right">
			<input type="hidden" name="record_use_2" id="record_use_2" value="">
			</td>

			<td>
			<div class="action_buttons">
			<input title="'.$GLOBALS['mod_strings']['LBL_CONVERT_BT'].'" class="button primary" type="button" value="'.$GLOBALS['mod_strings']['LBL_CONVERT_BT'].'" id="convert_to_revenue_bt">  
			<input title="'.$GLOBALS['mod_strings']['LBL_CANCEL_BT'].'" class="button" type="button" value="'.$GLOBALS['mod_strings']['LBL_CANCEL_BT'].'" id="cancel_bt_2">  

			<div class="clear"></div></div>
			</td>
			</tr>
			</table>
			</form>
			</div>';
			$this->ss->assign('CONVERT_TO_REVENUE',$pop_reve);
		}

		if($this->bean->payment_type == 'Moving in' || $this->bean->payment_type == 'Transfer in'){
			unset($this->dv->defs['templateMeta']['form']['buttons'][1]); 
		}

		$field_date = '<span id="date_text_span">'.$this->bean->payment_date.'</span>';
		
		require_once('custom/include/_helper/class_utils.php'); 
		if ( ACLController::checkAccess('Opportunities', 'edit', true) && checkDataLockDate($this->bean->payment_date) ){
			$field_date .= '
			<div id="div_date_1">
			<input class="button" type="button" id="edit_date" value="Edit" style="padding: 2px;margin-bottom: 5px;"> 
			</div>';
			$field_date .= '<div id="div_date_2" style="display: none;">
			<span class="dateTime">
			<input class="date_input" autocomplete="off" type="text" name="date_text" id="date_text" value="'.$this->bean->payment_date.'" size="11" maxlength="10">
			<img src="themes/Sugar/images/jscalendar.png" alt="Enter Date" style="position:relative; top:6px" border="0" id="date_text_trigger">
			</span>
			<input class="button primary" type="button" id="save_date" value="Save" style="padding: 2px;margin-bottom: 5px;"></div>';   
		}

		$this->ss->assign('FIELD_DATE',$field_date);

		// Edit by Bui Kim Tung

		if ($this->bean->payment_type == 'Transfer in' ) $this->ss->assign('LBL_STUDENT','To Student:');    
		else $this->ss->assign('LBL_STUDENT','Student:');    

		//-- End edit by Bui Kim Tung

		parent::display();   
	}
}
