<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ARENA FITNESS CENTER | BEAT YOUR LIMITS WITH US!</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <!--alpinejs-->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>


</head>

<body class="bg-gray-100 font-poppins">


    <header id="header" x-data="{ mobileMenuOpen: false, scrolled: false }" class="fixed top-0 left-0 w-full z-50 transition-all duration-500"
        @scroll.window="scrolled = window.pageYOffset > 50"
        :class="scrolled ? 'py-3 bg-black/80 backdrop-blur-lg border-b border-white/10' : 'py-6 bg-transparent'">
        <div class="container mx-auto flex items-center justify-between px-6 lg:px-14">

            <div class="flex items-center group cursor-pointer">
                <div
                    class="w-10 h-10 bg-[#D9FF00] flex items-center justify-center rounded-sm rotate-3 group-hover:rotate-0 transition-transform duration-300">
                    <span class="text-black font-black text-xl italic">A</span>
                </div>
                <div class="ml-3 flex flex-col leading-none">
                    <span class="text-white font-black text-xl tracking-tighter">ARENA</span>
                    <span class="text-[#D9FF00] text-[10px] font-bold tracking-[0.2em] uppercase">Fitness Center</span>
                </div>
            </div>

            <nav class="hidden lg:flex items-center">
                <div class="flex space-x-10 mr-12">
                    <a href="#home"
                        class="relative text-xs font-bold uppercase tracking-[0.2em] text-white hover:text-[#D9FF00] transition-colors group">
                        Home
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-[2px] bg-[#D9FF00] transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#about"
                        class="relative text-xs font-bold uppercase tracking-[0.2em] text-white hover:text-[#D9FF00] transition-colors group">
                        About
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-[2px] bg-[#D9FF00] transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#price"
                        class="relative text-xs font-bold uppercase tracking-[0.2em] text-white hover:text-[#D9FF00] transition-colors group">
                        Price
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-[2px] bg-[#D9FF00] transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#contact"
                        class="relative text-xs font-bold uppercase tracking-[0.2em] text-white hover:text-[#D9FF00] transition-colors group">
                        Contact
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-[2px] bg-[#D9FF00] transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </div>

                <div class="flex items-center space-x-4 border-l border-white/20 pl-8">
                    <a href="{{ route('login') }}"
                        class="text-xs font-bold uppercase tracking-widest text-white hover:text-[#D9FF00] transition-all">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-6 py-3 bg-[#D9FF00] hover:bg-white text-black text-[11px] font-black uppercase tracking-widest transition-all duration-300 transform hover:scale-105">
                        Join Now
                    </a>
                </div>
            </nav>

            <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden group focus:outline-none">
                <div class="space-y-1.5">
                    <span class="block w-8 h-0.5 bg-white transition-all duration-300"
                        :class="mobileMenuOpen ? 'rotate-45 translate-y-2 !bg-[#D9FF00]' : ''"></span>
                    <span class="block w-5 h-0.5 bg-white transition-all duration-300"
                        :class="mobileMenuOpen ? 'opacity-0' : ''"></span>
                    <span class="block w-8 h-0.5 bg-white transition-all duration-300"
                        :class="mobileMenuOpen ? '-rotate-45 -translate-y-2 !bg-[#D9FF00]' : ''"></span>
                </div>
            </button>
        </div>

        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            class="fixed inset-0 z-[-1] bg-black flex items-center justify-center lg:hidden">
            <nav class="flex flex-col items-center space-y-8 text-center">
                <a href="#home" @click="mobileMenuOpen = false"
                    class="text-3xl font-black text-white hover:text-[#D9FF00] uppercase tracking-tighter">Home</a>
                <a href="#about" @click="mobileMenuOpen = false"
                    class="text-3xl font-black text-white hover:text-[#D9FF00] uppercase tracking-tighter">About</a>
                <a href="#faq" @click="mobileMenuOpen = false"
                    class="text-3xl font-black text-white hover:text-[#D9FF00] uppercase tracking-tighter">FAQ</a>
                <a href="#contact" @click="mobileMenuOpen = false"
                    class="text-3xl font-black text-white hover:text-[#D9FF00] uppercase tracking-tighter">Contact</a>

                <div class="pt-8 flex flex-col space-y-4 w-64">
                    <a href="{{ route('register') }}"
                        class="py-4 bg-[#D9FF00] text-black font-black uppercase tracking-widest">Join Member</a>
                    <a href="{{ route('login') }}"
                        class="py-4 border border-white/20 text-white font-black uppercase tracking-widest">Login</a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="relative min-h-screen bg-[#050505] overflow-hidden flex items-center">
        <div class="absolute top-0 right-0 w-full lg:w-7/12 h-full opacity-50 lg:opacity-80">
            <div class="absolute inset-0 bg-gradient-to-r from-[#050505] via-[#050505]/30 to-transparent z-10"></div>
            <img src="arenafitnes.webp" alt="Arena Fitness Jimbaran" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-[#050505] via-transparent to-transparent z-10"></div>
        </div>

        <div class="absolute top-1/4 -left-20 w-96 h-96 bg-[#D9FF00]/10 rounded-full blur-[150px]"></div>

        <div class="container mx-auto px-6 lg:px-14 relative z-20">
            <div class="max-w-3xl">
                <div class="hidden md:flex items-center space-x-4 mb-6" data-aos="fade-down">
                    <div class="h-[2px] w-12 bg-[#D9FF00]"></div>
                    <span class="text-[#D9FF00] font-bold tracking-[0.3em] text-sm uppercase">Pusat Kebugaran
                        Jimbaran</span>
                </div>

                <h1 class="text-5xl md:text-6xl font-black text-white leading-none mb-8" data-aos="fade-up"
                    data-aos-delay="200">
                    BEAT YOUR <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#D9FF00] to-[#a2bd00]">
                        LIMITS.
                    </span>
                </h1>

                <p class="text-gray-400 text-lg md:text-xl max-w-xl mb-12 leading-relaxed font-light" data-aos="fade-up"
                    data-aos-delay="400">
                    Tempat latihan dengan fasilitas lengkap untuk Anda yang serius ingin bertransformasi. Tanpa drama,
                    hanya hasil nyata.
                </p>

                <div class="flex flex-wrap gap-6 items-center" data-aos="fade-up" data-aos-delay="600">
                    <a href="{{ route('register') }}"
                        class="group relative px-10 py-5 bg-[#D9FF00] text-black font-black rounded-sm overflow-hidden transition-all duration-300">
                        <span class="relative z-10 uppercase tracking-tighter">Gabung Sekarang</span>
                        <div
                            class="absolute inset-0 bg-white translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        </div>
                    </a>

                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-10 mt-20 border-l-4 border-[#D9FF00] pl-8"
                    data-aos="fade-left" data-aos-delay="800">
                    <div>
                        <p class="text-4xl font-black text-white italic">24/7</p>
                        <p class="text-gray-500 uppercase text-xs tracking-[0.2em] mt-1">Akses Member</p>
                    </div>
                    <div>
                        <p class="text-4xl font-black text-white italic">50+</p>
                        <p class="text-gray-500 uppercase text-xs tracking-[0.2em] mt-1">Alat Import</p>
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-4xl font-black text-white italic">FREE</p>
                        <p class="text-gray-500 uppercase text-xs tracking-[0.2em] mt-1">Parkir Luas</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden xl:flex absolute right-10 bottom-10 flex-col gap-6 text-white/30 text-xl items-center">
            <div class="w-[1px] h-32 bg-white/20"></div>
            <a href="#" class="hover:text-[#D9FF00] transition-colors"><i class="fab fa-instagram"></i></a>
            <a href="#" class="hover:text-[#D9FF00] transition-colors"><i class="fab fa-facebook-f"></i></a>
        </div>
    </section>


    <section id="about" class="py-24 bg-[#f4f4f4] relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-20 bg-gradient-to-b from-[#050505] to-transparent opacity-10"></div>

        <div class="container mx-auto px-6 lg:px-14">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6 relative z-10">
                <div class="max-w-xl">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-8 h-[2px] bg-[#D9FF00]"></span>
                        <h2 class="text-[#a2bd00] font-bold tracking-[0.2em] text-xs uppercase">Core Features</h2>
                    </div>
                    <h3 class="text-4xl md:text-5xl font-black text-[#1a1a1a] leading-none uppercase italic">
                        KENAPA HARUS <br><span class="text-gray-400">ARENA FITNESS?</span>
                    </h3>
                </div>
                <p class="text-gray-500 max-w-xs text-sm border-l-2 border-[#D9FF00] pl-4">
                    Standar fasilitas tinggi untuk hasil transformasi yang maksimal.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 relative z-10">
                <div
                    class="group p-10 bg-white border border-gray-200 hover:border-[#D9FF00] transition-all duration-500 shadow-sm hover:shadow-xl">
                    <div
                        class="w-12 h-12 bg-[#1a1a1a] text-[#D9FF00] flex items-center justify-center font-black mb-8 group-hover:bg-[#D9FF00] group-hover:text-black transition-colors">
                        01
                    </div>
                    <h4 class="text-xl font-black text-gray-900 mb-4 uppercase italic">Alat Standar Global</h4>
                    <p class="text-gray-500 text-sm leading-relaxed">Peralatan lengkap dan modern yang dirawat rutin
                        untuk keamanan dan kenyamanan latihan Anda.</p>
                </div>

                <div
                    class="group p-10 bg-white border border-gray-200 hover:border-[#D9FF00] transition-all duration-500 shadow-sm hover:shadow-xl">
                    <div
                        class="w-12 h-12 bg-[#1a1a1a] text-[#D9FF00] flex items-center justify-center font-black mb-8 group-hover:bg-[#D9FF00] group-hover:text-black transition-colors">
                        02
                    </div>
                    <h4 class="text-xl font-black text-gray-900 mb-4 uppercase italic">Harga Transparan</h4>
                    <p class="text-gray-500 text-sm leading-relaxed">Tanpa biaya pendaftaran yang rumit. Pilih paket
                        yang sesuai dengan budget dan target Anda.</p>
                </div>

                <div
                    class="group p-10 bg-white border border-gray-200 hover:border-[#D9FF00] transition-all duration-500 shadow-sm hover:shadow-xl">
                    <div
                        class="w-12 h-12 bg-[#1a1a1a] text-[#D9FF00] flex items-center justify-center font-black mb-8 group-hover:bg-[#D9FF00] group-hover:text-black transition-colors">
                        03
                    </div>
                    <h4 class="text-xl font-black text-gray-900 mb-4 uppercase italic">Area Luas</h4>
                    <p class="text-gray-500 text-sm leading-relaxed">Sirkulasi udara maksimal dan tata letak alat yang
                        lega, membuat latihan tidak terasa sesak.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="profil" class="py-24 bg-[#1a1a1a] relative">
        <div class="absolute top-0 left-0 w-full h-32 bg-[#f4f4f4] clip-path-your-choice"
            style="clip-path: polygon(0 0, 100% 0, 100% 20%, 0 100%);"></div>

        <div class="container mx-auto px-6 lg:px-14 relative z-10 mt-10">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="w-full lg:w-1/2 relative group">
                    <div class="relative z-10 overflow-hidden">
                        <img src="gambarabout.webp" alt="Arena Fitness"
                            class="rounded-none shadow-2xl filter grayscale group-hover:grayscale-0 transition-all duration-700">
                    </div>
                    <div
                        class="absolute -bottom-4 -right-4 w-full h-full border-2 border-[#D9FF00] -z-10 group-hover:bottom-0 group-hover:right-0 transition-all">
                    </div>
                </div>

                <div class="w-full lg:w-1/2">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-12 h-[3px] bg-[#D9FF00]"></span>
                        <span class="text-[#D9FF00] font-bold tracking-[0.3em] text-xs uppercase">Our Story</span>
                    </div>
                    <h2 class="text-white text-4xl md:text-5xl font-black italic uppercase leading-none mb-8">
                        LEBIH DARI <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-500">SEKADAR
                            GYM.</span>
                    </h2>

                    <p class="text-gray-300 text-lg border-l-4 border-[#D9FF00] pl-6 italic mb-8">
                        "Kami membangun komunitas bagi mereka yang percaya bahwa kekuatan fisik adalah kunci mental yang
                        hebat."
                    </p>

                    <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                        <div class="flex items-center text-gray-400 text-xs font-bold uppercase tracking-widest">
                            <i class="fas fa-check-square text-[#D9FF00] mr-3"></i> Free High-Speed WiFi
                        </div>
                        <div class="flex items-center text-gray-400 text-xs font-bold uppercase tracking-widest">
                            <i class="fas fa-check-square text-[#D9FF00] mr-3"></i> Shower Room
                        </div>
                        <div class="flex items-center text-gray-400 text-xs font-bold uppercase tracking-widest">
                            <i class="fas fa-check-square text-[#D9FF00] mr-3"></i> Parkir Luas
                        </div>
                        <div class="flex items-center text-gray-400 text-xs font-bold uppercase tracking-widest">
                            <i class="fas fa-check-square text-[#D9FF00] mr-3"></i> Free Air Minum
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Membership Steps Section -->
    <section id="member" class="py-24 bg-[#080808] relative overflow-hidden">
        <div class="absolute top-10 left-0 w-full overflow-hidden select-none pointer-events-none opacity-[0.03]">
            <h2 class="text-[15rem] font-black text-white leading-none whitespace-nowrap">
                WORK HARD PLAY HARD WORK HARD
            </h2>
        </div>

        <div class="container mx-auto px-6 lg:px-14 relative z-10">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-20 gap-6">
                <div class="max-w-2xl">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="w-10 h-[2px] bg-[#D9FF00]"></span>
                        <span class="text-[#D9FF00] font-bold tracking-[0.3em] text-xs uppercase">How to Join</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-black text-white leading-tight">
                        MULAI TRANSFORMASI <br><span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-[#D9FF00] to-white">DALAM 5
                            LANGKAH.</span>
                    </h2>
                </div>
                <p class="text-gray-500 max-w-xs text-sm border-l border-white/10 pl-6">
                    Proses pendaftaran digital yang cepat. Tidak perlu antre lama, semua bisa dilakukan dari smartphone
                    Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4">

                <div
                    class="group relative p-8 bg-[#111] border border-white/5 hover:border-[#D9FF00]/50 transition-all duration-500 overflow-hidden">
                    <span
                        class="absolute -right-4 -top-4 text-7xl font-black text-white/[0.03] group-hover:text-[#D9FF00]/10 transition-colors">01</span>
                    <div class="relative z-10">
                        <div
                            class="w-12 h-12 bg-[#D9FF00] text-black flex items-center justify-center font-black text-xl mb-8 skew-x-[-12deg]">
                            01
                        </div>
                        <h3
                            class="text-white font-bold text-xl mb-4 group-hover:text-[#D9FF00] transition-colors uppercase">
                            Registrasi</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Klik "Join Member" dan lengkapi formulir
                            digital dengan data diri Anda.</p>
                    </div>
                </div>

                <div
                    class="group relative p-8 bg-[#111] border border-white/5 hover:border-[#D9FF00]/50 transition-all duration-500 overflow-hidden lg:mt-10">
                    <span
                        class="absolute -right-4 -top-4 text-7xl font-black text-white/[0.03] group-hover:text-[#D9FF00]/10 transition-colors">02</span>
                    <div class="relative z-10">
                        <div
                            class="w-12 h-12 bg-[#D9FF00] text-black flex items-center justify-center font-black text-xl mb-8 skew-x-[-12deg]">
                            02
                        </div>
                        <h3
                            class="text-white font-bold text-xl mb-4 group-hover:text-[#D9FF00] transition-colors uppercase">
                            Aktivasi</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Verifikasi akun melalui email yang kami
                            kirimkan untuk keamanan data.</p>
                    </div>
                </div>

                <div
                    class="group relative p-8 bg-[#111] border border-white/5 hover:border-[#D9FF00]/50 transition-all duration-500 overflow-hidden">
                    <span
                        class="absolute -right-4 -top-4 text-7xl font-black text-white/[0.03] group-hover:text-[#D9FF00]/10 transition-colors">03</span>
                    <div class="relative z-10">
                        <div
                            class="w-12 h-12 bg-[#D9FF00] text-black flex items-center justify-center font-black text-xl mb-8 skew-x-[-12deg]">
                            03
                        </div>
                        <h3
                            class="text-white font-bold text-xl mb-4 group-hover:text-[#D9FF00] transition-colors uppercase">
                            Payment</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Lakukan pembayaran di kasir Arena Fitness
                            sesuai paket pilihan Anda.</p>
                    </div>
                </div>

                <div
                    class="group relative p-8 bg-[#111] border border-white/5 hover:border-[#D9FF00]/50 transition-all duration-500 overflow-hidden lg:mt-10">
                    <span
                        class="absolute -right-4 -top-4 text-7xl font-black text-white/[0.03] group-hover:text-[#D9FF00]/10 transition-colors">04</span>
                    <div class="relative z-10">
                        <div
                            class="w-12 h-12 bg-[#D9FF00] text-black flex items-center justify-center font-black text-xl mb-8 skew-x-[-12deg]">
                            04
                        </div>
                        <h3
                            class="text-white font-bold text-xl mb-4 group-hover:text-[#D9FF00] transition-colors uppercase">
                            Verify</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Admin akan memvalidasi pembayaran Anda dalam
                            hitungan menit.</p>
                    </div>
                </div>

                <div
                    class="group relative p-8 bg-[#111] border border-white/5 hover:border-[#D9FF00]/50 transition-all duration-500 overflow-hidden">
                    <span
                        class="absolute -right-4 -top-4 text-7xl font-black text-white/[0.03] group-hover:text-[#D9FF00]/10 transition-colors">05</span>
                    <div class="relative z-10">
                        <div
                            class="w-12 h-12 bg-[#D9FF00] text-black flex items-center justify-center font-black text-xl mb-8 skew-x-[-12deg]">
                            05
                        </div>
                        <h3
                            class="text-white font-bold text-xl mb-4 group-hover:text-[#D9FF00] transition-colors uppercase">
                            Training</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Selesai! Dashboard aktif dan Anda siap
                            membakar kalori di gym.</p>
                    </div>
                </div>

            </div>

            <div class="mt-20 flex justify-center">
                <a href="{{ route('register') }}"
                    class="group flex items-center gap-4 bg-transparent border border-white/20 px-8 py-4 text-white hover:bg-[#D9FF00] hover:text-black hover:border-[#D9FF00] transition-all duration-300">
                    <span class="font-black uppercase tracking-widest text-sm">Mulai Registrasi Digital</span>
                    <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="price" class="py-24 bg-[#f4f4f4] relative overflow-hidden">
        <div class="container mx-auto px-6 lg:px-14 relative z-10">
            <div class="text-center mb-20">
                <div class="flex items-center justify-center gap-3 mb-4">
                    <span class="w-8 h-[2px] bg-[#D9FF00]"></span>
                    <span class="text-gray-500 font-bold tracking-[0.3em] text-xs uppercase">Choose Your Plan</span>
                    <span class="w-8 h-[2px] bg-[#D9FF00]"></span>
                </div>
                <h2 class="text-4xl md:text-6xl font-black text-gray-900 italic uppercase">
                    INVESTASI <span class="text-gray-400">TUBUH ANDA.</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-5xl mx-auto">

                <div
                    class="group relative bg-white border border-gray-200 p-10 transition-all duration-500 hover:shadow-2xl hover:border-[#D9FF00]">
                    <div class="flex justify-between items-start mb-12">
                        <div>
                            <h3 class="text-2xl font-black text-gray-900 uppercase italic leading-none">Daily Pass</h3>
                            <p class="text-gray-400 text-xs mt-2 uppercase tracking-widest font-bold">Sekali Datang</p>
                        </div>
                        <div
                            class="w-12 h-12 bg-gray-100 flex items-center justify-center text-gray-400 group-hover:bg-[#D9FF00] group-hover:text-black transition-colors">
                            <i class="fas fa-bolt"></i>
                        </div>
                    </div>

                    <div class="mb-10">
                        <div class="flex items-baseline">
                            <span class="text-gray-400 text-lg font-bold">Rp</span>
                            <span class="text-6xl font-black text-gray-900 tracking-tighter ml-1">15K</span>
                            <span class="text-gray-400 text-sm ml-2 italic">/visit</span>
                        </div>
                    </div>

                    <ul class="space-y-4 mb-12 border-t border-gray-100 pt-8">
                        <li class="flex items-center text-gray-600 text-sm font-medium">
                            <i class="fas fa-check text-[#D9FF00] mr-3"></i> Akses Full 1 Hari
                        </li>
                        <li class="flex items-center text-gray-600 text-sm font-medium">
                            <i class="fas fa-check text-[#D9FF00] mr-3"></i> Semua Alat Import
                        </li>
                        <li class="flex items-center text-gray-600 text-sm font-medium">
                            <i class="fas fa-check text-[#D9FF00] mr-3"></i> Free Parking Area
                        </li>
                    </ul>

                    <button
                        class="w-full py-4 border-2 border-gray-900 text-gray-900 font-black uppercase tracking-widest text-xs hover:bg-gray-900 hover:text-white transition-all">
                        Coba Hari Ini
                    </button>
                </div>

                <div
                    class="group relative bg-[#111] p-10 transition-all duration-500 shadow-2xl scale-105 z-10 overflow-hidden">
                    <div
                        class="absolute top-0 right-0 bg-[#D9FF00] text-black font-black text-[10px] px-6 py-2 uppercase tracking-widest rotate-0">
                        Best Value
                    </div>

                    <div class="flex justify-between items-start mb-12">
                        <div>
                            <h3 class="text-2xl font-black text-white uppercase italic leading-none">Monthly Member
                            </h3>
                            <p class="text-[#D9FF00] text-xs mt-2 uppercase tracking-widest font-bold">Akses Tanpa
                                Batas</p>
                        </div>
                        <div class="w-12 h-12 bg-[#D9FF00] flex items-center justify-center text-black font-black">
                            <i class="fas fa-crown"></i>
                        </div>
                    </div>

                    <div class="mb-10">
                        <div class="flex items-baseline">
                            <span class="text-gray-500 text-lg font-bold">Rp</span>
                            <span class="text-6xl font-black text-white tracking-tighter ml-1">100K</span>
                            <span class="text-gray-500 text-sm ml-2 italic">/month</span>
                        </div>
                    </div>

                    <ul class="space-y-4 mb-12 border-t border-white/10 pt-8">
                        <li class="flex items-center text-gray-300 text-sm font-medium">
                            <i class="fas fa-check text-[#D9FF00] mr-3"></i> Unlimited 30 Hari
                        </li>
                        <li class="flex items-center text-gray-300 text-sm font-medium">
                            <i class="fas fa-check text-[#D9FF00] mr-3"></i> Lebih Hemat 50%
                        </li>
                        <li class="flex items-center text-gray-300 text-sm font-medium">
                            <i class="fas fa-check text-[#D9FF00] mr-3"></i> Dashboard Member Aktif
                        </li>
                        <li class="flex items-center text-gray-300 text-sm font-medium">
                            <i class="fas fa-check text-[#D9FF00] mr-3"></i> Konsultasi Alat Gratis
                        </li>
                    </ul>

                    <a href="{{ route('register') }}"
                        class="block w-full py-4 bg-[#D9FF00] text-black text-center font-black uppercase tracking-widest text-xs hover:bg-white transition-all">
                        Join Member Sekarang
                    </a>
                </div>

            </div>
        </div>
    </section>



    <footer id="contact" class="bg-black border-t border-white/5 pt-24 pb-12 relative overflow-hidden">
        <div class="container mx-auto px-6 lg:px-14 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-20">

                <div class="lg:col-span-2">
                    <div class="flex items-center gap-4 mb-8">
                        <div
                            class="w-12 h-12 bg-[#D9FF00] flex items-center justify-center font-black text-2xl italic text-black">
                            A</div>
                        <h2 class="text-white text-3xl font-black tracking-tighter uppercase">ARENA <span
                                class="text-[#D9FF00]">FITNESS.</span></h2>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed max-w-sm mb-8">
                        Pusat kebugaran modern di Jimbaran yang fokus pada hasil nyata. Dilengkapi fasilitas import dan
                        lingkungan latihan yang agresif namun nyaman.
                    </p>
                    <div class="flex gap-4">
                        <a href="#"
                            class="w-10 h-10 border border-white/10 flex items-center justify-center text-white hover:bg-[#D9FF00] hover:text-black transition-all"><i
                                class="fab fa-instagram"></i></a>
                        <a href="#"
                            class="w-10 h-10 border border-white/10 flex items-center justify-center text-white hover:bg-[#D9FF00] hover:text-black transition-all"><i
                                class="fab fa-tiktok"></i></a>
                        <a href="#"
                            class="w-10 h-10 border border-white/10 flex items-center justify-center text-white hover:bg-[#D9FF00] hover:text-black transition-all"><i
                                class="fab fa-facebook-f"></i></a>
                    </div>
                </div>

                <div>
                    <h4 class="text-white font-black uppercase tracking-[0.2em] text-xs mb-8">Navigation</h4>
                    <ul class="space-y-4 text-gray-500 text-sm font-bold uppercase">
                        <li><a href="#home" class="hover:text-[#D9FF00] transition-colors tracking-widest">Home</a>
                        </li>
                        <li><a href="#about" class="hover:text-[#D9FF00] transition-colors tracking-widest">The
                                Standard</a></li>
                        <li><a href="#harga-member"
                                class="hover:text-[#D9FF00] transition-colors tracking-widest">Membership</a></li>
                        <li><a href="#contact"
                                class="hover:text-[#D9FF00] transition-colors tracking-widest">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-black uppercase tracking-[0.2em] text-xs mb-8">Ready to Start?</h4>
                    <p class="text-gray-500 text-xs mb-6 uppercase tracking-widest">Daftar sekarang dan dapatkan akses
                        penuh hari ini.</p>
                    <a href="{{ route('register') }}"
                        class="inline-block w-full py-4 bg-white text-black text-center font-black uppercase tracking-widest text-[10px] hover:bg-[#D9FF00] transition-all">
                        Join The Member
                    </a>
                </div>
            </div>

            <div class="pt-12 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-gray-600 text-[10px] font-bold uppercase tracking-[0.3em]">
                    &copy; 2024 ARENA FITNESS CENTER JIMBARAN. ALL RIGHTS RESERVED.
                </p>
                <div class="flex gap-8">
                    <a href="#"
                        class="text-gray-600 text-[10px] font-bold uppercase tracking-widest hover:text-white transition-colors">Privacy
                        Policy</a>
                    <a href="#"
                        class="text-gray-600 text-[10px] font-bold uppercase tracking-widest hover:text-white transition-colors">Terms</a>
                </div>
            </div>
        </div>

        <div class="absolute bottom-[-50px] left-0 w-full opacity-[0.02] select-none pointer-events-none">
            <h2 class="text-[20rem] font-black text-white leading-none text-center italic tracking-tighter">ARENA</h2>
        </div>
    </footer>

    <script>
        // JavaScript untuk mendeteksi scroll dan mengubah background header
        window.addEventListener("scroll", function() {
            const header = document.getElementById("header");
            const mobileDropdown = document.getElementById("mobile-dropdown");

            const isDropdownVisible = !mobileDropdown.classList.contains("hidden"); // Cek apakah dropdown terbuka
            if (window.scrollY > 50 || isDropdownVisible) {
                // Jika scroll lebih dari 50px atau dropdown terbuka
                header.classList.add("bg-warna-300", "shadow-lg");
                header.classList.remove("bg-transparent");
            } else {
                header.classList.add("bg-transparent");
                header.classList.remove("bg-warna-300", "shadow-lg");
            }
        });

        // START FAQ ACCORDION LOGIC - VERSI DIPERBAIKI
        const faqItems = document.querySelectorAll('[id^="faq"]'); // Memilih semua elemen FAQ

        faqItems.forEach(item => {
            item.addEventListener('click', () => {
                const answerId = `answer${item.id.replace('faq', '')}`;
                const currentAnswer = document.getElementById(answerId);
                const chevronIcon = item.querySelector('.fa-chevron-down');

                // Cek apakah jawaban yang sedang diklik sudah terbuka
                const isOpen = !currentAnswer.classList.contains('hidden');

                // Tutup semua jawaban FAQ yang sedang terbuka (kecuali yang baru saja diklik jika mau dibuka)
                faqItems.forEach(otherItem => {
                    const otherAnswerId = `answer${otherItem.id.replace('faq', '')}`;
                    const otherAnswer = document.getElementById(otherAnswerId);
                    const otherChevronIcon = otherItem.querySelector('.fa-chevron-down');

                    // Jika jawaban item lain terbuka, tutup mereka
                    if (otherAnswer && !otherAnswer.classList.contains(
                        'hidden')) { // Pastikan otherAnswer ada dan terbuka
                        otherAnswer.classList.add('hidden'); // Sembunyikan jawaban
                        otherChevronIcon.classList.remove('rotate-180'); // Putar ikon kembali
                    }
                });

                // Hanya jika item yang diklik sebelumnya tertutup, buka sekarang
                // Jika sebelumnya sudah terbuka (dan sudah ditutup di loop di atas), biarkan tertutup
                if (!isOpen) {
                    currentAnswer.classList.remove('hidden'); // Buka jawaban yang diklik
                    chevronIcon.classList.add('rotate-180'); // Putar ikon
                }
                // Jika `isOpen` adalah true, artinya diklik untuk menutupnya,
                // maka class 'hidden' sudah ditambahkan dan rotate-180 sudah dihapus di loop atas.
                // Tidak perlu tindakan tambahan di sini.
            });
        });
        // END FAQ ACCORDION LOGIC

        // JavaScript to toggle the mobile dropdown menu
        const mobileMenuButton = document.getElementById('mobile-menu');
        const mobileDropdown = document.getElementById('mobile-dropdown');
        const header = document.getElementById('header');

        mobileMenuButton.addEventListener('click', () => {
            const isHidden = mobileDropdown.classList.contains('hidden');

            if (isHidden) {
                mobileDropdown.classList.remove('hidden', '-translate-y-full');
                header.classList.add('bg-warna-300');
            } else {
                mobileDropdown.classList.add('-translate-y-full');
                setTimeout(() => {
                    mobileDropdown.classList.add('hidden');
                }, 300);
            }
        });

        // JavaScript to close mobile dropdown and scroll to top when clicking a link
        const mobileMenuLinks = document.querySelectorAll('#mobile-dropdown a');

        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileDropdown.classList.add('-translate-y-full');
                setTimeout(() => {
                    mobileDropdown.classList.add('hidden');
                }, 300);

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>

</body>

</html>
