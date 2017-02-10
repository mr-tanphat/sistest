<?php /* Smarty version 2.6.11, created on 2017-02-07 09:42:45
         compiled from custom/modules/Administration/tpl/survey_smtp.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getjspath', 'custom/modules/Administration/tpl/survey_smtp.tpl', 2, false),)), $this); ?>
<link rel='stylesheet' href='<?php echo $this->_tpl_vars['custom_smtp_css_path']; ?>
' type='text/css'>
<script type="text/javascript" src="<?php echo smarty_function_sugar_getjspath(array('file' => 'cache/include/javascript/sugar_grp_yui_widgets.js'), $this);?>
"></script>
<form name="SurveySmtpSettings" id="" method="POST">
    <input type="hidden" name="module" value="bc_survey">
    <input type="hidden" name="action" value="saveSurveysmtpSetting">
    <input type="hidden" id="mail_sendtype" name="mail_sendtype" value="<?php echo $this->_tpl_vars['mail_sendtype']; ?>
">
    <h2>Custom Email Settings</h2>
    <br/>
    <table width="100%" border="1" cellspacing="0" cellpadding="0" class="edit view">
        <tbody>

            <tr><th align="left" scope="row" colspan="4"><h4>Configuring Email Setting</h4></th>
        </tr>
        <tr>
            <td align="left" scope="row" colspan="4">
                Please enter the details of your SMTP mail server. We recommend testing your configuration settings by clicking on "Send Test Email".
                <br>&nbsp;
            </td>
        </tr>
        <tr>
            <td scope="row" class="form-heading-label">"From" Name: <span class="required">*</span></td>
            <td class="form-field" > <input id="survey_notify_fromname" name="survey_notify_fromname" tabindex="1" size="25" maxlength="128" type="text" value="<?php echo $this->_tpl_vars['survey_notify_fromname']; ?>
"></td>
        </tr>
        <tr id="survey_from_address_tr">
            <td scope="row" class="form-heading-label">"From" Address: <span class="required">*</span></td>
            <td class="form-field"><input id="survey_notify_fromaddress" name="survey_notify_fromaddress" tabindex="1" size="25" maxlength="128" type="text" value="<?php echo $this->_tpl_vars['survey_notify_fromaddress']; ?>
"></td>
        </tr>
        <tr>
            <td align="left" scope="row" class="form-heading-label">Choose your Email provider</td>
            <td class="form-field" colspan="4">
                <div id="smtpButtonGroup" class="yui-buttongroup">
                    <select id="survey_smtp_email_provider" name="survey_smtp_email_provider" onchange="getSurveyMailServerDetails(this);" tabindex="1">
                        <option  value="gmail" <?php if ($this->_tpl_vars['survey_smtp_email_provider'] == 'gmail'): ?>selected<?php endif; ?> >Gmail</option>
                        <option  value="micro_soft" <?php if ($this->_tpl_vars['survey_smtp_email_provider'] == 'micro_soft'): ?>selected<?php endif; ?> >Microsoft Exchange</option>
                        <option value="other" <?php if ($this->_tpl_vars['survey_smtp_email_provider'] == 'other'): ?>selected<?php endif; ?> >Other</option></select>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <div id="survey_smtp_settings" style="display: inline; visibility: visible;" class="form-inner-table">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tbody style="display:inline-block;width:100%;">
                            <tr id="survey_smtp_username_setting">
                                <td class="form-heading-label" scope="row"><span id="survey_mail_username_label"><?php echo $this->_tpl_vars['MOD']['LBL_MAIL_SMTPUSER']; ?>
 </span><span class="required"> *</span></td>
                                <td class="form-field"><input type="text" id="survey_mail_smtp_username" name="survey_mail_smtp_username" tabindex="1" size="25" maxlength="100" value="<?php echo $this->_tpl_vars['survey_mail_smtp_username']; ?>
"></td>
                            </tr>
                            <tr id="survey_mail_host_settings">
                                <td class="form-heading-label" scope="row"><span id="survey_mail_smtp_host_label"><?php echo $this->_tpl_vars['MOD']['LBL_MAIL_SMTPSERVER']; ?>
 </span> <span class="required"> *</span></td>
                                <td class="form-field"><input type="text" id="survey_mail_smtp_host" name="survey_mail_smtp_host" tabindex="1" size="25" maxlength="64" value="<?php echo $this->_tpl_vars['survey_mail_smtp_host']; ?>
" ></td>
                            </tr>
                            <tr id="survey_smtp_password_setting">
                                <td class="form-heading-label" scope="row"><span id="survey_mail_password_label"><?php echo $this->_tpl_vars['MOD']['LBL_MAIL_SMTPPASS']; ?>
 </span><span class="required"> *</span></td>
                                <td class="form-field"><input type="password" id="survey_mail_smtp_password" name="survey_mail_smtp_password" tabindex="1" size="25" maxlength="100" value="<?php echo $this->_tpl_vars['survey_mail_smtp_password']; ?>
"></td>
                            </tr>
                            <tr id="survey_mail_smtpssl_setting">
                                <td class="form-heading-label" scope="row"><span id="survey_mail_smtpssl_label"><?php echo $this->_tpl_vars['APP']['LBL_EMAIL_SMTP_SSL_OR_TLS']; ?>
</span></td>
                                <td class="form-field">
                                    <select id="survey_mail_smtpssl" name="survey_mail_smtpssl" tabindex="501" onchange="">
                                        <option value="">-none-</option>
                                        <option value="1" <?php if ($this->_tpl_vars['survey_mail_smtpssl'] == '1'): ?>selected<?php endif; ?>>SSL</option>
                                        <option value="2" <?php if ($this->_tpl_vars['survey_mail_smtpssl'] == '2'): ?>selected<?php endif; ?>>TLS</option></select>
                                </td>
                            </tr>
                            <tr id="survey_smtp_retype_password_setting">
                                <td class="form-heading-label" scope="row"><span id="survey_mail_retype_password_label">Retype Password <span class="required">*</span></span></td>
                                <td class="form-field"><input type="password" id="survey_mail_smtp_retype_password" name="survey_mail_smtp_retype_password" tabindex="1" size="25" maxlength="100" value="<?php echo $this->_tpl_vars['survey_mail_smtp_retype_password']; ?>
"></td>
                            </tr>
                            <tr id="survey_smtp_port_setting">
                                <td class="form-heading-label" scope="row"><span id="survey_mail_smtpport_label"><?php echo $this->_tpl_vars['MOD']['LBL_MAIL_SMTPPORT']; ?>
</span> <span class="required">*</span></td>
                                <td class="form-field"><input type="text" id="survey_mail_smtpport" name="survey_mail_smtpport" tabindex="1" size="15" maxlength="5" value="<?php echo $this->_tpl_vars['survey_mail_smtpport']; ?>
"></td>
                            </tr>
                        </tbody></table>
                </div>
            </td>
        </tr>
        <tr class="btn-container">
            <td width="15%" colspan="3" style="float:left;">

                <input type="button" class="button" value="Send Test Email" onclick="testOutboundSettingsDialog();">
            </td>
        </tr>		
        </tbody></table>
    <input title="Save" accesskey="a" class="button primary" onclick="this.form.action.value = 'saveSurveysmtpSetting';
            return survey_smtp_verifyData();" type="submit" name="button" id="btn_save" value=" Save ">
    <input title="Cancel" accesskey="l" class="button" onclick="this.form.action.value = 'index';
            this.form.module.value = 'Administration';" type="submit" name="button" value=" Cancel ">

</form>
<div id="survey_testOutboundDialog" class="yui-hidden">
    <div id="testOutbound">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="edit view">
            <tr>
                <td scope="row">
                    <?php echo $this->_tpl_vars['APP']['LBL_EMAIL_SETTINGS_FROM_TO_EMAIL_ADDR']; ?>

                    <span class="required">
                        <?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>

                    </span>
                </td>
                <td >
                    <input type="text" id="survey_outboundtest_from_address" name="survey_outboundtest_from_address" size="35" maxlength="64" value="<?php echo $this->_tpl_vars['CURRENT_USER_EMAIL']; ?>
">
                </td>
            </tr>
            <tr>
                <td scope="row" colspan="2">
                    <input type="button" class="button" value="   <?php echo $this->_tpl_vars['APP']['LBL_EMAIL_SEND']; ?>
   " onclick="javascript:sendTestEmail();">&nbsp;
                    <input type="button" class="button" value="   <?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
   " onclick="javascript:bc_survey.survey_testOutboundDialog.hide();">&nbsp;
                </td>
            </tr>

        </table>
    </div>
</div>
<?php echo '
    <script type="text/javascript">
        bc_survey = {};
        var mail_ser_provider = \'';  echo $this->_tpl_vars['survey_smtp_email_provider'];  echo '\';
        if (mail_ser_provider != \'other\') {
            YAHOO.util.Dom.addClass("survey_from_address_tr", "yui-hidden");
        }

       // getSurveyMailServerDetails(\'';  echo $this->_tpl_vars['survey_smtp_email_provider'];  echo '\');
        function getSurveyMailServerDetails(smtptype) {
            var smtp_type = smtptype;
            if (typeof smtptype != \'string\') {
                smtp_type = $(smtptype).val();
            }
            switch (smtp_type) {
                case "gmail":
                    YAHOO.util.Dom.addClass("survey_from_address_tr", "yui-hidden");
                    document.getElementById("survey_mail_smtp_host").value = (!document.getElementById("survey_mail_smtp_host").value) ? \'smtp.gmail.com\' : document.getElementById("survey_mail_smtp_host").value;
                    document.getElementById("survey_mail_smtpport").value = (!document.getElementById("survey_mail_smtpport").value) ? \'587\' : document.getElementById("survey_mail_smtpport").value;
                    document.getElementById("survey_mail_smtp_host_label").innerHTML = \'';  echo $this->_tpl_vars['MOD']['LBL_MAIL_SMTPSERVER'];  echo '\';
                    document.getElementById("survey_mail_username_label").innerHTML = \'';  echo $this->_tpl_vars['MOD']['LBL_GMAIL_SMTPUSER'];  echo '\';
                    document.getElementById("survey_mail_password_label").innerHTML = \'';  echo $this->_tpl_vars['MOD']['LBL_GMAIL_SMTPPASS'];  echo '\';
                    document.getElementById("survey_mail_smtpport_label").innerHTML = \'';  echo $this->_tpl_vars['MOD']['LBL_MAIL_SMTPPORT'];  echo '\';
                    break;
                case "micro_soft":
                    YAHOO.util.Dom.addClass("survey_from_address_tr", "yui-hidden");
                    document.getElementById("survey_mail_smtp_host").value = \'\';
                    document.getElementById("survey_mail_smtpport").value = (!document.getElementById("survey_mail_smtpport").value) ? \'465\' : document.getElementById("survey_mail_smtpport").value;
                    document.getElementById("survey_mail_password_label").innerHTML = \'';  echo $this->_tpl_vars['MOD']['LBL_EXCHANGE_SMTPPASS'];  echo '\';
                    document.getElementById("survey_mail_smtpport_label").innerHTML = \'';  echo $this->_tpl_vars['MOD']['LBL_EXCHANGE_SMTPPORT'];  echo '\';
                    document.getElementById("survey_mail_smtp_host_label").innerHTML = \'';  echo $this->_tpl_vars['MOD']['LBL_EXCHANGE_SMTPSERVER'];  echo '\';
                    document.getElementById("survey_mail_username_label").innerHTML = \'';  echo $this->_tpl_vars['MOD']['LBL_EXCHANGE_SMTPUSER'];  echo '\';
                    break;
                case "other":
                    YAHOO.util.Dom.removeClass("survey_from_address_tr", "yui-hidden");
                    document.getElementById("survey_mail_smtp_host").value = \'\';
                    document.getElementById("survey_mail_smtpport").value = (!document.getElementById("survey_mail_smtpport").value) ? \'465\' : document.getElementById("survey_mail_smtpport").value;
                    document.getElementById("survey_mail_password_label").innerHTML = \'';  echo $this->_tpl_vars['MOD']['LBL_MAIL_SMTPPASS'];  echo '\';
                    document.getElementById("survey_mail_smtpport_label").innerHTML = \'';  echo $this->_tpl_vars['MOD']['LBL_MAIL_SMTPPORT'];  echo '\';
                    document.getElementById("survey_mail_smtp_host_label").innerHTML = \'';  echo $this->_tpl_vars['MOD']['LBL_MAIL_SMTPSERVER'];  echo '\';
                    document.getElementById("survey_mail_username_label").innerHTML = \'';  echo $this->_tpl_vars['MOD']['LBL_MAIL_SMTPUSER'];  echo '\';
                    break;
                default:
                    document.getElementById("survey_mail_smtpport").value = (!document.getElementById("survey_mail_smtpport").value) ? \'25\' : document.getElementById("survey_mail_smtpport").value;
                    break;
            }
        }

        function survey_smtp_verifyData() {
            var isError = false;
            var errorMessage = "";
            if (typeof document.forms[\'SurveySmtpSettings\'] != \'undefined\') {
                var sendType = \'SMTP\';
                var smtpPort = document.getElementById(\'survey_mail_smtpport\').value;
                var smtpserver = document.getElementById(\'survey_mail_smtp_host\').value;
                var email_add = document.getElementById(\'survey_mail_smtp_username\').value;
                var pass = document.getElementById(\'survey_mail_smtp_password\').value;
                var re_pass = document.getElementById(\'survey_mail_smtp_retype_password\').value;
                var smtp_fromname = document.getElementById(\'survey_notify_fromname\').value;
                var smtp_fromaddress = document.getElementById(\'survey_notify_fromaddress\').value;
                var survey_smtp_email_provider = document.getElementById(\'survey_smtp_email_provider\').value;
                var lable_user_name = document.getElementById(\'survey_mail_username_label\').innerHTML;
                var lable_pass = document.getElementById(\'survey_mail_password_label\').innerHTML;
                var lable_smtpserver = document.getElementById(\'survey_mail_smtp_host_label\').innerHTML;
                var lable_smtpport = document.getElementById(\'survey_mail_smtpport_label\').innerHTML;

                if (sendType == \'SMTP\') {
                    if (trim(smtp_fromname) == "") {
                        isError = true;
                        errorMessage += "\\nFrom Name";
                    }
                    if (survey_smtp_email_provider == \'other\') {
                        if (trim(smtp_fromaddress) == "") {
                            isError = true;
                            errorMessage += "\\nFrom Address";
                        }
                    }
                    if (trim(email_add) == "") {
                        isError = true;
                        errorMessage += "\\n" + lable_user_name;
                    }
                    /*if (trim(email_add) != "") {
                     if (!isValidEmail(email_add)) {
                     alert("Please enter valid Email Address");
                     return false;
                     }
                     }*/
                    if (trim(smtpserver) == "") {
                        isError = true;
                        errorMessage += "\\n" + lable_smtpserver;
                    }
                    if (trim(smtpPort) == "") {
                        isError = true;
                        errorMessage += "\\n" + lable_smtpport;
                    }
                    if (trim(pass) == "") {
                        isError = true;
                        errorMessage += "\\n" + lable_pass;
                    }
                    if (trim(re_pass) != trim(pass)) {
                        isError = true;
                        alert("Password does not match.");
                        return false;
                    }
                }
            }
            if (errorMessage && isError)
            {
                errorMessage = \'Missing required field :  \' + errorMessage;
            }
            // validate valid email address or not
            if (survey_smtp_email_provider == \'gmail\' && email_add)
            {
                if (/^([a-zA-Z0-9_\\.\\-])+\\@(([a-zA-Z0-9\\-])+\\.)+([a-zA-Z0-9]{2,4})+$/.test(email_add) == false) {
                    document.getElementById(\'survey_mail_smtp_username\').focus();
                    errorMessage = "Invalid Email Address";
                    isError = true;
                }
            }

            // Here we decide whether to submit the form.
            if (isError == true) {
                alert(errorMessage);
                return false;
            }
            return true;
        }

        function testOutboundSettingsDialog() {
            var ret = survey_smtp_verifyData();
            if (!ret) {
                return false;
            }
            // lazy load dialogue
            if (!bc_survey.survey_testOutboundDialog) {
                bc_survey.survey_testOutboundDialog = new YAHOO.widget.Dialog("survey_testOutboundDialog", {
                    modal: true,
                    visible: true,
                    fixedcenter: true,
                    constraintoviewport: true,
                    width: 600,
                    shadow: false
                });
                bc_survey.survey_testOutboundDialog.setHeader("';  echo $this->_tpl_vars['APP']['LBL_EMAIL_TEST_OUTBOUND_SETTINGS'];  echo '");
                YAHOO.util.Dom.removeClass("survey_testOutboundDialog", "yui-hidden");
            } // end lazy load

            bc_survey.survey_testOutboundDialog.render();
            bc_survey.survey_testOutboundDialog.show();
        }


        function sendTestEmail()
        {
            var survey_smtp_email_provider = document.getElementById(\'survey_smtp_email_provider\').value;
            var toAddress = document.getElementById("survey_outboundtest_from_address").value;
            var fromAddress = trim(document.getElementById(\'survey_notify_fromaddress\').value);
            var smtpServer = document.getElementById(\'survey_mail_smtp_host\').value;
            var smtpPort = document.getElementById(\'survey_mail_smtpport\').value;
            var smtpssl = document.getElementById(\'survey_mail_smtpssl\').value;
            var mailsmtpauthreq = \'true\';
            var mail_sendtype = document.getElementById(\'mail_sendtype\').value;
            if (trim(toAddress) == "")
            {
                overlay("';  echo $this->_tpl_vars['APP']['ERR_MISSING_REQUIRED_FIELDS'];  echo '", "';  echo $this->_tpl_vars['APP']['LBL_EMAIL_SETTINGS_FROM_TO_EMAIL_ADDR'];  echo '", \'alert\');
                return;
            }
            if (!isValidEmail(toAddress)) {
                overlay("';  echo $this->_tpl_vars['APP']['ERR_INVALID_REQUIRED_FIELDS'];  echo '", "';  echo $this->_tpl_vars['APP']['LBL_EMAIL_SETTINGS_FROM_TO_EMAIL_ADDR'];  echo '", \'alert\');
                return;
            }
            if (survey_smtp_email_provider == \'other\') {
                if (trim(fromAddress) == "")
                {
                    overlay("';  echo $this->_tpl_vars['APP']['ERR_MISSING_REQUIRED_FIELDS'];  echo '", "';  echo $this->_tpl_vars['APP']['LBL_EMAIL_SETTINGS_FROM_ADDR'];  echo '", \'alert\');
                    return;
                }
                if (!isValidEmail(fromAddress)) {
                    overlay("';  echo $this->_tpl_vars['APP']['ERR_INVALID_REQUIRED_FIELDS'];  echo '", "';  echo $this->_tpl_vars['APP']['LBL_EMAIL_SETTINGS_FROM_ADDR'];  echo '", \'alert\');
                    return;
                }
            }
            //Hide the email address window and show a message notifying the user that the test email is being sent.
            bc_survey.survey_testOutboundDialog.hide();
            overlay("';  echo $this->_tpl_vars['APP']['LBL_EMAIL_PERFORMING_TASK'];  echo '", "';  echo $this->_tpl_vars['APP']['LBL_EMAIL_ONE_MOMENT'];  echo '", \'alert\');

            var callbackOutboundTest = {
                success: function (o) {
                    hideOverlay();
                    var responseObject = YAHOO.lang.JSON.parse(o.responseText);
                    if (responseObject.status)
                        overlay("';  echo $this->_tpl_vars['APP']['LBL_EMAIL_TEST_OUTBOUND_SETTINGS'];  echo '", "';  echo $this->_tpl_vars['APP']['LBL_EMAIL_TEST_NOTIFICATION_SENT'];  echo '", \'alert\');
                    else
                        overlay("';  echo $this->_tpl_vars['APP']['LBL_EMAIL_TEST_OUTBOUND_SETTINGS'];  echo '", responseObject.errorMessage, \'alert\');
                }
            };
            if (survey_smtp_email_provider != \'other\') {
                fromAddress = document.getElementById("survey_mail_smtp_username").value;
            }
            var from_name = document.getElementById(\'survey_notify_fromname\').value;
            var postDataString = \'mail_type=system&mail_sendtype=\' + mail_sendtype + \'&mail_smtpserver=\' + smtpServer + "&mail_smtpport=" + smtpPort + "&mail_smtpssl=" + smtpssl +
                    "&mail_smtpauth_req=" + mailsmtpauthreq + "&mail_smtpuser=" + trim(document.getElementById(\'survey_mail_smtp_username\').value) +
                    "&mail_smtppass=" + trim(document.getElementById(\'survey_mail_smtp_password\').value) + "&outboundtest_to_address=" + encodeURIComponent(toAddress) +
                    "&outboundtest_from_address=" + fromAddress + "&mail_from_name=" + from_name;

            YAHOO.util.Connect.asyncRequest("POST", "index.php?action=testOutboundEmail&module=EmailMan&to_pdf=true&sugar_body_only=true", callbackOutboundTest, postDataString);
        }

        function overlay(reqtitle, body, type) {
            var config = {};
            config.type = type;
            config.title = reqtitle;
            config.msg = body;
            YAHOO.SUGAR.MessageBox.show(config);
        }

        function hideOverlay() {
            YAHOO.SUGAR.MessageBox.hide();
        }

    </script>
'; ?>
