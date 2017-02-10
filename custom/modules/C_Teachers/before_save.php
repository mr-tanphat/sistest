<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class before_save_teacher {
	function addCode(&$bean, $event, $arguments){
		//Get Prefix
		$q1 = "SELECT
		teams.id primary_id,
		teams.code_prefix code_prefix,
		teams.team_type team_type,
		IFNULL(l2.code_prefix, '') parent_prefix
		FROM
		teams
		LEFT JOIN
		teams l2 ON teams.parent_id = l2.id
		AND l2.deleted = 0
		WHERE
		teams.id = '{$bean->team_id}'";

		$res = $GLOBALS['db']->query($q1);
		$row 		= $GLOBALS['db']->fetchByAssoc($res);
		$sep   		= '-';
		$part 		= explode(".", $GLOBALS['app_list_strings']['hr_center_code'][$row['code_prefix']]);
		$prefix 	= $part[0].$sep.$part[1];
		$type 		= $bean->type;
		$code_field = 'teacher_id';
		$padding 	= 5;
		$table 		= $bean->table_name;


		//Edit by Tung Bui
		if( empty($bean->fetched_row[$code_field]) || strpos($bean->fetched_row[$code_field], $prefix) === false || strpos($bean->fetched_row[$code_field], $type) === false ) {

			$query = "SELECT $code_field FROM $table WHERE ( $code_field <> '' AND $code_field IS NOT NULL) AND id != '{$bean->id}' ORDER BY RIGHT($code_field, $padding) DESC LIMIT 1";
			$result = $GLOBALS['db']->query($query);

			if($row = $GLOBALS['db']->fetchByAssoc($result)){
				$last_code = $row[$code_field];
			}else{
				//no codes exist, generate default - PREFIX + CURRENT YEAR +  SEPARATOR + FIRST NUM
				$last_code = $prefix . $sep . $type . '00000';
			}

			$num = substr($last_code, -$padding, $padding);
			$num++;
			$pads = $padding - strlen($num);
			$new_code = $prefix . $sep . $type;

			//preform the lead padding 0
			for($i=0; $i < $pads; $i++)
				$new_code .= "0";
			$new_code .= $num;

			//write to database - Logic: Before Save
			$bean->$code_field = str_replace('--','TEA-',$new_code);
		}
	}

	function make_full_name(&$bean, $event, $arguments){
		$bean->full_teacher_name = $bean->first_name. ' '.$bean->last_name;
	}
}
?>
