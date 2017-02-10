<?php
    require_once("custom/modules/C_Classes/StudentsCron.php"); 
    array_map('unlink', glob("custom/uploads/pdf/*"));      
    $si = StudentsCron::create_pdf_st();
    $si = StudentsCron::send_mail_st(); 
    echo json_encode(array(
        "success" => "1",
    ));
    header("Refresh:0");
?>
