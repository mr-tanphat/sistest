<?PHP

/**
 *
 * LICENSE: The contents of this file are subject to the license agreement ("License") which is included
 * in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
 * agreed to the terms and conditions of the License, and you may not use this file except in compliance
 * with the License.
 *
 * @author     Original Author Biztech Co.
 */

/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once('modules/bc_survey_submission/bc_survey_submission_sugar.php');

class bc_survey_submission extends bc_survey_submission_sugar {

    function bc_survey_submission() {
        parent::bc_survey_submission_sugar();
    }    
    function get_list_view_data() {
        $temp_array = parent::get_list_view_data();
        $survey_sub = new bc_survey_submission();
        $survey_sub->retrieve($this->id);
        $survey_sub->load_relationship('bc_survey_submission_bc_survey');
        $survey = $survey_sub->get_linked_beans('bc_survey_submission_bc_survey','bc_survey');       
        $temp_array['SURVEY_NAME'] = $survey[0]->name;
        $temp_array['ID'] = $survey[0]->id;
        return $temp_array;
        
    }

}

?>