<!-- filepath: c:\laragon\www\gymyankarta\resources\views\components\layouts\dashboard.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin Jimbaran Sport Center</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Hapus debug border ini */
        /* * {
            border: orangered 1px solid !important;
        } */

        /* Prevent horizontal scroll */
        html,
        body {
            overflow-x: hidden;
        }

        /* Ensure proper box sizing */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }
    </style>
</head>

<body class="bg-gray-100 font-poppins text-warna-300 overflow-x-hidden" x-data="{ sidebarOpen: false, showLogoutModal: false }" x-init="showLogoutModal = false">
    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <nav class="fixed top-0 left-0 right-0 z-40 h-16 bg-white border-b border-slate-100 shadow-sm">
    <div class="h-16 px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="hidden lg:flex items-center flex-shrink-0">
                <div class="h-10 w-10 bg-[#0F172A] rounded-xl flex items-center justify-center shadow-lg shadow-slate-200 mr-3 group transition-transform hover:rotate-6">
                    <span class="text-warna-500 font-black text-2xl italic tracking-tighter">S</span>
                </div>
                
                <a href="{{ route('dashboard') }}" class="flex flex-col leading-none">
                    <span class="text-xl font-black text-[#0F172A] tracking-tighter uppercase italic">
                        SPORT <span class="text-warna-500">CENTER</span>
                    </span>
                    <span class="text-[9px] font-bold text-slate-400 tracking-[0.3em] uppercase">Center Management</span>
                </a>
            </div>

            <div class="flex lg:hidden items-center gap-3">
                <button @click="sidebarOpen = !sidebarOpen"
                    class="text-[#0F172A] hover:bg-slate-50 focus:outline-none h-10 w-10 flex items-center justify-center rounded-xl border border-slate-100 transition-all"
                    aria-label="Toggle Sidebar">
                    <i class="fa-solid fa-bars-staggered"></i>
                </button>
                <div class="h-8 w-8 bg-[#0F172A] rounded-lg flex items-center justify-center">
                    <span class="text-warna-500 font-black text-lg italic">A</span>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <div class="hidden sm:flex flex-col items-end leading-none">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Authenticated Admin</p>
                    <p class="font-black text-[#0F172A] uppercase italic text-sm">
                        {{ Auth::user()->name }}
                    </p>
                </div>
                
                <div class="h-10 w-10 rounded-full bg-slate-100 border-2 border-white shadow-sm flex items-center justify-center text-[#0F172A]">
                    <i class="fa-solid fa-user-shield text-lg"></i>
                </div>
            </div>
        </div>
    </div>
</nav>

        <!-- Main Layout -->
        <div class="flex pt-16">
            <!-- Desktop Sidebar -->
