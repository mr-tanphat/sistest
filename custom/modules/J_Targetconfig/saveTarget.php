<?php
    $team_id = $_POST['team_id'];
    $name = $_POST['team_name'];
    $new_sale = $_POST['input_value'];
    $target_id = $_POST['targetconfig_id'];
    $year =  $_POST['years_choose'];
    $month_list = array(              
        '1'=>"Jan", '2'=>"Feb", '3'=>"Mar", '4'=>"Apr",
        '5'=>"May", '6'=>"Jun", '7'=>"Jul", '8'=>"Aug",
        '9'=>"Sep", '10'=>"Oct", '11'=>"Nov", '12'=>"Dec",
    );

    $date = $year.'-01-01';
    for($i = 0; $i< count($team_id); $i++) { 
        $month = 1;
        for($j = ($i*12); $j < ($i*12 + 12); $j++) { 
            $target= new J_Targetconfig();
            $target->retrieve($target_id[$j]);
            $target->type_targetconfig_list = $_POST['target_type'];
            $target->team_id = $team_id[$i];  
            $target->name = $name[$i];
            $target->input_value = $new_sale[$j];
            $target->month = $month_list[$month];
            $target->date_marketing = date('Y-m-d',strtotime('+'.($month-1).' months '.$date)) ;
            $target->year = $year;                 
            $target->save();
            $month++;
        }           
    }  
    echo 1;
    die;