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

require_once('include/Sugar_Smarty.php');

$ss = new Sugar_Smarty();
$current_module_strings = return_module_language($current_language, 'Home');
$ss->assign('current_module_strings', $current_module_strings);
$ss->assign('sugar_version', $GLOBALS['sugar_version']);
echo $ss->fetch('modules/Home/Welcome.tpl');

?>