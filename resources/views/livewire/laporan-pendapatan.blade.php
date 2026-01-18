<div>

<div class="pb-12 bg-transparent">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
        <div class="flex items-center gap-3">
            <div class="w-2 h-10 bg-[#0F172A] rounded-full"></div>
            <div>
                <h1 class="text-3xl font-black text-[#0F172A] uppercase italic tracking-tighter">
                    Laporan <span class="text-warna-500 text-shadow-sm">Pendapatan</span>
                </h1>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em]">Financial Management System</p>
            </div>
        </div>
        
        <div class="px-6 py-3 bg-white rounded-2xl border border-slate-100 shadow-sm flex items-center gap-3">
            <div class="w-2 h-2 bg-warna-500 rounded-full animate-ping"></div>
            <div class="text-[11px] font-black text-[#0F172A] uppercase italic tracking-widest">
                {{ date('d M Y') }} <span class="text-slate-300 mx-2">|</span> {{ date('H:i') }}
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <div class="group relative bg-[#0F172A] p-8 rounded-[2.5rem] overflow-hidden transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl hover:shadow-warna-500/20">
            <div class="relative z-10">
                <div class="flex justify-between items-center mb-6">
                    <p class="text-[10px] font-black text-warna-500 uppercase tracking-[0.2em] italic">Pendapatan Hari Ini</p>
                    <div class="w-10 h-10 bg-warna-500/10 rounded-xl flex items-center justify-center border border-warna-500/20 group-hover:bg-warna-500 transition-colors duration-500">
                        <i class="fas fa-money-bill-wave text-warna-500 group-hover:text-[#0F172A] transition-colors"></i>
                    </div>
                </div>
                <div class="space-y-1">
                    <p class="text-[10px] font-black text-slate-500 uppercase italic">IDR Currency</p>
                    <p class="text-3xl font-black text-white italic tracking-tighter leading-none truncate">
                        Rp {{ number_format($today ?? 0, 0, ',', '.') }}
                    </p>
                </div>
                <div class="mt-8 flex items-center gap-2">
                    <div class="h-[2px] flex-1 bg-gradient-to-r from-warna-500 to-transparent rounded-full"></div>
                    <span class="text-[8px] font-black text-warna-500 uppercase italic tracking-widest">Live Report</span>
                </div>
            </div>
            
        </div>

        <div class="group relative bg-white p-8 rounded-[2.5rem] border-2 border-slate-50 shadow-[0_20px_50px_-20px_rgba(0,0,0,0.05)] transition-all duration-300 hover:border-warna-500/30">
            <div class="relative z-10">
                <div class="flex justify-between items-center mb-6">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] italic">Akumulasi Bulan Ini</p>
                    <div class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center border border-slate-100 group-hover:bg-[#0F172A] group-hover:border-[#0F172A] transition-all duration-500">
                        <i class="fas fa-calendar-alt text-[#0F172A] group-hover:text-warna-500 transition-colors"></i>
                    </div>
                </div>
                <div class="space-y-1">
                    <p class="text-[10px] font-black text-slate-300 uppercase italic">Monthly Total</p>
                    <p class="text-3xl font-black text-[#0F172A] italic tracking-tighter leading-none truncate">
                        Rp {{ number_format($thisMonth ?? 0, 0, ',', '.') }}
                    </p>
                </div>
                <div class="mt-8 flex items-center gap-2">
                    <div class="h-[2px] flex-1 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-[#0F172A] w-2/3 group-hover:w-full transition-all duration-1000"></div>
                    </div>
                    <span class="text-[8px] font-black text-slate-400 uppercase italic tracking-widest">Active</span>
                </div>
            </div>
           
        </div>

        <div class="group relative bg-white p-8 rounded-[2.5rem] border-2 border-slate-50 shadow-[0_20px_50px_-20px_rgba(0,0,0,0.05)] transition-all duration-300 hover:border-warna-500/30">
            <div class="relative z-10">
                <div class="flex justify-between items-center mb-6">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] italic">Total Seluruh Pendapatan</p>
                    <div class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center border border-slate-100 group-hover:bg-[#0F172A] group-hover:border-[#0F172A] transition-all duration-500">
                        <i class="fas fa-chart-line text-[#0F172A] group-hover:text-warna-500 transition-colors"></i>
                    </div>
                </div>
                <div class="space-y-1">
                    <p class="text-[10px] font-black text-slate-300 uppercase italic">Gross Revenue</p>
                    <p class="text-3xl font-black text-[#0F172A] italic tracking-tighter leading-none truncate">
                        Rp {{ number_format($total ?? 0, 0, ',', '.') }}
                    </p>
                </div>
                <div class="mt-8 flex items-center gap-2">
                    <div class="h-[2px] flex-1 bg-slate-100 rounded-full"></div>
                    <span class="text-[8px] font-black text-slate-400 uppercase italic tracking-widest">Overall</span>
                </div>
            </div>
         
        </div>

    </div>
</div>



 <div class="bg-white p-8 rounded-[2.5rem] shadow-[0_20px_50px_-20px_rgba(0,0,0,0.05)] border border-slate-50 mt-10 relative overflow-hidden">
    
    <div class="flex flex-col xl:flex-row gap-8 justify-between mb-12">
        <div class="flex flex-wrap items-center gap-6">
            <div class="group">
                <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-4 mb-2 block italic group-focus-within:text-warna-500 transition-colors">Select Month</label>
                <div class="relative">
                    <select wire:model.live="selectedMonth" class="appearance-none bg-slate-50 border-2 border-transparent focus:border-warna-500 focus:bg-white rounded-2xl px-6 py-3 text-xs font-black text-[#0F172A] uppercase italic transition-all outline-none cursor-pointer pr-12 shadow-sm">
                        @foreach(range(1, 12) as $month)
                            <option value="{{ $month }}">{{ \Carbon\Carbon::create()->month($month)->translatedFormat('F') }}</option>
                        @endforeach
                    </select>
                    <i class="fas fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-[10px] text-slate-300 pointer-events-none"></i>
                </div>
            </div>

            <div class="group">
                <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-4 mb-2 block italic group-focus-within:text-warna-500 transition-colors">Select Year</label>
                <div class="relative">
                    <select wire:model.live="selectedYear" class="appearance-none bg-slate-50 border-2 border-transparent focus:border-warna-500 focus:bg-white rounded-2xl px-6 py-3 text-xs font-black text-[#0F172A] uppercase italic transition-all outline-none cursor-pointer pr-12 shadow-sm">
                       @foreach(range(2022, now()->year) as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                    <i class="fas fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-[10px] text-slate-300 pointer-events-none"></i>
                </div>
            </div>

            <div class="pt-6">
                <button wire:click="exportExcel"
                    class="px-8 py-3.5 bg-emerald-500 text-white rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] italic hover:bg-emerald-600 hover:-translate-y-1 transition-all shadow-[0_10px_20px_-5px_rgba(16,185,129,0.3)] active:scale-95 flex items-center gap-3">
                    <i class="fas fa-file-excel text-sm"></i> 
                    Get Excel Report
                </button>
            </div>
        </div>

        <div class="flex flex-col items-end justify-center border-r-4 border-warna-500 pr-6">
            <h3 class="text-2xl font-black text-[#0F172A] uppercase italic tracking-tighter text-right leading-none">
                Transaction <span class="text-warna-500">History</span>
            </h3>
            <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.3em] italic mt-2">
                Log: {{ \DateTime::createFromFormat('!m', $selectedMonth)->format('F') }} {{ $selectedYear }}
            </p>
        </div>
    </div>

    <div class="flex flex-col md:flex-row items-center justify-between mb-8 gap-4 px-2">
       <div class="flex items-center bg-white px-5 py-3 rounded-2xl border border-slate-100 shadow-sm transition-all hover:shadow-md hover:border-warna-500/30 group">
    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mr-4 italic group-hover:text-warna-600 transition-colors">
        Entries:
    </label>

    <div class="relative flex items-center">
        <select wire:model.live="perPage" 
                class="bg-transparent text-xs font-black text-[#0F172A] italic border-none focus:ring-0 focus:outline-none cursor-pointer appearance-none py-0 pl-0 pr-7 z-10 relative bg-none [-webkit-appearance:none] [-moz-appearance:none]">
            <option value="5">05</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="25">25</option>
        </select>
        
        <i class="fa-solid fa-angle-down text-[10px] text-slate-300 absolute right-0 pointer-events-none group-hover:text-warna-500 group-hover:translate-y-[1px] transition-all duration-300"></i>
    </div>
</div>
        
        <div class="px-6 py-2.5 bg-[#0F172A] rounded-2xl shadow-xl shadow-warna-500/10">
            <p class="text-[10px] font-black text-warna-500 uppercase italic tracking-widest">
                Analyzed: <span class="text-white ml-1">{{ count($this->todayTransactions ?? []) }} Records Found</span>
            </p>
        </div>
    </div>

    <div class="w-full overflow-hidden border border-slate-50 rounded-[2.5rem] shadow-sm bg-white">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-100">
                        <th class="px-8 py-6 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.25em] italic">Timestamp</th>
                        <th class="px-8 py-6 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.25em] italic">Category</th>
                        <th class="px-8 py-6 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.25em] italic">Memo / Description</th>
                        <th class="px-8 py-6 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.25em] italic">Method</th>
                        <th class="px-8 py-6 text-right text-[10px] font-black text-slate-400 uppercase tracking-[0.25em] italic">Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($this->todayTransactions ?? [] as $transaction)
                        <tr class="hover:bg-slate-50 transition-all group">
                            <td class="px-8 py-6">
                                <div class="flex flex-col">
                                    <span class="text-xs font-black text-[#0F172A] italic tracking-tight uppercase">{{ $transaction->transaction_datetime->format('d M Y') }}</span>
                                    <span class="text-[10px] font-bold text-slate-300 italic">{{ $transaction->transaction_datetime->format('H:i') }} WIB</span>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                @php
                                    $typeMap = [
                                        'membership_payment' => ['Membership', 'bg-blue-50 text-blue-600 border-blue-100', 'fa-users'],
                                        'daily_visit_fee' => ['Daily Pass', 'bg-emerald-50 text-emerald-600 border-emerald-100', 'fa-clock'],
                                        'additional_items_sale' => ['Product Sale', 'bg-purple-50 text-purple-600 border-purple-100', 'fa-shopping-cart']
                                    ];
                                    $current = $typeMap[$transaction->transaction_type] ?? ['Other', 'bg-slate-50 text-slate-600 border-slate-100', 'fa-dot-circle'];
                                @endphp
                                <span class="inline-flex items-center px-4 py-2 rounded-xl border {{ $current[1] }} text-[9px] font-black uppercase tracking-widest italic shadow-sm">
                                    <i class="fas {{ $current[2] }} mr-2 opacity-70"></i>
                                    {{ $current[0] }}
                                </span>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-[11px] font-bold text-slate-500 italic max-w-xs truncate group-hover:text-[#0F172A] transition-colors">
                                    {{ $transaction->description ?: 'STRICTLY CONFIDENTIAL' }}
                                </p>
                            </td>
                            <td class="px-8 py-6">
                                <span class="inline-flex items-center px-4 py-2 rounded-xl text-[9px] font-black uppercase tracking-widest italic
                                    {{ $transaction->payment_method === 'cash' ? 'bg-[#0F172A] text-warna-500 shadow-lg shadow-warna-500/10' : 'bg-white border border-slate-200 text-[#0F172A]' }}">
                                    <i class="fas {{ $transaction->payment_method === 'cash' ? 'fa-money-bill-wave' : 'fa-qrcode' }} mr-2"></i>
                                    {{ $transaction->payment_method === 'cash' ? 'Cash' : 'QRIS / Digital' }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <span class="text-sm font-black text-[#0F172A] italic tracking-tight group-hover:text-warna-600 transition-colors">
                                    IDR {{ number_format($transaction->total_amount, 0, ',', '.') }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-8 py-24 text-center">
                                <div class="flex flex-col items-center opacity-20 group">
                                    <i class="fas fa-inbox text-6xl mb-6 text-[#0F172A] group-hover:scale-110 transition-transform duration-500"></i>
                                    <p class="text-[11px] font-black uppercase tracking-[0.4em] italic text-[#0F172A]">Zero Data Detected</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($this->todayTransactions->hasPages())
        <div class="bg-slate-50/50 px-10 py-8 flex flex-col md:flex-row items-center justify-between gap-8 border-t border-slate-100">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic leading-none">
                Showing Index <span class="text-[#0F172A]">{{ $this->todayTransactions->firstItem() }}-{{ $this->todayTransactions->lastItem() }}</span> From Total {{ $this->todayTransactions->total() }}
            </p>
            
            <div class="flex items-center gap-3">
                @if (!$this->todayTransactions->onFirstPage())
                    <button wire:click="previousPage" class="w-12 h-12 flex items-center justify-center rounded-2xl bg-white border-2 border-slate-100 text-[#0F172A] hover:bg-warna-500 hover:border-warna-500 transition-all active:scale-90 shadow-sm group">
                        <i class="fas fa-arrow-left text-xs group-hover:-translate-x-1 transition-transform"></i>
                    </button>
                @endif

                <div class="flex gap-2 bg-white p-1.5 rounded-2xl border border-slate-100 shadow-inner">
                    @foreach ($this->todayTransactions->getUrlRange(1, $this->todayTransactions->lastPage()) as $page => $url)
                        <button wire:click="gotoPage({{ $page }})" 
                                class="w-9 h-9 flex items-center justify-center rounded-xl text-[11px] font-black transition-all
                                {{ $page == $this->todayTransactions->currentPage() ? 'bg-[#0F172A] text-warna-500 shadow-lg' : 'text-slate-300 hover:text-[#0F172A]' }}">
                            {{ sprintf("%02d", $page) }}
                        </button>
                    @endforeach
                </div>

                @if ($this->todayTransactions->hasMorePages())
                    <button wire:click="nextPage" class="w-12 h-12 flex items-center justify-center rounded-2xl bg-white border-2 border-slate-100 text-[#0F172A] hover:bg-warna-500 hover:border-warna-500 transition-all active:scale-90 shadow-sm group">
                        <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                    </button>
                @endif
            </div>
        </div>
        @endif

        @if($this->todayTransactions->count() > 0)
            <div class="bg-[#0F172A] px-10 py-8 rounded-b-[2.5rem] relative overflow-hidden">
                <div class="flex flex-col md:flex-row justify-between items-center gap-6 relative z-10">
                    <div>
                        <p class="text-[10px] font-black text-warna-500 uppercase tracking-[0.3em] italic mb-1">Total Monthly Revenue Accumulation</p>
                        <p class="text-[8px] font-bold text-slate-500 uppercase italic">Data verification status: Confirmed</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic mb-1">Final Amount</p>
                        <p class="text-4xl font-black text-white italic tracking-tighter leading-none">
                            IDR {{ number_format($mountTotal ?? 0, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
                <div class="absolute left-0 top-0 h-full w-2 bg-warna-500"></div>
                <div class="absolute right-[-20px] bottom-[-30px] text-white/[0.03] text-[120px] font-black italic select-none pointer-events-none uppercase">
                    {{ \DateTime::createFromFormat('!m', $selectedMonth)->format('M') }}
                </div>
            </div>
        @endif
    </div>
</div>
</div>