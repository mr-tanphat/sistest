<?php

class J_ClassViewEdit extends ViewEdit {

    function J_ClassViewEdit(){
        parent::ViewEdit();
    }
    public function display(){
        global $current_user, $timedate;

        if (!empty($this->bean->id)){
            if( empty($this->bean->aims_id) && ($this->bean->status =='Closed' || $this->bean->status =='Finish')  && !($GLOBALS['current_user']->isAdmin()) ){
                echo '
                <script type="text/javascript">
                alert(" Could not perform this operation because the class was '.$this->bean->status.'. !!");
                location.href=\'index.php?module=J_Class&action=DetailView&record='.$this->bean->id.'\';
                </script>';
                die();
            }
        }

        $team_type = $current_user->team_type;
        if(!empty($this->bean->team_id))
            $team_type = getTeamType($this->bean->team_id);
        $this->ss->assign('team_type',$team_type);

        if($team_type == 'Junior'){
            $this->ss->assign('defTime',2);
        }else{
            $this->ss->assign('defTime',3);
            $this->ss->assign('class_type_adult', array(
                ''          => '-none-',
                'Practice'  => 'Practice',
                'Skill'     => 'Skill',
                'Connect Club'  => 'Connect Club',
                'Connect Event' => 'Connect Event',));
        }

        //            $this->options ['show_subpanels'] = true;
        if($_REQUEST['isDuplicate'] == "true"){
            $this->bean->j_class_j_class_1_name =  $this->bean->name;
            $this->bean->j_class_j_class_1j_class_ida =  $this->bean->id;
            $this->bean->lesson_final_test =  $this->bean->lesson_final_test;
            $this->bean->c_teachers_j_class_1c_teachers_ida =  $this->bean->c_teachers_j_class_1c_teachers_ida;
            $this->bean->c_teachers_j_class_1_name =  $this->bean->c_teachers_j_class_1_name;

            $this->bean->class_code = 'Auto-Generate';
            //        $this->bean->name = 'Auto-Generate';
            $this->bean->name       = '';
            $this->bean->aims_id    = '';
            $class_case = 'create';
            $this->ss->assign('class_case',$class_case);
        }else{
            //In Case create new
            if(empty($this->bean->id)){
                $this->bean->class_code = 'Auto-Generate';
                //        $this->bean->name = 'Auto-Generate';
                $class_case = 'create';
            }else{ //In Case edit
                $class_case = 'edit';
                //Alert Upgrade Class
                $this->bean->load_relationship('j_class_j_class_1');
                $upgrade_to_class = reset($this->bean->j_class_j_class_1->getBeans());
                $this->ss->assign('upgrade_to_name',$upgrade_to_class->name);
                $this->ss->assign('upgrade_to_id',$upgrade_to_class->id);
                //đóng chức năng sửa start date
                require_once('custom/include/_helper/class_utils.php');
                if (checkDataLockDate($this->bean->start_date))
                    $this->ss->assign('is_lock_date','1');
                else
                    $this->ss->assign('is_lock_date','1');

            }
            $this->ss->assign('class_case',$class_case);
        }

        if(!empty($this->bean->id))
            $or_selected = "OR j_kindofcourse.id = '{$this->bean->koc_id}'";

        $and_team_type = "AND l1.team_type = '$team_type'";

        $team_id = $current_user->team_id;
        $q1 = "SELECT DISTINCT
        IFNULL(j_kindofcourse.id, '') primaryid,
        IFNULL(j_kindofcourse.name, '') name,
        IFNULL(j_kindofcourse.kind_of_course, '') kind_of_course,
        IFNULL(j_kindofcourse.kind_of_course_adult, '') kind_of_course_adult,
        IFNULL(j_kindofcourse.content, '') content,
        IFNULL(l1.id, '') team_id,
        IFNULL(l1.name, '') team_name,
        IFNULL(l1.team_type, '') team_type,
        j_kindofcourse.date_entered j_kindofcourse_date_entered
        FROM
        j_kindofcourse
        INNER JOIN
        teams l1 ON j_kindofcourse.team_id = l1.id
        AND l1.deleted = 0
        WHERE
        ((j_kindofcourse.team_set_id IN (SELECT
        tst.team_set_id
        FROM
        team_sets_teams tst
        INNER JOIN
        team_memberships team_memberships ON tst.team_id = team_memberships.team_id
        AND team_memberships.user_id = '{$current_user->id}'
        AND team_memberships.deleted = 0)))
        AND j_kindofcourse.deleted = 0
        AND j_kindofcourse.status = 'Active'
        $and_team_type
        $or_selected
        ORDER BY CASE
        WHEN
        (j_kindofcourse.kind_of_course = ''
        OR j_kindofcourse.kind_of_course IS NULL)
        THEN
        0
        WHEN j_kindofcourse.kind_of_course = 'Kindy' THEN 1
        WHEN j_kindofcourse.kind_of_course = 'Kids' THEN 2
        WHEN j_kindofcourse.kind_of_course = 'Kids Plus' THEN 3
        WHEN j_kindofcourse.kind_of_course = 'Teens' THEN 4
        WHEN j_kindofcourse.kind_of_course = 'Premium' THEN 5
        WHEN j_kindofcourse.kind_of_course = 'IELTS/TOEFL' THEN 6
        ELSE 7
        END ASC";
        $rs1 = $GLOBALS['db']->query($q1);
        //Generate html option
        $htm_koc = '<select name="kind_of_course" id="kind_of_course">';
        $htm_koc .= '<option label="-none-" value = "" >-none-</option>';
        while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
            if($this->bean->koc_id == $row['primaryid'])
                $str_selected = 'selected';
            else $str_selected = '';
            //Custom Adult
            if($row['team_type'] == 'Adult')
                $htm_koc .= '<option koc_id="'.$row['primaryid'].'" '.$str_selected.' json="'.$row['content'].'" label="'.$row['name'].'" value="'.$row['kind_of_course_adult'].'">'.$row['name'].'</option>';
            else
                $htm_koc .= '<option koc_id="'.$row['primaryid'].'" '.$str_selected.' json="'.$row['content'].'" label="'.$row['name'].'" value="'.$row['kind_of_course'].'">'.$row['name'].'</option>';
        }
        $htm_koc .= '</select>';
        $this->ss->assign('htm_koc',$htm_koc);

