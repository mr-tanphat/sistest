<?php
/**
 * When admin create survey and they want to see the preview of survey that how this survey is look like
 * at client side
 * 
 * LICENSE: The contents of this file are subject to the license agreement ("License") which is included
 * in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
 * agreed to the terms and conditions of the License, and you may not use this file except in compliance
 * with the License.
 *
 * @author     Original Author Biztech Co.
 */
if (!defined('sugarEntry') || !sugarEntry)
    define('sugarEntry', true);
include_once('config.php');
require_once('include/entryPoint.php');
require_once('data/SugarBean.php');
require_once('include/utils.php');
require_once('include/database/DBManager.php');
require_once('include/database/DBManagerFactory.php');
ini_set('default_charset', 'UTF-8');
global $sugar_config;
$survey_id = $_REQUEST['survey_id'];
$survey = new bc_survey();
$survey->retrieve($survey_id);
$is_progress_indicator = $survey->is_progress;
$survey->load_relationship('bc_survey_pages_bc_survey');
$survey_details = array();
$themeObject = SugarThemeRegistry::current();
$favicon = $themeObject->getImageURL('sugar_icon.ico', false);
$questions = array();
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


        $survey_questions->load_relationship('bc_survey_answers_bc_survey_questions');
        $questions[$survey_questions->question_sequence]['answers'] = array();
        foreach ($survey_questions->bc_survey_answers_bc_survey_questions->getBeans() as $survey_answers) {
            if ($questions[$survey_questions->question_sequence]['is_required'] && empty($survey_answers->name)) {
                continue;
            } else {
                $questions[$survey_questions->question_sequence]['answers'][$survey_answers->answer_sequence][$survey_answers->id] = $survey_answers->name;
            }
        }
        ksort($questions[$survey_questions->question_sequence]['answers']);
    }
    ksort($questions);
    $survey_details[$pages->page_sequence]['page_questions'] = $questions;
    ksort($survey_details);
}
/**
 * Display Question at preview
 *
 * @author     Original Author Biztech Co.
 * @param      String - $type, $que_id, $advancetype, $que_title,  $description
 * @param      array - $answers,$matrix_row, $matrix_col,
 * @param      integer - $is_required,$maxsize, $min, $max,$scale_slot,$is_sort,$is_datetime
 * @param      float - $precision
 */
