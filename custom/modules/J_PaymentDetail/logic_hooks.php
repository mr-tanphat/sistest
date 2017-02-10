<?php
    $hook_version = 1; 
    $hook_array = Array(); 
    // position, file, function 
    
    $hook_array['process_record'] = Array(); 
    $hook_array['process_record'][] = Array(1, 'Add button export', 'custom/modules/J_PaymentDetail/logicPaymentDetail.php','DisplayButtonLogicHook', 'displayButton'); 
    
    $hook_array['before_save'] = Array(); 
    $hook_array['before_save'][] = Array(2, 'Handle before save', 'custom/modules/J_PaymentDetail/logicPaymentDetail.php','DisplayButtonLogicHook', 'handleBeforeSave'); 
    
    $hook_array['after_save'] = Array(); 
    $hook_array['after_save'][] = Array(1, 'Handle After save', 'custom/modules/J_PaymentDetail/logicPaymentDetail.php','DisplayButtonLogicHook', 'handleAfterSave'); 
    
    ?>
