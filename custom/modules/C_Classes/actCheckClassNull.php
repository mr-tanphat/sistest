<?php
global $timedate;
//Kiểm tra học viên đã có trong lớp  : CORPORATE
$class_id = $_POST['class_id'];
if(!empty($_POST['contract_id'])){
	foreach($_POST['student_list_id'] as $key => $student_id){
		$student = BeanFactory::getBean('Contacts', $student_id);
		
		$idd = $GLOBALS['db']->getOne("SELECT id FROM c_classes_contacts_1_c WHERE c_classes_contacts_1contacts_idb = '$student_id' AND c_classes_contacts_1c_classes_ida = '$class_id' AND deleted = 0");
		if(!empty($idd)){
			echo json_encode(array(
				"success" => "error0",  
				"student_name" => $student->full_student_name,  
			));
			return false;
		}
	}
}
//Kiểm tra học viên đã có trong lớp  : PUBLIC
if(!empty($_POST['enrollments_id'])){
	if(!is_array($_POST['enrollments_id']))
		$enroll_id =  array($_POST['enrollments_id']);
	else $enroll_id = $_POST['enrollments_id'];
		
	foreach($enroll_id as $key => $enr_id){
		$student_id = $GLOBALS['db']->getOne("SELECT DISTINCT IFNULL(l1.id,'') l1_id FROM opportunities INNER JOIN opportunities_contacts l1_1 ON opportunities.id=l1_1.opportunity_id AND l1_1.deleted=0 INNER JOIN contacts l1 ON l1.id=l1_1.contact_id AND l1.deleted=0 WHERE (((opportunities.id='$enr_id' ))) AND opportunities.deleted=0");
		if(!$student_id)
			return false;
		$student = BeanFactory::getBean('Contacts', $student_id);	
		$idd = $GLOBALS['db']->getOne("SELECT id FROM c_classes_contacts_1_c WHERE c_classes_contacts_1contacts_idb = '$student_id' AND c_classes_contacts_1c_classes_ida = '$class_id' AND deleted = 0");
		if(!empty($idd)){
			echo json_encode(array(
				"success" => "error0",  
				"student_name" => $student->full_student_name,  
			));
			return false;
		}
	}
}




