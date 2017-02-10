<?php

/**
 * The file used to delete a survey submission of currently deleted record.
 *
 * LICENSE: The contents of this file are subject to the license agreement ("License") which is included
 * in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
 * agreed to the terms and conditions of the License, and you may not use this file except in compliance
 * with the License.
 *
 * @author     Biztech Consultancy
 */
if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class deletedSubmission {
    /*
     * this function is used for checking survey submission record is linked with deleted record or not if there then delete that related record
     */

    function deletedSubmission_method($bean, $event, $arguments) {
        global $db;
        $acceptable_modules = array('Accounts', 'Contacts', 'Leads', 'Prospects'); // acceptable module who contains survey submission record
        if (in_array($bean->module_name, $acceptable_modules)) {
            $GLOBALS['log']->fatal("This is the deleted record : " . print_r($bean->id, 1));
            foreach ($bean->field_defs as $field) {
                
                // If related module survey submission exists then remove related submission
                if ($field['module'] == 'bc_survey_submission') {
                    $relationship_name = $field['relationship']; // relation ship name for submission
                    $GLOBALS['log']->fatal("This is the rel name : " . print_r($relationship_name, 1));
                    $bean->load_relationship($relationship_name);
                    
                    if ($bean->load_relationship($relationship_name)) {
                        $GLOBALS['log']->fatal("This is in if condition " .print_r($bean->$relationship_name->getBeans(),1));
                        foreach ($bean->$relationship_name->getBeans() as $submission) {
                            $GLOBALS['log']->fatal("This is the submission id :--- " . print_r($submission->id, 1));


                            // Retrieve related submited data
                            $submission->load_relationship('bc_submission_data_bc_survey_submission');

                            foreach ($submission->bc_submission_data_bc_survey_submission->getBeans() as $submited_data) {

                                $GLOBALS['log']->fatal("This is the submitted data :------- " . print_r($submited_data->id, 1));
                                // delete submited data
                                $submited_data->deleted = 1;
                                $submited_data->save();
                                // deleted submission and submited data relationship
                                $submission->bc_submission_data_bc_survey_submission->delete($submission->id, $submited_data->id);


                                foreach ($submited_data->bc_submission_data_bc_survey_answers->getBeans() as $submited_ans) {

                                    $GLOBALS['log']->fatal("This is the submitted answer :------- " . print_r($submited_ans->id, 1));

                                    // deleted submission and answer relationship
                                    $submited_data->bc_submission_data_bc_survey_answers->delete($submited_data->id, $submited_ans->id);
                                }

                                foreach ($submited_data->bc_submission_data_bc_survey_questions->getBeans() as $submited_que) {

                                    $GLOBALS['log']->fatal("This is the submitted question :------- " . print_r($submited_que->id, 1));

                                    // deleted submission and question relationship
                                    $submited_data->bc_submission_data_bc_survey_questions->delete($submited_data->id, $submited_que->id);
                                }
                            }

                            $submission->deleted = 1; // delete submission
                            $submission->save();

                            $rm_old_qry = "delete from bc_survey_submit_answer_calculation WHERE 
                                            survey_receiver_id = '{$bean->id}'
                                      ";
                            $result_deleted = $db->query($rm_old_qry);
                        }
                    }
                }
            }
        }
    }

}