<?php
$module_name = 'C_Refunds';
$searchdefs[$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      0 => 'document_name',
      1 => 
      array (
        'name' => 'favorites_only',
        'label' => 'LBL_FAVORITES_FILTER',
        'type' => 'bool',
      ),
    ),
    'advanced_search' => 
    array (
      'document_name' => 
      array (
        'name' => 'document_name',
        'default' => true,
        'width' => '10%',
      ),
      'refund_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'label' => 'LBL_REFUND_TYPE',
        'width' => '10%',
        'name' => 'refund_type',
      ),
      'refund_amount' => 
      array (
        'type' => 'currency',
        'label' => 'LBL_REFUND_AMOUNT',
        'currency_format' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'refund_amount',
      ),
      'refund_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_REFUND_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'refund_date',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'studio' => 
        array (
          'portaleditview' => false,
        ),
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
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