<aside class="hidden lg:block fixed left-0 top-16 h-[calc(100vh-4rem)] w-60 xl:w-72 bg-zinc-900 shadow-2xl overflow-y-auto z-30 flex-shrink-0 border-r border-white/5">
    <div class="p-4 mt-3">
        <nav class="space-y-2">
            
            @php
                // Helper function untuk class menu agar tidak menulis ulang
                $baseClass = "flex items-center px-4 py-3 rounded-xl transition-all duration-300 group font-bold uppercase italic text-xs tracking-widest";
                $activeClass = "bg-warna-400 text-black shadow-[0_0_20px_rgba(217,255,0,0.3)] scale-[1.02]";
                $inactiveClass = "text-slate-200 hover:bg-white/5 hover:text-warna-400";
            @endphp

            <a href="{{ route('dashboard') }}"
                class="{{ $baseClass }} {{ request()->routeIs('dashboard') ? $activeClass : $inactiveClass }}">
                <i class="fa-solid fa-house mr-3 w-5 text-center"></i>
                <span class="truncate">Dashboard</span>
            </a>

            <a href="{{ route('kelola.pendapatan') }}"
                class="{{ $baseClass }} {{ request()->routeIs('kelola.pendapatan') ? $activeClass : $inactiveClass }}">
                <i class="fa-solid fa-money-bill-trend-up mr-3 w-5 text-center"></i>
                <span class="truncate">Kasir</span>
            </a>

            <a href="{{ route('kelola.member') }}"
                class="{{ $baseClass }} {{ request()->routeIs('kelola.member') ? $activeClass : $inactiveClass }}">
                <i class="fa-solid fa-user mr-3 w-5 text-center"></i>
                <span class="truncate">Kelola Member</span>
            </a>

            <div class="h-px bg-gradient-to-r from-transparent via-white/10 to-transparent my-6"></div>

            <a target="_blank" href="{{ route('qr.attendance') }}"
                class="{{ $baseClass }} {{ request()->routeIs('qr.generate') ? $activeClass : $inactiveClass }}">
                <i class="fa-solid fa-qrcode mr-3 w-5 text-center"></i>
                <span class="truncate">QR Absen</span>
            </a>

            <a href="{{ route('pengaturan.harga') }}"
                class="{{ $baseClass }} {{ request()->routeIs('pengaturan.harga') ? $activeClass : $inactiveClass }}">
                <i class="fa-solid fa-gear mr-3 w-5 text-center"></i>
                <span class="truncate">Pengaturan Harga</span>
            </a>

            @php $isLaporanActive = request()->routeIs('laporan.*'); @endphp
            <div class="relative" x-data="{ dropdownOpen: {{ $isLaporanActive ? 'true' : 'false' }} }">
                <button @click="dropdownOpen = !dropdownOpen"
                    class="{{ $baseClass }} w-full {{ $isLaporanActive ? 'bg-white/5 text-warna-400' : 'text-slate-200 hover:bg-white/5 hover:text-warna-400' }}">
                    <i class="fa-solid fa-chart-line mr-3 w-5 text-center"></i>
                    <span class="truncate">Laporan</span>
                    <i class="fa-solid fa-chevron-down ml-auto transition-transform text-[10px]"
                        :class="{ 'rotate-180': dropdownOpen }"></i>
                </button>

                <div x-show="dropdownOpen" x-cloak class="mt-2 space-y-1 ml-4 border-l-2 border-white/5">
                    <a href="{{ route('laporan.member') }}"
                        class="flex items-center px-4 py-2 rounded-lg transition-all text-[10px] font-black uppercase tracking-widest {{ request()->routeIs('laporan.member') ? 'text-warna-400' : 'text-slate-500 hover:text-white' }}">
                        Laporan Member
                    </a>
                    <a href="{{ route('laporan.pendapatan') }}"
                        class="flex items-center px-4 py-2 rounded-lg transition-all text-[10px] font-black uppercase tracking-widest {{ request()->routeIs('laporan.pendapatan') ? 'text-warna-400' : 'text-slate-500 hover:text-white' }}">
                        Laporan Pendapatan
                    </a>
                </div>
            </div>

            <div class="h-px bg-gradient-to-r from-transparent via-white/10 to-transparent my-6"></div>

            <a href="{{ route('reset.password') }}"
                class="{{ $baseClass }} {{ request()->routeIs('reset.password') ? $activeClass : $inactiveClass }}">
                <i class="fa-solid fa-key mr-3 w-5 text-center"></i>
                <span class="truncate">Reset Password</span>
            </a>

            <a href="#" @click="showLogoutModal = true"
                class="{{ $baseClass }} text-red-500 hover:bg-red-500/10 transition-all mt-10">
                <i class="fa-solid fa-right-from-bracket mr-3 w-5 text-center"></i>
                <span class="truncate">Logout</span>
            </a>
        </nav>
    </div>
</aside>

            <!-- Main Content -->
            <main class="flex-1 lg:ml-60 xl:ml-72 min-w-0">
                <div class="p-4 sm:p-6 min-h-[calc(100vh-4rem)]">
                    {{ $slot }}
                </div>
            </main>
        </div>

        <!-- Mobile Sidebar Overlay -->
        <div x-show="sidebarOpen" x-cloak x-transition:enter="transition-opacity ease-linear duration-200"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" @click="sidebarOpen = false"
            class="lg:hidden fixed inset-0 bg-warna-300/50 z-40">
        </div>

        <!-- Mobile Sidebar -->
     <div x-show="sidebarOpen" x-cloak 
    x-transition:enter="transition ease-in-out duration-300 transform"
    x-transition:enter-start="-translate-x-full" 
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in-out duration-300 transform" 
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
    class="lg:hidden fixed top-0 left-0 z-50 h-full w-72 bg-[#0F172A] shadow-2xl overflow-y-auto border-r border-slate-800"
