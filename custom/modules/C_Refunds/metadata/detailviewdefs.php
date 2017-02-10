<?php
$module_name = 'C_Refunds';
$_object_name = 'c_refunds';
$viewdefs[$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DELETE',
 //         2 => 'DUPLICATE',
          3 => 
          array (
            'customCode' => '<input class="button" type="submit" value="{$MOD.LBL_EXPORT_TO_EXCEL}" name="export2excel" onclick="javascript:location.href=\'index.php?module=C_Refunds&action=sugarexcel&record={$fields.id.value}\'" title="{$MOD.LBL_EXPORT_TO_EXCEL}"></input>',
          ),
        ),
        'hideAudit' => true,
      ),
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
          'file' => 'custom/modules/C_Refunds/js/detailview.js',
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
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'document_name',
            'label' => 'LBL_DOC_NAME',
            'customCode' => '<span class="textbg_blue">{$fields.document_name.value}</span>',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'refund_type',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'contacts_c_refunds_1_name',
            'label' => 'LBL_CONTACTS_C_REFUNDS_1_FROM_CONTACTS_TITLE',
          ),
          1 => 
          array (
            'name' => 'student_name',
            'customCode' => '
                                <a href="index.php?module=Contacts&action=DetailView&record={$fields.student_id.value}">
                                    <span id="student_name" class="sugar_field" data-id-value="">{$fields.student_name.value}</span>
                                </a>
                                <a href="index.php?module=Teams&action=DetailView&record={$fields.center_id.value}">
                                    <span id="center_name" class="sugar_field" data-id-value="">{$fields.center_name.value}</span>
                                </a>
                            ',
          ),
        ),
//        3 => 
//        array (
//          0 => 
//          array (
//            'name' => 'opportunities_c_refunds_1_name',
//            'label' => 'LBL_OPPORTUNITIES_C_REFUNDS_1_FROM_OPPORTUNITIES_TITLE',
//          ),
//          1 => '',
//        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'refund_amount',
            'label' => 'LBL_REFUND_AMOUNT',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'refund_date',
            'label' => 'LBL_REFUND_DATE',
          ),
          1 => 
          array (
            'name' => 'amount_in_words',
            'label' => 'LBL_AMOUNT_IN_WORDS',
          ),
        ),
       5 => 
        array (
          0 => 
          array (
            'name' => 'refond_method',
            'studio' => 'visible',
            'label' => 'LBL_REFOND_METHOD',
            'customCode' => '
                            {if $fields.refond_method.value == "Cash"}
                            <label>
                            <div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; padding: 5px;">
                            <img src="custom/themes/default/images/cash-icon.png">&nbsp;<b>Cash</b>
                            </div>
                            </label>
                            {elseif $fields.refond_method.value == "CreditDebitCard"}
                            <label>
                            <div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; padding: 5px;">
                            <img src="custom/themes/default/images/visa-icon.png">&nbsp;<b>Card</b>
                            </div>
                            </label>
                            {elseif $fields.refond_method.value == "BankTranfer"}
                            <label>
                            <div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; padding: 5px;">
                            <img src="custom/themes/default/images/bank-icon.png">&nbsp;<b>Bank Transfer</b>
                            </div>
                            </label>
                            {elseif $fields.refond_method.value == "Loan"}
                            <label>
                            <div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; padding: 5px;">
                            <img src="custom/themes/default/images/loan-icon.png">&nbsp;<b>Loan</b>
                            </div>
                            </label>
                            {elseif $fields.refond_method.value == "Other"}
                            <label>
                            <div style="width: 100px; display: inline; margin-right: 10px; margin-left: 5px; position: relative; padding: 5px;">
                            <img src="custom/themes/default/images/other-icon.png">&nbsp;<b>Other</b>
                            </div>
                            </label>
                            {else}
                            <span><b>{$fields.refond_method.value}<b></span>
                            {/if}',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DOC_DESCRIPTION',
          ),
          1 => 
          array (
            'name' => 'uploadfile',
            'displayParams' => 
            array (
              'link' => 'uploadfile',
              'id' => 'id',
            ),
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
          1 => 'team_name',
        ),
      ),
    ),
  ),
);
