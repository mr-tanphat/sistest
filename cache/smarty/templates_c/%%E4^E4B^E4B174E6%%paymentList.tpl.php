<?php /* Smarty version 2.6.11, created on 2017-02-07 13:26:44
         compiled from custom/modules/J_Payment/tpl/paymentList.tpl */ ?>
<div id="payment_list_div">
    <table id="tblpayment" width="100%" border="1" class="list view">
        <thead>
            <tr>
                <th width="5%" style="text-align: center;"></th>
                <th width="10%" style="text-align: center;">Payment Code </th>
                <th width="10%" style="text-align: center;">Payment Type </th>
                <th width="10%" style="text-align: center;">Payment Date </th>
                <th width="10%" style="text-align: center;">Payment Amount </th>
                <?php if ($this->_tpl_vars['team_type'] == 'Junior'): ?>
                <th width="10%" style="text-align: center;">Total Hours </th>
                <th width="10%" style="text-align: center;">Remain Amount </th>
                <th width="10%" style="text-align: center;">Remain Hours </th>
                <?php else: ?>
                <th width="10%" style="text-align: center;">Total Days </th>
                <th width="10%" style="text-align: center;">Remain Amount </th>
                <th width="10%" style="text-align: center;">Total Days </th>
                <?php endif; ?>
                <th width="15%" style="text-align: center;">Course Fee </th>
                <th width="10%" style="text-align: center;">Assigned User </th>
            </tr>
        </thead>
        <tbody id="tbodypayment">
            <tr><td colspan="10" style="text-align: center;">No Payment Avaiable</td></tr>
        </tbody>
    </table>
</div>