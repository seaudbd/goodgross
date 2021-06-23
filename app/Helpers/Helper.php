<?php

namespace App\Helpers;

use App\Models\ControlPanel\Configuration\Category;

class Helper
{
    public static function getChildCategories($categoryId)
    {
        $categories = Category::where('root_id', $categoryId)->get();
        if ($categories->isNotEmpty()) {
            return $categories;
        } else {
            return false;
        }
    }

    public static function verifyGoogleRecaptchaToken($token)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            "secret=" . env('RECAPTCHA_SECRET_KEY') . "&response=" . $token);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = json_decode(curl_exec($ch));
        curl_close ($ch);
        return $response;
    }
}
