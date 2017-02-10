<?php
echo  showSendSMSScreen();

function showSendSMSScreen(){
    global $current_user,$timedate;
    $ss = new Sugar_Smarty();
    $studentList = "";
    $email_templates_arr = get_bean_select_array(true, 'EmailTemplate','name','type="sms" AND base_module="Contacts"','name');

    $ss->assign("MOD", $GLOBALS['mod_strings']);
    $ss->assign("CURRENT_USER_ID", $current_user->id);
    $ss->assign("TEMPLATE_OPTIONS", getSMSTenplates());
    $ss->assign("BRAND_NAME_OPTIONS", getBrandName());
    return $ss->fetch('custom/modules/Contacts/tpls/send_sms_screen.tpl');
}

function getSMSTenplates(){
    $sql = "SELECT id,name, body
    FROM email_templates
    WHERE deleted = 0
    AND type = 'sms'
    AND base_module = 'Contacts'";
    $result = $GLOBALS['db']->query($sql);
    $html = "<option selected>-none-</option>";
    while($row = $GLOBALS['db']->fetchByAssoc($result)){
        $html .= '<option value="'.$row["id"].'" content="'.$row["body"].'">'.$row["name"].'</option>';
    }

    return $html;
}

function getBrandName(){
    $sql = "SELECT id, name, sms_config
    FROM teams
    WHERE deleted = 0
    AND sms_config <> ''";
    $result = $GLOBALS['db']->query($sql);
    $html = "";
    while($row = $GLOBALS['db']->fetchByAssoc($result)){
        if($GLOBALS['current_user']->team_id == $row["id"])
            $selected = "selected";
        else $selected = "";
        $html .= '<option '.$selected.' value="'.$row["id"].'" config="'.$row["sms_config"].'">'.$row["name"].'</option>';
    }

    return $html;
}
?>
