<?php
function getTeamMembers($team_id){
    $q1 = "SELECT DISTINCT
    IFNULL(l1.id, '') user_id,
    l1.user_name l1_user_name,
    CONCAT( IFNULL(l1.last_name, ''),
    ' ',
    IFNULL(l1.first_name, '') ) l1_full_name,
    l1.title l1_title,
    l1.is_admin is_admin,
    IFNULL(l2.id, '') l2_id,
    IFNULL(l2.name, '') l2_name,
    l1.phone_mobile l1_phone_mobile,
    IFNULL(l3.id, '') l3_id,
    l3.email_address l3_email_address,
    l1.status l1_employee_status
    FROM
    teams
    INNER JOIN
    team_memberships l1_1 ON teams.id = l1_1.team_id
    AND l1_1.deleted = 0
    INNER JOIN
    users l1 ON l1.id = l1_1.user_id AND l1.deleted = 0
    INNER JOIN
    teams l2 ON l1.default_team = l2.id
    AND l2.deleted = 0
    LEFT JOIN
    email_addr_bean_rel l3_1 ON l1.id = l3_1.bean_id
    AND l3_1.deleted = 0
    AND l3_1.primary_address = '1'
    LEFT JOIN
    email_addresses l3 ON l3.id = l3_1.email_address_id
    AND l3.deleted = 0
    WHERE
    (((teams.id = '$team_id')))
    AND teams.deleted = 0";
    return $member_list = $GLOBALS['db']->fetchArray($q1);
}

function getTeamsForUser($user_id){
    $query = "SELECT DISTINCT
    IFNULL(users.id, '') primaryid,
    IFNULL(users.user_name, '') users_user_name,
    IFNULL(l1.id, '') defaut_team_id,
    IFNULL(l1.name, '') defaut_team_name,
    IFNULL(l2.id, '') team_id,
    IFNULL(l2.name, '') team_name
    FROM
    users
    INNER JOIN
    teams l1 ON users.default_team = l1.id
    AND l1.deleted = 0
    INNER JOIN
    team_memberships l2_1 ON users.id = l2_1.user_id
    AND l2_1.deleted = 0
    INNER JOIN
    teams l2 ON l2.id = l2_1.team_id AND l2.deleted = 0
    WHERE
    (((users.id = '$user_id')))
    AND users.deleted = 0";

    $result = $GLOBALS['db']->query($query);
    $html = "<select class='selectpicker select_team' data-width='100%'>";
    while($row = $GLOBALS['db']->fetchByAssoc($result)){
        ($row['team_id'] == $row['defaut_team_id']) ? $html .= "<option selected value='{$row['team_id']}'>{$row['team_name']}</option>" : $html .= "<option value='{$row['team_id']}'>{$row['team_name']}</option>";
    }
    $html .= "</select>";
    return $html;
}

function getRolesForUser($user_id){

    //get list of Role for a given user id
    $user_roles = array();
    $q2 = "SELECT
    acl_roles.id id, acl_roles.name name
    FROM
    acl_roles
    INNER JOIN
    acl_roles_users ON acl_roles_users.user_id = '$user_id'
    AND acl_roles_users.role_id = acl_roles.id
    AND acl_roles_users.deleted = 0
    WHERE
    acl_roles.deleted = 0";
    $rs2 = $GLOBALS['db']->query($q2);
    while($row = $GLOBALS['db']->fetchByAssoc($rs2) ){
        $user_roles[] = $row['id'];
    }
    //Get list Role
    $q1 = "SELECT id,name FROM acl_roles
    WHERE acl_roles.deleted=0 AND name <> 'Customer Self-Service Portal Role' ORDER BY name";
    $rs1 = $GLOBALS['db']->query($q1);
    // Make Colorzing
    $label_color = array(
        0 => 'label-info',
        1 => 'label-primary',
        2 => 'label-success',
        3 => 'label-danger',
        4 => 'label-default',
        5 => 'label-warning',
        6 => 'highlight_blue',
        7 => 'highlight_bluelight',
        8 => 'highlight_red',
        9 => 'highlight_dream',
        10 => 'highlight_black',
        11 => 'highlight_yellow',
        12 => 'highlight_yellowlight',
        13 => 'highlight_green',
        14 => 'highlight_violet',
        15 => 'highlight_orange',
        16 => 'highlight_crimson',
        17 => 'highlight_blood',
        18 => 'highlight_redlight',
    );
    $i = 0;
    $html = "<select class='selectpicker select_role' data-live-search='true' multiple data-width='200px' title=''>";
    while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
        in_array($row['id'], $user_roles) ? $html .= "<option data-content=\"<span class='label $label_color[$i]'>{$row['name']}</span>\" selected value='{$row['id']}'>{$row['name']}</option>" : $html .= "<option data-content=\"<span class='label $label_color[$i]'>{$row['name']}</span>\" value='{$row['id']}'>{$row['name']}</option>";
        $i > 17 ? $i = 0 : $i++;
    }
    $html .= "</select>";
    return $html;
}

