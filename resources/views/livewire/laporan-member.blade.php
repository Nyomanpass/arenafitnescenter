<div class="">

    <div class="bg-white p-8 rounded-[2.5rem] shadow-[0_20px_50px_-20px_rgba(0,0,0,0.05)] border border-slate-50 relative overflow-hidden">
        <div class="flex items-center gap-3 mb-10">
            <div class="w-2 h-8 bg-[#0F172A] rounded-full"></div>
            <div>
                <h2 class="text-2xl font-black text-[#0F172A] uppercase italic tracking-tighter">
                    Laporan <span class="text-warna-500 text-shadow-sm">Member Gym</span>
                </h2>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em]">Membership Analytics Overview</p>
            </div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-3 gap-6">
            
            <div class="group relative bg-[#0F172A] p-6 rounded-[2rem] overflow-hidden transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl hover:shadow-warna-500/20">
                <div class="relative z-10 flex flex-col justify-between h-full">
                    <div class="flex justify-between items-start mb-4">
                        <p class="text-[10px] font-black text-warna-500 uppercase tracking-widest italic">Member Aktif</p>
                        <i class="fas fa-user-check text-warna-500/30 text-xl group-hover:scale-110 transition-transform"></i>
                    </div>
                    <p class="text-4xl font-black text-white italic tracking-tighter leading-none">{{ $totalActive }}</p>
                    <div class="mt-4 w-10 h-1 bg-warna-500 rounded-full group-hover:w-full transition-all duration-500"></div>
                </div>
                <div class="absolute -right-4 -bottom-4 text-white/[0.03] text-7xl font-black italic select-none">ACT</div>
            </div>

            <div class="group relative bg-slate-50 p-6 rounded-[2rem] border-2 border-slate-100 transition-all duration-300 hover:border-yellow-400/50">
                <div class="relative z-10 flex flex-col justify-between h-full">
                    <div class="flex justify-between items-start mb-4">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Member Frozen</p>
                        <i class="fas fa-user-clock text-yellow-500 text-xl"></i>
                    </div>
                    <p class="text-4xl font-black text-[#0F172A] italic tracking-tighter leading-none">{{ $totalFrozen }}</p>
                    <div class="mt-4 w-10 h-1 bg-yellow-400 rounded-full group-hover:w-20 transition-all duration-500"></div>
                </div>
            </div>

            <div class="group relative bg-slate-50 p-6 rounded-[2rem] border-2 border-slate-100 transition-all duration-300 hover:border-rose-400/50">
                <div class="relative z-10 flex flex-col justify-between h-full">
                    <div class="flex justify-between items-start mb-4">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Tidak Aktif</p>
                        <i class="fas fa-user-slash text-rose-500 text-xl"></i>
                    </div>
                    <p class="text-4xl font-black text-[#0F172A] italic tracking-tighter leading-none">{{ $totalInactive }}</p>
                    <div class="mt-4 w-10 h-1 bg-rose-400 rounded-full group-hover:w-20 transition-all duration-500"></div>
                </div>
            </div>

            <div class="group relative bg-slate-50 p-6 rounded-[2rem] border-2 border-slate-100 transition-all duration-300 hover:border-blue-400/50">
                <div class="relative z-10 flex flex-col justify-between h-full">
                    <div class="flex justify-between items-start mb-4">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Member Lokal</p>
                        <i class="fas fa-flag text-blue-500 text-xl"></i>
                    </div>
                    <p class="text-4xl font-black text-[#0F172A] italic tracking-tighter leading-none">{{ $totalLocal }}</p>
                    <div class="mt-4 w-10 h-1 bg-blue-400 rounded-full group-hover:w-20 transition-all duration-500"></div>
                </div>
            </div>

            <div class="group relative bg-slate-50 p-6 rounded-[2rem] border-2 border-slate-100 transition-all duration-300 hover:border-purple-400/50">
                <div class="relative z-10 flex flex-col justify-between h-full">
                    <div class="flex justify-between items-start mb-4">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Member Asing</p>
                        <i class="fas fa-globe text-purple-500 text-xl"></i>
                    </div>
                    <p class="text-4xl font-black text-[#0F172A] italic tracking-tighter leading-none">{{ $totalForeign }}</p>
                    <div class="mt-4 w-10 h-1 bg-purple-400 rounded-full group-hover:w-20 transition-all duration-500"></div>
                </div>
            </div>

            <div class="group relative bg-white p-6 rounded-[2rem] border-2 border-dashed border-slate-200 transition-all duration-300 hover:bg-warna-500/5 hover:border-warna-500/50">
                <div class="relative z-10 flex flex-col justify-between h-full">
                    <div class="flex justify-between items-start mb-4">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Pending Verifikasi</p>
                        <i class="fas fa-user-shield text-warna-500 text-xl"></i>
                    </div>
                    <p class="text-4xl font-black text-[#0F172A] italic tracking-tighter leading-none">{{ $totalPendingAdmin }}</p>
                    <div class="mt-4 w-10 h-1 bg-[#0F172A] rounded-full group-hover:w-20 transition-all duration-500"></div>
                </div>
            </div>

        </div>
    </div>


    <div class="bg-white p-8 rounded-[2.5rem] shadow-[0_20px_50px_-20px_rgba(0,0,0,0.05)] border border-slate-50 mt-10">
    
    <div class="flex flex-col lg:flex-row items-center justify-between mb-8 gap-6">
        <div class="flex items-center gap-3">
            <div class="w-2 h-8 bg-[#0F172A] rounded-full"></div>
            <div>
                <h3 class="text-xl font-black text-[#0F172A] uppercase italic tracking-tighter">
                    Member Baru <span class="text-warna-500">Bulan Ini</span>
                </h3>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">New Registrations Analytics</p>
            </div>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-4">
                <div class="flex items-center bg-white px-5 py-3 rounded-2xl border border-slate-100 shadow-sm transition-all hover:shadow-md group">
    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mr-4 italic group-hover:text-warna-500 transition-colors">
        Show:
    </label>

    <div class="relative flex items-center">
        <select wire:model.live="perPagememberbaru" 
                class="bg-transparent text-xs font-black text-[#0F172A] italic border-none focus:ring-0 focus:outline-none cursor-pointer appearance-none py-0 pl-0 pr-6 z-10 relative bg-none [-webkit-appearance:none] [-moz-appearance:none]">
            <option value="5">05</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="25">25</option>
        </select>
        
        <i class="fa-solid fa-chevron-down text-[10px] text-slate-300 absolute right-0 pointer-events-none group-hover:text-warna-500 transition-transform duration-300 group-hover:translate-y-[1px]"></i>
    </div>
