<?php
if(!defined('sugarEntry'))define('sugarEntry', true);
///*********************************************************************************
// * By installing or using this file, you are confirming on behalf of the entity
// * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
// * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
// * http://www.sugarcrm.com/master-subscription-agreement
// *
// * If Company is not bound by the MSA, then by installing or using this file
// * you are agreeing unconditionally that Company will be bound by the MSA and
// * certifying that you have authority to bind Company accordingly.
// *
// * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
// ********************************************************************************/
//

//ini_set('display_errors',1);
//ini_set('display_startup_errors',0);
//error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);

include ('include/MVC/preDispatch.php');
$startTime = microtime(true);
require_once('include/entryPoint.php');
ob_start();
require_once('include/MVC/SugarApplication.php');
$app = new SugarApplication();
$app->startSession();
$app->execute();

//echo '<meta charset="utf-8">';
//echo 'Giải lao 5phút nhé.';
?>
