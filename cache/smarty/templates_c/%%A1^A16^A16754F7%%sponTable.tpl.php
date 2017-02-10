<?php /* Smarty version 2.6.11, created on 2017-02-07 13:26:44
         compiled from custom/modules/J_Payment/tpl/sponTable.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getscript', 'custom/modules/J_Payment/tpl/sponTable.tpl', 1, false),)), $this); ?>
<?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/Multifield/jquery.multifield.min.js"), $this);?>

<div id="dialog_sponsor" title="Add Sponsor" style="display:none;">
    <table id="table_sponsor" width="100%" class="list view">
        <thead>
            <tr><td colspan="5" style="float: right;"><button class="button" type="button" id="btnAddSponsor">Add Sponsor</button></td></tr>
            <tr>
                <th width="20%" style="text-align:center">Sponsor Code</th>
                <th width="20%" style="text-align:center">Sponsor Type</th>
                <th width="20%" style="text-align:center">Sponsor Amount</th>
                <th width="20%" style="text-align:center">Sponsor %</th>
                <th width="20%" style="text-align:center"></th>
                </tr>
                </thead>
<tbody id="tbodysponsor" style="height: 350px; width:100%; overflow:auto;">
        <?php echo $this->_tpl_vars['html_tpl_spon']; ?>

        <?php echo $this->_tpl_vars['html_spon']; ?>

        </tbody>
    </table><br>
    <table width="100%">
        <tr>
            <td width="45%" align="right">Amount Before Discount (1):</td>
            <td width="10%" align="right" class="sponsor_amount_bef_discount"></td>
            <td width="35%" align="left" scope="col" id="sponsor_ratio"></td>
        </tr>

        <tr>
            <td width="45%" align="right">Sponsor Amount (2):</td>
            <td width="10%" align="right" class="total_sponsor_amount"></td>
            <td width="35%" align="left"></td>
        </tr>

        <tr>
            <td width="45%" align="right">Sponsor % (3):</td>
            <td width="10%" align="right" class="total_sponsor_percent"></td>
            <input type="hidden" class="total_sponsor_percent_to_amount" value="">
            <td width="35%" align="left"></td>
        </tr>

        <tr>
            <td width="45%" align="right">Total Sponsor (4) =  (2) + (1 - 2)x(3):</td>
            <td width="10%" align="right" class="final_sponsor"></td>
            <input type="hidden" class="final_sponsor_percent" value="">
        </tr>
    </table>
</div>
<!--ADD SOME CSS -->
<?php echo '
<style type="text/css" id="jstree-stylesheet">
.multiselect-search{
    text-transform: uppercase;
}
::-webkit-input-placeholder { /* WebKit browsers */
    text-transform: none;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    text-transform: none;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */
    text-transform: none;
}
:-ms-input-placeholder { /* Internet Explorer 10+ */
    text-transform: none;
}
</style>
'; ?>