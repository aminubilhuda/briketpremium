<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['site_name'] ?? config('app.name', 'Briket Premium') }}</title>
    
    <!-- Favicon -->
    @if(isset($settings['favicon_path']) && $settings['favicon_path'])
        <link rel="icon" href="{{ asset('storage/' . $settings['favicon_path']) }}">
    @else
        {{-- <link rel="icon" href="{{ asset('favicon.ico') }}"> --}}
    @endif
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Playfair Display & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- AOS (Animate On Scroll) Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        .font-display { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }
        .video-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; background: #000; border-radius: 0.75rem; }
        .video-container iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
        .navbar-scrolled { background-color: rgba(17, 24, 39, 0.8); backdrop-filter: blur(10px); }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-900 text-gray-200 font-sans">


    @yield('content')

    <!-- AOS (Animate On Scroll) Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });

        const navbar = document.getElementById('navbar');
        if(navbar) {
            window.onscroll = function () {
                if (window.pageYOffset > 50) {
                    navbar.classList.add("navbar-scrolled");
                } else {
                    navbar.classList.remove("navbar-scrolled");
                }
            };
        }
        
        const yearElement = document.getElementById('year');
        if(yearElement) {
            yearElement.textContent = new Date().getFullYear();
        }

        const productSlider = document.getElementById('product-slider');
        const prevProductButton = document.getElementById('prev-product');
        const nextProductButton = document.getElementById('next-product');

        if (productSlider && prevProductButton && nextProductButton) {
            nextProductButton.addEventListener('click', () => {
                productSlider.scrollBy({ left: 300, behavior: 'smooth' });
            });

            prevProductButton.addEventListener('click', () => {
                productSlider.scrollBy({ left: -300, behavior: 'smooth' });
            });
        }
    </script>
</body>
</html>
