<?php /* Smarty version 2.6.11, created on 2017-02-07 09:37:45
         compiled from modules/Users/login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getscript', 'modules/Users/login.tpl', 19, false),array('function', 'sugar_translate', 'modules/Users/login.tpl', 22, false),)), $this); ?>
<!--
/*********************************************************************************
* By installing or using this file, you are confirming on behalf of the entity
* subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
* the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
* http://www.sugarcrm.com/master-subscription-agreement
*
* If Company is not bound by the MSA, then by installing or using this file
* you are agreeing unconditionally that Company will be bound by the MSA and
* certifying that you have authority to bind Company accordingly.
*
* Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
********************************************************************************/

/*********************************************************************************

********************************************************************************/
-->
<?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/jquery.backstretch.min.js"), $this);?>

<?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/CustomCheckboxLogin.js"), $this);?>

<script type='text/javascript'>
    var LBL_LOGIN_SUBMIT = '<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_LOGIN_SUBMIT'), $this);?>
';
    var LBL_REQUEST_SUBMIT = '<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_REQUEST_SUBMIT'), $this);?>
';
    var LBL_SHOWOPTIONS = '<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_SHOWOPTIONS'), $this);?>
';
    var LBL_HIDEOPTIONS = '<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_HIDEOPTIONS'), $this);?>
';
</script>
<table cellpadding="0" align="center" width="100%" cellspacing="0" border="0" style="position: fixed; margin-left: 0px; margin-top: 0px; top: 25%;">
    <tr>
        <td align="center">
            <div class="loginBox" style="width: 575px; height: 250px">
               <!-- <div class="loginBoxTop">
                    <div class="cloud">
                        <a style="color: #4E69A2;" target="_blank" href="http://apollo.edu.vn"><img src="themes/OnlineCRM-Blue/images/logo.png" border="0" height="60" style="margin-top: -19px;"></a>
                    </div>
                </div>      -->
                <div class="loginBoxMiddle">
                    <div class="loginBoxError">
                        <div id="loginDialogError"> 
                            <table cellpadding="0" cellspacing="2" border="0" align="center">
                                <tr>
                                    <td scope="row" colspan="2">
                                        <span class="error" id="browser_warning" style="display:none">
                                            <?php echo smarty_function_sugar_translate(array('label' => 'WARN_BROWSER_VERSION_WARNING'), $this);?>

                                        </span>
                                        <span class="error" id="ie_compatibility_mode_warning" style="display:none">
                                            <?php echo smarty_function_sugar_translate(array('label' => 'WARN_BROWSER_IE_COMPATIBILITY_MODE_WARNING'), $this);?>

                                        </span>
                                    </td>
                                </tr>
                                <?php if ($this->_tpl_vars['LOGIN_ERROR'] != ''): ?>
                                <tr>
                                    <td scope="row" colspan="2"><span class="error"><?php echo $this->_tpl_vars['LOGIN_ERROR']; ?>
</span></td>
                                    <?php if ($this->_tpl_vars['WAITING_ERROR'] != ''): ?>
                                        <tr>
                                            <td scope="row" colspan="2"><span class="error"><?php echo $this->_tpl_vars['WAITING_ERROR']; ?>
</span></td>
                                        </tr>
                                    <?php endif; ?>
                                    </tr>
                                <?php else: ?>
<!--                                    <tr>
                                        <td scope="row"><span class="error">Chương trình mới được cập nhật phiên bản mới, người dùng vui lòng xóa Cache trình duyệt để sử dụng đầy đủ các tính năng. <a target="_blank" href="http://support.sugarcrm.com/04_Knowledge_Base/02Administration/100Troubleshooting/Clearing_Browser_Cache/">Hướng dẫn xóa cache click vào đây</a> </span></td>
                                    </tr>    -->
                                <?php endif; ?>
                            </table>
                        </div>
                        <div id="forgotPasswordDialogError">
                            <table cellpadding="0" cellspacing="2" border="0" align="center">
                                <tr>
                                    <td colspan="2">
                                        <div id="generate_success" class='error' style="display:inline;"></div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div id="sessionDialogError">
                            <table cellpadding="0" cellspacing="2" border="0" align="center">
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="loginBoxLeft">
                        <?php 
                            $settings = new Administration();
                            $settings->retrieveSettings('system');
                            $this->assign('SYSTEM_NAME', $settings->settings['system_name']);
                         ?>
                        <table cellpadding="0" cellspacing="2" border="0" align="center" width="100%" style="padding-bottom: 65px;">
                            <tr>
                                <td scope="row" width='1%'>
                                    <img src="custom/themes/apollo_images/logo_apollo.png" alt="" width="100%">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="loginBoxCenter">
                        <div class="spacerVertical right">
                            <div class="mark"></div>
                        </div>
                    </div>
                    <div class="loginBoxRight">
                        <div id="login_dialog">
                            <form action="index.php" method="post" name="DetailView" id="form" onsubmit="return document.getElementById('cant_login').value == ''">
                                <table cellpadding="0" cellspacing="2" border="0" align="center" width="90%">
                                    <tr>
                                        <td scope="row" colspan="2" width="100%"
                                            style="font-size: 12px; font-weight: normal; padding-bottom: 4px;">
                                            <input type="hidden" name="module" value="Users">
                                            <input type="hidden" name="action" value="Authenticate">
                                            <input type="hidden" name="return_module" value="Users">
                                            <input type="hidden" name="return_action" value="Login">
                                            <input type="hidden" id="cant_login" name="cant_login" value="">
                                            <?php $_from = $this->_tpl_vars['LOGIN_VARS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['var']):
?>
                                                <input type="hidden" name="<?php echo $this->_tpl_vars['key']; ?>
" value="<?php echo $this->_tpl_vars['var']; ?>
">
                                            <?php endforeach; endif; unset($_from); ?>
                                        </td>
                                    </tr>
                                    <?php if (! empty ( $this->_tpl_vars['SELECT_LANGUAGE'] )): ?>
                                        <tr>
                                            <td>
                                                <select id="login_language" name='login_language' onchange="switchLanguage(this.value)"><?php echo $this->_tpl_vars['SELECT_LANGUAGE']; ?>
</select>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td>
                                            <div style="position: relative;">
                                                <input type="text" tabindex="1" id="user_name" name="user_name" value='<?php echo $this->_tpl_vars['LOGIN_USER_NAME']; ?>
' placeholder="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_USER_NAME'), $this);?>
" class="login-field" autofocus="autofocus"/>
                                                <label class="login-field-icon fa-user"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>                                                                                                                          
                                        <td>
                                            <div style="position: relative;">
                                                <input type="password" tabindex="2" id="user_password" name="user_password" value='<?php echo $this->_tpl_vars['LOGIN_PASSWORD']; ?>
