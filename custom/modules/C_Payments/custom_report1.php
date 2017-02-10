<?php
$rs2 = $GLOBALS['db']->query($this->query);
//echo $this->query;
while($row2 = $GLOBALS['db']->fetchByAssoc($rs2)){
    $pay_id = $row2['primaryid'];


    //get discount tren package
    $q1 = "SELECT DISTINCT IFNULL(l3.id,'') l3_id , c_payments.payment_type payment_type , IFNULL(l3.name,'') l3_name, l2.id opp_id, l3.package_type l3_package_type, l3.payment_price_1 l3_payment_price_1 ,IFNULL( l3.currency_id,'') l3_payment_price_1_currency ,l3.payment_price_2 l3_payment_price_2 ,IFNULL( l3.currency_id,'') l3_payment_price_2_currency ,l3.payment_price_3 l3_payment_price_3 ,IFNULL( l3.currency_id,'') l3_payment_price_3_currency ,l3.payment_price_4 l3_payment_price_4 ,IFNULL( l3.currency_id,'') l3_payment_price_4_currency, c_payments.payment_attempt payment_attempt, c_payments.payment_amount payment_amount, c_payments.sponsor_amount sponsor_amount, c_payments.discount_in_payment discount_in_payment FROM c_payments INNER JOIN c_invoices_c_payments_1_c l1_1 ON c_payments.id=l1_1.c_invoices_c_payments_1c_payments_idb AND l1_1.deleted=0 INNER JOIN c_invoices l1 ON l1.id=l1_1.c_invoices_c_payments_1c_invoices_ida AND l1.deleted=0 INNER JOIN c_invoices_opportunities_1_c l2_1 ON l1.id=l2_1.c_invoices_opportunities_1c_invoices_ida AND l2_1.deleted=0 INNER JOIN opportunities l2 ON l2.id=l2_1.c_invoices_opportunities_1opportunities_idb AND l2.deleted=0 INNER JOIN c_packages_opportunities_1_c l3_1 ON l2.id=l3_1.c_packages_opportunities_1opportunities_idb AND l3_1.deleted=0 INNER JOIN c_packages l3 ON l3.id=l3_1.c_packages_opportunities_1c_packages_ida AND l3.deleted=0 WHERE (((c_payments.id='$pay_id' ))) AND c_payments.deleted=0";
    $rs1 = $GLOBALS['db']->query($q1);
    $row1 = $GLOBALS['db']->fetchByAssoc($rs1);

    $pay_attempt = $row1['payment_attempt'];
    //deposit
    if($row2['c_payments_payment_type'] == 'Deposit' ){
        $subtotal        = $row2['c_payments_payment_amount']; 
        $total_discount  = 0; 
    }else{
        //Fix bug tạm - Xuất Invoice bị âm
        if($row2['c_payments_payment_type'] == 'Normal' && $pay_attempt != '1'){
            $count = 0;
            $count_des = 0;
            //Get Number Of Payment
            $sql7 = "SELECT DISTINCT
            IFNULL(c_payments.id, '') primaryid,
            IFNULL(c_payments.payment_type, '') payment_type
            FROM
            c_payments
            INNER JOIN
            c_invoices_c_payments_1_c l1_1 ON c_payments.id = l1_1.c_invoices_c_payments_1c_payments_idb
            AND l1_1.deleted = 0
            INNER JOIN
            c_invoices l1 ON l1.id = l1_1.c_invoices_c_payments_1c_invoices_ida
            AND l1.deleted = 0
            INNER JOIN
            c_invoices_opportunities_1_c l2_1 ON l1.id = l2_1.c_invoices_opportunities_1c_invoices_ida
            AND l2_1.deleted = 0
            INNER JOIN
            opportunities l2 ON l2.id = l2_1.c_invoices_opportunities_1opportunities_idb
            AND l2.deleted = 0
            WHERE
            (((l2.id = '".$row1['opp_id']."')))
            AND c_payments.deleted = 0";
            $rs7 = $GLOBALS['db']->query($sql7);
            while($row7 = $GLOBALS['db']->fetchByAssoc($rs7)){
                $count++;
                if($row7['payment_type'] == 'Deposit')
                    $count_des++;
            }
            if($count == 2 && $count_des == 1){
                $pay_attempt = '1';
                $q5 = "UPDATE c_payments SET payment_attempt='1' WHERE id='$pay_id'";
                $GLOBALS['db']->query($q5);
            }
        }
        $str = 'l3_payment_price_'.$pay_attempt;
        $payment_price = $row1[$str];
        //Payment 1
        if($pay_attempt == '1'){
            // kiểm tra trước đó có deposit ko
            $q7 = "SELECT DISTINCT IFNULL(SUM(l2.payment_amount), 0) l2_payment_amount FROM opportunities INNER JOIN c_invoices_opportunities_1_c l1_1 ON opportunities.id=l1_1.c_invoices_opportunities_1opportunities_idb AND l1_1.deleted=0 INNER JOIN c_invoices l1 ON l1.id=l1_1.c_invoices_opportunities_1c_invoices_ida AND l1.deleted=0 INNER JOIN c_invoices_c_payments_1_c l2_1 ON l1.id=l2_1.c_invoices_c_payments_1c_invoices_ida AND l2_1.deleted=0 INNER JOIN c_payments l2 ON l2.id=l2_1.c_invoices_c_payments_1c_payments_idb AND l2.deleted=0 WHERE (((opportunities.id='".$row1['opp_id']."' ) AND (l2.payment_type = 'Deposit' ))) AND opportunities.deleted=0";    
            $deposit = $GLOBALS['db']->getOne($q7);

            $subtotal = $payment_price - $deposit;
            $total_discount = ($subtotal - $row1['payment_amount']) + $row1['discount_in_payment'];
        }

        //Cac payment khac
        else{
            // kiểm tra trước đó có tranfer moving ko
            $q7 = "SELECT DISTINCT IFNULL(SUM(l2.payment_amount), 0) amount FROM opportunities INNER JOIN c_invoices_opportunities_1_c l1_1 ON opportunities.id=l1_1.c_invoices_opportunities_1opportunities_idb AND l1_1.deleted=0 INNER JOIN c_invoices l1 ON l1.id=l1_1.c_invoices_opportunities_1c_invoices_ida AND l1.deleted=0 INNER JOIN c_invoices_c_payments_1_c l2_1 ON l1.id=l2_1.c_invoices_c_payments_1c_invoices_ida AND l2_1.deleted=0 INNER JOIN c_payments l2 ON l2.id=l2_1.c_invoices_c_payments_1c_payments_idb AND l2.deleted=0 WHERE (((opportunities.id='".$row1['opp_id']."' ) AND ((l2.payment_type = 'Transfer in' ) OR (l2.payment_type = 'Moving in' ) OR (l2.payment_type = 'FreeBalance' )))) AND opportunities.deleted=0";    
            $transfer_moving_amount = $GLOBALS['db']->getOne($q7);
            if($transfer_moving_amount > 0){
                $q9 = "SELECT IFNULL(SUM(amount), 0) amount FROM opportunities WHERE id = '".$row1['opp_id']."'";
                $opp_price = $GLOBALS['db']->getOne($q9);
                $subtotal        = $opp_price - $transfer_moving_amount;
                $total_discount  = $subtotal - $row1['payment_amount'];
            }else{
                $subtotal = $payment_price;
                $total_discount = ($subtotal - $row1['payment_amount']) + $row1['discount_in_payment'];     
            }
        }
        //kiem tra package type neu la sponsor thi dieu chinh total discount = sponsor

    }                           

    $sponsor = 0;
    if($row1['l3_package_type'] == 'Sponsor'){
        $sponsor = $total_discount;
        $total_discount = 0;  
    }
    if($row1['sponsor_amount'] > 0){
        $sponsor = $row1['sponsor_amount'];
        $total_discount -= $row1['sponsor_amount'];  
    }



    $q4 = "UPDATE c_payments SET subtotal=$subtotal, sponsor_amount=$sponsor, view_discount = $total_discount WHERE id='$pay_id'";
    $GLOBALS['db']->query($q4);  
}
//Fix Label
$js = 
<<<EOQ
        <script>
        SUGAR.util.doWhen(
        function() {
           return $('#rowid1').find('td').eq(1)[0] != null;
        },
        function() {
            $("#filters").children().each(function(){
                $(this).find('td:eq(1)').find("select").remove();
                var label = $(this).find('td:eq(1)').text();
                // Fix label here
                label = label.replace("LBL_C_PACKAGES_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE","Packages");
                $(this).find('td:eq(1)').text(label);   
            });
            
        }        
        );
        </script>
EOQ;
echo $js;  

?>
