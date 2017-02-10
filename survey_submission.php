<?php
/**
 * The file used to handle survey submission form
 *
 * LICENSE: The contents of this file are subject to the license agreement ("License") which is included
 * in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
 * agreed to the terms and conditions of the License, and you may not use this file except in compliance
 * with the License.
 *
 * @author     Biztech Consultancy
 */
if (!defined('sugarEntry') || !sugarEntry)
    define('sugarEntry', true);
include_once('config.php');
require_once('include/entryPoint.php');
require_once('data/SugarBean.php');
require_once('include/utils.php');
require_once('include/database/DBManager.php');
require_once('include/database/DBManagerFactory.php');
require_once('modules/Administration/Administration.php');
ini_set('default_charset', 'UTF-8');
$themeObject = SugarThemeRegistry::current();
$favicon = $themeObject->getImageURL('sugar_icon.ico', false);
global $sugar_config, $db, $timedate;

// survey is currently submitted by whom : receipient or sender
if (isset($_REQUEST['submitted_by'])) {
    $submitted_by = $_REQUEST['submitted_by'];
} else {
    $submitted_by = 'recipient';
}

$encoded_param = $_REQUEST['q'];
$decoded_param = base64_decode($encoded_param);

$survey_id = substr($decoded_param, 0, 36);
$module_type_array = split('=', substr($decoded_param, strpos($decoded_param, 'ctype='), 42));
$module_type_array = split('&', $module_type_array[1]);
$module_type = $module_type_array[0];

$module_id_array = split('=', substr($decoded_param, strpos($decoded_param, 'cid='), 40));
$module_id = $module_id_array[1];

$survey = new bc_survey();
$survey->retrieve($survey_id);
// redirect url for redirecting user after successfull submission
$redirect_url = $survey->redirect_url;
// if set 1 than show page compelition progressbar
$is_progress_indicator = $survey->is_progress;
$reSubmitCount = (!empty($survey->allowed_resubmit_count)) ? $survey->allowed_resubmit_count : 1; // counter of allowed resubmit of response

$survey->load_relationship('bc_survey_pages_bc_survey');
$survey_details = array();
$questions = array();
$skip_logicArrForHideQues = array();
$skip_logicArrForAll = array();
$showHideQuesArrayOnPageload = array();
$msg = '';
$query = "SELECT bc_survey_submission.status, bc_survey_submission.id AS submission_id,resubmit,resubmit_counter
FROM bc_survey_submission
  JOIN bc_survey_submission_bc_survey_c
    ON bc_survey_submission_bc_survey_c.bc_survey_submission_bc_surveybc_survey_submission_idb = bc_survey_submission.id
      AND bc_survey_submission_bc_survey_c.deleted = 0
  JOIN bc_survey
    ON bc_survey.id = bc_survey_submission_bc_survey_c.bc_survey_submission_bc_surveybc_survey_ida
      AND bc_survey.deleted = 0
WHERE bc_survey_submission.module_id = '" . $db->quote($module_id) . "'
    AND bc_survey_submission.module_name = '" . $db->quote($module_type) . "'
    AND bc_survey_submission.deleted = 0
    AND bc_survey.id = '{$survey_id}'";
$submission_result = $db->query($query);
$submission_row = $db->fetchByAssoc($submission_result);
$submission_status = $submission_row['status'];
$survey_submission = new bc_survey_submission();
$survey_submission->retrieve($submission_row['submission_id']);
$current_date = gmdate('Y-m-d H:i:s');
$oStart_date = $survey->start_date;
$oEnd_date = $survey->end_date;
if (!empty($oStart_date)) {
$survey_start_date = date('Y-m-d H:i:s', strtotime($timedate->to_db($survey->start_date)));
} else {
    $survey_start_date = '';
}
if (!empty($oEnd_date)) {
$survey_end_date = date('Y-m-d H:i:s', strtotime($timedate->to_db($survey->end_date)));
} else {
    $survey_end_date = '';
}

$submisstion_id = $submission_row['submission_id'];

$administrationObj = new Administration();
$administrationObj->retrieveSettings('SurveyPlugin');
$reSubmitCount = (!empty($administrationObj->settings['SurveyPlugin_ReSubmitCount'])) ? $administrationObj->settings['SurveyPlugin_ReSubmitCount'] : 1;

$user = new User();
$user->retrieve($survey->created_by);
$timeDate = new TimeDate();
$startDateTime = TimeDate::getInstance()->to_display_date_time($survey_start_date, true, true, $user);
$endDateTime = TimeDate::getInstance()->to_display_date_time($survey_end_date, true, true, $user);

/*
 * Get Already submitted details
 */
require_once 'custom/include/utilsfunction.php';
$sbmtSurvData = getPerson_SubmissionExportData($survey_id, $module_id, false);
$deleteAnsIdsOnResubmitArray = array();
foreach ($sbmtSurvData as $questionId => $ansDetails) {
    if (!is_null($ansDetails['answerId']) && !empty($ansDetails['answerId'])) {
        $deleteAnsIdsOnResubmitArray[] = $ansDetails['answerId'];
    }
}
$deleteAnsIdsOnResubmit = "'" . implode("','", $deleteAnsIdsOnResubmitArray) . "'";

// Static value
$userSbmtCount = $submission_row['resubmit_counter'];
$requestApproved = $submission_row['resubmit'];
// end static
// create resubmit request URL with encoded URL
$survey_resubmit_request_url = $sugar_config['site_url'] . '/survey_re_submit_request.php?survey_id=';

$sugar_survey_Url = $survey_resubmit_request_url; //create survey submission url
$encoded_param = base64_encode($survey_id . '&ctype=' . $module_type . '&cid=' . $module_id);
$sugar_survey_Url = str_replace('survey_id=', 'q=', $sugar_survey_Url);
$surveyReQURL = $sugar_survey_Url . $encoded_param;

//retrieve module record
$rec_table = strtolower($module_type);
$focus_recivier_qry = "select deleted from $rec_table where id = '{$module_id}'";
$isdeletedResult = $db->query($focus_recivier_qry);
$isDeletedRecipient = $db->fetchByAssoc($isdeletedResult);
$GLOBALS['log']->fatal("This is the result : " . print_r($isDeletedRecipient, 1));

$resubmit_request_msg = " For request to admin to resubmit your survey <a href='{$surveyReQURL}'>Click here...</a>";

// if preview from email template
if ($_REQUEST['survey_id'] == 'SURVEY_PARAMS') {
    $msg1 = "<div class='failure_msg'> Survey Preview not available here. Please preview survey from survey module.</div>";
}
// if user has already submitted this survey & also not a request is approved for the re submission
elseif (($submission_status == 'Submitted') && !($requestApproved) && ($userSbmtCount >= $reSubmitCount)) {
    $msg1 = "<div class='success_msg'>You have already submitted this Survey. {$resubmit_request_msg}</div>";
}
//  if survey not started yet
elseif (($submission_status == 'Pending') && !empty($oStart_date) && !empty($oEnd_date) && ((strtotime($current_date) < strtotime($survey_start_date)))) {
    $msg1 = "<div class='failure_msg'>This survey has not started yet, Please try after {$startDateTime}.</div>";
}
// if survey is already expired
elseif (($submission_status == 'Pending') && !empty($oStart_date) && !empty($oEnd_date) && (strtotime($current_date) > strtotime($survey_end_date))) {
    $msg1 = "<div class='failure_msg'>Sorry... This survey expired on {$endDateTime}.</div>";
}
// if user re submission count is reached then make request to resubmit
elseif (!($requestApproved) && ($userSbmtCount >= $reSubmitCount)) {
    $msg1 = "<div class='success_msg'>You have already submitted this Survey. {$resubmit_request_msg}</div>";
}
// if survey is deactivated / deleted by the sender
elseif (empty($survey->id)) {
    $msg1 = "<div class='failure_msg'> Sorry! This survey has been deactivated by the owner. You can't attend it.</div>";
}
// if survey is deactivated / deleted by the sender
elseif ($isDeletedRecipient['deleted'] == 1) {
    $msg1 = "<div class='failure_msg'> Sorry! This recipient record is deleted by the owner. You can't attend it.</div>";
}

// survey is still not submitted then allow to submit or come for re submission then prefill response data
else {
    foreach ($survey->bc_survey_pages_bc_survey->getBeans() as $pages) {
        unset($questions);
        $survey_details[$pages->page_sequence]['page_title'] = $pages->name;
        $survey_details[$pages->page_sequence]['page_number'] = $pages->page_number;
        $survey_details[$pages->page_sequence]['page_id'] = $pages->id;
        $pages->load_relationship('bc_survey_pages_bc_survey_questions');
        foreach ($pages->bc_survey_pages_bc_survey_questions->getBeans() as $survey_questions) {
            $questions[$survey_questions->question_sequence]['que_id'] = $survey_questions->id;
            $questions[$survey_questions->question_sequence]['que_title'] = $survey_questions->name;
            $questions[$survey_questions->question_sequence]['que_type'] = $survey_questions->question_type;
            $questions[$survey_questions->question_sequence]['is_required'] = $survey_questions->is_required;
            $questions[$survey_questions->question_sequence]['question_help_comment'] = $survey_questions->question_help_comment;
            //advance options
            $questions[$survey_questions->question_sequence]['advance_type'] = (isset($survey_questions->advance_type)) ? $survey_questions->advance_type : '';
            $questions[$survey_questions->question_sequence]['maxsize'] = (isset($survey_questions->maxsize)) ? $survey_questions->maxsize : '';
            $questions[$survey_questions->question_sequence]['min'] = (isset($survey_questions->min)) ? $survey_questions->min : '';
            $questions[$survey_questions->question_sequence]['max'] = (isset($survey_questions->max)) ? $survey_questions->max : '';
            $questions[$survey_questions->question_sequence]['precision'] = (isset($survey_questions->precision_value)) ? $survey_questions->precision_value : '';
            $questions[$survey_questions->question_sequence]['is_datetime'] = (isset($survey_questions->is_datetime) ) ? $survey_questions->is_datetime : '';
            $questions[$survey_questions->question_sequence]['is_sort'] = (isset($survey_questions->is_sort) ) ? $survey_questions->is_sort : '';
            $questions[$survey_questions->question_sequence]['matrix_row'] = (isset($survey_questions->matrix_row)) ? base64_decode($survey_questions->matrix_row) : '';
            $questions[$survey_questions->question_sequence]['matrix_col'] = (isset($survey_questions->matrix_col)) ? base64_decode($survey_questions->matrix_col) : '';
            $questions[$survey_questions->question_sequence]['description'] = (isset($survey_questions->description)) ? $survey_questions->description : '';
            $questions[$survey_questions->question_sequence]['is_skip_logic'] = (isset($survey_questions->is_skip_logic)) ? $survey_questions->is_skip_logic : 0;

            $survey_questions->load_relationship('bc_survey_answers_bc_survey_questions');
            $questions[$survey_questions->question_sequence]['answers'] = array();
            foreach ($survey_questions->bc_survey_answers_bc_survey_questions->getBeans() as $survey_answers) {
                if ($questions[$survey_questions->question_sequence]['is_required'] && empty($survey_answers->name)) {
                    continue;
                } else {
                    $questions[$survey_questions->question_sequence]['answers'][$survey_answers->answer_sequence][$survey_answers->id] = $survey_answers->name;
                    if ($survey_answers->logic_action == "show_hide_question") {
                        $showHideQuesArrayOnPageload[$pages->page_sequence][$survey_answers->id] = explode(",", $survey_answers->logic_target);
                        $skip_logicArrForHideQues[$survey_answers->logic_action][$pages->page_sequence][] = explode(",", $survey_answers->logic_target);
                        $skip_logicArrForAll[$survey_answers->id][$survey_answers->logic_action] = explode(",", $survey_answers->logic_target);
                    } else {
                        //$skip_logicArrForHideQues[$survey_answers->logic_action][$pages->page_sequence] = $survey_answers->logic_target;
                        $skip_logicArrForAll[$survey_answers->id][$survey_answers->logic_action] = $survey_answers->logic_target;
                    }
                }
            }
            ksort($questions[$survey_questions->question_sequence]['answers']);
        }

        ksort($questions);
        $survey_details[$pages->page_sequence]['page_questions'] = $questions;
        ksort($survey_details);
    }
}
/* * Create layout of question and answer for the preview
 *
 * @param type $answers - options for multi choice
 * @param type $type - question type
 * @param type $que_id - question id of 36 char
 * @param type $is_required - is required or not
 * @param type $submittedAns - submitted answer to prefill data
 * @param type $maxsize - max size allowed for answer
 * @param type $min - min value for answer
 * @param type $max - max value for answer
 * @param type $precision - precision value for float type
 * @param type $scale_slot - scale slot value for scale type
 * @param type $is_sort - sorting
 * @param type $is_datetime - is datetime selected or not for date-time question
 * @param type $advancetype - advance option for question
 * @param type $que_title - question title
 * @param type $matrix_row - matrix rows detail
 * @param type $matrix_col - matrix cols detail
 * @param type $description - question description
 * @return string
 */

