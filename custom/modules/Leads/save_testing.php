<?php
    $sql = "UPDATE leads SET listening={$_POST['listening']}, reading={$_POST['reading']}, writing={$_POST['writing']}, speaking={$_POST['speaking']}, gpa={$_POST['gpa']}, level='{$_POST['level']}', stage='{$_POST['stage']}' WHERE id='{$_POST['id']}'";
    $res = $GLOBALS['db']->query($sql);
    if($res)
        echo json_encode(array(
            "success" => "1",
            "listening" => format_number($_POST['listening'],2,2),
            "reading" => format_number($_POST['reading'],2,2),
            "writing" => format_number($_POST['writing'],2,2),
            "speaking" => format_number($_POST['speaking'],2,2),
            "gpa" => format_number($_POST['gpa'],2,2),
            "stage" => $_POST['stage'],
            "level" => $_POST['level'],
        ));
    else
        echo json_encode(array("success"=>'0'));
?>