</div>
            
            <div class="px-5 py-2 bg-[#0F172A] rounded-xl shadow-lg shadow-warna-500/10">
                <p class="text-[10px] font-black text-warna-500 uppercase italic">
                    Total: <span class="text-white ml-1">{{ $newThisMonth }} Members</span>
                </p>
            </div>
        </div>
    </div>

    <div class="w-full overflow-hidden border border-slate-100 rounded-[2rem] shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        @foreach(['name' => 'Nama Member', 'email' => 'Kontak Email', 'status' => 'Status', 'membership_expiration_date' => 'Masa Expired', 'member_type' => 'Tipe'] as $field => $label)
                        <th class="px-6 py-5 text-left">
                            <button wire:click="sortBy('{{ $field }}')" 
                                    class="group flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-widest hover:text-warna-500 transition-colors italic">
                                {{ $label }}
                                <i class="fas fa-sort-down opacity-0 group-hover:opacity-100 transition-opacity"></i>
                            </button>
                        </th>
                        @endforeach
                    </tr>
                </thead>
                
                <tbody class="divide-y divide-slate-50">
                    @forelse($newMembersThisMonth as $member)
                        <tr class="hover:bg-slate-50/50 transition-all duration-200 group">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-[#0F172A] flex items-center justify-center text-[10px] font-black text-warna-500 italic shadow-md">
                                        {{ substr($member->name, 0, 1) }}
                                    </div>
                                    <span class="text-xs font-black text-[#0F172A] uppercase italic tracking-tight">{{ $member->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-5 text-xs font-bold text-slate-400 italic">
                                {{ $member->email }}
                            </td>
                            <td class="px-6 py-5">
                                @php
                                    $statusClasses = [
                                        'active' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                        'frozen' => 'bg-amber-50 text-amber-600 border-amber-100',
                                        'inactive' => 'bg-rose-50 text-rose-600 border-rose-100',
                                        'pending_email_verification' => 'bg-orange-50 text-orange-600 border-orange-100',
                                    ];
                                    $class = $statusClasses[$member->status] ?? 'bg-slate-50 text-slate-600 border-slate-100';
                                @endphp
                                <span class="px-3 py-1.5 rounded-lg border {{ $class }} text-[9px] font-black uppercase tracking-widest italic">
                                    {{ str_replace('_', ' ', $member->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-5">
                                @if($member->membership_expiration_date)
                                    <span class="text-xs font-black italic {{ $member->membership_expiration_date->isPast() ? 'text-rose-500' : 'text-[#0F172A]' }}">
                                        {{ $member->membership_expiration_date->format('d M Y') }}
                                    </span>
                                @else
                                    <span class="text-[10px] font-black text-slate-300 italic">NOT SET</span>
                                @endif
                            </td>
                            <td class="px-6 py-5">
                                <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-[9px] font-black uppercase tracking-widest italic shadow-sm
                                    {{ $member->member_type === 'local' ? 'bg-[#0F172A] text-warna-500' : 'bg-slate-100 text-[#0F172A]' }}">
                                    <i class="fas {{ $member->member_type === 'local' ? 'fa-home' : 'fa-globe' }} mr-2 text-[10px]"></i>
                                    {{ $member->member_type }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center opacity-20">
                                    <i class="fas fa-users-slash text-5xl mb-4 text-[#0F172A]"></i>
                                    <p class="text-[10px] font-black uppercase tracking-[0.3em] italic">No New Members Found</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($newMembersThisMonth->hasPages())
    <div class="mt-8 flex flex-col md:flex-row items-center justify-between gap-6 px-4">
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">
            Showing {{ $newMembersThisMonth->firstItem() }}-{{ $newMembersThisMonth->lastItem() }} of {{ $newMembersThisMonth->total() }}
        </p>
        
        <div class="flex items-center gap-2">
            {{-- Custom Styled Pagination --}}
            @if (!$newMembersThisMonth->onFirstPage())
                <button wire:click="previousPage" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border-2 border-slate-50 text-[#0F172A] hover:bg-warna-500 hover:border-warna-500 transition-all active:scale-90 shadow-sm">
                    <i class="fas fa-chevron-left text-xs"></i>
                </button>
            @endif

            <div class="flex gap-1 bg-slate-50 p-1 rounded-xl border border-slate-100">
                @foreach ($newMembersThisMonth->getUrlRange(1, $newMembersThisMonth->lastPage()) as $page => $url)
                    <button wire:click="gotoPage({{ $page }})" 
                            class="w-8 h-8 flex items-center justify-center rounded-lg text-[10px] font-black transition-all
                            {{ $page == $newMembersThisMonth->currentPage() ? 'bg-[#0F172A] text-warna-500 shadow-md' : 'text-slate-400 hover:text-[#0F172A]' }}">
                        {{ sprintf("%02d", $page) }}
                    </button>
                @endforeach
            </div>

            @if ($newMembersThisMonth->hasMorePages())
                <button wire:click="nextPage" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border-2 border-slate-50 text-[#0F172A] hover:bg-warna-500 hover:border-warna-500 transition-all active:scale-90 shadow-sm">
                    <i class="fas fa-chevron-right text-xs"></i>
                </button>
            @endif
        </div>
    </div>
    @endif
</div>

    
<div class="bg-white p-8 rounded-[2.5rem] shadow-[0_20px_50px_-20px_rgba(0,0,0,0.05)] border border-slate-50 mt-10 relative overflow-hidden">
    
    <div class="flex flex-col lg:flex-row items-center justify-between mb-8 gap-6">
        <div class="flex items-center gap-3">
            <div class="w-2 h-8 bg-rose-500 rounded-full animate-pulse"></div>
            <div>
                <h3 class="text-xl font-black text-[#0F172A] uppercase italic tracking-tighter">
                    Member Segera <span class="text-rose-500 text-shadow-sm">Expired</span>
                </h3>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Urgent: 7 Days Remaining</p>
            </div>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-4">
            <div class="flex items-center bg-white px-5 py-3 rounded-2xl border border-slate-100 shadow-sm transition-all hover:shadow-md group">
    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mr-4 italic group-hover:text-warna-500 transition-colors">
        Show:
    </label>

    <div class="relative flex items-center">
        <select wire:model.live="perPagememberbaru" 
                class="bg-transparent text-xs font-black text-[#0F172A] italic border-none focus:ring-0 focus:outline-none cursor-pointer appearance-none py-0 pl-0 pr-6 z-10 relative bg-none [-webkit-appearance:none] [-moz-appearance:none]">
            <option value="5">05</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="25">25</option>
        </select>
        
        <i class="fa-solid fa-chevron-down text-[10px] text-slate-300 absolute right-0 pointer-events-none group-hover:text-warna-500 transition-transform duration-300 group-hover:translate-y-[1px]"></i>
    </div>
</div>
            
            <div class="px-5 py-2 bg-rose-50 rounded-xl border border-rose-100">
                <p class="text-[10px] font-black text-rose-600 uppercase italic">
                    Total: <span class="ml-1">{{ $expiringSoon }} Members</span>
                </p>
            </div>
        </div>
    </div>

    <div class="w-full overflow-hidden border border-slate-100 rounded-[2rem] shadow-sm bg-white">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        @foreach(['name' => 'Nama Member', 'email' => 'Kontak Email', 'status' => 'Status', 'membership_expiration_date' => 'Masa Expired', 'member_type' => 'Tipe'] as $field => $label)
                        <th class="px-6 py-5 text-left">
                            <button wire:click="sortBy('{{ $field }}')" 
                                    class="group flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-widest hover:text-[#0F172A] transition-colors italic">
                                {{ $label }}
                                <i class="fas fa-sort-down opacity-0 group-hover:opacity-100 transition-opacity"></i>
                            </button>
                        </th>
                        @endforeach
                    </tr>
                </thead>
                
                <tbody class="divide-y divide-slate-50">
                    @forelse($membersExpiringSoon as $member)
                        <tr class="hover:bg-rose-50/30 transition-all duration-200 group">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-[10px] font-black text-[#0F172A] italic border border-slate-200 shadow-sm group-hover:bg-rose-500 group-hover:text-white group-hover:border-rose-500 transition-all">
                                        {{ substr($member->name, 0, 1) }}
                                    </div>
                                    <span class="text-xs font-black text-[#0F172A] uppercase italic tracking-tight">{{ $member->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-5 text-xs font-bold text-slate-400 italic">
                                {{ $member->email }}
                            </td>
                            <td class="px-6 py-5">
                                @php
                                    $statusClasses = [
                                        'active' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                        'frozen' => 'bg-amber-50 text-amber-600 border-amber-100',
                                        'inactive' => 'bg-rose-50 text-rose-600 border-rose-100',
                                    ];
                                    $class = $statusClasses[$member->status] ?? 'bg-slate-50 text-slate-600 border-slate-100';
                                @endphp
                                <span class="px-3 py-1.5 rounded-lg border {{ $class }} text-[9px] font-black uppercase tracking-widest italic">
                                    {{ str_replace('_', ' ', $member->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-5">
                                @if($member->membership_expiration_date)
                                    <div class="flex flex-col">
                                        <span class="text-xs font-black italic {{ $member->membership_expiration_date->isPast() ? 'text-rose-600' : 'text-[#0F172A]' }}">
                                            {{ $member->membership_expiration_date->format('d M Y') }}
                                        </span>
                                        <span class="text-[8px] font-black uppercase text-rose-400 italic">
                                            {{ $member->membership_expiration_date->diffForHumans() }}
                                        </span>
                                    </div>
                                @else
                                    <span class="text-[10px] font-black text-slate-300 italic">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-5">
                                <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-[9px] font-black uppercase tracking-widest italic
                                    {{ $member->member_type === 'local' ? 'bg-[#0F172A] text-warna-500 shadow-lg shadow-warna-500/10' : 'bg-white border border-slate-200 text-[#0F172A]' }}">
                                    <i class="fas {{ $member->member_type === 'local' ? 'fa-home' : 'fa-globe' }} mr-2 text-[10px]"></i>
                                    {{ $member->member_type }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center opacity-20">
                                    <i class="fas fa-calendar-check text-5xl mb-4 text-[#0F172A]"></i>
                                    <p class="text-[10px] font-black uppercase tracking-[0.3em] italic">Aman: Tidak ada member segera expired</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($membersExpiringSoon->hasPages())
    <div class="mt-8 flex flex-col md:flex-row items-center justify-between gap-6 px-4">
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">
            Displaying {{ $membersExpiringSoon->firstItem() }}-{{ $membersExpiringSoon->lastItem() }} of {{ $membersExpiringSoon->total() }}
        </p>
        
        <div class="flex items-center gap-2">
            @if (!$membersExpiringSoon->onFirstPage())
                <button wire:click="previousPage" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border-2 border-slate-50 text-[#0F172A] hover:bg-rose-500 hover:text-white transition-all active:scale-90 shadow-sm">
                    <i class="fas fa-chevron-left text-xs"></i>
                </button>
            @endif

            <div class="flex gap-1 bg-slate-50 p-1 rounded-xl border border-slate-100">
                @foreach ($membersExpiringSoon->getUrlRange(1, $membersExpiringSoon->lastPage()) as $page => $url)
                    <button wire:click="gotoPage({{ $page }})" 
                            class="w-8 h-8 flex items-center justify-center rounded-lg text-[10px] font-black transition-all
                            {{ $page == $membersExpiringSoon->currentPage() ? 'bg-rose-500 text-white shadow-md' : 'text-slate-400 hover:text-[#0F172A]' }}">
                        {{ sprintf("%02d", $page) }}
                    </button>
                @endforeach
            </div>

            @if ($membersExpiringSoon->hasMorePages())
                <button wire:click="nextPage" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border-2 border-slate-50 text-[#0F172A] hover:bg-rose-500 hover:text-white transition-all active:scale-90 shadow-sm">
                    <i class="fas fa-chevron-right text-xs"></i>
                </button>
            @endif
        </div>
    </div>
    @endif
</div>