<?php

    $filter = $this->where;
    $parts = explode("AND", $filter);

    $start = get_string_between($parts[0],"'","'");
    $end = get_string_between($parts[1],"'","'");

    $split_team_1 = substr($parts[2], 12);
    $split_team_2 = substr($split_team_1 , 0, -4);
    $split_team_3 = explode(",",$split_team_2 );

    $last_start = date('Y-m-d',strtotime("$start -1 years"));
    $last_end = date('Y-m-d',strtotime("$end -1 years"));

    $total_JR = 0;
    $total_AD = 0;
    $total_JR_latst = 0;

    $html = '</br></br></br><table class="reportlistView"><tbody>';

    /////ROW NAME
    $html .= '<tr><td></td>';
    for($i = 0; $i< count ($split_team_3); $i++){

        $team_id = get_string_between($split_team_3[$i],"'","'");
        $team = BeanFactory::getBean('Teams',$team_id);
        $html .= '<td colspan=2>'.$team->name.'</td>';
    }
    $html .= '</tr>';

    ///////AD -JR
    $html .= '<tr><td></td>';
    for($i = 0; $i< count ($split_team_3); $i++){
        $html .= '<td>AD</td><td>JR</td>';
    }
    $html .= '</tr>';

     ///////ROW Lead Current
    $html .= '<tr><td>'.date("j M Y", strtotime($start)).' - '.date("j M Y", strtotime($end)).'</td>';
    for($i = 0; $i< count ($split_team_3); $i++){
        $team_id = get_string_between($split_team_3[$i],"'","'");
        $sql_get_enquires = "
        SELECT count(leads.id)         total_lead
        FROM   leads
        INNER JOIN teams l1
        ON leads.team_id = l1.id
        AND l1.deleted = 0
        WHERE  (( (( leads.date_entered >= '$start'
        AND leads.date_entered <= '$end' ))
        AND ( l1.id = '$team_id' ) ))
        AND leads.deleted = 0
        ";
        $result_enquires = $GLOBALS['db']->query($sql_get_enquires);
        while($row = $GLOBALS['db']->fetchByAssoc($result_enquires))
        {
            $html .= '<td>0</td><td>'.$row['total_lead'].'</td>';
        }

    }
    $html .= '</tr>';


    //// ///////ROW Total Lead
    $html .= '<tr><td>Total</td>';
    for($i = 0; $i< count ($split_team_3); $i++){
        $team_id = get_string_between($split_team_3[$i],"'","'");
        $sql_get_enquires = "
        SELECT count(leads.id)         total_lead
        FROM   leads
        INNER JOIN teams l1
        ON leads.team_id = l1.id
        AND l1.deleted = 0
        WHERE  (( (( leads.date_entered >= '$start'
        AND leads.date_entered <= '$end' ))
        AND ( l1.id = '$team_id' ) ))
        AND leads.deleted = 0
        ";
        $result_enquires = $GLOBALS['db']->query($sql_get_enquires);
        $team_id = get_string_between($split_team_3[$i],"'","'");
        while($row = $GLOBALS['db']->fetchByAssoc($result_enquires))
        {
            $html .= '<td>0</td><td>'.$row['total_lead'].'</td>';
            $total_JR +=$row['total_lead'];
        }

    }
    $html .= '</tr>';


    //// ///////ROW Compare To Last Year
    $html .= '<tr><td>Compare To Last Year</td>';
    for($i = 0; $i< count ($split_team_3); $i++){
        $team_id = get_string_between($split_team_3[$i],"'","'");
        $sql_last_enquires = "
        SELECT count(leads.id)         total_lead
        FROM   leads
        INNER JOIN teams l1
        ON leads.team_id = l1.id
        AND l1.deleted = 0
        WHERE  (( (( leads.date_entered >= '$last_start'
        AND leads.date_entered <= '$last_end' ))
        AND ( l1.id = '$team_id' ) ))
        AND leads.deleted = 0
        ";
        $result_last_enquires = $GLOBALS['db']->query($sql_last_enquires);

        while($row_last = $GLOBALS['db']->fetchByAssoc($result_last_enquires))
        {
            $html .= '<td>0</td><td>'.$row_last['total_lead'].'</td>';
            $total_JR_latst +=$row_last['total_lead'];
        }

    }
    $html .= '</tr>';

    ///////ROW Different
    $html .= '<tr><td>Different</td>';
    for($i = 0; $i< count ($split_team_3); $i++){
        $team_id = get_string_between($split_team_3[$i],"'","'");

        $sql_get_enquires = "
        SELECT count(leads.id)         total_lead
        FROM   leads
        INNER JOIN teams l1
        ON leads.team_id = l1.id
        AND l1.deleted = 0
        WHERE  (( (( leads.date_entered >= '$start'
        AND leads.date_entered <= '$end' ))
        AND ( l1.id = '$team_id' ) ))
        AND leads.deleted = 0
        ";
        $result_enquires = $GLOBALS['db']->query($sql_get_enquires);

        $sql_last_enquires = "
        SELECT count(leads.id)         total_lead
        FROM   leads
        INNER JOIN teams l1
        ON leads.team_id = l1.id
        AND l1.deleted = 0
        WHERE  (( (( leads.date_entered >= '$last_start'
        AND leads.date_entered <= '$last_end' ))
        AND ( l1.id = '$team_id' ) ))
        AND leads.deleted = 0
        ";
        $result_last_enquires = $GLOBALS['db']->query($sql_last_enquires);

        while($row = $GLOBALS['db']->fetchByAssoc($result_enquires))
        {
            while($row_last = $GLOBALS['db']->fetchByAssoc($result_last_enquires))
            {
                $different = $row['total_lead'] - $row_last['total_lead'];
                $html .= '<td>0</td><td>'.$different.'</td>';
            }
        }

    }
    $html .= '</tr></tbody></table>';

    //$html .= '</br></br></br>';

    $html .= '<table class="reportlistView"><tbody>';
    $html .= '<tr> <td>Total AD</td> <td>0</td> </tr>';


    $html .= '<tr><td>Total Junior</td><td>'.$total_JR.'</td></tr>';
    $total_enquires = $total_JR + $total_AD;
    $html .= '<tr><td>Total Inquiries</td><td>'.$total_enquires.'</td><td>Chưa Biết Tính Số Này</td>tr>';
    $html .= '<tr><td>Compare To Last Year</td><td>'.$total_JR_latst.'</td><td>'.$total_JR_latst.'</td></tr>';
    $total_different = ($total_enquires - $total_JR_latst)/$total_JR_latst;
    $html .= '<tr> <td>Different</td> <td>'.$total_different.'</td> <td>'.$total_different.'</td> </tr>';
    $html .= '</tbody></table>';

    echo $html;
?>
