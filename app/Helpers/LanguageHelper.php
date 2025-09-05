<?php

namespace App\Helpers;

class LanguageHelper
{
    public static function getCurrentLang()
    {
        return session('lang', 'id'); // Default ke bahasa Indonesia
    }

    public static function getField($model, $field)
    {
        $lang = self::getCurrentLang();
        $fieldName = $field . '_' . $lang;
        
        // Jika field bahasa Inggris kosong, fallback ke bahasa Indonesia
        if ($lang === 'en' && empty($model->$fieldName)) {
            $fieldName = $field . '_id';
        }
        
        return $model->$fieldName;
    }
}
