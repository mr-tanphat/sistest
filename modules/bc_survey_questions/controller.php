<?php
/**
 * remove image type questions
 * 
 * LICENSE: The contents of this file are subject to the license agreement ("License") which is included
 * in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
 * agreed to the terms and conditions of the License, and you may not use this file except in compliance
 * with the License.
 *
 * @author     Original Author Biztech Co.
 */
require_once('include/MVC/Controller/SugarController.php');

class bc_survey_questionsController extends SugarController
{
    function action_EditView(){
        $this->view = 'noaccess';
    }
    function action_DetailView(){
        $this->view = 'noaccess';
    }
    function action_ListView(){
        $this->view = 'noaccess';
    }
    /**
     * remove image question
     *
     * @author     Original Author Biztech Co.
     * @return     string
     */
    function action_removeImageQuestionFromEdit(){
        global $db;
        $que_id=$_REQUEST['record'];
        $adv_type=$_REQUEST['adv_type'];
        $db->query("update bc_survey_questions set advance_type = '' where id = '{$que_id}'");
        echo 'done';
        exit;
    }
}

