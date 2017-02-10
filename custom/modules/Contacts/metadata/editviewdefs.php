<?php
$viewdefs['Contacts'] =
array (
    'EditView' =>
    array (
        'templateMeta' =>
        array (
            'form' =>
            array (
                'hidden' =>
                array (
                    0 => '<input type="hidden" name="opportunity_id" value="{$smarty.request.opportunity_id}">',
                    1 => '<input type="hidden" name="lead_id" value="{$lead_id}">',
                    2 => '<input type="hidden" name="case_id" value="{$smarty.request.case_id}">',
                    3 => '<input type="hidden" name="bug_id" value="{$smarty.request.bug_id}">',
                    4 => '<input type="hidden" name="email_id" value="{$smarty.request.email_id}">',
                    5 => '<input type="hidden" name="inbound_email_id" value="{$smarty.request.inbound_email_id}">',
                    6 => '<input type="hidden" name="assigned_user_id_2" value="{$assigned_user_id_2}">',
                    7 => '<input type="hidden" id="contact_id" name value="{$fields.contact_id.value}">',
                    8 => '<input type="hidden" id="team_type" name value="{$team_type}">',
                ),
            ),
            'maxColumns' => '2',
            'javascript' => '
            {sugar_getscript file="custom/include/javascripts/Select2/select2.min.js"}
            {sugar_getscript file="custom/modules/Contacts/js/custom.edit.view.js"}
            {sugar_getscript file="custom/include/javascripts/Multifield/jquery.multifield.js"}
            {sugar_getscript file="custom/modules/Contacts/js/pGenerator.jquery.js"}
            {sugar_getscript file="custom/include/javascripts/AutoComplete/src/js/textext.core.js"}
            {sugar_getscript file="custom/include/javascripts/AutoComplete/src/js/textext.plugin.autocomplete.js"}

            <link rel="stylesheet" href="{sugar_getjspath file=custom/include/javascripts/Select2/select2.css}"/>
            <link rel="stylesheet" href="{sugar_getjspath file=custom/include/javascripts/AutoComplete/src/css/textext.core.css}"/>
            <link rel="stylesheet" href="{sugar_getjspath file=custom/include/javascripts/AutoComplete/src/css/textext.plugin.autocomplete.css}"/>
            ',
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
                'LBL_EDITVIEW_PANEL1' =>
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
                'LBL_PORTAL_INFORMATION' =>
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
            'syncDetailEditViews' => false,
        ),
        'panels' =>
        array (
            'lbl_contact_information' =>
            array (
                0 =>
                array (
                    0 =>
                    array (
                        'name' => 'name',
                        'customLabel' => '{$MOD.LBL_NAME} <span class="required">*</span>',
                        'customCode' => '
                        <input name="last_name" id="last_name" placeholder="{$MOD.LBL_LAST_NAME|replace:\':\':\'\'}" style="width:120px !important" size="15" type="text"  value="{$fields.last_name.value}">
                        &nbsp;<input name="first_name" id="first_name" placeholder="{$MOD.LBL_FIRST_NAME|replace:\':\':\'\'}" style="width:120px !important" size="15" type="text" value="{$fields.first_name.value}"> </br>
                        <span style=" color: #A99A9A; font-style: italic;"> Bùi Vũ Thanh An  </br> Last Name: Bùi Vũ Thanh </br> First Name:  An </span>',
                    ),
                    1 => 'picture',
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
                        'name' => 'j_school_contacts_1_name',
                        'displayParams' =>
                        array (
                            'required' => true,
                        ),
                    ),
                ),
                3 =>
                array (
                    0 => 'description',
                ),
            ),
            'LBL_PANEL_COMPANY' =>
            array (
                0 =>
                array (
                    0 =>
                    array (
                        'name' => 'guardian_name',
                        'label' => 'LBL_PARENT',
                        'displayParams' =>
                        array (
                            'required' => true,
                        ),
                        'customCode' => '
                        <input id = "guardian_name_autocomplete" style="width: 274px;" name = "guardian_name" class = "guardian_name" value ="{$field.c_contacts_contacts_1_name.value}" type="text">
                        <input id = "c_contacts_contacts_1c_contacts_ida" name = "c_contacts_contacts_1c_contacts_ida" class = "c_contacts_contacts_1c_contacts_ida" value ="{$field.c_contacts_contacts_1c_contacts_ida.value}" type="hidden">
                        <input id = "c_contacts_contacts_1_name" name = "c_contacts_contacts_1_name" class = "c_contacts_contacts_1_name" value ="{$field.c_contacts_contacts_1_name.value}" type="hidden">
                        ',
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
                    0=>array (
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
                        'customCode' => '{include file ="custom/modules/Contacts/tpls/addRelationship.tpl"}',
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
                        'customCode' => '<textarea rows="2" cols="30" name="alt_address_street" >{$fields.alt_address_street.value}</textarea>',
                    ),
                ),
                6 =>
                array (
                    0 =>
                    array (
                        'name' => 'account_name',
                        'displayParams' =>
                        array (
                            'field_to_name_array' =>
                            array (
                                'id' => 'account_id',
                                'name' => 'account_name',
                                'phone_office' => 'phone_work',
                            ),
                            'required' => false,
                        ),
                    ),
                    1 =>
                    array (
                        'name' => 'phone_work',
                        'comment' => 'Work phone number of the contact',
                        'label' => 'LBL_OFFICE_PHONE',
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
                        'customCode' => '{$html_koc}',
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
                        'customCode' => '<table border="0" cellspacing="0" cellpadding="0"><tr><td>
                        {if !empty($fields.portal_name.value)}
                        <input class="input_readonly" id="portal_name" name="portal_name" type="text" size="30" maxlength="{$fields.portal_name.len|default:\'30\'}" value="{$fields.portal_name.value}" autocomplete="off">
                        {else}
                        <input class="input_readonly" id="portal_name" name="portal_name" type="text" size="30" maxlength="{$fields.portal_name.len|default:\'30\'}" value="Auto-Generate" autocomplete="off">
                        {/if}
                        <input type="hidden" id="portal_name_existing" value="{$fields.portal_name.value}" autocomplete="off">
                        </td><tr><tr><td><input type="hidden" id="portal_name_verified" value="true"></td></tr></table>',
                    ),
                    1 => 'portal_active',
                ),
                1 =>
                array (
//                    0 =>
//                    array (
//                        'name' => 'password_generated',
//                        'customCode' => '<input type="hidden" id="password_generated" name="password_generated" value="{$fields.password_generated.value}" ><label id="password_generated_label1" style="margin-left:20px; margin-top:6px;">{$fields.password_generated.value}</label>',
//                        'label' => 'LBL_PASS',
//                    ),
                    1 =>
                    array (
                        //'name' => 'portal_password1',
                        //'type' => 'password',
                        'customCode' => '<input id="portal_password" name="portal_password" type="hidden" size="32" maxlength="{$fields.portal_password.len|default:\'32\'}" value="{$fields.portal_password.value}" autocomplete="off"><a href="#" class="left" id="myLink" style="margin-left:20px; margin-top:6px; display:none;">Generate a password</a>',
                        //'label' => 'LBL_PORTAL_PASSWORD',
                    ),
                ),
                /*2 =>
                array (
                    0 =>
                    array (
                        'name' => 'portal_password',
                        'customCode' => '<input id="portal_password" name="portal_password" type="hidden" size="32" maxlength="{$fields.portal_password.len|default:\'32\'}" value="{$fields.portal_password.value}" autocomplete="off"><input name="old_portal_password" type="hidden" value="{$fields.portal_password.value}" autocomplete="off">',
                        'label' => 'LBL_CONFIRM_PORTAL_PASSWORD',
                    ),
                ),*/
            ),
            'LBL_PANEL_ASSIGNMENT' =>
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
                        'name' => 'contact_status',
                        'customCode' => '{$STATUS}',
                    ),
                ),
                1 =>
                array (
                    0 => 'lead_source_description',
                    1 => 'campaign_name',
                ),
                2 =>
                array (
                    0 =>
                    array (
                        'name' => 'assigned_user_name',
                        'customLabel'  => '
                        {if $team_type == "Junior"}
                        {$MOD.LBL_FIRST_EC}
                        {else}
                        {$MOD.LBL_FIRST_SM}
                        {/if}:',
                        'displayParams' =>
                        array (
                            'required' => true,
                        ),
                    ),
                    1 => 'team_name',
                ),
            ),
        ),
    ),
);
