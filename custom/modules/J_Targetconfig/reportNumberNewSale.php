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

    $total_sale = 0;
    $total_target = 0;
    $total_different = 0;
    $total_grow = 0;
    $html = '</br></br></br><table class="reportlistView"><tbody>';

    /////ROW NAME
    $html .= '<tr><td>Number Of New Sales</td>';
    for($i = 0; $i< count ($split_team_3); $i++){

        $team_id = get_string_between($split_team_3[$i],"'","'");
        $team = BeanFactory::getBean('Teams',$team_id);
        $html .= '<td>'.$team->name.'</td>';
    }
    $html .= '<td>Total</td>';
    $html .= '</tr>';

    ///////ROW sale Current
    $html .= '<tr><td>'.date("j M Y", strtotime($start)).' - '.date("j M Y", strtotime($end)).'</td>';
    for($i = 0; $i< count ($split_team_3); $i++){
        $team_id = get_string_between($split_team_3[$i],"'","'");

        $sql_get_sale = "
        SELECT count(j_payment.id)          total_pay
        FROM   j_payment
        INNER JOIN teams l1
        ON j_payment.team_id = l1.id
        AND l1.deleted = 0
        WHERE  (( (( j_payment.date_entered >= '$start'
        AND j_payment.date_entered <= '$end' ))
        AND ( l1.id = '$team_id' ) ))
        AND j_payment.deleted = 0
        ";
        $result_sale = $GLOBALS['db']->query($sql_get_sale);

        while($row = $GLOBALS['db']->fetchByAssoc($result_sale))
        {
            $html .= '<td>'.$row['total_pay'].'</td>';
            $total_sale +=$row['total_pay'];
        }

    }
    $html .= '<td>'.$total_sale.'</td>';
    $html .= '</tr>';


    //// ///////ROW Total Lead
    $html .= '<tr><td>Total</td>';
    for($i = 0; $i< count ($split_team_3); $i++){
        $team_id = get_string_between($split_team_3[$i],"'","'");
        $sql_get_sale = "
        SELECT count(j_payment.id)          total_pay
        FROM   j_payment
        INNER JOIN teams l1
        ON j_payment.team_id = l1.id
        AND l1.deleted = 0
        WHERE  (( (( j_payment.date_entered >= '$start'
        AND j_payment.date_entered <= '$end' ))
        AND ( l1.id = '$team_id' ) ))
        AND j_payment.deleted = 0
        ";
        $result_sale = $GLOBALS['db']->query($sql_get_sale);

        while($row = $GLOBALS['db']->fetchByAssoc($result_sale))
        {
            $html .= '<td>'.$row['total_pay'].'</td>';
        }

    }
    $html .= '<td>'.$total_sale.'</td>';
    $html .= '</tr>';


    //// ///////ROW Compare To target
    $html .= '<tr><td>Compare To Target</td>';
    for($i = 0; $i< count ($split_team_3); $i++){
        $team_id = get_string_between($split_team_3[$i],"'","'");
        $sql_target = "
        SELECT SUM(j_targetconfig.input_value) target
        FROM   j_targetconfig
        INNER JOIN teams l1
        ON j_targetconfig.team_id = l1.id
        AND l1.deleted = 0
        WHERE  (( ( j_targetconfig.type_targetconfig_list = 'New Sale' )
        AND ( l1.id = '$team_id' )
        AND (( j_targetconfig.date_marketing >= '$start'
        AND j_targetconfig.date_marketing <= '$end' )) ))
        AND j_targetconfig.deleted = 0
        ";
        $result_target = $GLOBALS['db']->query($sql_target);

        while($row = $GLOBALS['db']->fetchByAssoc($result_target))
        {
            if(!empty($row['target'])){
                $html .= '<td>'.$row['target'].'</td>';
            }else{
                $html .= '<td>0</td>';
            }
            $total_target +=$row['target'];

        }

    }
    $html .= '<td>'.$total_target.'</td>';
    $html .= '</tr>';

    ///////ROW Different
    $html .= '<tr><td>Different</td>';
    for($i = 0; $i< count ($split_team_3); $i++){
        $team_id = get_string_between($split_team_3[$i],"'","'");

        $sql_get_sale = "
        SELECT count(j_payment.id)          total_pay
        FROM   j_payment
        INNER JOIN teams l1
        ON j_payment.team_id = l1.id
        AND l1.deleted = 0
        WHERE  (( (( j_payment.date_entered >= '$start'
        AND j_payment.date_entered <= '$end' ))
        AND ( l1.id = '$team_id' ) ))
        AND j_payment.deleted = 0
        ";
        $result_sale = $GLOBALS['db']->query($sql_get_sale);

        $sql_target = "
        SELECT SUM(j_targetconfig.input_value) target
        FROM   j_targetconfig
        INNER JOIN teams l1
        ON j_targetconfig.team_id = l1.id
        AND l1.deleted = 0
        WHERE  (( ( j_targetconfig.type_targetconfig_list = 'New Sale' )
        AND ( l1.id = '$team_id' )
        AND (( j_targetconfig.date_marketing >= '$start'
        AND j_targetconfig.date_marketing <= '$end' )) ))
        AND j_targetconfig.deleted = 0
        ";
        $result_target = $GLOBALS['db']->query($sql_target);


        while($row = $GLOBALS['db']->fetchByAssoc($result_sale))
        {
            while($row_last = $GLOBALS['db']->fetchByAssoc($result_target))
            {
                $different = $row['total_pay'] - $row_last['target'];
                $html .= '<td>'.$different.'</td>';
                $total_different += $different;
            }
        }

    }
    $html .= '<td>'.$total_different.'</td>';
    $html .= '</tr>';

    ///////ROW Grow
    $html .= '<tr><td>% growth compare to target</td>';
    for($i = 0; $i< count ($split_team_3); $i++){
        $team_id = get_string_between($split_team_3[$i],"'","'");

        $sql_get_sale = "
        SELECT count(j_payment.id)          total_pay
        FROM   j_payment
        INNER JOIN teams l1
        ON j_payment.team_id = l1.id
        AND l1.deleted = 0
        WHERE  (( (( j_payment.date_entered >= '$start'
        AND j_payment.date_entered <= '$end' ))
        AND ( l1.id = '$team_id' ) ))
        AND j_payment.deleted = 0
        ";
        $result_sale = $GLOBALS['db']->query($sql_get_sale);

        $sql_target = "
        SELECT SUM(j_targetconfig.input_value) target
        FROM   j_targetconfig
        INNER JOIN teams l1
        ON j_targetconfig.team_id = l1.id
        AND l1.deleted = 0
        WHERE  (( ( j_targetconfig.type_targetconfig_list = 'New Sale' )
        AND ( l1.id = '$team_id' )
        AND (( j_targetconfig.date_marketing >= '$start'
        AND j_targetconfig.date_marketing <= '$end' )) ))
        AND j_targetconfig.deleted = 0
        ";
        $result_target = $GLOBALS['db']->query($sql_target);


        while($row = $GLOBALS['db']->fetchByAssoc($result_sale))
        {
            while($row_last = $GLOBALS['db']->fetchByAssoc($result_target))
            {
                $total_target +=$row_last['target'];
                $different = $row['total_pay'] - $row_last['target'];
                $total_different += $different;

            }

            $grow = $total_different / $total_target;
            $html .= '<td>'.$grow.'</td>';
        }
    }
    $total_grow = $total_target / $total_different;
    $html .= '<td>'.$total_grow.'</td>';
    $html .= '</tr></tbody></table>';

    echo $html;
?>
