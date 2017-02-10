<?php
$viewdefs['Prospects'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'useTabs' => false,
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
      'tabDefs' => 
      array (
        'LBL_PROSPECT_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_ASSIGNMENT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'lbl_prospect_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'customLabel' => '{$MOD.LBL_NAME} <span class="required">*</span>',
            'customCode' => '
                            &nbsp;<input name="last_name" id="last_name" placeholder="{$MOD.LBL_LAST_NAME|replace:\':\':\'\'}" style="width:120px !important" size="15" type="text"  value="{$fields.last_name.value}">
                            &nbsp;<input name="first_name" id="first_name" placeholder="{$MOD.LBL_FIRST_NAME|replace:\':\':\'\'}" style="width:120px !important" size="15" type="text" value="{$fields.first_name.value}"><br>
                            <span style=" color: #A99A9A; font-style: italic;"> Bùi Vũ Thanh An  </br> Last Name: Bùi Vũ Thanh </br> First Name:  An </span>',
          ),
        ),
        1 => 
        array (
          0 => '',
          1 => 
          array (
            'name' => 'birthdate',
            'label' => 'LBL_BIRTHDATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'gender',
            'label' => 'LBL_GENDER',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => 'j_school_prospects_1_name',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'guardian_name',
            'label' => 'LBL_GUARDIAN_NAME',
          ),
        ),
        1 => 
        array (
          0 => 'phone_mobile',
          1 => 
          array (
            'name' => 'guardian_phone',
            'label' => 'LBL_GUARDIAN_PHONE',
          ),
        ),
        2 => 
        array (
          0 => '',
          1 => 
          array (
            'name' => 'phone_other',
            'label' => 'LBL_OTHER_PHONE',
          ),
        ),
        3 => 
        array (
          0 => 'email1',
          1 => 
          array (
            'name' => 'primary_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'primary',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),
      ),
      'LBL_PANEL_ASSIGNMENT' => 
      array (
        0 => 
        array (
          0 => '',
          1 => 
          array (
            'name' => 'status',
            'comment' => 'Status of the target',
            'label' => 'LBL_STATUS',
            'customCode' => '{$STATUS}',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'lead_source',
            'label' => 'LBL_LEAD_SOURCE',
            'customCode' => '{$lead_source}',
          ),
          1 => 
          array (
            'name' => 'potential',
            'studio' => 'visible',
            'label' => 'LBL_POTENTIAL',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'lead_source_description',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_DESCRIPTION',
          ),
          1 => 
          array (
            'name' => 'campaign_name',
            'label' => 'LBL_CAMPAIGN',
          ),                  	
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => 
          array (
            'name' => 'team_name',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
      ),
    ),
  ),
);