if($_POST['type'] == 'addOneEnrollment'){
	$class = BeanFactory::getBean('C_Classes', $_POST['class_id']);
	$class->load_relationship('c_classes_contacts_1');

	//Check maximum
	$remain = (int)$class->max - count($class->c_classes_contacts_1->getBeans());
	$count_errs = 1;
	if( $remain < $count_errs)
	{
		echo json_encode(array(
			"success" => "error1"  
		));
		return false;   
	}

	//Check class has started
	$class->load_relationship('meetings');
	$rel_cls = $class->meetings->getBeans();
	$count = 0;
	$now = strtotime($timedate->nowDb());
	foreach($rel_cls as $ss){
		$date_start = strtotime($timedate->to_db($ss->date_start));
		if($now > $date_start)
			$count++;
	}
	if($count>0){
		echo json_encode(array(
			"success" => "error2"
		));
		return false;  
	}

	echo json_encode(array(
		"success" => "1"
	)); 

}
elseif($_POST['type'] == 'addEnrollment'){
	$class = BeanFactory::getBean('C_Classes', $_POST['class_id']);
	$class->load_relationship('c_classes_contacts_1');

	//Check Enrollment Deleted
	$count = 0;
	foreach($_POST['enrollments_id'] as $enr_id) {
		$sql = "SELECT sales_stage FROM opportunities WHERE id = '$enr_id'";
		$sales_stage = $GLOBALS['db']->getOne($sql);
		if($sales_stage != 'Success')
			$count++;
	}
	if($count > 0){
		echo json_encode(array(
			"success" => "error3"
		));
		return false;  
	}


	//Check maximum
	$remain = (int)$class->max - count($class->c_classes_contacts_1->getBeans());
	$count_errs = count($_POST['enrollments_id']);
	if( $remain < $count_errs)
	{
		echo json_encode(array(
			"success" => "error1"  
		));
		return false;   
	}

	//Check class has started
	$class->load_relationship('meetings');
	$rel_cls = $class->meetings->getBeans();
	$count = 0;
	$now = strtotime($timedate->nowDb());
	foreach($rel_cls as $ss){
		$date_start = strtotime($timedate->to_db($ss->date_start));
		if($now > $date_start)
			$count++;
	}
	if($count>0){
		echo json_encode(array(
			"success" => "error2"
		));
		return false;  
	}

	echo json_encode(array("success" => "1")); 

}
elseif($_POST['type'] == 'addContract'){

	//count student in contracts
	$count = 0;
	foreach($_POST['contracts_id'] as $contract_id) {
		$contract  = BeanFactory::getBean('Contracts', $contract_id);
		$contract->load_relationship('contacts');
		$count += count($contract->contacts->getBeans());
	}

	//Check maximum
	$class = BeanFactory::getBean('C_Classes', $_POST['class_id']);
	$class->load_relationship('c_classes_contacts_1');

	$remain = (int)$class->max - count($class->c_classes_contacts_1->getBeans());
	if( $remain < $count){
		echo json_encode(array(
			"success" => "error1",  
			"count" => $count  
		));
		return false;   
	}

	//Check class has started
	$class->load_relationship('meetings');
	$rel_cls = $class->meetings->getBeans();
	$count = 0;
	$now = strtotime($timedate->nowDb());
	foreach($rel_cls as $ss){
		$date_start = strtotime($timedate->to_db($ss->date_start));
		if($now > $date_start)
			$count++;
	}
	if($count>0){
		echo json_encode(array(
			"success" => "error2"
		));
		return false;  
	}

	echo json_encode(array("success" => "1")); 

}
elseif($_POST['type'] == 'addStudent'){

	//Check maximum
	$count = count($_POST['student_list_id']);
	$class = BeanFactory::getBean('C_Classes', $_POST['class_id']);
	$class->load_relationship('c_classes_contacts_1');

	$remain = (int)$class->max - count($class->c_classes_contacts_1->getBeans());
	if( $remain < $count){
		echo json_encode(array(
			"success" => "error1",  
		));
		return false;   
	}

	//Check class has started
	$class->load_relationship('meetings');
	$rel_cls = $class->meetings->getBeans();
	$count = 0;
	$now = strtotime($timedate->nowDb());
	foreach($rel_cls as $ss){
		$date_start = strtotime($timedate->to_db($ss->date_start));
		if($now >= $date_start)
			$count++;
	}
	if($count>0){
		echo json_encode(array(
			"success" => "error2"
		));
		return false;  
	}
	echo json_encode(array("success" => "1"));

}
elseif($_POST['type'] == 'moveStudent'){

	$class = BeanFactory::getBean('C_Classes', $_POST['class_id']);
	$class->load_relationship('c_classes_contacts_1');

	//Check maximum
	$remain = (int)$class->max - count($class->c_classes_contacts_1->getBeans());
	$count_stu = count($_POST['move_list']);
	if( $remain < $count_stu)
	{
		echo json_encode(array(
			"success" => "error1"  
		));
		return false;      
	}

	//Check class has started
	$class->load_relationship('meetings');
	$rel_cls = $class->meetings->getBeans();
	$count = 0;
	$now = strtotime($timedate->nowDb());
	foreach($rel_cls as $ss){
		$date_start = strtotime($timedate->to_db($ss->date_start));
		if($now > $date_start)
			$count++;
	}
	if($count>0){
		echo json_encode(array(
			"success" => "error2"
		));
		return false;  
	}

	echo json_encode(array("success" => "1"));   
}else{
	echo json_encode(array("success" => "0")); 
}


// -----------------------------------------------------------------------------

?>
