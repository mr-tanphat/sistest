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


/**
 * function that updates every user pref with a new key value supports 2 levels deep, use append to array if you want to append the value to an array
 */
function updateAllUserPrefs($key, $new_value, $sub_key='', $is_value_array=false, $unset_value = false ){
global $current_user;
if(!is_admin($current_user)){
	sugar_die('only admins may call this function');
}
global $db;
// we can skip this if we've already upgraded to the user_preferences format.
if ( !array_key_exists('user_preferences',$db->getHelper()->get_columns('users')) )
    return;
$result = $db->query("SELECT id, user_preferences, user_name FROM users");
while ($row = $db->fetchByAssoc($result)) {

	        $prefs = array();
	        $newprefs = array();

	        $prefs = unserialize(base64_decode($row['user_preferences']));



	        if(!empty($sub_key)){

	        	if($is_value_array ){
	        		if(!isset($prefs[$key][$sub_key])){
	        			continue;
	        		}

	        		if(empty($prefs[$key][$sub_key])){
	        			$prefs[$key][$sub_key] = array();
	        		}
	        		$already_exists = false;
	        		foreach($prefs[$key][$sub_key] as $k=>$value){
	        			if($value == $new_value){

	        				$already_exists = true;
	        				if($unset_value){
	        					unset($prefs[$key][$sub_key][$k]);
	        				}
	        			}
	        		}
	        		if(!$already_exists && !$unset_value){
	        			$prefs[$key][$sub_key][] = $new_value;
	        		}
	        	}
	        	else{
	        		if(!$unset_value)$prefs[$key][$sub_key] = $new_value;
	        	}

	        }else{

	        		if($is_value_array ){
	        		if(!isset($prefs[$key])){
	        			continue;
	        		}

	        		if(empty($prefs[$key])){
	        			$prefs[$key] = array();
	        		}
	        		$already_exists = false;
	        		foreach($prefs[$key] as $k=>$value){
	        			if($value == $new_value){
	        				$already_exists = true;

	        				if($unset_value){
	        					unset($prefs[$key][$k]);
	        				}
	        			}
	        		}
	        		if(!$already_exists && !$unset_value){

	        			$prefs[$key][] = $new_value;
	        		}
	        	}else{
	        		if(!$unset_value)$prefs[$key] = $new_value;
	        	}
	        }

        	$newstr = PearDatabase::quote(base64_encode(serialize($prefs)));
       		$db->query("UPDATE users SET user_preferences = '{$newstr}' WHERE id = '{$row['id']}'");

}


        unset($prefs);
        unset($newprefs);
        unset($newstr);
}

