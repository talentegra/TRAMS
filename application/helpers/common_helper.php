<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


/*
 * Function name : get_cust_type
 * Purpose : fetch cust type by user id
 * Created by: Asmitha
 * Created On: 05-04-2016
 */

function get_cust_type($user_id) {
    $CI = &get_instance();
    $CI->db->select("org_id");
    $CI->db->where('id', $user_id);
    $query = $CI->db->get('dq_user');
    //echo "<br> str ".$CI->db->last_query();exit;
    if ($query->num_rows() > 0) {
        $data = $query->result_array();
        return $data[0]['org_id'];
    } else {
        return 0;
    }
}

/*
 * Function name : get_user_id_by_mobile
 * Purpose : fetch user id by mobile 
 * Created by: Asmitha
 * Created On: 05-04-2016
 */

function get_user_id_by_mobile($mobile_no) {
    $CI = &get_instance();
    $CI->db->select("*");
    $CI->db->join('dq_user','dq_user.id = user_mobile.user_id AND dq_user.default_mobile_no = user_mobile.id ','LEFT');
    $CI->db->where('mobile_no', $mobile_no);
    $query = $CI->db->get('user_mobile');
    //echo "<br> str ".$CI->db->last_query();exit;
    if ($query->num_rows() > 0) {
        $data = $query->result_array();
        return $data[0];
    } else {
        return 'failure';
    }
}

/*
 * Function name : get_user_id_by_email
 * Purpose : fetch user id by email
 * Created by: Asmitha
 * Created On: 05-04-2016
 */

function get_user_id_by_email($email_id) {
    $CI = &get_instance();
    $CI->db->select("*,user_email.id as user_email_id");
    $CI->db->join('dq_user','dq_user.id = user_email.user_id AND dq_user.default_email_id = user_email.id','LEFT');
    $CI->db->where('address', $email_id);
    $query = $CI->db->get('user_email');
    //echo "<br> str ".$CI->db->last_query();exit;
    if ($query->num_rows() > 0) {
        $data = $query->result_array();
        return $data[0];
    } else {
        return 'failure';
    }
}

/*
 * Function name : get_details_by_pincode
 * Purpose : fetch user id by pincode
 * Created by: Asmitha
 * Created On: 05-04-2016
 */

function get_details_by_pincode($pincode) {
    $CI = &get_instance();
    $CI->db->select("*");
    $CI->db->where('postcode', $pincode);
    $query = $CI->db->get('customer_site');
    //echo "<br> str ".$CI->db->last_query();exit;
    if ($query->num_rows() > 0) {
        $data = $query->result_array();
        return $data[0];
    } else {
        return 'failure';
    }
}

/*
 * Function name : get_user_id_by_email
 * Purpose : fetch user id by email
 * Created by: Asmitha
 * Created On: 05-04-2016
 */

function get_email_id_by_user($user_id) {
    $CI = &get_instance();
    $CI->db->select("*");
    $CI->db->where('user_id', $user_id);
    $query = $CI->db->get('user_email');
    //echo "<br> str ".$CI->db->last_query();exit;
    if ($query->num_rows() > 0) {
        $data = $query->result_array();
        return $data[0];
    } else {
        return 'failure';
    }
}

/*
 * Function name : get_user_id_by_email
 * Purpose : fetch user id by email
 * Created by: Asmitha
 * Created On: 05-04-2016
 */

function get_staff_manager_details($manager_id) {
    $CI = &get_instance();
    $CI->db->select("*");
    $CI->db->where('staff_id', $manager_id);
    $query = $CI->db->get('staff');
    //echo "<br> str ".$CI->db->last_query();exit;
    if ($query->num_rows() > 0) {
        $data = $query->result_array();
        return $data[0];
    } else {
        return '';
    }
}

/*
 * Function name : get_company_id
 * Purpose : fetch id by company name
 * Created by: Asmitha
 * Created On: 05-04-2016
 */