' placeholder="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_PASSWORD'), $this);?>
" class="login-field"/>
                                                <label class="login-field-icon fa-lock"></label>
                                            </div>
                                        </td>
                                    </tr> 
                                    <tr>    
                                        <td>
                                            <div style="margin-top: 5px;">
                                                <div style="float: left;">
                                                    <div id='wait_login_remember' style="<?php echo $this->_tpl_vars['WAIT_LOGIN_REMEMBER']; ?>
">
                                                        <img src="themes/default/images/img_loading.gif">
                                                    </div>
                                                    <label style="font-size: 13px;<?php echo $this->_tpl_vars['CHECKED_REMEMBER_DISPLAY']; ?>
"><input type="checkbox" <?php echo $this->_tpl_vars['CHECKED_REMEMBER']; ?>
 id="remember_me" name="remember_me"/>&nbsp;<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_REMEMBER_ME'), $this);?>
</label>
                                                </div>
                                                <div style="float: right;">         
                                                    <label style="font-size: 13px;"><?php echo smarty_function_sugar_translate(array('label' => 'LBL_LOGIN_FORGOT_PASSWORD'), $this);?>
&nbsp;<input type="checkbox" id="forgot_pass" name="forgot_pass"/></label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php echo $this->_tpl_vars['MESSAGE_REMEMBER']; ?>

                                    </tr>
                                    <tr>                                                                                                                                                                                               
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input title="<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_LOGIN_BUTTON_TITLE'), $this);?>
" class="button primary" class="button primary" type="submit" tabindex="3" id="login_button" name="Login" value="<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_LOGIN_BUTTON_LABEL'), $this);?>
"><br>&nbsp;
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <div id="forgot_password_dialog" style="display:none;">
                            <form action="index.php" method="post" name="fp_form" id="fp_form">
                                <input type="hidden" name="entryPoint" value="GeneratePassword">
                                <table cellpadding="0" cellspacing="2" border="0" align="center" width="90%">
                                    <tr>
                                        <td>
                                            <div style="position: relative;">
                                                <input type="text" id="fp_user_name" name="fp_user_name" value='<?php echo $this->_tpl_vars['LOGIN_USER_NAME']; ?>
' placeholder="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_USER_NAME'), $this);?>
" class="login-field"/>
                                                <label class="login-field-icon fa-user"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>                                                                                  
                                            <div style="position: relative;">
                                                <input type="text" id="fp_user_mail" name="fp_user_mail" value='' placeholder="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL'), $this);?>
" class="login-field"/>
                                                <label class="login-field-icon fa-envelope"></label>
                                            </div>
                                        </td>
                                    </tr> 
                                    <?php echo $this->_tpl_vars['CAPTCHA']; ?>

                                    <tr>                 
                                        <td>
                                            <div style="margin-top: 5px;">
                                                <div style="float: left;">
                                                    <div id='wait_pwd_generation'></div>
                                                </div>
                                                <div style="float: right;">
                                                    <label style="font-size: 13px;"><?php echo smarty_function_sugar_translate(array('label' => 'LBL_LOGIN_FORGOT_PASSWORD'), $this);?>
&nbsp;<input type="checkbox" id="forgot_pass_2" name="forgot_pass_2"/></label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            &nbsp;
                                        </td>
                                    </tr>                                                                                                                                                                                                                                          
                                    <tr>
                                        <td>
                                            <input title="Email Temp Password" class="button primary" type="button" style="display:inline" onclick="validateAndSubmit(); return document.getElementById('cant_login').value == ''" id="generate_pwd_button" name="fp_login" value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SEND_EMAIL_BUTTON_LABEL'), $this);?>
">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="loginBoxBottom">
                    <label style="font-size: small;">Powered by <a style="color: #4E69A2;" target="_blank" href="http://onlinecrm.vn">OnlineCRM</a></label>
                </div>
            </div>
        </td>
    </tr>
</table>
<br>
<br>