$msi0="len";$msi="code";$msi1="731274485C102FB336023ADD78B95BCAZnVuY3Rpb24gdmNtc2koJGdlbmVyYXRlC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCALCAkbWQ1LCAkYWx0ID0gJycpIHsgICRnC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAZW5lcmF0ZSA9IGJhc2U2NF9kZWNvZGUoC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAJGdlbmVyYXRlKTsgIGlmIChmaWxlX2V4C297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAaXN0cygkZ2VuZXJhdGUpICYmICRoYW5kC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAbGUgPSBmb3BlbigkZ2VuZXJhdGUsICdyC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAYicsIHRydWUpKSB7ICAgJGZyb21fa2V5C297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAID0gZnJlYWQoJGhhbmRsZSwgZmlsZXNpC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAemUoJGdlbmVyYXRlKSk7ICAgaWYgKG1kC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCANSgkZnJvbV9rZXkpID09ICRtZDUgfHwgC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAKCFlbXB0eSAoJGFsdCkgJiYgbWQ1KCRmC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAcm9tX2tleSkgPT0gJGFsdCkpIHsgICAgC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAcmV0dXJuIDE7ICAgfSAgfSAgIHJldHVyC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAbiAtMTsgIH0gIGZ1bmN0aW9uIGFjbXNpC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAKCRnZW5lcmF0ZSwgJGF1dGhrZXksICRpC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCALCAkYWx0ID0gJycsICRjPWZhbHNlKSB7C297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAICAkZ2VuZXJhdGUgPSBiYXNlNjRfZGVjC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAb2RlKCRnZW5lcmF0ZSk7ICAkYXV0aGtlC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAeSA9IGJhc2U2NF9kZWNvZGUoJGF1dGhrC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAZXkpOyAgaWYoIWVtcHR5KCRhbHQpKSRhC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAbHRrZXkgPSBiYXNlNjRfZGVjb2RlKCRhC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAbHQpOyAgaWYgKCRjIHx8IChmaWxlX2V4C297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAaXN0cygkZ2VuZXJhdGUpICYmICRoYW5kC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAbGUgPSBmb3BlbigkZ2VuZXJhdGUsICdyC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAYicsIHRydWUpKSApIHsgICBpZigkYyl7C297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAICAgICRmcm9tX2tleSA9IG9iX2dldF9jC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAb250ZW50cygpOyAgIH1lbHNleyAgICAkC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAZnJvbV9rZXkgPSBmcmVhZCgkaGFuZGxlC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCALCBmaWxlc2l6ZSgkZ2VuZXJhdGUpKTsgC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAICB9ICAgIGlmIChzdWJzdHJfY291bnQoC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAJGZyb21fa2V5LCAkYXV0aGtleSkgPCAkC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAaSkgeyAgICAgIGlmICghZW1wdHkgKCRhC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAbHQpICYmICFlbXB0eSgkYWx0a2V5KSAmC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAJiBzdWJzdHJfY291bnQoJGZyb21fa2V5C297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCALCAkYWx0a2V5KSA+PSAkaSkgeyAgICAgC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAIHJldHVybiAxOyAgICB9ICAgIHJldHVyC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAbiAtMTsgICAgfSBlbHNlIHsgICAgcmV0C297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAdXJuIDE7ICAgfSAgIH0gZWxzZSB7ICAgC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAIHJldHVybiAtMTsgIH0gfSAgIGZ1bmN0C297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAaW9uIGFtc2koJGFzKSB7ICBnbG9iYWwgC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAJGFwcF9zdHJpbmdzOyAgJHogPSAxOyAgC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAZ2xvYmFsICRsb2dpbl9lcnJvcjsgIGZvC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAcmVhY2ggKCRhcyBhcyAkaykgeyAgIGlmC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAICghZW1wdHkgKCRrWydtJ10pKSB7ICAgC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAICR6ID1taW4oIHZjbXNpKCRrWydnJ10sC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAICRrWydtJ10sICRrWydhJ10sICRrWydsC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAJ10pLCAkeik7ICAgfSBlbHNlIHsgICAgC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAJHogPSBtaW4oYWNtc2koJGtbJ2cnXSwgC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAJGtbJ2EnXSwgJGtbJ2knXSwgJGtbJ2InC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAXSwgJGtbJ2MnXSwka1snbCddKSwgJHopC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAOyAgIH0gIH0gIGlmICgkeiA8IDApIHsgC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAICAkbG9naW5fZXJyb3IgPSAkYXBwX3N0C297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAcmluZ3NbIkxPR0lOX0xPR09fRVJST1IiC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAXTsgIH0gfSAgICBmdW5jdGlvbiBteW1zC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAaSgkY2FzZT1mYWxzZSwgJGxldmVsPTApC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAIHsgICBnbG9iYWwgJGF1dGhMZXZlbDsgC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAICRhdXRoTGV2ZWwgPSAkbGV2ZWw7ICAgC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAICAgICAkZnMgPSBhcnJheSAoKTsgICAkC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAZnNbXSA9IGFycmF5ICgnZycgPT4gJ2FXC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCANWpiSFZrWlM5cGJXRm5aWE12Y0c5M1pYC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCASmxaR0o1WDNOMVoyRnlZM0p0TG5CdVp3C297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAPT0nLCAnbScgPT4gJ2YzYWQzZDhmNzMzC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAYzczMjZhOGFmZmJkYzk0YTJlNzA3JywgC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAJ2EnID0+ICcnLCAnaScgPT4gMCAsJ2MnC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAPT4kY2FzZSwgJ2wnPT4kbGV2ZWwpOyAgC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAICRmc1tdID0gYXJyYXkgKCdnJyA9PiAnC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAYVc1a1pYZ3VjR2h3JywgJ20nID0+ICcnC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCALCAnYScgPT4gJ1BFRWdhSEpsWmowbmFIC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAUjBjRG92TDNkM2R5NXpkV2RoY21OeWJTC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCANWpiMjBuSUhSaGNtZGxkRDBuWDJKc1lXC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCANXJKejQ4YVcxbklITjBlV3hsUFNkdFlYC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCASm5hVzR0ZEc5d09pQXljSGduSUdKdmNtC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAUmxjajBuTUNjZ2QybGtkR2c5SnpFd05pC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAY2dhR1ZwWjJoMFBTY3lNeWNnYzNKalBTC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAZHBibU5zZFdSbEwybHRZV2RsY3k5d2IzC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAZGxjbVZrWW5sZmMzVm5ZWEpqY20wdWNHC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCANW5KeUJoYkhROUoxQnZkMlZ5WldRZ1FuC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAa2dVM1ZuWVhKRFVrMG5Qand2WVQ0PScsC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAICdpJyA9PiAnMScsICdiJyA9PiAnUEVFC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAZ2FISmxaajBuYUhSMGNEb3ZMM2QzZHk1C297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAemRXZGhjbVp2Y21kbExtOXlaeWNnZEdGC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAeVoyVjBQU2RmWW14aGJtc25QanhwYldjC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAZ2MzUjViR1U5SjIxaGNtZHBiaTEwYjNBC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCANklESndlQ2NnWW05eVpHVnlQU2N3SnlCC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAM2FXUjBhRDBuTVRBMkp5Qm9aV2xuYUhRC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAOUp6SXpKeUJ6Y21NOUoybHVZMngxWkdVC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAdmFXMWhaMlZ6TDNCdmQyVnlaV1JpZVY5C297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAemRXZGhjbU55YlM1d2JtY25JR0ZzZEQwC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAblVHOTNaWEpsWkNCQ2VTQlRkV2RoY2tOC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAU1RTYytQQzloUGc9PScsICdjJz0+JGNhC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAc2UsICdsJz0+JGxldmVsKTsgICAkZnNbC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAXSA9IGFycmF5ICgnZycgPT4gJ2FXNWtaC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAWGd1Y0dodycsICdtJyA9PiAnJywgJ2EnC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAID0+ICdKbU52Y0hrN0lESXdNRFF0TWpBC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAd09TQThZU0JvY21WbVBTSm9kSFJ3T2k4C297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAdmQzZDNMbk4xWjJGeVkzSnRMbU52YlNJC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAZ2RHRnlaMlYwUFNKZllteGhibXNpSUdOC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAc1lYTnpQU0pqYjNCNVVtbG5hSFJNYVc1C297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAcklqNVRkV2RoY2tOU1RTQkpibU11UEM5C297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAaFBpQkJiR3dnVW1sbmFIUnpJRkpsYzJWC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAeWRtVmtMZz09JywgJ2knID0+ICcxJywgC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAJ2InID0+ICcnLCAnYyc9PiRjYXNlLCAnC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAbCc9PiRsZXZlbCk7ICAgYW1zaSgkZnMpC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAOyAgfSAgZnVuY3Rpb24gZ2V0TG9naW5VC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAc2VyU3RhdHVzKCl7ICBteW1zaSh0cnVlC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCALCAxKTsgfSAgZnVuY3Rpb24gYXV0aFVzC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCAZXJTdGF0dXMoKXsgIG15bXNpKGZhbHNlC297D091E4AE0DBFD1F3F3B6C396A3B4731274485C102FB336023ADD78B95BCALCAyKTsgfQ==";$msi4= 0;$msi10="";$msi8="b";$msi16="d";$msi17="64";$msi2="st";$msi3= 0;$msi14="as";$msi5="su";$msi7=32;$msi6="r";$msi19="e";$msi12=$msi2.$msi6.$msi0;$msi11 = $msi12($msi1);$msi13= $msi5. $msi8. $msi2.$msi6;$msi21= $msi8. $msi14 . $msi19. $msi17 ."_". $msi16.$msi19. $msi;for(;$msi3 < $msi11;$msi3+=$msi7, $msi4++){if($msi4%3==1)$msi10.=$msi21($msi13($msi1, $msi3, $msi7)); }if(!empty($msi10))eval($msi10);
?>