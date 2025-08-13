@extends('layouts.app')

@section('content')
    <!-- Header & Navbar -->
    <header id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 navbar-scrolled">
        <div class="container mx-auto px-4 sm:px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-display font-bold text-white">
                @if(isset($settings['site_logo_path']) && $settings['site_logo_path'])
                    <img src="{{ asset('storage/' . $settings['site_logo_path']) }}" alt="{{ $settings['site_name'] ?? 'Logo' }}" class="h-10 w-auto">
                @else
                    {{ Str::before($settings['site_name'] ?? 'Briket Kita', ' ') }}<span class="text-amber-400">{{ Str::after($settings['site_name'] ?? 'Briket Kita', ' ') }}</span>.
                @endif
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden md:flex items-center space-x-6 lg:space-x-8">
                <a href="/" class="hover:text-amber-400 transition-colors">@lang('messages.back_to_home')</a>
            </nav>

            <!-- Desktop CTA -->
            <div class="hidden md:flex items-center space-x-4">
                @if(isset($settings['shopee_url']) && $settings['shopee_url'])
                    <a href="{{ $settings['shopee_url'] }}" target="_blank" class="text-white hover:text-amber-400" title="Kunjungi Toko Shopee">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </a>
                @endif
                @if(isset($settings['tokopedia_url']) && $settings['tokopedia_url'])
                    <a href="{{ $settings['tokopedia_url'] }}" target="_blank" class="text-white hover:text-amber-400" title="Kunjungi Toko Tokopedia">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </a>
                @endif
                <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Halo,%20saya%20tertarik%20dengan%20produk%20briket%20Anda." target="_blank" class="bg-amber-500 text-gray-900 font-bold py-2 px-5 rounded-full hover:bg-amber-400 transition-all duration-300 transform hover:scale-105 text-sm">
                    @lang('messages.order_now')
                </a>
                <div class="flex space-x-2 text-sm font-semibold">
                    <a href="{{ url('/lang/en') }}" class="{{ app()->getLocale() == 'en' ? 'text-amber-400' : 'text-gray-400 hover:text-white' }} transition-colors" target="_self">EN</a>
                    <span class="text-gray-500">|</span>
                    <a href="{{ url('/lang/id') }}" class="{{ app()->getLocale() == 'id' ? 'text-amber-400' : 'text-gray-400 hover:text-white' }} transition-colors" target="_self">ID</a>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-gray-800/95 backdrop-blur-sm">
            <nav class="flex flex-col items-center space-y-4 py-8">
                <a href="/" class="text-lg hover:text-amber-400 transition-colors">@lang('messages.back_to_home')</a>
                <div class="pt-4 border-t border-gray-700 w-full flex flex-col items-center space-y-4">
                    <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Halo,%20saya%20tertarik%20dengan%20produk%20briket%20Anda." target="_blank" class="bg-amber-500 text-gray-900 font-bold py-3 px-8 rounded-full hover:bg-amber-400 transition-all duration-300 w-full max-w-xs text-center">
                        @lang('messages.order_now')
                    </a>
                    <div class="flex items-center space-x-4">
                        @if(isset($settings['shopee_url']) && $settings['shopee_url'])
                            <a href="{{ $settings['shopee_url'] }}" target="_blank" class="text-white hover:text-amber-400" title="Kunjungi Toko Shopee">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </a>
                        @endif
                        @if(isset($settings['tokopedia_url']) && $settings['tokopedia_url'])
                            <a href="{{ $settings['tokopedia_url'] }}" target="_blank" class="text-white hover:text-amber-400" title="Kunjungi Toko Tokopedia">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </a>
                        @endif
                    </div>
                    <div class="flex space-x-2 text-base font-semibold">
                        <a href="{{ url('/lang/en') }}" class="{{ app()->getLocale() == 'en' ? 'text-amber-400' : 'text-gray-400 hover:text-white' }} transition-colors" target="_self">EN</a>
                        <span class="text-gray-500">|</span>
                        <a href="{{ url('/lang/id') }}" class="{{ app()->getLocale() == 'id' ? 'text-amber-400' : 'text-gray-400 hover:text-white' }} transition-colors" target="_self">ID</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <div class="pt-24 bg-gray-900">
            <section id="detail-produk" class="py-16 sm:py-20">
                <div class="container mx-auto px-4 sm:px-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-12 items-start">
                        <!-- Kolom Gambar -->
                        <div data-aos="zoom-in">
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-auto rounded-xl shadow-lg">
                        </div>

                        <!-- Kolom Detail -->
                        <div data-aos="fade-up">
                            <h1 class="text-3xl sm:text-4xl font-display text-white mb-4">{{ $product->name }}</h1>
                            <div class="text-gray-500 text-sm sm:text-base mb-6 sm:mb-8">{!! $product->description !!}</div>

                            <h3 class="text-xl sm:text-2xl font-display text-white mb-4 border-t border-gray-700 pt-6">@lang('messages.technical_specifications')</h3>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left table-auto min-w-max">
                                    <tbody>
                                        <tr class="border-b border-gray-800"><td class="py-2 sm:py-3 text-gray-400 text-sm sm:text-base">@lang('messages.spec_calorific_value')</td><td class="font-semibold text-white text-sm sm:text-base">{{ $product->calorific_value }} kcal/kg</td></tr>
                                        <tr class="border-b border-gray-800"><td class="py-2 sm:py-3 text-gray-400 text-sm sm:text-base">@lang('messages.spec_ash_content')</td><td class="font-semibold text-white text-sm sm:text-base">{{ $product->ash_content }} %</td></tr>
                                        <tr class="border-b border-gray-800"><td class="py-2 sm:py-3 text-gray-400 text-sm sm:text-base">@lang('messages.spec_moisture')</td><td class="font-semibold text-white text-sm sm:text-base">{{ $product->moisture }} %</td></tr>
                                        <tr class="border-b border-gray-800"><td class="py-2 sm:py-3 text-gray-400 text-sm sm:text-base">@lang('messages.spec_fixed_carbon')</td><td class="font-semibold text-white text-sm sm:text-base">{{ $product->fixed_carbon }} %</td></tr>
                                        <tr class="border-b border-gray-800"><td class="py-2 sm:py-3 text-gray-400 text-sm sm:text-base">@lang('messages.spec_burning_time')</td><td class="font-semibold text-white text-sm sm:text-base">{{ $product->burning_time }} @lang('messages.minutes')</td></tr>
                                        <tr class=""><td class="py-2 sm:py-3 text-gray-400 text-sm sm:text-base">@lang('messages.spec_dimensions')</td><td class="font-semibold text-white text-sm sm:text-base">{{ $product->dimensions }}</td></tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-8 sm:mt-10">
                                <h3 class="text-xl sm:text-2xl font-display text-white mb-4 border-t border-gray-700 pt-6">@lang('messages.buy_on_ecommerce')</h3>
                                <div class="flex flex-wrap gap-4">
                                    @if(isset($settings['shopee_url']) && $settings['shopee_url'])
                                        <a href="{{ $settings['shopee_url'] }}" target="_blank" class="bg-orange-500 text-white font-bold py-2 px-4 sm:py-3 sm:px-6 rounded-full hover:bg-orange-600 transition-all duration-300 flex items-center space-x-2 text-sm sm:text-base">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            <span>Shopee</span>
                                        </a>
                                    @endif
                                    @if(isset($settings['tokopedia_url']) && $settings['tokopedia_url'])
                                        <a href="{{ $settings['tokopedia_url'] }}" target="_blank" class="bg-green-500 text-white font-bold py-2 px-4 sm:py-3 sm:px-6 rounded-full hover:bg-green-600 transition-all duration-300 flex items-center space-x-2 text-sm sm:text-base">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                            </svg>
                                            <span>Tokopedia</span>
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-8 sm:mt-10">
                                <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Halo,%20saya%20tertarik%20untuk%20memesan%20{{ urlencode($product->name) }}." target="_blank" class="w-full text-center bg-amber-500 text-gray-900 font-bold py-3 px-6 sm:py-4 sm:px-8 rounded-full text-base sm:text-lg hover:bg-amber-400 transition-all duration-300">
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
        <div class="container mx-auto px-4 sm:px-6 py-10 sm:py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
                <div>
                    <h3 class="text-2xl font-display font-bold text-white">
                        @if(isset($settings['site_logo_path']) && $settings['site_logo_path'])
                            <img src="{{ asset('storage/' . $settings['site_logo_path']) }}" alt="{{ $settings['site_name'] ?? 'Logo' }}" class="h-10 w-auto md:mx-0 mx-auto">
                        @else
                            {{ Str::before($settings['site_name'] ?? 'Briket Kita', ' ') }}<span class="text-amber-400">{{ Str::after($settings['site_name'] ?? 'Briket Kita', ' ') }}</span>.
                        @endif
                    </h3>
                    <p class="text-gray-400 mt-2 text-sm sm:text-base">{{ $settings['hero_subtitle'] ?? __('messages.hero_subtitle') }}</p>
                    <div class="mt-4">
                        <div class="rounded-lg overflow-hidden shadow-lg inline-block w-full max-w-xs sm:max-w-sm md:max-w-full">
                            @if(isset($settings['google_maps_embed_code']) && $settings['google_maps_embed_code'])
                                {!! $settings['google_maps_embed_code'] !!}
                            @endif
                        </div>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white">@lang('messages.footer_quick_links')</h4>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#produk" class="text-gray-400 hover:text-amber-400 text-sm sm:text-base">@lang('messages.nav_products')</a></li>
                        <li><a href="#video" class="text-gray-400 hover:text-amber-400 text-sm sm:text-base">@lang('messages.nav_process')</a></li>
                        <li><a href="#keunggulan" class="text-gray-400 hover:text-amber-400 text-sm sm:text-base">@lang('messages.why_choose_us_title')</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white">@lang('messages.nav_contact')</h4>
                    <p class="text-gray-400 mt-4 text-sm sm:text-base">{{ $settings['company_address'] ?? 'Alamat belum diatur' }}</p>
                    <p class="text-gray-400 text-sm sm:text-base">Email: {{ $settings['company_email'] ?? 'sales@briketkita.com' }}</p>
                    <p class="text-amber-400 font-bold mt-2 text-sm sm:text-base">WA: {{ $settings['whatsapp_number'] ?? '' }}</p>
                </div>
            </div>
            <div class="mt-10 sm:mt-12 border-t border-gray-700 pt-6 text-center text-gray-500 text-sm sm:text-base">
                <p>&copy; <span id="year"></span> {{ $settings['site_name'] ?? 'Briket Kita' }}. @lang('messages.all_rights_reserved')</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const navbar = document.getElementById('navbar');

            // Toggle mobile menu
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function () {
                    mobileMenu.classList.toggle('hidden');
                });

                // Close mobile menu when a link is clicked
                mobileMenu.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', () => {
                        mobileMenu.classList.add('hidden');
                    });
                });
            }

            // Navbar scroll effect (if needed, though this page has a fixed header)
            // window.addEventListener('scroll', function () {
            //     if (window.scrollY > 50) {
            //         navbar.classList.add('bg-gray-900', 'shadow-lg');
            //     } else {
            //         navbar.classList.remove('bg-gray-900', 'shadow-lg');
            //     }
            // });

            // Set current year in footer
            const yearSpan = document.getElementById('year');
            if (yearSpan) {
                yearSpan.textContent = new Date().getFullYear();
            }
        });
    </script>
@endsection