function get_company_id($company_name) {
    $CI = &get_instance();
    $CI->db->select("id");
    $CI->db->where('name', $company_name);
    $query = $CI->db->get('customer');
    //echo "<br> str ".$CI->db->last_query();exit;
    if ($query->num_rows() > 0) {
        $data = $query->result_array();
        return $data[0]['id'];
    } else {
        return 0;
    }
}

/*
 * Function name : check_email_exists
 * Purpose : check_email_exists
 * Created by: Asmitha
 * Created On: 05-04-2016
 */

function check_email_exists($email) {
    $CI = &get_instance();
    $CI->db->select("*");
    $CI->db->where('address', $email);
    $query = $CI->db->get('user_email');
    //echo "<br> str ".$CI->db->last_query();exit;
    if ($query->num_rows() > 0) {
        $data = $query->result_array();
        return $data[0]['id'];
    } else {
        return 0;
    }
}

/*
 * Function name : check_mobile_exists
 * Purpose : check_mobile_exists
 * Created by: Asmitha
 * Created On: 05-04-2016
 */

function check_mobile_exists($mobile) {
    $CI = &get_instance();
    $CI->db->select("*");
    $CI->db->where('mobile_no', $mobile);
    $query = $CI->db->get('user_mobile');
    //echo "<br> str ".$CI->db->last_query();exit;
    if ($query->num_rows() > 0) {
        $data = $query->result_array();
        return $data[0]['id'];
    } else {
        return 0;
    }
}

/*
 * Function name : check_user_site_exists
 * Purpose : check_mobile_exists
 * Created by: Asmitha
 * Created On: 05-04-2016
 */

function check_user_site_exists($user_id,$site_id,$cust_id) {
    $CI = &get_instance();
    $CI->db->select("*");
    $CI->db->where('user_id', $user_id);
    $CI->db->where('site_id', $site_id);
    $CI->db->where('cust_id', $cust_id);
    $query = $CI->db->get('user_customer_site');
    //echo "<br> str ".$CI->db->last_query();exit;
    if ($query->num_rows() > 0) {
        $data = $query->result_array();
        return $data[0]['user_id'];
    } else {
        return 0;
    }
}

/*
 * Function name : check_overdue_exists
 * Purpose : check_overdue_exists
 * Created by: Asmitha
 * Created On: 05-04-2016
 */

function check_overdue_exists($ticket_id) {
    $CI = &get_instance();
    $CI->db->select("approval_type");
    $CI->db->where('ticket_id', $ticket_id);
    $CI->db->where('approval_type', 'overdue_response');
    $CI->db->or_where('approval_type', 'overdue_resolution');
    
    $query = $CI->db->get(' ticket_approval');
    //echo "<br> str ".$CI->db->last_query();exit;
    if ($query->num_rows() > 0) {
        $data = $query->result_array();
        return $data;
    } else {
        return 0;
    }
}

/*
 * Function name : get_all_dept_details
 * Purpose : get_all_dept_details
 * Created by: Shilpa
 * Created On: 09-06-2016
 */

function get_all_dept_details() {
	$CI = &get_instance();
	$CI->db->order_by('id', 'DESC');
    return $CI->db->get('department')->result_array();
}

/*
 * Function name : get_all_ticket_status_details
 * Purpose : get_all_ticket_status_details
 * Created by: Shilpa
 * Created On: 09-06-2016
 */

function get_all_ticket_status_details() {
	$CI = &get_instance();
	$CI->db->where('flags', 1);
    return $CI->db->get('ticket_status')->result_array();
}

/*
 * Function name : get_all_ticket_priority_details
 * Purpose : get_all_ticket_priority_details
 * Created by: Shilpa
 * Created On: 09-06-2016
 */

function get_all_ticket_priority_details() {
	$CI = &get_instance();
	$CI->db->order_by('priority_id', 'DESC');
    return $CI->db->get('ticket_priority')->result_array();
}

/*
 * Function name : get_all_city_details
 * Purpose : get_all_city_details
 * Created by: Shilpa
 * Created On: 09-06-2016
 */

