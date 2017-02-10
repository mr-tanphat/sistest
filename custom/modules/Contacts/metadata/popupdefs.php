<?php
$popupMeta = array (
    'moduleMain' => 'Contact',
    'varName' => 'CONTACT',
    'orderBy' => 'contacts.first_name, contacts.last_name',
    'whereClauses' => array (
        'contact_id' => 'contacts.contact_id',
        'phone_mobile' => 'contacts.phone_mobile',
        'lead_source' => 'contacts.lead_source',
        'birthdate' => 'contacts.birthdate',
        'team_name' => 'contacts.team_name',
        'assistant' => 'contacts.assistant',
    ),
    'searchInputs' => array (
        4 => 'contact_id',
        6 => 'phone_mobile',
        7 => 'lead_source',
        11 => 'birthdate',
        13 => 'team_name',
        14 => 'assistant',
    ),
    'searchdefs' => array (
        'contact_id' =>
        array (
            'type' => 'varchar',
            'label' => 'LBL_CONTACT_ID',
            'width' => '10%',
            'name' => 'contact_id',
        ),
        'assistant' =>
        array (
            'type' => 'varchar',
            'label' => 'LBL_FULL_NAME',
            'width' => '10%',
            'name' => 'assistant',
        ),
        'phone_mobile' =>
        array (
            'type' => 'phone',
            'label' => 'LBL_MOBILE_PHONE',
            'width' => '10%',
            'name' => 'phone_mobile',
        ),
        'lead_source' =>
        array (
            'name' => 'lead_source',
            'width' => '10%',
        ),
        'birthdate' =>
        array (
            'type' => 'date',
            'label' => 'LBL_BIRTHDATE',
            'width' => '10%',
            'name' => 'birthdate',
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
            'name' => 'team_name',
        ),
    ),
    'listviewdefs' => array (
        'CONTACT_ID' =>
        array (
            'type' => 'varchar',
            'label' => 'LBL_CONTACT_ID',
            'width' => '10%',
            'default' => true,
            'name' => 'contact_id',
        ),
        'NAME' =>
        array (
            'width' => '10%',
            'label' => 'LBL_LIST_NAME',
            'link' => true,
            'default' => true,
            'related_fields' =>
            array (
                0 => 'last_name',
                1 => 'first_name',
            ),
            'name' => 'name',
        ),
        'NICK_NAME' =>
        array (
            'type' => 'varchar',
            'label' => 'LBL_NICK_NAME',
            'width' => '10%',
            'default' => true,
            'name' => 'nick_name',
        ),
        'BIRTHDATE' =>
        array (
            'type' => 'date',
            'label' => 'LBL_BIRTHDATE',
            'width' => '10%',
            'default' => true,
            'name' => 'birthdate',
        ),
        'PHONE_MOBILE' =>
        array (
            'type' => 'phone',
            'label' => 'LBL_MOBILE_PHONE',
            'width' => '10%',
            'default' => true,
            'name' => 'phone_mobile',
        ),
        'EMAIL1' =>
        array (
            'type' => 'varchar',
            'studio' =>
            array (
                'editview' => true,
                'editField' => true,
                'searchview' => false,
                'popupsearch' => false,
            ),
            'label' => 'LBL_EMAIL_ADDRESS',
            'width' => '10%',
            'default' => true,
            'name' => 'email1',
        ),
        'ACCOUNT_NAME' =>
        array (
            'width' => '10%',
            'module' => 'Accounts',
            'id' => 'ACCOUNT_ID',
            'ACLTag' => 'ACCOUNT',
            'related_fields' =>
            array (
                0 => 'account_id',
            ),
            'name' => 'account_name',
            'usage'=>'query_only',
        ),
        'ACCOUNT_ID' =>
        array (
            'name' => 'account_id',
            'usage'=>'query_only',

        ),
        'ASSIGNED_USER_NAME' =>
        array (
            'link' => true,
            'type' => 'relate',
            'label' => 'LBL_ASSIGNED_TO_NAME',
            'id' => 'ASSIGNED_USER_ID',
            'width' => '10%',
            'default' => true,
            'name' => 'assigned_user_name',
        ),
    ),
);
