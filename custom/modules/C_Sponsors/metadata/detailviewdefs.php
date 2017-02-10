<?php
$module_name = 'C_Sponsors';
$viewdefs[$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'issue_date',
            'label' => 'LBL_ISSUE_DATE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'is_used',
            'label' => 'LBL_IS_USED',
          ),
          1 => 
          array (
            'name' => 'expired_date',
            'label' => 'LBL_EXPIRED_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'amount',
            'label' => 'LBL_AMOUNT',
          ),
          1 => 
          array (
            'name' => 'sponsor_percent',
            'label' => 'LBL_SPONSOR_PERCENT',
          ),
        ),
        3 => 
        array (
          0 => 'description',
          1 => 'campaign_name',
        ),
        4 => 
        array (
          0 => 'team_name',
        ),
      ),
    ),
  ),
);
