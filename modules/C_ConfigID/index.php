<?php
    function classSchedule(){
        $ss = new Sugar_Smarty();
        $sql = "SELECT * FROM c_configid WHERE deleted=0 ORDER BY date_entered";
        $res = $GLOBALS['db']->query($sql); 
        $html = '';
        //Date Format
        $format_options =  array(             
            ''      => '-none-',
            'y'     => 'y: Year 2 digits e.g. XXX14',
            'Y'     => 'Y: Year 4 digits e.g. XXX2014',
            'my'    => 'my: Month and year 2 digits e.g. XXX0114',
            'dmy'   => 'dmy: Day month year 2 digits e.g. XXX010114',
            'dmY'   => 'dmY: Day month year 4 digits e.g. XXX01012014',
            'ymd'   => 'ymd: Year month day 2 digits e.g. XXX140101',
            'Ymd'   => 'Ymd: Year month day 2 digits e.g. XXX20140101',
            'custom'=> 'Other',
        );

        while($r = $GLOBALS['db']->fetchByAssoc($res)){
            $json = array(
                'id'                => $r['id'],
                'prefix'            => $r['name'],
                'code_separator'    => $r['code_separator'],
                'code_field'        => $r['code_field'],
                'module_name'       => $r['module_name'],
                'date_format'       => $r['date_format'],
                'is_reset'          => $r['is_reset'],
                'zero_padding'      => $r['zero_padding'],
                'first_num'         => $r['first_num'],
            );
            $date_format = $format_options[$r['date_format']];
            if(empty($date_format))
            $date_format = $r['date_format'];
            $json_en = json_encode($json);
            $input_json = "<input type='hidden' name='json_en' value='".$json_en."'>";
            ($r['is_reset'] == '1') ? $is_reset = '<input checked disabled type="checkbox">' : $is_reset = '<input disabled type="checkbox">';
            $html .= '<tr>
            <td>'.$input_json.'<input type="hidden" name="record_id" value="'.$r['id'].'">'.$r['name'].'</td>
            <td>'.$r['code_separator'].'</td>
            <td>'.$r['code_field'].'</td>
            <td>'.$r['module_name'].'</td>
            <td>'.$date_format.'</td>
            <td>'.$is_reset.'</td>
            <td>'.$r['zero_padding'].'</td>
            <td>'.$r['first_num'].'</td>      
            <td style="min-width:120px;">
            <a href="javascript:void(0)" style="text-decoration: none;" class="edit_bt"><i class="icon icon-edit"></i> Edit</a>&nbsp&nbsp
            <a href="javascript:void(0)" style="text-decoration: none;" class="del_bt"><i class="icon icon-trash"></i> Delete</a>
            </td>
            </tr>';   
        }

        $ss->assign("select_module", get_select_options(getAvailableModules(),''));
        $ss->assign("select_date_format", get_select_options($format_options,''));
        $ss->assign("MOD", $GLOBALS['mod_strings']);
        $ss->assign("table_body", $html);


        return $ss->fetch('modules/C_ConfigID/tpls/index.tpl');
    }  
    echo  classSchedule();


?>