        // Display schedule
        $html = '';
        $short_schedule = json_decode(html_entity_decode($this->bean->short_schedule));
        foreach($short_schedule as $key => $value ){
            $html .= '<li>';
            $html .= $value.': '.$key;
            $html .= '</li>';
        }

        $this->ss->assign("SCHEDULE", $html);
        if(empty($this->bean->aims_id))
            $this->bean->aims_id = '';

        //Add Multiple enum
        $class_type_adult = array("Skill", "Connect Club", "Connect Event");
        if($team_type == 'Adult' && in_array($this->bean->class_type_adult ,$class_type_adult)){
            $this->bean->level = unencodeMultienum($this->bean->level);
            $this->ss->assign('dropdown_level','<select name="level[]" style="width: 120px;" id="level" multiple>'.get_select_options($GLOBALS['app_list_strings']['level_junior_program_list'], $this->bean->level).'</select>');
        }else
            $this->ss->assign('dropdown_level','<select name="level" style="width: 120px;" id="level">'.get_select_options($GLOBALS['app_list_strings']['level_junior_program_list'], $this->bean->level).'</select>');

        // Dirty trick to clear cache, a must for EditView:
        $th = new TemplateHandler();
        $th->deleteTemplate('J_Class', 'EditView');
        if($_GET['class_type'] == "Waiting Class" || $this->bean->class_type == "Waiting Class"){
            unset($this->ev->defs['panels']['LBL_EDITVIEW_PANEL1']);
            $this->bean->class_type = 'Waiting Class';
            if($team_type == 'Adult')
                unset($this->ev->defs['panels']['LBL_EDITVIEW_PANEL4'][4]);
        }else{
            unset($this->ev->defs['panels']['LBL_EDITVIEW_PANEL4']);
        }



        parent::display();
    }
}

?>