<?php
//require_once('nusoap/nusoap.php'); 
require_once("custom/modules/C_SMS/SMS/Connector.php");
class SMSSender{
    /**                
    * Function send a sms to target
    * 
    * @param mixed $phone_number  
    * @param mixed $content content of  sms
    * @return mixed 
    */

    function sendSMS($phone_number = '', $content = '', $parent_type = 'Users',$parent_id = '1', $team_id = ''){
        global $current_user;
        if (empty($team_id))
            $team_id = $current_user->team_id;

        $team = BeanFactory::getBean('Teams', $team_id);

        $sms_config = array();
        $sms_config = json_decode(html_entity_decode($team->sms_config),true);
        if (empty($team->sms_config)) return  0;
        if (empty($content)) return 0; 

        $phone_number = preg_replace("/&#?[a-z0-9]+;/i", '', $phone_number);
        $phone_number = preg_replace('/[^0-9]/', '', $phone_number);
        $phone_number = preg_replace('/\s+/', '', $phone_number);
        if(substr($phone_number,0 , 1) != '0' && substr($phone_number,0 , 2) != '84') $phone_number = '0'.$phone_number;
        $phone_number = (substr($phone_number,0 , 1) == '0') ? substr_replace($phone_number,'84',0,1) : $phone_number;

        $supplier = "other";
        $phoneNumberPrefix = $GLOBALS['app_list_strings']['phone_number_prefix_options'];
        foreach ($phoneNumberPrefix as $key => $value){
            if ((substr($phone_number,0 , 4) == $key) || (substr($phone_number,0 , 5) == $key))
                $supplier = $value;   
        }

        //Generate template to content - Bui Kim Tung 28/09/2015  
        if($parent_type != "Users"){  
            $content = last_parse_SMS($content, $parent_type, $parent_id);     
        }
        //Replace "test" to "t est" with Viettel
        if($supplier == 'viettel'){
            $content = str_replace("test", 't_est', $content);  
            $content = str_replace("Test", 'T_est', $content);  
            $content = str_replace("TEST", 'T_EST', $content);     
        }
        
        $content = self::viToEn($content);

        $ws_server 		= $sms_config['sms_ws_link'];
        $ws_pass 		= $sms_config['sms_ws_pass'];
        $ws_account 	= $sms_config['sms_ws_account'];
        $ws_brandname 	= $sms_config['sms_ws_brandname'];

        //Khóa chức năng gửi SMS
        //return "-1";

        // Edit by Tung Bui 01/12/2015 - Fix loi khong gui duoc SMS tren Junior
        $SMS_Provider = new SMS_Provider($ws_server,$ws_account,$ws_pass);
        $result = $SMS_Provider->send_sms($phone_number,$content,$ws_brandname);
        //$result = SMS_Provider::send_sms($phone_number,$content,$ws_brandname); Comment by Tung Bui - 01/12/2015
        return $result; 
    }
    // Convert Vietnamese to English
    public function viToEn($str){
        $str = html_entity_decode_utf8($str);
        $str=preg_replace('/(à|á|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ)/','a',$str);
        $str=preg_replace('/(Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ)/','A',$str);

        $str=preg_replace("/(é|è|ẻ|ẽ|ê|ế|ề|ể|ễ|ệ)/",'e',$str);
        $str=preg_replace("/(É|È|Ẻ|Ẽ|Ê|Ế|Ề|Ể|Ễ|Ệ)/",'E',$str);

        $str=preg_replace("/(í|ì|ỉ|ị|ĩ)/",'i',$str);
        $str=preg_replace("/(Í|Ì|Ỉ|Ĩ|Ị)/",'i',$str);

        $str=preg_replace("/(ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ)/",'o',$str);
        $str=preg_replace("/(Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ)/",'O',$str);

        $str=preg_replace("/(ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự)/",'u',$str);
        $str=preg_replace("/(Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự)/",'U',$str);

        $str=preg_replace("/(ý|ỳ|ỷ|ỹ|ỵ)/",'y',$str);
        $str=preg_replace("/(Ý|Ỳ|Ỷ|Ỹ|Ỵ)/",'Y',$str);

        $str=preg_replace("/(đ)/",'d',$str);
        $str=preg_replace("/(Đ)/",'D',$str);

        $str=preg_replace("/(`)/",'',$str);
        return $str;
    } 
}

?>
