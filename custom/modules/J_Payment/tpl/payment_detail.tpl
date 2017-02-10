<div>
    <fieldset id="split_payment_info" class="fieldset-border" style="width: 85%;">
    <table id="tbl_split_payment_1">
        <tbody>
            <tr><td id="payment_label_1" colspan="2"><b>{$MOD.LBL_PAY_DETAIL_1}:</b></td></tr>
            <tr style="display: none;">
                <td valign="top" width="12.5%" scope="col">{$MOD.LBL_BEFORE_DISCOUNT}: <span class="required">*</span> </td>
                <td nowrap><input class="currency" type="text" name="pay_dtl_bef_discount[]" id="before_discount_1" size="20" maxlength="26" value="{sugar_number_format var=$PAY_DTL_BEF_DISCOUNT_1}" title="{$MOD.LBL_BEFORE_DISCOUNT}" tabindex="0"  style="font-weight: bold;"></td>
            </tr>
            <tr style="display: none;">
                <td valign="top" width="12.5%" scope="col">{$MOD.LBL_DISCOUNT_AMOUNT}: <span class="required">*</span> </td>
                <td nowrap><input class="currency" type="text" name="pay_dtl_dis_amount[]" id="discount_amount_1" size="20" maxlength="26" value="{sugar_number_format var=$PAY_DTL_DIS_AMOUNT_1}" title="{$MOD.LBL_DISCOUNT_AMOUNT}" tabindex="0"  style="font-weight: bold;"></td>
            </tr>
            <tr>
                <td valign="top" width="12.5%" scope="col">{$MOD.LBL_AMOUNT}: <span class="required">*</span> </td>
                <td nowrap>
                    <input class="currency" type="text" name="pay_dtl_amount[]" id="payment_amount_1" size="20" maxlength="26" value="{sugar_number_format var=$PAY_DTL_AMOUNT_1}" title="{$MOD.LBL_PAYMENT_AMOUNT}" tabindex="0"  style="font-weight: bold;">
                    </td>
            </tr>
            <tr>
                <td valign="top" width="12.5%" scope="col">{$MOD.LBL_TYPE}:</td>
                <td nowrap> 
                    {html_options name="pay_dtl_type[]" id="pay_dtl_type_1" options=$PAY_DTL_TYPE_OPTIONS selected=$PAY_DTL_TYPE_1}
                </td>
            </tr>
        </tbody>
    </table>
    <table id="tbl_split_payment_2">
        <tbody>
            <tr><td id="payment_label_2"  colspan="2"><b>{$MOD.LBL_PAY_DETAIL_2}:</b></td></tr>
            <tr style="display: none;">
                <td valign="top" width="12.5%" scope="col">{$MOD.LBL_BEFORE_DISCOUNT}: <span class="required">*</span> </td>
                <td nowrap><input class="currency" type="text" name="pay_dtl_bef_discount[]" id="before_discount_2" size="20" maxlength="26" value="{sugar_number_format var=$PAY_DTL_BEF_DISCOUNT_2}" title="{$MOD.LBL_BEFORE_DISCOUNT}" tabindex="0"  style="font-weight: bold;"></td>
            </tr>
            <tr style="display: none;"><td valign="top" width="12.5%" scope="col">{$MOD.LBL_DISCOUNT_AMOUNT}: <span class="required">*</span> </td>
                <td nowrap><input class="currency" type="text" name="pay_dtl_dis_amount[]" id="discount_amount_2" size="20" maxlength="26" value="{sugar_number_format var=$PAY_DTL_DIS_AMOUNT_2}" title="{$MOD.LBL_DISCOUNT_AMOUNT}" tabindex="0"  style="font-weight: bold;"></td>
            </tr>
            <tr>
                <td valign="top" width="12.5%" scope="col">{$MOD.LBL_AMOUNT}: <span class="required">*</span> </td>
                <td nowrap>
                    <input class="currency" type="text" name="pay_dtl_amount[]" id="payment_amount_2" size="20" maxlength="26" value="{sugar_number_format var=$PAY_DTL_AMOUNT_2}" title="{$MOD.LBL_PAYMENT_AMOUNT}" tabindex="0"  style="font-weight: bold;"/>
                </td>
                
            </tr>
            <tr>
                <td valign="top" width="12.5%" scope="col">{$MOD.LBL_TYPE}:</td>
                <td nowrap> 
                    {html_options name="pay_dtl_type[]" id="pay_dtl_type_2" options=$PAY_DTL_TYPE_OPTIONS selected=$PAY_DTL_TYPE_2}
                </td>
            </tr>
        </tbody>
    </table>
    <table id="tbl_split_payment_3">
        <tbody>
            <tr><td id="payment_label_3" colspan="2"><b>{$MOD.LBL_PAY_DETAIL_3}:</b></td></tr> 
            <tr style="display: none;"><td valign="top" width="12.5%" scope="col">{$MOD.LBL_BEFORE_DISCOUNT}: <span class="required">*</span> </td>
                <td nowrap><input class="currency" type="text" name="pay_dtl_bef_discount[]" id="before_discount_3" size="20" maxlength="26" value="{sugar_number_format var=$PAY_DTL_BEF_DISCOUNT_3}" title="{$MOD.LBL_BEFORE_DISCOUNT}" tabindex="0"  style="font-weight: bold;"></td>
            </tr>
            <tr style="display: none;"><td valign="top" width="12.5%" scope="col">{$MOD.LBL_DISCOUNT_AMOUNT}: <span class="required">*</span> </td>
                <td nowrap><input class="currency" type="text" name="pay_dtl_dis_amount[]" id="discount_amount_3" size="20" maxlength="26" value="{sugar_number_format var=$PAY_DTL_DIS_AMOUNT_3}" title="{$MOD.LBL_DISCOUNT_AMOUNT}" tabindex="0"  style="font-weight: bold;"></td>
            </tr>
            <tr>
                <td valign="top" width="12.5%" scope="col">{$MOD.LBL_AMOUNT}: <span class="required">*</span> </td>
                <td nowrap>
                    <input class="currency" type="text" name="pay_dtl_amount[]" id="payment_amount_3" size="20" maxlength="26" value="{sugar_number_format var=$PAY_DTL_AMOUNT_3}" title="{$MOD.LBL_PAYMENT_AMOUNT}" tabindex="0"  style="font-weight: bold;">
                </td>
            </tr>
            <tr>
                <td valign="top" width="12.5%" scope="col">{$MOD.LBL_TYPE}:</td>
                <td nowrap> 
                    {html_options name="pay_dtl_type[]" id="pay_dtl_type_3" options=$PAY_DTL_TYPE_OPTIONS selected=$PAY_DTL_TYPE_3}
                </td>
            </tr>
        </tbody>
    </table>
    </fieldset>
</div>                        
