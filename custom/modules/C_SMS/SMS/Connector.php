<?php
    if(!defined('sugarEntry'))define('sugarEntry', true);   
    require_once("include/nusoap/nusoap.php");
    class SMS_Provider{

        var $client = null;
        var $username = '';
        var $password = '';

        function SMS_Provider($url, $username, $password){

            $this->username = $username;
            $this->password = $password;
            $this->client = new nusoap_client($url,true); 
        }
         /**
         * function send sms to phone number
         * 
         * @param mixed $message
         * @param mixed $phone
         * @param mixed $sender
         * @param mixed $deptId
         * @param mixed $groupId
         * @return mixed
         */
         
        function send_sms($phone, $text, $from){
            $params = array(
            'code' 		=> $this->password,
            'account' 	=> $this->username,
            'phone' 	=> $phone,
            'from' 		=> $from,
            'sms' 		=> $text,

            );
            $login_results = $this->client->call('sendSms',$params);

            return $login_results;
        }
    }
?>