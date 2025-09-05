<?php

namespace App\Traits;

use App\Helpers\LanguageHelper;

trait HasTranslations
{
    public function getTranslatedAttribute($field)
    {
        return LanguageHelper::getField($this, $field);
    }

    public function title()
    {
        return $this->getTranslatedAttribute('judul');
    }

    public function description()
    {
        return $this->getTranslatedAttribute('deskripsi');
    }

    // Khusus untuk produk
    public function name()
    {
        return $this->getTranslatedAttribute('nama');
    }
}
