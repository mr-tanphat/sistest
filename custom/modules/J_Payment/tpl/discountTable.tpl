<div id="dialog_discount" title="Get Discount" style="display:none;">
    <table id="table_discount" style="width: 100%;display:block;" class="list view">
        <tbody style="height: 350px; display: inline-block; width: 100%; overflow: auto;">
             <tr colspan = "6">
                <th width="5%" style="text-align:center"></th>
                <th width="25%" style="text-align:center">Discount Name</th>
                <th width="10%" style="text-align:center">Discount %</th>
                <th width="15%" style="text-align:center">Discount Amount</th>
                <th width="20%" style="text-align:center">Policy</th>
                <th width="25%" style="text-align:center">Description</th>
            </tr>
            {$discount_rows}
        </tbody>
    </table><br>
    <table width="100%">
        <tr>
            <td width="45%" align="right">Amount Before Discount (1):</td>
            <td width="10%" align="right" class="dis_amount_bef_discount"></td>
            <td width="35%" align="left" scope="col" id="dis_ratio"></td>
        </tr>

        <tr>
            <td width="45%" align="right">Discount Amount (2):</td>
            <td width="10%" align="right" class="dis_discount_amount"></td>
            <td width="35%" align="left"></td>
        </tr>

        <tr>
            <td width="45%" align="right">Discount % (3):</td>
            <td width="10%" align="right" class="dis_discount_percent"></td>
            <input type="hidden" class="dis_discount_percent_to_amount" value="">
            <td width="35%" align="left"></td>
        </tr>

        <tr>
            <td width="45%" align="right">Total Discount (4) =  (2) + (1 - 2)x(3):</td>
            <td width="10%" align="right" class="dis_total_discount"></td>
        </tr>

        <tr>
            <td width="45%" align="right">Final Discount (5):</td>
            <td width="10%" align="right" class="dis_final_discount"></td>
            <td width="35%" align="left"><p style="color:red; display:none;" class="dis_alert_discount"></p><input type="hidden" class="dis_final_discount_percent" value=""></td>
        </tr>
    </table>
</div>