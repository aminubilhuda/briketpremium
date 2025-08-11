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
                @if(isset($settings['shopee_url']) && $settings['shopee_url'])
                    <a href="{{ $settings['shopee_url'] }}" target="_blank" class="text-white hover:text-amber-400">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M13.29 6.3l-4.6 4.6c-.55.55-.55 1.44 0 1.99l4.6 4.6c.55.55 1.44.55 1.99 0l4.6-4.6c.55-.55.55-1.44 0-1.99l-4.6-4.6c-.55-.55-1.44-.55-1.99 0zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                    </a>
                @endif
                @if(isset($settings['tokopedia_url']) && $settings['tokopedia_url'])
                    <a href="{{ $settings['tokopedia_url'] }}" target="_blank" class="text-white hover:text-amber-400">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/></svg>
                    </a>
                @endif
                <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Halo,%20saya%20tertarik%20dengan%20produk%20briket%20Anda." target="_blank" class="bg-amber-500 text-gray-900 font-bold py-2 px-5 rounded-full hover:bg-amber-400 transition-all duration-300 transform hover:scale-105">
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
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-auto rounded-xl shadow-lg">
                        </div>

                        <!-- Kolom Detail -->
                        <div data-aos="fade-up">
                            <h1 class="text-4xl font-display text-white mb-4">{{ $product->name }}</h1>
                            <div class="text-gray-500 mb-8">{!! $product->description !!}</div>

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
                                <h3 class="text-2xl font-display text-white mb-4 border-t border-gray-700 pt-6">@lang('messages.buy_on_ecommerce')</h3>
                                <div class="flex items-center space-x-4">
                                    @if(isset($settings['shopee_url']) && $settings['shopee_url'])
                                        <a href="{{ $settings['shopee_url'] }}" target="_blank" class="bg-orange-500 text-white font-bold py-3 px-6 rounded-full hover:bg-orange-600 transition-all duration-300 flex items-center space-x-2">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M13.29 6.3l-4.6 4.6c-.55.55-.55 1.44 0 1.99l4.6 4.6c.55.55 1.44.55 1.99 0l4.6-4.6c.55-.55.55-1.44 0-1.99l-4.6-4.6c-.55-.55-1.44-.55-1.99 0zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                                            <span>Shopee</span>
                                        </a>
                                    @endif
                                    @if(isset($settings['tokopedia_url']) && $settings['tokopedia_url'])
                                        <a href="{{ $settings['tokopedia_url'] }}" target="_blank" class="bg-green-500 text-white font-bold py-3 px-6 rounded-full hover:bg-green-600 transition-all duration-300 flex items-center space-x-2">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/></svg>
                                            <span>Tokopedia</span>
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-10">
                                <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Halo,%20saya%20tertarik%20untuk%20memesan%20{{ urlencode($product->name) }}." target="_blank" class="w-full text-center bg-amber-500 text-gray-900 font-bold py-4 px-8 rounded-full text-lg hover:bg-amber-400 transition-all duration-300">
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