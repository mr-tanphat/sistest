<?PHP
/*********************************************************************************
* By installing or using this file, you are confirming on behalf of the entity
* subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
* the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
* http://www.sugarcrm.com/master-subscription-agreement
*
* If Company is not bound by the MSA, then by installing or using this file
* you are agreeing unconditionally that Company will be bound by the MSA and
* certifying that you have authority to bind Company accordingly.
*
* Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
********************************************************************************/

/**
* THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
*/
require_once('modules/J_Gradebook/J_Gradebook_sugar.php');
class J_Gradebook extends J_Gradebook_sugar {
    var $class;
    var $gradebookConfig;
    var $students;
    var $config;
    var $gradebookDetail;
    /**
    * This is a depreciated method, please start using __construct() as this method will be removed in a future version
    *
    * @see __construct
    * @depreciated
    */
    function J_Gradebook(){
        self::__construct();
    }

    public function __construct(){
        parent::__construct();
    }

    public function _constructDefault($new_config = true) {
        $this->class = new J_Class();
        $this->gradebookConfig = new J_GradebookConfig();
        $this->class->retrieve($this->j_class_j_gradebook_1j_class_ida);
        $this->gradebookConfig->retrieve_by_string_fields(
            array(
                'team_id' => $this->class->team_id,
                'koc_id' => $this->class->koc_id,
                'level' => $this->class->level,
                'type' => $this->type,
            )
        );

        $this->class->load_relationship('j_class_contacts_1');
        $this->students = $this->class->j_class_contacts_1->getBeans();

        if($this->type == 'Final') {
            $this->weight = 100;
            $this->grade_config = json_encode(array(
                'total_mark' => array(
                    'visible' => true,
                    'max_mark' => 1,
                    'label' => "Final Result (%)"
                ),
            ));
        } else if($new_config || !$this->grade_config) {
            $this->grade_config = $this->gradebookConfig->content;
            $this->weight = $this->gradebookConfig->weight;
        }
        $this->config = json_decode(html_entity_decode($this->grade_config),true) ;
        $this->loadGradebookDetail();
    }

