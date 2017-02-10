<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class J_GradebookViewEdit extends ViewEdit
{
    public function __construct()
    {
        parent::ViewEdit();
        $this->useForSubpanel = true;
        $this->useModuleQuickCreateTemplate = true;
    }
    public function display(){
        if(!empty($_REQUEST['j_class_j_gradebook_1j_class_ida']))
            $thisClass = BeanFactory::getBean("J_Class", $_REQUEST['j_class_j_gradebook_1j_class_ida']);
        else
            $thisClass = BeanFactory::getBean("J_Class", $this->bean->j_class_j_gradebook_1j_class_ida);

        $this->ss->assign('kind_of_course', $thisClass->kind_of_course);

        // Validate team_type - Lap Nguyen
        if(!empty($thisClass->team_id)){
            $this->bean->team_id = $thisClass->team_id;
            $this->bean->team_set_id = $this->bean->team_id;
        }

        if(!empty($this->bean->team_id))
            $team_type = getTeamType($this->bean->team_id);

        if($team_type == 'Adult'){
            $gradebook_type = array (
                'LMS' => 'LMS',
                'Class Progress' => 'Class Progress',
                'Mini Check' => 'Mini Check',
                'Attendance' => 'Attendance',
                'Final' => 'Final',
            );
        }else{
            $gradebook_type = array (
                'Test 1'    => 'Test 1',
                'Test 2'    => 'Test 2',
                'Test 3'    => 'Test 3',
                'Final'     => 'Final',
            );
        }
        $this->ss->assign('gradebook_type',$gradebook_type);
        parent::display();
    }

}