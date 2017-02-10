<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 *
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 *
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 ********************************************************************************/

/*********************************************************************************

 * Description:  
 ********************************************************************************/


require_once('modules/ProductTemplates/Formulas.php');
refresh_price_formulas();
require_once('include/formbase.php');

$focus = new ProductTemplate();

$focus->retrieve($_REQUEST['record']);

foreach($focus->column_fields as $field) {
	if(isset($_REQUEST[$field])) {
		$focus->$field = $_REQUEST[$field];
	}
}

foreach($focus->additional_column_fields as $field) {
	if(isset($_REQUEST[$field])) {
		$value = $_REQUEST[$field];
		$focus->$field = $value;
	}
}
$focus = populateFromPost('', $focus);
$focus->unformat_all_fields();
$focus->save();
$return_id = $focus->id;

if(isset($_REQUEST['return_module']) && $_REQUEST['return_module'] != "") $return_module = $_REQUEST['return_module'];
else $return_module = "ProductTemplates";
if(isset($_REQUEST['return_action']) && $_REQUEST['return_action'] != "") $return_action = $_REQUEST['return_action'];
else $return_action = "DetailView";
if(isset($_REQUEST['return_id']) && $_REQUEST['return_id'] != "") $return_id = $_REQUEST['return_id'];

$GLOBALS['log']->debug("Saved record with id of ".$return_id);

handleRedirect($return_id, $return_module);
//header("Location: index.php?action=$return_action&module=$return_module&record=$return_id");
?>