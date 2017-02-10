<?php
global $timedate;   
require_once("custom/include/_helper/junior_revenue_utils.php");
$q1 = "UPDATE meetings SET `date_start`='2016-05-03 10:00:00', `date_end`='2016-05-03 11:30:00' WHERE `id`='f35c8055-5ea2-f414-7bf9-56c3fc098bee'";
$rs1 = $GLOBALS['db']->query($q1);
updateClassSession('8329b506-2745-77a9-7beb-5698e9344787');
$q2 = "UPDATE j_class SET end_date='2016-10-27' WHERE `id`='8329b506-2745-77a9-7beb-5698e9344787'";
$rs2 = $GLOBALS['db']->query($q2);
echo "done";
?>
