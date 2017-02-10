<?php
    global $db, $timedate, $mod_strings, $app_list_strings;

    $choose_teams = $_POST['choose_teams'];
    $year = $_POST['year'];
    $month_list = array(              
        '1'=>"Jan", '2'=>"Feb", '3'=>"Mar", '4'=>"Apr",
        '5'=>"May", '6'=>"Jun", '7'=>"Jul", '8'=>"Aug",
        '9'=>"Sep", '10'=>"Oct", '11'=>"Nov", '12'=>"Dec",
    );
    $type = $_POST['type'];
    $str_year = substr( $year, 2, 2 );
    $targetConfigs = array();
    $html ='';
    $html .= '<div id="result_tbl">';
    $html .= '<table  id="tbl_result" style="border: 1px solid rgb(204, 204, 204);">';
    $html .='<thead>
    <tr>
    <th style="text-align: center; width: 4%;">'.translate('LBL_NO','J_Targetconfig').' </th>
    <th style=" text-align: center; width: 10%;">'.translate('LBL_CENTER','J_Targetconfig').'</th>';
    for($i = 1; $i <=12; $i++) {
        $html .= '<th><label class="input_set">'.$app_list_strings['dom_cal_month_short'][$i].'-'.$str_year.'</label></th> ';
    }
    $html .= '</tr>
    </thead>';

    $html .='<tbody>';    //(CASE WHEN t.short_name != '' AND !ISNULL(t.short_name) THEN t.short_name ELSE t.name END)
    $sql =  "SELECT t.id team_id, tc.`month`, tc.input_value, tc.id targer_id,
    t.name as name    
    FROM teams t
    LEFT JOIN  j_targetconfig tc ON tc.deleted = 0 AND t.deleted = 0 AND t.id = tc.team_id
    AND tc.year ='".$year."' AND tc.type_targetconfig_list='$type'
    WHERE t.id IN ('".implode("','",$choose_teams)."')  "; 
    $result = $GLOBALS['db']->query($sql);
    $targetConfigs = array();
    while($row = $GLOBALS['db']->fetchByAssoc($result)) { 
        $targetConfigs[$row['team_id']][$row['month']] = $row; 
        $targetConfigs[$row['team_id']]['name'] = $row['name']; 
    }
    //print_r($targetConfigs);
    for($i = 0 ; $i < count($choose_teams); $i++) {     
        $html .= '<tr>'.
        '<td style=" text-align: center; width: 4%;"></td>'.
        '<td style="text-align: center; width: 10%;">'.$targetConfigs[$choose_teams[$i]]['name']
        .'<input type=hidden name="team_name[]" id="team_name" value="'.$targetConfigs[$choose_teams[$i]]['name'].'"/>'
        .'<input type=hidden name="team_id[]" id="team_id" value="'.$choose_teams[$i].'"/></td>';
        for($j = 1; $j <= 12; $j++) {                  
            $targer = $targetConfigs[$choose_teams[$i]][$month_list[$j]];
            $html .= '<td>
            <input type=text class="input_set" name="input_value[]"  value="'.$targer['input_value'].'" />
            <input type=hidden name="targetconfig_id[]" id="targetconfig_id" value="'.$targer['targer_id'].'"/>
            </td>';           
        }
        $html .= '</tr>' ;
    }      
    $html .='</tbody>';
    $html .= '</table>';
    $html .= '<div  style="margin-top: 40px;margin-left: 42%;">          
    <input class="button primary" type="button" name="nsSave" value="'.translate('LBL_SAVE','J_Targetconfig').'" id="nsSave" style="padding: 6px 10px 6px 10px;">
    </div>';
    $html .= '</div>';
    echo $html; 
    die;