<?php
$viewdefs['Contacts'] =
array (
  'DetailView' =>
  array (
    'templateMeta' =>
    array (
      'form' =>
      array (
        'hidden' =>
        array (
          0 => '<input type="hidden" name="password" id="password" value="">',
        ),
        'hideAudit' => true,
        'buttons' =>
        array (
          0 => 'EDIT',
          1 => 'DELETE',
          2 =>
          array (
            'customCode' => '{$custom_button}',
          ),
          3 =>
          array (
            'customCode' => '{$HIDDEN_HTML}',
          ),
          4 =>
          array (
            'customCode' => '<input type = "button" id = "reset_password" name = "reset_password" value = "Reset Password" onClick = "ajaxResetPassword()">',
          ),
          5 =>
          array (
            'customCode' => '{$send_survey}',
          ),
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
      'javascript' => '
            {sugar_getscript file="custom/modules/Contacts/js/detailview.js"}
            {sugar_getscript file="custom/modules/Contacts/js/pGenerator.jquery.js"}
            {sugar_getscript file="custom/modules/Contacts/js/handlePTDemoContact.js"}',
      'tabDefs' =>
      array (
        'LBL_CONTACT_INFORMATION' =>
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_COMPANY' =>
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PORTAL_INFORMATION' =>
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
      'syncDetailEditViews' => true,
    ),
    'panels' =>
    array (
      'lbl_contact_information' =>
      array (
        0 =>
        array (
          0 =>
          array (
            'name' => 'contact_id',
            'customCode' => '{if $fields.type.value == "Corporate"}
                        <span class="textbg_dream">{$fields.contact_id.value}</span>
                        {elseif $fields.type.value == "Public/Corp"}
                        <span class="textbg_blood">{$fields.contact_id.value}</span>
                        {else}
                        <span class="textbg_blue">{$fields.contact_id.value}</span>
                        {/if}',
          ),
          1 => 'aims_code',
        ),
        1 =>
        array (
          0 =>
          array (
            'name' => 'name',
          ),
          1 => 'picture',
        ),
        2 =>
        array (
          0 =>
          array (
            'name' => 'nick_name',
          ),
          1 =>
          array (
            'name' => 'birthdate',
          ),
        ),
        3 =>
        array (
          0 =>
          array (
            'name' => 'gender',
            'studio' => 'visible',
            'label' => 'LBL_GENDER',
          ),
          1 =>
          array (
            'name' => 'j_school_contacts_1_name',
          ),
        ),
        4 =>
        array (
          0 =>
          array (
            'name' => 'c_memberships_contacts_2_name',
            'label' => 'LBL_MEMBERSHIP',
          ),
        ),
        5 =>
        array (
          0 =>
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
      'LBL_PANEL_COMPANY' =>
      array (
        0 =>
        array (
          0 =>
          array (
            'name' => 'c_contacts_contacts_1_name',
            'label' => 'LBL_CONTACT_PARENT_NAME',
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
          0 =>
          array (
            'name' => 'do_not_call',
            'comment' => 'An indicator of whether contact can be called',
            'label' => 'LBL_DO_NOT_CALL',
          ),
        ),
        3 =>
        array (
          0 =>
          array (
            'name' => 'relationship',
            'studio' => 'visible',
            'label' => 'LBL_RELATIONSHIP',
            'customCode' => '{$RELATIONSHIP}',
          ),
          1 =>
          array (
            'name' => 'phone_other',
            'comment' => 'Other phone number for the contact',
            'label' => 'LBL_OTHER_PHONE',
          ),
        ),
        4 =>
        array (
          0 =>
          array (
            'name' => 'describe_relationship',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIBE_RELATIONSHIP',
          ),
          1 =>
          array (
            'name' => 'primary_address_street',
            'label' => 'LBL_PRIMARY_ADDRESS',
            'type' => 'address',
            'displayParams' =>
            array (
              'key' => 'primary',
            ),
          ),
        ),
        5 =>
        array (
          0 =>
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL_ADDRESS',
          ),
          1 =>
          array (
            'name' => 'alt_address_street',
            'label' => 'LBL_ALTERNATE_ADDRESS',
            'type' => 'address',
            'displayParams' =>
            array (
              'key' => 'alt',
            ),
          ),
        ),
        6 =>
        array (
          0 =>
          array (
            'name' => 'account_name',
          ),
          1 =>
          array (
            'name' => 'phone_work',
            'label' => 'LBL_OFFICE_PHONE',
          ),
        ),
      ),
      'lbl_portal_information' =>
      array (
        0 =>
        array (
          0 =>
          array (
            'name' => 'portal_name',
            'label' => 'LBL_PORTAL_NAME',
            'hideIf' => 'empty($PORTAL_ENABLED)',
            'customCode' => '<a href="index.php?module=Users&return_module=Users&action=DetailView&record={$fields.user_id.value}">{$fields.portal_name.value}</a>',
          ),
          1 =>
          array (
            'name' => 'portal_active',
            'label' => 'LBL_PORTAL_ACTIVE',
            'hideIf' => 'empty($PORTAL_ENABLED)',
          ),
        ),
        1 =>
        array (
          0 =>
          array (
            'name' => 'password_generated',
            'label' => 'LBL_PASS_GENERATED',
          ),
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
            'label' => 'LBL_PREFERRED_KIND_OF_COURSE_NUMERIC',
            'customCode' => '{$fields.preferred_kind_of_course.value}',
          ),
        ),
      ),
      'LBL_PANEL_ASSIGNMENT' =>
      array (
        0 =>
        array (
          0 =>
          array (
            'name' => 'lead_source',
            'comment' => 'How did the contact come about',
            'label' => 'LBL_LEAD_SOURCE',
          ),
          1 =>
          array (
            'name' => 'contact_status',
            'customCode' => '{$COLOR}',
          ),
        ),
        1 =>
        array (
          0 => 'lead_source_description',
          1 =>
          array (
            'name' => 'campaign_name',
            'label' => 'LBL_CAMPAIGN',
          ),
        ),
        2 =>
        array (
          0 =>
          array (
            'name' => 'assigned_user_name',
            'customLabel' => '
                        {if $team_type == "Junior"}
                        {$MOD.LBL_FIRST_EC}
                        {else}
                        {$MOD.LBL_FIRST_SM}
                        {/if}: ',
          ),
          1 =>
          array (
            'name' => 'date_modified',
            'label' => 'LBL_DATE_MODIFIED',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
          ),
        ),
        3 =>
        array (
          0 => 'team_name',
          1 =>
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
          ),
        ),
      ),
    ),
  ),
);
