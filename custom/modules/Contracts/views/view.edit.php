<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class ContractsViewEdit extends ViewEdit
{

    public function display()
    {
        if($_POST['isDuplicate'] == 'false'){
            global $timedate;
            $sql = "SELECT DISTINCT
            IFNULL(j_paymentdetail.id, '') primaryid,
            j_paymentdetail.payment_amount payment_amount,
            j_paymentdetail.payment_date payment_date,
            IFNULL(j_paymentdetail.invoice_number, '') invoice_number
            FROM
            j_paymentdetail
            INNER JOIN
            contracts l1 ON j_paymentdetail.contract_id = l1.id
            AND l1.deleted = 0
            WHERE
            (((l1.id = '{$this->bean->id}')))
            AND j_paymentdetail.deleted = 0
            ORDER BY j_paymentdetail.payment_no ASC";
            $pmd_ct = $GLOBALS['db']->fetchArray($sql);
            $pmd = array();
            $count = 1;
            foreach($pmd_ct as $key=>$value){
                $pmd[$count]['pmd_id']         = $value['primaryid'];
                $pmd[$count]['pmd_amount']     = format_number($value['payment_amount']);
                $pmd[$count]['pmd_date']       = $timedate->to_display_date($value['payment_date'],false);
                $pmd_date = 'payment_date_'.$count;
                $this->bean->$pmd_date         = $pmd[$count]['pmd_date'];
                $pmd[$count]['pmd_invoice_no'] = $value['invoice_number'];
                $count++;
            }
            $this->ss->assign('pmd',$pmd);
        }elseif($_POST['isDuplicate'] == 'true'){
            $this->bean->status             = 'notstarted';
            $this->bean->payment_date_1     = '';
        }

        if(empty($this->bean->id))
            $this->bean->payment_date_1 = '';
        parent::display();
    }
}
?>
