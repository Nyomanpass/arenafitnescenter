<div class="min-h-screen select-none">
    <!---mobile-->
  <div class="w-full max-w-lg mx-auto lg:hidden pb-12 custom-scrollbar">
    
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-3">
            <div class="w-1.5 h-6 bg-warna-500 rounded-full shadow-[0_0_10px_rgba(var(--warna-500),0.5)]"></div>
            <span class="text-base font-black text-[#0F172A] uppercase italic tracking-wider">Member <span class="text-warna-500">Area</span></span>
        </div>
        
        <div x-data="{ sidebarOpen: false }">
            <div @click="sidebarOpen = true" class="w-10 h-10 bg-[#0F172A] rounded-xl flex items-center justify-center shadow-lg shadow-warna-500/20 border border-warna-500/20 cursor-pointer active:scale-90 transition-all">
                <i class="fa-solid fa-user-ninja text-warna-500 text-lg"></i>
            </div>

            <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false"
                x-transition:enter="transition-opacity duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                class="fixed inset-0 z-40 bg-[#0F172A]/80 backdrop-blur-sm">
            </div>

            <div x-show="sidebarOpen" x-cloak 
                x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                class="fixed top-0 left-0 z-50 h-full w-[85%] bg-white shadow-2xl overflow-hidden flex flex-col">
                
                <div class="bg-[#0F172A] p-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-warna-500 opacity-10 rounded-full -mr-12 -mt-12 blur-2xl"></div>
                    <div class="flex flex-col items-center text-center relative z-10">
                        <div class="w-20 h-20 bg-warna-500 rounded-[2rem] flex items-center justify-center shadow-lg shadow-warna-500/30 transform -rotate-6 mb-4 border-4 border-[#0F172A]">
                            <i class="fa-solid fa-user-tie text-[#0F172A] text-3xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-white uppercase italic tracking-tight">{{ Auth::user()->name }}</h3>
                            <div class="inline-block px-3 py-1 bg-warna-500/10 border border-warna-500/20 rounded-full mt-1">
                                <p class="text-warna-500 text-[9px] font-black tracking-[0.2em] uppercase italic">{{ Auth::user()->role }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex-1 overflow-y-auto p-6 space-y-6">
                    <div class="space-y-4">
                        <x-g-input label="Nama Lengkap" type="text" :disabled="!$isEditMode" wire:model.live="name"
                            class="w-full text-[11px] font-bold border-slate-100 focus:ring-warna-500" />
                        <x-g-input label="Email" type="email" :disabled="!$isEditMode" wire:model.live="email"
                            class="w-full text-[11px] font-bold border-slate-100 focus:ring-warna-500" />
                        <x-g-input label="No. Telepon" type="text" :disabled="!$isEditMode" wire:model.live="nomor_telepon"
                            class="w-full text-[11px] font-bold border-slate-100 focus:ring-warna-500" />
                    </div>

                    <div class="pt-6 border-t border-slate-100 space-y-3">
                        @if (!$isEditMode)
                            <button wire:click="toggleEditMode" class="w-full py-4 bg-warna-500 text-[#0F172A] font-black text-[10px] uppercase italic rounded-2xl shadow-lg shadow-warna-500/20 active:scale-95 transition-all">
                                <i class="fa-solid fa-user-pen mr-2"></i> Edit Profil
                            </button>
                            <button wire:click="toggleChangePasswordModal" class="w-full py-4 bg-white border-2 border-slate-100 text-slate-600 font-black text-[10px] uppercase italic rounded-2xl">
                                <i class="fa-solid fa-shield-halved mr-2"></i> Ganti Password
                            </button>
                            <a href="{{ route('logout') }}" class="flex items-center justify-center w-full py-4 text-rose-500 font-black text-[10px] uppercase italic">
                                <i class="fa-solid fa-power-off mr-2"></i> Logout
                            </a>
                        @else
                            <div class="grid grid-cols-2 gap-3">
                                <button wire:click="toggleEditMode" class="py-4 border-2 border-slate-100 font-black text-[10px] uppercase italic rounded-2xl text-slate-500">Batal</button>
                                <button wire:click="updateProfile" class="py-4 bg-[#0F172A] text-warna-500 font-black text-[10px] uppercase italic rounded-2xl shadow-lg">Simpan</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-[#0F172A] rounded-[2.5rem] p-7 mb-8 shadow-2xl relative overflow-hidden border border-white/5">
        <div class="absolute top-0 right-0 w-40 h-40 bg-warna-500 opacity-10 rounded-full -mr-20 -mt-20 blur-3xl"></div>
        <div class="flex items-center justify-between relative z-10">
            <div>
                <p class="text-warna-500 text-[10px] font-black uppercase tracking-[0.3em] italic mb-1">Status Kehadiran</p>
                <h2 class="text-white text-3xl font-black uppercase italic leading-none">HARI INI</h2>
                <div class="flex items-center gap-2 mt-3">
                    <div class="w-2 h-2 rounded-full {{ $isAttendedToday ? 'bg-green-500 animate-pulse' : 'bg-rose-500' }}"></div>
                    <p class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">{{ now()->translatedFormat('l, d F Y') }}</p>
                </div>
            </div>
            <div class="w-16 h-16 {{ $isAttendedToday ? 'bg-warna-500 shadow-warna-500/40' : 'bg-slate-800 border border-white/10' }} rounded-2xl flex items-center justify-center shadow-2xl transform rotate-6 transition-all duration-500">
                <i class="fas {{ $isAttendedToday ? 'fa-user-check text-[#0F172A]' : 'fa-fingerprint text-warna-500' }} text-3xl"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-4 mb-8">
        <div class="bg-white border-2 border-slate-100 p-5 rounded-[2rem] shadow-sm text-center relative overflow-hidden group">
            <i class="fa-solid fa-users text-[40px] absolute -bottom-2 -right-2 opacity-5 text-[#0F172A] group-hover:scale-110 transition-transform"></i>
            <div class="text-2xl font-black text-[#0F172A] italic leading-none relative z-10">{{ $totalHadir }}</div>
            <div class="text-[8px] font-black text-slate-400 uppercase mt-2 tracking-widest relative z-10">Hadir</div>
        </div>
        <div class="bg-white border-2 border-slate-100 p-5 rounded-[2rem] shadow-sm text-center relative overflow-hidden group">
             <i class="fa-solid fa-user-slash text-[40px] absolute -bottom-2 -right-2 opacity-5 text-rose-500"></i>
            <div class="text-2xl font-black text-rose-500 italic leading-none relative z-10">{{ $totalTidakHadir }}</div>
            <div class="text-[8px] font-black text-slate-400 uppercase mt-2 tracking-widest relative z-10">Tidak Hadir</div>
        </div>
        <div class="bg-warna-500 p-5 rounded-[2rem] shadow-lg shadow-warna-500/20 text-center relative overflow-hidden group">
            <i class="fa-solid fa-user-clock text-[40px] absolute -bottom-2 -right-2 opacity-10 text-[#0F172A]"></i>
            <div class="text-2xl font-black text-[#0F172A] italic leading-none relative z-10">{{ $sisaHariAktif }}</div>
            <div class="text-[8px] font-black text-[#0F172A] uppercase mt-2 tracking-widest opacity-80 relative z-10">Aktif</div>
        </div>
    </div>

    <div class="bg-white border-2 border-slate-100 rounded-[2.5rem] p-6 shadow-sm mb-6">
        <div class="flex items-center justify-between mb-8">
            <h4 class="text-[11px] font-black text-[#0F172A] uppercase italic tracking-widest flex items-center">
                <i class="fa-solid fa-calendar-days text-warna-500 mr-2 text-sm"></i>
                Histori Absensi
            </h4>
            <div class="px-4 py-1.5 bg-[#0F172A] rounded-full text-[10px] font-black text-warna-500 italic shadow-lg">
                {{ $persentaseKehadiran }}% SCORE
            </div>
        </div>

        <div class="flex gap-2 mb-6 bg-slate-100 p-2 rounded-2xl border border-slate-200 shadow-inner">
            <select wire:model.live="selectedMonth" class="flex-1 bg-white border-none text-[10px] font-black uppercase text-[#0F172A] rounded-xl py-2 shadow-sm">
                @foreach($monthOptions as $value => $label) <option value="{{ $value }}">{{ $label }}</option> @endforeach
            </select>
            <select wire:model.live="selectedYear" class="flex-1 bg-white border-none text-[10px] font-black uppercase text-[#0F172A] rounded-xl py-2 shadow-sm">
                @foreach($yearOptions as $value => $label) <option value="{{ $value }}">{{ $label }}</option> @endforeach
            </select>
        </div>

        <div class="grid grid-cols-7 gap-2 mb-8">
            @foreach(['S', 'S', 'R', 'K', 'J', 'S', 'M'] as $dayName)
                <div class="text-center text-[9px] font-black text-slate-300 uppercase py-2 tracking-widest">{{ $dayName }}</div>
            @endforeach
            
            @foreach($calendarDays as $day)
                <div class="aspect-square relative flex flex-col items-center justify-center text-[11px] font-black rounded-xl border-2 transition-all duration-300
                    {{ !$day['isCurrentMonth'] ? 'bg-slate-50 text-slate-200 border-transparent opacity-40' : '' }}
                    {{ $day['isCurrentMonth'] && !$day['isMembershipActive'] ? 'bg-slate-50 text-slate-400 border-slate-100' : '' }}
                    {{ $day['isCurrentMonth'] && $day['isMembershipActive'] && !$day['isAttended'] ? 'bg-white text-slate-800 border-warna-500/10 shadow-sm' : '' }}
                    {{ $day['isAttended'] ? 'bg-[#0F172A] text-white border-warna-500 shadow-xl scale-[1.05] z-10' : '' }}
                    {{ $day['isToday'] && !$day['isAttended'] ? 'ring-2 ring-warna-500 ring-offset-2 border-transparent' : '' }}">
                    
                    {{ $day['day'] }}

                    @if($day['isMembershipActive'] && !$day['isAttended'] && $day['isCurrentMonth'])
                        <div class="absolute bottom-1.5 w-1 h-1 bg-warna-500 rounded-full"></div>
                    @endif

                    @if($day['isAttended'])
                        <div class="absolute top-1.5 right-1.5 w-1.5 h-1.5 bg-warna-500 rounded-full border border-[#0F172A] shadow-[0_0_5px_rgba(var(--warna-500),0.8)]"></div>
                    @endif
                </div>
            @endforeach
        </div>

        <div class="bg-slate-50 rounded-3xl p-5 border border-slate-100 flex flex-wrap gap-5 justify-center">
            <div class="flex items-center gap-2 text-[8px] font-black text-[#0F172A] uppercase italic">
                <div class="w-3.5 h-3.5 bg-[#0F172A] rounded-lg border border-warna-500/30"></div> HADIR
            </div>
            <div class="flex items-center gap-2 text-[8px] font-black text-warna-500 uppercase italic">
                <div class="w-3.5 h-3.5 bg-white border-2 border-warna-500/30 rounded-lg"></div> AKTIF
            </div>
            <div class="flex items-center gap-2 text-[8px] font-black text-warna-500 uppercase italic">
                <div class="w-3.5 h-3.5 ring-2 ring-warna-500 rounded-lg ring-offset-1"></div> HARI INI
            </div>
        </div>
    </div>
</div>
    <!--floating button for absense-->
    <div class="fixed bottom-4 right-4 z-30 lg:hidden">
        <button wire:click="openQrScanner"
            class="w-max h-max  shadow-lg transition-all px-4 py-3  font-semibold rounded-2xl flex items-center justify-center active:scale-95
                {{ $isAttendedToday || Auth::user()->status != 'active' ? 'border-2 border-gray-400 bg-gray-300 text-warna-300 cursor-not-allowed' : 'text-black bg-warna-400 hover:bg-warna-400/80' }}"
            @disabled($isAttendedToday || Auth::user()->status != 'active')>
            <i class="bi bi-qr-code-scan text-2xl mr-2"></i>
            <span class="text-sm">{{ $isAttendedToday ? 'Sudah Absen' : 'Absen' }}</span>
        </button>
    </div>

    <!--desktop-->
  <div class="hidden lg:block bg-slate-50/50">
    <div class="max-w-7xl mx-auto px-6 py-10">
        <div class="flex items-start gap-8">
            
            <div class="w-1/3 sticky top-10">
                <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/60 overflow-hidden border border-slate-100">
                    <div class="bg-[#0F172A] p-10 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-warna-500 opacity-10 rounded-full -mr-16 -mt-16 blur-3xl"></div>
                        <div class="flex flex-col items-center relative z-10">
                            <div class="w-24 h-24 bg-warna-500 rounded-[2rem] flex items-center justify-center shadow-lg shadow-warna-500/40 transform -rotate-6 border-4 border-[#0F172A]">
                                <i class="fa-solid fa-user-ninja text-[#0F172A] text-4xl"></i>
                            </div>
                            <h2 class="text-2xl font-black text-white mt-6 uppercase italic tracking-tight text-center">{{ Auth::user()->name }}</h2>
                            <span class="px-4 py-1 bg-warna-500/20 border border-warna-500/30 rounded-full text-[10px] font-black uppercase text-warna-500 italic mt-2 tracking-widest">
                                {{ Auth::user()->role }}
                            </span>
                        </div>
                    </div>

                    <div class="p-8 space-y-5">
                        <div class="space-y-4">
                            <x-g-input label="Nama Lengkap" type="text" :disabled="!$isEditMode" wire:model.live="name"
                                class="w-full text-sm font-bold border-slate-100 focus:ring-warna-500 rounded-xl" />
                            <x-g-input label="Username" type="text" :disabled="!$isEditMode" wire:model.live="username"
                                class="w-full text-sm font-bold border-slate-100 focus:ring-warna-500 rounded-xl" />
                            <x-g-input label="Email" type="email" :disabled="!$isEditMode" wire:model.live="email"
                                class="w-full text-sm font-bold border-slate-100 focus:ring-warna-500 rounded-xl" />
                            <x-g-input label="No. Telepon" type="text" :disabled="!$isEditMode" wire:model.live="nomor_telepon"
                                class="w-full text-sm font-bold border-slate-100 focus:ring-warna-500 rounded-xl" />
                        </div>

                        <div class="pt-6 space-y-3">
                            <div class="flex gap-3">
                                <button wire:click="toggleEditMode"
                                    class="{{ $isEditMode ? 'w-1/2' : 'w-full' }} py-4 font-black text-[11px] uppercase italic rounded-2xl transition-all active:scale-95 shadow-lg {{ $isEditMode ? 'border-2 border-slate-200 text-slate-500' : 'bg-warna-500 text-[#0F172A] shadow-warna-500/20' }}">
                                    <i class="fa-solid {{ $isEditMode ? 'fa-xmark' : 'fa-user-pen' }} mr-2"></i>
                                    {{ $isEditMode ? 'Batal' : 'Edit Profile' }}
                                </button>
                                @if ($isEditMode)
                                    <button wire:click="updateProfile" wire:loading.attr="disabled"
                                        class="w-1/2 bg-[#0F172A] text-warna-500 font-black text-[11px] uppercase italic py-4 rounded-2xl shadow-xl active:scale-95 flex items-center justify-center gap-2">
                                        <span wire:loading.remove>Simpan</span>
                                        <span wire:loading>Menyimpan...</span>
                                    </button>
                                @endif
                            </div>
                            
                            @if (!$isEditMode)
                                <button wire:click="toggleChangePasswordModal"
                                    class="w-full bg-white border-2 border-slate-100 text-slate-600 font-black text-[11px] uppercase italic py-4 rounded-2xl hover:bg-slate-50 transition-all">
                                    <i class="fa-solid fa-shield-halved mr-2"></i> Ganti Password
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-2/3 space-y-8">
                
                <div class="grid grid-cols-3 gap-6">
                    <div class="bg-white rounded-[2rem] p-6 shadow-sm border-2 border-slate-100 relative overflow-hidden group">
                        <i class="fa-solid fa-users text-6xl absolute -bottom-4 -right-4 opacity-5 text-[#0F172A] group-hover:scale-110 transition-transform"></i>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-check text-green-500"></i>
                            </div>
                            <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Total Hadir</h3>
                        </div>
                        <div class="relative z-10">
                            <p class="text-4xl font-black text-[#0F172A] italic">{{ $totalHadir }} <span class="text-xs font-bold text-slate-400 uppercase not-italic">Hari</span></p>
                            <div class="w-full bg-slate-100 h-1.5 rounded-full mt-4">
                                <div class="bg-green-500 h-1.5 rounded-full" style="width: {{ min(100, $persentaseKehadiran) }}%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2rem] p-6 shadow-sm border-2 border-slate-100 relative overflow-hidden group">
                        <i class="fa-solid fa-user-slash text-6xl absolute -bottom-4 -right-4 opacity-5 text-rose-500 group-hover:scale-110 transition-transform"></i>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-rose-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-times text-rose-500"></i>
                            </div>
                            <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Tidak Hadir</h3>
                        </div>
                        <div class="relative z-10">
                            <p class="text-4xl font-black text-rose-500 italic">{{ $totalTidakHadir }} <span class="text-xs font-bold text-slate-400 uppercase not-italic">Hari</span></p>
                            @php
                                $absentPercentage = ($attendanceStats['membershipActiveDays'] ?? 0) > 0 
                                    ? min(100, ($totalTidakHadir / $attendanceStats['membershipActiveDays']) * 100) : 0;
                            @endphp
                            <div class="w-full bg-slate-100 h-1.5 rounded-full mt-4">
                                <div class="bg-rose-500 h-1.5 rounded-full" style="width: {{ $absentPercentage }}%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-warna-500 rounded-[2rem] p-6 shadow-lg shadow-warna-500/20 relative overflow-hidden group">
                        <i class="fa-solid fa-user-clock text-6xl absolute -bottom-4 -right-4 opacity-10 text-[#0F172A] group-hover:scale-110 transition-transform"></i>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-[#0F172A] rounded-xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-calendar text-warna-500"></i>
                            </div>
                            <h3 class="text-[10px] font-black text-[#0F172A] uppercase tracking-widest italic opacity-70">Masa Aktif</h3>
                        </div>
                        <div class="relative z-10">
                            <p class="text-4xl font-black text-[#0F172A] italic">{{ $sisaHariAktif }} <span class="text-xs font-bold text-[#0F172A] uppercase not-italic opacity-70">Sisa</span></p>
                            @php
                                $progressPercentage = ($totalMembershipDays ?? 0) > 0 
                                    ? min(100, max(0, ($sisaHariAktif / $totalMembershipDays) * 100)) : 0;
                            @endphp
                            <div class="w-full bg-[#0F172A]/10 h-1.5 rounded-full mt-4">
                                <div class="bg-[#0F172A] h-1.5 rounded-full" style="width: {{ $progressPercentage }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-[#0F172A] rounded-[2.5rem] p-8 flex items-center justify-between shadow-2xl relative overflow-hidden border border-white/5">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-warna-500 opacity-5 rounded-full -mr-32 -mt-32 blur-3xl"></div>
                    <div class="flex items-center gap-6 relative z-10">
                        <div class="w-20 h-20 {{ $isAttendedToday ? 'bg-warna-500 shadow-warna-500/40' : 'bg-slate-800' }} rounded-3xl flex items-center justify-center shadow-2xl transform rotate-3 transition-all duration-500">
                            <i class="fas {{ $isAttendedToday ? 'fa-user-check text-[#0F172A]' : 'fa-fingerprint text-warna-500' }} text-4xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-black text-white uppercase italic italic">Absensi Hari Ini</h3>
                            <p class="text-warna-500 text-xs font-bold uppercase tracking-[0.3em] mt-1">{{ now()->translatedFormat('l, d F Y') }}</p>
                        </div>
                    </div>
                    <div class="relative z-10">
                        <button wire:click="openQrScanner"
                            @disabled($isAttendedToday || Auth::user()->status != 'active')
                            class="px-8 py-4 rounded-2xl font-black text-xs uppercase italic tracking-widest transition-all active:scale-95 flex items-center gap-3
                            {{ $isAttendedToday || Auth::user()->status != 'active' ? 'bg-slate-800 text-slate-500 cursor-not-allowed border border-white/5' : 'bg-warna-500 text-[#0F172A] hover:shadow-xl hover:shadow-warna-500/20' }}">
                            <i class="bi bi-qr-code-scan text-xl"></i>
                            {{ $isAttendedToday ? 'Selesai Absen' : 'Scan QR Absensi' }}
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border-2 border-slate-100">
                    <div class="flex items-center justify-between mb-10">
                        <div class="flex items-center gap-3">
                            <div class="w-1.5 h-6 bg-warna-500 rounded-full shadow-[0_0_10px_rgba(var(--warna-500),0.5)]"></div>
                            <span class="text-base font-black text-[#0F172A] uppercase italic tracking-wider">Histori <span class="text-warna-500">Absensi</span></span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="px-5 py-2 bg-[#0F172A] rounded-2xl text-[11px] font-black text-warna-500 italic shadow-lg">
                                SCORE: {{ $persentaseKehadiran }}%
                            </div>
                            <div class="flex gap-2 bg-slate-50 p-1.5 rounded-2xl border border-slate-100 shadow-inner">
                                <select wire:model.live="selectedMonth" class="bg-transparent border-none text-[10px] font-black uppercase text-[#0F172A] focus:ring-0">
                                    @foreach ($monthOptions as $value => $label) <option value="{{ $value }}">{{ $label }}</option> @endforeach
                                </select>
                                <select wire:model.live="selectedYear" class="bg-transparent border-none text-[10px] font-black uppercase text-[#0F172A] focus:ring-0">
                                    @foreach ($yearOptions as $value => $label) <option value="{{ $value }}">{{ $label }}</option> @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-7 gap-3 mb-8">
                        @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
                            <div class="text-center text-[10px] font-black text-slate-300 uppercase py-2 tracking-widest">{{ $day }}</div>
                        @endforeach

                        @foreach ($calendarDays as $day)
                            <div class="aspect-video relative flex flex-col items-center justify-center text-sm font-black rounded-2xl border-2 transition-all duration-300
                                {{ !$day['isCurrentMonth'] ? 'bg-slate-50 text-slate-200 border-transparent opacity-40' : '' }}
                                {{ $day['isCurrentMonth'] && !$day['isMembershipActive'] ? 'bg-slate-50 text-slate-400 border-slate-100' : '' }}
                                {{ $day['isCurrentMonth'] && $day['isMembershipActive'] && !$day['isAttended'] ? 'bg-white text-[#0F172A] border-warna-500/10 hover:border-warna-500 shadow-sm' : '' }}
                                {{ $day['isAttended'] ? 'bg-[#0F172A] text-white border-warna-500 shadow-xl scale-[1.02] z-10' : '' }}
                                {{ $day['isToday'] && !$day['isAttended'] ? 'ring-2 ring-warna-500 ring-offset-4 border-transparent' : '' }}">
                                
                                <span class="text-lg italic">{{ $day['day'] }}</span>

                                @if ($day['isAttended'])
                                    <div class="absolute top-2 right-2 w-2 h-2 bg-warna-500 rounded-full border border-[#0F172A] shadow-[0_0_8px_rgba(var(--warna-500),0.8)]"></div>
                                @endif
                                
                                @if($day['isMembershipActive'] && !$day['isAttended'] && $day['isCurrentMonth'])
                                    <span class="text-[7px] absolute bottom-2 font-black text-warna-500 uppercase italic opacity-60">Membership</span>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <div class="flex items-center justify-center gap-8 pt-8 border-t border-slate-100">
                        <div class="flex items-center gap-2 text-[10px] font-black text-[#0F172A] uppercase italic">
                            <div class="w-4 h-4 bg-[#0F172A] rounded-lg border border-warna-500/30"></div> Hadir
                        </div>
                        <div class="flex items-center gap-2 text-[10px] font-black text-warna-500 uppercase italic">
                            <div class="w-4 h-4 bg-white border-2 border-warna-500/30 rounded-lg"></div> Membership Aktif
                        </div>
                        <div class="flex items-center gap-2 text-[10px] font-black text-warna-500 uppercase italic">
                            <div class="w-4 h-4 ring-2 ring-warna-500 rounded-lg ring-offset-2"></div> Hari Ini
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

    @if ($showQrScanner)
        <div x-data="{
            // State variables
            cameraGranted: false,
            hasError: false,
            errorMessage: '',
            isRequesting: false,
            showStatus: true,
            showSpinner: true,
            statusMessage: 'Memulai sistem...',
            isScanning: false,
        
            // ✅ TAMBAHAN: Camera management
            availableCameras: [],
            currentCameraId: null,
            currentFacingMode: 'environment', // 'environment' for back, 'user' for front
            isBackCamera: true,
        
            // QR Scanner instance
            html5QrCode: null,
        
            async init() {
                console.log('Initializing QR Scanner...');
        
                // Wait for dependencies
                await this.$nextTick();
                await this.waitForDependencies();
        
                // Check browser support
                if (!this.checkBrowserSupport()) {
                    return;
                }
        
                // Load available cameras
                await this.loadAvailableCameras();
        
                // Auto request camera permission
                setTimeout(() => {
                    this.requestCameraPermission();
                }, 500);
            },
        
            async waitForDependencies() {
                let attempts = 0;
                while (typeof Html5Qrcode === 'undefined' && attempts < 10) {
                    console.log('Waiting for Html5Qrcode library...');
                    await new Promise(resolve => setTimeout(resolve, 500));
                    attempts++;
                }
        
                if (typeof Html5Qrcode === 'undefined') {
                    this.setError('Gagal memuat library QR Scanner');
                    return false;
                }
        
                console.log('Html5Qrcode library loaded');
                return true;
            },
        
            // ✅ TAMBAHAN: Load available cameras
            async loadAvailableCameras() {
                try {
                    const cameras = await Html5Qrcode.getCameras();
                    this.availableCameras = cameras || [];
                    console.log('📱 Available cameras:', this.availableCameras);
                } catch (error) {
                    console.log('Could not load cameras:', error);
                    this.availableCameras = [];
                }
            },
        
            checkBrowserSupport() {
                const isHttps = location.protocol === 'https:' ||
                    location.hostname === 'localhost' ||
                    location.hostname === '127.0.0.1';
        
                const hasMediaDevices = navigator.mediaDevices && navigator.mediaDevices.getUserMedia;
        
                if (!isHttps) {
                    this.setError('Camera API memerlukan HTTPS atau localhost');
                    return false;
                }
        
                if (!hasMediaDevices) {
                    this.setError('Browser tidak mendukung Camera API');
                    return false;
                }
        
                return true;
            },
        
            async requestCameraPermission() {
                console.log('Requesting camera permission...');
        
                this.isRequesting = true;
                this.hasError = false;
                this.setStatus('Meminta izin kamera...', true);
        
                try {
                    // ✅ PERBAIKAN: Dynamic constraints based on current facing mode
                    const constraints = {
                        video: {
                            facingMode: { exact: this.currentFacingMode },
                            width: { ideal: 1280, min: 640 },
                            height: { ideal: 720, min: 480 }
                        }
                    };
        
                    let stream;
                    try {
                        stream = await navigator.mediaDevices.getUserMedia(constraints);
                        console.log('✅ Camera accessed with exact constraint');
                    } catch (exactError) {
                        console.log('⚠️ Exact constraint failed, trying ideal...');
                        const fallbackConstraints = {
                            video: {
                                facingMode: { ideal: this.currentFacingMode },
                                width: { ideal: 640, min: 320 },
                                height: { ideal: 480, min: 240 }
                            }
                        };
                        stream = await navigator.mediaDevices.getUserMedia(fallbackConstraints);
                        console.log('✅ Camera accessed with ideal constraint');
                    }
        
                    console.log('Camera permission granted');
                    console.log('Stream tracks:', stream.getTracks().map(t => ({
                        kind: t.kind,
                        label: t.label,
                        settings: t.getSettings()
                    })));
        
                    // Stop test stream
                    stream.getTracks().forEach(track => {
                        console.log('Stopping track:', track.label);
                        track.stop();
                    });
        
                    // Update state
                    this.cameraGranted = true;
                    this.isRequesting = false;
                    this.setStatus('Izin diberikan, memulai scanner...', true);
        
                    // Start actual scanner with delay
                    setTimeout(async () => {
                        await this.startQrScanner();
                    }, 1000);
        
                } catch (error) {
                    console.error('Camera permission error:', error);
                    this.isRequesting = false;
        
                    let errorMessage = 'Gagal mengakses kamera: ';
        
                    switch (error.name) {
                        case 'NotAllowedError':
                            errorMessage += 'Akses ditolak. Silakan izinkan akses kamera di browser.';
                            break;
                        case 'NotFoundError':
                            errorMessage += 'Kamera tidak ditemukan di perangkat.';
                            break;
                        case 'NotSupportedError':
                            errorMessage += 'Browser tidak mendukung akses kamera.';
                            break;
                        case 'NotReadableError':
                            errorMessage += 'Kamera sedang digunakan aplikasi lain.';
                            break;
                        case 'OverconstrainedError':
                            errorMessage += 'Kamera tidak tersedia. Mencoba kamera alternatif...';
                            setTimeout(() => {
                                this.retryWithFlexibleConstraints();
                            }, 1000);
                            return;
                        default:
                            errorMessage += error.message || 'Error tidak diketahui.';
                    }
        
                    this.setError(errorMessage);
                }
            },
        
            async retryWithFlexibleConstraints() {
                try {
                    this.setStatus('Mencari kamera yang tersedia...', true);
        
                    const flexibleConstraints = {
                        video: {
                            facingMode: this.currentFacingMode,
                            width: { min: 320 },
                            height: { min: 240 }
                        }
                    };
        
                    const stream = await navigator.mediaDevices.getUserMedia(flexibleConstraints);
                    console.log('✅ Camera accessed with flexible constraints');
        
                    stream.getTracks().forEach(track => track.stop());
        
                    this.cameraGranted = true;
                    this.isRequesting = false;
                    this.setStatus('Kamera ditemukan, memulai scanner...', true);
        
                    setTimeout(async () => {
                        await this.startQrScanner();
                    }, 1000);
        
                } catch (retryError) {
                    console.error('Flexible constraint retry failed:', retryError);
                    this.setError('Tidak dapat mengakses kamera yang sesuai.');
                }
            },
        
            async startQrScanner() {
                if (this.isScanning) {
        
                    return;
                }
        
                try {
                    this.isScanning = true;
                    this.setStatus('Memulai kamera...', true);
        
                    // Clear any existing scanner
                    if (this.html5QrCode) {
                        try {
                            await this.html5QrCode.stop();
                            await this.html5QrCode.clear();
                        } catch (e) {
                            console.log('Old scanner cleanup:', e);
                        }
                    }
        
                    // Success callback
                    const qrCodeSuccessCallback = (decodedText, decodedResult) => {
        
        
                        this.stopScanner().then(() => {
                            this.setStatus('QR Code terdeteksi! Memproses...', true);
                            this.processQrAndRefresh(decodedText);
                        });
                    };
        
                    // Error callback
                    const qrCodeErrorCallback = (errorMessage) => {
                        if (errorMessage.includes('NotFound') || errorMessage.includes('No QR code found')) {
                            return;
                        }
        
                    };
        
                    // ✅ PERBAIKAN: Scanner config based on camera type
                    const config = {
                        fps: 10,
                        qrbox: { width: 200, height: 200 },
                        aspectRatio: 1.0,
                        showTorchButtonIfSupported: true,
                        showZoomSliderIfSupported: false,
                        defaultZoomValueIfSupported: 1,
                        supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA],
                        videoConstraints: {
                            facingMode: { exact: this.currentFacingMode }
                        }
                    };
        
                    // Initialize scanner
                    this.html5QrCode = new Html5Qrcode('qr-reader');
        
                    // ✅ PERBAIKAN: Select camera based on current facing mode
                    let cameraId = await this.selectCamera();
        
                    this.setStatus('Menghubungkan ke kamera...', true);
        
                    // Start scanner
                    await this.html5QrCode.start(
                        cameraId,
                        config,
                        qrCodeSuccessCallback,
                        qrCodeErrorCallback
                    );
        
                    // ✅ TAMBAHAN: Store current camera ID
                    this.currentCameraId = cameraId;
        
                    setTimeout(() => {
                        this.fixCameraMirror();
                        this.hideStatus();
        
                    }, 1000);
        
                } catch (error) {
        
                    this.isScanning = false;
        
                    let errorMessage = 'Gagal memulai scanner: ';
        
                    if (error.toString().includes('NotAllowedError')) {
                        errorMessage += 'Akses kamera ditolak.';
                    } else if (error.toString().includes('NotFoundError')) {
                        errorMessage += 'Kamera tidak ditemukan.';
                    } else if (error.toString().includes('OverConstrainedError')) {
                        errorMessage += 'Kamera tidak mendukung pengaturan yang diminta.';
                    } else if (error.toString().includes('NotReadableError')) {
                        errorMessage += 'Kamera sedang digunakan aplikasi lain.';
                    } else {
                        errorMessage += error.message || 'Error tidak diketahui.';
                    }
        
                    this.setError(errorMessage);
        
                    if (error.toString().includes('OverConstrainedError')) {
                        console.log('🔄 Retrying with basic constraints...');
                        setTimeout(() => {
                            this.retryWithBasicConfig();
                        }, 2000);
                    }
                }
            },
        
            // ✅ TAMBAHAN: Switch camera function
            async switchCamera() {
                if (!this.isScanning || this.availableCameras.length < 2) {
                    return;
                }
        
                try {
                    this.setStatus('Beralih kamera...', true);
        
                    // Toggle facing mode
                    this.currentFacingMode = this.currentFacingMode === 'environment' ? 'user' : 'environment';
                    this.isBackCamera = this.currentFacingMode === 'environment';
        
                    console.log('🔄 Switching to:', this.currentFacingMode);
        
                    // Stop current scanner
                    await this.stopScanner();
        
                    // Restart with new camera
                    setTimeout(async () => {
                        await this.startQrScanner();
                    }, 500);
        
                } catch (error) {
                    console.error('Error switching camera:', error);
                    this.setError('Gagal beralih kamera: ' + error.message);
                }
            },
        
            fixCameraMirror() {
                try {
                    const videoElement = document.querySelector('#qr-reader video');
                    if (videoElement) {
                        // ✅ PERBAIKAN: Apply mirror only for front camera
                        if (this.currentFacingMode === 'user') {
                            // Front camera - apply mirror
                            videoElement.style.transform = 'scaleX(-1)';
                            videoElement.style.webkitTransform = 'scaleX(-1)';
        
                        } else {
                            // Back camera - no mirror
                            videoElement.style.transform = 'scaleX(1)';
                            videoElement.style.webkitTransform = 'scaleX(1)';
        
                        }
                    }
                } catch (error) {
        
                }
            },
        
            async processQrAndRefresh(qrData) {
                try {
                    await @this.call('processQrScan', qrData);
        
                    setTimeout(() => {
                        console.log('🔄 Refreshing page after successful scan...');
                        window.location.reload();
                    }, 2000);
        
                } catch (error) {
                    console.error('Error processing QR:', error);
                    this.setError('Gagal memproses QR Code: ' + error.message);
                }
            },
        
            // ✅ PERBAIKAN: Select camera based on facing mode
            async selectCamera() {
                try {
                    if (this.availableCameras.length === 0) {
        
                        return { facingMode: { exact: this.currentFacingMode } };
                    }
        
                    const targetKeywords = this.currentFacingMode === 'environment' ? ['back', 'rear', 'environment', 'facing back', 'camera2', '0', 'main', 'wide'] : ['front', 'user', 'facing front', 'camera1', 'selfie'];
        
                    let selectedCamera = null;
        
                    // Find camera by label
                    for (const camera of this.availableCameras) {
                        const label = camera.label.toLowerCase();
                        console.log('🔍 Checking camera:', camera.label);
        
                        for (const keyword of targetKeywords) {
                            if (label.includes(keyword)) {
                                selectedCamera = camera;
        
                                break;
                            }
                        }
                        if (selectedCamera) break;
                    }
        
                    // Find by ID if not found by label
                    if (!selectedCamera) {
                        const cameraById = this.availableCameras.find(camera => {
                            const id = camera.id.toLowerCase();
                            if (this.currentFacingMode === 'environment') {
                                return id.includes('0') || id.includes('back') || id.includes('environment');
                            } else {
                                return id.includes('1') || id.includes('front') || id.includes('user');
                            }
                        });
        
                        if (cameraById) {
                            selectedCamera = cameraById;
        
                        }
                    }
        
                    // Use positional fallback
                    if (!selectedCamera) {
                        if (this.currentFacingMode === 'environment' && this.availableCameras.length > 1) {
                            selectedCamera = this.availableCameras[this.availableCameras.length - 1];
        
                        } else {
                            selectedCamera = this.availableCameras[0];
        
                        }
                    }
        
        
                    return selectedCamera.id;
        
                } catch (err) {
        
                    return { facingMode: { exact: this.currentFacingMode } };
                }
            },
        
            async retryWithBasicConfig() {
                try {
                    this.setStatus('Mencoba pengaturan alternatif...', true);
        
                    const basicConfig = {
                        fps: 5,
                        qrbox: 150,
                        aspectRatio: 1.0,
                        videoConstraints: {
                            facingMode: { exact: this.currentFacingMode }
                        }
                    };
        
                    let cameraConstraint = { facingMode: { exact: this.currentFacingMode } };
        
                    await this.html5QrCode.start(
                        cameraConstraint,
                        basicConfig,
                        (decodedText) => {
        
                            this.stopScanner().then(() => {
                                this.processQrAndRefresh(decodedText);
                            });
                        },
                        () => { /* silent */ }
                    );
        
                    setTimeout(() => {
                        this.fixCameraMirror();
                        this.hideStatus();
        
                    }, 1000);
        
                } catch (retryError) {
        
                    this.setError('Gagal memulai scanner dengan pengaturan alternatif.');
                }
            },
        
            async stopScanner() {
                if (this.html5QrCode && this.isScanning) {
                    try {
                        await this.html5QrCode.stop();
                        await this.html5QrCode.clear();
                        this.isScanning = false;
                        console.log('QR Scanner stopped');
                    } catch (error) {
                        console.error('Error stopping scanner:', error);
                    }
                }
            },
        
            closeScanner() {
                console.log('Closing scanner...');
                this.stopScanner();
                @this.call('closeQrScanner');
            },
        
            // Helper methods
            setStatus(message, showSpinner = true) {
                this.statusMessage = message;
                this.showSpinner = showSpinner;
                this.showStatus = true;
                this.hasError = false;
                console.log('📋 Status:', message);
            },
        
            hideStatus() {
                this.showStatus = false;
            },
        
            setError(message) {
                this.errorMessage = message;
                this.hasError = true;
                this.showStatus = false;
                this.isScanning = false;
                console.error('❌ Error:', message);
            },
        
            retryCamera() {
                this.hasError = false;
                this.cameraGranted = false;
                this.requestCameraPermission();
            }
        }" x-init="init()"
            class="fixed inset-0 bg-warna-300/50 z-50 flex items-center justify-center p-4">

            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md">
                <!-- Header -->
                <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800">Scan QR Code Absensi</h3>
                    <div class="flex items-center space-x-2">
                        <!-- ✅ TAMBAHAN: Camera Switch Button -->
                        <button @click="switchCamera()" x-show="isScanning && availableCameras.length > 1"
                            class="p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-lg transition-colors"
                            :title="isBackCamera ? 'Beralih ke Kamera Depan' : 'Beralih ke Kamera Belakang'">
                            <i class="fas fa-sync-alt text-lg"></i>
                        </button>

                        <button @click="closeScanner()" class="text-gray-400 hover:text-gray-600 text-2xl">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- Scanner Container -->
                <div class="p-6">
                    <div class="mb-4 text-center">
                        <p class="text-sm text-gray-600 mb-2">Arahkan kamera ke QR Code yang ada di meja kasir</p>
                        <div class="bg-blue-50 rounded-lg p-3 mb-4">
                            <p class="text-xs text-blue-800">
                                <i class="fas fa-info-circle mr-1"></i>
                                Pastikan QR Code terlihat jelas di dalam frame
                            </p>
                        </div>
                    </div>

                    <!-- ✅ PERBAIKAN: QR Scanner Area dengan CSS fix untuk mirror -->
                    <div class="relative bg-black rounded-lg overflow-hidden" style="height: 300px;">
                        <!-- Video akan muncul di sini -->
                        <div id="qr-reader" class="w-full h-full"></div>

                        <!-- Scanner Overlay -->
                        <div x-show="!isScanning || showStatus"
                            class="absolute inset-0 flex items-center justify-center pointer-events-none">
                            <div class="w-48 h-48 border-2 border-white rounded-lg relative">
                                <!-- Corner indicators -->
                                <div
                                    class="absolute -top-1 -left-1 w-6 h-6 border-t-4 border-l-4 border-warna-400 rounded-tl-lg">
                                </div>
                                <div
                                    class="absolute -top-1 -right-1 w-6 h-6 border-t-4 border-r-4 border-warna-400 rounded-tr-lg">
                                </div>
                                <div
                                    class="absolute -bottom-1 -left-1 w-6 h-6 border-b-4 border-l-4 border-warna-400 rounded-bl-lg">
                                </div>
                                <div
                                    class="absolute -bottom-1 -right-1 w-6 h-6 border-b-4 border-r-4 border-warna-400 rounded-br-lg">
                                </div>

                                <!-- Scanning line animation -->
                                <div x-show="isScanning && !showStatus"
                                    class="absolute top-1/2 left-0 w-full h-1 bg-warna-400 animate-pulse"></div>
                            </div>
                        </div>

                        <!-- ✅ TAMBAHAN: Camera Switch Button (In-Camera) -->
                        <div x-show="isScanning && !showStatus && availableCameras.length > 1"
                            class="absolute top-4 right-4 z-10">
                            <button @click="switchCamera()"
                                class="p-3 bg-black bg-opacity-50 text-white rounded-full hover:bg-opacity-70 transition-all"
                                :title="isBackCamera ? 'Beralih ke Kamera Depan' : 'Beralih ke Kamera Belakang'">
                                <i class="fas fa-camera-rotate text-lg" x-show="isBackCamera"></i>
                                <i class="fas fa-camera text-lg" x-show="!isBackCamera"></i>
                            </button>
                        </div>

                        <!-- Status Messages -->
                        <div x-show="showStatus" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            class="absolute inset-0 bg-black bg-opacity-75 flex items-center justify-center text-white text-center">
                            <div>
                                <div x-show="showSpinner"
                                    class="animate-spin rounded-full h-8 w-8 border-b-2 border-white mx-auto mb-2">
                                </div>
                                <p x-text="statusMessage" class="text-sm">Memulai...</p>
                            </div>
                        </div>

                        <!-- Processing indicator -->
                        @if ($isProcessingAttendance)
                            <div class="absolute inset-0 bg-black bg-opacity-75 flex items-center justify-center">
                                <div class="text-white text-center">
                                    <div
                                        class="animate-spin rounded-full h-8 w-8 border-b-2 border-white mx-auto mb-2">
                                    </div>
                                    <p class="text-sm">Memproses absensi...</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- ✅ TAMBAHAN: Camera Info -->
                    <div x-show="isScanning && !showStatus" class="mt-3 text-center">
                        <div
                            class="inline-flex items-center gap-2 px-3 py-1 bg-gray-100 rounded-full text-sm text-gray-600">
                            <i :class="isBackCamera ? 'fas fa-camera' : 'fas fa-camera-rotate'"></i>
                            <span x-text="isBackCamera ? 'Kamera Belakang' : 'Kamera Depan'"></span>
                        </div>
                    </div>

                    <!-- Instructions -->
                    <div class="mt-4 space-y-2 text-xs text-gray-600">
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2 w-4"></i>
                            <span>Posisikan QR Code di dalam frame putih</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2 w-4"></i>
                            <span>Pastikan pencahayaan cukup terang</span>
                        </div>
                        <div class="flex items-center" x-show="availableCameras.length > 1">
                            <i class="fas fa-sync-alt text-blue-500 mr-2 w-4"></i>
                            <span>Tap ikon switch untuk beralih kamera</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-refresh text-blue-500 mr-2 w-4"></i>
                            <span>Halaman akan refresh otomatis setelah scan berhasil</span>
                        </div>
                    </div>

                    <!-- Error Message -->
                    <div x-show="hasError" class="mt-4 p-3 bg-red-50 border border-red-200 rounded-lg">
                        <div class="flex items-start">
                            <i class="fas fa-exclamation-triangle text-red-500 mr-2 mt-1"></i>
                            <div class="flex-1">
                                <p class="text-sm text-red-800 font-medium">Error:</p>
                                <p x-text="errorMessage" class="text-sm text-red-700"></p>
                                <button @click="retryCamera()"
                                    class="mt-2 text-sm text-red-600 hover:text-red-800 underline">
                                    Coba Lagi
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Success Message -->
                    <div x-show="cameraGranted && !hasError && !showStatus"
                        class="mt-4 p-3 bg-green-50 border border-green-200 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <p class="text-sm text-green-800">Kamera aktif, arahkan ke QR Code</p>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="px-6 py-4 border-t border-gray-200 flex justify-between items-center">
                    <button @click="closeScanner()"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                        Tutup
                    </button>

                </div>
            </div>
        </div>
    @endif

    @if (session('message'))
        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 100);
        setTimeout(() => show = false, 5000)" x-show="show"
            x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="opacity-0 translate-x-full scale-75"
            x-transition:enter-end="opacity-100 translate-x-0 scale-100"
            x-transition:leave="transition ease-in duration-300 transform"
            x-transition:leave-start="opacity-100 translate-x-0 scale-100"
            x-transition:leave-end="opacity-0 translate-x-full scale-90"
            class="fixed top-4 right-4 z-50 bg-white border border-gray-200 rounded-lg shadow-lg p-4 max-w-sm">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    @if (session('message.type') === 'success')
                        <i class="fas fa-check-circle text-green-500"></i>
                    @elseif(session('message.type') === 'error')
                        <i class="fas fa-exclamation-circle text-red-500"></i>
                    @else
                        <i class="fas fa-info-circle text-blue-500"></i>
                    @endif
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-gray-900">{{ session('message.title') }}</h3>
                    <p class="text-sm text-gray-600 mt-1">{{ session('message.text') }}</p>
                </div>
                <button @click="show = false" class="ml-4 text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    @endif

    @if ($showChangePasswordModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-warna-300/50 backdrop-blur-sm">
            <x-input-modal class="max-w-md w-full bg-white rounded-lg shadow-lg p-6 mx-5">
                <x-slot name="title">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-800">Ubah Password</h2>
                        <button @click="show = false; setTimeout(() => $wire.toggleChangePasswordModal(), 200)"
                            class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </x-slot>
                <div class="w-full flex justify-end mb-1">
                    @if ($errors->any())
                        <div class="relative inline-block">
                            <button type="button"
                                class="flex items-center justify-center w-8 h-8 bg-red-100 hover:bg-red-200 text-red-600 rounded-full transition-colors duration-200"
                                x-data="{ showErrors: false }" @mouseenter="showErrors = true"
                                @mouseleave="showErrors = false" @click="showErrors = !showErrors">
                                <i class="fas fa-exclamation-triangle text-sm"></i>

                                <!-- Tooltip with errors -->
                                <div x-show="showErrors" x-cloak x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 transform scale-95"
                                    x-transition:enter-end="opacity-100 transform scale-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 transform scale-100"
                                    x-transition:leave-end="opacity-0 transform scale-95"
                                    class="absolute top-10 right-0 z-50 w-64 bg-white border border-red-200 rounded-lg shadow-lg p-3">
                                    <div class="text-red-600 text-sm">
                                        <div class="font-semibold mb-2">Error:</div>
                                        <ul class="space-y-1 text-xs">
                                            @foreach ($errors->all() as $error)
                                                <li class="flex items-start">
                                                    <i class="fas fa-circle text-xs mt-1.5 mr-2 text-warna-900"></i>
                                                    <span class="text-left">{{ $error }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- Arrow pointing up -->
                                    <div
                                        class="absolute -top-2 right-3 w-4 h-4 bg-white border-l border-t border-red-200 transform rotate-45">
                                    </div>
                                </div>
                            </button>
                        </div>
                    @endif
                    @if (session()->has('message'))
                        <div class="relative inline-block">
                            <button type="button"
                                class="flex items-center justify-center w-8 h-8 bg-green-100 hover:bg-green-200 text-green-600 rounded-full transition-colors duration-200"
                                x-data="{ showMessage: false }" @mouseenter="showMessage = true"
                                @mouseleave="showMessage = false" @click="showMessage = !showMessage">
                                <i class="fas fa-info-circle text-sm"></i>

                                <!-- Tooltip with message -->
                                <div x-show="showMessage" x-cloak
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 transform scale-95"
                                    x-transition:enter-end="opacity-100 transform scale-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 transform scale-100"
                                    x-transition:leave-end="opacity-0 transform scale-95"
                                    class="absolute top-10 right-0 z-50 w-64 bg-white border border-green-200 rounded-lg shadow-lg p-3">
                                    <div class="text-green-600 text-sm">
                                        <div class="font-semibold mb-2">Info:</div>
                                        <p class="text-xs">{{ session('message') }}</p>
                                    </div>
                                    <!-- Arrow pointing up -->
                                    <div
                                        class="absolute -top-2 right-3 w-4 h-4 bg-white border-l border-t border-green-200 transform rotate-45">
                                    </div>
                                </div>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="space-y-4">
                    <x-g-input label="Password Lama" type="password" wire:model.defer="oldPassword"
                        placeholder="Masukkan password lama" />
                    <x-g-input label="Password Baru" type="password" wire:model.defer="newPassword"
                        placeholder="Masukkan password baru" />
                    <x-g-input label="Konfirmasi Password Baru" type="password" wire:model.defer="confirmNewPassword"
                        placeholder="Konfirmasi password baru" />
                </div>
                <x-slot name="actions">
                    <button wire:click="changePassword" wire:loading.attr="disabled" wire:target="changePassword"
                        class="px-5 py-2 bg-warna-400 hover:bg-warna-400/80 disabled:opacity-50 disabled:cursor-not-allowed text-[#0F172A] rounded-lg transition-all active:scale-95">
                        <span wire:loading.remove wire:target="changePassword">Simpan</span>
                        <span wire:loading wire:target="changePassword">Menyimpan...</span>
                    </button>
                </x-slot>
            </x-input-modal>
        </div>
    @endif

</div>
