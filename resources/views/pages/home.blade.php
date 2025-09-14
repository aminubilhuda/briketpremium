@extends('layouts.app')

@section('content')
    <!-- Header & Navbar -->
    <header id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="container mx-auto px-4 sm:px-6 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-display font-bold text-white">
                @if(isset($settings['site_logo_path']) && $settings['site_logo_path'])
                    <img src="{{ asset('storage/' . $settings['site_logo_path']) }}" alt="{{ $settings['site_name'] ?? 'Logo' }}" class="h-10 w-auto">
                @else
                    {{ Str::before($settings['site_name'] ?? 'Briket Kita', ' ') }}<span class="text-[#f48934]">{{ Str::after($settings['site_name'] ?? 'Briket Kita', ' ') }}</span>.
                @endif
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden md:flex items-center space-x-6 lg:space-x-8">
                <a href="#hero" class="hover:text-[#f48934] transition-colors">@lang('messages.nav_home')</a>
                <a href="#tentang" class="hover:text-[#f48934] transition-colors">@lang('messages.nav_about')</a>
                <a href="#produk" class="hover:text-[#f48934] transition-colors">@lang('messages.nav_products')</a>
                <a href="#proses" class="hover:text-[#f48934] transition-colors">@lang('messages.nav_process')</a>
                <a href="#galeri" class="hover:text-[#f48934] transition-colors">@lang('messages.nav_gallery')</a>
                <a href="#kontak" class="hover:text-[#f48934] transition-colors">@lang('messages.nav_contact')</a>
            </nav>

            <!-- Desktop CTA -->
            <div class="hidden md:flex items-center space-x-4">
                @if(isset($settings['shopee_url']) && $settings['shopee_url'])
                    <a href="{{ $settings['shopee_url'] }}" target="_blank" class="text-white hover:text-[#f48934]" title="Kunjungi Toko Shopee">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </a>
                @endif
                @if(isset($settings['tokopedia_url']) && $settings['tokopedia_url'])
                    <a href="{{ $settings['tokopedia_url'] }}" target="_blank" class="text-white hover:text-[#f48934]" title="Kunjungi Toko Tokopedia">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </a>
                @endif
                <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Halo,%20saya%20tertarik%20dengan%20produk%20briket%20Anda." target="_blank" class="bg-[#f48934] text-gray-900 font-bold py-2 px-5 rounded-full hover:bg-amber-400 transition-all duration-300 transform hover:scale-105 text-sm">
                    @lang('messages.order_now')
                </a>
                <div class="flex space-x-2 text-sm font-semibold">
                    <a href="{{ route('language.switch', ['locale' => 'en']) }}" class="{{ app()->getLocale() == 'en' ? 'text-[#f48934]' : 'text-gray-400 hover:text-white' }} transition-colors" target="_self">EN</a>
                    <span class="text-gray-500">|</span>
                    <a href="{{ route('language.switch', ['locale' => 'id']) }}" class="{{ app()->getLocale() == 'id' ? 'text-[#f48934]' : 'text-gray-400 hover:text-white' }} transition-colors" target="_self">ID</a>
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
                <a href="#hero" class="text-lg hover:text-[#f48934] transition-colors">@lang('messages.nav_home')</a>
                <a href="#tentang" class="text-lg hover:text-[#f48934] transition-colors">@lang('messages.nav_about')</a>
                <a href="#produk" class="text-lg hover:text-[#f48934] transition-colors">@lang('messages.nav_products')</a>
                <a href="#proses" class="text-lg hover:text-[#f48934] transition-colors">@lang('messages.nav_process')</a>
                <a href="#galeri" class="text-lg hover:text-[#f48934] transition-colors">@lang('messages.nav_gallery')</a>
                <a href="#kontak" class="text-lg hover:text-[#f48934] transition-colors">@lang('messages.nav_contact')</a>
                <div class="pt-4 border-t border-gray-700 w-full flex flex-col items-center space-y-4">
                    <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Halo,%20saya%20tertarik%20dengan%20produk%20briket%20Anda." target="_blank" class="bg-[#f48934] text-gray-900 font-bold py-3 px-8 rounded-full hover:bg-amber-400 transition-all duration-300 w-full max-w-xs text-center">
                        @lang('messages.order_now')
                    </a>
                    <div class="flex items-center space-x-4">
                        @if(isset($settings['shopee_url']) && $settings['shopee_url'])
                            <a href="{{ $settings['shopee_url'] }}" target="_blank" class="text-white hover:text-[#f48934]" title="Kunjungi Toko Shopee">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </a>
                        @endif
                        @if(isset($settings['tokopedia_url']) && $settings['tokopedia_url'])
                            <a href="{{ $settings['tokopedia_url'] }}" target="_blank" class="text-white hover:text-[#f48934]" title="Kunjungi Toko Tokopedia">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </a>
                        @endif
                    </div>
                    <div class="flex space-x-2 text-base font-semibold">
                        <a href="{{ route('language.switch', ['locale' => 'en']) }}" class="{{ app()->getLocale() == 'en' ? 'text-[#f48934]' : 'text-gray-400 hover:text-white' }} transition-colors" target="_self">EN</a>
                        <span class="text-gray-500">|</span>
                        <a href="{{ route('language.switch', ['locale' => 'id']) }}" class="{{ app()->getLocale() == 'id' ? 'text-[#f48934]' : 'text-gray-400 hover:text-white' }} transition-colors" target="_self">ID</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section id="hero" class="relative min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('{{ isset($settings['hero_background_image_path']) && $settings['hero_background_image_path'] ? asset('storage/' . $settings['hero_background_image_path']) : '' }}'); background-color: {{ isset($settings['hero_background_image_path']) && $settings['hero_background_image_path'] ? 'transparent' : '#000000' }};">
            <div class="absolute inset-0 bg-black opacity-60"></div>
            <div class="relative text-center text-white p-6 z-10" data-aos="fade-up">
                <h1 class="text-4xl sm:text-5xl md:text-7xl font-display mb-4">{{ $settings['hero_title'] ?? __('messages.hero_title') }}</h1>
                <p class="text-base sm:text-lg md:text-xl max-w-2xl mx-auto mb-8">{{ $settings['hero_subtitle'] ?? __('messages.hero_subtitle') }}</p>
                <a href="#produk" class="bg-[#f48934] text-gray-900 font-bold py-3 px-8 rounded-full text-lg hover:bg-amber-400 transition-all duration-300 transform hover:scale-105">
                    @lang('messages.hero_button')
                </a>
            </div>
        </section>

        <!-- Produk Section -->
        <section id="produk" class="py-16 sm:py-20 bg-gray-900">
            <div class="container mx-auto px-4 sm:px-6">
                <div class="text-center mb-10 sm:mb-12" data-aos="fade-up">
                    <h2 class="text-3xl sm:text-4xl font-display text-white">@lang('messages.featured_products_title')</h2>
                    <p class="text-gray-400 mt-2">@lang('messages.featured_products_subtitle')</p>
                </div>
                
                <div class="relative">
                    <div id="product-slider" class="flex overflow-x-auto space-x-6 md:space-x-8 pb-8 scrollbar-hide snap-x snap-mandatory">
                        @forelse($featuredProducts as $index => $product)
                        <div class="flex-shrink-0 w-full sm:w-1/2 md:w-1/2 lg:w-1/3 snap-center">
                            <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg transform hover:-translate-y-2 transition-transform duration-300 flex flex-col h-full" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-48 sm:h-56 object-cover">
                                <div class="p-4 sm:p-6 flex flex-col flex-grow">
                                    <h3 class="text-xl sm:text-2xl font-display text-white mb-2">{{ app()->getLocale() == 'en' ? $product->name_en : $product->nama_id }}</h3>
                                    <div class="text-gray-500 text-sm sm:text-base mb-4 line-clamp-3">{!! app()->getLocale() == 'en' ? $product->description_en : $product->deskripsi_id !!}</div>
                                    <a href="{{ route('product.detail', $product->slug) }}" class="inline-block bg-transparent border border--[#f48934] text--[#f48934] font-semibold py-2 px-4 sm:px-6 rounded-full hover:bg-[#f48934] hover:text-gray-900 transition-all duration-300 self-start mt-auto text-sm sm:text-base">
                                        @lang('messages.view_details')
                                    </a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="text-center text-gray-400 col-span-full">@lang('messages.no_featured_products')</p>
                        @endforelse
                    </div>
                    <div class="absolute inset-y-0 left-0 flex items-center">
                        <button id="prev-product" class="bg-gray-800/50 hover:bg-gray-800 text-white p-2 rounded-full ml-2 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        </button>
                    </div>
                    <div class="absolute inset-y-0 right-0 flex items-center">
                        <button id="next-product" class="bg-gray-800/50 hover:bg-gray-800 text-white p-2 rounded-full mr-2 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tentang Kami Section -->
        <section id="tentang" class="py-16 sm:py-20 bg-gray-800">
            <div class="container mx-auto px-4 sm:px-6">
                <div class="text-center mb-10 sm:mb-12" data-aos="fade-up">
                    <h2 class="text-3xl sm:text-4xl font-display text-white">@lang('messages.about_title')</h2>
                    <p class="text-gray-400 mt-2">@lang('messages.about_subtitle')</p>
                </div>
                <div class="relative max-w-2xl mx-auto">
                    <!-- Garis Timeline -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 h-full border-l-2 border-[#f48934]/30 hidden md:block"></div>
                    @forelse($timelines as $index => $timeline)
                    <!-- Item Timeline -->
                    <div data-aos="fade-up" class="relative mb-10 sm:mb-12 flex flex-col {{ $index % 2 == 0 ? 'md:flex-row' : 'md:flex-row-reverse' }} items-center md:items-start">
                        <div class="md:relative w-10 h-10 sm:w-12 sm:h-12 bg-[#f48934] rounded-full border-2 border-[#f48934] flex-shrink-0 z-10 flex items-center justify-center text-gray-900 font-bold text-sm sm:text-base {{ $index % 2 == 0 ? 'md:mr-4' : 'md:ml-4' }} mb-2 md:mb-0 transform transition-transform duration-300 hover:scale-110">
                            {{ $timeline->year }}
                        </div>
                        <div class="w-full {{ $index % 2 == 0 ? 'md:w-1/2 md:pr-8 md:text-right' : 'md:w-1/2 md:pl-8' }} text-center md:text-left p-4 rounded-lg bg-gray-900 shadow-lg border border-gray-700">
                            <h3 class="text-xl font-bold text-white mb-1">{{ app()->getLocale() == 'en' ? $timeline->title_en : $timeline->judul_id }}</h3>
                            <p class="text-gray-400 text-sm">{{ app()->getLocale() == 'en' ? $timeline->description_en : $timeline->deskripsi_id }}</p>
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-gray-400 col-span-full">@lang('messages.no_timeline_data')</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Video Profile Section -->
        <section id="video" class="py-16 sm:py-20 bg-gray-800">
            <div class="container mx-auto px-4 sm:px-6">
                <div class="text-center mb-10 sm:mb-12" data-aos="fade-up">
                    <h2 class="text-3xl sm:text-4xl font-display text-white">@lang('messages.video_profile_title')</h2>
                    <p class="text-gray-400 mt-2">@lang('messages.video_profile_subtitle')</p>
                </div>
                <div class="max-w-4xl mx-auto" data-aos="zoom-in">
                    <div class="video-container shadow-2xl aspect-video">
                        @if(isset($settings['youtube_video_embed_code']) && $settings['youtube_video_embed_code'])
                        {!! $settings['youtube_video_embed_code'] !!}
                        @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-700"><p class="text-gray-400">@lang('messages.video_not_available')</p></div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Proses Kami Section -->
        <section id="proses" class="py-16 sm:py-20 bg-gray-900">
            <div class="container mx-auto px-4 sm:px-6">
                <div class="text-center mb-10 sm:mb-12" data-aos="fade-up">
                    <h2 class="text-3xl sm:text-4xl font-display text-white">@lang('messages.process_title')</h2>
                    <p class="text-gray-400 mt-2">@lang('messages.process_subtitle')</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 sm:gap-10 text-center">
                    @forelse($processSteps as $index => $step)
                    <div data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                        <div class="bg-gray-800 border-2 border-[#f48934]/30 text-[#f48934] w-20 h-20 sm:w-24 sm:h-24 mx-auto rounded-full flex items-center justify-center mb-4"><span class="text-3xl sm:text-4xl font-display">{{ $index + 1 }}</span></div>
                        <h3 class="text-xl font-bold text-white mb-2">{{ app()->getLocale() == 'en' ? $step->title_en : $step->judul_id }}</h3>
                        <p class="text-gray-400 text-sm sm:text-base">{{ app()->getLocale() == 'en' ? $step->description_en : $step->deskripsi_id }}</p>
                    </div>
                    @empty
                    <p class="text-center text-gray-400 col-span-full">@lang('messages.no_process_steps')</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Galeri Section -->
        <section id="galeri" class="py-16 sm:py-20 bg-gray-800">
            <div class="container mx-auto px-4 sm:px-6">
                <div class="text-center mb-10 sm:mb-12" data-aos="fade-up">
                    <h2 class="text-3xl sm:text-4xl font-display text-white">@lang('messages.gallery_title')</h2>
                    <p class="text-gray-400 mt-2">@lang('messages.gallery_subtitle')</p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4">
                    @forelse($galleryItems as $item)
                        <div data-aos="zoom-in" class="relative group cursor-pointer" onclick="openGalleryModal('{{ $item->id }}')">
                            <img class="h-auto max-w-full rounded-lg shadow-lg transform group-hover:scale-105 transition-transform duration-300" 
                                src="{{ asset('storage/' . $item->file_path) }}" 
                                alt="{{ app()->getLocale() == 'en' ? ($item->title_en ?? 'Gallery Image') : ($item->judul_id ?? 'Gambar Galeri') }}">
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-75 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                                <h4 class="text-white text-center px-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    {{ app()->getLocale() == 'en' ? ($item->title_en ?? 'Gallery Image') : ($item->judul_id ?? 'Gambar Galeri') }}
                                </h4>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-400 col-span-full">@lang('messages.gallery_empty')</p>
                    @endforelse
                </div>

                <!-- Gallery Modal -->
                <div id="galleryModal" class="fixed inset-0 z-50 hidden">
                    <div class="absolute inset-0 bg-black bg-opacity-75 transition-opacity" onclick="closeGalleryModal()"></div>
                    <div class="relative min-h-screen flex items-center justify-center p-4">
                        <div class="bg-gray-900 rounded-xl max-w-4xl w-full mx-auto p-4 sm:p-6 relative">
                            <button onclick="closeGalleryModal()" class="absolute top-4 right-4 text-gray-400 hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            <div class="space-y-4">
                                <img id="modalImage" class="w-full h-auto rounded-lg" src="" alt="">
                                <h3 id="modalTitle" class="text-xl sm:text-2xl font-bold text-white"></h3>
                                <p id="modalDescription" class="text-gray-400"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    // Gallery data
                    const galleryData = {
                        @foreach($galleryItems as $item)
                        '{{ $item->id }}': {
                            image: '{{ asset('storage/' . $item->file_path) }}',
                            title: '{{ app()->getLocale() == 'en' ? ($item->title_en ?? 'Gallery Image') : ($item->judul_id ?? 'Gambar Galeri') }}',
                            description: '{{ app()->getLocale() == 'en' ? ($item->description_en ?? '') : ($item->deskripsi_id ?? '') }}'
                        },
                        @endforeach
                    };

                    function openGalleryModal(id) {
                        const modal = document.getElementById('galleryModal');
                        const modalImage = document.getElementById('modalImage');
                        const modalTitle = document.getElementById('modalTitle');
                        const modalDescription = document.getElementById('modalDescription');
                        
                        const data = galleryData[id];
                        if (data) {
                            modalImage.src = data.image;
                            modalImage.alt = data.title;
                            modalTitle.textContent = data.title;
                            modalDescription.textContent = data.description;
                            modal.classList.remove('hidden');
                            document.body.style.overflow = 'hidden';
                        }
                    }

                    function closeGalleryModal() {
                        const modal = document.getElementById('galleryModal');
                        modal.classList.add('hidden');
                        document.body.style.overflow = '';
                    }

                    // Close modal with Escape key
                    document.addEventListener('keydown', function(e) {
                        if (e.key === 'Escape') {
                            closeGalleryModal();
                        }
                    });
                </script>
            </div>
        </section>

        <!-- Keunggulan Section -->
        <section id="keunggulan" class="py-16 sm:py-20 bg-gray-900">
            <div class="container mx-auto px-4 sm:px-6">
                <div class="text-center mb-10 sm:mb-12" data-aos="fade-up">
                    <h2 class="text-3xl sm:text-4xl font-display text-white">@lang('messages.why_choose_us_title')</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 sm:gap-10 text-center">
                    @forelse($advantages as $index => $advantage)
                    <div data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                        @if($advantage->image_path)
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $advantage->image_path) }}" alt="{{ app()->getLocale() == 'en' ? $advantage->title_en : $advantage->judul_id }}" class="w-20 h-20 sm:w-24 sm:h-24 object-cover mx-auto rounded-lg">
                            </div>
                        @else
                            <div class="bg-[#f48934] text-gray-900 w-14 h-14 sm:w-16 sm:h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                                @if($advantage->icon)
                                    {!! $advantage->icon !!}
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 sm:h-8 sm:w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                @endif
                            </div>
                        @endif
                        <h3 class="text-xl font-bold text-white mb-2">{{ app()->getLocale() == 'en' ? $advantage->title_en : $advantage->judul_id }}</h3>
                        <p class="text-gray-400 text-sm sm:text-base">{{ app()->getLocale() == 'en' ? $advantage->description_en : $advantage->deskripsi_id }}</p>
                    </div>
                    @empty
                    <p class="text-center text-gray-400 col-span-full">@lang('messages.no_advantages')</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Contact Form Section -->
        <section id="kontak" class="py-16 sm:py-20 bg-gray-900">
            <div class="container mx-auto px-4 sm:px-6">
                <div class="text-center mb-10 sm:mb-12" data-aos="fade-up">
                    <h2 class="text-3xl sm:text-4xl font-display text-white">@lang('messages.contact_title')</h2>
                    <p class="text-gray-400 mt-2">@lang('messages.contact_subtitle')</p>
                </div>
                <div class="max-w-4xl mx-auto">
                    @if(session('success'))
                        <div class="bg-green-500/20 border border-green-500 text-green-300 px-4 py-3 rounded-lg relative mb-6" role="alert">
                            <strong class="font-bold">Berhasil!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6" data-aos="fade-up">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-gray-400 mb-2">@lang('messages.contact_form_name')</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full bg-gray-800 border border-gray-700 rounded-lg py-3 px-4 text-white focus:outline-none focus:ring-2 focus:ring-[#f48934]" required>
                                @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="email" class="block text-gray-400 mb-2">@lang('messages.contact_form_email')</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full bg-gray-800 border border-gray-700 rounded-lg py-3 px-4 text-white focus:outline-none focus:ring-2 focus:ring-[#f48934]" required>
                                @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="company" class="block text-gray-400 mb-2">@lang('messages.contact_form_company')</label>
                                <input type="text" id="company" name="company" value="{{ old('company') }}" class="w-full bg-gray-800 border border-gray-700 rounded-lg py-3 px-4 text-white focus:outline-none focus:ring-2 focus:ring-[#f48934]" required>
                                @error('company')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="country" class="block text-gray-400 mb-2">@lang('messages.contact_form_country')</label>
                                <input type="text" id="country" name="country" value="{{ old('country') }}" class="w-full bg-gray-800 border border-gray-700 rounded-lg py-3 px-4 text-white focus:outline-none focus:ring-2 focus:ring-[#f48934]" required>
                                @error('country')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div>
                            <label for="message" class="block text-gray-400 mb-2">@lang('messages.contact_form_message')</label>
                            <textarea id="message" name="message" rows="5" class="w-full bg-gray-800 border border-gray-700 rounded-lg py-3 px-4 text-white focus:outline-none focus:ring-2 focus:ring-[#f48934]" required>{{ old('message') }}</textarea>
                            @error('message')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="bg-[#f48934] text-gray-900 font-bold py-3 px-12 rounded-full hover:bg-amber-400 transition-all duration-300 transform hover:scale-105">
                                @lang('messages.contact_form_submit')
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
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
                            {{ Str::before($settings['site_name'] ?? 'Briket Kita', ' ') }}<span class="text-[#f48934]">{{ Str::after($settings['site_name'] ?? 'Briket Kita', ' ') }}</span>.
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
                        <li><a href="#produk" class="text-gray-400 hover:text-[#f48934] text-sm sm:text-base">@lang('messages.nav_products')</a></li>
                        <li><a href="#video" class="text-gray-400 hover:text-[#f48934] text-sm sm:text-base">@lang('messages.nav_process')</a></li>
                        <li><a href="#keunggulan" class="text-gray-400 hover:text-[#f48934] text-sm sm:text-base">@lang('messages.why_choose_us_title')</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white">@lang('messages.nav_contact')</h4>
                    <p class="text-gray-400 mt-4 text-sm sm:text-base">{{ $settings['company_address'] ?? 'Alamat belum diatur' }}</p>
                    <p class="text-gray-400 text-sm sm:text-base">Email: {{ $settings['company_email'] ?? 'sales@briketkita.com' }}</p>
                    <p class="text-[#f48934] font-bold mt-2 text-sm sm:text-base">WA: {{ $settings['whatsapp_number'] ?? '' }}</p>
                    <div class="flex justify-center md:justify-start space-x-4 mt-4">
                        @if(isset($settings['facebook_url']) && $settings['facebook_url'])
                            <a href="{{ $settings['facebook_url'] }}" target="_blank" class="text-gray-400 hover:text-[#f48934] transition-colors">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                        @if(isset($settings['instagram_url']) && $settings['instagram_url'])
                            <a href="{{ $settings['instagram_url'] }}" target="_blank" class="text-gray-400 hover:text-[#f48934] transition-colors">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                        @if(isset($settings['linkedin_url']) && $settings['linkedin_url'])
                            <a href="{{ $settings['linkedin_url'] }}" target="_blank" class="text-gray-400 hover:text-[#f48934] transition-colors">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        @endif
                        @if(isset($settings['tiktok_url']) && $settings['tiktok_url'])
                            <a href="{{ $settings['tiktok_url'] }}" target="_blank" class="text-gray-400 hover:text-[#f48934] transition-colors">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        @endif
                        @if(isset($settings['x_url']) && $settings['x_url'])
                            <a href="{{ $settings['x_url'] }}" target="_blank" class="text-gray-400 hover:text-[#f48934] transition-colors">
                                <i class="fab fa-x-twitter"></i>
                            </a>
                        @endif
                    </div>
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

            mobileMenuButton.addEventListener('click', function () {
                mobileMenu.classList.toggle('hidden');
            });

            // Close mobile menu when a link is clicked
            mobileMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                });
            });

            // Navbar scroll effect
            window.addEventListener('scroll', function () {
                if (window.scrollY > 50) {
                    navbar.classList.add('bg-gray-900', 'shadow-lg');
                } else {
                    navbar.classList.remove('bg-gray-900', 'shadow-lg');
                }
            });

            // Product Slider Navigation (if applicable)
            const productSlider = document.getElementById('product-slider');
            const prevProductButton = document.getElementById('prev-product');
            const nextProductButton = document.getElementById('next-product');

            if (productSlider && prevProductButton && nextProductButton) {
                prevProductButton.addEventListener('click', () => {
                    productSlider.scrollBy({ left: -productSlider.offsetWidth, behavior: 'smooth' });
                });

                nextProductButton.addEventListener('click', () => {
                    productSlider.scrollBy({ left: productSlider.offsetWidth, behavior: 'smooth' });
                });
            }

            // Set current year in footer
            document.getElementById('year').textContent = new Date().getFullYear();
        });
    </script>
@endsection