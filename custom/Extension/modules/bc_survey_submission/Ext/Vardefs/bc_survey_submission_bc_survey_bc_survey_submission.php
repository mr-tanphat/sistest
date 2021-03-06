<?php
/**
 *
 * LICENSE: The contents of this file are subject to the license agreement ("License") which is included
 * in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
 * agreed to the terms and conditions of the License, and you may not use this file except in compliance
 * with the License.
 *
 * @author     Original Author Biztech Co.
 */
// created: 2014-10-08 08:28:57
$dictionary["bc_survey_submission"]["fields"]["bc_survey_submission_bc_survey"] = array (
  'name' => 'bc_survey_submission_bc_survey',
  'type' => 'link',
  'relationship' => 'bc_survey_submission_bc_survey',
  'source' => 'non-db',
  'module' => 'bc_survey',
  'bean_name' => false,
  'vname' => 'LBL_BC_SURVEY_SUBMISSION_BC_SURVEY_FROM_BC_SURVEY_TITLE',
  'id_name' => 'bc_survey_submission_bc_surveybc_survey_ida',
);
$dictionary["bc_survey_submission"]["fields"]["bc_survey_submission_bc_survey_name"]=array (
  'name' => 'bc_survey_submission_bc_survey_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_BC_SURVEY_SUBMISSION_BC_SURVEY_FROM_BC_SURVEY_TITLE',
  'save' => true,
  'id_name' => 'bc_survey_submission_bc_surveybc_survey_ida',
  'link' => 'bc_survey_submission_bc_survey_right',
  'table' => 'bc_survey',
  'module' => 'bc_survey',
  'rname' => 'name',
);

$dictionary["bc_survey_submission"]["fields"]["bc_survey_submission_bc_surveybc_survey_ida"]=array (
  'name' => 'bc_survey_submission_bc_surveybc_survey_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_BC_SURVEY_SUBMISSION_BC_SURVEY_FROM_BC_SURVEY_SUBMISSION_TITLE',
  'id_name' => 'bc_survey_submission_bc_surveybc_survey_ida',
  'link' => 'bc_survey_submission_bc_survey_right',
  'table' => 'bc_survey',
  'module' => 'bc_survey',
  'rname' => 'id',
  'reportable' => false,
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);
$dictionary["bc_survey_submission"]["fields"]["bc_survey_submission_bc_survey_right"]=array (
  'name' => 'bc_survey_submission_bc_survey_right',
  'type' => 'link',
  'relationship' => 'bc_survey_submission_bc_survey',
  'source' => 'non-db',
  'vname' => 'LBL_BC_SURVEY_SUBMISSION_BC_SURVEY_FROM_BC_SURVEY_SUBMISSION_TITLE',
  'id_name' => '_idb',
  'side' => 'right',
);

