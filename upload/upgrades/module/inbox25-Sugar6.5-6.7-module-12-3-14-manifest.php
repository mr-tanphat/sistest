<?PHP

// manifest file for information regarding application of new code
$manifest = array(
    // only install on the following regex sugar versions (if empty, no check)

	'acceptable_sugar_flavors' => array (
	),

	'acceptable_sugar_versions' => array (
		'regex_matches' => array (
			0 => "6\.*\.*",
		),
	),


	'is_uninstallable' => true,

    // name of new code
	'name' 				=> 'INBOX25',

    // description of new code
	'description' 		=> 'INBOX25 for SugarCRM 6.5.x or 6.7.x',

    // author of new code
	'author' 			=> 'INBOX25',

    // date published
	'published_date'	=> '2014-12-03',

    // version of code
	'version' 			=> 'v4.5.2',

    // type of code (valid choices are: full, langpack, module, patch, theme )
	'type' 				=> 'module',

    // icon for displaying in UI (path to graphic contained within zip package)
	'icon' 				=> ''
);


$installdefs = array(

	'id'=> 'Iframeapp',

    'copy'=> array(
		array(
			'from' => '<basepath>/addon/modules/Iframeapp',
			'to'   => 'modules/Iframeapp',
		),
		array(
			'from' => '<basepath>/addon/modules/Connectors',
			'to'   => 'modules/Connectors',
		),
		
		array(
			'from' => '<basepath>/addon/modules/language/en_us.inbox25_score.php',
			'to'   => 'custom/Extension/modules/Accounts/Ext/Language/en_us.inbox25_score.php',
		),
		array(
			'from' => '<basepath>/addon/modules/language/en_us.inbox25_score.php',
			'to'   => 'custom/Extension/modules/Leads/Ext/Language/en_us.inbox25_score.php',
		),
		array(
			'from' => '<basepath>/addon/modules/language/en_us.inbox25_score.php',
			'to'   => 'custom/Extension/modules/Prospects/Ext/Language/en_us.inbox25_score.php',
		),
		array(
			'from' => '<basepath>/addon/modules/language/en_us.inbox25_score.php',
			'to'   => 'custom/Extension/modules/Contacts/Ext/Language/en_us.inbox25_score.php',
		),

	),
	   'custom_fields' => array (
            //Text
            array(
                'name' => 'inbox25_score_c',
                'label' => 'LBL_SCORE',
                'type' => 'integer',
                'module' => 'Leads',
                'help' => 'INBOX25 Score Field',
                'comment' => 'INBOX25 Score Field',
                'default_value' => '0',
                'required' => false, // true or false
                'reportable' => true, // true or false
                'audited' => false, // true or false
                'importable' => 'true', // 'true', 'false', 'required'
                'duplicate_merge' => false, // true or false
            ),
			 array(
                'name' => 'inbox25_score_c',
                'label' => 'LBL_SCORE',
                'type' => 'integer',
                'module' => 'Accounts',
                'help' => 'INBOX25 Score Field',
                'comment' => 'INBOX25 Score Field',
                'default_value' => '0',
                'required' => false, // true or false
                'reportable' => true, // true or false
                'audited' => false, // true or false
                'importable' => 'true', // 'true', 'false', 'required'
                'duplicate_merge' => false, // true or false
            ),
			 array(
                'name' => 'inbox25_score_c',
                'label' => 'LBL_SCORE',
                'type' => 'integer',
                'module' => 'Contacts',
                'help' => 'INBOX25 Score Field',
                'comment' => 'INBOX25 Score Field',
                'default_value' => '0',
                'required' => false, // true or false
                'reportable' => true, // true or false
                'audited' => false, // true or false
                'importable' => 'true', // 'true', 'false', 'required'
                'duplicate_merge' => false, // true or false
            ),
			 array(
                'name' => 'inbox25_score_c',
                'label' => 'LBL_SCORE',
                'type' => 'integer',
                'module' => 'Prospects',
                'help' => 'INBOX25 Score Field',
                'comment' => 'INBOX25 Score Field',
                'default_value' => '0',
                'required' => false, // true or false
                'reportable' => true, // true or false
                'audited' => false, // true or false
                'importable' => 'true', // 'true', 'false', 'required'
                'duplicate_merge' => false, // true or false
             ),
			),
	'logic_hooks'	=> array(
			array(
				'module'		=> 'Contacts',
				'hook'		 	=> 'after_save',
				'order'			=> 101,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Contacts Save'
			),
			array(
				'module'		=> 'Contacts',
				'hook'		 	=> 'after_delete',
				'order'			=> 102,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Contacts Delete'
			),			
			array(
				'module'		=> 'Contacts',
				'hook'		 	=> 'after_ui_frame',
				'order'			=> 101,
				'file'			=> 'modules/Connectors/connectors/sources/ext/rest/inbox25/InboxViewLogicHook.php',
				'class'			=> 'InboxViewLogicHook',
				'function'		=> 'showFrame',
				'description'	=> 'Contacts Save Iframe'
			),			
			array(
				'module'		=> 'Leads',
				'hook'		 	=> 'after_save',
				'order'			=> 101,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Leads Save'
			),
			array(
				'module'		=> 'Leads',
				'hook'		 	=> 'after_delete',
				'order'			=> 102,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Leads Delete'
			),			
			array(
				'module'		=> 'Leads',
				'hook'		 	=> 'after_ui_frame',
				'order'			=> 101,
				'file'			=> 'modules/Connectors/connectors/sources/ext/rest/inbox25/InboxViewLogicHook.php',
				'class'			=> 'InboxViewLogicHook',
				'function'		=> 'showFrame',
				'description'	=> 'Leads Save Iframe'
			),
			array(
				'module'		=> 'Accounts',
				'hook'		 	=> 'after_save',
				'order'			=> 101,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Accounts Save'
			),
			array(
				'module'		=> 'Accounts',
				'hook'		 	=> 'after_delete',
				'order'			=> 102,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Accounts Delete'
			),			
			array(
				'module'		=> 'Accounts',
				'hook'		 	=> 'after_ui_frame',
				'order'			=> 101,
				'file'			=> 'modules/Connectors/connectors/sources/ext/rest/inbox25/InboxViewLogicHook.php',
				'class'			=> 'InboxViewLogicHook',
				'function'		=> 'showFrame',
				'description'	=> 'Accounts Save Iframe'
			),	
			array(
				'module'		=> 'Opportunities',
				'hook'		 	=> 'after_save',
				'order'			=> 101,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Opportunities Save'
			),
			array(
				'module'		=> 'Opportunities',
				'hook'		 	=> 'after_delete',
				'order'			=> 102,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Opportunities Delete'
			),
			array(
				'module'		=> 'Opportunities',
				'hook'		 	=> 'after_ui_frame',
				'order'			=> 101,
				'file'			=> 'modules/Connectors/connectors/sources/ext/rest/inbox25/InboxViewLogicHook.php',
				'class'			=> 'InboxViewLogicHook',
				'function'		=> 'showFrame',
				'description'	=> 'Opportunities Save Iframe'
			),			
			array(
				'module'		=> 'Tasks',
				'hook'		 	=> 'after_save',
				'order'			=> 101,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Tasks Save'
			),
			array(
				'module'		=> 'Tasks',
				'hook'		 	=> 'after_delete',
				'order'			=> 102,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Tasks Delete'
			),
			array(
				'module'		=> 'Meetings',
				'hook'		 	=> 'after_save',
				'order'			=> 101,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Meetings Save'
			),
			array(
				'module'		=> 'Meetings',
				'hook'		 	=> 'after_delete',
				'order'			=> 102,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Meetings Delete'
			),
			array(
				'module'		=> 'Calls',
				'hook'		 	=> 'after_save',
				'order'			=> 101,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Calls Save'
			),
			array(
				'module'		=> 'Calls',
				'hook'		 	=> 'after_delete',
				'order'			=> 102,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Calls Delete'
			),
			array(
				'module'		=> 'Cases',
				'hook'		 	=> 'after_save',
				'order'			=> 101,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Cases Save'
			),
			array(
				'module'		=> 'Cases',
				'hook'		 	=> 'after_delete',
				'order'			=> 102,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Cases Delete'
			),
			array(
				'module'		=> 'Contracts',
				'hook'		 	=> 'after_save',
				'order'			=> 101,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Contracts Save'
			),
			array(
				'module'		=> 'Contracts',
				'hook'		 	=> 'after_delete',
				'order'			=> 102,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Contracts Delete'
			),
			array(
				'module'		=> 'Quotes',
				'hook'		 	=> 'after_save',
				'order'			=> 101,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Quotes Save'
			),
			array(
				'module'		=> 'Quotes',
				'hook'		 	=> 'after_delete',
				'order'			=> 102,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Quotes Delete'
			),
			array(
				'module'		=> 'Users',
				'hook'		 	=> 'after_save',
				'order'			=> 101,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Users Save'
			),			
			array(
				'module'		=> 'Prospects',
				'hook'		 	=> 'after_save',
				'order'			=> 101,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Prospects Save'
			),			
			array(
				'module'		=> 'Prospects',
				'hook'		 	=> 'after_delete',
				'order'			=> 102,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'Prospects Delete'
			),
			array(
				'module'		=> 'Prospects',
				'hook'		 	=> 'after_ui_frame',
				'order'			=> 101,
				'file'			=> 'modules/Connectors/connectors/sources/ext/rest/inbox25/InboxViewLogicHook.php',
				'class'			=> 'InboxViewLogicHook',
				'function'		=> 'showFrame',
				'description'	=> 'Prospects Save Iframe'
			),			
			array(
				'module'		=> 'ProspectLists',
				'hook'		 	=> 'after_save',
				'order'			=> 101,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'ProspectLists Save'
			),
			array(
				'module'		=> 'ProspectLists',
				'hook'		 	=> 'after_delete',
				'order'			=> 102,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'ProspectLists Delete'
			),
			array(
				'module'		=> 'ProspectLists',
				'hook'		 	=> 'after_relationship_add',
				'order'			=> 106,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'ProspectLists Save Rel'
			),
			array(
				'module'		=> 'ProspectLists',
				'hook'		 	=> 'after_relationship_delete',
				'order'			=> 107,
				'file'			=> 'modules/Iframeapp/DispatchData.php',
				'class'			=> 'DispatchData',
				'function'		=> 'ProcessMod',
				'description'	=> 'ProspectLists Delete Rel'
			),

			
			
	),	
	'beans'=> array(
		array (
		  'module' => 'Iframeapp',
		  'class' => 'Iframeapp',
		  'path' => 'modules/Iframeapp/Iframeapp.php',
		  'tab' => true,
		)		
	),	
	'language'=> array(
		array('from'=> '<basepath>/language/application/iframeapp-en_us.lang.php',
			  'to_module'=> 'application',
			  'language'=>'en_us'
		)		
	)
);
?>
