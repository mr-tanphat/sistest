<script type="text/javascript" src="custom/include/javascripts/jquery.form.min.js"></script>
<script type="text/javascript"  src="custom/modules/Contacts/js/sendSMS.js"></script>
<link rel='stylesheet' href='{sugar_getjspath file="custom/modules/J_Class/tpls/css/send_sms_screen.css"}'/>


<div class="container">
    <div class="page-header">
        
        <input type="hidden" name="current_user_id" id="current_user_id" value="{$CURRENT_USER_ID}">
    </div>
</div>
<table class="tbl" style="width: 100%">
    <tr>
        <td style="width:45%;vertical-align: top; text-align: center;">
            <table class="tbl" style="width: 100%;text-align: left;  border-collapse: initial; border: solid 1px black;">
                <tr>
                    <td colspan="3" style="text-align: center;">
                        <h1>{$MOD.LBL_SEND_SMS_TITLE}</h1>
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%;">1. Select Brand name:</td>
                    <td style="width: 35%;">
                        <select id="brand_name" name="brand_name" style="width: 200px;">{$BRAND_NAME_OPTIONS}</select>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <form action="index.php?module=Contacts&action=handelAjaxsContact&sugar_body_only=true&type=ajaxGetReceiversFromExcel" method="post" enctype="multipart/form-data" id="submitFileForm">
                            2. Upload file:
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Submit" name="submit_file" id="submit_file">
                        </form>
                    </td>
                    
                </tr>
                <tr>
                    <td colspan="2">
                        Receiver:
                        <br>
                        <textarea id="txt_receiver" name="txt_receiver" rows="4" cols="60"></textarea>
                    </td>
                </tr>

                <tr>
                    <td style="width: 15%;">3. Select Template:</td>
                    <td>
                        <select id="template" name="template" style="width: 200px;">{$TEMPLATE_OPTIONS}</select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Content:
                        <br>
                        <textarea id="txt_content" name="txt_content" rows="4" cols="60" onkeyup="countContentCharater($(this));"></textarea>
                        <br/>
                        <label class="message_counter"></label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="button" class="button primary" value="Send" name="send_sms" id="send_sms">
                        <input type="button" class="button" id="recent_sms" value="Recent SMS" onclick="showRecentSMS();">
                    </td>
                </tr>
            </table>    
        </td>
        <td style="vertical-align: top; text-align: center;">
            <table class="tbl" style="width: 100%;text-align: left;  border-collapse: initial; border: solid 1px black;">
                <tr>
                    <td colspan="3" style="text-align: center;">
                        <h1>{$MOD.LBL_SEND_SMS_RESULT}</h1>
                    </td>
                </tr>
                <tr>
                    
                </tr>
                <tr>
                    <td style="vertical-align: top;">
                        <table>
                            <tr>
                                <td>
                                    Total: 
                                </td>
                                <td style="text-align: right;">
                                    <span id="count_total"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Received: 
                                </td>
                                <td style="text-align: right;">
                                    <span id="count_received"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Failed: 
                                </td>
                                <td style="text-align: right;">
                                    <span id="count_failed"></span>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="vertical-align: top;">
                        <table class="tbl" id="sending_result">
                            <thead>
                                <tr>
                                    <th nowrap="">Phone number</th>
                                    <th nowrap="">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
            
    