function get_all_city_details() {
	$CI = &get_instance();
	$CI->db->order_by('city_id', 'DESC');
    return $CI->db->get('city')->result_array();
}

/*
 * Function name : get_all_city_details
 * Purpose : get_all_city_details
 * Created by: Shilpa
 * Created On: 09-06-2016
 */
function generate_timezone_list()
{
    static $regions = array(
        DateTimeZone::AFRICA,
        DateTimeZone::AMERICA,
        DateTimeZone::ANTARCTICA,
        DateTimeZone::ASIA,
        DateTimeZone::ATLANTIC,
        DateTimeZone::AUSTRALIA,
        DateTimeZone::EUROPE,
        DateTimeZone::INDIAN,
        DateTimeZone::PACIFIC,
    );

    $timezones = array();
    foreach( $regions as $region )
    {
        $timezones = array_merge( $timezones, DateTimeZone::listIdentifiers( $region ) );
    }

    $timezone_offsets = array();
    foreach( $timezones as $timezone )
    {
        $tz = new DateTimeZone($timezone);
        $timezone_offsets[$timezone] = $tz->getOffset(new DateTime);
    }

    // sort timezone by offset
    asort($timezone_offsets);

    $timezone_list = array();
    foreach( $timezone_offsets as $timezone => $offset )
    {
        $offset_prefix = $offset < 0 ? '-' : '+';
        $offset_formatted = gmdate( 'H:i', abs($offset) );

        $pretty_offset = "UTC${offset_prefix}${offset_formatted}";

        $timezone_list[$timezone] = "(${pretty_offset}) $timezone";
    }

    return $timezone_list;
}

/*
 * Function name : generate_locale_list
 * Purpose : generate_locale_list
 * Created by: Shilpa
 * Created On: 09-06-2016
 */
