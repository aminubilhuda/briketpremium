<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLanguage
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek jika ada parameter bahasa di URL atau session
        if ($request->has('lang')) {
            $lang = $request->get('lang');
            if (in_array($lang, ['id', 'en'])) {
                session(['lang' => $lang]);
            }
        }

        // Set default language jika belum ada
        if (!session()->has('lang')) {
            session(['lang' => 'id']); // Default ke bahasa Indonesia
        }

        return $next($request);
    }
}
