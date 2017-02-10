<?php
  //  //Add logic hook - 15/07/2014 - by MTN
    $hook_version = 1; 
    $hook_array = Array(); 
    $hook_array['before_save'] = Array(); 
    $hook_array['before_save'][] = Array(1, 'Calculate Paid Amount', 'custom/modules/Contracts/handleContract.php','handleContract', 'beforeSaveContract');  
?>