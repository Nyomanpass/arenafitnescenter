<div class=" w-full min-w-0">

    <div class="bg-white rounded-lg text-sm w-full min-w-0">
        <div class="p-4 sm:p-6">
            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Kelola Member</h2>
                <button 
                    wire:click="openTambahMemberModal" 
                    class="px-4 py-2 bg-warna-700 text-white rounded-lg hover:bg-warna-700/80 active:scale-95 transition-all flex items-center justify-center gap-2 text-sm sm:text-base">
                    <i class="fa-solid fa-plus"></i>
                    <span>Tambah Member</span>
                </button>
            </div>

            <!-- Search, Filter, and Per Page Section -->
            <div class="mb-10 space-y-6">
                <div class="group bg-white rounded-[2rem] p-2 border border-slate-100 shadow-[0_10px_30px_-15px_rgba(0,0,0,0.05)] focus-within:shadow-[0_15px_35px_-12px_rgba(0,0,0,0.1)] transition-all duration-500">
                    <div class="relative flex items-center">
                        <div class="pl-5 text-slate-400 group-focus-within:text-warna-500 transition-colors">
                            <i class="fas fa-search text-sm"></i>
                        </div>
                        <input 
                            wire:model.live.debounce.300ms="searchVerifiedMember"
                            type="text"
                            class="w-full bg-transparent border-none focus:ring-0 text-sm font-bold text-[#0F172A] placeholder:text-slate-400 placeholder:font-medium py-4 px-4"
                            placeholder="Cari member berdasarkan nama, email, atau telepon..."
                        >
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
                    <div class="flex flex-wrap items-center gap-4 w-full lg:w-auto">
                        
                        <div class="flex items-center bg-white px-5 py-3 rounded-2xl border border-slate-100 shadow-sm transition-all hover:shadow-md">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 mr-3">Show</label>
                            <div class="relative flex items-center">
                                <select wire:model.live="perPage" 
                                        class="bg-transparent text-sm font-black text-[#0F172A] border-none focus:ring-0 focus:outline-none cursor-pointer appearance-none py-0 pl-0 pr-6 z-10 relative bg-none [-webkit-appearance:none] [-moz-appearance:none]">
                                    <option value="5">05</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </select>
                                <i class="fa-solid fa-angle-down text-[10px] text-slate-400 absolute right-0 pointer-events-none"></i>
                            </div>
                        </div>
                        
                        <div class="relative">
                            <button id="filterDropdownButton" 
                                    data-dropdown-toggle="filterDropdown" 
                                    class="px-6 py-3 bg-white hover:bg-slate-50 text-slate-600 rounded-2xl border border-slate-100 shadow-sm transition-all duration-300 flex items-center gap-3 group
                                    {{ $filterMemberType || $filterStatus ? 'ring-2 ring-warna-500/20 border-warna-500/50 text-warna-600' : '' }}">
                                <i class="fas fa-filter text-xs group-hover:rotate-12 transition-transform"></i>
                                <span class="text-xs font-black uppercase tracking-widest">Filter</span>
                                @if($filterMemberType || $filterStatus)
                                    <span class="bg-warna-500 text-white text-[10px] font-black rounded-lg px-2 py-0.5 shadow-sm shadow-warna-500/30">
                                        {{ ($filterMemberType ? 1 : 0) + ($filterStatus ? 1 : 0) }}
                                    </span>
                                @endif
                            </button>

                            <div id="filterDropdown" class="z-50 hidden bg-white/95 backdrop-blur-xl rounded-[2rem] shadow-2xl w-80 border border-white p-6 transition-all duration-300">
                                <h3 class="text-xs font-black text-[#0F172A] uppercase tracking-widest mb-5 flex items-center italic">
                                    <span class="w-1 h-4 bg-warna-500 rounded-full mr-2"></span>
                                    Filter Options
                                </h3>
                                
                                <div class="space-y-5">
                                    @foreach([
                                        ['label' => 'Jenis Member', 'model' => 'filterMemberType', 'options' => ['local' => 'Local', 'foreign' => 'Foreign']],
                                        ['label' => 'Status Member', 'model' => 'filterStatus', 'options' => ['active' => 'Active', 'frozen' => 'Frozen', 'inactive' => 'Inactive', 'pending_email_verification' => 'Pending Email', 'pending_admin_verification' => 'Pending Admin']]
                                    ] as $f)
                                    <div>
                                        <label class="block mb-2 text-[10px] font-black text-slate-400 uppercase tracking-widest">{{ $f['label'] }}</label>
                                        <div class="relative">
                                            <select wire:model.live="{{ $f['model'] }}" 
                                                    class="w-full bg-slate-50 border-none text-sm font-bold text-[#0F172A] rounded-xl focus:ring-2 focus:ring-warna-500/20 block p-3 appearance-none">
                                                <option value="">Semua</option>
                                                @foreach($f['options'] as $val => $label)
                                                    <option value="{{ $val }}">{{ $label }}</option>
                                                @endforeach
                                            </select>
                                            <i class="fa-solid fa-chevron-down text-[8px] text-slate-400 absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none"></i>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="mt-6 pt-5 border-t border-slate-100 flex items-center justify-between">
                                    <span class="text-[10px] font-bold text-slate-400">Total: <span class="text-[#0F172A]">{{ $this->getFilterCounts()['total'] }}</span></span>
                                    <button wire:click="resetFilters" class="text-[10px] font-black uppercase tracking-widest text-rose-500 hover:text-rose-600 transition-colors">
                                        Reset All
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 flex-wrap justify-end">
                        @if($filterMemberType || $filterStatus || $searchVerifiedMember)
                            <button wire:click="resetFilters" 
                                    class="px-5 py-2.5 bg-rose-50 text-rose-600 rounded-2xl hover:bg-rose-100 transition-all text-[10px] font-black uppercase tracking-widest flex items-center gap-2 border border-rose-100/50">
                                <i class="fas fa-undo-alt"></i>
                                Reset Search
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Table Section dengan Sorting -->
            <div class="bg-white rounded-[2.5rem] border border-white shadow-[0_20px_50px_-20px_rgba(0,0,0,0.1)] overflow-hidden transition-all duration-300">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-slate-50/50">
                                <th class="px-6 py-4 text-left">
                                    <button wire:click="sortBy('name')" class="group flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] hover:text-warna-500 transition-colors">
                                        <span>Nama Member</span>
                                        <i class="fas fa-sort-{{ $sortField === 'name' ? ($sortDirection === 'asc' ? 'up' : 'down') : 'alt' }} {{ $sortField === 'name' ? 'text-warna-500' : 'opacity-30' }}"></i>
                                    </button>
                                </th>
                                <th class="px-6 py-4 text-left hidden md:table-cell">
                                    <button wire:click="sortBy('email')" class="group flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] hover:text-warna-500 transition-colors">
                                        <span>Email</span>
                                        <i class="fas fa-sort-{{ $sortField === 'email' ? ($sortDirection === 'asc' ? 'up' : 'down') : 'alt' }} {{ $sortField === 'email' ? 'text-warna-500' : 'opacity-30' }}"></i>
                                    </button>
                                </th>
                                <th class="px-6 py-4 text-left">
                                    <button wire:click="sortBy('status')" class="group flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] hover:text-warna-500 transition-colors">
                                        <span>Status</span>
                                        <i class="fas fa-sort-{{ $sortField === 'status' ? ($sortDirection === 'asc' ? 'up' : 'down') : 'alt' }} {{ $sortField === 'status' ? 'text-warna-500' : 'opacity-30' }}"></i>
                                    </button>
                                </th>
                                <th class="px-6 py-4 text-left hidden lg:table-cell">
                                    <button wire:click="sortBy('membership_expiration_date')" class="group flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] hover:text-warna-500 transition-colors">
                                        <span>Expired</span>
                                        <i class="fas fa-sort-{{ $sortField === 'membership_expiration_date' ? ($sortDirection === 'asc' ? 'up' : 'down') : 'alt' }} {{ $sortField === 'membership_expiration_date' ? 'text-warna-500' : 'opacity-30' }}"></i>
                                    </button>
                                </th>
                                <th class="px-6 py-4 text-left hidden sm:table-cell">
                                    <button wire:click="sortBy('member_type')" class="group flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] hover:text-warna-500 transition-colors">
                                        <span>Tipe</span>
                                        <i class="fas fa-sort-{{ $sortField === 'member_type' ? ($sortDirection === 'asc' ? 'up' : 'down') : 'alt' }} {{ $sortField === 'member_type' ? 'text-warna-500' : 'opacity-30' }}"></i>
                                    </button>
                                </th>
                                <th class="px-6 py-4 text-center text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody class="divide-y divide-slate-50">
                            @forelse($verifiedMembers as $member)
                                <tr class="group hover:bg-slate-50/80 transition-all duration-300">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-black text-[#0F172A] uppercase tracking-tight">{{ $member->name }}</span>
                                            <span class="text-[10px] text-slate-400 md:hidden font-bold">{{ $member->email }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 hidden md:table-cell">
                                        <span class="text-xs font-bold text-slate-500">{{ $member->email }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $statusStyles = [
                                                'active' => 'bg-emerald-500 text-white',
                                                'frozen' => 'bg-amber-400 text-white',
                                                'inactive' => 'bg-rose-500 text-white',
                                                'pending_email_verification' => 'bg-slate-200 text-slate-600',
                                                'pending_admin_verification' => 'bg-[#0F172A] text-white',
                                            ];
                                        @endphp
                                        <span class="px-3 py-1.5 rounded-xl text-[9px] font-black uppercase tracking-widest {{ $statusStyles[$member->status] ?? 'bg-slate-100 text-slate-600' }} shadow-sm">
                                            {{ str_replace('_', ' ', $member->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 hidden lg:table-cell">
                                        @if($member->membership_expiration_date)
                                            <div class="flex items-center gap-2">
                                                <div class="w-1.5 h-1.5 rounded-full {{ $member->membership_expiration_date->isPast() ? 'bg-rose-500' : 'bg-emerald-500' }}"></div>
                                                <span class="text-xs font-black italic {{ $member->membership_expiration_date->isPast() ? 'text-rose-600' : 'text-[#0F172A]' }}">
                                                    {{ $member->membership_expiration_date->format('d/m/Y') }}
                                                </span>
                                            </div>
                                        @else
                                            <span class="text-xs font-bold text-slate-300">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 hidden sm:table-cell">
                                        <span class="inline-flex items-center text-[10px] font-black uppercase tracking-widest {{ $member->member_type === 'local' ? 'text-blue-600' : 'text-purple-600' }}">
                                            <i class="fas {{ $member->member_type === 'local' ? 'fa-home' : 'fa-globe' }} mr-2"></i>
                                            {{ $member->member_type }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <button wire:click="openDetailMemberModal({{ $member->id }})" 
                                                class="px-4 py-2 bg-slate-900 hover:bg-warna-500 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-xl transition-all duration-300 shadow-md hover:shadow-warna-500/20 active:scale-95">
                                            Detail
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-20 text-center">
                                        <div class="flex flex-col items-center opacity-20">
                                            <i class="fas fa-users-slash text-6xl mb-4 text-slate-300"></i>
                                            <p class="text-[10px] font-black uppercase tracking-[0.3em]">No Member Data Found</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Enhanced Pagination Section -->
            <div class="mt-10 mb-6">
                <div class="flex flex-col md:flex-row items-center justify-between gap-6 px-4">
                    <div class="order-2 md:order-1">
                        <div class="bg-white px-6 py-3 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-3">
                            <div class="w-1.5 h-1.5 rounded-full bg-warna-500 animate-pulse"></div>
                            <p class="text-[10px] font-black uppercase tracking-[0.15em] text-slate-400">
                                @if($verifiedMembers->count() > 0)
                                    Menampilkan <span class="text-[#0F172A]">{{ $verifiedMembers->firstItem() }}-{{ $verifiedMembers->lastItem() }}</span> 
                                    Dari <span class="text-[#0F172A]">{{ $verifiedMembers->total() }}</span> Member
                                    @if($searchVerifiedMember || $filterMemberType || $filterStatus)
                                        <span class="ml-1 text-warna-500 italic lowercase tracking-tight">(difilter)</span>
                                    @endif
                                @else
                                    Tidak ada data ditemukan
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="order-1 md:order-2">
                        @if($verifiedMembers->hasPages())
                        <div class="flex items-center gap-2">
                            <button wire:click="previousPage" 
                                    {{ $verifiedMembers->onFirstPage() ? 'disabled' : '' }}
                                    class="w-11 h-11 flex items-center justify-center bg-white border border-slate-100 rounded-xl text-slate-400 hover:text-warna-500 hover:border-warna-500 shadow-sm transition-all duration-300 disabled:opacity-30 disabled:hover:text-slate-400 disabled:hover:border-slate-100">
                                <i class="fas fa-chevron-left text-xs"></i>
                            </button>

                            <div class="flex items-center gap-2 bg-slate-50/50 p-1 rounded-2xl border border-slate-100/50">
                                @php
                                    $currentPage = $verifiedMembers->currentPage();
                                    $lastPage = $verifiedMembers->lastPage();
                                    $startPage = max(1, $currentPage - 1);
                                    $endPage = min($lastPage, $currentPage + 1);
                                @endphp

                                @if($startPage > 1)
                                    <button wire:click="gotoPage(1)" class="w-10 h-10 flex items-center justify-center text-xs font-black text-slate-400 hover:text-[#0F172A] transition-colors">1</button>
                                    @if($startPage > 2)
                                        <span class="text-slate-300 text-xs font-black">...</span>
                                    @endif
                                @endif

                                @for($page = $startPage; $page <= $endPage; $page++)
                                    <button wire:click="gotoPage({{ $page }})" 
                                            class="w-10 h-10 flex items-center justify-center text-xs font-black rounded-xl transition-all duration-300
                                            {{ $page === $currentPage 
                                                ? 'bg-[#0F172A] text-white shadow-lg shadow-slate-900/20 scale-110' 
                                                : 'text-slate-400 hover:bg-white hover:text-[#0F172A] hover:shadow-sm' }}">
                                        {{ $page }}
                                    </button>
                                @endfor

                                @if($endPage < $lastPage)
                                    @if($endPage < $lastPage - 1)
                                        <span class="text-slate-300 text-xs font-black">...</span>
                                    @endif
                                    <button wire:click="gotoPage({{ $lastPage }})" class="w-10 h-10 flex items-center justify-center text-xs font-black text-slate-400 hover:text-[#0F172A] transition-colors">{{ $lastPage }}</button>
                                @endif
                            </div>

                            <button wire:click="nextPage" 
                                    {{ !$verifiedMembers->hasMorePages() ? 'disabled' : '' }}
                                    class="w-11 h-11 flex items-center justify-center bg-white border border-slate-100 rounded-xl text-slate-400 hover:text-warna-500 hover:border-warna-500 shadow-sm transition-all duration-300 disabled:opacity-30 disabled:hover:text-slate-400 disabled:hover:border-slate-100">
                                <i class="fas fa-chevron-right text-xs"></i>
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    




    <!--modals-->
    @if($isInputModalOpen)
        <div class="fixed z-50 inset-0 flex items-center justify-center bg-warna-300/50 backdrop-blur-sm">
            <x-input-modal class="relative bg-white rounded-lg shadow-lg p-6 mx-7 md:mx-0 w-full {{ ($detailMemberMode ? 'max-w-4xl' : 'max-w-2xl') }}">
                
               @if($TambahMemberMode)
                        <x-slot name="title">
                            <div class="flex items-center gap-3">
                                <div class="w-1.5 h-6 bg-warna-500 rounded-full"></div>
                                <span class="text-lg font-black text-[#0F172A] uppercase tracking-tighter italic">Tambah <span class="text-warna-500">Member</span></span>
                            </div>
                        </x-slot>
                        
                        <x-slot name="subtitle">
                            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-4">Lengkapi informasi member baru di bawah ini.</span>
                        </x-slot>

                        <div class="bg-white border-l-4 border-amber-400 rounded-2xl p-5 mb-8 mt-6 shadow-[0_10px_30px_-15px_rgba(251,191,36,0.2)]">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 w-10 h-10 bg-amber-50 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-bolt-lightning text-amber-500"></i>
                                </div>
                                <div>
                                    <h3 class="text-xs font-black text-amber-800 uppercase tracking-widest mb-1">Peringatan Penting!</h3>
                                    <p class="text-[11px] font-bold text-amber-700/80 leading-relaxed">
                                        Fitur ini hanya untuk keadaan <span class="text-amber-900 underline decoration-2">urgent</span>. 
                                        Gunakan pendaftaran online melalui website untuk prosedur normal.
                                    </p>
                                </div>
                            </div>
                        </div>

                    <form wire:submit.prevent='addMember' class="w-full mt-5">
                        <div class="max-h-[45vh] overflow-y-auto pt-4 pr-4 space-y-6 custom-scrollbar">
                            
                            <div class="relative">
                                <x-g-input 
                                    wire:model.live="name"
                                    class="mb-2"
                                    label="Nama Lengkap"
                                    placeholder="Contoh: Budi Santoso"
                                />
                            </div>

                            <x-g-input 
                                wire:model.live="nomor_telepon"
                                type="number"
                                class="mb-2"
                                label="Nomor Telepon"
                                placeholder="08123456789"
                            />

                            <x-g-input 
                                wire:model.live="email"
                                type="email"
                                class="mb-2"
                                label="Alamat Email"
                                placeholder="budi@example.com"
                            />
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <x-g-input 
                                    wire:model.live="username"
                                    type="text"
                                    label="Username"
                                    placeholder="budiarena"
                                />
                                <x-g-input 
                                    wire:model.live="password"
                                    type="password"
                                    label="Password"
                                    placeholder="••••••••"
                                />
                            </div>
                        </div>

                        @if($errors->any())
                            <div class="mt-4 p-4 bg-rose-50 rounded-2xl border border-rose-100">
                                @foreach($errors->all() as $error)
                                    <p class="text-[10px] font-black text-rose-500 uppercase tracking-wide flex items-center gap-2">
                                        <i class="fas fa-circle-xmark"></i> {{ $error }}
                                    </p>
                                @endforeach
                            </div>
                        @endif

                        <div class="flex items-center justify-end gap-3 mt-10">
                            <button @click="show = false" type="button" wire:click="closeInputModal" 
                                    class="px-8 py-3 bg-slate-50 text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] rounded-2xl hover:bg-slate-100 hover:text-slate-600 transition-all duration-300">
                                Batal
                            </button>
                            <button type="submit" 
                                    class="px-10 py-3 bg-[#0F172A] text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-slate-900/20 hover:bg-warna-500 hover:shadow-warna-500/40 hover:-translate-y-1 active:scale-95 transition-all duration-300">
                                Simpan Member
                            </button>
                        </div>
                    </form>
            @elseif($detailMemberMode)
                <x-slot name="title">
                    <div class="flex items-center gap-3">
                        <div class="w-1.5 h-6 bg-warna-500 rounded-full shadow-[0_0_10px_rgba(var(--warna-500),0.5)]"></div>
                        <span class="text-base font-black text-[#0F172A] uppercase italic tracking-wider">Detail <span class="text-warna-500">Member</span></span>
                    </div>
                </x-slot>
                <x-slot name="subtitle">Informasi profil dan histori absensi member.</x-slot>
                
                <div class="max-h-[55vh] overflow-y-auto py-2 mt-4 pr-1 custom-scrollbar">
                    <div class="bg-[#0F172A] rounded-3xl p-6 mb-6 shadow-xl relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-warna-500 opacity-10 rounded-full -mr-16 -mt-16 blur-3xl"></div>
                        
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 relative z-10">
                            <div class="flex items-center gap-5">
                                <div class="w-16 h-16 bg-warna-500 rounded-2xl flex items-center justify-center shadow-lg shadow-warna-500/30 transform -rotate-3">
                                    <span class="text-xl font-black text-[#0F172A] italic">{{ strtoupper(substr($memberDetail['name'], 0, 2)) }}</span>
                                </div>
                                <div class="min-w-0">
                                    <h3 class="text-xl font-black text-white uppercase truncate italic tracking-tight">{{ $memberDetail['name'] }}</h3>
                                    <p class="text-slate-400 text-[11px] font-bold truncate tracking-widest uppercase opacity-80">{{ $memberDetail['email'] }}</p>
                                    <div class="flex gap-2 mt-2">
                                        <span class="px-2 py-0.5 bg-warna-500/20 border border-warna-500/30 rounded text-[9px] font-black uppercase text-warna-500 italic">
                                            {{ $memberDetail['member_type'] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-3 w-full sm:w-auto">
                                <div class="relative flex-1 sm:flex-none" x-data="{ open: false }">
                                    @php
                                        $statusStyles = [
                                            'active' => 'bg-warna-500 text-[#0F172A]',
                                            'frozen' => 'bg-amber-400 text-[#0F172A]',
                                            'inactive' => 'bg-rose-500 text-white',
                                            'pending_email_verification' => 'bg-slate-600 text-white',
                                            'pending_admin_verification' => 'bg-indigo-600 text-white',
                                        ];
                                        $currentStyle = $statusStyles[$memberDetail['status']] ?? 'bg-slate-400';
                                    @endphp
                                    <button @click="open = !open" 
                                            class="w-full flex items-center justify-center px-5 py-2.5 {{ $currentStyle }} rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg transition-all hover:scale-105 active:scale-95">
                                        {{ str_replace('_', ' ', $memberDetail['status']) }}
                                        <i class="fas fa-chevron-down ml-2 text-[8px]"></i>
                                    </button>
                                    <div x-show="open" @click.away="open = false" 
                                        class="absolute right-0 mt-2 w-48 bg-white border border-slate-100 rounded-xl shadow-2xl z-50 p-1 overflow-hidden">
                                        @foreach(['active', 'frozen', 'inactive'] as $st)
                                            <button wire:click="changeStatus('{{$st}}')" @click="open = false" 
                                                    class="w-full text-left px-4 py-2 text-[10px] font-black uppercase hover:bg-warna-500 hover:text-[#0F172A] rounded-lg text-slate-600 transition-colors">
                                                {{ $st }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                                <button wire:click="openEditMemberModal" class="p-3 bg-white/10 border border-white/10 text-white hover:bg-warna-500 hover:text-[#0F172A] rounded-xl transition-all shadow-lg">
                                    <i class="fas fa-edit text-xs"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-8">
                        <div class="bg-white border-2 border-slate-100 rounded-3xl p-6 shadow-sm">
                            <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] mb-5 flex items-center italic">
                                <span class="w-8 h-[1px] bg-warna-500 mr-2"></span> DATA PRIBADI
                            </h4>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center py-1">
                                    <span class="text-[10px] font-bold text-slate-400 uppercase">Username</span>
                                    <span class="text-[11px] font-black text-[#0F172A] bg-slate-50 px-3 py-1 rounded-lg border border-slate-100">{{ $memberDetail['username'] }}</span>
                                </div>
                                <div class="flex justify-between items-center py-1">
                                    <span class="text-[10px] font-bold text-slate-400 uppercase">Telepon</span>
                                    <span class="text-[11px] font-black text-[#0F172A] italic">{{ $memberDetail['nomor_telepon'] }}</span>
                                </div>
                                @if($memberDetail['membership_expiration_date'])
                                    <div class="flex justify-between items-center py-3 border-t border-dashed border-slate-200 mt-2">
                                        <span class="text-[10px] font-bold text-slate-400 uppercase">Expired</span>
                                        <span class="text-[12px] font-black {{ \Carbon\Carbon::parse($memberDetail['membership_expiration_date'])->isPast() ? 'text-rose-500' : 'text-warna-500' }} italic">
                                            {{ \Carbon\Carbon::parse($memberDetail['membership_expiration_date'])->format('d M Y') }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="bg-[#0F172A] rounded-3xl p-6 relative overflow-hidden shadow-xl">
                            <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-warna-500 opacity-5 rounded-full blur-2xl"></div>
                            <h4 class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-6 italic">TOTAL PERFORMA</h4>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-white/5 p-4 rounded-2xl border border-white/5 shadow-inner">
                                    <div class="text-2xl font-black text-warna-500 italic leading-none">{{ $attendanceStats['attendedDays'] }}</div>
                                    <div class="text-[8px] font-bold text-white uppercase mt-2 tracking-widest opacity-60">Hari Hadir</div>
                                </div>
                                <div class="bg-warna-500 p-4 rounded-2xl shadow-lg shadow-warna-500/20">
                                    <div class="text-2xl font-black text-[#0F172A] italic leading-none">{{ $attendanceStats['attendancePercentage'] }}%</div>
                                    <div class="text-[8px] font-bold text-[#0F172A] uppercase mt-2 tracking-widest opacity-80">Rasio</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border-2 border-slate-100 rounded-3xl p-6 shadow-sm mb-6">
                        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-8">
                            <h4 class="text-[11px] font-black text-[#0F172A] uppercase italic tracking-widest flex items-center">
                                <i class="fas fa-calendar-alt text-warna-500 mr-2 text-sm"></i>
                                Kalender Absensi
                            </h4>
                            
                            <div class="flex items-center gap-2 bg-slate-100 p-1.5 rounded-2xl border border-slate-200 shadow-inner">
                                <select wire:model.live="selectedMonth" 
                                    class="appearance-none bg-white border-none text-[9px] font-black uppercase text-[#0F172A] rounded-xl py-2 pl-3 pr-8 focus:ring-2 focus:ring-warna-500 transition-all cursor-pointer shadow-sm">
                                    @foreach($monthOptions as $value => $label) <option value="{{ $value }}">{{ $label }}</option> @endforeach
                                </select>
                                <select wire:model.live="selectedYear" 
                                    class="appearance-none bg-white border-none text-[9px] font-black uppercase text-[#0F172A] rounded-xl py-2 pl-3 pr-8 focus:ring-2 focus:ring-warna-500 transition-all cursor-pointer shadow-sm">
                                    @foreach($yearOptions as $value => $label) <option value="{{ $value }}">{{ $label }}</option> @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-7 gap-2 mb-8">
                            @foreach(['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'] as $dayName)
                                <div class="text-center text-[8px] font-black text-slate-400 uppercase py-2 tracking-widest">{{ $dayName }}</div>
                            @endforeach
                            
                            @foreach($calendarDays as $day)
                                <div class="aspect-square relative flex flex-col items-center justify-center text-[11px] font-black rounded-xl border-2 transition-all duration-300
                                    {{ !$day['isCurrentMonth'] ? 'bg-slate-50 text-slate-300 border-transparent opacity-60' : '' }}
                                    {{ $day['isCurrentMonth'] && !$day['isMembershipActive'] ? 'bg-slate-50 text-slate-400 border-slate-100' : '' }}
                                    {{ $day['isCurrentMonth'] && $day['isMembershipActive'] && !$day['isAttended'] ? 'bg-white text-slate-800 border-warna-500/20 shadow-sm hover:border-warna-500' : '' }}
                                    {{ $day['isAttended'] ? 'bg-[#0F172A] text-white border-[#0F172A] shadow-xl scale-[1.05] z-10' : '' }}
                                    {{ $day['isToday'] && !$day['isAttended'] ? 'ring-2 ring-warna-500 ring-offset-2 border-transparent' : '' }}">
                                    
                                    {{ $day['day'] }}

                                    @if($day['isMembershipActive'] && !$day['isAttended'] && $day['isCurrentMonth'])
                                        <span class="text-[6px] absolute bottom-1.5 font-black text-warna-500 tracking-tighter uppercase italic">Aktif</span>
                                    @endif

                                    @if($day['isAttended'])
                                        <div class="absolute top-1.5 right-1.5 w-2 h-2 bg-warna-500 rounded-full shadow-[0_0_8px_rgba(var(--warna-500),0.8)] border-2 border-[#0F172A]"></div>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100 flex flex-wrap gap-5 justify-center">
                            <div class="flex items-center gap-2 text-[9px] font-black text-[#0F172A] uppercase italic">
                                <div class="w-3.5 h-3.5 bg-[#0F172A] rounded shadow-sm border border-white/10"></div> Hadir
                            </div>
                            <div class="flex items-center gap-2 text-[9px] font-black text-warna-500 uppercase italic">
                                <div class="w-3.5 h-3.5 bg-white border-2 border-warna-500/30 rounded shadow-sm"></div> Member Aktif
                            </div>
                            <div class="flex items-center gap-2 text-[9px] font-black text-slate-400 uppercase italic">
                                <div class="w-3.5 h-3.5 bg-slate-50 border-2 border-slate-200 rounded"></div> Tidak Aktif
                            </div>
                            <div class="flex items-center gap-2 text-[9px] font-black text-warna-500 uppercase italic">
                                <div class="w-3.5 h-3.5 ring-2 ring-warna-500 rounded ring-offset-1"></div> Hari Ini
                            </div>
                        </div>
                    </div>

                    <div class="bg-warna-500 rounded-3xl p-6 shadow-xl shadow-warna-500/20">
                        <h5 class="text-[10px] font-black text-[#0F172A] uppercase tracking-[0.2em] text-center mb-5 italic">
                            Detail Absensi {{ $attendanceStats['monthName'] }} {{ $attendanceStats['year'] }}
                        </h5>
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                            <div class="bg-white p-4 rounded-2xl text-center shadow-md">
                                <div class="text-xl font-black text-warna-500 italic leading-none">{{ $attendanceStats['attendedDays'] }}</div>
                                <div class="text-[8px] font-bold text-slate-400 uppercase mt-2 tracking-widest">Hadir</div>
                            </div>
                            <div class="bg-white p-4 rounded-2xl text-center shadow-md">
                                <div class="text-xl font-black text-[#0F172A] italic leading-none">{{ $attendanceStats['membershipActiveDays'] }}</div>
                                <div class="text-[8px] font-bold text-slate-400 uppercase mt-2 tracking-widest">Aktif</div>
                            </div>
                            <div class="bg-[#0F172A] p-4 rounded-2xl text-center shadow-md border border-white/5">
                                <div class="text-xl font-black text-rose-500 italic leading-none">{{ $attendanceStats['notAttendedDays'] }}</div>
                                <div class="text-[8px] font-bold text-white uppercase mt-2 tracking-widest opacity-60">Absen</div>
                            </div>
                            <div class="bg-white p-4 rounded-2xl text-center shadow-md border-2 border-[#0F172A]">
                                <div class="text-xl font-black text-[#0F172A] italic leading-none">{{ $attendanceStats['attendancePercentage'] }}%</div>
                                <div class="text-[8px] font-bold text-slate-400 uppercase mt-2 tracking-widest">Persentase</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-8 pt-6 border-t border-slate-100">
                    <button wire:click="openHapusMemberModal" class="text-[10px] font-black uppercase text-rose-400 hover:text-rose-600 italic tracking-widest transition-all hover:scale-105 active:scale-95">
                        <i class="fas fa-trash-alt mr-2"></i> Hapus Member
                    </button>

                    <div class="flex gap-3 w-full sm:w-auto">
                        <button @click="show = false" wire:click="closeInputModal()" class="flex-1 sm:flex-none px-8 py-3 bg-slate-100 text-slate-500 rounded-2xl text-[11px] font-black uppercase tracking-widest hover:bg-slate-200 transition-all shadow-sm">
                            Tutup
                        </button>
                        <button wire:click="testAbsen" class="flex-1 sm:flex-none px-10 py-3 bg-[#0F172A] text-warna-500 rounded-2xl text-[11px] font-black uppercase tracking-widest shadow-xl hover:bg-warna-500 hover:text-[#0F172A] transition-all border-2 border-warna-500/20 italic">
                            <i class="fas fa-fingerprint mr-2 text-[14px]"></i> Absen Manual
                        </button>
                    </div>
                </div>
            @endif
            </x-input-modal>
        </div>
    @endif

     @if($isEditModalOpen)
        <div class="fixed z-50 inset-0 flex items-center justify-center bg-black/50 backdrop-blur-sm" 
             x-data="{ show: false }" 
             x-init="$nextTick(() => show = true)"
             x-show="show" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
            
            <x-input-modal class="relative bg-white rounded-xl shadow-2xl mx-4 md:mx-0 w-full max-w-3xl max-h-[90vh] p-6"
                           x-show="show"
                           x-transition:enter="transition ease-out duration-300 delay-100"
                           x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                           x-transition:enter-end="opacity-1 scale-100 translate-y-0"
                           x-transition:leave="transition ease-in duration-200"
                           x-transition:leave-start="opacity-1 scale-100 translate-y-0"
                           x-transition:leave-end="opacity-0 scale-95 translate-y-4">
                
                <x-slot name="title">
                    Edit Member
                </x-slot>
                <x-slot name="subtitle">
                    Perbarui informasi member yang dipilih
                </x-slot>

                <div class="max-h-[50vh] overflow-y-auto mt-6">
                    <form wire:submit.prevent="updateMember">
                        <div class="space-y-6">
                            <!-- Personal Information Section -->
                            <div class="bg-white border border-gray-200 rounded-xl p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-user mr-2 text-blue-600"></i>
                                    Informasi Pribadi
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <x-g-input 
                                        wire:model.live="editName"
                                        label="Nama Lengkap"
                                        class="transition-all duration-200 focus:scale-105"
                                    />
                                    
                                    <x-g-input 
                                        wire:model.live="editEmail"
                                        type="email"
                                        label="Email"
                                        class="transition-all duration-200 focus:scale-105"
                                    />
                                    
                                    <x-g-input 
                                        wire:model.live="editUsername"
                                        label="Username"
                                        class="transition-all duration-200 focus:scale-105"
                                    />
                                    
                                    <x-g-input 
                                        wire:model.live="editNomorTelepon"
                                        type="number"
                                        label="Nomor Telepon"
                                        class="transition-all duration-200 focus:scale-105"
                                    />
                                </div>
                            </div>

                            <!-- Membership Information Section -->
                            <div class="bg-white border border-gray-200 rounded-xl p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-id-card mr-2 text-green-600"></i>
                                    Informasi Keanggotaan
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <x-g-input 
                                        wire:model.live="editMemberType"
                                        type="select"
                                        label="Jenis Member"
                                        :options="[
                                            'local' => 'Local',
                                            'foreign' => 'Foreign'
                                        ]"
                                        class="transition-all duration-200 focus:scale-105"
                                    />
                                    
                                    <x-g-input 
                                        wire:model.live="selectedStatus"
                                        type="select"
                                        label="Status"
                                        :options="[
                                            'active' => 'Active',
                                            'frozen' => 'Frozen',
                                            'inactive' => 'Inactive',
                                            'pending_email_verification' => 'Pending Email Verification',
                                            'pending_admin_verification' => 'Pending Admin Verification'
                                        ]"
                                        disabled
                                        class="transition-all duration-200 focus:scale-105 disabled:cursor-not-allowed disabled:bg-gray-100 disabled:text-gray-500"
                                    />
                                </div>
                            </div>

                            <!-- Security Section -->
                            <div class="bg-white border border-gray-200 rounded-xl p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-lock mr-2 text-red-600"></i>
                                    Keamanan
                                </h3>
                                <x-g-input 
                                    wire:model.live="editPassword"
                                    type="password"
                                    label="Password Baru"
                                    placeholder="Kosongkan jika tidak ingin mengubah password"
                                    class="transition-all duration-200 focus:scale-105"
                                />
                            </div>
                        </div>

                        <!-- Error Messages -->
                        @if($errors->any())
                            <div class="mt-6 bg-red-50 border border-red-200 rounded-xl p-4">
                                <div class="flex items-start">
                                    <i class="fas fa-exclamation-circle text-red-500 mt-0.5 mr-3"></i>
                                    <div>
                                        <h4 class="text-red-800 font-medium mb-1">Terdapat kesalahan:</h4>
                                        <ul class="text-red-700 text-sm space-y-1">
                                            @foreach($errors->all() as $error)
                                                <li>• {{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>

                <!-- Footer Actions -->
                <x-slot name="actions" >
                        <button type="button" @click="show = false; setTimeout(() => $wire.closeEditModal(), 200)" 
                                class="px-6 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 rounded-lg transition-all duration-200">
                            Batal
                        </button>
                        <button wire:click="updateMember" 
                                class="flex items-center px-6 py-2 bg-warna-700 hover:bg-warna-700/80 text-white rounded-lg transition-all duration-200 hover:scale-105 ml-3">
                            <i class="fas fa-save mr-2"></i>Simpan Perubahan
                        </button>
                </x-slot>
            </x-input-modal>
        </div>
    @endif

    @if($isNotificationModalOpen)
     <div class="fixed z-50 inset-0 flex items-center justify-center bg-warna-300/50 ">
       <x-notification-modal class="relative bg-white rounded-lg shadow-lg p-6 mx-7 md:mx-0 w-full max-w-md text-center">
            <x-slot name="title">{{ session('message.title') }}</x-slot>
            <x-slot name="description">{{ session('message.description') }}</x-slot>
            <x-slot name="button">
                <button @click="show = false" wire:click="closeNotificationModal" class="px-4 py-2 bg-blue-600 text-white rounded-lg">OK</button>
            </x-slot>
        </x-notification-modal>
     </div>
    @endif

    @if($hapusMemberMode)
    <div class="fixed z-60 inset-0 flex items-center justify-center bg-black/50 ">
        <x-verification-modal class="relative bg-white rounded-lg shadow-lg p-6 mx-7 md:mx-0 w-full max-w-md text-center">
            <x-slot name="title">Hapus Member</x-slot>
            <x-slot name="description">Apakah Anda yakin ingin menghapus member ini? Tindakan ini tidak dapat dibatalkan.</x-slot>
            <x-slot name="button">
                <button @click="show = false" wire:click="closeHapusMemberModal" class="px-4 py-2 bg-gray-300 hover:bg-gray-300/80 active:scale-95 transition-all text-gray-700 rounded-lg mr-2">Batal</button>
                <button wire:click="deleteMember" class="px-4 py-2 bg-warna-900 hover:bg-warna-900/80 active:scale-95 transition-all text-white rounded-lg">Hapus</button>
            </x-slot>
        </x-verification-modal>
    </div>
    @endif

</div>