    /**
    * load bang diem chi tiet cac hoc vien
    *
    * @param bool $refresh
    *
    * @author Trung Nguyen
    */
    public function loadGradeContent($new_config = false, $refresh = false) {

        if(!$this->gradebookConfig) {
            $this->_constructDefault($new_config);
        }
        if($this->type == 'Final') {
            return $this->loadGradeFinalContent($refresh);
        }

        if(!$refresh) {

        }
        $keys = array();
        $maxs = 0;
        $html = "<table id = 'config_content' width='100%'>
        <thead>
        <tr>
        <td width='3%' ><b>No.</b></td>
        <td width='7%' style=\"text-align:left;\"><b>Avatar</b></td>
        <td width='10%' style=\"text-align:left;\"><b>Student ID</b></td>
        <td width='10%' style=\"text-align:left;\"><b>Student Name</b></td>
        <td width='7%' style=\"text-align:left;\"><b>Nickname</b></td>
        <td width='7%' style=\"text-align:left;\"><b>Birthdate</b></td>";
        foreach($this->config as $key => $params) {
            if(!$params['visible']) continue;
            if(strpos($this->team_name,'360')){
                $html.= "<td width='5%' class ='td-mark'> <b> ".$this->gradebookConfig->gradebook_config_mark_options_adult[$key]['label']." </b></td>" ;
            }else{
                $html.= "<td width='5%' class ='td-mark'> <b> ".$this->gradebookConfig->gradebook_config_mark_options[$key]['label']." </b></td>" ;
            }
        }
        $html .= "
        <td  width='20%' style=\"text-align:left;\"><b>Teacher's Recommendations</b></td>
        </tr>
        </thead>
        <tbody> ";
        $no = 0;
        foreach($this->students as $student_id => $student) {
            $student_mark = $this->gradebookDetail[$student_id];
            $no++;

            $picture = '<a href="javascript:SUGAR.image.lightbox(\'index.php?entryPoint=download&id='.$student->picture.'&type=SugarFieldImage&isTempFile=1\')"><img src="custom/uploads/imagesResize/'.$student->picture.'" style="height: 80px;">&nbsp;</a>';
            if(empty($student->picture))
                $picture = '<img src="themes/default/images/noimage.png" style="height: 80px;">';

            $tr = "<tr>
            <td class = 'center'>{$no}</td>
            <td>$picture</td>
            <td>{$student->contact_id}</td>
            <td><span class = 'student_name'>{$student->name}</span>
            <input name='student_id[]' value = '{$student->id}' type='hidden' >
            </td>
            <td>{$student->nickname}</td>
            <td>{$student->birthdate}</td>
            ";
            foreach($this->config as $key => $params) {
                if(!$params['visible']) continue;
                $tr.= "<td class='td-mark'>
                <input name='{$key}[]'
                id = '{$student_id}-{$key}'
                config-data='".($student_mark[$key]?$student_mark[$key]:0)."'
                config-max='{$params['max_mark']}'
                config-weight='{$params['weight']}'
                config-readonly='{$params['readonly']}'
                config-formula='{$params['formula']}'
                config-alias='{$key}'
                value = '".($student_mark[$key]?$student_mark[$key]:0)."' class = 'input_mark'
                size = '3'
                ".($params['readonly']?"readonly":"")."
                ".($key=='T'?" type='hidden'":" type='text'")."
                />
                ".($key=='T'?"<span class='final_result'>".(round((($student_mark[$key]/$params['max_mark']*100)?($student_mark[$key]/$params['max_mark']*100):"0")+0,2,2))."</span>":"")."
                </td>" ;
                if($no==1) {
                    $keys[] =  $key;
                    if(strpos($this->team_name,'360')){
                        if($this->gradebookConfig->gradebook_config_mark_options_adult[$key]['name']== 'total')
                            $maxs = $params['max_mark'];
                    }else{
                        if($this->gradebookConfig->gradebook_config_mark_options[$key]['name'] == 'total')
                            $maxs = $params['max_mark'];
                    }
                }
            }
            if(strlen($student_mark['comment_label']) > 30) {
                $cm = "<span class='value_teacher_comment' title='{$student_mark['comment_label']}'>".(mb_substr($student_mark['comment_label'],0,35,'UTF-8')."...")."</span>";
            } else if(strlen($student_mark['comment_label']) > 0) {
                $cm = "<span class='value_teacher_comment' title='{$student_mark['comment_label']}'>".$student_mark['comment_label']."</span>";
            } else {
                $cm = "<span class='value_teacher_comment' title='{$student_mark['comment_label']}'>--None--</span>";
            }
            $tr .= "<td class='comment' style=\"cursor:pointer\">
            <input type='hidden' name='key_teacher_comment[]' value = '".json_encode($student_mark['comment_key'])."'>
            $cm
            <input type='hidden' name='value_teacher_comment[]' value = '{$student_mark['comment_label']}'>
            </td>
            </tr>";
            $html.= $tr;
        }
        $html .= "</tbody>
        </table>
        <input type='hidden' name = 'key' value='".(json_encode($keys))."' >
        <input type='hidden' name = 'max_marks' value='".$maxs."' >
        ";
        return $html;
    }

