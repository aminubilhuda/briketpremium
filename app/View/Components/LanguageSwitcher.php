<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LanguageSwitcher extends Component
{
    public function render()
    {
        $currentLang = session('lang', 'id');
        
        return view('components.language-switcher', [
            'currentLang' => $currentLang
        ]);
    }
}
