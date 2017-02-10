<?php
$module_name = 'J_Discount';
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/modules/J_Discount/js/detailview.js',
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
        'LBL_DETAILVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
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
            'name' => 'status',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
        ),
        1 => 
        array (
          0 => 'order_no',
          1 => 
          array (
            'name' => 'apply_for',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'discount_amount',
            'label' => 'LBL_DISCOUNT_AMOUNT',
          ),
          1 => 
          array (
            'name' => 'start_date',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'discount_percent',
            'label' => 'LBL_DISCOUNT_PERCENT',
          ),
          1 => 'end_date',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'discount_days',
            'label' => 'LBL_DISCOUNT_DAYS',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'type',
            'studio' => 'visible',
            'label' => 'LBL_TYPE',
          ),
          1 => 'maximum_discount_percent'
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'content',
            'studio' => 'visible',
            'label' => 'LBL_CONTENT',
            'customCode' => '{$CONTENT}',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'partnership',
            'studio' => 'visible',
            'label' => 'LBL_PARTNERSHIP',
            'customCode' => '{$PARTNERSHIP}',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'course',
            'studio' => 'visible',
            'label' => 'LBL_COURSE',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'discount_schema',
            'studio' => 'visible',
            'label' => 'LBL_DISCOUNT_SCHEMA',
            'customCode' => '{$SCHEMA}',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'policy',
            'studio' => 'visible',
            'label' => 'LBL_POLICY',
          ),
        ),
        11 => 
        array (
          0 => 'description',
        ),
      ),
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 'assigned_user_name',
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
        1 => 
        array (
          0 => 'team_name',
          1 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
        ),
      ),
    ),
  ),
);