    /**
    * load bang diem final cua cac hoc sinh
    *
    * @param bool $refresh
    *
    * @author Trung Nguyen
    */
    function loadGradeFinalContent($refresh = false) {
        $html = "<table id = 'config_content' width='100%'>
        <thead>
        <tr>
        <td width='3%' ><b>No.</b></td>
        <td width='7%' style=\"text-align:left;\"><b>Avatar</b></td>
        <td width='10%' style=\"text-align:left;\"><b>Student ID</b></td>
        <td width='10%' style=\"text-align:left;\"><b>Student Name</b></td>
        <td width='7%' style=\"text-align:left;\"><b>Nickname</b></td>
        <td width='7%' style=\"text-align:left;\"><b>Birthdate</b></td>
        <td width='5%' ><b>Total (%)</b></td>
        <td width='20%' style=\"text-align:left;\"><b>Teacher's Recommendations</b></td>
        </tr>
        </thead>
        <tbody> ";
        $no = 0;
        $total_mark = $this->getTotalMark($refresh) ;
        foreach($this->students as $student_id => $student) {
            $student_mark = $this->gradebookDetail[$student_id];
            if(!$total_mark[$student_id]) continue;
            $no++;

            if(strlen($student_mark['comment_label']) > 30) {
                $cm = "<span class='value_teacher_comment' title='{$student_mark['comment_label']}'>".(mb_substr($student_mark['comment_label'],0,35,'UTF-8')."...")."</span>";
            } else if(strlen($student_mark['comment_label']) > 0) {
                $cm = "<span class='value_teacher_comment' title='{$student_mark['comment_label']}'>".$student_mark['comment_label']."</span>";
            } else {
                $cm = "<span class='value_teacher_comment' title='{$student_mark['comment_label']}'>--None--</span>";
            }
            $picture = '<a href="javascript:SUGAR.image.lightbox(\'index.php?entryPoint=download&id='.$student->picture.'&type=SugarFieldImage&isTempFile=1\')"><img src="custom/uploads/imagesResize/'.$student->picture.'" style="height: 80px;">&nbsp;</a>';
            if(empty($student->picture))
                $picture = '<img src="themes/default/images/noimage.png" style="height: 80px;">';

            $tr = "<tr>
            <td class = 'center'>{$no}</td>
            <td>$picture</td>
            <td>{$student->contact_id}</td>
            <td><span class = 'student_name'>{$student->name}</span>
            <input name='student_id[]' value = '{$student->id}' type='hidden'>
            </td>
            <td>{$student->nickname}</td>
            <td>{$student->birthdate}</td>
            <td class='td-mark center'>
            <input name='total_mark[]' type = 'hidden' value = '".($total_mark[$student_id])."' >
            <span class='final_result span_total center' id = '{$student_id}-final_result' >
            ".(round($total_mark[$student_id] * 100, 2, 2))."
            </span>
            </td>
            <td class='comment' style=\"cursor:pointer\">
            <input type='hidden' name='key_teacher_comment[]' value = '".json_encode($student_mark['comment_key'])."'>
            $cm
            <input type='hidden' name='value_teacher_comment[]' value = '{$student_mark['comment_label']}'>
            </td>
            </tr>";
            $html.= $tr;
        }
        $html .= "</tbody>
        </table>
        <input type='hidden' name = 'key' value='".(json_encode(array('total_mark')))."' >
        <input type='hidden' name = 'max_marks' value='1' >
        ";
        return $html;
    }

    /**
    * lay diem chi tiet cua mot hoc vien trong bang diem
    *
    * @param String: Student CRMID
    *
    * @author Trung Nguyen
    */
    public function getDetailForStudent($student_id) {
        if(!$this->gradebookConfig) {
            $this->_constructDefault();
        }
        //$default = $this->gradebookConfig->gradebook_config_mark_options;
        $header = array();
        $max = array();
        $mark = array();
        $weight = array();
        $per = array();
        $student_mark = $this->gradebookDetail[$student_id];
        foreach($this->config as $key => $params) {
            if(!$params['visible']) continue;
            if(strpos($this->team_name,'360')){
                if($key == "T" || $key == 'total_mark') {
                    $header[] = trim($this->gradebookConfig->gradebook_config_mark_options_adult[$key]['label'], "(%)");
                } else
                    $header[] = $this->gradebookConfig->gradebook_config_mark_options_adult[$key]['label'];
            }else{
                if($key == "T" || $key == 'total_mark') {
                    $header[] = trim($this->gradebookConfig->gradebook_config_mark_options[$key]['label'], "(%)");
                } else
                    $header[] = $this->gradebookConfig->gradebook_config_mark_options[$key]['label'];
            }


            $max[] = $params['max_mark'] + 0;
            $mark[] = round($student_mark[$key]?$student_mark[$key] + 0:0,2);
            $weight[] = $params['weight'];
            $per[] = $params['max_mark'] + 0 > 0?(round(($student_mark[$key]?$student_mark[$key]+0:0)/$params['max_mark']*100,2,2)):"";
        }
        return array(
            'header' => $header,
            'max' => $max,
            'mark' => $mark,
            'weight' => $weight,
            'per' => $per,
            'comment' => $student_mark['comment_label'],
        );
    }

