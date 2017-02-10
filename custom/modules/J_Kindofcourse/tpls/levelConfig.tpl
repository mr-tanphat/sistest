{sugar_getscript file="custom/include/javascripts/Multifield/jquery.multifield.min.js"}
<table id="tblLevelConfig" width="80%" border="1" class="list view">
    <thead>
        <tr><td colspan="4"><button class="button" type="button" id="btnAddrow">Add row</button></td></tr>
        <tr>
            <th width="20%" style="text-align: center;">{$MOD.LBL_LEVEL}</th>
            <th width="20%" style="text-align: center;">{$MOD.LBL_MODULE}</th>
            <th width="20%" style="text-align: center;">{$MOD.LBL_HOURS}<span class="required">*</span></th>
            <th width="20%" style="text-align: center;">{$MOD.LBL_TEST_1} </th>
            <th width="20%" style="text-align: center;">{$MOD.LBL_TEST_2} </th>
            <th width="20%" style="text-align: center;">{$MOD.LBL_FINAL_TEST}<span class="required">*</span></th>
            <td width="10%" style="text-align: center;"></td>
        </tr>
    </thead>
    <tbody id="tbodylLevelConfig">
        {$TBODY}
    </tbody>
</table>