<?php

    function getKOCOfCenter($center_id, $koc_id = '') {    
        if(empty($center_id)) return '<option json="[{&quot;levels&quot;:&quot;--None--&quot;}]" label="--None--" value = "" >--None--</option>';          
        $q1 = "SELECT DISTINCT
        IFNULL(j_kindofcourse.id, '') primaryid,
        IFNULL(j_kindofcourse.name, '') name,
        IFNULL(j_kindofcourse.kind_of_course, j_kindofcourse.kind_of_course_adult) kind_of_course,
        IFNULL(j_kindofcourse.content, '') content,
        IFNULL(l1.id, '') team_id,
        IFNULL(l1.name, '') team_name,
        j_kindofcourse.date_entered j_kindofcourse_date_entered
        FROM
        j_kindofcourse
        INNER JOIN
        teams l1 ON j_kindofcourse.team_id = l1.id 
        AND j_kindofcourse.status = 'Active'
        AND l1.deleted = 0  
        WHERE
        ((j_kindofcourse.team_set_id IN (SELECT 
        tst.team_set_id
        FROM
        team_sets_teams tst
        INNER JOIN
        team_memberships team_memberships ON tst.team_id = team_memberships.team_id
        AND team_memberships.team_id = '{$center_id}'
        AND team_memberships.deleted = 0)))
        AND j_kindofcourse.deleted = 0
        ORDER BY CASE
        WHEN (j_kindofcourse.kind_of_course = '' OR j_kindofcourse.kind_of_course IS NULL) THEN 0
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
        $htm_koc .= '<option label="--None--" value = "" >--None--</option>';
        while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
            if($koc_id == $row['primaryid']) $str_selected = 'selected';
            else $str_selected = '';
            $htm_koc .= '<option '.$str_selected.' json="'.$row['content'].'" value="'.$row['primaryid'].'">'.$row['name'].'</option>';
        }   
        return $htm_koc;      
    }

    function getLevelOptions($koc_id, $level='') {
        if(empty($koc_id)) return '<option label="--None--" value = "" >--None--</option>';
        $sql = "SELECT content FROM j_kindofcourse WHERE id = '$koc_id' ";
        $content =  $GLOBALS['db']->getOne($sql);
        $content = json_decode(html_entity_decode($content),true);
        $levels = array();
        foreach($content as $key => $val) {
            $levels[$val['levels']] = $val['levels'];
        }
        return get_select_options_with_id($levels,$level);
    }

    function saveConfig($_data) {
        $thisConfig = new J_GradebookConfig();
        $thisConfig->retrieve_by_string_fields(
            array(
                'team_id' => $_data['team_id'],
                'koc_id' => $_data['koc_id'],
                'level' => $_data['level'],
                'type' => $_data['type'],                    
            )
        ); 
        if(!$thisConfig->id) {
            $thisConfig->team_id = $_data['team_id'];
            $thisConfig->koc_id = $_data['koc_id'];
            $thisConfig->level = $_data['level'];
            $thisConfig->type = $_data['type'];
        }
        
        $thisConfig->weight = $_data['weight'];
        
        $get_team_type = "SELECT 
            CASE
                WHEN koc.kind_of_course <> '' THEN koc.kind_of_course
                ELSE koc.kind_of_course_adult
            END kind_of_course,
            t.team_type team_type
        FROM
            j_kindofcourse koc
                INNER JOIN
            teams t ON t.id = koc.team_id
        WHERE
            koc.id = '{$_data['koc_id']}'";
        $rs1 = reset($GLOBALS['db']->fetchArray($get_team_type));
//        $rs1 = reset($rs_team);
        $thisConfig->kind_of_course = $rs1['kind_of_course'];
        if($rs1['team_type'] == 'Adult'){
            $configs = $thisConfig->gradebook_config_mark_options_adult;    
        }else{
            $configs = $thisConfig->gradebook_config_mark_options;    
        }
        
        $contents = array();
        foreach($configs as $key => $parrams) {
            $alias = $parrams['name']."_";
            $contents[$key] =  array(
                'visible' => $_data[$alias.'visible']?1:0,
                'max_mark' => ($_data[$alias.'visible'])? $_data[$alias.'max_mark'] + 0 : 0,
                'weight' => ($_data[$alias.'visible'])? $_data[$alias.'weight'] + 0 : 0,
                'readonly' => ($_data[$alias.'visible'])? ($_data[$alias.'readonly']?1:0) : 0,
                'formula' => strtoupper(($_data[$alias.'readonly'])? $_data[$alias.'formula'] : ""),
            ); 
        }

        $thisConfig->content = json_encode($contents);
        return $thisConfig->save();           
    }

    function getConfigContent($_data) {
        $thisConfig = new J_GradebookConfig();
        $thisKOC = new J_Kindofcourse();
        $thisKOC->retrieve($_data['koc_id']);
        $thisConfig->retrieve_by_string_fields(
            array(
                'team_id' => $_data['center_id'],
                'koc_id' => $_data['koc_id'],
                'level' => $_data['level'],
                'type' => $_data['config_type'],                    
            )
        );
        return json_encode(array(
            'record' => $thisConfig->id,
            'weight' => ($thisConfig->weight ? $thisConfig->weight : ($thisKOC->isAdultKOC() ? 100  : 0)),
            'html' => $thisConfig->loadConfigContent(),
        ));
    }

    function getTypeOfKOC($_data) {
        $thisKOC = new J_Kindofcourse();
        $thisKOC->retrieve($_data['koc_id']);
        $option = loadTestTypeOfKOC($_data['koc_id'], $_data['level']);
            
        return json_encode(array(
            'isAdult' => $thisKOC->isAdultKOC(),
            'html' => get_select_options_with_id($option, ''),
        ));
    }

    function loadTestTypeOfKOC($koc_id, $level) { 
        if(!$koc_id) {
            return array (
                    "" => "--None--" ,
                );  
        }  
        $thisKOC = new J_Kindofcourse();
        $thisKOC->retrieve($koc_id);
        if(!empty($thisKOC->kind_of_course_adult)){
            return array(
                'LMS' => 'LMS',
                'Class Progress' => 'Class Progress',
                'Mini Check' => 'Mini Check',
                'Attendance' => 'Attendance' 
            ) ;    
        }else{            
            if($thisKOC->isAdultKOC()) {
                return array (
                                "Test 1" => "Test 1" ,
                            ) ;
                
            } else {
                $config = json_decode(html_entity_decode($thisKOC->content));
                foreach($config as $cg) {
                    if(isset($cg->levels) && $cg->levels == $level && isset($cg->hours) ) {
                        if($cg->hours + 0 > 72) {
                            return array (
                                "Test 1" => "Test 1" ,
                                "Test 2" => "Test 2",
                                "Test 3" => "Test 3"
                            ) ;
                        }else if($cg->hours + 0 > 36) {
                            return array (
                                "Test 1" => "Test 1" ,
                                "Test 2" => "Test 2",
                            ) ;

                        } else if($cg->hours + 0 > 0) {
                            return array (
                                "Test 1" => "Test 1" ,
                            ) ;

                        } else {
                            return array (
                                "" => "-none-" ,
                            ) ;

                        }
                        continue;
                    }
                }
            }
             
        }
    }
?>