function makeDropdownStatus($selected){
    $html = "<select class='selectpicker select_status' data-width='100%'>";
    $html .= get_select_options($GLOBALS['app_list_strings']['user_status_dom'],$selected);
    return $html .= "</select>";
}

function getMembershipForUser($team_id, $parent_id, $user_id){
    $type = 'Member';
    if($team_id == '1')
        return 'Global';
    if($parent_id == '1')
        return $type;

    $q2 = "SELECT DISTINCT
    IFNULL(l1.id, '') l1_id,
    l1.user_name l1_user_name,
    IFNULL(teams.id, '') primaryid,
    IFNULL(teams.name, '') teams_name
    FROM
    teams
    INNER JOIN
    team_memberships l1_1 ON teams.id = l1_1.team_id
    AND l1_1.deleted = 0
    INNER JOIN
    users l1 ON l1.id = l1_1.user_id AND l1.deleted = 0
    WHERE
    (((teams.id = '$parent_id')
    AND (l1.id = '$user_id')))
    AND teams.deleted = 0";
    $id = $GLOBALS['db']->getOne($q2);
    if(!empty($id))
        $type = 'Member of Parent';
    return $type;
}

function getTeamDetail($team_id){
    $team = BeanFactory::getBean('Teams',$team_id);
    $members = getTeamMembers($team->id);
    global $mod_strings;
    //Prepare Users List
    $html   = "";
    $js     = "";
    if($team_id != '1'){
        $html .= '<input class="button primary" type="button" value="'.translate('LBL_ADD_USER','Users').'" id="add_user_bt"><br><br>';
        $html .= "<table width='100%' class='table table-striped table-bordered dataTable' id='celebs'>";
        $html .= "<thead><tr>
        <th width='15%'>".translate('LBL_NAME','Users')."</th>
        <th width='15%'>".translate('LBL_USER_NAME','Users')."</th>
        <th width='15%'>".translate('LBL_TITLE','Users')."</th>

        <th width='15%'>".translate('LBL_DEFAULT_TEAM','Users')."</th>
        <th width='20%'>".translate('LBL_DEFAULT_SUBPANEL_TITLE','Roles')."</th>
        <th width='10%'>".$mod_strings['LBL_STATUS']."</th>
        <th style='min-width: 50px; text-align:center;'></th>
        </tr></thead>
        <tbody>";
        $count = 0;
        for($i = 0; $i < count($members); $i++){
            //Generate the compose Email.
            //     $emailLinkUrl = 'contact_id='.$members[$i]['l3_id'].
            //            '&parent_type='.'Users'.
            //            '&parent_id='.$members[$i]['user_id'].
            //            '&parent_name='.$members[$i]['l1_full_name'].
            //            '&to_addrs_ids='.$members[$i]['l3_id'].
            //            '&to_addrs_names='.urlencode($members[$i]['l1_full_name']).
            //            '&to_addrs_emails='.urlencode($members[$i]['l3_email_address']).
            //            '&to_email_addrs='.urlencode($members[$i]['l1_full_name'] . '&nbsp;&lt;' . $members[$i]['l3_email_address'] . '&gt;').
            //            '&return_module=""'.
            //            '&return_action=""'.
            //            '&return_id=""';
            //            require_once('modules/Emails/EmailUI.php');
            //            $eUi = new EmailUI();
            //            $j_quickCompose = $eUi->generateComposePackageForQuickCreateFromComposeUrl($emailLinkUrl, true);
            //            $emailLink = "<a href='javascript:void(0);' style='text-decoration: none;font-weight: normal;' onclick='SUGAR.quickCompose.init($j_quickCompose);'>";
            //
            $membership = getMembershipForUser($team->id,$team->parent_id,$members[$i]['user_id']);
            if($membership != 'Member of Parent'){
                $count++;
                $html .= "<tr id='{$members[$i]['user_id']}'>";
                $html .= "<td>{$members[$i]['l1_full_name']}</td>";
                $html .= "<td><a target='_blank' style='text-decoration: none;font-weight: normal;' href='index.php?module=Users&return_module=Users&action=DetailView&record={$members[$i]['user_id']}'>{$members[$i]['l1_user_name']}</a></td>";
                $html .= "<td>{$members[$i]['l1_title']}</td>";
                //$html .= "<td>$emailLink{$members[$i]['l3_email_address']}</a></td>";
                //$html .= "<td>{$members[$i]['l1_phone_mobile']}</td>";
                //
                $html .= "<td>".getTeamsForUser($members[$i]['user_id'])."</td>";
                if($members[$i]['is_admin'])
                    $html .= "<td><p style='margin-left: 10px;'>Administrator</p></td>";
                else
                    $html .= "<td>".getRolesForUser($members[$i]['user_id'])."</td>";

                //$html .= "<td>$membership</td>";
                $html .= "<td>".makeDropdownStatus($members[$i]['l1_employee_status'])."</td>";
                if($membership == 'Member')
                    $html .= "<td valign='bottom'>
                    <a class='login_user' style='margin-right: 5px;' href='index.php?module=Users&action=Impersonate&record={$members[$i]['user_id']}' title = '{$mod_strings['LBL_LOG_IN_TO']}{$members[$i]['l1_user_name']}'><span class='glyphicon glyphicon-log-in' aria-hidden='true'></span></a>
                    <a class='save_user' style='margin-right: 5px;' href='javascript:void(0)' title = '{$GLOBALS['app_strings']['LBL_EMAIL_SAVE']}'><span class='glyphicon glyphicon-floppy-save' aria-hidden='true'></span></a>
                    <a class='remove_user' href='javascript:void(0)' title = '{$GLOBALS['app_strings']['LBL_EMAIL_MENU_REMOVE']}'><span class='glyphicon glyphicon-remove' aria-hidden='true'></a>
                    </td>";
                else
                    $html .= "<td valign='bottom'>
                    <a class='login_user' style='margin-right: 5px;' href='index.php?module=Users&action=Impersonate&record={$members[$i]['user_id']}' title = '{$mod_strings['LBL_LOG_IN_TO']}{$members[$i]['l1_user_name']}'><span class='glyphicon glyphicon-log-in' aria-hidden='true'></span></a>
                    <a class='save_user' title = '{$GLOBALS['app_strings']['LBL_EMAIL_SAVE']}' href='javascript:void(0)'><span class='glyphicon glyphicon-floppy-save' aria-hidden='true'></span></a>
                    </td>";

                $html .= "</tr>";
            }

        }
        $html   .= "</tbody>";
        $html   .= "</table>";
        $js     .= "
        <script>
        $(document).ready(function() {
        var table = $('#celebs');
        var oTable = table.dataTable({ 'fnFooterCallback': function( nFoot, aData, iStart, iEnd, aiDisplay ) { $('.selectpicker').selectpicker();}, bStateSave: true, paging: true, aoColumnDefs: [{ bSortable: false, aTargets: [ -1 ]}], oLanguage:{
        sLengthMenu: '".$GLOBALS['app_strings']['LBL_JDATATABLE1']."_MENU_".$GLOBALS['app_strings']['LBL_JDATATABLE2']."',
        sZeroRecords: '".$GLOBALS['app_strings']['LBL_JDATATABLE13']."',
        sInfo: '".$GLOBALS['app_strings']['LBL_JDATATABLE6']."_START_".$GLOBALS['app_strings']['LBL_JDATATABLE7']."_END_".$GLOBALS['app_strings']['LBL_JDATATABLE8']."_TOTAL_".$GLOBALS['app_strings']['LBL_JDATATABLE2']."',
        sInfoEmpty: '".$GLOBALS['app_strings']['LBL_JDATATABLE15']."',
        sEmptyTable: '".$GLOBALS['app_strings']['LBL_JDATATABLE14']."',
        sInfoFiltered: '',
        oPaginate: {
        sFirst: '".$GLOBALS['app_strings']['LBL_JDATATABLE9']."',
        sNext: '".$GLOBALS['app_strings']['LBL_JDATATABLE10']."',
        sPrevious: '".$GLOBALS['app_strings']['LBL_JDATATABLE11']."',
        sLast: '".$GLOBALS['app_strings']['LBL_JDATATABLE12']."',
        },
        iTabIndex: 1,
        sSearch: '".$GLOBALS['app_strings']['LBL_JDATATABLE3']."'
        },});
        });
        </script>";
    }else{
      $html .= '-Too Many Users to Show-';
    }
    $html_js = $html.$js;

    return array(
        "html" => $html_js,
        "success" => "1",
        "team_name" => $team->name,
        "short_name" => $team->short_name,
        "prefix" => $team->code_prefix,
        "type" => $team->team_type,
        "phone_number" => $team->phone_number,
        "team_id" => $team->id,
        "parent_id" => $team->parent_id,
        "parent_name" => empty($team->parent_name) ? $team->parent_name = '<-none->' : $team->parent_name = $team->parent_name,
        "description" => $team->description,
        "count_user" => $count,
        "region" => $team->region,
    );
}

function getTeamNodes($selected = null){
    $node_arr = array();
    $q1 = "SELECT id, name, parent_id, description FROM teams WHERE private <> 1 AND deleted <> 1 ORDER BY date_entered ASC";
    $rs1 = $GLOBALS['db']->query($q1);
    while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
        if($row['id'] == '1'){
            $open = true;
            $icon = "custom/include/javascripts/Ztree/img/diy/1_open.png";
        }
        else{
            $open = true;
            $icon = '';
        }

        $node_arr[] = array('id'=>$row['id'] , 'pId'=> $row['parent_id'], 'name'=>$row['name'], 'open'=>$open, 'icon'=>$icon,  'isParent'=>true);
    }
    return $node_arr;
}
?>