    /**
    * lay diem chi tiet cua cac hoc vien trong bang diem
    *
    * @author Trung Nguyen
    */
    function loadGradebookDetail() {
        $sql = "SELECT student_id, content
        FROM j_gradebookdetail
        WHERE deleted = 0 AND gradebook_id = '{$this->id}' ";
        $this->gradebookDetail = array();
        $result = $this->db->query($sql);
        while($row = $this->db->fetchByAssoc($result)) {
            $this->gradebookDetail[$row['student_id']] =  json_decode(html_entity_decode($row['content']),true);
            $this->gradebookDetail[$row['student_id']]['comment_label'] = base64_decode($this->gradebookDetail[$row['student_id']]['comment_label']);
        }
    }

    /**
    * tính toan diem tong cho bang diem final cua tung hoc sinh
    *
    * @author Trung Nguyen
    */
    function getTotalMark($refresh = false) {
        $data = array();
        if(!$refresh) {
            foreach($this->gradebookDetail as $student_id => $params) {
                $data[$student_id] = $params['total_mark'];
            }
        } else {
            $customwhere = "";
            if(strpos($this->class->team_name,'360')){
                $count = 2;
                $customwhere = " AND gb.type in ('LMS','Class Progress') ";
            }else{
                if($this->class->isAdultKOC()) {
                    $count = 1;
                    $customwhere = " AND gb.type = 'Test 1' " ;
                }  else if($this->class->hours >72) {
                    $count = 2;
                    $customwhere = " AND gb.type IN ('Test 2','Test 3') " ;     //redmine #459
                } else if($this->class->hours >36){
                    $count = 2;
                } else if($this->class->hours >0) {
                    $count = 1;
                } else $count = 0;
            }

            $sql = "SELECT
            gbd.student_id,
            SUM(gbd.final_result * gb.weight / 100) as final_result_total,
            COUNT(gbd.final_result) as mark_count
            FROM j_gradebook gb
            INNER JOIN j_gradebookdetail gbd ON  gbd.gradebook_id = gb.id AND gbd.deleted = 0 AND gbd.total_mark + 0 > 0
            INNER JOIN j_class_j_gradebook_1_c c_gb ON c_gb.deleted = 0 AND gb.id = c_gb.j_class_j_gradebook_1j_gradebook_idb
            INNER JOIN j_class c ON c.deleted = 0 AND c.id = c_gb.j_class_j_gradebook_1j_class_ida
            WHERE gb.deleted = 0 AND gb.type != 'Final' $customwhere
            AND c.id = '{$this->class->id}'
            GROUP BY gbd.student_id
            HAVING mark_count >= $count";
            $result = $this->db->query($sql);

            while($row = $this->db->fetchByAssoc($result)) {
                $data[$row['student_id']] = 0 + $row['final_result_total'];
            }
        }
        return $data;
    }

    /**
    * lay diem max danh cho bang diem final
    *
    * @author Trung Nguyen
    */
    function getMaxFinalMark() {
        $sql = "SELECT gc.content, gc.weight
        FROM j_gradebookconfig gc
        INNER JOIN j_class c ON c.deleted = 0 AND c.koc_id = gc.koc_id AND c.`level` = gc.`level` AND c.team_id = gc.team_id
        AND c.id = '{$this->j_class_j_gradebook_1j_class_ida}' ";
        $result = $this->db->query($sql);
        $max = 0;
        while($row = $this->db->fetchByAssoc($result)) {
            $content =  json_decode(html_entity_decode($row['content']),true);
            $total_config = end($content);
            $max += (($total_config['max_mark'] + 0) * ($row['weight'] + 0) /100);
        }
        return $max;
    }

