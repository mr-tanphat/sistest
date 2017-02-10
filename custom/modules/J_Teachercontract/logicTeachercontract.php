<?php

    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

    class logicTeachercontract {
        /*handle save day off of teacher*/
        function handleSaveTeachercontract(&$bean, $event, $arguments){
            $result= array();
            for ($i=0; $i<count($_POST['dayoff']);$i++){
                $result[]  = $_POST['dayoff'][$i];
            }
            $bean->day_off=encodeMultienumValue($result);
            // handle save name
            $bean->name=$_POST['no_contract'];
            //  save tpye teacher in C_teacher
            $type=$bean->contract_type;
            $sql="UPDATE c_teachers  SET title = '".$type."' where id='".$bean->c_teachers_j_teachercontract_1c_teachers_ida."'";
            $result= $GLOBALS['db']->query($sql); 
        }
        function handleSaveLeaving(&$bean, $event, $arguments){
            //delete day off of teacher
            $sql="DELETE FROM holidays WHERE teacher_id='".$bean->c_teachers_j_teachercontract_1c_teachers_ida."' AND type='Day Off' AND DELETED ='0'";
            $result= $GLOBALS['db']->query($sql); 
            //check day off 
            $start_date=$_POST['contract_date'];
            $end_date=$_POST['contract_until'];
            $week_day=$_POST['dayoff'];
            $array_day_off= $this->checkDayOff($start_date, $end_date, $week_day);
            //Save day off
            foreach ($array_day_off as $key => $value){
                $leavingBean = BeanFactory::getBean('Holidays');
                $leavingBean->date_entered=$bean->date_entered;
                $leavingBean->date_modified=$bean->date_modified;
                $leavingBean->modified_user_id=$bean->modified_user_id;
                $leavingBean->create_by=$bean->create_by;
                $leavingBean->holiday_date=$value;
                $leavingBean->deleted='0';
                $leavingBean->teacher_id=$bean->c_teachers_j_teachercontract_1c_teachers_ida;
                $leavingBean->type='Day Off';
                $leavingBean->save();                
            }
        }
        //function check Day Off
        function checkDayOff($start_date, $end_date, $week_day){
            global $timedate;
            date_default_timezone_set("Asia/Bangkok");
            // list holidays
            $q1 = "SELECT id, holiday_date, description FROM holidays WHERE deleted = 0 AND type = 'Public Holiday' AND holiday_date >= '{$timedate->to_db_date($start_date,false)}'";
            $rs1 = $GLOBALS['db']->query($q1);
            while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
                $holiday_list[$row['holiday_date']] = $row['description'];
            }

            $start = strtotime($timedate->to_db_date($start_date,false));
            $end = strtotime($timedate->to_db_date($end_date,false));
            $end = strtotime('+ 23 hours', $end);

            $day_off = array();

            while($start <= $end){
                $chck_day   = date('D', $start);
                $run_date   = date('Y-m-d', $start);
                if(in_array($chck_day, $week_day)&&!array_key_exists($run_date, $holiday_list)){
                    $day_off[]      = $run_date;
                }
                $start = strtotime('+1 day', $start);
            }
            return $day_off;
        }

        ///to mau id va status Quyen.Cao
        function listViewColorTeacherContract(&$bean, $event, $arguments){
            if($_REQUEST['action']=='Popup'){

            }else{
                $bean->name = '<span class="textbg_blue">'.$bean->name.'</span>';   
            }

            switch ($bean->contract_type) {
                case "AM":
                    $colorClass = "textbg_green"; 
                    break;
                case "AC":
                    $colorClass = "textbg_yellow_light"; 
                    break;
                case "ST":
                    $colorClass = "textbg_violet"; 
                    break;
                case "MT":
                    $colorClass = "textbg_orange"; 
                    break;
                case "FT":
                    $colorClass = "textbg_dream"; 
                    break;
                case "PT":
                    $colorClass = "textbg_crimson"; 
                    break;
            }   
            $bean->contract_type ="<span class='$colorClass'>".$bean->contract_type ."</span>";

        }
    }

