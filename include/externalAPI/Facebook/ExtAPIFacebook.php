<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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

require_once('include/externalAPI/Base/ExternalAPIBase.php');
require_once('include/externalAPI/Base/WebFeed.php');


class ExtAPIFacebook extends ExternalAPIBase implements WebFeed {
    // It's not the normal oauth, but it works close enough.
    public $authMethod = 'oauth';
    public $useAuth = true;
    public $requireAuth = true;
    protected $authData;
    public $needsUrl = false;
    public $supportedModules = array('SugarFeed');
    public $connector = "ext_eapm_facebook";

    protected $oauthParams = array(
    	'signatureMethod' => 'HMAC-SHA1',
    );

    public function checkLogin($eapmBean = null)
    {
        $reply = parent::checkLogin($eapmBean);

        if ( !$reply['success'] ) {
            return $reply;
        }

        if ( ! $this->setupFacebookLib() ) {
            // FIXME: Translate
            return array('success'=>FALSE,'errorMessage'=>'Facebook does not have the required libraries.');
        }

        $GLOBALS['log']->debug('Checking login.');


        if ( empty($this->eapmBean->oauth_secret) ) {
            // We must be saving, try re-authing
            $GLOBALS['log']->debug('We must be saving.');
            $fbToken = $this->fb->getAccessToken();
            if ( $this->fb->getUser() != 0 ) {
                $GLOBALS['log']->debug('Have a session from facebook: '.$fbToken);

                if ( !empty($fbToken) ) {
                    $GLOBALS['log']->debug('Have a VALID session from facebook:'.print_r($fbToken,true));
                    // Put a string in here so we can tell when it resets it.
                    $this->eapmBean->oauth_secret = 'SECRET';
                    $this->eapmBean->api_data = json_encode(array('fbToken'=>$fbToken));
                    $this->eapmBean->validated = 1;
                    $this->eapmBean->save();
                    return array('success'=>true);
                } else {
                    // FIXME: Translate
                    $GLOBALS['log']->error('Have an INVALID session from facebook:'.print_r($fbToken,true));
                    return array('success'=>false,'errorMessage'=>'No authentication.');
                }
            } else {
                $callback_url = $GLOBALS['sugar_config']['site_url'].'/index.php?module=EAPM&action=oauth&record='.$this->eapmBean->id;
	            $callback_url = $this->formatCallbackURL($callback_url);
                $loginUrl = $this->fb->getLoginUrl(array('next'=>$callback_url,'cancel'=>$callback_url, 'scope' => 'read_stream,offline_access'));
                SugarApplication::redirect($loginUrl);
                return array('success'=>false);
            }
        }

        return $reply;
    }

    public function loadEAPM($eapmBean)
    {
        parent::loadEAPM($eapmBean);

        if ( !empty($eapmBean->api_data) ) {
            $api_data = json_decode(html_entity_decode($eapmBean->api_data),true);
            if ( isset($api_data['fbToken']) ) {
                $this->fbToken = $api_data['fbToken'];
            }
        }
    }


	public function getLatestUpdates($maxTime, $maxEntries)
    {
        $td = $GLOBALS['timedate'];

        try {
            if ( ! $this->setupFacebookLib() ) {
                // FIXME: Translate
                return array('success'=>FALSE,'errorMessage'=>'Facebook does not have the required libraries.');
            }
            $fbMessages = $this->fb->api('/me/home?limit='.$maxEntries, 'GET');
        }
        catch (FacebookApiException $e)
        {
            $msg = $e->getMessage();
            if (!empty($msg))
            {
                $msg = ' (' . $msg . ')';
            }

            // We should ask user about second login to facebook because our access_token is dead.
            if ($e->getType() == 'OAuthException' && !empty($this->eapmBean->id))
            {
                unset($_SESSION['fb_'.$this->fb->getAppId().'_code']);
                unset($_SESSION['fb_'.$this->fb->getAppId().'_access_token']);
                unset($_SESSION['fb_'.$this->fb->getAppId().'_user_id']);

                return array(
                    'success' => true,
                    'messages' => array(
                        array(
                            'ID' => create_guid(),
                            'sort_key' => time(),
                            'NAME' => translate('LBL_ERR_OAUTH_FACEBOOK_1', 'EAPM') . ' <a href="#" onclick="window.open(\'index.php?module=EAPM&amp;refreshParentWindow=1&amp;closeWhenDone=1&amp;action=QuickSave&amp;application=Facebook\',\'EAPM\');">' . translate('LBL_ERR_OAUTH_FACEBOOK_2', 'EAPM') . '</a>'.$msg.'.'
                        )
                    )
                );
            }

            $GLOBALS['log']->error('Facebook Error: '.$e->getMessage());
            return array('success'=>FALSE,'errorMessage'=>translate('LBL_ERR_FACEBOOK', 'EAPM') . $msg);
        }

        if ( !isset($fbMessages['data'][0]) ) {
            return array('success'=>TRUE,'messages'=>array());
        }

        $messages = array();
        foreach ( $fbMessages['data'] as $message ) {
            if ( empty($message['message']) ) {
                continue;
            }
            $unix_time = strtotime($message['created_time']);

            $fake_record = array();
            $fake_record['sort_key'] = $unix_time;
            $fake_record['ID'] = create_guid();
            $fake_record['DATE_ENTERED'] = $td->to_display_date_time(gmdate('Y-m-d H:i:s',$unix_time));
            $fake_record['NAME'] = $message['from']['name'].'</b>';
            if ( !empty($message['message']) ) {
                $fake_record['NAME'] .= ' '.$message['message'];
            }
            if ( !empty($message['picture'])) {
                $fake_record['NAME'] .= '<br><!--not_in_theme!--><img src="'.$message['picture'].'" height=50>';
            }
            $fake_record['NAME'] .= '<br><div class="byLineBox"><span class="byLineLeft">'.SugarFeed::getTimeLapse($fake_record['DATE_ENTERED']).'&nbsp;</span><div class="byLineRight">&nbsp;</div></div>';
            $fake_record['IMAGE_URL'] = "https://graph.facebook.com/".$message['from']['id'].'/picture';

            $messages[] = $fake_record;
        }


        return array('success'=>TRUE,'messages'=>$messages);
    }

    // Internal functions
    protected function setupFacebookLib()
    {
        try {
            // This will throw exceptions if either the curl or json libraries aren't available.
            require_once('include/externalAPI/Facebook/facebook.php');

        } catch ( Exception $e ) { return false; }

        if(empty($this->oauthParams['consumerKey']) || empty($this->oauthParams['consumerSecret'])){
           $this->loadConnectorProperties();
        }
        $this->fb = new Facebook(array(
                                        'appId' => $this->oauthParams['consumerKey'],
                                        'secret' => $this->oauthParams['consumerSecret'],
                                        'cookie' => false,
                                        ));
        try {
            if ( isset($this->fbToken) ) {
                $this->fb->setAccessToken($this->fbToken);
            }
        } catch ( Exception $e ) {}
        return true;
    }

    protected function loadConnectorProperties(){
        $connector = $this->getConnector();
        if(!empty($connector)) {
            $cons_key = $connector->getProperty('oauth_consumer_key');
            if(!empty($cons_key)) {
                $this->oauthParams['consumerKey'] = $cons_key;
            }
            $cons_secret = $connector->getProperty('oauth_consumer_secret');
            if(!empty($cons_secret)) {
                $this->oauthParams['consumerSecret'] = $cons_secret;
            }
        }
    }
}
