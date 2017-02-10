<?php
    $hook_version = 1; 
    $hook_array = Array(); 
    // position, file, function 
    $hook_array['before_save'] = Array();  
    $hook_array['before_save'][] = Array(1, 'Before Save Sponsor', 'custom/modules/C_Sponsors/before_save_sponsor.php', 'handleSaveSponsor', 'handleSaveSponsor');