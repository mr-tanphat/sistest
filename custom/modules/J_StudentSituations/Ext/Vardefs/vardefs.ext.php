<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2016-05-23 03:55:52
$dictionary['J_StudentSituations']['fields']['j_studentsituations_c_sms'] = array (
								  'name' => 'j_studentsituations_c_sms',
									'type' => 'link',
									'relationship' => 'j_studentsituations_c_sms',
									'source'=>'non-db',
									'vname'=>'LBL_C_SMS',
							);



$dictionary['J_StudentSituations']['fields']['j_studentsituations_c_sms']['type'] = 'function';
$dictionary['J_StudentSituations']['fields']['j_studentsituations_c_sms']['function'] = array('name'=>'sms_phone', 'returns'=>'html', 'include'=>'custom/fieldFormat/sms_phone_fields.php');



?>