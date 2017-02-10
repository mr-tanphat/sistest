<?php    
    require_once("custom/include/_helper/class_utils.php");
    
    switch ($_POST['type']) {
        case 'addOneEnrollment':
            $result = addPubToClass($_POST['enrollments_id'], $_POST['class_id'], $_POST['comfirm']);
            break;
        case 'addEnrollment':
            $result = addPubToClass($_POST['enrollments_id'], $_POST['class_id'], $_POST['comfirm']);
            break;
        case 'addCorpToClass':
            $result = addCorpToClass($_POST['student_list_id'], $_POST['class_id'], $_POST['contract_id'], $_POST['comfirm']);
            break;
        case 'moveStudent':
            $result = moveStudent($_POST['move_list'], $_POST['new_class_id'], $_POST['old_class_id'], $_POST['comfirm']);
            break;
        case 'removeFromClass':
            $result = removeFromClass($_POST['student_id'], $_POST['class_id'], $_POST['delay_date']);
            break;   
        case 'upgradeClass':
            $result = upgradeClass($_POST['old_class_id'], $_POST['new_class_id']);
            break;       
        case 'removeSession':
            $result = removeSession($_POST['session_id']);
            break;        
        case 'suspendStudent':
            $result = suspendStudent($_POST['student_id']);
            break;

    }
    if($result)
        echo json_encode(array("success" => "1"));   
    else
        echo json_encode(array("success" => "0"));       


    // ----------------------------------------------------------------------------------------------------------\
?>
