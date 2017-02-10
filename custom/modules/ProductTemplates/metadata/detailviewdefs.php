<?php
$viewdefs['ProductTemplates'] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'javascript' => '       
            {sugar_getscript file="custom/modules/ProductTemplates/js/detailview.js"}',
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
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'status2',
            'label' => 'LBL_STATUS_2',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'category_name',
            'type' => 'varchar',
            'label' => 'LBL_CATEGORY',
          ),
        ),
        2 => 
        array (
          0 => 'name',
          1 => 'date_available',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'type_id',
            'type' => 'varchar',
            'label' => 'LBL_TYPE',
          ),
          1 => 
          array (
            'name' => 'unit',
            'studio' => 'visible',
            'label' => 'LBL_UNIT',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'quantity',
            'label' => 'LBL_QUANTITY',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'cost_price',
            'label' => '{$MOD.LBL_COST_PRICE|strip_semicolon} ({$CURRENCY})',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'discount_price',
            'label' => '{$MOD.LBL_DISCOUNT_PRICE|strip_semicolon} ({$CURRENCY})',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'displayParams' => 
            array (
              'nl2br' => true,
            ),
          ),
        ),
      ),
    ),
  ),
);