function generate_locale_list()
{
return array(
    'aa_DJ' => 'Afar (Djibouti)',
    'aa_ER' => 'Afar (Eritrea)',
    'aa_ET' => 'Afar (Ethiopia)',
    'af_ZA' => 'Afrikaans (South Africa)',
    'sq_AL' => 'Albanian (Albania)',
    'sq_MK' => 'Albanian (Macedonia)',
    'am_ET' => 'Amharic (Ethiopia)',
    'ar_DZ' => 'Arabic (Algeria)',
    'ar_BH' => 'Arabic (Bahrain)',
    'ar_EG' => 'Arabic (Egypt)',
    'ar_IN' => 'Arabic (India)',
    'ar_IQ' => 'Arabic (Iraq)',
    'ar_JO' => 'Arabic (Jordan)',
    'ar_KW' => 'Arabic (Kuwait)',
    'ar_LB' => 'Arabic (Lebanon)',
    'ar_LY' => 'Arabic (Libya)',
    'ar_MA' => 'Arabic (Morocco)',
    'ar_OM' => 'Arabic (Oman)',
    'ar_QA' => 'Arabic (Qatar)',
    'ar_SA' => 'Arabic (Saudi Arabia)',
    'ar_SD' => 'Arabic (Sudan)',
    'ar_SY' => 'Arabic (Syria)',
    'ar_TN' => 'Arabic (Tunisia)',
    'ar_AE' => 'Arabic (United Arab Emirates)',
    'ar_YE' => 'Arabic (Yemen)',
    'an_ES' => 'Aragonese (Spain)',
    'hy_AM' => 'Armenian (Armenia)',
    'as_IN' => 'Assamese (India)',
    'ast_ES' => 'Asturian (Spain)',
    'az_AZ' => 'Azerbaijani (Azerbaijan)',
    'az_TR' => 'Azerbaijani (Turkey)',
    'eu_FR' => 'Basque (France)',
    'eu_ES' => 'Basque (Spain)',
    'be_BY' => 'Belarusian (Belarus)',
    'bem_ZM' => 'Bemba (Zambia)',
    'bn_BD' => 'Bengali (Bangladesh)',
    'bn_IN' => 'Bengali (India)',
    'ber_DZ' => 'Berber (Algeria)',
    'ber_MA' => 'Berber (Morocco)',
    'byn_ER' => 'Blin (Eritrea)',
    'bs_BA' => 'Bosnian (Bosnia and Herzegovina)',
    'br_FR' => 'Breton (France)',
    'bg_BG' => 'Bulgarian (Bulgaria)',
    'my_MM' => 'Burmese (Myanmar [Burma])',
    'ca_AD' => 'Catalan (Andorra)',
    'ca_FR' => 'Catalan (France)',
    'ca_IT' => 'Catalan (Italy)',
    'ca_ES' => 'Catalan (Spain)',
    'zh_CN' => 'Chinese (China)',
    'zh_HK' => 'Chinese (Hong Kong SAR China)',
    'zh_SG' => 'Chinese (Singapore)',
    'zh_TW' => 'Chinese (Taiwan)',
    'cv_RU' => 'Chuvash (Russia)',
    'kw_GB' => 'Cornish (United Kingdom)',
    'crh_UA' => 'Crimean Turkish (Ukraine)',
    'hr_HR' => 'Croatian (Croatia)',
    'cs_CZ' => 'Czech (Czech Republic)',
    'da_DK' => 'Danish (Denmark)',
    'dv_MV' => 'Divehi (Maldives)',
    'nl_AW' => 'Dutch (Aruba)',
    'nl_BE' => 'Dutch (Belgium)',
    'nl_NL' => 'Dutch (Netherlands)',
    'dz_BT' => 'Dzongkha (Bhutan)',
    'en_AG' => 'English (Antigua and Barbuda)',
    'en_AU' => 'English (Australia)',
    'en_BW' => 'English (Botswana)',
    'en_CA' => 'English (Canada)',
    'en_DK' => 'English (Denmark)',
    'en_HK' => 'English (Hong Kong SAR China)',
    'en_IN' => 'English (India)',
    'en_IE' => 'English (Ireland)',
    'en_NZ' => 'English (New Zealand)',
    'en_NG' => 'English (Nigeria)',
    'en_PH' => 'English (Philippines)',
    'en_SG' => 'English (Singapore)',
    'en_ZA' => 'English (South Africa)',
    'en_GB' => 'English (United Kingdom)',
    'en_US' => 'English (United States)',
    'en_ZM' => 'English (Zambia)',
    'en_ZW' => 'English (Zimbabwe)',
    'eo' => 'Esperanto',
    'et_EE' => 'Estonian (Estonia)',
    'fo_FO' => 'Faroese (Faroe Islands)',
    'fil_PH' => 'Filipino (Philippines)',
    'fi_FI' => 'Finnish (Finland)',
    'fr_BE' => 'French (Belgium)',
    'fr_CA' => 'French (Canada)',
    'fr_FR' => 'French (France)',
    'fr_LU' => 'French (Luxembourg)',
    'fr_CH' => 'French (Switzerland)',
    'fur_IT' => 'Friulian (Italy)',
    'ff_SN' => 'Fulah (Senegal)',
    'gl_ES' => 'Galician (Spain)',
    'lg_UG' => 'Ganda (Uganda)',
    'gez_ER' => 'Geez (Eritrea)',
    'gez_ET' => 'Geez (Ethiopia)',
    'ka_GE' => 'Georgian (Georgia)',
    'de_AT' => 'German (Austria)',
    'de_BE' => 'German (Belgium)',
    'de_DE' => 'German (Germany)',
    'de_LI' => 'German (Liechtenstein)',
    'de_LU' => 'German (Luxembourg)',
    'de_CH' => 'German (Switzerland)',
    'el_CY' => 'Greek (Cyprus)',
    'el_GR' => 'Greek (Greece)',
    'gu_IN' => 'Gujarati (India)',
    'ht_HT' => 'Haitian (Haiti)',
    'ha_NG' => 'Hausa (Nigeria)',
    'iw_IL' => 'Hebrew (Israel)',
    'he_IL' => 'Hebrew (Israel)',
    'hi_IN' => 'Hindi (India)',
    'hu_HU' => 'Hungarian (Hungary)',
    'is_IS' => 'Icelandic (Iceland)',
    'ig_NG' => 'Igbo (Nigeria)',
    'id_ID' => 'Indonesian (Indonesia)',
    'ia' => 'Interlingua',
    'iu_CA' => 'Inuktitut (Canada)',
    'ik_CA' => 'Inupiaq (Canada)',
    'ga_IE' => 'Irish (Ireland)',
    'it_IT' => 'Italian (Italy)',
    'it_CH' => 'Italian (Switzerland)',
    'ja_JP' => 'Japanese (Japan)',
    'kl_GL' => 'Kalaallisut (Greenland)',
    'kn_IN' => 'Kannada (India)',
    'ks_IN' => 'Kashmiri (India)',
    'csb_PL' => 'Kashubian (Poland)',
    'kk_KZ' => 'Kazakh (Kazakhstan)',
    'km_KH' => 'Khmer (Cambodia)',
    'rw_RW' => 'Kinyarwanda (Rwanda)',
    'ky_KG' => 'Kirghiz (Kyrgyzstan)',
    'kok_IN' => 'Konkani (India)',
    'ko_KR' => 'Korean (South Korea)',
    'ku_TR' => 'Kurdish (Turkey)',
    'lo_LA' => 'Lao (Laos)',
    'lv_LV' => 'Latvian (Latvia)',
    'li_BE' => 'Limburgish (Belgium)',
    'li_NL' => 'Limburgish (Netherlands)',
    'lt_LT' => 'Lithuanian (Lithuania)',
    'nds_DE' => 'Low German (Germany)',
    'nds_NL' => 'Low German (Netherlands)',
    'mk_MK' => 'Macedonian (Macedonia)',
    'mai_IN' => 'Maithili (India)',
    'mg_MG' => 'Malagasy (Madagascar)',
    'ms_MY' => 'Malay (Malaysia)',
    'ml_IN' => 'Malayalam (India)',
    'mt_MT' => 'Maltese (Malta)',
    'gv_GB' => 'Manx (United Kingdom)',
    'mi_NZ' => 'Maori (New Zealand)',
    'mr_IN' => 'Marathi (India)',
    'mn_MN' => 'Mongolian (Mongolia)',
    'ne_NP' => 'Nepali (Nepal)',
    'se_NO' => 'Northern Sami (Norway)',
    'nso_ZA' => 'Northern Sotho (South Africa)',
    'nb_NO' => 'Norwegian Bokmål (Norway)',
    'nn_NO' => 'Norwegian Nynorsk (Norway)',
    'oc_FR' => 'Occitan (France)',
    'or_IN' => 'Oriya (India)',
    'om_ET' => 'Oromo (Ethiopia)',
    'om_KE' => 'Oromo (Kenya)',
    'os_RU' => 'Ossetic (Russia)',
    'pap_AN' => 'Papiamento (Netherlands Antilles)',
    'ps_AF' => 'Pashto (Afghanistan)',
    'fa_IR' => 'Persian (Iran)',
    'pl_PL' => 'Polish (Poland)',
    'pt_BR' => 'Portuguese (Brazil)',
    'pt_PT' => 'Portuguese (Portugal)',
    'pa_IN' => 'Punjabi (India)',
    'pa_PK' => 'Punjabi (Pakistan)',
    'ro_RO' => 'Romanian (Romania)',
    'ru_RU' => 'Russian (Russia)',
    'ru_UA' => 'Russian (Ukraine)',
    'sa_IN' => 'Sanskrit (India)',
    'sc_IT' => 'Sardinian (Italy)',
    'gd_GB' => 'Scottish Gaelic (United Kingdom)',
    'sr_ME' => 'Serbian (Montenegro)',
    'sr_RS' => 'Serbian (Serbia)',
    'sid_ET' => 'Sidamo (Ethiopia)',
    'sd_IN' => 'Sindhi (India)',
    'si_LK' => 'Sinhala (Sri Lanka)',
    'sk_SK' => 'Slovak (Slovakia)',
    'sl_SI' => 'Slovenian (Slovenia)',
    'so_DJ' => 'Somali (Djibouti)',
    'so_ET' => 'Somali (Ethiopia)',
    'so_KE' => 'Somali (Kenya)',
    'so_SO' => 'Somali (Somalia)',
    'nr_ZA' => 'South Ndebele (South Africa)',
    'st_ZA' => 'Southern Sotho (South Africa)',
    'es_AR' => 'Spanish (Argentina)',
    'es_BO' => 'Spanish (Bolivia)',
    'es_CL' => 'Spanish (Chile)',
    'es_CO' => 'Spanish (Colombia)',
    'es_CR' => 'Spanish (Costa Rica)',
    'es_DO' => 'Spanish (Dominican Republic)',
    'es_EC' => 'Spanish (Ecuador)',
    'es_SV' => 'Spanish (El Salvador)',
    'es_GT' => 'Spanish (Guatemala)',
    'es_HN' => 'Spanish (Honduras)',
    'es_MX' => 'Spanish (Mexico)',
    'es_NI' => 'Spanish (Nicaragua)',
    'es_PA' => 'Spanish (Panama)',
    'es_PY' => 'Spanish (Paraguay)',
    'es_PE' => 'Spanish (Peru)',
    'es_ES' => 'Spanish (Spain)',
    'es_US' => 'Spanish (United States)',
    'es_UY' => 'Spanish (Uruguay)',
    'es_VE' => 'Spanish (Venezuela)',
    'sw_KE' => 'Swahili (Kenya)',
    'sw_TZ' => 'Swahili (Tanzania)',
    'ss_ZA' => 'Swati (South Africa)',
    'sv_FI' => 'Swedish (Finland)',
    'sv_SE' => 'Swedish (Sweden)',
    'tl_PH' => 'Tagalog (Philippines)',
    'tg_TJ' => 'Tajik (Tajikistan)',
    'ta_IN' => 'Tamil (India)',
    'tt_RU' => 'Tatar (Russia)',
    'te_IN' => 'Telugu (India)',
    'th_TH' => 'Thai (Thailand)',
    'bo_CN' => 'Tibetan (China)',
    'bo_IN' => 'Tibetan (India)',
    'tig_ER' => 'Tigre (Eritrea)',
    'ti_ER' => 'Tigrinya (Eritrea)',
    'ti_ET' => 'Tigrinya (Ethiopia)',
    'ts_ZA' => 'Tsonga (South Africa)',
    'tn_ZA' => 'Tswana (South Africa)',
    'tr_CY' => 'Turkish (Cyprus)',
    'tr_TR' => 'Turkish (Turkey)',
    'tk_TM' => 'Turkmen (Turkmenistan)',
    'ug_CN' => 'Uighur (China)',
    'uk_UA' => 'Ukrainian (Ukraine)',
    'hsb_DE' => 'Upper Sorbian (Germany)',
    'ur_PK' => 'Urdu (Pakistan)',
    'uz_UZ' => 'Uzbek (Uzbekistan)',
    've_ZA' => 'Venda (South Africa)',
    'vi_VN' => 'Vietnamese (Vietnam)',
    'wa_BE' => 'Walloon (Belgium)',
    'cy_GB' => 'Welsh (United Kingdom)',
    'fy_DE' => 'Western Frisian (Germany)',
    'fy_NL' => 'Western Frisian (Netherlands)',
    'wo_SN' => 'Wolof (Senegal)',
    'xh_ZA' => 'Xhosa (South Africa)',
    'yi_US' => 'Yiddish (United States)',
    'yo_NG' => 'Yoruba (Nigeria)',
    'zu_ZA' => 'Zulu (South Africa)'
);
}
?>