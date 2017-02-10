<?php
$viewdefs['Leads'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'hidden' => 
        array (
          0 => '<input type="hidden" name="prospect_id" value="{if isset($smarty.request.prospect_id)}{$smarty.request.prospect_id}{else}{$bean->prospect_id}{/if}">',
          1 => '<input type="hidden" name="account_id" value="{if isset($smarty.request.account_id)}{$smarty.request.account_id}{else}{$bean->account_id}{/if}">',
          2 => '<input type="hidden" name="contact_id" value="{if isset($smarty.request.contact_id)}{$smarty.request.contact_id}{else}{$bean->contact_id}{/if}">',
          3 => '<input type="hidden" name="opportunity_id" value="{if isset($smarty.request.opportunity_id)}{$smarty.request.opportunity_id}{else}{$bean->opportunity_id}{/if}">',
        ),
        'buttons' => 
        array (
          0 => 'SAVE',
          1 => 'CANCEL',
        ),
      ),
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
      'javascript' => '<script type="text/javascript" language="Javascript">function copyAddressRight(form)  {ldelim} form.alt_address_street.value = form.primary_address_street.value;form.alt_address_city.value = form.primary_address_city.value;form.alt_address_state.value = form.primary_address_state.value;form.alt_address_postalcode.value = form.primary_address_postalcode.value;form.alt_address_country.value = form.primary_address_country.value;return true; {rdelim} function copyAddressLeft(form)  {ldelim} form.primary_address_street.value =form.alt_address_street.value;form.primary_address_city.value = form.alt_address_city.value;form.primary_address_state.value = form.alt_address_state.value;form.primary_address_postalcode.value =form.alt_address_postalcode.value;form.primary_address_country.value = form.alt_address_country.value;return true; {rdelim} </script>
			{sugar_getscript file="custom/include/javascripts/Multifield/jquery.multifield.js"}
			{sugar_getscript file="custom/modules/Leads/js/custom.edit.view.js"}',
      'tabDefs' => 
      array (
        'LBL_CONTACT_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_GUARDIAN' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_ADVANCED' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => false,
    ),
    'panels' => 
    array (
      'LBL_CONTACT_INFORMATION' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'customLabel' => '{$MOD.LBL_NAME} <span class="required">*</span>',
            'customCode' => '<input name="last_name" id="last_name" placeholder="{$MOD.LBL_LAST_NAME|replace:\':\':\'\'}" style="width:120px !important" size="15" type="text"  value="{$fields.last_name.value}">
						&nbsp;<input name="first_name" id="first_name" placeholder="{$MOD.LBL_FIRST_NAME|replace:\':\':\'\'}" style="width:120px !important" size="15" type="text" value="{$fields.first_name.value}"></br>
						<span style=" color: #A99A9A; font-style: italic;"> Bùi Vũ Thanh An  </br> Last Name: Bùi Vũ Thanh </br> First Name:  An </span>',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'nick_name',
          ),
          1 => 
          array (
            'name' => 'birthdate',
            'comment' => 'The birthdate of the contact',
            'label' => 'LBL_BIRTHDATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'gender',
            'studio' => 'visible',
            'label' => 'LBL_GENDER',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => 
          array (
            'name' => 'j_school_leads_1_name',
          ),
        ),
        3 => 
        array (
          0 => 'description',
        ),
      ),
      'LBL_PANEL_GUARDIAN' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'c_contacts_leads_1_name',
            'label' => 'LBL_GUARDIAN_NAME',
            'displayParams' => 
            array (
              'class' => 'sqsNoAutofill',
            ),
          ),
          1 => 
          array (
            'name' => 'contact_rela',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_RELA',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'phone_mobile',
            'label' => 'LBL_MOBILE_PHONE',
          ),
          1 => 
          array (
            'name' => 'other_mobile',
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
          0 => 
          array (
            'name' => 'email1',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
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
        4 => 
        array (
          0 => 
          array (
            'name' => 'relationship',
            'studio' => 'visible',
            'label' => 'LBL_RELATIONSHIP',
            'customCode' => '{include file ="custom/modules/Leads/tpls/addRelationship.tpl"}',
          ),
          1 => 
          array (
            'name' => 'describe_relationship',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIBE_RELATIONSHIP',
          ),
        ),
        5 => 
        array (
          0 => 'account_name',
          1 => 'phone_work',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'study_apollo_before',
            'studio' => 'visible',
            'label' => 'LBL_STUDY_APOLLO_BEFORE',
          ),
          1 => 
          array (
            'name' => 'study_other_before',
            'studio' => 'visible',
            'label' => 'LBL_STUDY_OTHER_BEFORE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'time_study_english',
            'studio' => 'visible',
            'label' => 'LBL_TIME_STUDY_ENGLISH',
          ),
          1 => 
          array (
            'name' => 'study_with_before',
            'studio' => 'visible',
            'label' => 'LBL_STUDY_WITH_BEFORE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'strong_skills',
            'studio' => 'visible',
            'label' => 'LBL_STRONG_SKILLS',
          ),
          1 => 
          array (
            'name' => 'weak_skills',
            'studio' => 'visible',
            'label' => 'LBL_WEAK_SKILLS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'expectation',
            'studio' => 'visible',
            'label' => 'LBL_EXPECTATION',
          ),
          1 => 
          array (
            'name' => 'other_note',
            'studio' => 'visible',
            'label' => 'LBL_OTHER_NOTE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'preferred_kind_of_course',
            'studio' => 'visible',
            'label' => 'LBL_PREFERRED_KIND_OF_COURSE',
            'customCode' => '{$html_koc}',
          ),
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'lead_source',
            'customCode' => '{$lead_source}',
          ),
          1 => 
          array (
            'name' => 'potential',
            'studio' => 'visible',
            'label' => 'LBL_POTENTIAL',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'lead_source_description',
          ),
          1 => 'campaign_name',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
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
              'display' => true,
            ),
          ),
        ),
      ),
    ),
  ),
);
