<?php
class DisplayButtonLogicHook{
    function displayButton($bean, $event, $arguments) {
        if ($_REQUEST['module']=='J_Payment'){
            require_once('custom/include/_helper/class_utils.php');
            $bean->custom_button = '<div style="display: inline-flex;">';

            if($bean->status == 'Unpaid'){
                $bean->custom_button .= '<button style="width: 100px;height: 46px;" type="button" payment_detail_id="'.$bean->id.'" payment_detail_amount="'.format_number($bean->payment_amount,0,0).'" class="pay" onclick="pay(this);"><img src="custom/themes/default/images/cash_icon.png" align="absmiddle" border="0"> &nbsp; Pay </button> &nbsp;&nbsp;';
            }
            //Button get invoice no
            if($bean->status == 'Paid'){
                if(empty($bean->invoice_number)){
                    $bean->custom_button .= '<button style="width: 70px;height: 46px;" payment_method="'.$bean->payment_method.'" payment_detail_amount="'.format_number($bean->payment_amount,0,0).'" payment_date="'.$bean->payment_date.'" card_type="'.$bean->card_type.'" bank_type="'.$bean->bank_type.'" onclick = \'edit_invoice(this)\' payment_detail_id="'.$bean->id.'"><img src="index.php?entryPoint=getImage&themeName=OnlineCRM-Green&imageName=edit_inline.png" align="absmiddle" border="0">  Edit</button>&nbsp;&nbsp;';
                    $bean->custom_button .= '<button style="width: 120px;height: 46px;" payment_detail_id="'.$bean->id.'" class="get_invoice" onclick = \'get_invoice("'.$bean->id.'")\'><img src="index.php?entryPoint=getImage&amp;themeName=OnlineCRM-Green&amp;imageName=CreateContracts.gif" align="absmiddle" border="0"> Get Invoice No &nbsp;&nbsp;</button>';
                }else{
                    $bean->custom_button .= '<button class="button primary" style="width: 100px;height: 46px;" type="button" payment_detail_id="'.$bean->id.'" class="button" onclick="ex_invoice(this);"><img src="index.php?entryPoint=getImage&amp;themeName=OnlineCRM-Green&amp;imageName=Print_Email.gif" align="absmiddle" border="0">  Preview</button>&nbsp;&nbsp;';
                    if($bean->is_release != 1 && checkDataLockDate($bean->payment_date) && ACLController::checkAccess('J_Payment', 'edit')){
                        $sql = "SELECT id
                        FROM j_configinvoiceno
                        WHERE pmd_id_printing = '{$bean->id}'
                        AND team_id= '{$bean->team_id}'
                        AND deleted = 0
                        AND finish_printing = 0";
                        $check_printing = $GLOBALS['db']->getOne($sql);
                        if(!empty($check_printing)){
                            $bean->custom_button .= '<button style="width: 150px;height: 46px;" configinvoiceno_id="'.$check_printing.'" class="btn_finish_printing" onclick = \'finish_printing("'.$check_printing.'")\'><img src="index.php?entryPoint=getImage&themeName=default&imageName=checkedd.png" style="width: 18px;" align="absmiddle" border="0"> <b>Finish Printing</b></button>';
                        }else{
                            $bean->custom_button .= '<button style="width: 100px;height: 46px;" payment_detail_id="'.$bean->id.'" class="cancel_invoice" onclick = \'cancel_invoice("'.$bean->id.'")\'><img src="index.php?entryPoint=getImage&themeName=OnlineCRM-Green&imageName=delete_inline.png" align="absmiddle" border="0">  Void</button>';
                        }
                    }
                }

            }
            $bean->custom_button .= '</div>';

            //Button edit invoice no
            if (!empty($bean->invoice_number)){
                $sqlConfInvoice = "SELECT id, release_list  FROM j_configinvoiceno WHERE deleted <> 1 AND team_id = '{$bean->team_id}'";
                $res     = $GLOBALS['db']->query($sqlConfInvoice);
                $r       = $GLOBALS['db']->fetchByAssoc($res);
                if($r['release_list'] != ""){
                    $releaseList = json_decode(html_entity_decode($r['release_list']),true);
                }
                else $releaseList = array();

                //Truong hop da release
                if ($bean->is_release == 1){
                    $reloadImage = ' &nbsp<a onclick="reloadReleaseOptions();" id="btn_reload_invoice" title="Reload list release VAT No"><i style="font-size: 20px;cursor: pointer;" class="icon icon-refresh"></i></a>';
                    $saveImage = ' &nbsp<a onclick="saveInvoiceNo($(this).closest(\'tr\'))" id="btn_save_invoice" title="Reload list release VAT No"><i style="font-size: 20px;cursor: pointer;" class="icon icon-download-alt"></i></a>';

                    $invoiceOptions = "";
                    if (in_array($bean->invoice_number,$releaseList))
                        $invoiceOptions .= "<option selected value='{$bean->invoice_number}'>{$bean->invoice_number}</option>";
                    foreach($releaseList as $invoiceNo){
                        if ($invoiceNo == $bean->invoice_number) continue;
                        $invoiceOptions .= "<option value='{$invoiceNo}'>{$invoiceNo}</option>";
                    }
                    $bean->invoice_number = "<div style='display: inline-flex;'>";
                    $bean->invoice_number .= "<select class='select_invoice_no'>".$invoiceOptions."</select>";

                    $bean->invoice_number .= "<input type='hidden' class='pay_dtl_id' value='".$bean->id."'/>";
                    $bean->invoice_number .= $saveImage;
                    $bean->invoice_number .= $reloadImage;
                    $bean->invoice_number .= "</div>";

                }else{ //Truong hop binh thuong
                    if(checkDataLockDate($bean->payment_date)){
                        $cancelImage = ' &nbsp<a onclick="releaseInvoiceNo($(this).closest(\'tr\'))" id="btn_release_invoice" title="Release VAT No"><i style="font-size: 20px;cursor: pointer;" class="icon icon-edit"></i></a>';
                        $bean->invoice_number = "<div style='display: inline-flex;'><span class='span_invoice_no'>".$bean->invoice_number."</span>";
                        $bean->invoice_number .= "<input type='hidden' class='pay_dtl_id' value='".$bean->id."'/>";
                        $bean->invoice_number .= $cancelImage;
                        $bean->invoice_number .= "</div>";
                    }
                }
            }
        }
    }

