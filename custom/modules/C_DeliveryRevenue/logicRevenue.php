<?php
class logicRevenue{
    //Before delete
    function deletedRevenue(&$bean, $event, $arguments){
        if(!empty($bean->ju_payment_id)){
            $payment = BeanFactory::getBean('J_Payment',$bean->ju_payment_id);
            if($payment->payment_type != 'Refund'){
                $q3 = "UPDATE j_payment SET remain_amount={$bean->amount}, remain_hours={$bean->duration}, status='Success', do_not_drop_revenue=1, description=''  WHERE id='{$bean->ju_payment_id}' AND deleted=0";
                $GLOBALS['db']->query($q3);
            }
        }
    }

    function handleSaveRevenue(&$bean, $event, $arguments){
        if($_POST['module'] == $bean->module_name && $_POST['action'] == 'Save'){
            if(!empty($bean->ju_payment_id)){
                $payment = BeanFactory::getBean('J_Payment',$bean->ju_payment_id);
                $bean->student_id   = $payment->contacts_j_payment_1contacts_ida;
                $bean->team_id      = $payment->team_id;
                $bean->team_set_id  = $payment->team_set_id;
                $q3 = "UPDATE j_payment SET status='Closed' WHERE id='{$bean->ju_payment_id}' AND deleted=0";
                $GLOBALS['db']->query($q3);
            }

        }
    }
}
?>
