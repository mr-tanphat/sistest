<?php
$module_name = 'J_Coursefee';
$viewdefs[$module_name] = 
array (
    'EditView' =>                  
    array (
        'templateMeta' => 
        array (
            'maxColumns' => '2',
            'javascript' => '        
                {sugar_getscript file="custom/modules/J_Coursefee/js/editview.js"}',
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
                'LBL_EDITVIEW_PANEL1' => 
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
                'LBL_EDITVIEW_PANEL3' => 
                array (
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
            ),
            'syncDetailEditViews' => true,
        ),
        'panels' => 
        array (
            'lbl_editview_panel1' => 
            array (
                0 => 
                array (
                    0 => 
                    array (
                        'name' => 'type_of_course_fee',
                        'studio' => 'visible',
                        'label' => 'LBL_TYPE_OF_COURSE_FEE',
                        'customCode' => '{html_options name="type" id="type" options=$fields.type.options selected=$fields.type.value}
                        {html_options name="type_of_course_fee" id="type_of_course_fee" style="width: 100px;margin-left:10px;" options=$fields.type_of_course_fee.options selected=$fields.type_of_course_fee.value}'
                    ),
                    1 => 
                    array (
                        'name' => 'status',
                        'studio' => 'visible',
                        'label' => 'LBL_STATUS',
                    ),
                ),
                1 => 
                array (
                    0 => 
                    array (
                        'name' => 'name',
                        'label' => 'LBL_NAME',
                    ),
                    1 => 
                    array (
                        'name' => 'apply_date',
                        'label' => 'LBL_APPLY_DATE',
                    ),
                ),
                2 => 
                array (
                    0 => 
                    array (
                        'name' => 'unit_price',
                        'studio' => 'visible',
                        'label' => 'LBL_UNIT_PRICE',
                        'customCode' => '<input type="text" class="currency" value="{sugar_number_format var=$fields.unit_price.value}" name="unit_price" title="{$MOD.LBL_UNIT_PRICE}" id="unit_price" size="20" style="font-weight: bold; color: rgb(165, 42, 42);">&nbsp;<b>VND </b>
                        {literal}<script type="text/javascript">
                        $(document).ready(function(){
                        $("#type_of_course_fee").live("change",function(){
                        $("#name").val("("+$("#type_of_course_fee :selected").text()+")");
                        });
                        });
                        </script>
                        {/literal}
                        ',
                    ),
                    1 => 
                    array (
                        'name' => 'inactive_date',
                        'label' => 'LBL_INACTIVE_DATE',
                    ),
                ),
                3 => 
                array (
                    0 => 
                    array (
                        'name' => 'extend_vat',
                    ),
                    1 => 
                    array (
                        'hideLabel' => true,
                    ),
                ),
                4 => 
                array (
                    0 => 
                    array (
                        'name' => 'number_of_practice',
                        'customCode'=>'<input type="text" class="currency" value="{sugar_number_format var=$fields.number_of_practice.value}" name="number_of_practice" title="{$MOD.LBL_NUMBER_OF_PRACTICE}" id="number_of_practice" size="5" style="font-weight: bold; color: rgb(165, 42, 42);">'
                    ),
                    1 => 
                    array (
                        'hideLabel' => true,
                    ),
                ),
                5 => 
                array (
                    0 => 
                    array (
                        'name' => 'number_of_skill',
                        'customCode'=>'<input type="text" class="currency" value="{sugar_number_format var=$fields.number_of_skill.value}" name="number_of_skill" title="{$MOD.LBL_NUMBER_OF_SKILL}" id="number_of_skill" size="5" style="font-weight: bold; color: rgb(165, 42, 42);"> '
                    ),
                    1 => 
                    array (
                        'hideLabel' => true,
                    ),
                ),
                6 => 
                array (
                    0 => 
                    array (
                        'name' => 'number_of_connect',
                        'customCode'=>'<input type="text" class="currency" value="{sugar_number_format var=$fields.number_of_connect.value}" name="number_of_connect" title="{$MOD.LBL_NUMBER_OF_CONNECT}" id="number_of_connect" size="5" style="font-weight: bold; color: rgb(165, 42, 42);"> Zero is infinited'
                    ),
                    1 => 
                    array (
                        'hideLabel' => true,
                    ),
                ),
            ),
            'lbl_editview_panel3' => 
            array (
                0 => 
                array (
                    0 => 'description',
                ),
                1 => 
                array (
                    0 => 
                    array (
                        'name' => 'team_name',
                        'displayParams' => 
                        array (
                            'display' => true,
                        ),
                    ),
                    1 => array(
                        'hideLabel' => true,
                    )
                ),
            ),
        ),
    ),
);
