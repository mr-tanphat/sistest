<?php
// created: 2015-08-07 10:06:04
$subpanel_layout['where'] = ' (meetings.session_status <> "Cancelled")';
$subpanel_layout['list_fields'] = array (
  'lesson_number' =>
  array (
    'type' => 'int',
    'default' => true,
    'vname' => 'LBL_NO',
    'width' => '3%',
  ),
  'till_hour' =>
  array (
    'type' => 'till_hour',
    'vname' => 'LBL_TILL_HOUR',
    'width' => '3%',
    'default' => true,
  ),
  'sso_code' =>
  array (
    'type' => 'sso_code',
    'vname' => 'LBL_SSO_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'name' =>
  array (
    'name' => 'name',
    'vname' => 'LBL_LIST_SUBJECT',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '10%',
    'default' => true,
  ),
  'session_status' =>
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_SESSION_STATUS',
    'width' => '12%',
  ),
    'week_date' =>
  array (
    'type' => 'varchar',
    'vname' => 'LBL_WEEK_DATE',
    'width' => '7%',
    'default' => true,
  ),
  'time_start_end' =>
  array (
    'name' => 'time_start_end',
    'vname' => 'Dates/Times',
    'width' => '12%',
    'default' => true,
    'sort_by' => 'date_start',
  ),
//  'date_end' =>
//  array (
//    'type' => 'datetimecombo',
//    'studio' =>
//    array (
//      'wirelesseditview' => false,
//    ),
//    'vname' => 'LBL_DATE_END',
//    'width' => '12%',
//    'default' => true,
//  ),
  'duration_cal' =>
  array (
    'type' => 'duration_cal',
    'vname' => 'LBL_DURATION',
    'width' => '5%',
    'default' => true,
  ),
//   'number_of_student' =>
//  array (
//    'type' => 'varchar',
//    'vname' => 'LBL_NUMBER_OF_STUDENT',
//    'width' => '5%',
//    'default' => true,
//  ),
//  'attended' =>
//  array (
//    'type' => 'varchar',
//    'vname' => 'LBL_ATTENDEDD',
//    'width' => '5%',
//    'default' => true,
//  ),
  'teacher_name' =>
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_TEACHER_NAME',
    'id' => 'TEACHER_ID',
    'width' => '12%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'C_Teachers',
    'target_record_key' => 'teacher_id',
  ),
  'teaching_type' =>
  array (
    'name' => 'teaching_type',
    'vname' => 'LBL_TEACHING_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'change_teacher_reason' =>
  array (
    'name' => 'change_teacher_reason',
    'vname' => 'LBL_CHANGE_TEACHER_REASON',
    'width' => '10%',
    'default' => true,
  ),
  'subpanel_button' =>
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'vname' => 'LBL_SUBPANEL_BUTTON',
    'width' => '10%',
    'default' => true,
    'align' => 'center',
  ),
  'type_of_class' =>
  array (
    'type' => 'enum',
    'default' => false,
    'usage' => 'query_only',
  ),
  'recurring_source' =>
  array (
    'usage' => 'query_only',
  ),
    'meeting_type' =>
  array (
    'usage' => 'query_only',
  ),
  'date_start' =>
  array (
    'usage' => 'query_only',
  ),
  'date_end' =>
  array (
    'usage' => 'query_only',
  )
);
if (($GLOBALS['current_user']->team_type == 'Junior')){
    unset($subpanel_layout['list_fields']['sso_code']);
}
