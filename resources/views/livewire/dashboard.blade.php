<!-- resources/views/livewire/dashboard.blade.php -->
<div class="flex flex-col space-y-12 pb-20 max-w-[1600px] mx-auto">
    
    <div class="space-y-8">
        <div class="flex flex-col">
            <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white">
                Dashboard <span class="text-slate-800">Overview</span>
            </h2>
            <p class="text-sm text-slate-500 font-medium">Laporan statistik keuangan dan aktivitas gym hari ini.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Card Pendapatan Utama --}}
            @php
                $financials = [
                    ['title' => 'Pendapatan Hari Ini', 'amount' => $todayRevenue, 'icon' => 'fa-wallet', 'bg' => 'bg-warna-400', 'text' => 'text-black'],
                    ['title' => 'Estimasi Bulan Ini', 'amount' => $thisMonthRevenue, 'icon' => 'fa-chart-pie', 'bg' => 'bg-zinc-900', 'text' => 'text-white'],
                    ['title' => 'Total Tahun Ini', 'amount' => $thisYearRevenue, 'icon' => 'fa-vault', 'bg' => 'bg-white', 'text' => 'text-slate-900'],
                ];
            @endphp

            @foreach($financials as $item)
            <div class="{{ $item['bg'] }} {{ $item['text'] }} rounded-[2.5rem] p-8 shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-white/5 relative group transition-all hover:translate-y-[-5px]">
                <div class="relative z-10">
                    <div class="w-12 h-12 rounded-2xl bg-black/5 dark:bg-white/10 flex items-center justify-center mb-6">
                        <i class="fas {{ $item['icon'] }} text-xl"></i>
                    </div>
                    <p class="text-xs font-bold uppercase tracking-widest opacity-70">{{ $item['title'] }}</p>
                    <p class="text-3xl font-black mt-2 tracking-tight">Rp {{ number_format($item['amount'] ?? 0, 0, ',', '.') }}</p>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Breakdown Kecil --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach(['Membership' => 'membership', 'Daily Visit' => 'daily_visit', 'Produk' => 'products'] as $label => $key)
            <div class="group bg-white dark:bg-zinc-900 border border-slate-400/20 dark:border-white/5 p-5 rounded-[1.5rem] flex items-center justify-between shadow-[0_10px_25px_-15px_rgba(0,0,0,0.1)] hover:shadow-[0_20px_30px_-10px_rgba(16,185,129,0.15)] transition-all duration-500 hover:-translate-y-1">
                <span class="text-sm font-bold text-slate-600 dark:text-slate-400">{{ $label }}</span>
                <span class="text-base font-extrabold text-slate-900 dark:text-white uppercase tracking-tight">
                    Rp {{ number_format($revenueByType[$key] ?? 0, 0, ',', '.') }}
                </span>
            </div>
            @endforeach
        </div>
    </div>
    <div class="bg-white dark:bg-zinc-900 rounded-[3rem] p-10 border border-slate-100 dark:border-white/5 shadow-[0_20px_50px_-20px_rgba(0,0,0,0.1)] relative overflow-hidden">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
        <div class="flex items-center">
            <span class="w-2 h-10 bg-warna-500 rounded-full mr-4 shadow-[0_0_15px_rgba(16,185,129,0.5)]"></span>
            <div>
                <h2 class="text-2xl font-black text-slate-900 dark:text-white uppercase tracking-tighter italic">
                    Ringkasan <span class="text-warna-500">Member</span>
                </h2>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Status Keanggotaan Arena Fitness</p>
            </div>
        </div>

        @if($expiringSoon > 0)
        <div class="bg-white border-2 border-rose-100 px-6 py-2.5 rounded-2xl flex items-center shadow-[0_10px_20px_-10px_rgba(244,63,94,0.2)]">
            <span class="text-rose-600 text-[11px] font-black uppercase tracking-widest flex items-center">
                <i class="fa-solid fa-circle-exclamation mr-2 animate-pulse"></i>
                {{ $expiringSoon }} Member Expired
            </span>
        </div>
        @endif
    </div>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
        @php
            $stats = [
                ['label' => 'Total Member', 'val' => $totalMembers, 'color' => 'text-slate-900', 'bg' => 'bg-slate-50'],
                ['label' => 'Aktif', 'val' => $totalActive, 'color' => 'text-emerald-600', 'bg' => 'bg-emerald-50/50'],
                ['label' => 'Frozen', 'val' => $totalFrozen, 'color' => 'text-amber-600', 'bg' => 'bg-amber-50/50'],
                ['label' => 'Inactive', 'val' => $totalInactive, 'color' => 'text-rose-600', 'bg' => 'bg-rose-50/50'],
                ['label' => 'Pending', 'val' => $totalPendingAdmin, 'color' => 'text-orange-600', 'bg' => 'bg-orange-50/50'],
            ];
        @endphp
        
        @foreach($stats as $s)
        <div class="{{ $s['bg'] }} border border-white p-6 rounded-[2.5rem] shadow-[0_10px_20px_-10px_rgba(0,0,0,0.05)] transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group">
            <span class="text-[9px] font-black uppercase tracking-[0.2em] text-slate-400 group-hover:text-slate-500 block mb-2 transition-colors">
                {{ $s['label'] }}
            </span>
            <span class="text-4xl font-black {{ $s['color'] }} tracking-tighter italic block">
                {{ $s['val'] }}
            </span>
        </div>
        @endforeach
    </div>

    {{-- Type Bar Section --}}
    <div class="mt-12 pt-10 border-t border-slate-50">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            @foreach(['local' => 'Local Member', 'foreign' => 'Foreign Member'] as $k => $l)
            <div class="space-y-4">
                <div class="flex justify-between items-end">
                    <div class="flex flex-col">
                        <span class="text-xs font-black text-slate-900 uppercase tracking-widest">{{ $l }}</span>
                        <span class="text-[9px] font-bold text-slate-400 uppercase italic">Database Distribution</span>
                    </div>
                    <span class="text-xl font-black text-slate-900 italic">{{ $membershipDistribution[$k] ?? 0 }}</span>
                </div>
                <div class="h-4 w-full bg-slate-100 rounded-full overflow-hidden p-1 border border-slate-200/50 shadow-inner">
                    <div class="h-full bg-warna-500 rounded-full transition-all duration-1000 shadow-[0_0_10px_rgba(16,185,129,0.3)]" 
                         style="width: {{ $totalMembers > 0 ? (($membershipDistribution[$k] ?? 0) / $totalMembers * 100) : 0 }}%">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="absolute -right-10 -top-10 w-40 h-40 bg-warna-500/5 rounded-full blur-3xl"></div>
    </div>

   <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    @foreach([
        ['label' => 'Total Visitor', 'val' => $totalVisitorsToday, 'icon' => 'fa-door-open'],
        ['label' => 'Member Absensi', 'val' => $memberAttendanceToday, 'icon' => 'fa-id-badge'],
        ['label' => 'Daily Pass', 'val' => $dailyVisitorsToday, 'icon' => 'fa-walking'],
        ['label' => 'Mingguan', 'val' => $thisWeekAttendance, 'icon' => 'fa-calendar-week'],
    ] as $act)
    <div class="bg-white border border-white p-7 rounded-[2.5rem] shadow-[0_10px_25px_-10px_rgba(0,0,0,0.08)] transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group relative overflow-hidden">
        
        <div class="relative z-10 flex items-center justify-between mb-5">
            <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center transition-colors group-hover:bg-warna-500/10">
                <i class="fas {{ $act['icon'] }} text-xl text-slate-400 group-hover:text-slate-800 transition-colors"></i>
            </div>
            <span class="text-[10px] font-black text-slate-200 group-hover:text-slate-800/20 transition-colors uppercase italic">Live Data</span>
        </div>
        
        <div class="relative z-10">
            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-1">
                {{ $act['label'] }}
            </p>
            <p class="text-4xl font-black text-[#0F172A] tracking-tighter italic">
                {{ $act['val'] }}
            </p>
        </div>

        <i class="fas {{ $act['icon'] }} absolute -right-4 -bottom-4 text-6xl opacity-[0.02] text-[#0F172A] -rotate-12 transition-transform group-hover:scale-125 group-hover:opacity-[0.05]"></i>
        
        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-1 bg-warna-500 rounded-full group-hover:w-16 transition-all duration-500"></div>
    </div>
    @endforeach
