<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $settings = SiteSetting::all()->pluck('value', 'key');
        $featuredProducts = Product::where('is_featured', true)->take(3)->get();
        $galleryItems = Gallery::where('is_published', true)->orderBy('order')->take(6)->get();

        // Helper untuk mengambil ID video dari URL YouTube
        $youtube_id = '';
        if ($url = $settings->get('youtube_video_url')) {
            parse_str(parse_url($url, PHP_URL_QUERY), $queryParams);
            $youtube_id = $queryParams['v'] ?? '';
        }

        return view('pages.home', compact('settings', 'featuredProducts', 'galleryItems', 'youtube_id'));
    }

    public function productDetail($slug)
    {
        $settings = SiteSetting::all()->pluck('value', 'key');
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('pages.product-detail', compact('settings', 'product'));
    }
}
