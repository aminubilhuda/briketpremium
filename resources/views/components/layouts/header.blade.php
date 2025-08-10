@props(['settings'])

<header class="fixed top-0 left-0 right-0 z-50 bg-gray-900/70 backdrop-blur-sm">
    <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="/" class="text-xl font-bold text-white hover:text-yellow-400 transition-colors">
            {{ $settings['site_name'] ?? config('app.name', 'Laravel') }}
        </a>
        {{-- Navigasi Desktop --}}
        <div class="hidden md:flex space-x-6 text-white">
            <a href="#home" class="hover:text-yellow-400">Beranda</a>
            <a href="#about" class="hover:text-yellow-400">Tentang Kami</a>
            <a href="#products" class="hover:text-yellow-400">Produk</a>
            <a href="#process" class="hover:text-yellow-400">Proses</a>
            <a href="#gallery" class="hover:text-yellow-400">Galeri</a>
            <a href="#contact" class="hover:text-yellow-400">Kontak</a>
        </div>
        {{-- Tombol Menu Mobile --}}
        <div class="md:hidden">
            <button class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            </button>
        </div>
    </nav>
</header>
