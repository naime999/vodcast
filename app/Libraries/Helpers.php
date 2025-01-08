<?php

use App\Models\ContactUsInformation;
use App\Models\PrivacyPolicy;
use App\Models\Term;
use App\Models\Setting;
use App\Models\Page;
use App\Models\AdminRequest;

if (!function_exists('contactUsInformation')) {
    function contactUsInformation()
    {
        $contactUsInformation = ContactUsInformation::where('status',1)->first();
        return $contactUsInformation;
    }
}

if (!function_exists('settings')) {
    function settings($settingName)
    {
        $settingsRow = Setting::where('setting_name', $settingName)->get();
        $settings = genarateSettingsData($settingsRow);
        return $settings;
    }

    function genarateSettingsData($datas)
    {
        if($datas->count() > 0){
            $newData = array();
            foreach($datas as $key => $data){
                $newData[$data->type] = $data->value;
            }
            return (object) $newData;
        }else{
            return null;
        }
    }
}

if (!function_exists('pages')) {
    function pages($pageName, $pageSection)
    {
        $pagesRow = Page::where('page_name', $pageName)->where('page_section', $pageSection)->get();
        $pages = genaratePageData($pagesRow);
        return $pages;
    }

    function genaratePageData($datas)
    {
        if($datas->count() > 0){
            $newData = array();
            foreach($datas as $key => $data){
                $newData[$data->type] = $data->value;
            }
            return (object) $newData;
        }else{
            return null;
        }
    }
}

if (!function_exists('moneyFormat')) {
    function moneyFormat($amount)
    {
        setlocale(LC_MONETARY, 'en_US');
        return number_format($amount, 2, '.', ',');
    }
}

if (!function_exists('privacyPolicy')) {
    function privacyPolicy()
    {
        $privacyPolicy = PrivacyPolicy::where('status',1)->first();
        return $privacyPolicy;
    }
}

if (!function_exists('termsCondition')) {
    function termsCondition()
    {
        $termsCondition = Term::where('status',1)->first();
        return $termsCondition;
    }
}

if (!function_exists('requestForVodcast')) {
    function requestForVodcast()
    {
        $getRequest = AdminRequest::where('requested_user_id', Auth()->user()->id)->first();
        if($getRequest){
            if($getRequest->status == 0){
                return '<span class="bg-warning p-1 px-2 rounded text-light mr-1"><i class="fa-solid fa-clock fa-spin-pulse"></i>&nbsp;Request Pending...</span>';
            }else if($getRequest->status == 1){
                return '<span class="bg-success p-1 px-2 rounded text-light mr-1"><i class="fa-sharp fa-solid fa-badge-check fa-fade"></i>&nbsp;Vodcaster</span>';
            }else{
                return '<span class="bg-danger p-1 px-2 rounded text-light mr-1"><i class="fa-solid fa-seal-exclamation fa-fade"></i>&nbsp;Declined</span>';
            }
        }else{
            return null;
        }
    }
}

if (!function_exists('requestData')) {
    function requestData()
    {
        $req = AdminRequest::where('requested_user_id', Auth()->user()->id)->first();
        if($req){
            return $req;
        }else{
            return null;
        }
    }
}

if (!function_exists('requestPendingCount')) {
    function requestPendingCount()
    {
        return AdminRequest::where('status', 0)->get()->count();
    }
}
