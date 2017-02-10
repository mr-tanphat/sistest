<?php
$listViewDefs['Leads'] =
array (
  'name' =>
  array (
    'width' => '17%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'orderBy' => 'name',
    'default' => true,
    'related_fields' =>
    array (
      0 => 'first_name',
      1 => 'last_name',
      2 => 'salutation',
    ),
  ),
  'birthdate' =>
  array (
    'type' => 'date',
    'label' => 'LBL_BIRTHDATE',
    'width' => '7%',
    'default' => true,
  ),
  'guardian_name' =>
  array (
    'type' => 'varchar',
    'label' => 'LBL_GUARDIAN_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'phone_mobile' =>
  array (
    'width' => '7%',
    'label' => 'LBL_MOBILE_PHONE',
    'default' => true,
  ),
  'email1' =>
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_EMAIL_ADDRESS',
    'sortable' => false,
    'customCode' => '{$EMAIL1_LINK}{$EMAIL1}</a>',
    'default' => true,
  ),
  'status' =>
  array (
    'width' => '7%',
    'label' => 'LBL_LIST_STATUS',
    'default' => true,
  ),
  'potential' =>
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_POTENTIAL',
    'width' => '7%',
  ),
  'lead_source' =>
  array (
    'width' => '7%',
    'label' => 'LBL_LEAD_SOURCE',
    'default' => true,
  ),
  'campaign_name' =>
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CAMPAIGN',
    'id' => 'CAMPAIGN_ID',
    'width' => '10%',
    'default' => true,
  ),
  'assigned_user_name' =>
  array (
    'width' => '10%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'date_entered' =>
  array (
    'width' => '10%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
    'orderBy' => 'date_entered',
    'sortOrder' => 'desc',
  ),
  'team_name' =>
  array (
    'width' => '5%',
    'label' => 'LBL_LIST_TEAM',
    'default' => true,
  ),
  'school_name' =>
  array (
    'type' => 'varchar',
    'label' => 'LBL_SCHOOL_NAME',
    'width' => '10%',
    'default' => false,
  ),
  'gender' =>
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_GENDER',
    'width' => '10%',
  ),
  'account_name' =>
  array (
    'width' => '15%',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'default' => false,
    'related_fields' =>
    array (
      0 => 'account_id',
    ),
  ),
  'phone_work' =>
  array (
    'width' => '15%',
    'label' => 'LBL_LIST_PHONE',
    'default' => false,
  ),
  'created_by' =>
  array (
    'width' => '10%',
    'label' => 'LBL_CREATED',
    'default' => false,
  ),
);
if (($GLOBALS['current_user']->team_type == 'Junior')){
    unset($listViewDefs['Leads']['email1']);
}