</div>

   <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
    <div class="lg:col-span-3 bg-white p-8 rounded-[3rem] border border-white shadow-[0_20px_50px_-20px_rgba(0,0,0,0.1)] transition-all duration-300 hover:shadow-[0_30px_60px_-15px_rgba(0,0,0,0.12)]">
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center">
                <div class="w-1.5 h-6 bg-warna-500 rounded-full mr-3"></div>
                <h3 class="text-lg font-black text-[#0F172A] uppercase tracking-tighter italic">Statistik <span class="text-warna-500">Pendapatan</span></h3>
            </div>
            <div class="flex gap-2">
                <div class="w-2 h-2 rounded-full bg-warna-500"></div>
                <div class="w-2 h-2 rounded-full bg-slate-200"></div>
            </div>
        </div>
        <div wire:ignore class="h-[350px] relative">
            <canvas id="monthlyRevenueChart"></canvas>
        </div>
    </div>

    <div class="lg:col-span-2 bg-white rounded-[3rem] p-8 relative overflow-hidden shadow-[0_20px_50px_-20px_rgba(0,0,0,0.1)] border border-white transition-all duration-300 hover:shadow-[0_30px_60px_-15px_rgba(0,0,0,0.12)]">
        <div class="flex items-center justify-between mb-8 relative z-10">
            <h3 class="text-lg font-black text-[#0F172A] tracking-tighter uppercase italic">
                Top <span class="text-warna-500">Products</span>
            </h3>
            <div class="bg-slate-900 text-white px-5 py-2 rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] shadow-lg shadow-slate-900/20">
                Terlaris
            </div>
        </div>

        <div class="space-y-4 relative z-10">
            @forelse($topProducts as $index => $product)
            <div class="group flex items-center justify-between bg-slate-50 hover:bg-[#0F172A] p-5 rounded-[2rem] transition-all duration-500 border border-slate-100 hover:border-[#0F172A] hover:translate-x-2 shadow-sm hover:shadow-xl hover:shadow-slate-900/20">
                <div class="flex items-center gap-5">
                    <span class="text-2xl font-black italic text-slate-200 group-hover:text-warna-500/30 transition-colors">
                        {{ sprintf('%02d', $index + 1) }}
                    </span>
                    <div class="flex flex-col">
                        <span class="text-sm font-black uppercase tracking-tight text-[#0F172A] group-hover:text-white transition-colors">
                            {{ $product->name }}
                        </span>
                        <span class="text-[9px] font-bold text-slate-400 group-hover:text-warna-500 uppercase tracking-widest transition-colors">
                            Arena Inventory
                        </span>
                    </div>
                </div>
                
                <div class="flex flex-col items-end">
                    <div class="bg-white group-hover:bg-warna-500 px-4 py-1.5 rounded-xl shadow-sm transition-all duration-500">
                        <span class="text-sm font-black text-[#0F172A] group-hover:text-slate-900">
                            {{ $product->total_sold }}
                        </span>
                        <span class="text-[9px] font-bold text-slate-400 group-hover:text-slate-800 uppercase ml-1">Sold</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="flex flex-col items-center justify-center py-16 opacity-20">
                <i class="fas fa-box-open text-5xl mb-4"></i>
                <p class="text-xs font-black uppercase tracking-[0.3em]">No Data Available</p>
            </div>
            @endforelse
        </div>

        <i class="fas fa-trophy absolute -right-12 -bottom-12 text-[15rem] text-slate-50 -rotate-12 z-0 opacity-50"></i>
    </div>