    function getHTMLStudentMark() {
        if(!$this->gradebookConfig) {
            $this->_constructDefault(false);
        }

        $html = "<table id = 'markdetail_content' class = 'mark-table-border' width='100%'>
        <thead>
        <tr>
        <td width='3%' ><b>No.</b></td>
        <td width='7%' style=\"text-align:left;\"><b>Avatar</b></td>
        <td width='10%' style=\"text-align:left;\"><b>Student ID</b></td>
        <td width='10%' style=\"text-align:left;\"><b>Student Name</b></td>
        <td width='5%' style=\"text-align:left;\"><b>Nickname</b></td>
        <td width='7%' style=\"text-align:left;\"><b>Birthdate</b></td>";
        foreach($this->config as $key => $params) {
            if($key=='total_mark') {
                $html.= "<td width='10%' class ='td-mark'> <b> ".$params['label']." </b></td>" ;
                continue ;
            }
            if(!$params['visible']) continue;
            if($key != 'T')
                $max_mark = " (".$params['max_mark'].")";
                else $max_mark = '';
            if(strpos($this->team_name, '360')){
                $html.= "<td class ='td-mark'> <b> ".$this->gradebookConfig->gradebook_config_mark_options_adult[$key]['label'].$max_mark." </b></td>" ;
            }else{
                $html.= "<td class ='td-mark'> <b> ".$this->gradebookConfig->gradebook_config_mark_options[$key]['label'].$max_mark." </b></td>" ;
            }

        }
        $html .= "
        <td width='15%' style=\"text-align:left;\"><b>Teacher's Recommendations</b></td>
        </tr>
        </thead>
        <tbody> ";
        $no = 0;
        foreach($this->students as $student_id => $student) {
            if(!isset($this->gradebookDetail[$student_id]))
                continue;
            $student_mark = $this->gradebookDetail[$student_id];
            $no++;

               $picture = '<a href="javascript:SUGAR.image.lightbox(\'index.php?entryPoint=download&id='.$student->picture.'&type=SugarFieldImage&isTempFile=1\')"><img src="custom/uploads/imagesResize/'.$student->picture.'" style="height: 80px;">&nbsp;</a>';
            if(empty($student->picture))
                $picture = '<img src="themes/default/images/noimage.png" style="height: 80px;">';


            $tr = "<tr>
            <td class = 'center'>{$no}</td>
            <td>$picture</td>
            <td><a href='index.php?module=Contacts&action=DetailView&record=$student_id'>{$student->contact_id}</a></td>
            <td><span class = 'student_name'><a href='index.php?module=Contacts&action=DetailView&record=$student_id'>{$student->name}</a></span>
            </td>
            <td>{$student->nickname}</td>
            <td>{$student->birthdate}</td>";

            foreach($this->config as $key => $params) {
                if(!$params['visible']) continue;
                $tr.= "<td class='td-mark'>";
                if($key=='T' || $key=='total_mark') {
                    $tr.= "<span class='final_result'>". //json_encode($student_mark).
                    (round((($student_mark[$key]/$params['max_mark'] * 100)?($student_mark[$key]/$params['max_mark']*100):"0")+0,2,2))
                    ."</span>";
                } else {
                    $tr.=  "<span id = '{$student_id}-{$key}' class = 'input_mark' >
                    ".($student_mark[$key]?$student_mark[$key]:0)."
                    </span> " ;
                }
                $tr.=  "</td>" ;
            }
            if(strlen($student_mark['comment_label']) > 30) {
               $cm = "<span class='value_teacher_comment' title='{$student_mark['comment_label']}'>".(mb_substr($student_mark['comment_label'],0,35,'UTF-8')."...")."</span>";
            } else if(strlen($student_mark['comment_label']) > 0) {
                $cm = "<span class='value_teacher_comment' title='{$student_mark['comment_label']}'>".$student_mark['comment_label']."</span>";
            } else {
                $cm = "<span class='value_teacher_comment' title='{$student_mark['comment_label']}'>--None--</span>";
            }
            $tr .= "<td class='comment'>
            $cm
            </td>
            </tr>";
            $html.= $tr;
        }
        $html .= "</tbody>
        </table>
        ";
        return $html;
    }

    function isLockGradebook() {
        global $timedate;
        if($GLOBALS['current_user']->isAdmin() || empty($this->date_confirm)
        || (strtotime(date('Y-m-d')) - strtotime($timedate->to_db_date($this->date_confirm, false))) < 864000) {
            $lock = false;
        } else {
            $lock = true;
        }
        return $lock;
    }
}
?>