<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once('include/MVC/View/views/view.detail.php');

    class C_InvoicesViewDetail extends ViewDetail {

        function C_InvoicesViewDetail(){
            parent::ViewDetail();
        }

        function display() {

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
            //Show tax rate - By Lap Nguyen
            $this->ss->assign('TAX_RATE', $this->bean->tax_rate*100);
            //Custom Pop-up create payment in invoice
            if($this->bean->status!='Cancel'){
                require_once('custom/modules/Opportunities/getElements.php');
                $q1 = "SELECT DISTINCT IFNULL(c_payments.id,'') primaryid ,c_payments.payment_amount c_payments_payment_amount ,c_payments.payment_attempt c_payments_payment_attempt ,IFNULL( c_payments.currency_id,'') C_PAYMENTS_PAYMENT_AMOF1CE92 ,IFNULL(c_payments.status,'') c_payments_status ,c_payments.payment_date c_payments_payment_date FROM c_payments INNER JOIN c_invoices_c_payments_1_c l1_1 ON c_payments.id=l1_1.c_invoices_c_payments_1c_payments_idb AND l1_1.deleted=0 INNER JOIN c_invoices l1 ON l1.id=l1_1.c_invoices_c_payments_1c_invoices_ida AND l1.deleted=0 WHERE (((l1.id='{$this->bean->id}' ))) AND c_payments.deleted=0 AND c_payments.remain=0 ORDER BY c_payments_payment_attempt ASC";
                $rs1 = $GLOBALS['db']->query($q1);
                while($r1 = $GLOBALS['db']->fetchByAssoc($rs1)){
                    if($r1['c_payments_status'] == "Unpaid"){
                        $button_html .= "<a id='{$r1['primaryid']}' class='payment-popup' payment-amount='{$r1['c_payments_payment_amount']}' style='text-decoration: none; cursor: pointer;'><span class='textbg_orange'>".format_number($r1['c_payments_payment_amount'],0,0)."</span></a> ";
                    }elseif($r1['c_payments_status'] == "Deleted"){
                        $button_html .= "<a style='text-decoration: none;' id='{$r1['primaryid']}' href='index.php?module=C_Payments&return_module=Opportunities&action=DetailView&record={$r1['primaryid']}'><span class='textbg_black'>".format_number($r1['c_payments_payment_amount'],0,0)."</span></a> ";        
                    }
                    else{
                        $button_html .= "<a style='text-decoration: none;' id='{$r1['primaryid']}' href='index.php?module=C_Payments&return_module=Opportunities&action=DetailView&record={$r1['primaryid']}'><span class='textbg_green'>".format_number($r1['c_payments_payment_amount'],0,0)."</span></a> ";     
                    }  
                }
                $this->ss->assign('BUTTON_HTML',$button_html);
                $this->ss->assign('PAYPOPUP', html('PAY')); 
            }
            $html ='';
            if(isset($this->bean->c_invoices_opportunities_1opportunities_idb)){                                                                                                                                                                                                      
                $html .= '<input class="button" type="button" value="'.$GLOBALS['mod_strings']['LBL_EXPORT_TO_EXCEL'].'" name="invoicevoucher" id="invoicevoucher" title="'.$GLOBALS['mod_strings']['LBL_EXPORT_TO_EXCEL'].'"></input>';
                //pop up
                $html .= '<link rel="stylesheet" href="modules/C_ConfigID/tpls/css/style_config.css"> 
                <div class="entry-form">
                <form name="configinfo_2" action="index.php?module=C_Invoices&action=sugarexcel&sugar_body_only=true" method="POST" id="configinfo_2"> 
                <table width="100%" class="table-list" border="0" cellpadding="4" cellspacing="0">
                <tr>
                <td colspan="2" align="right"><a href="#" id="close_ct_2" >Close</a></td>
                </tr>
                <tr>
                <td>'.$GLOBALS['mod_strings']['LBL_SERIAL_NUM'].':<span class="required">*</span> </td>
                <td><input value="'.$this->bean->serial_num.'" type="text" size="30" name="serial_num" id="serial_num" style="font-weight: bold;"></td>
                </tr>
                <tr>
                <td>'.$GLOBALS['mod_strings']['LBL_INVOICE_NUM'].' :<span class="required">*</span> </td>
                <td><input value="'.$this->bean->invoice_num.'" type="text" size="30" name="invoice_num" id="invoice_num" style="font-weight: bold;"></td>
                </tr>
                <tr>
                <tr>
                <td align="right">
                <input type="hidden" name="type_use" id="type_use" value=""></td>
                <input type="hidden" name="record_use_2" id="record_use_2" value=""></td>
                </td>
                <td><div class="action_buttons">
                <input title="'.$GLOBALS['mod_strings']['LBL_SAVE'].'" class="button" name="save_use" type="button" value="'.$GLOBALS['mod_strings']['LBL_SAVE'].'" id="save_use">  
                <input title="'.$GLOBALS['mod_strings']['LBL_PRINT'].'" class="button" name="print_use" type="button" value="'.$GLOBALS['mod_strings']['LBL_PRINT'].'" id="print_use">
                <input title="'.$GLOBALS['mod_strings']['LBL_SAVE_PRINT'].'" class="button primary" type="button" name="saveprint_use" value="'.$GLOBALS['mod_strings']['LBL_SAVE_PRINT'].'" id="saveprint_use">  

                <div class="clear"></div></div>
                </td>
                </tr>
                </table>
                </form>
                </div>';
                $this->ss->assign('EXPORT_EXCEL',$html);
            }

            //Invoice to Excel                                                                                                                                                                                                     
            //            $html_export = '<input class="button" type="submit" value="'.$GLOBALS['mod_strings']['LBL_EXPORT_TO_EXCEL'].'" name="export2excel" onclick="javascript:location.href=\'index.php?module=C_Invoices&action=sugarexcel&record='.$this->bean->id.'\'" title="'.$GLOBALS['mod_strings']['LBL_EXPORT_TO_EXCEL'].'"></input>';
            //            $this->ss->assign('EXPORT_EXCEL',$html_export);  
            parent::display();
        }

        function _displaySubPanels(){ 
            require_once ('include/SubPanel/SubPanelTiles.php'); 
            $subpanel = new SubPanelTiles($this->bean, $this->module); 

            /*Sub-Panel buttons hiding code*/ 
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['c_invoices_c_payments_1']['top_buttons'][0]);//hiding create payment
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['c_invoices_c_payments_1']['top_buttons'][1]);//hiding select payment 
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['c_invoices_c_invoicelines_1']);//hiding subpanel Invoiceline    
            echo $subpanel->display(); 
        }
    }
?>