>
    <div class="px-6 py-8 border-b border-slate-800 mb-4 relative overflow-hidden">
        <div class="absolute -top-10 -left-10 w-32 h-32 bg-warna-500/10 rounded-full blur-3xl"></div>
        
        <div class="flex items-center justify-between relative z-10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-warna-500 rounded-xl flex items-center justify-center rotate-3 shadow-lg shadow-warna-500/20">
                    <i class="fas fa-dumbbell text-[#0F172A] text-xl"></i>
                </div>
                <div>
                    <h1 class="text-white text-lg font-black italic leading-none tracking-tighter uppercase">Arena</h1>
                    <h2 class="text-warna-500 text-[10px] font-black italic tracking-[0.2em] uppercase">Fitness Center</h2>
                </div>
            </div>
            <button @click="sidebarOpen = false" class="text-slate-400 hover:text-white transition-colors">
                <i class="fa-solid fa-xmark text-2xl"></i>
            </button>
        </div>
    </div>

    <nav class="px-4 pb-10 space-y-2">
        
        <p class="px-4 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4 italic">Main Menu</p>

        <a href="{{ route('dashboard') }}" @click="sidebarOpen = false"
            class="flex items-center px-4 py-3.5 rounded-2xl transition-all duration-300 group {{ request()->routeIs('dashboard') ? 'bg-warna-500 text-[#0F172A] shadow-lg shadow-warna-500/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white' }}">
            <i class="fa-solid fa-house mr-3 w-5 text-center {{ request()->routeIs('dashboard') ? '' : 'group-hover:text-warna-500' }}"></i>
            <span class="font-black italic uppercase text-xs tracking-widest">Dashboard</span>
        </a>

        <a href="{{ route('kelola.pendapatan') }}" @click="sidebarOpen = false"
            class="flex items-center px-4 py-3.5 rounded-2xl transition-all duration-300 group {{ request()->routeIs('kelola.pendapatan') ? 'bg-warna-500 text-[#0F172A] shadow-lg shadow-warna-500/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white' }}">
            <i class="fa-solid fa-cash-register mr-3 w-5 text-center {{ request()->routeIs('kelola.pendapatan') ? '' : 'group-hover:text-warna-500' }}"></i>
            <span class="font-black italic uppercase text-xs tracking-widest">Point of Sale</span>
        </a>

        <a href="{{ route('kelola.member') }}" @click="sidebarOpen = false"
            class="flex items-center px-4 py-3.5 rounded-2xl transition-all duration-300 group {{ request()->routeIs('kelola.member') ? 'bg-warna-500 text-[#0F172A] shadow-lg shadow-warna-500/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white' }}">
            <i class="fa-solid fa-users-gear mr-3 w-5 text-center {{ request()->routeIs('kelola.member') ? '' : 'group-hover:text-warna-500' }}"></i>
            <span class="font-black italic uppercase text-xs tracking-widest">Manage Member</span>
        </a>

        <div class="h-[1px] bg-slate-800 mx-4 my-6"></div>
        <p class="px-4 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4 italic">System Tools</p>

        <a target="_blank" href="{{ route('qr.attendance') }}" @click="sidebarOpen = false"
            class="flex items-center px-4 py-3.5 rounded-2xl transition-all duration-300 group {{ request()->routeIs('qr.attendance') ? 'bg-warna-500 text-[#0F172A] shadow-lg shadow-warna-500/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white' }}">
            <i class="fa-solid fa-qrcode mr-3 w-5 text-center {{ request()->routeIs('qr.attendance') ? '' : 'group-hover:text-warna-500' }}"></i>
            <span class="font-black italic uppercase text-xs tracking-widest">QR Attendance</span>
        </a>

        <a href="{{ route('pengaturan.harga') }}" @click="sidebarOpen = false"
            class="flex items-center px-4 py-3.5 rounded-2xl transition-all duration-300 group {{ request()->routeIs('pengaturan.harga') ? 'bg-warna-500 text-[#0F172A] shadow-lg shadow-warna-500/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white' }}">
            <i class="fa-solid fa-gears mr-3 w-5 text-center {{ request()->routeIs('pengaturan.harga') ? '' : 'group-hover:text-warna-500' }}"></i>
            <span class="font-black italic uppercase text-xs tracking-widest">Price Settings</span>
        </a>

        @php $isLaporanActive = request()->routeIs('laporan.*'); @endphp
        <div x-data="{ dropdownOpen: {{ $isLaporanActive ? 'true' : 'false' }} }">
            <button @click="dropdownOpen = !dropdownOpen"
                class="flex items-center w-full px-4 py-3.5 text-slate-400 hover:text-white hover:bg-slate-800/50 rounded-2xl transition-all duration-300 group">
                <i class="fa-solid fa-chart-line mr-3 w-5 text-center group-hover:text-warna-500"></i>
                <span class="font-black italic uppercase text-xs tracking-widest text-left">Reports</span>
                <i class="fa-solid fa-chevron-down ml-auto text-[10px] transition-transform" :class="{ 'rotate-180': dropdownOpen }"></i>
            </button>

            <div x-show="dropdownOpen" x-cloak x-collapse class="ml-6 mt-2 space-y-1 border-l border-slate-800">
                <a href="{{ route('laporan.member') }}" @click="sidebarOpen = false"
                    class="block px-6 py-2.5 text-[11px] font-black italic uppercase tracking-widest {{ request()->routeIs('laporan.member') ? 'text-warna-500' : 'text-slate-500 hover:text-white' }}">
                    Member Reports
                </a>
                <a href="{{ route('laporan.pendapatan') }}" @click="sidebarOpen = false"
                    class="block px-6 py-2.5 text-[11px] font-black italic uppercase tracking-widest {{ request()->routeIs('laporan.pendapatan') ? 'text-warna-500' : 'text-slate-500 hover:text-white' }}">
                    Income Reports
                </a>
            </div>
        </div>

        <div class="h-[1px] bg-slate-800 mx-4 my-6"></div>

        <a href="{{ route('reset.password') }}" @click="sidebarOpen = false"
            class="flex items-center px-4 py-3.5 rounded-2xl text-slate-400 hover:text-white hover:bg-slate-800/50 transition-all duration-300">
            <i class="fa-solid fa-shield-halved mr-3 w-5 text-center"></i>
            <span class="font-black italic uppercase text-[10px] tracking-widest">Security</span>
        </a>

        <button @click="showLogoutModal = true; sidebarOpen = false"
            class="w-full flex items-center px-4 py-3.5 rounded-2xl text-rose-500 hover:bg-rose-500/10 transition-all duration-300">
            <i class="fa-solid fa-power-off mr-3 w-5 text-center"></i>
            <span class="font-black italic uppercase text-[10px] tracking-widest">Sign Out</span>
        </button>
    </nav>
</div>
    </div>

    <!-- Logout Modal -->
    <div x-show="showLogoutModal" x-cloak x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-warna-300/50 z-50 flex items-center justify-center p-4">

        <div x-show="showLogoutModal" x-cloak x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95" @click.away="showLogoutModal = false"
            class="bg-white rounded-lg shadow-xl p-6 w-full max-w-sm">

            <div class="text-center">
                <i class="fa-solid fa-exclamation-triangle text-warna-800 text-4xl mb-4"></i>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Konfirmasi Logout</h3>
                <p class="text-gray-600 mb-6">Apakah Anda yakin ingin keluar dari sistem?</p>

                <div class="flex space-x-3">
                    <button @click="showLogoutModal = false"
                        class="flex-1 px-4 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 transition-colors">
                        Batal
                    </button>
                    <a href="{{ route('logout') }}"
                        class="flex-1 px-4 py-2 text-white bg-warna-900 rounded-lg hover:bg-warna-900/80 transition-colors text-center">
                        Ya, Logout
                    </a>
                </div>
            </div>
        </div>
    </div>



    @livewireScripts

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    @stack('scripts')
</body>

</html>
