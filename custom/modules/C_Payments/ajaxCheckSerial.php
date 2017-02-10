<?php
  $invoice_num = $_POST["invoice_num"];
  $record = $_POST["record"];
  //Them vao cau query mo check payment da xoa
  $sql = "SELECT id FROM c_payments WHERE invoice_num = '$invoice_num' AND id != '$record' AND status <> 'Deleted' AND deleted = 0";
  $success = "1";
  if($GLOBALS['db']->getOne($sql))
  {
      $success = "0";
  }
  echo json_encode(array(
        "success" => $success,
    ));
  
?>
