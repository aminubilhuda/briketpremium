@extends('layouts.app')

@section('content')
    <!-- Header & Navbar -->
    <header id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 navbar-scrolled">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-display font-bold text-white">{{ Str::before($settings['site_name'] ?? 'Briket Kita', ' ') }}<span class="text-amber-400">{{ Str::after($settings['site_name'] ?? 'Briket Kita', ' ') }}</span>.</a>
            <nav class="hidden md:flex space-x-8">
                <a href="/" class="hover:text-amber-400 transition-colors">@lang('messages.back_to_home')</a>
            </nav>
            <div class="flex items-center space-x-4">
                <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20produk%20briket%20Anda." target="_blank" class="bg-amber-500 text-gray-900 font-bold py-2 px-5 rounded-full hover:bg-amber-400 transition-all duration-300 transform hover:scale-105">
                    @lang('messages.order_now')
                </a>
                <div class="flex space-x-2 text-sm font-semibold">
                    <a href="{{ url('/lang/en') }}" class="{{ app()->getLocale() == 'en' ? 'text-amber-400' : 'text-gray-400 hover:text-white' }} transition-colors" target="_self">EN</a>
                    <span>|</span>
                    <a href="{{ url('/lang/id') }}" class="{{ app()->getLocale() == 'id' ? 'text-amber-400' : 'text-gray-400 hover:text-white' }} transition-colors" target="_self">ID</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="pt-24 bg-gray-900">
            <section id="detail-produk" class="py-20">
                <div class="container mx-auto px-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                        <!-- Kolom Gambar -->
                        <div data-aos="zoom-in">
                            <img src="{{ $product->image_path }}" alt="{{ $product->name }}" class="w-full h-auto rounded-xl shadow-lg">
                        </div>

                        <!-- Kolom Detail -->
                        <div data-aos="fade-up">
                            <h1 class="text-4xl font-display text-white mb-4">{{ $product->name }}</h1>
                            <p class="text-gray-400 mb-8">{{ $product->description }}</p>

                            <h3 class="text-2xl font-display text-white mb-4 border-t border-gray-700 pt-6">@lang('messages.technical_specifications')</h3>
                            <table class="w-full text-left table-auto">
                                <tbody>
                                    <tr class="border-b border-gray-800"><td class="py-3 text-gray-400">@lang('messages.spec_calorific_value')</td><td class="font-semibold text-white">{{ $product->calorific_value }} kcal/kg</td></tr>
                                    <tr class="border-b border-gray-800"><td class="py-3 text-gray-400">@lang('messages.spec_ash_content')</td><td class="font-semibold text-white">{{ $product->ash_content }} %</td></tr>
                                    <tr class="border-b border-gray-800"><td class="py-3 text-gray-400">@lang('messages.spec_moisture')</td><td class="font-semibold text-white">{{ $product->moisture }} %</td></tr>
                                    <tr class="border-b border-gray-800"><td class="py-3 text-gray-400">@lang('messages.spec_fixed_carbon')</td><td class="font-semibold text-white">{{ $product->fixed_carbon }} %</td></tr>
                                    <tr class="border-b border-gray-800"><td class="py-3 text-gray-400">@lang('messages.spec_burning_time')</td><td class="font-semibold text-white">{{ $product->burning_time }} @lang('messages.minutes')</td></tr>
                                    <tr class=""><td class="py-3 text-gray-400">@lang('messages.spec_dimensions')</td><td class="font-semibold text-white">{{ $product->dimensions }}</td></tr>
                                </tbody>
                            </table>

                            <div class="mt-10">
                                <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20untuk%20memesan%20{{ urlencode($product->name) }}." target="_blank" class="w-full text-center bg-amber-500 text-gray-900 font-bold py-4 px-8 rounded-full text-lg hover:bg-amber-400 transition-all duration-300">
                                    @lang('messages.request_quote')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 border-t border-gray-700">
        <div class="container mx-auto px-6 py-12">
            <div class="text-center text-gray-500">
                <p>&copy; <span id="year"></span> {{ $settings['site_name'] ?? 'Briket Kita' }}. @lang('messages.all_rights_reserved')</p>
            </div>
        </div>
    </footer>
@endsection