    function handleBeforeSave($bean, $event, $arguments){
        if( ($_POST['module'] == $bean->module_name && $_POST['action'] == 'Save') || ($_POST['module'] == 'Import')){
            $_fee = 0;
            if($bean->payment_method == 'Card')
                $_fee  = floatval($GLOBALS['app_list_strings']['card_rate'][$bean->card_type]) * $bean->payment_amount / 100;
            elseif($bean->payment_method == 'Bank Transfer'){
                $_fee  = floatval($GLOBALS['app_list_strings']['bank_rate'][$bean->card_type]) * $bean->payment_amount / 100;
            }
            $bean->payment_method_fee = $_fee;
            $bean->numeric_vat_no  = $bean->invoice_number;
        }

    }

    function handleAfterSave($bean, $event, $arguments){
        require_once("custom/include/_helper/junior_revenue_utils.php");
        if(($_POST['module'] == $bean->module_name && $_POST['action'] == 'Save')){
            //Update Sale Type
            $q1 = "SELECT IFNULL(SUM(j_paymentdetail.payment_amount), 0) payment_amount_paid,
            l1.payment_amount payment_amount,
            l1.sale_type sale_type
            FROM j_paymentdetail
            INNER JOIN
            j_payment l1 ON j_paymentdetail.payment_id = l1.id
            AND l1.deleted = 0
            WHERE j_paymentdetail.payment_id = '{$bean->payment_id}'
            AND j_paymentdetail.status = 'Paid' AND ((COALESCE(LENGTH(j_paymentdetail.invoice_number),0) > 0))
            AND j_paymentdetail.deleted = 0";
            $rs1 = $GLOBALS['db']->query($q1);
            $row = $GLOBALS['db']->fetchByAssoc($rs1);
            //Fix tạm bug này
            if(!empty($bean->invoice_number) && $bean->status == 'Paid' && $row['sale_type'] == 'Not set'){
                $sale_type = 'Not set';
                if($row['payment_amount_paid'] >= $row['payment_amount'])
                    $sale_type = checkSaleType($bean->payment_id, $bean->payment_date);

                $GLOBALS['db']->query("UPDATE j_payment SET sale_type = '$sale_type', sale_type_date='{$bean->payment_date}' WHERE id = '{$bean->payment_id}'");
            }


            //Update finish printing - bug edit bằng tay
            $GLOBALS['db']->query("UPDATE j_configinvoiceno SET finish_printing = 1 WHERE deleted = 0 AND pmd_id_printing='{$bean->id}'");

        }

    }
}
?>