function getMultiselectHTML($skip_logicArrForAll, $answers, $type, $que_id, $is_required, $submittedAns, $maxsize, $min, $max, $precision, $scale_slot, $is_sort, $is_datetime, $advancetype, $que_title, $matrix_row, $matrix_col, $description, $is_skipp) {
    $ans_detail = json_encode($skip_logicArrForAll);
    $html = "";
    switch ($type) {
        case 'MultiSelectList':
            $html = "<div class='option multiselect-list  two-col' id='{$que_id}_div'>";
            if ($is_skipp == 1) {

                $html .= "<select class='form-control multiselect {$que_id}' onchange='skipp_logic_question(this,$ans_detail)' multiple='' size='10' name='{$que_id}[]' >";
            } else {
                $html .= "<select class='form-control multiselect {$que_id}' multiple='' size='10' name='{$que_id}[]' >";
            }
            // if sorting
            if ($is_sort == 1) {
                foreach ($answers as $ans) {
                    foreach ($ans as $ans_id => $answer) {
                        $options[$ans_id] = $answer;
                    }
                }
                asort($options);

                foreach ($options as $ans_id => $answer) {
                    if (is_array($submittedAns) && in_array($answer, $submittedAns)) {
                        $html .= "<option value='{$ans_id}' selected='true'>" . htmlspecialchars_decode($answer) . "</option>";
                    } else if (!is_array($submittedAns) && ($answer == $submittedAns)) {
                        $html .= "<option value='{$ans_id}' selected='true'>" . htmlspecialchars_decode($answer) . "</option>";
                    } else {
                        $html .= "<option value='{$ans_id}'>" . htmlspecialchars_decode($answer) . "</option>";
                    }
                }
            }
            // if not sorting
            else {
                foreach ($answers as $ans) {
                    foreach ($ans as $ans_id => $answer) {
                        if (is_array($submittedAns) && in_array($answer, $submittedAns)) {
                            $html .= "<option value='{$ans_id}' selected='true'>" . htmlspecialchars_decode($answer) . "</option>";
                        } else if (!is_array($submittedAns) && ($answer == $submittedAns)) {
                            $html .= "<option value='{$ans_id}' selected='true'>" . htmlspecialchars_decode($answer) . "</option>";
                        } else {
                            $html .= "<option value='{$ans_id}'>" . htmlspecialchars_decode($answer) . "</option>";
                        }
                    }
                }
            }
            $html .= "</select></div>";
            return $html;
            break;
        case 'Checkbox':
            $html = "<div class='option checkbox-list' id='{$que_id}_div'><ul>";
            // if sorting
            if ($is_sort == 1) {
                foreach ($answers as $ans) {
                    foreach ($ans as $ans_id => $answer) {
                        $options[$ans_id] = $answer;
                    }
                }
                asort($options); // sort options
                // if horizontal
                if ($advancetype == 'Horizontal') {
                    $op = 1;
                    foreach ($options as $ans_id => $answer) {
                        if (is_array($submittedAns) && in_array($answer, $submittedAns)) {
                            if ($is_skipp == 1) {

                                $html .= "<li class='md-checkbox' style='display:inline;'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-check' checked='true'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            } else {
                                $html .= "<li class='md-checkbox' style='display:inline;'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-check' checked='true'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            }
                        } else if (!is_array($submittedAns) && ($answer == $submittedAns)) {
                            if ($is_skipp == 1) {

                                $html .= "<li class='md-checkbox' style='display:inline;'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-check' checked='true'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            } else {
                                $html .= "<li class='md-checkbox' style='display:inline;'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-check' checked='true'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            }
                        } else {
                            if ($is_skipp == 1) {

                                $html .= "<li class='md-checkbox' style='display:inline;'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-check'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            } else {
                                $html .= "<li class='md-checkbox' style='display:inline;'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-check'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            }
                        }
                        $op++;
                    }
                }
                // if vertical
                else {
                    $op = 1;
                    foreach ($options as $ans_id => $answer) {
                        if (is_array($submittedAns) && in_array($answer, $submittedAns)) {
                            if ($is_skipp == 1) {

                                $html .= "<li class='md-checkbox'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-check' checked='true'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            } else {
                                $html .= "<li class='md-checkbox'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-check' checked='true'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            }
                        } else if (!is_array($submittedAns) && ($answer == $submittedAns)) {
                            if ($is_skipp == 1) {

                                $html .= "<li class='md-checkbox'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-check' checked='true'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            } else {
                                $html .= "<li class='md-checkbox'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-check' checked='true'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            }
                        } else {
                            if ($is_skipp == 1) {

                                $html .= "<li class='md-checkbox'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-check'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            } else {
                                $html .= "<li class='md-checkbox'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-check'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            }
                        }
                        $op++;
                    }
                }
            }
            // if not sorting
            else {
                // if horizontal
                if ($advancetype == 'Horizontal') {
                    $op = 1;
                    foreach ($answers as $ans) {
                        foreach ($ans as $ans_id => $answer) {
                            if (is_array($submittedAns) && in_array($answer, $submittedAns)) {
                                if ($is_skipp == 1) {

                                    $html .= "<li class='md-checkbox' style='display:inline;'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-check' checked='true'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                } else {
                                    $html .= "<li class='md-checkbox' style='display:inline;'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-check' checked='true'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                }
                            } else if (!is_array($submittedAns) && ($answer == $submittedAns)) {
                                if ($is_skipp == 1) {

                                    $html .= "<li class='md-checkbox' style='display:inline;'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-check' checked='true'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                } else {
                                    $html .= "<li class='md-checkbox' style='display:inline;'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-check' checked='true'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                }
                            } else {
                                if ($is_skipp == 1) {

                                    $html .= "<li class='md-checkbox' style='display:inline;'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}'  onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-check'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                } else {
                                    $html .= "<li class='md-checkbox' style='display:inline;'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-check'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                }
                            }
                            $op++;
                        }
                    }
                }
                // if vertical
                else {
                    $op = 1;
                    foreach ($answers as $ans) {
                        foreach ($ans as $ans_id => $answer) {
                            if (is_array($submittedAns) && in_array($answer, $submittedAns)) {
                                if ($is_skipp == 1) {

                                    $html .= "<li class='md-checkbox'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}'  onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-check' checked='true'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                } else {
                                    $html .= "<li class='md-checkbox'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-check' checked='true'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                }
                            } else if (!is_array($submittedAns) && ($answer == $submittedAns)) {
                                if ($is_skipp == 1) {

                                    $html .= "<li class='md-checkbox'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-check' checked='true'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                } else {
                                    $html .= "<li class='md-checkbox'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-check' checked='true'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                }
                            } else {
                                if ($is_skipp == 1) {

                                    $html .= "<li class='md-checkbox'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-check'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                } else {
                                    $html .= "<li class='md-checkbox'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-check'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                }
                            }
                            $op++;
                        }
                    }
                }
            }
            $html .= "</ul></div>";
            return $html;
            break;
        case 'RadioButton':
            $html = "<div class='option radio-list' id='{$que_id}_div'><ul>";
            // if sorting
            if ($is_sort == 1) {
                foreach ($answers as $ans) {
                    foreach ($ans as $ans_id => $answer) {
                        $options[$ans_id] = $answer;
                    }
                }
                asort($options); // sort options
                // if horizontal
                if ($advancetype == 'Horizontal') {
                    $op = 1;
                    foreach ($options as $ans_id => $answer) {
                        if (is_array($submittedAns) && in_array($answer, $submittedAns)) {
                            if ($is_skipp == 1) {

                                $html .= " <li class='md-radio' style='display:inline;'><label><input type='radio' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-radiobtn' checked='true'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            } else {
                                $html .= " <li class='md-radio' style='display:inline;'><label><input type='radio' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-radiobtn' checked='true'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            }
                        } else if (!is_array($submittedAns) && ($answer == $submittedAns)) {
                            if ($is_skipp == 1) {

                                $html .= " <li class='md-radio' style='display:inline;'><label><input type='radio' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-radiobtn' checked='true'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            } else {
                                $html .= " <li class='md-radio' style='display:inline;'><label><input type='radio' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-radiobtn' checked='true'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            }
                        } else {
                            if ($is_skipp == 1) {

                                $html .= " <li class='md-radio' style='display:inline;'><label><input type='radio' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-radiobtn'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            } else {
                                $html .= " <li class='md-radio' style='display:inline;'><label><input type='radio' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-radiobtn'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            }
                        }
                        $op++;
                    }
                }
                // if vertical
                else {
                    $op = 1;
                    foreach ($options as $ans_id => $answer) {
                        if (is_array($submittedAns) && in_array($answer, $submittedAns)) {
                            if ($is_skipp == 1) {

                                $html .= " <li class='md-radio'><label><input type='radio' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-radiobtn' checked='true'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            } else {
                                $html .= " <li class='md-radio'><label><input type='radio' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-radiobtn' checked='true'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            }
                        } else if (!is_array($submittedAns) && ($answer == $submittedAns)) {
                            if ($is_skipp == 1) {

                                $html .= " <li class='md-radio'><label><input type='radio' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-radiobtn' checked='true'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            } else {
                                $html .= " <li class='md-radio'><label><input type='radio' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-radiobtn' checked='true'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            }
                        } else {
                            if ($is_skipp == 1) {

                                $html .= " <li class='md-radio'><label><input type='radio' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-radiobtn'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            } else {
                                $html .= " <li class='md-radio'><label><input type='radio' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-radiobtn'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            }
                        }
                        $op++;
                    }
                }
            }
            // if not sorting
            else {
                // if horizontal
                if ($advancetype == 'Horizontal') {
                    $op = 1;
                    foreach ($answers as $ans) {
                        foreach ($ans as $ans_id => $answer) {
                            if (is_array($submittedAns) && in_array($answer, $submittedAns)) {
                                if ($is_skipp == 1) {

                                    $html .= " <li class='md-radio' style='display:inline;'><label><input type='radio' value='{$ans_id}' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' name='{$que_id}[]' class='{$que_id} md-radiobtn' checked='true'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                } else {
                                    $html .= " <li class='md-radio' style='display:inline;'><label><input type='radio' value='{$ans_id}' id='{$que_id}_{$op}' name='{$que_id}[]' class='{$que_id} md-radiobtn' checked='true'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                }
                            } else if (!is_array($submittedAns) && ($answer == $submittedAns)) {
                                if ($is_skipp == 1) {

                                    $html .= " <li class='md-radio' style='display:inline;'><label><input type='radio' value='{$ans_id}' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' name='{$que_id}[]' class='{$que_id} md-radiobtn' checked='true'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                } else {
                                    $html .= " <li class='md-radio' style='display:inline;'><label><input type='radio' value='{$ans_id}' id='{$que_id}_{$op}' name='{$que_id}[]' class='{$que_id} md-radiobtn' checked='true'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                }
                            } else {
                                if ($is_skipp == 1) {

                                    $html .= " <li class='md-radio' style='display:inline;'><label><input type='radio' value='{$ans_id}' id='{$que_id}_{$op}' name='{$que_id}[]' onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-radiobtn'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                } else {
                                    $html .= " <li class='md-radio' style='display:inline;'><label><input type='radio' value='{$ans_id}' id='{$que_id}_{$op}' name='{$que_id}[]' class='{$que_id} md-radiobtn'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                }
                            }
                            $op++;
                        }
                    }
                }
                // if vertical
                else {
                    $op = 1;
                    foreach ($answers as $ans) {
                        foreach ($ans as $ans_id => $answer) {
                            if (is_array($submittedAns) && in_array($answer, $submittedAns)) {
                                if ($is_skipp == 1) {

                                    $html .= " <li class='md-radio'><label><input type='radio' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-radiobtn' checked='true'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                } else {
                                    $html .= " <li class='md-radio'><label><input type='radio' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-radiobtn' checked='true'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                }
                            } else if (!is_array($submittedAns) && ($answer == $submittedAns)) {
                                if ($is_skipp == 1) {

                                    $html .= " <li class='md-radio'><label><input type='radio' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-radiobtn' checked='true'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                } else {
                                    $html .= " <li class='md-radio'><label><input type='radio' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-radiobtn' checked='true'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                }
                            } else {
                                if ($is_skipp == 1) {

                                    $html .= " <li class='md-radio'><label><input type='radio' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' onchange='skipp_logic_question(this,$ans_detail)' class='{$que_id} md-radiobtn'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                } else {
                                    $html .= " <li class='md-radio'><label><input type='radio' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-radiobtn'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                    <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                                }
                            }
                            $op++;
                        }
                    }
                }
            }
            $html .= "</ul></div>";
            return $html;
            break;
        case 'DrodownList':
            $html = "<div class='option select-list two-col' id='{$que_id}_div'><ul><li><div class='styled-select'>";
            if ($is_skipp == 1) {

                $html .= "<select name='{$que_id}[]' class='form-control required {$que_id}' onchange='skipp_logic_question(this,$ans_detail)'><option selected='' value=''>Select</option>";
            } else {
                $html .= "<select name='{$que_id}[]' class='form-control required {$que_id}'><option selected='' value=''>Select</option>";
            }
            // if sorting
            if ($is_sort == 1) {
                foreach ($answers as $ans) {
                    foreach ($ans as $ans_id => $answer) {
                        $options[$ans_id] = $answer;
                    }
                }
                asort($options); // sort options

                foreach ($options as $ans_id => $answer) {
                    if (is_array($submittedAns) && in_array($answer, $submittedAns)) {
                        $html .= "<option value='{$ans_id}' selected='true'>" . htmlspecialchars_decode($answer) . "</option>";
                    } else if (!is_array($submittedAns) && ($answer == $submittedAns)) {
                        $html .= "<option value='{$ans_id}' selected='true'>" . htmlspecialchars_decode($answer) . "</option>";
                    } else {
                        $html .= "<option value='{$ans_id}'>" . htmlspecialchars_decode($answer) . "</option>";
                    }
                }
            }
            // if not sorting
            else {
                foreach ($answers as $ans) {
                    foreach ($ans as $ans_id => $answer) {
                        if (is_array($submittedAns) && in_array($answer, $submittedAns)) {
                            $html .= "<option value='{$ans_id}' selected='true'>" . htmlspecialchars_decode($answer) . "</option>";
                        } else if (!is_array($submittedAns) && ($answer == $submittedAns)) {
                            $html .= "<option value='{$ans_id}' selected='true'>" . htmlspecialchars_decode($answer) . "</option>";
                        } else {
                            $html .= "<option value='{$ans_id}'>" . htmlspecialchars_decode($answer) . "</option>";
                        }
                    }
                }
            }
            $html .= "</select></div></li></ul></div>";
            return $html;
            break;
        case 'Textbox':
            $html = "<div class='option select-list two-col' id='{$que_id}_div'><ul><li>";
            // if interger then add class to validate with prefill submitted answer
            if (!is_array($submittedAns) && !empty($submittedAns) && $advancetype == 'Integer') {
                $html .= "<input class='form-control {$que_id} numericField' type='textbox' name='{$que_id}[]' value='{$submittedAns}' class='{$que_id}'>";
            }
            // if float then add class to validate with prefill submitted answer
            else if (!is_array($submittedAns) && !empty($submittedAns) && $advancetype == 'Float') {
                $html .= "<input class='form-control {$que_id} decimalField' type='textbox' name='{$que_id}[]' value='{$submittedAns}' class='{$que_id}'>";
            }
            // if float then add class to validate with prefill submitted answer
            else if (!is_array($submittedAns) && !empty($submittedAns)) {
                $html .= "<input class='form-control {$que_id} ' type='textbox' name='{$que_id}[]' value='{$submittedAns}' class='{$que_id}'>";
            }
            // if interger then add class to validate
            else if (empty($submittedAns) && $advancetype == 'Integer') {
                $html .= "<input class='form-control {$que_id} numericField' type='textbox' name='{$que_id}[]' class='{$que_id}'>";
            }
            // if float then add class to validate
            else if (empty($submittedAns) && $advancetype == 'Float') {
                $html .= "<input class='form-control {$que_id} decimalField' type='textbox' name='{$que_id}[]' class='{$que_id}'>";
            }
            // default textbox
            else {
                $html .= "<input class='form-control {$que_id} ' type='textbox' name='{$que_id}[]' class='{$que_id}'>";
            }
            $html .= "</li></ul></div>";
            return $html;
            break;
        case 'CommentTextbox':
            $html = "<div class='option select-list two-col' id='{$que_id}_div'><ul><li>";
            // if already submitted answer then prefill data
            if (!is_array($submittedAns) && !empty($submittedAns)) {
                // layout with given rows and columns
                if (!empty($min) || !empty($max)) {
                    $html .= "<textarea style='height:auto;width:auto;' class='form-control {$que_id}' rows='{$min}' cols='{$max}' name='{$que_id}[]'>{$submittedAns}</textarea>";
                }
                // default textarea
                else {
                    $html .= "<textarea class='form-control {$que_id}' rows='4' cols='20' name='{$que_id}[]'>{$submittedAns}</textarea>";
                }
            }
            // not submitted answer
            else {
                // layout with given rows and columns
                if (!empty($min) || !empty($max)) {
                    $html .= "<textarea style='height:auto;width:auto;' class='form-control {$que_id}' rows='{$min}' cols='{$max}' name='{$que_id}[]'></textarea>";
                }
                // default textarea
                else {
                    $html .= "<textarea class='form-control {$que_id}' rows='4' cols='20' name='{$que_id}[]'></textarea>";
                }
            }
            $html .= "</li></ul></div>";
            return $html;
            break;
        case 'Rating':
            $html = "<div class='option select-list' id='{$que_id}_div'>";
            $html .= "<ul onMouseOut='resetRating(\"{$que_id}\")'>";
            // star count is given
            if (!empty($maxsize)) {
                $starCount = $maxsize;
            }
            //default 5 star
            else {
                $starCount = 5;
            }
            //generate star as per given star numbers
            for ($i = 1; $i <= $starCount; $i++) {
                if (!is_array($submittedAns) && !empty($submittedAns) && (int) $submittedAns >= $i) {
                    $selected = "highlight";
                } else {
                    $selected = "";
                }
                $html .= "<li class='rating {$selected}' style='display: inline;font-size: x-large' onmouseover='highlightStar(this,\"{$que_id}\");'  onmouseout='removeHighlight(\"{$que_id}\");' onclick='addRating(this,\"{$que_id}\")'>&#9733;</li>";
            }
            $html .= "</ul>";
            $html .= "</div>";
            $html .= "<input type='hidden'  name='{$que_id}[]' class='{$que_id}' id='{$que_id}_hidden' value='{$submittedAns}'>";
            return $html;
            break;
        case 'ContactInformation':
            $contactInfo = array();
            if (is_array($submittedAns) && count($submittedAns) > 0) {
                foreach ($submittedAns as $inx => $ans) {
                    if (!empty($ans)) {
                        $cnArr = explode(':', $ans);
                        $cnArr_index_0 = (!empty($cnArr[0])) ? $cnArr[0] : '';
                        $cnArr_index_1 = (!empty($cnArr[1])) ? $cnArr[1] : '';
                        $contactInfo[str_replace(" ", "", $cnArr_index_0)] = trim($cnArr_index_1);
                    }
                }
            }
            if ($is_required == 1 && empty($advancetype)) {
                $html = "<div class='option input-list two-col' id='{$que_id}_div'><ul>";
                if ((count($submittedAns) > 0) && !empty($contactInfo['Name'])) {
                    $html .= "<li><input placeholder='Name *' class='form-control {$que_id} {$que_id}_name'  type='text' name='{$que_id}[{$que_id}][Name]' value='{$contactInfo['Name']}'></li>";
                } else {
                    $html .= "<li><input placeholder='Name *' class='form-control {$que_id} {$que_id}_name'  type='text' name='{$que_id}[{$que_id}][Name]'></li>";
                }
                if ((count($submittedAns) > 0) && !empty($contactInfo['EmailAddress'])) {
                    $html .= "<li><input placeholder='Email Address *'  class='form-control {$que_id} {$que_id}_email'  type='text' name='{$que_id}[{$que_id}][Email Address]' value='{$contactInfo['EmailAddress']}'></li>";
                } else {
                    $html .= "<li><input placeholder='Email Address *'  class='form-control {$que_id} {$que_id}_email'  type='text' name='{$que_id}[{$que_id}][Email Address]'></li>";
                }
                if ((count($submittedAns) > 0) && !empty($contactInfo['Company'])) {
                    $html .= "<li><input placeholder='Company' class='form-control {$que_id} {$que_id}_company'  type='text' name='{$que_id}[{$que_id}][Company]' value='{$contactInfo['Company']}'></li>";
                } else {
                    $html .= "<li><input placeholder='Company' class='form-control {$que_id} {$que_id}_company'  type='text' name='{$que_id}[{$que_id}][Company]'></li>";
                }
                if ((count($submittedAns) > 0) && !empty($contactInfo['PhoneNumber'])) {
                    $html .= "<li><input placeholder='Phone Number *' class='form-control {$que_id} {$que_id}_phone'  type='text' name='{$que_id}[{$que_id}][Phone Number]' value='{$contactInfo['PhoneNumber']}'></li>";
                } else {
                    $html .= "<li><input placeholder='Phone Number *' class='form-control {$que_id} {$que_id}_phone'  type='text' name='{$que_id}[{$que_id}][Phone Number]'></li>";
                }
                if ((count($submittedAns) > 0) && !empty($contactInfo['Address'])) {
                    $html .= "<li><input placeholder='Address' class='form-control {$que_id} {$que_id}_address'  type='text' name='{$que_id}[{$que_id}][Address]' value='{$contactInfo['Address']}'></li>";
                } else {
                    $html .= "<li><input placeholder='Address' class='form-control {$que_id} {$que_id}_address'  type='text' name='{$que_id}[{$que_id}][Address]'></li>";
                }
                if ((count($submittedAns) > 0) && !empty($contactInfo['Address2'])) {
                    $html .= "<li><input placeholder='Address2'class='form-control {$que_id} {$que_id}_address2'  type='text' name='{$que_id}[{$que_id}][Address2]' value='{$contactInfo['Address2']}'></li>";
                } else {
                    $html .= "<li><input placeholder='Address2'class='form-control {$que_id} {$que_id}_address2'  type='text' name='{$que_id}[{$que_id}][Address2]'></li>";
                }
                if ((count($submittedAns) > 0) && !empty($contactInfo['City/Town'])) {
                    $html .= "<li><input placeholder='City/Town' class='form-control {$que_id} {$que_id}_city'  type='text' name='{$que_id}[{$que_id}][City/Town]' value='{$contactInfo['City/Town']}'></li>";
                } else {
                    $html .= "<li><input placeholder='City/Town' class='form-control {$que_id} {$que_id}_city'  type='text' name='{$que_id}[{$que_id}][City/Town]'></li>";
                }
                if ((count($submittedAns) > 0) && !empty($contactInfo['State/Province'])) {
                    $html .= "<li><input placeholder='State/Province' class='form-control {$que_id} {$que_id}_state'  type='text' name='{$que_id}[{$que_id}][State/Province]' value='{$contactInfo['State/Province']}'></li>";
                } else {
                    $html .= "<li><input placeholder='State/Province' class='form-control {$que_id} {$que_id}_state'  type='text' name='{$que_id}[{$que_id}][State/Province]'></li>";
                }
                if ((count($submittedAns) > 0) && !empty($contactInfo['Zip/PostalCode'])) {
                    $html .= "<li><input placeholder='ZIP/Postal Code' class='form-control {$que_id} {$que_id}_zip'  type='text' name='{$que_id}[{$que_id}][Zip/Postal Code]' value='{$contactInfo['Zip/PostalCode']}'></li>";
                } else {
                    $html .= "<li><input placeholder='ZIP/Postal Code' class='form-control {$que_id} {$que_id}_zip'  type='text' name='{$que_id}[{$que_id}][Zip/Postal Code]'></li>";
                }
                if ((count($submittedAns) > 0) && !empty($contactInfo['Country'])) {
                    $html .= "<li><input placeholder='Country' class='form-control {$que_id} {$que_id}_country'  type='text' name='{$que_id}[{$que_id}][Country]' value='{$contactInfo['Country']}'></li>";
                } else {
                    $html .= "<li><input placeholder='Country' class='form-control {$que_id} {$que_id}_country'  type='text' name='{$que_id}[{$que_id}][Country]'></li>";
                }
                $html .= "</ul></div>";
            }
            // if required fields array is given then set html as per the same
            else if ($is_required == 1 && !empty($advancetype)) {
                $requireFields = explode(' ', $advancetype);
                $html = "<div class='option input-list two-col' id='{$que_id}_div'><ul>";
                //if name field is required then set placeholder
                if (in_array('Name', $requireFields)) {
                    if ((count($submittedAns) > 0) && !empty($contactInfo['Name'])) {
                        $html .= "<li><input placeholder='Name *' class='form-control {$que_id} {$que_id}_name'  type='text' name='{$que_id}[{$que_id}][Name]' value='{$contactInfo['Name']}'></li>";
                    } else {
                        $html .= "<li><input placeholder='Name *' class='form-control {$que_id} {$que_id}_name'  type='text' name='{$que_id}[{$que_id}][Name]'></li>";
                    }
                } else {
                    if ((count($submittedAns) > 0) && !empty($contactInfo['Name'])) {
                        $html .= "<li><input placeholder='Name ' class='form-control {$que_id} {$que_id}_name'  type='text' name='{$que_id}[{$que_id}][Name]' value='{$contactInfo['Name']}'></li>";
                    } else {
                        $html .= "<li><input placeholder='Name ' class='form-control {$que_id} {$que_id}_name'  type='text' name='{$que_id}[{$que_id}][Name]'></li>";
                    }
                }
                //if email field is required then set placeholder
                if (in_array('Email', $requireFields)) {
                    if ((count($submittedAns) > 0) && !empty($contactInfo['EmailAddress'])) {
                        $html .= "<li><input placeholder='Email Address *'  class='form-control {$que_id} {$que_id}_email'  type='text' name='{$que_id}[{$que_id}][Email Address]' value='{$contactInfo['EmailAddress']}'></li>";
                    } else {
                        $html .= "<li><input placeholder='Email Address *'  class='form-control {$que_id} {$que_id}_email'  type='text' name='{$que_id}[{$que_id}][Email Address]'></li>";
                    }
                } else {
                    if ((count($submittedAns) > 0) && !empty($contactInfo['EmailAddress'])) {
                        $html .= "<li><input placeholder='Email Address '  class='form-control {$que_id} {$que_id}_email'  type='text' name='{$que_id}[{$que_id}][Email Address]' value='{$contactInfo['EmailAddress']}'></li>";
                    } else {
                        $html .= "<li><input placeholder='Email Address '  class='form-control {$que_id} {$que_id}_email'  type='text' name='{$que_id}[{$que_id}][Email Address]'></li>";
                    }
                }
                //if company field is required then set placeholder
                if (in_array('Company', $requireFields)) {
                    if ((count($submittedAns) > 0) && !empty($contactInfo['Company'])) {
                        $html .= "<li><input placeholder='Company *' class='form-control {$que_id} {$que_id}_company'  type='text' name='{$que_id}[{$que_id}][Company]' value='{$contactInfo['Company']}'></li>";
                    } else {
                        $html .= "<li><input placeholder='Company *' class='form-control {$que_id} {$que_id}_company'  type='text' name='{$que_id}[{$que_id}][Company]'></li>";
                    }
                } else {
                    if ((count($submittedAns) > 0) && !empty($contactInfo['Company'])) {
                        $html .= "<li><input placeholder='Company' class='form-control {$que_id} {$que_id}_company'  type='text' name='{$que_id}[{$que_id}][Company]' value='{$contactInfo['Company']}'></li>";
                    } else {
                        $html .= "<li><input placeholder='Company' class='form-control {$que_id} {$que_id}_company'  type='text' name='{$que_id}[{$que_id}][Company]'></li>";
                    }
                }
                //if phone field is required then set placeholder
                if (in_array('Phone', $requireFields)) {
                    if ((count($submittedAns) > 0) && !empty($contactInfo['PhoneNumber'])) {
                        $html .= "<li><input placeholder='Phone Number *' class='form-control {$que_id} {$que_id}_phone'  type='text' name='{$que_id}[{$que_id}][Phone Number]' value='{$contactInfo['PhoneNumber']}'></li>";
                    } else {
                        $html .= "<li><input placeholder='Phone Number *' class='form-control {$que_id} {$que_id}_phone'  type='text' name='{$que_id}[{$que_id}][Phone Number]'></li>";
                    }
                } else {
                    if ((count($submittedAns) > 0) && !empty($contactInfo['PhoneNumber'])) {
                        $html .= "<li><input placeholder='Phone Number ' class='form-control {$que_id} {$que_id}_phone'  type='text' name='{$que_id}[{$que_id}][Phone Number]' value='{$contactInfo['PhoneNumber']}'></li>";
                    } else {
                        $html .= "<li><input placeholder='Phone Number ' class='form-control {$que_id} {$que_id}_phone'  type='text' name='{$que_id}[{$que_id}][Phone Number]'></li>";
                    }
                }
                //if address field is required then set placeholder
                if (in_array('Address', $requireFields)) {
                    if ((count($submittedAns) > 0) && !empty($contactInfo['Address'])) {
                        $html .= "<li><input placeholder='Address *' class='form-control {$que_id} {$que_id}_address'  type='text' name='{$que_id}[{$que_id}][Address]' value='{$contactInfo['Address']}'></li>";
                    } else {
                        $html .= "<li><input placeholder='Address *' class='form-control {$que_id} {$que_id}_address'  type='text' name='{$que_id}[{$que_id}][Address]'></li>";
                    }
                } else {
                    if ((count($submittedAns) > 0) && !empty($contactInfo['Address'])) {
                        $html .= "<li><input placeholder='Address' class='form-control {$que_id} {$que_id}_address2'  type='text' name='{$que_id}[{$que_id}][Address]' value='{$contactInfo['Address']}'></li>";
                    } else {
                        $html .= "<li><input placeholder='Address' class='form-control {$que_id} {$que_id}_address2'  type='text' name='{$que_id}[{$que_id}][Address]'></li>";
                    }
                }
                //if address2 field is required then set placeholder
                if (in_array('Address2', $requireFields)) {
                    if ((count($submittedAns) > 0) && !empty($contactInfo['Address2'])) {
                        $html .= "<li><input placeholder='Address2 *'class='form-control {$que_id} {$que_id}_address2'  type='text' name='{$que_id}[{$que_id}][Address2]' value='{$contactInfo['Address2']}'></li>";
                    } else {
                        $html .= "<li><input placeholder='Address2 *'class='form-control {$que_id} {$que_id}_address2'  type='text' name='{$que_id}[{$que_id}][Address2]'></li>";
                    }
                } else {
                    if ((count($submittedAns) > 0) && !empty($contactInfo['Address2'])) {
                        $html .= "<li><input placeholder='Address2'class='form-control {$que_id} {$que_id}_address2'  type='text' name='{$que_id}[{$que_id}][Address2]' value='{$contactInfo['Address2']}'></li>";
                    } else {
                        $html .= "<li><input placeholder='Address2'class='form-control {$que_id} {$que_id}_address2'  type='text' name='{$que_id}[{$que_id}][Address2]'></li>";
                    }
                }
                //if city field is required then set placeholder
                if (in_array('City', $requireFields)) {
                    if ((count($submittedAns) > 0) && !empty($contactInfo['City/Town'])) {
                        $html .= "<li><input placeholder='City/Town *' class='form-control {$que_id} {$que_id}_city'  type='text' name='{$que_id}[{$que_id}][City/Town]' value='{$contactInfo['City/Town']}'></li>";
                    } else {
                        $html .= "<li><input placeholder='City/Town *' class='form-control {$que_id} {$que_id}_city'  type='text' name='{$que_id}[{$que_id}][City/Town]'></li>";
                    }
                } else {
                    if ((count($submittedAns) > 0) && !empty($contactInfo['City/Town'])) {
                        $html .= "<li><input placeholder='City/Town' class='form-control {$que_id} {$que_id}_city'  type='text' name='{$que_id}[{$que_id}][City/Town]' value='{$contactInfo['City/Town']}'></li>";
                    } else {
                        $html .= "<li><input placeholder='City/Town' class='form-control {$que_id} {$que_id}_city'  type='text' name='{$que_id}[{$que_id}][City/Town]'></li>";
                    }
                }
                //if state field is required then set placeholder
                if (in_array('State', $requireFields)) {
                    if ((count($submittedAns) > 0) && !empty($contactInfo['State/Province'])) {
                        $html .= "<li><input placeholder='State/Province *' class='form-control {$que_id} {$que_id}_state'  type='text' name='{$que_id}[{$que_id}][State/Province]' value='{$contactInfo['State/Province']}'></li>";
                    } else {
                        $html .= "<li><input placeholder='State/Province *' class='form-control {$que_id} {$que_id}_state'  type='text' name='{$que_id}[{$que_id}][State/Province]'></li>";
                    }
                } else {
                    if ((count($submittedAns) > 0) && !empty($contactInfo['State/Province'])) {
                        $html .= "<li><input placeholder='State/Province' class='form-control {$que_id} {$que_id}_state'  type='text' name='{$que_id}[{$que_id}][State/Province]' value='{$contactInfo['State/Province']}'></li>";
                    } else {
                        $html .= "<li><input placeholder='State/Province' class='form-control {$que_id} {$que_id}_state'  type='text' name='{$que_id}[{$que_id}][State/Province]'></li>";
                    }
                }
                //if zip field is required then set placeholder
                if (in_array('Zip', $requireFields)) {
                    if ((count($submittedAns) > 0) && !empty($contactInfo['Zip/PostalCode'])) {
                        $html .= "<li><input placeholder='ZIP/Postal Code *' class='form-control {$que_id} {$que_id}_zip'  type='text' name='{$que_id}[{$que_id}][Zip/Postal Code]' value='{$contactInfo['Zip/PostalCode']}'></li>";
                    } else {
                        $html .= "<li><input placeholder='ZIP/Postal Code *' class='form-control {$que_id} {$que_id}_zip'  type='text' name='{$que_id}[{$que_id}][Zip/Postal Code]'></li>";
                    }
                } else {
                    if ((count($submittedAns) > 0) && !empty($contactInfo['Zip/PostalCode'])) {
                        $html .= "<li><input placeholder='ZIP/Postal Code' class='form-control {$que_id} {$que_id}_zip'  type='text' name='{$que_id}[{$que_id}][Zip/Postal Code]' value='{$contactInfo['Zip/PostalCode']}'></li>";
                    } else {
                        $html .= "<li><input placeholder='ZIP/Postal Code' class='form-control {$que_id} {$que_id}_zip'  type='text' name='{$que_id}[{$que_id}][Zip/Postal Code]'></li>";
                    }
                }
                //if email field is required then set placeholder
                if (in_array('Country', $requireFields)) {
                    if ((count($submittedAns) > 0) && !empty($contactInfo['Country'])) {
                        $html .= "<li><input placeholder='Country *' class='form-control {$que_id} {$que_id}_country'  type='text' name='{$que_id}[{$que_id}][Country]' value='{$contactInfo['Country']}'></li>";
                    } else {
                        $html .= "<li><input placeholder='Country *' class='form-control {$que_id} {$que_id}_country'  type='text' name='{$que_id}[{$que_id}][Country]'></li>";
                    }
                } else {
                    if ((count($submittedAns) > 0) && !empty($contactInfo['Country'])) {
                        $html .= "<li><input placeholder='Country' class='form-control {$que_id} {$que_id}_country'  type='text' name='{$que_id}[{$que_id}][Country]' value='{$contactInfo['Country']}'></li>";
                    } else {
                        $html .= "<li><input placeholder='Country' class='form-control {$que_id} {$que_id}_country'  type='text' name='{$que_id}[{$que_id}][Country]'></li>";
                    }
                }
                $html .= "</ul></div>";
            } else {
                $html = "<div class='option input-list two-col' id='{$que_id}_div'><ul>";
                if ((count($submittedAns) > 0) && !empty($contactInfo['Name'])) {
                    $html .= "<li><input placeholder='Name' class='form-control {$que_id} {$que_id}_name'  type='text' name='{$que_id}[{$que_id}][Name]' value='{$contactInfo['Name']}'></li>";
                } else {
                    $html .= "<li><input placeholder='Name' class='form-control {$que_id} {$que_id}_name'  type='text' name='{$que_id}[{$que_id}][Name]'></li>";
                }
                if ((count($submittedAns) > 0) && !empty($contactInfo['EmailAddress'])) {
                    $html .= "<li><input placeholder='Email Address'  class='form-control {$que_id} {$que_id}_email'  type='text' name='{$que_id}[{$que_id}][Email Address]' value='{$contactInfo['EmailAddress']}'></li>";
                } else {
                    $html .= "<li><input placeholder='Email Address'  class='form-control {$que_id} {$que_id}_email'  type='text' name='{$que_id}[{$que_id}][Email Address]'></li>";
                }
                if ((count($submittedAns) > 0) && !empty($contactInfo['Company'])) {
                    $html .= "<li><input placeholder='Company' class='form-control {$que_id}'  type='text' name='{$que_id}[{$que_id}][Company]' value='{$contactInfo['Company']}'></li>";
                } else {
                    $html .= "<li><input placeholder='Company' class='form-control {$que_id}'  type='text' name='{$que_id}[{$que_id}][Company]'></li>";
                }
                if ((count($submittedAns) > 0) && !empty($contactInfo['PhoneNumber'])) {
                    $html .= "<li><input placeholder='Phone Number' class='form-control {$que_id} {$que_id}_phone'  type='text' name='{$que_id}[{$que_id}][Phone Number]' value='{$contactInfo['PhoneNumber']}'></li>";
                } else {
                    $html .= "<li><input placeholder='Phone Number' class='form-control {$que_id} {$que_id}_phone'  type='text' name='{$que_id}[{$que_id}][Phone Number]'></li>";
                }
                if ((count($submittedAns) > 0) && !empty($contactInfo['Address'])) {
                    $html .= "<li><input placeholder='Address' class='form-control {$que_id}'  type='text' name='{$que_id}[{$que_id}][Address]' value='{$contactInfo['Address']}'></li>";
                } else {
                    $html .= "<li><input placeholder='Address' class='form-control {$que_id}'  type='text' name='{$que_id}[{$que_id}][Address]'></li>";
                }
                if ((count($submittedAns) > 0) && !empty($contactInfo['Address2'])) {
                    $html .= "<li><input placeholder='Address2'class='form-control {$que_id}'  type='text' name='{$que_id}[{$que_id}][Address2]' value='{$contactInfo['Address2']}'></li>";
                } else {
                    $html .= "<li><input placeholder='Address2'class='form-control {$que_id}'  type='text' name='{$que_id}[{$que_id}][Address2]'></li>";
                }
                if ((count($submittedAns) > 0) && !empty($contactInfo['City/Town'])) {
                    $html .= "<li><input placeholder='City/Town' class='form-control {$que_id}'  type='text' name='{$que_id}[{$que_id}][City/Town]' value='{$contactInfo['City/Town']}'></li>";
                } else {
                    $html .= "<li><input placeholder='City/Town' class='form-control {$que_id}'  type='text' name='{$que_id}[{$que_id}][City/Town]'></li>";
                }
                if ((count($submittedAns) > 0) && !empty($contactInfo['State/Province'])) {
                    $html .= "<li><input placeholder='State/Province' class='form-control {$que_id}'  type='text' name='{$que_id}[{$que_id}][State/Province]' value='{$contactInfo['State/Province']}'></li>";
                } else {
                    $html .= "<li><input placeholder='State/Province' class='form-control {$que_id}'  type='text' name='{$que_id}[{$que_id}][State/Province]'></li>";
                }
                if ((count($submittedAns) > 0) && !empty($contactInfo['Zip/PostalCode'])) {
                    $html .= "<li><input placeholder='ZIP/Postal Code' class='form-control {$que_id}'  type='text' name='{$que_id}[{$que_id}][Zip/Postal Code]' value='{$contactInfo['Zip/PostalCode']}'></li>";
                } else {
                    $html .= "<li><input placeholder='ZIP/Postal Code' class='form-control {$que_id}'  type='text' name='{$que_id}[{$que_id}][Zip/Postal Code]'></li>";
                }
                if ((count($submittedAns) > 0) && !empty($contactInfo['Country'])) {
                    $html .= "<li><input placeholder='Country' class='form-control {$que_id}'  type='text' name='{$que_id}[{$que_id}][Country]' value='{$contactInfo['Country']}'></li>";
                } else {
                    $html .= "<li><input placeholder='Country' class='form-control {$que_id}'  type='text' name='{$que_id}[{$que_id}][Country]'></li>";
                }
                $html .="</ul></div>";
            }
            return $html;
            break;
        case 'Date':
            $html = "<div class='option select-list two-col' id='{$que_id}_div'><ul><li>";
            // already submitted answer
            if (!is_array($submittedAns) && !empty($submittedAns)) {
                // if is date and time
                if ($is_datetime == 1) {
                    $html .= "<input class='form-control setdatetime {$que_id}_datetime' value='{$submittedAns}' type='text' name='{$que_id}[]' class='{$que_id}'>";
                }
                // only date
                else {
                    $html .= "<input class='form-control setdate {$que_id}_datetime' type='text' value='{$submittedAns}' name='{$que_id}[]' class='{$que_id}'>";
                }
            }
            // not submitted answer
            else {
                // if is date and time
                if ($is_datetime == 1) {
                    $html .= "<input class='form-control setdatetime {$que_id}_datetime' type='text' name='{$que_id}[]' class='{$que_id}'>";
                }
                // only date
                else {
                    $html .= "<input class='form-control setdate {$que_id}_datetime' type='text' name='{$que_id}[]' class='{$que_id}'>";
                }
            }
            $html .= "</li></ul></div>";
            return $html;
            break;
        case 'Image':
            $html = "<div class='option select-list' id='{$que_id}_div'><ul><li>";
            if ($que_title == "upload") {
                $html .= ""
                        . "<img src='custom/include/Image_question/{$advancetype}' class='  {$que_id}_datetime'  name='{$que_id}[]' >";
            } else {
                $html .= ""
                        . "<img src='{$advancetype}' class='  {$que_id}_datetime'  name='{$que_id}[]' >";
            }
            $html .= "</li></ul></div>";
            return $html;
            break;
        case 'Video':
            $html = "<div class='option select-list' id='{$que_id}_div'><ul><li>";
            $html .= '<iframe width="420" height="315"
                                src="' . $que_title . '">
                      </iframe>';
            if (!empty($description)) {
                $html .="<p>" . $description . "</p>";
            }
            $html .= "</li></ul></div>";
            return $html;
            break;
        case 'Scale':
            if (!is_array($submittedAns) && !empty($submittedAns)) {
                $selected = $submittedAns;
            } else {
                $selected = "";
            }
            $lables = !empty($advancetype) ? split('-', $advancetype) : '';
            $left = !empty($lables) ? $lables[0] : '';
            $middle = !empty($lables) ? $lables[1] : '';
            $right = !empty($lables) ? $lables[2] : '';
            if (empty($min) && empty($max)) {
                $min = 0;
                $max = 10;
            }
            //display scale input field
            $html = "<div id='{$que_id}_div'>";
            $html .='<div style="width:60%">
                        <span class="equal">' . $min . '</span>
                        <span class="equal" ></span>
                        <span class="equal" style="text-align:right">' . $max . '</span>
                    </div>';
            $html .='<br/><section style="width:60%" class=' . $que_id . '>
                        <div id="slider"></div>
                    </section>';
            $html .='<div style="width:60%;height:30px;">
                        <span class="equal">' . $left . '</span>
                        <span class="equal" style="text-align:center">' . $middle . '</span>
                        <span class="equal" style="text-align:right">' . $right . '</span>
                    </div>';
            $html .= "<input type='hidden'  name='{$que_id}[]' class='{$que_id}_scale' id='{$que_id}_hidden' value='{$submittedAns}'>";
            $html .= "</div>";
            return $html;
            break;
        case 'Matrix':
            $submittedAnsDetail = array();
            foreach ($submittedAns[$que_title] as $k => $AnsDetail) {
                foreach ($AnsDetail as $key => $SubAnsDetail) {
                    foreach ($SubAnsDetail as $i => $Ans) {
                        $submittedAnsDetail[$i] = $Ans;
                    }
                }
            }
            // display selection type for matrix
            $display_type = $advancetype == 'Checkbox' ? 'checkbox' : 'radio';
            $rows = array();
            $rows = json_decode($matrix_row);
            $cols = json_decode($matrix_col);

            // Initialize counter - count number of rows & columns
            $row_count = 1;
            $col_count = 1;
            if (is_array($submittedAnsDetail)) {
                // foreach ($matrix as $key => $data) {
                // Do the loop
                foreach ($rows as $result) {
                    // increment row counter
                    $row_count++;
                }
                foreach ($cols as $result) {
                    // increment  column counter
                    $col_count++;
                }
                // adjusting div width as per column
                $width = 100 / ($col_count + 1) . "%";

                $html = '<div class="matrix-tbl-contner">';
                $html .= "<table class='survey_tmp_matrix' id='{$que_id}_div'>";
                $op = 0;
                for ($i = 1; $i <= $row_count; $i++) {
                    $html .= '<tr class="row">';
                    for ($j = 1; $j <= $col_count + 1; $j++) {
                        $row = $i - 1;
                        $col = $j - 1;
                        //First row & first column as blank
                        if ($j == 1 && $i == 1) {
                            $html .= "<th class='matrix-span' style='width:" . $width . "'>&nbsp;</th>";
                        }
                        // Rows Label
                        else if ($j == 1 && $i != 1) {
                            $html .= "<th class='matrix-span {$que_id}_matrix' value='{$row}' style='font-weight:bold; width:" . $width . ";text-align:left;'>" . $rows->$row . "</th>";
                        } else {
                            //Columns label
                            if ($j <= ($col_count + 1) && $cols->$col != null && !($j == 1 && $i == 1) && ($i == 1 || $j == 1)) {
                                $html .= "<th class='matrix-span' style='font-weight:bold; width:" . $width . "'>" . $cols->$col . "</th>";
                            }
                            //Display answer input (RadioButton or Checkbox)
                            else if ($j != 1 && $i != 1 && $cols->$col != null) {
                                // $html .= "<td class='matrix-span' style='width:" . $width . "; '>";
                                $current_value = $row . '_' . $col;
                                if (in_array($current_value, $submittedAnsDetail)) {
                                    if ($display_type == 'checkbox') {
                                        $html .= "<td class='matrix-span' style='width:" . $width . "; '><span class='md-checkbox'><input checked type='" . $display_type . "' id='{$que_id}_{$op}'  value='{$row}_{$col}' class='{$que_id} md-check' name='{$que_id}[{$row}][]'/><label for='{$que_id}_{$op}'>
                                                            <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></span></td>";
                                    } else {
                                        $html .= "<td class='matrix-span' style='width:" . $width . "; '><span class='md-radio'><input checked type='" . $display_type . "' id='{$que_id}_{$op}' class='{$que_id} md-radio' value='{$row}_{$col}' name='{$que_id}[{$row}][]'/><label for='{$que_id}_{$op}'>
                                                            <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></span></td>";
                                    }
                                } else {
                                    if ($display_type == 'checkbox') {
                                        $html .= "<td class='matrix-span' style='width:" . $width . "; '><span class='md-checkbox'><input type='" . $display_type . "' id='{$que_id}_{$op}'  value='{$row}_{$col}' class='{$que_id} md-check' name='{$que_id}[{$row}][]'/><label for='{$que_id}_{$op}'>
                                                            <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></span></td>";
                                    } else {
                                        $html .= "<td class='matrix-span' style='width:" . $width . "; '><span class='md-radio'><input type='" . $display_type . "' id='{$que_id}_{$op}' class='{$que_id} md-radio' value='{$row}_{$col}' name='{$que_id}[{$row}][]'/><label for='{$que_id}_{$op}'>
                                                            <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></span></td>";
                                    }
                                }
                                //   $html .= "</td>";
                            }
                            // If no value then display none
                            else {
                                $html .= "";
                            }
                        }
                        $op++;
                    }
                    $html .= "</tr>";
                }
                //   }
            } else {
                // Do the loop
                foreach ($rows as $result) {
                    // increment row counter
                    $row_count++;
                }
                foreach ($cols as $result) {
                    // increment  column counter
                    $col_count++;
                }
                // adjusting div width as per column
                $width = 100 / ($col_count + 1) . "%";

                $html = '<div class="matrix-tbl-contner">';
                $html .= "<table class='survey_tmp_matrix' id='{$que_id}_div'>";
                $op = 0;
                for ($i = 1; $i <= $row_count; $i++) {
                    $html .= '<tr class="row">';
                    for ($j = 1; $j <= $col_count + 1; $j++) {
                        $row = $i - 1;
                        $col = $j - 1;
                        //First row & first column as blank
                        if ($j == 1 && $i == 1) {
                            $html .= "<th class='matrix-span' style='width:" . $width . "'>&nbsp;</th>";
                        }
                        // Rows Label
                        else if ($j == 1 && $i != 1) {
                            $html .= "<th class='matrix-span {$que_id}_matrix' value='{$row}' style='font-weight:bold; width:" . $width . ";text-align:left;'>" . $rows->$row . "</th>";
                        } else {
                            //Columns label
                            if ($j <= ($col_count + 1) && $cols->$col != null && !($j == 1 && $i == 1) && ($i == 1 || $j == 1)) {
                                $html .= "<th class='matrix-span' style='font-weight:bold; width:" . $width . "'>" . $cols->$col . "</th>";
                            }
                            //Display answer input (RadioButton or Checkbox)
                            else if ($j != 1 && $i != 1 && $cols->$col != null) {
                                if ($display_type == 'checkbox') {
                                    $html .= "<td class='matrix-span' style='width:" . $width . "; '><span class='md-checkbox'><div class='matrix-span' style='width:" . $width . "; '><input type='" . $display_type . "'  value='{$row}_{$col}' id='{$que_id}_{$op}' name='{$que_id}[{$row}][]'/><label for='{$que_id}_{$op}'>
                                                            <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></span></div></td>";
                                } else {
                                    $html .= "<td class='matrix-span' style='width:" . $width . "; '><span class='md-radio'><div class='matrix-span' style='width:" . $width . "; '><input type='" . $display_type . "' id='{$que_id}_{$op}' value='{$row}_{$col}' name='{$que_id}[{$row}][]'/><label for='{$que_id}_{$op}'>
                                                            <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></span></div></td>";
                                }
                            }
                            // If no value then display none
                            else {
                                $html .= "";
                            }
                        }
                        $op++;
                    }
                    $html .= "</tr>";
                }
            }
            $html .= "</table></div>";
            return $html;
            break;
    }
}

$redirect_flag = false;
// Insert in Submission Data Module
if (isset($_REQUEST['btnsend']) && $_REQUEST['btnsend'] != '') {

    // Check Submit button is already clicked or not for preventing duplicate entry
    // $btn_submit_click_flag = $_POST['btn_submit_click_flag'];
    if (empty($btn_submit_click_flag)) {
        $btn_submit_click_flag = "submitted";

        if (($submission_status == 'Submitted') && !($requestApproved) && ($userSbmtCount >= $reSubmitCount)) {
            $msg1 = "<div class='success_msg'>You have already submitted this Survey. {$resubmit_request_msg}</div>";
        } elseif (($submission_status == 'Pending') && !empty($oStart_date) && !empty($oEnd_date) && ((strtotime($current_date) < strtotime($survey_start_date)))) {
            $msg1 = "<div class='failure_msg'>This survey has not started yet, Please try after {$startDateTime}.</div>";
        } elseif (($submission_status == 'Pending') && !empty($oStart_date) && !empty($oEnd_date) && (strtotime($current_date) > strtotime($survey_end_date))) {
            $msg1 = "<div class='failure_msg'>Sorry... This survey expired on {$endDateTime}.</div>";
        } elseif (!($requestApproved) && ($userSbmtCount >= $reSubmitCount)) {
            $msg1 = "<div class='success_msg'>You have already submitted this Survey. {$resubmit_request_msg}</div>";
        } else {
            /* $query = "select distinct bc_survey_answers.id as answers_res from bc_survey_answers
              inner join bc_submission_data_bc_survey_answers_c as data_ans_rel
              on data_ans_rel.bc_submission_data_bc_survey_answersbc_survey_answers_ida = bc_survey_answers.id
              and data_ans_rel.deleted = 0
              inner join bc_submission_data_bc_survey_answers_c as sub_ans_rel
              on sub_ans_rel.bc_submission_data_bc_survey_answersbc_survey_answers_ida = bc_survey_answers.id
              and sub_ans_rel.deleted = 0
              inner join bc_submission_data_bc_survey_submission_c as data_sub_rel
              on data_sub_rel.bc_submission_data_bc_survey_submissionbc_submission_data_idb = data_sub_rel.bc_submission_data_bc_survey_submissionbc_submission_data_idb
              and data_sub_rel.deleted = 0
              inner join bc_survey_submission as submission
              on submission.id = data_sub_rel.bc_submission_data_bc_survey_submissionbc_survey_submission_ida
              and submission.deleted = 0
              inner join bc_survey_submission_bc_survey_c as sub_surv_join
              on sub_surv_join.bc_survey_submission_bc_surveybc_survey_submission_idb = submission.id
              and sub_surv_join.deleted = 0
              inner join bc_survey
              on bc_survey.id = sub_surv_join.bc_survey_submission_bc_surveybc_survey_ida
              where bc_survey.id = '{$survey_id}'
              and submission.module_id = '{$_REQUEST['cid']}'";

              $resultAns = $db->query($query);
              $answersRes = "";
              while ($submission_row = $db->fetchByAssoc($resultAns)) {
              $answersRes[] = $submission_row['answers_res'];
              }
              $commAns = "'" . implode("','", $answersRes) . "'";
             */
            $ignoreQry = "SELECT que_ans_rel.bc_survey_answers_bc_survey_questionsbc_survey_answers_idb as ans_id
                            FROM bc_survey_answers_bc_survey_questions_c as que_ans_rel
                            INNER JOIN bc_survey_questions
                            ON bc_survey_questions.id = que_ans_rel.bc_survey_answers_bc_survey_questionsbc_survey_questions_ida
                            and que_ans_rel.deleted = 0
                            INNER JOIN bc_survey_bc_survey_questions_c as que_surv_rel
                            ON que_surv_rel.bc_survey_bc_survey_questionsbc_survey_questions_idb = bc_survey_questions.id
                            and bc_survey_questions.deleted = 0
                            INNER JOIN bc_survey
                            ON bc_survey.id = que_surv_rel.bc_survey_bc_survey_questionsbc_survey_ida
                            WHERE bc_survey.deleted = 0
                            AND bc_survey.id = '{$survey_id}'";
            $resultIgAns = $db->query($ignoreQry);
            $IganswersRes = "";
            while ($submissionIG_row = $db->fetchByAssoc($resultIgAns)) {
                $IganswersRes[] = $submissionIG_row['ans_id'];
            }
            $commIGAns = "'" . implode("','", $IganswersRes) . "'";

            $delQry = "UPDATE bc_survey_answers SET DELETED = 1 WHERE bc_survey_answers.id IN ({$deleteAnsIdsOnResubmit}) and bc_survey_answers.id not IN ($commIGAns) ";
            $delRes = $db->query($delQry);


            $subQry = "SELECT sub_data.id as submi_id FROM bc_submission_data as sub_data
                    INNER JOIN bc_submission_data_bc_survey_submission_c as data_sub_rel
                    ON data_sub_rel.bc_submission_data_bc_survey_submissionbc_submission_data_idb = sub_data.id
                    INNER JOIN bc_survey_submission
                    ON bc_survey_submission.id = data_sub_rel.bc_submission_data_bc_survey_submissionbc_survey_submission_ida
                    AND data_sub_rel.deleted = 0
                    WHERE sub_data.deleted = 0 and bc_survey_submission.id= '{$submisstion_id}'";
            $subQryRes = $db->query($subQry);
            while ($subQryRes_row = $db->fetchByAssoc($subQryRes)) {
                $submi_id = $subQryRes_row['submi_id'];
                $db->query("UPDATE bc_submission_data_bc_survey_answers_c set deleted = 1 WHERE bc_submission_data_bc_survey_answersbc_submission_data_idb = '{$submi_id}'");
                $db->query("UPDATE bc_submission_data_bc_survey_questions_c set deleted = 1 WHERE bc_submission_data_bc_survey_questionsbc_submission_data_idb = '{$submi_id}'");
                $db->query("UPDATE bc_submission_data_bc_survey_submission_c set deleted = 1 WHERE bc_submission_data_bc_survey_submissionbc_submission_data_idb = '{$submi_id}'");
            }
            //delete from answers_calculation table only first time goes to submitSurveyResponseCalulation function
            $delete_flag = 0;
            $manage_que_type = array(); // manage flag for same type of question to delete resubmit time old data
            $obtained_score = 0;
            $showedQuestions = explode(',', $_POST['show_question_list']);
            foreach ($_REQUEST['questions'] as $submitted_que) {
                if (in_array($submitted_que, $showedQuestions)) {
                $question_obj = new bc_survey_questions();
                $question_obj->retrieve($submitted_que);
                $submitted_ans = $_REQUEST[$submitted_que];

                if (in_array($question_obj->question_type, $manage_que_type)) {
                    $delete_flag++;
                } else {
                    $delete_flag = 0;
                }
                // Update and Insert answer on each submission.
                submitSurveyResponseCalulation($submitted_ans, $survey_id, $module_id, $question_obj->question_type, $submisstion_id, $delete_flag, $submitted_que);

                $manage_que_type[] = $question_obj->question_type;
                // End
                foreach ($submitted_ans as $sub_ans) {
                    $submission_data = new bc_submission_data();
                    $submission_data->save();
                    $submission_data->load_relationship('bc_submission_data_bc_survey_submission');
                    $submission_data->bc_submission_data_bc_survey_submission->add($survey_submission->id);

                    $submission_data->load_relationship('bc_submission_data_bc_survey_questions');
                    $submission_data->bc_submission_data_bc_survey_questions->add($submitted_que);


                    $pattern = "/^[a-z\d]{8}-[a-z\d]{4}-[a-z\d]{4}-[a-z\d]{4}-[a-z\d]{12}+$/i";
                    if (preg_match($pattern, $sub_ans)) {
                        $submitted_weight = 0;
                        $submission_data->load_relationship('bc_submission_data_bc_survey_answers');
                        $submission_data->bc_submission_data_bc_survey_answers->add($sub_ans);
                        // if scoring is enabled than calculate each answer weight
                        $submitted_que_obj = new bc_survey_questions();
                        $submitted_que_obj->retrieve($submitted_que);

                        $submitted_ans_obj = new bc_survey_answers();
                        $submitted_ans_obj->retrieve($sub_ans);

                        if ($submitted_que_obj->enable_scoring == 1) {
                            $submitted_weight = $submitted_weight + number_format($submitted_ans_obj->score_weight);
                        }
                        //calculte obtained score
                        $obtained_score = $obtained_score + $submitted_weight;
                    } else {
                        if ($question_obj->question_type == 'ContactInformation') {
                            $submitted_ans_obj = new bc_survey_answers();
                            $submitted_ans_obj->name = json_encode($sub_ans, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
                            $submitted_ans_obj->save();
                            $submission_data->load_relationship('bc_submission_data_bc_survey_answers');
                            $submission_data->bc_submission_data_bc_survey_answers->add($submitted_ans_obj->id);
                        } else {
                            $submitted_ans_obj = new bc_survey_answers();
                            if (is_array($sub_ans)) {
                                foreach ($sub_ans as $value) {
                                    $ansFinal = $value;
                                    $submitted_ans_obj = new bc_survey_answers();
                                    $submitted_ans_obj->name = $ansFinal;
                                    $submitted_ans_obj->save();
                                    $submission_data->load_relationship('bc_submission_data_bc_survey_answers');
                                    $submission_data->bc_submission_data_bc_survey_answers->add($submitted_ans_obj->id);
                                }
                            } else {
                                $submitted_ans_obj = new bc_survey_answers();
                                $submitted_ans_obj->name = $sub_ans;
                                $submitted_ans_obj->save();
                                $submission_data->load_relationship('bc_submission_data_bc_survey_answers');
                                $submission_data->bc_submission_data_bc_survey_answers->add($submitted_ans_obj->id);
                            }
                        }
                    }
                }
                unset($submitted_ans);
                }
            }
            $msg = " <div class='success_msg'>Your survey has been submitted successfully and summary email send to your email address.</div>";
            $redirect_flag = true;
            if ($_REQUEST['redirect_action'] != '') {
                $redirect_url = $_REQUEST['redirect_action'];
            }
            $resubmit_counter = ((int) $survey_submission->resubmit_counter) + 1;

            $gmtdatetime = TimeDate::getInstance()->nowDb();
            // Update Record in Survey Submission Module
            $survey_submission->resubmit = 0;
            $survey_submission->resend = 0;
            $survey_submission->resubmit_counter = $resubmit_counter;
            $survey_submission->status = 'Submitted';
            $survey_submission->submitted_by = $submitted_by;
            $survey_submission->submission_date = $gmtdatetime;

            //update obtained score
            $survey_submission->obtain_score = $obtained_score;
            $base_score = $survey_submission->base_score;
            $obtScorePer = $obtained_score * 100 / $base_score;

            if (empty($obtScorePer) || $obtScorePer < 0) {
                $obtained_perc = 0;
            } else {
                $obtained_perc = $obtScorePer;
            }
            $survey_submission->score_percentage = $obtained_perc;

            $survey_submission->save();

            // Send Thanks mail to Customer

            $q = "SELECT ea.email_address FROM email_addresses ea
               LEFT JOIN email_addr_bean_rel ear ON ea.id = ear.email_address_id
               WHERE ear.bean_module = '" . $module_type . "'
               AND ear.bean_id = '" . $module_id . "'
               AND ear.deleted = 0
               AND ea.invalid_email = 0
               ORDER BY ear.primary_address DESC";
            $r = $db->limitQuery($q, 0, 1);
            $a = $db->fetchByAssoc($r);

            if (isset($a['email_address'])) {
                $email_address = $a['email_address'];
            }

            $name = $survey_submission->customer_name;
            require_once 'custom/include/utilsfunction.php';
            $subject = "Reviewed your Survey for Improved Service";
            $survey_data = array();
            $survey_data = getPerson_SubmissionData($survey_id, $module_id, $module_type);
            // if recipient submitted the survey then mail content will be as following
            if ($submitted_by == 'recipient') {
                $html = "Dear {$name},<br><br>
             Thank you for taking time to reviewing and submitting the survey with your valuable views and opinions.<br>

            We’ve taken into account your concerns submitted with this survey.<br>

            This will help us serve you better in future! <br><br>

            Thank you once again for your time and efforts!<br>";
            }
            // if sender submitted the survey then mail content will be as following
            else {
                $html = "Dear {$name},<br><br>
                     Admin has successfully submitted the survey on behalf of you.<br>

                    We’ve taken into account your concerns submitted with this survey.<br>

                    This will help us serve you better in future! <br><br>

                    Thank you once again for your time and efforts!<br>";
            }
            $html .= "<br><body style='padding:0px; margin:0px; background:#fdfdfd;'>
                <table style='background:#fff;' border='0' cellpadding='0' cellspacing='0' width='100%'>
                  <tbody>
                    <tr>
                      <td><center>
                          <table style='padding:0px 0px; margin:0; font-family:Calibri, Arial;' border='0' cellpadding='0' cellspacing='0' width='840'>
                            <tr>
                                <td>
                                    <table width='840' cellspacing='0' cellpadding='0' border='0' bgcolor='#d4a633' style='padding: 0px; margin: 0px; font-family: Calibri,Arial; background-color: #5491d5;'>
                                        <tr>
                                            <td height='30'>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td valign='middle' align='center' style='padding:0px 0 38px;'><span style='color: #ffffff; font-family: Calibri,Arial;  font-size: 30px;  line-height: 34px; '>{$survey->name}</span></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                              <td>
                                <table width='838' cellspacing='0' cellpadding='0' border='0' bgcolor='#fff' style='padding: 0px; margin: 0px; font-family: Calibri,Arial;background-color: #fcfcfc; border-right:1px solid #ccc; border-left:1px solid #ccc;'>";


            $GLOBALS['log']->fatal("This is the submitted data : " . print_r($survey_data, 1));
            foreach ($survey_data as $que_id => $que_title) {
                if (in_array($que_id, $showedQuestions)) {
                $matrix_answer_array = array();
                foreach ($que_title as $title => $answers) {
                    $is_matrix = false;
                    // Initialize counter - count number of rows & columns
                    $row_count = 1;
                    $col_count = 1;
                    $rows = $answers['matrix_rows'];
                    $cols = $answers['matrix_cols'];

                    // Do the loop
                    foreach ($rows as $result) {
                        // increment row counter
                        $row_count++;
                    }
                    foreach ($cols as $result) {
                        // increment  column counter
                        $col_count++;
                    }
                    // adjusting div width as per column
                    $width = 100 / ($col_count + 1) . "%";
                    $html .= "<tr>
                      <td valign='top' align='left' style='padding:20px 19px 10px;'>
                        <table width='800' cellspacing='0' cellpadding='0' border='1' bgcolor='#fff' style='padding: 0px; margin: 0px; font-family: Calibri,Arial; background-color: #f7fafe; border:1px solid #e5e5e5; border-collapse:collapse; '>
                            <tbody>
                                <tr>
                                  <td width='110' style='margin:0 0 8px 0; padding:5px; font-size:15px; color:#808080; border:1px solid #e5e5e5;background-color: #ececec;' ><strong>Question:</strong></td>
                                  <td style='margin:0 0 8px 0; padding:5px; font-size:14px; color:#808080; border:1px solid #e5e5e5;background-color: #ececec;'>{$title}</td>
                                </tr>";
                    foreach ($answers as $key => $answer) {
                        if ($key != 'matrix_rows' && $key != 'matrix_cols' && $key != 'answer_detail') {
                            $ans_count = count($answer);
                            if (is_array($answer)) {
                                $html .= "<td width='110' style='margin:0 0 8px 0; padding:5px; font-size:15px; color:#808080; border:1px solid #e5e5e5;background-color: #ececec;background-color: #f3f3f3;' ><strong>Answer:</strong></td>
                              <td colspan='{$ans_count}' style='margin:0 0 8px 0; padding:5px; font-size:14px; color:#808080; border:1px solid #e5e5e5;background-color: #f3f3f3;'>
                                <table width='667' cellspacing='0' cellpadding='0' border='1' bgcolor='#fff' style='padding: 0px; margin: 0px; font-family: Calibri,Arial; background-color: #f7fafe; border:1px solid #e5e5e5; border-collapse:collapse; '>
                                    <tbody>";
                                foreach ($answer as $ans_label => $ans) {

                                    $submitted_ans = $ans != '' ? $ans : 'N/A';
                                    $html .= "<tr>
                                        <td width='150' style='margin:0 0 8px 0; padding:5px; font-size:15px; color:#808080; border:1px solid #e5e5e5;background-color: #f3f3f3;' ><strong>{$ans_label}</strong></td>
                                        <td style='margin:0 0 8px 0; padding:5px; font-size:14px; color:#808080; border:1px solid #e5e5e5;background-color: #f3f3f3;'>{$submitted_ans}</td>
                                      </tr>";
                                }
                                $html .= "</tbody>
                                    </table>
                                </td>";
                            } else {
                                $submitted_answer = $answer != '' ? nl2br($answer) : 'N/A';
                                $html .= "<tr>
                                <td colspan='{$ans_count}' width='110' style='margin:0 0 8px 0; padding:5px; font-size:15px; color:#808080; border:1px solid #e5e5e5;background-color: #f3f3f3;' ><strong>Answer:</strong></td>
                                <td style='margin:0 0 8px 0; padding:5px; font-size:14px; color:#808080; border:1px solid #e5e5e5;background-color: #f3f3f3;'>{$submitted_answer}</td>
                              </tr>";
                            }
                        } else if ($key == 'answer_detail') {
                            $is_matrix = true;
                                $matrix_answer_array[$que_id] = array();
                                foreach ($answer as $ans_label => $ans_matrix) {
                                    foreach ($ans_matrix as $ans_cnt => $aval) {
                                        array_push($matrix_answer_array[$que_id], $aval);
                            }
                        }
                    }
                        }
                    if ($is_matrix) {
                        $matrix_html .= '<td width="110" style="margin:0 0 8px 0; padding:5px; font-size:15px; color:#808080; border:1px solid #e5e5e5;background-color: #ececec;"><strong>Answer : </td><td></strong><table >';
                        for ($i = 1; $i <= $row_count; $i++) {
                            $matrix_html .= '<tr>';
                            for ($j = 1; $j <= $col_count + 1; $j++) {
                                $row = $i - 1;
                                $col = $j - 1;
                                //First row & first column as blank
                                if ($j == 1 && $i == 1) {
                                    $matrix_html .= "<td class='matrix-span' style='width:" . $width . ";padding:5px;'>&nbsp;</td>";
                                }
                                // Rows Label
                                else if ($j == 1 && $i != 1) {
                                    $matrix_html .= "<td class='matrix-span {$que_id}' value='{$row}' style='font-weight:bold;color: #808080; width:" . $width . ";text-align:left;padding:5px;'>" . $rows->$row . "</td>";
                                } else {
                                    //Columns label
                                    if ($j <= ($col_count + 1) && $cols->$col != null && !($j == 1 && $i == 1) && ($i == 1 || $j == 1)) {
                                        $matrix_html .= "<td class='matrix-span' style='font-weight:bold;color: #808080; width:" . $width . ";padding:5px;'>" . $cols->$col . "</td>";
                                    }
                                    //Display answer input (RadioButton or Checkbox)
                                    else if ($j != 1 && $i != 1 && $cols->$col != null) {
                                        $matrix_html .= "<td class='matrix-span' style='width:" . $width . ";padding:5px; '>";
                                        $current_value = $row . '_' . $col;
                                            if (in_array($current_value, $matrix_answer_array[$que_id])) {
                                            $matrix_html .= "<input type='radio' checked disabled>";
                                        } else {
                                            $matrix_html .= "<input type='radio' disabled>";
                                        }
                                        $matrix_html .= "</td>";
                                    }
                                    // If no value then display none
                                    else {
                                        $matrix_html .= "";
                                    }
                                }
                            }
                            $matrix_html .= "</tr>";
                        }

                        $matrix_html .= "</table></td>";
                        $html .= $matrix_html;

                        $matrix_html = '';
                    }
                    $html .= " </tbody>
                        </table>
                      </td>
                    </tr>";
                    }
                }
            }
            // survey url encoded
            $survey_url = $sugar_config['site_url'] . '/survey_submission.php?survey_id=';
            $sugar_survey_Url = $survey_url; //create survey submission url
            $encoded_param = base64_encode($survey_id . '&ctype=' . $module_type . '&cid=' . $module_id);
            $sugar_survey_Url = str_replace('survey_id=', 'q=', $sugar_survey_Url);
            $surveyURL = $sugar_survey_Url . $encoded_param;

            // $survey_url = $sugar_config['site_url'] . '/survey_re_submit_request.php?survey_id=' . $survey_id . '&ctype=' . $module_type . '&cid=' . $module_id;
            $body = "{$html}.
            <tr><td style='text-align: center;margin:0 0 8px 0; padding:5px; font-size:15px; color:#808080; border:1px solid #e5e5e5;background-color: #f3f3f3;' >Note: Admin allow you {$reSubmitCount} time to submit your survey. To edit your submitted response for survey  <a href='{$surveyURL}'>Click here....</a></td></tr>
            <tr><td height='20'>&nbsp;</td></tr>
                  </table>
              </td>
            </tr>
            <tr>
              <td>
                <table width='840' cellspacing='0' cellpadding='0' border='0' bgcolor='#f0c44a' style='padding: 0px; margin: 0px; font-family: Calibri,Arial; background-color: #5491d5;'>
                    <tr>
                    <td height='10'>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align='center' valign='middle' style='color:#79685c;'>
                      <strong><p style='margin:0; padding:0; font-size:18px; color:#fff;'>Thank You</p></strong>
                    </td>
                  </tr>
                  <tr>
                    <td height='10'>&nbsp;</td>
                  </tr>
                </table>
              </td>
            </tr>

                  </table>
                </center></td>
            </tr>
          </tbody>
        </table>
        </body>";

            CustomSendEmail($email_address, $subject, $body, $module_id, $module_type);
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo $favicon; ?>" type="image/x-icon">
        <title>Survey</title>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
        <script src="custom/include/js/survey_js/jquery.datetimepicker.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="custom/include/css/survey_css/jquery.datetimepicker.css">
        <link href="<?php echo $sugar_config['site_url'] . '/custom/include/css/survey_css/survey-form.css' ?>" rel="stylesheet">
        <link href="<?php
        $survey->theme = (!empty($survey->theme)) ? $survey->theme : 'theme1';
        echo $sugar_config['site_url'] . '/custom/include/css/survey_css/' . $survey->theme . '.css';
        ?>" rel="stylesheet">
        <link href="<?php echo $sugar_config['site_url'] . '/custom/include/css/survey_css/jquery.bxslider.css' ?>" rel="stylesheet">
        <link href="<?php echo $sugar_config['site_url'] . '/custom/include/css/survey_css/custom-form.css' ?>" rel="stylesheet">

        <script src="<?php echo $sugar_config['site_url'] . '/custom/include/js/survey_js/jquery.bxslider.min.js' ?>"></script>
        <script src="<?php echo $sugar_config['site_url'] . '/custom/include/js/survey_js/rate.js' ?>"></script>
        <script src="<?php echo $sugar_config['site_url'] . '/custom/include/js/survey_js/custom_code.js' ?>"></script>
        <style type="text/css">
            .hideBtn{
                visibility:hidden;
            }
            .showBtn{
                visibility:visible;
            }
        </style>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                //initially active first page
                $('.progress-bar').children('li:nth-child(1)').addClass('active');
                //set datetime picker for datetime question type
                $('.setdatetime').click(function (el) {
                    $(el.currentTarget).datetimepicker().datetimepicker("show");
                });
                //set date picker for datetime question type
                $('.setdate').click(function (el) {
                    $(el.currentTarget).datepicker().datepicker("show");
                });
                // ajax call for getting survey detail
                var survey_detail = Array();
                $.ajax({
                    url: "index.php?entryPoint=preview_survey",
                    type: "POST",
                    data: {'method': 'get_survey', 'record_id': '<?php echo $survey_id; ?>', 'cid': '<?php echo $module_id; ?>'},
                    success: function (result) {
                        survey_detail = JSON.parse(result);
                        var slider_detail = new Object();
                        $.each(survey_detail, function (pindex, page_data) {
                            $.each(page_data, function (qindex, que_data) {
                                if (qindex == 'page_questions') {
                                    $.each(que_data, function (qi, q_data) {
                                        if (q_data['que_type'] == 'Scale')
                                        {
                                            var detail = new Object();
                                            // if min-max-slot value is not set then set default value
                                            if (!q_data['min'] && !q_data['max']) {
                                                detail['min'] = 0;
                                                detail['max'] = 10;
                                                detail['scale_slot'] = 1;
                                            } else {
                                                detail['min'] = q_data['min'];
                                                detail['max'] = q_data['max'];
                                                detail['scale_slot'] = q_data['scale_slot'];
                                            }
                                            detail['answer'] = q_data['answers'];
                                            slider_detail[q_data['que_id']] = detail;
                                        }
                                    });
                                }
                            });
                        });

                        //bind next prev button click function
                        var prev_slide;
                        $(".bx-next,#btnsend").click(function () {
                            // set submit type if not set for submission
                            if ($(this).attr('name') == 'btnsend')
                            {
                                $('#btnsend').prop('type', 'submit');
                            }
                            var obj =<?php echo json_encode($skip_logicArrForAll); ?>;
                            var flag = 0;
                            var selected_answer_ids = new Array();
                            var multi_select_ansid = new Array();
                            var question_wise_data = new Object();
                            //getting selected option ids
                            $.each($('.active-slide').find('.survey-form').find('div.form-body'), function () {
                                var question_type = $(this).attr('class').split(' ')[1];
                                var question_id = $(this).find('.questionHiddenField').val();
                                question_wise_data[question_id] = new Object();
                                if (question_type == 'DrodownList') {
                                    selected_answer_ids.push($(this).find('option:selected').val());
                                } else if (question_type == "RadioButton") {
                                    selected_answer_ids.push($(this).find('input[type=radio]:checked').val());
                                } else if (question_type == "Checkbox") {
                                    if ($(this).find('input[type=checkbox]:checked').length == 1) {
                                        selected_answer_ids.push($(this).find('input[type=checkbox]:checked').val());
                                    } else {
                                        question_wise_data[question_id] = new Array();
                                        $.each($(this).find('input[type=checkbox]:checked'), function () {
                                            selected_answer_ids.push($(this).val());
                                            question_wise_data[question_id].push($(this).val());
                                            multi_select_ansid.push($(this).val());
                                        });
                                    }
                                } else if (question_type == "MultiSelectList") {
                                    if ($(this).find('option:selected').length == 1) {
                                        selected_answer_ids.push($(this).find('option:selected').val());
                                    } else {
                                        $.each($(this).find('option:selected'), function () {
                                            selected_answer_ids.push($(this).val());
                                            question_wise_data[question_id] = this.value;
                                            multi_select_ansid.push($(this).val());
                                        });
                                    }
                                }
                            });
                            var action = '';
                            var target = '';
                            var action_array = new Array();
                            var is_multi = true;
                            //while multi select option value ids
                            $.each(selected_answer_ids, function (key_id, value) {
                                if ($.inArray(value, multi_select_ansid) != -1) {
                                    $.each(question_wise_data, function (question_id, options) {
                                        if (question_id != undefined && value != "") {
                                            if (!action_array[question_id])
                                            {
                                                action_array[question_id] = new Array();
                                            }
                                            if ($.inArray(value, options) != -1) {
                                                $.each(obj[value], function (skip_action, skip_target) {
                                                    if (skip_action != "no_logic" && skip_target != "") {
                                                        if (skip_action != "show_hide_question" && !action_array[question_id][skip_action]) {

                                                            action_array[question_id][skip_action] = skip_target;
                                                            is_multi = true;
                                                        }
                                                    }
                                                });
                                            }
                                        }
                                    });
                                }
                                //while single select option value ids
                                else {
                                    if (value != undefined && value != "") {
                                        $.each(obj[value], function (skip_action, skip_target) {
                                            if (skip_action != "no_logic" && skip_target != "") {
                                                if (skip_action != "show_hide_question") {
                                                    action = skip_action;
                                                    target = skip_target;
                                                    is_multi = false;
                                                }
                                            }
                                        });
                                    }

                                }
                            });
                            //first action is perform for multiple choice question
                            if (is_multi) {
                                for (var key in action_array) {
                                    for (var val in action_array[key])
                                    {
                                        action = val;
                                        target = action_array[key][val];
                                    }
                                }
                            }
                            //perform action
                            if (action == "redirect_url") {
                                flag = 1;
                                $('#btnnext').prop('type', 'submit');
                                $('#btnnext').prop('name', 'btnsend');
                                $('#btnnext').removeClass('bx-next');

                                $('#redirect_action_value').val(target);
                                var curr_slide = slider.getCurrentSlide();
                                var total_pages = parseInt($('.page-no').length);
                                // hide all after pages
                                var afterPages = new Object();
                                for (var i = curr_slide + 1; i < total_pages; i++) {
                                    afterPages[i] = i;
                                }
                                $.each(afterPages, function (key, pages)
                                {
                                    if (pages != gotoslide && pages != prev_slide)
                                    {
                                        var pageToHide = $('.survey-form')[pages + 1];
                                        $(pageToHide).addClass('hiddenPage');
                                    }
                                });
                            } else if (action == "end_page") {
                                flag = 1;
                                $('#btnnext').prop('type', 'submit');
                                $('#btnnext').prop('name', 'btnsend');
                                $('#btnnext').removeClass('bx-next');
                                var curr_slide = slider.getCurrentSlide();
                                var total_pages = parseInt($('.page-no').length);
                                // hide all after pages
                                var afterPages = new Object();
                                for (var i = curr_slide + 1; i < total_pages; i++) {
                                    afterPages[i] = i;
                                }
                                $.each(afterPages, function (key, pages)
                                {
                                    if (pages != gotoslide && pages != prev_slide)
                                    {
                                        var pageToHide = $('.survey-form')[pages + 1];
                                        $(pageToHide).addClass('hiddenPage');
                                    }
                                });
                            } else if (action == "redirect_page") {
                                // set type button to do not submit but redirect to page
                                if ($(this).attr('name') == 'btnsend')
                                {
                                    $('#btnsend').prop('type', 'button');
                                }
                                    flag = 1;
                                    $('#btnnext').prop('type', 'button');
                                    $('#btnnext').prop('name', 'btnnext');
                                    $('#btnnext').addClass('bx-next');
                                    var gotoslide = parseInt($('#' + target).val()) - 1;
                                    prev_slide = slider.getCurrentSlide();
                                var inbetweenPages = new Object();
                                for (var i = prev_slide + 1; i < gotoslide; i++) {
                                    inbetweenPages[i] = i;
                                }
                                $.each(inbetweenPages, function (key, pages)
                                {
                                    if (pages != gotoslide && pages != prev_slide)
                                    {
                                        var pageToHide = $('.survey-form')[pages + 1];
                                        $(pageToHide).addClass('hiddenPage');
                                    }
                                });
                                    slider.goToSlide(gotoslide, 'next');
                                var pageToShow = $('.survey-form')[gotoslide + 1];
                                $(pageToShow).removeClass('hiddenPage');

                            }
                            var validationQuestionValue = new Array();
                            var validationReturnVal = '';
                            var allTtpeArray = new Array(
                                    'MultiSelectList', 'Checkbox',
                                    'RadioButton', 'DrodownList',
                                    'Textbox', 'CommentTextbox',
                                    'Rating', 'ContactInformation',
                                    'Date', 'Image', 'Video', 'Scale', 'Matrix'
                                    );
                            var is_require = 0;
                            var type = '';
                            var queID, datatype, is_datetime, is_sort = '';
                            var min, max, maxsize, precision, scale_slot = 0;
                            $('.active-slide > .survey-form > .form-body').each(function () {
                                queID = $(this).find('.questionHiddenField').val();
                                var self = this;
                                //getting other question detail
                                $.each(survey_detail, function (pindex, page_data) {
                                    $.each(page_data, function (qindex, que_data) {
                                        if (qindex == 'page_questions') {
                                            $.each(que_data, function (qi, q_data) {
                                                if (q_data['que_id'] == queID) {
                                                    min = q_data['min'];
                                                    max = q_data['max'];
                                                    maxsize = q_data['maxsize'];
                                                    precision = q_data['precision'];
                                                    scale_slot = q_data['scale_slot'];
                                                    datatype = q_data['advance_type'];
                                                    is_datetime = q_data['is_datetime'];
                                                    is_sort = q_data['is_sort'];
                                                }
                                            });
                                        }
                                    });
                                });
                                var setTypaClass = $(self)[0].classList;
                                if (typeof setTypaClass == "undefined") {
                                    var setTypaClass = $(self)[0].className.split(" ");
                                }
                                $(setTypaClass).each(function (index) {
                                    if ($.inArray(setTypaClass[index], allTtpeArray) != -1) {
                                        type = setTypaClass[index];
                                    }
                                });
                                if ($(self).find('h3').find('span').hasClass('is_required')) {
                                    is_require = 1;
                                }
                                validationReturnVal = surveySliderValidationOnNextPrevClick(type, queID, is_require, min, max, maxsize, precision, datatype, is_datetime, is_sort, scale_slot);
                                validationQuestionValue.push(validationReturnVal);
                                is_require = 0;
                                type = '';
                                queID = '';
                            });
                            if ($.inArray(false, validationQuestionValue) == -1) {
                                if (flag == 0) {
                                    prev_slide = slider.getCurrentSlide();
                                    var currentSlidePage = slider.getCurrentSlide() + 1;
                                    var totalPageCount = slider.getSlideCount();
                                    if (currentSlidePage == totalPageCount - 1) {
                                        $(this).removeClass('showBtn').addClass('hideBtn');
                                    } else {
                                        if ($(this)[0].id != 'btnsend') {
                                            $("#btnprev").removeClass('hideBtn').addClass('showBtn');
                                        }
                                    }
                                    slider.goToNextSlide();
                                    $('html, body').animate({scrollTop: 0}, 800);
                                    if ($(this).hasClass('hideBtn')) {
                                        $("#btnsend").show();
                                        $("#btnprev").removeClass('hideBtn').addClass('showBtn');
                                    }
                                }
                            } else {
                                $('.validation-tooltip').fadeIn();
                                return false;
                            }

                            // currently showing question ids
                            var ShowQueIds = '';
                            $.each($('.form-body'), function () {

                                var isHidden = false;
                                var isHiddenPageParent = $(this).parent('.survey-form');
                                if ($(isHiddenPageParent).hasClass('hiddenPage'))
                                {
                                    isHidden = true;
                                }
                                if ($(this).css('display') != 'none' && $(this).find('.questionHiddenField').val() && !isHidden)
                                {
                                    var queId = $(this).find('.questionHiddenField').val();
                                    ShowQueIds += queId + ',';
                                }
                        });
                            // set show que ids to hidden variable
                            $('.show_question_list').val(ShowQueIds);
                        });
                        $(".bx-prev").click(function () {

                            $('.validation-tooltip').fadeOut();
                            var currentSlidePage = slider.getCurrentSlide();
                            if (currentSlidePage == prev_slide) {
                                prev_slide = slider.getCurrentSlide() - 1;
                            }
                            //prev_slide = slider.getCurrentSlide();
                            if (currentSlidePage == 1) {
                                $(this).removeClass('showBtn').addClass('hideBtn');
                                $('#btnnext').removeClass('hideBtn').addClass('showBtn');
                            } else {
                                $("#btnnext").removeClass('hideBtn').addClass('showBtn');
                            }
                            slider.goToSlide(prev_slide);
                            $('html, body').animate({scrollTop: 0}, 800);
                            $("#btnsend").hide();
                        });

                        //setting slider
                        $(function () {
                            var que_id = '';
                            $.each(slider_detail, function (qid, slider_data) {
                                var answer = parseInt(slider_data.answer) ? parseInt(slider_data.answer) : 0;
                                // scale slider
                                var slider = $('.' + qid).find("#slider").slider({
                                    slide: function (event, ui) {
                                        $(ui.handle).find('.tooltip').html('<div>' + ui.value + '</div>');
                                        $('.' + qid + '_scale').val(ui.value);
                                    },
                                    range: "min",
                                    value: answer,
                                    min: parseInt(slider_data.min),
                                    max: parseInt(slider_data.max),
                                    step: parseInt(slider_data.scale_slot),
                                    create: function (event, ui) {
                                        if (slider_data.answer != null) {
                                            var tooltip = $('<div class="tooltip">' + slider_data.answer + '</div>');
                                        } else {
                                            var tooltip = $('<div class="tooltip"></div>');
                                        }
                                        $(event.target).find('.ui-slider-handle').append(tooltip);
                                    },
                                    change: function (event, ui) {
                                        $('#hidden').attr('value', ui.value);
                                    }
                                });
                            });
                        });
                    }
                });

                var slider = jQuery('.bxslider').bxSlider({
                    adaptiveHeight: true,
                    infiniteLoop: false,
                    hideControlOnEnd: true,
                    mode: 'fade',
                    pager: true,
                    controls: false,
                    nextSelector: '#btnnext',
                    prevSelector: '#btnprev',
                    onSliderLoad: function (currentIndex) {
                        $('.bx-viewport').find('.bxslider').children().eq(currentIndex).addClass('active-slide');
                    },
                    onSlideBefore: function ($slideElement) {

                        $('.bx-viewport').find('.bxslider').children().removeClass('active-slide');
                        $slideElement.addClass('active-slide');
                        var total_pages = parseInt($('.page-no').length);
                        var page_no = parseInt($('.active-slide').find('.page-no > i').html()) - 1;
                        // page progress bar
                        //Setting page state on the top
                        for (var i = 1; i <= total_pages; i++) {
                            if (i < page_no)
                            {
                                $('.progress-bar').children('li:nth-child(' + i + ')').addClass('completed');
                                $('.progress-bar').children('li:nth-child(' + i + ')').removeClass('active');
                            } else if (i == page_no) {
                                $('.progress-bar').children('li:nth-child(' + i + ')').addClass('active');
                                $('.progress-bar').children('li:nth-child(' + i + ')').removeClass('completed');
                            } else {
                                $('.progress-bar').children('li:nth-child(' + i + ')').removeClass('completed');
                                $('.progress-bar').children('li:nth-child(' + i + ')').removeClass('active');
                            }
                        }
                        var progress_percentage = Math.floor((page_no * 100) / total_pages);
                        var progress = $("#progress").slider({
                            range: "min",
                            value: progress_percentage,
                            disabled: true,
                        });
                        //add extra div for designing
                        $('#progress').find('.tooltip').html('<div>' + progress_percentage + '<div>');
                        $('#pagecount').html(page_no + "/" + total_pages);
                        $('#progress-percentage').html(progress_percentage + "%");
                    },
                    onSlideAfter: function () {
                        var currentSlidePage = slider.getCurrentSlide() + 1;
                        var totalPageCount = slider.getSlideCount();
                        if (currentSlidePage == 1) {
                            $("#btnprev").removeClass('showBtn').addClass('hideBtn');
                            $('#btnnext').removeClass('hideBtn').addClass('showBtn');
                            $('#btnsend').hide();
                        } else if (currentSlidePage == totalPageCount) {
                            $("#btnsend").show();
                            $("#btnprev").removeClass('hideBtn').addClass('showBtn');
                            $('#btnnext').removeClass('showBtn').addClass('hideBtn');
                        } else {
                            $("#btnprev").removeClass('hideBtn').addClass('showBtn');
                            $('#btnnext').removeClass('hideBtn').addClass('showBtn');
                            $('#btnsend').hide();
                        }
                    },
                });

                var total_pages = parseInt($('.page-no').length);
                var page_no = 0;
                var progress_percentage = Math.floor((page_no * 100) / total_pages);
                // page progress bar
                var progress = $("#progress").slider({
                    range: "min",
                    value: progress_percentage,
                    disabled: true,
                    create: function (event, ui) {
                        var tooltip = $('<div></div><div class="tooltip"><div>' + progress_percentage + '<div></div>');
                        $(event.target).find('.ui-slider-handle').append(tooltip);
                    },
                });

                $('#pagecount').html(page_no + "/" + total_pages);
                $('#progress-percentage').html(progress_percentage + "%");


                if ($(".bx-prev").hasClass('hideBtn')) {
                    $("#btnsend").hide();
                }
                if ($(".bx-prev").hasClass('hideBtn') && $(".bx-next").hasClass('hideBtn')) {
                    $("#btnsend").show();
                }
                //Allow only Numeric Value to textbox validation
                $('.numericField').keypress(function (e) {
                    //if the letter is not digit then display error and don't type anything
                    if (e.which != 8 && e.which != 0 && e.which != 45 && (e.which < 48 || e.which > 57)) {

                        return false;
                    }
                });
                //Allow only Float Value to textbox validation
                $('.decimalField').keypress(function (e) {
                    //if dot already not entered
                    var dot_flag = $(e.currentTarget).val().includes('.');
                    //if the letter is not digit then display error and don't type anything
                    if ((e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 46) || (dot_flag && e.which == 46)) {

                        return false;
                    }
                });
                $('.setdatetime').keypress(function (e) {
                    //if the letter is  digit then display error and don't type anything
                    if (e.which != 8 && e.which != 0 && (e.which > 48 || e.which < 57)) {

                        return false;
                    }
                });

                $('.setdate').keypress(function (e) {
                    //if the letter is  digit then display error and don't type anything
                    if (e.which != 8 && e.which != 0 && (e.which > 48 || e.which < 57)) {

                        return false;
                    }
                });
            });

            function skipp_logic_question(el, answers) {
                //hide question onload
                var question_type = $(el).parents('.form-body').attr('class').split(' ')[1];
                //while question type is radiobutton on showhide question
                if (question_type == "RadioButton") {
                    $.each($(el).parent().parent().parent().find('input[type=radio]'), function () {
                        $.each(answers[this.value], function (action, target) {
                            if (action == "show_hide_question") {
                                var showHideQuesIdsArr = target;
                                $.each(showHideQuesIdsArr, function (idx, queId) {

                                    if ($('#' + queId + '_div').parents('.form-body').css('display') != 'none') {
                                        var newHeight = $('.bx-viewport').height() - $('#' + queId + '_div').parents('.form-body').innerHeight();
                                        $('.bx-viewport').height(newHeight);
                                    }
                                    $('#' + queId + '_div').parents('.form-body').hide();
                                    //re-setting value while uncheck the element
                                    var hide_question_type = $('#' + queId + '_div').parents('.form-body').attr('class').split(' ')[1];
                                    if (hide_question_type == "RadioButton") {
                                        $.each($('#' + queId + '_div').find('input[type=radio]'), function () {
                                            $(this).prop('checked', false);
                                        });
                                    } else if (hide_question_type == "Checkbox") {
                                        $.each($('#' + queId + '_div').find('input[type=checkbox]'), function () {
                                            $(this).prop('checked', false);
                                        });
                                    } else if (hide_question_type == "Scale") {
                                        $('.' + queId).find('.ui-slider-range').css('width', '0%');
                                        $('.' + queId).find('.ui-slider-handle').css('left', '0%');
                                        $('.' + queId).find('.tooltip').find('div').html('0');
                                        $('.' + queId + '_scale').val('0')
                                    } else if (hide_question_type == "Date") {
                                        $('.' + queId + '_datetime').val('');
                                    } else if (hide_question_type == "Rating") {
                                        $('#' + queId + '_div').find('.rating').removeClass('selected');
                                        $('.' + queId).val('');
                                    } else if (hide_question_type == "Matrix") {
                                        $.each($('#' + queId + '_div').find('input[type=radio]'), function () {
                                            $(this).prop('checked', false);
                                        });
                                        $.each($('#' + queId + '_div').find('input[type=checkbox]'), function () {
                                            $(this).prop('checked', false);
                                        });
                                    } else {
                                        $('.' + queId).val('');
                                    }
                                });
                            }
                        });
                    });

                }
                //while question type is checkbox on showhide question
                else if (question_type == "Checkbox") {

                    if (!$(el).prop('checked')) {
                        var answer_id = el.value;
                        var showHideQuesIds = $(el).parents('.form-body').parent().find('#show_hide_question_Ids_' + answer_id).val();
                        if (showHideQuesIds != null && showHideQuesIds != '') {
                            var showHideQuesIdsArr = showHideQuesIds.split(",");
                            $.each(showHideQuesIdsArr, function (idx, queId) {

                                var newHeight = $('.bx-viewport').height() - $('#' + queId + '_div').parents('.form-body').innerHeight();
                                $('.bx-viewport').height(newHeight);
                                $('#' + queId + '_div').parents('.form-body').hide();
                                var hide_question_type = $('#' + queId + '_div').parents('.form-body').attr('class').split(' ')[1];
                                //re-setting value while uncheck the element
                                if (hide_question_type == "RadioButton") {
                                    $.each($('#' + queId + '_div').find('input[type=radio]'), function () {
                                        $(this).prop('checked', false);
                                    });
                                } else if (hide_question_type == "Checkbox") {
                                    $.each($('#' + queId + '_div').find('input[type=checkbox]'), function () {
                                        $(this).prop('checked', false);
                                    });
                                } else if (hide_question_type == "Scale") {
                                    $('.' + queId).find('.ui-slider-range').css('width', '0%');
                                    $('.' + queId).find('.ui-slider-handle').css('left', '0%');
                                    $('.' + queId).find('.tooltip').find('div').html('0');
                                    $('.' + queId + '_scale').val('0')
                                } else if (hide_question_type == "Date") {
                                    $('.' + queId + '_datetime').val('');
                                } else if (hide_question_type == "Rating") {
                                    $('#' + queId + '_div').find('.rating').removeClass('selected');
                                    $('.' + queId).val('');
                                } else if (hide_question_type == "Matrix") {
                                    $.each($('#' + queId + '_div').find('input[type=radio]'), function () {
                                        $(this).prop('checked', false);
                                    });
                                    $.each($('#' + queId + '_div').find('input[type=checkbox]'), function () {
                                        $(this).prop('checked', false);
                                    });
                                } else {
                                    $('.' + queId).val('');
                                }
                            });
                        }
                    }
                }
                //while question type is multiselect on showhide question
                else if (question_type == "MultiSelectList") {
                    $.each($(el).parent().find('option'), function () {
                        if (this.value != '') {
                            $.each(answers[this.value], function (action, target) {
                                if (action == "show_hide_question") {
                                    var showHideQuesIdsArr = target;
                                    $.each(showHideQuesIdsArr, function (idx, queId) {
                                        if ($('#' + queId + '_div').parents('.form-body').css('display') != 'none') {
                                            var newHeight = $('.bx-viewport').height() - $('#' + queId + '_div').parents('.form-body').innerHeight();
                                            $('.bx-viewport').height(newHeight);
                                        }
                                        $('#' + queId + '_div').parents('.form-body').hide();
                                        var hide_question_type = $('#' + queId + '_div').parents('.form-body').attr('class').split(' ')[1];
                                        //re-setting value while uncheck the element
                                        if (hide_question_type == "RadioButton") {
                                            $.each($('#' + queId + '_div').find('input[type=radio]'), function () {
                                                $(this).prop('checked', false);
                                            });
                                        } else if (hide_question_type == "Checkbox") {
                                            $.each($('#' + queId + '_div').find('input[type=checkbox]'), function () {
                                                $(this).prop('checked', false);
                                            });
                                        } else if (hide_question_type == "Scale") {
                                            $('.' + queId).find('.ui-slider-range').css('width', '0%');
                                            $('.' + queId).find('.ui-slider-handle').css('left', '0%');
                                            $('.' + queId).find('.tooltip').find('div').html('0');
                                            $('.' + queId + '_scale').val('0')
                                        } else if (hide_question_type == "Date") {
                                            $('.' + queId + '_datetime').val('');
                                        } else if (hide_question_type == "Rating") {
                                            $('#' + queId + '_div').find('.rating').removeClass('selected');
                                            $('.' + queId).val('');
                                        } else if (hide_question_type == "Matrix") {
                                            $.each($('#' + queId + '_div').find('input[type=radio]'), function () {
                                                $(this).prop('checked', false);
                                            });
                                            $.each($('#' + queId + '_div').find('input[type=checkbox]'), function () {
                                                $(this).prop('checked', false);
                                            });
                                        } else {
                                            $('.' + queId).val('');
                                        }
                                    });
                                }
                            });
                        }
                    });
                }
                //while question type is dropdown on showhide question
                else if (question_type == "DrodownList") {
                    $.each($(el).find('option'), function () {
                        if (this.value != '') {
                            $.each(answers[this.value], function (action, target) {
                                if (action == "show_hide_question") {
                                    var showHideQuesIdsArr = target;
                                    $.each(showHideQuesIdsArr, function (idx, queId) {
                                        if ($('#' + queId + '_div').parents('.form-body').css('display') != 'none') {
                                            var newHeight = $('.bx-viewport').height() - $('#' + queId + '_div').parents('.form-body').innerHeight();
                                            $('.bx-viewport').height(newHeight);
                                        }
                                        $('#' + queId + '_div').parents('.form-body').hide();
                                        var hide_question_type = $('#' + queId + '_div').parents('.form-body').attr('class').split(' ')[1];
                                        //re-setting value while uncheck the element
                                        if (hide_question_type == "RadioButton") {
                                            $.each($('#' + queId + '_div').find('input[type=radio]'), function () {
                                                $(this).prop('checked', false);
                                            });
                                        } else if (hide_question_type == "Checkbox") {
                                            $.each($('#' + queId + '_div').find('input[type=checkbox]'), function () {
                                                $(this).prop('checked', false);
                                            });
                                        } else if (hide_question_type == "Scale") {
                                            $('.' + queId).find('.ui-slider-range').css('width', '0%');
                                            $('.' + queId).find('.ui-slider-handle').css('left', '0%');
                                            $('.' + queId).find('.tooltip').find('div').html('0');
                                            $('.' + queId + '_scale').val('0')
                                        } else if (hide_question_type == "Date") {
                                            $('.' + queId + '_datetime').val('');
                                        } else if (hide_question_type == "Rating") {
                                            $('#' + queId + '_div').find('.rating').removeClass('selected');
                                            $('.' + queId).val('');
                                        } else if (hide_question_type == "Matrix") {
                                            $.each($('#' + queId + '_div').find('input[type=radio]'), function () {
                                                $(this).prop('checked', false);
                                            });
                                            $.each($('#' + queId + '_div').find('input[type=checkbox]'), function () {
                                                $(this).prop('checked', false);
                                            });
                                        } else {
                                            $('.' + queId).val('');
                                        }
                                    });
                                }
                            });
                        }
                    });
                }
                var sel_optIds = new Array();
                //while multiple choice option for show hide question
                if (question_type == "MultiSelectList" || question_type == "Checkbox") {
                    if (question_type == "MultiSelectList") {
                        var ans_id = $(el).val();
                    } else {
                        var ans_id = new Array();
                        $.each($(el).parent().parent().parent().find('input[type=checkbox]:checked'), function () {
                            ans_id.push(this.value);
                        });
                    }
                    var action = new Object();
                    $.each(ans_id, function (indx, value) {
                        $.each(answers[value], function (key, value) {
                            if (key != "no_logic") {
                                action[key] = value
                            }
                        });
                    });
                    var logic_target = '';
                    var logic_action = '';
                    $.each(action, function (act, tar) {
                        if (act == 'show_hide_question') {
                            sel_optIds.push(true);
                            logic_action = act;
                            logic_target = tar;
                        } else {
                            sel_optIds.push(false);
                        }
                    });
                    if (sel_optIds.indexOf(true) !== -1) {
                        $.each(logic_target, function (idx, queId) {

                            var newHeight = $('#' + queId + '_div').parents('.form-body').innerHeight() + $('.bx-viewport').height();
                            $('.bx-viewport').height(newHeight);
                            $('#' + queId + '_div').parents('.form-body').show();
                        });
                    }
                }
                //while single choice option for show hide question
                else if (question_type == "RadioButton" || question_type == "DrodownList") {

                    var ans_id = el.value
                    $.each(answers[ans_id], function (key, value) {
                        logic_action = key;
                    });
                    var logic_target = answers[ans_id][logic_action];
                    var act = '';
                    $.each(answers[ans_id], function (key, value) {
                        act = key;
                    });
                    if (act == 'show_hide_question') {
                        $.each(logic_target, function (idx, queId) {
                            var newHeight = $('#' + queId + '_div').parents('.form-body').innerHeight() + $('.bx-viewport').height();
                            $('.bx-viewport').height(newHeight);
                            $('#' + queId + '_div').parents('.form-body').show();
                        });
                    }
                }
            }
        </script>
    </head>
    <body>
        <div class="bg"></div>
        <div class="main-container">
            <div id='tooltipDiv'></div>
            <form method="post" name="survey_submisssion" action="" id="survey_submisssion">
                <input type="hidden" value="<?php $btn_submit_click_flag ?>" id="btn_submit_click_flag" name="btn_submit_click_flag" />
                <input type="hidden" value="" class="show_question_list" name="show_question_list" />
                <?php foreach ($survey_details as $page_sequence => $detail) { ?>
                    <input type="hidden" value="<?php echo $page_sequence ?>" id="<?php echo $detail['page_id']; ?>" name="skipp_page_sequence"/>
                <?php } ?>
                <div class="top-section">
                    <div class="header">
                        <div class="">
                            <h1 class="logo">
                                <img src="<?php
                                if ($survey->logo) {
                                    echo "custom/include/surveylogo_images/{$survey->logo}";
                                }
                                ?>" alt="" title="">
                            </h1>

                            <div class="survey-header"><h2><?php echo $survey->name; ?></h2></div>
                        </div>
                    </div>
                </div>
                <div class="survey-container">
                    <input type="hidden" name="redirect_action" value="" id="redirect_action_value">
                    <?php
                    if (!empty($redirect_url) && trim($redirect_url) != "http://" && $redirect_flag == true) {
                        if (strpos($redirect_url, 'http://') !== false || strpos($redirect_url, 'https://') !== false) {
                        echo "<script>window.location.replace('" . $redirect_url . "');</script>";
                        } else {
                            $new_url = 'http://' . $redirect_url;
                            echo "<script>window.location.replace('" . $new_url . "');</script>";
                        }
                    } else if ($msg != '') {
                        echo $msg;
                        exit;
                    }
                    ?>
                    <?php
                    if (isset($msg1) && $msg1 != '') {
                        echo "{$msg1}";
                    } else {
                        ?>
                        <div class="container">
                            <div class="survey-form form-desc">
                                <div class="form-body">
                                    <ul class="progress-bar">

                                        <?php
                                        // Setting Page Header
                                        if ($is_progress_indicator != 1) {
                                            foreach ($survey_details as $page_sequence => $detail) {
                                                if ($survey->survey_theme == 'theme2' || $survey->survey_theme == 'theme6' || $survey->survey_theme == 'theme7' || $survey->survey_theme == 'theme8') {
                                                    ?>

                                                    <li class="hexagon" style='cursor: default'><span class="pro-text"><?php echo 'Page ' . $page_sequence; ?></span><a style='cursor: default'><?php echo $page_sequence; ?></a></li>

                                                    <?php
                                                } else {
                                                    ?>

                                                    <li class="hexagon" style='cursor: default'><span class="pro-text"><?php echo 'Page'; ?></span><a style='cursor: default'><?php echo $page_sequence; ?></a></li>

                                                    <?php
                                                }
                                            }
                                        } else {
                                            ?>
                                            <section style="width:100%">
                                                <div id="pagecount" class="equal text"  style="width:5%"></div>
                                                <div id="progress" class="equal" style="width:85%"></div>
                                                <div id="progress-percentage" class="equal text last" style="width:5%"></div>
                                            </section>
                                        <?php } ?>
                                        <div class="shape">
                                            <span class="arr-right"></span>
                                        </div>
                                        </li>
                                    </ul>
                                    <?php echo nl2br($survey->description); ?>
                                </div>
                            </div>
                            <ul class="bxslider">
                                <?php
                                $addClass = '';
                                $totalpages = count($survey_details);
                                if ($totalpages <= 1) {
                                    $addClass = 'hideBtn';
                                }
                                $que_no = 0;
                                foreach ($survey_details as $page_sequence => $detail) {
                                    $queArraylist[$page_sequence] = getSubmittedAnswerByReciever($survey_id, $module_id);
                                    ?>
                                    <li>
                                        <div class="survey-form">
                                            <div class="form-header">
                                                <h1><?php echo $detail['page_title']; ?></h1>
                                                <span class="page-no"><i><?php echo $page_sequence ?></i></span>
                                            </div>
                                            <?php
                                            foreach ($showHideQuesArrayOnPageload[$page_sequence] as $ans_ID => $hideQuesarray) {
                                                ?>
                                                <input type='hidden' id='show_hide_question_Ids_<?php echo $ans_ID; ?>' value='<?php echo implode(',', $hideQuesarray) ?>'/>
                                            <?php }
                                            ?>
                                            <?php foreach ($detail['page_questions'] as $que_sequence => $question) { ?>
                                                <?php
                                                $display_qes = "display:''";
                                                $showOnload = false;
                                                foreach ($queArraylist[$page_sequence] as $submitAns) {
                                                    if (in_array($question['que_id'], $showHideQuesArrayOnPageload[$page_sequence][$submitAns])) {
                                                        $showOnload = true;
                                                    }
                                                }
                                                foreach ($skip_logicArrForHideQues['show_hide_question'][$page_sequence] as $indx => $questionid) {
                                                    if (in_array($question['que_id'], $skip_logicArrForHideQues['show_hide_question'][$page_sequence][$indx]) && !$showOnload) {
                                                        $display_qes = 'display:none';
                                                    }
                                                }
                                                ?>
                                                <div class="form-body <?php echo $question['que_type']; ?>" style="<?php echo $display_qes; ?>">
                                                    <input type="hidden" class="questionHiddenField" name="questions[]" value="<?php echo $question['que_id'] ?>"  >
                                                    <?php
                                                    $queArray = $sbmtSurvData[$question['que_id']];
                                                    $queAnsArray = array_values($queArray);
                                                    $answer = $queAnsArray[0];
                                                    if ($question['que_type'] == "ContactInformation") {
                                                        $answer = explode(",", $answer);
                                                    }
                                                    ?>
                                                    <h3 class="questions">
                                                        <?php
                                                        if ($question['que_type'] == 'Image' || $question['que_type'] == 'Video') {
                                                            echo $question['question_help_comment'];
                                                        } else {
                                                            $que_no++;
                                                            $img_flag = false;
                                                            echo $que_no . '.';
                                                            echo $question['que_title'];
                                                            if ($question['is_required'] == 1) {
                                                                ?>
                                                                <span class="is_required" style="color:red;">   *</span>
                                                                <?php
                                                            }
                                                        }
                                                        if ($question['que_type'] == 'Image' || $question['que_type'] == 'Video') {
                                                            //do nothing while image or videos
                                                        } else if (!empty($question['question_help_comment'])) {
                                                            ?> <div style="display: inline-block;float: right;"><img class="questionImgIcon" onmouseout="removeHelpTipPopUpDiv();" onmouseover="openHelpTipsPopUpSurvey(this, '<?php echo $question['question_help_comment']; ?>');" src="custom/include/survey-img/question.png" ></div>
                                                        <?php } ?></h3>
                                                    <?php
                                                    $elementHTML = getMultiselectHTML($skip_logicArrForAll, $question['answers'], $question['que_type'], $question['que_id'], $question['is_required'], $answer, $question['maxsize'], $question['min'], $question['max'], $question['precision'], $question['scale_slot'], $question['is_sort'], $question['is_datetime'], $question['advance_type'], $question['que_title'], $question['matrix_row'], $question['matrix_col'], $question['description'], $question['is_skip_logic']);
                                                    echo $elementHTML;
                                                    ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </li>

                                <?php } ?>
                            </ul>
                            <div class="action-block"> <input class='button btn-submit'  type='submit' value='Submit' name="btnsend" id="btnsend">
                                <div style="display: inline-block;float: right;"> <input class='bx-prev button hideBtn'  type='button' value='Prev' name="btnprev" id="btnprev">
                                    <input class='bx-next button <?php echo $addClass; ?> '  type='button' value='Next' name="btnnext" id="btnnext"></div>
                            </div>
                            <div class="btm-link"></div>

                        </div>
                    <?php } ?>
                </div>
            </form>
        </div>
    </body>
</html>
