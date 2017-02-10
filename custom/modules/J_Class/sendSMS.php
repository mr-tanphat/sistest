<?php
echo  showSendSMSScreen();

function showSendSMSScreen(){
    global $current_user,$timedate;
    $ss = new Sugar_Smarty();
    $studentList = "";
    $q1 = "SELECT id,name FROM email_templates WHERE type='sms' AND base_module='J_Class' AND deleted = 0";
    $rs1 = $GLOBALS['db']->query($q1);
    $email_templates_arr = array('' => '');
    while($row = $GLOBALS['db']->fetchByAssoc($rs1) ) {
        $email_templates_arr[$row['id']] = $row['name'];
    }
    $ss->assign("MOD", $GLOBALS['mod_strings']);
    $ss->assign("CURRENT_USER_ID", $current_user->id);
    $ss->assign("TODAY", reset(explode(" ",$timedate->now())));
//    $ss->assign("CLASS_OPTIONS", getClassOptions());
    $ss->assign("TEMPLATE_OPTIONS", get_select_options_with_id($email_templates_arr, ""));
    $ss->assign("STUDENT_LIST", $studentList);
    $ss->assign("SESSION_ID", "");
    if (!empty($_GET["class_id"])){
        $class = BeanFactory::getBean("J_Class", $_GET["class_id"]);
        $ss->assign("CLASS_ID", $class->id);
        $ss->assign("CLASS_NAME", $class->name);
    }
    return $ss->fetch('custom/modules/J_Class/tpls/send_sms_screen.tpl');
}

function getClassOptions(){
    global $current_user;
    // generate option classes for current user
    $q1 = "SELECT DISTINCT
    IFNULL(j_class.id, '') primaryid,
    IFNULL(j_class.name, '') j_class_name
    FROM j_class
    WHERE
    ((COALESCE(LENGTH(j_class.status), 0) > 0
    AND j_class.status != '^^')
    AND j_class.class_type = 'Normal Class'
    AND j_class.team_id = '{$current_user->team_id}'
    AND j_class.deleted = 0
    ORDER BY j_class_name";

    /*Comment by Tung Bui - 23/12/2015
    Add below sql to select class by team set is of use

    AND j_class.team_set_id IN
    (SELECT
    tst.team_set_id
    FROM
    team_sets_teams tst
    INNER JOIN
    team_memberships team_memberships ON tst.team_id = team_memberships.team_id
    AND team_memberships.user_id = '".$current_user->id."'
    AND team_memberships.deleted = 0)
    ))

    */
    $rs1 = $GLOBALS['db']->query($q1);
    $classOptions = "";
    while($row = $GLOBALS['db']->fetchByAssoc($rs1) ) {
        $classOptions .= "<option value='{$row['primaryid']}'>{$row['j_class_name']}</option>";
    }
    return $classOptions;
}

?>
