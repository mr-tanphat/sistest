<?php 
 //WARNING: The contents of this file are auto-generated


/**
 *
 * LICENSE: The contents of this file are subject to the license agreement ("License") which is included
 * in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
 * agreed to the terms and conditions of the License, and you may not use this file except in compliance
 * with the License.
 *
 * @author     Original Author Biztech Co.
 */
// created: 2014-10-08 08:28:58
$dictionary["bc_survey_pages"]["fields"]["bc_survey_pages_bc_survey"] = array (
  'name' => 'bc_survey_pages_bc_survey',
  'type' => 'link',
  'relationship' => 'bc_survey_pages_bc_survey',
  'source' => 'non-db',
  'module' => 'bc_survey',
  'bean_name' => false,
  'vname' => 'LBL_BC_SURVEY_PAGES_BC_SURVEY_FROM_BC_SURVEY_TITLE',
  'id_name' => 'bc_survey_pages_bc_surveybc_survey_ida',
);
$dictionary["bc_survey_pages"]["fields"]["bc_survey_pages_bc_survey_name"]=array (
  'name' => 'bc_survey_pages_bc_survey_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_BC_SURVEY_PAGES_BC_SURVEY_FROM_BC_SURVEY_TITLE',
  'save' => true,
  'id_name' => 'bc_survey_pages_bc_surveybc_survey_ida',
  'link' => 'bc_survey_pages_bc_survey_right',
  'table' => 'bc_survey',
  'module' => 'bc_survey',
  'rname' => 'name',
);

$dictionary["bc_survey_pages"]["fields"]["bc_survey_pages_bc_surveybc_survey_ida"]=array (
  'name' => 'bc_survey_pages_bc_surveybc_survey_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_BC_SURVEY_PAGES_BC_SURVEY_FROM_BC_SURVEY_PAGES_TITLE',
  'id_name' => 'bc_survey_pages_bc_surveybc_survey_ida',
  'link' => 'bc_survey_pages_bc_survey_right',
  'table' => 'bc_survey',
  'module' => 'bc_survey',
  'rname' => 'id',
  'reportable' => false,
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);
$dictionary["bc_survey_pages"]["fields"]["bc_survey_pages_bc_survey_right"]=array (
  'name' => 'bc_survey_pages_bc_survey_right',
  'type' => 'link',
  'relationship' => 'bc_survey_pages_bc_survey',
  'source' => 'non-db',
  'vname' => 'LBL_BC_SURVEY_PAGES_BC_SURVEY_FROM_BC_SURVEY_PAGES_TITLE',
  'id_name' => '_idb',
  'side' => 'right',
);



/**
 *
 * LICENSE: The contents of this file are subject to the license agreement ("License") which is included
 * in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
 * agreed to the terms and conditions of the License, and you may not use this file except in compliance
 * with the License.
 *
 * @author     Original Author Biztech Co.
 */
// created: 2014-10-08 08:28:58
$dictionary["bc_survey_pages"]["fields"]["bc_survey_pages_bc_survey_template"] = array (
  'name' => 'bc_survey_pages_bc_survey_template',
  'type' => 'link',
  'relationship' => 'bc_survey_pages_bc_survey_template',
  'source' => 'non-db',
  'module' => 'bc_survey_template',
  'bean_name' => false,
  'vname' => 'LBL_BC_SURVEY_PAGES_BC_SURVEY_TEMPLATE_FROM_BC_SURVEY_TEMPLATE_TITLE',
  'id_name' => 'bc_survey_pages_bc_survey_templatebc_survey_template_ida',
);
$dictionary["bc_survey_pages"]["fields"]["bc_survey_pages_bc_survey_template_name"]=array (
  'name' => 'bc_survey_pages_bc_survey_template_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_BC_SURVEY_PAGES_BC_SURVEY_TEMPLATE_FROM_BC_SURVEY_TEMPLATE_TITLE',
  'save' => true,
  'id_name' => 'bc_survey_pages_bc_survey_templatebc_survey_template_ida',
  'link' => 'bc_survey_pages_bc_survey_template_right',
  'table' => 'bc_survey_template',
  'module' => 'bc_survey_template',
  'rname' => 'name',
);

$dictionary["bc_survey_pages"]["fields"]["bc_survey_pages_bc_survey_templatebc_survey_template_ida"]=array (
  'name' => 'bc_survey_pages_bc_survey_templatebc_survey_template_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_BC_SURVEY_PAGES_BC_SURVEY_TEMPLATE_FROM_BC_SURVEY_PAGES_TITLE',
  'id_name' => 'bc_survey_pages_bc_survey_templatebc_survey_template_ida',
  'link' => 'bc_survey_pages_bc_survey_template_right',
  'table' => 'bc_survey_template',
  'module' => 'bc_survey_template',
  'rname' => 'id',
  'reportable' => false,
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);
$dictionary["bc_survey_pages"]["fields"]["bc_survey_pages_bc_survey_template_right"]=array (
  'name' => 'bc_survey_pages_bc_survey_template_right',
  'type' => 'link',
  'relationship' => 'bc_survey_pages_bc_survey_template',
  'source' => 'non-db',
  'vname' => 'LBL_BC_SURVEY_PAGES_BC_SURVEY_TEMPLATE_FROM_BC_SURVEY_PAGES_TITLE',
  'id_name' => '_idb',
  'side' => 'right',
);



/**
 *
 * LICENSE: The contents of this file are subject to the license agreement ("License") which is included
 * in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
 * agreed to the terms and conditions of the License, and you may not use this file except in compliance
 * with the License.
 *
 * @author     Original Author Biztech Co.
 */
// created: 2014-10-08 08:28:58
$dictionary["bc_survey_pages"]["fields"]["bc_survey_pages_bc_survey_questions"] = array (
  'name' => 'bc_survey_pages_bc_survey_questions',
  'type' => 'link',
  'relationship' => 'bc_survey_pages_bc_survey_questions',
  'source' => 'non-db',
  'module' => 'bc_survey_questions',
  'bean_name' => false,
  'side' => 'right',
  'vname' => 'LBL_BC_SURVEY_PAGES_BC_SURVEY_QUESTIONS_FROM_BC_SURVEY_QUESTIONS_TITLE',
);

?>