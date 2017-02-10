<?php
    $hook_version = 1; 
    $hook_array = Array(); 

    $hook_array['before_save'] = Array(); 
    $hook_array['before_save'][] = Array(1, 'create Card', 'custom/modules/C_Memberships/handleSave_Card.php','handleSave_Card', 'handleSave_Card');  

    $hook_array['process_record'] = Array(); 
    $hook_array['process_record'][] = Array(1, 'Color Status', 'custom/modules/C_Memberships/listview_color.php','ListviewCard', 'listviewcolor_card');

    $hook_array['before_delete'] = Array();
    $hook_array['before_delete'][] = Array(1, 'Handle Delete', 'custom/modules/C_Memberships/handle_delete.php','handleDelete_Card', 'handleDelete_Card'); 

?>