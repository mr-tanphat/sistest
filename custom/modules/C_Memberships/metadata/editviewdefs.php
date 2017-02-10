<?php
    $module_name = 'C_Memberships';
    $viewdefs[$module_name] = 
    array (
        'EditView' => 
        array (
            'templateMeta' => 
            array (
                'form' => 
                array (
                    'hidden' => 
                    array (
                        0 => '<input type="hidden" name="no_image" id="no_image" value="{$no_image}">',
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
            ),
            'panels' => 
            array (
                'default' => 
                array (
                    1 => 
                    array (
                        0 => array (
                            'customCode' => '{include file="custom/modules/C_Memberships/tpls/take_photo.tpl"}',
                            'hideLabel' => true,
                        ),
                    ),
                    2 => 
                    array (
                        0 => array (
                            'customCode' => '<div class="action_buttons"><button class="bbtn-all bbtn btn-limekiln-3" type="button" id="btn_take_photo" style="margin:10px;" >
                            <span class="bbtn-img-right bbtn-custom-txt"><img src="custom/themes/default/images/eye-3-32.png"></span>
                            <span class="bbtn-txt-center bbtn-custom-txt">Take Photo</span>
                            </button><button class="bbtn-all bbtn btn-sonic-threshold-5" type="button" id="btn_delete_photo" style="margin:10px;">
                            <span class="bbtn-img-right bbtn-custom-txt"><img src="custom/themes/default/images/trash-2-32.png"></span>
                            <span class="bbtn-txt-center bbtn-custom-txt">Delete Photo</span>
                            </button></div>',
                            'hideLabel' => true,
                        ),
                    ),
                    5 => 
                    array (
                        0 => '',
                    ),
                ),
                'LBL_PANEL_ASSIGNMENT' => 
                array (
                    1 =>
                    array (
                        0 => 'team_name'
                    ),
                ),
            ),
        ),
    );
