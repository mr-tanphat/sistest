<?php
$module_name = 'C_Sponsors';
$searchdefs[$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'is_used' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_IS_USED',
        'width' => '10%',
        'name' => 'is_used',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'is_used' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_IS_USED',
        'width' => '10%',
        'name' => 'is_used',
      ),
      'amount' => 
      array (
        'type' => 'currency',
        'label' => 'LBL_AMOUNT',
        'currency_format' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'amount',
      ),
      'issue_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_ISSUE_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'issue_date',
      ),
      'expired_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_EXPIRED_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'expired_date',
      ),
      'team_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'studio' => 
        array (
          'portallistview' => false,
          'portaldetailview' => false,
          'portaleditview' => false,
        ),
        'label' => 'LBL_TEAMS',
        'id' => 'TEAM_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'team_name',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
