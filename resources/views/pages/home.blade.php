@extends('layouts.app')

@section('content')
    <!-- Header & Navbar -->
    <header id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center relative z-50">
            <a href="#" class="text-2xl font-display font-bold text-white">{{ Str::before($settings['site_name'] ?? 'Briket Kita', ' ') }}<span class="text-amber-400">{{ Str::after($settings['site_name'] ?? 'Briket Kita', ' ') }}</span>.</a>
            <nav class="hidden md:flex space-x-8">
                <a href="#hero" class="hover:text-amber-400 transition-colors">@lang('messages.nav_home')</a>
                <a href="#tentang" class="hover:text-amber-400 transition-colors">@lang('messages.nav_about')</a>
                <a href="#produk" class="hover:text-amber-400 transition-colors">@lang('messages.nav_products')</a>
                <a href="#proses" class="hover:text-amber-400 transition-colors">@lang('messages.nav_process')</a>
                <a href="#galeri" class="hover:text-amber-400 transition-colors">@lang('messages.nav_gallery')</a>
                <a href="#kontak" class="hover:text-amber-400 transition-colors">@lang('messages.nav_contact')</a>
            </nav>
            <div class="flex items-center space-x-4 relative z-50">
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
        <!-- Hero Section -->
        <section id="hero" class="relative min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1621201469018-0133d325a2a4?q=80&w=2070&auto=format&fit=crop');">
            <div class="absolute inset-0 bg-black opacity-60"></div>
            <div class="relative text-center text-white p-6 z-10" data-aos="fade-up">
                <h1 class="text-5xl md:text-7xl font-display mb-4">@lang('messages.hero_title')</h1>
                <p class="text-lg md:text-xl max-w-2xl mx-auto mb-8">@lang('messages.hero_subtitle')</p>
                <a href="#produk" class="bg-amber-500 text-gray-900 font-bold py-3 px-8 rounded-full text-lg hover:bg-amber-400 transition-all duration-300 transform hover:scale-105">
                    @lang('messages.hero_button')
                </a>
            </div>
        </section>

        <!-- Produk Section -->
        <section id="produk" class="py-20 bg-gray-900">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-4xl font-display text-white">@lang('messages.featured_products_title')</h2>
                    <p class="text-gray-400 mt-2">@lang('messages.featured_products_subtitle')</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @forelse($featuredProducts as $index => $product)
                    <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg transform hover:-translate-y-2 transition-transform duration-300" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                        <img src="{{ $product->image_path }}" alt="{{ $product->name }}" class="w-full h-56 object-cover">
                        <div class="p-6">
                            <h3 class="text-2xl font-display text-white mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-400 mb-4">{{ $product->description }}</p>
                            <a href="{{ route('product.detail', $product->slug) }}" class="inline-block bg-transparent border border-amber-500 text-amber-500 font-semibold py-2 px-6 rounded-full hover:bg-amber-500 hover:text-gray-900 transition-all duration-300">
                                @lang('messages.view_details')
                            </a>
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-gray-400 col-span-3">@lang('messages.no_featured_products')</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Tentang Kami Section -->
        <section id="tentang" class="py-20 bg-gray-800">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-4xl font-display text-white">@lang('messages.about_title')</h2>
                    <p class="text-gray-400 mt-2">@lang('messages.about_subtitle')</p>
                </div>
                <div class="relative max-w-2xl mx-auto">
                    <!-- Garis Timeline -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 h-full border-l-2 border-amber-500/30"></div>
                    <!-- Item Timeline 1 -->
                    <div data-aos="fade-up" class="relative mb-12">
                        <div class="absolute w-8 h-8 bg-gray-900 rounded-full border-2 border-amber-500 left-1/2 transform -translate-x-1/2 mt-1"></div>
                        <div class="w-full md:w-1/2 md:pr-8 md:text-right">
                            <p class="text-amber-400 font-semibold">2018</p>
                            <h3 class="text-xl font-bold text-white mt-1">@lang('messages.about_founding_year')</h3>
                            <p class="text-gray-400 mt-2">@lang('messages.about_founding_desc')</p>
                        </div>
                    </div>
                    <!-- Item Timeline 2 -->
                    <div data-aos="fade-up" class="relative mb-12">
                        <div class="absolute w-8 h-8 bg-gray-900 rounded-full border-2 border-amber-500 left-1/2 transform -translate-x-1/2 mt-1"></div>
                        <div class="w-full md:w-1/2 md:ml-auto md:pl-8">
                             <p class="text-amber-400 font-semibold">2020</p>
                            <h3 class="text-xl font-bold text-white mt-1">@lang('messages.about_export_year')</h3>
                            <p class="text-gray-400 mt-2">@lang('messages.about_export_desc')</p>
                        </div>
                    </div>
                    <!-- Item Timeline 3 -->
                    <div data-aos="fade-up" class="relative">
                        <div class="absolute w-8 h-8 bg-gray-900 rounded-full border-2 border-amber-500 left-1/2 transform -translate-x-1/2 mt-1"></div>
                        <div class="w-full md:w-1/2 md:pr-8 md:text-right">
                            <p class="text-amber-400 font-semibold">2023 - @lang('messages.about_present')</p>
                            <h3 class="text-xl font-bold text-white mt-1">@lang('messages.about_expansion_title')</h3>
                            <p class="text-gray-400">@lang('messages.about_expansion_desc')</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Video Profile Section -->
        <section id="video" class="py-20 bg-gray-800">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-4xl font-display text-white">@lang('messages.process_title')</h2>
                    <p class="text-gray-400 mt-2">@lang('messages.process_subtitle')</p>
                </div>
                <div class="max-w-4xl mx-auto" data-aos="zoom-in">
                    <div class="video-container shadow-2xl">
                        @if($youtube_id)
                        <iframe src="https://www.youtube.com/embed/{{ $youtube_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-700"><p class="text-gray-400">@lang('messages.video_not_available')</p></div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Proses Kami Section -->
        <section id="proses" class="py-20 bg-gray-900">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-4xl font-display text-white">@lang('messages.process_title')</h2>
                    <p class="text-gray-400 mt-2">@lang('messages.process_subtitle')</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 text-center">
                    <div data-aos="fade-up" data-aos-delay="100">
                        <div class="bg-gray-800 border-2 border-amber-500/30 text-amber-500 w-24 h-24 mx-auto rounded-full flex items-center justify-center mb-4"><span class="text-4xl font-display">1</span></div>
                        <h3 class="text-xl font-bold text-white mb-2">@lang('messages.process_step1_title')</h3>
                        <p class="text-gray-400">@lang('messages.process_step1_desc')</p>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="200">
                        <div class="bg-gray-800 border-2 border-amber-500/30 text-amber-500 w-24 h-24 mx-auto rounded-full flex items-center justify-center mb-4"><span class="text-4xl font-display">2</span></div>
                        <h3 class="text-xl font-bold text-white mb-2">@lang('messages.process_step2_title')</h3>
                        <p class="text-gray-400">@lang('messages.process_step2_desc')</p>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="300">
                        <div class="bg-gray-800 border-2 border-amber-500/30 text-amber-500 w-24 h-24 mx-auto rounded-full flex items-center justify-center mb-4"><span class="text-4xl font-display">3</span></div>
                        <h3 class="text-xl font-bold text-white mb-2">@lang('messages.process_step3_title')</h3>
                        <p class="text-gray-400">@lang('messages.process_step3_desc')</p>
                    </div>
                     <div data-aos="fade-up" data-aos-delay="400">
                        <div class="bg-gray-800 border-2 border-amber-500/30 text-amber-500 w-24 h-24 mx-auto rounded-full flex items-center justify-center mb-4"><span class="text-4xl font-display">4</span></div>
                        <h3 class="text-xl font-bold text-white mb-2">@lang('messages.process_step4_title')</h3>
                        <p class="text-gray-400">@lang('messages.process_step4_desc')</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Galeri Section -->
        <section id="galeri" class="py-20 bg-gray-800">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-4xl font-display text-white">@lang('messages.gallery_title')</h2>
                    <p class="text-gray-400 mt-2">@lang('messages.gallery_subtitle')</p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @forelse($galleryItems as $item)
                        <div data-aos="zoom-in">
                            <img class="h-auto max-w-full rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300" src="{{ $item->file_path }}" alt="{{ $item->title ?? 'Gambar Galeri' }}">
                        </div>
                    @empty
                        <p class="text-center text-gray-400 col-span-full">@lang('messages.gallery_empty')</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Keunggulan Section -->
        <section id="keunggulan" class="py-20 bg-gray-900">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-4xl font-display text-white">@lang('messages.why_choose_us_title')</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
                    <div data-aos="fade-up" data-aos-delay="100">
                        <div class="bg-amber-500 text-gray-900 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4"><svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.657 7.343A8 8 0 0117.657 18.657z" /></svg></div>
                        <h3 class="text-xl font-bold text-white mb-2">@lang('messages.eco_friendly')</h3>
                        <p class="text-gray-400">@lang('messages.eco_friendly_desc')</p>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="200">
                        <div class="bg-amber-500 text-gray-900 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4"><svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></div>
                        <h3 class="text-xl font-bold text-white mb-2">@lang('messages.long_lasting')</h3>
                        <p class="text-gray-400">@lang('messages.long_lasting_desc')</p>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="300">
                        <div class="bg-amber-500 text-gray-900 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4"><svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2h1a2 2 0 002-2v-1a2 2 0 012-2h1.945M7.8 11.945l.242.242M15.955 11.945l-.242.242" /></svg></div>
                        <h3 class="text-xl font-bold text-white mb-2">@lang('messages.minimal_smoke')</h3>
                        <p class="text-gray-400">@lang('messages.minimal_smoke_desc')</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Form Section -->
        <section id="kontak" class="py-20 bg-gray-900">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-4xl font-display text-white">@lang('messages.contact_title')</h2>
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
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full bg-gray-800 border border-gray-700 rounded-lg py-3 px-4 text-white focus:outline-none focus:ring-2 focus:ring-amber-500" required>
                                @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="email" class="block text-gray-400 mb-2">@lang('messages.contact_form_email')</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full bg-gray-800 border border-gray-700 rounded-lg py-3 px-4 text-white focus:outline-none focus:ring-2 focus:ring-amber-500" required>
                                @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="company" class="block text-gray-400 mb-2">@lang('messages.contact_form_company')</label>
                                <input type="text" id="company" name="company" value="{{ old('company') }}" class="w-full bg-gray-800 border border-gray-700 rounded-lg py-3 px-4 text-white focus:outline-none focus:ring-2 focus:ring-amber-500" required>
                                @error('company')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="country" class="block text-gray-400 mb-2">@lang('messages.contact_form_country')</label>
                                <input type="text" id="country" name="country" value="{{ old('country') }}" class="w-full bg-gray-800 border border-gray-700 rounded-lg py-3 px-4 text-white focus:outline-none focus:ring-2 focus:ring-amber-500" required>
                                @error('country')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div>
                            <label for="message" class="block text-gray-400 mb-2">@lang('messages.contact_form_message')</label>
                            <textarea id="message" name="message" rows="5" class="w-full bg-gray-800 border border-gray-700 rounded-lg py-3 px-4 text-white focus:outline-none focus:ring-2 focus:ring-amber-500" required>{{ old('message') }}</textarea>
                            @error('message')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="bg-amber-500 text-gray-900 font-bold py-3 px-12 rounded-full hover:bg-amber-400 transition-all duration-300 transform hover:scale-105">
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
        <div class="container mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
                <div>
                    <h3 class="text-2xl font-display font-bold text-white">{{ Str::before($settings['site_name'] ?? 'Briket Kita', ' ') }}<span class="text-amber-400">{{ Str::after($settings['site_name'] ?? 'Briket Kita', ' ') }}</span>.</h3>
                    <p class="text-gray-400 mt-2">@lang('messages.footer_tagline')</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white">@lang('messages.footer_quick_links')</h4>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#produk" class="text-gray-400 hover:text-amber-400">@lang('messages.nav_products')</a></li>
                        <li><a href="#video" class="text-gray-400 hover:text-amber-400">@lang('messages.nav_process')</a></li>
                        <li><a href="#keunggulan" class="text-gray-400 hover:text-amber-400">@lang('messages.why_choose_us_title')</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white">@lang('messages.nav_contact')</h4>
                    <p class="text-gray-400 mt-4">{{ $settings['company_address'] ?? 'Alamat belum diatur' }}</p>
                    <p class="text-gray-400">Email: sales@briketkita.com</p>
                    <p class="text-amber-400 font-bold mt-2">WA: {{ $settings['whatsapp_number'] ?? '' }}</p>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-700 pt-6 text-center text-gray-500">
                <p>&copy; <span id="year"></span> {{ $settings['site_name'] ?? 'Briket Kita' }}. @lang('messages.all_rights_reserved')</p>
            </div>
        </div>
    </footer>
@endsection
