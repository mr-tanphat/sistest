{sugar_getscript file="custom/include/javascripts/Multifield/jquery.multifield.min.js"}
<table id="tblbook" width="60%" border="1" class="list view">
    <thead>
        <tr><td colspan="4"><button class="button" type="button" id="btnAddrow">Add row</button></td>
        </tr>
        <tr>
            <th width="20%" style="text-align: center;">Name <span class="required">*</span></th>
            <th width="20%" style="text-align: center;">Quantity <span class="required">*</span></th>
            <th width="30%" style="text-align: center;">Price </th>
            <td width="10%" style="text-align: center;"> </td>
        </tr>
    </thead>
    <tbody id="tbodybook">
        {$html_tpl}
        {$html}
    </tbody>
    <tfoot>
        <tr>
            <td width="20%"></td>
            <td width="20%" style="text-align: center;"><b>Total : </b></td>
            <td width="30%" style="text-align: center;"><input class="currency input_readonly" type="text" name="total_book_pay" id="total_book_pay" size="20" value=" {sugar_number_format var=$fields.payment_amount.value}" style="font-weight: bold;" readonly></td></tr>
    </tfoot>
</table>