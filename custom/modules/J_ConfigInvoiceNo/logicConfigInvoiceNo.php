<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class logicConfigInvoiceNo {                                    
	function beforeSave(&$bean, $event, $arguments){
		//Hard code : Team set
		$bean->team_set_id = $bean->team_id;
		//add Name 
		$rs1 = $GLOBALS['db']->query("SELECT name, code_prefix 
        FROM teams WHERE id = '{$bean->team_id}'");
        
		$row = $GLOBALS['db']->fetchByAssoc($rs1);
		$bean->name = $row['name'];
		if(!empty($row['code_prefix']))
			$bean->name .= '-'.$row['code_prefix'];
		//Upper Case - Fix code
		$bean->serial_no = strtoupper($bean->serial_no);
		foreach (array("invoice_no_from", "invoice_no_to", "invoice_no_current") as $value){
			$num    		= intval($bean->$value);
			$bean->$value   = str_pad($num, 5, '0', STR_PAD_LEFT);
		}
		
		//check Duplicate
		$id = $GLOBALS['db']->getOne("SELECT id FROM j_configinvoiceno 
        WHERE team_id = '{$bean->team_id}' 
        AND deleted = 0 
        AND id != '{$bean->id}'");
        
		if(!empty($id)){
			echo "<b>This team is already configed!!! Please check this <a href='index.php?module=J_ConfigInvoiceNo&action=DetailView&record={$id}'>link</a></b>";
			die();
		}
	}
}