function getMultiselectHTML($answers, $type, $que_id, $is_required, $maxsize, $min, $max, $precision, $scale_slot, $is_sort, $is_datetime, $advancetype, $que_title, $matrix_row, $matrix_col, $description) {
    $html = "";
    switch ($type) {
        case 'MultiSelectList':
            $html = "<div class='option multiselect-list  two-col' id='{$que_id}_div'>
                    <select class='form-control multiselect {$que_id}' multiple='' size='10' name='{$que_id}[]' >";
            if ($is_sort == 1) {
                foreach ($answers as $ans) {
                    foreach ($ans as $ans_id => $answer) {
                        $options[$ans_id] = $answer;
                    }
                }
                asort($options);

                foreach ($options as $ans_id => $answer) {
                    $html .= "<option value='{$ans_id}'>" . htmlspecialchars_decode($answer) . "</option>";
                }
            } else {
                foreach ($answers as $ans) {
                    foreach ($ans as $ans_id => $answer) {
                        $html .= "<option value='{$ans_id}'>" . htmlspecialchars_decode($answer) . "</option>";
                    }
                }
            }
            $html .= "</select></div>";
            return $html;
            break;
        case 'Checkbox':
            $html = "<div class='option checkbox-list' id='{$que_id}_div'><ul>";
            if ($advancetype == 'Horizontal') {
                
            }
            if ($is_sort == 1) {
                foreach ($answers as $ans) {
                    foreach ($ans as $ans_id => $answer) {
                        $options[$ans_id] = $answer;
                    }
                }
                asort($options);
                if ($advancetype == 'Horizontal') {
                    $op = 1;
                    foreach ($options as $ans_id => $answer) {
                        $html .= "<li class='md-checkbox' style='display:inline;'><label><input type='checkbox' value='{$ans_id}' id='{$que_id}_{$op}' name='{$que_id}[]' class='{$que_id} md-check'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>"
                                . "<span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                        $op++;
                    }
                } else {
                    $op = 1;
                    foreach ($options as $ans_id => $answer) {
                        $html .= "<li class='md-checkbox'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-check'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                           <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                        $op++;
                    }
                }
            } else {
                if ($advancetype == 'Horizontal') {
                    $op = 1;
                    foreach ($answers as $ans) {
                        foreach ($ans as $ans_id => $answer) {
                            $html .= "<li class='md-checkbox' style='display:inline;'><label><input type='checkbox' value='{$ans_id}' id='{$que_id}_{$op}' name='{$que_id}[]' class='{$que_id} md-check'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                            $op++;
                        }
                    }
                } else {
                    $op = 1;
                    foreach ($answers as $ans) {
                        foreach ($ans as $ans_id => $answer) {
                            $html .= "<li class='md-checkbox'><label><input type='checkbox' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-check'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
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
            if ($is_sort == 1) {
                foreach ($answers as $ans) {
                    foreach ($ans as $ans_id => $answer) {
                        $options[$ans_id] = $answer;
                    }
                }
                asort($options);
                if ($advancetype == 'Horizontal') {
                    $op = 1;
                    foreach ($options as $ans_id => $answer) {
                        $html .= "<li class='md-radio' style='display:inline;'><label><input type='radio' id='{$que_id}_{$op}' value='{$ans_id}' name='{$que_id}[]' class='{$que_id} md-radiobtn'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                    }
                    $op++;
                } else {
                    $op = 1;
                    foreach ($options as $ans_id => $answer) {
                        $html .= "<li class='md-radio'><label><input type='radio' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-radiobtn'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                            <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                        $op++;
                    }
                }
            } else {
                if ($advancetype == 'Horizontal') {
                    $op = 1;
                    foreach ($answers as $ans) {
                        foreach ($ans as $ans_id => $answer) {
                            $html .= "<li class='md-radio' style='display:inline;'><label><input type='radio' value='{$ans_id}' id='{$que_id}_{$op}' name='{$que_id}[]' class='{$que_id} md-radiobtn'> " . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                        }
                        $op++;
                    }
                } else {
                    $op = 1;
                    foreach ($answers as $ans) {

                        foreach ($ans as $ans_id => $answer) {
                            $html .= " <li class='md-radio'><label><input type='radio' value='{$ans_id}' name='{$que_id}[]' id='{$que_id}_{$op}' class='{$que_id} md-radiobtn'>" . htmlspecialchars_decode($answer) . "<label for='{$que_id}_{$op}'>
                                <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></li>";
                        }
                        $op++;
                    }
                }
            }
            $html .= "</ul></div>";
            return $html;
            break;
        case 'DrodownList':
            $html = "<div class='option select-list two-col' id='{$que_id}_div'><ul><li><div class='styled-select'>";
            $html .= "<select name='{$que_id}[]' class='form-control required {$que_id}'><option selected='' value=''>Select</option>";
            if ($is_sort == 1) {
                foreach ($answers as $ans) {
                    foreach ($ans as $ans_id => $answer) {
                        $options[$ans_id] = $answer;
                    }
                }
                asort($options);

                foreach ($options as $ans_id => $answer) {
                    $html .= "<option value='{$ans_id}'>" . htmlspecialchars_decode($answer) . "</option>";
                }
            } else {
                foreach ($answers as $ans) {
                    foreach ($ans as $ans_id => $answer) {
                        $html .= "<option value='{$ans_id}'>" . htmlspecialchars_decode($answer) . "</option>";
                    }
                }
            }
            $html .= "</select></div></li></ul></div>";
            return $html;
            break;
        case 'Textbox':
            $html = "<div class='option select-list two-col' id='{$que_id}_div'><ul><li>";
            $html .= "<input class='form-control {$que_id}' type='textbox' name='{$que_id}[]' class='{$que_id}'>";
            $html .= "</li></ul></div>";
            return $html;
            break;
        case 'CommentTextbox':
            $html = "<div class='option select-list two-col' id='{$que_id}_div'><ul><li>";
            if (!empty($min) || !empty($max)) {

                $html .= "<textarea style='height:auto;width:auto;' class='form-control {$que_id}' rows='{$min}' cols='{$max}' name='{$que_id}[]'></textarea>";
            } else {
                $html .= "<textarea class='form-control {$que_id}' rows='4' cols='20' name='{$que_id}[]'></textarea>";
            }
            $html .= "</li></ul></div>";
            return $html;
            break;
        case 'Rating':
            $html = "<div class='option select-list' id='{$que_id}_div'>";
            $html .= "<ul onMouseOut='resetRating(\"{$que_id}\")'>";
            if (!empty($maxsize)) {
                $starCount = $maxsize;
            } else {
                $starCount = 5;
            }
            for ($i = 1; $i <= $starCount; $i++) {
                $selected = "";

                $html .= "<li class='rating {$selected}' style='display: inline;font-size: x-large' onmouseover='highlightStar(this,\"{$que_id}\");' onclick='addRating(this,\"{$que_id}\")'>&#9733;</li>";
            }
            $html .= "</ul>";
            $html .= "</div>";
            $html .= "<input type='hidden'  name='{$que_id}[]' class='{$que_id}' id='{$que_id}_hidden'>";
            return $html;
            break;
        case 'ContactInformation':
            if ($is_required == 1 && empty($advancetype)) {

                $html = "<div class='option input-list two-col' id='{$que_id}_div'><ul>
                                <li><input placeholder='Name *' class='form-control {$que_id}_name'  type='text' name='{$que_id}[{$que_id}][Name]'></li>
                                <li><input placeholder='Email Address *'  class='form-control {$que_id}_email'  type='text' name='{$que_id}[{$que_id}][Email Address]'></li>
                                <li><input placeholder='Company' class='form-control {$que_id}_company'  type='text' name='{$que_id}[{$que_id}][Company]'></li>
                                <li><input placeholder='Phone Number *' class='form-control {$que_id}_phone'  type='text' name='{$que_id}[{$que_id}][Phone Number]'></li> 
                                <li><input placeholder='Address' class='form-control {$que_id}_address'  type='text' name='{$que_id}[{$que_id}][Address]'></li>
                                <li><input placeholder='Address2'class='form-control {$que_id}_address2'  type='text' name='{$que_id}[{$que_id}][Address2]'></li>
                                <li><input placeholder='City/Town' class='form-control {$que_id}_city'  type='text' name='{$que_id}[{$que_id}][City/Town]'></li>
                                <li><input placeholder='State/Province' class='form-control {$que_id}_state'  type='text' name='{$que_id}[{$que_id}][State/Province]'></li>
                                <li><input placeholder='ZIP/Postal Code' class='form-control {$que_id}_zip'  type='text' name='{$que_id}[{$que_id}][Zip/Postal Code]'></li>
                                <li><input placeholder='Country' class='form-control {$que_id}_country'  type='text' name='{$que_id}[{$que_id}][Country]'></li>                                
                            </ul></div>";
            } else if ($is_required == 1 && !empty($advancetype)) {
                $requireFields = explode(' ', $advancetype);
                $html = "<div class='option input-list two-col' id='{$que_id}_div'><ul>";
                if (in_array('Name', $requireFields)) {
                    $html .= "                <li><input placeholder='Name *' class='form-control {$que_id}_name'  type='text' name='{$que_id}[{$que_id}][Name]'></li>";
                } else {
                    $html .= "                <li><input placeholder='Name ' class='form-control {$que_id}_name'  type='text' name='{$que_id}[{$que_id}][Name]'></li>";
                }
                if (in_array('Email', $requireFields)) {
                    $html .= "                <li><input placeholder='Email Address *'  class='form-control {$que_id}_email'  type='text' name='{$que_id}[{$que_id}][Email Address]'></li>";
                } else {
                    $html .= "                <li><input placeholder='Email Address '  class='form-control {$que_id}_email'  type='text' name='{$que_id}[{$que_id}][Email Address]'></li>";
                }
                if (in_array('Company', $requireFields)) {
                    $html .= "                <li><input placeholder='Company *' class='form-control {$que_id}_company'  type='text' name='{$que_id}[{$que_id}][Company]'></li>";
                } else {
                    $html .= "                <li><input placeholder='Company' class='form-control {$que_id}_company'  type='text' name='{$que_id}[{$que_id}][Company]'></li>";
                }
                if (in_array('Phone', $requireFields)) {
                    $html .= "                <li><input placeholder='Phone Number *' class='form-control {$que_id}_phone'  type='text' name='{$que_id}[{$que_id}][Phone Number]'></li> ";
                } else {
                    $html .= "                <li><input placeholder='Phone Number ' class='form-control {$que_id}_phone'  type='text' name='{$que_id}[{$que_id}][Phone Number]'></li> ";
                }
                if (in_array('Address', $requireFields)) {
                    $html .= "                <li><input placeholder='Address *' class='form-control {$que_id}_address'  type='text' name='{$que_id}[{$que_id}][Address]'></li>";
                } else {
                    $html .= "                <li><input placeholder='Address' class='form-control {$que_id}_address'  type='text' name='{$que_id}[{$que_id}][Address]'></li>";
                }
                if (in_array('Address2', $requireFields)) {
                    $html .= "                <li><input placeholder='Address2 *'class='form-control {$que_id}_address2'  type='text' name='{$que_id}[{$que_id}][Address2]'></li>";
                } else {
                    $html .= "                <li><input placeholder='Address2'class='form-control {$que_id}_address2'  type='text' name='{$que_id}[{$que_id}][Address2]'></li>";
                }
                if (in_array('City', $requireFields)) {
                    $html .= "                <li><input placeholder='City/Town *' class='form-control {$que_id}_city'  type='text' name='{$que_id}[{$que_id}][City/Town]'></li>";
                } else {
                    $html .= "                <li><input placeholder='City/Town' class='form-control {$que_id}_city'  type='text' name='{$que_id}[{$que_id}][City/Town]'></li>";
                }
                if (in_array('State', $requireFields)) {
                    $html .= "                <li><input placeholder='State/Province *' class='form-control {$que_id}_state'  type='text' name='{$que_id}[{$que_id}][State/Province]'></li>";
                } else {
                    $html .= "                <li><input placeholder='State/Province' class='form-control {$que_id}_state'  type='text' name='{$que_id}[{$que_id}][State/Province]'></li>";
                }
                if (in_array('Zip', $requireFields)) {
                    $html .= "                <li><input placeholder='ZIP/Postal Code *' class='form-control {$que_id}_zip'  type='text' name='{$que_id}[{$que_id}][Zip/Postal Code]'></li>";
                } else {
                    $html .= "                <li><input placeholder='ZIP/Postal Code' class='form-control {$que_id}_zip'  type='text' name='{$que_id}[{$que_id}][Zip/Postal Code]'></li>";
                }
                if (in_array('Country', $requireFields)) {
                    $html .= "                <li><input placeholder='Country *' class='form-control {$que_id}_country'  type='text' name='{$que_id}[{$que_id}][Country]'></li>";
                } else {
                    $html .= "                <li><input placeholder='Country' class='form-control {$que_id}_country'  type='text' name='{$que_id}[{$que_id}][Country]'></li>";
                }
                $html .= "            </ul></div>";
            } else {
                $html = "<div class='option input-list two-col' id='{$que_id}_div'><ul>
                                <li><input placeholder='Name' class='form-control {$que_id}_name'  type='text' name='{$que_id}[{$que_id}][Name]'></li>
                                <li><input placeholder='Email Address'  class='form-control {$que_id}_email'  type='text'  name='{$que_id}[{$que_id}][Email Address]'></li>
                                <li><input placeholder='Company' class='form-control {$que_id}_company'  type='text' name='{$que_id}[{$que_id}][Company]'></li>
                                <li><input placeholder='Phone Number' class='form-control {$que_id}_phone'  type='text' name='{$que_id}[{$que_id}][Phone Number]'></li>                              
                                <li><input placeholder='Address' class='form-control {$que_id}_address'  type='text' name='{$que_id}[{$que_id}][Address]'></li>
                                <li><input placeholder='Address2' class='form-control {$que_id}_address2'  type='text'name='{$que_id}[{$que_id}][Address2]'></li>
                                <li><input placeholder='City/Town' class='form-control {$que_id}_city'  type='text' name='{$que_id}[{$que_id}][City/Town]'></li>
                                <li><input placeholder='State/Province' class='form-control {$que_id}_state'  type='text' name='{$que_id}[{$que_id}][State/Province]'></li>
                                <li><input placeholder='ZIP/Postal Code' class='form-control {$que_id}_zip'  type='text' name='{$que_id}[{$que_id}][Zip/Postal Code]'></li>
                                <li><input placeholder='Country' class='form-control {$que_id}_country'  type='text' name='{$que_id}[{$que_id}][Country]'></li>                                                          
                                 </ul></div>";
            }
            return $html;
            break;
        case 'Date':
            $html = "<div class='option select-list two-col' id='{$que_id}_div'><ul><li>";
            if ($is_datetime == 1) {
                $html .= "<input class='form-control setdatetime {$que_id}_datetime' type='text' name='{$que_id}[]' class='{$que_id}'>";
            } else {
                $html .= "<input class='form-control setdate {$que_id}_datetime' type='text' name='{$que_id}[]' class='{$que_id}'>";
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
            $lables = !empty($advancetype) ? split('-', $advancetype) : '';
            $left = !empty($lables) ? $lables[0] : '';
            $middle = !empty($lables) ? $lables[1] : '';
            $right = !empty($lables) ? $lables[2] : '';
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
            $html .= "</div>";
            return $html;
            break;
        case 'Matrix':
            $display_type = $advancetype == 'Checkbox' ? 'checkbox' : 'radio';
            $rows = array();
            $rows = json_decode($matrix_row);
            $cols = json_decode($matrix_col);

            // Initialize counter - count number of rows & columns
            $row_count = 1;
            $col_count = 1;
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
                        $html .= "<th class='matrix-span' style='font-weight:bold; width:" . $width . ";text-align:left;'>" . $rows->$row . "</th>";
                    } else {
                        //Columns label
                        if ($j <= ($col_count + 1) && $cols->$col != null && !($j == 1 && $i == 1) && ($i == 1 || $j == 1)) {
                            $html .= "<th class='matrix-span' style='font-weight:bold; width:" . $width . "'>" . $cols->$col . "</th>";
                        }
                        //Display answer input (RadioButton or Checkbox)
                        else if ($j != 1 && $i != 1 && $cols->$col != null) {
                            $html .= "<td class='matrix-span' style='width:" . $width . "; '>"
                                    . "<span class='md-" . $display_type . "'><input type='" . $display_type . "'  id='{$que_id}_{$op}' class='{$que_id} md-check' name='matrix" . $row . "'/><label for='{$que_id}_{$op}'>
                                                            <span></span>
                                                            <span class='check'></span>
                                                            <span class='box'></span></label></label></span>"
                                    . "</td>";
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
            $html .= "</table></div>";
            return $html;
            break;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>   
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo $favicon; ?>" type="image/x-icon">
        <title>Survey Template</title>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
        <script src="custom/include/js/survey_js/jquery.datetimepicker.js"></script>

        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="custom/include/css/survey_css/jquery.datetimepicker.css">

        <link href="<?php echo $sugar_config['site_url'] . '/custom/include/css/survey_css/survey-form.css' ?>" rel="stylesheet">
        <link href="<?php echo $sugar_config['site_url'] . '/custom/include/css/survey_css/' . $survey->theme . '.css'; ?>" rel="stylesheet">
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
                var min, max, maxsize, precision, scale_slot = 0;
                $.ajax({
                    url: "index.php?entryPoint=preview_survey",
                    type: "POST",
                    action: 'get_survey_detail',
                    data: {
                        'method': 'get_survey',
                        'record_id': '<?php echo $survey_id; ?>'},
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
                                            if (!q_data['min'] || !q_data['max']) {
                                                detail['min'] = 0;
                                                detail['max'] = 10;
                                                detail['scale_slot'] = 1;
                                            } else {
                                            detail['min'] = q_data['min'];
                                            detail['max'] = q_data['max'];
                                            detail['scale_slot'] = q_data['scale_slot'];
                                            }
                                            slider_detail[q_data['que_id']] = detail;
                                        }
                                    });
                                }
                            });
                        });
                        //bind next prev button click function
                        $(".bx-next").click(function () {

                            var currentSlidePage = slider.getCurrentSlide() + 1;
                            var totalPageCount = slider.getSlideCount();
                            if (currentSlidePage == totalPageCount - 1) {
                                $(this).removeClass('showBtn').addClass('hideBtn');
                            } else {
                                $("#btnprev").removeClass('hideBtn').addClass('showBtn');
                            }
                            slider.goToNextSlide();
                            $('html, body').animate({scrollTop: 0}, 800);
                            if ($(this).hasClass('hideBtn')) {
                                $("#btnsend").show();
                                $("#btnprev").removeClass('hideBtn').addClass('showBtn');
                            }

                        });
                        $(".bx-prev").click(function () {
                            $('.validation-tooltip').fadeOut();
                            var currentSlidePage = slider.getCurrentSlide();
                            if (currentSlidePage == 1) {
                                $(this).removeClass('showBtn').addClass('hideBtn');
                                $("#btnnext").removeClass('hideBtn').addClass('showBtn');
                            } else {
                                $("#btnnext").removeClass('hideBtn').addClass('showBtn');
                            }
                            slider.goToPrevSlide();
                            $('html, body').animate({scrollTop: 0}, 800);
                            $("#btnsend").hide();
                        });

                        //setting slider
                        $(function () {
                            var que_id = '';
                            $.each(slider_detail, function (qid, slider_data) {
                                var slider = $('.' + qid).find("#slider").slider({
                                    slide: function (event, ui) {
                                        $(ui.handle).find('.tooltip').html('<div>' + ui.value + '</div>');
                                    },
                                    range: "min",
                                    value: slider_data.min,
                                    min: parseInt(slider_data.min),
                                    max: parseInt(slider_data.max),
                                    step: parseInt(slider_data.scale_slot),
                                    create: function (event, ui) {
                                        var tooltip = $('<div class="tooltip" />');

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
                        var progress_percentage = Math.floor((page_no * 100) / total_pages);

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
                });
                var total_pages = parseInt($('.page-no').length);
                var page_no = 0;
                var progress_percentage = Math.floor((page_no * 100) / total_pages);

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
            });</script>
    </head>
    <body>
        <div id='tooltipDiv'></div>
        <div class="bg"></div>
        <div class="main-container">
            <div class="clip">
                <span class="clip-0"><img src="custom/include/survey-img/paperclip-last.png"></span>
                <span class="clip-1"><img src="custom/include/survey-img/paperclip.png"></span>
                <span class="clip-2"><img src="custom/include/survey-img/paperclip.png"></span>
                <!-- <span class="clip-3"><img src="custom/include/survey-img/redpin-new.png"></span> -->
            </div>
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
                <div class="container">
                    <div class="survey-form form-desc">
                        <ul class="progress-bar">
                            <!--    setting number & page title designing for page completion status-->
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
                                <!--    setting progressbar for page completion status-->
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
                        <div class="form-body">
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
                        $img_flag = false;
                        $que_no = 0;
                        foreach ($survey_details as $page_sequence => $detail) {
                            ?>				
                            <li>
                                <div class="survey-form">
                                    <div class="form-header">
                                        <h1><?php echo $detail['page_title']; ?></h1>
                                        <span class="page-no"><i><?php echo $page_sequence ?></i></span>
                                    </div>
                                    <?php foreach ($detail['page_questions'] as $que_sequence => $question) { ?>
                                        <div class="form-body <?php echo $question['que_type']; ?>">
                                            <input type="hidden" class="questionHiddenField" name="questions[]" value="<?php echo $question['que_id'] ?>"  >
                                            <h3 class="questions"><?php
                                                if ($question['que_type'] == 'Image' || $question['que_type'] == 'Video') {
                                                    echo $question['question_help_comment'];
                                                } else {
                                                    $que_no++;
                                                    $img_flag = false;
                                                    echo $que_no . '.&nbsp;';

                                                    echo $question['que_title']
                                                    ?>  <?php if ($question['is_required'] == 1) { ?>
                                                        <span class="is_required" style="color:red;">   *</span>
                                                        <?php
                                                    }
                                                }
                                                if ($question['que_type'] == 'Image' || $question['que_type'] == 'Video') {
                                                    // do not display help comment on top-right side
                                                } else if (!empty($question['question_help_comment'])) {
                                                    ?> <div style="display: inline-block;float: right;"><img class="questionImgIcon" onmouseout="removeHelpTipPopUpDiv();" onmouseover="openHelpTipsPopUpSurvey(this, '<?php echo $question['question_help_comment']; ?>');" src="custom/include/survey-img/question.png" ></div>
                                                <?php } ?></h3>
                                            <?php
                                            $elementHTML = getMultiselectHTML($question['answers'], $question['que_type'], $question['que_id'], $question['is_required'], $question['maxsize'], $question['min'], $question['max'], $question['precision'], $question['scale_slot'], $question['is_sort'], $question['is_datetime'], $question['advance_type'], $question['que_title'], $question['matrix_row'], $question['matrix_col'], $question['description']);
                                            echo $elementHTML;
                                            ?>                    
                                        </div>
                                    <?php } ?>
                                </div>
                            </li>

                        <?php } ?>
                    </ul>
                    <div class="action-block"><div style="display: inline-block;float: right;"> <input class='bx-prev button hideBtn'  type='button' value='Prev' name="btnprev" id="btnprev">
                            <input class='bx-next button <?php echo $addClass; ?>'  type='button' value='Next' name="btnnext" id="btnnext"></div></div>
                    <div class="btm-link"><a href="#"></a></div>

                </div>
            </div>
        </div>
    </body>
</html>
