<tr class='row_tpl' {$DISPLAY}>
    <td align="center">
        <select name="levels[]" class="levels">
            {$LEVEL_OPTIONS}
        </select>
    </td>
    <td align="center">
        <select name="modules[]" multiple="multiple" class="modules">
            {$MODULE_OPTIONS}     
        </select>
    </td>
    <td nowrap align="center"> 
        <!--<table id="tblBook">
            <tr>
                <td>
                    <button type="button" id="addBook">
                        <img src="themes/default/images/id-ff-add.png?">
                    </button>
                </td> 
            </tr>
            {$BOOK_LIST}
            <tfoot style="display:none;" > 
                <tr>
                    <td>
                        <input name="book_name[]" value="" class="book_name" type="text" style="margin-right: 10px;">
                        <input name="book_id[]" value="" class="book_id" type="hidden">
                        <button type="button" class="btn_choose_book" onclick="clickChooseBook($(this))">
                            <img src="themes/default/images/id-ff-select.png">
                        </button>
                        <button type="button" name="btn_clr_book" class="btn_clr_book" >
                            <img src="themes/default/images/id-ff-remove-nobg.png?">
                        </button>
                    </td> 
                </tr>
            <tfoot>
        </table> -->
        <input name="hours[]" value="{$HOURS}" class="hours" type="text" style="width: 70px;text-align: center;">
    </td>  
    <td align="center">
        <input name="test_1[]" value="{$TEST_1}" class="test_1" type="text" style="width: 70px;text-align: center;">
    </td>
    <td align="center">
        <input name="test_2[]" value="{$TEST_2}" class="test_2" type="text" style="width: 70px;text-align: center;">
    </td>
    <td align="center">
        <input name="final_test[]" value="{$FINAL_TEST}" class="final_test" type="text" style="width: 70px;text-align: center;">
    </td>
    <td align='center'>
        <input name='jsons[]' value='{$JSON}' class='jsons' type='hidden'/>
        <input type="button" class='btn btn-danger btnRemove' value='Remove'/> 
    </td>
</tr>       