</div>

<div class="bg-white rounded-[3rem] border border-white shadow-[0_20px_50px_-20px_rgba(0,0,0,0.1)] transition-all duration-300">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach([
            ['Transaksi Baru', 'fa-cash-register', 'kelola.pendapatan', 'bg-[#0F172A]', 'shadow-slate-900/40'],
            ['Kelola Member', 'fa-user-plus', 'kelola.member', 'bg-[#0F172A]', 'shadow-slate-900/40'],
            ['Settings System', 'fa-gears', 'pengaturan.harga', 'bg-[#0F172A]', 'shadow-slate-900/40'],
            ['Rekap Laporan', 'fa-chart-pie', 'laporan.pendapatan', 'bg-[#0F172A]', 'shadow-slate-900/40'],
        ] as $action)
        <a href="{{ route($action[2]) }}" class="group relative flex flex-col items-center p-8 rounded-[2.5rem] transition-all duration-500 hover:-translate-y-4 hover:bg-slate-50 border border-transparent hover:border-slate-100">
            <div class="relative z-10 w-24 h-24 {{ $action[3] }} rounded-[2.5rem] flex items-center justify-center shadow-2xl {{ $action[4] }} group-hover:rotate-[10deg] transition-all duration-500 border border-white/10 group-hover:scale-110">
                <i class="fas {{ $action[1] }} text-3xl text-white group-hover:text-warna-500 transition-colors duration-500"></i>
            </div>
            
            <div class="relative z-10 mt-6 text-center">
                <p class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 group-hover:text-[#0F172A] transition-colors duration-300">
                    {{ $action[0] }}
                </p>
                <div class="h-1.5 w-0 bg-warna-500 mx-auto mt-2 rounded-full group-hover:w-8 transition-all duration-500 shadow-[0_0_10px_rgba(16,185,129,0.5)]"></div>
            </div>
        </a>
        @endforeach
    </div>
</div> 

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('monthlyRevenueChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Pendapatan per Bulan',
                data: {!! json_encode($monthlyRevenue) !!},
                backgroundColor: '#C2E600',
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                },
                x: {
                    ticks: {
                        maxRotation: 45,
                        minRotation: 0
                    }
                }
            }
        }
    });
</script>
@endpush